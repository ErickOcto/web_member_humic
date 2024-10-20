@extends('layouts.dashboard')

@section('dashboard-content')

    <h2 class="gradient-red"><b>Project Gallery</b></h2>

    <div class="row">
        <div class="col-12 mt-5">
            <div class="table-responsive" style="background-color: #f6f6f6; border-radius: 16px">
                <table class="table table-striped-rows table-hover align-middle">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ambasigma</td>
                            <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, reiciendis.</td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @include('components.modal-member')
@endsection
