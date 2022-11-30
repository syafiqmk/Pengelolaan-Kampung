@extends('template.dashboard')

@section('title')
    <h3>Masyarakat</h3>
@endsection

@section('content')
    <div class="mb-3">
        <span class="fs-4">Data Masyarakat</span>
        <div class="btn-group float-end">
            <a href="{{ route('kampung.masyarakat.index') }}" class="btn btn-primary">All</a>
            <a href="{{ route('kampung.masyarakat.waiting') }}" class="btn btn-outline-warning">Waiting</a>
            <a href="{{ route('kampung.masyarakat.granted') }}" class="btn btn-outline-success">Granted</a>
        </div>
    </div>

    @include('components.alerts')

    <table class="table">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if ($user->status == 'Waiting')
                                <div class="badge bg-warning fs-6">Waiting</div>
                            @else
                                <div class="badge bg-success fs-6">Granted</div>
                            @endif
                        </td>
                        <td><a href="{{ route('kampung.masyarakat.detail', $user->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $users->links() }}
@endsection