@extends('backend.app')

@section('title','System Settings')

@push('styles')
    <style>

        .dropify-wrapper .dropify-message p {
            font-size: 26px;
            margin: 5px 0 0;
        }
        .ck-editor__editable[role="textbox"] {
            min-height: 150px;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">System Settings /</span> System</h4>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">System Setting</h4>
                        <div class="mt-4">
                            <form class="forms-sample" method="POST" action="{{ route('system.update') }}"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable" for="email">Email:</label>
                                        <input type="email"
                                               class="form-control form-control-md border-left-0 @error('email') is-invalid @enderror"
                                               placeholder="Email" id="email" name="email"
                                               value="{{ $setting->email ?? '' }}">
                                        @error('email')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">Title:</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('title') is-invalid @enderror"
                                               placeholder="Title" name="title" id="title"
                                               value="{{ $setting->title ?? '' }}">
                                        @error('title')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable" for="system_name">System Name:</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('system_name') is-invalid @enderror"
                                               placeholder="System Name" id="system_name" name="system_name"
                                               value="{{ $setting->system_name ?? '' }}">
                                        @error('system_name')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="copyright_text">Copy Rights Test</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('copyright_text') is-invalid @enderror"
                                               placeholder="Copy Rights" name="copyright_text" id="copyright_text"
                                               value="{{ $setting->copyright_text ?? '' }}">
                                        @error('copyright_text')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-6">
                                        <label for="logo">Logo:</label>
                                        <input type="file"
                                               class="form-control form-control-md border-left-0 dropify @error('logo') is-invalid @enderror"
                                               id="logo" name="logo"
                                               data-default-file="@isset($setting){{ asset($setting->logo ?? '') }}@endisset">
                                        @error('logo')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="favicon">Favicon:</label>
                                        <input type="file"
                                               class="form-control form-control-md border-left-0 dropify @error('favicon') is-invalid @enderror"
                                               name="favicon" id="favicon"
                                               data-default-file="@isset($setting){{ asset($setting->favicon ?? '') }}@endisset">
                                        @error('favicon')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">About System</label>
                                    <textarea placeholder="Type Here..." id="description" class="form-control" name="description">{{ $setting->description ?? '' }}</textarea>
                                    @error('description')
                                    <div style="color: red">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger me-2">Cancel</a>
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
            .create(document.querySelector('#description'), {
                height: '500px'
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#description1'), {
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
