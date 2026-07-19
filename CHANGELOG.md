# Changelog

All notable changes to `control-ui-kit/control-ui-kit` will be documented in this file

## Unreleased

### Changed

- **BREAKING:** Renamed the theme HTML attribute from `data-theme` to `data-ui-theme` to avoid conflicts with browser extensions (e.g. Loom) that rewrite the generic `data-theme` attribute and break theme styling. Generated theme CSS now targets `:root[data-ui-theme="<name>"]`.
  - Migration: update your `<html>` tag from `data-theme="<name>"` to `data-ui-theme="<name>"`, and regenerate (or find/replace `data-theme` → `data-ui-theme` in) any already-generated theme CSS files.

## 1.0.0 - ???

- Initial release
