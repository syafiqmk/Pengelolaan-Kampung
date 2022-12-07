@extends('template.auth')

@section('body')
    <h2 class="text-center">Pilih Kampung</h2>

    <div class="my-3">
        <form action="{{ route('auth.userSelectKampung') }}" method="get">
            <div class="input-group">
                <input type="text" name="search" id="" class="form-control" placeholder="Search..." autocomplete="off">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Nama Kampung</th>
            <th>Alamat</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($villages->count() == 0)
                <tr>
                    <td colspan="4" class="text-center">No entries found.</td>
                </tr>
            @else
                @foreach ($villages as $village)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $village->name }}</td>
                        <td>{{ $village->address }}</td>
                        <td>
                            <a href="{{ route('auth.regisUser', $village->id) }}" class="btn btn-primary">Daftar</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $villages->links() }}

    <a href="{{ route('auth.register') }}" class="btn btn-danger">Cancel</a>
@endsection