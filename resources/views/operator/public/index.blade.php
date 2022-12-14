@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Laporan Public</span>
    <div class="btn-group float-end">
        <a href="{{ route('operator.public') }}" class="btn btn-primary">Laporan</a>
        <a href="{{ route('operator.publikasi') }}" class="btn btn-outline-success">Publikasi</a>
    </div>
@endsection

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Kampung</th>
            <th>Masyarakat</th>
            <th>Keterangan</th>
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
                        <td>{{ $emergency->village->name }}</td>
                        <td>{{ $emergency->user->name }}</td>
                        <td>{{ date('l, d M Y', strtotime($emergency->created_at)) }} | {{ $emergency->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{ route('operator.publicDetail', $emergency->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $emergencies->links() }}
@endsection