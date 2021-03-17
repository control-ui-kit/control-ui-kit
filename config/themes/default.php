<?php

return [

    'button' => [

        'primary-button' => 'default',

        'background' => '',
        'border' => '',
        'color' => '',
        'cursor' => 'cursor-pointer',
        'disabled' => 'opacity-60 cursor-default',
        'font' => '',
        'icon-size' => 'w-5 h-5',
        'other' => 'w-max h-9 flex items-center justify-center group outline-none focus:outline-none',
        'padding' => 'space-x-1 px-2 py-1.5',
        'rounded' => 'rounded-md',
        'shadow' => '',

        'default' => [
            'background' => 'bg-button-default hover:bg-button-default-hover',
            'border' => 'border border-button-default hover:border-button-default-hover',
            'color' => 'text-button-default hover:text-button-default-hover',
            'icon' => 'text-button-default-icon group-hover:text-button-default-icon-hover',
        ],

        'brand' => [
            'background' => 'bg-button-brand hover:bg-button-brand-hover',
            'border' => 'border border-button-brand hover:border-button-brand-hover',
            'color' => 'text-button-brand hover:text-button-brand-hover',
            'icon' => 'text-button-brand-icon group-hover:text-button-brand-icon-hover',
        ],

        'danger' => [
            'background' => 'bg-button-danger hover:bg-button-danger-hover',
            'border' => 'border border-button-danger hover:border-button-danger-hover',
            'color' => 'text-button-danger hover:text-button-danger-hover',
            'icon' => 'text-button-danger-icon group-hover:text-button-danger-icon-hover',
        ],

        'info' => [
            'background' => 'bg-button-info hover:bg-button-info-hover',
            'border' => 'border border-button-info hover:border-button-info-hover',
            'color' => 'text-button-info hover:text-button-info-hover',
            'icon' => 'text-button-info-icon group-hover:text-button-info-icon-hover',
        ],

        'link' => [
            'background' => 'bg-button-link hover:bg-button-link-hover',
            'border' => 'border border-button-link hover:border-button-link-hover',
            'color' => 'text-button-link hover:text-button-link-hover hover:underline',
            'icon' => 'text-button-link-icon group-hover:text-button-link-icon-hover',
        ],

        'success' => [
            'background' => 'bg-button-success hover:bg-button-success-hover',
            'border' => 'border border-button-success hover:border-button-success-hover',
            'color' => 'text-button-success hover:text-button-success-hover',
            'icon' => 'text-button-success-icon group-hover:text-button-success-icon-hover',
        ],

        'muted' => [
            'background' => 'bg-button-muted hover:bg-button-muted-hover',
            'border' => 'border border-button-muted hover:border-button-muted-hover',
            'color' => 'text-button-muted hover:text-button-muted-hover',
            'icon' => 'text-button-muted-icon group-hover:text-button-muted-icon-hover',
        ],

        'warning' => [
            'background' => 'bg-button-warning hover:bg-button-warning-hover',
            'border' => 'border border-button-warning hover:border-button-warning-hover',
            'color' => 'text-button-warning hover:text-button-warning-hover',
            'icon' => 'text-button-warning-icon group-hover:text-button-warning-icon-hover',
        ],
    ],

    'input' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => 'w-full',
        'padding' => 'py-1.5 px-3',
        'rounded' => 'rounded',
        'shadow' => '',

        'icon-left-background' => '',
        'icon-left-border' => 'border-r border-input',
        'icon-left-color' => 'text-muted',
        'icon-left-font' => '',
        'icon-left-size' => 'w-4 h-4',
        'icon-left-other' => 'flex items-center justify-center self-stretch',
        'icon-left-padding' => 'px-3',
        'icon-left-rounded' => '',
        'icon-left-shadow' => '',

        'icon-right-background' => '',
        'icon-right-border' => 'border-l border-input',
        'icon-right-color' => 'text-muted',
        'icon-right-font' => '',
        'icon-right-size' => 'w-4 h-4',
        'icon-right-other' => 'flex items-center justify-center self-stretch',
        'icon-right-padding' => 'px-3',
        'icon-right-rounded' => '',
        'icon-right-shadow' => '',

        'prefix-background' => '',
        'prefix-border' => 'border-r border-input',
        'prefix-color' => 'text-muted',
        'prefix-font' => '',
        'prefix-icon-size' => 'w-4 h-4',
        'prefix-other' => 'flex items-center justify-center self-stretch',
        'prefix-padding' => 'px-3',
        'prefix-rounded' => '',
        'prefix-shadow' => '',

        'suffix-background' => '',
        'suffix-border' => 'border-l border-input',
        'suffix-color' => 'text-muted',
        'suffix-font' => '',
        'suffix-icon-size' => 'w-4 h-4',
        'suffix-other' => 'flex items-center justify-center self-stretch',
        'suffix-padding' => 'px-3',
        'suffix-rounded' => '',
        'suffix-shadow' => '',

        'input-background' => 'bg-transparent',
        'input-border' => 'border-0 focus:outline-none focus:ring-0',
        'input-color' => 'text-input placeholder-input',
        'input-font' => '',
        'input-other' => 'block w-full appearance-none',
        'input-padding' => 'py-1.5 px-3',
        'input-rounded' => 'rounded',
        'input-shadow' => '',

        'wrapper-background' => 'bg-input',
        'wrapper-border' => 'border border-input focus-within:ring-1 focus-within:ring-brand',
        'wrapper-color' => '',
        'wrapper-font' => '',
        'wrapper-other' => 'flex items-center w-full',
        'wrapper-padding' => '',
        'wrapper-rounded' => 'rounded',
        'wrapper-shadow' => '',

        // Config
        'decimals' => '',
        'decimals-fixed' => false,
        'default' => '',
        'icon-left' => '',
        'icon-right' => '',
        'max' => null,
        'min' => null,
        'onblur' => '',
        'onchange' => '',
        'prefix-text' => '',
        'step' => null,
        'suffix-text' => '',
        'type' => 'text',
    ],

    'input-checkbox' => [
        'background' => 'bg-input',
        'border' => 'focus:ring-brand border-input',
        'color' => '',
        'font' => 'text-brand',
        'other' => 'h-4 w-4 cursor-pointer',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
    ],

    'input-currency' => [
        'decimals' => 2,
        'decimals-fixed' => true,
        'default' => '0.00',
        'font' => 'text-right',
        'input-font' => 'text-right',
        'onblur' => '_controlNumber(this, {{ $decimals }}, {{ $min }}, {{ $max }}, {{ $fixed }})',
        'prefix-text' => '£',
        'type' => 'number',
    ],

    'input-date' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',

        // Config
        'first-day' => "1",
        'format' => 'DD/MM/YYYY',
        'icon' => 'icon.calendar',
        'keyboard-navigation' => 'true',
        'lang' => 'en-GB',
        'mobile-friendly' => 'true',
        'reset' => 'false',
    ],

    'input-date-range' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => 'w-64',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',

        // Config
        'first-day' => "1",
        'format' => 'DD/MM/YYYY',
        'icon' => 'icon.calendar',
        'keyboard-navigation' => 'true',
        'lang' => 'en-GB',
        'mobile-friendly' => 'true',
        'predefined-ranges' => 'false',
        'reset' => 'false',
        'split' => 'true',
        'tooltip' => 'false',
    ],

    'input-decimal' => [
        'decimals' => 2,
        'default' => 0,
        'font' => 'text-right',
        'input-font' => 'text-right',
        'onblur' => '_controlNumber(this, {{ $decimals }}, {{ $min }}, {{ $max }}, {{ $fixed }})',
        'type' => 'number',
    ],

    'input-email' => [
        'type' => 'email',
    ],

    'input-number' => [
        'default' => 0,
        'font' => 'text-right',
        'input-font' => 'text-right',
        'onblur' => '_controlNumber(this, {{ $decimals }}, {{ $min }}, {{ $max }}, {{ $fixed }})',
        'step' => 1,
        'type' => 'number',
    ],

    'input-password' => [
        'type' => 'password',
    ],

    'input-percent' => [
        'default' => 0,
        'font' => 'text-right',
        'input-font' => 'text-right',
        'icon-right' => 'icon.percent',
        'onblur' => '_controlNumber(this, {{ $decimals }}, {{ $min }}, {{ $max }}, {{ $fixed }})',
        'max' => 100,
        'min' => 0,
        'step' => 1,
        'type' => 'number',
    ],

    'input-text' => [
        'type' => 'text',
    ],

    'input-textarea' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-radio' => [
        'background' => 'bg-input',
        'border' => 'focus:ring-brand border-input',
        'color' => '',
        'font' => 'text-brand',
        'other' => 'h-4 w-4 cursor-pointer',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
    ],

    'input-range' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',

        'min' => '1',
        'max' => '100',
    ],

    'input-search' => [
        'icon-left' => 'icon.search',
        'icon-left-border' => 'border-0',
        'icon-left-padding' => 'pl-3 pr-0',
        'type' => 'search',
    ],

    'input-select' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => '',
        'font' => 'text-input',
        'other' => 'inline-block',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',

        // Config
        'type' => 'select',
        'please-select-text' => 'Please Select ...',
        'selected-icon' => 'icon.check',
        'selected-icon-size' => 'w-5 h-5',

        'text-name' => 'text',
        'subtext' => false,
        'image' => false,
        'image-default' => 'https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg',

        'icon-right-icon' => 'icon.chevron-down',
        'icon-right-background' => '',
        'icon-right-border' => 'border-l border-input',
        'icon-right-color' => 'text-muted',
        'icon-right-font' => '',
        'icon-right-size' => 'w-4 h-4',
        'icon-right-other' => 'absolute',
        'icon-right-padding' => 'ml-3 px-3 inset-y-0 right-0 flex items-center pr-2 pointer-events-none',
        'icon-right-rounded' => '',
        'icon-right-shadow' => '',

    ],

    'input-toggle' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => 'w-20',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
    ],

    'input-color-picker' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => '',
        'font' => 'text-md text-input',
        'other' => 'w-40 relative',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'layout-body' => [
        'background' => 'bg-app',
        'border' => '',
        'color' => 'text-default',
        'font' => '',
        'other' => 'branding theme',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
        'theme' => 'light',
    ],

    'layout-content' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => '',
        'padding' => 'sm:p-6',
        'rounded' => '',
        'shadow' => '',
    ],

    'layout-header' => [
        'background' => 'bg-header',
        'border' => 'border border-header',
        'color' => 'text-header',
        'font' => '',
        'other' => '',
        'padding' => 'py-6',
        'rounded' => '',
        'shadow' => '',
    ],

    'layout-footer' => [
        'background' => 'bg-footer',
        'border' => 'border border-footer',
        'color' => 'text-footer',
        'font' => '',
        'other' => '',
        'padding' => 'py-6',
        'rounded' => '',
        'shadow' => '',
    ],

    'layout-toolbar' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => '',
        'padding' => 'py-6',
        'rounded' => '',
        'shadow' => '',
    ],

    'icon' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => 'inline-block',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
        'size' => 'w-5 h-5',
    ],

    'panel' => [
        'background' => 'bg-panel',
        'border' => 'border border-panel',
        'color' => 'text-panel',
        'font' => '',
        'other' => '',
        'padding' => 'p-6',
        'rounded' => 'rounded',
        'shadow' => 'shadow',
        'stacked' => 'flex flex-col space-y-2'
    ],

    'panel-divider' => [
        'border' => 'border-b border-panel-divider',
    ],

    'panel-heading' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => 'font-semibold text-lg',
        'other' => 'w-full',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
    ],

    'pill' => [

        // Style
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => 'text-xs font-medium leading-4 capitalize',
        'other' => 'inline-flex items-center w-max',
        'padding' => 'px-2.5 py-0.5 ',
        'rounded' => 'rounded-full',
        'shadow' => '',

        'default' => [
            'background' => 'bg-gray-200',
            'color' => 'text-gray-800',
        ],

        'brand' => [
            'background' => 'bg-alert-brand',
            'color' => 'text-alert-brand',
        ],

        'danger' => [
            'background' => 'bg-alert-danger',
            'color' => 'text-alert-danger',
        ],

        'info' => [
            'background' => 'bg-alert-info',
            'color' => 'text-alert-info',
        ],

        'muted' => [
            'background' => 'bg-alert-muted',
            'color' => 'text-alert-muted',
        ],

        'success' => [
            'background' => 'bg-alert-success',
            'color' => 'text-alert-success',
        ],

        'warning' => [
            'background' => 'bg-alert-warning',
            'color' => 'text-alert-warning',
        ],
    ],

    'table' => [
        'background' => '',
        'body-styles' => 'divide-y table-divider bg-table',
        'border' => 'border-0 border-table',
        'color' => '',
        'font' => 'text-left',
        'heading-styles' => 'items-center uppercase bg-table-header border-b border-table-divider',
        'other' => 'align-middle min-w-full overflow-x-auto overflow-hidden table-fixed data-table',
        'padding' => '',
        'rounded' => 'sm:rounded',
        'shadow' => 'shadow',
    ],

    'table-cell' => [
        'align' => 'text-left',
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => 'whitespace-no-wrap leading-5',
        'padding' => 'px-2 py-2',
        'rounded' => '',
        'shadow' => '',
    ],

    'table-empty' => [

        // Style
        'background' => '',
        'border' => '',
        'color' => '',
        'colspan' => '100%',
        'font' => 'font-medium',
        'icon-size' => 'w-5 h-5',
        'icon-style' => '',
        'other' => 'flex justify-center items-center',
        'padding' => 'space-x-2 py-8',
        'rounded' => '',
        'shadow' => '',
        'stacked' => 'flex flex-col space-y-2 items-center',

        // Config
        'default-text' => 'No records found',
    ],

//    'table-filter' => [
//        'background' => '',
//        'border' => '',
//        'color' => '',
//        'font' => '',
//        'other' => '',
//        'padding' => '',
//        'rounded' => '',
//    ],

    'table-heading' => [

        // Style
        'align' => 'text-left',
        'background' => '',
        'border' => '',
        'color' => 'text-table-header',
        'font' => 'leading-4 font-medium uppercase tracking-wider',
        'icon-size' => 'w-5 h-5',
        'other' => '',
        'padding' => 'px-2 py-2',
        'rounded' => '',
        'shadow' => '',
        'sort-link' => 'flex items-center space-x-1 group focus:outline-none focus:underline',

        // Config
        'field-order' => 'order',
        'field-sort' => 'sort',
        'icon-asc' => 'icon.caret-up',
        'icon-desc' => 'icon.caret-down',
    ],

    'table-row' => [

        'background' => '',
        'border' => '',
        'color' => 'text-default hover:text-default',
        'font' => '',
        'other' => '',
        'padding' => 'px-3 py-2',
        'rounded' => '',
        'shadow' => '',

        'default' => [
            'background' => 'bg-table-row-1 even:bg-table-row-2 hover:bg-table-row-hover even:bg-table-hover',
            'color' => '',
        ],

        'brand' => [
            'background' => 'bg-alert-brand hover:bg-alert-brand-hover',
            'color' => '',
        ],

        'danger' => [
            'background' => 'bg-alert-danger hover:bg-alert-danger-hover',
            'color' => '',
        ],

        'info' => [
            'background' => 'bg-alert-info hover:bg-alert-info-hover',
            'color' => '',
        ],

        'muted' => [
            'background' => 'bg-alert-muted hover:bg-alert-muted-hover',
            'color' => 'text-alert-muted hover:text-alert-muted',
        ],

        'success' => [
            'background' => 'bg-alert-success hover:bg-alert-success-hover',
            'color' => '',
        ],

        'warning' => [
            'background' => 'bg-alert-warning hover:bg-alert-warning-hover',
            'color' => '',
        ],
    ],

    'tabs' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => '',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
        'spacing' => 'space-x-6',
    ],

    'tabs-heading' => [
        'active' => 'border-brand cursor-default',
        'background' => '',
        'border' => 'border-b-2',
        'color' => '',
        'font' => 'font-medium',
        'icon-size' => 'w-4 h-4',
        'inactive' => 'border-transparent hover:text-gray-700 hover:border-gray-300',
        'other' => '',
        'padding' => 'flex items-center space-x-2 py-1.5',
        'rounded' => '',
        'shadow' => '',
    ],

    'tabs-panel' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => '',
        'padding' => 'py-6',
        'rounded' => '',
        'shadow' => '',
    ],

    'title' => [
        'background' => '',
        'border' => '',
        'color' => 'text-panel-header',
        'font' => 'font-medium text-xl',
        'other' => '',
        'padding' => 'py-3',
        'rounded' => '',
        'shadow' => '',
    ],
];
