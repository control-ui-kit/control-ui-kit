{{--
    Resolves a `max-width` shorthand - `sm`, `md`, `lg`, `xl`, `2xl`, `3xl`, `4xl` - to the
    Tailwind class the panel is sized by.

    The guard on the front makes the function idempotent. `maxWidth` is already resolved by the
    component when the modal renders, and `openModal()` runs it through here again - without the
    guard every already-resolved value fell through to `default:` and every modal opened that way
    silently came out `sm:max-w-xl`. The guard is also what lets `openDialog()` / `openConfirm()`
    pass an already-resolved `detail.width` straight through.

    Kept in step with `ControlUIKit\\Traits\\ResolvesModalWidth` and with `maxWidth()` in
    `resources/js/control-ui-kit.js`, which resolve the same shorthands server-side and for the
    `dialog-modal` / `confirm-modal` events respectively.
--}}
        width(maxWidth) {
            if (String(maxWidth).startsWith('sm:max-w-')) { return maxWidth }
            switch (maxWidth) {
                case 'sm':
                    return 'sm:max-w-sm';
                case 'md':
                    return 'sm:max-w-md';
                case 'lg':
                    return 'sm:max-w-lg';
                case '2xl':
                    return 'sm:max-w-2xl';
                case '3xl':
                    return 'sm:max-w-3xl';
                case '4xl':
                    return 'sm:max-w-4xl';
                case 'xl':
                default:
                    return 'sm:max-w-xl';
            }
        }
