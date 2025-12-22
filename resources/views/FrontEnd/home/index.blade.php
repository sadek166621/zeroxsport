@extends('FrontEnd.master')
@section('title')
    Home
@endsection
@section('content')
<!-- Option & Slider Part Start -->
<style>
    /* Add loading styles as needed */
    .loading::after {
        content: '';
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid #fff;
        border-top: 2px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-left: 5px; /* Adjust as needed */
        vertical-align: middle;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<section class="option-slider container mt-5">


    <div class="row">
        <div class="col-md-3 d-none d-lg-block">
            <div class="sidemenu">
                <ul>
                    <li class="dropdown"><a href="{{route('category_list.index')}}">All Categories<span>&rsaquo;</span></a>
                    @foreach($categories as $category)
                        @if($category->type == 1)
                            @php $parent = $category->id @endphp
                            <li class="dropdown"><a href="{{route('product.category', $category->slug)}}">{{$category->name_en}}<span>&rsaquo;</span></a>
                                @php $child = findChildCategory($category->id) @endphp
                                @if(count($child)>0)
                                    <ul>
                                        @foreach($categories as $subcategory)
                                            @if($subcategory->parent_id == $category->id)
                                                <li class="dropdown_two"><a href="{{route('product.category', $subcategory->slug)}}">{{$subcategory->name_en}}</a>
{{--                                                    @php $child = findChildCategory($category->id) @endphp--}}
{{--                                                    @if(count($child)>0)--}}
{{--                                                        <ul>--}}
{{--                                                            @foreach($categories as $childSubCategory)--}}
{{--                                                                <li>{{$childSubCategory->name_en}}</li>--}}
{{--                                                            @endforeach--}}
{{--                                                        </ul>--}}
{{--                                                    @endif--}}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-9 slider">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($sliders as $index => $slider)
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>

                <div class="carousel-inner">
                    @foreach ($sliders as $index => $slider)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
                        <img src="{{ asset($slider->slider_img) }}" class="d-block w-100" alt="..."
                            style="height: 356px; width: 100%;">
                        <!-- Apply different height for mobile view using media query -->
                        <style>
                            @media (max-width: 767px) {
                                #carouselExampleInterval .carousel-item img {
                                    height: 129px !important;
                                }
                            }

                        </style>
                    </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
</section>
<!-- Option & Slider Part End -->

<!-- Camping Part Start -->
<section class="camping container d-none d-xl-block mt-5">
        @foreach($home_banners as $banner)
        <div class="camp-img">
            <a href=""><img src="{{ asset($banner->banner_img) }}" style="width: 1100px; height: 200px" alt=""></a>
        </div>
        @endforeach
</section>
<!-- Camping Part End -->

<!-- Verified PArt Start -->
<section class="verified container mt-5 p-3 d-none d-lg-block">
    <ul>
        <li><img src="{{ asset('FrontEnd') }}/assect/img/icon/safe.png" alt="" /><a href="">Safe Payments</a></li>
        <!-- <li>|</li> -->
        <li><img src="{{ asset('FrontEnd') }}/assect/img/icon/car.png" alt="" /><a href="">Nationwide Delivery</a></li>
        <!-- <li>|</li> -->
        <li><img src="{{ asset('FrontEnd') }}/assect/img/icon/back.png" alt="" /><a href="#">Free &amp; Easy Return</a>
        </li>
        <!-- <li>|</li> -->
        <li><img src="{{ asset('FrontEnd') }}/assect/img/icon/best.png" alt="" /><a href="">Best Price Guaranteed</a>
        </li>
        <!-- <li>|</li> -->
        <li><img src="{{ asset('FrontEnd') }}/assect/img/icon/right.png" alt="" /><a href="">100% Authentic Products</a>
        </li>
        <!-- <li>|</li> -->
{{--        <li><img src="{{ asset('FrontEnd') }}/assect/img/icon/safe.png" alt="" /><a href="">Daraz Verified</a></li>--}}

    </ul>
</section>
<!-- Verified Part End -->

