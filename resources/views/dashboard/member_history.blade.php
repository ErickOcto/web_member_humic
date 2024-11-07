@extends('layouts.dashboard')

@push('css_scripts')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
.card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: white;
}

#searchInput {
    width: 250px;
}

/* Button styling */
.btn-outline-secondary {
    display: flex;
    align-items: center;
    gap: 5px;
    font-weight: bold;
}

.bi-download {
    font-size: 1.2rem;
}

</style>
@endpush

@section('dashboard-content')

    <h2 class="gradient-red"><b>Member History</b></h2>
    <div class="divider"></div>

<div class="card p-3 shadow-lg border-0" style="border-radius: 20px">
    <div class="d-flex justify-content-between align-items-center">
        <form action="{{ route('member.history') }}" method="GET" class="d-flex justify-content-center align-items-center" id="entriesForm">
            <!-- Show entries dropdown -->
            <div class="form-group d-flex align-items-center" style="margin-right: 12px">
                <label for="showEntries" class="me-2 mb-0 text-danger">Show</label>
                <select class="form-select" id="showEntries" style="width: auto;" onchange="document.getElementById('entriesForm').submit()" name="entries">
                    <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                    <option value="15" {{ request('entries') == 15 ? 'selected' : '' }}>15</option>
                    <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                </select>
                <span class="ms-2 text-danger">entries</span>
            </div>

            <!-- Search input -->
            <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
            </div>
        </form>

        <!-- Download button -->
        <div>
            <a href="{{ route('login-history.download') }}" class="btn btn-outline-secondary">
                <i class="bi bi-download"></i> Download
            </a>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-12 mt-2 shadow-lg" style="border-radius: 20px">
            <div class="table-responsive">
                <table class="table table-striped-rows table-hover align-middle">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAME</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>IP</th>
                            <th>AGENT</th>
                            <th>DATE & TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->user->username }}</td>
                                <td>{{ $user->user->email }}</td>
                                <td>{{ $user->ip_address }}</td>
                                <td>{{ $user->user_agent }}</td>
                                <td><b>{{ $user->login_at }}</b></td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
