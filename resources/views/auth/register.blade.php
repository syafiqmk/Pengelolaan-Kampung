@extends('template.auth')

@section('body')
    <div class="row d-flex justify-content-center mb-3">
        <div class="col-md-5">
            <h3>User</h3>
            <p>Login sebagai user jika anda masyarakat kampung. Dapat kan berbagai pengumuman dan informasi dari kampung dan dapatkan layanan dari kampung.</p>
        </div>
        <div class="col-md-3 d-flex justify-content-center align-items-center">
            <a href="{{ route('auth.userSelectKampung') }}" class="btn btn-primary">Daftar</a>
        </div>
    </div>

    <div class="row d-flex justify-content-center mb-3">
        <div class="col-md-5">
            <h3>Kampung</h3>
            <p>Daftarkan kampung untuk mempermudah penyebaran informasi dan memberikan layanan tambahan seperti laporan darurat dan pengaduan masyarakat.</p>
        </div>
        <div class="col-md-3 d-flex justify-content-center align-items-center">
            <a href="{{ route('auth.regisKampung') }}" class="btn btn-primary">Daftar</a>
        </div>
    </div>

    <div class="row d-flex justify-content-center mb-3">
        <div class="col-md-5">
            <h3>Operator</h3>
            <p>Daftar sebagai operator untuk menanggapi laporan darurat yang diberikan masyarakat.</p>
        </div>
        <div class="col-md-3 d-flex justify-content-center align-items-center">
            <a href="{{ route('auth.regisOperator') }}" class="btn btn-primary">Daftar</a>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('auth.login') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
@endsection