<!-- Services Part Start -->
<section class="services container owl-carousel owl-theme owl-loaded mt-5 bg-white p-3 d-none">
    <div class="owl-stage-outer">
        <div class="row owl-stage g-1">
            <div class="col owl-item">
                <a class="card" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/wholesale price.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Wholesale Price</p>
                </a>
            </div>
            <div class="col owl-item">
                <a class="card" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/everyday low price.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Everyday Low Price!</p>
                </a>
            </div>
            <div class="col owl-item">
                <a class="card" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/free delivery.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Free Delivery</p>
                </a>
            </div>
            <div class="col owl-item">
                <a class="card" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/fashion.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Fashion</p>
                </a>
            </div>
            <div class="col owl-item">
                <a class="card" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/beauty & glamour.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Beauty & Glamour</p>
                </a>
            </div>
            <div class="col owl-item">
                <a class="card" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/mart.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Mart</p>
                </a>
            </div>
            <div class="col owl-item">
                <a class="card" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/home makeover.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Home Makeover</p>
                </a>
            </div>
            <div class="col owl-item">
                <a class="card" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/best price.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Best Price Guaranteed</p>
                </a>
            </div>
            <div class="col owl-item">
                <a class="card last" href="#"><img src="{{ asset('FrontEnd') }}/assect/img/services/visa card.png"
                        class="card-img-top" alt="...">
                    <p class="product-text">Payment</p>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Services Part End -->

<!-- Flash Sale Start -->
<section class="flash-sale container owl-carousel owl-theme owl-loaded mt-5 d-none">
    <h2>Flash Sale</h2>
    <div class="owl-stage-outer bg-white py-3 px-1">
        <div class="d-flex justify-content-between align-items-center px-3">
            <div class="d-flex">
                <h5 class="me-5">On Sale Now</h5>
                <h5 class="trimmers d-none d-md-block">Ending in <span>03</span> : <span>47</span> : <span>
                        45</span></h5>
            </div>
            <div>
                <a class="btn-primary" href="">SHOP MORE</a>
            </div>
        </div>
        <hr>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 owl-stage g-2">
            <div class="col owl-item">
                <div class="card h-100">
                    <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                    <img src="{{ asset('FrontEnd') }}/assect/img/product/man-watch.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="product-text">This is Brown Round Quartx Watch With Leather......</p>
                        <h5 class="product-price">BDT 581</h5>
                        <p class="discount-percent"><span class="discount-price">BDT 800</span> - 27%</p>
                        <small class="product-ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="ratings">(105)</i>
                        </small>
                        <div class="text-center">
                            <button type="button" class="buy_now">Buy Now</button>
                            <button type="button" class="buy_now">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col owl-item">
                <div class="card h-100">
                    <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                    <img src="{{ asset('FrontEnd') }}/assect/img/product/watch.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="product-text">This is Brown Round Quartx Watch With Leather......</p>
                        <h5 class="product-price">BDT 581</h5>
                        <p class="discount-percent"><span class="discount-price">BDT 800</span> - 27%</p>
                        <small class="product-ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="ratings">(105)</i>
                        </small>
                        <div class="text-center">
                            <button type="button" class="buy_now">Buy Now</button>
                            <button type="button" class="buy_now">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col owl-item">
                <div class="card h-100">
                    <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                    <img src="{{ asset('FrontEnd') }}/assect/img/product//bracelet.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="product-text">This is Brown Round Quartx Watch With Leather......</p>
                        <h5 class="product-price">BDT 581</h5>
                        <p class="discount-percent"><span class="discount-price">BDT 800</span> - 27%</p>
                        <small class="product-ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="ratings">(105)</i>
                        </small>
                        <div class="text-center">
                            <button type="button" class="buy_now">Buy Now</button>
                            <button type="button" class="buy_now">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col owl-item">
                <div class="card h-100">
                    <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                    <img src="{{ asset('FrontEnd') }}/assect/img/product/card-holder.webp" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="product-text">This is Brown Round Quartx Watch With Leather......</p>
                        <h5 class="product-price">BDT 581</h5>
                        <p class="discount-percent"><span class="discount-price">BDT 800</span> - 27%</p>
                        <small class="product-ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="ratings">(105)</i>
                        </small>
                        <div class="text-center">
                            <button type="button" class="buy_now">Buy Now</button>
                            <button type="button" class="buy_now">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col owl-item">
                <div class="card h-100">
                    <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                    <img src="{{ asset('FrontEnd') }}/assect/img/product//t-shirt.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="product-text">This is Brown Round Quartx Watch With Leather......</p>
                        <h5 class="product-price">BDT 581</h5>
                        <p class="discount-percent"><span class="discount-price">BDT 800</span> - 27%</p>
                        <small class="product-ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="ratings">(105)</i>
                        </small>
                        <div class="text-center">
                            <button type="button" class="buy_now">Buy Now</button>
                            <button type="button" class="buy_now">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col owl-item">
                <div class="card h-100">
                    <span class="favorite"><i class="fa-regular fa-heart"></i></span>
                    <img src="{{ asset('FrontEnd') }}/assect/img/product/room-slipper.webp" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="product-text">This is Brown Round Quartx Watch With Leather......</p>
                        <h5 class="product-price">BDT 581</h5>
                        <p class="discount-percent"><span class="discount-price">BDT 800</span> - 27%</p>
                        <small class="product-ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="ratings">(105)</i>
                        </small>
                        <div class="text-center">
                            <button type="button" class="buy_now">Buy Now</button>
                            <button type="button" class="buy_now">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Flash Sale End -->

