@extends('template.dashboard')

@section('title')
    <h3>Operator</h3>
@endsection

@section('content')
    <span class="fs-5">Data Operator (Waiting)</span>
    <div class="btn-group float-end">
        <a href="{{ route('admin.operator') }}" class="btn btn-outline-primary">All</a>
        <a href="{{ route('admin.operatorWaiting') }}" class="btn btn-warning">Waiting</a>
        <a href="{{ route('admin.operatorGranted') }}" class="btn btn-outline-success">Granted</a>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>Tipe</th>
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
                            <a href="{{ route('admin.operatorDetail', $operator->id) }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $operators->links() }}
@endsection