@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shipping_method);
    $coupon = json_decode($order->coupon);
@endphp
@extends('frontend.dashboard.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Order Details
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content">
                        <div class="d-flex justify-content-between">
                            <h3 class="mb-0"><i class="far fa-user"></i> Order Details</h3>
                            <div>
                                <a href="{{ route('user.orders.index') }}" class="btn btn-primary px-5">Back</a>
                            </div>
                        </div>
                        <div class="wsus__invoice_area">
                            <div class="wsus__invoice_header invoice-print">
                                <div class="wsus__invoice_content">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                            <div class="wsus__invoice_single">
                                                <h5>Billing Information</h5>
                                                <h6>{{ $address->name }}</h6>
                                                <p>{{ $address->email }}</p>
                                                <p>{{ $address->phone }}</p>
                                                <p>{{ $address->address }}</p>
                                                <p>{{ $address->city }}, {{ $address->state }}, {{ $address->zip }}</p>
                                                <p>{{ $address->country }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                            <div class="wsus__invoice_single text-md-center">
                                                <h5>shipping information</h5>
                                                <h6>{{ $address->name }}</h6>
                                                <p>{{ $address->email }}</p>
                                                <p>{{ $address->phone }}</p>
                                                <p>{{ $address->address }}</p>
                                                <p>{{ $address->city }}, {{ $address->state }}, {{ $address->zip }}</p>
                                                <p>{{ $address->country }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <div class="wsus__invoice_single text-md-end">
                                                <h5>Order Id: #{{ $order->invoice_id }}</h5>
                                                <h6>Order Status:
                                                    {{ config('order_status.order_status_admin')[$order->order_status]['status'] }}
                                                </h6>
                                                <p>Payment Method: {{ $order->payment_method }}</p>
                                                <p>Payment Status:
                                                    {{ $order->payment_status === 1 ? 'Complete' : 'UnPaid' }}</p>
                                                <p>Transaction Id: {{ $order->transaction->transaction_id }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wsus__invoice_description">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="name">
                                                        product
                                                    </th>
                                                    <th class="amount">
                                                        Vendor
                                                    </th>

                                                    <th class="amount">
                                                        amount
                                                    </th>

                                                    <th class="quentity">
                                                        quentity
                                                    </th>
                                                    <th class="total">
                                                        total
                                                    </th>
                                                </tr>
                                                @foreach ($order->orderProducts as $product)
                                                    @php
                                                        $variants = json_decode($product->variants);
                                                    @endphp
                                                    <tr>
                                                        <td class="name">
                                                            <p>{{ $product->product_name }}</p>
                                                            @foreach ($variants as $key => $item)
                                                                <span>{{ $key }} :
                                                                    {{ $item->name }}({{ $settings->currency_icon . $item->price }})</span>
                                                            @endforeach
                                                        </td>
                                                        <td class="amount">
                                                            {{ $product->vendor->shop_name }}
                                                        </td>
                                                        <td class="amount">
                                                            {{ $settings->currency_icon . $product->unit_price }}
                                                        </td>

                                                        <td class="quentity">
                                                            {{ $product->qty }}
                                                        </td>
                                                        <td class="total">
                                                            {{ $settings->currency_icon . $product->unit_price * $product->qty + $product->variant_total }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="wsus__invoice_footer">
                                <p><span>Sub Total:</span> {{ $settings->currency_icon . $order->sub_total }} </p>
                                <p><span>Shipping Fee(+):</span> {{ $settings->currency_icon . $shipping->cost }} </p>
                                <p><span>Coupon(-):</span>
                                    @if ($coupon->discount_type === 'percent')
                                        {{ @$coupon->discount ? @$coupon->discount : 0 }}%
                                    @else
                                        {{ $settings->currency_icon }}{{ @$coupon->discount ? @$coupon->discount : 0 }}
                                    @endif
                                </p>
                                <p><span>Total Amount:</span> {{ $settings->currency_icon . $order->amount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="card">
                        <div class="card-body text-end">
                            <button class="btn btn-warning px-5 print_invoice">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-link')
    <script>
        $('.print_invoice').on('click', function() {
            let printBody = $('.invoice-print');
            let originalContents = $('body').html();

            $('body').html(printBody.html());

            window.print();

            $('body').html(originalContents);
        })
    </script>
@endsection
