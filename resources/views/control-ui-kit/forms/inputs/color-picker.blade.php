<input name="{{ $name }}"
       type="text"
       id="{{ $id }}"
       @if($placeholder)placeholder="{{ $placeholder }}"@endif
       @if ($value)value="{{ $value }}"@endif
       {{ $attributes->merge($classes()) }}
/>
<div id="custom_{{ $id }}" class="h-4 w-8 cursor-pointer inline-block border border-gray-300" style="background-color:{{ $value }}"></div>

<script>
    window["color_picker_{{ $id }}"] = new Picker({
        parent: document.getElementById('custom_{{ $id }}'),
        color: document.getElementById('{{ $id }}').value,
        alpha: false,
        editorFormat: 'hex',
        onDone: function(color) {
            document.getElementById('{{ $id }}').value = color.hex.substr(0, 7);

            document.getElementById('custom_{{ $id }}').style.background = color.hex.substr(0, 7);
        },
    });

    document.getElementById('custom_{{ $id }}').addEventListener('click', function(e) {
        e.preventDefault();
    });
</script>