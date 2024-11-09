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
    <div class="divider"></div>

    <div class="row">
        <form method="GET" action="{{ route('dashboard') }}" id="entriesForm">
            <div class="row gy-2">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="form-group d-flex align-items-center" style="margin-right: 12px">
                        <label for="showEntries" class="me-2 mb-0 text-danger">Show</label>
                        <select class="form-select" id="showEntries" name="entries" style="width: auto;" onchange="document.getElementById('entriesForm').submit()">
                            <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                            <option value="15" {{ request('entries') == 15 ? 'selected' : '' }}>15</option>
                            <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                        </select>
                        <span class="ms-2 text-danger">entries</span>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="input-group">
                      <input type="text" class="form-control" name="search" placeholder="Search by name, NIP, username, email" value="{{ request('search') }}" aria-label="Recipient's username" aria-describedby="button-addon2">
                      <button type="submit" class="btn btn-outline-secondary" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <select class="form-select" name="prodi" onchange="this.form.submit()">
                        <option value="All" {{ request('prodi') == 'All' ? 'selected' : '' }}>Prodi: All</option>
                        <option value="Informatika" {{ request('prodi') == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                        <option value="Rekayasa Perangkat Lunak" {{ request('prodi') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>


                    </select>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <select class="form-select" name="fakultas" onchange="this.form.submit()">
                        <option value="All" {{ request('fakultas') == 'All' ? 'selected' : '' }}>Fakultas: All</option>
                        <option value="Informatika" {{ request('fakultas') == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                        <option value="Teknik Elektro" {{ request('fakultas') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>


                    </select>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <select class="form-select" name="cabang" onchange="this.form.submit()">
                        <option value="All" {{ request('cabang') == 'All' ? 'selected' : '' }}>Cabang: All</option>
                        <option value="Jakarta" {{ request('cabang') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                        <option value="Bandung" {{ request('cabang') == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                        <option value="Surabaya" {{ request('cabang') == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                        <option value="Purwokerto" {{ request('cabang') == 'Purwokerto' ? 'selected' : '' }}>Purwokerto</option>
                    </select>
                </div>
            </div>
        </form>
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
                        @forelse ($members as $member)
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
                          <td style="min-width: 160px">
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning detail-btn" data-id="{{ $member->id }}" style="margin-right: 12px">
                                    Detail
                                </a>
                                <form action="{{ route('member.destroy', $member->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                          </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $members->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @include('components.modal-member')
@endsection

@push('js_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const detailButtons = document.querySelectorAll('.detail-btn');

        detailButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const memberId = this.getAttribute('data-id');

                document.getElementById('memberDetailContent').innerHTML = `<div class="col-12 text-center">Loading...</div>`;

                fetch(`/members/${memberId}`)
                    .then(response => response.json())
                    .then(data => {
                        let detailContent = `
                            <div class="col-12 col-lg-6 mt-2">
                                <div class="row">
                                    <div class="col-12 my-2">
                                        Nama lengkap <br>
                                        <b>${data.name}</b>
                                    </div>
                                    <div class="col-12 my-2">
                                        NIP <br>
                                        <b>${data.NIP}</b>
                                    </div>
                                    <div class="col-12 my-2">
                                        Fakultas <br>
                                        <b>${data.faculty}</b>
                                    </div>
                                    <div class="col-12 my-2">
                                        Program Studi <br>
                                        <b>${data.department}</b>
                                    </div>
                                    <div class="col-12 my-2">
                                        Nomor HP <br>
                                        <b>${data.handphone}</b>
                                    </div>
                                    <div class="col-12 my-2">
                                        Jenis Kelamin <br>
                                        <b>${data.gender ? 'Laki Laki' : 'Perempuan'}</b>
                                    </div>
                                    <div class="col-12 my-2">
                                        Agama <br>
                                        <b>${data.religion}</b>
                                    </div>
                                    <div class="col-12 my-2">
                                        Alamat asal <br>
                                        <b>${data.address}</b>
                                    </div>
                                    <div class="col-12 my-2">
                                        Tanggal Lahir <br>
                                        <b>${new Date(data.birthday).toLocaleDateString('id-ID')}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mt-2">
                                <img src="/storage/${data.profile_picture}" class="img-fluid" alt="${data.name}">
                            </div>`;
                        document.getElementById('memberDetailContent').innerHTML = detailContent;

                        // Tampilkan modal
                        const memberDetailModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        memberDetailModal.show();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.getElementById('memberDetailContent').innerHTML = '<div class="col-12 text-center text-danger">Error loading member details</div>';
                    });
            });
        });
    });
</script>
@endpush
