@extends('template.auth')

@section('body')
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <h4>Login</h4>

            @include('components.alerts')

            <form action="{{ route("auth.loginProcess") }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control @error('email') is-invalid @enderror" autocomplete="off" placeholder="Email" value="{{ @old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }} 
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end">Login</button><br>
                </div>
            </form>

            <p>Belum punya akun? <a href="{{ route('auth.register') }}">Register!</a></p>

        </div>
        
    </div>
@endsection