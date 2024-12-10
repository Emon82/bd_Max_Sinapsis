@extends('backend.app')

@section('title', 'Custom Script Edit')

@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Custom Script Edit</h4>
        <div class="card-header mb-4">
            <a href="{{route('custom-script.index')}}" class="btn btn-sm btn-primary d-flex">Back</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Custom Script</h4>
                        <div class="mt-4">
                            <form class="forms-sample" action="{{ route('custom-script.update',['id' => $custom_script->id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label class="form-lable required">Type:</label>
                                            <select name="type" class="form-select">
                                                <option value="">-- Select Type --</option>
                                                <option value="header" {{$custom_script->type == 'header' ? 'selected' : ''}}>Header</option>
                                                <option value="footer" {{$custom_script->type == 'footer' ? 'selected' : ''}}>Footer</option>
                                            </select>

                                            @error('content')
                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="content" class="form-lable required">Content:</label>
                                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="" cols="" rows="">{{$custom_script->content}}</textarea>
                                            @error('content')
                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('custom-script.index') }}" class="btn btn-danger ">Cancel</a>
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

