@extends('vendor.layouts.master')

@section('page-title')
    Sazao | Create Variant
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="mb-0">Create Variants</h4>
                                    <div>
                                        <a href="{{ route('vendor.products-variant.index', ['product' => request()->product]) }}"
                                            class="btn btn-primary px-5 rounded">Back</a>
                                    </div>
                                </div>

                                <form action="{{ route('vendor.products-variant.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                            <input type="hidden" name="product" value="{{ request()->product }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label">Select a Status</label>
                                            <select name="status"
                                                class="form-select @error('status') is-invalid @enderror">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
