<div class="tab-pane fade {{ Session::has('admin_advertisement_list_style') && Session::get('admin_advertisement_list_style') == 'section_five' ? 'show active' : '' }}"
    id="product-page-banner" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <form action="{{ route('admin.product-page-banner') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-12">
                <label>Status</label><br>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" @checked(@$productpage_banner_section->banner_one->status == 1) name="status" class="form-check-input">
                </div>
            </div>
            <div class="col-md-12">
                <img src="{{ asset(@$productpage_banner_section->banner_one->banner_image) }}" width="100">
            </div>
            <div class="col-md-12">
                <label>Banner Image <span class="text-danger">(width:1240px, height:300px) 2MB Maximum</span></label>
                <input type="file" name="banner_image"
                    class="form-control @error('banner_image') is-invalid @enderror">
                <input type="hidden" name="banner_old_image"
                    value="{{ @$productpage_banner_section->banner_one->banner_image }}" class="form-control">
                @error('banner_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label>Banner Url</label>
                <input type="text" name="banner_url"
                    value="{{ @$productpage_banner_section->banner_one->banner_url }}" placeholder="Banner Url"
                    class="form-control @error('banner_url') is-invalid @enderror">
                @error('banner_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </div>
    </form>
</div>
