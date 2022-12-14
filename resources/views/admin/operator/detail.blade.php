@extends('template.dashboard')

@section('title')
    <h3>Detail Operator</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            @include('components.alerts')

            <input type="hidden" name="" id="latitude" value="{{ $operator->latitude }}">
            <input type="hidden" name="" id="longitude" value="{{ $operator->longitude }}">
            <div id="leaflet-map"></div>

            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $operator->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $operator->email }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $operator->address }}</td>
                </tr>
                <tr>
                    <td>Tipe</td>
                    <td>:</td>
                    <td>{{ $operator->type }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if ($operator->status == 'Waiting')
                            <div class="badge bg-warning fs-5">Waiting</div>
                        @else
                            <div class="badge bg-success fs-5">Granted</div>
                        @endif
                    </td>
                </tr>
            </table>

            @if ($operator->status == 'Waiting')
                <a href="{{ route('admin.operatorGrant', $operator->id) }}" class="btn btn-primary">Grant</a>
            @endif
        </div>
    </div>

    <script src="/js/map-still.js"></script>
@endsection