<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
	<link href="{{ asset('FrontEnd') }}/frontend/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="frontend/css/fontawesome.min.css"> --}}
	{{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    <!-- Toastr css -->
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/toastr.css')}}">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('FrontEnd') }}/assets/imgs/template/favicon.png">
    <link href="{{ asset('FrontEnd') }}/assets/css/style.css?v=3.0.0" rel="stylesheet">

    <title>Kitchenaay | @yield('title')</title>
    <style>
        @media (max-width: 767px) {
        .header-search{
        display:block;
        }
        .font-lg{
        display:none;
        }
        .rs-banner {
            display: none;
        }
        .rs-swipr{
            height:200px!important;
        }
        .banner-big{
            height:200px!important;
        }

        .header .main-header .header-left .header-search {
        display: block!important;
        width:135%;
        float:right;
    }

        .fa-home-alt::before, .fa-home-lg-alt::before, .fa-home::before, .fa-house::before {
        content: "\f015";
    }
    .fw-600 {
        font-weight: 600;
    }
    .fs-10 {
        font-size: 10px;
    }
    .burger-icon {
        top: 13px;
        left: 42px;
    }




    }
        </style>


        <style>
        .mobile_fixed_bottom {
        position: fixed;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1030;
    }
    .gutters-5 {
        margin-right: -5px;
        margin-left: -5px;
    }
    .gutters-5 > .col, .gutters-5 > [class*="col-"] {
        padding-right: 5px;
        padding-left: 5px;
    }
    .mobile_bottom_nav_col {
        flex-basis: 0 !important;
        flex-grow: 1 !important;
        min-width: 0 !important;
        max-width: 100% !important;
    }
    .fw-600 {
        font-weight: 600;
    }
    placeholder {
        color: #838383;
    }
    moz-selection {
        background: #3BB77E;
        color: #fff;
    }
    .fa-home-alt::before, .fa-home-lg-alt::before, .fa-home::before, .fa-house::before {
        content: "\f015";
    }
    .col {
        flex: 1 0 0%;
    }
    .gutters-5 {
        margin-right: -5px;
        margin-left: -5px;
    }
    .align-items-center {
        align-items: center!important;
    }
    .text-reset {
        color: inherit!important;
    }
    .text-center {
        text-align: center!important;
    }
    .pb-2 {
        padding-bottom: 0.5rem!important;
    }
    .pt-3 {
        padding-top: 1rem!important;
    }
    .d-block {
        display: block!important;
    }
    .text-brand {
        color: #425A8B !important;
        line-height: 1.2;
    }
    .opacity-100 {
        opacity: 1 !important;
    }
    .fs-10 {
        font-size: 10px;

    }
    .d-block {
        display: block!important;
    }
    .mobile-card-nav {
        height: 50px;
        width: 50px;
        border-width: 4px !important;
        background-color: #3bb77e;
        border-radius: 50% !important;
    }
    .burger-icon > span.burger-icon-top {
        top: 5px!important;
    }
    .burger-icon > span.burger-icon-mid {
        top: 11px;
    }
    </style>
    @stack('css')
  </head>
  <body>
    @include('FrontEnd.include.header')

    <main class="main">

        @yield('content')
        @stack('old_css')

    </main>

    @include('FrontEnd.include.footer')

    <div class="nest-mobile-bottom-nav d-xl-none mobile_fixed_bottom bg-white shadow-lg border-top rounded-top" style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
        <div class="row align-items-center gutters-5">
            <div class="col mobile_bottom_nav_col">
                <a href="{{ route('home') }}" class="text-reset d-block text-center pb-2 pt-3">
                    <i class="fas fa-home fs-20 opacity-60 opacity-100 text-brand"></i>
                    <span class="d-block fs-10 fw-600">Home</span>
                </a>
            </div>
            <div class="col mobile_bottom_nav_col">
                <a href="{{ route('product.show') }}" class="text-reset d-block text-center pb-2 pt-3">
                    <span class="d-inline-block position-relative px-2">
                        <i class="fas fa-shopping-bag"></i>
                 </span>
                    <span class="d-block fs-10 fw-600">Shop</span>
                </a>
            </div>
            <div class="col-auto">
                <a href="{{ route('cart.show') }}" class="text-reset d-block text-center pb-2 pt-3">
                    <span class="mobile-card-nav align-items-center d-flex justify-content-center position-relative" style="margin-top: -33px;box-shadow: 0px -5px 10px rgb(0 0 0 / 15%);border-color: #fff !important;">
    <i class="fas fa-shopping-cart"></i>                </span>
                    <span class="d-block mt-1 fs-10 fw-600">
                        Cart
                        (<span class="cart-count cartQty"></span>)
                    </span>
                </a>
            </div>
            <div class="col mobile_bottom_nav_col">
                <a href="{{ route('contact.index') }}" class="text-reset d-block text-center pb-2 pt-3">
                    <span class="d-inline-block position-relative px-2">
    <i class="fas fa-address-book "></i>           </span>
                    <span class="d-block fs-10 fw-600">Contact</span>
                </a>
            </div>
            <div class="col mobile_bottom_nav_col">
                @auth
                <a href="{{ route('dashboard') }}" class="text-reset d-block text-center pb-2 pt-3">
                @endauth
                @guest
                <a href="{{ route('login') }}" class="text-reset d-block text-center pb-2 pt-3">
                @endguest
                    <span class="d-block mx-auto">
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="d-block fs-10 fw-600">Account</span>
                </a>
            </div>
        </div>
    </div>







 @include('FrontEnd.Js')
 <script src="{{asset('FrontEnd/assets/js/toastr.min.js')}}"></script>

 <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif

</script>
<!-- all toastr message show  old-->
<script type="text/javascript">
    @if(Session::has('success'))
      toastr.success("{{Session::get('success')}}");
    @endif
</script>


 @stack('js')

  </body>
</html>
