@extends('template.dashboard')

@section('title')
    <h3>Informasi</h3>
@endsection

@section('content')
    <div class="mb-3">
        <span class="fs-5">Data Informasi</span>
        <a href="{{ route('kampung.information.create') }}" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
    </div>
    @include('components.alerts')

    <table class="table">
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>Created at</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($informations as $information)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $information->title }}</td>
                        <td>{{ date('l, d/m/Y', strtotime($information->created_at)) }}</td>
                        <td><a href="{{ route('kampung.information.show', $information->id) }}" class="btn btn-primary"><i class="fa-solid fa-book"></i> Detail</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $informations->links() }}
@endsection