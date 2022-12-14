@extends('template.dashboard')

@section('title')
    <h3>Kampung yang Dilayani</h3>
@endsection

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Kampung</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($count == 0)
                <tr>
                    <td colspan="3" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($villages as $village)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $village->name }}</td>
                        <td>
                            <a href="{{ route('operator.kampungDetail', $village->id) }}" class="btn btn-success"><i class="fa-solid fa-book"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $villages->links() }}
@endsection