@extends('FrontEnd.master')
@section('title')
    About Us
@endsection
@section('content')

    <!-- Header Start -->
    <!-- <div class="py-5 mb-4" style="background-color: #f8f9fa;">
        <div class="custom_custom_container">
            <div class="row justify-content-center">
                <div class="text-start">
                    <h2 class="display-6">{{get_setting('site_name')->value ?? ''}}</h2>
                    <div class="d-flex justify-content-start mt-3">
                        <p class="m-0"><a href="{{route('home')}}" style="color: #01B45E; text-decoration: none;">Home</a>
                        </p>
                        <p class="m-0 px-2">-</p>
                        <p class="m-0">About Us</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Hero Section Start -->
    <div class="position-relative mb-5">
        <div
            style="background: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8') center/cover no-repeat; height: 500px;">
            <div style="background-color: rgba(0, 0, 0, 0.6); height: 100%;">
                <div class="custom_container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-8">
                            <h1 class="display-4 text-white mb-4">Building Trust Through Quality Service</h1>
                            <p class="lead text-white mb-4">We're more than just an e-commerce platform - we're your trusted
                                partner in online shopping. Discover our story of innovation, reliability, and customer
                                dedication.</p>
                            <div class="d-flex gap-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-2x text-white me-2"></i>
                                    <div class="text-white">
                                        <h4 class="mb-0">10K+</h4>
                                        <p class="mb-0">Happy Customers</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star fa-2x text-white me-2"></i>
                                    <div class="text-white">
                                        <h4 class="mb-0">4.8/5</h4>
                                        <p class="mb-0">Customer Rating</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="transform: translateY(50%);">
            <div class="custom_container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="bg-white rounded-3 p-4 shadow" style="border-left: 5px solid #01B45E;">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="mb-2">Ready to Start Shopping?</h4>
                                    <p class="mb-md-0">Join thousands of satisfied customers who trust our platform.</p>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <a href="" class="btn btn-lg px-4"
                                        style="background-color: #01B45E; color: white;">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <div class="custom_container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0" alt="About Us"
                    class="img-fluid rounded" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4" style="color: #01B45E;">Your Trusted Shopping Partner</h2>
                <p class="mb-4">Welcome to our premium ecommerce platform where quality meets convenience. We've been
                    serving our customers with the best products and exceptional shopping experience since our inception.
                </p>
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-3" style="background-color: #f8f9fa; border-radius: 10px;">
                            <i class="fas fa-shield-alt fa-2x me-3" style="color: #01B45E;"></i>
                            <div>
                                <h5 class="mb-1">100% Secure</h5>
                                <p class="mb-0 small">Safe & Secure Shopping</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-3" style="background-color: #f8f9fa; border-radius: 10px;">
                            <i class="fas fa-truck fa-2x me-3" style="color: #01B45E;"></i>
                            <div>
                                <h5 class="mb-1">Fast Delivery</h5>
                                <p class="mb-0 small">Nationwide Shipping</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Features Section Start -->
    <div style="background-color: #f8f9fa;" class="py-5">
        <div class="custom_container">
            <div class="text-center mb-5">
                <h2 style="color: #01B45E;">Why Choose Us</h2>
                <p>Discover the advantages of shopping with us</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card border-0 h-100"
                        style="background-color: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-box-open fa-3x mb-3" style="color: #01B45E;"></i>
                            <h4>Quality Products</h4>
                            <p class="mb-0">Curated selection of premium products from trusted brands</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 h-100"
                        style="background-color: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-headset fa-3x mb-3" style="color: #01B45E;"></i>
                            <h4>24/7 Support</h4>
                            <p class="mb-0">Round-the-clock customer service excellence</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 h-100"
                        style="background-color: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-undo fa-3x mb-3" style="color: #01B45E;"></i>
                            <h4>Easy Returns</h4>
                            <p class="mb-0">Hassle-free return policy for your peace of mind</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 h-100"
                        style="background-color: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-tag fa-3x mb-3" style="color: #01B45E;"></i>
                            <h4>Best Deals</h4>
                            <p class="mb-0">Regular offers and competitive prices</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section End -->

    <!-- Team Section Start -->
    <div class="custom_container py-5">
        <div class="text-center mb-5">
            <h2 style="color: #01B45E;">Meet Our Leadership</h2>
            <p>The minds behind your amazing shopping experience</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 text-center" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a" class="card-img-top"
                        alt="Team Member" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text" style="color: #01B45E;">CEO & Founder</p>
                        <div class="mt-3">
                            <a href="#" class="text-decoration-none me-2" style="color: #01B45E;"><i
                                    class="fab fa-linkedin"></i></a>
                            <a href="#" class="text-decoration-none me-2" style="color: #01B45E;"><i
                                    class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 text-center" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2" class="card-img-top"
                        alt="Team Member" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Sarah Johnson</h5>
                        <p class="card-text" style="color: #01B45E;">Operations Director</p>
                        <div class="mt-3">
                            <a href="#" class="text-decoration-none me-2" style="color: #01B45E;"><i
                                    class="fab fa-linkedin"></i></a>
                            <a href="#" class="text-decoration-none me-2" style="color: #01B45E;"><i
                                    class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 text-center" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7" class="card-img-top"
                        alt="Team Member" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Mike Wilson</h5>
                        <p class="card-text" style="color: #01B45E;">Tech Lead</p>
                        <div class="mt-3">
                            <a href="#" class="text-decoration-none me-2" style="color: #01B45E;"><i
                                    class="fab fa-linkedin"></i></a>
                            <a href="#" class="text-decoration-none me-2" style="color: #01B45E;"><i
                                    class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Customer Journey Section Start -->
    <div style="background-color: #f8f9fa;" class="py-5">
        <div class="custom_container">
            <div class="text-center mb-5">
                <h2 style="color: #01B45E;">Your Shopping Journey</h2>
                <p>Experience seamless shopping with us</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="position-relative pb-4">
                        <div class="d-flex justify-content-center">
                            <div class="rounded-circle bg-white p-4" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                <i class="fas fa-search fa-3x" style="color: #01B45E;"></i>
                            </div>
                        </div>
                        <h4 class="text-center mt-4">Browse</h4>
                        <p class="text-center">Explore our vast collection</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative pb-4">
                        <div class="d-flex justify-content-center">
                            <div class="rounded-circle bg-white p-4" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                <i class="fas fa-shopping-cart fa-3x" style="color: #01B45E;"></i>
                            </div>
                        </div>
                        <h4 class="text-center mt-4">Select</h4>
                        <p class="text-center">Add items to cart</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative pb-4">
                        <div class="d-flex justify-content-center">
                            <div class="rounded-circle bg-white p-4" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                <i class="fas fa-credit-card fa-3x" style="color: #01B45E;"></i>
                            </div>
                        </div>
                        <h4 class="text-center mt-4">Checkout</h4>
                        <p class="text-center">Secure payment process</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative pb-4">
                        <div class="d-flex justify-content-center">
                            <div class="rounded-circle bg-white p-4" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                <i class="fas fa-box fa-3x" style="color: #01B45E;"></i>
                            </div>
                        </div>
                        <h4 class="text-center mt-4">Deliver</h4>
                        <p class="text-center">Fast & secure delivery</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Customer Journey Section End -->
@endsection