<x-input name="{{ $name }}"
         type="search"
         id="{{ $id }}"
         :value="$value"
         placeholder="{{ $placeholder }}"
{{--         :$attributes="$attributes"--}}
         :icon-left="$iconLeft"
         :icon-right="$iconRight"
/>

{{--    <div {{ $attributes->merge($wrapperClasses())->only('class') }}>--}}
{{--        <input name="{{ $name }}"--}}
{{--               type="number"--}}
{{--               id="{{ $id }}"--}}
{{--               min="0"--}}
{{--               max="100"--}}
{{--               @isset($step)step="{{ $step }}"@endif--}}
{{--               @if($value)value="{{ $value }}"@endif--}}
{{--               @if($placeholder)placeholder="{{ $placeholder }}"@endif--}}
{{--               class="{{ $inputClasses() }}"--}}
{{--               {{ $attributes->except('class') }}--}}
{{--        />--}}
{{--        <x-input.embed position="right" :icon="$iconRight" :icon-size="$iconSize" :styles="$iconStyles" />--}}
{{--    </div>--}}
