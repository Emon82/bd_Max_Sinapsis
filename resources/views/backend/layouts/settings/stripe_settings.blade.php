@extends('backend.app')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Stripe Settings /</span> Stripe</h4>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Stripe Setting</h4>
                        <div class="mt-4">
                            <form class="forms-sample" action="{{route('stripe.update')}}" method="POST">
                                @csrf
                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label for="stripe_key">STRIPE KEY:</label>
                                        <input type="text"
                                               id="stripe_key"
                                               class="form-control form-control-md border-left-0 @error('stripe_key') is-invalid @enderror"
                                               placeholder="ENTER STRIPE KEY" name="stripe_key" value="{{ env('STRIPE_KEY') }}" required>
                                        @error('stripe_key')
                                          <div style="color: red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label>STRIPE SECRET:</label>
                                        <input type="text"
                                               id="stripe_secret"
                                               class="form-control form-control-md border-left-0 @error('stripe_secret') is-invalid @enderror"
                                               placeholder="ENTER STRIPE SECRET" name="stripe_secret" value="{{ env('STRIPE_SECRET') }}"
                                               required>
                                        @error('stripe_secret')
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
