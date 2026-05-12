---
name: control-ui-kit-development
description: Build and work with Control UI Kit Blade components — form fields, inputs, tables, buttons, panels, modals, tabs, alerts, icons, and theming.
---

# Control UI Kit Development

## When to use this skill

Use this skill when working with the `control-ui-kit/control-ui-kit` package: building forms, rendering tables, using UI components (alerts, panels, modals, buttons, tabs), styling with the theme system, or adding/modifying components in this library.

---

## Overview

Control UI Kit is a Laravel Blade component library providing ~170 components across 17 categories. Components are registered via `config/control-ui-kit.php` and styled via `config/themes/default.php`. All component styles use Tailwind CSS class strings.

**Installation:**
```bash
composer require control-ui-kit/control-ui-kit
```

**Asset loading (in layout):**
```blade
@controlUiKitAssets
```

---

## Architecture

### Three-layer form system

Every interactive form element has three layers:

| Layer | Prefix | Example | Purpose |
|---|---|---|---|
| **Field** | `field-*` | `x-field-text` | Label + layout + validation error |
| **Input** | `input-*` | `x-input-text` | Raw HTML input element |
| **Layout** | `form-layout-*` | `form-layout-responsive` | Label/input arrangement |

Always use `x-field-*` components in views. Use `x-input-*` only when embedding a raw input without label/layout.

### Trait architecture

- `UseThemeFile` — `style()` and `setConfigStyles()` for reading `config/themes/default.php`
- `UseInputTheme` — `setInputStyles()` for input-specific theming
- `LivewireAttributes` — wires up `wire:model`, `wire:key`, etc. transparently

### Component registration

All aliases are in `config/control-ui-kit.php` under `'components'`. To override a component, publish the config and swap the class:

```bash
php artisan vendor:publish --tag=control-ui-kit-config
```

---

## Form Fields (`x-field-*`)

Field components wrap an input with a label, optional help text, and validation error display. They extend `InputField` which provides `name`, `label`, `help`, `value`, and `layout` properties.

### Layout options

Pass `layout="stacked"`, `layout="inline"`, or `layout="responsive"` (default) to any field:

```blade
<x-field-text name="title" label="Title" layout="stacked" />
<x-field-text name="title" label="Title" layout="inline" />
<x-field-text name="title" label="Title" />  {{-- responsive (default) --}}
```

Change the default globally in `config/control-ui-kit.php`:
```php
'field-layouts' => ['default' => 'stacked'],
```

### Full field reference

| Blade tag | Description | Key extra props |
|---|---|---|
| `x-field-text` | Text input | — |
| `x-field-email` | Email input | — |
| `x-field-url` | URL input | — |
| `x-field-password` | Password with reveal toggle | — |
| `x-field-textarea` | Multi-line text | — |
| `x-field-search` | Search input | — |
| `x-field-number` | Integer input | `min`, `max`, `step` |
| `x-field-decimal` | Decimal input | `decimals` |
| `x-field-currency` | Currency input | `symbol` |
| `x-field-percent` | Percentage (0–100) | — |
| `x-field-royalty` | Royalty/rate input | — |
| `x-field-select` | Dropdown | `options`, `placeholder` |
| `x-field-radio-group` | Radio button group | `options` |
| `x-field-checkbox` | Checkbox | — |
| `x-field-tags` | Multi-tag input | — |
| `x-field-toggle` | Toggle switch | — |
| `x-field-date` | Date picker (flatpickr) | `min-date`, `max-date` |
| `x-field-datetime` | Date + time picker | — |
| `x-field-date-range` | Date range picker | — |
| `x-field-time` | Time picker | — |
| `x-field-color-picker` | Colour picker | — |
| `x-field-autocomplete` | AJAX autocomplete | `url`, `min-length` |
| `x-field-file-upload` | File upload | `accept` |
| `x-field-image-upload` | Image upload with preview | `accept` |
| `x-field-otc` | One-time code (6-digit) | `digits` |
| `x-field-range` | Range slider | `min`, `max`, `step` |
| `x-field-info` | Read-only display field | — |
| `x-field-link` | Read-only link display | `href` |
| `x-field-slot` | Custom slot-based field | — |
| `x-field-input` | Base field (rarely used directly) | — |

