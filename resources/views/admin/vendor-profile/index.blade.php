@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Vendor Profile
@endsection

@section('content')
    <div class="row">
        {{-- breadcrumb Start --}}
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Vendor Profile</h4>
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
                <form action="{{ route('admin.vendor-profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-white py-3">
                        <h3 class="mb-0">Update Vendor Profile</h3>
                    </div>
                    <div class="card-body shadow">
                        <div class="mb-3">
                            <label>Preview</label><br>
                            <img src="{{ asset($profile->banner) }}" width="100">
                        </div>
                        <div class="mb-3">
                            <label>Banner <span class="text-danger">(width:1630px, height:429px) Maximum 2MB</span></label>
                            <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror">
                        </div>
                        <div class="mb-3">
                            <label>Shop Name <span class="text-danger">*</span></label>
                            <input type="text" name="shop_name" value="{{ $profile->shop_name ?? old('shop_name') }}"
                                class="form-control @error('shop_name') is-invalid @enderror" placeholder="Enter Your Name">
                            @error('shop_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" value="{{ $profile->phone ?? old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Your Phone">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ $profile->email ?? old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" value="{{ $profile->address ?? old('address') }}"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Enter Your Address">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="elm1" class="form-control @error('description') is-invalid @enderror">{!! $profile->description ?? old('description') !!}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Facebook Link</label>
                            <input type="text" name="fb_link" value="{{ $profile->fb_link ?? old('fb_link') }}"
                                class="form-control @error('fb_link') is-invalid @enderror"
                                placeholder="Enter Your Facebook Link">
                            @error('fb_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Twitter Link</label>
                            <input type="text" name="tw_link" value="{{ $profile->tw_link ?? old('tw_link') }}"
                                class="form-control @error('tw_link') is-invalid @enderror"
                                placeholder="Enter Your Twitter Link">
                            @error('tw_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Instagram Link</label>
                            <input type="text" name="insta_link" value="{{ $profile->insta_link ?? old('insta_link') }}"
                                class="form-control @error('insta_link') is-invalid @enderror"
                                placeholder="Enter Your Instagram Link">
                            @error('insta_link')
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

@push('js-link')
    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>
@endpush
