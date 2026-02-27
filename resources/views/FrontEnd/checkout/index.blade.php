@extends('FrontEnd.master')
@section('title')
    Checkout
@endsection

@section('content')
    <style>
        .payment-option { cursor: pointer; transition: all 0.3s ease; }
        .card-header { background-color: #f09220; color: white; }
        .payment-option input[type="radio"] { display: none; }
        .payment-option.active { border: 2px solid #0d6efd; color: white; background-color: #f09220; }
    </style>

    <section class="py-3 bg-light">
        <div class="custom_container">

            {{-- ✅ IMPORTANT: form open এখানে এবং একদম শেষে close হবে --}}
            <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <div class="row g-4">
                    <!-- Left Column - Form -->
                    <div class="col-lg-8">

                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <div class="card-header p-4 border-0">
                                <h4 class="fw-semibold m-0" style="color:white;">Checkout Details</h4>
                            </div>

                            <div class="card-body p-2 md-p-4">

                                <!-- Personal Information Section -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="fw-semibold mb-0">Personal Information</h5>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Full Name" value="{{ Auth::user()->name ?? old('name') }}" required>
                                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                            </div>
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email" value="{{ Auth::user()->email ?? old('email') }}">
                                                <label for="email">Email Address</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="phone" name="phone"
                                                    placeholder="Phone" value="{{ Auth::user()->phone ?? old('phone') }}" required>
                                                <label for="phone">Phone Number <span class="text-danger">*</span></label>
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
                                                <textarea class="form-control" name="address" id="address" style="height: 100px"
                                                    placeholder="Address" required>{{ old('address') }}</textarea>
                                                <label for="address">Complete Address <span class="text-danger">*</span></label>
                                            </div>
                                            @error('address')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <select class="form-select" name="shipping_id" id="shipping_id" required>
                                                    <option value="">Select Shipping Method</option>
                                                    @foreach ($shippings as $shipping)
                                                        <option value="{{ $shipping->id }}">
                                                            @if ($shipping->type == 1) Inside Dhaka @else Outside Dhaka @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="shipping_id">Shipping Method <span class="text-danger">*</span></label>
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
                                        <textarea class="form-control" name="comment" id="comment" style="height: 100px"
                                            placeholder="Additional Information"></textarea>
                                        <label for="comment">Special Delivery Instructions (Optional)</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Order Summary -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden ">
                            <div class="card-header p-4">
                                <h4 class="fw-semibold m-0 text-white">Order Summary</h4>
                            </div>

                            <div class="card-body p-0">

                                <div class="px-4 pt-4">
                                    <h5 class="fw-semibold border-bottom pb-2 mb-3">Items in Your Cart</h5>

                                    @foreach ($carts as $cart)
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <p class="mb-0 fw-medium">{{ $cart->name }}</p>
                                                <span class="text-muted small">Quantity: {{ $cart->qty }}</span>
                                            </div>
                                            <span class="fw-semibold">€{{ $cart->subtotal }}</span>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Payment options (তোমার original 그대로 রেখেছি) --}}
                                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-4">
                                    <div class="px-4">
                                        <h5 class="fw-semibold m-0">Payment Method</h5>
                                    </div>

                                    <div class="card-body px-2 md-px-4">
                                        <div class="row g-3 mb-4">
                                            <div class="col-6">
                                                <label class="form-check d-flex align-items-center justify-content-center p-2 border rounded payment-option h-100"
                                                    for="cod">
                                                    <input class="form-check-input d-none" type="radio" name="payment_option" id="cod"
                                                        value="cod" checked>
                                                    <img src="{{ asset('FrontEnd') }}/logo/cod.png" alt="COD" style="height:50px; width:100%">
                                                </label>
                                            </div>

                                            {{-- <div class="col-6">
                                                <label class="form-check d-flex align-items-center justify-content-center p-2 border rounded payment-option h-100"
                                                    for="bkash">
                                                    <input class="form-check-input d-none" type="radio" name="payment_option" id="bkash" value="bkash">
                                                    <img src="{{ asset('FrontEnd') }}/logo/bkash.png" alt="bKash" style="height:50px;">
                                                </label>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-check d-flex align-items-center justify-content-center p-2 border rounded payment-option h-100"
                                                    for="nagad">
                                                    <input class="form-check-input d-none" type="radio" name="payment_option" id="nagad" value="nagad">
                                                    <img src="{{ asset('FrontEnd') }}/logo/nagad.webp" alt="Nagad" style="height:50px;">
                                                </label>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-check d-flex align-items-center justify-content-center p-2 border rounded payment-option h-100"
                                                    for="rocket">
                                                    <input class="form-check-input d-none" type="radio" name="payment_option" id="rocket" value="rocket">
                                                    <img src="{{ asset('FrontEnd') }}/logo/rocket.png" alt="Rocket" style="height:50px;">
                                                </label>
                                            </div> --}}
                                        </div>

                                        <div id="mobile-payment-fields" class="d-none mt-4">
                                            <h5 class="fw-semibold mb-3 payment-title"
                                                style="color: #3a3a3a; border-bottom: 1px solid #b8b8b8; padding-bottom: 8px;">
                                                Payment Information
                                            </h5>

                                            <input type="hidden" name="payment_method" id="payment_method">

                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="payment_number" class="form-label fw-medium">Payment Number</label>
                                                    <input type="text" class="form-control form-control-lg" id="payment_number" name="payment_number"
                                                        style="border-radius: 10px;" placeholder="01xxxxxxxxx">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="amount" class="form-label fw-medium">Amount</label>
                                                    <input type="number" class="form-control form-control-lg" id="amount" name="payment_amount"
                                                        style="border-radius: 10px;" placeholder="0.00" min="1">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="transaction_id" class="form-label fw-medium">Transaction ID</label>
                                                    <input type="text" class="form-control form-control-lg" id="transaction_id" name="transaction_id"
                                                        style="border-radius: 10px;" placeholder="Enter TrxID">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="screenshot" class="form-label fw-medium">Payment Screenshot</label>
                                                    <input type="file" class="form-control form-control-lg" id="screenshot" name="payment_screenshot"
                                                        accept="image/*" style="border-radius: 10px;">

                                                    <div class="mt-3 text-center">
                                                        <img id="preview" class="img-fluid rounded shadow-sm border"
                                                            style="max-height: 200px; display: none;" alt="Screenshot Preview">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Price Breakdown -->
                                    <div class="p-4 bg-light">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Subtotal</span>
                                            <span class="fw-medium">€<span id="cartSubTotal">{{ $cartTotal }}</span></span>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Shipping</span>
                                            <span class="fw-medium">€<span id="ship_amount">0.00</span></span>
                                        </div>

                                        <!-- Coupon -->
                                        <div class="">
                                            <p class="">Do you have a coupon?</p>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg border-end-0"
                                                    id="apply_coupon_input" placeholder="Enter coupon">
                                                <button type="button" id="apply_coupon_btn" class="btn px-4"
                                                    style="background-color: #f09220;">
                                                    <span class="text-white">Apply Coupon</span>
                                                </button>
                                            </div>
                                        </div>

                                        {{-- ✅ FIXED hidden inputs (id + default) --}}
                                        <input type="hidden" name="shipping_charge" id="shipping_charge" value="0" />
                                        <input type="hidden" name="shipping_type" id="shipping_type" value="" />
                                        <input type="hidden" name="shipping_name" id="shipping_name" value="" />

                                        <input type="hidden" name="sub_total" id="cartSubTotalShi" value="{{ $cartTotal }}" />
                                        <input type="hidden" name="grand_total" id="grand_total" value="{{ $cartTotal }}" />

                                        @if (Session::get('couponCode'))
                                            <input type="hidden" name="coupon" value="{{ Session::get('couponCode') }}">
                                        @endif

                                        <div id="couponInformation" class="mb-0"></div>
                                    </div>

                                    <!-- Total -->
                                    <div class="p-4 border-top">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold fs-5">Total</span>
                                            <span class="fw-semibold fs-5 text-dark">€<span id="grand_total_set">{{ $cartTotal }}</span></span>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit"
                                        class="btn btn-lg w-100 py-3 mt-4 fw-bold d-flex justify-content-center align-items-center"
                                        style="background-color: #f09220; color: #fff;">
                                        <i class="bi bi-bag-check-fill me-2"></i> Place Order
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div> {{-- row --}}
            </form>
        </div>
    </section>

    @include('FrontEnd.include.cart-contianer')