### Common field props

```blade
<x-field-text
    name="username"           {{-- form field name (required) --}}
    label="Username"          {{-- label text --}}
    value="john"              {{-- initial value --}}
    help="No spaces allowed"  {{-- help text below label --}}
    layout="stacked"          {{-- inline | stacked | responsive --}}
    required                  {{-- shows required indicator --}}
/>
```

### Info and Link fields (read-only)

```blade
{{-- Display plain text --}}
<x-field-info name="status" label="Status" value="Active" />
<x-field-info name="status" label="Status">Active</x-field-info>

{{-- Display a hyperlink --}}
<x-field-link name="site" label="Website" href="https://example.com" value="Visit Site" />
<x-field-link name="site" label="Website" href="https://example.com" target="_blank">Visit Site</x-field-link>
```

### Select field

```blade
<x-field-select
    name="country"
    label="Country"
    :options="$countries"      {{-- array or Collection: [id => label] or [['id' => ..., 'text' => ...]] --}}
    placeholder="Select one"
    value="{{ $record->country }}"
/>
```

### Checkbox / Toggle

```blade
<x-field-checkbox name="agree" label="I agree" value="1" :checked="$user->agreed" />
<x-field-toggle name="active" label="Active" :checked="$record->active" />
```

### Livewire integration

Field components pass through all `wire:*` attributes transparently:

```blade
<x-field-text name="search" label="Search" wire:model.live="search" />
<x-field-select name="status" label="Status" :options="$statuses" wire:model="status" />
```

---

## Standalone Inputs (`x-input-*`)

Use input components without label/layout — e.g. inside a custom slot or `x-field-slot`:

```blade
<x-field-slot name="custom" label="Custom">
    <x-input-text name="custom" value="{{ $value }}" />
</x-field-slot>

{{-- Hidden input --}}
<x-input-hidden name="user_id" :value="auth()->id()" />
```

### Input base props (all inputs)

| Prop | Type | Description |
|---|---|---|
| `name` | string | Input `name` attribute (required) |
| `id` | string | Input `id` (defaults to `name`) |
| `value` | string | Current value |
| `placeholder` | string | Placeholder text |
| `type` | string | HTML input type override |
| `min` / `max` / `step` | numeric | Numeric constraints |
| `icon-left` / `icon-right` | string | Icon component name |
| `prefix-text` / `suffix-text` | string | Wrapper text |
| `required-input` | bool | Native required attribute |

---

## Theming & Styling

All styles come from `config/themes/default.php`. Every component reads its defaults from a keyed section matching its component name.

### How styles resolve

```
config('themes.default.input.background')  →  'bg-input'
config('themes.default.button.default.color')  →  'text-button-default hover:text-button-default-hover'
```

### Overriding styles per-instance

Pass any style parameter directly on the component. They override the theme default:

```blade
{{-- Override a single style --}}
<x-field-text name="code" label="Code" color="text-red-600" />
<x-button brand padding="px-6 py-3">Save</x-button>
<x-alert danger background="bg-red-50 border border-red-200">Warning!</x-alert>
```

### Common style props available on most components

`background`, `border`, `color`, `font`, `other`, `padding`, `rounded`, `shadow`, `width`

### Overriding theme globally

Publish the theme file and edit:

```bash
php artisan vendor:publish --tag=control-ui-kit-theme
```

This copies `config/themes/default.php` to your app's config directory.

---

## Button (`x-button`)

