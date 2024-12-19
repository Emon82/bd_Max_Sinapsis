@extends('backend.app')

@section('title', 'Add New Item')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/vendor/dropzone/dropzone.min.css') }}">
<style>
    .img-preview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin: 5px;
    }

    .img-preview-container {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }
</style>
@endpush

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Item</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('creativity.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- English Title -->
                        <div class="form-group">
                            <label for="title_en">English Title</label>
                            <input type="text" name="title_EESS" class="form-control" placeholder="Enter English Title" required>
                        </div>

                        <!-- Spanish Title -->
                        <div class="form-group">
                            <label for="title_es">Spanish Title</label>
                            <input type="text" name="title_IINN" class="form-control" placeholder="Enter Spanish Title" required>
                        </div>

                        <!-- English Subtitle -->
                        <div class="form-group">
                            <label for="subtitle_en">English Subtitle</label>
                            <textarea id="subtitle_en" name="sub_title_EESS" class="form-control" rows="2" placeholder="Enter English Subtitle"></textarea>
                        </div>

                        <!-- Spanish Subtitle -->
                        <div class="form-group">
                            <label for="subtitle_es">Spanish Subtitle</label>
                            <textarea id="subtitle_es" name="sub_title_IINN" class="form-control" rows="2" placeholder="Enter Spanish Subtitle"></textarea>
                        </div>

                        <!-- Content (English) with CKEditor -->
                        <div class="form-group">
                            <label for="content_en">English Content</label>
                            <textarea id="content_en" name="content_EESS" class="form-control" rows="4" placeholder="Enter English Content"></textarea>
                        </div>

                        <!-- Content (Spanish) with CKEditor -->
                        <div class="form-group">
                            <label for="content_es">Spanish Content</label>
                            <textarea id="content_es" name="content_IINN" class="form-control" rows="4" placeholder="Enter Spanish Content"></textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="image">Images</label>
                            <input type="file" id="image" name="image" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Select an image for the item.</small>
                        </div>

                        <!-- Image Position -->
                        <div class="form-group">
                            <label for="image_position">Image Position</label>
                            <select name="image_position" class="form-control">
                                <option value="Left">Left</option>
                                <option value="Right">Right</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success mt-3">Add Item</button>
                        <a href="{{ route('creativity.index') }}" class="btn btn-secondary mt-3">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>

<script>
    // Initialize CKEditor for Content fields
    ClassicEditor.create(document.querySelector('#content_en'));
    ClassicEditor.create(document.querySelector('#content_es'));
    ClassicEditor.create(document.querySelector('#subtitle_en'));
    ClassicEditor.create(document.querySelector('#subtitle_es'));

    // Image Preview (Optional)
    $(document).ready(function() {
        $('input[type="file"][name="image"]').on('change', function() {
            let file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let imgTag = `<img src="${e.target.result}" class="img-preview" />`;
                    $('.img-preview-container').html(imgTag);
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush