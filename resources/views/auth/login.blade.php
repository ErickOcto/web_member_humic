@extends('layouts.landing')

@push('css_scripts')
<style>
    body{
        max-height: 100vh !important;

        
    }
</style>
@endpush

@section('landing-content')

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mt-5">
                <h3 class="text-danger text-start"><b>Welcome to the HUMIC Engineering Member Portal!</b></h3>

                {{-- FORM --}}
                <form method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="my-3 text-start">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                    @error('username')
                        <b>Ada yang salah dengan username</b>
                    @enderror
                  </div>
                  <div class="mb-3 text-start">
                    <label for="exampleInputPassword1" class="form-label @error('password') is-invalid @enderror">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    @error('password')
                        <b>Ada yang salah dengan password</b>@enderror
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-danger">LOGIN</button>
                  </div>
                </form>
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



@endsection
