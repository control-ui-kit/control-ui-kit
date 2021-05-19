<div id="container_{{ $iso }}{{ $id }}" {{ $attributes->merge($classes()) }}></div>

<script>
    let data_{{ $iso }}{{ $id }} = {!! $values !!};
    let map_{{ $iso }}{{ $id }} = Highcharts;

    map_{{ $iso }}{{ $id }}.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/{{ $iso }}.json', function(geojson) {
        map_{{ $iso }}{{ $id }}.mapChart('container_{{ $iso }}{{ $id }}', {
            chart: {
                map: geojson
            },
            title: {
                text: '{{ $title }}'
            },
            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },
            colorAxis: {
                tickPixelInterval: 100
            },
            series: [{
                data: data_{{ $iso }}{{ $id }},
                keys: ['iso_3166_2', 'value'],
                joinBy: 'iso_3166_2',
                name: '{{ $name }}',
                states: {
                    hover: {
                        color: '#a4edba'
                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.properties.name}'
                }
            }]
        });
    });
</script>