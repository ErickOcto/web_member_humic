@extends('layouts.dashboard')

@section('dashboard-content')

    <h2><b>Member History</b></h2>

    <div class="row">
        <div class="col-12 mt-5">
            <div class="table-responsive" style="background-color: #f6f6f6; border-radius: 16px">
                <table class="table table-striped-rows table-hover align-middle">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAME</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>DATE & TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ambasigma</td>
                            <td>Sigma</td>
                            <td>amba@sigma.com</td>
                            <td>2024-10-04 16:43:21</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
