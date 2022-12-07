@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Pengaduan Masyarakat</span>
    <a href="{{ route('masyarakat.pengaduan.create') }}" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Buat Aduan</a>
@endsection

@section('content')
    <h5>Riwayat Pengaduan</h5>
    @include('components.alerts')

    <table class="table">
        <thead>
            <th>#</th>
            <th>Kategori</th>
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
                        <td>{{ $complaint->category->category }}</td>
                        <td>{{ date('l, d/m/Y', strtotime($complaint->created_at)) }} | {{ $complaint->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('masyarakat.pengaduan.detail', $complaint->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection