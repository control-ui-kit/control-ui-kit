# Changelog

All notable changes to `control-ui-kit/control-ui-kit` will be documented in this file

## Unreleased

### Added

- `x-alert` now supports an optional close button, which is rendered when `close-button-url` is set. The icon and colour can be overridden with `close-button-icon` (theme: `alert.close-button-icon`, default `icon-close`) and `close-button-color` (theme: `alert.close-button-color`, defaults to the resolved `icon-color`); both accept `none`. Any other attribute prefixed with `close-button-` is passed through to the close button with the prefix stripped, so it can be wired up to Alpine or Livewire - for example `close-button-x-on:click.prevent="show = false"`.

### Changed

- **BREAKING:** Renamed the theme HTML attribute from `data-theme` to `data-ui-theme` to avoid conflicts with browser extensions (e.g. Loom) that rewrite the generic `data-theme` attribute and break theme styling. Generated theme CSS now targets `:root[data-ui-theme="<name>"]`.
  - Migration: update your `<html>` tag from `data-theme="<name>"` to `data-ui-theme="<name>"`, and regenerate (or find/replace `data-theme` → `data-ui-theme` in) any already-generated theme CSS files.

## 1.0.0 - ???

- Initial release
