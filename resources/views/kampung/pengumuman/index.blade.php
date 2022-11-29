@extends('template.dashboard')

@section('title')
    <h3>Pengumuman</h3>
@endsection

@section('content')
    <div class="mb-3">
        <span class="fs-5">Data Pengumuman</span>
        <a href="{{ route('kampung.pengumuman.create') }}" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
    </div>
    @include('components.alerts')

    <table class="table">
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>Created at</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($announcements as $announcement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ date('l, d/m/Y', strtotime($announcement->created_at)) }}</td>
                        <td><a href="{{ route('kampung.pengumuman.show', $announcement->id) }}" class="btn btn-primary"><i class="fa-solid fa-book"></i> Detail</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection