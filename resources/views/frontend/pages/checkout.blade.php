@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | CheckOut
@endsection

@section('content')
    <!--============================BREADCRUMB START==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="javascript:;">check out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END ==============================-->


    <!--============================CHECK OUT PAGE START==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <form class="wsus__checkout_form">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <h5>Billing Details <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                    new address</a></h5>
                            <div class="row">
                                @foreach ($addresses as $address)
                                    <div class="col-xl-6">
                                        <div class="wsus__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Select Address
                                                </label>
                                            </div>
                                            <ul>
                                                <li><span>Name :</span> {{$address->name}}</li>
                                                <li><span>Phone :</span> {{$address->phone}}</li>
                                                <li><span>Email :</span> {{$address->email}}</li>
                                                <li><span>Country :</span> {{$address->country}}</li>
                                                <li><span>City :</span> {{$address->city}}</li>
                                                <li><span>Zip Code :</span> {{$address->zip}}</li>
                                                <li><span>Address :</span> {{$address->address}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <p class="wsus__product">shipping Methods</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    free shipping
                                    <span>(10 - 12 days)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                    value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    express shipping
                                    <span>(5 - 10 days)</span>
                                </label>
                            </div>
                            <div class="wsus__order_details_summery">
                                <p>subtotal: <span>$120.00</span></p>
                                <p>shipping fee: <span>$20.00</span></p>
                                <p>tax: <span>$00.00</span></p>
                                <p><b>total:</b> <span><b>$140.00</b></span></p>
                            </div>
                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agree to the website <a href="#">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>
                            <a href="payment.html" class="common_btn">Place Order</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--============================CHECK OUT PAGE END==============================-->
@endsection

@section('model')
    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{ route('user.checkout.address.create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Name <b>*</b></label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Name" class="@error('name') border border-danger @enderror">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Email <b>*</b></label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Email" class="@error('email') border border-danger @enderror">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Phone <b>*</b></label>
                                            <input type="text" name="phone" value="{{ old('phone') }}"
                                                placeholder="Phone" class="@error('phone') border border-danger @enderror">
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Country <b>*</b></label>
                                            <div class="wsus__topbar_select">
                                                <select name="country"
                                                    class="select_2 @error('country') border border-danger @enderror">
                                                    <option>Select a Country</option>
                                                    @foreach (config('settings.country_list') as $country)
                                                        <option value="{{ $country }}">{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>State <b>*</b></label>
                                            <input type="text" name="state" value="{{ old('state') }}"
                                                placeholder="State" class="@error('state') border border-danger @enderror">
                                            @error('state')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>City <b>*</b></label>
                                            <input type="text" name="city" value="{{ old('city') }}"
                                                placeholder="City" class="@error('city') border border-danger @enderror">
                                            @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>zip code <b>*</b></label>
                                            <input type="text" name="zip" value="{{ old('zip') }}"
                                                placeholder="Zip Code" class="@error('zip') border border-danger @enderror">
                                            @error('zip')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Address <b>*</b></label>
                                            <input type="text" name="address" value="{{ old('address') }}"
                                                placeholder="Address"
                                                class="@error('address') border border-danger @enderror">
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <button type="submit" class="common_btn">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
