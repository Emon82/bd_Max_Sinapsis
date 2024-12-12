@extends('backend.app')

@section('title', 'Edit Service')

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
                        <h4 class="card-title">Edit Service</h4>

                        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
      

        <!-- Title (English) -->
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Title (English)</label>
                <input type="text" class="form-control @error('title_EESS') is-invalid @enderror"
                       name="title_EESS" value="{{ old('title_EESS', $project->title_EESS) }}" required>
                @error('title_EESS')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Title (Other Language) -->
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Title (Other Language)</label>
                <input type="text" class="form-control @error('title_IINN') is-invalid @enderror"
                       name="title_IINN" value="{{ old('title_IINN', $project->title_IINN) }}" required>
                @error('title_IINN')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Location (English) -->
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Location (English)</label>
                <input type="text" class="form-control @error('location_EESS') is-invalid @enderror"
                       name="location_EESS" value="{{ old('location_EESS', $project->location_EESS) }}" required>
                @error('location_EESS')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Location (Other Language) -->
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Location (Other Language)</label>
                <input type="text" class="form-control @error('location_IINN') is-invalid @enderror"
                       name="location_IINN" value="{{ old('location_IINN', $project->location_IINN) }}" required>
                @error('location_IINN')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Description (English) -->
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Description (English)</label>
                <textarea class="form-control @error('description_EESS') is-invalid @enderror"
                          name="description_EESS" id="description_EESS" rows="5"
                >{{ old('description_EESS', $project->description_EESS) }}</textarea>
                @error('description_EESS')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description (Other Language) -->
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Description (Other Language)</label>
                <textarea class="form-control @error('description_IINN') is-invalid @enderror"
                          name="description_IINN" id="description_IINN" rows="5"
                >{{ old('description_IINN', $project->description_IINN) }}</textarea>
                @error('description_IINN')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary mt-3">Update</button>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Cancel</a>
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
        ClassicEditor.create(document.querySelector('#description_eess'))
            .catch(error => console.error(error));

        ClassicEditor.create(document.querySelector('#description_iinn'))
            .catch(error => console.error(error));

        $('.dropify').dropify();

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
