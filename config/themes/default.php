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

        'icon' => '',
        'icon-color' => '',
        'icon-size' => 'w-5 h-5',

        'text-color' => '',
        'text-font' => '',
        'text-size' => 'text-sm leading-[unset]',
        'text-other' => '',

        'title-color' => '',
        'title-font' => 'font-medium',
        'title-size' => 'text-sm leading-[unset]',
        'title-other' => '',

        'url-color' => '',
        'url-font' => 'font-medium',
        'url-size' => 'text-sm',
        'url-other' => 'hover:opacity-70',

        'tiny' => 'w-full max-w-3xl m-auto',
        'small' => 'w-full max-w-4xl m-auto',
        'medium' => 'w-full max-w-5xl m-auto',
        'large' => 'w-full max-w-6xl m-auto',
        'xl' => 'w-full max-w-7xl m-auto',
        'jumbo' => 'w-full max-w-8xl m-auto',

        'default' => [
            'background' => 'bg-alert-default',
            'border' => 'border-alert-default',
            'icon' => 'icon-question',
            'icon-color' => 'text-alert-default-icon',
            'title-color' => 'text-alert-default-title',
            'text-color' => 'text-alert-default-text',
            'url-color' => 'text-alert-default-url',
        ],

        'brand' => [
            'background' => 'bg-alert-brand',
            'border' => 'border-alert-brand',
            'icon' => 'icon-question',
            'icon-color' => 'text-alert-brand-icon',
            'title-color' => 'text-alert-brand-title',
            'text-color' => 'text-alert-brand-text',
            'url-color' => 'text-alert-brand-url',
        ],

        'danger' => [
            'background' => 'bg-alert-danger',
            'border' => 'border-alert-danger',
            'icon' => 'icon-shield-cross',
            'icon-color' => 'text-alert-danger-icon',
            'title-color' => 'text-alert-danger-title',
            'text-color' => 'text-alert-danger-text',
            'url-color' => 'text-alert-danger-url',
        ],

        'info' => [
            'background' => 'bg-alert-info',
            'border' => 'border-alert-info',
            'icon' => 'icon-info-circle',
            'icon-color' => 'text-alert-info-icon',
            'title-color' => 'text-alert-info-title',
            'text-color' => 'text-alert-info-text',
            'url-color' => 'text-alert-info-url',
        ],

        'muted' => [
            'background' => 'bg-alert-muted',
            'border' => 'border-alert-muted',
            'icon' => 'icon-question',
            'icon-color' => 'text-alert-muted-icon',
            'title-color' => 'text-alert-muted-title',
            'text-color' => 'text-alert-muted-text',
            'url-color' => 'text-alert-muted-url',
        ],

        'success' => [
            'background' => 'bg-alert-success',
            'border' => 'border-alert-success',
            'icon' => 'icon-status-success',
            'icon-color' => 'text-alert-success-icon',
            'title-color' => 'text-alert-success-title',
            'text-color' => 'text-alert-success-text',
            'url-color' => 'text-alert-success-url',
        ],

        'warning' => [
            'background' => 'bg-alert-warning',
            'border' => 'border-alert-warning',
            'icon' => 'icon-warning',
            'icon-color' => 'text-alert-warning-icon',
            'title-color' => 'text-alert-warning-title',
            'text-color' => 'text-alert-warning-text',
            'url-color' => 'text-alert-warning-url',
        ],
    ],

    'button' => [

        'primary-button' => 'default',

        'background' => '',
        'border' => '',
        'color' => '',
        'cursor' => 'cursor-pointer',
        'disabled' => 'opacity-60 cursor-default',
        'font' => 'text-sm',
        'icon-size' => 'w-5 h-5',
        'other' => 'w-max flex items-center justify-center group outline-none focus:outline-none',
        'padding' => 'space-x-1 px-2 py-1.5',
        'rounded' => 'rounded',
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

        'muted' => [
            'background' => 'bg-button-muted hover:bg-button-muted-hover',
            'border' => 'border border-button-muted hover:border-button-muted-hover',
            'color' => 'text-button-muted hover:text-button-muted-hover',
            'icon' => 'text-button-muted-icon group-hover:text-button-muted-icon-hover',
        ],

        'success' => [
            'background' => 'bg-button-success hover:bg-button-success-hover',
            'border' => 'border border-button-success hover:border-button-success-hover',
            'color' => 'text-button-success hover:text-button-success-hover',
            'icon' => 'text-button-success-icon group-hover:text-button-success-icon-hover',
        ],

        'warning' => [
            'background' => 'bg-button-warning hover:bg-button-warning-hover',
            'border' => 'border border-button-warning hover:border-button-warning-hover',
            'color' => 'text-button-warning hover:text-button-warning-hover',
            'icon' => 'text-button-warning-icon group-hover:text-button-warning-icon-hover',
        ],
    ],

    'change-chart' => [
        'icon' => '',
        'icon-size' => 'h-6 w-6',
        'percent-difference' => "false",
        'decimals' => 0,
        'difference-increase-icon' => 'icon-arrow-up',
        'difference-decrease-icon' => 'icon-arrow-down',

        'wrapper-background' => 'bg-white',
        'wrapper-border' => '',
        'wrapper-color' => '',
        'wrapper-font' => '',
        'wrapper-other' => 'relative overflow-hidden',
        'wrapper-padding' => 'pt-5 px-4 sm:pt-6 sm:px-6',
        'wrapper-rounded' => 'rounded-lg',
        'wrapper-shadow' => 'shadow',

        'title-background' => '',
        'title-border' => '',
        'title-color' => '',
        'title-font' => 'text-sm font-medium text-gray-500',
        'title-other' => 'truncate',
        'title-padding' => '',
        'title-rounded' => '',
        'title-shadow' => '',

        'image-container-background' => '',
        'image-container-border' => '',
        'image-container-color' => '',
        'image-container-font' => '',
        'image-container-other' => 'absolute',
        'image-container-padding' => '',
        'image-container-rounded' => 'rounded-md',
        'image-container-shadow' => '',

        'image-background' => '',
        'image-border' => '',
        'image-color' => '',
        'image-font' => '',
        'image-other' => 'h-12 w-12',
        'image-padding' => '',
        'image-rounded' => 'rounded-md',
        'image-shadow' => '',

        'icon-container-background' => '',
        'icon-container-border' => '',
        'icon-container-color' => '',
        'icon-container-font' => 'text-black',
        'icon-container-other' => 'absolute',
        'icon-container-padding' => 'p-3',
        'icon-container-rounded' => 'rounded-md',
        'icon-container-shadow' => '',

        'icon-background' => '',
        'icon-border' => '',
        'icon-color' => '',
        'icon-font' => '',
        'icon-other' => 'h-8 w-8',
        'icon-padding' => '',
        'icon-rounded' => '',
        'icon-shadow' => '',

        'container-background' => '',
        'container-border' => '',
        'container-color' => '',
        'container-font' => '',
        'container-other' => 'flex items-baseline',
        'container-padding' => 'pb-6 sm:pb-7',
        'container-rounded' => '',
        'container-shadow' => '',

        'difference-background' => '',
        'difference-border' => '',
        'difference-font' => 'text-sm font-semibold',
        'difference-other' => 'flex items-baseline',
        'difference-padding' => 'ml-2',
        'difference-rounded' => '',
        'difference-shadow' => '',

        'increase-color' => 'text-green-600',
        'decrease-color' => 'text-red-600',

        'link-container-background' => 'bg-gray-50',
        'link-container-border' => '',
        'link-container-color' => '',
        'link-container-font' => '',
        'link-container-other' => 'absolute bottom-0 inset-x-0 ',
        'link-container-padding' => 'px-4 py-4 sm:px-6',
        'link-container-rounded' => '',
        'link-container-shadow' => '',

        'link-background' => '',
        'link-border' => '',
        'link-color' => '',
        'link-font' => 'text-sm font-medium text-brand hover:text-brand-lighter',
        'link-other' => ' ',
        'link-padding' => '',
        'link-rounded' => '',
        'link-shadow' => '',

        'number-background' => '',
        'number-border' => '',
        'number-color' => '',
        'number-font' => 'text-2xl font-semibold text-gray-900',
        'number-other' => ' ',
        'number-padding' => '',
        'number-rounded' => '',
        'number-shadow' => '',

        'difference-icon-background' => '',
        'difference-icon-border' => '',
        'difference-icon-color' => '',
        'difference-icon-font' => '',
        'difference-icon-other' => 'self-center shrink-0',
        'difference-icon-padding' => '',
        'difference-icon-rounded' => '',
        'difference-icon-shadow' => '',
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

        'background' => 'bg-nav-bar-option',
        'border' => 'border border-nav-bar',
        'color' => '',
        'font' => '',
        'other' => 'absolute flex flex-col z-50',
        'padding' => '',
        'rounded' => 'rounded',
        'shadow' => 'shadow-md',
        'width' => '',

    ],

    'error' => [
        'color' => 'text-danger',
        'font' => 'text-xs',
        'other' => '',
        'padding' => 'pt-1.5',
    ],

    'error-bag' => [
        'alert' => 'danger',
        'locale-title-lang-string' => 'validation.custom.notifications.errors',
        'use-translation' => true,
    ],

    'form-layout-inline' => [
        'content' => 'mt-1 w-1/2 sm:w-2/3 lg:w-3/4',
        'help' => 'block text-xs text-muted leading-relaxed pr-2',
        'label' => 'w-1/2 sm:w-1/3 lg:w-1/4 leading-2 space-y-2',
        'required-color' => 'text-danger',
        'required-size' => 'w-2 h-2',
        'slot' => 'min-h-[2rem] flex items-center',
        'text' => 'font-medium flex items-center space-x-1.5 min-h-[2rem]',
        'wrapper' => 'flex items-start space-x-2 min-h-[2rem]',
    ],

    'form-layout-responsive' => [
        'content' => 'mt-1 md:mt-0 w-full md:w-2/3 lg:w-3/4',
        'help' => 'hidden sm:block text-xs text-muted leading-relaxed pr-2',
        'help-mobile' => 'sm:hidden text-xs text-muted mt-2',
        'label' => 'w-full md:w-1/3 lg:w-1/4 leading-2 space-y-2',
        'required-color' => 'text-danger',
        'required-size' => 'w-2 h-2',
        'slot' => 'min-h-[2rem] flex items-center',
        'text' => 'font-medium flex items-center space-x-1.5 min-h-[2rem]',
        'wrapper' => 'md:flex md:items-start md:space-x-2 min-h-[2rem]',
    ],

    'form-layout-stacked' => [
        'content' => 'mt-1 w-full',
        'help' => 'text-xs text-muted mt-2',
        'label' => 'w-full leading-2 space-y-2',
        'required-color' => 'text-danger',
        'required-size' => 'w-2 h-2',
        'slot' => 'min-h-[2rem] flex items-center',
        'text' => 'font-medium flex items-center space-x-1.5 min-h-[2rem]',
        'wrapper' => 'min-h-[2rem]',
    ],

    'input' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => 'text-sm',
        'other' => '',
        'padding' => 'py-1.5 px-3',
        'rounded' => 'rounded',
        'shadow' => '',
        'width' => 'w-full',

        'icon-left-background' => '',
        'icon-left-border' => 'border-r border-input',
        'icon-left-color' => 'text-muted',
        'icon-left-size' => 'w-4 h-4',
        'icon-left-other' => 'flex items-center justify-center self-stretch w-10',
        'icon-left-padding' => '',
        'icon-left-rounded' => '',
        'icon-left-shadow' => '',

        'icon-right-background' => '',
        'icon-right-border' => 'border-l border-input',
        'icon-right-color' => 'text-muted',
        'icon-right-size' => 'w-4 h-4',
        'icon-right-other' => 'flex items-center justify-center self-stretch w-10',
        'icon-right-padding' => '',
        'icon-right-rounded' => '',
        'icon-right-shadow' => '',

        'input-background' => 'bg-input',
        'input-border' => 'border-0 focus:outline-none focus:ring-0',
        'input-color' => 'text-input placeholder-input',
        'input-font' => 'text-sm',
        'input-other' => 'block w-full appearance-none',
        'input-padding' => 'py-1.5 px-3',
        'input-rounded' => 'rounded',
        'input-shadow' => '',

        'prefix-background' => '',
        'prefix-border' => 'border-r border-input',
        'prefix-color' => 'text-muted',
        'prefix-font' => '',
        'prefix-icon-size' => 'w-4 h-4',
        'prefix-other' => 'flex items-center justify-center self-stretch w-10',
        'prefix-padding' => '',
        'prefix-rounded' => '',
        'prefix-shadow' => '',

        'suffix-background' => '',
        'suffix-border' => 'border-l border-input',
        'suffix-color' => 'text-muted',
        'suffix-font' => '',
        'suffix-icon-size' => 'w-4 h-4',
        'suffix-other' => 'flex items-center justify-center self-stretch w-10',
        'suffix-padding' => '',
        'suffix-rounded' => '',
        'suffix-shadow' => '',

        'wrapper-background' => 'bg-input',
        'wrapper-border' => 'border border-input focus-within:ring-1 focus-within:ring-brand',
        'wrapper-color' => '',
        'wrapper-font' => '',
        'wrapper-other' => 'flex items-center',
        'wrapper-padding' => '',
        'wrapper-rounded' => 'rounded',
        'wrapper-shadow' => '',
        'wrapper-width' => 'w-full',

        // Config
        'decimals' => '',
        'default' => '',
        'icon-left' => '',
        'icon-right' => '',
        'max' => null,
        'min' => null,
        'placeholder' => '',
        'prefix-text' => '',
        'step' => null,
        'suffix-text' => '',
        'type' => 'text',
    ],

    'input-checkbox' => [
        'background' => 'bg-input',
        'border' => 'focus:ring-brand border-input focus:ring-offset-input',
        'color' => 'text-brand',
        'disable' => 'opacity-60',
        'other' => 'h-4 w-4 cursor-pointer',
        'padding' => '',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-color-picker' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => '',
        'font' => 'text-sm text-input',
        'other' => 'w-40 relative',
        'padding' => 'py-1.5 px-3',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-currency' => [
        'decimals' => 2,
        'default' => 0.00,
        'font' => 'text-right text-sm',
        'input-font' => 'text-right text-sm',
        'min' => 0,
        'max' => null,
        'prefix-text' => '£',
        'type' => 'number',
    ],

    'input-date' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border-0 focus:border-input focus:outline-none focus:ring-0',
        'color' => 'text-input placeholder-input',
        'font' => 'text-sm',
        'other' => '',
        'padding' => 'py-1.5 px-3',
        'rounded' => 'rounded',
        'shadow' => '',
        'width' => 'w-full',

        'icon-background' => '',
        'icon-border' => 'border-r border-input',
        'icon-color' => 'text-muted',
        'icon-size' => 'w-4 h-4',
        'icon-other' => 'flex items-center justify-center self-stretch cursor-pointer',
        'icon-padding' => 'px-3',
        'icon-rounded' => '',
        'icon-shadow' => '',

        'timezone-background' => 'bg-input',
        'timezone-border' => 'border-0 focus:outline-none focus:ring-0',
        'timezone-color' => 'text-input placeholder-input',
        'timezone-font' => 'text-xs',
        'timezone-other' => 'text-right',
        'timezone-padding' => '',
        'timezone-rounded' => '',
        'timezone-shadow' => '',
        'timezone-width' => 'w-max',

        // Config
        'mode' => 'single',
        'data' => 'Y-m-d',
        'format' => 'd/m/Y',
        'icon' => 'icon-calendar',
        'separator' => '#',
        'week-numbers' => false,
        'years-before' => 100,
        'years-after' => 5,

        // Time
        'clock-type' => 24, // 12 or 24
        'hour-step' => 1,
        'minute-step' => 1,
        'show-time' => false,
        'show-seconds' => false,
        'time-only' => false,
    ],

    'input-datetime' => [

        // Config
        'data' => 'Y-m-d H:i:s',
        'format' => 'd/m/Y H:i',
        'icon' => 'icon-calendar',
        'years-before' => 100,
        'years-after' => 5,

        // Time
        'clock-type' => 24, // 12 or 24
        'hour-step' => 1,
        'minute-step' => 1,
        'show-seconds' => false,
    ],

    'input-date-range' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border-0 focus:border-input focus:outline-none focus:ring-0',
        'color' => 'text-input placeholder-input',
        'font' => 'text-sm',
        'other' => '',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',
        'width' => 'w-full',

        'icon-background' => '',
        'icon-border' => 'border-r border-input',
        'icon-color' => 'text-muted',
        'icon-size' => 'w-4 h-4',
        'icon-other' => 'flex items-center justify-center self-stretch',
        'icon-padding' => 'px-3',
        'icon-rounded' => '',
        'icon-shadow' => '',

        // Config
        'data' => 'Y-m-d',
        'format' => 'd/m/Y',
        'icon' => 'icon-calendar',
        'separator' => '#',
        'week-numbers' => false,
        'years-before' => 100,
        'years-after' => 5,
    ],

    'input-decimal' => [
        'decimals' => 2,
        'default' => 0,
        'font' => 'text-right text-sm',
        'input-font' => 'text-right',
        'type' => 'number',
    ],

    'input-email' => [
        'prefix-text' => '@',
        'placeholder' => 'name@example.com',
        'type' => 'email',
    ],

    'input-number' => [
        'decimals' => 0,
        'default' => 0,
        'font' => 'text-right text-sm',
        'input-font' => 'text-right',
        'step' => 1,
        'type' => 'number',
    ],

    'input-password' => [
        'icon-left' => 'icon-eye',
        'icon-left-show' => 'icon-invisible',
        'icon-right' => 'none',
        'icon-right-show' => 'icon-invisible',
        'type' => 'password',
    ],

    'input-percent' => [
        'default' => 0,
        'decimals' => 2,
        'font' => 'text-right text-sm',
        'input-font' => 'text-right text-sm',
        'icon-right' => 'icon-percent',
        'max' => 100,
        'min' => 0,
        'step' => 0.01,
        'type' => 'number',
    ],

    'input-radio' => [
        'background' => 'bg-input',
        'border' => 'focus:ring-brand border-input focus:ring-offset-input',
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
        'font' => 'text-sm',
        'other' => '',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',

        'min' => '1',
        'max' => '100',
    ],

    'input-royalty' => [
        'decimals' => 2,
        'default' => 0.00,
        'font' => 'text-right text-sm',
        'input-font' => 'text-right text-sm',
        'min' => 0,
        'max' => null,
        'prefix-text' => '$',
        'type' => 'number',
    ],

    'input-search' => [
        'icon-left' => 'icon-search',
        'icon-left-border' => 'border-0',
        'icon-left-padding' => 'pl-3 pr-0',
        'type' => 'search',
    ],

    'input-select' => [

        // Style
        'button-background' => 'bg-input',
        'button-border' => 'border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand',
        'button-color' => '',
        'button-font' => 'text-input text-sm',
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
        'check-icon' => 'icon-check',
        'check-icon-size' =>'w-6 h-6',

        'icon' => 'icon-chevron-down',
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
        'image-other' => 'shrink-0',
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
        'list-width' => 'w-full',

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

    'input-text' => [
        'type' => 'text',
    ],

    'input-textarea' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => 'text-sm',
        'other' => '',
        'padding' => 'py-1.5 px-3',
        'rounded' => 'rounded',
        'shadow' => '',
        'width' => 'w-full',

        //Config
        'rows' => 4,
    ],

    'input-time' => [

        // Config
        'format' => 'H:i',
        'data' => 'H:i:s',
        'icon' => 'icon-clock',

        // Time
        'clock-type' => 24, // 12 or 24
        'hour-step' => 1,
        'minute-step' => 1,
        'show-seconds' => false,
        'show-time' => true,
        'time-only' => true,
    ],

    'input-toggle' => [
        'background' => '',
        'border' => '',
        'other' => '',
        'padding' => '',
        'shadow' => '',

        'base-animation' => 'ease-in-out duration-200 transition-colors',
        'base-background' => '',
        'base-border' => 'border border-input',
        'base-color' => '',
        'base-focus' => 'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand focus:ring-offset-input',
        'base-other' => 'inline-flex shrink-0 cursor-pointer ',
        'base-rounded' => 'rounded-full',
        'base-shadow' => '',
        'base-size' => 'h-[24px] w-[46px]',
        'base-state-off' => 'bg-input',
        'base-state-on' => 'bg-input-brand bg-gradient-to-r from-brand-400',

        'switch-animation' => 'translate-x-0 transform transition ease-in-out duration-200',
        'switch-background' => 'bg-input-item',
        'switch-border' => 'border border-input',
        'switch-color' => '',
        'switch-focus' => 'ring-0',
        'switch-other' => 'pointer-events-none inline-block ml-[1px] mt-[1px]',
        'switch-rounded' => 'rounded-full',
        'switch-shadow' => 'shadow',
        'switch-size' => 'h-5 w-5',
        'switch-state-off' => 'translate-x-0',
        'switch-state-on' => 'translate-x-[22px]',
    ],

    'input-url' => [
        'prefix-text' => '',
        'type' => 'url',
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
        'other' => 'flex flex-col space-y-2 sm:space-y-4 md:min-h-[300px]',
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
        'font' => 'text-xs',
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

    'link' => [

        'link-default' => 'brand',

        'color' => '',
        'font' => '',
        'other' => '',
        'size' => 'w-max',

        'default' => [
            'color' => 'text-default hover:text-default-hover',
            'font' => '',
            'other' => 'underline',
            'size' => '',
        ],

        'brand' => [
            'color' => 'text-brand hover:text-brand-hover',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'danger' => [
            'color' => 'text-danger hover:text-danger-hover',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'info' => [
            'color' => 'text-info hover:text-info-hover',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'muted' => [
            'color' => 'text-muted hover:text-muted-hover',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'success' => [
            'color' => 'text-success hover:text-success-hover',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'warning' => [
            'color' => 'text-warning hover:text-warning-hover',
            'font' => '',
            'other' => '',
            'size' => '',
        ],
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
        'font' => 'text-sm',
        'other' => '',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
    ],

    'map-region' => [
        'width'  => 'w-full',
        'height' => 'h-full',
        'other'  => '',
        'name'   => 'Count',
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

    'modal' => [
        'lang-keys' => [
            'close' => 'buttons.close',
            'no' => 'buttons.no',
            'yes' => 'buttons.yes',
        ],
    ],

    'panel' => [
        'background' => 'bg-panel',
        'border' => 'border border-panel',
        'color' => 'text-panel',
        'divider' => 'divide-y divide-panel',
        'font' => 'text-sm',
        'other' => '',
        'padding' => 'p-6',
        'rounded' => 'rounded',
        'shadow' => '',
        'spacing' => 'flex flex-col space-y-2',
        'width' => 'w-full',
        'tiny' => 'w-full max-w-3xl m-auto',
        'small' => 'w-full max-w-4xl m-auto',
        'medium' => 'w-full max-w-5xl m-auto',
        'large' => 'w-full max-w-6xl m-auto',
        'xl' => 'w-full max-w-7xl m-auto',
        'jumbo' => 'w-full max-w-8xl m-auto',
    ],

    'panel-divider' => [
        'border' => 'border-b border-panel-divider',
    ],

    'panel-footer' => [
        'background' => 'bg-panel-footer',
        'border' => '',
        'color' => 'text-panel-footer ',
        'font' => 'uppercase text-xs font-medium tracking-wider whitespace-nowrap items-center text-left',
        'other' => 'w-auto cursor-default',
        'padding' => 'px-4 py-2',
        'rounded' => '',
        'shadow' => '',
    ],

    'panel-header' => [
        'background' => 'bg-panel-header',
        'border' => 'border-b border-panel',
        'color' => 'text-panel-header ',
        'font' => 'uppercase text-xs font-medium tracking-wider whitespace-nowrap items-center text-left',
        'other' => 'w-auto cursor-default',
        'padding' => 'px-4 py-2',
        'rounded' => '',
        'shadow' => '',
    ],

    'panel-section' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => '',
        'padding' => 'p-2 sm:p-6',
        'rounded' => '',
        'shadow' => '',
        'spacing' => 'space-y-2',
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
            'background' => 'bg-pill-default',
            'color' => 'text-pill-default',
        ],

        'brand' => [
            'background' => 'bg-pill-brand',
            'color' => 'text-pill-brand',
        ],

        'danger' => [
            'background' => 'bg-pill-danger',
            'color' => 'text-pill-danger',
        ],

        'info' => [
            'background' => 'bg-pill-info',
            'color' => 'text-pill-info',
        ],

        'muted' => [
            'background' => 'bg-pill-muted',
            'color' => 'text-pill-muted',
        ],

        'success' => [
            'background' => 'bg-pill-success',
            'color' => 'text-pill-success',
        ],

        'warning' => [
            'background' => 'bg-pill-warning',
            'color' => 'text-pill-warning',
        ],
    ],

    'table' => [

        # TODO - test
        'active-filters-list-background' => '',
        'active-filters-list-border' => '',
        'active-filters-list-color' => '',
        'active-filters-list-font' => '',
        'active-filters-list-other' => 'flex flex-row flex-wrap items-center justify-end',
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
        'active-filters-wrapper-width' => 'w-full',

        # TODO - test
        'clear-filters-event' => '',
        'clear-filters-href' => '',
        'clear-filters-text' => 'Clear Filters',
        'clear-filters-background' => '',
        'clear-filters-border' => 'focus:outline-none focus:ring-0',
        'clear-filters-color' => 'text-brand hover:text-brand-lighter focus:text-brand-lightest',
        'clear-filters-font' => '',
        'clear-filters-other' => 'shrink-0 ml-2 pt-1',
        'clear-filters-padding' => '',
        'clear-filters-rounded' => '',
        'clear-filters-shadow' => '',

        # TODO - test
        'search-icon-background' => '',
        'search-icon-border' => 'border-0 ',
        'search-icon-color' => 'text-muted',
        'search-icon' => 'icon-search',
        'search-icon-size' => 'w-4 h-4',
        'search-icon-other' => 'flex items-center justify-center self-stretch',
        'search-icon-padding' => 'pl-3 pr-0',
        'search-icon-rounded' => '',
        'search-icon-shadow' => '',

        # TODO - test
        'search-input-background' => 'bg-table-filters',
        'search-input-border' => 'border-0 focus:outline-none focus:ring-0',
        'search-input-color' => 'text-input placeholder-input',
        'search-input-font' => 'text-sm',
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
        'search-wrapper-width' => '',

        # TODO - test
        'search-enable' => false,
        'search-bar' => 'mb-4',
//        'search-bar-spacing' => 'sm:grid sm:grid-cols-2 table-grid-filters space-x-2 sm:space-x-4',
        'search-bar-spacing' => 'flex space-x-2 sm:space-x-2',
        'search-container' => 'flex-1 sm:shrink-0',
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
        'table-shadow' => '',

        'table-body-background' => 'bg-table',
        'table-body-border' => 'divide-y divide-table',
        'table-body-color' => '',
        'table-body-font' => '',
        'table-body-other' => 'overflow-hidden',
        'table-body-padding' => '',
        'table-body-rounded' => '',
        'table-body-shadow' => '',

        'table-filters-background' => '',
        'table-filters-border' => '',
        'table-filters-color' => '',
        'table-filters-container' => 'flex-grow flex flex-col sm:items-end',
        'table-filters-empty' => 'hidden sm:block mb-0 sm:mb-4 h-10',
        'table-filters-font' => '',
        'table-filters-other' => 'inline-flex space-x-1',
        'table-filters-padding' => '',
        'table-filters-rounded' => 'rounded sm:rounded-r',
        'table-filters-shadow' => '',
        'table-filters-width' => 'w-max',

        'table-headings-background' => 'bg-table-header',
        'table-headings-border' => 'border-table-divider',
        'table-headings-color' => '',
        'table-headings-font' => '',
        'table-headings-other' => '',
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

    'table-action' => [

        'background' => '',
        'border' => '',
        'color' => 'text-table-action-icon hover:text-table-action-icon-hover',
        'font' => '',
        'other' => '',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',

    ],

    'table-active-filter' => [

        // Style
        'background' => 'bg-active-filter',
        'border' => 'border border-active-filter focus-within:border-brand',
        'color' => 'text-active-filter',
        'font' => 'text-sm',
        'other' => 'flex items-center space-x-1 w-max',
        'padding' => 'px-1.5 py-0.5 mr-2 mb-4',
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
        'icon' => 'icon-close',
    ],

    'table-cell' => [
        'actions' => 'flex items-center space-x-1 flex-nowrap justify-center px-2',
        'align' => 'text-left',
        'background' => '',
        'border' => '',
        'color' => '',
        'href-color' => 'hover:text-brand',
        'font' => 'text-[13px]',
        'other' => 'whitespace-no-wrap align-middle h-10',
        'padding' => 'px-2 py-2',
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
        'image-other' => 'shrink-0',
        'image-padding' => '',
        'image-rounded' => 'rounded-sm',
        'image-shadow' => '',
        'image-size' => 'h-8 w-auto',
    ],

    'table-empty' => [

        // Style
        'background' => '',
        'border' => '',
        'color' => '',
        'colspan' => '100%',
        'font' => 'text-sm',
        'icon-size' => 'w-8 h-8',
        'icon-style' => 'text-warning',
        'other' => 'flex flex-col justify-center items-center h-40',
        'padding' => 'space-y-2 py-8',
        'rounded' => '',
        'shadow' => '',
        'stacked' => 'flex flex-col space-y-2 items-center',

        // Config
        'default-text' => 'No records found',
        'default-trans' => 'fields.no-records-found',
        'default-icon' => 'icon-warning',
    ],

    'table-filters' => [

        // Style
        'button-background' => 'bg-table-filters',
        'button-border' => 'focus:outline-none focus:ring-0 border border-table-filters focus:border-brand ',
        'button-color' => 'text-input',
        'button-font' => '',
        'button-icon' => 'icon-filter',
        'button-icon-size' => 'w-5 h-5',
        'button-other' => 'flex items-center shrink-0 cursor-pointer',
        'button-padding' => 'h-10 px-2.5',
        'button-rounded' => 'rounded',
        'button-shadow' => '',
        'button-width' => 'w-max',

    ],

    'table-heading' => [

        // Style
        'actions' => 'w-18',
        'align' => 'text-left',
        'background' => '',
        'border' => 'border-b border-table',
        'color' => 'text-table-header',
        'font' => 'uppercase text-xs font-medium tracking-wider whitespace-nowrap',
        'icon-size' => 'w-4 h-4',
        'other' => 'cursor-default',
        'padding' => 'px-2.5 py-2',
        'rounded' => '',
        'shadow' => '',
        'sortable' => 'inline-flex items-center space-x-0.5 group focus:outline-none focus:text-brand hover:text-brand cursor-pointer',
        'width' => 'w-auto',

        // Config
        'field-order' => 'orderby',
        'field-sort' => 'sort',
        'icon-asc' => 'icon-chevron-down',
        'icon-desc' => 'icon-chevron-up',
    ],

    'table-row' => [

        'background' => '',
        'border' => '',
        'color' => 'text-default',
        'font' => '',
        'hover' => ' hover:text-default',
        'other' => '',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',

        'default' => [
            'background' => 'bg-table-row-1 even:bg-table-row-2',
            'hover' => 'hover:bg-table-row-hover even:bg-table-hover',
            'color' => '',
        ],

        'brand' => [
            'background' => 'bg-table-row-brand',
            'hover' => 'hover:bg-table-row-brand-hover',
            'color' => 'text-table-row-brand hover:text-table-row-brand-hover',
        ],

        'danger' => [
            'background' => 'bg-table-row-danger',
            'hover' => 'hover:bg-table-row-danger-hover',
            'color' => 'text-table-row-danger hover:text-table-row-danger-hover',
        ],

        'info' => [
            'background' => 'bg-table-row-info',
            'hover' => 'hover:bg-table-row-info-hover',
            'color' => 'text-table-row-info hover:text-table-row-info-hover',
        ],

        'muted' => [
            'background' => 'bg-table-row-muted',
            'hover' => 'hover:bg-table-row-muted-hover',
            'color' => 'text-table-row-muted hover:text-table-row-muted-hover',
        ],

        'success' => [
            'background' => 'bg-table-row-success',
            'hover' => 'hover:bg-table-row-success-hover',
            'color' => 'text-table-row-success hover:text-table-row-success-hover',
        ],

        'warning' => [
            'background' => 'bg-table-row-warning',
            'hover' => 'hover:bg-table-row-warning-hover',
            'color' => 'text-table-row-warning hover:text-table-row-warning-hover',
        ],
    ],

    'table-pagination' => [
        'icon-next' => 'icon-chevron-right',
        'icon-previous' => 'icon-chevron-left',
        'icon-size' => 'w-5 h-5',

        'button-container' => 'relative z-0 flex space-x-1',
        'button-spacing' => 'space-x-1',
        'button-numbers' => 'hidden md:flex',

        'button-background' => 'bg-paginate-button hover:bg-paginate-button-hover',
        'button-border' => 'border border-paginate-button hover:border-paginate-button-hover focus:outline-none',
        'button-color' => 'text-paginate-button hover:text-paginate-button-hover',
        'button-font' => 'font-medium text-sm',
        'button-other' => 'relative inline-flex items-center justify-center focus:z-10 transition ease-in-out duration-150 cursor-pointer',
        'button-padding' => '',
        'button-rounded' => 'rounded',
        'button-shadow' => '',
        'button-width' => 'h-9 w-9',

        'button-active-background' => 'bg-paginate-active hover:bg-paginate-active-hover',
        'button-active-border' => 'border border-paginate-active hover:border-paginate-active-hover',
        'button-active-color' => 'text-paginate-active hover:text-paginate-active-hover',
        'button-active-font' => 'font-medium text-sm',
        'button-active-other' => 'relative inline-flex items-center justify-center cursor-default',
        'button-active-padding' => '',
        'button-active-rounded' => 'rounded',
        'button-active-shadow' => '',
        'button-active-width' => 'h-9 w-9',

        'button-disabled-background' => 'bg-paginate-disabled hover:bg-paginate-disabled-hover',
        'button-disabled-border' => 'border border-paginate-disabled hover:border-paginate-disabled-hover',
        'button-disabled-color' => 'text-paginate-disabled hover:text-paginate-disabled-hover',
        'button-disabled-font' => 'font-medium text-sm',
        'button-disabled-other' => 'relative inline-flex items-center justify-center cursor-default',
        'button-disabled-padding' => '',
        'button-disabled-rounded' => 'rounded',
        'button-disabled-shadow' => '',
        'button-disabled-width' => 'h-9 w-9',

        'limit-background' => 'bg-paginate-limit hover:bg-paginate-limit-hover bg-none',
        'limit-border' => 'border border-paginate-limit hover:border-paginate-limit-hover focus:border-paginate-limit focus:outline-none focus:ring-1 focus:ring-brand',
        'limit-color' => 'text-paginate-limit hover:text-paginate-limit-hover',
        'limit-font' => 'text-sm text-center',
        'limit-other' => 'flex items-center cursor-pointer',
        'limit-padding' => 'py-1 px-1.5',
        'limit-rounded' => 'rounded',
        'limit-shadow' => '',
        'limit-width' => '',

        'results-background' => '',
        'results-border' => '',
        'results-color' => 'text-paginate-limit',
        'results-font' => ' text-[13px]',
        'results-other' => 'flex items-center space-x-1 whitespace-nowrap',
        'results-padding' => '',
        'results-rounded' => '',
        'results-shadow' => '',

        'wrapper-background' => '',
        'wrapper-border' => '',
        'wrapper-color' => '',
        'wrapper-font' => '',
        'wrapper-other' => 'flex-1 flex items-center justify-between',
        'wrapper-padding' => '',
        'wrapper-rounded' => '',
        'wrapper-shadow' => '',

        // Config
        'show-always' => true,
        'each-side' => 1,
        'limit' => 10,
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

    'text' => [

        'text-default' => 'default',

        'color' => '',
        'font' => '',
        'other' => '',
        'size' => 'w-max',

        'default' => [
            'color' => 'text-default',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'brand' => [
            'color' => 'text-brand',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'danger' => [
            'color' => 'text-danger',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'info' => [
            'color' => 'text-info',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'muted' => [
            'color' => 'text-muted',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'success' => [
            'color' => 'text-success',
            'font' => '',
            'other' => '',
            'size' => '',
        ],

        'warning' => [
            'color' => 'text-warning',
            'font' => '',
            'other' => '',
            'size' => '',
        ],
    ],

    'title' => [
        'background' => '',
        'border' => '',
        'color' => 'text-panel-header',
        'font' => 'font-medium text-base',
        'other' => '',
        'padding' => 'py-3',
        'rounded' => '',
        'shadow' => '',
    ],
];
