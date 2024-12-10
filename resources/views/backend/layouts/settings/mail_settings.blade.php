@extends('backend.app')

@section('title','Mail Settings')

@section('content')
    <div class="content-wrapper">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Mail Settings /</span> Mail</h4>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mail Setting</h4>
                            <form class="forms-sample" method="POST" action="{{ route('mail.update') }}"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable" for="mail_mailer">Mail Mailer:</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('mail_mailer') is-invalid @enderror"
                                               placeholder="mail mailer" id="mail_mailer" name="mail_mailer"
                                               required
                                               value="{{ env('MAIL_MAILER') }}">
                                        @error('mail_mailer')
                                          <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="mail_host">Mail Host:</label>
                                        <input type="text"
                                               required
                                               class="form-control form-control-md border-left-0 @error('mail_host') is-invalid @enderror"
                                               placeholder="mail host" name="mail_host" id="mail_host"
                                               value="{{ env('MAIL_HOST') }}">
                                        @error('mail_host')
                                          <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label class="form-lable" for="mail_port">Mail Port:</label>
                                        <input type="text"
                                               required
                                               class="form-control form-control-md border-left-0 @error('mail_port') is-invalid @enderror"
                                               placeholder="mail port" id="mail_port" name="mail_port"
                                               value="{{ env('MAIL_PORT') }}">
                                        @error('mail_port')
                                           <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="mail_username">Mail Username</label>
                                        <input type="text"
                                               required
                                               class="form-control form-control-md border-left-0 @error('mail_username') is-invalid @enderror"
                                               placeholder="Copy Rights" name="mail_username" id="mail_username"
                                               value="{{ env('MAIL_USERNAME') }}">
                                        @error('mail_username')
                                           <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col">
                                        <label for="mail_password">Mail Password:</label>
                                        <input type="text"
                                               required
                                               class="form-control form-control-md border-left-0 @error('mail_password') is-invalid @enderror"
                                               placeholder="mail password" id="mail_password" name="mail_password" value="{{ env('MAIL_PASSWORD') }}">
                                        @error('mail_password')
                                            <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="mail_encryption">Mail Encryption:</label>
                                        <input type="text"
                                               required
                                               class="form-control form-control-md border-left-0 @error('mail_encryption') is-invalid @enderror"
                                               name="mail_encryption" placeholder="mail encryption" id="mail_encryption" value="{{ env('MAIL_ENCRYPTION') }}">
                                        @error('mail_encryption')
                                           <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-6">
                                        <label for="mail_from_address">Mail From Address:</label>
                                        <input type="text" required placeholder="mail from address" id="mail_from_address" class="form-control @error('mail_from_address') is-invalid @enderror" name="mail_from_address" value="{{ env('MAIL_FROM_ADDRESS') }}">
                                        @error('mail_from_address')
                                           <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>

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

