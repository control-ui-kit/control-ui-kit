<x-form-field layout="inline" input="input" :name="$name" :help="$help" :label="$label" {{ $attributes }} :value="$slot->isNotEmpty() ? $slot : $value" />
