@extends('template.dashboard')

@section('title')
    <h3>Detail : {{ $village->name }}</h3>
@endsection

@section('content')
    <div class="mb-3">
        <input type="hidden" name="latitude" id="latitude" value="{{ $village->latitude }}">
        <input type="hidden" name="longitude" id="longitude" value="{{ $village->longitude }}">
        <div id="leaflet-map"></div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $village->name }}</td>
                </tr>
                <tr>
                    <td>Email Admin</td>
                    <td>:</td>
                    <td>{{ $village->admin->email }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $village->address }}</td>
                </tr>
            </table>
        </div>
    </div>

    <script src="/js/map-still.js"></script>
@endsection