@extends('frontend.dashboard.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Reviews
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Vendor Request</h3>
                        <div class="wsus__dashboard_profile mb-4">
                            <div class="wsus__dash_pro_area">
                                {!! @$content->content !!}
                            </div>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('user.vendor-request.create') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <span class="text-danger ms-5 ps-3">(width:1630px, height:429px) 2MB Maximum</span>
                                            <div class="wsus__dash_pro_single mb-0" bis_skin_checked="1">
                                                <i class="fas fa-images @error('shop_image') border border-danger @enderror"
                                                    aria-hidden="true"></i>
                                                <input type="file" name="shop_image" placeholder="Shop Banner Image"
                                                    class="@error('shop_image') border border-danger @enderror">
                                            </div>
                                            @error('shop_image')
                                                <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="wsus__dash_pro_single mb-0" bis_skin_checked="1">
                                                <i class="fas fa-user-tie @error('shop_name') border border-danger @enderror"
                                                    aria-hidden="true"></i>
                                                <input type="text" name="shop_name" placeholder="Shop Name"
                                                    class="@error('shop_name') border border-danger @enderror">
                                            </div>
                                            @error('shop_name')
                                                <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="wsus__dash_pro_single mb-0" bis_skin_checked="1">
                                                <i class="fal fa-envelope-open @error('shop_email') border border-danger @enderror"
                                                    aria-hidden="true"></i>
                                                <input type="text" name="shop_email" placeholder="Shop Email"
                                                    class="@error('shop_email') border border-danger @enderror">
                                            </div>
                                            @error('shop_email')
                                                <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="wsus__dash_pro_single mb-0" bis_skin_checked="1">
                                                <i class="far fa-phone-alt @error('shop_phone') border border-danger @enderror"
                                                    aria-hidden="true"></i>
                                                <input type="text" name="shop_phone" placeholder="Shop Phone"
                                                    class="@error('shop_phone') border border-danger @enderror">
                                            </div>
                                            @error('shop_phone')
                                                <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="wsus__dash_pro_single mb-0" bis_skin_checked="1">
                                                <i class="fas fa-address-card @error('shop_address') border border-danger @enderror"
                                                    aria-hidden="true"></i>
                                                <input type="text" name="shop_address" placeholder="Shop Address"
                                                    class="@error('shop_address') border border-danger @enderror">
                                            </div>
                                            @error('shop_address')
                                                <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="wsus__dash_pro_single mb-0" bis_skin_checked="1">
                                                <textarea name="about" placeholder="About You" class="@error('about') border border-danger @enderror"></textarea>
                                            </div>
                                            @error('about')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="common_btn mt-2">Save Changes</button>
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
