@extends('frontend.dashboard.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | User Profile
@endsection

@section('content')
    <!--=============================DASHBOARD START==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('frontend.dashboard.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4>basic information</h4>
                                <form action="{{ route('user.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <div class="wsus__dash_pro_img">
                                                <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg') }}"
                                                    alt="img" class="img-fluid w-100">
                                                <input type="file" name="image">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-5 mb-4">
                                            <div class="wsus__dash_pro_single mb-0">
                                                <i
                                                    class="fas fa-user-tie @error('name') border border-danger @enderror"></i>
                                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                    placeholder="Name"
                                                    class="@error('name') border border-danger @enderror">
                                            </div>
                                            @error('name')
                                                <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-4">
                                            <div class="wsus__dash_pro_single mb-0">
                                                <i
                                                    class="fal fa-envelope-open @error('email') border border-danger @enderror"></i>
                                                <input type="email" name="email" value="{{ Auth::user()->email }}"
                                                    placeholder="Email"
                                                    class="@error('email') border border-danger @enderror">
                                            </div>
                                            @error('email')
                                                <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                                    </div>
                                </form>

                                <div class="wsus__dash_pass_change mt-2">
                                    <form action="{{ route('user.profile.update.password') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <h4 class="mb-3">Update Password</h4>
                                            <div class="col-xl-4 col-md-6 mb-4">
                                                <div class="wsus__dash_pro_single mb-0">
                                                    <i
                                                        class="fas fa-unlock-alt @error('current_password') border border-danger @enderror"></i>
                                                    <input type="password" name="current_password"
                                                        placeholder="Current Password"
                                                        class="@error('current_password') border border-danger @enderror">
                                                </div>
                                                @error('current_password')
                                                    <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 col-md-6 mb-4">
                                                <div class="wsus__dash_pro_single mb-0">
                                                    <i
                                                        class="fas fa-lock-alt @error('password') border border-danger @enderror"></i>
                                                    <input type="password" name="password" placeholder="New Password"
                                                        class="@error('password') border border-danger @enderror">
                                                </div>
                                                @error('password')
                                                    <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-4 mb-4">
                                                <div class="wsus__dash_pro_single mb-0">
                                                    <i class="fas fa-lock-alt @error('password_confirmation') border border-danger @enderror"></i>
                                                    <input type="password" name="password_confirmation"
                                                        placeholder="Confirm Password"
                                                        class="@error('password_confirmation') border border-danger @enderror">
                                                </div>
                                                @error('password_confirmation')
                                                    <div class="text-danger ms-5 ps-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-12">
                                                <button class="common_btn" type="submit">upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================DASHBOARD START==============================-->
@endsection
