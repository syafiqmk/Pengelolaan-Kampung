@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Laporan Private</span>
    <div class="btn-group float-end">
        <a href="{{ route('operator.private') }}" class="btn btn-outline-primary">Dilaporkan</a>
        <a href="{{ route('operator.privateProses') }}" class="btn btn-outline-warning">Diproses</a>
        <a href="{{ route('operator.privateSelesai') }}" class="btn btn-success">Selesai</a>
    </div>
@endsection

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Kampung</th>
            <th>Masyarakat</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($emergencies as $emergency)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $emergency->village->name }}</td>
                        <td>{{ $emergency->user->name }}</td>
                        <td>
                            <a href="{{ route('operator.privateDetail', $emergency->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $emergencies->links() }}
@endsection