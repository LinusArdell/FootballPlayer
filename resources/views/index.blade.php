@extends('layout.main')

@section('Judul')
    Dashboard
@endsection
@section('content')
  <h1>Jumlah Klub Terdaftar</h1>

  <p>
                        Pemain : {{ count($pemain) }}
                        Klub : {{ count($klub) }}
                        Negara : {{ count($negara) }}



  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                        <figure class="highcharts-figure">
                        <div id="container"></div>
                            <p class="highcharts-description">
                            Daftar klub yang di data
                            </p>
                        </figure>

                        <style>
                            .highcharts-figure,
                            .highcharts-data-table table {
                                min-width: 310px;
                                max-width: 800px;
                                margin: 1em auto;
                            }

                            #container {
                                height: 400px;
                            }

                            .highcharts-data-table table {
                                font-family: Verdana, sans-serif;
                                border-collapse: collapse;
                                border: 1px solid #ebebeb;
                                margin: 10px auto;
                                text-align: center;
                                width: 100%;
                                max-width: 500px;
                            }

                            .highcharts-data-table caption {
                                padding: 1em 0;
                                font-size: 1.2em;
                                color: #555;
                            }

                            .highcharts-data-table th {
                                font-weight: 600;
                                padding: 0.5em;
                            }

                            .highcharts-data-table td,
                            .highcharts-data-table th,
                            .highcharts-data-table caption {
                                padding: 0.5em;
                            }

                            .highcharts-data-table thead tr,
                            .highcharts-data-table tr:nth-child(even) {
                                background: #f8f8f8;
                            }

                            .highcharts-data-table tr:hover {
                                background: #f1f7ff;
                            }
                        </style>

                    <script>
                        Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Klub Yang Terdata di The Souccer'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: [
                                    @foreach($klubNegara as $item)
                                        '{{ $item->nama_negara }}',
                                    @endforeach
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: ''
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Klub',
                                data: [
                                    @foreach($klubNegara as $item)
                                        {{ $item->jumlah }},
                                    @endforeach
                                ]
                            }]
                        });
                    </script>
                    </p>
                    {{-- <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button type="submit" class="btn-hover mb-2 mt-2 btn-danger" style="width: 100px; border-radius: 5px;">Logout</button>
              </form> --}}
@endsection
