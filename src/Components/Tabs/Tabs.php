<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tabs;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Traits\UseThemeFile;
use DOMDocument;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
    use UseThemeFile;

    private const array POSITIONS = ['top', 'side'];

    protected string $component = 'tabs';

    public string $name;
    public ?string $selected;
    public string $breakpoint;
    public string $position;
    public string $query;
    public string $selectSpacing;
    public string $spacing;
    public string $sideGap;
    public string $sideHeading;
    public string $sideSpacing;
    public string $sideWidth;

    private ?string $resolvedTab = null;
    private bool $tabResolved = false;

    public function __construct(
        ?string $background = null,
        ?string $border = null,
        ?string $breakpoint = null,
        ?string $color = null,
        ?string $font = null,
        ?string $other = null,
        string $name = 'tabs',
        ?string $padding = null,
        ?string $position = null,
        ?string $query = null,
        ?string $rounded = null,
        ?string $selected = null,
        ?string $selectSpacing = null,
        ?string $shadow = null,
        ?string $sideGap = null,
        ?string $sideHeading = null,
        ?string $sideSpacing = null,
        ?string $sideWidth = null,
        ?string $spacing = null
    ) {
        $this->name = $name;
        $this->selected = $selected;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);

        $this->breakpoint = $this->style($this->component, 'breakpoint', $breakpoint);
        $this->position = $this->validatePosition($this->style($this->component, 'position', $position));
        $this->query = (string) $this->style($this->component, 'query', $query);
        $this->selectSpacing = $this->style($this->component, 'select-spacing', $selectSpacing);
        $this->spacing = $this->style($this->component, 'spacing', $spacing);
        $this->sideGap = $this->style($this->component, 'side-gap', $sideGap);
        $this->sideHeading = $this->style($this->component, 'side-heading', $sideHeading);
        $this->sideSpacing = $this->style($this->component, 'side-spacing', $sideSpacing);
        $this->sideWidth = $this->style($this->component, 'side-width', $sideWidth);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.tabs.tabs');
    }

    public function getHeadingsArray(string $html): array
    {
        $dom = new DomDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);

        $nodes = $dom->getElementsByTagName('a');
        $matches = [];

        for ($i = 0; $i < $nodes->length; $i++) {
            if ($node = $nodes->item($i)) {
                $matches[$node->attributes['href']->value] = trim($node->textContent);
            }
        }

        return $matches;
    }

    /**
     * The tab to open the component on.
     *
     * The query string takes precedence over the `selected` attribute: `selected` is the
     * screen's own default, where `?t=` is a request for this one page view. A tab can be
     * addressed by its id - `?t=royalty` - or by its position in the rendered tab strip,
     * one-based, so `?t=4` opens the fourth tab, which is how the legacy screens did it.
     *
     * Positions count only the tabs actually rendered, so on a screen whose tabs are
     * permission-gated the same number means different tabs to different users. Ids are the
     * stable way to link to a tab.
     *
     * A value naming no rendered tab is ignored, so a stale or mistyped link opens the screen
     * on its first tab rather than on nothing at all.
     */
    public function selectedTab(string $html): ?string
    {
        if (! $this->tabResolved) {
            $this->resolvedTab = $this->requestedTab($this->tabIds($html)) ?? $this->selected;
            $this->tabResolved = true;
        }

        return $this->resolvedTab;
    }

    public function getSelectOptions(string $html): array
    {
        $options = [];
        $prefix = '#' . $this->name . '-';

        foreach ($this->getHeadingsArray($html) as $tab => $heading) {
            $options[str_replace($prefix, '', $tab)] = $heading;
        }

        return $options;
    }

    /**
     * @param  list<string>  $tabs
     */
    private function requestedTab(array $tabs): ?string
    {
        if ($this->query === '') {
            return null;
        }

        $requested = request()->query($this->query);

        if (! is_string($requested) || $requested === '') {
            return null;
        }

        if (in_array($requested, $tabs, true)) {
            return $requested;
        }

        return ctype_digit($requested) ? ($tabs[(int) $requested - 1] ?? null) : null;
    }

    /**
     * The ids of the rendered tabs, in the order they appear.
     *
     * Cast to string because a heading given a numeric id would otherwise come back from
     * getSelectOptions() as an integer array key and never match the query string.
     *
     * @return list<string>
     */
    private function tabIds(string $html): array
    {
        return array_map(
            static fn ($id): string => (string) $id,
            array_keys($this->getSelectOptions($html))
        );
    }

    /**
     * @throws ControlUIKitException
     */
    private function validatePosition(string $position): string
    {
        if (! in_array($position, self::POSITIONS, true)) {
            throw new ControlUIKitException('Tabs position [' . $position . '] is invalid, please use one of [' . implode(', ', self::POSITIONS) . ']');
        }

        return $position;
    }
}
