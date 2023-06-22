@extends('layout.main')

@section('content')
  <h1>Pemain Bola</h1>

  <p>
    Pemain: {{ count($pemain) }}
    Klub: {{ count($klub) }}
    Negara: {{ count($negara) }}
  </p>

  <div id="container"></div>

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <script>
    Highcharts.chart('container', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Monthly Average Rainfall'
      },
      subtitle: {
        text: 'Source: WorldClimate.com'
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
          text: 'Rainfall (mm)'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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

  <form method="POST" action="{{ route('logout') }}" class="text-center">
    @csrf
    <button type="submit" class="btn-hover mb-2 mt-2 btn-danger" style="width: 100px; border-radius: 5px;">Logout</button>
  </form>
@endsection
