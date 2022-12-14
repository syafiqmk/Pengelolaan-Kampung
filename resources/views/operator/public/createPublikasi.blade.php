@extends('template.dashboard')

@section('title')
    <h4>Buat Publikasi</h4>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <form action="{{ route('operator.publikasiStore') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="">Kampung</label>
                    <select name="village_id" id="" class="form-select">
                        @foreach ($villages as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <label for="">Lokasi</label>
                    <div id="leaflet-map"></div>
                    <a href="javascript:void(0)" class="btn btn-primary mt-1" id="lokasi-anda">Lokasi Anda</a>
                </div>

                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ @old('description') }}</textarea>
                </div>

                <div class="mb-3 btn-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/map.js"></script>
    <script src="/js/tinymce.js"></script>
@endsection