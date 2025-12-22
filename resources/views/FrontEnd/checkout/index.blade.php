@extends('FrontEnd.master')
@section('title')
    Checkout
@endsection
@section('content')
    <style>
        .payment-option {
            cursor: pointer;
            transition: all 0.3s ease;

        }

        .card-header {
            background-color: #01B45E;
            color: white;
        }

        .payment-option input[type="radio"] {
            display: none;
        }

        .payment-option.active {
            border: 2px solid #0d6efd;
            color: white;
            background-color: #01b45e;

        }
    </style>

    <!-- Checkout Section Start -->
    <section class="py-3 bg-light">
        <div class="custom_container">



            <div class="row g-4">
                <!-- Left Column - Form -->
                <div class="col-lg-8">


                    <!-- Checkout Form Card -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-header p-4 border-0">
                            <h4 class="fw-semibold m-0" style="color:white;">Checkout Details</h4>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('checkout.payment') }}" method="post">
                                @csrf

                                <!-- Personal Information Section -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mb-0">Personal Information</h5>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Full Name" value="{{ Auth::user()->name ?? old('name') }}"
                                                    required>
                                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                            </div>
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email" value="{{ Auth::user()->email ?? old('email') }}"
                                                    required>
                                                <label for="email">Email Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="phone" name="phone"
                                                    placeholder="Phone" value="{{ Auth::user()->phone ?? old('phone') }}"
                                                    required>
                                                <label for="phone">Phone Number <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shipping Information Section -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mb-0">Shipping Information</h5>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="address" id="address" style="height: 100px" placeholder="Address" required>{{ old('address') }}</textarea>
                                                <label for="address">Complete Address <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            @error('address')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <select class="form-select" name="shipping_id" id="shipping_id" required>
                                                    <option value="">Select Shipping Method</option>
                                                    @foreach ($shippings as $key => $shipping)
                                                        <option value="{{ $shipping->id }}">
                                                            @if ($shipping->type == 1)
                                                                Inside
                                                                Dhaka
                                                            @else
                                                                Outside Dhaka
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="shipping_id">Shipping Method <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Information Section -->
                                <div>
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mb-0">Additional Notes</h5>
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="form-control" name="comment" id="comment" style="height: 100px" placeholder="Additional Information"></textarea>
                                        <label for="comment">Special Delivery Instructions (Optional)</label>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Order Summary -->
                <div class="col-lg-4">
                    <!-- Order Summary Card -->
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden ">
                        <div class="card-header p-4  ">
                            <h4 class="fw-semibold m-0 text-white">Order Summary</h4>
                        </div>

                        <div class="card-body p-0">
                            <!-- Products List -->
                            <div class="px-4 pt-4">
                                <h5 class="fw-semibold border-bottom pb-2 mb-3">Items in Your Cart</h5>

                                @foreach ($carts as $cart)
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <p class="mb-0 fw-medium">{{ $cart->name }}</p>


                                            <span class="text-muted small">Quantity: {{ $cart->qty }}</span>
                                        </div>
                                        <span class="fw-semibold">৳{{ $cart->subtotal }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-4">
                                <div class="px-4">
                                    <h5 class="fw-semibold m-0">Payment Method</h5>
                                </div>

                                <div class="card-body px-4 ">

                                    <div class="">
                                        <div class="form-check d-flex align-items-start p-2 border rounded payment-option active h-100"
                                            id="label-cod">
                                            <input class="form-check-input mt-1 me-3" style="transform: scale(1.2)"
                                                type="radio" name="payment_option" id="cod" value="cod"
                                                checked>
                                            <div>
                                                <label class="form-check-label fw-semibold" for="cod">
                                                    Cash On Delivery
                                                </label>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- Price Breakdown -->
                                    <div class="p-4 bg-light">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Subtotal</span>
                                            <span class="fw-medium">৳<span
                                                    id="cartSubTotal">{{ $cartTotal }}</span></span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Shipping</span>
                                            <span class="fw-medium">৳<span id="ship_amount">0.00</span></span>
                                        </div>

                                        <!-- Coupon Section -->
                                        <div class="">
                                            <p class="">Do you have a coupon?</p>
                                            <div class="input-group">

                                                <input type="text" class="form-control form-control-lg border-end-0"
                                                    id="apply_coupon_input" placeholder="Enter coupon">
                                                <button type="button" id="apply_coupon_btn" class="btn px-4"
                                                    style="background-color: #01B45E;">
                                                    <span class="d-none d-md-inline text-white">Apply Coupon</span>
                                                    <span class="d-inline d-md-none">Apply</span>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Hidden inputs -->
                                        <input type="hidden" value="" name="shipping_charge"
                                            class="ship_amount" />
                                        <input type="hidden" value="" name="shipping_type"
                                            class="shipping_type" />
                                        <input type="hidden" value="" name="shipping_name"
                                            class="shipping_name" />
                                        <input type="hidden" value="{{ $cartTotal }}" name="sub_total"
                                            id="cartSubTotalShi" />
                                        <input type="hidden" value="" name="grand_total" id="grand_total" />

                                        @if (Session::get('couponCode'))
                                            <input type="hidden" name="coupon" value="{{ $cartTotal }}">
                                        @endif

                                        <!-- Coupon display area -->
                                        <div id="couponInformation" class="mb-0"></div>
                                    </div>

                                    <!-- Total -->
                                    <div class="p-4  border-top">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold fs-5">Total</span>
                                            <span class="fw-semibold fs-5 text-dark">৳<span
                                                    id="grand_total_set">{{ $cartTotal }}</span></span>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit"
                                        class="btn btn-lg w-100 py-3 mt-4 fw-bold d-flex justify-content-center align-items-center"
                                        style="background-color: #01B45E; color: #fff;">
                                        <i class="bi bi-bag-check-fill me-2"></i> Place Order
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            </form>
            {{-- <div class="col-12 mt-4">
                <!-- Coupon Card -->
                <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="p-3 border-start border-5 border-black d-flex align-items-center"
                            style="background-color: #01B45E;">
                            <div class="me-3">
                                <i class="bi bi-tag-fill text-primary fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h4 class="fw-semibold mb-1 text-white">Do you have a coupon?</h4>
                                <p class="mb-0 small " style="color: #fff;">Enter your coupon code to get a discount on
                                    your
                                    purchase.</p>
                            </div>
                        </div>
                        <div class="p-4">
                            <form action="{{ route('apply-coupon') }}" method="post" class="d-flex">
                                @csrf
                                <input type="hidden" name="cart_value" value="{{ $cartTotal }}">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg border-end-0"
                                        name="apply_coupon" placeholder="Enter coupon code">
                                    <button type="submit" class="btn  px-4" style="background-color: #01B45E;">
                                        <span class="d-none d-md-inline text-white">Apply Coupon</span>
                                        <span class="d-inline d-md-none">Apply</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    {{-- side cart page trigger --}}
    @include('FrontEnd.include.cart-contianer')
@endsection

@push('js')
    <!--  Division To District Show Ajax -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: 'division-district/ajax/',
                        type: "GET",
                        data: {
                            'division_id': division_id
                        },
                        dataType: "json",
                        success: function(data) {
                            // Reset district selection
                            $('select[name="district_id"]').html(
                                '<option value="" selected="" disabled="">Select District</option>'
                            );
                            // Populate district options
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    capitalizeFirstLetter(value.district_name_en) +
                                    '</option>');
                            });
                            $('select[name="upazilla_id"]').html(
                                '<option value="" selected="" disabled="">Select Upazila</option>'
                            );
                        },
                    });
                } else {
                    // Reset district selection if division is not selected
                    $('select[name="district_id"]').html(
                        '<option value="" selected="" disabled="">Select District</option>');
                    $('select[name="upazilla_id"]').html(
                        '<option value="" selected="" disabled="">Select Upazila</option>');
                }
            });

            // Function to capitalize first letter of a string
            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

            // Address Relationship Division/District/Upazilla Show Data Ajax
            $('select[name="address_id"]').on('change', function() {
                var address_id = $(this).val();
                $('.selected_address').removeClass('d-none');
                if (address_id) {
                    $.ajax({
                        url: "{{ url('/address/ajax') }}/" + address_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#dynamic_division').text(capitalizeFirstLetter(data
                                .division_name_en));
                            $('#dynamic_division_input').val(data.division_id);
                            $("#dynamic_district").text(capitalizeFirstLetter(data
                                .district_name_en));
                            $('#dynamic_district_input').val(data.district_id);
                            $("#dynamic_upazilla").text(capitalizeFirstLetter(data
                                .upazilla_name_en));
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
            $('select[name="district_id"]').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: '/district-upazilla/ajax/',
                        type: "GET",
                        data: {
                            'district_id': district_id
                        },
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="upazilla_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="upazilla_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>


    <script>
        var couponApplied = false; // Declare couponApplied variable
        $(document).ready(function() {
            // Your existing AJAX code for applying the coupon
            $('#apply_coupon_btn').on('click', function() {
                if (couponApplied) {
                    const errorToast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    errorToast.fire({
                        title: 'Coupon Already Used'
                    });
                    return;
                }

                $.ajax({
                    url: "{{ route('apply-coupon') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        apply_coupon: $('#apply_coupon_input').val(),
                        cart_value: $('#cartSubTotalShi').val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.discount) {
                            let couponDiscount = parseInt(data.discount);
                            $('#grand_total_set').attr('data-coupon-discount', couponDiscount);
                            couponApplied = true;
                            updateTotalPrice();
                            showCouponInformation(data);
                        }

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        Toast.fire({
                            icon: data.error ? 'error' : 'success',
                            title: data.error ? data.error : data.success
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: xhr.responseJSON?.error || 'Invalid Coupon Code'
                        });
                    }
                });
            });

            function showCouponInformation(data) {
                // Assuming you have an element to display the coupon information
                // Update the element with the coupon details
                $('#couponInformation').html(
                    '<div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top">' +
                    '<span class="text-success"><i class="bi bi-check-circle-fill me-1"></i> Coupon Applied</span>' +
                    '<span class="text-success fw-medium">-৳<span>' + Math.floor(data.discount) +
                    '</span></span>' +
                    '</div>' +
                    '<input type="hidden" value="" name="shipping_charge" class="ship_amount" />' +
                    '<input type="hidden" value="" name="shipping_type" class="shipping_type" />' +
                    '<input type="hidden" value="" name="shipping_name" class="shipping_name" />');
            }

            // Your existing AJAX code for updating shipping information
            $('select[name="shipping_id"]').on('change', function() {
                var shipping_id = $(this).val();

              if (shipping_id) {
                $.ajax({
                    url: "{{ url('/checkout/shipping/ajax') }}/" + shipping_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);

                        // vendor count অনুযায়ী shipping charge হিসাব
                        let vendorCount = data.vendor_count ?? 1;
                        let finalShippingCharge = data.shipping.shipping_charge * vendorCount;

                        $('#ship_amount').text(finalShippingCharge);
                        $('.ship_amount').val(finalShippingCharge);
                        $('.shipping_name').val(data.shipping.name);
                        $('.shipping_type').val(data.shipping.type);

                        updateTotalPrice(); // Update the total price after selecting shipping
                    },
                });
            }else {
                    // Reset the elements if no shipping option is selected
                    $('#ship_amount').text('0');
                    $('.ship_amount').val('0');
                    $('.shipping_name').val('');
                    $('.shipping_type').val('');

                    updateTotalPrice(); // Update the total price after resetting shipping
                }
            });

            function updateTotalPrice() {
                let couponDiscount = couponApplied ? parseInt($('#grand_total_set').attr('data-coupon-discount')) :
                    0;
                let shipping_price = parseInt($('#ship_amount').text());
                let product_price = parseInt($('#cartSubTotalShi').val());
                let grand_total_price = product_price + shipping_price - couponDiscount;
                const userPoints = parseInt('{{ auth()->check() ? auth()->user()->points : 0 }}');
                console.log(userPoints + ' ' + grand_total_price);

                $('#grand_total_set').text(grand_total_price);
                $('#grand_total').val(grand_total_price);

                // Show or hide wallet option
                if (userPoints >= grand_total_price) {
                    $('#wallet-option-wrapper').show();
                } else {
                    $('#wallet-option-wrapper').hide();
                }
            }

            @if (Session::has('couponDiscount'))
                couponApplied = true;
                $('#couponInformation').html(
                    '<div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top">' +
                    '<span class="text-success"><i class="bi bi-check-circle-fill me-1"></i> Coupon Applied</span>' +
                    '<span class="text-success fw-medium">-৳<span>{{ Session::get('couponDiscount') }}</span></span>' +
                    '</div>'
                );
            @endif

        });
    </script>

    <script>
        document.querySelectorAll('input[name="payment_option"]').forEach((radio) => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.payment-option').forEach(el => el.classList.remove('active'));
                if (radio.checked) {
                    radio.closest('.payment-option').classList.add('active');
                }
            });
        });
    </script>
@endpush
