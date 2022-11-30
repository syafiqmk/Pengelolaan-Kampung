@extends('template.dashboard')

@section('title')
    <h3>Informasi</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        @if ($count == 0)
            <p class="text-center">No entries found.</p>
        @else
            @foreach ($informations as $information)
                <div class="col-md-10 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"><span class="fs-5 fw-semibold">{{ $information->title }}</span> <span class="float-end">{{ $information->created_at->diffForHumans() }}</span></div>
                            <p class="card-text">{!! Str::limit($information->description, 150, ' ...') !!}</p>
                            <a href="{{ route('masyarakat.informationDetail', $information->id) }}" class="btn btn-success float-end"><i class="fa-solid fa-book"></i> Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    {{ $informations->links() }}
@endsection