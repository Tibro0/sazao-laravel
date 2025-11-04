@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Update Variant Item
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
                                    <h4 class="mb-0">Update Variant Item</h4>
                                    <div>
                                        <a href="{{ route('vendor.products-variant-item.index', ['productId' => $variantItem->productVariant->product_id, 'variantId' => $variantItem->product_variant_id]) }}"
                                            class="btn btn-primary px-5">Back</a>
                                    </div>
                                </div>
                                <form action="{{ route('vendor.products-variant-item.update', $variantItem->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label>Variant Name</label>
                                            <input type="text" name="variant_name"
                                                value="{{ $variantItem->productVariant->name }}" class="form-control"
                                                readonly>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Item Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name"
                                                value="{{ $variantItem->name ?? old('name') }}" placeholder="Name"
                                                class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label>Price <span class="text-danger">* (Set 0 for make it free)</span></label>
                                            <input type="text" name="price"
                                                value="{{ $variantItem->price ?? old('price') }}" placeholder="Price"
                                                class="form-control @error('price') is-invalid @enderror">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label>Is Default</label>
                                            <select name="is_default"
                                                class="form-select @error('is_default') is-invalid @enderror">
                                                <option value="">Select a Is Default</option>
                                                <option @selected($variantItem->is_default === 1) value="1">Yes</option>
                                                <option @selected($variantItem->is_default === 0) value="0">No</option>
                                            </select>
                                            @error('is_default')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select a Status</label>
                                            <select name="status"
                                                class="form-select @error('status') is-invalid @enderror">
                                                <option @selected($variantItem->status == 1) value="1">Active
                                                </option>
                                                <option @selected($variantItem->status == 0) value="0">Inactive
                                                </option>
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
