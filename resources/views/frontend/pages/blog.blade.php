@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Blogs
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
                        <h4>All blogs</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">blogs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->


    <!--============================BLOGS PAGE START==============================-->
    <section id="wsus__blogs">
        <div class="container">
            @if (request()->has('search'))
                <h5>Search: {{ request()->search }}</h5>
                <hr>
            @elseif (request()->has('category'))
                <h5>Search: {{ request()->category }}</h5>
                <hr>
            @endif
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-sm-6 col-lg-4 col-xxl-3">
                        <div class="wsus__single_blog wsus__single_blog_2">
                            <a class="wsus__blog_img" href="{{ route('blog-details', $blog->slug) }}">
                                <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                            </a>
                            <div class="wsus__blog_text">
                                <a class="blog_top red" href="{{ route('blog', ['category' => $blog->category->slug]) }}">{{ $blog->category->name }}</a>
                                <div class="wsus__blog_text_center">
                                    <a href="{{ route('blog-details', $blog->slug) }}">{{ limitText($blog->title, 20) }}</a>
                                    <p class="date">{{ date('M D Y', strtotime($blog->created_at)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (count($blogs) === 0)
                <div class="row">
                    <div class="alert alert-primary text-center">
                        Sorry No Blog Found!
                    </div>
                </div>
            @endif

            <div id="pagination">
                <div class="mt-5">
                    @if ($blogs->hasPages())
                        {{ $blogs->withQueryString()->links() }}
                    @endif
                </div>
            </div>

        </div>
    </section>
    <!--============================BLOGS PAGE END==============================-->
@endsection
