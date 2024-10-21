@extends('layouts.landing')

@push('css_scripts')
<style>
    .info-box {
      border-radius: 15px;
      padding: 20px;
      color: #fff;
      font-weight: bold;
    }
    .prodi-box {
      background-color: #4a90e2;
    }
    .fakultas-box {
      background-color: #7ed321;
    }
    .aktif-box, .cabang-box {
      background-color: #ecf0f1;
      color: #2c3e50;
    }
    .view-detail {
      background-color: #fff;
      color: #333;
      border-radius: 10px;
      padding: 5px 10px;
      font-size: 12px;
      display: inline-block;
      margin-top: 10px;
      position: relative;
      top: 0;
    }
    .info-icon {
      width: 80px;
      height: 80px;
    }
  </style>
@endpush

@section('landing-content')

    <section class="container-fluid gradient-red text-white px-auto py-5 text-center">
        <h1>
            STATISTICS
        </h1>
    </section>

    <section class="container my-4">
        <div class="row">
            <div class="col-12 col-lg-6">
                 <div class="shadow-lg p-3 mb-4 bg-body-tertiary" style="border-radius: 24px">
                  <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <!-- Prodi Box -->
                    <div class="col-md-6 mb-4">
                      <div class="info-box prodi-box text-white">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4>Prodi</h4>
                            <p class="display-4">6</p>
                          </div>
                          <img src="{{ asset('assets/img/nb.png') }}" alt="Book Icon" class="info-icon">
                        </div>
                        <a href="#" class="view-detail">View Detail</a>
                      </div>
                    </div>

                    <!-- Aktif Box -->
                    <div class="col-md-6 mb-4" style="height:auto">
                      <div class="info-box aktif-box">
                        <h4><b>AKTIF</b></h4>
                        <h4 class="text-danger"><b>44 Person</b></h4>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Fakultas Box -->
                    <div class="col-md-6 mb-4">
                      <div class="info-box fakultas-box text-white">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4>Fakultas</h4>
                            <p class="display-4">4</p>
                          </div>
                          <img src="{{ asset('assets/img/com.png') }}" alt="Computer Icon" class="info-icon">
                        </div>
                        <a href="#" class="view-detail">View Detail</a>
                      </div>
                    </div>

                    <!-- Cabang Box -->
                    <div class="col-md-6 mb-4" style="height:auto">
                      <div class="info-box aktif-box">
                        <h4><b>FAKULTAS</b></h4>
                        <h4 class="text-danger"><b>7 Fakultas</b></h4>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js_scripts')
<script>
    // Select the canvas element
    const ctx = document.getElementById('myChart').getContext('2d');

    // Define the data for the chart
    const data = {
      labels: ['2024', '2025', '2026', '2027', '2028'],
      datasets: [{
        label: 'Jumlah Member',
        data: [35, 40, 40, 10, 10],
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    };

    // Create the chart
    const myChart = new Chart(ctx, {
      type: 'bar', // Type of chart
      data: data,  // Data for the chart
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            display: true,
            labels: {
              color: 'rgb(255, 99, 132)'
            }
          }
        }
      }
    });
  </script>
@endpush
