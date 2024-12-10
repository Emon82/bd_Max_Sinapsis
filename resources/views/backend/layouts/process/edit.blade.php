@extends('backend.app')

@section('title', 'Edit Process')

@push('style')
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
                        <h4 class="card-title">Edit Process</h4>
                        <div class="mt-4">
                            <form class="forms-sample" action="{{ route('process.update',['id' => $data->id]) }}" method="POST"
                                enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group mb-3">
                                          <label class="form-lable required">Title:</label>
                                          <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                 id="title" name="title" value="{{$data->title}}">
                                          @error('title')
                                          <div style="color: red;">{{ $message }}</div>
                                          @enderror
                                      </div>
                                  </div>

                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group row mb-3">
                                          <div class="col">
                                              <label class="form-lable required">Description:</label>
                                              <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{$data->description}}</textarea>
                                              @error('description')
                                              <div style="color: red;">{{ $message }}</div>
                                              @enderror
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group row mb-3">
                                          <div class="col">
                                              <label class="form-lable required">Image:</label>
                                              <input class="form-control dropify @error('feature_image') is-invalid @enderror"
                                                     type="file"
                                                     data-default-file="{{ asset('/' . $data->feature_image) }}"
                                                     name="feature_image">

                                              @error('feature_image')
                                              <div style="color: red;">{{ $message }}</div>
                                              @enderror
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary me-2">Update</button>
                              <a href="{{ route('process.index') }}" class="btn btn-danger ">Cancel</a>
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

