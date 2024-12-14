@extends('backend.app')

@section('title', 'Edit about')

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 150px;
    }
</style>
@endpush

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit About</h4>

                    <form action="{{ route('about.update', $abouts->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Description (English) -->
                        <div class="form-group mb-3">
                            <label>Content (English)</label>
                            <textarea class="form-control @error('content_EESS') is-invalid @enderror"
                                name="content_EESS" rows="5">{{ old('content_EESS', $abouts->content_EESS) }}</textarea>
                            @error('content_EESS')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description (Other Language) -->
                        <div class="form-group mb-3">
                            <label>Content (Other Language)</label>
                            <textarea class="form-control @error('content_IINN') is-invalid @enderror"
                                name="content_IINN" rows="5">{{ old('content_IINN', $abouts->content_IINN) }}</textarea>
                            @error('content_IINN')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Images -->
                        <label for="image">Image</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $abouts->image) }}" alt="Current Image" class="img-thumbnail" style="width: 100px; height: auto;">
                        </div>
                        <input type="file" name="image" id="image" class="form-control">
                </div>

                <!-- Submit and Cancel Buttons -->
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a href="{{ route('about.index') }}" class="btn btn-secondary mt-3">Cancel</a>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

<script>
    $('.dropify').dropify();

    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

@endpush