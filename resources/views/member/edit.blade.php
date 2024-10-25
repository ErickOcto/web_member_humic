@extends('layouts.dashboard')

@push('css_scripts')
    <style>
        #drop-area{
            width: 100%;
            height: 280px;
            padding: 30px;
            background: #fff;
            text-align: center;
            border-radius: 20px
        }

        #img-view{
            width: 100%;
            height: 100%;
            border-radius: 16px;
            border: 2px dashed #c10000;
            background: #ffeaea;
        }

        #img-view img{
            width: 100px;
            margin-top: 25px;
        }

        #img-view span{
            display: block;
            font-size: 12px;
            color: #777;
            margin-top: 15px;
        }

    </style>
@endpush


@section('dashboard-content')


    <h2 class="gradient-red"><b>Edit Profile</b></h2>

    <div class="row">
        <div class="col-12">
            <form style="background-color: #f6f6f6; border-radius: 16px; padding: 16px">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Nama lengkap</label>
                              <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">NIP</label>
                              <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Fakultas</label>
                                <select class="form-select" aria-label="Default select example">
                                  <option selected>Open this select menu</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Prodi</label>
                                <select class="form-select" aria-label="Default select example">
                                  <option selected>Open this select menu</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Nomor HP</label>
                              <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Tenggal Lahir</label>
                              <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example">
                                  <option selected>Pilih Jenis Kelamin</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Agama</label>
                              <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Alamat</label>
                              <textarea type="text" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <div class="hero">
                                <label for="input-file" id="drop-area">
                                    <input type="file" accept="image/*" id="input-file" hidden>
                                    <div id="img-view" style="">
                                        <img src="{{ asset('assets/img/upload_icon.png') }}">
                                        <p>Drag and drop or click here <br>to upload image</p>
                                        <span>Upload any images from dekstop</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary text-end px-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('js_scripts')
    <script>
        const dropArea = document.getElementById('drop-area');
        const inputFile = document.getElementById('input-file');
        const imageView = document.getElementById('img-view');

        inputFile.addEventListener("change", uploadImage);

        function uploadImage(){
            let imgLink = URL.createObjectURL(inputFile.files[0]);
            imageView.style.backgroundImage = `url(${imgLink})`;
            imageView.style.backgroundSize = `cover`;
            imageView.style.backgroundPosition = `center;`;
            imageView.textContent = "";
            imageView.style.border = 0;
        }

        dropArea.addEventListener("dragover", function(e){
            e.preventDefault();
        });
        dropArea.addEventListener("drop", function(e){
            e.preventDefault();
            inputFile.files = e.dataTransfer.files;
            uploadImage();
        });
    </script>
@endpush
