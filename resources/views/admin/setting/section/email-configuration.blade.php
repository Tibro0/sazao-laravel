<div class="tab-pane fade {{ Session::has('admin_general_setting_list_style') && Session::get('admin_general_setting_list_style') == 'section_two' ? 'show active' : '' }}"
    id="email-configuration" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <form action="{{ route('admin.email-setting-update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-12">
                <label>Email <span class="text-danger">*</span></label>
                <input type="text" name="email" value="{{ @$emailSettings->email ?? old('email') }}"
                    placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label>Mail Host <span class="text-danger">*</span></label>
                <input type="text" name="host" value="{{ @$emailSettings->host ?? old('host') }}"
                    placeholder="Mail Host" class="form-control @error('host') is-invalid @enderror">
                @error('host')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Smtp Username <span class="text-danger">*</span></label>
                <input type="text" name="username" value="{{ @$emailSettings->username ?? old('username') }}"
                    placeholder="Smtp Username" class="form-control @error('username') is-invalid @enderror">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Smtp Password <span class="text-danger">*</span></label>
                <input type="text" name="password" value="{{ @$emailSettings->password ?? old('password') }}"
                    placeholder="Smtp Password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Mail Port <span class="text-danger">*</span></label>
                <input type="text" name="port" value="{{ @$emailSettings->port ?? old('port') }}"
                    placeholder="Mail Port" class="form-control @error('port') is-invalid @enderror">
                @error('port')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Mail Encryption <span class="text-danger">*</span></label>
                <select name="encryption" class="form-select @error('encryption') is-invalid @enderror">
                    <option @selected(@$emailSettings->encryption === 'tls') value="tls">TLS
                    </option>
                    <option @selected(@$emailSettings->encryption === 'ssl') value="ssl">SSL
                    </option>
                </select>
                @error('encryption')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </div>
    </form>
</div>
