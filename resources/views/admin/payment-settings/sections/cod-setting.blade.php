<div class="tab-pane fade {{ Session::has('admin_payment_setting_list_style') && Session::get('admin_payment_setting_list_style') == 'cod' ? 'show active' : '' }}"
    id="cod-setting" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card-body">
        <form action="{{ route('admin.cod-setting.update', 1) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label>COD Status</label>
                    <select name="status" class="form-control">
                        <option @selected(@$codSetting->status === 1) value="1">Enable</option>
                        <option @selected(@$codSetting->status === 0) value="0">Disable</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
