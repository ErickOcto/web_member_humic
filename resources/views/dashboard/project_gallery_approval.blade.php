@extends('layouts.dashboard')

@section('dashboard-content')

    <h2 class="gradient-red"><b>Project Gallery Review</b></h2>

<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
    @csrf
    <div class="card" style="border-radius: 16px; border: 0px; background-color: #f6f6f6;">
        <div class="card-body">
            <div class="mb-3">
                <div class="text-center">
                    <h3><b>Preview</b></h3>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="approval" class="img-fluid" style="width: 70%">
                    </div>
                </div>
            </div>

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input disabled type="text" class="form-control" id="title" name="title" placeholder="Type the title here" value="{{ $item->title }}">
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea disabled class="form-control" id="description" name="description" placeholder="Type the description here">{{ $item->description }}</textarea>
            </div>

            <div class="col-12">
                <!-- Date -->
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input disabled type="date" class="form-control" id="date" name="date" value="{{ $item->date }}">
                </div>
            </div>


            <form action="{{ route('projectMember.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- comment -->
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" placeholder="Type the comment here">{{ $item->comment }}</textarea>
                    @error('comment')
                    <b class="text-danger">{{ $message }}</b>
                    @enderror
                </div>

                <div class="col-12 text-center">
                    <button type="submit" name="status" value="Rejected" style="min-width: 150px" class="btn btn-danger">DENY</button>
                    <button type="submit" name="status" value="Need Revision" style="min-width: 150px" class="btn btn-warning">REVISION</button>
                    <button type="submit" name="status" value="Approved" style="min-width: 150px" class="btn btn-success">APPROVE</button>
                </div>
            </form>

        </div>

    </div>
</div>

@endsection
