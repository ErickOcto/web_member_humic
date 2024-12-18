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

    @foreach ($unread as $item)
    <form action="{{ route('seen', $item->announcement->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="toast-container position-fixed top-0 end-0 p-3">
          <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background: #ffeaea; border: 0px; border-radius: 12px;">
            <div class="toast-body">
              <p>{{ $item->announcement->title }}</p>
              <div class="text-end">
                <button type="submit" class="btn btn-light btn-sm">Tandai Telah Dibaca</button>
              </div>
            </div>
          </div>
        </div>
    </form>
    @endforeach

    <h2 class="gradient-red"><b>Dashboard</b></h2>
    <div class="divider"></div>

    <div class="card border-0 member-dashboard" style="">
        <div class="row">
                <div class="col-12 col-lg-6 mt-2">
                    <div class="container">
                        <div class="my-2">
                            Nama lengkap <br>
                            <b>{{ Auth::user()->name }}</b>
                        </div>
                        <div class="my-2">
                            NIP <br>
                            <b>{{ Auth::user()->NIP }}</b>
                        </div>
                        <div class="my-2">
                            Fakultas <br>
                            <b>{{ Auth::user()->faculty }}</b>
                        </div>
                        <div class="my-2">
                            Program Studi <br>
                            <b>{{ Auth::user()->department }}</b>
                        </div>
                        <div class="my-2">
                            Nomor HP <br>
                            <b>{{ Auth::user()->handphone }}</b>
                        </div>
                        <div class="my-2">
                            Jenis Kelamin <br>
                            @if(Auth::user()->gender)
                                <b>Laki Laki</b>
                            @else
                                <b>Perempuan</b>
                            @endif
                        </div>
                        <div class="my-2">
                            Agama <br>
                            <b>{{ Auth::user()->religion }}</b>
                        </div>
                        <div class="my-2">
                            Alamat asal <br>
                            <b>{{ Auth::user()->address }}</b>
                        </div>
                        <div class="my-2">
                            Tanggal Lahir <br>
                            <b>{{ Auth::user()->birthday }}</b>
                        </div>
                    </div>
                </div>

                <div class="col-11 col-lg-5 m-3 offset-lg-1">
                    <div style="width: 100%; height: 250px; background-image: url('{{ Auth::user()->profile_picture != null ? asset('storage/' . Auth::user()->profile_picture) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541' }}'); background-position: center; background-size: cover;"></div>

                    <div class="my-2">
                        @if(Auth::user()->status)
                            <span class="badge rounded-pill text-bg-success">Aktif</span>
                        @else
                            <span class="badge rounded-pill text-bg-danger">Tidak Aktif</span>
                        @endif
                    </div>

                    <div class="my-2">
                        <b>{{ Auth::user()->name }}</b>
                    </div>
                    <div class="my-2">
                        @forelse (Auth::user()->eduBackground as $item)
                            <b>{{ $item->level }} {{ $item->major }} {{ $item->institution }}</b> <br>
                        @empty

                        @endforelse
                    </div>

                    <div class="my-2 d-grid">
                        <a href="{{ route('member.edit', Auth::user()->id) }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                    </div>

                </div>
        </div>
    </div>



@endsection

@push('js_scripts')
  <script>
    document.addEventListener("DOMContentLoaded", function(){
      var toastEl = document.getElementById('liveToast');
      var toast = new bootstrap.Toast(toastEl, {
        autohide: false,
      });
      toast.show();
    });
  </script>
@endpush
