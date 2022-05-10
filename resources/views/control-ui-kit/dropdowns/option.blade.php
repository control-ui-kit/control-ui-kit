<a {!! $href !!} {{ $attributes->merge(['class' => 'px-4 py-2 text-sm w-full flex items-center space-x-3 justify-between cursor-pointer group text-nowrap text-nav-bar-option hover:text-nav-bar-option-hover hover:bg-nav-bar-option-hover hover:no-underline']) }}>
    {{ $slot }}
</a>
