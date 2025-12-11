@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Blog Details
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
                        <h4>blog dtails</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="javascript:;">{{ $blog->title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->


    <!--============================BLOGS DETAILS START==============================-->
    <section id="wsus__blog_details">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="wsus__main_blog">
                        <div class="wsus__main_blog_img">
                            <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                        </div>
                        <p class="wsus__main_blog_header">
                            <span><i class="fas fa-user-tie"></i> by {{ $blog->user->name }}</span>
                            <span><i class="fal fa-calendar-alt"></i>
                                {{ date('M d Y', strtotime($blog->created_at)) }}</span>
                            {{-- <span><i class="fal fa-comment-alt-smile"></i> 0 Comment</span> --}}
                            {{-- <span><i class="far fa-eye"></i> 11 Views</span> --}}
                        </p>
                        <div class="wsus__description_area">
                            <h1>{{ $blog->title }}</h1>
                            {!! $blog->description !!}
                        </div>
                        <div class="wsus__share_blog">
                            <p>share:</p>
                            <ul>
                                <li><a target="_blank" class="facebook"
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i
                                            class="fab fa-facebook-f"></i></a></li>

                                <li><a target="_blank" class="twitter"
                                        href="https://twitter.com/share?url={{ url()->current() }}&text={{ $blog->title }}"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a target="_blank" class="linkedin"
                                        href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}&title={{ $blog->title }}&summary={{ limitText($blog->description, 50) }}"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        @if (count($recentBlogs) != 0)
                            <div class="wsus__related_post">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <h5>Recent post</h5>
                                    </div>
                                </div>
                                <div class="row blog_det_slider">
                                    @foreach ($recentBlogs as $recentBlog)
                                        <div class="col-xl-3">
                                            <div class="wsus__single_blog wsus__single_blog_2">
                                                <a class="wsus__blog_img"
                                                    href="{{ route('blog-details', $recentBlog->slug) }}">
                                                    <img src="{{ asset($recentBlog->image) }}" alt="blog"
                                                        class="img-fluid w-100">
                                                </a>
                                                <div class="wsus__blog_text">
                                                    <a class="blog_top red"
                                                        href="{{ route('blog', ['category' => $recentBlog->category->slug]) }}">{{ $recentBlog->category->name }}</a>
                                                    <div class="wsus__blog_text_center">
                                                        <a
                                                            href="{{ route('blog-details', $recentBlog->slug) }}">{{ limitText($recentBlog->title, 24) }}</a>
                                                        <p class="date">
                                                            {{ date('M D Y', strtotime($recentBlog->created_at)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="wsus__comment_area">
                            <h4>comment <span>{{ count($comments) }}</span></h4>
                            @foreach ($comments as $comment)
                                <div class="wsus__main_comment">
                                    <div class="wsus__comment_img">
                                        <img src="{{ asset($comment->user->image) }}" alt="user"
                                            class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__comment_text replay">
                                        <h6>{{ $comment->user->name }}
                                            <span>{{ date('d M Y', strtotime($comment->created_at)) }}</span>
                                        </h6>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @if (count($comments) === 0)
                                <h4 class="text-center alert alert-primary mt-3">Be a First one to Comment.</h4>
                            @endif

                            <div id="pagination">
                                <div class="mt-5">
                                    @if ($comments->hasPages())
                                        {{ $comments->withQueryString()->links() }}
                                    @endif
                                </div>
                            </div>

                        </div>
                        @if (Auth::check())
                            <div class="wsus__post_comment">
                                <h4>post a comment</h4>
                                <form id="comment-form">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="wsus__single_com mb-3">
                                                <textarea rows="5" name="comment" placeholder="Your Comment" class="mb-0"></textarea>
                                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                <div class="text-danger comment"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="common_btn" id="form-submit" type="submit">post comment</button>
                                </form>
                            </div>
                        @else
                            <h4 class="text-center alert alert-primary mt-3">Please Login to Comment on Post!</h4>
                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="common_btn">Login</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="wsus__blog_sidebar" id="sticky_sidebar">
                        <div class="wsus__blog_search">
                            <h4>search</h4>
                            <form action="{{ route('blog') }}" method="GET">
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit" class="common_btn"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="wsus__blog_category">
                            <h4>Categories</h4>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('blog', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="wsus__blog_post">
                            <h4>More Post</h4>
                            @foreach ($moreBlogs as $blog)
                                <div class="wsus__blog_post_single">
                                    <a href="{{ route('blog-details', $blog->slug) }}" class="wsus__blog_post_img">
                                        <img src="{{ asset($blog->image) }}" alt="blog" class="imgofluid w-100">
                                    </a>
                                    <div class="wsus__blog_post_text">
                                        <a href="{{ route('blog-details', $blog->slug) }}"
                                            class="mb-0">{{ limitText($blog->title, 15) }}</a>
                                        <p> <span>{{ date('M d Y', strtotime($blog->created_at)) }} </span>
                                            {{ count($blog->comments) }} Comment </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BLOGS DETAILS END==============================-->
@endsection

@push('js-link')
    <script>
        $(document).ready(function() {
            $('#comment-form').on('submit', function(e) {
                e.preventDefault();
                let data = $(this).serialize();

                // Clear previous errors
                $('.text-danger').text('');
                $('textarea').removeClass('border border-danger');

                $.ajax({
                    method: "POST",
                    url: "{{ route('user.blog-comment') }}",
                    data: data,
                    beforeSend: function() {
                        $('#form-submit').text('sending...');
                        $('#form-submit').attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            toastr.success(data.message);
                            $('#comment-form')[0].reset();
                            $('#form-submit').text('Post Comment');
                            $('#form-submit').attr('disabled', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Check if errors exist
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            // Message error
                            if (errors.comment && errors.comment[0]) {
                                $("textarea[name='comment']").addClass('border border-danger');
                                $('.comment').text(errors.comment[0]);
                            }
                        }
                        // Unknown error
                        else {
                            toastr.error('Something Went Wrong. Please Try Again Later.');
                        }
                        $('#form-submit').text('Post Comment');
                        $('#form-submit').attr('disabled', false);
                    },
                    complete: function() {
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    }
                });
            })
        });
    </script>
@endpush
