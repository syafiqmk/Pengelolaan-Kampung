@extends('template.dashboard')

@section('title')
    <h3>Tambah Pengumuman</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('kampung.pengumuman.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Title" autocomplete="off" value="{{ @old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="6">{{ @old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/tinymce.js"></script>
@endsection