@extends('template.auth')

@section('body')
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-4 mt-5">
            <h4>Login</h4>

            @include('template.components.alerts')

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
                    <label for="">Role</label>
                    <select name="role" id="" class="form-select">
                        <option value="user">User</option>
                        <option value="admin kampung">Admin Kampung</option>
                        <option value="operator">Operator</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <p class="text-center">Belum punya akun? <a href="">Register!</a></p>

        </div>
        
    </div>
@endsection