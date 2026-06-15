<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use ControlUIKit\Traits\UseButtons;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonGroupItem extends Component
{
    use UseButtons, UseThemeFile;

    protected string $component = 'button-group-item';

    public ?string $href;
    public ?string $icon;
    public string $bstyle;
    public string $element;
    public string $iconSize;
    public string $iconStyles;
    public string $type;
    public string $role_type;
    public string $disabled;
    public string $active;
    public string $margin;
    public string $ariaPressed;
    public string $action;
    public ?string $text;
    public bool $first;
    public bool $last;

    public function __construct(
        ?string $background = null,
        ?string $border = null,
        ?string $color = null,
        ?string $cursor = null,
        ?string $font = null,
        ?string $iconSize = null,
        ?string $iconStyle = null,
        ?string $other = null,
        ?string $padding = null,
        ?string $rounded = null,
        ?string $shadow = null,
        ?string $width = null,
        ?string $wrap = null,
        ?string $margin = null,
        ?string $href = null,
        ?string $icon = null,
        ?string $bstyle = null,
        ?string $type = null,
        ?string $text = null,
        ?string $trans = null,
        ?string $action = null,
        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $disabled = false,
        bool $info = false,
        bool $link = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false,
        bool $active = false,
        bool $first = false,
        bool $last = false,
    ) {
        $this->first = $first;
        $this->last = $last;

        $this->bstyle = $this->buttonVersion($bstyle, [
            'default' => $default,
            'brand' => $brand,
            'danger' => $danger,
            'info' => $info,
            'link' => $link,
            'success' => $success,
            'muted' => $muted,
            'warning' => $warning,
        ]);

        // Use position-specific rounded when no explicit rounded is passed
        if ($rounded === null) {
            if ($first && ! $last) {
                $rounded = $this->style($this->component, 'rounded-first', null);
            } elseif ($last && ! $first) {
                $rounded = $this->style($this->component, 'rounded-last', null);
            } elseif (! $first && ! $last) {
                $rounded = $this->style($this->component, 'rounded-middle', null);
            }
            // first && last (standalone): fall through with null → base rounded from config
        }

        // Non-first items overlap left neighbour by 1px so adjacent rings don't double up
        if ($margin === null) {
            $margin = $first ? '' : null;
        }

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'cursor' => $disabled ? '' : $cursor,
            'disabled' => $disabled ? null : '',
            'active' => $active ? null : '',
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $width,
            'margin' => $margin,
        ], ['background', 'border', 'color', 'active'], 'button-group-item.' . $this->bstyle);

        $this->ariaPressed = $active ? 'aria-pressed="true"' : '';

        $this->type = $this->buttonType($type, $href);
        $this->href = $href && ! $disabled ? "href=\"{$href}\"" : '';
        $this->icon = $icon === 'none' ? null : $icon;
        $this->element = $this->href ? 'a' : 'button';
        $this->disabled = $disabled ? 'disabled' : '';
        $this->action = $action ?? '';
        $this->role_type = $this->element === 'a' ? 'role' : 'type';
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->iconStyles = $this->style('button-group-item.' . $this->bstyle, 'icon', $iconStyle);

        if ($trans) {
            $text = trans($trans);
        }
        $this->text = $text;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.buttons.button-group-item');
    }
}
