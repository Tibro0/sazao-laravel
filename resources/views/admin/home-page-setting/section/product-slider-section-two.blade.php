@php
    $sliderSectionTwo = json_decode($sliderSectionTwo->value);
@endphp
<div class="tab-pane fade" id="product-slider-section-two" role="tabpanel" aria-labelledby="v-pills-settings-tab">
    <div class="card-body">
        <form action="{{ route('admin.product-slider-section-two') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="cat_one" id="main-category"
                        class="form-select select2 @error('cat_one') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option @selected($category->id == $sliderSectionTwo->category) value="{{ $category->id }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cat_one')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    @php
                        $subCategories = App\Models\SubCategory::where([
                            'category_id' => $sliderSectionTwo->category,
                        ])->get();
                    @endphp
                    <label>Sub Category</label>
                    <select name="sub_cat_one" id="sub-category"
                        class="form-select select2 @error('sub_cat_one') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($subCategories as $subCategory)
                            <option @selected($subCategory->id == $sliderSectionTwo->sub_category) value="{{ $subCategory->id }}">{{ $subCategory->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('sub_cat_one')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    @php
                        $childCategories = App\Models\ChildCategory::where([
                            'sub_category_id' => $sliderSectionTwo->sub_category,
                        ])->get();
                    @endphp
                    <label>Child Category</label>
                    <select name="child_cat_one" id="child-category"
                        class="form-select select2 @error('child_cat_one') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($childCategories as $childCategory)
                            <option @selected($childCategory->id == $sliderSectionTwo->child_category) value="{{ $childCategory->id }}">
                                {{ $childCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('child_cat_one')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary px-5">Save Changes</button>
        </form>
    </div>

</div>
