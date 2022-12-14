@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Detail : {{ $operator->name }}</span>
    <a href="{{ url()->previous() }}" class="btn btn-success float-end">Kembali</a>
@endsection

@section('content')

    @include('components.alerts')

    <div class="row d-flex justify-content-center">
        <div class="mb-3">
            <input type="hidden" name="latitude" id="latitude" value="{{ $operator->latitude }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ $operator->longitude }}">
            <div id="leaflet-map"></div>
        </div>

        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $operator->name }}</td>
                </tr>
                <tr>
                    <td>Tipe</td>
                    <td>:</td>
                    <td>{{ $operator->type }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $operator->address }}</td>
                </tr>
            </table>
        </div>
    </div>

    <script src="/js/map-still.js"></script>
@endsection