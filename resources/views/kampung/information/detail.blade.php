@extends('template.dashboard')

@section('title')
    <span class="fs-4">{{ $information->title }}</span>
    <div class="float-end">
        <form action="{{ route('kampung.information.destroy', $information->id) }}" id="hapus" method="post">
            @csrf
            @method('DELETE')
            <div class="btn-group">
                <a href="{{ route('kampung.information.edit', $information->id) }}" class="btn btn-success">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">{{ date('l, d-m-Y', strtotime($information->created_at)) }}</div>
        <div class="col-md-6 text-end">{{ $information->created_at->diffForHumans() }}</div>
    </div>

    <hr>
    
    @include('components.alerts')

    {!! $information->description !!}

    <script>
        $('#hapus').submit(function(e) {
            let form = this;
            e.preventDefault();

            Swal.fire({
                icon: 'warning',
                text: 'Hapus informasi?',
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