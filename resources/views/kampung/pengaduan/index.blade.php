@extends('template.dashboard')

@section('title')
    <h4>Pengaduan</h4>
@endsection

@section('content')
    <span class="fs-5 mb-3">Data Pengaduan per Kategori</span>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->category }}</td>
                    <td>{{ $complaints->where('village_id', '=', auth()->user()->village_admin->id)->where('category_id', '=', $category->id)->count() }}</td>
                    <td><a href="{{ route('kampung.pengaduan.category', $category->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection