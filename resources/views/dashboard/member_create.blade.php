@extends('layouts.dashboard')

@section('dashboard-content')

    <h2 class="gradient-red"><b>Create Member</b></h2>

    <div class="row">
        <div class="col-12">
            <form style="background-color: #f6f6f6; border-radius: 16px; padding: 16px">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Nama lengkap</label>
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Username</label>
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Password</label>
                          <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Retype Password</label>
                          <input type="password" class="form-control">
                        </div>
                    </div>
                </div>
              <button type="submit" class="btn btn-primary text-start">Add Member</button>
            </form>
        </div>
    </div>

@endsection
