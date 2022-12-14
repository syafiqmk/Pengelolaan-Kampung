@extends('template.dashboard')

@section('title')
    <h3>Tambah Operator</h3>
@endsection

@section('content')
    <form action="{{ route('kampung.operator.tambah') }}" method="get">
        <div class="mb-3 input-group">
            <input type="text" name="search" id="" class="form-control" placeholder="Search..." autocomplete="off">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

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
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($operators as $operator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $operator->name }}</td>
                        <td>{{ $operator->type }}</td>
                        <td>
                            <a href="{{ route('kampung.operator.tambahDetail', $operator->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $operators->links() }}
@endsection