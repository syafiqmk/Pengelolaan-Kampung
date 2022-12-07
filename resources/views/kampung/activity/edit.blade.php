@extends('template.dashboard')

@section('title')
    <h4>Edit : {{ $activity->title }}</h4>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('kampung.activity.update', $activity->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Judul</label>
                    <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Judul" autocomplete="off" value="{{ $errors->has('title') ? @old('title') : $activity->title }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Tanggal</label>
                    <input type="date" name="date" id="" class="form-control @error('date') is-invalid @enderror" value="{{ $errors->has('date') ? @old('date') : $activity->date }}" min="{{ date('Y-m-d') }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="latitude" id="latitude" value="{{ $activity->latitude }}">
                <input type="hidden" name="longitude" id="longitude" value="{{ $activity->longitude }}">
                <div class="mb-3">
                    <label for="">Lokasi</label>
                    <div id="leaflet-map"></div>
                    <a href="javascript:void(0)" class="btn btn-primary mt-1" id="lokasi-anda">Lokasi anda</a>
                </div>

                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" autocomplete="off">{{ $errors->has('description') ? @old('description') : $activity->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kampung.activity.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/map.js"></script>
    {{-- <script src="/js/map-still.js"></script> --}}
    <script src="/js/tinymce.js"></script>
@endsection