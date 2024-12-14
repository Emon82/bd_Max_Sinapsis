@extends('backend.app')

@section('title', 'Edit Portfolio')

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
                    <h4 class="card-title">Edit Portfolio</h4>

                    <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title (English) -->
                        <div class="form-group mb-3">
                            <label>Title (English)</label>
                            <input type="text" class="form-control @error('title_EESS') is-invalid @enderror"
                                name="title_EESS" value="{{ old('title_EESS', $portfolio->title_EESS) }}" required>
                            @error('title_EESS')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title (Other Language) -->
                        <div class="form-group mb-3">
                            <label>Title (Other Language)</label>
                            <input type="text" class="form-control @error('title_IINN') is-invalid @enderror"
                                name="title_IINN" value="{{ old('title_IINN', $portfolio->title_IINN) }}" required>
                            @error('title_IINN')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sub-title (English) -->
                        <div class="form-group mb-3">
                            <label>Sub-title (English)</label>
                            <input type="text" class="form-control @error('sub_Title_EESS') is-invalid @enderror"
                                name="sub_Title_EESS" value="{{ old('sub_Title_EESS', $portfolio->sub_Title_EESS) }}" required>
                            @error('sub_Title_EESS')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sub-title (Other Language) -->
                        <div class="form-group mb-3">
                            <label>Sub-title (Other Language)</label>
                            <input type="text" class="form-control @error('sub_Title_IINN') is-invalid @enderror"
                                name="sub_Title_IINN" value="{{ old('sub_Title_IINN', $portfolio->sub_Title_IINN) }}" required>
                            @error('sub_Title_IINN')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description (English) -->
                        <div class="form-group mb-3">
                            <label>Description (English)</label>
                            <textarea class="form-control @error('sub_desc_EESS') is-invalid @enderror"
                                name="sub_desc_EESS" rows="5">{{ old('sub_desc_EESS', $portfolio->sub_desc_EESS) }}</textarea>
                            @error('sub_desc_EESS')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description (Other Language) -->
                        <div class="form-group mb-3">
                            <label>Description (Other Language)</label>
                            <textarea class="form-control @error('sub_desc_IINN') is-invalid @enderror"
                                name="sub_desc_IINN" rows="5">{{ old('sub_desc_IINN', $portfolio->sub_desc_IINN) }}</textarea>
                            @error('sub_desc_IINN')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Images -->
                        <div class="form-group mb-3">
                            <label>Portfolio Images</label>
                            @php
                            $images = $portfolio->images ?? [];
                            $lastImage = count($images) > 0 ? end($images) : null;
                            @endphp
                            <input type="file"
                                class="form-control dropify"
                                name="images[]"
                                multiple
                                data-default-file="{{ $lastImage ? asset('backend/img/avatars/' . $lastImage) : '' }}">
                        </div>

                        <!-- Submit and Cancel Buttons -->
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('portfolios.index') }}" class="btn btn-secondary mt-3">Cancel</a>

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