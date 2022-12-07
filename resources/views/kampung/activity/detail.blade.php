@extends('template.dashboard')

@section('title')
    <span class="fs-4 fw-semibold">{{ $activity->title }}</span>
    <div class="float-end">
        <form action="{{ route('kampung.activity.destroy', $activity->id) }}" method="post" id="hapus">
            @csrf
            @method('DELETE')
            <div class="btn-group">
            <a href="{{ route('kampung.activity.edit', $activity->id) }}" class="btn btn-primary">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="my-3">
        <span>{{ date('l, d M Y', strtotime($activity->date)) }}</span>
        <span class="float-end">Created {{ $activity->created_at->diffForHumans() }}</span>
    </div>

    <hr>

    @include('components.alerts')

    <input type="hidden" name="" id="latitude" value="{{ $activity->latitude }}">
    <input type="hidden" name="" id="longitude" value="{{ $activity->longitude }}">

    <div id="leaflet-map"></div>

    <div class="my-3">
        {!! $activity->description !!}
    </div>

    <script src="/js/map-still.js"></script>
    <script>
        $('#hapus').submit(function(e) {
            let form = this;
            e.preventDefault();

            Swal.fire({
                icon: 'warning',
                text: 'Hapus kegiatan?',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if(result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endsection