@endsection

@push('js')
<script>
    // =========================
    // Helpers
    // =========================
    function toNumber(val) {
        if (val === undefined || val === null) return 0;
        val = String(val).replace(/[^\d.]/g, '');
        const n = parseFloat(val);
        return isNaN(n) ? 0 : n;
    }

    let couponApplied = false;

    // =========================
    // Total calculation
    // =========================
    function updateTotalPrice() {
        // ✅ visible subtotal থেকে
        const product_price  = toNumber($('#cartSubTotal').text());
        const shipping_price = toNumber($('#ship_amount').text());

        const couponAttr = $('#grand_total_set').attr('data-coupon-discount');
        const couponDiscount = couponApplied ? toNumber(couponAttr) : 0;

        const grand_total_price = product_price + shipping_price - couponDiscount;

        $('#grand_total_set').text(grand_total_price.toFixed(2));
        $('#grand_total').val(grand_total_price.toFixed(2));

        // ✅ ensure sub_total never empty
        $('#cartSubTotalShi').val(product_price.toFixed(2));

        // ✅ ensure shipping_charge never empty
        $('#shipping_charge').val(shipping_price.toFixed(2));
    }

    $(document).ready(function() {

        // -------------------------
        // Payment UI active + fields show/hide
        // -------------------------
        const methodNames = { bkash: 'bKash', nagad: 'Nagad', rocket: 'Rocket' };

        function setPaymentActiveClass() {
            document.querySelectorAll('.payment-option').forEach(el => el.classList.remove('active'));
            const checked = document.querySelector('input[name="payment_option"]:checked');
            if (checked) checked.closest('.payment-option')?.classList.add('active');
        }

        function updatePaymentSection() {
            const checked = document.querySelector('input[name="payment_option"]:checked');
            if (!checked) return;

            const selectedValue = checked.value;
            setPaymentActiveClass();

            if (selectedValue === 'cod') {
                document.getElementById('mobile-payment-fields')?.classList.add('d-none');
                $('#payment_method').val('');
                return;
            }

            document.getElementById('mobile-payment-fields')?.classList.remove('d-none');
            const displayName = methodNames[selectedValue] || 'Payment';
            document.querySelector('.payment-title').textContent = `${displayName} Payment Information`;
            $('#payment_method').val(displayName);
        }

        updatePaymentSection();
        document.querySelectorAll('input[name="payment_option"]').forEach(opt => {
            opt.addEventListener('change', updatePaymentSection);
        });

        // Screenshot preview
        document.getElementById('screenshot')?.addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            const file = e.target.files[0];
            if (!preview) return;
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });

        // -------------------------
        // Shipping change
        // -------------------------
        $('#shipping_id').on('change', function() {
            const shipping_id = $(this).val();

            if (!shipping_id) {
                $('#ship_amount').text('0.00');
                $('#shipping_charge').val('0.00');
                $('#shipping_name').val('');
                $('#shipping_type').val('');
                updateTotalPrice();
                return;
            }

            $.ajax({
                url: "{{ url('/checkout/shipping/ajax') }}/" + shipping_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let vendorCount = Math.max(parseInt(data.vendor_count || 1), 1);
                    let baseCharge = toNumber(data.shipping?.shipping_charge);
                    let finalShippingCharge = baseCharge * vendorCount;

                    $('#ship_amount').text(finalShippingCharge.toFixed(2));

                    // ✅ MUST SET: for DB not null
                    $('#shipping_charge').val(finalShippingCharge.toFixed(2));
                    $('#shipping_name').val(data.shipping?.name || '');
                    $('#shipping_type').val(data.shipping?.type || '');

                    updateTotalPrice();
                },
                error: function() {
                    $('#ship_amount').text('0.00');
                    $('#shipping_charge').val('0.00');
                    updateTotalPrice();
                }
            });
        });

        // -------------------------
        // Coupon apply
        // -------------------------
        $('#apply_coupon_btn').on('click', function() {
            if (couponApplied) {
                Swal.mixin({ toast:true, position:'top-end', icon:'error', showConfirmButton:false, timer:2000 })
                    .fire({ title: 'Coupon Already Used' });
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
                    const Toast = Swal.mixin({ toast:true, position:'top-end', showConfirmButton:false, timer:2000 });

                    if (data.error) {
                        Toast.fire({ icon:'error', title: data.error });
                        return;
                    }

                    if (data.discount) {
                        const couponDiscount = toNumber(data.discount);
                        $('#grand_total_set').attr('data-coupon-discount', couponDiscount);
                        couponApplied = true;

                        $('#couponInformation').html(
                            '<div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top">' +
                            '<span class="text-success"><i class="bi bi-check-circle-fill me-1"></i> Coupon Applied</span>' +
                            '<span class="text-success fw-medium">-€<span>' + couponDiscount.toFixed(0) + '</span></span>' +
                            '</div>'
                        );

                        updateTotalPrice();
                    }

                    Toast.fire({ icon:'success', title: data.success || 'Coupon applied' });
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

        // -------------------------
        // If coupon exists in session
        // -------------------------
        @if (Session::has('couponDiscount'))
            couponApplied = true;
            $('#grand_total_set').attr('data-coupon-discount', '{{ Session::get('couponDiscount') }}');
        @endif

        // Initial calc
        updateTotalPrice();
    });
</script>
@endpush