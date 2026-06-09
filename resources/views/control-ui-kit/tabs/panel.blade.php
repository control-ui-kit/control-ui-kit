<div x-show="showTab == '{{ $id }}'" x-cloak
    {{ $attributes->merge($classes()) }}>
    @if ($dynamicComponent)
        @php
            $compClass = config('control-ui-kit.components.' . $dynamicComponent);
        @endphp
        @if ($compClass && !empty($componentData))
            @php
                $instance = new $compClass(...$componentData);
                $resolvedView = $instance->resolveView();
                $viewData = array_merge($instance->data(), [
                    'slot' => new \Illuminate\View\ComponentSlot(''),
                ]);
                $output = $resolvedView instanceof \Illuminate\View\View
                    ? $resolvedView->with($viewData)->render()
                    : view($resolvedView, $viewData)->render();
            @endphp
            {!! $output !!}
        @elseif (!empty($componentData))
            {!! view('components.' . $dynamicComponent, $componentData)->render() !!}
        @else
            <x-dynamic-component :component="$dynamicComponent" />
        @endif
    @else
        {{ $slot }}
    @endif
</div>
