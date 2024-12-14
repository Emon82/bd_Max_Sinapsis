@extends('backend.app')

@section('title', 'Edit Creativity')

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
                    <h4 class="card-title">Edit Creativity</h4>

                    <form action="{{ route('creativity.update', $creative->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title (English) -->
                        <div class="form-group mb-3">
                            <label>Title (English)</label>
                            <input type="text" class="form-control @error('title_EESS') is-invalid @enderror"
                                name="title_EESS" value="{{ old('title_EESS', $creative->title_EESS) }}" required>
                            @error('title_EESS')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title (Other Language) -->
                        <div class="form-group mb-3">
                            <label>Title (Other Language)</label>
                            <input type="text" class="form-control @error('title_IINN') is-invalid @enderror"
                                name="title_IINN" value="{{ old('title_IINN', $creative->title_IINN) }}" required>
                            @error('title_IINN')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sub-title (English) -->
                        <div class="form-group mb-3">
                            <label>Sub-title (English)</label>
                            <input type="text" class="form-control @error('sub_title_EESS') is-invalid @enderror"
                                name="sub_title_EESS" value="{{ old('sub_title_EESS', $creative->sub_title_EESS) }}" required>
                            @error('sub_title_EESS')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sub-title (Other Language) -->
                        <div class="form-group mb-3">
                            <label>Sub-title (Other Language)</label>
                            <input type="text" class="form-control @error('sub_title_IINN') is-invalid @enderror"
                                name="sub_title_IINN" value="{{ old('sub_title_IINN', $creative->sub_title_IINN) }}" required>
                            @error('sub_title_IINN')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description (English) -->
                        <div class="form-group mb-3">
                            <label>Content (English)</label>
                            <textarea class="form-control @error('content_EESS') is-invalid @enderror"
                                name="content_EESS" rows="5">{{ old('content_EESS', $creative->content_EESS) }}</textarea>
                            @error('content_EESS')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description (Other Language) -->
                        <div class="form-group mb-3">
                            <label>Content (Other Language)</label>
                            <textarea class="form-control @error('content_IINN') is-invalid @enderror"
                                name="content_IINN" rows="5">{{ old('content_IINN', $creative->content_IINN) }}</textarea>
                            @error('content_IINN')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label>Image Position</label>
                            <textarea class="form-control @error('image_position') is-invalid @enderror"
                                name="image_position" rows="5">{{ old('image_position', $creative->image_position) }}</textarea>
                            @error('image_position')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Images -->
                        <label for="image">Image</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $creative->image) }}" alt="Current Image" class="img-thumbnail" style="width: 100px; height: auto;">
                        </div>
                        <input type="file" name="image" id="image" class="form-control">
                </div>

                <!-- Submit and Cancel Buttons -->
                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a href="{{ route('creativity.index') }}" class="btn btn-secondary mt-3">Cancel</a>

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