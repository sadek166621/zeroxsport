        {{-- <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 left-item">
                        <ul style="
                        cursor:pointer">
                            <li>

                                <a class="text-white" href="{{ route('seller.apply') }}">
                                    <i class="fa fa-user-tag"></i>
                                    @if (session()->get('language') == 'bangla')
                                    সেল করুন |
                                    @else
                                    Become a Seller |
                                    @endif
                                </a>
                            </li>

                        </ul>
                        <ul>
                            <li><a class="text-light" href="{{ route('page.help') }}">
                                    <i class="fas fa-question-circle"></i>
                                    @if (session()->get('language') == 'bangla')
                                    সাহায্য দরকার ?
                                    @else
                                    Need Help ?
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a class="text-light" href="#">
                                    <i class="fas fa-phone"></i>
                                    @if (session()->get('language') == 'bangla')
                                    আমাদের কল করুন : {{ get_setting('phone')->value }}
                                    @else
                                    Call Us: {{ get_setting('phone')->value }}
                                    @endif

                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 right-item">
                        <ul>
                            <li><a class="text-light" href="{{ route('order.tracking') }}">
                                    @if (session()->get('language') == 'bangla')
                                    অর্ডার ট্র্যাকিং
                                    @else
                                    Order Tracking
                                    @endif
                                </a></li>
                            <li class="text-light">|</li>
                            <li>
                                @if (session()->get('language') == 'bangla')
                                <a class="language-dropdown" style="color: white;"
                                    href="{{ route('english.language') }}">English</a>
                                @else
                                <a class="language-dropdown" style="color: white;"
                                    href="{{ route('bangla.language') }}">বাংলা</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}







        <div class="header-down">
            <div class="custom_container">
                <div class="menu">
                    <ul>
                        <li><a style="color:#fff;" href="{{ route('home') }}">
                                @if (session()->get('language') == 'bangla')
                                    হোম
                                @else
                                    Home
                                @endif
                            </a></li>
                        <li style="color:#fff;">|</li>
                        <li><a style="color:#fff;" href="{{ route('product.show') }}">
                                @if (session()->get('language') == 'bangla')
                                    শপ
                                @else
                                    Shop
                                @endif
                            </a></li>
                        <li style="color:#fff;">|</li>
                        <li><a style="color:#fff;" href="{{ route('category_list.index') }}">
                                @if (session()->get('language') == 'bangla')
                                    ক্যাটাগোরি
                                @else
                                    Categories
                                @endif
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>


           <!-- Button Menu Start -->
           <div>
            <nav class='mobile'>
                <ul>
                    <li><a href='{{ route('home') }}'><span><i class="fa-solid fa-house-chimney"></i>
                            </span><span>Home</span></a></li>

                    <li><a href='{{ route('product.show') }}'><span><i class="fa-solid fa-bag-shopping"></i>
                            </span><span>Shop</span></a></li>
                    <li><a href='{{ route('cart.show') }}'><span><i class="fa-solid fa-cart-shopping"></i> <small
                                    class="cartQty text-success">0</small></span>
                            <span>Cart</span></a> </li>

                    <li><a href='{{ route('category_list.index') }}'><span><i class="fa-solid fa-list"></i>
                            </span><span>Categories</span></a></li>

                    <li>
                        @auth
                            <a href='{{ route('dashboard') }}'>
                                <span>
                                    <i class="fa-regular fa-user" style="margin-left: 9px;">
                                    </i>
                                </span>
                                <span>Profile</span>
                            </a>
                        @endauth
                        @guest
                            <a href='{{ route('login') }}'>
                                <span>
                                    <i class="fa-regular fa-user" style="margin-left: 9px;">
                                    </i>
                                </span>
                                <span>Profile</span>
                            </a>
                        @endguest
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Button Menu End -->



          <!-- Mobile Nav Start -->
    <section class="d-block d-md-none">
     

     <!-- Search Bar Start-->
     <div class="container">

         <form class="d-flex search-box" role="search" action="{{ route('product.search') }}" method="post">
             @csrf
             <input class="form-control typewriter-effect" type="search" onfocus="search_result_show()"
                 onblur="search_result_hide()" name="search" placeholder="Search Product Here ..."
                 aria-label="Search">
             <button class="btn search-icon" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
         </form>
       
     </div>
     <!-- Search Bar End-->

  
 </section>
 <!-- Mobile Nav End -->