<x-form-field layout="inline" input="input" :name="$name" :help="$help" :label="$label" :required="$required" {{ $attributes }} :value="$slot->isNotEmpty() ? $slot : $value" />
