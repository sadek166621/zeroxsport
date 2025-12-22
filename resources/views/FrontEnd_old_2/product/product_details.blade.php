@extends('FrontEnd.master')
@section('content')
<div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="{route('home')}">Home</a></li>
          <li><a class="font-xs color-gray-500" href="">Product Details</a></li>
          {{-- <li><a class="font-xs color-gray-500" href="shop-grid.html">Cell phone</a></li>
          <li><a class="font-xs color-gray-500" href="shop-grid.html">Accessories</a></li> --}}
        </ul>
      </div>
    </div>
  </div>
  <section class="section-box shop-template">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="gallery-image">
            <div class="galleries">
              <div class="detail-gallery">
                {{-- <label class="label">-17%</label> --}}
                <div class="product-image-slider">
                  <figure class="border-radius-10"><img src="{{ asset($product->product_thumbnail ) }}" alt="product image"></figure>
                </div>
              </div>
              <div class="slider-nav-thumbnails">
                @foreach($product->multi_imgs as $img)
                <div>
                  <div class="item-thumb"><img src="{{ asset($img->photo_name) }}" alt="product image"></div>
                </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>
        @php
	                                		$discount = 0;
											$amount = $product->regular_price;
	                                		if($product->discount_price > 0){
	                                			if($product->discount_type == 1){
	                                				$discount = $product->discount_price;
	                                				$amount = $product->regular_price - $discount;
	                                			}else if($product->discount_type == 2){
	                                				$discount = $product->regular_price * $product->discount_price / 100;
	                                				$amount = $product->regular_price - $discount;
	                                			}else{
	                                				$amount = $product->regular_price;
	                                			}
	                                		}
		                          		@endphp

		                          		@if ($product->discount_price > 0)
		                          			@if ($product->discount_type == 1)
	                                			<span class="stock-status out-stock"> ৳{{  $discount }} Off </span>
	                                		@elseif ($product->discount_type == 2)
	                                			<span class="stock-status out-stock"> {{  $product->discount_price }}% Off </span>
	                                		@endif
			                            @endif

			                            <input type="hidden" id="discount_amount" value="{{ $discount }}">
        <div class="col-lg-7">
          <h3 class="color-brand-3 mb-25">@if(session()->get('language') == 'bangla')
            {{ $product->name_bn }}
        @else
            {{ $product->name_en }}
        @endif</h3>
          <div class="border-bottom pt-10 mb-20"></div>
          <div class="box-product-price">
            <h3 class="color-brand-3 price-main d-inline-block mr-10">৳{{ $product->regular_price }}</h3>
            {{-- <span class="color-gray-500 price-line font-xl line-througt">$3225.6</span> --}}
          </div>
          {{-- <div class="product-description mt-20 color-gray-900">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="list-dot">
                  <li>8k super steady video</li>
                  <li>Nightography plus portait mode</li>
                  <li>50mp photo resolution plus bright display</li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="list-dot">
                  <li>Adaptive color contrast</li>
                  <li>premium design & craftmanship</li>
                  <li>Long lasting battery plus fast charging</li>
                </ul>
              </div>
            </div>
          </div> --}}
          {{-- <div class="box-product-color mt-20">
            <p class="font-sm color-gray-900">Color:<span class="color-brand-2 nameColor">Pink Gold</span></p>
            <ul class="list-colors">
              <li class="disabled"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="Ecom" title="Pink"></li>
              <li><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="Ecom" title="Gold"></li>
              <li><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="Ecom" title="Pink Gold"></li>
              <li><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="Ecom" title="Silver"></li>
              <li class="active"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="Ecom" title="Pink Gold"></li>
              <li class="disabled"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="Ecom" title="Black"></li>
              <li class="disabled"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="Ecom" title="Red"></li>
            </ul>
          </div> --}}
          {{-- <div class="box-product-style-size mt-20">
            <div class="row">
              <div class="col-lg-6 col-md-6 mb-20">
                <p class="font-sm color-gray-900">Style:<span class="color-brand-2 nameStyle">S22</span></p>
                <ul class="list-styles">
                  <li class="disabled" title="S22 Ultra">S22 Ultra</li>
                  <li class="active" title="S22">S22</li>
                  <li title="S22 + Standing Cover">S22 + Standing Cover</li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 mb-20">
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
          </div> --}}
          <div class="buy-product mt-30">
            <p class="font-sm mb-20">Quantity</p>
            <div class="box-quantity">
              <div class="input-quantity">
                <input class="font-xl color-brand-3" type="text" value="1">
                <span class="minus-cart">
                    </span><span class="plus-cart">

                    </span>
              </div>
              <input type="hidden" id="product_id" value="{{ $product->id }}"  min="1">

	                                        	<input type="hidden" id="pname" value="{{ $product->name_en }}">

	                                        	<input type="hidden" id="product_price" value="{{ $amount }}">

	                                        	<input type="hidden" id="minimum_buy_qty" value="{{ $product->minimum_buy_qty }}" >
	                                        	<input type="hidden" id="stock_qty" value="{{ $product->stock_qty }}">

	                                        	<input type="hidden" id="pvarient" value="">

												<input type="hidden" id="buyNowCheck" value="0">
              <div class="button-buy">
                <button type="submit" class="btn btn-cart" onclick="addToCart()" >Add to cart</button>
                <button type="submit" class="btn btn-buy" onclick="buyNow()">Buy now</button>
                </div>
            </div>
          </div>
          <div class="info-product mt-40">
            <div class="row align-items-end">
              <div class="col-lg-4 col-md-4 mb-20"><span class="font-sm font-medium color-gray-900">Regular Price:<span class="color-gray-500">{{ $product->regular_price }}</span><br>Category:<span class="color-gray-500">{{ $product->category->name_en ?? 'No Category'}} </span><br>Stock:<span class="color-gray-500">{{ $product->stock_qty}}</span></span></div>
              <div class="col-lg-4 col-md-4 mb-20"><span class="font-sm font-medium color-gray-900">Brand:<br><span class="color-gray-500">{{ $product->brand->name_en ?? 'No Brand'}} </span>
                <br>
            </span>
            </div>
              <div class="col-lg-4 col-md-4 mb-20 text-start text-md-end">
                {{-- <div class="d-inline-block">
                  <div class="share-link"><span class="font-md-bold color-brand-3 mr-15">Share</span><a class="facebook hover-up" href="#"></a><a class="printest hover-up" href="#"></a><a class="twitter hover-up" href="#"></a><a class="instagram hover-up" href="#"></a></div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box shop-template">
    <div class="container">
      <div class="pt-30 mb-10">
        <ul class="nav nav-tabs nav-tabs-product" role="tablist">
          <li><a class="active" href="#tab-description" data-bs-toggle="tab" role="tab" aria-controls="tab-description" aria-selected="true">Description</a></li>
          <li><a href="#tab-additional" data-bs-toggle="tab" role="tab" aria-controls="tab-additional" aria-selected="true">Additional information</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active show" id="tab-description" role="tabpanel" aria-labelledby="tab-description">
            <div class="display-text-short">
              <p>
                @if(session()->get('language') == 'bangla')
														{!! $product->description_en ?? 'No Product Long Descrption' !!}
								                    @else
														{!! $product->description_bn ?? 'No Product Logn Descrption' !!}
								                    @endif
              </p>
            </div>
            <div class="mt-20 text-center"><a class="btn btn-border font-sm-bold pl-80 pr-80 btn-expand-more">More Details</a></div>
          </div>
          <div class="tab-pane fade" id="tab-additional" role="tabpanel" aria-labelledby="tab-additional">
            <h5 class="mb-25">Additional information</h5>
            <div class="table-responsive">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>Product Code</td>
                    <td>
                      <p>{{$product->product_code ?? 'No Product Code'}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>Product Size</td>
                    <td>
                      <p>{{$product->product_size_en ?? 'No Product Size'}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>Product Color</td>
                    <td>
                      <p>{{$product->product_color_en ?? 'No Product Color'}}</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          {{-- <div class="border-bottom pt-30 mb-50"></div>
          <h4 class="color-brand-3">Related Products</h4> --}}
          {{-- <div class="list-products-5 mt-20">
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.html"><img src="assets/imgs/page/homepage1/imgsp3.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Dell</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-2.html">Dell Optiplex 9020 Small Form Business Desktop Tower</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.html"><img src="assets/imgs/page/homepage1/imgsp4.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">HP</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-2.html">HP 24 All-in-One PC, Intel Core i3-1115G4, 4GB RAM</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.html"><img src="assets/imgs/page/homepage1/imgsp5.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Gateway</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-2.html">Gateway 23.8&quot; All-in-one Desktop, Fully Adjustable</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.html"><img src="assets/imgs/page/homepage1/imgsp6.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">HP</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-2.html">HP 22 All-in-One PC, Intel Pentium Silver J5040, 4GB RAM</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-2.html"><img src="assets/imgs/page/homepage1/imgsp7.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Sceptre</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-2.html">Sceptre 24&quot; Professional Thin 75Hz 1080p LED Monitor</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- <div class="border-bottom pt-20 mb-40"></div>
          <h4 class="color-brand-3">You may also like</h4> --}}
          {{-- <div class="list-products-5 mt-20">
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp3.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">HP DeskJet 2755e Wireless Color All-in-One Printer</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp4.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">Razer Power Up Gaming Bundle V2 - Cynosa Lite</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp5.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">Apple AirPods Pro with MagSafe Charging Case</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp6.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">SAMSUNG Galaxy Tab A7 Lite, 8.7&quot; Tablet 32GB</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp7.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">HP 24mh FHD Monitor - Computer Monitor</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- <div class="border-bottom pt-20 mb-40"></div>
          <h4 class="color-brand-3">Recently viewed items</h4> --}}
          {{-- <div class="row mt-40">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card-grid-style-2 card-grid-none-border hover-up">
                <div class="image-box"><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp1.png" alt="Ecom"></a>
                </div>
                <div class="info-right"><span class="font-xs color-gray-500">Apple</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">SAMSUNG Galaxy Tab A7 Lite, 8.7&quot; Tablet 32GB</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card-grid-style-2 card-grid-none-border hover-up">
                <div class="image-box"><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp2.png" alt="Ecom"></a>
                </div>
                <div class="info-right"><span class="font-xs color-gray-500">Apple</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">Class 4K UHD (2160P) LED Roku Smart TV HDR</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card-grid-style-2 card-grid-none-border hover-up">
                <div class="image-box"><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp1.png" alt="Ecom"></a>
                </div>
                <div class="info-right"><span class="font-xs color-gray-500">Apple</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">HP 24mh FHD Monitor - Computer Monitor with 23.8-Inch</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card-grid-style-2 card-grid-none-border hover-up">
                <div class="image-box"><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp2.png" alt="Ecom"></a>
                </div>
                <div class="info-right"><span class="font-xs color-gray-500">Apple</span><br><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">Logitech H390 Wired Headset, Stereo Headphones</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- <div class="border-bottom pt-20 mb-40"></div>
          <h4 class="color-brand-3">Similar products to compare</h4> --}}
          {{-- <div class="list-products-5 mt-20">
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp3.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">Logitech MK345 Wireless Combo Full-Sized Keyboard</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp4.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">Logitech Brio 4K Webcam, Ultra 4K HD Video Calling</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp5.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">HP 24mh FHD Monitor - Computer Monitor</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp6.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">2022 Apple iMac with Retina 5K Display 8GB RAM</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-grid-style-3">
              <div class="card-grid-inner">
                <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="assets/imgs/page/homepage1/imgsp7.png" alt="Ecom"></a></div>
                <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">Seagate Portable 2TB External Hard Drive</a>
                  <div class="rating"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                  <div class="price-info"><strong class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span class="color-gray-500 price-line">$3225.6</span></div>
                  <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                  <ul class="list-features">
                    <li>27-inch (diagonal) Retina 5K display</li>
                    <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                    <li>AMD Radeon Pro 5300 graphics</li>
                  </ul>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </section>
  {{-- <div class="container mt-20">
    <div class="text-center"><a href="#"><img src="assets/imgs/page/product/banner-ads.png" alt="Ecom"></a></div>
  </div> --}}
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
            </form>
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
                      <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="product image"></figure>
                      <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="product image"></figure>
                    </div>
                  </div>
                  <div class="slider-nav-thumbnails-2">
                    <div>
                      <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="product image"></div>
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
                  <div class="rating d-inline-block"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500 font-medium"> (65 reviews)</span></div>
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
                    <li class="disabled"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="Ecom" title="Pink"></li>
                    <li><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="Ecom" title="Gold"></li>
                    <li><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="Ecom" title="Pink Gold"></li>
                    <li><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="Ecom" title="Silver"></li>
                    <li class="active"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="Ecom" title="Pink Gold"></li>
                    <li class="disabled"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="Ecom" title="Black"></li>
                    <li class="disabled"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="Ecom" title="Red"></li>
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

function cart(){
      $.ajax({
          type: 'GET',
          url: '/get-cart-product',
          dataType:'json',
          success:function(response){
            // console.log(response);
          var rows = "";
          // alert(Object.keys(response.carts).length);
          $('#total_cart_qty').text(Object.keys(response.carts).length);
          if(Object.keys(response.carts).length > 0){
              $.each(response.carts, function(key,value){
                        var slug = value.options.slug;
                        var base_url = window.location.origin;
                  rows += `
                  <div class="item-wishlist">
                    <div class="wishlist-cb">
                      <input class="cb-layout cb-select" type="checkbox">
                    </div>
                    <div class="wishlist-product">
                      <div class="product-wishlist">
                        <div class="product-image"><a href="shop-single-product.html"><img src="/${value.options.image}" alt="Ecom"></a></div>
                        <div class="product-info"><a href="${base_url}/product-details/${slug}">
                            <h6 class="color-brand-3">${value.name}</h6></a>
                        </div>
                      </div>
                    </div>
                    <div class="wishlist-price">
                      <h4 class="color-brand-3">৳${value.price}</h4>
                    </div>
                    <div class="wishlist-status">
                      <div class="box-quantity">
                        <div class="input-quantity">
                          <input class="font-xl color-brand-3" type="text" value="${value.qty}">


                        <button type="submit" style='border:none' class="minus-cart" id="${value.rowId}" onclick="cartDecrement(this.id)">

                            </button>
                         <button type="submit" style='border:none' class="plus-cart" id="${value.rowId}" onclick="cartIncrement(this.id)" >

                                </button>


                        </div>
                      </div>
                    </div>
                    <div class="wishlist-action">
                      <h4 class="color-brand-3">${value.qty * value.price } </h4>
                    </div>
                    <div class="wishlist-remove"><a class="btn btn-delete" id="${value.rowId}" onclick="cartRemove(this.id)"></a></div>
                  </div>`
                });

              $('#cartPage').html(rows);

            }else{
                html = '<tr><td class="text-center" colspan="6" style="font-size: 18px; font-weight: bold;">Cart empty!</td></tr>';
                $('#cartPage').html(html);
            }
        }
      });
    }
    cart();

    /* ==================== Start  cartIncrement ================== */
    function cartIncrement(rowId){
      $.ajax({
          type:'GET',
          url: "/cart-increment/"+rowId,
          dataType:'json',
          success:function(data){
            // console.log(data)
            cart();
            miniCart();

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

          }
      });
    }
    /* ==================== End  cartIncrement ================== */

    /* ==================== Start  Cart Decrement ================== */
        function cartDecrement(rowId){
          $.ajax({
              type:'GET',
              url: "/cart-decrement/"+rowId,
              dataType:'json',
              success:function(data){
                // console.log(data)
                //console.log(data);
                // if(data == 2){
                //     alert("#"+rowId);
                //     $("#"+rowId).attr("disabled", "true");
                // }
                cart();
                miniCart();
              }
          });
        }
    /* ==================== End  Cart Decrement ================== */

 /* ================ Start My Cart Remove Product =========== */
    function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '/cart-remove/'+id,
            dataType:'json',
            success:function(data){
            cart();
            miniCart();


            // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 2000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
            // End Message
            }
        });
    }

/* ==================== End My Cart Remove Product ================== */
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
</script>
@endpush
