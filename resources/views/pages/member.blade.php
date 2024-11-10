@extends('layouts.landing')

@section('landing-content')

    <section class="container d-flex align-items-center jus justify-content-center">
        <div class="row py-5 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-12 d-flex align-items-center justify-content-center">
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-4 offset-md-1 mt-sm-3 mt-md-0">
                <h3 class="font-bold"><b>{{ $user->name }}</b></h3>
                <h5><b>{{ $user->position_name }}</b></h5>
                <p class="mb-5">{{ $user->email }}</p>


                <p class="">NIP: <b>{{ $user->NIP }}</b></p>
                <p class="">Fakultas: <b>{{ $user->faculty }}</b></p>
                <p class="">Prodi: <b>{{ $user->department }}</b></p>
            </div>
        </div>
    </section>

@endsection
