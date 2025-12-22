@extends('FrontEnd.master')
@section('content')

<style>
  @media (max-width: 767px) {
    .cpn-m{
      margin-bottom: 1532px;
    margin-left: 72px;
    }
  }
</style>
<div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="{{ route('home') }}">Home</a></li>
          <li><a class="font-xs color-gray-500" href="{{ route('cart.show') }}">Shop</a></li>
          <li><a class="font-xs color-gray-500" href="shop-cart.html">Checkout</a></li>
        </ul>
      </div>
    </div>
  </div>
  <section class="section-box shop-template">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="box-border">
            <form action="{{ route('checkout.payment') }}" method="post">
                @csrf
            <div class="row">
                @auth
                <div class="col-lg-8 col-sm-6 mb-20 text-sm-end text-center"><span class="font-sm color-brand-3">You Are Now Log in</span><a class="font-sm color-brand-1" href=""></a></div>
                @endauth
                @guest
                <div class="col-lg-8 col-sm-6 mb-20 text-sm-end text-center"><span class="font-sm color-brand-3">Already have an account? </span><a class="font-sm color-brand-1" href="{{ route('login') }}">Click here to Login</a></div>
                @endguest
              <div class="col-lg-12">
                <h5 class="font-md-bold color-brand-3 mt-15 mb-20">Shipping address</h5>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <input class="form-control font-sm" required type="text" id="name" name="name" placeholder="Full Name" value="{{ Auth::user()->name ?? old('name') }}">
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
              @enderror
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <input class="form-control font-sm" required="" type="number" name="phone" placeholder="Phone" id="phone" value="{{ Auth::user()->phone ?? old('phone') }}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input class="form-control font-sm" id="email" type="email" name="email" placeholder="Email address *" value="{{ Auth::user()->email ?? old('email') }}">
                </div>
              </div>
              {{-- @if(auth()->check())
              @php
                  $id = Auth::user()->id;
                  $addresses = App\Models\Address::where('user_id', $id)->latest()->get();
              @endphp --}}

              <div class="col-lg-6">
                <div class="form-group">
                  <select class="form-control font-sm select-style1 color-gray-700" name="division_id" id="division_id" required>
                    <option value="">Select Division</option>

                    @foreach(get_divisions() as $division)
                      <option value="{{ $division->id }}">{{ ucwords($division->division_name_en) }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <select class="form-control font-sm select-style1 color-gray-700"  name="district_id" id="district_id" required>
                    <option selected=""  value="">Select District</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <select class="form-control font-sm select-style1 color-gray-700" name="upazilla_id" id="upazilla_id" required>
                    <option selected=""  value="">Select Upazilla</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                    <textarea name="address" id="address" class="form-control" placeholder="Address" required>{{ old('address') }}</textarea>
                    @error('address')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <select class="form-control font-sm select-style1 color-gray-700" name="shipping_id" id="shipping_id" required>
                    <option value="">--Select--</option>
                                    @foreach ($shippings as $key => $shipping)
                                        <option value="{{ $shipping->id }}">@if($shipping->type == 1) Inside Dhaka @else Outside Dhaka @endif </option>
                                    @endforeach
                  </select>
                  @error('shipping_id')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group mb-0">
                  <textarea class="form-control font-sm" name="comment" id="comment" placeholder="Additional Information" rows="5"></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-20">
            <div class="col-lg-6 col-5 mb-20"><a class="btn font-sm-bold color-brand-1 arrow-back-1" href="{{ route('cart.show') }}">Return to Cart</a></div>
          </div>

        </div>
        <div class="col-lg-6">
          <div class="box-border">
            <h5 class="font-md-bold mb-20">Your Order</h5>
            <div class="listCheckout">
                @foreach ($carts as $cart)
              <div class="item-wishlist">
                <div class="wishlist-product">
                  <div class="product-wishlist">
                    <div class="product-image"><a href="shop-single-product.html"><img src="/{{$cart->options->image}}" alt="Ecom"></a></div>
                    <div class="product-info"><a href="{{ route('product.details', $cart->options->slug) }}">
                        <h6 class="color-brand-3">{{$cart->name}}</h6></a>
                        @if($cart->options->attribute_names)
                                                @for($i=0; $i<sizeof($cart->options->attribute_names); $i++)
                                                    <span>{{ $cart->options->attribute_names[$i] }}: {{ $cart->options->attribute_values[$i] }}</span><br/>
                                                @endfor
                                            @endif
                    </div>
                  </div>
                </div>
                <div class="wishlist-status">
                  <h5 class="color-gray-500">{{$cart->qty}}x</h5>
                </div>
                <div class="wishlist-price">
                  <h4 class="color-brand-3 font-lg-bold">৳{{$cart->subtotal}}</h4>
                </div>
              </div>
              @endforeach
            </div>
            <div class="form-group mb-0">
              <div class="row mb-10">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Subtotal</span></div>
                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">৳<span id="cartSubTotal">{{ $cartTotal }}</span></div>
              </div>
              @if (Session::get('couponCode'))
              <div class="row mb-10">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Coupon</span></div>
                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">৳<span id="">{{ Session::get('amount') }}</span></div>
              </div>
              @endif

              <div class="border-bottom mb-10 pb-5">
                <div class="row">
                  <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Shipping</span></div>
                  <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">৳<span id="ship_amount">0.00</span></div>
                  <input type="hidden" value="" name="shipping_charge" class="ship_amount" />
                                    <input type="hidden" value="" name="shipping_type" class="shipping_type" />
                                    <input type="hidden" value="" name="shipping_name" class="shipping_name" />
                                    @if (Session::get('couponCode'))
                                    <input type="hidden" value="{{$cartTotal-Session::get('amount')}}" name="sub_total" id="cartSubTotalShi22" />
                                    @else
                                    <input type="hidden" value="{{$cartTotal}}" name="sub_total" id="cartSubTotalShi22" />
                                    @endif
                                    <input type="hidden" value="" name="grand_total" id="grand_total" />
                                    {{-- @if (Session::get('couponCode'))
                           <input type="hidden" value="{{ Session::get('amount') }}" name="coupon_price" id="couponprice" />
                                    @endif --}}
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Total</span></div>
                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">৳<span id="grand_total_set">{{ $cartTotal - Session::get('amount')  }}</span></span></div>
              </div>
            </div>
            <br>
            <style>
                .cit-megabox > input:checked ~ .cit-megabox-elem, .cit-megabox > input:checked ~ .cit-megabox-elem {
    border-color: #3BB77E;
                }

                        .cit-megabox .cit-megabox-elem {
                            border: 1px solid #e2e5ec;
                            transition: all 0.3s ease;
                         border-radius: 0.25rem;
                    }
                    .cit-megabox input {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}
.text-center {
    text-align: center!important;
}
.img-fluid {
    max-width: 90px;
    height: 40px;
}


            </style>
            <div class="box-payment">
              <div class="row gutters-5">
                <div class="col-4 col-sm-3">
                    <lavel class="cit-megabox d-block mb-3">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="cash_on_delivery" checked="" value="cod">
                        <span class="d-block cit-megabox-elem p-3">
                            <img src="{{asset('Frontend')}}/assets/imgs/page/checkout/cod.png" alt="" class="img-fluid mb-2">
                            <span class="d-block text-center">
                                <span class="d-block fw-600 fs-15">Cash On Delivery</span>
                            </span>
                        </span>
                    </lavel>
                </div>

                <div class="col-4 col-sm-3">
                    <lavel class="cit-megabox d-block mb-3">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="bkash" value="bkash">
                        <span class="d-block cit-megabox-elem p-3">
                            <img src="{{asset('frontend')}}/assets/imgs/page/checkout/bkash.png" alt="" class="img-fluid mb-2">
                            <span class="d-block text-center">
                                <span class="d-block fw-600 fs-15">bKash</span>
                            </span>
                        </span>
                    </lavel>
                </div>

                <div class="col-4 col-sm-3">
                    <lavel class="cit-megabox d-block mb-3">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="nagad" value="nagad">
                        <span class="d-block cit-megabox-elem p-3">
                            <img src="{{asset('frontend')}}/assets/imgs/page/checkout/nagad.png" alt="" class="img-fluid mb-2">
                            <span class="d-block text-center">
                                <span class="d-block fw-600 fs-15">Nagad</span>
                            </span>
                        </span>
                    </lavel>
                </div>

                <div class="col-4 col-sm-3">
                    <lavel class="cit-megabox d-block mb-3">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="aamarpay" value="aamarpay">
                        <span class="d-block cit-megabox-elem p-3">
                            <img src="{{asset('frontend')}}/assets/imgs/page/checkout/aamarpay.png" alt="" class="img-fluid mb-2">
                            <span class="d-block text-center">
                                <span class="d-block fw-600 fs-15">Aamarpay</span>
                            </span>
                        </span>
                    </lavel>
                </div>

                <div class="col-4 col-sm-3">
                    <lavel class="cit-megabox d-block mb-3">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="sslcommerz" value="sslcommerz">
                        <span class="d-block cit-megabox-elem p-3">
                            <img src="{{asset('frontend')}}/assets/imgs/page/checkout/sslcommerz.png" alt="" class="img-fluid mb-2">
                            <span class="d-block text-center">
                                <span class="d-block fw-600 fs-15">sslcommerz</span>
                            </span>
                        </span>
                    </lavel>
                </div>

            </div>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-buy w-auto arrow-next" >Place an Order</button>
          {{-- <div class="col-lg-8 col-sm-6 mb-20 text-sm-end text-center"><span class="font-sm color-brand-3">Please Log in First </span><a class="font-sm color-brand-1" href="{{ route('login') }}">Click here to Login</a></div> --}}
        </form>
        </div>
      </div>
    </div>
  </section>
  <div class="box-cart-right cpn-m" style="position: absolute;left: 122px;bottom: 1099px;">
    <h5 class="font-md-bold mb-10">Apply Coupon</h5>
    <div class="form-group d-flex">
      <form action="{{ route('apply-coupon') }}" method="post">
        @csrf
      <input class="form-control mr-15" name="apply_coupon" placeholder="Enter Your Coupon">
      <input type="hidden" name="cart_value" value="{{ $cartTotal }}">
      <br>
      <button class="btn btn-buy w-auto">Apply</button>
      </form>
    </div>
  </div>

  <section class="section-box mt-90 mb-50">
    <div class="container">
      <ul class="list-col-5">
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/delivery.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Free Delivery</h5>
              <p class="font-sm color-gray-500">From all orders over $10</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/support.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Support 24/7</h5>
              <p class="font-sm color-gray-500">Shop with an expert</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/voucher.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Gift voucher</h5>
              <p class="font-sm color-gray-500">Refer a friend</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/return.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Return &amp; Refund</h5>
              <p class="font-sm color-gray-500">Free return over $200</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="assets/imgs/template/secure.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Secure payment</h5>
              <p class="font-sm color-gray-500">100% Protected</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section class="section-box box-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-7 col-sm-12">
          <h3 class="color-white">Subscrible &amp; Get <span class="color-warning">10%</span> Discount</h3>
          <p class="font-lg color-white">Get E-mail updates about our latest shop and <span class="font-lg-bold">special offers.</span></p>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12">
          <div class="box-form-newsletter mt-15">
            <form class="form-newsletter">
              <input class="input-newsletter font-xs" value="" placeholder="Your email Address">
              <button class="btn btn-brand-2">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="ModalFiltersForm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content apply-job-form">
        <div class="modal-header">
          <h5 class="modal-title color-gray-1000 filters-icon">Addvance Fillters</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-30">
          <div class="row">
            <div class="col-w-1">
              <h6 class="color-gray-900 mb-0">Brands</h6>
              <ul class="list-checkbox">
                <li>
                  <label class="cb-container">
                    <input type="checkbox" checked="checked"><span class="text-small">Apple</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Samsung</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Baseus</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Remax</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Handtown</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Elecom</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Razer</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Auto Focus</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Nillkin</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Logitech</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">ChromeBook</span><span class="checkmark"></span>
                  </label>
                </li>
              </ul>
            </div>
            <div class="col-w-1">
              <h6 class="color-gray-900 mb-0">Special offers</h6>
              <ul class="list-checkbox">
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">On sale</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox" checked="checked"><span class="text-small">FREE shipping</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Big deals</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Shop Mall</span><span class="checkmark"></span>
                  </label>
                </li>
              </ul>
              <h6 class="color-gray-900 mb-0 mt-40">Ready to ship in</h6>
              <ul class="list-checkbox">
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">1 business day</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox" checked="checked"><span class="text-small">1&ndash;3 business days</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">in 1 week</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Shipping now</span><span class="checkmark"></span>
                  </label>
                </li>
              </ul>
            </div>
            <div class="col-w-1">
              <h6 class="color-gray-900 mb-0">Ordering options</h6>
              <ul class="list-checkbox">
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Accepts gift cards</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Customizable</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox" checked="checked"><span class="text-small">Can be gift-wrapped</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Installment 0%</span><span class="checkmark"></span>
                  </label>
                </li>
              </ul>
              <h6 class="color-gray-900 mb-0 mt-40">Rating</h6>
              <ul class="list-checkbox">
                <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(5 stars)</span></a></li>
                <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(4 stars)</span></a></li>
                <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(3 stars)</span></a></li>
                <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(2 stars)</span></a></li>
                <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(1 star)</span></a></li>
              </ul>
            </div>
            <div class="col-w-2">
              <h6 class="color-gray-900 mb-0">Material</h6>
              <ul class="list-checkbox">
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Nylon (8)</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Tempered Glass (5)</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox" checked="checked"><span class="text-small">Liquid Silicone Rubber (5)</span><span class="checkmark"></span>
                  </label>
                </li>
                <li>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Aluminium Alloy (3)</span><span class="checkmark"></span>
                  </label>
                </li>
              </ul>
              <h6 class="color-gray-900 mb-20 mt-40">Product tags</h6>
              <div><a class="btn btn-border mr-5" href="#">Games</a><a class="btn btn-border mr-5" href="#">Electronics</a><a class="btn btn-border mr-5" href="#">Video</a><a class="btn btn-border mr-5" href="#">Cellphone</a><a class="btn btn-border mr-5" href="#">Indoor</a><a class="btn btn-border mr-5" href="#">VGA Card</a><a class="btn btn-border mr-5" href="#">USB</a><a class="btn btn-border mr-5" href="#">Lightning</a><a class="btn btn-border mr-5" href="#">Camera</a></div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-start pl-30"><a class="btn btn-buy w-auto" href="#">Apply Fillter</a><a class="btn font-sm-bold color-gray-500" href="#">Reset Fillter</a></div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
    function miniCart(){
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType:'json',
                success:function(response){
                    // alert(response);
                    //checkout();
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('#cartSubTotalShi').val(response.cartTotal);
                    $('.cartQty').text(Object.keys(response.carts).length);
                    $('#total_cart_qty').text(Object.keys(response.carts).length);

                    var miniCart = "";

                    if(Object.keys(response.carts).length > 0){
                        $.each(response.carts, function(key,value){
                            //console.log(value);
                            var slug = value.options.slug;
                            var base_url = window.location.origin;
                          miniCart += `

                            <div class="item-cart mb-20">
                                            <div class="cart-image"><img src="/${value.options.image}" alt="Ecom"></div>
                                    <div class="cart-info"><a class="font-sm-bold color-brand-3" href="${base_url}/product-details/${slug}">${value.name}</a>

                                <p><span class="color-brand-2 font-sm-bold">${value.qty} x ${value.price}</span></p>
                                <div class="shopping-cart-delete">
                                        <a  id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                            </div>
                        </div>`

                        });

                        $('#miniCart').html(miniCart);
                        $('#miniCart_empty_btn').hide();
                        $('#miniCart_btn').show();
                    }else{
                        html = '<h4 class="text-center">Cart empty!</h4>';
                        $('#miniCart').html(html);
                        $('#miniCart_btn').hide();
                        $('#miniCart_empty_btn').show();
                    }
                }
            });
        }
        /* ============ Function Call ========== */
        miniCart();

        $(document).ready(function() {
            $('select[name="shipping_id"]').on('change', function(){
                var shipping_cost = $(this).val();
                if(shipping_cost) {
                    $.ajax({
                        url: "{{  url('/checkout/shipping/ajax') }}/"+shipping_cost,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            // console.log(data);
                            $('#ship_amount').text(data.shipping_charge);
                            $('.ship_amount').val(data.shipping_charge);
                            $('.shipping_name').val(data.name);
                            $('.shipping_type').val(data.type);

                            let shipping_price = parseInt(data.shipping_charge);
                            let grand_total_price = parseInt($('#cartSubTotalShi22').val());
                            // console.log(grand_total_price);

                            grand_total_price += shipping_price;
                            $('#grand_total_set').html(grand_total_price);
                            $('#grand_total').val(grand_total_price);

                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

<!--  Division To District Show Ajax -->
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="division_id"]').on('change', function(){
        var division_id = $(this).val();
        if(division_id) {
            $.ajax({
                url: "{{  url('/division-district/ajax') }}/"+division_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="district_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                        $.each(data, function(key, value){
                        $('select[name="district_id"]').append('<option value="'+ value.id +'">' + capitalizeFirstLetter(value.district_name_en) + '</option>');
                    });
                    $('select[name="upazilla_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                },
            });
        } else {
           alert('danger');
        }
    });

    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }

    // Address Realtionship Division/District/Upazilla Show Data Ajax //
    $('select[name="address_id"]').on('change', function(){
        var address_id = $(this).val();
        $('.selected_address').removeClass('d-none');
        if(address_id) {
            $.ajax({
                url: "{{  url('/address/ajax') }}/"+address_id,
                type:"GET",
                dataType:"json",
                success:function(data) {

                    $('#dynamic_division').text(capitalizeFirstLetter(data.division_name_en));
                    $('#dynamic_division_input').val(data.division_id);
                    $("#dynamic_district").text(capitalizeFirstLetter(data.district_name_en));
                    $('#dynamic_district_input').val(data.district_id);
                    $("#dynamic_upazilla").text(capitalizeFirstLetter(data.upazilla_name_en));
                    $('#dynamic_upazilla_input').val(data.upazilla_id);
                    $("#dynamic_address").text(data.address);
                    $('#dynamic_address_input').val(data.address);
                },
            });
        } else {
           alert('danger');
        }
    });
});
</script>

