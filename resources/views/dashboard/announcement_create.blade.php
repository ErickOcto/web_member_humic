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

    <h2 class="gradient-red"><b>Create Announcement</b></h2>

<form method="POST" class="row" action="" enctype="multipart/form-data">
    @csrf
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
    <div class="card" style="border-radius: 16px; border: 0px; background-color: #f6f6f6;">
        <div class="card-body">

            <!-- File Upload -->
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

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Type the title here">
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Type the description here"></textarea>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Date -->
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                </div>
                <div class="col-12">
                    <!-- Time -->
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary px-5">Submit</button>
            </div>
        </div>

    </div>
    </div>
</form>


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
