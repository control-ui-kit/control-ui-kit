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
    public function a_region_map_component_for_turkey_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="tr" :values="[
                ['TR-01', 100000],
                ['TR-02', 100000],
                ['TR-03', 100000],
                ['TR-04', 100000],
                ['TR-68', 100000],
                ['TR-05', 100000],
                ['TR-06', 100000],
                ['TR-07', 100000],
                ['TR-75', 100000],
                ['TR-08', 100000],
                ['TR-09', 100000],
                ['TR-10', 100000],
                ['TR-74', 100000],
                ['TR-72', 100000],
                ['TR-69', 100000],
                ['TR-64', 100000],
                ['TR-11', 100000],
                ['TR-12', 100000],
                ['TR-13', 100000],
                ['TR-14', 100000],
                ['TR-15', 100000],
                ['TR-16', 100000],
                ['TR-17', 100000],
                ['TR-18', 100000],
                ['TR-19', 100000],
                ['TR-20', 100000],
                ['TR-21', 100000],
                ['TR-81', 100000],
                ['TR-22', 100000],
                ['TR-23', 100000],
                ['TR-24', 100000],
                ['TR-25', 100000],
                ['TR-26', 100000],
                ['TR-27', 100000],
                ['TR-28', 100000],
                ['TR-29', 100000],
                ['TR-30', 100000],
                ['TR-31', 100000],
                ['TR-76', 100000],
                ['TR-32', 100000],
                ['TR-34', 100000],
                ['TR-35', 100000],
                ['TR-46', 100000],
                ['TR-78', 100000],
                ['TR-70', 100000],
                ['TR-36', 100000],
                ['TR-37', 100000],
                ['TR-38', 100000],
                ['TR-71', 100000],
                ['TR-39', 100000],
                ['TR-40', 100000],
                ['TR-79', 100000],
                ['TR-41', 100000],
                ['TR-42', 100000],
                ['TR-43', 100000],
                ['TR-44', 100000],
                ['TR-45', 100000],
                ['TR-47', 100000],
                ['TR-33', 100000],
                ['TR-48', 100000],
                ['TR-49', 100000],
                ['TR-38', 100000],
                ['TR-51', 100000],
                ['TR-52', 100000],
                ['TR-80', 100000],
                ['TR-53', 100000],
                ['TR-54', 100000],
                ['TR-55', 100000],
                ['TR-56', 100000],
                ['TR-57', 100000],
                ['TR-73', 100000],
                ['TR-59', 100000],
                ['TR-63', 100000],
                ['TR-58', 100000],
                ['TR-60', 100000],
                ['TR-61', 100000],
                ['TR-62', 100000],
                ['TR-65', 100000],
                ['TR-77', 100000],
                ['TR-66', 100000],
                ['TR-67', 100000],
                ['TR-50', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_tr" class="w-screen h-screen"></div>
            <script>
                let data_tr = [["TR-01",100000],["TR-02",100000],["TR-03",100000],["TR-04",100000],["TR-68",100000],["TR-05",100000],["TR-06",100000],["TR-07",100000],["TR-75",100000],["TR-08",100000],["TR-09",100000],["TR-10",100000],["TR-74",100000],["TR-72",100000],["TR-69",100000],["TR-64",100000],["TR-11",100000],["TR-12",100000],["TR-13",100000],["TR-14",100000],["TR-15",100000],["TR-16",100000],["TR-17",100000],["TR-18",100000],["TR-19",100000],["TR-20",100000],["TR-21",100000],["TR-81",100000],["TR-22",100000],["TR-23",100000],["TR-24",100000],["TR-25",100000],["TR-26",100000],["TR-27",100000],["TR-28",100000],["TR-29",100000],["TR-30",100000],["TR-31",100000],["TR-76",100000],["TR-32",100000],["TR-34",100000],["TR-35",100000],["TR-46",100000],["TR-78",100000],["TR-70",100000],["TR-36",100000],["TR-37",100000],["TR-38",100000],["TR-71",100000],["TR-39",100000],["TR-40",100000],["TR-79",100000],["TR-41",100000],["TR-42",100000],["TR-43",100000],["TR-44",100000],["TR-45",100000],["TR-47",100000],["TR-33",100000],["TR-48",100000],["TR-49",100000],["TR-38",100000],["TR-51",100000],["TR-52",100000],["TR-80",100000],["TR-53",100000],["TR-54",100000],["TR-55",100000],["TR-56",100000],["TR-57",100000],["TR-73",100000],["TR-59",100000],["TR-63",100000],["TR-58",100000],["TR-60",100000],["TR-61",100000],["TR-62",100000],["TR-65",100000],["TR-77",100000],["TR-66",100000],["TR-67",100000],["TR-50",100000]];
                let map_tr = Highcharts;

                map_tr.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/tr.json', function(geojson) {
                    map_tr.mapChart('container_tr', {
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
                            data: data_tr,
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
    public function a_region_map_component_for_russia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ru" :values="[
                ['RU-AD', 100000],
                ['RU-AL', 100000],
                ['RU-BA', 100000],
                ['RU-BU', 100000],
                ['RU-CE', 100000],
                ['RU-CU', 100000],
                ['RU-DA', 100000],
                ['RU-IN', 100000],
                ['RU-KB', 100000],
                ['RU-KL', 100000],
                ['RU-KC', 100000],
                ['RU-KR', 100000],
                ['RU-KK', 100000],
                ['RU-KO', 100000],
                ['RU-ME', 100000],
                ['RU-MO', 100000],
                ['RU-SA', 100000],
                ['RU-SE', 100000],
                ['RU-TA', 100000],
                ['RU-TY', 100000],
                ['RU-UD', 100000],
                ['RU-KAM', 100000],
                ['RU-KHA', 100000],
                ['RU-KDA', 100000],
                ['RU-KYA', 100000],
                ['RU-PER', 100000],
                ['RU-PRI', 100000],
                ['RU-STA', 100000],
                ['RU-ZAB', 100000],
                ['RU-AMU', 100000],
                ['RU-ARK', 100000],
                ['RU-AST', 100000],
                ['RU-BEL', 100000],
                ['RU-BRY', 100000],
                ['RU-CHE', 100000],
                ['RU-IRK', 100000],
                ['RU-IVA', 100000],
                ['RU-KGD', 100000],
                ['RU-KLU', 100000],
                ['RU-KAM', 100000],
                ['RU-KIR', 100000],
                ['RU-KOS', 100000],
                ['RU-KRS', 100000],
                ['RU-LEN', 100000],
                ['RU-LIP', 100000],
                ['RU-MAG', 100000],
                ['RU-MOS', 100000],
                ['RU-MOW', 100000],
                ['RU-MUR', 100000],
                ['RU-NIZ', 100000],
                ['RU-NGR', 100000],
                ['RU-NVS', 100000],
                ['RU-OMS', 100000],
                ['RU-ORE', 100000],
                ['RU-ORL', 100000],
                ['RU-PNZ', 100000],
                ['RU-PSK', 100000],
                ['RU-ROS', 100000],
                ['RU-RYA', 100000],
                ['RU-SAK', 100000],
                ['RU-SAM', 100000],
                ['RU-SAR', 100000],
                ['RU-SMO', 100000],
                ['RU-SVE', 100000],
                ['RU-TAM', 100000],
                ['RU-TOM', 100000],
                ['RU-TUL', 100000],
                ['RU-TVE', 100000],
                ['RU-TYU', 100000],
                ['RU-ULY', 100000],
                ['RU-VLA', 100000],
                ['RU-VGG', 100000],
                ['RU-VLG', 100000],
                ['RU-VOR', 100000],
                ['RU-YAR', 100000],
                ['RU-CHU', 100000],
                ['RU-SPE', 100000],
                ['RU-KEM', 100000],
                ['RU-ALT', 100000],
                ['RU-YEV', 100000],
                ['RU-KHM', 100000],
                ['RU-NEN', 100000],
                ['RU-YAN', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ru" class="w-screen h-screen"></div>
            <script>
                let data_ru = [["RU-AD",100000],["RU-AL",100000],["RU-BA",100000],["RU-BU",100000],["RU-CE",100000],["RU-CU",100000],["RU-DA",100000],["RU-IN",100000],["RU-KB",100000],["RU-KL",100000],["RU-KC",100000],["RU-KR",100000],["RU-KK",100000],["RU-KO",100000],["RU-ME",100000],["RU-MO",100000],["RU-SA",100000],["RU-SE",100000],["RU-TA",100000],["RU-TY",100000],["RU-UD",100000],["RU-KAM",100000],["RU-KHA",100000],["RU-KDA",100000],["RU-KYA",100000],["RU-PER",100000],["RU-PRI",100000],["RU-STA",100000],["RU-ZAB",100000],["RU-AMU",100000],["RU-ARK",100000],["RU-AST",100000],["RU-BEL",100000],["RU-BRY",100000],["RU-CHE",100000],["RU-IRK",100000],["RU-IVA",100000],["RU-KGD",100000],["RU-KLU",100000],["RU-KAM",100000],["RU-KIR",100000],["RU-KOS",100000],["RU-KRS",100000],["RU-LEN",100000],["RU-LIP",100000],["RU-MAG",100000],["RU-MOS",100000],["RU-MOW",100000],["RU-MUR",100000],["RU-NIZ",100000],["RU-NGR",100000],["RU-NVS",100000],["RU-OMS",100000],["RU-ORE",100000],["RU-ORL",100000],["RU-PNZ",100000],["RU-PSK",100000],["RU-ROS",100000],["RU-RYA",100000],["RU-SAK",100000],["RU-SAM",100000],["RU-SAR",100000],["RU-SMO",100000],["RU-SVE",100000],["RU-TAM",100000],["RU-TOM",100000],["RU-TUL",100000],["RU-TVE",100000],["RU-TYU",100000],["RU-ULY",100000],["RU-VLA",100000],["RU-VGG",100000],["RU-VLG",100000],["RU-VOR",100000],["RU-YAR",100000],["RU-CHU",100000],["RU-SPE",100000],["RU-KEM",100000],["RU-ALT",100000],["RU-YEV",100000],["RU-KHM",100000],["RU-NEN",100000],["RU-YAN",100000]];
                let map_ru = Highcharts;

                map_ru.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ru.json', function(geojson) {
                    map_ru.mapChart('container_ru', {
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
                            data: data_ru,
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
    public function a_region_map_component_for_poland_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="pl" :values="[
                ['PL-30', 100000],
                ['PL-04', 100000],
                ['PL-12', 100000],
                ['PL-02', 100000],
                ['PL-06', 100000],
                ['PL-08', 100000],
                ['PL-14', 100000],
                ['PL-16', 100000],
                ['PL-18', 100000],
                ['PL-20', 100000],
                ['PL-22', 100000],
                ['PL-24', 100000],
                ['PL-28', 100000],
                ['PL-26', 100000],
                ['PL-32', 100000],
                ['PL-10', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_pl" class="w-screen h-screen"></div>
            <script>
                let data_pl = [["PL-30",100000],["PL-04",100000],["PL-12",100000],["PL-02",100000],["PL-06",100000],["PL-08",100000],["PL-14",100000],["PL-16",100000],["PL-18",100000],["PL-20",100000],["PL-22",100000],["PL-24",100000],["PL-28",100000],["PL-26",100000],["PL-32",100000],["PL-10",100000]];
                let map_pl = Highcharts;

                map_pl.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/pl.json', function(geojson) {
                    map_pl.mapChart('container_pl', {
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
                            data: data_pl,
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
    public function a_region_map_component_for_sweden_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="se" :values="[
                ['SE-K', 100000],
                ['SE-W', 100000],
                ['SE-I', 100000],
                ['SE-X', 100000],
                ['SE-N', 100000],
                ['SE-Z', 100000],
                ['SE-F', 100000],
                ['SE-H', 100000],
                ['SE-G', 100000],
                ['SE-DB', 100000],
                ['SE-M', 100000],
                ['SE-AB', 100000],
                ['SE-D', 100000],
                ['SE-C', 100000],
                ['SE-S', 100000],
                ['SE-AC', 100000],
                ['SE-Y', 100000],
                ['SE-U', 100000],
                ['SE-O', 100000],
                ['SE-T', 100000],
                ['SE-E', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_se" class="w-screen h-screen"></div>
            <script>
                let data_se = [["SE-K",100000],["SE-W",100000],["SE-I",100000],["SE-X",100000],["SE-N",100000],["SE-Z",100000],["SE-F",100000],["SE-H",100000],["SE-G",100000],["SE-DB",100000],["SE-M",100000],["SE-AB",100000],["SE-D",100000],["SE-C",100000],["SE-S",100000],["SE-AC",100000],["SE-Y",100000],["SE-U",100000],["SE-O",100000],["SE-T",100000],["SE-E",100000]];
                let map_se = Highcharts;

                map_se.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/se.json', function(geojson) {
                    map_se.mapChart('container_se', {
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
                            data: data_se,
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
    public function a_region_map_component_for_belgium_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="be" :values="[
                ['BE-VAN', 100000],
                ['BE-BRU', 100000],
                ['BE-VOV', 100000],
                ['BE-VBR', 100000],
                ['BE-WHT', 100000],
                ['BE-WLG', 100000],
                ['BE-VLI', 100000],
                ['BE-WLX', 100000],
                ['BE-WNA', 100000],
                ['BE-WBR', 100000],
                ['BE-VWV', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_be" class="w-screen h-screen"></div>
            <script>
                let data_be = [["BE-VAN",100000],["BE-BRU",100000],["BE-VOV",100000],["BE-VBR",100000],["BE-WHT",100000],["BE-WLG",100000],["BE-VLI",100000],["BE-WLX",100000],["BE-WNA",100000],["BE-WBR",100000],["BE-VWV",100000]];
                let map_be = Highcharts;

                map_be.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/be.json', function(geojson) {
                    map_be.mapChart('container_be', {
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
                            data: data_be,
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
    public function a_region_map_component_for_the_philippines_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ph" :values="[
                ['PH-05', 100000],
                ['PH-02', 100000],
                ['PH-40', 100000],
                ['PH-03', 100000],
                ['PH-07', 100000],
                ['PH-15', 100000],
                ['PH-11', 100000],
                ['PH-08', 100000],
                ['PH-01', 100000],
                ['PH-41', 100000],
                ['PH-13', 100000],
                ['PH-06', 100000],
                ['PH-09', 100000],
                ['PH-14', 100000],
                ['PH-12', 100000],
                ['PH-10', 100000],
                ['PH-00', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ph" class="w-screen h-screen"></div>
            <script>
                let data_ph = [["PH-05",100000],["PH-02",100000],["PH-40",100000],["PH-03",100000],["PH-07",100000],["PH-15",100000],["PH-11",100000],["PH-08",100000],["PH-01",100000],["PH-41",100000],["PH-13",100000],["PH-06",100000],["PH-09",100000],["PH-14",100000],["PH-12",100000],["PH-10",100000],["PH-00",100000]];
                let map_ph = Highcharts;

                map_ph.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ph.json', function(geojson) {
                    map_ph.mapChart('container_ph', {
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
                            data: data_ph,
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
    public function a_region_map_component_for_indonesia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="id" :values="[
                ['ID-AC', 100000],
                ['ID-BA', 100000],
                ['ID-BB', 100000],
                ['ID-BT', 100000],
                ['ID-BE', 100000],
                ['ID-GO', 100000],
                ['ID-JA', 100000],
                ['ID-JB', 100000],
                ['ID-JT', 100000],
                ['ID-JI', 100000],
                ['ID-KB', 100000],
                ['ID-KS', 100000],
                ['ID-KT', 100000],
                ['ID-KI', 100000],
                ['ID-KU', 100000],
                ['ID-KR', 100000],
                ['ID-LA', 100000],
                ['ID-MA', 100000],
                ['ID-MU', 100000],
                ['ID-PA', 100000],
                ['ID-PB', 100000],
                ['ID-LA', 100000],
                ['ID-RI', 100000],
                ['ID-SR', 100000],
                ['ID-SN', 100000],
                ['ID-ST', 100000],
                ['ID-SG', 100000],
                ['ID-SA', 100000],
                ['ID-SB', 100000],
                ['ID-SS', 100000],
                ['ID-JK', 100000],
                ['ID-YO', 100000],
                ['ID-SU', 100000],
                ['ID-SI', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_id" class="w-screen h-screen"></div>
            <script>
                let data_id = [["ID-AC",100000],["ID-BA",100000],["ID-BB",100000],["ID-BT",100000],["ID-BE",100000],["ID-GO",100000],["ID-JA",100000],["ID-JB",100000],["ID-JT",100000],["ID-JI",100000],["ID-KB",100000],["ID-KS",100000],["ID-KT",100000],["ID-KI",100000],["ID-KU",100000],["ID-KR",100000],["ID-LA",100000],["ID-MA",100000],["ID-MU",100000],["ID-PA",100000],["ID-PB",100000],["ID-LA",100000],["ID-RI",100000],["ID-SR",100000],["ID-SN",100000],["ID-ST",100000],["ID-SG",100000],["ID-SA",100000],["ID-SB",100000],["ID-SS",100000],["ID-JK",100000],["ID-YO",100000],["ID-SU",100000],["ID-SI",100000]];
                let map_id = Highcharts;

                map_id.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/id.json', function(geojson) {
                    map_id.mapChart('container_id', {
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
                            data: data_id,
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
    public function a_region_map_component_for_switzerland_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ch" :values="[
                ['CH-AR', 100000],
                ['CH-AI', 100000],
                ['CH-AG', 100000],
                ['CH-BS', 100000],
                ['CH-BL', 100000],
                ['CH-BE', 100000],
                ['CH-FR', 100000],
                ['CH-GE', 100000],
                ['CH-GL', 100000],
                ['CH-GR', 100000],
                ['CH-JU', 100000],
                ['CH-LU', 100000],
                ['CH-NE', 100000],
                ['CH-NW', 100000],
                ['CH-OW', 100000],
                ['CH-SG', 100000],
                ['CH-SH', 100000],
                ['CH-SZ', 100000],
                ['CH-CO', 100000],
                ['CH-SO', 100000],
                ['CH-TG', 100000],
                ['CH-TI', 100000],
                ['CH-UR', 100000],
                ['CH-VS', 100000],
                ['CH-VD', 100000],
                ['CH-ZG', 100000],
                ['CH-ZH', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ch" class="w-screen h-screen"></div>
            <script>
                let data_ch = [["CH-AR",100000],["CH-AI",100000],["CH-AG",100000],["CH-BS",100000],["CH-BL",100000],["CH-BE",100000],["CH-FR",100000],["CH-GE",100000],["CH-GL",100000],["CH-GR",100000],["CH-JU",100000],["CH-LU",100000],["CH-NE",100000],["CH-NW",100000],["CH-OW",100000],["CH-SG",100000],["CH-SH",100000],["CH-SZ",100000],["CH-CO",100000],["CH-SO",100000],["CH-TG",100000],["CH-TI",100000],["CH-UR",100000],["CH-VS",100000],["CH-VD",100000],["CH-ZG",100000],["CH-ZH",100000]];
                let map_ch = Highcharts;

                map_ch.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ch.json', function(geojson) {
                    map_ch.mapChart('container_ch', {
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
                            data: data_ch,
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
    public function a_region_map_component_for_india_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="in" :values="[
                ['IN-AP', 100000],
                ['IN-AR', 100000],
                ['IN-AS', 100000],
                ['IN-BR', 100000],
                ['IN-CT', 100000],
                ['IN-CH', 100000],
                ['IN-GA', 100000],
                ['IN-DL', 100000],
                ['IN-DH', 100000],
                ['IN-DN', 100000],
                ['IN-GJ', 100000],
                ['IN-HR', 100000],
                ['IN-HP', 100000],
                ['IN-JH', 100000],
                ['IN-KA', 100000],
                ['IN-KL', 100000],
                ['IN-MP', 100000],
                ['IN-LD', 100000],
                ['IN-MH', 100000],
                ['IN-MN', 100000],
                ['IN-ML', 100000],
                ['IN-MZ', 100000],
                ['IN-OR', 100000],
                ['IN-PB', 100000],
                ['IN-PY', 100000],
                ['IN-RJ', 100000],
                ['IN-SK', 100000],
                ['IN-TN', 100000],
                ['IN-TG', 100000],
                ['IN-TR', 100000],
                ['IN-UT', 100000],
                ['IN-UP', 100000],
                ['IN-WB', 100000],
                ['IN-JK', 100000],
                ['IN-NL', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_in" class="w-screen h-screen"></div>
            <script>
                let data_in = [["IN-AP",100000],["IN-AR",100000],["IN-AS",100000],["IN-BR",100000],["IN-CT",100000],["IN-CH",100000],["IN-GA",100000],["IN-DL",100000],["IN-DH",100000],["IN-DN",100000],["IN-GJ",100000],["IN-HR",100000],["IN-HP",100000],["IN-JH",100000],["IN-KA",100000],["IN-KL",100000],["IN-MP",100000],["IN-LD",100000],["IN-MH",100000],["IN-MN",100000],["IN-ML",100000],["IN-MZ",100000],["IN-OR",100000],["IN-PB",100000],["IN-PY",100000],["IN-RJ",100000],["IN-SK",100000],["IN-TN",100000],["IN-TG",100000],["IN-TR",100000],["IN-UT",100000],["IN-UP",100000],["IN-WB",100000],["IN-JK",100000],["IN-NL",100000]];
                let map_in = Highcharts;

                map_in.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/in.json', function(geojson) {
                    map_in.mapChart('container_in', {
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
                            data: data_in,
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
    public function a_region_map_component_for_japan_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="jp" :values="[
                ['JP-AI', 100000],
                ['JP-AK', 100000],
                ['JP-AO', 100000],
                ['JP-CH', 100000],
                ['JP-EH', 100000],
                ['JP-FI', 100000],
                ['JP-FO', 100000],
                ['JP-FS', 100000],
                ['JP-GF', 100000],
                ['JP-GM', 100000],
                ['JP-HS', 100000],
                ['JP-HK', 100000],
                ['JP-HG', 100000],
                ['JP-IB', 100000],
                ['JP-IS', 100000],
                ['JP-IW', 100000],
                ['JP-KG', 100000],
                ['JP-KS', 100000],
                ['JP-KN', 100000],
                ['JP-KC', 100000],
                ['JP-KM', 100000],
                ['JP-KY', 100000],
                ['JP-ME', 100000],
                ['JP-MG', 100000],
                ['JP-YT', 100000],
                ['JP-NI', 100000],
                ['JP-TC', 100000],
                ['JP-ST', 100000],
                ['JP-TK', 100000],
                ['JP-NN', 100000],
                ['JP-YN', 100000],
                ['JP-SZ', 100000],
                ['JP-TY', 100000],
                ['JP-SH', 100000],
                ['JP-NR', 100000],
                ['JP-OS', 100000],
                ['JP-WK', 100000],
                ['JP-NS', 100000],
                ['JP-SG', 100000],
                ['JP-MZ', 100000],
                ['JP-OT', 100000],
                ['JP-YC', 100000],
                ['JP-SM', 100000],
                ['JP-TT', 100000],
                ['JP-OY', 100000],
                ['JP-ON', 100000],
                ['JP-TS', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_jp" class="w-screen h-screen"></div>
            <script>
                let data_jp = [["JP-AI",100000],["JP-AK",100000],["JP-AO",100000],["JP-CH",100000],["JP-EH",100000],["JP-FI",100000],["JP-FO",100000],["JP-FS",100000],["JP-GF",100000],["JP-GM",100000],["JP-HS",100000],["JP-HK",100000],["JP-HG",100000],["JP-IB",100000],["JP-IS",100000],["JP-IW",100000],["JP-KG",100000],["JP-KS",100000],["JP-KN",100000],["JP-KC",100000],["JP-KM",100000],["JP-KY",100000],["JP-ME",100000],["JP-MG",100000],["JP-YT",100000],["JP-NI",100000],["JP-TC",100000],["JP-ST",100000],["JP-TK",100000],["JP-NN",100000],["JP-YN",100000],["JP-SZ",100000],["JP-TY",100000],["JP-SH",100000],["JP-NR",100000],["JP-OS",100000],["JP-WK",100000],["JP-NS",100000],["JP-SG",100000],["JP-MZ",100000],["JP-OT",100000],["JP-YC",100000],["JP-SM",100000],["JP-TT",100000],["JP-OY",100000],["JP-ON",100000],["JP-TS",100000]];
                let map_jp = Highcharts;

                map_jp.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/jp.json', function(geojson) {
                    map_jp.mapChart('container_jp', {
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
                            data: data_jp,
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
    public function a_region_map_component_for_singapore_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="sg" :values="[
                ['SG-01', 100000],
                ['SG-02', 100000],
                ['SG-03', 100000],
                ['SG-04', 100000],
                ['SG-05', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_sg" class="w-screen h-screen"></div>
            <script>
                let data_sg = [["SG-01",100000],["SG-02",100000],["SG-03",100000],["SG-04",100000],["SG-05",100000]];
                let map_sg = Highcharts;

                map_sg.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/sg.json', function(geojson) {
                    map_sg.mapChart('container_sg', {
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
                            data: data_sg,
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
    public function a_region_map_component_for_colombia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="co" :values="[
                ['CO-AMA', 100000],
                ['CO-ANT', 100000],
                ['CO-ARA', 100000],
                ['CO-ATL', 100000],
                ['CO-DC',  100000],
                ['CO-BOL', 100000],
                ['CO-BOY', 100000],
                ['CO-CAL', 100000],
                ['CO-CAQ', 100000],
                ['CO-CAS', 100000],
                ['CO-CAU', 100000],
                ['CO-CES', 100000],
                ['CO-CHO', 100000],
                ['CO-COR', 100000],
                ['CO-CUN', 100000],
                ['CO-GUA', 100000],
                ['CO-GUV', 100000],
                ['CO-HUI', 100000],
                ['CO-LAG', 100000],
                ['CO-MAG', 100000],
                ['CO-MET', 100000],
                ['CO-NAR', 100000],
                ['CO-NSA', 100000],
                ['CO-PUT', 100000],
                ['CO-QUI', 100000],
                ['CO-RIS', 100000],
                ['CO-SAP', 100000],
                ['CO-SAN', 100000],
                ['CO-SUC', 100000],
                ['CO-TOL', 100000],
                ['CO-VAC', 100000],
                ['CO-VAU', 100000],
                ['CO-VID', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_co" class="w-screen h-screen"></div>
            <script>
                let data_co = [["CO-AMA",100000],["CO-ANT",100000],["CO-ARA",100000],["CO-ATL",100000],["CO-DC",100000],["CO-BOL",100000],["CO-BOY",100000],["CO-CAL",100000],["CO-CAQ",100000],["CO-CAS",100000],["CO-CAU",100000],["CO-CES",100000],["CO-CHO",100000],["CO-COR",100000],["CO-CUN",100000],["CO-GUA",100000],["CO-GUV",100000],["CO-HUI",100000],["CO-LAG",100000],["CO-MAG",100000],["CO-MET",100000],["CO-NAR",100000],["CO-NSA",100000],["CO-PUT",100000],["CO-QUI",100000],["CO-RIS",100000],["CO-SAP",100000],["CO-SAN",100000],["CO-SUC",100000],["CO-TOL",100000],["CO-VAC",100000],["CO-VAU",100000],["CO-VID",100000]];
                let map_co = Highcharts;

                map_co.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/co.json', function(geojson) {
                    map_co.mapChart('container_co', {
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
                            data: data_co,
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
    public function a_region_map_component_for_new_zealand_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="nz" :values="[
                ['NZ-AUK', 100000],
                ['NZ-BOP', 100000],
                ['NZ-CAN', 100000],
                ['NZ-CIT', 100000],
                ['NZ-GIS', 100000],
                ['NZ-HKB', 100000],
                ['NZ-MWT', 100000],
                ['NZ-MBH', 100000],
                ['NZ-NSN', 100000],
                ['NZ-NTL', 100000],
                ['NZ-OTA', 100000],
                ['NZ-STL', 100000],
                ['NZ-TKI', 100000],
                ['NZ-TAS', 100000],
                ['NZ-WKO', 100000],
                ['NZ-WGN', 100000],
                ['NZ-WTC', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_nz" class="w-screen h-screen"></div>
            <script>
                let data_nz = [["NZ-AUK",100000],["NZ-BOP",100000],["NZ-CAN",100000],["NZ-CIT",100000],["NZ-GIS",100000],["NZ-HKB",100000],["NZ-MWT",100000],["NZ-MBH",100000],["NZ-NSN",100000],["NZ-NTL",100000],["NZ-OTA",100000],["NZ-STL",100000],["NZ-TKI",100000],["NZ-TAS",100000],["NZ-WKO",100000],["NZ-WGN",100000],["NZ-WTC",100000]];
                let map_nz = Highcharts;

                map_nz.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/nz.json', function(geojson) {
                    map_nz.mapChart('container_nz', {
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
                            data: data_nz,
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
    public function a_region_map_component_for_austria_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="at" :values="[
                ['AT-1', 100000],
                ['AT-2', 100000],
                ['AT-3', 100000],
                ['AT-4', 100000],
                ['AT-5', 100000],
                ['AT-6', 100000],
                ['AT-7', 100000],
                ['AT-8', 100000],
                ['AT-9', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_at" class="w-screen h-screen"></div>
            <script>
                let data_at = [["AT-1",100000],["AT-2",100000],["AT-3",100000],["AT-4",100000],["AT-5",100000],["AT-6",100000],["AT-7",100000],["AT-8",100000],["AT-9",100000]];
                let map_at = Highcharts;

                map_at.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/at.json', function(geojson) {
                    map_at.mapChart('container_at', {
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
                            data: data_at,
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
    public function a_region_map_component_for_finland_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="fi" :values="[
                ['FI-01', 100000],
                ['FI-02', 100000],
                ['FI-03', 100000],
                ['FI-04', 100000],
                ['FI-05', 100000],
                ['FI-06', 100000],
                ['FI-07', 100000],
                ['FI-08', 100000],
                ['FI-09', 100000],
                ['FI-10', 100000],
                ['FI-11', 100000],
                ['FI-12', 100000],
                ['FI-13', 100000],
                ['FI-14', 100000],
                ['FI-15', 100000],
                ['FI-16', 100000],
                ['FI-17', 100000],
                ['FI-18', 100000],
                ['FI-19', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_fi" class="w-screen h-screen"></div>
            <script>
                let data_fi = [["FI-01",100000],["FI-02",100000],["FI-03",100000],["FI-04",100000],["FI-05",100000],["FI-06",100000],["FI-07",100000],["FI-08",100000],["FI-09",100000],["FI-10",100000],["FI-11",100000],["FI-12",100000],["FI-13",100000],["FI-14",100000],["FI-15",100000],["FI-16",100000],["FI-17",100000],["FI-18",100000],["FI-19",100000]];
                let map_fi = Highcharts;

                map_fi.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/fi.json', function(geojson) {
                    map_fi.mapChart('container_fi', {
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
                            data: data_fi,
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
    public function a_region_map_component_for_malaysia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="my" :values="[
                ['MY-01', 100000],
                ['MY-02', 100000],
                ['MY-03', 100000],
                ['MY-04', 100000],
                ['MY-05', 100000],
                ['MY-06', 100000],
                ['MY-07', 100000],
                ['MY-08', 100000],
                ['MY-09', 100000],
                ['MY-10', 100000],
                ['MY-11', 100000],
                ['MY-12', 100000],
                ['MY-13', 100000],
                ['MY-14', 100000],
                ['MY-15', 100000],
                ['MY-16', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_my" class="w-screen h-screen"></div>
            <script>
                let data_my = [["MY-01",100000],["MY-02",100000],["MY-03",100000],["MY-04",100000],["MY-05",100000],["MY-06",100000],["MY-07",100000],["MY-08",100000],["MY-09",100000],["MY-10",100000],["MY-11",100000],["MY-12",100000],["MY-13",100000],["MY-14",100000],["MY-15",100000],["MY-16",100000]];
                let map_my = Highcharts;

                map_my.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/my.json', function(geojson) {
                    map_my.mapChart('container_my', {
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
                            data: data_my,
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
    public function a_region_map_component_for_taiwan_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="tw" :values="[
                ['TW-CHA', 100000],
                ['TW-CYI', 100000],
                ['TW-CYQ', 100000],
                ['TW-HSZ', 100000],
                ['TW-HSQ', 100000],
                ['TW-HUA', 100000],
                ['TW-KHH', 100000],
                ['TW-PIF', 100000],
                ['TW-PIF', 100000],
                ['TW-NAN', 100000],
                ['TW-NWT', 100000],
                ['TW-MIA', 100000],
                ['TW-KEE', 100000],
                ['TW-PEN', 100000],
                ['TW-TXG', 100000],
                ['TW-TNN', 100000],
                ['TW-TPE', 100000],
                ['TW-TTT', 100000],
                ['TW-TAO', 100000],
                ['TW-YUN', 100000],
                ['TW-ILA', 100000],
                ['TW-LIE', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_tw" class="w-screen h-screen"></div>
            <script>
                let data_tw = [["TW-CHA",100000],["TW-CYI",100000],["TW-CYQ",100000],["TW-HSZ",100000],["TW-HSQ",100000],["TW-HUA",100000],["TW-KHH",100000],["TW-PIF",100000],["TW-PIF",100000],["TW-NAN",100000],["TW-NWT",100000],["TW-MIA",100000],["TW-KEE",100000],["TW-PEN",100000],["TW-TXG",100000],["TW-TNN",100000],["TW-TPE",100000],["TW-TTT",100000],["TW-TAO",100000],["TW-YUN",100000],["TW-ILA",100000],["TW-LIE",100000]];
                let map_tw = Highcharts;

                map_tw.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/tw.json', function(geojson) {
                    map_tw.mapChart('container_tw', {
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
                            data: data_tw,
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
    public function a_region_map_component_for_denmark_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="dk" :values="[
                ['DK-84', 100000],
                ['DK-82', 100000],
                ['DK-81', 100000],
                ['DK-83', 100000],
                ['DK-85', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_dk" class="w-screen h-screen"></div>
            <script>
                let data_dk = [["DK-84",100000],["DK-82",100000],["DK-81",100000],["DK-83",100000],["DK-85",100000]];
                let map_dk = Highcharts;

                map_dk.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/dk.json', function(geojson) {
                    map_dk.mapChart('container_dk', {
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
                            data: data_dk,
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
    public function a_region_map_component_for_portugal_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="pt" :values="[
                ['PT-01', 100000],
                ['PT-02', 100000],
                ['PT-03', 100000],
                ['PT-04', 100000],
                ['PT-05', 100000],
                ['PT-06', 100000],
                ['PT-07', 100000],
                ['PT-08', 100000],
                ['PT-09', 100000],
                ['PT-10', 100000],
                ['PT-11', 100000],
                ['PT-12', 100000],
                ['PT-13', 100000],
                ['PT-14', 100000],
                ['PT-15', 100000],
                ['PT-16', 100000],
                ['PT-17', 100000],
                ['PT-18', 100000],
                ['PT-20', 100000],
                ['PT-30', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_pt" class="w-screen h-screen"></div>
            <script>
                let data_pt = [["PT-01",100000],["PT-02",100000],["PT-03",100000],["PT-04",100000],["PT-05",100000],["PT-06",100000],["PT-07",100000],["PT-08",100000],["PT-09",100000],["PT-10",100000],["PT-11",100000],["PT-12",100000],["PT-13",100000],["PT-14",100000],["PT-15",100000],["PT-16",100000],["PT-17",100000],["PT-18",100000],["PT-20",100000],["PT-30",100000]];
                let map_pt = Highcharts;

                map_pt.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/pt.json', function(geojson) {
                    map_pt.mapChart('container_pt', {
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
                            data: data_pt,
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
    public function a_region_map_component_for_ireland_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ie" :values="[
                ['IE-CW', 100000],
                ['IE-CN', 100000],
                ['IE-CE', 100000],
                ['IE-CO', 100000],
                ['IE-DL', 100000],
                ['IE-D',  100000],
                ['IE-G',  100000],
                ['IE-KY', 100000],
                ['IE-KE', 100000],
                ['IE-KK', 100000],
                ['IE-LS', 100000],
                ['IE-LM', 100000],
                ['IE-LK', 100000],
                ['IE-LD', 100000],
                ['IE-LH', 100000],
                ['IE-MO', 100000],
                ['IE-MH', 100000],
                ['IE-MN', 100000],
                ['IE-OY', 100000],
                ['IE-RN', 100000],
                ['IE-SO', 100000],
                ['IE-TA', 100000],
                ['IE-WD', 100000],
                ['IE-WX', 100000],
                ['IE-WW', 100000],
                ['IE-WH', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ie" class="w-screen h-screen"></div>
            <script>
                let data_ie = [["IE-CW",100000],["IE-CN",100000],["IE-CE",100000],["IE-CO",100000],["IE-DL",100000],["IE-D",100000],["IE-G",100000],["IE-KY",100000],["IE-KE",100000],["IE-KK",100000],["IE-LS",100000],["IE-LM",100000],["IE-LK",100000],["IE-LD",100000],["IE-LH",100000],["IE-MO",100000],["IE-MH",100000],["IE-MN",100000],["IE-OY",100000],["IE-RN",100000],["IE-SO",100000],["IE-TA",100000],["IE-WD",100000],["IE-WX",100000],["IE-WW",100000],["IE-WH",100000]];
                let map_ie = Highcharts;

                map_ie.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ie.json', function(geojson) {
                    map_ie.mapChart('container_ie', {
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
                            data: data_ie,
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
    public function a_region_map_component_for_czech_republic_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="cz" :values="[
                ['CZ-20', 100000],
                ['CZ-52', 100000],
                ['CZ-41', 100000],
                ['CZ-51', 100000],
                ['CZ-80', 100000],
                ['CZ-71', 100000],
                ['CZ-53', 100000],
                ['CZ-32', 100000],
                ['CZ-10', 100000],
                ['CZ-31', 100000],
                ['CZ-64', 100000],
                ['CZ-43', 100000],
                ['CZ-63', 100000],
                ['CZ-72', 100000],
                ['CZ-42', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_cz" class="w-screen h-screen"></div>
            <script>
                let data_cz = [["CZ-20",100000],["CZ-52",100000],["CZ-41",100000],["CZ-51",100000],["CZ-80",100000],["CZ-71",100000],["CZ-53",100000],["CZ-32",100000],["CZ-10",100000],["CZ-31",100000],["CZ-64",100000],["CZ-43",100000],["CZ-63",100000],["CZ-72",100000],["CZ-42",100000]];
                let map_cz = Highcharts;

                map_cz.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/cz.json', function(geojson) {
                    map_cz.mapChart('container_cz', {
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
                            data: data_cz,
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
    public function a_region_map_component_for_hungary_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="hu" :values="[
                ['HU-BK', 100000],
                ['HU-BA', 100000],
                ['HU-BE', 100000],
                ['HU-BZ', 100000],
                ['HU-BU', 100000],
                ['HU-CS', 100000],
                ['HU-FE', 100000],
                ['HU-GS', 100000],
                ['HU-HB', 100000],
                ['HU-HE', 100000],
                ['HU-JN', 100000],
                ['HU-KE', 100000],
                ['HU-NO', 100000],
                ['HU-SO', 100000],
                ['HU-SZ', 100000],
                ['HU-TO', 100000],
                ['HU-VA', 100000],
                ['HU-VE', 100000],
                ['HU-ZA', 100000],
                ['HU-PE', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_hu" class="w-screen h-screen"></div>
            <script>
                let data_hu = [["HU-BK",100000],["HU-BA",100000],["HU-BE",100000],["HU-BZ",100000],["HU-BU",100000],["HU-CS",100000],["HU-FE",100000],["HU-GS",100000],["HU-HB",100000],["HU-HE",100000],["HU-JN",100000],["HU-KE",100000],["HU-NO",100000],["HU-SO",100000],["HU-SZ",100000],["HU-TO",100000],["HU-VA",100000],["HU-VE",100000],["HU-ZA",100000],["HU-PE",100000]];
                let map_hu = Highcharts;

                map_hu.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/hu.json', function(geojson) {
                    map_hu.mapChart('container_hu', {
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
                            data: data_hu,
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
    public function a_region_map_component_for_peru_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="pe" :values="[
                ['PE-AMA', 100000],
                ['PE-ANC', 100000],
                ['PE-APU', 100000],
                ['PE-ARE', 100000],
                ['PE-AYA', 100000],
                ['PE-CAJ', 100000],
                ['PE-CAL', 100000],
                ['PE-CUS', 100000],
                ['PE-HUV', 100000],
                ['PE-HUC', 100000],
                ['PE-ICA', 100000],
                ['PE-JUN', 100000],
                ['PE-LAL', 100000],
                ['PE-LAM', 100000],
                ['PE-LIM', 100000],
                ['PE-LMA', 100000],
                ['PE-LOR', 100000],
                ['PE-MDD', 100000],
                ['PE-MOQ', 100000],
                ['PE-PAS', 100000],
                ['PE-PIU', 100000],
                ['PE-SAM', 100000],
                ['PE-TAC', 100000],
                ['PE-TUM', 100000],
                ['PE-UCA', 100000],
                ['PE-PUN', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_pe" class="w-screen h-screen"></div>
            <script>
                let data_pe = [["PE-AMA",100000],["PE-ANC",100000],["PE-APU",100000],["PE-ARE",100000],["PE-AYA",100000],["PE-CAJ",100000],["PE-CAL",100000],["PE-CUS",100000],["PE-HUV",100000],["PE-HUC",100000],["PE-ICA",100000],["PE-JUN",100000],["PE-LAL",100000],["PE-LAM",100000],["PE-LIM",100000],["PE-LMA",100000],["PE-LOR",100000],["PE-MDD",100000],["PE-MOQ",100000],["PE-PAS",100000],["PE-PIU",100000],["PE-SAM",100000],["PE-TAC",100000],["PE-TUM",100000],["PE-UCA",100000],["PE-PUN",100000]];
                let map_pe = Highcharts;

                map_pe.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/pe.json', function(geojson) {
                    map_pe.mapChart('container_pe', {
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
                            data: data_pe,
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
    public function a_region_map_component_for_south_africa_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="za" :values="[
                ['ZA-EC',  100000],
                ['ZA-FS',  100000],
                ['ZA-GP',  100000],
                ['ZA-KZN', 100000],
                ['ZA-LP',  100000],
                ['ZA-MP',  100000],
                ['ZA-NW',  100000],
                ['ZA-NC',  100000],
                ['ZA-WC',  100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_za" class="w-screen h-screen"></div>
            <script>
                let data_za = [["ZA-EC",100000],["ZA-FS",100000],["ZA-GP",100000],["ZA-KZN",100000],["ZA-LP",100000],["ZA-MP",100000],["ZA-NW",100000],["ZA-NC",100000],["ZA-WC",100000]];
                let map_za = Highcharts;

                map_za.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/za.json', function(geojson) {
                    map_za.mapChart('container_za', {
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
                            data: data_za,
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
    public function a_region_map_component_for_ukraine_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ua" :values="[
                ['UA-71',  100000],
                ['UA-74',  100000],
                ['UA-77',  100000],
                ['UA-12',  100000],
                ['UA-14',  100000],
                ['UA-26',  100000],
                ['UA-63',  100000],
                ['UA-65',  100000],
                ['UA-68',  100000],
                ['UA-32',  100000],
                ['UA-30',  100000],
                ['UA-35',  100000],
                ['UA-09',  100000],
                ['UA-46',  100000],
                ['UA-48',  100000],
                ['UA-51',  100000],
                ['UA-53',  100000],
                ['UA-56',  100000],
                ['UA-40',  100000],
                ['UA-59',  100000],
                ['UA-61',  100000],
                ['UA-05',  100000],
                ['UA-07',  100000],
                ['UA-21',  100000],
                ['UA-23',  100000],
                ['UA-18',  100000],
                ['UA-43',  100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ua" class="w-screen h-screen"></div>
            <script>
                let data_ua = [["UA-71",100000],["UA-74",100000],["UA-77",100000],["UA-12",100000],["UA-14",100000],["UA-26",100000],["UA-63",100000],["UA-65",100000],["UA-68",100000],["UA-32",100000],["UA-30",100000],["UA-35",100000],["UA-09",100000],["UA-46",100000],["UA-48",100000],["UA-51",100000],["UA-53",100000],["UA-56",100000],["UA-40",100000],["UA-59",100000],["UA-61",100000],["UA-05",100000],["UA-07",100000],["UA-21",100000],["UA-23",100000],["UA-18",100000],["UA-43",100000]];
                let map_ua = Highcharts;

                map_ua.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ua.json', function(geojson) {
                    map_ua.mapChart('container_ua', {
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
                            data: data_ua,
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
    public function a_region_map_component_for_romania_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ro" :values="[
                ['RO-AB', 100000],
                ['RO-AR', 100000],
                ['RO-AG', 100000],
                ['RO-B',  100000],
                ['RO-BC', 100000],
                ['RO-BH', 100000],
                ['RO-BN', 100000],
                ['RO-BT', 100000],
                ['RO-BR', 100000],
                ['RO-BV', 100000],
                ['RO-BZ', 100000],
                ['RO-CL', 100000],
                ['RO-CS', 100000],
                ['RO-CJ', 100000],
                ['RO-CT', 100000],
                ['RO-CV', 100000],
                ['RO-DB', 100000],
                ['RO-DJ', 100000],
                ['RO-GL', 100000],
                ['RO-GR', 100000],
                ['RO-GJ', 100000],
                ['RO-HR', 100000],
                ['RO-HD', 100000],
                ['RO-IL', 100000],
                ['RO-IS', 100000],
                ['RO-IF', 100000],
                ['RO-MM', 100000],
                ['RO-MH', 100000],
                ['RO-MS', 100000],
                ['RO-NT', 100000],
                ['RO-OT', 100000],
                ['RO-PH', 100000],
                ['RO-SJ', 100000],
                ['RO-SM', 100000],
                ['RO-SB', 100000],
                ['RO-SV', 100000],
                ['RO-TR', 100000],
                ['RO-TM', 100000],
                ['RO-TL', 100000],
                ['RO-VL', 100000],
                ['RO-VS', 100000],
                ['RO-VN', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ro" class="w-screen h-screen"></div>
            <script>
                let data_ro = [["RO-AB",100000],["RO-AR",100000],["RO-AG",100000],["RO-B",100000],["RO-BC",100000],["RO-BH",100000],["RO-BN",100000],["RO-BT",100000],["RO-BR",100000],["RO-BV",100000],["RO-BZ",100000],["RO-CL",100000],["RO-CS",100000],["RO-CJ",100000],["RO-CT",100000],["RO-CV",100000],["RO-DB",100000],["RO-DJ",100000],["RO-GL",100000],["RO-GR",100000],["RO-GJ",100000],["RO-HR",100000],["RO-HD",100000],["RO-IL",100000],["RO-IS",100000],["RO-IF",100000],["RO-MM",100000],["RO-MH",100000],["RO-MS",100000],["RO-NT",100000],["RO-OT",100000],["RO-PH",100000],["RO-SJ",100000],["RO-SM",100000],["RO-SB",100000],["RO-SV",100000],["RO-TR",100000],["RO-TM",100000],["RO-TL",100000],["RO-VL",100000],["RO-VS",100000],["RO-VN",100000]];
                let map_ro = Highcharts;

                map_ro.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ro.json', function(geojson) {
                    map_ro.mapChart('container_ro', {
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
                            data: data_ro,
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
    public function a_region_map_component_for_greece_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="gr" :values="[
                ['GR-A', 100000],
                ['GR-B', 100000],
                ['GR-C', 100000],
                ['GR-D', 100000],
                ['GR-E', 100000],
                ['GR-F', 100000],
                ['GR-G', 100000],
                ['GR-H', 100000],
                ['GR-I', 100000],
                ['GR-J', 100000],
                ['GR-K', 100000],
                ['GR-L', 100000],
                ['GR-M', 100000],
                ['GR-MA', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_gr" class="w-screen h-screen"></div>
            <script>
                let data_gr = [["GR-A",100000],["GR-B",100000],["GR-C",100000],["GR-D",100000],["GR-E",100000],["GR-F",100000],["GR-G",100000],["GR-H",100000],["GR-I",100000],["GR-J",100000],["GR-K",100000],["GR-L",100000],["GR-M",100000],["GR-MA",100000]];
                let map_gr = Highcharts;

                map_gr.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/gr.json', function(geojson) {
                    map_gr.mapChart('container_gr', {
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
                            data: data_gr,
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
    public function a_region_map_component_for_israel_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="il" :values="[
                ['IL-M',  100000],
                ['IL-HA', 100000],
                ['IL-JM', 100000],
                ['IL-Z',  100000],
                ['IL-D',  100000],
                ['IL-TA', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_il" class="w-screen h-screen"></div>
            <script>
                let data_il = [["IL-M",100000],["IL-HA",100000],["IL-JM",100000],["IL-Z",100000],["IL-D",100000],["IL-TA",100000]];
                let map_il = Highcharts;

                map_il.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/il.json', function(geojson) {
                    map_il.mapChart('container_il', {
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
                            data: data_il,
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
    public function a_region_map_component_for_costa_rica_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="cr" :values="[
                ['CR-A', 100000],
                ['CR-C', 100000],
                ['CR-G', 100000],
                ['CR-H', 100000],
                ['CR-L', 100000],
                ['CR-P', 100000],
                ['CR-SJ', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_cr" class="w-screen h-screen"></div>
            <script>
                let data_cr = [["CR-A",100000],["CR-C",100000],["CR-G",100000],["CR-H",100000],["CR-L",100000],["CR-P",100000],["CR-SJ",100000]];
                let map_cr = Highcharts;

                map_cr.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/cr.json', function(geojson) {
                    map_cr.mapChart('container_cr', {
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
                            data: data_cr,
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
    public function a_region_map_component_for_vietnam_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="vn" :values="[
                ['VN-44', 100000],
                ['VN-43', 100000],
                ['VN-54', 100000],
                ['VN-53', 100000],
                ['VN-55', 100000],
                ['VN-56', 100000],
                ['VN-50', 100000],
                ['VN-31', 100000],
                ['VN-57', 100000],
                ['VN-58', 100000],
                ['VN-40', 100000],
                ['VN-59', 100000],
                ['VN-CT', 100000],
                ['VN-04', 100000],
                ['VN-DN', 100000],
                ['VN-72', 100000],
                ['VN-71', 100000],
                ['VN-39', 100000],
                ['VN-30', 100000],
                ['VN-03', 100000],
                ['VN-28', 100000],
                ['VN-01', 100000],
                ['VN-35', 100000],
                ['VN-09', 100000],
                ['VN-02', 100000],
                ['VN-41', 100000],
                ['VN-67', 100000],
                ['VN-22', 100000],
                ['VN-18', 100000],
                ['VN-36', 100000],
                ['VN-68', 100000],
                ['VN-32', 100000],
                ['VN-24', 100000],
                ['VN-27', 100000],
                ['VN-29', 100000],
                ['VN-13', 100000],
                ['VN-25', 100000],
                ['VN-23', 100000],
                ['VN-52', 100000],
                ['VN-05', 100000],
                ['VN-37', 100000],
                ['VN-20', 100000],
                ['VN-69', 100000],
                ['VN-21', 100000],
                ['VN-26', 100000],
                ['VN-46', 100000],
                ['VN-51', 100000],
                ['VN-07', 100000],
                ['VN-49', 100000],
                ['VN-70', 100000],
                ['VN-06', 100000],
                ['VN-33', 100000],
                ['VN-45', 100000],
                ['VN-14', 100000],
                ['VN-47', 100000],
                ['VN-73', 100000],
                ['VN-34', 100000],
                ['VN-SG', 100000],
                ['VN-HN', 100000],
                ['VN-63', 100000],
                ['VN-66', 100000],
                ['VN-61', 100000],
                ['VN-HP', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_vn" class="w-screen h-screen"></div>
            <script>
                let data_vn = [["VN-44",100000],["VN-43",100000],["VN-54",100000],["VN-53",100000],["VN-55",100000],["VN-56",100000],["VN-50",100000],["VN-31",100000],["VN-57",100000],["VN-58",100000],["VN-40",100000],["VN-59",100000],["VN-CT",100000],["VN-04",100000],["VN-DN",100000],["VN-72",100000],["VN-71",100000],["VN-39",100000],["VN-30",100000],["VN-03",100000],["VN-28",100000],["VN-01",100000],["VN-35",100000],["VN-09",100000],["VN-02",100000],["VN-41",100000],["VN-67",100000],["VN-22",100000],["VN-18",100000],["VN-36",100000],["VN-68",100000],["VN-32",100000],["VN-24",100000],["VN-27",100000],["VN-29",100000],["VN-13",100000],["VN-25",100000],["VN-23",100000],["VN-52",100000],["VN-05",100000],["VN-37",100000],["VN-20",100000],["VN-69",100000],["VN-21",100000],["VN-26",100000],["VN-46",100000],["VN-51",100000],["VN-07",100000],["VN-49",100000],["VN-70",100000],["VN-06",100000],["VN-33",100000],["VN-45",100000],["VN-14",100000],["VN-47",100000],["VN-73",100000],["VN-34",100000],["VN-SG",100000],["VN-HN",100000],["VN-63",100000],["VN-66",100000],["VN-61",100000],["VN-HP",100000]];
                let map_vn = Highcharts;

                map_vn.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/vn.json', function(geojson) {
                    map_vn.mapChart('container_vn', {
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
                            data: data_vn,
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
    public function a_region_map_component_for_slovakia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="sk" :values="[
                ['SK-BC', 100000],
                ['SK-BL', 100000],
                ['SK-KI', 100000],
                ['SK-NI', 100000],
                ['SK-PV', 100000],
                ['SK-TC', 100000],
                ['SK-TA', 100000],
                ['SK-ZI', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_sk" class="w-screen h-screen"></div>
            <script>
                let data_sk = [["SK-BC",100000],["SK-BL",100000],["SK-KI",100000],["SK-NI",100000],["SK-PV",100000],["SK-TC",100000],["SK-TA",100000],["SK-ZI",100000]];
                let map_sk = Highcharts;

                map_sk.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/sk.json', function(geojson) {
                    map_sk.mapChart('container_sk', {
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
                            data: data_sk,
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
    public function a_region_map_component_for_lithuania_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="lt" :values="[
                ['LT-AL', 100000],
                ['LT-KU', 100000],
                ['LT-KL', 100000],
                ['LT-MR', 100000],
                ['LT-PN', 100000],
                ['LT-SA', 100000],
                ['LT-TA', 100000],
                ['LT-TE', 100000],
                ['LT-UT', 100000],
                ['LT-VL', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_lt" class="w-screen h-screen"></div>
            <script>
                let data_lt = [["LT-AL",100000],["LT-KU",100000],["LT-KL",100000],["LT-MR",100000],["LT-PN",100000],["LT-SA",100000],["LT-TA",100000],["LT-TE",100000],["LT-UT",100000],["LT-VL",100000]];
                let map_lt = Highcharts;

                map_lt.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/lt.json', function(geojson) {
                    map_lt.mapChart('container_lt', {
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
                            data: data_lt,
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
    public function a_region_map_component_for_guatemala_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="gt" :values="[
                ['GT-AV', 100000],
                ['GT-BV', 100000],
                ['GT-CM', 100000],
                ['GT-CQ', 100000],
                ['GT-PR', 100000],
                ['GT-ES', 100000],
                ['GT-GU', 100000],
                ['GT-HU', 100000],
                ['GT-IZ', 100000],
                ['GT-JA', 100000],
                ['GT-JU', 100000],
                ['GT-PE', 100000],
                ['GT-QZ', 100000],
                ['GT-QC', 100000],
                ['GT-RE', 100000],
                ['GT-SA', 100000],
                ['GT-SM', 100000],
                ['GT-SR', 100000],
                ['GT-SO', 100000],
                ['GT-SU', 100000],
                ['GT-TO', 100000],
                ['GT-ZA', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_gt" class="w-screen h-screen"></div>
            <script>
                let data_gt = [["GT-AV",100000],["GT-BV",100000],["GT-CM",100000],["GT-CQ",100000],["GT-PR",100000],["GT-ES",100000],["GT-GU",100000],["GT-HU",100000],["GT-IZ",100000],["GT-JA",100000],["GT-JU",100000],["GT-PE",100000],["GT-QZ",100000],["GT-QC",100000],["GT-RE",100000],["GT-SA",100000],["GT-SM",100000],["GT-SR",100000],["GT-SO",100000],["GT-SU",100000],["GT-TO",100000],["GT-ZA",100000]];
                let map_gt = Highcharts;

                map_gt.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/gt.json', function(geojson) {
                    map_gt.mapChart('container_gt', {
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
                            data: data_gt,
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
    public function a_region_map_component_for_estonia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ee" :values="[
                ['EE-37', 100000],
                ['EE-39', 100000],
                ['EE-45', 100000],
                ['EE-52', 100000],
                ['EE-50', 100000],
                ['EE-56', 100000],
                ['EE-60', 100000],
                ['EE-68', 100000],
                ['EE-64', 100000],
                ['EE-71', 100000],
                ['EE-74', 100000],
                ['EE-79', 100000],
                ['EE-81', 100000],
                ['EE-84', 100000],
                ['EE-87', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ee" class="w-screen h-screen"></div>
            <script>
                let data_ee = [["EE-37",100000],["EE-39",100000],["EE-45",100000],["EE-52",100000],["EE-50",100000],["EE-56",100000],["EE-60",100000],["EE-68",100000],["EE-64",100000],["EE-71",100000],["EE-74",100000],["EE-79",100000],["EE-81",100000],["EE-84",100000],["EE-87",100000]];
                let map_ee = Highcharts;

                map_ee.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ee.json', function(geojson) {
                    map_ee.mapChart('container_ee', {
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
                            data: data_ee,
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
    public function a_region_map_component_for_latvia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="lv" :values="[
                ['LV-KR', 100000],
                ['LV-RI', 100000],
                ['LV-ZE', 100000],
                ['LV-LA', 100000],
                ['LV-VI', 100000],
                ['LV-PI', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_lv" class="w-screen h-screen"></div>
            <script>
                let data_lv = [["LV-KR",100000],["LV-RI",100000],["LV-ZE",100000],["LV-LA",100000],["LV-VI",100000],["LV-PI",100000]];
                let map_lv = Highcharts;

                map_lv.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/lv.json', function(geojson) {
                    map_lv.mapChart('container_lv', {
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
                            data: data_lv,
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
    public function a_region_map_component_for_bulgaria_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="bg" :values="[
                ['BG-01', 100000],
                ['BG-02', 100000],
                ['BG-03', 100000],
                ['BG-04', 100000],
                ['BG-05', 100000],
                ['BG-06', 100000],
                ['BG-07', 100000],
                ['BG-08', 100000],
                ['BG-09', 100000],
                ['BG-10', 100000],
                ['BG-11', 100000],
                ['BG-12', 100000],
                ['BG-13', 100000],
                ['BG-14', 100000],
                ['BG-15', 100000],
                ['BG-16', 100000],
                ['BG-17', 100000],
                ['BG-18', 100000],
                ['BG-19', 100000],
                ['BG-20', 100000],
                ['BG-21', 100000],
                ['BG-22', 100000],
                ['BG-23', 100000],
                ['BG-24', 100000],
                ['BG-25', 100000],
                ['BG-26', 100000],
                ['BG-27', 100000],
                ['BG-28', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_bg" class="w-screen h-screen"></div>
            <script>
                let data_bg = [["BG-01",100000],["BG-02",100000],["BG-03",100000],["BG-04",100000],["BG-05",100000],["BG-06",100000],["BG-07",100000],["BG-08",100000],["BG-09",100000],["BG-10",100000],["BG-11",100000],["BG-12",100000],["BG-13",100000],["BG-14",100000],["BG-15",100000],["BG-16",100000],["BG-17",100000],["BG-18",100000],["BG-19",100000],["BG-20",100000],["BG-21",100000],["BG-22",100000],["BG-23",100000],["BG-24",100000],["BG-25",100000],["BG-26",100000],["BG-27",100000],["BG-28",100000]];
                let map_bg = Highcharts;

                map_bg.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/bg.json', function(geojson) {
                    map_bg.mapChart('container_bg', {
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
                            data: data_bg,
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
    public function a_region_map_component_for_united_arab_emirates_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ae" :values="[
                ['AE-AZ', 100000],
                ['AE-AJ', 100000],
                ['AE-DU', 100000],
                ['AE-FU', 100000],
                ['AE-RK', 100000],
                ['AE-SH', 100000],
                ['AE-UQ', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ae" class="w-screen h-screen"></div>
            <script>
                let data_ae = [["AE-AZ",100000],["AE-AJ",100000],["AE-DU",100000],["AE-FU",100000],["AE-RK",100000],["AE-SH",100000],["AE-UQ",100000]];
                let map_ae = Highcharts;

                map_ae.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ae.json', function(geojson) {
                    map_ae.mapChart('container_ae', {
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
                            data: data_ae,
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
    public function a_region_map_component_for_uruguay_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="uy" :values="[
                ['UY-AR', 100000],
                ['UY-CA', 100000],
                ['UY-CL', 100000],
                ['UY-CO', 100000],
                ['UY-DU', 100000],
                ['UY-FS', 100000],
                ['UY-FD', 100000],
                ['UY-LA', 100000],
                ['UY-MA', 100000],
                ['UY-MO', 100000],
                ['UY-PA', 100000],
                ['UY-RN', 100000],
                ['UY-RV', 100000],
                ['UY-RO', 100000],
                ['UY-SA', 100000],
                ['UY-SJ', 100000],
                ['UY-SO', 100000],
                ['UY-TA', 100000],
                ['UY-TT', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_uy" class="w-screen h-screen"></div>
            <script>
                let data_uy = [["UY-AR",100000],["UY-CA",100000],["UY-CL",100000],["UY-CO",100000],["UY-DU",100000],["UY-FS",100000],["UY-FD",100000],["UY-LA",100000],["UY-MA",100000],["UY-MO",100000],["UY-PA",100000],["UY-RN",100000],["UY-RV",100000],["UY-RO",100000],["UY-SA",100000],["UY-SJ",100000],["UY-SO",100000],["UY-TA",100000],["UY-TT",100000]];
                let map_uy = Highcharts;

                map_uy.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/uy.json', function(geojson) {
                    map_uy.mapChart('container_uy', {
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
                            data: data_uy,
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
    public function a_region_map_component_for_paraguay_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="py" :values="[
                ['PY-16',  100000],
                ['PY-10',  100000],
                ['PY-13',  100000],
                ['PY-ASU', 100000],
                ['PY-19',  100000],
                ['PY-05',  100000],
                ['PY-06',  100000],
                ['PY-14',  100000],
                ['PY-11',  100000],
                ['PY-01',  100000],
                ['PY-03',  100000],
                ['PY-04',  100000],
                ['PY-07',  100000],
                ['PY-08',  100000],
                ['PY-12',  100000],
                ['PY-09',  100000],
                ['PY-15',  100000],
                ['PY-02',  100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_py" class="w-screen h-screen"></div>
            <script>
                let data_py = [["PY-16",100000],["PY-10",100000],["PY-13",100000],["PY-ASU",100000],["PY-19",100000],["PY-05",100000],["PY-06",100000],["PY-14",100000],["PY-11",100000],["PY-01",100000],["PY-03",100000],["PY-04",100000],["PY-07",100000],["PY-08",100000],["PY-12",100000],["PY-09",100000],["PY-15",100000],["PY-02",100000]];
                let map_py = Highcharts;

                map_py.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/py.json', function(geojson) {
                    map_py.mapChart('container_py', {
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
                            data: data_py,
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
    public function a_region_map_component_for_dominican_republic_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="do" :values="[
                ['DO-01',  100000],
                ['DO-02',  100000],
                ['DO-03',  100000],
                ['DO-04',  100000],
                ['DO-05',  100000],
                ['DO-06',  100000],
                ['DO-07',  100000],
                ['DO-08',  100000],
                ['DO-09',  100000],
                ['DO-10',  100000],
                ['DO-11',  100000],
                ['DO-12',  100000],
                ['DO-13',  100000],
                ['DO-14',  100000],
                ['DO-15',  100000],
                ['DO-16',  100000],
                ['DO-17',  100000],
                ['DO-18',  100000],
                ['DO-19',  100000],
                ['DO-20',  100000],
                ['DO-21',  100000],
                ['DO-22',  100000],
                ['DO-23',  100000],
                ['DO-24',  100000],
                ['DO-25',  100000],
                ['DO-26',  100000],
                ['DO-27',  100000],
                ['DO-28',  100000],
                ['DO-29',  100000],
                ['DO-30',  100000],
                ['DO-31',  100000],
                ['DO-32',  100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_do" class="w-screen h-screen"></div>
            <script>
                let data_do = [["DO-01",100000],["DO-02",100000],["DO-03",100000],["DO-04",100000],["DO-05",100000],["DO-06",100000],["DO-07",100000],["DO-08",100000],["DO-09",100000],["DO-10",100000],["DO-11",100000],["DO-12",100000],["DO-13",100000],["DO-14",100000],["DO-15",100000],["DO-16",100000],["DO-17",100000],["DO-18",100000],["DO-19",100000],["DO-20",100000],["DO-21",100000],["DO-22",100000],["DO-23",100000],["DO-24",100000],["DO-25",100000],["DO-26",100000],["DO-27",100000],["DO-28",100000],["DO-29",100000],["DO-30",100000],["DO-31",100000],["DO-32",100000]];
                let map_do = Highcharts;

                map_do.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/do.json', function(geojson) {
                    map_do.mapChart('container_do', {
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
                            data: data_do,
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
    public function a_region_map_component_for_belarus_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="by" :values="[
                ['BY-BR',  100000],
                ['BY-HO',  100000],
                ['BY-HR',  100000],
                ['BY-MI',  100000],
                ['BY-HM',  100000],
                ['BY-MA',  100000],
                ['BY-VI',  100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_by" class="w-screen h-screen"></div>
            <script>
                let data_by = [["BY-BR",100000],["BY-HO",100000],["BY-HR",100000],["BY-MI",100000],["BY-HM",100000],["BY-MA",100000],["BY-VI",100000]];
                let map_by = Highcharts;

                map_by.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/by.json', function(geojson) {
                    map_by.mapChart('container_by', {
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
                            data: data_by,
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
    public function a_region_map_component_for_panama_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="pa" :values="[
                ['PA-01',  100000],
                ['PA-04',  100000],
                ['PA-02',  100000],
                ['PA-03',  100000],
                ['PA-05',  100000],
                ['PA-EM',  100000],
                ['PA-KY',  100000],
                ['PA-06',  100000],
                ['PA-07',  100000],
                ['PA-NB',  100000],
                ['PA-08',  100000],
                ['PA-10',  100000],
                ['PA-09',  100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_pa" class="w-screen h-screen"></div>
            <script>
                let data_pa = [["PA-01",100000],["PA-04",100000],["PA-02",100000],["PA-03",100000],["PA-05",100000],["PA-EM",100000],["PA-KY",100000],["PA-06",100000],["PA-07",100000],["PA-NB",100000],["PA-08",100000],["PA-10",100000],["PA-09",100000]];
                let map_pa = Highcharts;

                map_pa.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/pa.json', function(geojson) {
                    map_pa.mapChart('container_pa', {
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
                            data: data_pa,
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
    public function a_region_map_component_for_saudi_arabia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="sa" :values="[
                ['SA-14',  100000],
                ['SA-11',  100000],
                ['SA-04',  100000],
                ['SA-06',  100000],
                ['SA-12',  100000],
                ['SA-09',  100000],
                ['SA-03',  100000],
                ['SA-02',  100000],
                ['SA-10',  100000],
                ['SA-08',  100000],
                ['SA-05',  100000],
                ['SA-01',  100000],
                ['SA-07',  100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_sa" class="w-screen h-screen"></div>
            <script>
                let data_sa = [["SA-14",100000],["SA-11",100000],["SA-04",100000],["SA-06",100000],["SA-12",100000],["SA-09",100000],["SA-03",100000],["SA-02",100000],["SA-10",100000],["SA-08",100000],["SA-05",100000],["SA-01",100000],["SA-07",100000]];
                let map_sa = Highcharts;

                map_sa.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/sa.json', function(geojson) {
                    map_sa.mapChart('container_sa', {
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
                            data: data_sa,
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
    public function a_region_map_component_for_iceland_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="is" :values="[
                ['IS-01',  100000],
                ['IS-02',  100000],
                ['IS-03',  100000],
                ['IS-04',  100000],
                ['IS-05',  100000],
                ['IS-06',  100000],
                ['IS-07',  100000],
                ['IS-08',  100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_is" class="w-screen h-screen"></div>
            <script>
                let data_is = [["IS-01",100000],["IS-02",100000],["IS-03",100000],["IS-04",100000],["IS-05",100000],["IS-06",100000],["IS-07",100000],["IS-08",100000]];
                let map_is = Highcharts;

                map_is.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/is.json', function(geojson) {
                    map_is.mapChart('container_is', {
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
                            data: data_is,
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
    public function a_region_map_component_for_egypt_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="eg" :values="[
                ['EG-ALX', 100000],
                ['EG-ASN', 100000],
                ['EG-AST', 100000],
                ['EG-BH',  100000],
                ['EG-BNS', 100000],
                ['EG-C',   100000],
                ['EG-DK',  100000],
                ['EG-DT',  100000],
                ['EG-FYM', 100000],
                ['EG-GH',  100000],
                ['EG-GZ',  100000],
                ['EG-IS',  100000],
                ['EG-KFS', 100000],
                ['EG-LX',  100000],
                ['EG-MT',  100000],
                ['EG-MN',  100000],
                ['EG-MNF', 100000],
                ['EG-WAD', 100000],
                ['EG-SIN', 100000],
                ['EG-PTS', 100000],
                ['EG-KB',  100000],
                ['EG-KN',  100000],
                ['EG-BA',  100000],
                ['EG-SHR', 100000],
                ['EG-SHG', 100000],
                ['EG-JS',  100000],
                ['EG-SUZ', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_eg" class="w-screen h-screen"></div>
            <script>
                let data_eg = [["EG-ALX",100000],["EG-ASN",100000],["EG-AST",100000],["EG-BH",100000],["EG-BNS",100000],["EG-C",100000],["EG-DK",100000],["EG-DT",100000],["EG-FYM",100000],["EG-GH",100000],["EG-GZ",100000],["EG-IS",100000],["EG-KFS",100000],["EG-LX",100000],["EG-MT",100000],["EG-MN",100000],["EG-MNF",100000],["EG-WAD",100000],["EG-SIN",100000],["EG-PTS",100000],["EG-KB",100000],["EG-KN",100000],["EG-BA",100000],["EG-SHR",100000],["EG-SHG",100000],["EG-JS",100000],["EG-SUZ",100000]];
                let map_eg = Highcharts;

                map_eg.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/eg.json', function(geojson) {
                    map_eg.mapChart('container_eg', {
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
                            data: data_eg,
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
    public function a_region_map_component_for_ecuador_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="ec" :values="[
                ['EC-A', 100000],
                ['EC-B', 100000],
                ['EC-F', 100000],
                ['EC-C', 100000],
                ['EC-H', 100000],
                ['EC-X', 100000],
                ['EC-O', 100000],
                ['EC-E', 100000],
                ['EC-W', 100000],
                ['EC-G', 100000],
                ['EC-I', 100000],
                ['EC-L', 100000],
                ['EC-R', 100000],
                ['EC-M', 100000],
                ['EC-S', 100000],
                ['EC-N', 100000],
                ['EC-D', 100000],
                ['EC-Y', 100000],
                ['EC-P', 100000],
                ['EC-SE', 100000],
                ['EC-SD', 100000],
                ['EC-U', 100000],
                ['EC-T', 100000],
                ['EC-Z', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_ec" class="w-screen h-screen"></div>
            <script>
                let data_ec = [["EC-A",100000],["EC-B",100000],["EC-F",100000],["EC-C",100000],["EC-H",100000],["EC-X",100000],["EC-O",100000],["EC-E",100000],["EC-W",100000],["EC-G",100000],["EC-I",100000],["EC-L",100000],["EC-R",100000],["EC-M",100000],["EC-S",100000],["EC-N",100000],["EC-D",100000],["EC-Y",100000],["EC-P",100000],["EC-SE",100000],["EC-SD",100000],["EC-U",100000],["EC-T",100000],["EC-Z",100000]];
                let map_ec = Highcharts;

                map_ec.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/ec.json', function(geojson) {
                    map_ec.mapChart('container_ec', {
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
                            data: data_ec,
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
    public function a_region_map_component_for_el_salvador_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="sv" :values="[
                ['SV-AH', 100000],
                ['SV-CA', 100000],
                ['SV-CH', 100000],
                ['SV-CU', 100000],
                ['SV-LI', 100000],
                ['SV-PA', 100000],
                ['SV-UN', 100000],
                ['SV-MO', 100000],
                ['SV-SM', 100000],
                ['SV-SS', 100000],
                ['SV-SV', 100000],
                ['SV-SA', 100000],
                ['SV-SO', 100000],
                ['SV-US', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_sv" class="w-screen h-screen"></div>
            <script>
                let data_sv = [["SV-AH",100000],["SV-CA",100000],["SV-CH",100000],["SV-CU",100000],["SV-LI",100000],["SV-PA",100000],["SV-UN",100000],["SV-MO",100000],["SV-SM",100000],["SV-SS",100000],["SV-SV",100000],["SV-SA",100000],["SV-SO",100000],["SV-US",100000]];
                let map_sv = Highcharts;

                map_sv.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/sv.json', function(geojson) {
                    map_sv.mapChart('container_sv', {
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
                            data: data_sv,
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
    public function a_region_map_component_for_bolivia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="bo" :values="[
                ['BO-B', 100000],
                ['BO-H', 100000],
                ['BO-C', 100000],
                ['BO-L', 100000],
                ['BO-O', 100000],
                ['BO-N', 100000],
                ['BO-P', 100000],
                ['BO-S', 100000],
                ['BO-T', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_bo" class="w-screen h-screen"></div>
            <script>
                let data_bo = [["BO-B",100000],["BO-H",100000],["BO-C",100000],["BO-L",100000],["BO-O",100000],["BO-N",100000],["BO-P",100000],["BO-S",100000],["BO-T",100000]];
                let map_bo = Highcharts;

                map_bo.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/bo.json', function(geojson) {
                    map_bo.mapChart('container_bo', {
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
                            data: data_bo,
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
    public function a_region_map_component_for_croatia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="hr" :values="[
                ['HR-07', 100000],
                ['HR-12', 100000],
                ['HR-21', 100000],
                ['HR-19', 100000],
                ['HR-18', 100000],
                ['HR-04', 100000],
                ['HR-06', 100000],
                ['HR-02', 100000],
                ['HR-09', 100000],
                ['HR-20', 100000],
                ['HR-14', 100000],
                ['HR-11', 100000],
                ['HR-08', 100000],
                ['HR-15', 100000],
                ['HR-03', 100000],
                ['HR-17', 100000],
                ['HR-05', 100000],
                ['HR-10', 100000],
                ['HR-16', 100000],
                ['HR-13', 100000],
                ['HR-01', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_hr" class="w-screen h-screen"></div>
            <script>
                let data_hr = [["HR-07",100000],["HR-12",100000],["HR-21",100000],["HR-19",100000],["HR-18",100000],["HR-04",100000],["HR-06",100000],["HR-02",100000],["HR-09",100000],["HR-20",100000],["HR-14",100000],["HR-11",100000],["HR-08",100000],["HR-15",100000],["HR-03",100000],["HR-17",100000],["HR-05",100000],["HR-10",100000],["HR-16",100000],["HR-13",100000],["HR-01",100000]];
                let map_hr = Highcharts;

                map_hr.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/hr.json', function(geojson) {
                    map_hr.mapChart('container_hr', {
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
                            data: data_hr,
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
    public function a_region_map_component_for_serbia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="rs" :values="[
                ['RS-BG', 100000],
                ['RS-VO', 100000],
                ['RS-SW', 100000],
                ['RS-SE', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_rs" class="w-screen h-screen"></div>
            <script>
                let data_rs = [["RS-BG",100000],["RS-VO",100000],["RS-SW",100000],["RS-SE",100000]];
                let map_rs = Highcharts;

                map_rs.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/rs.json', function(geojson) {
                    map_rs.mapChart('container_rs', {
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
                            data: data_rs,
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
    public function a_region_map_component_for_tunisia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="tn" :values="[
                ['TN-12', 100000],
                ['TN-31', 100000],
                ['TN-13', 100000],
                ['TN-23', 100000],
                ['TN-81', 100000],
                ['TN-71', 100000],
                ['TN-32', 100000],
                ['TN-41', 100000],
                ['TN-42', 100000],
                ['TN-73', 100000],
                ['TN-33', 100000],
                ['TN-53', 100000],
                ['TN-82', 100000],
                ['TN-52', 100000],
                ['TN-21', 100000],
                ['TN-61', 100000],
                ['TN-43', 100000],
                ['TN-34', 100000],
                ['TN-51', 100000],
                ['TN-83', 100000],
                ['TN-72', 100000],
                ['TN-11', 100000],
                ['TN-22', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_tn" class="w-screen h-screen"></div>
            <script>
                let data_tn = [["TN-12",100000],["TN-31",100000],["TN-13",100000],["TN-23",100000],["TN-81",100000],["TN-71",100000],["TN-32",100000],["TN-41",100000],["TN-42",100000],["TN-73",100000],["TN-33",100000],["TN-53",100000],["TN-82",100000],["TN-52",100000],["TN-21",100000],["TN-61",100000],["TN-43",100000],["TN-34",100000],["TN-51",100000],["TN-83",100000],["TN-72",100000],["TN-11",100000],["TN-22",100000]];
                let map_tn = Highcharts;

                map_tn.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/tn.json', function(geojson) {
                    map_tn.mapChart('container_tn', {
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
                            data: data_tn,
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
    public function a_region_map_component_for_kazakhstan_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="kz" :values="[
                ['KZ-AKM', 100000],
                ['KZ-AKT', 100000],
                ['KZ-ALA', 100000],
                ['KZ-ALM', 100000],
                ['KZ-AST', 100000],
                ['KZ-ATY', 100000],
                ['KZ-VOS', 100000], 
                ['KZ-ZHA', 100000],
                ['KZ-KAR', 100000],
                ['KZ-KUS', 100000],
                ['KZ-KZY', 100000],
                ['KZ-MAN', 100000],
                ['KZ-SEV', 100000],
                ['KZ-PAV', 100000],
                ['KZ-SHY', 100000],
                ['KZ-YUZ', 100000],
                ['KZ-ZAP', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_kz" class="w-screen h-screen"></div>
            <script>
                let data_kz = [["KZ-AKM",100000],["KZ-AKT",100000],["KZ-ALA",100000],["KZ-ALM",100000],["KZ-AST",100000],["KZ-ATY",100000],["KZ-VOS",100000],["KZ-ZHA",100000],["KZ-KAR",100000],["KZ-KUS",100000],["KZ-KZY",100000],["KZ-MAN",100000],["KZ-SEV",100000],["KZ-PAV",100000],["KZ-SHY",100000],["KZ-YUZ",100000],["KZ-ZAP",100000]];
                let map_kz = Highcharts;

                map_kz.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/kz.json', function(geojson) {
                    map_kz.mapChart('container_kz', {
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
                            data: data_kz,
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
    public function a_region_map_component_for_slovenia_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="si" :values="[
                ['SI-GO', 100000],
                ['SI-CK', 100000],
                ['SI-LI', 100000],
                ['SI-UC', 100000],
                ['SI-LS', 100000],
                ['SI-SS', 100000],
                ['SI-CS', 100000],
                ['SI-CE', 100000],
                ['SI-SA', 100000],
                ['SI-CA', 100000],
                ['SI-DR', 100000],
                ['SI-MU', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_si" class="w-screen h-screen"></div>
            <script>
                let data_si = [["SI-GO",100000],["SI-CK",100000],["SI-LI",100000],["SI-UC",100000],["SI-LS",100000],["SI-SS",100000],["SI-CS",100000],["SI-CE",100000],["SI-SA",100000],["SI-CA",100000],["SI-DR",100000],["SI-MU",100000]];
                let map_si = Highcharts;

                map_si.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/si.json', function(geojson) {
                    map_si.mapChart('container_si', {
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
                            data: data_si,
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
    public function a_region_map_component_for_honduras_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="hn" :values="[
                ['HN-AT', 100000],
                ['HN-CH', 100000],
                ['HN-CL', 100000],
                ['HN-CM', 100000],
                ['HN-CP', 100000],
                ['HN-CR', 100000],
                ['HN-EP', 100000],
                ['HN-FM', 100000],
                ['HN-GD', 100000],
                ['HN-IB', 100000],
                ['HN-IN', 100000],
                ['HN-LE', 100000],
                ['HN-LP', 100000],
                ['HN-OC', 100000],
                ['HN-OL', 100000],
                ['HN-SB', 100000],
                ['HN-VA', 100000],
                ['HN-YO', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_hn" class="w-screen h-screen"></div>
            <script>
                let data_hn = [["HN-AT",100000],["HN-CH",100000],["HN-CL",100000],["HN-CM",100000],["HN-CP",100000],["HN-CR",100000],["HN-EP",100000],["HN-FM",100000],["HN-GD",100000],["HN-IB",100000],["HN-IN",100000],["HN-LE",100000],["HN-LP",100000],["HN-OC",100000],["HN-OL",100000],["HN-SB",100000],["HN-VA",100000],["HN-YO",100000]];
                let map_hn = Highcharts;

                map_hn.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/hn.json', function(geojson) {
                    map_hn.mapChart('container_hn', {
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
                            data: data_hn,
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
    public function a_region_map_component_for_south_korea_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-map.region iso="kr" :values="[
                ['KR-26', 100000],
                ['KR-27', 100000],
                ['KR-30', 100000],
                ['KR-42', 100000],
                ['KR-29', 100000],
                ['KR-41', 100000],
                ['KR-28', 100000],
                ['KR-49', 100000],
                ['KR-43', 100000],
                ['KR-47', 100000],
                ['KR-45', 100000],
                ['KR-11', 100000],
                ['KR-44', 100000],
                ['KR-48', 100000],
                ['KR-46', 100000],
                ['KR-31', 100000],
                ['KR-50', 100000],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div id="container_kr" class="w-screen h-screen"></div>
            <script>
                let data_kr = [["KR-26",100000],["KR-27",100000],["KR-30",100000],["KR-42",100000],["KR-29",100000],["KR-41",100000],["KR-28",100000],["KR-49",100000],["KR-43",100000],["KR-47",100000],["KR-45",100000],["KR-11",100000],["KR-44",100000],["KR-48",100000],["KR-46",100000],["KR-31",100000],["KR-50",100000]];
                let map_kr = Highcharts;

                map_kr.getJSON('http://ui-kit-docs.test/control-ui-kit/map-data/kr.json', function(geojson) {
                    map_kr.mapChart('container_kr', {
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
                            data: data_kr,
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
        Invalid ISO. {Expected: au, br, ca, de, es, fr, gb, mx, nl, us, it, tr, ru, cl, ar, pl, se, ph, id, be, ch, in, no, jp, sg, co, nz, at, fi, my, tw, dk, pt, ie, cz, hu, pe, za, ua, ro, gr, il, th, cr, vn, sk, lt, ec, gt, ee, lv, bg, ae, uy, py, do, by, pa, sa, ma, lu, is, eg, sv, bo, hr, rs, tn, kz, si, mt, hn, kr}
        HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
