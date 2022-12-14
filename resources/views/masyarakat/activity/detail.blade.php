@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">{{ $activity->title }}</span>
    <a href="{{ url()->previous() }}" class="btn btn-primary float-end">Kembali</a>
@endsection

@section('content')
    <div class="my-3">
        <span>Tanggal Kegiatan : {{ date('l, d M Y', strtotime($activity->date)) }}</span>
    </div>

    <input type="hidden" name="" id="latitude" value="{{ $activity->latitude }}">
    <input type="hidden" name="" id="longitude" value="{{ $activity->longitude }}">

    <div id="leaflet-map"></div>

    <div class="mt-3">
        {!! $activity->description !!}
    </div>

    <script src="/js/map-still.js"></script>
@endsection