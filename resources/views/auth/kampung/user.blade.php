@extends('template.auth')

@section('body')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <h4>Daftar Kampung</h4>

            <form action="{{ route('auth.regisKampungProcess') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" autocomplete="off" value="{{ @old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" placeholder="Email@mail.com" autocomplete="off" value="{{ @old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" autocomplete="off">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Nama Kampung</label>
                    <input type="text" name="namaKampung" id="" class="form-control @error('namaKampung') is-invalid @enderror" placeholder="Nama Kampung" autocomplete="off" value="{{ @old('namaKampung') }}">
                    @error('namaKampung')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

                <div class="mb-3">
                    <label for="">Lokasi</label>
                    <div id="leaflet-map"></div>
                    <a href="javascript:void(0)" class="btn btn-primary mt-1" id="lokasi-anda">Lokasi Anda</a>
                </div>

                <div class="mb-3">
                    <label for="">Alamat</label>
                    <textarea name="address" id="" cols="30" rows="5" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat">{{ @old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 btn-group">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <a href="{{ route('auth.register') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/map.js"></script>
@endsection