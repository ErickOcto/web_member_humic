@extends('layouts.dashboard')

@push('css_scripts')
    <style>
        .member-dashboard{
            border-radius: 16px; background-color: #f6f6f6; width:60%;
        }
        @media (max-width: 768px) {
        .member-dashboard{
            border-radius: 16px; background-color: #f6f6f6; width:100%;
        }
        }
    </style>
@endpush

@section('dashboard-content')

    <div class="toast-container position-fixed top-0 end-0 p-3">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background: #ffeaea; border: 0px; border-radius: 12px;">
        {{-- <div class="toast-header">
          <strong class="me-auto">Humic Engineering</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div> --}}
        <div class="toast-body">
          <p><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, numquam!</b></p>
          <div class="text-end">
            <button class="btn btn-light btn-sm">Tandai Telah Dibaca</button>
          </div>
        </div>
      </div>
    </div>

    <h2 class="gradient-red"><b>Dashboard</b></h2>

    <div class="card border-0 member-dashboard" style="">
        <div class="row">
                <div class="col-12 col-lg-6 mt-2">
                    <div class="container">
                        <div class="my-2">
                            Nama lengkap <br>
                            <b>Putu Hary Gunawan</b>
                        </div>
                        <div class="my-2">
                            NIP <br>
                            <b>103012440019</b>
                        </div>
                        <div class="my-2">
                            Fakultas <br>
                            <b>Informatika</b>
                        </div>
                        <div class="my-2">
                            Program Studi <br>
                            <b>Informatika</b>
                        </div>
                        <div class="my-2">
                            Nomor HP <br>
                            <b>081280043549</b>
                        </div>
                        <div class="my-2">
                            Jenis Kelamin <br>
                            <b>Laki Laki</b>
                        </div>
                        <div class="my-2">
                            Agama <br>
                            <b>Hindu</b>
                        </div>
                        <div class="my-2">
                            Alamat asal <br>
                            <b>Bali</b>
                        </div>
                        <div class="my-2">
                            Tanggal Lahir <br>
                            <b>17 17 2017</b>
                        </div>
                    </div>
                </div>

                <div class="col-11 col-lg-5 m-3 offset-lg-1">
                    <div style="width: 100%; height: 250px; background-image: url('https://humic.telkomuniversity.ac.id/wp-content/uploads/2020/06/Putu-Harry-Gunawan.jpeg'); background-position: center; background-size: cover;">
                    </div>

                    <div class="my-2">
                        <span class="badge rounded-pill text-bg-success">Aktif</span>
                    </div>

                    <div class="my-2">
                        <b>Putu Hary Gunawan</b>
                    </div>
                    <div class="my-2">
                        1. Udayana University <br>
                        2. Bandung Institute of Technology <br>
                        3. Bandung Institute of Technology <br>
                    </div>

                    <div class="my-2 d-grid">
                        <a href="{{ route('member.edit') }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                    </div>

                </div>
        </div>
    </div>



@endsection

@push('js_scripts')
  <script>
    document.addEventListener("DOMContentLoaded", function(){
      var toastEl = document.getElementById('liveToast');
      var toast = new bootstrap.Toast(toastEl);
      toast.show();
    });
  </script>
@endpush
