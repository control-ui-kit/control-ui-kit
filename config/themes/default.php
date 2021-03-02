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
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5 ',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-date' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5 ',
        'rounded' => 'rounded',
        'shadow' => '',

        // Config
        'format' => 'DD/MM/YYYY',
        'icon' => 'icon.calendar'
    ],

    'input-date-range' => [

        // Style
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => 'w-64',
        'padding' => 'p-1.5 ',
        'rounded' => 'rounded',
        'shadow' => '',

        // Config
        'format' => 'DD/MM/YYYY',
        'icon' => 'icon.calendar'

    ],

    'input-decimal' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5 ',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-email' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5 ',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-number' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5 ',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-password' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5 ',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-percent' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => 'w-20',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
    ],

    'input-text' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5 ',
        'rounded' => 'rounded',
        'shadow' => '',
    ],

    'input-textarea' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => 'text-input placeholder-input',
        'font' => '',
        'other' => '',
        'padding' => 'p-1.5 ',
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

    'input-select' => [
        'background' => 'bg-input',
        'border' => 'border border-input focus:border-input focus:outline-none focus:ring-brand',
        'color' => '',
        'font' => 'text-md text-input',
        'other' => 'w-20',
        'padding' => 'p-1.5',
        'rounded' => 'rounded',
        'shadow' => '',
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
        'padding' => 'p-6',
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
        'other' => '',
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
