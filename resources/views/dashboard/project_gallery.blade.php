@extends('layouts.dashboard')

@section('dashboard-content')

    <h2 class="gradient-red"><b>Project Gallery</b></h2>
    <div class="divider"></div>

    <div class="row">
        <div class="col-12 mt-5">
            <div class="table-responsive" style="background-color: #f6f6f6; border-radius: 16px">
                <table class="table table-striped-rows table-hover align-middle">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TITLE</th>
                            <th>USER</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $item->title }}</th>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ Str::limit($item->description, 30) }}</td>
                                <td>                                @if($item->status == 'Approved')
                                    <span class="badge rounded-pill text-bg-success">Approved</span>
                                @elseif ($item->status == 'Rejected')
                                    <span class="badge rounded-pill text-bg-danger">Rejected</span>
                                @elseif ($item->status == 'Waiting')
                                    <span class="badge rounded-pill text-bg-info ">Need Review</span>
                                @elseif ($item->status == 'Need Revision')
                                    <span class="badge rounded-pill text-bg-warning">Revision</span>
                                @endif</td>
                                <td>
                                    <a href="{{ route('projectGallery.approval', $item->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @include('components.modal-member')
@endsection
