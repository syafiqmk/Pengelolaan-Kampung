@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Detail Laporan</span>
    <a href="{{ url()->previous() }}" class="btn btn-success float-end">Kembali</a>
@endsection

@section('content')
    <div class="mb-3">
        <input type="hidden" name="" id="latitude" value="{{ $emergency->latitude }}">
        <input type="hidden" name="" id="longitude" value="{{ $emergency->longitude }}">
        <div id="leaflet-map"></div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>Tipe</td>
                    <td>:</td>
                    <td>{{ $emergency->type }}</td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>:</td>
                    <td>{{ $emergency->access }}</td>
                </tr>
                <tr>
                    <td>Kampung</td>
                    <td>:</td>
                    <td>{{ $emergency->village->name }}</td>
                </tr>
                <tr>
                    <td>Pelapor</td>
                    <td>:</td>
                    <td>{{ $emergency->user->name }}</td>
                </tr>
                <tr>
                    <td>Email Pelapor</td>
                    <td>:</td>
                    <td>{{ $emergency->user->email }}</td>
                </tr>
                <tr>
                    <td>Tanggal Dilaporkan</td>
                    <td>:</td>
                    <td>{{ date('l, d M Y', strtotime($emergency->created_at)) }} | {{ $emergency->created_at->diffForHumans()}}</td>
                </tr>
            </table>
        </div>
    </div>

    <script src="/js/map-still.js"></script>
@endsection