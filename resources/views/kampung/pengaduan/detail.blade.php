@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">{{ $complaint->category->category }}</span>
    <a href="{{ url()->previous() }}" class="btn btn-primary float-end">Kembali</a>
@endsection

@section('content')
    <div class="my-3">
        <span>{{ $complaint->user->name }}</span>
        <span class="float-end">{{ date('l, d M Y', strtotime($complaint->created_at)) }} | {{ $complaint->created_at->diffForHumans() }}</span>
    </div>

    <hr>

    <input type="hidden" name="" id="latitude" value="{{ $complaint->latitude }}">
    <input type="hidden" name="" id="longitude" value="{{ $complaint->longitude }}">
    
    <div id="leaflet-map"></div>

    <div class="mt-3">
        {!! $complaint->description !!}
    </div>

    <script src="/js/map-still.js"></script>
@endsection