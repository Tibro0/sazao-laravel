@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Update Product
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
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Update Product</h4>
                        <div>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Preview</label><br>
                                <img src="{{ asset($product->thumb_image) }}" width="100">
                            </div>
                            <div class="col-md-12">
                                <label>Image <span class="text-danger">(width:380px, height:317px) 2MB
                                        Maximum</span></label>
                                <input type="file" name="image" placeholder="Image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $product->name ?? old('name') }}"
                                    placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Select a Category <span class="text-danger">*</span></label>
                                <select name="category"
                                    class="form-select main-category select2 @error('category') is-invalid @enderror">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option @selected($category->id == $product->category_id) value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Select a Sub Category</label>
                                <select name="sub_category"
                                    class="form-select sub-category select2 @error('sub_category') is-invalid @enderror">
                                    <option value="">Select a Sub Category</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option @selected($subCategory->id == $product->sub_category_id) value="{{ $subCategory->id }}">
                                            {{ $subCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sub_category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select a Child Category</label>
                                    <select name="child_category"
                                        class="form-select child-category select2 @error('child_category') is-invalid @enderror">
                                        <option value="">Select a Child Category</option>
                                        @foreach ($childCategories as $childCategory)
                                            <option @selected($childCategory->id == $product->child_category_id) value="{{ $childCategory->id }}">
                                                {{ $childCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('child_category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Select a Brand <span class="text-danger">*</span></label>
                                <select name="brand" class="form-select select2 @error('brand') is-invalid @enderror">
                                    <option value="">Select a Brand</option>
                                    @foreach ($brands as $brand)
                                        <option @selected($brand->id == $product->brand_id) value="{{ $brand->id }}">
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>SKU</label>
                                <input type="text" name="sku" value="{{ $product->sku ?? old('sku') }}"
                                    class="form-control @error('sku') is-invalid @enderror">
                                @error('sku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Price <span class="text-danger">*</span></label>
                                <input type="text" name="price" value="{{ $product->price ?? old('price') }}"
                                    class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Offer Price</label>
                                <input type="text" name="offer_price"
                                    value="{{ $product->offer_price ?? old('offer_price') }}"
                                    class="form-control @error('offer_price') is-invalid @enderror">
                                @error('offer_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Offer Start Date</label>
                                <input type="date" name="offer_start_date"
                                    value="{{ $product->offer_start_date ?? old('offer_start_date') }}"
                                    class="form-control @error('offer_start_date') is-invalid @enderror">
                                @error('offer_start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Offer End Date</label>
                                <input type="date" name="offer_end_date"
                                    value="{{ $product->offer_end_date ?? old('offer_end_date') }}"
                                    class="form-control @error('offer_end_date') is-invalid @enderror">
                                @error('offer_end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Stock Quantity <span class="text-danger">*</span></label>
                                <input type="number" min="0" name="qty"
                                    value="{{ $product->qty ?? old('qty') }}"
                                    class="form-control @error('qty') is-invalid @enderror">
                                @error('qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Video Link</label>
                                <input type="text" name="video_link"
                                    value="{{ $product->video_link ?? old('video_link') }}"
                                    class="form-control @error('video_link') is-invalid @enderror">
                                @error('video_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Short Description <span class="text-danger">*</span></label>
                                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror">{!! $product->short_description ?? old('short_description') !!}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Long Description <span class="text-danger">*</span></label>
                                <textarea name="long_description" id="elm1"
                                    class="form-control @error('long_description') is-invalid @enderror">{!! $product->long_description ?? old('long_description') !!}</textarea>
                                @error('long_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Product Type</label>
                                <select name="product_type"
                                    class="form-select @error('product_type') is-invalid @enderror">
                                    <option value="">Select</option>
                                    <option {{ $product->product_type == 'new_arrival' ? 'selected' : '' }}
                                        value="new_arrival">New Arrival</option>
                                    <option {{ $product->product_type == 'featured_product' ? 'selected' : '' }}
                                        value="featured_product">Featured</option>
                                    <option {{ $product->product_type == 'top_product' ? 'selected' : '' }}
                                        value="top_product">Top Product</option>
                                    <option {{ $product->product_type == 'best_product' ? 'selected' : '' }}
                                        value="best_product">Best Product</option>
                                </select>
                                @error('product_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Seo Title</label>
                                <input type="text" name="seo_title"
                                    value="{{ $product->seo_title ?? old('seo_title') }}"
                                    class="form-control @error('seo_title') is-invalid @enderror">
                                @error('seo_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Seo Description</label>
                                <textarea name="seo_description" class="form-control @error('seo_description') is-invalid @enderror">{!! $product->seo_description ?? old('seo_description') !!}</textarea>
                                @error('seo_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Select a Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option @selected($product->status == 1) value="1">Active
                                    </option>
                                    <option @selected($product->status == 0) value="0">Inactive
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
@endsection

@push('js-link')
    {{-- select2 JS Link --}}
    <script src="{{ asset('backend/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
    <!-- Get Sub Categories -->
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                $('.child-category').html('<option value="">Select a Child Category</option>')
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.sub-category').html(
                            '<option value="">Select a Sub Category</option>')
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })

            // get Child Categories
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-child-categories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.child-category').html(
                            '<option value="">Select a Child Category</option>')
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
