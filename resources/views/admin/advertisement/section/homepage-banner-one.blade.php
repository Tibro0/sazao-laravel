<div class="tab-pane fade {{ Session::has('admin_advertisement_list_style') && Session::get('admin_advertisement_list_style') == 'section_one' ? 'show active' : '' }} {{ !Session::has('admin_advertisement_list_style') ? 'show active' : '' }}"
    id="home-page-banner-section-one" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <div class="card-body">
        <form action="{{ route('admin.homepage-banner-section-one') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label>Status</label><br>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" @checked(@$homepage_section_banner_one->banner_one->status == 1) name="status" class="form-check-input">
                    </div>
                </div>
                <div class="col-md-12">
                    <img src="{{ asset(@$homepage_section_banner_one->banner_one->banner_image) }}" width="100">
                </div>
                <div class="col-md-12">
                    <label>Banner Image <span class="text-danger">(width:1900px, height:500px) 2MB Maximum</span></label>
                    <input type="file" name="banner_image"
                        class="form-control @error('banner_image') is-invalid @enderror">
                    @error('banner_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input type="hidden" name="banner_old_image"
                        value="{{ @$homepage_section_banner_one->banner_one->banner_image }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label>Banner Url</label>
                    <input type="text" name="banner_url"
                        value="{{ @$homepage_section_banner_one->banner_one->banner_url }}" placeholder="Banner Url"
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
</div>
