@unless ($icon)
<input name="{{ $name }}"
       type="number"
       id="{{ $id }}"
       @if($value)value="{{ $value }}"@endif
       min="0"
       max="100"
       @isset($step)step="{{ $step }}"@endif
       @if($placeholder)placeholder="{{ $placeholder }}"@endif
    {{ $attributes->merge($classes()) }} />
@else

    <div class="flex rounded-md shadow-sm w-40">
        <input name="{{ $name }}"
               type="number"
               id="{{ $id }}"
               dir="rtl"
               class="text-right flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md focus:border-input focus:outline-none focus:ring-brand text-input placeholder-input border-input bg-input" placeholder="100">
        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500">
            <x-icon.percent size="w-4 h-4" />
        </span>
    </div>

    <x-input.icon-right icon="icon.percent">
        <input name="{{ $name }}"
               type="number"
               id="{{ $id }}"
               dir="rtl"
               class="text-right flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md" placeholder="100">
    </x-input.icon-right>
{{--    --}}
{{--    <div {{ $attributes->merge($classes('flex', ['rounded', 'shadow'])) }}>--}}
{{--        --}}
{{--        <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500">--}}
{{--            <x-icon.percent size="w-4 h-4" />--}}
{{--        </span>--}}
{{--    </div>--}}

{{--    <x-input.text name="" icon="right:icon.cog"--}}


@endif
