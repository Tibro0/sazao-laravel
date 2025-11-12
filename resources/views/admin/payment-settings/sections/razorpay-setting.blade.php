<div class="tab-pane fade show" id="razorpay-setting" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card-body">
        <form action="{{ route('admin.razorpay-setting.update', 1) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label>RazorPay Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option @selected(@$razorpaySetting->status === 1) value="1">Enable</option>
                        <option @selected(@$razorpaySetting->status === 0) value="0">Disable</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label>Country Name <span class="text-danger">*</span></label>
                    <select name="country_name" class="form-select select2 @error('country_name') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (config('settings.country_list') as $country)
                            <option @selected($country === @$razorpaySetting->country_name) value="{{ $country }}">{{ $country }}
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
                        <option value="">Select</option>
                        @foreach (config('settings.currency_list') as $key => $currency)
                            <option @selected($currency === @$razorpaySetting->currency_name) value="{{ $currency }}">{{ $key }}
                            </option>
                        @endforeach
                    </select>
                    @error('currency_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label>Currency Rate (Per {{ $settings->currency_name }}) <span class="text-danger">*</span></label>
                    <input type="text" name="currency_rate" value="{{ @$razorpaySetting->currency_rate }}"
                        class="form-control @error('currency_rate') is-invalid @enderror">
                    @error('currency_rate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label>Razorpay Key <span class="text-danger">*</span></label>
                    <input type="text" name="razorpay_key" value="{{ @$razorpaySetting->razorpay_key }}"
                        class="form-control @error('razorpay_key') is-invalid @enderror">
                    @error('razorpay_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label>Razorpay Secret Key <span class="text-danger">*</span></label>
                    <input type="text" name="razorpay_secret_key"
                        value="{{ @$razorpaySetting->razorpay_secret_key }}"
                        class="form-control @error('razorpay_secret_key') is-invalid @enderror">
                    @error('razorpay_secret_key')
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
