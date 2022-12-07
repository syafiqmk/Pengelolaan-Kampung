@extends('template.dashboard')

@section('title')
    <h4>Tambah Kegiatan</h4>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('kampung.activity.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="">Judul</label>
                    <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Judul" autocomplete="off" value="{{ @old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Tanggal</label>
                    <input type="date" name="date" id="" class="form-control @error('date') is-invalid @enderror" value="{{ @old('date') }}" min="{{ date('Y-m-d') }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
                <div class="mb-3">
                    <label for="">Lokasi</label>
                    <div id="leaflet-map"></div>
                    <a href="javascript:void(0)" class="btn btn-primary mt-1" id="lokasi-anda">Lokasi anda</a>
                </div>

                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" autocomplete="off">{{ @old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{ route('kampung.activity.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/map.js"></script>
    <script src="/js/tinymce.js"></script>
@endsection