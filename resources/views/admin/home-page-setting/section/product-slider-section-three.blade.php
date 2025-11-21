@php
    $sliderSectionThree = json_decode($sliderSectionThree->value, true);
@endphp
<div class="tab-pane fade {{ Session::has('admin_home_page_setting_list_style') && Session::get('admin_home_page_setting_list_style') == 'section_four' ? 'show active' : '' }}" id="product-slider-section-three" role="tabpanel" aria-labelledby="v-pills-settings-tab">
    <div class="card-body">
        <form action="{{ route('admin.product-slider-section-three') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h5 class="mb-0">Part 1</h5>
                </div>
                <div class="col-md-4">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="cat_one" id="main-category"
                        class="form-select select2 @error('cat_one') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option @selected($category->id == $sliderSectionThree[0]['category']) value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('cat_one')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    @php
                        $subCategories = App\Models\SubCategory::where([
                            'category_id' => $sliderSectionThree[0]['category'],
                        ])->get();
                    @endphp
                    <label>Sub Category</label>
                    <select name="sub_cat_one" id="sub-category"
                        class="form-select select2 @error('sub_cat_one') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($subCategories as $subCategory)
                            <option @selected($subCategory->id == $sliderSectionThree[0]['sub_category']) value="{{ $subCategory->id }}">{{ $subCategory->name }}
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
                            'sub_category_id' => $sliderSectionThree[0]['sub_category'],
                        ])->get();
                    @endphp
                    <label>Child Category</label>
                    <select name="child_cat_one" id="child-category"
                        class="form-select select2 @error('child_cat_one') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($childCategories as $childCategory)
                            <option @selected($childCategory->id == $sliderSectionThree[0]['child_category']) value="{{ $childCategory->id }}">
                                {{ $childCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('child_cat_one')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h5 class="mb-0">Part 2</h5>
                </div>
                <div class="col-md-4">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="cat_two" id="main-category"
                        class="form-select select2 @error('cat_two') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option @selected($category->id == $sliderSectionThree[1]['category']) value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('cat_two')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    @php
                        $subCategories = App\Models\SubCategory::where([
                            'category_id' => $sliderSectionThree[1]['category'],
                        ])->get();
                    @endphp
                    <label>Sub Category</label>
                    <select name="sub_cat_two" id="sub-category"
                        class="form-select select2 @error('sub_cat_two') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($subCategories as $subCategory)
                            <option @selected($subCategory->id == $sliderSectionThree[1]['sub_category']) value="{{ $subCategory->id }}">
                                {{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('sub_cat_two')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    @php
                        $childCategories = App\Models\ChildCategory::where([
                            'sub_category_id' => $sliderSectionThree[1]['sub_category'],
                        ])->get();
                    @endphp
                    <label>Child Category</label>
                    <select name="child_cat_two" id="child-category"
                        class="form-select select2 @error('child_cat_two') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($childCategories as $childCategory)
                            <option @selected($childCategory->id == $sliderSectionThree[1]['child_category']) value="{{ $childCategory->id }}">
                                {{ $childCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('child_cat_two')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary px-5">Save Changes</button>
        </form>
    </div>
</div>
