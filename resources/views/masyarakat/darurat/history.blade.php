@extends('template.dashboard')

@section('title')
    <span class="fs-3 fw-semibold">Laporan Darurat</span>
    <div class="btn-group float-end">
        <a href="{{ route('masyarakat.darurat.history') }}" class="btn btn-primary">Riwayat</a>
        <a href="" class="btn btn-outline-success">Publikasi</a>
    </div>
@endsection

@section('content')
    <div class="mb-3">
        <span class="fs-5">History Laporan Darurat</span>
        <div class="btn-group float-end">
            <a href="{{ route('masyarakat.darurat.history') }}" class="btn btn-primary">Dilaporkan</a>
            <a href="" class="btn btn-outline-warning">Diproses</a>
            <a href="" class="btn btn-outline-success">Selesai</a>
        </div>
    </div>

    @include('components.alerts')

    <table class="table">
        <thead>
            <th>#</th>
            <th>Tipe</th>
            <th>Jenis</th>
            <th>Tanggal Dilaporkan</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="5" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($emergencies as $emergency)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $emergency->type }}</td>
                        <td>{{ $emergency->access }}</td>
                        <td>{{ date('l, d M Y', strtotime($emergency->created_at)) }} | {{ $emergency->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $emergencies->links() }}
@endsection