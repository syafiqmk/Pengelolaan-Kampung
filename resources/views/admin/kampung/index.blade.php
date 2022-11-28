@extends('template.dashboard')

@section('title')
    <h3>Kampung</h3>
@endsection

@section('content')
    <span class="fs-5">Data Kampung</span>
    <div class="btn-group float-end">
        <a href="{{ route('admin.kampung') }}" class="btn btn-primary">All</a>
        <a href="{{ route('admin.kampungWaiting') }}" class="btn btn-outline-warning">Waiting</a>
        <a href="{{ route('admin.kampungGranted') }}" class="btn btn-outline-success">Granted</a>
    </div>
    @include('components.alerts')

    <table class="table">
        <thead>
            <th>#</th>
            <th>Kampung</th>
            <th>Alamat</th>
            <th>Status</th>
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
                            @if ($village->status == "Waiting")
                                <p class="badge bg-warning fs-6">{{ $village->status }}</p>
                            @else
                                <p class="badge bg-success fs-6">{{ $village->status }}</p>
                            @endif
                        </td>
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