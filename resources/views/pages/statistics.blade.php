@extends('layouts.landing')

@push('css_scripts')
<style>
    .info-box {
      border-radius: 15px;
      padding: 20px;
      color: #fff;
      font-weight: bold;
      background-color:
    }
    .prodi-box {
      background-color: #4a90e2;
    }
    .fakultas-box {
      background-color: #7ed321;
    }
    .aktif-box, .cabang-box {
      background-color: #369FFF;
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
.custom-card {
    border-radius: 20px;
    background-color: #f0f8ff;
    padding: 20px;
    color: #333;
    text-align: left;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    height: 200px;
}

.custom-card h6 {
    font-size: 1.5rem;
    font-weight: bold;
    color: #6c757d;
    margin-bottom: 10px;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #007bff;
    position: relative;
    padding-left: 20px;
}

.stat-number::before {
    content: '';
    position: absolute;
    left: 0;
    top: 5px;
    width: 5px;
    height: 80%;
    background-color: #007bff;
    border-radius: 10px;
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
                            <p class="display-4">{{ $totalDepartments }}</p>
                          </div>
                          <img src="{{ asset('assets/img/nb.png') }}" alt="Book Icon" class="info-icon">
                        </div>
                        <a href="#" class="view-detail">View Detail</a>
                      </div>
                    </div>

                    <!-- Aktif Box -->
                    <div class="col-md-6">
                        <div class="custom-card card-person">
                            <h6>AKTIF</h6>
                            <div class="stat-number">{{ $totalActive }} Person</div>
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
                            <p class="display-4">{{ $totalFaculties }}</p>
                          </div>
                          <img src="{{ asset('assets/img/com.png') }}" alt="Computer Icon" class="info-icon">
                        </div>
                        <a href="#" class="view-detail">View Detail</a>
                      </div>
                    </div>

                    <!-- Cabang Box -->
                    <div class="col-md-6">
                        <div class="custom-card card-person">
                            <h6>Cabang</h6>
                            <div class="stat-number">{{ $totalBranches }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js_scripts')
<script>
    const years = @json($usersGroupedByYear->pluck('year'));
    const totalMembersData = @json($usersGroupedByYear->pluck('total_members'));
    const activeMembersData = @json($activeUsersGroupedByYear->pluck('active_members'));

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: years,
            datasets: [
                {
                    label: 'Jumlah Member',
                    data: totalMembersData,
                    backgroundColor: '#e74c3c', // Warna merah untuk jumlah member
                    borderColor: '#e74c3c',
                    borderWidth: 1
                },
                {
                    label: 'Status Aktif',
                    data: activeMembersData,
                    backgroundColor: '#ff7979', // Warna pink untuk status aktif
                    borderColor: '#ff7979',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
