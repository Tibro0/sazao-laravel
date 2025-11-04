@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Forget Password
@endsection

@section('content')
    <!--============================BREADCRUMB START==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>forget password</h4>
                        <ul>
                            <li><a href="{{ route('login') }}">login</a></li>
                            <li><a href="javascript:;">forget password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->


    <!--============================FORGET PASSWORD START==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__forget_area">
                        <span class="qiestion_icon"><i class="fal fa-question-circle"></i></span>
                        <h4>forget password ?</h4>
                        <div class="wsus__login">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="wsus__login_input mb-0">
                                    <i class="fal fa-envelope"></i>
                                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                                        placeholder="Your Email" class="@error('email') border border-danger @enderror">
                                </div>
                                @error('email')
                                    <div class="text-danger ms-5 ps-4">{{ $message }}</div>
                                @enderror
                                <button class="common_btn mt-4" type="submit">send</button>
                            </form>
                        </div>
                        <a class="see_btn mt-4" href="{{ route('login') }}">go to login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================FORGET PASSWORD END==============================-->
@endsection
