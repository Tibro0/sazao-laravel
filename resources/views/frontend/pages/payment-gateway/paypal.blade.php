<div class="tab-pane fade {{ Session::has('frontend_payment_tab_list_style') && Session::get('frontend_payment_tab_list_style') == 'paypal' ? 'show active' : '' }} {{ !Session::has('frontend_payment_tab_list_style') ? 'show active' : '' }}" id="v-pills-paypal" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="row">
        <div class="col-xl-12 m-auto">
            <div class="wsus__payment_area">
                <a href="{{ route('user.paypal.payment') }}" class="nav-link common_btn text-center">Pay With PayPal</a>
            </div>
        </div>
    </div>
</div>
