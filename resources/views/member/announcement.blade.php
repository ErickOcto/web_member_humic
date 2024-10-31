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

        .gallery-container {
          display: grid;
          grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
          gap: 10px;
        }

        .gallery-item {
          position: relative;
          overflow: hidden;
        }

        .gallery-item img {
          width: 100%;
          height: auto;
          display: block;
        }

        .more-photos {
          position: absolute;
          bottom: 0;
          right: 0;
          background-color: rgba(0, 0, 0, 0.5);
          color: white;
          padding: 5px 10px;
          font-size: 1rem;
          display: none;
        }

        .gallery-item:hover .more-photos {
          display: block;
        }

/* Modal styles */
        .modal {
          display: none;
          position: fixed;
          z-index: 1000;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
        }

        .modal-content img {
          width: 100%;
          height: auto;
        }

        .close {
          position: absolute;
          top: 20px;
          right: 35px;
          color: #fff;
          font-size: 40px;
          font-weight: bold;
          cursor: pointer;
        }

    </style>
@endpush

@section('dashboard-content')
    <h2 class="gradient-red"><b>Announcement</b></h2>

    <div class="row">
        <div class="col-12" style="min-height: 100vh">
            {{-- Iteration --}}
            @forelse ($announcements as $item)
                <div class="card-custom mb-2">
                    <div class="card-custom-content">
                        <b class="text-danger">{{ $item->title }}</b> <br>
                        <div class="gallery-container">
                            @foreach ($item->images as $photo)
                                <div class="gallery-item">
                                    <img src="{{ asset('storage/' . $photo->image) }}" alt="Gallery Image" class="image-clickable">
                                </div>
                            @endforeach
                        </div>
                        <p class="my-3">{!! $item->desc !!}</p>
                        <b>{{ $item->created_at }}</b>
                    </div>
                </div>
            @empty
                <h3 style="min-height: 100vh" class="text-danger text-bold d-flex justify-content-center align-items-center"><b>Tidak ada notifikasi</b></h3>
            @endforelse
        </div>
    </div>

<!-- Modal structure -->
<div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <div class="modal-content">
        <img id="modalImage" src="" alt="Full View Image">
    </div>
</div>

@endsection

@push('js_scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById('imageModal');
  const modalImg = document.getElementById('modalImage');
  const closeBtn = document.querySelector('.close');

  document.querySelectorAll('.image-clickable').forEach(image => {
    image.addEventListener('click', function () {
      modal.style.display = 'block';
      modalImg.src = this.src;
    });
  });

  closeBtn.onclick = function () {
    modal.style.display = 'none';
  };

  window.onclick = function (event) {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };
});

</script>
@endpush
