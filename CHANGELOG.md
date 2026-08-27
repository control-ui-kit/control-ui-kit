# Changelog

All notable changes to `control-ui-kit/control-ui-kit` will be documented in this file

## Unreleased

### Added

- `x-tooltip` accepts a `width` style attribute (theme: `tooltip.width`, default `max-w-[min(20rem,calc(100vw-1rem))]`) so the maximum width of the tooltip bubble can be themed or overridden per tooltip. Pass `width="none"` to remove the constraint.
- `x-alert` now supports an optional close button, which is rendered when `close-button-url` is set. The icon and colour can be overridden with `close-button-icon` (theme: `alert.close-button-icon`, default `icon-close`) and `close-button-color` (theme: `alert.close-button-color`, defaults to the resolved `icon-color`); both accept `none`. Any other attribute prefixed with `close-button-` is passed through to the close button with the prefix stripped, so it can be wired up to Alpine or Livewire - for example `close-button-x-on:click.prevent="show = false"`.

### Changed

- **BREAKING:** Renamed the theme HTML attribute from `data-theme` to `data-ui-theme` to avoid conflicts with browser extensions (e.g. Loom) that rewrite the generic `data-theme` attribute and break theme styling. Generated theme CSS now targets `:root[data-ui-theme="<name>"]`.
  - Migration: update your `<html>` tag from `data-theme="<name>"` to `data-ui-theme="<name>"`, and regenerate (or find/replace `data-theme` → `data-ui-theme` in) any already-generated theme CSS files.

### Fixed

- `x-tooltip` never wrapped, so a long tooltip (for example a sentence of field help text) rendered as a single line wider than the viewport and ran off both edges of the screen. The theme's `tooltip.other` was `whitespace-nowrap`; it is now `whitespace-normal wrap-break-word`, and the bubble is capped by the new `tooltip.width` style. Because a wrapped bubble is wide enough to overhang the trigger, the teleported tooltip now measures itself on show and shifts along its cross axis (horizontally for `top`/`bottom`, vertically for `left`/`right`) to keep an 8px margin inside the viewport, with the arrow counter-shifted by the same amount - clamped to the bubble's half-extent - so it stays pointing at the trigger. The teleported wrapper is also anchored at `top:0;left:0` and positioned entirely through `transform: translate(...)`, rather than being offset with `top`/`left`: a `position: fixed` box offset by `left` only has `100vw - left` of available width, so a tooltip on a trigger near the right edge of a narrow screen shrank to its min-content width (one word per line) before any of the width rules above could apply.
- `x-input-otc` / `x-field-otc` digit boxes did not shrink with the viewport, so on a narrow phone the row ran off the side of its container. The boxes are a fixed `width` in a flex row, and three separate things stopped that row from shrinking: the component's wrapper is dropped into the field layout's flex slot, where its automatic minimum size (`min-width: auto`) resolved to the combined width of the digits; the `<fieldset>` is given `min-inline-size: min-content` by the UA stylesheet, holding it at that same width; and each digit is itself a flex item whose automatic minimum size kept it at its own width, so `flex-shrink` never reduced it. All three now carry `min-w-0`, hardcoded in the template rather than themed so that overriding `fieldset` or `other` cannot drop them. Removing any one of the three brings the overflow back.
- `x-input-otc` / `x-field-otc` posted only the first digit of a typed code. The component watched all six boxes with a single `$watch('digit_1, digit_2, ...')`; Alpine compiles a watch expression to `__self.result = <expression>` and assignment binds tighter than the comma operator, so the watched value was `digit_1` alone and Alpine's `watch()` skipped the callback whenever it was unchanged. Typing into any box but the first therefore never re-ran `updateValue()`, leaving the hidden field holding whatever it held after the first box was filled. It now registers one watcher per digit. A pasted or autofilled code was never affected, because `populateNext()` fills every digit synchronously before the `digit_1` callback runs.

## 1.0.0 - ???

- Initial release
