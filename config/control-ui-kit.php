<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all  components from Blade UI Kit are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [

        'button.base' => \ControlUIKit\Components\Buttons\Base::class,
        'button.brand' => \ControlUIKit\Components\Buttons\Brand::class,
        'button' => \ControlUIKit\Components\Buttons\Button::class,
        'button.muted' => \ControlUIKit\Components\Buttons\Muted::class,

        'code.block' => \ControlUIKit\Components\Code\Block::class,
        'code' => \ControlUIKit\Components\Code\Inline::class,

        'dropdown.divider' => \ControlUIKit\Components\Dropdowns\Divider::class,
        'dropdown.menu' => \ControlUIKit\Components\Dropdowns\Menu::class,
        'dropdown.option' => \ControlUIKit\Components\Dropdowns\Option::class,

        'form' => \ControlUIKit\Components\Forms\Form::class,
        'label' => \ControlUIKit\Components\Forms\Label::class,

        'legend' => \ControlUIKit\Components\Forms\Legend::class,
        'form.errors' => \ControlUIKit\Components\Forms\Alerts\ErrorBag::class,

        'field.number' => \ControlUIKit\Components\Forms\Fields\Number::class,
        'field.text' => \ControlUIKit\Components\Forms\Fields\Text::class,

        'input.checkbox' => \ControlUIKit\Components\Forms\Inputs\Checkbox::class,
        'input.hidden' => \ControlUIKit\Components\Forms\Inputs\Hidden::class,
        'input.number' => \ControlUIKit\Components\Forms\Inputs\Number::class,
        'input.percent' => \ControlUIKit\Components\Forms\Inputs\Percentage::class,
        'input.radio' => \ControlUIKit\Components\Forms\Inputs\Radio::class,
        'input.search' => \ControlUIKit\Components\Forms\Inputs\Search::class,
        'input.select' => \ControlUIKit\Components\Forms\Inputs\Select::class,
        'input.text' => \ControlUIKit\Components\Forms\Inputs\Text::class,
        'input.toggle' => \ControlUIKit\Components\Forms\Inputs\Toggle::class,

        'layout.body' => \ControlUIKit\Components\Layouts\Body::class,
        'layout.footer' => \ControlUIKit\Components\Layouts\Footer::class,
        'layout.header' => \ControlUIKit\Components\Layouts\Header::class,

        'form.layouts.inline' => \ControlUIKit\Components\Forms\Layouts\Inline::class,

        'modal' => \ControlUIKit\Components\Modals\Modal::class,
        'modal.dialog' => \ControlUIKit\Components\Modals\Dialog::class,
        'modal.confirmation' => \ControlUIKit\Components\Modals\Confirmation::class,

        'panel' => \ControlUIKit\Components\Panels\Panel::class,
        'panel.divider' => \ControlUIKit\Components\Panels\Divider::class,
        'panel.title' => \ControlUIKit\Components\Panels\Title::class,

        'table' => \ControlUIKit\Components\Tables\Table::class,
        'table.cell' => \ControlUIKit\Components\Tables\Cell::class,
        'table.row' => \ControlUIKit\Components\Tables\Row::class,
        'table.heading' => \ControlUIKit\Components\Tables\Heading::class,
        'table.empty' => \ControlUIKit\Components\Tables\EmptyRow::class,

        'tabs' => \ControlUIKit\Components\Tabs\Tabs::class,
        'tabs.heading' => \ControlUIKit\Components\Tabs\Heading::class,
        'tabs.panel' => \ControlUIKit\Components\Tabs\Panel::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Language Files
    |--------------------------------------------------------------------------
    |
    | The UI kit can be configured to use language files.
    |
    */

    'use_language_files' => false,

    /*
    |--------------------------------------------------------------------------
    | Components Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all Control UI Kit components.
    | The default value is empty meaning components appear like they are
    | regular components in your app.
    |
    | <x-panel />
    |
    | If you need to avoid collision with local components or those from other
    | libraries then setting this prefix will prefix all Control UI Kit
    | components. If set with "ui", for example, you can reference components like:
    |
    | <x-ui-panel />
    |
    */

    'prefix' => '',

];
