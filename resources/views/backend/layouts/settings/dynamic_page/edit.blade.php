@extends('backend.app')

@section('title', 'Create Dynamic Page')

@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Dynamic Page Edit Form</h4>
        <div class="card-header mb-4">
            <a href="{{route('dynamic_page.index')}}" class="btn btn-sm btn-primary d-flex">Back</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Dynamic Page Update</h4>
                        <div class="mt-4">
                            <form class="forms-sample" action="{{ route('dynamic_page.update', ['id' => $data->id]) }}"
                                method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Title:</label>
                                    <input type="text" class="form-control @error('page_title') is-invalid @enderror"
                                        id="page_title" name="page_title" value="{{ $data->page_title ?? " " }}">
                                    @error('page_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label for="content" class="form-label">Content:</label>
                                        <textarea class="form-control @error('page_content') is-invalid @enderror" id="content" name="page_content"
                                            rows="5">{{ $data->page_content ?? " " }}</textarea>
                                        @error('page_content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('dynamic_page.index') }}" class="btn btn-danger ">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content1'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });


        $('.dropify').dropify();



        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
