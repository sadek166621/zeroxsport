@extends('FrontEnd.master')
@section('title')
Home
@endsection
@push('css')
    <style>
        .header .main-header .header-left .header-logo a img {
            min-height: 20px;
        }
    </style>
@endpush
@section('content')
<section class="section-box">
    <div class="banner-hero banner-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="rs-swipr box-swiper">

              <div class="swiper-container swiper-group-1">

                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider )
                  <div class="swiper-slide">

                    <div class="banner-big bg-11 bn-pic" style="background-image: url({{asset($slider->slider_img)}})">
                      <div class="row">
                      </div>
                      <div class="mt-30" style="margin-top:386px!important;margin-left:523px!important;"><a class="btn btn-brand-2" href="shop-grid.html">Shop now</a><a class="btn btn-link" href="shop-grid.html">Learn more</a></div>
                    </div>

                  </div>
                  @endforeach
                </div>

                <div class="swiper-pagination swiper-pagination-1"></div>
              </div>

            </div>

          </div>


          <div class="col-lg-4">
            <div class="row">
                @foreach ($home_banners as $home_banner )
              <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="rs-banner banner-small  bg-13" style="background-image: url({{asset($home_banner->banner_img)}})"><span class="color-danger text-uppercase font-sm-lh32">10%<span class="color-brand-3">Sale Off</span></span>
                  <h4 class="mb-10">Apple Watch Serial 7</h4>
                  <p class="color-brand-3 font-desc">Don&apos;t miss the last<br class="d-none d-lg-block"> opportunity.</p>
                  <div class="mt-20"><a class="btn btn-brand-3 btn-arrow-right" href="shop-grid.html">Shop now</a></div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-40">
    <div class="container">
      <div class="pb-0 head-main text-center border-none">
        <h4 class="color-gray-900">
            @if(session()->get('language') == 'bangla')
            সর্বাধিক জনপ্রিয় ক্যাটাগরি
            @else
            Most Populer Categorys
            @endif
        </h4>
      </div>
      <div class="mt-10">
        <div class="box-swiper js-swiper-9">
          <div class="swiper-container swiper-group-9 pb-50">
            <div class="swiper-wrapper">
                @foreach ($featured_category as $fc)

              <div class="swiper-slide">
                <div class="card-circle">
                  <div class="card-image">
                    <div class="inner-image"><img src="{{ asset($fc->image) }}" alt="Ecom" style="
                        border-radius: 50%;
                    "></div>
                  </div>
                  <div class="card-info"> <a class="font-md-bold" href="{{ route('product.category', $fc->slug) }}">@if(session()->get('language') == 'bangla')
                    {{ $fc->name_bn }}
                @else
                    {{ $fc->name_en }}
                @endif</a>
                    {{-- <p class="font-xs color-gray-500">2356 items</p> --}}
                  </div>
                </div>
              </div>
              @endforeach

            <div class="swiper-pagination swiper-pagination-3 text-center"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box mt-30">
    <div class="container">
      <div class="border-bottom pb-25 head-main">
        <h3>
            @if(session()->get('language') == 'bangla')
            বৈশিষ্ট্যযুক্ত ক্যাটাগরি
            @else
            Featured Categories
                        @endif
        </h3>
        <p class="font-base">
            @if(session()->get('language') == 'bangla')
            এই বৈশিষ্ট্য বিভাগ থেকে আপনার প্রয়োজনীয় পণ্য পছন্দ করুন.
            @else
            Choose your necessary products from this feature categories.
                                    @endif
            </p>
        <!-- Button slider-->
        <div class="box-button-slider">
          <div class="swiper-button-next swiper-button-next-group-2"></div>
          <div class="swiper-button-prev swiper-button-prev-group-2"></div>
        </div>
        <!-- End Button slider-->
      </div>
      <div class="mt-10">
        <div class="box-swiper">
          <div class="swiper-container swiper-group-style-2">
            <div class="swiper-wrapper pt-5">
              <div class="swiper-slide">
                <ul class="list-9-col">
                    @foreach($featured_category as $fc)


                  <li>
                    <div class="box-category hover-up">
                      <div class="image"><a href="{{ route('product.category', $fc->slug) }}"><img src="{{ asset($fc->image) }}" alt="Ecom"></a></div>
                      <div class="text-info"><a class="font-sm color-gray-900 font-bold" href="{{ route('product.category', $fc->slug) }}">
                        @if(session()->get('language') == 'bangla')
                    {{ $fc->name_bn }}
                @else
                    {{ $fc->name_en }}
                @endif
                        {{-- <p class="font-xs color-gray-500">1025 items</p> --}}
                      </div>
                    </div>
                  </li>
                  @endforeach

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box pt-50">
    <div class="container">
      <div class="bg-2 box-bdrd-4 pt-35 pb-35 pl-25 pr-25">
        <div class="head-main">
          <div class="row">
            <div class="col-lg-6">
              <div class="box-icon-flash">
                <h3 class="mb-5">
                    @if(session()->get('language') == 'bangla')
                    আশ্চর্য ডিল
                    @else
                SHOCKING DEAL
                @endif </h3>
                <p class="font-16 font-bold color-gray-900"> @if(session()->get('language') == 'bangla')
                    সুযোগ দ্রুত চলে যাবে। এটি গ্রহণ করুন!
                    @else
                    The opportunity will quickly pass. Take it!
                @endif </p>
              </div>
            </div>
            <div class="col-lg-6 text-end">
              <div class="box-all-hurry box-all-hurry-round">
                <div class="d-inline-block box-text-hurryup"><span class="font-md-bold color-gray-900">Hurry up!</span><br><span class="font-xs color-gray-500">Offers end in:</span></div>
                <div class="box-count box-count-square hide-period">
                  <div class="deals-countdown" data-countdown="2023/09/25 00:00:00"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-0">
          <div class="box-swiper">
            <div class="swiper-container swiper-group-1 pb-30">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="list-products-5 list-brand-2">
                    @foreach($hot_deals as $hot_deal)
                    <div class="card-grid-style-3 hover-show hover-hide-show-cart">
                      <div class="card-grid-inner">
                        <div class="tools"><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                        <div class="image-box"><a href="{{ route('product.details',$hot_deal->slug) }}"><img src="{{ asset($hot_deal->product_thumbnail) }}" alt="Ecom"></a></div>
                        <div class="box-count">
                          <div class="deals-countdown" data-countdown="2023/09/25 00:00:00"></div>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">
                            @if(session()->get('language') == 'bangla')
                            {{ $hot_deal->category->name_bn }}
                            @else
                            {{ $hot_deal->category->name_en }}
                            @endif
                        </span><br><a class="color-brand-3 font-sm-bold" href="{{ route('product.details',$hot_deal->slug) }}">
                            @if(session()->get('language') == 'bangla')
                            {!! Str::substr($hot_deal->name_bn, 0, 20) !!}..
                            @else
                            {!! Str::substr($hot_deal->name_en, 0, 20) !!}..
                            @endif</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (0)</span></div>
                          <div class="price-info">

                            <strong class="font-lg-bold color-brand-3 price-main">৳{{ $hot_deal->regular_price }}</strong>

                          </div>
                          {{-- <div class="box-progress box-progress-small">
                            <div class="progress-bar">
                              <div class="progress-bar-inner"></div>
                            </div>
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-6"><span class="font-xs color-gray-500">Available:</span><span class="font-xs-bold color-gray-900">568</span></div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end"><span class="font-xs color-gray-500">Sold:</span><span class="font-xs-bold color-gray-900">289</span></div>
                            </div>
                          </div> --}}
                          @if($hot_deal->is_varient == 1)
                          {{-- <a class="add" id="{{ $product->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-shopping-cart mr-5"></i>Add </a> --}}
                          <div class="mt-20 box-btn-cart"><a class="btn btn-cart" id="{{ $hot_deal->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal">Add To Cart</a></div>

                         @else
                             <input type="hidden" id="pfrom" value="direct">
                             <input type="hidden" id="product_product_id" value="{{ $hot_deal->id }}"  min="1">
                             <input type="hidden" id="{{ $hot_deal->id }}-product_pname" value="{{ $hot_deal->name_en }}">
                             <div class="mt-20 box-btn-cart"><a class="btn btn-cart" onclick="addToCartDirect({{ $hot_deal->id }})">Add To Cart</a></div>
                         @endif
                         {{-- <ul class="list-features">                          <ul class="list-features">
                            <li> 2-day Delivery. Free shipping</li>
                          </ul> --}}
                        </div>
                      </div>
                    </div>
                    @endforeach



                    </div>

                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="section-box mt-50 mb-20">
    <div class="container">
      <div class="box-swiper">
        <div class="swiper-container swiper-group-15">
          <div class="swiper-wrapper">
            @foreach ( $brands as $brand )

            <div class="swiper-slide"><img src="{{ asset($brand->brand_image) }}" alt="Ecom"></div>

            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="section-box mt-30">
    <div class="container">
      <div class="head-main bd-gray-200">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <ul class="nav nav-tabs text-start" role="tablist">
              <li class="pl-0"><a class="active pl-0" href="#tab-1-featured" data-bs-toggle="tab" role="tab" aria-controls="tab-1-featured" aria-selected="true" data-index="1">
                  <h4>Featured</h4></a></li>
              <li><a href="#tab-1-bestseller" data-bs-toggle="tab" role="tab" aria-controls="tab-1-bestseller" aria-selected="false" data-index="2">
                  <h4>Best seller</h4></a></li>
              <li><a href="#tab-1-mostviewed" data-bs-toggle="tab" role="tab" aria-controls="tab-1-mostviewed" aria-selected="false" data-index="3">
                  <h4>Most viewed</h4></a></li>
            </ul>
            <!-- Button slider-->
            <div class="box-button-slider">
              <div class="button-slider-nav" id="tab-1-featured-nav">
                <div class="swiper-button-next swiper-button-next-tab-1"></div>
                <div class="swiper-button-prev swiper-button-prev-tab-1"></div>
              </div>
              <div class="button-slider-nav" id="tab-1-bestseller-nav" style="display: none;">
                <div class="swiper-button-next swiper-button-next-tab-2"></div>
                <div class="swiper-button-prev swiper-button-prev-tab-2"></div>
              </div>
              <div class="button-slider-nav" id="tab-1-mostviewed-nav" style="display: none;">
                <div class="swiper-button-next swiper-button-next-tab-3"></div>
                <div class="swiper-button-prev swiper-button-prev-tab-3"></div>
              </div>
            </div>
            <!-- End Button slider-->
          </div>
        </div>
      </div>
      <div class="tab-content tab-content-slider">
        <div class="tab-pane fade active show" id="tab-1-featured" role="tabpanel" aria-labelledby="tab-1-featured">
          <div class="box-swiper">
            <div class="swiper-container swiper-tab-1">
              <div class="swiper-wrapper pt-5">
                <div class="swiper-slide">
                  <div class="list-products-5 list-style-brand-2">

                    @foreach ( $product_top_rates as $product_top_rate )

                    <div class="card-grid-style-3">
                      <div class="card-grid-inner">
                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                        <div class="image-box"><a href="{{ route('product.details',$product_top_rate->slug) }}"><img src="{{ asset($product_top_rate->product_thumbnail) }}" alt="Ecom"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">
                            @if(session()->get('language') == 'bangla')
                            {{ $product_top_rate->category->name_bn }}
                            @else
                            {{ $product_top_rate->category->name_en }}
                            @endif</a><br><a class="color-brand-3 font-sm-bold" href="{{ route('product.details',$product_top_rate->slug) }}">
                            @if(session()->get('language') == 'bangla')
                            {!! Str::substr($product_top_rate->name_bn, 0, 20) !!}..
                            @else
                            {!! Str::substr($product_top_rate->name_en, 0, 20) !!}..
                            @endif</a>
                            <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (0)</span></div>
                            <div class="price-info">
                                @if ($product_top_rate->discount_price > 0)
                                <strong class="color-gray-500 price-line">৳{{ $product_top_rate->discount_price }}</strong>
                                <span class="font-lg-bold color-brand-3 price-main">৳{{ $product_top_rate->regular_price }}</span>
                            </div>
                            @else
                            <span class="font-lg-bold color-brand-3 price-main">৳{{ $product_top_rate->regular_price }}</span>

                            @endif
                            </div>
                            @if($product_top_rate->is_varient == 1)
                            {{-- <a class="add" id="{{ $product->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-shopping-cart mr-5"></i>Add </a> --}}
                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart" id="{{ $product_top_rate->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal">Add To Cart</a></div>

                           @else
                               <input type="hidden" id="pfrom" value="direct">
                               <input type="hidden" id="product_product_id" value="{{ $product_top_rate->id }}"  min="1">
                               <input type="hidden" id="{{ $product_top_rate->id }}-product_pname" value="{{ $product_top_rate->name_en }}">
                               <div class="mt-20 box-btn-cart"><a class="btn btn-cart" onclick="addToCartDirect({{ $product_top_rate->id }})">Add To Cart</a></div>
                           @endif
                        </div>
                      </div>
                    </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-1-bestseller" role="tabpanel" aria-labelledby="tab-1-bestseller">
          <div class="box-swiper">
            <div class="swiper-container swiper-tab-2">
              <div class="swiper-wrapper pt-5">
                <div class="swiper-slide">
                  <div class="list-products-5">
                    @foreach ($product_top_sellings as $product_top_selling )

                    <div class="card-grid-style-3">
                        <div class="card-grid-inner">
                          <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                          <div class="image-box"><a href="shop-single-product.html"><img src="{{ asset($product_top_selling->product_thumbnail) }}" alt="Ecom"></a></div>
                          <div class="info-right"><a class="font-xs color-gray-500" href="{{ route('product.details',$product_top_selling->slug) }}">

                            @if(session()->get('language') == 'bangla')
                            {{ $product_top_selling->category->name_bn }}
                            @else
                            {{ $product_top_selling->category->name_en }}
                            @endif

                        </a><br><a class="color-brand-3 font-sm-bold" href="{{ route('product.details',$product_top_selling->slug) }}">
                            @if(session()->get('language') == 'bangla')
                            {!! Str::substr($product_top_selling->name_bn, 0, 20) !!}..
                            @else
                            {!! Str::substr($product_top_selling->name_en, 0, 20) !!}..
                            @endif</a>
                            <div class="rating"><img src="{{ asset('assets') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(0)</span></div>
                            <div class="price-info">
                                @if ($product_top_selling->discount_price > 0)
                                <strong class="color-gray-500 price-line">৳{{ $product_top_selling->discount_price }}</strong>
                                <span class="font-lg-bold color-brand-3 price-main">৳{{ $product_top_selling->regular_price }}</span>
                            </div>
                            @else
                            <span class="font-lg-bold color-brand-3 price-main">৳{{ $product_top_selling->regular_price }}</span>

                            @endif
                            </div>
                            @if($product_top_selling->is_varient == 1)
                            {{-- <a class="add" id="{{ $product->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-shopping-cart mr-5"></i>Add </a> --}}
                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart" id="{{ $product_top_selling->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal">Add To Cart</a></div>

                           @else
                               <input type="hidden" id="pfrom" value="direct">
                               <input type="hidden" id="product_product_id" value="{{ $product_top_selling->id }}"  min="1">
                               <input type="hidden" id="{{ $product_top_selling->id }}-product_pname" value="{{ $product_top_selling->name_en }}">
                               <div class="mt-20 box-btn-cart"><a class="btn btn-cart" onclick="addToCartDirect({{ $product_top_selling->id }})">Add To Cart</a></div>
                           @endif
                          </div>
                        </div>
                      </div>

                    @endforeach


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-1-mostviewed" role="tabpanel" aria-labelledby="tab-1-mostviewed">
          <div class="box-swiper">
            <div class="swiper-container swiper-tab-3">
              <div class="swiper-wrapper pt-5">
                <div class="swiper-slide">
                  <div class="list-products-5">
                    @foreach ($product_trendings as $product_trending )

                    <div class="card-grid-style-3">
                        <div class="card-grid-inner">
                          <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                          <div class="image-box"><a href="shop-single-product.html"><img src="{{ asset($product_trending->product_thumbnail) }}" alt="Ecom"></a></div>
                          <div class="info-right"><a class="font-xs color-gray-500" href="{{ route('product.details',$product_trending->slug) }}">
                            @if(session()->get('language') == 'bangla')
                            {{ $product_trending->category->name_bn }}
                            @else
                            {{ $product_trending->category->name_en }}
                            @endif
                        </a><br><a class="color-brand-3 font-sm-bold" href="{{ route('product.details',$product_trending->slug) }}">
                            @if(session()->get('language') == 'bangla')
                            {!! Str::substr($product_trending->name_bn, 0, 20) !!}..
                            @else
                            {!! Str::substr($product_trending->name_en, 0, 20) !!}..
                            @endif</a>
                            <div class="rating"><img src="{{ asset('assets') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(0)</span></div>
                            <div class="price-info">
                                @if ($product_trending->discount_price > 0)
                                <strong class="color-gray-500 price-line">৳{{ $product_trending->discount_price }}</strong>
                                <span class="font-lg-bold color-brand-3 price-main">৳{{ $product_trending->regular_price }}</span>
                            </div>
                            @else
                            <span class="font-lg-bold color-brand-3 price-main">৳{{ $product_trending->regular_price }}</span>

                            @endif
                            </div>
                            @if($product_trending->is_varient == 1)
                            {{-- <a class="add" id="{{ $product->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-shopping-cart mr-5"></i>Add </a> --}}
                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart" id="{{ $product_trending->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal">Add To Cart</a></div>

                           @else
                               <input type="hidden" id="pfrom" value="direct">
                               <input type="hidden" id="product_product_id" value="{{ $product_trending->id }}"  min="1">
                               <input type="hidden" id="{{ $product_trending->id }}-product_pname" value="{{ $product_trending->name_en }}">
                               <div class="mt-20 box-btn-cart"><a class="btn btn-cart" onclick="addToCartDirect({{ $product_trending->id }})">Add To Cart</a></div>
                           @endif
                          </div>
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-box mt-90 mb-50">
    <div class="container">
      <ul class="list-col-5">
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/delivery.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Free Delivery</h5>
              <p class="font-sm color-gray-500">From all orders over $10</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/support.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Support 24/7</h5>
              <p class="font-sm color-gray-500">Shop with an expert</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/voucher.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Gift voucher</h5>
              <p class="font-sm color-gray-500">Refer a friend</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/return.svg" alt="Ecom"></div>
            <div class="info-right">
              <h5 class="font-lg-bold color-gray-100">Return &amp; Refund</h5>
              <p class="font-sm color-gray-500">Free return over $200</p>
            </div>
          </div>
        </li>
        <li>
          <div class="item-list">
            <div class="icon-left"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/secure.svg" alt="Ecom"></div>
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="ModalQuickview" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content apply-job-form">
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body p-30">
          <div class="row">
            <div class="col-lg-6">
              <div class="gallery-image">
                <div class="galleries-2">
                  <div class="detail-gallery">
                    <div class="product-image-slider-2">
                      <figure class="border-radius-10"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-1.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-2.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-3.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-4.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-5.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-6.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-7.jpg" alt="product image"></figure>
                    </div>
                  </div>
                  <div class="slider-nav-thumbnails-2">
                    <div>
                      <div class="item-thumb"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-1.jpg" alt="product image"></div>
                    </div>
                    <div>
                      <div class="item-thumb"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-2.jpg" alt="product image"></div>
                    </div>
                    <div>
                      <div class="item-thumb"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-3.jpg" alt="product image"></div>
                    </div>
                    <div>
                      <div class="item-thumb"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-4.jpg" alt="product image"></div>
                    </div>
                    <div>
                      <div class="item-thumb"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-5.jpg" alt="product image"></div>
                    </div>
                    <div>
                      <div class="item-thumb"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-6.jpg" alt="product image"></div>
                    </div>
                    <div>
                      <div class="item-thumb"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-7.jpg" alt="product image"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-tags">
                <div class="d-inline-block mr-25"><span class="font-sm font-medium color-gray-900">Category:</span><a class="link" href="#">Smartphones</a></div>
                <div class="d-inline-block"><span class="font-sm font-medium color-gray-900">Tags:</span><a class="link" href="#">Blue</a>,<a class="link" href="#">Smartphone</a></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="product-info">
                <h5 class="mb-15">SAMSUNG Galaxy S22 Ultra, 8K Camera & Video, Brightest Display Screen, S Pen Pro</h5>
                <div class="info-by"><span class="bytext color-gray-500 font-xs font-medium">by</span><a class="byAUthor color-gray-900 font-xs font-medium" href="shop-vendor-list.html"> Ecom Tech</a>
                  <div class="rating d-inline-block"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500 font-medium"> (65 reviews)</span></div>
                </div>
                <div class="border-bottom pt-10 mb-20"></div>
                <div class="box-product-price">
                  <h3 class="color-brand-3 price-main d-inline-block mr-10">$2856.3</h3><span class="color-gray-500 price-line font-xl line-througt">$3225.6</span>
                </div>
                <div class="product-description mt-10 color-gray-900">
                  <ul class="list-dot">
                    <li>8k super steady video</li>
                    <li>Nightography plus portait mode</li>
                    <li>50mp photo resolution plus bright display</li>
                    <li>Adaptive color contrast</li>
                    <li>premium design & craftmanship</li>
                    <li>Long lasting battery plus fast charging</li>
                  </ul>
                </div>
                <div class="box-product-color mt-10">
                  <p class="font-sm color-gray-900">Color:<span class="color-brand-2 nameColor">Pink Gold</span></p>
                  <ul class="list-colors">
                    <li class="disabled"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-1.jpg" alt="Ecom" title="Pink"></li>
                    <li><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-2.jpg" alt="Ecom" title="Gold"></li>
                    <li><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-3.jpg" alt="Ecom" title="Pink Gold"></li>
                    <li><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-4.jpg" alt="Ecom" title="Silver"></li>
                    <li class="active"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-5.jpg" alt="Ecom" title="Pink Gold"></li>
                    <li class="disabled"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-6.jpg" alt="Ecom" title="Black"></li>
                    <li class="disabled"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/product/img-gallery-7.jpg" alt="Ecom" title="Red"></li>
                  </ul>
                </div>
                <div class="box-product-style-size mt-10">
                  <div class="row">
                    <div class="col-lg-12 mb-10">
                      <p class="font-sm color-gray-900">Style:<span class="color-brand-2 nameStyle">S22</span></p>
                      <ul class="list-styles">
                        <li class="disabled" title="S22 Ultra">S22 Ultra</li>
                        <li class="active" title="S22">S22</li>
                        <li title="S22 + Standing Cover">S22 + Standing Cover</li>
                      </ul>
                    </div>
                    <div class="col-lg-12 mb-10">
                      <p class="font-sm color-gray-900">Size:<span class="color-brand-2 nameSize">512GB</span></p>
                      <ul class="list-sizes">
                        <li class="disabled" title="1GB">1GB</li>
                        <li class="active" title="512 GB">512 GB</li>
                        <li title="256 GB">256 GB</li>
                        <li title="128 GB">128 GB</li>
                        <li class="disabled" title="64GB">64GB</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="buy-product mt-5">
                  <p class="font-sm mb-10">Quantity</p>
                  <div class="box-quantity">
                    <div class="input-quantity">
                      <input class="font-xl color-brand-3" type="text" value="1"><span class="minus-cart"></span><span class="plus-cart"></span>
                    </div>
                    <div class="button-buy"><a class="btn btn-cart" href="shop-cart.html">Add to cart</a><a class="btn btn-buy" href="shop-checkout.html">Buy now</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @push('js')
<script>
    function addToCartDirect(id){
        var product_name = $('#'+id+'-product_pname').val();
        // alert(product_name);
        var quantity = 1;

        // Start Message
        // const Toast = Swal.mixin({
        //         toast: true,
        //         position: 'top-end',
        //         icon: 'success',
        //         showConfirmButton: false,
        //         timer: 1200
        // });

        $.ajax({
        type:'POST',
        url:'/cart/data/store/'+id,
        dataType:'json',
        data:{
            quantity:quantity,product_name:product_name,_token:"{{ csrf_token() }}",
        },
            success:function(data){
                console.log(data);
                miniCart();
                $('#closeModel').click();

                // Start Sweertaleart Message
                if($.isEmptyObject(data.error)){
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1200
                    })
                    Toast.fire({
                        type:'success',
                        title: data.success
                    })
                }else{
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1200
                    })
                    Toast.fire({
                        type:'error',
                        title: data.error
                    })
                }
                // Start Sweertaleart Message


            }
        });
    }
    function addToCart(){
            var total_attributes = parseInt($('#total_attributes').val());
            //alert(total_attributes);
            var checkNotSelected = 0;
            var checkAlertHtml = '';
            for(var i=1; i<=total_attributes; i++){
                var checkSelected = parseInt($('#attribute_check_'+i).val());
                if(checkSelected == 0){
                    checkNotSelected = 1;
                    checkAlertHtml += `<div class="attr-detail mb-5">
											<div class="alert alert-danger d-flex align-items-center" role="alert">
												<div>
													<i class="fa fa-warning mr-10"></i> <span> Select `+$('#attribute_name_'+i).val()+`</span>
												</div>
											</div>
										</div>`;
                }
            }
            if(checkNotSelected == 1){
                $('#qty_alert').html('');
                //$('#attribute_alert').html(checkAlertHtml);
                $('#attribute_alert').html(`<div class="attr-detail mb-5">
											<div class="alert alert-danger d-flex align-items-center" role="alert">
												<div>
													<i class="fa fa-warning mr-10"></i> <span> Select all attributes</span>
												</div>
											</div>
										</div>`);
                return false;
            }
            $('.size-filter li').removeClass("active");
            var product_name = $('#pname').val();
            var id = $('#product_id').val();
            var price = $('#product_price').val();
            var color = $('#color option:selected').val();
            var size = $('#size option:selected').val();
            var quantity = $('#qty').val();
            var varient = $('#pvarient').val();

            var min_qty = parseInt($('#minimum_buy_qty').val());
            if(quantity < min_qty){
                $('#attribute_alert').html('');
                $('#qty_alert').html(`<div class="attr-detail mb-5">
											<div class="alert alert-danger d-flex align-items-center" role="alert">
												<div>
													<i class="fa fa-warning mr-10"></i> <span> Minimum quantity `+ min_qty +` required.</span>
												</div>
											</div>
										</div>`);
                return false;
            }
            // console.log(min_qty);
            var p_qty = parseInt($('#stock_qty').val());
            // if(quantity > p_qty){
            //     $('#stock_alert').html(`<div class="attr-detail mb-5">
			// 								<div class="alert alert-danger d-flex align-items-center" role="alert">
			// 									<div>
			// 										<i class="fa fa-warning mr-10"></i> <span> Not enough stock.</span>
			// 									</div>
			// 								</div>
			// 							</div>`);
            //     return false;
            // }


            // alert(varient);

            var options = $('#choice_form').serializeArray();
            var jsonString = JSON.stringify(options);
            //console.log(options);

            // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 1200
            });

            $.ajax({
            type:'POST',
            url:'/cart/data/store/'+id,
            dataType:'json',
            data:{
              color:color,size:size,quantity:quantity,product_name:product_name,product_price:price,product_varient:varient,options:jsonString,
            },
                success:function(data){
                    // console.log(data);
                    miniCart();
                    $('#closeModel').click();

                    // Start Sweertaleart Message
                    if($.isEmptyObject(data.error)){
                        const Toast = Swal.mixin({
                            toast:true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200
                        })

                        Toast.fire({
                          type:'success',
                          title: data.success
                        })

                        $('#qty').val(min_qty);
                        $('#pvarient').val('');

                        for(var i=1; i<=total_attributes; i++){
                            $('#attribute_check_'+i).val(0);
                        }

                    }else{
                        const Toast = Swal.mixin({
                            toast:true,
                            position: 'top-end',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1200
                        })

                        Toast.fire({
                          type:'error',
                          title: data.error
                        })

                        $('#qty').val(min_qty);
                        $('#pvarient').val('');

                        for(var i=1; i<=total_attributes; i++){
                            $('#attribute_check_'+i).val(0);
                        }
                    }
                    // Start Sweertaleart Message
                    var buyNowCheck = $('#buyNowCheck').val();
                    //alert(buyNowCheck);
                    if(buyNowCheck && buyNowCheck == 1){
                        $('#buyNowCheck').val(0);
                        window.location = '/checkout';
                    }

                }
            });
        }

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
                                    <div class="cart-info">
                                      <a  id="${value.rowId}" onclick="miniCartRemove(this.id)" style='float:right;padding: 2px;'><i class="fa-solid fa-xmark"></i></a>
                                      <a class="font-sm-bold color-brand-3" href="${base_url}/product-details/${slug}">${value.name}</a>
                                     <p><span class="color-brand-2 font-sm-bold">${value.qty} x ${value.price}</span></p>
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

        function miniCartRemove(rowId){
            $.ajax({
               type:'GET',
               url: '/minicart/product-remove/' +rowId,
               dataType: 'json',
               success:function(data){

                miniCart();
                cart();

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
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message
               }
            });
          }
</script>
@endpush
