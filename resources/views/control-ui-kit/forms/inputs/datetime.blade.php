<x-input-date
    :name="$name"
    :id="$id"
    show-time
    :show-seconds="$showSeconds"
    :clock-type="$clockType"
    :hour-step="$hourStep"
    :minute-step="$minuteStep"
    :format="$format"
    :data="$dataFormat"
    :icon="$icon"
    :linked-to="$linkedTo"
    :linked-from="$linkedFrom"
    {{ $attributes }}
/>
