@extends('template.dashboard')

@section('title')
    <span class="fs-3 fw-semibold">Publikasi</span>
    <div class="btn-group float-end">
        <a href="{{ route('masyarakat.darurat.history') }}" class="btn btn-outline-primary">Riwayat</a>
        <a href="{{ route('masyarakat.publikasi.index') }}" class="btn btn-success">Publikasi</a>
    </div>
@endsection

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Operator</th>
            <th>Keterangan</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($publikasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->operator->name }}</td>
                        <td>{{ date('l, d M Y', strtotime($item->created_at)) }} | {{ $item->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('masyarakat.publikasi.detail', $item->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection