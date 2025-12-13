@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Payment Settings
@endsection

@push('css-link')
    {{-- select2 Css Link --}}
    <link href="{{ asset('backend/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Payment Settings</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_payment_setting_list_style') && Session::get('admin_payment_setting_list_style') == 'paypal' ? 'active' : '' }} {{ !Session::has('admin_payment_setting_list_style') ? 'active' : '' }}"
                                    data-id="paypal" id="v-pills-home-tab" data-bs-toggle="pill" href="#paypal-setting"
                                    role="tab" aria-controls="v-pills-home" aria-selected="true">PayPal</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_payment_setting_list_style') && Session::get('admin_payment_setting_list_style') == 'stripe' ? 'active' : '' }}"
                                    data-id="stripe" id="v-pills-home-tab" data-bs-toggle="pill" href="#stripe-setting"
                                    role="tab" aria-controls="v-pills-home" aria-selected="true">Stripe</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_payment_setting_list_style') && Session::get('admin_payment_setting_list_style') == 'razorpay' ? 'active' : '' }}"
                                    data-id="razorpay" id="v-pills-home-tab" data-bs-toggle="pill" href="#razorpay-setting"
                                    role="tab" aria-controls="v-pills-home" aria-selected="true">Razorpay</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_payment_setting_list_style') && Session::get('admin_payment_setting_list_style') == 'cod' ? 'active' : '' }}"
                                    data-id="cod" id="v-pills-home-tab" data-bs-toggle="pill" href="#cod-setting"
                                    role="tab" aria-controls="v-pills-home" aria-selected="true">COD</a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                @include('admin.payment-settings.sections.paypal-setting')
                                @include('admin.payment-settings.sections.stripe-setting')
                                @include('admin.payment-settings.sections.razorpay-setting')
                                @include('admin.payment-settings.sections.cod-setting')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-link')
    {{-- select2 JS Link --}}
    <script src="{{ asset('backend/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
    {{-- List Link Active --}}
    <script>
        $(document).ready(function() {
            $('.list-view').on('click', function() {
                let style = $(this).data('id');

                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.admin-payment-setting-list-style') }}",
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
