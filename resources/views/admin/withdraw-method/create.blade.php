@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Create Withdraw Methods
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Create Withdraw Methods</h4>
                        <div>
                            <a href="{{ route('admin.withdraw-method.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.withdraw-method.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Minimum Amount <span class="text-danger">*</span></label>
                                <input type="number" min="0" name="minimum_amount"
                                    value="{{ old('minimum_amount') }}" placeholder="Minimum Amount"
                                    class="form-control @error('minimum_amount') is-invalid @enderror">
                                @error('minimum_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Maximum Amount <span class="text-danger">*</span></label>
                                <input type="number" min="0" name="maximum_amount"
                                    value="{{ old('maximum_amount') }}" placeholder="Maximum Amount"
                                    class="form-control @error('maximum_amount') is-invalid @enderror">
                                @error('maximum_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Withdraw Charge (%) <span class="text-danger">*</span></label>
                                <input type="number" min="0" name="withdraw_charge"
                                    value="{{ old('withdraw_charge') }}" placeholder="Withdraw Charge"
                                    class="form-control @error('withdraw_charge') is-invalid @enderror">
                                @error('withdraw_charge')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="elm1" placeholder="Description"
                                    class="form-control @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-link')
    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endpush
