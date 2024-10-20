@extends('layouts.dashboard')

@section('dashboard-content')

    <h2 class="gradient-red"><b>Create Announcement</b></h2>

<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="card" style="border-radius: 16px; border: 0px; background-color: #f6f6f6;">
        <div class="card-body">

            <!-- File Upload -->
            <div class="mb-3">
                <label class="form-label">Drag & drop files or <a href="#" class="text-danger">Browse</a></label>
                <input type="file" class="form-control" name="files[]" multiple accept=".jpg,.jpeg,.png,.gif,.mp4,.pdf,.psd,.ai,.doc,.docx,.ppt,.pptx">
                <small class="text-muted">Supported formats: JPEG, PNG, GIF, MP4, PDF, PSD, AI, Word, PPT</small>
            </div>

            <!-- Uploaded Files (Example, can be dynamic) -->
            <div class="mb-3">
                <label class="form-label">Uploaded</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control is-valid" value="document-name.PDF" disabled>
                    <button class="btn btn-outline-danger" type="button">&times;</button>
                </div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control is-valid" value="image-goes-here.png" disabled>
                    <button class="btn btn-outline-danger" type="button">&times;</button>
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
                <div class="col-12 col-md-6">
                    <!-- Date -->
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- Time -->
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">UPLOAD</button>

        </div>

    </div>
</form>


@endsection
