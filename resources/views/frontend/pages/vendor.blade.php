@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Vendor Shop
@endsection

@push('css-link')
    <style>
        /* Pagination Css Start */
        .pagination {
            place-content: center;
        }

        .page-item.disabled>.page-link {
            width: 35px;
            height: 35px;
            padding: 0;
            text-align: center;
            line-height: 35px;
            font-size: 13px;
            font-weight: 400;
            transition: all linear 0.3s;
            -webkit-transition: all linear 0.3s;
            -moz-transition: all linear 0.3s;
            -ms-transition: all linear 0.3s;
            -o-transition: all linear 0.3s;
            border-radius: 50%;
            border: 1px solid #08C;
            margin-right: 10px;
        }

        .page-item.active>.page-link {
            width: 35px;
            height: 35px;
            padding: 0;
            text-align: center;
            line-height: 35px;
            font-size: 13px;
            font-weight: 400;
            transition: all linear 0.3s;
            -webkit-transition: all linear 0.3s;
            -moz-transition: all linear 0.3s;
            -ms-transition: all linear 0.3s;
            -o-transition: all linear 0.3s;
            border-radius: 50%;
            border: 1px solid #08C;
            margin-right: 10px;
        }

        .page-item>.page-link {
            width: 35px;
            height: 35px;
            padding: 0;
            text-align: center;
            line-height: 35px;
            font-size: 13px;
            font-weight: 400;
            transition: all linear 0.3s;
            -webkit-transition: all linear 0.3s;
            -moz-transition: all linear 0.3s;
            -ms-transition: all linear 0.3s;
            -o-transition: all linear 0.3s;
            border-radius: 100% !important;
            border: 1px solid #08C;
            margin-right: 10px;
        }

        /* Pagination Css End */
    </style>
@endpush

@section('content')
    <!--============================BREADCRUMB START==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>vendors</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="javascript:;">vendors</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->

    <!--============================VENDORS START==============================-->
    <section id="wsus__product_page" class="wsus__vendors">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="row">
                        @foreach ($vendors as $vendor)
                            <div class="col-xl-6 col-md-6">
                                <div class="wsus__vendor_single">
                                    <img src="{{ asset($vendor->banner) }}" alt="vendor" class="img-fluid w-100">
                                    <div class="wsus__vendor_text">
                                        <div class="wsus__vendor_text_center">
                                            <h4 class="mb-3">{{ $vendor->shop_name }}</h4>
                                            <a href="callto:{{ $vendor->phone }}"><i class="far fa-phone-alt"></i>
                                                {{ $vendor->phone }}</a>
                                            <a href="mailto:{{ $vendor->email }}"><i class="fal fa-envelope"></i>
                                                {{ $vendor->email }}</a>
                                            <a href="{{ route('vendor.products', $vendor->id) }}" class="common_btn">visit
                                                store</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="mt-5">
                        @if ($vendors->hasPages())
                            {{ $vendors->withQueryString()->links() }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--============================VENDORS END==============================-->
@endsection
