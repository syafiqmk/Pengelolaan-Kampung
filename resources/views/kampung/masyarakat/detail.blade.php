@extends('template.dashboard')

@section('title')
    <h3>Detail Masyarakat</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            @include('components.alerts')
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if ($user->status == 'Waiting')
                            <div class="badge bg-warning fs-5">Waiting</div>
                        @else
                            <div class="badge bg-success fs-5">Granted</div>
                        @endif
                    </td>
                </tr>
            </table>
            @if ($user->status == 'Waiting')
                <a href="{{ route('kampung.masyarakat.grant', $user->id) }}" class="btn btn-primary">Grant</a>
            @endif
        </div>
    </div>
@endsection