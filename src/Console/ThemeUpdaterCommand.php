<?php

declare(strict_types=1);

namespace ControlUIKit\Console;

use ControlUIKit\ThemeCssParser;
use ControlUIKit\ThemeStubParser;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

final class ThemeUpdaterCommand extends Command
{
    protected $signature = 'uikit:theme-updater
                           {--name= : The name of the theme (processes only that file)}
                           {--css-path= : Directory or file to update (defaults to resources/css)}';

    protected $description = 'Update theme CSS files with any missing variables from the current stub.';

    private const SECTION_LABELS = ['root' => 'root', 'light' => 'light mode', 'dark' => 'dark mode'];

    public function handle(Filesystem $filesystem, ThemeStubParser $stubParser, ThemeCssParser $cssParser): int
    {
        $cssPath = $this->option('css-path') ?? resource_path('css');

        $files = $this->resolveFiles($filesystem, $cssPath);

        if ($files === null) {
            return 1;
        }

        $stubPath = __DIR__ . '/../../resources/stubs/theme_css.stub';
        $stubSections = $stubParser->parse($stubPath);
        $paletteVarNames = $stubParser->getPaletteVariableNames();

        foreach ($files as $filePath) {
            $this->processFile($filePath, $filesystem, $cssParser, $stubSections, $paletteVarNames);
        }

        return 0;
    }

    private function resolveFiles(Filesystem $filesystem, string $cssPath): ?array
    {
        // Path points directly to a CSS file
        if ($filesystem->isFile($cssPath)) {
            return [$cssPath];
        }

        if (! $filesystem->isDirectory($cssPath)) {
            $this->error("Path does not exist: {$cssPath}");
            return null;
        }

        if ($this->option('name')) {
            $name = Str::snake($this->option('name'));
            $filePath = rtrim($cssPath, '/') . '/' . $name . '.css';

            if (! $filesystem->exists($filePath)) {
                $this->error("Theme file not found: {$filePath}");
                return null;
            }

            return [$filePath];
        }

        $files = $filesystem->glob(rtrim($cssPath, '/') . '/*.css');

        if (empty($files)) {
            $this->error("No CSS files found in: {$cssPath}");
            return null;
        }

        return $files;
    }

    private function processFile(
        string $filePath,
        Filesystem $filesystem,
        ThemeCssParser $cssParser,
        array $stubSections,
        array $paletteVarNames,
    ): void {
        $parsed = $cssParser->parse($filePath);
        $diff = $this->diff($stubSections, $parsed['sections'], $paletteVarNames);

        $missingCount = $this->countMissingVariables($diff);
        $paletteCount = $this->countPaletteWarnings($diff);
        $extraCount = $this->countExtra($diff);

        if ($missingCount === 0 && $paletteCount === 0) {
            $extras = $extraCount > 0 ? " ({$extraCount} extra variable(s) not in stub)" : '';
            $this->line("<info>{$filePath}</info> — up to date{$extras}");
            return;
        }

        $this->showReport($filePath, $diff, $parsed['sections']);

        if (! $this->confirm('Apply changes to this file?', false)) {
            $this->line('Skipped.');
            $this->line('');
            return;
        }

        $insertions = $this->calculateInsertions($stubSections, $parsed['sections'], $diff);

        if (! empty($insertions)) {
            $updatedLines = $this->applyInsertions($parsed['lines'], $insertions);
            $filesystem->put($filePath, implode("\n", $updatedLines));
            $this->info("Updated: {$filePath}");
        } else {
            $this->line('Nothing to insert (only palette or section warnings).');
        }

        $this->line('');
    }

    private function diff(array $stubSections, array $fileSections, array $paletteVarNames): array
    {
        $diff = [];

        foreach (['root', 'light', 'dark'] as $section) {
            $stubEntries = $stubSections[$section] ?? [];
            $fileSection = $fileSections[$section];
            $fileVars = array_keys($fileSection['variables']);
            $fileComments = array_keys($fileSection['comments']);

            $missingEntries = [];
            $paletteWarnings = [];
            $extra = [];

            foreach ($stubEntries as $entry) {
                if ($entry['type'] === 'variable') {
                    if (in_array($entry['name'], $paletteVarNames, true)) {
                        if (! in_array($entry['name'], $fileVars, true)) {
                            $paletteWarnings[] = $entry['name'];
                        }
                    } elseif (! in_array($entry['name'], $fileVars, true)) {
                        $missingEntries[] = $entry;
                    }
                } elseif ($entry['type'] === 'comment') {
                    if (! in_array($entry['text'], $fileComments, true)) {
                        $missingEntries[] = $entry;
                    }
                }
            }

            $stubVarNames = array_filter(array_column($stubEntries, 'name'));

            foreach ($fileVars as $varName) {
                if (! in_array($varName, $stubVarNames, true) && ! in_array($varName, $paletteVarNames, true)) {
                    $extra[] = $varName;
                }
            }

            $diff[$section] = [
                'missing' => $missingEntries,
                'palette_missing' => $paletteWarnings,
                'extra' => $extra,
            ];
        }

        return $diff;
    }

