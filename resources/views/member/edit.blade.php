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
            <form method="POST" action="{{ route('member.put', Auth::user()->id) }}" style="background-color: #f6f6f6; border-radius: 16px; padding: 16px" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Nama lengkap</label>
                              <input required type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}">
                              @error('name')
                              <b class="text-danger"> {{ $message }}</b>
                              @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">NIP</label>
                              <input required type="number" name="NIP" class="form-control @error('NIP') is-invalid @enderror" value="{{ old('NIP', Auth::user()->NIP) }}">
                              @error('NIP')
                              <b class="text-danger"> {{ $message }}</b>
                              @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Fakultas</label>
                                <select name="faculty" required class="form-select" aria-label="Default select example">
                                  <option value="Fakultas Informatika" {{ Auth::user()->faculty == "Fakultas Informatika" ? 'selected' : null }} >Fakultas Informatika</option>
                                  <option value="Fakultas Ekonomi dan Bisnis" {{ Auth::user()->faculty == "Fakultas Ekonomi dan Bisnis" ? 'selected' : null }}>Fakultas Ekonomi dan Bisnis</option>
                                  <option value="Fakultas Industri Kreatif" {{ Auth::user()->faculty == "Fakultas Industri Kreatif" ? 'selected' : null }}>Fakultas Industri Kreatif</option>
                                  <option value="Fakultas Ilmu Terapan" {{ Auth::user()->faculty == "Fakultas Ilmu Terapan" ? 'selected' : null }}>Fakultas Ilmu Terapan</option>
                                  <option value="Fakultas Teknik Elektro" {{ Auth::user()->faculty == "Fakultas Teknik Elektro" ? 'selected' : null }}>Fakultas Teknik Elektro</option>
                                  <option value="Fakultas Komunikasi dan Ilmu Sosial" {{ Auth::user()->faculty == "Fakultas Komunikasi dan Ilmu Sosial " ? 'selected' : null }}>Fakultas Komunikasi dan Ilmu Sosial</option>
                                  <option value="Fakultas Rekayasa Industri" {{ Auth::user()->faculty == "Fakultas Rekayasa Industri" ? 'selected' : null }}>Fakultas Rekayasa Industri</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Prodi</label>
                                <select required class="form-select" name="department" aria-label="Default select example">
                                  <option value="Informatika">Informatika</option>
                                  <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                  <option value="Teknologi Informasi">Teknologi Informasi</option>
                                  <option value="Sains Data">Sains Data</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Nomor HP</label>
                              <input required type="number" name="handphone" class="form-control @error('handphone') is-invalid
                              @enderror" value="{{ old('handphone', Auth::user()->handphone) }}">
                              @error('handphone')
                              <b class="text-danger"> {{ $message }}</b>
                              @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Tanggal Lahir</label>
                              <input name="birthday" required type="date" class="form-control @error('birthday') is-invalid @enderror"
                              value="{{ old('birthday', Auth::user()->birthday) }}"
                              >
                              @error('birthday')
                              <b class="text-danger"> {{ $message }}</b>
                              @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select required class="form-select" name="gender" aria-label="Default select example">
                                  <option value="1" {{ Auth::user()->gender }}>Laki Laki</option>
                                  <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Agama</label>
                              <input required type="text" name="religion" class="form-control @error('religion') is-invalid @enderror"
                              value="{{ old('religion', Auth::user()->religion) }}"
                              >
                              @error('religion')
                              <b class="text-danger"> {{ $message }}</b>
                              @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                              <label class="form-label">Alamat</label>
                              <textarea type="text" class="form-control @error('address') is-invalid @enderror" name="address">{{ Auth::user()->address }}</textarea>
                              @error('address')
                              <b class="text-danger"> {{ $message }}</b>
                              @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <div class="hero">
                                <label for="input-file" id="drop-area">
                                    <input type="file" accept="image/*" id="input-file" name="profile_picture" hidden>
                                    <div id="img-view" style="background-image: url('{{ Auth::user()->profile_picture != null ? asset('/storage/' . Auth::user()->profile_picture) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541' }}')">
                                        <img src="{{ asset('assets/img/upload_icon.png') }}">
                                        <p>Drag and drop or click here <br>to upload image</p>
                                        <span>Upload any images from dekstop</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="repeater-container" id="repeaterContainer">
                                <div class="repeater-item">
                                    @foreach(old('education_level', Auth::user()->educationHistory ?? []) as $index => $history)
                                    <select name="education_level[]" class="form-select">
                                        <option value="S1" {{ $history['level'] == 'S1' ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ $history['level'] == 'S2' ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ $history['level'] == 'S3' ? 'selected' : '' }}>S3</option>
                                    </select>
                                    <input type="text" name="program_study[]" placeholder="Program Studi" value="{{ $history['program_study'] ?? '' }}" class="form-control">
                                    <input type="text" name="university[]" placeholder="Universitas" value="{{ $history['university'] ?? '' }}" class="form-control">
                                    <span class="remove-icon" onclick="removeRepeaterItem(this)">&#x1F5D1;</span>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                            Latar belakang pendidikan
                            <button type="button" class="add-repeater-btn btn btn-dark" onclick="addRepeaterItem()">
                                Tambah
                            </button>
                            </div>
                        </div>

                        <div class="text-end mt-3">
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

    <script>
document.addEventListener("DOMContentLoaded", function () {
    // Mengambil data lama dari server untuk di-load ulang
    const levels = @json(old('level', Auth::user()->eduBackground->pluck('level') ?? []));
    const majors = @json(old('major', Auth::user()->eduBackground->pluck('major') ?? []));
    const institutions = @json(old('institution', Auth::user()->eduBackground->pluck('institution') ?? []));

    if (levels.length > 0) {
        const container = document.getElementById('repeaterContainer');
        for (let i = 0; i < levels.length; i++) {
            const newItem = document.createElement('div');
            newItem.classList.add('repeater-item');
            newItem.innerHTML = `
            <div class="input-group mt-3">
                <select name="level[]" class="form-select">
                    <option value="S1" ${levels[i] === 'S1' ? 'selected' : ''}>S1</option>
                    <option value="S2" ${levels[i] === 'S2' ? 'selected' : ''}>S2</option>
                    <option value="S3" ${levels[i] === 'S3' ? 'selected' : ''}>S3</option>
                </select>

                <input type="text" name="major[]" placeholder="Program Studi" class="form-control" value="${majors[i] || ''}">

                <input type="text" name="institution[]" placeholder="Universitas" class="form-control" value="${institutions[i] || ''}">

                <button class="remove-icon btn btn-danger" onclick="removeRepeaterItem(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
            </div>
            `;
            container.appendChild(newItem);
        }
    }
});

function addRepeaterItem() {
    const container = document.getElementById('repeaterContainer');
    const newItem = document.createElement('div');
    newItem.classList.add('repeater-item');
    newItem.innerHTML = `
    <div class="input-group mt-3">
        <select name="level[]" class="form-select">
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
        </select>

        <input type="text" name="major[]" placeholder="Program Studi" class="form-control">

        <input type="text" name="institution[]" placeholder="Universitas" class="form-control">

        <button class="remove-icon btn btn-danger" onclick="removeRepeaterItem(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </button>
    </div>
    `;
    container.appendChild(newItem);
}

function removeRepeaterItem(element) {
    const item = element.parentElement;
    item.remove();
}

    </script>
@endpush
