@php
    $popularCategorySection = json_decode($popularCategorySection->value);
@endphp
<div class="tab-pane fade {{ Session::has('admin_home_page_setting_list_style') && Session::get('admin_home_page_setting_list_style') == 'section_one' ? 'show active' : '' }} {{ !Session::has('admin_home_page_setting_list_style') ? 'show active' : '' }}" id="popular-category-section" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <div class="card-body">
        <form action="{{ route('admin.popular-category-section') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h5 class="mb-0">Category 1</h5>
                </div>
                <div class="col-md-4">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="cat_one" id="main-category"
                        class="form-select select2 @error('cat_one') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option @selected($category->id == $popularCategorySection[0]->category) value="{{ $category->id }}">{{ $category->name }}
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
                            'category_id' => $popularCategorySection[0]->category,
                        ])->get();
                    @endphp
                    <label>Sub Category</label>
                    <select name="sub_cat_one" id="sub-category"
                        class="form-select select2 @error('sub_cat_one') is-invalid @enderror">
                        <option value="">Select a Sub Category</option>
                        @foreach ($subCategories as $subCategory)
                            <option @selected($subCategory->id == $popularCategorySection[0]->sub_category) value="{{ $subCategory->id }}">{{ $subCategory->name }}
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
                            'sub_category_id' => $popularCategorySection[0]->sub_category,
                        ])->get();
                    @endphp
                    <label>Child Category</label>
                    <select name="child_cat_one" id="child-category"
                        class="form-select select2 @error('child_cat_one') is-invalid @enderror">
                        <option value="">Select a Child Category</option>
                        @foreach ($childCategories as $childCategory)
                            <option @selected($childCategory->id == $popularCategorySection[0]->child_category) value="{{ $childCategory->id }}">
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
                    <h5 class="mb-0">Category 2</h5>
                </div>
                <div class="col-md-4">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="cat_two" id="main-category"
                        class="form-select select2 @error('cat_two') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option @selected($category->id == $popularCategorySection[1]->category) value="{{ $category->id }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cat_two')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    @php
                        $subCategories = App\Models\SubCategory::where([
                            'category_id' => $popularCategorySection[1]->category,
                        ])->get();
                    @endphp
                    <label>Sub Category</label>
                    <select name="sub_cat_two" id="sub-category"
                        class="form-select select2 @error('sub_cat_two') is-invalid @enderror">
                        <option value="">Select a Sub Category</option>
                        @foreach ($subCategories as $subCategory)
                            <option @selected($subCategory->id == $popularCategorySection[1]->sub_category) value="{{ $subCategory->id }}">
                                {{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('sub_cat_two')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label>Child Category</label>
                    @php
                        $childCategories = App\Models\ChildCategory::where([
                            'sub_category_id' => $popularCategorySection[1]->sub_category,
                        ])->get();
                    @endphp
                    <select name="child_cat_two" id="child-category"
                        class="form-select select2 @error('child_cat_two') is-invalid @enderror">
                        <option value="">Select a Child Category</option>
                        @foreach ($childCategories as $childCategory)
                            <option @selected($childCategory->id == $popularCategorySection[1]->child_category) value="{{ $childCategory->id }}">
                                {{ $childCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('child_cat_two')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h5 class="mb-0">Category 3</h5>
                </div>
                <div class="col-md-4">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="cat_three" id="main-category"
                        class="form-select select2 @error('cat_three') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option @selected($category->id == $popularCategorySection[2]->category) value="{{ $category->id }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cat_three')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    @php
                        $subCategories = App\Models\SubCategory::where([
                            'category_id' => $popularCategorySection[2]->category,
                        ])->get();
                    @endphp
                    <label>Sub Category</label>
                    <select name="sub_cat_three" id="sub-category"
                        class="form-select select2 @error('sub_cat_three') is-invalid @enderror">
                        <option value="">Select a Sub Category</option>
                        @foreach ($subCategories as $subCategory)
                            <option @selected($subCategory->id == $popularCategorySection[2]->sub_category) value="{{ $subCategory->id }}">
                                {{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('sub_cat_three')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    @php
                        $childCategories = App\Models\ChildCategory::where([
                            'sub_category_id' => $popularCategorySection[2]->sub_category,
                        ])->get();
                    @endphp
                    <label>Child Category</label>
                    <select name="child_cat_three" id="child-category"
                        class="form-select select2 @error('child_cat_three') is-invalid @enderror">
                        <option value="">Select a Child Category</option>
                        @foreach ($childCategories as $childCategory)
                            <option @selected($childCategory->id == $popularCategorySection[2]->child_category) value="{{ $childCategory->id }}">
                                {{ $childCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('child_cat_three')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h5 class="mb-0">Category 4</h5>
                </div>
                <div class="col-md-4">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="cat_four" id="main-category"
                        class="form-select select2 @error('cat_four') is-invalid @enderror">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option @selected($category->id == $popularCategorySection[3]->category) value="{{ $category->id }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cat_four')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    @php
                        $subCategories = App\Models\SubCategory::where([
                            'category_id' => $popularCategorySection[3]->category,
                        ])->get();
                    @endphp
                    <label>Sub Category</label>
                    <select name="sub_cat_four" id="sub-category"
                        class="form-select select2 @error('sub_cat_four') is-invalid @enderror">
                        <option value="">Select a Sub Category</option>
                        @foreach ($subCategories as $subCategory)
                            <option @selected($subCategory->id == $popularCategorySection[3]->sub_category) value="{{ $subCategory->id }}">
                                {{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('sub_cat_four')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    @php
                        $childCategories = App\Models\ChildCategory::where([
                            'sub_category_id' => $popularCategorySection[3]->sub_category,
                        ])->get();
                    @endphp
                    <label>Child Category</label>
                    <select name="child_cat_four" id="child-category"
                        class="form-select select2 @error('child_cat_four') is-invalid @enderror">
                        <option value="">Select a Child Category</option>
                        @foreach ($childCategories as $childCategory)
                            <option @selected($childCategory->id == $popularCategorySection[3]->child_category) value="{{ $childCategory->id }}">
                                {{ $childCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('child_cat_four')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary px-5">Save Changes</button>
        </form>
    </div>
</div>
@push('js-link')
    <script>
        $(document).ready(function() {
            $('body').on('change', '#main-category', function(e) {
                let id = $(this).val();
                let row = $(this).closest('.row');
                // Sub Category and Child Category reset
                row.find('#sub-category').html('<option value="">Select a Sub Category</option>');
                row.find('#child-category').html('<option value="">Select a Child Category</option>');

                if (id) {
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('admin.get-subcategories') }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            let selector = row.find('#sub-category');
                            $.each(data, function(i, item) {
                                selector.append(
                                    `<option value="${item.id}">${item.name}</option>`
                                )
                            })
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    })
                }
            })

            $('body').on('change', '#sub-category', function(e) {
                let id = $(this).val();
                let row = $(this).closest('.row');
                // Child Category Reset
                row.find('#child-category').html('<option value="">Select a Child Category</option>');

                if (id) {
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('admin.product.get-child-categories') }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            let selector = row.find('#child-category');
                            $.each(data, function(i, item) {
                                selector.append(
                                    `<option value="${item.id}">${item.name}</option>`
                                )
                            })
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    })
                }
            })
        })
    </script>
@endpush
