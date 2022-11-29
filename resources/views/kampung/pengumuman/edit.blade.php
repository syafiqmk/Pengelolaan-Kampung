@extends('template.dashboard')

@section('title')
    <h3>Edit Pengumuman</h3>
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">

            @include('components.alerts')

            <form action="{{ route('kampung.pengumuman.update', $announcement->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Title" autocomplete="off" value="@if($errors->has('title')) {{ @old('title') }} @else {{ $announcement->title }} @endif">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="6">
                        @if ($errors->has('description'))
                            {{ @old('description') }}
                        @else
                            {{ $announcement->description }}
                        @endif
                    </textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'autolink charmap codesample emoticons link lists searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection