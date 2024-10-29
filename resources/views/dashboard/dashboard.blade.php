@extends('layouts.dashboard')

@push('css_scripts')
    <style>
#showEntries {
    display: inline-block;
    width: auto;
    margin: 0 10px;
}

.form-group label {
    font-weight: bold;
}

.form-group span {
    margin-left: 5px;
}

    </style>
@endpush

@section('dashboard-content')

    <h2 class="gradient-red"><b>Dashboard</b></h2>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-group">
                    <label for="showEntries" class="form-label text-danger">Show</label>
                    <select class="form-select" id="showEntries">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-danger">entries</span>
                </div>
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <select class="form-select" aria-label="Default select example">
              <option selected>Prodi: All</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <select class="form-select" aria-label="Default select example">
              <option selected>Fakultas: All</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <select class="form-select" aria-label="Default select example">
              <option selected>Cabang: All</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <div class="col-12 mt-2 shadow-lg" style="border-radius: 20px">
            <div class="table-responsive">
                <table class="table table-striped-rows table-hover align-middle">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>KODE DOSEN</th>
                            <th>EMAIL</th>
                            <th>STATUS</th>
                            <th>PRODI</th>
                            <th>FAKULTAS</th>
                            <th>CABANG</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                        <tr>
                          <td>{{ $member->NIP }}</td>
                          <td>{{ $member->name }}</td>
                          <td>{{ $member->code }}</td>
                          <td>{{ $member->email }}</td>
                          <td>
                            @if($member->status)
                                <span class="badge rounded-pill text-bg-success">Aktif</span>
                            @else
                                <span class="badge rounded-pill text-bg-danger">Tidak Aktif</span>
                            @endif
                          </td>
                          <td>{{ $member->department }}</td>
                          <td>{{ $member->faculty }}</td>
                          <td>{{ $member->branch }}</td>
                          <td>
                            <a href="#" class=" text-body">
                                Detail
                            </a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @include('components.modal-member')
@endsection
