<div class="tab-pane fade {{ Session::has('admin_advertisement_list_style') && Session::get('admin_advertisement_list_style') == 'section_six' ? 'show active' : '' }}"
    id="cart-page-banner" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <form action="{{ route('admin.cart-page-banner') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-12">
                <h5>Banner One</h5>
            </div>
            <div class="col-md-12">
                <label>Status</label><br>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" @checked(@$cartpage_banner_section->banner_one->status == 1) name="banner_one_status"
                        class="form-check-input">
                </div>
            </div>
            <div class="col-md-12">
                <img src="{{ asset(@$cartpage_banner_section->banner_one->banner_image) }}" width="100">
            </div>
            <div class="col-md-12">
                <label>Banner Image <span class="text-danger">(width:780px, height:273px) 2MB Maximum</span></label>
                <input type="file" name="banner_one_image"
                    class="form-control @error('banner_one_image') is-invalid @enderror">
                <input type="hidden" name="banner_one_old_image"
                    value="{{ @$cartpage_banner_section->banner_one->banner_image }}" class="form-control">
                @error('banner_one_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label>Banner Url</label>
                <input type="text" name="banner_one_url"
                    value="{{ @$cartpage_banner_section->banner_one->banner_url }}" placeholder="Banner Url"
                    class="form-control @error('banner_one_url') is-invalid @enderror">
                @error('banner_one_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <hr>
        <div class="row g-3">
            <div class="col-md-12">
                <h5>Banner Two</h5>
            </div>
            <div class="col-md-12">
                <label>Status</label><br>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" @checked(@$cartpage_banner_section->banner_two->status == 1) name="banner_two_status"
                        class="form-check-input">
                </div>
            </div>
            <div class="col-md-12">
                <img src="{{ asset(@$cartpage_banner_section->banner_two->banner_image) }}" width="100">
            </div>
            <div class="col-md-12">
                <label>Banner Image <label>Banner Image <span class="text-danger">(width:780px, height:273px) 2MB Maximum</span></label></label>
                <input type="file" name="banner_two_image"
                    class="form-control @error('banner_two_image') is-invalid @enderror">
                <input type="hidden" name="banner_two_old_image"
                    value="{{ @$cartpage_banner_section->banner_two->banner_image }}" class="form-control">
                @error('banner_two_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label>Banner Url</label>
                <input type="text" name="banner_two_url"
                    value="{{ @$cartpage_banner_section->banner_two->banner_url }}" placeholder="Banner Url"
                    class="form-control @error('banner_two_url') is-invalid @enderror">
                @error('banner_two_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </div>
    </form>
</div>