```blade
{{-- Style variants (boolean flags) --}}
<x-button default>Default</x-button>
<x-button brand>Save</x-button>
<x-button danger>Delete</x-button>
<x-button info>Info</x-button>
<x-button success>Done</x-button>
<x-button warning>Caution</x-button>
<x-button muted>Cancel</x-button>

{{-- As a link --}}
<x-button brand href="/dashboard">Go to Dashboard</x-button>

{{-- With icon --}}
<x-button brand icon="icon-save">Save Record</x-button>

{{-- Form submit with single-click prevention --}}
<x-button brand type="submit" :single-click="true">Submit</x-button>

{{-- Disabled --}}
<x-button brand disabled>Unavailable</x-button>
```

Key props: `href` (renders `<a>` instead of `<button>`), `icon`, `type` (submit/button/reset), `single-click`, `text` (alternative to slot).

---

## Alert (`x-alert`)

```blade
<x-alert default title="Note" text="Something happened." />
<x-alert brand title="Welcome" text="Signed in successfully." />
<x-alert danger title="Error" text="Something went wrong." />
<x-alert info title="Tip">Use keyboard shortcuts for faster navigation.</x-alert>
<x-alert success title="Saved">Your changes have been saved.</x-alert>
<x-alert warning title="Warning" text="This action cannot be undone." />
<x-alert muted title="Note" text="This feature is deprecated." />

{{-- With multiple URLs --}}
<x-alert info title="Learn more" :urls="[['url' => '/docs', 'text' => 'Documentation'], ['url' => '/help', 'text' => 'Help']]" />

{{-- Size variants --}}
<x-alert danger tiny title="Small alert" />
<x-alert danger small title="Small alert" />
<x-alert danger medium title="Medium alert" />   {{-- default --}}
<x-alert danger large title="Large alert" />
```

---

## Panel (`x-panel`)

```blade
<x-panel>
    <x-panel-header>Panel Title</x-panel-header>

    <x-panel-section>
        Content goes here
    </x-panel-section>

    <x-panel-divider />

    <x-panel-section>
        More content
    </x-panel-section>

    <x-panel-footer>
        <x-button brand>Save</x-button>
    </x-panel-footer>
</x-panel>
```

---

## Modal (`x-modal`)

```blade
{{-- Trigger button --}}
<x-button brand @click="$dispatch('open-modal', 'my-modal')">Open</x-button>

{{-- Modal --}}
<x-modal name="my-modal" title="Confirm Action">
    <p>Are you sure?</p>
    <x-slot:footer>
        <x-button brand @click="$dispatch('close-modal', 'my-modal')">Confirm</x-button>
        <x-button muted @click="$dispatch('close-modal', 'my-modal')">Cancel</x-button>
    </x-slot:footer>
</x-modal>

{{-- Confirmation dialog shorthand --}}
<x-modal-confirmation name="delete-confirm" title="Delete record?" />
```

---

## Tabs (`x-tabs`)

```blade
<x-tabs>
    <x-tabs-heading name="details" label="Details" active />
    <x-tabs-heading name="history" label="History" />

    <x-tabs-panel name="details">
        Details content here
    </x-tabs-panel>

    <x-tabs-panel name="history">
        History content here
    </x-tabs-panel>
</x-tabs>
```

---

## Table (`x-table`)

```blade
<x-table
    :search="$search"
    :order-by="$orderBy"
    :sort="$sort"
    :active-filters="$activeFilters"
>
    <x-slot:filters>
        <x-table-filter name="status" label="Status" :options="$statuses" :value="$filterStatus" />
    </x-slot:filters>

    <x-slot:headings>
        <x-table-heading name="name" label="Name" sortable :order-by="$orderBy" :sort="$sort" />
        <x-table-heading name="email" label="Email" />
        <x-table-heading name="actions" label="" />
    </x-slot:headings>

    @foreach ($users as $user)
        <x-table-row>
            <x-table-cell>{{ $user->name }}</x-table-cell>
            <x-table-cell>{{ $user->email }}</x-table-cell>
            <x-table-cell>
                <x-table-action href="{{ route('users.edit', $user) }}" icon="icon-edit" label="Edit" />
            </x-table-cell>
        </x-table-row>
    @endforeach

    <x-table-empty :colspan="3" message="No users found." />

    <x-slot:pagination>
        <x-table-pagination :links="$users" />
    </x-slot:pagination>
</x-table>
```

