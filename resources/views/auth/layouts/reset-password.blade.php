@php

    $system =\App\Models\SystemSetting::first();

@endphp

@extends('auth.app')

@section('title','E-mart | Reset Password')

@section('content')
    <!-- Register Card -->
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                      <a>
                          @if (!empty($system->logo))
                              <img class="mb-3" width="150" height="100px" src="{{ asset($system->logo ?? "") }}" alt="logo" />
                          @else
                              <img class="mb-3" width="150" height="100px" src="{{ asset('backend/img/logo/logo.png') }}" alt="logo" />
                          @endif
                     </a>
                  </span>
                </a>
            </div>
            <!-- /Logo -->
            <p class="mb-4 text-center fw-bold">Reset your account</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('password.store') }}" method="post">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') border-danger @enderror" id="email" name="email" value="" required autofocus placeholder="Enter email" />
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
                            aria-describedby="password"
                            required
                            autocomplete="new-password"
                        />
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
                            aria-describedby="password"
                            required
                            autocomplete="new-password"
                        />
                        @error('password_confirmation')
                          <div style="color: red;">{{$message}}</div>
                        @enderror
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary d-grid w-100">Reset Password</button>
            </form>
        </div>
    </div>
    <!-- Register Card -->
@endsection
