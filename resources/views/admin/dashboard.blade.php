@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="mb-sm-0 text-capitalize">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.order.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Todays Orders</p>
                                <h4 class="mb-2">{{ $todaysOrder }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-shopping-cart-2-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.pending-orders') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Todays Pending Orders</p>
                                <h4 class="mb-2">{{ $todaysPendingOrder }}</h4>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="fas fa-shopping-basket font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.order.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Orders</p>
                                <h4 class="mb-2">{{ $totalOrders }}</h4>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.pending-orders') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Pending Orders</p>
                                <h4 class="mb-2">{{ $totalPendingOrders }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.canceled-orders') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Canceled Orders</p>
                                <h4 class="mb-2">{{ $totalCanceledOrders }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.delivered-orders') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Complete Orders</p>
                                <h4 class="mb-2">{{ $totalCompleteOrders }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="javascript:;">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Todays Earnings</p>
                                <h4 class="mb-2">{{ $settings->currency_icon . $todaysEarnings }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="javascript:;">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">This Month Earnings</p>
                                <h4 class="mb-2">{{ $settings->currency_icon . $monthEarnings }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="javascript:;">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">This Years Earnings</p>
                                <h4 class="mb-2">{{ $settings->currency_icon . $yearEarnings }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.review.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Reviews</p>
                                <h4 class="mb-2">{{ $totalReview }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.brand.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Brands</p>
                                <h4 class="mb-2">{{ $totalBrands }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.category.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Categories</p>
                                <h4 class="mb-2">{{ $totalCategories }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.blog.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Blogs</p>
                                <h4 class="mb-2">{{ $totalBlogs }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.subscribers.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Subscribers</p>
                                <h4 class="mb-2">{{ $totalSubscribers }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.vendor-list.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Vendors</p>
                                <h4 class="mb-2">{{ $totalVendors }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.customer.index') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2 text-secondary">Total Users</p>
                                <h4 class="mb-2">{{ $totalUsers }}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </a>
        </div><!-- end col -->
    </div>
@endsection
