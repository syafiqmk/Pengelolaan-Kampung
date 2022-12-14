@extends('template.dashboard')

@section('title')
    <h3>Buat Laporan Darurat</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('masyarakat.darurat.createProcess') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Laporan</label>
                    <select name="type" id="" class="form-select">
                        <option value="Pemadam Kebakaran" {{ ($errors->has('type') && ($old('type') == 'Pemadam Kebakaran')) ? 'selected' : ''}}>Pemadam Kebakaran</option>
                        <option value="Ambulans" {{ ($errors->has('type') && ($old('type') == 'Ambulans')) ? 'selected' : ''}}>Ambulans</option>
                        <option value="Polisi" {{ ($errors->has('type') && ($old('type') == 'Polisi')) ? 'selected' : ''}}>Polisi</option>
                    </select>
                </div>
    
                <div class="mb-3">
                    <label for="">Jenis Laporan</label>
                    <select name="access" id="" class="form-select">
                        <option value="Private" {{ ($errors->has('access') && ($old('access') == 'Private')) ? 'selected' : ''}}>Private</option>
                        <option value="Public" {{ ($errors->has('access') && ($old('access') == 'Public')) ? 'selected' : ''}}>Public</option>
                    </select>
                </div>
    
                <div class="mb-3">
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <label for="">Lokasi</label>
                    <div id="leaflet-map"></div>
                    <a href="javascript:void(0)" class="btn btn-primary mt-1" id="lokasi-anda">Lokasi anda</a>
                </div>
    
                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10">{{ @old('description') }}</textarea>
                </div>
    
                <div class="mb-3 btn-group">
                    <button type="submit" class="btn btn-primary">Buat Laporan</button>
                    <a href="{{ route('masyarakat.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/map.js"></script>
    <script src="/js/tinymce.js"></script>
@endsection