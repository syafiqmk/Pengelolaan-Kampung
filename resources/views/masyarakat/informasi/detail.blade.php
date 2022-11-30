@extends('template.dashboard')

@section('title')
    <h4>{{ $information->title }}</h4>
@endsection

@section('content')
    <span>{{ date('l, d/m/Y', strtotime($information->created_at)) }}</span>
    <span class="float-end">{{ $information->created_at->diffForHumans() }}</span>
    <hr>

    {!! $information->description !!}
@endsection