@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Cart Details
@endsection

@push('css-link')
    <!-- Sweet Alert-->
    <link href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!--============================BREADCRUMB START==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">cart view</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->


    <!--============================CART VIEW PAGE START==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name" style="width: 285px;">
                                            product details
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Unit Price
                                        </th>
                                        <th class="wsus__pro_tk">
                                            Total
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="javascript:;" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                    @foreach ($cartItems as $item)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img src="{{ asset($item->options->image) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </td>

                                            <td class="wsus__pro_name" style="width: 285px;">
                                                <p>{!! $item->name !!}</p>
                                                @foreach ($item->options->variants as $key => $variant)
                                                    <span>{{ $key }} : {{ $variant['name'] }}
                                                        ({{ $settings->currency_icon . $variant['price'] }})
                                                    </span>
                                                @endforeach

                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6>{{ $settings->currency_icon . $item->price }}</h6>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6 id="{{ $item->rowId }}">
                                                    {{ $settings->currency_icon . ($item->price + $item->options->variants_total) * $item->qty }}
                                                </h6>
                                            </td>

                                            <td class="wsus__pro_select">
                                                <div class="d-flex" style="width: 140px">
                                                    <button class="btn btn-danger me-1 product-decrement">-</button>
                                                    <input class="form-control product-qty"
                                                        data-rowid="{{ $item->rowId }}" type="number" min="1"
                                                        max="100" value="{{ $item->qty }}" readonly />
                                                    <button class="btn btn-success ms-1 product-increment">+</button>
                                                </div>
                                            </td>
                                            <td class="wsus__pro_icon">
                                                <a href="{{ route('cart.remove-product', $item->rowId) }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($cartItems) === 0)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_icon w-100" rowspan="2">
                                                <div class="alert alert-primary w-100 text-center mb-0" role="alert">Cart
                                                    Is Empty!</div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="sub_total">{{ $settings->currency_icon }}{{ getCartTotal() }}</span></p>
                        <p>Coupon(-): <span id="discount">{{ $settings->currency_icon }}{{ getCartDiscount() }}</span>
                        </p>
                        <p class="total"><span>total:</span> <span
                                id="cart_total">{{ $settings->currency_icon }}{{ getMainCartTotal() }}</span></p>

                        <form id="coupon_form">
                            <input type="text" name="coupon_code"
                                value="{{ session()->has('coupon') ? session()->get('coupon')['coupon_code'] : '' }}"
                                placeholder="Coupon Code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <div class="text-danger" id="coupon_form_error_message_show"></div>
                        <a class="common_btn mt-4 w-100 text-center" href="{{ route('user.checkout') }}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="product_grid_view.html"><i
                                class="fab fa-shopify"></i> Keep Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    @if ($cartpage_banner_section->banner_one->status == 1)
                        <div class="wsus__single_banner_content">
                            <div class="wsus__single_banner_img">
                                <img src="{{ asset($cartpage_banner_section->banner_one->banner_image) }}" alt="banner"
                                    class="img-fluid w-100">
                            </div>
                            <div class="wsus__single_banner_text">
                                <h6>sell on <span>35% off</span></h6>
                                <h3>smart watch</h3>
                                <a class="shop_btn"
                                    href="{{ asset($cartpage_banner_section->banner_one->banner_url) }}">shop now</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-xl-6 col-lg-6">
                    @if ($cartpage_banner_section->banner_two->status == 1)
                        <div class="wsus__single_banner_content single_banner_2">
                            <div class="wsus__single_banner_img">
                                <img src="{{ asset($cartpage_banner_section->banner_two->banner_image) }}" alt="banner"
                                    class="img-fluid w-100">
                            </div>
                            <div class="wsus__single_banner_text">
                                <h6>New Collection</h6>
                                <h3>Cosmetics</h3>
                                <a class="shop_btn"
                                    href="{{ asset($cartpage_banner_section->banner_two->banner_url) }}">shop now</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================CART VIEW PAGE END==============================-->
@endsection

@push('js-link')
    <!-- Sweet Alerts js -->
    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // increment product quantity
            $('.product-increment').on('click', function() {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                let rowId = input.data('rowid');
                input.val(quantity);

                $.ajax({
                    url: "{{ route('cart.update-quantity') }}",
                    method: "POST",
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            let productId = '#' + rowId;
                            let totalAmount = "{{ $settings->currency_icon }}" + data
                                .product_total
                            $(productId).text(totalAmount);
                            renderCartSubTotal();
                            calculateCouponDiscount();
                            toastr.success(data.message);
                        } else if (data.status === 'error') {
                            toastr.error(data.message);
                        }
                    },
                    error: function(data) {

                    }
                });
            })

            // decrement product quantity
            $('.product-decrement').on('click', function() {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                let rowId = input.data('rowid');

                if (quantity < 1) {
                    quantity = 1;
                }

                input.val(quantity);

                $.ajax({
                    url: "{{ route('cart.update-quantity') }}",
                    method: "POST",
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            let productId = '#' + rowId;
                            let totalAmount = "{{ $settings->currency_icon }}" + data
                                .product_total
                            $(productId).text(totalAmount);
                            renderCartSubTotal();
                            calculateCouponDiscount();
                            toastr.success(data.message);
                        } else if (data.status === 'error') {
                            toastr.error(data.message);
                        }
                    },
                    error: function(data) {

                    }
                });
            })

            // Clear Cart
            $('.clear_cart').on('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This Action Will Clear Your Cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'GET',
                            url: "{{ route('clear.cart') }}",
                            success: function(data) {
                                if (data.status === 'success') {
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })
                    }
                })
            })

            // get subtotal of card and put it on DOM
            function renderCartSubTotal() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('cart.sidebar-product-total') }}",
                    success: function(data) {
                        $('#sub_total').text("{{ $settings->currency_icon }}" + data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            // Apply Coupon Coupon
            $('#coupon_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: "GET",
                    url: "{{ route('apply-coupon') }}",
                    data: formData,
                    success: function(data) {
                        if (data.status === 'error') {
                            // toastr.error(data.message);
                            $('#coupon_form_error_message_show').text(data.message);
                            $("input[name='coupon_code']").addClass('border-danger');
                        } else if (data.status === 'success') {
                            calculateCouponDiscount();
                            toastr.success(data.message);
                        }
                    },
                    error: function(data) {

                    }
                });
            })
            // calculate Discount Amount
            function calculateCouponDiscount() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('coupon-calculation') }}",
                    success: function(data) {
                        if (data.status === 'success') {
                            $('#discount').text('{{ $settings->currency_icon }}' + data.discount);
                            $('#cart_total').text('{{ $settings->currency_icon }}' + data.cart_total);
                        }
                    },
                    error: function(data) {

                    }
                });
            }
        });
    </script>
@endpush
