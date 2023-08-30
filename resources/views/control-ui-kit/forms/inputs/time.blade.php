<x-input-date
    :name="$name"
    :id="$id"
    time-only
    :show-seconds="$showSeconds"
    :clock-type="$clockType"
    :hour-step="$hourStep"
    :minute-step="$minuteStep"
    :format="$format"
    :data="$dataFormat"
    :icon="$icon"
    {{ $attributes }}
/>
