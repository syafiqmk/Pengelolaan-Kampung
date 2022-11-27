@extends('template.dashboard')

@section('title')
    <h3>Admin Dashboard</h3>
@endsection

@section('content')
    <h5>Welcome, {{ auth()->user()->name }}!</h5>
@endsection