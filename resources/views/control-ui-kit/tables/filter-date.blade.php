<div
    x-data="{
        toggle() {
            if (fields['{{ $name }}'].toggle) {
                fields['{{ $name }}'].selected = fields['{{ $name }}'].unset
            }
        }
    }"
    x-effect="fields['{{ $name }}'].toggle = fields['{{ $name }}'].selected !== null && fields['{{ $name }}'].selected !== fields['{{ $name }}'].unset"
    class="text-sm flex justify-between items-center mr-2"
>
    <div class="flex shrink-0 space-x-2 items-center m-4">
        <x-input-checkbox
            name="{{ $name }}_toggle"
            x-model="fields['{{ $name }}'].toggle"
            x-on:click="toggle()"
        />
        <label for="{{ $name }}_toggle" class="cursor-pointer whitespace-nowrap">{{ $label }}</label>
    </div>

    <x-input-date
        id="{{ $id }}"
        name="{{ $name }}"
        :width="$width"
        :format="$format"
        :data="$dataFormat"
        :min="$min"
        :max="$max"
        :week-numbers="$weekNumbers"
        :years-before="$yearsBefore"
        :years-after="$yearsAfter"
        :show-time="$showTime"
        :show-seconds="$showSeconds"
        :clock-type="$clockType"
        :time-only="$timeOnly"
        :hour-step="$hourStep"
        :minute-step="$minuteStep"
        :icon="$dateIcon"
        :linked-to="$linkedTo"
        :linked-from="$linkedFrom"
        x-model="fields['{{ $name }}'].selected"
    />
</div>
