@extends('template.dashboard')

@section('title')
    <h3>Buat Aduan</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('masyarakat.pengaduan.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Kategori</label>
                    <select name="category" id="" class="form-select @error('category') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ (@old('category') == $category->id) ? 'selected' : '' }}>{{ $category->category }}</option>
                        @endforeach
                    </select>
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
                    <textarea name="description" id="" cols="30" rows="10">{{ @old('address') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="{{ route('masyarakat.pengaduan.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/map.js"></script>
    <script src="/js/tinymce.js"></script>
@endsection