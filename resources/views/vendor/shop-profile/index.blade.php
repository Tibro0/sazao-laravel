@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Vendor Shop Profile
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Shop profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.shop-profile.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Preview</label><br>
                                            <img src="{{ asset(@$profile->banner) }}" width="200px">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Banner <span class="text-danger">* (width:1630px, height:429px) 2MB Maximum</span></label>
                                            <input type="file" name="banner" value="{{ old('banner') }}"
                                                class="form-control @error('banner') is-invalid @enderror">
                                            @error('banner')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Shop Name <span class="text-danger">*</span></label>
                                            <input type="text" name="shop_name" value="{{ @$profile->shop_name ?? old('shop_name') }}"
                                                class="form-control @error('shop_name') is-invalid @enderror">
                                            @error('shop_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" value="{{ @$profile->phone ?? old('phone') }}"
                                                class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" value="{{ @$profile->email ?? old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" name="address" value="{{ @$profile->address ?? old('address') }}"
                                                class="form-control @error('address') is-invalid @enderror">
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea name="description" id="elm1" class="@error('description') is-invalid @enderror">{!! @$profile->description ?? old('description') !!}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Facebook Link</label>
                                            <input type="text" name="fb_link" value="{{ @$profile->fb_link ?? old('fb_link') }}"
                                                class="form-control @error('fb_link') is-invalid @enderror">
                                            @error('fb_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Twitter Link</label>
                                            <input type="text" name="tw_link" value="{{ @$profile->tw_link ?? old('tw_link') }}"
                                                class="form-control @error('tw_link') is-invalid @enderror">
                                            @error('tw_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Instagram Link</label>
                                            <input type="text" name="insta_link" value="{{ @$profile->insta_link ?? old('insta_link') }}"
                                                class="form-control @error('insta_link') is-invalid @enderror">
                                            @error('insta_link')
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
            </div>
        </div>
    </section>
@endsection

@push('js-link')
    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endpush
