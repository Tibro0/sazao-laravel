<div class="tab-pane fade {{ Session::has('admin_general_setting_list_style') && Session::get('admin_general_setting_list_style') == 'section_one' ? 'show active' : '' }} {{ !Session::has('admin_general_setting_list_style') ? 'show active' : '' }}"
    id="general-setting" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card-body">
        <form action="{{ route('admin.general-setting-update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label>Site Name <span class="text-danger">*</span></label>
                    <input type="text" name="site_name" value="{{ @$generalSettings->site_name }}"
                        class="form-control @error('site_name') is-invalid @enderror">
                    @error('site_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Layout</label>
                    <select name="layout" class="form-select @error('layout') is-invalid @enderror">
                        <option @selected(@$generalSettings->layout == 'LTR') value="LTR">LTR
                        </option>
                        <option @selected(@$generalSettings->layout == 'RTL') value="RTL">RTL
                        </option>
                    </select>
                    @error('layout')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Contact Email <span class="text-danger">*</span></label>
                    <input type="text" name="contact_email" value="{{ @$generalSettings->contact_email }}"
                        class="form-control @error('contact_email') is-invalid @enderror">
                    @error('contact_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label>Contact Phone</label>
                    <input type="text" name="contact_phone" value="{{ @$generalSettings->contact_phone }}"
                        class="form-control @error('contact_phone') is-invalid @enderror">
                    @error('contact_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Contact Address</label>
                    <input type="text" name="contact_address" value="{{ @$generalSettings->contact_address }}"
                        class="form-control @error('contact_address') is-invalid @enderror">
                    @error('contact_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Google Map Url</label>
                    <input type="text" name="map" value="{{ @$generalSettings->map }}"
                        class="form-control @error('map') is-invalid @enderror">
                    @error('map')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label>Default Currency Name <span class="text-danger">*</span></label>
                    <select name="currency_name"
                        class="form-select select2 @error('currency_name') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('settings.currency_list') as $currency)
                            <option {{ @$generalSettings->currency_name == $currency ? 'selected' : '' }}
                                value="{{ $currency }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                    @error('currency_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Currency Icon <span class="text-danger">*</span></label>
                    <input type="text" name="currency_icon" value="{{ @$generalSettings->currency_icon }}"
                        class="form-control @error('currency_icon') is-invalid @enderror">
                    @error('currency_icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>TimeZone <span class="text-danger">*</span></label>
                    <select name="time_zone" class="form-select select2 @error('time_zone') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('settings.time_zone') as $key => $timeZone)
                            <option {{ @$generalSettings->time_zone == $key ? 'selected' : '' }}
                                value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>
                    @error('time_zone')
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
