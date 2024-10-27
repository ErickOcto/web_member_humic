@extends('layouts.dashboard')

@push('css_scripts')
    <style>
        .card-custom{
            background-color: #F8ECEC;
            color: #111111;
            border-radius: 16px;
        }
        .card-custom-content{
            padding: 12px;
        }
    </style>
@endpush

@section('dashboard-content')
    <h2 class="gradient-red"><b>Announcement</b></h2>

    <div class="row">
        <div class="col-12">
            {{-- Iteration --}}
            <div class="card-custom mb-2">
                <div class="card-custom-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit ratione pariatur, ex laudantium, vero quidem eius, vel velit voluptatibus ipsum nam aliquid quam rem!
                </div>
            </div>
            <div class="card-custom mb-2">
                <div class="card-custom-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit ratione pariatur, ex laudantium, vero quidem eius, vel velit voluptatibus ipsum nam aliquid quam rem!
                </div>
            </div>
            <div class="card-custom mb-2">
                <div class="card-custom-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit ratione pariatur, ex laudantium, vero quidem eius, vel velit voluptatibus ipsum nam aliquid quam rem!
                </div>
            </div>
        </div>
    </div>

@endsection
