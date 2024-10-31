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


    <h2 class="gradient-red"><b>Add Project</b></h2>

    <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
            <form action="{{ route('member.pgStore') }}" method="POST" style="background-color: #f6f6f6; border-radius: 16px; padding: 16px" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <div class="hero">
                                <label for="input-file" id="drop-area">
                                    <input required type="file" name="thumbnail" accept="image/*" id="input-file" hidden>
                                    <div id="img-view" style="">
                                        <img src="{{ asset('assets/img/upload_icon.png') }}">
                                        <p>Drag and drop or click here <br>to upload image</p>
                                        <span>Upload any images from dekstop</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Judul</label>
                          <input required type="text" name="title" class="form-control">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Deskripsi</label>
                          <textarea required name="description" type="text" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Tanggal</label>
                          <input type="date" required name="date" class="form-control">
                        </div>

                        <div class="text-center">

                            <a  href="{{ route('member.pg') }}" class="btn btn-outline-danger text-end px-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg> Cancel</a>

                            <button type="submit" class="btn btn-danger text-end px-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg> Submit</button>
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
