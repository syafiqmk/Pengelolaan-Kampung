@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Detail Publikasi</span>
    <a href="{{ url()->previous() }}" class="btn btn-success float-end">Kembali</a>
@endsection

@section('content')
    <div class="mb-3">
        <span>{{ $publikasi->village->name }}</span>
        <span class="float-end">{{ date('l, d M Y', strtotime($publikasi->created_at)) }}</span>
        <hr>
    </div>

    <input type="hidden" name="" id="latitude" value="{{ $publikasi->latitude }}">
    <input type="hidden" name="" id="longitude" value="{{ $publikasi->longitude }}">
    <div id="leaflet-map"></div>

    <div class="my-3">
        {!! $publikasi->description !!}
    </div>

    <script src="/js/map-still.js"></script>
@endsection