    private function showReport(string $filePath, array $diff, array $fileSections): void
    {
        $this->line('');
        $this->line('<options=bold>Updating:</> <info>' . $filePath . '</info>');

        foreach (['root', 'light', 'dark'] as $section) {
            $fileSection = $fileSections[$section];
            $label = self::SECTION_LABELS[$section];

            if ($fileSection['start'] === null) {
                $this->line('');
                $this->line("  <comment>[{$label}]</comment> <fg=red>section not found — re-run uikit:create-new-theme</>");
                continue;
            }

            $displayEntries = $this->filterOrphanedComments($diff[$section]['missing']);
            $varCount = count(array_filter($displayEntries, fn($e) => $e['type'] === 'variable'));
            $palette = $diff[$section]['palette_missing'];
            $extra = $diff[$section]['extra'];

            if ($varCount === 0 && empty($palette) && empty($extra)) {
                continue;
            }

            $this->line('');

            if ($varCount > 0) {
                $this->line("  <comment>[{$label}]</comment> — <fg=yellow>{$varCount} missing variable(s)</>");

                foreach ($displayEntries as $entry) {
                    if ($entry['type'] === 'comment') {
                        $this->line('    <fg=cyan>' . $entry['content'] . '</>');
                    } else {
                        $this->line('    <fg=yellow>+</> ' . $entry['content']);
                    }
                }
            } else {
                $this->line("  <comment>[{$label}]</comment>");
            }

            if (! empty($palette)) {
                $this->line('');
                $this->line("    <fg=red>⚠  Palette variables missing (re-run uikit:create-new-theme):</>");
                $this->line('      ' . implode(', ', $palette));
            }

            if (! empty($extra)) {
                $this->line('');
                $this->line('    <fg=gray>ℹ  Extra variables not in stub (left in place):</>');
                $this->line('      ' . implode(', ', $extra));
            }
        }

        $this->line('');
    }

    private function calculateInsertions(array $stubSections, array $fileSections, array $diff): array
    {
        $insertions = [];

        foreach (['root', 'light', 'dark'] as $section) {
            $fileSection = $fileSections[$section];

            if ($fileSection['start'] === null) {
                continue;
            }

            $displayEntries = $this->filterOrphanedComments($diff[$section]['missing']);

            if (empty($displayEntries)) {
                continue;
            }

            $stubEntries = $stubSections[$section];
            $fileVars = $fileSection['variables'];
            $fileComments = $fileSection['comments'];
            $sectionEnd = $fileSection['end'];

            $missingVarNames = array_filter(array_column($displayEntries, 'name'));
            $missingCommentTexts = array_map(
                fn($e) => $e['text'],
                array_filter($displayEntries, fn($e) => $e['type'] === 'comment'),
            );

            $lastExistingLine = $fileSection['start'];
            $pendingLines = [];

            foreach ($stubEntries as $entry) {
                if ($entry['type'] === 'blank') {
                    if (! empty($pendingLines)) {
                        $pendingLines[] = $entry['content'];
                    }
                    continue;
                }

                if ($entry['type'] === 'comment') {
                    if (isset($fileComments[$entry['text']])) {
                        // Comment exists — flush any pending batch, then advance anchor to the comment line
                        if (! empty($pendingLines)) {
                            $insertions[] = [
                                'after' => $lastExistingLine,
                                'lines' => $this->trimEdgeBlanks($pendingLines),
                            ];
                            $pendingLines = [];
                        }
                        $lastExistingLine = $fileComments[$entry['text']];
                    } elseif (in_array($entry['text'], $missingCommentTexts, true)) {
                        $pendingLines[] = $entry['content'];
                    }
                    continue;
                }

                if ($entry['type'] === 'variable') {
                    if (isset($fileVars[$entry['name']])) {
                        if (! empty($pendingLines)) {
                            $insertions[] = [
                                'after' => $lastExistingLine,
                                'lines' => $this->trimEdgeBlanks($pendingLines),
                            ];
                            $pendingLines = [];
                        }
                        $lastExistingLine = $fileVars[$entry['name']];
                    } elseif (in_array($entry['name'], $missingVarNames, true)) {
                        $pendingLines[] = $entry['content'];
                    }
                }
            }

            // Flush any remaining at the end of the section (before closing })
            if (! empty($pendingLines)) {
                $trimmed = $this->trimEdgeBlanks($pendingLines);
                if (! empty($trimmed)) {
                    $insertions[] = ['after' => $sectionEnd - 1, 'lines' => $trimmed];
                }
            }
        }

        return $insertions;
    }

    private function applyInsertions(array $fileLines, array $insertions): array
    {
        // Apply from bottom to top to keep line numbers valid
        usort($insertions, fn($a, $b) => $b['after'] <=> $a['after']);

        foreach ($insertions as $insertion) {
            array_splice($fileLines, $insertion['after'] + 1, 0, $insertion['lines']);
        }

        return $fileLines;
    }

    private function filterOrphanedComments(array $entries): array
    {
        $filtered = [];
        $pendingComment = null;

        foreach ($entries as $entry) {
            if ($entry['type'] === 'comment') {
                $pendingComment = $entry;
            } elseif ($entry['type'] === 'variable') {
                if ($pendingComment !== null) {
                    $filtered[] = $pendingComment;
                    $pendingComment = null;
                }
                $filtered[] = $entry;
            }
        }

        return $filtered;
    }

    private function trimEdgeBlanks(array $lines): array
    {
        while (! empty($lines) && trim($lines[0]) === '') {
            array_shift($lines);
        }

        while (! empty($lines) && trim(end($lines)) === '') {
            array_pop($lines);
        }

        return $lines;
    }

    private function countMissingVariables(array $diff): int
    {
        return array_sum(array_map(
            fn($d) => count(array_filter($d['missing'], fn($e) => $e['type'] === 'variable')),
            $diff,
        ));
    }

    private function countPaletteWarnings(array $diff): int
    {
        return array_sum(array_map(fn($d) => count($d['palette_missing']), $diff));
    }

    private function countExtra(array $diff): int
    {
        return array_sum(array_map(fn($d) => count($d['extra']), $diff));
    }
}
