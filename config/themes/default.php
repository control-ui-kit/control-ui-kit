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

    'table' => [
        'background' => '',
        'body-styles' => 'divide-y divide-table-divider bg-table bg-brand',
        'border' => 'border border-table',
        'color' => '',
        'font' => 'text-left',
        'head-styles' => 'items-center uppercase bg-table-header border-b border-table-divider',
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
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => '',
        'padding' => '',
        'rounded' => '',
        'shadow' => '',
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
        'align' => 'text-left',
        'background' => '',
        'border' => '',
        'color' => 'text-table-header',
        'font' => 'leading-4 font-medium uppercase tracking-wider',
        'icon-asc' => 'icon.chevron-up',
        'icon-desc' => 'icon.chevron-down',
        'icon-size' => 'w-4 h-4',
        'method' => 'session',
        'other' => '',
        'padding' => 'px-2 py-2',
        'rounded' => '',
        'shadow' => '',
        'sort-link' => 'flex items-center space-x-1 group focus:outline-none focus:underline',
    ],

    'table-row' => [
        'background' => '',
        'border' => '',
        'color' => '',
        'font' => '',
        'other' => '',
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
