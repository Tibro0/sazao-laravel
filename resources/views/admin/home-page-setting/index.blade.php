@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Home Page Settings
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
                    <h4>Home Page Settings</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_home_page_setting_list_style') && Session::get('admin_home_page_setting_list_style') == 'section_one' ? 'active' : '' }} {{ !Session::has('admin_home_page_setting_list_style') ? 'active' : '' }}"
                                    data-id="section_one" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    href="#popular-category-section" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">Popular Category Section</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_home_page_setting_list_style') && Session::get('admin_home_page_setting_list_style') == 'section_two' ? 'active' : '' }}"
                                    data-id="section_two" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    href="#product-slider-section-one" role="tab" aria-controls="v-pills-messages"
                                    aria-selected="false">Product Slider Section One</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_home_page_setting_list_style') && Session::get('admin_home_page_setting_list_style') == 'section_three' ? 'active' : '' }}"
                                    data-id="section_three" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    href="#product-slider-section-two" role="tab" aria-controls="v-pills-settings"
                                    aria-selected="false">Product Slider Section Two</a>
                                <a class="nav-link mb-2 list-view {{ Session::has('admin_home_page_setting_list_style') && Session::get('admin_home_page_setting_list_style') == 'section_four' ? 'active' : '' }}"
                                    data-id="section_four" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    href="#product-slider-section-three" role="tab" aria-controls="v-pills-settings"
                                    aria-selected="false">Product Slider Section Three</a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                @include('admin.home-page-setting.section.popular-category-section')
                                @include('admin.home-page-setting.section.product-slider-section-one')
                                @include('admin.home-page-setting.section.product-slider-section-two')
                                @include('admin.home-page-setting.section.product-slider-section-three')
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
                    url: "{{ route('admin.admin-home-page-setting-list-style') }}",
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
