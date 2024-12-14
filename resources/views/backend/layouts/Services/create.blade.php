@extends('backend.app')

@section('title', 'Create Success Guide')

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
                    <h4 class="card-title">Add New Service</h4>
                    <div class="mt-4">
                        <form class="forms-sample" action="{{ route('services.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Title in Spanish -->
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label required">Title (Spanish):</label>
                                        <input type="text" class="form-control @error('title_eess') is-invalid @enderror"
                                            name="title_eess" value="{{ old('title_eess') }}">
                                        @error('title_eess')
                                        <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Title in English -->
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label required">Title (English):</label>
                                        <input type="text" class="form-control @error('title_iinn') is-invalid @enderror"
                                            name="title_iinn" value="{{ old('title_iinn') }}">
                                        @error('title_iinn')
                                        <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Description in Spanish -->
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label required">Description (Spanish):</label>
                                        <textarea class="form-control @error('description_eess') is-invalid @enderror"
                                            name="description_eess" id="description_eess">{{ old('description_eess') }}</textarea>
                                        @error('description_eess')
                                        <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Description in English -->
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label required">Description (English):</label>
                                        <textarea class="form-control @error('description_iinn') is-invalid @enderror"
                                            name="description_iinn" id="description_iinn">{{ old('description_iinn') }}</textarea>
                                        @error('description_iinn')
                                        <div style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('services.index') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
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
    // CKEditor
    ClassicEditor
        .create(document.querySelector('#description_eess'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#description_iinn'))
        .catch(error => {
            console.error(error);
        });

    // Dropify
    $('.dropify').dropify();

    // Select2
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush