@extends('template.dashboard')

@section('title')
    <h3>Operator</h3>
@endsection

@section('content')
    <span class="fs-5">Data Operator</span>
    <div class="btn-group float-end">
        <a href="{{ route('admin.operator') }}" class="btn btn-primary">All</a>
        <a href="{{ route('admin.operatorWaiting') }}" class="btn btn-outline-warning">Waiting</a>
        <a href="{{ route('admin.operatorGranted') }}" class="btn btn-outline-success">Granted</a>
    </div>
    @include('components.alerts')

    <table class="table">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="5" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($operators as $operator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $operator->name }}</td>
                        <td>{{ $operator->type }}</td>
                        <td>
                            @if ($operator->status == 'Waiting')
                                <div class="badge bg-warning fs-6">Waiting</div>
                            @else
                                <div class="badge bg-success fs-6">Granted</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.operatorDetail', $operator->id) }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $operators->links() }}
@endsection