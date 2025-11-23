@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Footer Info
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Update FooterInfo</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.footer-info.update', 1) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Preview</label><br>
                                <img src="{{ asset(@$footerInfo->logo) }}" width="100"><br>
                            </div>
                            <div class="col-md-12">
                                <label>Footer Logo <span class="text-danger">(width:1280px, height:640px) 2MB Maximum</span></label>
                                <input type="file" name="logo" value="{{ old('logo') }}"
                                    class="form-control @error('logo') is-invalid @enderror">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ old('phone') ?? @$footerInfo->phone }}"
                                    placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" value="{{ old('email') ?? @$footerInfo->email }}"
                                    placeholder="Email Address" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{ old('address') ?? @$footerInfo->address }}"
                                    placeholder="Address" class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Copy Right <span class="text-danger">*</span></label>
                                <input type="text" name="copyright"
                                    value="{{ old('copyright') ?? @$footerInfo->copyright }}" placeholder="Copy Right"
                                    class="form-control @error('copyright') is-invalid @enderror">
                                @error('copyright')
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
