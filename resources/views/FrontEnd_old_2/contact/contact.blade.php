@extends('FrontEnd.master')
@section('content')
<div class="section-box">
    <div class="breadcrumbs-div mb-0">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="{{ route('home') }}">Home</a></li>
          <li><a class="font-xs color-gray-500" href="">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
  <section class="section-box shop-template mt-0">
    <div class="container">
      <div class="box-contact">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact-form">
              <h3 class="color-brand-3 mt-60">Contact Us</h3>
              <p class="font-sm color-gray-700 mb-30">Our team would love to hear from you!</p>
              <div class="row">
                <form action="{{ route('new-contact') }}" method="post">
                    @csrf
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="name" required>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email"  required>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="tel" name="phone" placeholder="Phone number" required>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Message" name="message" rows="5" required></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="btn btn-buy w-auto" type="submit" value="Send message">
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
          <div class="col-lg-6">
            {{-- <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d325467.51371614134!2d-73.98947743776016!3d40.72209526768085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1svi!2s!4v1664373110059!5m2!1svi!2s" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> --}}
          </div>
        </div>
      </div>
      
  </section>
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
</script>
    
@endpush