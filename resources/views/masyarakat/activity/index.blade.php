@extends('template.dashboard')

@section('title')
    <h4>Kegiatan</h4>
@endsection

@section('content')
    <span class="mb-3 fs-5">Daftar Kegiatan</span>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Kegiatan</th>
            <th>Tanggal</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="4"class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $activity->title }}</td>
                        <td>{{ date('l, d/m/Y', strtotime($activity->date)) }}</td>
                        <td>
                            <a href="{{ route('masyarakat.activity.detail', $activity->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $activities->links() }}
@endsection