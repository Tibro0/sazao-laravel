<div class="tab-pane fade {{ Session::has('admin_general_setting_list_style') && Session::get('admin_general_setting_list_style') == 'section_four' ? 'show active' : '' }}"
    id="google-setting" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <form action="{{ route('admin.google-setting-update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-12">
                <label>Google Client ID <span class="text-danger">*</span></label>
                <input type="text" name="google_client_id" value="{{ $googleSettings->google_client_id }}"
                    class="form-control @error('google_client_id') is-invalid @enderror">
                @error('google_client_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label>Google Client Secret <span class="text-danger">*</span></label>
                <input type="text" name="google_client_secret" value="{{ $googleSettings->google_client_secret }}"
                    class="form-control @error('google_client_secret') is-invalid @enderror">
                @error('google_client_secret')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label>Google Redirect URL <span class="text-danger">*</span></label>
                <input type="text" name="google_redirect_url" value="{{ $googleSettings->google_redirect_url }}"
                    class="form-control @error('google_redirect_url') is-invalid @enderror">
                @error('google_redirect_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </div>
    </form>
</div>
