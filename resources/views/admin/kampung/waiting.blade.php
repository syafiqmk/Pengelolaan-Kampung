@extends('template.dashboard')

@section('title')
    <h3>Kampung</h3>
@endsection

@section('content')
    <span class="fs-5">Data Kampung (Waiting)</span>
    <div class="btn-group float-end">
        <a href="{{ route('admin.kampung') }}" class="btn btn-outline-primary">All</a>
        <a href="{{ route('admin.kampungWaiting') }}" class="btn btn-warning">Waiting</a>
        <a href="{{ route('admin.kampungGranted') }}" class="btn btn-outline-success">Granted</a>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Kampung</th>
            <th>Alamat</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($villages as $village)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $village->name }}</td>
                        <td>{{ $village->address }}</td>
                        <td>
                            <a href="{{ route('admin.detailKampung', $village->id) }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $villages->links() }}
@endsection