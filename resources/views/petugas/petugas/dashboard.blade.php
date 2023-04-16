@extends('layouts.petugas.master')

@section('title')
    petugas
@endsection

@section('pages')
    petugas
@endsection

@section('content')
  <div class="row mt-4">
    <div class="col-lg-12">
        <div class="card mb-3">
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="line-chart" class="chart-canvas" height="300px"></canvas>
              </div>
            </div>
          </div>
      </div>
  </div>

@endsection

@push('scripts')
<script>
    $(function() {
        var ctx1 = $("#line-chart").get(0).getContext("2d");

      new Chart(ctx1, {
        type: "line",
        data: {
          labels: {{ json_encode($data_tanggal) }},
          datasets: [{
              label: "Organic Search",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 2,
              pointBackgroundColor: "#e3316e",
              borderColor: "#e3316e",
              borderWidth: 3,
              backgroundColor: 'transparent',
              data: {{ json_encode($data_pendapatan) }},
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: true,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 10,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    });
</script>
@endpush