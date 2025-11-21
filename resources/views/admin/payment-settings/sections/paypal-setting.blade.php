<div class="tab-pane fade {{ Session::has('admin_payment_setting_list_style') && Session::get('admin_payment_setting_list_style') == 'paypal' ? 'show active' : '' }} {{ !Session::has('admin_payment_setting_list_style') ? 'show active' : '' }}" id="paypal-setting" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card-body">
        <form action="{{ route('admin.paypal-setting.update', 1) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label>Paypal Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option @selected(@$paypalSetting->status === 1) value="1">Enable</option>
                        <option @selected(@$paypalSetting->status === 0) value="0">Disable</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Account Mode</label>
                    <select name="mode" class="form-control @error('mode') is-invalid @enderror">
                        <option @selected(@$paypalSetting->mode === 0) value="0">SandBox</option>
                        <option @selected(@$paypalSetting->mode === 1) value="1">Live</option>
                    </select>
                    @error('mode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Country Name <span class="text-danger">*</span></label>
                    <select name="country_name" class="form-select select2 @error('country_name') is-invalid @enderror">
                        <option value="">Select Country Name</option>
                        @foreach (config('settings.country_list') as $country)
                            <option @selected(@$country === @$paypalSetting->country_name) value="{{ @$country }}">{{ @$country }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Currency Name <span class="text-danger">*</span></label>
                    <select name="currency_name"
                        class="form-select select2 @error('currency_name') is-invalid @enderror">
                        <option value="">Select Currency Name</option>
                        @foreach (config('settings.currency_list') as $key => $currency)
                            <option @selected(@$currency === @$paypalSetting->currency_name) value="{{ $currency }}">{{ $key }}
                            </option>
                        @endforeach
                    </select>
                    @error('currency_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Currency Rate (Per {{ $settings->currency_name }}) <span class="text-danger">*</span></label>
                    <input type="text" name="currency_rate" value="{{ @$paypalSetting->currency_rate }}"
                        class="form-control @error('currency_rate') is-invalid @enderror">
                    @error('currency_rate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Paypal Client ID <span class="text-danger">*</span></label>
                    <input type="text" name="client_id" value="{{ @$paypalSetting->client_id }}"
                        class="form-control @error('client_id') is-invalid @enderror">
                    @error('client_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Paypal Secret Key <span class="text-danger">*</span></label>
                    <input type="text" name="secret_key" value="{{ @$paypalSetting->secret_key }}"
                        class="form-control @error('secret_key') is-invalid @enderror">
                        @error('secret_key')
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
