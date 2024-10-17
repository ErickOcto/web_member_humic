@extends('layouts.landing')

@section('landing-content')

    <section class="container-fluid gradient-red text-white px-auto py-5 text-center">
        <h1>
            CONTACT US
        </h1>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12 col-lg-4 offset-lg-4 col-md-6 offset-md-3 text-center">
                <h5 class="text-danger"><b>Form Layanan Keluhan RC HUMIC:</b></h5>
                <a href="https://bit.ly/Layanan_Keluhan_RCHUMIC" class=" text-4xl" style="text-decoration: none; color:black;">https://bit.ly/Layanan_Keluhan_RCHUMIC </a>
                <img src="{{ asset('assets/img/qr.png') }}" alt="qr-code" class="img-fluid">
            </div>
        </div>
    </section>

@endsection
