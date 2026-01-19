@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Login
@endsection

@section('content')
    <!--============================BREADCRUMB START==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>login / register</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">login / register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->


    <!--============================LOGIN/REGISTER PAGE START==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{ Session::has('frontend_auth_list_style') && Session::get('frontend_auth_list_style') == 'login' ? 'active' : '' }} {{ !Session::has('frontend_auth_list_style') ? 'active' : '' }} list-view"
                                    data-id="login" id="pills-home-tab2" data-bs-toggle="pill" data-bs-target="#pills-homes"
                                    type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{ Session::has('frontend_auth_list_style') && Session::get('frontend_auth_list_style') == 'register' ? 'active' : '' }} list-view"
                                    data-id="register" id="pills-profile-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-profiles" type="button" role="tab"
                                    aria-controls="pills-profiles" aria-selected="true">signup</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            {{-- Login Start --}}
                            <div class="tab-pane fade {{ Session::has('frontend_auth_list_style') && Session::get('frontend_auth_list_style') == 'login' ? 'show active' : '' }} {{ !Session::has('frontend_auth_list_style') ? 'show active' : '' }}"
                                id="pills-homes" role="tabpanel" aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Email" class="@error('email') border border-danger @enderror">
                                        </div>
                                        @error('email')
                                            <div class="text-danger ms-5 ps-4">{{ $message }}</div>
                                        @enderror
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input type="password" name="password" placeholder="Password"
                                                class="@error('password') border border-danger @enderror">
                                        </div>
                                        @error('password')
                                            <div class="text-danger ms-5 ps-4">{{ $message }}</div>
                                        @enderror
                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="remember"
                                                    name="remember">
                                                <label class="form-check-label" for="remember">Remember
                                                    me</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">forget password
                                                ?</a>
                                        </div>
                                        <button class="common_btn" type="submit">login</button>
                                        <p class="social_text">Sign in with social account</p>
                                        <ul class="wsus__login_link">
                                            <li><a href="{{ route('google.login') }}"><i class="fab fa-google"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            {{-- Login End --}}
                            {{-- Register Start --}}
                            <div class="tab-pane fade {{ Session::has('frontend_auth_list_style') && Session::get('frontend_auth_list_style') == 'register' ? 'show active' : '' }}"
                                id="pills-profiles" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Name" class="@error('name') border border-danger @enderror">
                                        </div>
                                        @error('name')
                                            <div class="text-danger ms-5 ps-4">{{ $message }}</div>
                                        @enderror
                                        <div class="wsus__login_input">
                                            <i class="far fa-envelope"></i>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Email"
                                                class="@error('email') border border-danger @enderror">
                                        </div>
                                        @error('email')
                                            <div class="text-danger ms-5 ps-4">{{ $message }}</div>
                                        @enderror
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input type="password" name="password" placeholder="Password"
                                                class="@error('password') border border-danger @enderror">
                                        </div>
                                        @error('password')
                                            <div class="text-danger ms-5 ps-4">{{ $message }}</div>
                                        @enderror
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm Password"
                                                class="@error('password_confirmation') border border-danger @enderror">
                                        </div>
                                        @error('password_confirmation')
                                            <div class="text-danger ms-5 ps-4">{{ $message }}</div>
                                        @enderror
                                        {{-- <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckDefault03">
                                                <label class="form-check-label" for="flexSwitchCheckDefault03">I consent
                                                    to the privacy policy</label>
                                            </div>
                                        </div> --}}
                                        <button class="common_btn mt-4" type="submit">signup</button>
                                    </form>
                                </div>
                            </div>
                            {{-- Register End --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================LOGIN/REGISTER PAGE END==============================-->
@endsection

@push('js-link')
    <script>
        $(document).ready(function() {
            $('.list-view').on('click', function() {
                let style = $(this).data('id');

                $.ajax({
                    method: "GET",
                    url: "{{ route('frontend-auth-list-style') }}",
                    data: {
                        style: style
                    },
                    success: function(data) {

                    }
                });
            })
        });
    </script>
@endpush
