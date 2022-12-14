@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Laporan Public</span>
    <div class="btn-group float-end">
        <a href="{{ route('operator.public') }}" class="btn btn-outline-primary">Laporan</a>
        <a href="{{ route('operator.publikasi') }}" class="btn btn-success">Publikasi</a>
    </div>
@endsection

@section('content')
    <div class="mb-3">
        <span class="fs-5 fw-semibold">Data Publikasi</span>
        <a href="{{ route('operator.publikasiCreate') }}" class="btn btn-primary float-end">Buat Publikasi</a>
    </div>

    @include('components.alerts')

    <table class="table">
        <thead>
            <th>#</th>
            <th>Kampung</th>
            <th>Keterangan</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($publicities as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->village->name }}</td>
                        <td>{{ date('l, d M Y', strtotime($item->created_at)) }} | {{ $item->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('operator.publikasiDetail', $item->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $publicities->links() }}
@endsection