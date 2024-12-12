@extends('backend.app')

@section('title', 'Add New Portfolio')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/vendor/dropzone/dropzone.min.css') }}">
    <style>
        .portfolio-img-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: 5px;
        }
    </style>
@endpush

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Portfolio</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title_EESS">English Title</label>
                            <input type="text" name="title_EESS" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <div class="form-group">
                            <label for="title_IINN">Spanish Title</label>
                            <input type="text" name="title_IINN" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <div class="form-group">
                            <label for="sub_Title_EESS">English Sub-Title</label>
                            <input type="text" name="sub_Title_EESS" class="form-control" placeholder="Enter Sub Title">
                        </div>

                        <div class="form-group">
                            <label for="sub_Title_IINN">Spanish Sub-Title</label>
                            <input type="text" name="sub_Title_IINN" class="form-control" placeholder="Enter Sub Title">
                        </div>

                        <div class="form-group">
                            <label for="sub_desc_EESS">English Description</label>
                            <textarea name="sub_desc_EESS" class="form-control" rows="4" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="sub_desc_IINN">Spanish Description</label>
                            <textarea name="sub_desc_IINN" class="form-control" rows="4" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="images">Portfolio Images</label>
                            <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                            <small class="form-text text-muted">You can select multiple images.</small>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Add Portfolio</button>
                        <a href="{{ route('portfolios.index') }}" class="btn btn-secondary mt-3">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Preview selected images
            $('input[name="images[]"]').on('change', function() {
                let files = this.files;
                $('.portfolio-preview-container').html('');  // Clear existing previews
                for (let i = 0; i < files.length; i++) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let img = `<img src="${e.target.result}" class="portfolio-img-preview" />`;
                        $('.portfolio-preview-container').append(img);
                    }
                    reader.readAsDataURL(files[i]);
                }
            });
        });
    </script>

    <style>
        .portfolio-preview-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .portfolio-img-preview {
            object-fit: cover;
        }
    </style>
@endpush
