<div id="container_{{ $iso }}" {{ $attributes->merge($classes()) }}></div>

<script>
    let data_{{ $iso }} = {!! $values !!};
    let map_{{ $iso }} = Highcharts;

    map_{{ $iso }}.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/{{ $iso }}.json', function(geojson) {
        map_{{ $iso }}.mapChart('container_{{ $iso }}', {
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
                data: data_{{ $iso }},
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