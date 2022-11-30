@extends('template.dashboard')

@section('title')
    <h3>Detail Kampung</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            @include('components.alerts')

            <input type="hidden" id="latitude" value="{{ $village->latitude }}">
            <input type="hidden" id="longitude" value="{{ $village->longitude }}">
            <div id="leaflet-map"></div>
            <table class="table">
                <tr>
                    <td>Nama Kampung</td>
                    <td>:</td>
                    <td>{{ $village->name }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $village->address }}</td>
                </tr>
                <tr>
                    <td>Admin</td>
                    <td>:</td>
                    <td>{{ $village->admin->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $village->admin->email }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if ($village->status == 'Waiting')
                            <span class="badge bg-warning fs-5">Waiting</span>
                        @else
                            <span class="badge bg-success fs-5">Granted</span>
                        @endif
                    </td>
                </tr>
            </table>
            @if ($village->status == 'Waiting')
                <a href="{{ route('admin.grantKampung', $village->id) }}" class="btn btn-primary">Grant</a>
            @endif
        </div>
    </div>

    <script src="/js/map-still.js"></script>
@endsection