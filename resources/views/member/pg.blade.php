@extends('layouts.dashboard')

@section('dashboard-content')

    <h2 class="gradient-red"><b>Project Gallery</b></h2>

    <section class="row">
        <div class="col-12 text-end">
            <a href="{{ route('member.pgAdd') }}" class="btn btn-danger px-3 mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                Add Project
            </a>
        </div>
        <div class="col-12 mt-2">

            <div class="table-responsive" style="background-color: #f6f6f6; border-radius: 16px">
                <table class="table table-striped-rows table-hover align-middle">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1</td>
                          <td>Project abc</td>
                          <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo, earum.</td>
                          <td>
                            <span class="badge rounded-pill text-bg-success">Success</span>
                          </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
