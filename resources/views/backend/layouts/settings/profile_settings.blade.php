@extends('backend.app')

@section('title', 'Profile settings')

@push('styles')
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 18px;
            margin: 5px 0 0 0;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Profile Settings /</span> Profile</h4>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">My Profile</h4>
                        <div class="mt-4">
                            <form class="forms-sample" method="POST" action="{{ route('update.profile') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label class="form-lable" for="avatar">Avatar:</label>
                                        <input type="file" name="avatar" data-default-file="@isset($users){{ asset($users->avatar ?? '') }}@endisset" id="avatar" class="form-control dropify w-50 @error('avatar') border-danger @enderror" data-height="100" />
                                        @error('avatar')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-6">
                                        <label class="form-lable" for="name">User Name:</label>
                                        <input type="text"
                                               class="form-control form-control-md border-left-0 @error('name') is-invalid @enderror"
                                               placeholder="User Name" id="name" name="name"
                                               value="{{ Auth::user()->name ?? ''}}">
                                        @error('name')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-lable" for="email">Email:</label>
                                        <input type="email"
                                               class="form-control form-control-md border-left-0 @error('email') is-invalid @enderror"
                                               placeholder="Email" id="email" name="email"
                                               value="{{ Auth::user()->email ?? ''}}">
                                        @error('email')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>

                            <hr class="mb-30">
                            <div class="mt-30 mb-10">
                                <h3>Update Your Password</h3>
                            </div>

                            <form class="forms-sample" method="POST" action="{{ route('update.Password') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-3">
                                    <div class="col-6">
                                        <label class="form-lable" for="old_password">Current Password:</label>
                                        <input type="password"
                                               class="form-control form-control-md border-left-0 @error('old_password') is-invalid @enderror"
                                               placeholder="Current Password" id="old_password" name="old_password"
                                               value="">
                                        @error('old_password')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-lable" for="password">New Password:</label>
                                        <input type="password"
                                               class="form-control form-control-md border-left-0 @error('password') is-invalid @enderror"
                                               placeholder="New Password" id="password" name="password"
                                               value="">
                                        @error('password')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-6">
                                        <label class="form-lable" for="password_confirmation">Confirm Password:</label>
                                        <input type="password"
                                               class="form-control form-control-md border-left-0 @error('password_confirmation') is-invalid @enderror"
                                               placeholder="Confirm Password" id="password_confirmation" name="password_confirmation"
                                               value="">
                                        @error('password_confirmation')
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



