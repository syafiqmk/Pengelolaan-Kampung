<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    {{-- links --}}
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/c8ae339e7b.js" crossorigin="anonymous"></script>
    {{-- sweetalert2 --}}
    <script src="https://kit.fontawesome.com/c8ae339e7b.js" crossorigin="anonymous"></script>

    {{-- custom style --}}
    <style>
        #main-section {
            background-color: #1363DF;
        }
    </style>
</head>
<body>

    <div class="container-fluid d-flex min-vh-100 align-items-center justify-content-center my-auto" id="main-section">
        <div class="row text-center">
            <h1 class="text-capitalize text-white">pengelolaan kampung</h1>
            <h6 class="text-white text-capitalize">satu aplikasi untuk interaksi warga kampung</h6>
            <div class="col">
                @if (!auth()->check())
                    <a href="{{ route("auth.login") }}" class="btn bg-dark text-white">Get Started</a>
                @else
                    @if (auth()->user()->role == "Admin")
                        <a href="{{ route("admin.index") }}" class="btn bg-dark text-white">Dashboard</a>
                    @endif
                @endif
            </div>
        </div>
    </div>

    {{-- links --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>