### Table with Livewire search and sort

```php
// Livewire component
public string $search = '';
public string $orderBy = 'name';
public string $sort = 'asc';

public function updatedSearch(): void { $this->resetPage(); }
```

```blade
<x-table wire:model.live="search" :search="$search" :order-by="$orderBy" :sort="$sort">
    <x-table-heading name="name" label="Name" sortable
        wire:click="$set('orderBy', 'name')" :order-by="$orderBy" :sort="$sort" />
    ...
</x-table>
```

---

## Text & Link (`x-text`, `x-link`)

Styled inline text and anchor elements with colour variants:

```blade
<x-text default>Default text</x-text>
<x-text brand>Brand coloured text</x-text>
<x-text danger>Error text</x-text>
<x-text muted>Muted/secondary text</x-text>

<x-link href="/dashboard" brand>Go to Dashboard</x-link>
<x-link href="/help" muted>Help</x-link>
<x-link href="https://example.com" default target="_blank">External Link</x-link>
```

Variants: `default`, `brand`, `danger`, `info`, `success`, `muted`, `warning`.

---

## Icons (`x-icon-*`)

Over 300 icons available. All accept `size` and `color` props (Tailwind classes):

```blade
<x-icon-edit size="h-5 w-5" color="text-gray-500" />
<x-icon-trash size="h-4 w-4" color="text-red-500" />
<x-icon-check-circle size="h-6 w-6" color="text-green-500" />
<x-icon-spinner size="h-5 w-5" />

{{-- File type icons --}}
<x-icon-file-pdf size="h-8 w-8" />
<x-icon-file-csv size="h-8 w-8" />

{{-- Brand/logo icons --}}
<x-icon-logo-spotify size="h-6 w-6" />
<x-icon-logo-stripe size="h-6 w-6" />
```

Dynamic icon via variable:
```blade
<x-dynamic-component :component="'icon-' . $iconName" size="h-5 w-5" />
```

---

## Layout Components

```blade
<x-layout-body>
    <x-layout-header>
        {{-- Top navigation --}}
    </x-layout-header>

    <x-layout-content>
        <x-layout-toolbar>
            {{-- Page toolbar --}}
        </x-layout-toolbar>

        {{-- Page content --}}
    </x-layout-content>

    <x-layout-footer>
        {{-- Footer content --}}
    </x-layout-footer>
</x-layout-body>
```

---

## Dropdown Menu

```blade
<x-dropdown-menu label="Options">
    <x-dropdown-option href="/edit" label="Edit" icon="icon-edit" />
    <x-dropdown-option href="/duplicate" label="Duplicate" icon="icon-copy" />
    <x-dropdown-divider />
    <x-dropdown-option href="/delete" label="Delete" icon="icon-trash" danger />
</x-dropdown-menu>
```

---

## Pill / Badge

```blade
<x-pill default label="Draft" />
<x-pill brand label="Active" />
<x-pill success label="Approved" />
<x-pill danger label="Rejected" />
<x-pill warning label="Pending" />
<x-pill muted label="Archived" />
```

---

## Progress Bar

```blade
<x-progress-bar :value="65" />
<x-progress-bar :value="30" brand />
<x-progress-bar :value="90" success />
<x-progress-bar :value="20" danger small />
```

---

## Adding or Modifying Components

### File locations

| File type | Location |
|---|---|
| PHP class | `src/Components/{Category}/{Name}.php` |
| Blade view | `resources/views/control-ui-kit/forms/fields/{name}.blade.php` |
| Registration | `config/control-ui-kit.php` under `'components'` |
| Theme defaults | `config/themes/default.php` |
| Tests | `tests/Components/{Category}/{Name}Test.php` |

