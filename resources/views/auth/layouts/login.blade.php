@php

    $system =\App\Models\SystemSetting::first();

@endphp

@extends('auth.app')

@section('title','Login Panel')

@section('content')
    <!-- Login -->
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                     <a>
                     @if (!empty($system->logo))
                             <img class="mb-3" src="{{ asset($system->logo ?? "") }}" alt="logo" />
                         @else
                             <img class="mb-3" src="{{ asset('backend/img/logo/logo.png') }}" alt="logo" />
                         @endif
                     </a>
                  </span>
                </a>
            </div>
            <!-- /Logo -->
            <p class="mb-4 text-center fw-bold">Sign in to your account</p>

            <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="text"
                        class="form-control @error('email') border-danger @enderror"
                        id="email"
                        name="email"
                        placeholder="Enter email"
                        autofocus />
                    @error('email')
                       <div style="color: red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        <a href="{{ route('password.request') }}">
                            <small>Forgot Password?</small>
                        </a>
                    </div>
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
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me" />
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>

            {{-- <p class="text-center">
                <span>New to here?</span>
                <a href="{{route('register')}}">
                    <span>Create an account.</span>
                </a>
            </p> --}}
            {{-- <div class="divider my-6">
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


            </div> --}}
        </div>
    </div>
    <!-- /Login -->
@endsection

