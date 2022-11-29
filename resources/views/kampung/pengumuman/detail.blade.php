@extends('template.dashboard')

@section('title')
    <span class="fs-4">{{ $announcement->title }}</span>
    <div class="float-end">
        <form action="{{ route('kampung.pengumuman.destroy', $announcement->id) }}" id="hapus" method="post">
            @csrf
            @method('DELETE')
            <div class="btn-group">
                <a href="{{ route('kampung.pengumuman.edit', $announcement->id) }}" class="btn btn-success">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">{{ date('l, d-m-Y', strtotime($announcement->created_at)) }}</div>
        <div class="col-md-6 text-end">{{ $announcement->created_at->diffForHumans() }}</div>
    </div>

    <hr>
    
    @include('components.alerts')

    {!! $announcement->description !!}

    <script>
        $('#hapus').submit(function(e) {
            let form = this;
            e.preventDefault();

            Swal.fire({
                icon: 'warning',
                text: 'Hapus pengumuman?',
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