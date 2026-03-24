<div {{ $attributes->merge($classes())->whereStartsWith('class') }}>
    <input name="{{ $name }}"
       type="checkbox"
       id="{{ $id }}"
       value="{{ $value }}"
        {{ $checked }}
        @if ($disabled) disabled @endif
        class="{{ $inputClasses() }}"
        {{ $attributes->except(['class']) }}
    />
    <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
    </svg>
</div>
