@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Operator Kampung</span>
    <a href="{{ route('kampung.operator.tambah') }}" class="btn btn-primary float-end">
        <i class="fa-solid fa-plus"></i>
        Tambah
    </a>
@endsection

@section('content')

    @include('components.alerts')

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
                    <td colspan="4"class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($operators as $operator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $operator->name }}</td>
                        <td>{{ $operator->type }}</td>
                        <td>
                            <a href="{{ route('kampung.operator.detail', $operator->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection

