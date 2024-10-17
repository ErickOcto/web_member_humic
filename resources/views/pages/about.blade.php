@extends('layouts.landing')

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
                <div class="row">
                    <div class="col-12 col-lg-3 col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 320px; background-image: url('https://humic.telkomuniversity.ac.id/wp-content/uploads/2020/06/profile_satria.jpg'); background-position: center; background-size: cover;">
                            <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">Satria Mandala, S.T., M.Sc., Ph.D.<br>
                                <b>Director of Research Center</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 320px; background-image: url('https://humic.telkomuniversity.ac.id/wp-content/uploads/2020/06/Putu-Harry-Gunawan.jpeg'); background-position: center; background-size: cover;">
                            <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">Dr. Putu Harry Gunawan, S.Si., M.Si., M.Sc.<br>
                                <b>Vice Director of Research Center</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 320px; background-image: url('https://humic.telkomuniversity.ac.id/wp-content/uploads/2024/05/amilaa-1.png'); background-position: center; background-size: cover;">
                            <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">Amila Nafila Vidyana, S.I.Kom<br>
                                <b>Staff</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 320px; background-image: url('https://humic.telkomuniversity.ac.id/wp-content/uploads/2024/05/435A4423-1.jpg'); background-position: center; background-size: cover;">
                            <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">Muhammad Rakha, S.T<br>
                                <b>Staff</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 320px; background-image: url('https://humic.telkomuniversity.ac.id/wp-content/uploads/2024/05/lastri-1.jpg'); background-position: center; background-size: cover;">
                            <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">Lastrimurni Dongoran, S.Kom<br>
                                <b>Staff</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 320px; background-image: url('https://humic.telkomuniversity.ac.id/wp-content/uploads/2020/06/Adiwijaya.png'); background-position: center; background-size: cover;">
                            <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">Prof. Dr. Adiwijaya, S.Si., M.Si.<br>
                                <b>Member</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 mb-3">
                        <div class="card" style="width: 100%; height: 320px; background-image: url('https://humic.telkomuniversity.ac.id/wp-content/uploads/2024/05/image-10-1.png'); background-position: center; background-size: cover;">
                            <p style="position: absolute; bottom: 10px; color: white; background-color: rgba(255, 0, 0, 0.65); width: 100%;" class="text-center">Prof. Dr. Tri Arief Sardjono, S.T., M.T.<br>
                                <b>Member</b>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

@endsection
