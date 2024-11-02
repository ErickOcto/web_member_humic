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

@endpush
