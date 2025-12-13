<div class="tab-pane fade {{ Session::has('frontend_payment_tab_list_style') && Session::get('frontend_payment_tab_list_style') == 'cod' ? 'show active' : '' }}" id="v-pills-cod" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="row">
        <div class="col-xl-12 m-auto">
            <div class="wsus__payment_area text-center">
                <a href="{{ route('user.cod.payment') }}" class="nav-link common_btn">Cash On Delivery</a>
            </div>
        </div>
    </div>
</div>
