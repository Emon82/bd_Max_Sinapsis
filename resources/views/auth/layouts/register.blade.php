@php

    $system =\App\Models\SystemSetting::first();

@endphp


@extends('auth.app')

@section('title','E-mart | Registration Panel')

@section('content')
    <!-- Register Card -->
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                      <a>
                          @if (!empty($system->logo))
                              <img class="mb-3" width="150" height="100px" src="{{ asset($system->logo ?? "") }}" alt="logo" />
                          @else
                              <img class="mb-3" width="150" height="100px" src="{{ asset('backend/img/logo/emart__.png') }}" alt="logo" />
                          @endif
                     </a>
                  </span>
                </a>
            </div>
            <!-- /Logo -->
            <p class="mb-4 text-center fw-bold">Create your account</p>

            <form id="formAuthentication" class="mb-3" action="{{route('register')}}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') border-danger @enderror"
                        id="name"
                        name="name"
                        placeholder="Enter name"
                        autofocus />
                    @error('name')
                       <div style="color: red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') border-danger @enderror" id="email" name="email" placeholder="Enter email" />
                    @error('email')
                      <div style="color: red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password"
                            class="form-control @error('password') border-danger @enderror"
                            name="password"
                            placeholder="Enter password"
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                      <div style="color: red;">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password_confirmation"
                            class="form-control @error('password_confirmation') border-danger @enderror"
                            name="password_confirmation"
                            placeholder="Confirm password"
                            aria-describedby="password" />
                        @error('password_confirmation')
                          <div style="color: red;">{{$message}}</div>
                        @enderror
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            I agree to
                            <a href="javascript:void(0);">privacy policy & terms</a>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{route('login')}}">
                    <span>Sign in</span>
                </a>
            </p>
            <div class="divider my-6">
                <div class="divider-text">or</div>
            </div>
            <p class="text-center">Sign With</p>
            <div class="d-flex justify-content-center">
                <a href="{{route('auth.google')}}" class="btn btn-icon rounded-circle btn-text-google-plus px-4" style="color: red">
                    <i class="tf-icons bx bxl-google fs-1 "></i>
                </a>

                <a href="" class="btn btn-icon rounded-circle btn-text-apple me-1_5 px-4" style="color: black">
                    <i class="tf-icons bx bxl-apple fs-1"></i>
                </a>

                <a href="{{route('auth.facebook')}}" class="btn btn-icon rounded-circle btn-text-facebook me-1_5 px-4" style="color: blue">
                    <i class="bx bxl-facebook-circle fs-1"></i>
                </a>


            </div>
        </div>
    </div>
    <!-- Register Card -->
@endsection








