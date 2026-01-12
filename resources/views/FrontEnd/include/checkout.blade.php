<style>
    .demo-trigger {
        background: #036344;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        font-weight: 600;
    }

    .checkout-modal {
        position: fixed;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: opacity 260ms ease, visibility 260ms;
        z-index: 2000;
    }

    .checkout-modal.open {
        opacity: 1;
        visibility: visible;
    }

    .checkout-modal-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: -1;
    }

    .checkout-modal-content {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 480px;
        max-height: 90vh;
        display: flex;
        flex-direction: column;
        animation: modalSlideIn 300ms ease;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .checkout-modal-header {
        background: #036344;
        color: #fff;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 8px 8px 0 0;
    }

    .checkout-modal-header h2 {
        font-size: 18px;
        font-weight: 600;
    }

    .close-btn {
        background: transparent;
        border: 0;
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        line-height: 1;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        transition: background 0.2s ease;
    }

    .close-btn:hover {
        background: rgba(255, 255, 255, 0.15);
    }

    .checkout-modal-body {
        padding: 20px;
        overflow-y: auto;
        flex: 1;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 500;
        color: #333;
        margin-bottom: 6px;
    }

    .required {
        color: #d32f2f;
    }

    .input-with-icon {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        color: #999;
    }

    .form-control {
        width: 100%;
        padding: 12px 12px 12px 42px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        transition: border-color 0.3s ease;
        background: #f9f9f9;
    }

    .form-control:focus {
        outline: none;
        border-color: #036344;
        background: #fff;
    }

    .shipping-section {
        margin: 20px 0;
    }

    .shipping-title {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
    }

    .shipping-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .shipping-option {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px;
        border: 1px solid #ddd;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #f9f9f9;
    }

    .shipping-option:hover {
        border-color: #036344;
        background: #fff;
    }

    .shipping-option input[type="radio"] {
        margin-right: 12px;
        accent-color: #036344;
        width: 18px;
        height: 18px;
    }

    .shipping-option-content {
        display: flex;
        align-items: center;
        flex: 1;
    }

    .shipping-option-label {
        font-size: 13px;
        color: #333;
        font-weight: 500;
    }

    .shipping-option-price {
        font-size: 14px;
        font-weight: 600;
        color: #036344;
    }

    .order-summary {
        background: #f9f9f9;
        padding: 16px;
        border-radius: 6px;
        margin: 20px 0;
    }

    .order-item {
        display: flex;
        gap: 12px;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e8e8e8;
    }

    .order-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .item-image {
        width: 50px;
        height: 50px;
        border-radius: 6px;
        background: #ddd;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .item-details {
        flex: 1;
    }

    .item-name {
        font-size: 13px;
        font-weight: 500;
        color: #333;
        margin-bottom: 4px;
    }

    .item-quantity {
        font-size: 12px;
        color: #666;
    }

    .item-price {
        font-size: 14px;
        font-weight: 600;
        color: #036344;
        text-align: right;
    }

    .order-note-section {
        margin: 20px 0;
    }

    .order-note-section label {
        display: block;
        font-size: 13px;
        font-weight: 500;
        color: #333;
        margin-bottom: 6px;
    }

    .order-note {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 13px;
        font-family: inherit;
        resize: vertical;
        min-height: 60px;
        background: #f9f9f9;
    }

    .order-note:focus {
        outline: none;
        border-color: #036344;
        background: #fff;
    }

    .promo-section {
        background: #e3f2fd;
        border: 1px solid #90caf9;
        border-radius: 6px;
        padding: 12px;
        margin: 20px 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .promo-icon {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        border-radius: 4px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .promo-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 4px;
    }

    .promo-content {
        flex: 1;
    }

    .promo-text {
        font-size: 12px;
        color: #1976d2;
        line-height: 1.4;
    }

    .promo-link {
        color: #1976d2;
        text-decoration: underline;
        font-weight: 500;
    }

    .summary-totals {
        margin: 20px 0;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .summary-row .label {
        color: #666;
    }

    .summary-row .value {
        color: #333;
        font-weight: 500;
    }

    .summary-row.total {
        border-top: 2px solid #ddd;
        padding-top: 12px;
        margin-top: 12px;
        font-size: 16px;
        font-weight: 600;
    }

    .summary-row.total .label,
    .summary-row.total .value {
        color: #036344;
    }

    .checkout-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        flex: 1;
        padding: 14px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-coupon {
        background: #fff;
        color: #036344;
        border: 1px solid #036344;
    }

    .btn-coupon:hover {
        background: #f0f9f6;
    }

    .btn-submit {
        background: #ff9800;
        color: #fff;
    }

    .btn-submit:hover {
        background: #f57c00;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 152, 0, 0.3);
    }

    .payment-info {
        background: #fff9e6;
        border: 1px solid #ffc107;
        border-radius: 6px;
        padding: 12px;
        margin: 20px 0;
        text-align: center;
    }

    .payment-info-text {
        font-size: 12px;
        color: #f57c00;
        line-height: 1.5;
    }

    .btn-pay-online {
        width: 100%;
        background: #036344;
        color: #fff;
        border: none;
        padding: 14px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 12px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-pay-online:hover {
        background: #024d35;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(3, 99, 68, 0.3);
    }

    @media (max-width: 768px) {
        .checkout-modal-content {
            width: 95%;
            max-height: 95vh;
        }

        .checkout-modal-body {
            padding: 16px;
        }
    }
</style>



<div id="checkoutModal" class="checkout-modal">
    <div class="checkout-modal-overlay" onclick="closeCheckout()"></div>
    <div class="checkout-modal-content">
        <div class="checkout-modal-header">
            <h2>ক্যাশ অন ডেলিভারিতে অর্ডার করতে সকল তথ্য দিন</h2>
            <button class="close-btn" onclick="closeCheckout()">&times;</button>
        </div>

        <div class="checkout-modal-body">
            <form id="checkoutForm" action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                <!-- Customer Information -->
                <div class="form-group">
                    <label>আপনার নাম <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <input id="name" name="name" value="{{ Auth::user()->name ?? old('name') }}" type="text" class="form-control" placeholder="আপনার নাম" required>
                        @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>ফোন নম্বর <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <input type="tel" class="form-control" placeholder="ফোন নম্বর" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>ঠিকানা <span class="required">*</span></label>
                    <div class="input-with-icon">
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <input type="text" class="form-control" placeholder="ঠিকানা" required>
                    </div>
                </div>

                <!-- Shipping Options -->
                <div class="shipping-section">
                    <div class="shipping-title">শিপিং ডেলিভারি</div>
                    <div class="shipping-options">
                        <label class="shipping-option">
                            <div class="shipping-option-content">
                                <input type="radio" name="shipping" value="inside" checked>
                                <span class="shipping-option-label">ঢাকা শহরের ভিতরে ডেলিভারি</span>
                            </div>
                            <span class="shipping-option-price">Tk 70.00</span>
                        </label>
                        <label class="shipping-option">
                            <div class="shipping-option-content">
                                <input type="radio" name="shipping" value="outside">
                                <span class="shipping-option-label">ঢাকা শহরের বাহিরে ডেলিভারি</span>
                            </div>
                            <span class="shipping-option-price">Tk 70.00</span>
                        </label>
                        <label class="shipping-option">
                            <div class="shipping-option-content">
                                <input type="radio" name="shipping" value="express">
                                <span class="shipping-option-label">ঢাকা এবং ঢাকার বাহিরে সকল এরিয়া</span>
                            </div>
                            <span class="shipping-option-price">Tk 130.00</span>
                        </label>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <div class="order-item">
                        <div class="item-image">🧴</div>
                        <div class="item-details">
                            <div class="item-name">Gawa Ghee/পাক্কা ঘী (১ কোয়া)</div>
                            <div class="item-quantity">পরিমান: 1</div>
                        </div>
                        <div class="item-price">Tk 1,800.00</div>
                    </div>
                </div>

                <!-- Order Note -->
                <div class="order-note-section">
                    <label>Order note</label>
                    <textarea class="order-note" placeholder="Order note"></textarea>
                </div>

                <!-- Promo Section -->
                <div class="promo-section">
                    <div class="promo-icon">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%231976d2' viewBox='0 0 24 24'%3E%3Cpath d='M21 5l-9-4-9 4v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5z'/%3E%3C/svg%3E" alt="promo">
                    </div>
                    <div class="promo-content">
                        <p class="promo-text">
                            Add <strong>৫০০ টাকা সর্বনিম্ন</strong> for just <strong>Tk 625.00</strong><br>
                            এখনই পণ্যটি অর্ডার করুন সেপ <a href="#" class="promo-link">এখানে ক্লিক করুন</a>
                        </p>
                    </div>
                </div>

                <!-- Totals -->
                <div class="summary-totals">
                    <div class="summary-row">
                        <span class="label">কার্ট মোট</span>
                        <span class="value" id="cartSubtotalDisplay">Tk 1,800.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">ডেলিভারি চার্জ</span>
                        <span class="value" id="shippingChargeDisplay">Tk 70.00</span>
                    </div>

                    <!-- Coupon Code Section -->
                    <div class="coupon-section" style="margin: 16px 0; padding: 12px; background: #f0f9f6; border-radius: 6px; border: 1px solid #036344;">
                        <label style="display: block; font-size: 12px; font-weight: 500; color: #333; margin-bottom: 6px;">কুপন কোড (ঐচ্ছিক)</label>
                        <div style="display: flex; gap: 6px;">
                            <input type="text" id="couponCodeInput" class="form-control" placeholder="কুপন কোড দিন" style="padding: 8px 12px; border: 1px solid #ddd; font-size: 12px;">
                            <button type="button" id="applyCouponBtn" class="btn" style="background: #036344; color: #fff; padding: 8px 12px; font-size: 12px; white-space: nowrap;">প্রয়োগ করুন</button>
                        </div>
                        <div id="couponMessage" style="font-size: 11px; margin-top: 6px; color: #666;"></div>
                    </div>

                    <div class="summary-row total">
                        <span class="label">সর্বমোট</span>
                        <span class="value" id="grandTotalDisplay">Tk 1,870.00</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="checkout-actions">
                    <button type="submit" class="btn btn-submit">অর্ডার</button>
                </div>



                <!-- Pay Online Button -->
                <button type="button" class="btn-pay-online">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    Pay Online
                </button>

                <!-- Payment Info -->
                <div class="payment-info">
                    <p class="payment-info-text">
                        উপরের লাল রঙয়ের বিল্ক করলে আপনার ফর্মটি সাবমিট হয়ে যাবে এবং আপনার অর্ডারটি প্রক্রিয়াকরণ শুরু হবে। ক্যাশ অন ডেলিভারি পেমেন্ট মেথডে অর্ডার করার জন্য উপরের "অর্ডার" বাটনে ক্লিক করুন।
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let appliedCoupon = null;

    

    function closeCheckout() {
        document.getElementById('checkoutModal').classList.remove('open');
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeCheckout();
        }
    });

    // Apply Coupon Handler
    document.getElementById('applyCouponBtn').addEventListener('click', function() {
        const couponCode = document.getElementById('couponCodeInput').value.trim();
        const messageDiv = document.getElementById('couponMessage');

        if (!couponCode) {
            messageDiv.textContent = 'কুপন কোড দিন';
            messageDiv.style.color = '#d32f2f';
            return;
        }

        // AJAX call to validate coupon
        $.ajax({
            url: "{{ route('apply-coupon') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                apply_coupon: couponCode,
                cart_value: document.querySelector('input[name="sub_total"]')?.value || 0
            },
            dataType: 'json',
            success: function(data) {
                if (data.error) {
                    messageDiv.textContent = data.error;
                    messageDiv.style.color = '#d32f2f';
                    appliedCoupon = null;
                } else {
                    messageDiv.textContent = '✓ ' + data.success + ' - ৳' + Math.floor(data.discount) + ' ছাড়';
                    messageDiv.style.color = '#036344';
                    appliedCoupon = {
                        code: couponCode,
                        discount: data.discount
                    };
                    updateModalTotals();
                }
            },
            error: function() {
                messageDiv.textContent = 'অবৈধ কুপন কোড';
                messageDiv.style.color = '#d32f2f';
                appliedCoupon = null;
            }
        });
    });

    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = {
            _token: '{{ csrf_token() }}',
            name: document.querySelector('input[name="name"]')?.value || '',
            phone: document.querySelector('input[name="phone"]')?.value || '',
            address: document.querySelector('input[name="address"]')?.value || '',
            shipping_id: document.querySelector('input[name="shipping"]:checked')?.value || '',
            comment: document.querySelector('textarea[name="comment"]')?.value || '',
            coupon: appliedCoupon?.code || ''
        };

        if (!formData.name || !formData.phone || !formData.address) {
            alert('সকল তথ্য দিন');
            return;
        }

        // Submit to server
        $.ajax({
            url: "{{ route('checkout.store') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                alert('অর্ডার সফলভাবে জমা দেওয়া হয়েছে!');
                closeCheckout();
                // Optionally reload or redirect
            },
            error: function() {
                alert('অর্ডার জমা দিতে ত্রুটি হয়েছে');
            }
        });
    });

    function updateModalTotals() {
        // Recalculate totals with coupon discount if applied
        const subtotal = parseFloat(document.querySelector('input[name="sub_total"]')?.value || 0);
        const shipping = parseFloat(document.querySelector('.ship_amount')?.value || 0);
        const discount = appliedCoupon?.discount || 0;
        const grandTotal = subtotal + shipping - discount;

        document.getElementById('grandTotalDisplay').textContent = 'Tk ' + grandTotal.toFixed(2);
    }
</script>