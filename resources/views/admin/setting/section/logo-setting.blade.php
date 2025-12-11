<div class="tab-pane fade {{ Session::has('admin_general_setting_list_style') && Session::get('admin_general_setting_list_style') == 'section_three' ? 'show active' : '' }}"
    id="logo-and-favicon" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <form action="{{ route('admin.logo-setting-update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-12">
                <label>Logo Preview</label><br>
                <img src="{{ asset(@$logoSettings->logo) }}" width="150">
            </div>
            <div class="col-md-12">
                <label>Logo <span class="text-danger">(width:249px, height:87px) 2MB Maximum</span></label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                <input type="hidden" name="old_logo" value="{{ @$logoSettings->logo }}" class="form-control">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12">
                <label>Favicon Preview</label><br>
                <img src="{{ asset(@$logoSettings->favicon) }}" width="150">
            </div>
            <div class="col-md-12">
                <label>Favicon <span class="text-danger">(width:112px, height:112px) 2MB Maximum</span></label>
                <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror">
                <input type="hidden" name="old_favicon" value="{{ @$logoSettings->favicon }}" class="form-control">
                @error('favicon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </div>
    </form>
</div>
