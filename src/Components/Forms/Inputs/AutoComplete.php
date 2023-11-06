<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class AutoComplete extends Input
{
    use UseThemeFile;

    protected string $component = 'input-autocomplete';

    public mixed $options;
    public ?string $src = null;
    public ?string $lookup_src = null;
    public ?string $idName;
    public ?string $textName;
    public ?string $subtextName;
    public ?string $imageName;

    public function __construct(
        string $name,
        string $id = null,
        string $decimals = null,
        string $default = null,
        float|string $max = null,
        float|string $min = null,
        string $placeholder = null,
        float|string $step = null,
        string $type = null,
        string $value = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,
        string $iconBackground = null,
        string $iconBorder = null,
        string $iconColor = null,
        string $iconOther = null,
        string $iconPadding = null,
        string $iconRounded = null,
        string $iconShadow = null,
        string $iconSize = null,
        string $iconLeftBackground = null,
        string $iconLeftBorder = null,
        string $iconLeftColor = null,
        string $iconLeftOther = null,
        string $iconLeftPadding = null,
        string $iconLeftRounded = null,
        string $iconLeftShadow = null,
        string $iconLeftSize = null,
        string $iconRightBackground = null,
        string $iconRightBorder = null,
        string $iconRightColor = null,
        string $iconRightOther = null,
        string $iconRightPadding = null,
        string $iconRightRounded = null,
        string $iconRightShadow = null,
        string $iconRightSize = null,
        string $inputBackground = null,
        string $inputBorder = null,
        string $inputColor = null,
        string $inputFont = null,
        string $inputOther = null,
        string $inputPadding = null,
        string $inputRounded = null,
        string $inputShadow = null,
        string $prefixBackground = null,
        string $prefixBorder = null,
        string $prefixColor = null,
        string $prefixFont = null,
        string $prefixOther = null,
        string $prefixPadding = null,
        string $prefixRounded = null,
        string $prefixShadow = null,
        string $suffixBackground = null,
        string $suffixBorder = null,
        string $suffixColor = null,
        string $suffixFont = null,
        string $suffixOther = null,
        string $suffixPadding = null,
        string $suffixRounded = null,
        string $suffixShadow = null,
        string $iconLeft = null,
        string $iconRight = null,
        string $prefixText = null,
        string $suffixText = null,
        bool $requiredInput = null,
        mixed $src = null,
        string $lookup_src = null,
        string $key = null,
        string $text = null,
        string $subtext = null,
        string $image = null,
        bool $preload = null,
    ) {
        parent::__construct(
            $name,
            $id,
            $decimals,
            $default,
            $max,
            $min,
            $placeholder,
            $step,
            $type,
            $value,
            $background,
            $border,
            $color,
            $font,
            $other,
            $padding,
            $rounded,
            $shadow,
            $width,
            $iconBackground,
            $iconBorder,
            $iconColor,
            $iconOther,
            $iconPadding,
            $iconRounded,
            $iconShadow,
            $iconSize,
            $iconLeftBackground,
            $iconLeftBorder,
            $iconLeftColor,
            $iconLeftOther,
            $iconLeftPadding,
            $iconLeftRounded,
            $iconLeftShadow,
            $iconLeftSize,
            $iconRightBackground,
            $iconRightBorder,
            $iconRightColor,
            $iconRightOther,
            $iconRightPadding,
            $iconRightRounded,
            $iconRightShadow,
            $iconRightSize,
            $inputBackground,
            $inputBorder,
            $inputColor,
            $inputFont,
            $inputOther,
            $inputPadding,
            $inputRounded,
            $inputShadow,
            $prefixBackground,
            $prefixBorder,
            $prefixColor,
            $prefixFont,
            $prefixOther,
            $prefixPadding,
            $prefixRounded,
            $prefixShadow,
            $suffixBackground,
            $suffixBorder,
            $suffixColor,
            $suffixFont,
            $suffixOther,
            $suffixPadding,
            $suffixRounded,
            $suffixShadow,
            $iconLeft,
            $iconRight,
            $prefixText,
            $suffixText,
            $requiredInput
        );

        if (is_string($src)) {
            $mode = 'ajax';
            $this->src = $src;
            $this->lookup_src = $lookup_src;
        } else {
            $mode = 'data';
            $this->src = '';
            $this->lookup_src = '';
        }

        $this->idName = $this->style($this->component, 'id-name', $key);
        $this->textName = $this->style($this->component, 'text-name', $text);
        $this->subtextName = $this->style($this->component, 'subtext-name', $subtext);
        $this->imageName = $this->style($this->component, 'image-name', $image);

        if ($mode === 'data') {
            $this->options = $this->setOptions($src);
        } else if ($preload) {
            $this->options = $this->apiCall();
        } else {
            $this->options = [];
        }

    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.autocomplete');
    }

    private function setOptions(mixed $data): array
    {
        if (! $this->isMultidimensional($data)) {
            return $this->convertToMultidimensional($data);
        }

        return $this->convertToArray($data);
    }

    private function isMultidimensional($array): bool
    {
        foreach ($array as $value) {
            if (is_array($value)) {
                return true;
            }
        }
        return false;
    }

    private function convertToMultidimensional(mixed $rows): array
    {
        $options = [];

        foreach ($rows as $key => $text) {
            $options[] = [
                'id' => $key,
                'text' => $text,
                'sub' => null,
                'thumbnail' => null,
            ];
        }

        return $options;
    }

    private function convertToArray(mixed $rows): array
    {
        $options = [];

        foreach ($rows as $row) {
            $options[] = [
                'id' => $row[$this->idName],
                'text' => $row[$this->textName],
                'sub' => $row[$this->subtextName] ?? null,
                'thumbnail' => $row[$this->imageName] ?? null,
            ];
        }

        return $options;
    }

    private function apiCall(): array
    {

        $data = Http::get($this->ajax)->json();

        return $this->convertToArray($data);
    }
}
