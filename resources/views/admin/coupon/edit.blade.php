@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Update Coupon
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Create Update</h4>
                        <div>
                            <a href="{{ route('admin.coupons.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $coupon->name ?? old('name') }}"
                                    placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Code <span class="text-danger">*</span></label>
                                <input type="text" name="code" value="{{ $coupon->code ?? old('code') }}"
                                    placeholder="Code" class="form-control @error('code') is-invalid @enderror">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input type="number" name="quantity" value="{{ $coupon->quantity ?? old('quantity') }}"
                                    placeholder="Quantity" class="form-control @error('quantity') is-invalid @enderror">
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Max Use Per Person <span class="text-danger">*</span></label>
                                <input type="number" name="max_use" value="{{ $coupon->max_use ?? old('max_use') }}"
                                    placeholder="Max Use Per Person"
                                    class="form-control @error('max_use') is-invalid @enderror">
                                @error('max_use')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Start Date <span class="text-danger">*</span></label>
                                <input type="date" name="start_date"
                                    value="{{ $coupon->start_date ?? old('start_date') }}"
                                    class="form-control @error('start_date') is-invalid @enderror">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>End Date <span class="text-danger">*</span></label>
                                <input type="date" name="end_date" value="{{ $coupon->end_date ?? old('end_date') }}"
                                    class="form-control @error('end_date') is-invalid @enderror">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Discount Type</label>
                                <select name="discount_type"
                                    class="form-select @error('discount_type') is-invalid @enderror">
                                    <option @selected($coupon->discount_type == 'percent') value="percent">Percentage (%)</option>
                                    <option @selected($coupon->discount_type == 'amount') value="amount">Amount
                                        ({{ $settings->currency_icon }})</option>
                                </select>
                                @error('discount_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Discount Value <span class="text-danger">*</span></label>
                                <input type="number" name="discount" value="{{ $coupon->discount ?? old('discount') }}"
                                    placeholder="Discount Value"
                                    class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Select a Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="1" @selected($coupon->status == 1)>Active</option>
                                    <option value="0" @selected($coupon->status == 0)>InActive</option>
                                </select>
                                @error('status')
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
