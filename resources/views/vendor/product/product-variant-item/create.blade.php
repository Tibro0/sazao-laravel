@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Create Variant Item
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
                                    <h4 class="mb-0">Create Variant Item</h4>
                                    <div>
                                        <a href="{{ route('vendor.products-variant-item.index', ['productId' => $product->id, 'variantId' => $variant->id]) }}"
                                            class="btn btn-primary px-5">Back</a>
                                    </div>
                                </div>
                                <form action="{{ route('vendor.products-variant-item.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Variant Name</label>
                                            <input type="text" name="variant_name" value="{{ $variant->name }}"
                                                class="form-control" readonly>
                                        </div>

                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="variant_id" value="{{ $variant->id }}">

                                        <div class="col-md-12">
                                            <label class="form-label">Item Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label">Price <span class="text-danger">* (Set 0 for make it
                                                    free)</span></label>
                                            <input type="text" name="price" value="{{ old('price') }}"
                                                placeholder="Price"
                                                class="form-control @error('price') is-invalid @enderror">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label">Is Default</label>
                                            <select name="is_default"
                                                class="form-select @error('is_default') is-invalid @enderror">
                                                <option value="">Select a Is Default</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            @error('is_default')
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
