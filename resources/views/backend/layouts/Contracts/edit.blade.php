@extends('backend.app')

@section('title', 'Edit Contract')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/vendor/toastr/toastr.min.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Contract</h4>

                    <form action="{{ route('contract.update', $contract->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contract->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $contract->address) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile', $contract->mobile) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="teliphone">Telephone</label>
                            <input type="text" class="form-control" id="teliphone" name="teliphone" value="{{ old('teliphone', $contract->teliphone) }}" required>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Update Contract</button>
                            <a href="{{ route('contract.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/vendor/toastr/toastr.min.js') }}"></script>
@endpush