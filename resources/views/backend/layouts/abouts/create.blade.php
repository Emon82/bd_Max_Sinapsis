@extends('backend.app')

@section('title', 'Add New About')

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
                    <h4>Add New About</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="content_EESS">English Content</label>
                            <textarea name="content_EESS" class="form-control" rows="4" placeholder="Enter English Content"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="content_IINN">Spanish Content</label>
                            <textarea name="content_IINN" class="form-control" rows="4" placeholder="Enter Spanish Content"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image"> Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Select an image for the Creativity.</small>
                        </div>


                        <button type="submit" class="btn btn-success mt-3">Add about</button>
                        <a href="{{ route('about.index') }}" class="btn btn-secondary mt-3">Back</a>
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
            // Preview selected image
            $('input[name="image"]').on('change', function() {
                let file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let img = `<img src="${e.target.result}" class="portfolio-img-preview" />`;
                        $('.portfolio-preview-container').html(img);
                    }
                    reader.readAsDataURL(file);
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
    </style>
@endpush
