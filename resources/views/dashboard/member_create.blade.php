@extends('layouts.dashboard')

@section('dashboard-content')

    <h2 class="gradient-red"><b>Create Member</b></h2>

    <div class="row">
        <div class="col-12">
            <form style="background-color: #f6f6f6; border-radius: 16px; padding: 16px" action="{{ route('member.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Nama lengkap</label>
                          <input required type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Cabang</label>
                          <select class="form-select" aria-label="Default select example" name="branch" required>
                            <option value="Bandung">Bandung</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Purwokerto">Purwokerto</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input required type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Username</label>
                          <input required type="text" name="username" class="form-control">
                          @error('username')
                              <b class="text-danger mt-5">Pastikan data benar</b>
                          @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Password</label>
                          <input required type="password" name="password" class="form-control">
                            @error('password')
                                <b class="text-danger mt-5">{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Retype Password</label>
                          <input required type="password" name="retype_password" class="form-control">
                        </div>
                    </div>
                </div>
              <button type="submit" class="btn btn-primary text-start">Add Member</button>
            </form>
        </div>
    </div>

@endsection
