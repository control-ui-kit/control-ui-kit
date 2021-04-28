<?php

declare(strict_types=1);

namespace Tests\Components\Maps;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class RegionTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.map-region.width', 'w-screen');
        Config::set('themes.default.map-region.height', 'h-screen');
    }

    /** @test */
    public function a_region_map_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="us" :values="[]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_us" class="w-screen h-screen"></div>
            <script>
                let data_us = [];
                let map_us = Highcharts;

                map_us.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/us.json', function(geojson) {
                    map_us.mapChart('container_us', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_us,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_with_title_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="us" :values="[]" title="Murika" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_us" class="w-screen h-screen"></div>
            <script>
                let data_us = [];
                let map_us = Highcharts;

                map_us.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/us.json', function(geojson) {
                    map_us.mapChart('container_us', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: 'Murika'
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
                            data: data_us,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_with_data_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="us" :values="[
                ['US.WA' => 10000]
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_us" class="w-screen h-screen"></div>
            <script>
                let data_us = [{"US.WA":10000}];
                let map_us = Highcharts;

                map_us.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/us.json', function(geojson) {
                    map_us.mapChart('container_us', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_us,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_with_name_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="us" :values="[]" name="Field Name" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_us" class="w-screen h-screen"></div>
            <script>
                let data_us = [];
                let map_us = Highcharts;

                map_us.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/us.json', function(geojson) {
                    map_us.mapChart('container_us', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_us,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Field Name',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_australia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="au" :values="[
                ['AU-ACT', 1],
                ['AU-NSW', 2],
                ['AU-NT', 2],
                ['AU-QLD', 3],
                ['AU-SA', 4],
                ['AU-TAS', 5],
                ['AU-VIC', 6],
                ['AU-WA', 7],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_au" class="w-screen h-screen"></div>
            <script>
                let data_au = [["AU-ACT",1],["AU-NSW",2],["AU-NT",2],["AU-QLD",3],["AU-SA",4],["AU-TAS",5],["AU-VIC",6],["AU-WA",7]];
                let map_au = Highcharts;

                map_au.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/au.json', function(geojson) {
                    map_au.mapChart('container_au', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_au,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_brazil_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="br" :values="[
                ['BR-AC', 1],
                ['BR-AL', 2],
                ['BR-AP', 3],
                ['BR-AM', 4],
                ['BR-BA', 5],
                ['BR-CE', 6],
                ['BR-DF', 7],
                ['BR-ES', 8],
                ['BR-GO', 9],
                ['BR-MA', 10],
                ['BR-MT', 11],
                ['BR-MS', 12],
                ['BR-MG', 13],
                ['BR-PA', 14],
                ['BR-PB', 15],
                ['BR-PR', 16],
                ['BR-PE', 17],
                ['BR-PI', 18],
                ['BR-RJ', 19],
                ['BR-RN', 20],
                ['BR-RS', 21],
                ['BR-RO', 22],
                ['BR-RR', 23],
                ['BR-SC', 24],
                ['BR-SP', 25],
                ['BR-SE', 26],
                ['BR-TO', 27],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_br" class="w-screen h-screen"></div>
            <script>
                let data_br = [["BR-AC",1],["BR-AL",2],["BR-AP",3],["BR-AM",4],["BR-BA",5],["BR-CE",6],["BR-DF",7],["BR-ES",8],["BR-GO",9],["BR-MA",10],["BR-MT",11],["BR-MS",12],["BR-MG",13],["BR-PA",14],["BR-PB",15],["BR-PR",16],["BR-PE",17],["BR-PI",18],["BR-RJ",19],["BR-RN",20],["BR-RS",21],["BR-RO",22],["BR-RR",23],["BR-SC",24],["BR-SP",25],["BR-SE",26],["BR-TO",27]];
                let map_br = Highcharts;

                map_br.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/br.json', function(geojson) {
                    map_br.mapChart('container_br', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_br,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_canada_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ca" :values="[
                ['CA-AB', 1],
                ['CA-BC', 2],
                ['CA-MB', 3],
                ['CA-NB', 4],
                ['CA-NL', 5],
                ['CA-NT', 6],
                ['CA-NS', 7],
                ['CA-NU', 8],
                ['CA-ON', 9],
                ['CA-PE', 10],
                ['CA-QC', 11],
                ['CA-SK', 12],
                ['CA-YT', 13],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ca" class="w-screen h-screen"></div>
            <script>
                let data_ca = [["CA-AB",1],["CA-BC",2],["CA-MB",3],["CA-NB",4],["CA-NL",5],["CA-NT",6],["CA-NS",7],["CA-NU",8],["CA-ON",9],["CA-PE",10],["CA-QC",11],["CA-SK",12],["CA-YT",13]];
                let map_ca = Highcharts;

                map_ca.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ca.json', function(geojson) {
                    map_ca.mapChart('container_ca', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_ca,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_germany_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="de" :values="[
                ['DE-BW', 1],
                ['DE-BY', 2],
                ['DE-BE', 3],
                ['DE-BB', 4],
                ['DE-HB', 5],
                ['DE-HH', 6],
                ['DE-HE', 7],
                ['DE-MV', 8],
                ['DE-NI', 9],
                ['DE-NW', 10],
                ['DE-RP', 11],
                ['DE-SL', 12],
                ['DE-SN', 13],
                ['DE-ST', 14],
                ['DE-SH', 15],
                ['DE-TH', 16],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_de" class="w-screen h-screen"></div>
            <script>
                let data_de = [["DE-BW",1],["DE-BY",2],["DE-BE",3],["DE-BB",4],["DE-HB",5],["DE-HH",6],["DE-HE",7],["DE-MV",8],["DE-NI",9],["DE-NW",10],["DE-RP",11],["DE-SL",12],["DE-SN",13],["DE-ST",14],["DE-SH",15],["DE-TH",16]];
                let map_de = Highcharts;

                map_de.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/de.json', function(geojson) {
                    map_de.mapChart('container_de', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_de,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_spain_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="es" :values="[
                ['ES-AN', 1],
                ['ES-AR', 2],
                ['ES-AS', 3],
                ['ES-IB', 4],
                ['ES-PV', 5],
                ['ES-CN', 6],
                ['ES-CB', 7],
                ['ES-CL', 8],
                ['ES-CM', 9],
                ['ES-CT', 10],
                ['ES-CE', 11],
                ['ES-EX', 12],
                ['ES-GA', 13],
                ['ES-RI', 14],
                ['ES-MD', 15],
                ['ES-ML', 16],
                ['ES-MC', 17],
                ['ES-NC', 18],
                ['ES-VC', 19],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_es" class="w-screen h-screen"></div>
            <script>
                let data_es = [["ES-AN",1],["ES-AR",2],["ES-AS",3],["ES-IB",4],["ES-PV",5],["ES-CN",6],["ES-CB",7],["ES-CL",8],["ES-CM",9],["ES-CT",10],["ES-CE",11],["ES-EX",12],["ES-GA",13],["ES-RI",14],["ES-MD",15],["ES-ML",16],["ES-MC",17],["ES-NC",18],["ES-VC",19]];
                let map_es = Highcharts;

                map_es.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/es.json', function(geojson) {
                    map_es.mapChart('container_es', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_es,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_france_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="fr" :values="[
                ['FR-ARA', 1],
                ['FR-BFC', 2],
                ['FR-BRE', 3],
                ['FR-CVL', 4],
                ['FR-COR', 5],
                ['FR-GES', 6],
                ['FR-HDF', 7],
                ['FR-IDF', 8],
                ['FR-NOR', 9],
                ['FR-NAQ', 10],
                ['FR-OCC', 11],
                ['FR-PDL', 12],
                ['FR-PAC', 13],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_fr" class="w-screen h-screen"></div>
            <script>
                let data_fr = [["FR-ARA",1],["FR-BFC",2],["FR-BRE",3],["FR-CVL",4],["FR-COR",5],["FR-GES",6],["FR-HDF",7],["FR-IDF",8],["FR-NOR",9],["FR-NAQ",10],["FR-OCC",11],["FR-PDL",12],["FR-PAC",13]];
                let map_fr = Highcharts;

                map_fr.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/fr.json', function(geojson) {
                    map_fr.mapChart('container_fr', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_fr,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_britain_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="gb" :values="[
                ['GB-ABD', 1],
                ['GB-ANS', 2],
                ['GB-ANN', 3],
                ['GB-AND', 4],
                ['GB-AGB', 5],
                ['GB-ABC', 6],
                ['GB-AYR', 7],
                ['GB-BDF', 8],
                ['GB-BFS', 9],
                ['GB-WBK', 10],
                ['GB-BGW', 11],
                ['GB-BGE', 12],
                ['GB-BST', 13],
                ['GB-BKM', 14],
                ['GB-CAY', 15],
                ['GB-CAM', 16],
                ['GB-CRF', 17],
                ['GB-CMN', 18],
                ['GB-CCG', 19],
                ['GB-CGN', 20],
                ['GB-CHE', 21],
                ['GB-CLK', 22],
                ['GB-CWY', 23],
                ['GB-CON', 24],
                ['GB-DUR', 25],
                ['GB-CMA', 26],
                ['GB-DEN', 27],
                ['GB-DBY', 28],
                ['GB-DRS', 29],
                ['GB-DEV', 30],
                ['GB-DOR', 31],
                ['GB-DGY', 32],
                ['GB-EDU', 33],
                ['GB-DND', 34],
                ['GB-ELN', 35],
                ['GB-ERW', 36],
                ['GB-ERY', 37],
                ['GB-ESX', 38],
                ['GB-EDH', 39],
                ['GB-ESS', 40],
                ['GB-FAL', 41],
                ['GB-FMO', 42],
                ['GB-FIF', 43],
                ['GB-FLN', 44],
                ['GB-GLG', 45],
                ['GB-GLS', 46],
                ['GB-LND', 47],
                ['GB-MAN', 48],
                ['GB-GWN', 49],
                ['GB-HAM', 50],
                ['GB-HEF', 51],
                ['GB-HRT', 52],
                ['GB-HLD', 53],
                ['GB-IVC', 54],
                ['GB-AGY', 55],
                ['GB-IOW', 56],
                ['GB-IOS', 57],
                ['GB-KEN', 58],
                ['GB-LAN', 59],
                ['GB-LEC', 60],
                ['GB-LIN', 61],
                ['GB-LBC', 62],
                ['GB-MER', 63],
                ['GB-MTY', 64],
                ['GB-MEA', 65],
                ['GB-MUL', 66],
                ['GB-MLN', 67],
                ['GB-MON', 68],
                ['GB-MRY', 69],
                ['GB-NTL', 70],
                ['GB-NWP', 71],
                ['GB-NMD', 72],
                ['GB-NFK', 73],
                ['GB-NLK', 74],
                ['GB-NYK', 75],
                ['GB-NTH', 76],
                ['GB-NBL', 77],
                ['GB-NTT', 78],
                ['GB-ORK', 79],
                ['GB-OXF', 80],
                ['GB-PEM', 81],
                ['GB-PKN', 82],
                ['GB-POW', 83],
                ['GB-RFW', 84],
                ['GB-RCT', 85],
                ['GB-RUT', 86],
                ['GB-SCB', 87],
                ['GB-ZET', 88],
                ['GB-SHR', 89],
                ['GB-SOM', 90],
                ['GB-SLK', 91],
                ['GB-SYS', 92],
                ['GB-STS', 93],
                ['GB-STG', 94],
                ['GB-SFK', 95],
                ['GB-SRY', 96],
                ['GB-SWA', 97],
                ['GB-TOF', 98],
                ['GB-TNW', 99],
                ['GB-VGL', 100],
                ['GB-WAR', 101],
                ['GB-WLN', 102],
                ['GB-WMD', 103],
                ['GB-WSX', 104],
                ['GB-WYK', 105],
                ['GB-WIL', 106],
                ['GB-WOR', 107],
                ['GB-WRX', 108],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_gb" class="w-screen h-screen"></div>
            <script>
                let data_gb = [["GB-ABD",1],["GB-ANS",2],["GB-ANN",3],["GB-AND",4],["GB-AGB",5],["GB-ABC",6],["GB-AYR",7],["GB-BDF",8],["GB-BFS",9],["GB-WBK",10],["GB-BGW",11],["GB-BGE",12],["GB-BST",13],["GB-BKM",14],["GB-CAY",15],["GB-CAM",16],["GB-CRF",17],["GB-CMN",18],["GB-CCG",19],["GB-CGN",20],["GB-CHE",21],["GB-CLK",22],["GB-CWY",23],["GB-CON",24],["GB-DUR",25],["GB-CMA",26],["GB-DEN",27],["GB-DBY",28],["GB-DRS",29],["GB-DEV",30],["GB-DOR",31],["GB-DGY",32],["GB-EDU",33],["GB-DND",34],["GB-ELN",35],["GB-ERW",36],["GB-ERY",37],["GB-ESX",38],["GB-EDH",39],["GB-ESS",40],["GB-FAL",41],["GB-FMO",42],["GB-FIF",43],["GB-FLN",44],["GB-GLG",45],["GB-GLS",46],["GB-LND",47],["GB-MAN",48],["GB-GWN",49],["GB-HAM",50],["GB-HEF",51],["GB-HRT",52],["GB-HLD",53],["GB-IVC",54],["GB-AGY",55],["GB-IOW",56],["GB-IOS",57],["GB-KEN",58],["GB-LAN",59],["GB-LEC",60],["GB-LIN",61],["GB-LBC",62],["GB-MER",63],["GB-MTY",64],["GB-MEA",65],["GB-MUL",66],["GB-MLN",67],["GB-MON",68],["GB-MRY",69],["GB-NTL",70],["GB-NWP",71],["GB-NMD",72],["GB-NFK",73],["GB-NLK",74],["GB-NYK",75],["GB-NTH",76],["GB-NBL",77],["GB-NTT",78],["GB-ORK",79],["GB-OXF",80],["GB-PEM",81],["GB-PKN",82],["GB-POW",83],["GB-RFW",84],["GB-RCT",85],["GB-RUT",86],["GB-SCB",87],["GB-ZET",88],["GB-SHR",89],["GB-SOM",90],["GB-SLK",91],["GB-SYS",92],["GB-STS",93],["GB-STG",94],["GB-SFK",95],["GB-SRY",96],["GB-SWA",97],["GB-TOF",98],["GB-TNW",99],["GB-VGL",100],["GB-WAR",101],["GB-WLN",102],["GB-WMD",103],["GB-WSX",104],["GB-WYK",105],["GB-WIL",106],["GB-WOR",107],["GB-WRX",108]];
                let map_gb = Highcharts;

                map_gb.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/gb.json', function(geojson) {
                    map_gb.mapChart('container_gb', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_gb,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_mexico_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="mx" :values="[
                ['MX-AGU', 1],
                ['MX-BCN', 2],
                ['MX-BCS', 3],
                ['MX-CAM', 4],
                ['MX-CHP', 5],
                ['MX-CHH', 6],
                ['MX-COA', 7],
                ['MX-COL', 8],
                ['MX-DUR', 9],
                ['MX-GUA', 10],
                ['MX-GRO', 11],
                ['MX-HID', 12],
                ['MX-JAL', 13],
                ['MX-MEX', 14],
                ['MX-MIC', 15],
                ['MX-MOR', 16],
                ['MX-NAY', 17],
                ['MX-NLE', 18],
                ['MX-OAX', 19],
                ['MX-PUE', 20],
                ['MX-QUE', 21],
                ['MX-ROO', 22],
                ['MX-SLP', 23],
                ['MX-SIN', 24],
                ['MX-SON', 25],
                ['MX-TAB', 26],
                ['MX-TAM', 27],
                ['MX-TLA', 28],
                ['MX-VER', 29],
                ['MX-YUC', 30],
                ['MX-ZAC', 31],
                ['MX-CMX', 32],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_mx" class="w-screen h-screen"></div>
            <script>
                let data_mx = [["MX-AGU",1],["MX-BCN",2],["MX-BCS",3],["MX-CAM",4],["MX-CHP",5],["MX-CHH",6],["MX-COA",7],["MX-COL",8],["MX-DUR",9],["MX-GUA",10],["MX-GRO",11],["MX-HID",12],["MX-JAL",13],["MX-MEX",14],["MX-MIC",15],["MX-MOR",16],["MX-NAY",17],["MX-NLE",18],["MX-OAX",19],["MX-PUE",20],["MX-QUE",21],["MX-ROO",22],["MX-SLP",23],["MX-SIN",24],["MX-SON",25],["MX-TAB",26],["MX-TAM",27],["MX-TLA",28],["MX-VER",29],["MX-YUC",30],["MX-ZAC",31],["MX-CMX",32]];
                let map_mx = Highcharts;

                map_mx.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/mx.json', function(geojson) {
                    map_mx.mapChart('container_mx', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_mx,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_netherlands_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="nl" :values="[
                ['NL-DR', 1],
                ['NL-FL', 2],
                ['NL-FR', 3],
                ['NL-GE', 4],
                ['NL-GR', 5],
                ['NL-LI', 6],
                ['NL-NB', 7],
                ['NL-NH', 8],
                ['NL-OV', 9],
                ['NL-UT', 10],
                ['NL-ZE', 11],
                ['NL-ZH', 12],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_nl" class="w-screen h-screen"></div>
            <script>
                let data_nl = [["NL-DR",1],["NL-FL",2],["NL-FR",3],["NL-GE",4],["NL-GR",5],["NL-LI",6],["NL-NB",7],["NL-NH",8],["NL-OV",9],["NL-UT",10],["NL-ZE",11],["NL-ZH",12]];
                let map_nl = Highcharts;

                map_nl.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/nl.json', function(geojson) {
                    map_nl.mapChart('container_nl', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_nl,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_america_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="us" :values="[
                ['US-AL', 1],
                ['US-AK', 2],
                ['US-AZ', 3],
                ['US-AR', 4],
                ['US-CA', 5],
                ['US-CO', 6],
                ['US-CT', 7],
                ['US-DE', 8],
                ['US-FL', 9],
                ['US-GA', 10],
                ['US-HI', 11],
                ['US-ID', 12],
                ['US-IL', 13],
                ['US-IN', 14],
                ['US-IA', 15],
                ['US-KS', 16],
                ['US-KY', 17],
                ['US-LA', 18],
                ['US-ME', 19],
                ['US-MD', 20],
                ['US-MA', 21],
                ['US-MI', 22],
                ['US-MN', 23],
                ['US-MS', 24],
                ['US-MO', 25],
                ['US-MT', 26],
                ['US-NE', 27],
                ['US-NV', 28],
                ['US-NH', 29],
                ['US-NJ', 30],
                ['US-NM', 31],
                ['US-NY', 32],
                ['US-NC', 33],
                ['US-ND', 34],
                ['US-OH', 35],
                ['US-OK', 36],
                ['US-OR', 37],
                ['US-PA', 38],
                ['US-RI', 39],
                ['US-SC', 40],
                ['US-SD', 41],
                ['US-TN', 42],
                ['US-TX', 43],
                ['US-UT', 44],
                ['US-VT', 45],
                ['US-VA', 46],
                ['US-WA', 47],
                ['US-WV', 48],
                ['US-WI', 49],
                ['US-WY', 50],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_us" class="w-screen h-screen"></div>
            <script>
                let data_us = [["US-AL",1],["US-AK",2],["US-AZ",3],["US-AR",4],["US-CA",5],["US-CO",6],["US-CT",7],["US-DE",8],["US-FL",9],["US-GA",10],["US-HI",11],["US-ID",12],["US-IL",13],["US-IN",14],["US-IA",15],["US-KS",16],["US-KY",17],["US-LA",18],["US-ME",19],["US-MD",20],["US-MA",21],["US-MI",22],["US-MN",23],["US-MS",24],["US-MO",25],["US-MT",26],["US-NE",27],["US-NV",28],["US-NH",29],["US-NJ",30],["US-NM",31],["US-NY",32],["US-NC",33],["US-ND",34],["US-OH",35],["US-OK",36],["US-OR",37],["US-PA",38],["US-RI",39],["US-SC",40],["US-SD",41],["US-TN",42],["US-TX",43],["US-UT",44],["US-VT",45],["US-VA",46],["US-WA",47],["US-WV",48],["US-WI",49],["US-WY",50]];
                let map_us = Highcharts;

                map_us.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/us.json', function(geojson) {
                    map_us.mapChart('container_us', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_us,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_italy_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="it" :values="[
                ['IT-65', 100000],
                ['IT-23', 100000],
                ['IT-75', 100000],
                ['IT-77', 100000],
                ['IT-78', 100000],
                ['IT-72', 100000],
                ['IT-45', 100000],
                ['IT-36', 100000],
                ['IT-62', 100000],
                ['IT-42', 100000],
                ['IT-25', 100000],
                ['IT-57', 100000],
                ['IT-67', 100000],
                ['IT-21', 100000],
                ['IT-88', 100000],
                ['IT-82', 100000],
                ['IT-32', 100000],
                ['IT-52', 100000],
                ['IT-55', 100000],
                ['IT-34', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_it" class="w-screen h-screen"></div>
            <script>
                let data_it = [["IT-65",100000],["IT-23",100000],["IT-75",100000],["IT-77",100000],["IT-78",100000],["IT-72",100000],["IT-45",100000],["IT-36",100000],["IT-62",100000],["IT-42",100000],["IT-25",100000],["IT-57",100000],["IT-67",100000],["IT-21",100000],["IT-88",100000],["IT-82",100000],["IT-32",100000],["IT-52",100000],["IT-55",100000],["IT-34",100000]];
                let map_it = Highcharts;

                map_it.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/it.json', function(geojson) {
                    map_it.mapChart('container_it', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_it,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_for_argentina_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ar" :values="[
                ['AR-B', 100000],
                ['AR-K', 100000],
                ['AR-H', 100000],
                ['AR-U', 100000],
                ['AR-C', 100000],
                ['AR-X', 100000],
                ['AR-W', 100000],
                ['AR-E', 100000],
                ['AR-P', 100000],
                ['AR-Y', 100000],
                ['AR-L', 100000],
                ['AR-F', 100000],
                ['AR-M', 100000],
                ['AR-N', 100000],
                ['AR-Q', 100000],
                ['AR-R', 100000],
                ['AR-A', 100000],
                ['AR-J', 100000],
                ['AR-D', 100000],
                ['AR-Z', 100000],
                ['AR-S', 100000],
                ['AR-G', 100000],
                ['AR-V', 100000],
                ['AR-T', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ar" class="w-screen h-screen"></div>
            <script>
                let data_ar = [["AR-B",100000],["AR-K",100000],["AR-H",100000],["AR-U",100000],["AR-C",100000],["AR-X",100000],["AR-W",100000],["AR-E",100000],["AR-P",100000],["AR-Y",100000],["AR-L",100000],["AR-F",100000],["AR-M",100000],["AR-N",100000],["AR-Q",100000],["AR-R",100000],["AR-A",100000],["AR-J",100000],["AR-D",100000],["AR-Z",100000],["AR-S",100000],["AR-G",100000],["AR-V",100000],["AR-T",100000]];
                let map_ar = Highcharts;

                map_ar.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ar.json', function(geojson) {
                    map_ar.mapChart('container_ar', {
                        chart: {
                            map: geojson
                        },
                        title: {
                            text: ''
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
                            data: data_ar,
                            keys: ['iso_3166_2', 'value'],
                            joinBy: 'iso_3166_2',
                            name: 'Count',
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_region_map_component_with_an_invalid_iso_can_not_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="jq" :values="[]" name="Field Name" />
            HTML;

        $expected = <<<'HTML'
            Invalid ISO. {Expected: au, br, ca, de, es, fr, gb, mx, nl, us, it, tr, ru, cl, ar}
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
