@extends('layouts.petugas.master')

@section('title')
    admin
@endsection

@section('pages')
    admin
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="fa fa-box"></i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Barang</p>
            <h4 class="mb-0">{{ $barang }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <a href="{{ route('barang.index') }}">
            <div class="card-footer px-3 py-2">
              <div class="d-flex justify-content-between">
                  <p class="text-sm font-weight-bolder">More</p>
                  <i class="fa fa-arrow-right"></i>
              </div>
            </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="fa fa-balance-scale"></i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Lelang</p>
            <h4 class="mb-0">{{ $lelang }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
            <div class="card-footer px-3 py-2">
              
            </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="fa fa-user"></i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Petugas</p>
            <h4 class="mb-0">{{ $petugas }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <a href="{{ route('user.index') }}">
            <div class="card-footer px-3 py-2">
              <div class="d-flex justify-content-between">
                  <p class="text-sm font-weight-bolder">More</p>
                  <i class="fa fa-arrow-right"></i>
              </div>
            </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
            <i class="fa fa-users"></i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Masyarakat</p>
            <h4 class="mb-0">{{ $masyarakat }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <a href="{{ route('masyarakat.index') }}">
            <div class="card-footer px-3 py-2">
              <div class="d-flex justify-content-between">
                  <p class="text-sm font-weight-bolder">More</p>
                  <i class="fa fa-arrow-right"></i>
              </div>
            </div>
        </a>
      </div>
    </div>
  </div>

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
        // // Get context with jQuery - using jQuery's .get() method.
        // var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
        // // This will get the first returned node in the jQuery collection.
        // var salesChart = new Chart(salesChartCanvas);
        // var salesChartData = {
        //     labels: {{ json_encode($data_tanggal) }},
        //     datasets: [
        //         {
        //             label               : 'Pendapatan',
        //             fillColor           : 'rgba(60,141,188,0.9)',
        //             strokeColor         : 'rgba(60,141,188,0.8)',
        //             pointColor          : '#3b8bba',
        //             pointStrokeColor    : 'rgba(60,141,188,1)',
        //             pointHighlightFill  : '#fff',
        //             pointHighlightStroke: 'rgba(60,141,188,1)',
        //             data: {{ json_encode($data_pendapatan) }}
        //         }
        //     ]
        // };
        // var salesChartOptions = {
        //     pointDot : false,
        //     responsive : true
        // };
        // salesChart.Line(salesChartData, salesChartOptions);
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