@extends('layouts.landing')

@push('css_scripts')

@endpush

@section('landing-content')

    <section class="container-fluid gradient-red text-white px-auto py-5 text-center">
        <h1>
            PROJECT GALLERY
        </h1>
    </section>

    <section class="container my-5">
        <div class="row gy-5">
            <div class="col-12 col-md-6">
                <h3><b>Project Web Humic</b></h3>
                <div class="gallery-card">
                    <img class="img-fluid" src="{{ asset('assets/img/pg-1.png') }}" alt="pg-1">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3><b>Project Web Humic 2</b></h3>
                <div class="gallery-card">
                    <img class="img-fluid" src="{{ asset('assets/img/pg-2.png') }}" alt="pg-2">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3><b>Project Humic</b></h3>
                <div class="gallery-card">
                    <img class="img-fluid" src="{{ asset('assets/img/pg-3.png') }}" alt="pg-3">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3><b>Project Media Humic</b></h3>
                <div class="gallery-card">
                    <img class="img-fluid" src="{{ asset('assets/img/pg-4.png') }}" alt="pg-4">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3><b>Project LinkedIN</b></h3>
                <div class="gallery-card">
                    <img class="img-fluid" src="{{ asset('assets/img/pg-5.png') }}" alt="pg-5">
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js_scripts')

@endpush
