@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Advertisement
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
                    <h4>Advertisement</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_advertisement_list_style') && Session::get('admin_advertisement_list_style') == 'section_one' ? 'active' : '' }} {{ !Session::has('admin_advertisement_list_style') ? 'active' : '' }}"
                                    data-id="section_one" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#home-page-banner-section-one" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">HomePage Banner Section One</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_advertisement_list_style') && Session::get('admin_advertisement_list_style') == 'section_two' ? 'active' : '' }}"
                                    data-id="section_two" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#home-page-banner-section-two" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">HomePage Banner Section Two</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_advertisement_list_style') && Session::get('admin_advertisement_list_style') == 'section_three' ? 'active' : '' }}"
                                    data-id="section_three" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#home-page-banner-section-three" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">HomePage Banner Section Three</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_advertisement_list_style') && Session::get('admin_advertisement_list_style') == 'section_four' ? 'active' : '' }}"
                                    data-id="section_four" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#home-page-banner-section-four" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">HomePage Banner Section Three</a>

                                <a class="nav-link mb-2 list-view {{ Session::has('admin_advertisement_list_style') && Session::get('admin_advertisement_list_style') == 'section_five' ? 'active' : '' }}"
                                    data-id="section_five" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#product-page-banner" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">Product Page Banner</a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                @include('admin.advertisement.section.homepage-banner-one')
                                @include('admin.advertisement.section.homepage-banner-two')
                                @include('admin.advertisement.section.homepage-banner-three')
                                @include('admin.advertisement.section.homepage-banner-four')
                                @include('admin.advertisement.section.product-page-banner')
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
                    url: "{{ route('admin.admin-advertisement-list-style') }}",
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
