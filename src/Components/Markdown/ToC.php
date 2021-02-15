<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Markdown;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class ToC extends Component
{
    public string $url;

    public function __construct(
        $url = null
    ) {
        $this->url = $url ?? '';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.markdown.toc');
    }

    public function items(string $markdown): Collection
    {
        // Remove code blocks which might contain headers.
        $markdown = preg_replace('(```[a-z]*\n[\s\S]*?\n```)', '', $markdown);

        return collect(explode(PHP_EOL, $markdown))
            ->reject(function (string $line) {
                // Only search for level 2 and 3 headings.
                return ! Str::startsWith($line, '## ') && ! Str::startsWith($line, '### ');
            })
            ->map(function (string $line) {
                return [
                    'level' => strlen(trim(Str::before($line, '# '))) + 1,
                    'title' => $title = trim(Str::after($line, '# ')),
                    'anchor' => Str::slug($title),
                ];
            });
    }
}
