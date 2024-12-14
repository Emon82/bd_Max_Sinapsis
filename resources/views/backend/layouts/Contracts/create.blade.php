@extends('backend.app')

@section('title', 'Add Contract')

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
                    <h4 class="card-title">Add New Contract</h4>

                    <form class="forms-sample" action="{{ route('contract.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Title in Spanish -->
    <div class="form-group mb-3">
        <label for="email" class="form-label required">Email:</label>
        <input type="text" id="title_EESS" name="email"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="Enter email "
               value="{{ old('email') }}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <!-- Title in English -->
    <div class="form-group mb-3">
        <label for="address" class="form-label required">Address</label>
        <input type="text" id="address" name="address"
               class="form-control @error('address') is-invalid @enderror"
               placeholder="Enter Title in English"
               value="{{ old('address') }}">
        @error('address')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <!-- Mobile -->
    <div class="form-group mb-3">
        <label for="mobile" class="form-label required">Mobile:</label>
        <input type="text" id="mobile" name="mobile"
               class="form-control @error('mobile') is-invalid @enderror"
               placeholder="Enter Location in Spanish"
               value="{{ old('mobile') }}">
        @error('mobile')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <!-- Location in English -->
    <div class="form-group mb-3">
        <label for="teliphone" class="form-label required">Teliphone</label>
        <input type="text" id="teliphone" name="teliphone"
               class="form-control @error('teliphone') is-invalid @enderror"
               placeholder="Enter Location in English"
               value="{{ old('teliphone') }}">
        @error('teliphone')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>


    <!-- Submit and Cancel Buttons -->
    <button type="submit" class="btn btn-primary me-2 mt-2">Submit</button>
    <a href="{{ route('contract.index') }}" class="btn btn-secondary mt-2">Cancel</a>
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
