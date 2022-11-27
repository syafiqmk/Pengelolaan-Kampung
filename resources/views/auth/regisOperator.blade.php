@extends('template.auth')

@section('body')
    <div class="row d-flex justify-content-center">
        <div class="col-md-5">
            <h4>Daftar Operator</h4>
            
            <form action="{{ route('auth.regisOperatorProcess') }}" method="post">
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
                    <label for="">Alamat</label>
                    <textarea name="address" id="" cols="30" rows="5" class="form-control @error('address') is-invalid @enderror">{{ @old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Type</label>
                    <select name="type" id="" class="form-select">
                        <option value="Pemadam Kebakaran">Pemadam Kebakaran</option>
                        <option value="Ambulans">Ambulans</option>
                        <option value="Polisi">Polisi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                        <a href="{{ route('auth.register') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection