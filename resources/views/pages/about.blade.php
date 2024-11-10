@extends('layouts.landing')

@push('css_scripts')
<style>
    .divider {
        width: 100%;
        height: 2px;
        background-color: #ff0000;
        margin: 20px 0;
    }
</style>
@endpush

@section('landing-content')
            <section class="container-fluid gradient-red text-white px-auto py-5 text-center">
                <h1>
                    ABOUT US
                </h1>
            </section>

            <section class="container my-5">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <img src="{{ asset('assets/img/misi.png') }}" class="img-fluid" alt="gambar-misi">
                    </div>
                    <div class="col-12 col-lg-7 offset-lg-1">
                        <p>
                            Human Centric Engineering (HUMIC) is one of the research centers (RC) at Telkom University that was officially founded in February 2020 with Dr. Satria Mandala as the Director of the RC. Human Centric Engineering focuses
                            on several research fields, such as computing, informatics, electronics, robotics, mechanical and biomedical engineering. All of these researches are intended to support HUMIC’s vision to become a center of excellence in improving the health and well-being of human life.
                        </p>

                        <h4 class="text-danger">Vision</h4>
                        <p>To become an excellent research center in the field of engineering to improve the human health and prosperity
                        </p>

                        <h4 class="text-danger">Mission</h4>
                        <p>1. Becoming the science and technology excellent center in the field of embedded sensor systems to support biomedical applications based on the Internet of Things (IoT). <br>
                            2. Becoming the science and technology excellent center on development remote health monitoring systems based on Internet of Things (IoT). <br>
                            3. Becoming the science and technology excellent center on Big Data Analytic. <br>
                            4. Becoming the science and technology excellent center on health development of Information and Communication Technology (ICT). <br>
                        </p>
                    </div>
                </div>
            </section>

            <section class="meet-our-team">
                MEET OUR TEAM
            </section>

            <section class="container">
                <div class="row d-flex justify-content-center">
                    @foreach ($userOne as $itemOne)
                        <a href="{{ route('memberDetail', $itemOne->id) }}" class="col-12 col-lg-3 col-md-4 mb-3">
                            <div class="card" style="width: 100%; height: 320px;
                                background-image: url({{ $itemOne->profile_picture ? "/storage/" . $itemOne->profile_picture : 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b1/Portrait_placeholder.png/400px-Portrait_placeholder.png' }});
                                background-position: center;
                                background-size: cover;">
                                <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">
                                    {{$itemOne->name}}<br>
                                    <b>{{$itemOne->position_name}}</b>
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="divider"></div>
                <div class="row d-flex justify-content-center">
                    @foreach ($userTwo as $itemTwo)
                        <a href="{{ route('memberDetail', $itemTwo->id) }}" class="col-12 col-lg-3 col-md-4 mb-3">
                            <div class="card" style="width: 100%; height: 320px; background-image: url({{ $itemTwo->profile_picture ? "/storage/" . $itemTwo->profile_picture : 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b1/Portrait_placeholder.png/400px-Portrait_placeholder.png' }}); background-position: center; background-size: cover;">
                                <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">{{$itemTwo->name}}<br>
                                    <b>{{$itemTwo->position_name}}</b>
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="divider"></div>
                <div class="row d-flex justify-content-center">
                    @foreach ($userThree as $itemThree)
                        <a href="{{ route('memberDetail', $itemThree->id) }}" class="col-12 col-lg-3 col-md-4 mb-3">
                            <div class="card" style="width: 100%; height: 320px; background-image: url({{ $itemThree->profile_picture ? "/storage/" . $itemThree->profile_picture : 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b1/Portrait_placeholder.png/400px-Portrait_placeholder.png' }}); background-position: center; background-size: cover;">
                                <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">{{$itemThree->name}}<br>
                                    <b>{{$itemThree->position_name}}</b>
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>

@endsection
