<body {{ $attributes->merge($classes()) }} data-theme="{{ $theme }}">
{{ $slot }}
@controlUiKitScripts
</body>
