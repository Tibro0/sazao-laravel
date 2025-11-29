@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shipping_method);
    $coupon = json_decode($order->coupon);
@endphp
@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Order Details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Invoice</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light px-5 me-2"
                            data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Change Status</button>
                        <a href="{{ route('admin.order.index') }}" class="btn btn-primary px-5">Back</a>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-16"><strong>Order #{{ $order->invoice_id }}</strong></h4>
                                <h3>
                                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo"
                                        height="24">
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <address>
                                        <strong>Billed To:</strong><br>
                                        <b>Name:</b> {{ $address->name }}<br>
                                        <b>Email:</b> {{ $address->email }}<br>
                                        <b>Phone:</b> {{ $address->phone }}<br>
                                        <b>Address:</b> {{ $address->address }}<br>
                                        {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}<br>
                                        {{ $address->country }}
                                    </address>
                                </div>
                                <div class="col-6 text-end">
                                    <address>
                                        <strong>Billed To:</strong><br>
                                        {{ $address->name }}<b> :Name</b><br>
                                        {{ $address->email }}<b> :Email</b><br>
                                        {{ $address->phone }}<b> :Phone</b><br>
                                        {{ $address->address }}<b> :Address</b><br>
                                        {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}<br>
                                        {{ $address->country }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-4">
                                    <address>
                                        <strong>Payment Information:</strong><br>
                                        <b>Method: </b>{{ Str::ucfirst($order->payment_method) }}<br>
                                        <b>Transaction ID: {{ $order->transaction->transaction_id }}</b><br>
                                        <b>Status:</b> {{ $order->payment_status === 1 ? 'Complete' : 'UnPaid' }}
                                    </address>
                                </div>
                                <div class="col-6 mt-4 text-end">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ date('j F, Y', strtotime($order->created_at)) }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <div class="p-2">
                                    <h3 class="font-size-16"><strong>Order summary</strong></h3>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td><strong>#</strong></td>
                                                    <td><strong>Item</strong></td>
                                                    <td><strong>Variant</strong></td>
                                                    <td><strong>Vendor Name</strong></td>
                                                    <td><strong>Price</strong></td>
                                                    <td><strong>Quantity</strong>
                                                    </td>
                                                    <td class="text-end"><strong>Total</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderProducts as $product)
                                                    @php
                                                        $variants = json_decode($product->variants);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        @if (isset($product->product->slug))
                                                            <td><a target="_blank"
                                                                    href="{{ route('product-detail', $product->product->slug) }}">{{ $product->product_name }}</a>
                                                            </td>
                                                        @else
                                                            <td>{{ $product->product_name }}</td>
                                                        @endif
                                                        <td>
                                                            @foreach ($variants as $key => $variant)
                                                                <b>{{ $key }}:
                                                                </b>{{ $variant->name }}({{ $settings->currency_icon }}{{ $variant->price }})<br>
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $product->vendor->shop_name }}</td>
                                                        <td>{{ $settings->currency_icon }}{{ $product->unit_price }}</td>
                                                        <td>{{ $product->qty }}</td>
                                                        <td class="text-end">
                                                            {{ $settings->currency_icon }}{{ $product->unit_price * $product->qty + $product->variant_total }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-start">
                                                        <strong>Subtotal</strong>
                                                    </td>
                                                    <td class="thick-line text-end">
                                                        {{ $settings->currency_icon }}{{ $order->sub_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-start">
                                                        <strong>Shipping(+)</strong>
                                                    </td>
                                                    <td class="thick-line text-end">
                                                        {{ $settings->currency_icon }}{{ $shipping->cost }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-start">
                                                        <strong>Coupon(-)</strong>
                                                    </td>
                                                    <td class="thick-line text-end">
                                                        @if (@$coupon->discount_type === 'percent')
                                                            {{ @$coupon->discount ? @$coupon->discount : 0 }}%
                                                        @else
                                                            {{ $settings->currency_icon }}{{ @$coupon->discount ? @$coupon->discount : 0 }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-start">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="thick-line text-end">
                                                        {{ $settings->currency_icon }}{{ $order->amount }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-print-none">
                                        <div class="float-end">
                                            <a href="javascript:window.print()"
                                                class="btn btn-success waves-effect waves-light"><i
                                                    class="fa fa-print"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('modal')
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label>Payment Status</label>
                            <select name="payment_status" data-id="{{ $order->id }}" id="payment_status"
                                class="form-select">
                                <option @selected($order->payment_status === 0) value="0">Pending
                                </option>
                                <option @selected($order->payment_status === 1) value="1">Completed
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Order Status</label>
                            <select name="order_status" data-id="{{ $order->id }}" id="order_status"
                                class="form-select">
                                @foreach (config('order_status.order_status_admin') as $key => $orderStatus)
                                    <option @selected($order->order_status === $key) value="{{ $key }}">
                                        {{ $orderStatus['status'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('js-link')
    <script>
        $(document).ready(function() {
            // payment status change
            $('#payment_status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.payment.status') }}",
                    data: {
                        status: status,
                        id: id
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            toastr.success(data.message)
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            })
            // order status change
            $('#order_status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.order.status') }}",
                    data: {
                        status: status,
                        id: id
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            toastr.success(data.message)
                        }
                    },
                    error: function(data) {

                    }
                });
            })
        });
    </script>
@endpush
