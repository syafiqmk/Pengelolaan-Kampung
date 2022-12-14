@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">Detail Laporan</span>
    <a href="{{ url()->previous() }}" class="btn btn-success float-end">Kembali</a>
@endsection

@section('content')
    <div class="mb-3">
        <label for="">Lokasi</label>
        <input type="hidden" name="" id="latitude" value="{{ $emergency->latitude }}">
        <input type="hidden" name="" id="longitude" value="{{ $emergency->longitude }}">
        <div id="leaflet-map"></div>
    </div>

    <div class="mb-3">
        <span class="fs-6 fw-semibold">Deskripsi</span>
        {!! $emergency->description !!}
    </div>

    <table class="table">
        <tr>
            <td>Tipe</td>
            <td>:</td>
            <td>{{ $emergency->type }}</td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>:</td>
            <td>{{ $emergency->access }}</td>
        </tr>
        <tr>
            <td>Kampung</td>
            <td>:</td>
            <td>{{ $emergency->village->name }}</td>
        </tr>
        <tr>
            <td>Pelapor</td>
            <td>:</td>
            <td>{{ $emergency->user->name }}</td>
        </tr>
        <tr>
            <td>Email Pelapor</td>
            <td>:</td>
            <td>{{ $emergency->user->email }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>
                @if ($emergency->status == 'Dilaporkan')
                    <span class="fs-6 badge bg-primary">Dilaporkan</span>
                    <a href="{{ route('operator.proses', $emergency->id) }}" class="btn btn-warning">Proses</a>
                @elseif($emergency->status == 'Diproses')
                    <span class="fs-6 badge bg-warning">Diproses</span>
                    <a href="{{ route('operator.selesai', $emergency->id) }}" class="btn btn-success">Selesai</a>
                @elseif($emergency->status == 'Selesai')
                    <span class="fs-6 badge bg-success">Selesai</span>
                @endif
            </td>
        </tr>
    </table>

    @if (($emergency->status == 'Diproses') || ($emergency->status == 'Selesai'))
        <span class="mb-3 fs-5 fw-semibold">Proses</span>
    @endif

    @if ($emergency->status == 'Diproses')
        <form action="{{ route('operator.response') }}" method="post">
            @csrf
            <input type="hidden" name="emergency_id" value="{{ $emergency->id }}">
            <div class="mb-3 input-group">
                <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi" autocomplete="off" value="{{ @old('description') }}">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    @endif
    
    @if (($emergency->status == 'Diproses') || ($emergency->status == 'Selesai'))
        @include('components.alerts')

        <table class="table">
            <thead>
                <th>Deskripsi</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                @foreach ($responses as $response)
                    <tr>
                        <td>{{ $response->description }}</td>
                        <td>{{ $response->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <script src="/js/map-still.js"></script>
@endsection