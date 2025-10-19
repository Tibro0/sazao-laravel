@extends('admin.layouts.master')

@section('page-title')
    Admin | Profile
@endsection

@section('content')
    <div class="row">
        {{-- breadcrumb Start --}}
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Profile</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard</a>
                    </ol>
                </div>

            </div>
        </div>
        {{-- breadcrumb End --}}
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    <div class="card-body shadow">
                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ auth()->user()->name ?? old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
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

    </div>
@endsection
