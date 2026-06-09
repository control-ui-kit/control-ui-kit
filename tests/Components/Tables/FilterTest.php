<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\Config;
use Illuminate\View\ViewException;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FilterTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.background', 'label-background');
        Config::set('themes.default.label.border', 'label-border');
        Config::set('themes.default.label.color', 'label-color');
        Config::set('themes.default.label.font', 'label-font');
        Config::set('themes.default.label.other', 'label-other');
        Config::set('themes.default.label.padding', 'label-padding');
        Config::set('themes.default.label.rounded', 'label-rounded');
        Config::set('themes.default.label.shadow', 'label-shadow');

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');

        Config::set('themes.default.form-layout-responsive.content', 'content-style');
        Config::set('themes.default.form-layout-responsive.help', 'help-style');
        Config::set('themes.default.form-layout-responsive.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-responsive.text', 'text-style');
        Config::set('themes.default.form-layout-responsive.label', 'label-style');
        Config::set('themes.default.form-layout-responsive.required-size', 'required-size');
        Config::set('themes.default.form-layout-responsive.required-color', 'required-color');
        Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
        Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');

        Config::set('themes.default.input-checkbox.background', 'background');
        Config::set('themes.default.input-checkbox.border', 'border');
        Config::set('themes.default.input-checkbox.color', 'color');
        Config::set('themes.default.input-checkbox.layout', 'layout');
        Config::set('themes.default.input-checkbox.other', 'other');
        Config::set('themes.default.input-checkbox.padding', 'padding');

        Config::set('themes.default.input-checkbox.input-background', 'input-background');
        Config::set('themes.default.input-checkbox.input-border', 'input-border');
        Config::set('themes.default.input-checkbox.input-other', 'input-other');
        Config::set('themes.default.input-checkbox.input-rounded', 'input-rounded');

        Config::set('themes.default.input-toggle.background', 'background');
        Config::set('themes.default.input-toggle.border', 'border');
        Config::set('themes.default.input-toggle.other', 'other');
        Config::set('themes.default.input-toggle.padding', 'padding');
        Config::set('themes.default.input-toggle.shadow', 'shadow');

        Config::set('themes.default.input-toggle.base-animation', 'base-animation');
        Config::set('themes.default.input-toggle.base-background', 'base-background');
        Config::set('themes.default.input-toggle.base-border', 'base-border');
        Config::set('themes.default.input-toggle.base-focus', 'base-focus');
        Config::set('themes.default.input-toggle.base-other', 'base-other');
        Config::set('themes.default.input-toggle.base-rounded', 'base-rounded');
        Config::set('themes.default.input-toggle.base-shadow', 'base-shadow');
        Config::set('themes.default.input-toggle.base-size', 'base-size');
        Config::set('themes.default.input-toggle.base-state-off', 'base-state-off');
        Config::set('themes.default.input-toggle.base-state-on', 'base-state-on');

        Config::set('themes.default.input-toggle.switch-animation', 'switch-background');
        Config::set('themes.default.input-toggle.switch-background', 'switch-background');
        Config::set('themes.default.input-toggle.switch-border', 'switch-border');
        Config::set('themes.default.input-toggle.switch-focus', 'switch-focus');
        Config::set('themes.default.input-toggle.switch-other', 'switch-other');
        Config::set('themes.default.input-toggle.switch-rounded', 'switch-rounded');
        Config::set('themes.default.input-toggle.switch-shadow', 'switch-shadow');
        Config::set('themes.default.input-toggle.switch-size', 'switch-size');
        Config::set('themes.default.input-toggle.switch-state-off', 'switch-state-off');
        Config::set('themes.default.input-toggle.switch-state-on', 'switch-state-on');

        Config::set('themes.default.table-filter.input-background', 'input-background');
        Config::set('themes.default.table-filter.input-border', 'input-border');
        Config::set('themes.default.table-filter.input-color', 'input-color');
        Config::set('themes.default.table-filter.input-font', 'input-font');
        Config::set('themes.default.table-filter.input-other', 'input-other');
        Config::set('themes.default.table-filter.input-padding', 'input-padding');
        Config::set('themes.default.table-filter.input-rounded', 'input-rounded');
        Config::set('themes.default.table-filter.input-shadow', 'input-shadow');
        Config::set('themes.default.table-filter.input-width', 'input-width');
        Config::set('themes.default.table-filter.select-other', 'select-other');
        Config::set('themes.default.table-filter.text-other', 'text-other');

        Config::set('themes.default.input-select.please-select-text', 'Please Select ...');
        Config::set('themes.default.input-select.please-select-value', null);
        Config::set('themes.default.input-select.please-select-trans', '');

        Config::set('themes.default.input-select.button-background', 'button-background');
        Config::set('themes.default.input-select.button-border', 'button-border');
        Config::set('themes.default.input-select.button-color', 'button-color');
        Config::set('themes.default.input-select.button-font', 'button-font');
        Config::set('themes.default.input-select.button-other', 'button-other');
        Config::set('themes.default.input-select.button-padding', 'button-padding');
        Config::set('themes.default.input-select.button-rounded', 'button-rounded');
        Config::set('themes.default.input-select.button-shadow', 'button-shadow');
        Config::set('themes.default.input-select.button-width', 'button-width');

        Config::set('themes.default.input-select.check-background', 'check-background');
        Config::set('themes.default.input-select.check-border', 'check-border');
        Config::set('themes.default.input-select.check-color', 'check-color');
        Config::set('themes.default.input-select.check-font', 'check-font');
        Config::set('themes.default.input-select.check-other', 'check-other');
        Config::set('themes.default.input-select.check-padding', 'check-padding');
        Config::set('themes.default.input-select.check-rounded', 'check-rounded');
        Config::set('themes.default.input-select.check-shadow', 'check-shadow');
        Config::set('themes.default.input-select.check-active', 'check-active');
        Config::set('themes.default.input-select.check-inactive', 'check-inactive');
        Config::set('themes.default.input-select.check-icon', 'icon-check');
        Config::set('themes.default.input-select.check-icon-size', 'check-icon-size');

        Config::set('themes.default.input-select.icon-closed', 'icon-chevron-down');
        Config::set('themes.default.input-select.icon-open', 'icon-chevron-up');
        Config::set('themes.default.input-select.icon-background', 'icon-background');
        Config::set('themes.default.input-select.icon-border', 'icon-border');
        Config::set('themes.default.input-select.icon-color', 'icon-color');
        Config::set('themes.default.input-select.icon-other', 'icon-other');
        Config::set('themes.default.input-select.icon-padding', 'icon-padding');
        Config::set('themes.default.input-select.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-select.icon-shadow', 'icon-shadow');
        Config::set('themes.default.input-select.icon-size', 'icon-size');

        Config::set('themes.default.input-select.image-border', 'image-border');
        Config::set('themes.default.input-select.image-other', 'image-other');
        Config::set('themes.default.input-select.image-padding', 'image-padding');
        Config::set('themes.default.input-select.image-rounded', 'image-rounded');
        Config::set('themes.default.input-select.image-shadow', 'image-shadow');
        Config::set('themes.default.input-select.image-size', 'image-size');
        Config::set('themes.default.input-select.image-name', 'image');

        Config::set('themes.default.input-select.list-background', 'list-background');
        Config::set('themes.default.input-select.list-border', 'list-border');
        Config::set('themes.default.input-select.list-color', 'list-color');
        Config::set('themes.default.input-select.list-font', 'list-font');
        Config::set('themes.default.input-select.list-other', 'list-other');
        Config::set('themes.default.input-select.list-padding', 'list-padding');
        Config::set('themes.default.input-select.list-rounded', 'list-rounded');
        Config::set('themes.default.input-select.list-shadow', 'list-shadow');
        Config::set('themes.default.input-select.list-width', 'list-width');

        Config::set('themes.default.input-select.option-background', 'option-background');
        Config::set('themes.default.input-select.option-border', 'option-border');
        Config::set('themes.default.input-select.option-color', 'option-color');
        Config::set('themes.default.input-select.option-font', 'option-font');
        Config::set('themes.default.input-select.option-other', 'option-other');
        Config::set('themes.default.input-select.option-padding', 'option-padding');
        Config::set('themes.default.input-select.option-rounded', 'option-rounded');
        Config::set('themes.default.input-select.option-shadow', 'option-shadow');
        Config::set('themes.default.input-select.option-spacing', 'option-spacing');
        Config::set('themes.default.input-select.option-active', 'option-active');
        Config::set('themes.default.input-select.option-inactive', 'option-inactive');

        Config::set('themes.default.input-select.text-background', 'text-background');
        Config::set('themes.default.input-select.text-border', 'text-border');
        Config::set('themes.default.input-select.text-color', 'text-color');
        Config::set('themes.default.input-select.text-font', 'text-font');
        Config::set('themes.default.input-select.text-other', 'text-other');
        Config::set('themes.default.input-select.text-padding', 'text-padding');
        Config::set('themes.default.input-select.text-rounded', 'text-rounded');
        Config::set('themes.default.input-select.text-shadow', 'text-shadow');
        Config::set('themes.default.input-select.text-active', 'text-active');
        Config::set('themes.default.input-select.text-inactive', 'text-inactive');
        Config::set('themes.default.input-select.text-name', 'text');

        Config::set('themes.default.input-select.subtext-background', 'subtext-background');
        Config::set('themes.default.input-select.subtext-border', 'subtext-border');
        Config::set('themes.default.input-select.subtext-color', 'subtext-color');
        Config::set('themes.default.input-select.subtext-font', 'subtext-font');
        Config::set('themes.default.input-select.subtext-other', 'subtext-other');
        Config::set('themes.default.input-select.subtext-padding', 'subtext-padding');
        Config::set('themes.default.input-select.subtext-rounded', 'subtext-rounded');
        Config::set('themes.default.input-select.subtext-shadow', 'subtext-shadow');
        Config::set('themes.default.input-select.subtext-active', 'subtext-active');
        Config::set('themes.default.input-select.subtext-inactive', 'subtext-inactive');
        Config::set('themes.default.input-select.subtext-name', 'subtext');

        Config::set('themes.default.input-autocomplete.background', 'ac-background');
        Config::set('themes.default.input-autocomplete.border', 'ac-border');
        Config::set('themes.default.input-autocomplete.color', 'ac-color');
        Config::set('themes.default.input-autocomplete.font', 'ac-font');
        Config::set('themes.default.input-autocomplete.other', 'ac-other');
        Config::set('themes.default.input-autocomplete.padding', 'ac-padding');
        Config::set('themes.default.input-autocomplete.rounded', 'ac-rounded');
        Config::set('themes.default.input-autocomplete.shadow', 'ac-shadow');
        Config::set('themes.default.input-autocomplete.width', 'ac-width');

        Config::set('themes.default.input-autocomplete.clear-background', 'clear-background');
        Config::set('themes.default.input-autocomplete.clear-border', 'clear-border');
        Config::set('themes.default.input-autocomplete.clear-color', 'clear-color');
        Config::set('themes.default.input-autocomplete.clear-other', 'clear-other');
        Config::set('themes.default.input-autocomplete.clear-padding', 'clear-padding');
        Config::set('themes.default.input-autocomplete.clear-rounded', 'clear-rounded');
        Config::set('themes.default.input-autocomplete.clear-shadow', 'clear-shadow');
        Config::set('themes.default.input-autocomplete.clear-size', 'clear-size');

        Config::set('themes.default.input-autocomplete.dropdown-background', 'dropdown-background');
        Config::set('themes.default.input-autocomplete.dropdown-border', 'dropdown-border');
        Config::set('themes.default.input-autocomplete.dropdown-color', 'dropdown-color');
        Config::set('themes.default.input-autocomplete.dropdown-other', 'dropdown-other');
        Config::set('themes.default.input-autocomplete.dropdown-padding', 'dropdown-padding');
        Config::set('themes.default.input-autocomplete.dropdown-rounded', 'dropdown-rounded');
        Config::set('themes.default.input-autocomplete.dropdown-shadow', 'dropdown-shadow');
        Config::set('themes.default.input-autocomplete.dropdown-width', 'dropdown-width');

        Config::set('themes.default.input-autocomplete.icon-background', 'icon-background');
        Config::set('themes.default.input-autocomplete.icon-border', 'icon-border');
        Config::set('themes.default.input-autocomplete.icon-color', 'icon-color');
        Config::set('themes.default.input-autocomplete.icon-other', 'icon-other');
        Config::set('themes.default.input-autocomplete.icon-padding', 'icon-padding');
        Config::set('themes.default.input-autocomplete.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-autocomplete.icon-shadow', 'icon-shadow');
        Config::set('themes.default.input-autocomplete.icon-size', 'icon-size');

        Config::set('themes.default.input-autocomplete.image-border', 'image-border');
        Config::set('themes.default.input-autocomplete.image-other', 'image-other');
        Config::set('themes.default.input-autocomplete.image-padding', 'image-padding');
        Config::set('themes.default.input-autocomplete.image-rounded', 'image-rounded');
        Config::set('themes.default.input-autocomplete.image-shadow', 'image-shadow');
        Config::set('themes.default.input-autocomplete.image-size', 'image-size');

        Config::set('themes.default.input-autocomplete.input-background', 'ac-input-background');
        Config::set('themes.default.input-autocomplete.input-border', 'ac-input-border');
        Config::set('themes.default.input-autocomplete.input-color', 'ac-input-color');
        Config::set('themes.default.input-autocomplete.input-font', 'ac-input-font');
        Config::set('themes.default.input-autocomplete.input-other', 'ac-input-other');
        Config::set('themes.default.input-autocomplete.input-padding', 'ac-input-padding');
        Config::set('themes.default.input-autocomplete.input-rounded', 'ac-input-rounded');
        Config::set('themes.default.input-autocomplete.input-shadow', 'ac-input-shadow');

        Config::set('themes.default.input.icon-background', 'icon-background');
        Config::set('themes.default.input.icon-border', 'icon-border');
        Config::set('themes.default.input.icon-color', 'icon-color');
        Config::set('themes.default.input.icon-other', 'icon-other');
        Config::set('themes.default.input.icon-padding', 'icon-padding');
        Config::set('themes.default.input.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input.icon-shadow', 'icon-shadow');
        Config::set('themes.default.input.icon-size', 'icon-size');

        Config::set('themes.default.input-autocomplete.prompt-background', 'prompt-background');
        Config::set('themes.default.input-autocomplete.prompt-border', 'prompt-border');
        Config::set('themes.default.input-autocomplete.prompt-color', 'prompt-color');
        Config::set('themes.default.input-autocomplete.prompt-font', 'prompt-font');
        Config::set('themes.default.input-autocomplete.prompt-other', 'prompt-other');
        Config::set('themes.default.input-autocomplete.prompt-padding', 'prompt-padding');
        Config::set('themes.default.input-autocomplete.prompt-rounded', 'prompt-rounded');
        Config::set('themes.default.input-autocomplete.prompt-shadow', 'prompt-shadow');

        Config::set('themes.default.input-autocomplete.option-background', 'option-background');
        Config::set('themes.default.input-autocomplete.option-border', 'option-border');
        Config::set('themes.default.input-autocomplete.option-color', 'option-color');
        Config::set('themes.default.input-autocomplete.option-focus', 'option-focus');
        Config::set('themes.default.input-autocomplete.option-font', 'option-font');
        Config::set('themes.default.input-autocomplete.option-other', 'option-other');
        Config::set('themes.default.input-autocomplete.option-padding', 'option-padding');
        Config::set('themes.default.input-autocomplete.option-rounded', 'option-rounded');
        Config::set('themes.default.input-autocomplete.option-selected', 'option-selected');
        Config::set('themes.default.input-autocomplete.option-shadow', 'option-shadow');

        Config::set('themes.default.input-autocomplete.selected-background', 'selected-background');
        Config::set('themes.default.input-autocomplete.selected-border', 'selected-border');
        Config::set('themes.default.input-autocomplete.selected-color', 'selected-color');
        Config::set('themes.default.input-autocomplete.selected-font', 'selected-font');
        Config::set('themes.default.input-autocomplete.selected-other', 'selected-other');
        Config::set('themes.default.input-autocomplete.selected-padding', 'selected-padding');
        Config::set('themes.default.input-autocomplete.selected-rounded', 'selected-rounded');
        Config::set('themes.default.input-autocomplete.selected-shadow', 'selected-shadow');

        Config::set('themes.default.input-autocomplete.subtext-background', 'subtext-background');
        Config::set('themes.default.input-autocomplete.subtext-border', 'subtext-border');
        Config::set('themes.default.input-autocomplete.subtext-color', 'subtext-color');
        Config::set('themes.default.input-autocomplete.subtext-focus', 'subtext-focus');
        Config::set('themes.default.input-autocomplete.subtext-font', 'subtext-font');
        Config::set('themes.default.input-autocomplete.subtext-other', 'subtext-other');
        Config::set('themes.default.input-autocomplete.subtext-padding', 'subtext-padding');
        Config::set('themes.default.input-autocomplete.subtext-rounded', 'subtext-rounded');
        Config::set('themes.default.input-autocomplete.subtext-selected', 'subtext-selected');
        Config::set('themes.default.input-autocomplete.subtext-shadow', 'subtext-shadow');

        Config::set('themes.default.input-autocomplete.text-background', 'text-background');
        Config::set('themes.default.input-autocomplete.text-border', 'text-border');
        Config::set('themes.default.input-autocomplete.text-color', 'text-color');
        Config::set('themes.default.input-autocomplete.text-focus', 'text-focus');
        Config::set('themes.default.input-autocomplete.text-font', 'text-font');
        Config::set('themes.default.input-autocomplete.text-other', 'text-other');
        Config::set('themes.default.input-autocomplete.text-padding', 'text-padding');
        Config::set('themes.default.input-autocomplete.text-rounded', 'text-rounded');
        Config::set('themes.default.input-autocomplete.text-selected', 'text-selected');
        Config::set('themes.default.input-autocomplete.text-shadow', 'text-shadow');

        Config::set('themes.default.input-autocomplete.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input-autocomplete.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input-autocomplete.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input-autocomplete.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input-autocomplete.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input-autocomplete.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input-autocomplete.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input-autocomplete.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input-autocomplete.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-autocomplete.no-results-text', '::no-results');
        Config::set('themes.default.input-autocomplete.prompt-text', '::prompt-text');
        Config::set('themes.default.input-autocomplete.selected-text', '::selected');
        Config::set('themes.default.input-autocomplete.placeholder', '');

        Config::set('themes.default.input-autocomplete.icon-open', 'icon-chevron-down');
        Config::set('themes.default.input-autocomplete.icon-close', 'icon-chevron-up');

        Config::set('themes.default.input-autocomplete.ajax-limit', 20);
        Config::set('themes.default.input-autocomplete.ajax-chars', 2);
        Config::set('themes.default.input-autocomplete.url-id', '__id__');
        Config::set('themes.default.input-autocomplete.url-search', '__term__');
        Config::set('themes.default.input-autocomplete.url-limit', '__limit__');

        Config::set('themes.default.input-autocomplete.data-limit', 999);
        Config::set('themes.default.input-autocomplete.data-chars', 1);

        Config::set('themes.default.input-autocomplete.option-value', 'id');
        Config::set('themes.default.input-autocomplete.option-image', 'image');
        Config::set('themes.default.input-autocomplete.option-subtext', 'subtext');
        Config::set('themes.default.input-autocomplete.option-text', 'text');

        Config::set('app.locale', 'en_GB');
        Config::set('app.timezone', 'UTC');
        Config::set('control-ui-kit.user_timezone', 'UTC');

        Config::set('themes.default.input-date.background', 'background');
        Config::set('themes.default.input-date.border', 'border');
        Config::set('themes.default.input-date.color', 'color');
        Config::set('themes.default.input-date.font', 'font');
        Config::set('themes.default.input-date.other', 'other');
        Config::set('themes.default.input-date.padding', 'padding');
        Config::set('themes.default.input-date.rounded', 'rounded');
        Config::set('themes.default.input-date.shadow', 'shadow');
        Config::set('themes.default.input-date.width', 'width');

        Config::set('themes.default.input-date.icon-background', 'icon-background');
        Config::set('themes.default.input-date.icon-border', 'icon-border');
        Config::set('themes.default.input-date.icon-color', 'icon-color');
        Config::set('themes.default.input-date.icon-other', 'icon-other');
        Config::set('themes.default.input-date.icon-padding', 'icon-padding');
        Config::set('themes.default.input-date.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-date.icon-shadow', 'icon-shadow');
        Config::set('themes.default.input-date.icon-size', 'icon-size');

        Config::set('themes.default.input-date.timezone-background', 'timezone-background');
        Config::set('themes.default.input-date.timezone-border', 'timezone-border');
        Config::set('themes.default.input-date.timezone-color', 'timezone-color');
        Config::set('themes.default.input-date.timezone-font', 'timezone-font');
        Config::set('themes.default.input-date.timezone-other', 'timezone-other');
        Config::set('themes.default.input-date.timezone-padding', 'timezone-padding');
        Config::set('themes.default.input-date.timezone-rounded', 'timezone-rounded');
        Config::set('themes.default.input-date.timezone-shadow', 'timezone-shadow');
        Config::set('themes.default.input-date.timezone-width', 'timezone-width');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-date.mode', 'single');
        Config::set('themes.default.input-date.data', 'Y-m-d');
        Config::set('themes.default.input-date.format', 'd/m/Y');
        Config::set('themes.default.input-date.icon', 'icon-calendar');
        Config::set('themes.default.input-date.week-numbers', false);
        Config::set('themes.default.input-date.years-before', 100);
        Config::set('themes.default.input-date.years-after', 5);
        Config::set('themes.default.input-date.clock-type', 24);
        Config::set('themes.default.input-date.hour-step', 1);
        Config::set('themes.default.input-date.minute-step', 1);
        Config::set('themes.default.input-date.show-time', false);
        Config::set('themes.default.input-date.show-seconds', false);
        Config::set('themes.default.input-date.time-only', false);

        Config::set('themes.default.input-date-range.background', 'background');
        Config::set('themes.default.input-date-range.border', 'border');
        Config::set('themes.default.input-date-range.color', 'color');
        Config::set('themes.default.input-date-range.font', 'font');
        Config::set('themes.default.input-date-range.other', 'other');
        Config::set('themes.default.input-date-range.padding', 'padding');
        Config::set('themes.default.input-date-range.rounded', 'rounded');
        Config::set('themes.default.input-date-range.shadow', 'shadow');
        Config::set('themes.default.input-date-range.width', 'width');

        Config::set('themes.default.input-date-range.icon-background', 'icon-background');
        Config::set('themes.default.input-date-range.icon-border', 'icon-border');
        Config::set('themes.default.input-date-range.icon-color', 'icon-color');
        Config::set('themes.default.input-date-range.icon-font', 'icon-font');
        Config::set('themes.default.input-date-range.icon-other', 'icon-other');
        Config::set('themes.default.input-date-range.icon-padding', 'icon-padding');
        Config::set('themes.default.input-date-range.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-date-range.icon-shadow', 'icon-shadow');

        Config::set('themes.default.input-date-range.week-numbers', false);
        Config::set('themes.default.input-date-range.format', 'd/m/Y');
        Config::set('themes.default.input-date-range.data', 'Y-m-d');
        Config::set('themes.default.input-date-range.icon', 'icon-calendar');
        Config::set('themes.default.input-date-range.separator', '#');
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_array_options(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => [ 1 => 'A', 2 => 'B' ],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" x-effect="fields['name'].toggle = fields['name'].selected !== null && fields['name'].selected !== fields['name'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <div x-cloak x-data="Components.inputSelect({ id: 'id', value: null })" x-init="init()" x-modelable="value" class="button-width relative" x-model="fields['name'].selected">
                    <input type="hidden" name="name" id="id" x-model="value" x-on:change="onValueChange()" />
                    <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                        <div class="flex items-center min-w-0">
                            <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                            <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                        </div>
                        <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                            <span x-show="!open">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </span>
                                <span x-show="open">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-id" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="A" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                        <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">A</span> </div>
                                        <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                            <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="B" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">B</span> </div>
                                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_component_throws_exception_for_unrecognized_type(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Filter type not recognized');

        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'invalid',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => [],
            ]" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_no_options_key(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" x-effect="fields['name'].toggle = fields['name'].selected !== null && fields['name'].selected !== fields['name'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <div x-cloak x-data="Components.inputSelect({ id: 'id', value: null })" x-init="init()" x-modelable="value" class="button-width relative" x-model="fields['name'].selected">
                    <input type="hidden" name="name" id="id" x-model="value" x-on:change="onValueChange()" />
                    <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                        <div class="flex items-center min-w-0">
                            <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                            <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                        </div>
                        <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                            <span x-show="!open">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </span>
                                <span x-show="open">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-id" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                            </svg>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_collection_options(): void
    {
        $collection = new EloquentCollection([
            ['value' => '1', 'label' => 'Alpha'],
            ['value' => '2', 'label' => 'Beta'],
        ]);

        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => $collection,
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" x-effect="fields['name'].toggle = fields['name'].selected !== null && fields['name'].selected !== fields['name'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <div x-cloak x-data="Components.inputSelect({ id: 'id', value: null })" x-init="init()" x-modelable="value" class="button-width relative" x-model="fields['name'].selected">
                    <input type="hidden" name="name" id="id" x-model="value" x-on:change="onValueChange()" />
                    <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                        <div class="flex items-center min-w-0">
                            <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                            <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                        </div>
                        <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                            <span x-show="!open">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </span>
                                <span x-show="open">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-id" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Alpha" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                        <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">Alpha</span> </div>
                                        <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                            <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Beta" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Beta</span> </div>
                                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
            HTML;

        $this->assertComponentRenders($expected, $template, ['collection' => $collection]);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_multidimensional_options(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => [
                    ['value' => '1', 'label' => 'Alpha'],
                    ['value' => '2', 'label' => 'Beta'],
                ],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" x-effect="fields['name'].toggle = fields['name'].selected !== null && fields['name'].selected !== fields['name'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <div x-cloak x-data="Components.inputSelect({ id: 'id', value: null })" x-init="init()" x-modelable="value" class="button-width relative" x-model="fields['name'].selected">
                    <input type="hidden" name="name" id="id" x-model="value" x-on:change="onValueChange()" />
                    <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                        <div class="flex items-center min-w-0">
                            <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                            <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                        </div>
                        <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                            <span x-show="!open">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </span>
                                <span x-show="open">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-id" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Alpha" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                        <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">Alpha</span> </div>
                                        <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                            <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Beta" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Beta</span> </div>
                                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_a_width(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => [ 1 => 'A', 2 => 'B' ],
                'width' => 'w-48',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" x-effect="fields['name'].toggle = fields['name'].selected !== null && fields['name'].selected !== fields['name'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <div x-cloak x-data="Components.inputSelect({ id: 'id', value: null })" x-init="init()" x-modelable="value" class="w-48 relative" x-model="fields['name'].selected">
                    <input type="hidden" name="name" id="id" x-model="value" x-on:change="onValueChange()" />
                    <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow w-48" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                        <div class="flex items-center min-w-0">
                            <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                            <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                        </div>
                        <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                            <span x-show="!open">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </span>
                                <span x-show="open">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-id" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="A" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                        <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">A</span> </div>
                                        <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                            <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="B" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">B</span> </div>
                                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_a_custom_please_select(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => [ 1 => 'A', 2 => 'B' ],
                'please-select' => 'All Items',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" x-effect="fields['name'].toggle = fields['name'].selected !== null && fields['name'].selected !== fields['name'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <div x-cloak x-data="Components.inputSelect({ id: 'id', value: null })" x-init="init()" x-modelable="value" class="button-width relative" x-model="fields['name'].selected">
                    <input type="hidden" name="name" id="id" x-model="value" x-on:change="onValueChange()" />
                    <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                        <div class="flex items-center min-w-0">
                            <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                            <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                        </div>
                        <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                            <span x-show="!open">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </span>
                                <span x-show="open">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-id" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="All Items" data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">All Items</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="A" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                        <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">A</span> </div>
                                        <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                            <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="B" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">B</span> </div>
                                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_subtext_options(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'subtext' => 'subtext',
                'options' => [
                    '1' => ['text' => 'Alpha', 'subtext' => 'Sub Alpha'],
                    '2' => ['text' => 'Beta', 'subtext' => 'Sub Beta'],
                ],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" x-effect="fields['name'].toggle = fields['name'].selected !== null && fields['name'].selected !== fields['name'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <div x-cloak x-data="Components.inputSelect({ id: 'id', value: null })" x-init="init()" x-modelable="value" class="button-width relative" x-model="fields['name'].selected">
                    <input type="hidden" name="name" id="id" x-model="value" x-on:change="onValueChange()" />
                    <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                        <div class="flex items-center min-w-0">
                            <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                            <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                        </div>
                        <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                            <span x-show="!open">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </span>
                                <span x-show="open">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </span>
                                </span>
                            </button>
                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-id" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="Sub Alpha" data-text="Alpha" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                        <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">Alpha</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 1, 'subtext-inactive': !(highlightIndex === 1) }">Sub Alpha</span> </div>
                                        <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                            <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="Sub Beta" data-text="Beta" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Beta</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 2, 'subtext-inactive': !(highlightIndex === 2) }">Sub Beta</span> </div>
                                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'text',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange() { fields['name'].toggle = fields['name'].selected !== fields['name'].unset }, toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <input id="id" name="name" type="text" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow input-width text-other" x-model="fields['name'].selected" x-on:change="onChange()" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_text_component_can_be_rendered_with_a_placeholder(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'text',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'placeholder' => 'Search here...',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange() { fields['name'].toggle = fields['name'].selected !== fields['name'].unset }, toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <input id="id" name="name" type="text" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow input-width text-other" placeholder="Search here..." x-model="fields['name'].selected" x-on:change="onChange()" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_text_component_can_be_rendered_with_a_width(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'text',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'width' => 'w-48',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange() { fields['name'].toggle = fields['name'].selected !== fields['name'].unset }, toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <input id="id" name="name" type="text" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow w-48 text-other" x-model="fields['name'].selected" x-on:change="onChange()" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_text_component_can_be_rendered_with_a_placeholder_and_width(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'text',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'placeholder' => 'Search here...',
                'width' => 'w-48',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange() { fields['name'].toggle = fields['name'].selected !== fields['name'].unset }, toggle() { fields['name'].toggle = !fields['name'].toggle fields['name'].selected = fields['name'].unset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <input id="id" name="name" type="text" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow w-48 text-other" placeholder="Search here..." x-model="fields['name'].selected" x-on:change="onChange()" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_toggle_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'toggle',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { if (fields['name'].toggle) { fields['name'].toggle = false fields['name'].selected = fields['name'].unset } else { fields['name'].toggle = true fields['name'].selected = '1' } } }" x-effect="fields['name'].toggle = fields['name'].selected === '1'" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['name'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer whitespace-nowrap">label</label>
                </div>
                <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="background border other padding shadow" x-model="fields['name'].selected">
                    <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                    <input type="hidden" name="name" id="id" value="0" x-model="value" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_autocomplete_component_can_be_rendered_with_a_width(): void
    {
        Config::set('autocompletes', ['test-filter-ac' => TestFilterAutoComplete::class]);

        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'country',
                'name' => 'country',
                'type' => 'autocomplete',
                'selected' => null,
                'unset' => '',
                'label' => 'Country',
                'width' => 'w-48',
                'options' => ['autocomplete' => 'test-filter-ac'],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { if (fields['country'].toggle) { fields['country'].selected = fields['country'].unset } } }" x-effect="fields['country'].toggle = fields['country'].selected !== null && fields['country'].selected !== fields['country'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="country_toggle" type="checkbox" id="country_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['country'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="country_toggle" class="cursor-pointer whitespace-nowrap">Country</label>
                </div>
                <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=search&type=test-filter-ac&term=__term__&limit=__limit__","lookup_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=lookup&type=test-filter-ac&value=__id__","id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, preload: [], focusLoad: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, })' x-cloak x-modelable="value" x-init='setup( [], [] )' class="ac-background ac-border ac-color ac-font ac-other ac-padding ac-rounded ac-shadow w-48" x-model="fields['country'].selected">
                    <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                        <input name="country_search" type="text" id="country_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" autocapitalize="off" class="ac-input-background ac-input-border ac-input-color ac-input-font ac-input-other ac-input-padding ac-input-rounded ac-input-shadow" x-model="fields['country'].selected" />
                        <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                            </svg>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </div>
                                <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type="hidden" name="country" id="country" x-model="value" />
                                <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                    <div x-show="options !== null">
                                        <template x-for="(option, index) in options" :key="index">
                                            <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                                <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                    <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                    <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                        <span x-text="option.text"></span>
                                                        <div x-show="option.subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.subtext"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <div x-show="noResults">
                                        <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                    </div>
                                    <div x-show="isAjax && options === null">
                                        <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                        <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_autocomplete_component_can_be_rendered_without_focus(): void
    {
        Config::set('autocompletes', ['test-filter-ac' => TestFilterAutoComplete::class]);

        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'country',
                'name' => 'country',
                'type' => 'autocomplete',
                'selected' => null,
                'unset' => '',
                'label' => 'Country',
                'options' => ['autocomplete' => 'test-filter-ac'],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { if (fields['country'].toggle) { fields['country'].selected = fields['country'].unset } } }" x-effect="fields['country'].toggle = fields['country'].selected !== null && fields['country'].selected !== fields['country'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="country_toggle" type="checkbox" id="country_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['country'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="country_toggle" class="cursor-pointer whitespace-nowrap">Country</label>
                </div>
                <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=search&type=test-filter-ac&term=__term__&limit=__limit__","lookup_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=lookup&type=test-filter-ac&value=__id__","id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, preload: [], focusLoad: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, })' x-cloak x-modelable="value" x-init='setup( [], [] )' class="ac-background ac-border ac-color ac-font ac-other ac-padding ac-rounded ac-shadow ac-width" x-model="fields['country'].selected">
                    <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                        <input name="country_search" type="text" id="country_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" autocapitalize="off" class="ac-input-background ac-input-border ac-input-color ac-input-font ac-input-other ac-input-padding ac-input-rounded ac-input-shadow" x-model="fields['country'].selected" />
                        <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                            </svg>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </div>
                                <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type="hidden" name="country" id="country" x-model="value" />
                                <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                    <div x-show="options !== null">
                                        <template x-for="(option, index) in options" :key="index">
                                            <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                                <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                    <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                    <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                        <span x-text="option.text"></span>
                                                        <div x-show="option.subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.subtext"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <div x-show="noResults">
                                        <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                    </div>
                                    <div x-show="isAjax && options === null">
                                        <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                        <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_autocomplete_component_can_be_rendered_with_focus(): void
    {
        Config::set('autocompletes', ['test-filter-ac' => TestFilterAutoComplete::class]);

        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'country',
                'name' => 'country',
                'type' => 'autocomplete',
                'selected' => null,
                'unset' => '',
                'label' => 'Country',
                'options' => ['autocomplete' => 'test-filter-ac', 'focus' => true],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { if (fields['country'].toggle) { fields['country'].selected = fields['country'].unset } } }" x-effect="fields['country'].toggle = fields['country'].selected !== null && fields['country'].selected !== fields['country'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="country_toggle" type="checkbox" id="country_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['country'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="country_toggle" class="cursor-pointer whitespace-nowrap">Country</label>
                </div>
                <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=search&type=test-filter-ac&term=__term__&limit=__limit__","lookup_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=lookup&type=test-filter-ac&value=__id__","id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, preload: [], focusLoad: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, })' x-cloak x-modelable="value" x-init='setup( [], [{"id":1,"text":"Preloaded Option","subtext":null,"image":null}] )' class="ac-background ac-border ac-color ac-font ac-other ac-padding ac-rounded ac-shadow ac-width" x-model="fields['country'].selected">
                    <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                        <input name="country_search" type="text" id="country_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" autocapitalize="off" class="ac-input-background ac-input-border ac-input-color ac-input-font ac-input-other ac-input-padding ac-input-rounded ac-input-shadow" x-model="fields['country'].selected" />
                        <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                            </svg>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                    </svg>
                                </div>
                                <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type="hidden" name="country" id="country" x-model="value" />
                                <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                    <div x-show="options !== null">
                                        <template x-for="(option, index) in options" :key="index">
                                            <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                                <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                    <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                    <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                        <span x-text="option.text"></span>
                                                        <div x-show="option.subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.subtext"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <div x-show="noResults">
                                        <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                    </div>
                                    <div x-show="isAjax && options === null">
                                        <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                        <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_date_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'created_at',
                'name' => 'created_at',
                'type' => 'date',
                'selected' => null,
                'unset' => '',
                'label' => 'Created At',
                'icon' => 'none',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { if (fields['created_at'].toggle) { fields['created_at'].selected = fields['created_at'].unset } } }" x-effect="fields['created_at'].toggle = fields['created_at'].selected !== null && fields['created_at'].selected !== fields['created_at'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="created_at_toggle" type="checkbox" id="created_at_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['created_at'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="created_at_toggle" class="cursor-pointer whitespace-nowrap">Created At</label>
                </div>
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-model="fields['created_at'].selected" x-data="Components.flatpickr({ mode: 'single', id: 'created_at', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                    <input x-ref="display" type="text" id="created_at_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                    <input name="created_at" x-ref="data" x-model="data" type="hidden" id="created_at" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_date_range_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'date_range',
                'name' => 'date_range',
                'type' => 'date-range',
                'selected' => null,
                'unset' => '',
                'label' => 'Date Range',
                'icon' => 'none',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { if (fields['date_range'].toggle) { fields['date_range'].selected = fields['date_range'].unset } } }" x-effect="fields['date_range'].toggle = fields['date_range'].selected !== null && fields['date_range'].selected !== fields['date_range'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="date_range_toggle" type="checkbox" id="date_range_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['date_range'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="date_range_toggle" class="cursor-pointer whitespace-nowrap">Date Range</label>
                </div>
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-model="fields['date_range'].selected" x-data="Components.flatpickr({ mode: 'range', id: 'date_range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                    <input x-ref="display" type="text" id="date_range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                    <input name="date_range" x-ref="data" x-model="data" type="hidden" id="date_range" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_date_component_can_be_rendered_with_a_width(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'created_at',
                'name' => 'created_at',
                'type' => 'date',
                'selected' => null,
                'unset' => '',
                'label' => 'Created At',
                'icon' => 'none',
                'width' => 'w-48',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { if (fields['created_at'].toggle) { fields['created_at'].selected = fields['created_at'].unset } } }" x-effect="fields['created_at'].toggle = fields['created_at'].selected !== null && fields['created_at'].selected !== fields['created_at'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="created_at_toggle" type="checkbox" id="created_at_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['created_at'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="created_at_toggle" class="cursor-pointer whitespace-nowrap">Created At</label>
                </div>
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow w-48" x-model="fields['created_at'].selected" x-data="Components.flatpickr({ mode: 'single', id: 'created_at', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                    <input x-ref="display" type="text" id="created_at_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                    <input name="created_at" x-ref="data" x-model="data" type="hidden" id="created_at" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_date_range_component_can_be_rendered_with_a_width(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'date_range',
                'name' => 'date_range',
                'type' => 'date-range',
                'selected' => null,
                'unset' => '',
                'label' => 'Date Range',
                'icon' => 'none',
                'width' => 'w-48',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ toggle() { if (fields['date_range'].toggle) { fields['date_range'].selected = fields['date_range'].unset } } }" x-effect="fields['date_range'].toggle = fields['date_range'].selected !== null && fields['date_range'].selected !== fields['date_range'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex shrink-0 space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="date_range_toggle" type="checkbox" id="date_range_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['date_range'].toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="date_range_toggle" class="cursor-pointer whitespace-nowrap">Date Range</label>
                </div>
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow w-48" x-model="fields['date_range'].selected" x-data="Components.flatpickr({ mode: 'range', id: 'date_range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                    <input x-ref="display" type="text" id="date_range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                    <input name="date_range" x-ref="data" x-model="data" type="hidden" id="date_range" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}

class TestFilterAutoComplete extends \ControlUIKit\AutoComplete
{
    public int $min = 2;
    public int $limit = 20;
    public bool $focus = false;
    public bool $preload = false;

    public function count(): int
    {
        return 0;
    }

    public function focus(int $limit): array
    {
        return [['id' => 1, 'text' => 'Preloaded Option', 'subtext' => null, 'image' => null]];
    }

    public function lookup(int $id): ?object
    {
        return null;
    }

    public function preload(): array
    {
        return [];
    }

    public function search(string $term, int $limit): array
    {
        return [];
    }
}
