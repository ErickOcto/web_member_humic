@extends('layouts.landing')

@push('css_scripts')
    <style>
        .stat-box {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
        }

        .stat-box h4 {
            margin-top: 10px;
            color: #ff6f6f;
        }

        .stat-box h2 {
            font-weight: bold;
            color: #333;
        }

        .chart-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .chart-container canvas {
            max-height: 400px;
        }

        .title-text {
            text-align: center;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 30px;
        }
    </style>
@endpush

@section('landing-content')

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 mt-5">
                            <h1 class="text-danger text-start">Welcome to the HUMIC Engineering Member Portal!</h1>
                            <p class="text-start">
                                As a part of the HUMIC community, you gain exclusive access to the latest innovations
                                in the fields of the Internet of Things (IoT), Big Data, and healthcare technology.
                                Get ready to engage in collaboration, training, and research that will bring
                                technology closer to real life. Together, let's build a healthier and more
                                prosperous future!
                            </p>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="avatar-grid">
                                <div class="avatar">
                                    <img src="https://humic.telkomuniversity.ac.id/wp-content/uploads/2020/06/Adiwijaya.png" alt="Avatar 1">
                                </div>
                                <div class="avatar">
                                    <img src="https://humic.telkomuniversity.ac.id/wp-content/uploads/2024/05/image-10-1.png" alt="Avatar 2">
                                </div>
                                <div class="avatar">
                                    <img src="https://humic.telkomuniversity.ac.id/wp-content/uploads/2024/05/lastri-1.jpg" alt="Avatar 3">
                                </div>
                                <div class="avatar">
                                    <img src="https://humic.telkomuniversity.ac.id/wp-content/uploads/2024/05/435A4423-1.jpg" alt="Avatar 4">
                                </div>
                                <div class="avatar">
                                    <img src="https://humic.telkomuniversity.ac.id/wp-content/uploads/2024/05/amilaa-1.png" alt="Avatar 5">
                                </div>
                                <div class="avatar">
                                    <img src="https://humic.telkomuniversity.ac.id/wp-content/uploads/2020/06/profile_satria.jpg" alt="Avatar 6">
                                </div>
                                <div class="avatar">
                                    <img src="https://humic.telkomuniversity.ac.id/wp-content/uploads/2020/06/Putu-Harry-Gunawan.jpeg" alt="Avatar 7">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <section class="container my-5">
        <!-- Title Section -->
        <h2 class="title-text">STATISTIC</h2>

        <!-- Stat Boxes Section -->
        <div class="row text-center">
            <div class="col-12 col-md-4 text-center pb-5">
                <div class="stat-box">
                    <div class="text-center p-4 d-flex justify-content-center align-items-center" >
                        <svg class="p-4" xmlns="http://www.w3.org/2000/svg" width="32" style="background: #ffe4e4; width:fit-content; height:fit-content; border-radius:50%;" height="32" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h4>Prodi</h4>
                    <h2>{{ $totalDepartments }}</h2>
                </div>
            </div>

            <div class="col-12 col-md-4 text-center pb-5">
                <div class="stat-box">
                    <div class="amba text-center p-4 d-flex justify-content-center align-items-center" >
                        <svg class="p-4" xmlns="http://www.w3.org/2000/svg" width="32" style="background: #ffe4e4; width:fit-content; height:fit-content; border-radius:50%;" height="32" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h4>Fakultas</h4>
                    <h2>{{ $totalFaculties }}</h2>
                </div>
            </div>

            <div class="col-12 col-md-4 text-center pb-5">
                <div class="stat-box">
                    <div class="text-center p-4 d-flex justify-content-center align-items-center" >
                        <svg class="p-4" xmlns="http://www.w3.org/2000/svg" width="32" height="32" style="background: #ffe4e4; width:fit-content; height:fit-content; border-radius:50%;" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    </div>
                    <h4>Cabang</h4>
                    <h2>{{ $totalBranches }}</h2>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        </section>

    {{-- <div class="my-5">
        r
    </div> --}}

    <section class="container my-5">
        <h2 class="title-text">Project Gallery</h2>
        <div class="row gy-5">
            @forelse ($projects as $project)
                <div class="col-12 col-md-6">
                    <h3><b>{{ $project->title }}</b></h3>
                    <div class="gallery-card">
                        <img class="img-fluid" src="{{ asset('storage/' . $project->thumbnail) }}" alt="pg-1">
                    </div>
                </div>
            @empty
                <div class="col-12 col-md-6 w-100 text-center my-5">
                    <h3><b>Ups! Belum ada project tersedia</b></h3>
                </div>
            @endforelse
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
