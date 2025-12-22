@extends('FrontEnd.master')
@section('title')
Shop
@endsection
@section('content')
<style>
    .list-checkbox {
    display: inline-block;
    width: 100%;
    padding: 12px 1px 9px 17px;
}
</style>
<div class="section-box shop-template mt-30">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 order-first order-lg-last">
            {{-- @foreach ($products as $product )
          <div class="banner-ads-top mb-30"><a href="shop-single-product-3.html"><img src="{{ asset($product->category->image)}}" alt="Ecom"></a></div>
          @endforeach --}}

          {{-- <div class="box-filters mt-0 pb-5 border-bottom">
            <div class="row">
              <div class="col-xl-2 col-lg-3 mb-10 text-lg-start text-center"><a class="btn btn-filter font-sm color-brand-3 font-medium" href="#ModalFiltersForm" data-bs-toggle="modal">All Fillters</a></div>
              <div class="col-xl-10 col-lg-9 mb-10 text-lg-end text-center"><span class="font-sm color-gray-900 font-medium border-1-right span">Showing 1&ndash;16 of 17 results</span>
                <div class="d-inline-block"><span class="font-sm color-gray-500 font-medium">Sort by:</span>
                  <div class="dropdown dropdown-sort border-1-right">
                    <button class="btn dropdown-toggle font-sm color-gray-900 font-medium" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false">Latest products</button>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort" style="margin: 0px;">
                      <li><a class="dropdown-item active" href="#">Latest products</a></li>
                      <li><a class="dropdown-item" href="#">Oldest products</a></li>
                      <li><a class="dropdown-item" href="#">Comments products</a></li>
                    </ul>
                  </div>
                </div>
                <div class="d-inline-block"><span class="font-sm color-gray-500 font-medium">Show</span>
                  <div class="dropdown dropdown-sort border-1-right">
                    <button class="btn dropdown-toggle font-sm color-gray-900 font-medium" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>30 items</span></button>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                      <li><a class="dropdown-item active" href="#">30 items</a></li>
                      <li><a class="dropdown-item" href="#">50 items</a></li>
                      <li><a class="dropdown-item" href="#">100 items</a></li>
                    </ul>
                  </div>
                </div>
                <div class="d-inline-block"><a class="view-type-grid mr-5 active" href="shop-grid.html"></a><a class="view-type-list" href="shop-list.html"></a></div>
              </div>
            </div>
          </div> --}}
          <div class="row mt-20">
            @forelse ($products as $product )
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">


                <div class="card-grid-style-3">
                    <div class="card-grid-inner">
                      <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend" data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10" href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html" aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view" href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                      <div class="image-box">
                        {{-- <span class="label bg-brand-2"></span> --}}
                        <a href="{{ route('product.details',$product->slug) }}">
                            @if($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                            <img class="default-img" src="{{ asset($product->product_thumbnail) }}" alt="" />
                            <img class="hover-img" src="{{ asset($product->product_thumbnail) }}" alt="" />
                        @else
                            <img class="img-lg mb-3" src="{{ asset('upload/no_image.jpg') }}" alt="" />
                        @endif
                    </a>
                </div>
                      <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">{{ $product->category->name_en }}</a>
                        <br>
                        <a class="color-brand-3 font-sm-bold" href="shop-single-product.html">{{ $product->name_en }}</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom">
                            <img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom">
                            <img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom">
                            <img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom">
                            <img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom">
                            <span class="font-xs color-gray-500"> (0)</span>
                        </div>
                        @if ($product->discount_price > 0)
                            <strong class="color-gray-500 price-line">{{ $product->discount_price }}</strong>
                            <span class="font-lg-bold color-brand-3 price-main ">{{ $product->regular_price }}</span>
                        </div>
                        @else
                        <span class="font-lg-bold color-brand-3 price-main">{{ $product->regular_price }}</span>

                        @endif


                     @if($product->is_varient == 1)
                     {{-- <a class="add" id="{{ $product->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-shopping-cart mr-5"></i>Add </a> --}}
                     <div class="mt-20 box-btn-cart"><a class="btn btn-cart" id="{{ $product->id }}" onclick="productView(this.id)" data-bs-toggle="modal" data-bs-target="#quickViewModal">Add To Cart</a></div>

                    @else
                        <input type="hidden" id="pfrom" value="direct">
                        <input type="hidden" id="product_product_id" value="{{ $product->id }}"  min="1">
                        <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">
                        <div class="mt-20 box-btn-cart"><a class="btn btn-cart" onclick="addToCartDirect({{ $product->id }})">Add To Cart</a></div>
                    @endif

                      </div>
                    </div>
                  </div>
            </div>
            @empty
            @if(session()->get('language') == 'bangla')
                <h2 class="text-danger">এখানে কোন পণ্য খুঁজে পাওয়া যায়নি!</h5>
            @else
                   <h2 class="text-danger">No products were found here!</h5>
            @endif
            @endforelse


          </div>
          <nav>
            <ul class="pagination">
              <li class="page-item"><a class="page-link page-prev" href="#"></a></li>
              <li class="page-item"><a class="page-link active" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link page-next" href="#"></a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3 order-last order-lg-first">

          <div class="sidebar-border mb-40">
            <div class="sidebar-head">
              <h6 class="color-gray-900">Products Filter</h6>
            </div>
            <div class="sidebar-content">
              <h6 class="color-gray-900 mt-10 mb-10">Price</h6>
              <div class="box-slider-range mt-20 mb-15">
                <div class="row mb-20">
                  <div class="col-sm-12">
                    <div id="slider-range"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <label class="lb-slider font-sm color-gray-500">Price Range:</label><span class="min-value-money font-sm color-gray-1000"></span>
                    <label class="lb-slider font-sm font-medium color-gray-1000"></label>-
                    <span class="max-value-money font-sm font-medium color-gray-1000"></span>
                  </div>
                  <div class="col-lg-12">
                    <input class="form-control min-value" type="hidden" name="min-value" value="">
                    <input class="form-control max-value" type="hidden" name="max-value" value="">
                  </div>
                </div>
              </div>
              <ul class="list-checkbox">
                @foreach(get_categories() as $category)
                                <div class="mb-2">
                                    @php
                                        $checked = [];
                                        if(isset($_GET['filtercategory'])){
                                            $checked = $_GET['filtercategory'];
                                        }
                                    @endphp
                                    <input class="form-check-input" type="checkbox" name="filtercategory[]" id="category_{{$category->id}}" value="{{$category->name_en}}"
                                        @if(in_array($category->name_en, $checked)) checked @endif
                                    />
                                    <label class="form-check-label" for="category_{{$category->id}}">
                                        <span>
                                            @if(session()->get('language') == 'bangla')
                                                {{ $category->name_bn }}
                                            @else
                                                {{ $category->name_en }}
                                            @endif
                                        </span>
                                    </label>
                                    <span class="float-end">{{ count($category->products) }}</span>
                                    <br>
                                </div>
                            @endforeach
              </ul><a class="btn btn-filter font-sm color-brand-3 font-medium mt-10" href="#ModalFiltersForm" data-bs-toggle="modal">More Fillters</a>
            </div>
          </div>
          <div class="box-slider-item mb-30">
            <div class="head pb-15 border-brand-2">
              <h5 class="color-gray-900">Best seller</h5>
            </div>
            <div class="content-slider">
              <div class="box-swiper slide-shop">
                <div class="swiper-container swiper-best-seller">
                  <div class="swiper-wrapper pt-5">
                    <div class="swiper-slide">
                      <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                        <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/homepage2/camera.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">HP Slim Desktop, Intel Celeron J4025, 4GB RAM</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                          <div class="price-info"><strong class="font-md-bold color-brand-3 price-main">$150</strong><span class="color-gray-500 font-sm price-line">$187</span>
                          </div>
                        </div>
                      </div>
                      <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                        <div class="image-box"><a href="shop-single-product-3.html"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/homepage2/clock.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">Class 4K UHD (2160P) LED Roku Smart TV HDR</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                          <div class="price-info"><strong class="font-md-bold color-brand-3 price-main">$2900</strong><span class="color-gray-500 font-sm price-line">$3200</span>
                          </div>
                        </div>
                      </div>
                      <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                        <div class="image-box"><a href="shop-single-product-3.html"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/homepage2/airpod.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">HP 11.6&quot; Chromebook, AMD A4, 4GB RAM, 32GB Storage</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                          <div class="price-info"><strong class="font-md-bold color-brand-3 price-main">$160</strong><span class="color-gray-500 font-sm price-line">$168</span>
                          </div>
                        </div>
                      </div>
                      <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                        <div class="image-box"><a href="shop-single-product-3.html"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/homepage2/cat-img-7.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">LG 65&quot; Class 4K UHD Smart TV OLED A1 Series</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                          <div class="price-info"><strong class="font-md-bold color-brand-3 price-main">$325</strong><span class="color-gray-500 font-sm price-line">$392</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                        <div class="image-box"><a href="shop-single-product-3.html"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/homepage2/cat-img-8.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">Lenovo Legion 5i 15.6&quot; Laptop, Intel Core i5</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                          <div class="price-info"><strong class="font-md-bold color-brand-3 price-main">$150</strong><span class="color-gray-500 font-sm price-line">$187</span>
                          </div>
                        </div>
                      </div>
                      <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                        <div class="image-box"><span class="label bg-brand-2">-17%</span><a href="shop-single-product-3.html"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/homepage2/cat-img-1.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">SAMSUNG Galaxy Tab A7 Lite, 8.7&quot; Tablet 32GB</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                          <div class="price-info"><strong class="font-md-bold color-brand-3 price-main">$2900</strong><span class="color-gray-500 font-sm price-line">$3200</span>
                          </div>
                        </div>
                      </div>
                      <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                        <div class="image-box"><a href="shop-single-product-3.html"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/homepage2/cat-img-2.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">Apple AirPods Pro with MagSafe Charging</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                          <div class="price-info"><strong class="font-md-bold color-brand-3 price-main">$160</strong><span class="color-gray-500 font-sm price-line">$168</span>
                          </div>
                        </div>
                      </div>
                      <div class="card-grid-style-2 card-grid-none-border border-bottom mb-10">
                        <div class="image-box"><a href="shop-single-product-3.html"><img src="{{ asset('FrontEnd') }}/assets/imgs/page/homepage2/cat-img-3.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><a class="color-brand-3 font-xs-bold" href="shop-single-product-3.html">Razer Power Up Gaming Bundle V2 - Cynosa</a>
                          <div class="rating"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><img src="{{ asset('FrontEnd') }}/assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                          <div class="price-info"><strong class="font-md-bold color-brand-3 price-main">$325</strong><span class="color-gray-500 font-sm price-line">$392</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-button-next swiper-button-next-style-2 swiper-button-next-bestseller"></div>
                <div class="swiper-button-prev swiper-button-prev-style-2 swiper-button-prev-bestseller"></div>
              </div>
            </div>
          </div>
          <div class="box-slider-item">
            <div class="head pb-15 border-brand-2">
              <h5 class="color-gray-900">Product Tags</h5>
            </div>
            <div class="content-slider mb-50"><a class="btn btn-border mr-5" href="shop-grid.html">Games</a><a class="btn btn-border mr-5" href="shop-grid.html">Electronics</a><a class="btn btn-border mr-5" href="shop-grid.html">Video</a><a class="btn btn-border mr-5" href="shop-grid.html">Cellphone</a><a class="btn btn-border mr-5" href="shop-grid.html">Indoor</a><a class="btn btn-border mr-5" href="shop-grid.html">VGA Card</a><a class="btn btn-border mr-5" href="shop-grid.html">USB</a><a class="btn btn-border mr-5" href="shop-grid.html">Lightning</a><a class="btn btn-border mr-5" href="shop-grid.html">Camera</a><a class="btn btn-border" href="shop-grid.html">Window</a><a class="btn btn-border mr-5" href="shop-grid.html">Air Vent</a><a class="btn btn-border mr-5" href="shop-grid.html">Bedroom</a><a class="btn btn-border mr-5" href="shop-grid.html">Laptop</a><a class="btn btn-border mr-5" href="shop-grid.html">Dashboard</a><a class="btn btn-border mr-5" href="shop-grid.html">Keyboard</a></div>
          </div>
          <div class="banner-right h-500 text-center mb-30"><span class="text-no font-11">No.9</span>
            <h5 class="font-23 mt-20">Sensitive Touch<br class="d-none d-lg-block">without fingerprint</h5>
            <p class="text-desc font-16 mt-15">Smooth handle and accurate click</p><a href="shop-single-product-2.html">View Details</a>
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
