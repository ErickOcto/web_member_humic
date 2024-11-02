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
        .uploaded-file-item {
            margin-top: 10px;
            padding: 10px;
            border: 2px solid #4caf50;
            border-radius: 16px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        input[type="file"] {
            display: none;
        }



    </style>
@endpush

@section('dashboard-content')

    <h2 class="gradient-red"><b>Create Announcement</b></h2>

<form method="POST" class="row" action="{{ route('announcement.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
    <div class="card" style="border-radius: 16px; border: 0px; background-color: #f6f6f6;">
        <div class="card-body">

            <!-- File Upload -->
            <div class="mb-3">
                <div class="hero">
                    <label for="input-file" id="drop-area">
                        <input type="file" id="input-file" accept="image/*" multiple hidden>
                        <div id="img-view" style="">
                            <img src="{{ asset('assets/img/upload_icon.png') }}">
                            <p>Drag and drop or click here <br>to upload image</p>
                            <span>Upload any images from dekstop</span>
                        </div>
                    </label>
                </div>
                @error('uploaded_files')
                    <b class="text-danger"> {{ $message }}</b>
                @enderror
            </div>

            {{-- Repeater --}}
            <div id="uploaded-files-container" class="mb-3">

            </div>

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Type the title here">
                @error('title')
                    <b class="text-danger"> {{ $message }}</b>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid
                @enderror" id="description" name="description" placeholder="Type the description here"></textarea>
                @error('description')
                    <b class="text-danger"> {{ $message }}</b>
                @enderror
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Date -->
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control @error('date') is-invalid
                        @enderror" id="date" name="date">
                        @error('date')
                            <b class="text-danger"> {{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <!-- Time -->
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control @error('time') is-invalid
                @enderror" id="time" name="time">
                        @error('time')
                            <b class="text-danger"> {{ $message }}</b>
                        @enderror
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
        document.addEventListener('DOMContentLoaded', function () {
            const dropArea = document.getElementById('drop-area');
            const inputFile = document.getElementById('input-file');
            const uploadedFilesContainer = document.getElementById('uploaded-files-container');
            const form = document.querySelector('form');


            inputFile.addEventListener("change", function (e) {
                uploadImages(e.target.files);
            });


            dropArea.addEventListener("dragover", function (e) {
                e.preventDefault();
            });

            dropArea.addEventListener("drop", function (e) {
                e.preventDefault();
                uploadImages(e.dataTransfer.files);
            });


            function uploadImages(files) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    addFileToList(file);
                }
            }

            function addFileToList(file) {
                const fileId = 'file-' + Math.random().toString(36).substr(2, 9);
                const fileHtml = `
                    <div class="uploaded-file-item" id="${fileId}">
                        <input hidden type="file" name="uploaded_files[]" style="display: none;" data-id="${fileId}">
                        <span>${file.name}</span>
                        <button type="button" class="btn btn-danger" data-id="${fileId}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                    </div>
                `;
                uploadedFilesContainer.insertAdjacentHTML('beforeend', fileHtml);


                const newInput = document.createElement('input');
                newInput.type = 'file';
                newInput.name = 'uploaded_files[]';
                newInput.files = inputFile.files;
                uploadedFilesContainer.appendChild(newInput);
            }


            uploadedFilesContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('delete-file-btn')) {
                    const fileId = e.target.getAttribute('data-id');
                    const fileElement = document.getElementById(fileId);
                    if (fileElement) {
                        fileElement.remove();
                    }
                }
            });
        });
    </script>
@endpush
