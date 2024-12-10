@php

    $system =\App\Models\SystemSetting::first();

@endphp

@extends('auth.app')

@section('title',' E-mart | Forget Password')

@section('content')

    <!-- Forgot Password -->
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                      <a>
                          @if (!empty($system->logo))
                              <img class="mb-3"  src="{{ asset($system->logo ?? "") }}" alt="logo" />
                          @else
                              <img class="mb-3"  src="{{ asset('backend/img/logo/logo.png') }}" alt="logo" />
                          @endif
                     </a>
                  </span>
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Forgot Password? 🔒</h4>
            <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
            <!-- Session Status -->

            <h6 class="text-center text-success">{{session('status')}}</h6>

            <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="text"
                        class="form-control @error('email') border-danger @enderror"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                        autofocus />
                    @error('email')
                      <div style="color: red;">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
            </form>
            <div class="text-center">
                <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Back to login
                </a>
            </div>
        </div>
    </div>
    <!-- /Forgot Password -->

@endsection

