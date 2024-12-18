@extends('backend.app')

@section('title', 'Add New Project')

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
                    <h4 class="card-title">Add New Project</h4>

                    <form class="forms-sample" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title in Spanish -->
                        <div class="form-group mb-3">
                            <label for="title_EESS" class="form-label required">Title (Spanish)</label>
                            <input type="text" id="title_EESS" name="title_EESS"
                                class="form-control @error('title_EESS') is-invalid @enderror"
                                placeholder="Enter Title in Spanish"
                                value="{{ old('title_EESS') }}">
                            @error('title_EESS')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title in English -->
                        <div class="form-group mb-3">
                            <label for="title_IINN" class="form-label required">Title (English)</label>
                            <input type="text" id="title_IINN" name="title_IINN"
                                class="form-control @error('title_IINN') is-invalid @enderror"
                                placeholder="Enter Title in English"
                                value="{{ old('title_IINN') }}">
                            @error('title_IINN')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Location in Spanish -->
                        <div class="form-group mb-3">
                            <label for="location_EESS" class="form-label required">Location (Spanish)</label>
                            <input type="text" id="location_EESS" name="location_EESS"
                                class="form-control @error('location_EESS') is-invalid @enderror"
                                placeholder="Enter Location in Spanish"
                                value="{{ old('location_EESS') }}">
                            @error('location_EESS')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Location in English -->
                        <div class="form-group mb-3">
                            <label for="location_IINN" class="form-label required">Location (English)</label>
                            <input type="text" id="location_IINN" name="location_IINN"
                                class="form-control @error('location_IINN') is-invalid @enderror"
                                placeholder="Enter Location in English"
                                value="{{ old('location_IINN') }}">
                            @error('location_IINN')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description in Spanish -->
                        <div class="form-group mb-3">
                            <label for="description_EESS" class="form-label required">Description (Spanish)</label>
                            <textarea id="description_EESS" name="description_EESS"
                                class="form-control @error('description_EESS') is-invalid @enderror"
                                rows="4" placeholder="Enter Description in Spanish">{{ old('description_EESS') }}</textarea>
                            @error('description_EESS')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description in English -->
                        <div class="form-group mb-3">
                            <label for="description_IINN" class="form-label required">Description (English)</label>
                            <textarea id="description_IINN" name="description_IINN"
                                class="form-control @error('description_IINN') is-invalid @enderror"
                                rows="4" placeholder="Enter Description in English">{{ old('description_IINN') }}</textarea>
                            @error('description_IINN')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <!-- Submit and Cancel Buttons -->
                        <button type="submit" class="btn btn-primary me-2 mt-2">Submit</button>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-2">Cancel</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // CKEditor Integration for Descriptions
        ClassicEditor.create(document.querySelector('#description_EESS'))
            .catch(error => console.error('CKEditor Error:', error));

        ClassicEditor.create(document.querySelector('#description_IINN'))
            .catch(error => console.error('CKEditor Error:', error));

        // Select2 Dropdowns
        $('.select2').select2();
    });
</script>
@endpush