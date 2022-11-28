@extends('template.dashboard')

@section('title')
    <h3>Kategori Pengaduan</h3>
@endsection

@section('content')
    <span class="fs-5">Data Kategori Pengaduan</span>
    <button class="btn btn-primary float-end" id="tambah" data-bs-toggle="modal" data-bs-target="#modal">
        <i class="fa-solid fa-plus"></i>
        Tambah
    </button>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Kategori</th>
            <th>Action</th>
        </thead>
        <tbody id="table-body">
            {{-- @if ($categories->count() == 0)
                <tr>
                    <td colspan="2" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->category }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="javascript:void(0)" class="btn btn-primary">Update</a>
                                <a href="javascript:void(0)" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif --}}
        </tbody>
    </table>

    {{-- modal --}}
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalForm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title"></h1>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Kategori</label>
                        <input type="text" name="category" id="category-input" class="form-control" autocomplete="off" placeholder="Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-primary" id="btn-submit">Tambah</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script --}}
    <script src="/js/admin/category.js"></script>
@endsection