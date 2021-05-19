<?php

return [

    'alert' => [

        'default-alert' => 'default',

        'background' => '',
        'border' => 'border',
        'other' => '',
        'padding' => 'p-4',
        'rounded' => 'rounded-md',
        'shadow' => '',
        'width' => 'w-full',

        'text-color' => '',
        'text-font' => '',
        'text-size' => 'text-sm',
        'text-other' => 'mt-2',

        'title-color' => '',
        'title-font' => 'font-medium',
        'title-size' => 'text-sm',
        'title-other' => '',

        'icon' => '',
        'icon-color' => '',
        'icon-size' => 'w-5 h-5',

        'default' => [
            'background' => 'bg-alert-default',
            'border' => 'border-alert-default',
            'icon' => 'icon.question',
            'icon-color' => 'text-alert-default-icon',
            'title-color' => 'text-alert-default-title',
            'text-color' => 'text-alert-default-text',
        ],

        'brand' => [
            'background' => 'bg-alert-brand',
            'border' => 'border-alert-brand',
            'icon' => 'icon.question',
            'icon-color' => 'text-alert-brand-icon',
            'title-color' => 'text-alert-brand-title',
            'text-color' => 'text-alert-brand-text',
        ],

        'danger' => [
            'background' => 'bg-alert-danger',
            'border' => 'border-alert-danger',
            'icon' => 'icon.shield-cross',
            'icon-color' => 'text-alert-danger-icon',
            'title-color' => 'text-alert-danger-title',
            'text-color' => 'text-alert-danger-text',
        ],

        'info' => [
            'background' => 'bg-alert-info',
            'border' => 'border-alert-info',
            'icon' => 'icon.info-circle',
            'icon-color' => 'text-alert-info-icon',
            'title-color' => 'text-alert-info-title',
            'text-color' => 'text-alert-info-text',
        ],

        'success' => [
            'background' => 'bg-alert-success',
            'border' => 'border-alert-success',
            'icon' => 'icon.status-success',
            'icon-color' => 'text-alert-success-icon',
            'title-color' => 'text-alert-success-title',
            'text-color' => 'text-alert-success-text',
        ],

        'muted' => [
            'background' => 'bg-alert-muted',
            'border' => 'border-alert-muted',
            'icon' => 'icon.question',
            'icon-color' => 'text-alert-muted-icon',
            'title-color' => 'text-alert-muted-title',
            'text-color' => 'text-alert-muted-text',
        ],

        'warning' => [
            'background' => 'bg-alert-warning',
            'border' => 'border-alert-warning',
            'icon' => 'icon.warning',
            'icon-color' => 'text-alert-warning-icon',
            'title-color' => 'text-alert-warning-title',
            'text-color' => 'text-alert-warning-text',
        ],
    ],

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

    'matrix' => [
        'color' => 'green',
        'format' => 'LL',
        'axes' => [
            'x' => [
                'label' => [
                    'visible' => "true",
                    'position' => 'bottom'
                ],
                'margin' => "1"
            ],
            'y' => [
                'label' => [
                    'visible' => "true",
                    'position' => 'left'
                ],
                'margin' => "1",
                'reverse' => 'true'
            ]
        ]
    ],

    'charts' => [
        'defaults' => [
            'axes' => [
                'x' => [
                    'label' => 'Date',
                    'ticks' => [
                        'display' => 'true',
                        'color' => '#666',
                        'family' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                        'size' => 12,
                        'style' => 'normal',
                        'height' => 1.2,
                        'reverse' => 'false',
                        'padding' => 0,
                        'z-index' => 0
                    ]
                ],
                'y' => [
                    'label' => 'Value',
                    'ticks' => [
                        'display' => 'true',
                        'color' => '#666',
                        'family' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                        'size' => 12,
                        'style' => 'normal',
                        'height' => 1.2,
                        'reverse' => 'false',
                        'padding' => 0,
                        'z-index' => 0
                    ]
                ]
            ],
            'legend' => [
                'display' => 'true',
                'position' => 'left',
                'align' => 'center',
                'fullWidth' => 'true',
                'reverse' => 'false',
                'label' => [
                    'boxWidth' => 40,
                    'fontSize' => 12,
                    'fontStyle' => 'normal',
                    'fontColor' => '#666',
                    'fontFamily' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    'padding' => 10
                ]
            ],
            'title' => [
                'display' => false,
                'position' => 'top',
                'size' => 12,
                'family' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                'color' => '#666',
                'style' => 'bold',
                'padding' => 10,
                'height' => '1.2',
            ],
            'colors' => [
                '#e6194b',
                '#3cb44b',
                '#ffe119',
                '#4363d8',
                '#f58231',
                '#911eb4',
                '#46f0f0',
                '#f032e6',
                '#bcf60c',
                '#fabebe',
                '#008080',
                '#e6beff',
            ],
            'point' => [
                'style' => 'circle',
                'radius' => 3,
                'hoverRadius' => 4
            ],
            'tooltips' => [
                'enabled' => true,
                'mode' => 'nearest',
                'intersect' => true,
                'position' => 'average',
                'background-color' => 'rgba(0, 0, 0, 0.8)',
                'x-padding' => 6,
                'y-padding' => 6,
                'caret-padding' => 2,
                'caret-size' => 5,
                'corner-radius' => 6,
                'multikey-background' => '#fff',
                'display-colors' => true,
                'border-color' => 'rgba(0, 0, 0, 0)',
                'border-width' => 0,
                'rtl' => false,

                'title-family' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                'title-size' => 12,
                'title-style' => 'bold',
                'title-color' => '#fff',
                'title-align' => 'left',
                'title-spacing' => 2,
                'title-margin-bottom' => 6,

                'body-family' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                'body-size' => 12,
                'body-style' => 'normal',
                'body-color' => '#fff',
                'body-align' => 'left',
                'body-spacing' => 2,

                'footer-family' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                'footer-size' => 12,
                'footer-style' => 'bold',
                'footer-color' => '#fff',
                'footer-align' => 'left',
                'footer-spacing' => 2,
                'footer-margin-top' => 6,
            ],
            'dashed' => [5, 5],
            'hide-grid' => 'false',
            'hide-axis' => 'false',
            'background-color' => 'rgba(0, 0, 0, 0.1)',
            'grid-color' => 'rgba(0, 0, 0, 0.1)'
        ]
    ],

    'dropdown-menu' => [
        'background' => 'bg-nav-option',
        'border' => 'border border-nav',
        'color' => '',
        'font' => '',
        'other' => 'absolute flex flex-col z-50',
        'padding' => '',
        'rounded' => 'rounded',
        'shadow' => 'shadow-md',
        'width' => '',
    ],

    'error' => [
        'color' => 'text-error',
        'font' => '',
        'other' => '',
        'padding' => 'pt-1.5',
    ],

    'input' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'py-1.5 px-3',
        'rounded' => 'rounded',
        'shadow' => '',
        'width' => 'w-full',

        'icon-left-background' => '',
        'icon-left-border' => 'border-r border-input',
        'icon-left-color' => 'text-muted',
        'icon-left-size' => 'w-4 h-4',
        'icon-left-other' => 'flex items-center justify-center self-stretch',
        'icon-left-padding' => 'px-3',
        'icon-left-rounded' => '',
        'icon-left-shadow' => '',

        'icon-right-background' => '',
        'icon-right-border' => 'border-l border-input',
        'icon-right-color' => 'text-muted',
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

        'input-background' => 'bg-input',
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
        'wrapper-width' => 'w-full',

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
        'color' => 'text-brand',
        'font' => '',
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
        'prefix-text' => '@',
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
        'icon-left' => 'icon.eye',
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

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',
        'width' => 'w-full',

        //Config
        'rows' => 4,
    ],

    'input-radio' => [
        'background' => 'bg-input',
        'border' => 'focus:ring-brand border-input',
        'color' => 'text-brand',
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
        'button-background' => 'bg-input',
        'button-border' => 'border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand',
        'button-color' => '',
        'button-font' => 'text-input',
        'button-other' => 'flex items-center cursor-pointer',
        'button-padding' => 'space-x-2 py-1.5 px-3',
        'button-rounded' => 'rounded',
        'button-shadow' => '',
        'button-width' => 'w-full',

        'check-background' => '',
        'check-border' => '',
        'check-color' => 'text-brand',
        'check-font' => '',
        'check-other' => 'absolute inset-y-0 right-0 flex items-center',
        'check-padding' => 'pr-4',
        'check-rounded' => '',
        'check-shadow' => '',
        'check-active' => '',
        'check-inactive' => '',
        'check-icon' => 'icon.check',
        'check-icon-size' =>'w-6 h-6',

        'icon' => 'icon.chevron-down',
        'icon-background' => '',
        'icon-border' => 'border-l border-input',
        'icon-color' => '',
        'icon-size' => 'w-4 h-4',
        'icon-other' => 'absolute flex items-center pointer-events-none',
        'icon-padding' => 'ml-3 px-3 inset-y-0 right-0',
        'icon-rounded' => '',
        'icon-shadow' => '',

        'image-border' => '',
        'image-size' => 'h-6 w-auto',
        'image-other' => 'flex-shrink-0',
        'image-padding' => 'pr-2',
        'image-rounded' => '',
        'image-shadow' => '',

        'list-background' => 'bg-input',
        'list-border' => 'border border-input focus:outline-none',
        'list-color' => '',
        'list-font' => '',
        'list-other' => 'absolute mt-1 max-h-60 overflow-auto z-50',
        'list-padding' => 'py-1',
        'list-rounded' => 'rounded',
        'list-shadow' => 'shadow-md',
        'list-width' => 'w-auto',

        'option-background' => '',
        'option-border' => '',
        'option-color' => '',
        'option-font' => '',
        'option-other' => 'cursor-pointer select-none relative group',
        'option-padding' => 'py-2 pl-3 pr-9',
        'option-rounded' => '',
        'option-shadow' => '',
        'option-spacing' => '',
        'option-active' => 'bg-input-option-hover',
        'option-inactive' => 'bg-input-option text-input-option',

        'text-background' => '',
        'text-border' => '',
        'text-color' => '',
        'text-font' => 'text-input-option group-hover:text-input-option-hover',
        'text-other' => 'block truncate',
        'text-padding' => '',
        'text-rounded' => '',
        'text-shadow' => '',
        'text-active' => 'font-semibold',
        'text-inactive' => 'font-normal',

        'subtext-background' => '',
        'subtext-border' => '',
        'subtext-color' => 'text-input-option-sub group-hover:text-input-option-sub-hover',
        'subtext-font' => '',
        'subtext-other' => 'block truncate',
        'subtext-padding' => 'pl-2',
        'subtext-rounded' => '',
        'subtext-shadow' => '',
        'subtext-active' => '',
        'subtext-inactive' => '',

        // Config
        'please-select-text' => 'Please Select ...',
        'please-select-value' => null,
        'please-select-trans' => '',

        'image-name' => 'image',
        'subtext-name' => 'subtext',
        'text-name' => 'text',
    ],

    'input-toggle' => [
        'background' => '',
        'border' => '',
        'other' => '',
        'padding' => '',
        'shadow' => '',

        'base-animation' => 'ease-in-out duration-200 transition-colors',
        'base-background' => '',
        'base-border' => 'border-2 border-transparent',
        'base-color' => '',
        'base-focus' => 'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand focus:ring-offset-input',
        'base-other' => 'inline-flex flex-shrink-0 cursor-pointer ',
        'base-rounded' => 'rounded-full',
        'base-shadow' => '',
        'base-size' => 'h-6 w-11',
        'base-state-off' => 'bg-input-muted',
        'base-state-on' => 'bg-input-brand',

        'switch-animation' => 'translate-x-0 transform transition ease-in-out duration-200',
        'switch-background' => 'bg-input',
        'switch-border' => '',
        'switch-color' => '',
        'switch-focus' => 'ring-0',
        'switch-other' => 'pointer-events-none inline-block',
        'switch-rounded' => 'rounded-full',
        'switch-shadow' => 'shadow',
        'switch-size' => 'h-5 w-5',
        'switch-state-off' => 'translate-x-0',
        'switch-state-on' => 'translate-x-5',
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
        'other' => 'flex flex-col space-y-2 sm:space-y-4',
        'padding' => 'p-2 sm:p-4',
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
        'other' => 'inline-block',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
        'size' => 'w-5 h-5',
    ],

    'label' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => '',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
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

        # TODO - test
        'active-filters-list-background' => '',
        'active-filters-list-border' => '',
        'active-filters-list-color' => '',
        'active-filters-list-font' => '',
        'active-filters-list-other' => 'flex flex-row flex-wrap items-center',
        'active-filters-list-padding' => '',
        'active-filters-list-rounded' => '',
        'active-filters-list-shadow' => '',
        'active-filters-list-width' => '',

        # TODO - test
        'active-filters-wrapper-background' => '',
        'active-filters-wrapper-border' => '',
        'active-filters-wrapper-color' => '',
        'active-filters-wrapper-font' => 'text-sm',
        'active-filters-wrapper-other' => 'flex flex-row justify-between',
        'active-filters-wrapper-padding' => '',
        'active-filters-wrapper-rounded' => '',
        'active-filters-wrapper-shadow' => '',
        'active-filters-wrapper-width' => 'min-w-full',

        # TODO - test
        'clear-filters-event' => '',
        'clear-filters-href' => '',
        'clear-filters-text' => 'Clear Filters',
        'clear-filters-background' => '',
        'clear-filters-border' => 'focus:outline-none focus:ring-0',
        'clear-filters-color' => 'text-brand hover:text-brand-lighter focus:text-brand-lightest',
        'clear-filters-font' => '',
        'clear-filters-other' => 'flex-shrink-0 ml-2',
        'clear-filters-padding' => 'pt-0.5',
        'clear-filters-rounded' => '',
        'clear-filters-shadow' => '',

        'more-button-background' => 'bg-table-filters',
        'more-button-border' => 'focus:outline-none focus:ring-0 border border-table-filters focus:border-brand ',
        'more-button-color' => 'text-input',
        'more-button-font' => '',
        'more-button-icon' => 'icon.filter',
        'more-button-icon-size' => 'w-5 h-5',
        'more-button-other' => 'flex items-center flex-shrink-0 cursor-pointer mb-0 sm:mb-4',
        'more-button-padding' => 'h-10 px-2.5',
        'more-button-rounded' => 'rounded',
        'more-button-shadow' => '',
        'more-button-width' => 'w-max',

        'more-filters-background' => '',
        'more-filters-border' => '',
        'more-filters-color' => '',
        'more-filters-font' => '',
        'more-filters-other' => 'grid grid-cols-2 gap-2 sm:gap-0 sm:inline-flex items-center sm:justify-end sm:flex-wrap sm:space-x-0.5',
        'more-filters-padding' => 'mb-2 sm:mb-0',
        'more-filters-rounded' => '',
        'more-filters-shadow' => '',
        'more-filters-width' => 'w-full sm:w-auto',
        'more-filters-wrapper' => 'flex justify-end',

        # TODO - test
        'search-icon-background' => '',
        'search-icon-border' => 'border-0 ',
        'search-icon-color' => 'text-muted',
        'search-icon' => 'icon.search',
        'search-icon-size' => 'w-4 h-4',
        'search-icon-other' => 'flex items-center justify-center self-stretch',
        'search-icon-padding' => 'pl-3 pr-0',
        'search-icon-rounded' => '',
        'search-icon-shadow' => '',

        # TODO - test
        'search-input-background' => 'bg-table-filters',
        'search-input-border' => 'border-0 focus:outline-none focus:ring-0',
        'search-input-color' => 'text-input placeholder-input',
        'search-input-font' => '',
        'search-input-other' => 'block appearance-none',
        'search-input-padding' => 'py-1.5 px-3',
        'search-input-rounded' => '',
        'search-input-shadow' => '',
        'search-input-width' => 'w-full',

        # TODO - test
        'search-wrapper-background' => 'bg-table-filters',
        'search-wrapper-border' => 'border border-input focus-within:border-brand',
        'search-wrapper-color' => '',
        'search-wrapper-font' => '',
        'search-wrapper-other' => 'h-10 flex items-center overflow-hidden',
        'search-wrapper-padding' => '',
        'search-wrapper-rounded' => 'rounded',
        'search-wrapper-shadow' => '',
        'search-wrapper-width' => 'w-full',

        # TODO - test
        'search-enable' => true,
        'search-bar' => 'flex mb-2 sm:mb-0',
        'search-bar-spacing' => 'sm:grid table-grid-filters space-x-2 sm:space-x-4',
        'search-container' => 'w-full sm:flex-shrink-0',
        'search-event' => '',
        'search-id' => 'search',
        'search-type' => 'search',
        'search-form-name' => 'search_form',
        'search-name' => 'search',
        'search-placeholder' => 'Search...',

        'table-background' => '',
        'table-border' => '',
        'table-color' => '',
        'table-font' => 'text-left',
        'table-other' => 'align-middle min-w-full overflow-x-auto data-table',
        'table-padding' => '',
        'table-rounded' => 'sm:rounded',
        'table-shadow' => 'shadow',

        'table-body-background' => 'bg-table',
        'table-body-border' => 'divide-y table-divider',
        'table-body-color' => '',
        'table-body-font' => '',
        'table-body-other' => 'overflow-hidden',
        'table-body-padding' => '',
        'table-body-rounded' => '',
        'table-body-shadow' => '',

        'table-filters-background' => '',
        'table-filters-border' => '',
        'table-filters-color' => '',
        'table-filters-container' => 'flex-grow w-auto flex flex-col sm:items-end',
        'table-filters-empty' => 'hidden sm:block mb-0 sm:mb-4 h-10',
        'table-filters-font' => '',
        'table-filters-other' => 'inline-flex space-x-0.5',
        'table-filters-padding' => '',
        'table-filters-rounded' => 'rounded sm:rounded-r',
        'table-filters-shadow' => '',
        'table-filters-width' => 'w-max',

        'table-headings-background' => 'bg-table-header',
        'table-headings-border' => 'border-table-divider',
        'table-headings-color' => '',
        'table-headings-font' => 'uppercase',
        'table-headings-other' => 'items-center',
        'table-headings-padding' => '',
        'table-headings-rounded' => '',
        'table-headings-shadow' => '',

        'table-wrapper-background' => '',
        'table-wrapper-border' => 'border border-table',
        'table-wrapper-color' => '',
        'table-wrapper-font' => '',
        'table-wrapper-other' => 'overflow-x-auto',
        'table-wrapper-padding' => '',
        'table-wrapper-rounded' => 'rounded',
        'table-wrapper-shadow' => '',
        'table-wrapper-with-filters' => 'mt-0 sm:mt-2',
        'table-wrapper-without-filters' => '',
    ],

    'table-active-filter' => [

        // Style
        'background' => 'bg-active-filter',
        'border' => 'border border-active-filter focus-within:border-brand',
        'color' => 'text-active-filter',
        'font' => 'text-sm',
        'other' => 'flex items-center space-x-1 mr-2 w-max mb-2',
        'padding' => 'px-1.5 py-0.5',
        'rounded' => 'rounded',
        'shadow' => '',

        'icon-background' => '',
        'icon-border' => '',
        'icon-color' => 'text-active-filter-icon hover:text-active-filter-icon-hover',
        'icon-other' => 'cursor-pointer',
        'icon-padding' => '',
        'icon-rounded' => '',
        'icon-shadow' => '',
        'icon-size' => 'w-4 h-4',

        // Config
        'icon' => 'icon.close',
    ],

    'table-cell' => [
        'align' => 'text-left',
        'background' => '',
        'border' => '',
        'color' => '',
        'href-color' => 'text-brand hover:text-brand-darkest',
        'font' => '',
        'other' => 'whitespace-no-wrap leading-5 h-9 align-middle',
        'padding' => 'px-2',
        'rounded' => '',
        'shadow' => '',

        'icon-background' => '',
        'icon-border' => '',
        'icon-color' => '',
        'icon-other' => '',
        'icon-padding' => '',
        'icon-rounded' => '',
        'icon-shadow' => '',
        'icon-size' => 'w-5 h-5',

        'image-border' => '',
        'image-other' => 'flex-shrink-0',
        'image-padding' => 'pr-2',
        'image-rounded' => 'rounded',
        'image-shadow' => '',
        'image-size' => 'h-8 w-auto',
    ],

    'table-empty' => [

        // Style
        'background' => '',
        'border' => '',
        'color' => '',
        'colspan' => '100%',
        'font' => 'text-sm uppercase tracking-wider',
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

    'table-filter' => [

        // Style
        'button-background' => 'bg-table-filters',
        'button-border' => 'focus:outline-none focus:ring-0 w-full border border-table-filters focus:border-brand',
        'button-color' => '',
        'button-font' => 'text-input',
        'button-other' => 'h-10 flex items-center flex-shrink-0 cursor-pointer',
        'button-padding' => 'space-x-2 py-1.5 px-3 sm:mb-4',
        'button-rounded' => 'rounded',
        'button-shadow' => '',
        'button-width' => '',

        'check-background' => '',
        'check-border' => '',
        'check-color' => 'text-brand',
        'check-other' => 'absolute inset-y-0 right-0 flex items-center',
        'check-padding' => 'pr-4',
        'check-rounded' => '',
        'check-shadow' => '',
        'check-active' => '',
        'check-inactive' => '',
        'check-icon' => 'icon.check',
        'check-icon-size' =>'w-6 h-6',

        'icon' => 'icon.chevron-down',
        'icon-background' => '',
        'icon-border' => '',
        'icon-color' => '',
        'icon-other' => '',
        'icon-padding' => '',
        'icon-rounded' => '',
        'icon-shadow' => '',
        'icon-size' => 'w-4 h-4',

        'image-border' => '',
        'image-other' => 'flex-shrink-0',
        'image-padding' => 'pr-2',
        'image-rounded' => '',
        'image-shadow' => '',
        'image-size' => 'h-6 w-auto',

        'list-background' => 'bg-input',
        'list-border' => 'border border-input focus:outline-none',
        'list-color' => '',
        'list-font' => '',
        'list-other' => 'absolute inset-x-2 sm:inset-auto sm:right-0 -mt-2 max-h-60 overflow-auto z-50',
        'list-padding' => 'py-1',
        'list-rounded' => 'rounded',
        'list-shadow' => 'shadow-md',
        'list-width' => 'sm:w-max',

        'option-background' => '',
        'option-border' => '',
        'option-color' => '',
        'option-font' => '',
        'option-other' => 'cursor-pointer select-none relative group',
        'option-padding' => 'py-2 pl-3 pr-12',
        'option-rounded' => '',
        'option-shadow' => '',
        'option-spacing' => 'space-x-2',
        'option-active' => 'bg-input-option-hover',
        'option-inactive' => 'bg-input-option text-input-option',

        'text-background' => '',
        'text-border' => '',
        'text-color' => '',
        'text-font' => 'text-input-option group-hover:text-input-option-hover',
        'text-other' => 'block truncate',
        'text-padding' => '',
        'text-rounded' => '',
        'text-shadow' => '',
        'text-active' => 'font-semibold',
        'text-inactive' => 'font-normal',

        'subtext-background' => '',
        'subtext-border' => '',
        'subtext-color' => 'text-input-option-sub group-hover:text-input-option-sub-hover',
        'subtext-font' => '',
        'subtext-other' => 'block truncate',
        'subtext-padding' => 'pl-2',
        'subtext-rounded' => '',
        'subtext-shadow' => '',
        'subtext-active' => '',
        'subtext-inactive' => '',

        'wrapper-background' => '',
        'wrapper-border' => '',
        'wrapper-color' => '',
        'wrapper-font' => '',
        'wrapper-other' => 'sm:relative',
        'wrapper-padding' => '',
        'wrapper-rounded' => '',
        'wrapper-shadow' => '',
        'wrapper-width' => 'w-full sm:w-auto',

        // Config
        'image-name' => 'image',
        'subtext-name' => 'subtext',
        'text-name' => 'text',
    ],

    'table-heading' => [

        // Style
        'align' => 'text-left',
        'background' => '',
        'border' => '',
        'color' => 'text-table-header',
        'font' => 'leading-4 font-medium uppercase tracking-wider whitespace-nowrap',
        'icon-size' => 'w-5 h-5',
        'other' => '',
        'padding' => 'px-2 py-2',
        'rounded' => '',
        'shadow' => '',
        'sort-link' => 'inline-flex items-center space-x-1 group focus:outline-none focus:text-brand',
        'width' => 'w-auto',

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

    'table-pagination' => [
        'icon-next' => 'icon.chevron-right',
        'icon-previous' => 'icon.chevron-left',
        'icon-size' => 'w-5 h-5',

        'button-container' => 'relative z-0 flex',

//        'full-pagination' => 'hidden sm:flex-1 sm:flex sm:items-center sm:justify-between',
//        'mobile-pagination' => 'relative z-0 inline-flex space-x-2',

        'button-background' => 'bg-button-default hover:bg-button-default-hover',
        'button-border' => 'border border-button-default hover:border-button-default-hover focus:outline-none',
        'button-color' => 'text-button-default hover:text-button-default-hover',
        'button-font' => 'font-medium',
        'button-other' => 'relative inline-flex items-center justify-center focus:z-10 transition ease-in-out duration-150',
        'button-padding' => 'ml-0.5',
        'button-rounded' => 'rounded',
        'button-shadow' => '',
        'button-width' => 'h-9 w-9',

        'button-active-background' => 'bg-button-default',
        'button-active-border' => 'border border-button-default-hover',
        'button-active-color' => 'text-button-default-hover',
        'button-active-font' => 'font-medium',
        'button-active-other' => 'relative inline-flex items-center justify-center',
        'button-active-padding' => 'ml-0.5',
        'button-active-rounded' => 'rounded',
        'button-active-shadow' => '',
        'button-active-width' => 'h-9 w-9',

        'button-disabled-background' => 'bg-button-muted',
        'button-disabled-border' => 'border border-button-default',
        'button-disabled-color' => 'text-button-muted',
        'button-disabled-font' => 'font-medium',
        'button-disabled-other' => 'relative inline-flex items-center justify-center',
        'button-disabled-padding' => 'ml-0.5',
        'button-disabled-rounded' => 'rounded',
        'button-disabled-shadow' => '',
        'button-disabled-width' => 'h-9 w-9',

        'results-background' => '',
        'results-border' => '',
        'results-color' => '',
        'results-font' => '',
        'results-other' => 'flex items-center space-x-1 whitespace-nowrap',
        'results-padding' => '',
        'results-rounded' => '',
        'results-shadow' => '',

        'wrapper-background' => '',
        'wrapper-border' => '',
        'wrapper-color' => '',
        'wrapper-font' => '',
//        'wrapper-other' => 'hidden sm:flex-1 sm:flex sm:items-center sm:justify-between',
        'wrapper-other' => 'flex-1 flex items-center justify-between',
        'wrapper-padding' => '',
        'wrapper-rounded' => '',
        'wrapper-shadow' => '',

        // Config
        'show-always' => true,
        'each-side' => 1,
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
