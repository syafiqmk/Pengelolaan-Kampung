@extends('template.auth')

@section('body')
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-4 mt-5">
            <h4>Login</h4>

            @include('components.alerts')

            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control" autocomplete="off" placeholder="Email">
                    {{-- @error('email')
                        {{ $message }}
                    @enderror --}}
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Password">
                    {{-- @error('password')
                        {{ $message }}
                    @enderror --}}
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end">Login</button><br>
                </div>
            </form>

            <p>Belum punya akun? <a href="">Register!</a></p>

        </div>
        
    </div>
@endsection