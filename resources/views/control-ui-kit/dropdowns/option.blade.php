<a {!! $href !!} {{ $attributes->merge(['class' => 'px-3 h-9 w-full flex-x-3 justify-between cursor-pointer group text-nowrap text-nav-option hover:text-nav-option-hover hover:bg-nav-option-hover hover:no-underline']) }}>
    {{ $slot }}
</a>
