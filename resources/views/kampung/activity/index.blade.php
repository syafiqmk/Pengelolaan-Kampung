@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Kegiatan</span>
    @endsection
    
@section('content')
    <div class="mb-3">
        <span class="fs-5">Data Pengumuman</span>
        <a href="{{ route('kampung.activity.create') }}" class="float-end btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
    </div>

    @include('components.alerts')
    
    <table class="table">
        <thead>
            <th>#</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $activity->title }}</td>
                        <td>{{ date('l, d m Y', strtotime($activity->date)) }}</td>
                        <td>
                            <a href="{{ route('kampung.activity.show', $activity->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $activities->links() }}
@endsection