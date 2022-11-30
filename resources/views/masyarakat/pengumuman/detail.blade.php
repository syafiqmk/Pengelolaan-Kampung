@extends('template.dashboard')

@section('title')
    <h4>{{ $announcement->title }}</h4>
@endsection

@section('content')
    <span>{{ date('l, d/m/Y', strtotime($announcement->created_at)) }}</span>
    <span class="float-end">{{ $announcement->created_at->diffForHumans() }}</span>
    <hr>

    {!! $announcement->description !!}
@endsection