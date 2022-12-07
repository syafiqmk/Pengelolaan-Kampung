@extends('template.dashboard')

@section('title')
    <h4>{{ $category->category }}</h4>
@endsection

@section('content')
    <span class="fs-5 mb-3">Data Pengaduan</span>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($complaints as $complaint)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $complaint->user->name }}</td>
                        <td>{{ date('l, d M Y', strtotime($complaint->created_at)) }}</td>
                        <td>
                            <a href="{{ route('kampung.pengaduan.detail', $complaint->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $complaints->links() }}
@endsection