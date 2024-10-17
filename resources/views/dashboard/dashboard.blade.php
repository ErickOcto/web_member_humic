@extends('layouts.dashboard')

@section('dashboard-content')

    <h2><b>Dashboard</b></h2>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <select class="form-select" aria-label="Default select example">
              <option selected>Prodi: All</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <select class="form-select" aria-label="Default select example">
              <option selected>Fakultas: All</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <select class="form-select" aria-label="Default select example">
              <option selected>Cabang: All</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>
        <div class="col-12 mt-5">
            <div class="table-responsive" style="background-color: #f6f6f6; border-radius: 16px">
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
                        <tr>
                          <td>010101</td>
                          <td>Putu Hary Gunawan</td>
                          <td>PHN</td>
                          <td>putu@lecturer.telkomuniversity.ac.id</td>
                          <td>
                            <span class="badge rounded-pill text-bg-success">Success</span>
                          </td>
                          <td>INFORMATIKA</td>
                          <td>INFORMATIKA</td>
                          <td>BANDUNG</td>
                          <td>
                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Detail
                            </button>
                          </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @include('components.modal-member')
@endsection