<!-- Categories Part Start -->
<section class="categories container owl-carousel owl-theme owl-loaded mt-5">
    <h2>Categories</h2>
    <hr>
    <div class="owl-stage-outer">
        <div class="row owl-stage g-1">
            @foreach($featured_category as $fc)
            <div class="col owl-item">
                <a class="card" href="{{ route('product.category', $fc->slug) }}"><img src="{{ asset($fc->image) }}"
                        class="card-img-top" alt="...">
                    <p class="product-text">{{ $fc->name_en }}</p>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Categories Part End -->
<!-- Just For You Start -->
<section class="just-for-you container mt-5">
    <h2>Just For You</h2>
    <hr>

    <div id="product-container" class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-2">
        @foreach ($product_trendings as $product_trending )
            @php $data = calculateDiscount($product_trending->id); @endphp
        <div class="col">
{{--            <?php $discountPercentage = round((($product_trending->regular_price - $product_trending->discount_price) / $product_trending->regular_price) * 100); ?>--}}
            <div class="card h-100">

{{--                <span class="favorite"><i class="fa-regular fa-heart"></i></span>--}}
                <a href="{{route('product.details', $product_trending->slug)}}">
                    <img src="{{ asset($product_trending->product_thumbnail) }}" class="card-img-top" alt="...">
                </a>


                <div class="card-body">
                    <a href="{{route('product.details', $product_trending->slug)}}">
                        <p class="product-text">{!! Str::substr($product_trending->name_en, 0, 20) !!}{{Str::length($product_trending->name_en) > 20 ? '...':''}}</p>
                    </a>
                    @php $data = calculateDiscount($product_trending->id); @endphp
                    <h5 class="product-price">৳{{ $data['discount'] }}</h5>
                    <p class="discount-percent"><span
                            class="discount-price">৳{{ $product_trending->regular_price }}</span> {{$data['text']}}
                        </p>
                    <small class="product-ratings">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="ratings">({{ $product_trending->stock_qty }})</i>
                    </small>
                    <div class="text-center">
                        {{-- <input type="hidden" id="buyNowCheck" value="0"> --}}
                        <button type="submit" onclick="buyNow({{ $product_trending->id }})" class="buy_now">Buy Now</button>
                        @if($product_trending->is_varient == 1)
                        <button type="button" id="{{ $product_trending->id }}" onclick="productView(this.id)"
                            data-bs-toggle="modal" data-bs-target="#quickViewModal" class="add_to_cart">Add to Cart</button>
                        @else
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id" value="{{ $product_trending->id }}" min="1">
                        <input type="hidden" id="{{ $product_trending->id }}-product_pname"
                            value="{{ $product_trending->name_en }}">
                        <button type="button" onclick="addToCartDirect({{ $product_trending->id }})" class="add_to_cart">Add
                            to Cart</button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<div class="text-center my-5">
    <button type="button" id="load-more-btn" class="view_more">View More</button>
</div>

<!-- Just For You End -->
@endsection
@push('js')
<script>
    // function addToCart() {
    //     var total_attributes = parseInt($('#total_attributes').val());
    //     //alert(total_attributes);
    //     var checkNotSelected = 0;
    //     var checkAlertHtml = '';
    //     for (var i = 1; i <= total_attributes; i++) {
    //         var checkSelected = parseInt($('#attribute_check_' + i).val());
    //         if (checkSelected == 0) {
    //             checkNotSelected = 1;
    //             checkAlertHtml += `<div class="attr-detail mb-5">
	// 										<div class="alert alert-danger d-flex align-items-center" role="alert">
	// 											<div>
	// 												<i class="fa fa-warning mr-10"></i> <span> Select ` + $('#attribute_name_' + i).val() + `</span>
	// 											</div>
	// 										</div>
	// 									</div>`;
    //         }
    //     }
    //     if (checkNotSelected == 1) {
    //         $('#qty_alert').html('');
    //         //$('#attribute_alert').html(checkAlertHtml);
    //         $('#attribute_alert').html(`<div class="attr-detail mb-5">
	// 										<div class="alert alert-danger d-flex align-items-center" role="alert">
	// 											<div>
	// 												<i class="fa fa-warning mr-10"></i> <span> Select all attributes</span>
	// 											</div>
	// 										</div>
	// 									</div>`);
    //         return false;
    //     }
    //     $('.size-filter li').removeClass("active");
    //     var product_name = $('#pname').val();
    //     var id = $('#product_id').val();
    //     var price = $('#product_price').val();
    //     var color = $('#color option:selected').val();
    //     var size = $('#size option:selected').val();
    //     var quantity = $('#qty').val();
    //     var varient = $('#pvarient').val();
    //
    //     var min_qty = parseInt($('#minimum_buy_qty').val());
    //     if (quantity < min_qty) {
    //         $('#attribute_alert').html('');
    //         $('#qty_alert').html(`<div class="attr-detail mb-5">
	// 										<div class="alert alert-danger d-flex align-items-center" role="alert">
	// 											<div>
	// 												<i class="fa fa-warning mr-10"></i> <span> Minimum quantity ` + min_qty + ` required.</span>
	// 											</div>
	// 										</div>
	// 									</div>`);
    //         return false;
    //     }
    //     // console.log(min_qty);
    //     var p_qty = parseInt($('#stock_qty').val());
    //     // if(quantity > p_qty){
    //     //     $('#stock_alert').html(`<div class="attr-detail mb-5">
    //     // 								<div class="alert alert-danger d-flex align-items-center" role="alert">
    //     // 									<div>
    //     // 										<i class="fa fa-warning mr-10"></i> <span> Not enough stock.</span>
    //     // 									</div>
    //     // 								</div>
    //     // 							</div>`);
    //     //     return false;
    //     // }
    //
    //
    //     // alert(varient);
    //
    //     var options = $('#choice_form').serializeArray();
    //     var jsonString = JSON.stringify(options);
    //     //console.log(options);
    //
    //     // Start Message
    //     const Toast = Swal.mixin({
    //         toast: true,
    //         position: 'top-end',
    //         icon: 'success',
    //         showConfirmButton: false,
    //         timer: 1200
    //     });
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: '/cart/data/store/' + id,
    //         dataType: 'json',
    //         data: {
    //             color: color,
    //             size: size,
    //             quantity: quantity,
    //             product_name: product_name,
    //             product_price: price,
    //             product_varient: varient,
    //             options: jsonString,
    //         },
    //         success: function (data) {
    //             // console.log(data);
    //             miniCart();
    //             $('#closeModel').click();
    //
    //             // Start Sweertaleart Message
    //             if ($.isEmptyObject(data.error)) {
    //                 const Toast = Swal.mixin({
    //                     toast: true,
    //                     position: 'top-end',
    //                     icon: 'success',
    //                     showConfirmButton: false,
    //                     timer: 1200
    //                 })
    //
    //                 Toast.fire({
    //                     type: 'success',
    //                     title: data.success
    //                 })
    //
    //                 $('#qty').val(min_qty);
    //                 $('#pvarient').val('');
    //
    //                 for (var i = 1; i <= total_attributes; i++) {
    //                     $('#attribute_check_' + i).val(0);
    //                 }
    //
    //             } else {
    //                 const Toast = Swal.mixin({
    //                     toast: true,
    //                     position: 'top-end',
    //                     icon: 'error',
    //                     showConfirmButton: false,
    //                     timer: 1200
    //                 })
    //
    //                 Toast.fire({
    //                     type: 'error',
    //                     title: data.error
    //                 })
    //
    //                 $('#qty').val(min_qty);
    //                 $('#pvarient').val('');
    //
    //                 for (var i = 1; i <= total_attributes; i++) {
    //                     $('#attribute_check_' + i).val(0);
    //                 }
    //             }
    //             // Start Sweertaleart Message
    //             var buyNowCheck = $('#buyNowCheck').val();
    //             //alert(buyNowCheck);
    //             if (buyNowCheck && buyNowCheck == 1) {
    //                 $('#buyNowCheck').val(0);
    //                 window.location = '/checkout';
    //             }
    //
    //         }
    //     });
    // }


    function miniCartRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/' + rowId,
            dataType: 'json',
            success: function (data) {

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
                } else {
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
<script>
    var offset = 12;

    $('#load-more-btn').click(function () {
        // Show loader
        showLoader();

        $.ajax({
            url: '/load-more-products',
            method: 'GET',
            data: {
                offset: offset
            },
            success: function (response) {
                var products = response.products;

                if (products.length > 0) {
                    products.forEach(function (product) {
                        var discountPercentage = Math.round(((product.regular_price - product.discount_price) / product.regular_price) * 100);
                        // Append the new products to the container using JavaScript variables
                        var productHtml = `
                            <div class="col">
                                <div class="card h-100">
                                    <a href="{{route('product.details', '')}}/${product.slug}">
                                        <img src="${product.product_thumbnail}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <a href="{{route('product.details', '')}}/${product.slug}">
                                            <p class="product-text">${product.name_en.substring(0, 20)}${product.name_en.length > 20 ? '...' : ''}</p>
                                        </a>
                                        <h5 class="product-price">৳${product.discount_price}</h5>
                                        <p class="discount-percent"><span class="discount-price">৳${product.regular_price}</span> - ${discountPercentage}%</p>
                                        <small class="product-ratings">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="ratings">(${product.stock_qty})</i>
                                        </small>
                                        <div class="text-center">
                                            <button type="submit" onclick="buyNow(${product.id})" class="buy_now">Buy Now</button>
                                            ${product.is_varient == 1 ?
                                                `<button type="button" onclick="productView(${product.id})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="add_to_cart">Add to Cart</button>` :
                                                `<input type="hidden" id="pfrom" value="direct">
                                                <input type="hidden" id="product_product_id" value="${product.id}" min="1">
                                                <input type="hidden" id="${product.id}-product_pname" value="${product.name_en}">
                                                <button type="button" onclick="addToCartDirect(${product.id})" class="add_to_cart">Add to Cart</button>`
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        $('#product-container').append(productHtml);
                    });

                    offset += products.length;
                } else {
                    // If no more products to load, hide the "Load More" button
                    $('#load-more-btn').hide();
                }
            },
            error: function (error) {
                console.error(error);
            },
            complete: function () {
                // Hide loader regardless of success or error
                hideLoader();
            }
        });
    });

    function showLoader() {
        // Add loader class to the button or any other container you want
        $('#load-more-btn').addClass('loading');
    }

    function hideLoader() {
        // Remove loader class from the button or any other container
        $('#load-more-btn').removeClass('loading');
    }
</script>
@endpush
