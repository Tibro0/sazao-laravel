@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | About
@endsection

@section('content')
    <!--============================ 429 PAGE START ==============================-->
    <section id="wsus__404">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-10 col-lg-8 col-xxl-5 m-auto">
                    <div class="wsus__404_text">
                        <h2>429</h2>
                        <h4><span>Too Many Requests</span> Access Denied</h4>
                        <p>You have sent too many requests in a given amount of time.</p>
                        <a href="{{ route('home') }}" class="common_btn">Go Back Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================ 429 PAGE END ==============================-->
@endsection
