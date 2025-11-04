@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Profile
@endsection

@section('content')
    <div class="row">
        {{-- breadcrumb Start --}}
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h4 class="text-capitalize">Profile</h4>
                <div class="mb-3">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary px-5">Dashboard</a>
                </div>
            </div>
        </div>
        {{-- breadcrumb End --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Update Profile Information</h3>
                </div>
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Preview</label><br>
                            <img src="{{ asset(auth()->user()->image) }}" width="100">
                        </div>
                        <div class="mb-3">
                            <label>Image <span class="text-danger">(Max 2MB)</span></label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ auth()->user()->name ?? old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ auth()->user()->email ?? old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Update Password</h3>
                </div>
                <form action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body shadow">
                        <div class="mb-3">
                            <label>Current Password <span class="text-danger">*</span></label>
                            <input type="password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Enter Your Current Password">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>New Password <span class="text-danger">*</span></label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter Your New Password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Enter Your New Password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