<!--  District To Upazilla Show Ajax -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/district-upazilla/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="upazilla_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="upazilla_id"]').append('<option value="'+ value.id +'">' + value.name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<!-- create address ajax -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#addressStore').on('click', function() {
            var division_id = $('#division_id').val();
            var district_id = $('#district_id').val();
            var upazilla_id = $('#upazilla_id').val();
            var address     = $('#address').val();
            var is_default  = $('#is_default').val();
            var status      = $('#status').val();

            $.ajax({
                url: '{{ route('address.ajax.store') }}',
                type: "POST",
                data: {
                  _token: $("#csrf").val(),
                  division_id: division_id,
                  district_id: district_id,
                  upazilla_id: upazilla_id,
                  address: address,
                  is_default: is_default,
                  status: status,
                },
                dataType:'json',
                success: function(data){
                    // console.log(data);
                    $('#address').val(null);

                    $('select[name="address_id"]').html('<option value="" selected="" disabled="">Select Address</option>');
                    $.each(data, function(key, value){
                        $('select[name="address_id"]').append('<option value="'+ value.id +'">' + value.address + '</option>');
                    });
                    $('select[name="division_id"]').html('<option value="" selected="" disabled="">Select Division</option>');
                    $('select[name="district_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                    $('select[name="upazilla_id"]').html('<option value="" selected="" disabled="">Select Upazilla</option>');

                    // Start Message
                    const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          icon: 'success',
                          showConfirmButton: false,
                          timer: 2000
                        })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: data.error
                        })
                    }

                    // End Message
                    $('#Close').click();
                }
            });
         });
    });
</script>
@endpush