### Creating a new Field component (example pattern)

```php
// src/Components/Forms/Fields/MyField.php
class MyField extends InputField
{
    public string $myProp;

    public function __construct(
        string $name = null,
        string $label = null,
        string $help = null,
        string $value = null,
        string $layout = null,
        string $myProp = null,
    ) {
        parent::__construct($name, $label, $help, $value, $layout);
        $this->myProp = $myProp ?? '';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.my');
    }
}
```

```blade
{{-- resources/views/control-ui-kit/forms/fields/my.blade.php --}}
<x-form-field :layout="$layout" input="my-input-type" :name="$name" :help="$help" :label="$label" :my-prop="$myProp" {{ $attributes }} :value="$slot->isNotEmpty() ? $slot : $value" />
```

```php
// Register in config/control-ui-kit.php
'field-my' => \ControlUIKit\Components\Forms\Fields\MyField::class,
```

### Read-only display fields (info/link pattern)

For fields that display data without an actual input, pass `input="blank"` (plain text) or `input="link"` (anchor) and set `name=""`:

```blade
{{-- Renders: <div>{{ value }}</div> --}}
<x-form-field :layout="$layout" input="blank" name="" :label="$label" {{ $attributes }} :value="$slot->isNotEmpty() ? $slot : $value" />

{{-- Renders: <x-link href="...">{{ value }}</x-link> --}}
<x-form-field :layout="$layout" input="link" name="" :label="$label" :href="$href" {{ $attributes }} :value="$slot->isNotEmpty() ? $slot : $value" />
```

---

## Testing Components

Tests use `ComponentTestCase` (extends Testbench) with the `assertComponentRenders($expected, $template)` helper.

### Test structure

```php
class MyFieldTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        // Set theme config used by the component
        Config::set('themes.default.label.background', 'label-background');
        // ... other label.* and error.* configs ...
        Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');
        Config::set('themes.default.form-layout-responsive.content', 'content-style');
        Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
        // ...
    }

    #[Test]
    public function the_field_can_be_rendered(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-my name="field" label="Field" value="Hello" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="...">
                    <p class="text-style"> <span>Field</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        ...rendered input...
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
```

### Standard Config::set calls for field tests

Any test for a `field-*` component needs these configs set in `setUp()`:

```php
// Label styles
Config::set('themes.default.label.background', 'label-background');
Config::set('themes.default.label.border', 'label-border');
Config::set('themes.default.label.color', 'label-color');
Config::set('themes.default.label.font', 'label-font');
Config::set('themes.default.label.other', 'label-other');
Config::set('themes.default.label.padding', 'label-padding');
Config::set('themes.default.label.rounded', 'label-rounded');
Config::set('themes.default.label.shadow', 'label-shadow');

// Error styles
Config::set('themes.default.error.color', 'color');
Config::set('themes.default.error.font', 'font');
Config::set('themes.default.error.other', 'other');
Config::set('themes.default.error.padding', 'padding');

// Responsive layout styles
Config::set('themes.default.form-layout-responsive.content', 'content-style');
Config::set('themes.default.form-layout-responsive.help', 'help-style');
Config::set('themes.default.form-layout-responsive.help-mobile', 'help-mobile');
Config::set('themes.default.form-layout-responsive.text', 'text-style');
Config::set('themes.default.form-layout-responsive.label', 'label-style');
Config::set('themes.default.form-layout-responsive.required-size', 'required-size');
Config::set('themes.default.form-layout-responsive.required-color', 'required-color');
Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');
```

### Running tests

```bash
./vendor/bin/phpunit tests/Components/Forms/Fields/MyFieldTest.php --no-coverage
./vendor/bin/phpunit --no-coverage   # full suite
```

### Important: HTML indentation in tests

The `assertComponentRenders` helper runs output through the Dindent indenter. Write expected HTML with 4-space indentation matching the nesting depth. The `<a>` tag is treated as a block element by the indenter. Use `str_replace` tricks if exact whitespace matters.
