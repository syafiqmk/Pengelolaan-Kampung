@extends('template.dashboard')

@section('title')
    <h3>Detail Laporan Darurat</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <input type="hidden" name="" id="latitude" value="{{ $emergency->latitude }}">
                <input type="hidden" name="" id="longitude" value="{{ $emergency->longitude }}">
                <div id="leaflet-map"></div>
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
                    <td>Tanggal Dilaporkan</td>
                    <td>:</td>
                    <td>{{ date('l, d M Y', strtotime($emergency->created_at)) }} | {{ $emergency->created_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if ($emergency->status == 'Dilaporkan')
                            <span class="fs-6 badge bg-primary">Dilaporkan</span>
                        @elseif($emergency->status == 'Diproses')
                            <span class="fs-6 badge bg-warning">Diproses</span>
                        @elseif($emergency->status == 'Selesai')
                            <span class="fs-6 badge bg-success">Selesai</span>
                        @endif
                    </td>
                </tr>

                @if (($emergency->status == 'Diproses') || ($emergency->status == 'Selesai'))
                    <tr>
                        <td>Operator</td>
                        <td>:</td>
                        <td>{{ $emergency->operator->name }}</td>
                    </tr>
                @endif
            </table>

            @if (($emergency->status == 'Diproses') || ($emergency->status == 'Selesai'))
                <h5>Proses</h5>
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
        </div>
    </div>

    <script src="/js/map-still.js"></script>
@endsection