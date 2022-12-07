@extends('template.dashboard')

@section('title')
    <h4>{{ $complaint->category->category }}</h4>
@endsection

@section('content')
    <span>{{ date('l, d M Y', strtotime($complaint->created_at)) }}</span>
    <span class="float-end">{{ $complaint->created_at->diffForHumans() }}</span>
    <hr>

    <input type="hidden" name="" id="latitude" value="{{ $complaint->latitude }}">
    <input type="hidden" name="" id="longitude" value="{{ $complaint->longitude }}">
    <div id="leaflet-map"></div>

    {!! $complaint->description !!}

    <script src="/js/map-still.js"></script>
@endsection