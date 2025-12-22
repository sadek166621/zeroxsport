@extends('FrontEnd.master')
@section('content')

<style>
    :root {
        --primary: #01B45E;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --danger: #f72585;
        --warning: #f8961e;
        --info: #f1faee;
        --gray-100: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-300: #dee2e6;
        --gray-400: #ced4da;
        --gray-500: #adb5bd;
        --gray-600: #6c757d;
        --gray-700: #495057;
        --gray-800: #343a40;
        --gray-900: #212529;
        --dark: #001219;
        --light: #ffffff;
        --shadow-sm: 0 .125rem .25rem rgba(0, 0, 0, .075);
        --shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
        --shadow-lg: 0 1rem 3rem rgba(0, 0, 0, .175);
        --border-radius: 8px;
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    }

    body {
        background-color: #f8f9fb;
        color: var(--gray-800);
        line-height: 1.6;
    }

    .container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .mt-50 {
        margin-top: 50px;
    }

    .mb-40 {
        margin-bottom: 40px;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .card {
        background: var(--light);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        transition: var(--transition);
        overflow: hidden;
        position: relative;
    }

    .card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-5px);
    }

    .card-header {
        background: #D83F26;
        color: white;
        padding: 20px 30px;
        border-radius: var(--border-radius) var(--border-radius) 0 0;
        margin-bottom: 0;
    }

    .card-body {
        padding: 30px;
    }

    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        border-bottom: 1px solid var(--gray-200);
        padding-bottom: 20px;
    }

    .invoice-number {
        font-size: 1.2rem;
        font-weight: 600;
        color: #D83F26;
    }

    .invoice-date {
        color: var(--gray-600);
        font-weight: 500;
    }

    /* Modern Stepper */
    .stepper-container {
        position: relative;
        margin: 40px 0;
    }

    .stepper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .stepper-progress {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        height: 4px;
        background: linear-gradient(90deg, #D83F26 0%, var(--success) 100%);
        transition: width 0.6s ease-in-out;
        z-index: 1;
    }

    .stepper-track {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: var(--gray-200);
        z-index: 0;
    }

    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 3;
    }

    .step-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: var(--gray-200);
        color: var(--gray-500);
        margin-bottom: 10px;
        transition: var(--transition);
        position: relative;
    }

    .step.active .step-icon {
        background: #D83F26;
        color: white;
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    }

    .step.cancelled .step-icon {
        background: linear-gradient(135deg, var(--danger) 0%, #b5179e 100%);
        color: white;
    }

    .step-label {
        font-size: 0.825rem;
        font-weight: 600;
        color: var(--gray-600);
        margin-top: 8px;
        white-space: nowrap;
        transition: var(--transition);
    }

    .step.active .step-label {
        color: #D83F26;
        font-weight: 700;
    }

    .step.cancelled .step-label {
        color: var(--danger);
        font-weight: 700;
    }

    /* Product List Redesign */
    .product-section {
        background-color: var(--gray-100);
        border-radius: var(--border-radius);
        padding: 20px;
        margin-top: 30px;
    }

    .section-title {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--gray-800);
    }

    .section-title i {
        margin-right: 10px;
        color: #D83F26;
    }

    .product-card {
        display: flex;
        background-color: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-sm);
        padding: 15px;
        margin-bottom: 15px;
        transition: var(--transition);
    }

    .product-card:hover {
        box-shadow: var(--shadow);
    }

    .product-image {
        width: 100px;
        height: 100px;
        border-radius: var(--border-radius);
        overflow: hidden;
        flex-shrink: 0;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-details {
        flex-grow: 1;
        margin-left: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-name {
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 10px;
    }

    .product-price-info {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }

    .price-qty {
        color: var(--gray-600);
    }

    .price-qty span {
        font-weight: 600;
        color: var(--gray-800);
    }

    .subtotal {
        font-weight: 700;
        color: #D83F26;
        font-size: 1.1rem;
    }

    /* Order Summary Redesign */
    .order-summary {
        background-color: var(--gray-100);
        border-radius: var(--border-radius);
        padding: 20px;
        margin-top: 20px;
    }

    .summary-list {
        list-style-type: none;
        padding: 0;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px dashed var(--gray-300);
    }

    .summary-item:last-child {
        border-bottom: none;
    }

    .summary-label {
        color: var(--gray-600);
    }

    .summary-value {
        font-weight: 600;
        color: var(--gray-800);
    }

    .grand-total {
        background: #D83F26;
        color: white;
        border-radius: var(--border-radius);
        padding: 15px;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        font-weight: 700;
    }

    /* Status Cards */
    .status-cards {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 20px;
    }

    .status-card {
        flex: 1;
        background-color: var(--gray-100);
        border-radius: var(--border-radius);
        padding: 20px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .status-card:hover {
        box-shadow: var(--shadow);
    }

    .status-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .status-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--gray-700);
    }

    .status-badge {
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .status-badge.pending {
        background-color: #ffe8d9;
        color: var(--warning);
    }

    .status-badge.confirmed {
        background-color: #d7f9f1;
        color: #0cce6b;
    }

    .status-badge.processing {
        background-color: #e0f2fe;
        color: #0ea5e9;
    }

    .status-badge.shipped {
        background-color: #e0e7ff;
        color: #4f46e5;
    }

    .status-badge.delivered {
        background-color: #dcfce7;
        color: #16a34a;
    }

    .status-badge.cancelled {
        background-color: #fee2e2;
        color: var(--danger);
    }

    .status-badge.paid {
        background-color: #dcfce7;
        color: #16a34a;
    }

    .status-badge.unpaid {
        background-color: #fee2e2;
        color: var(--danger);
    }

    .payment-method {
        background-color: white;
        border-radius: var(--border-radius);
        padding: 10px 15px;
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .payment-name {
        font-weight: 600;
        color: var(--gray-800);
        display: flex;
        align-items: center;
    }

    .payment-name i {
        margin-right: 8px;
        color: #D83F26;
    }

    .payment-amount {
        font-weight: 700;
        color: #D83F26;
    }

    /* Billing Section */
    .billing-section {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }

    .billing-card {
        flex: 1;
        background-color: var(--gray-100);
        border-radius: var(--border-radius);
        padding: 20px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .billing-card:hover {
        box-shadow: var(--shadow);
    }

    .billing-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .billing-header i {
        width: 40px;
        height: 40px;
        background: #D83F26;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }

    .billing-title {
        font-weight: 600;
        color: var(--gray-700);
    }

    .billing-info {
        list-style-type: none;
        padding: 0;
    }

    .billing-item {
        display: flex;
        align-items: center;
        padding: 8px 0;
    }

    .billing-item i {
        width: 25px;
        color: #D83F26;
    }

    .billing-text {
        color: var(--gray-700);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .invoice-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .invoice-date {
            margin-top: 10px;
        }

        .stepper {
            overflow-x: auto;
            padding-bottom: 20px;
        }

        .stepper-container {
            padding: 0 10px;
        }

        .step {
            min-width: 80px;
        }

        .product-card {
            flex-direction: column;
        }

        .product-image {
            width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        .product-details {
            margin-left: 0;
        }

        .status-cards {
            flex-direction: column;
        }

        .billing-section {
            flex-direction: column;
        }
    }

    @media (max-width: 576px) {
        .step-icon {
            width: 30px;
            height: 30px;
            font-size: 0.8rem;
        }

        .step-label {
            font-size: 0.7rem;
        }
    }
</style>
<main class="main">
    <div class="container mt-50">
        <div class="row">
            <div class="col-lg-11 mb-40 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Order Tracking</h2>
                    </div>
                    <div class="card-body">
                        <div class="invoice-header">
                            <div class="invoice-number">
                                Invoice No: <span>#{{ $order->invoice_no }}</span>
                            </div>
                            <div class="invoice-date">
                                <i class="fas fa-calendar-alt"></i> Order Date: {{ date_format($order->created_at,"Y-m-d") }}
                            </div>
                        </div>

                        <!-- Modern Stepper -->
                        <div class="stepper-container">
                            <div class="stepper-track"></div>
                            <!-- <div class="stepper-progress" style="width: 
                  @if($order->delivery_status == 'pending') 0%
                  @elseif($order->delivery_status == 'confirmed') 16.6%
                  @elseif($order->delivery_status == 'processing') 33.3%
                  @elseif($order->delivery_status == 'picked_up') 50%
                  @elseif($order->delivery_status == 'shipped') 83.3%
                  @elseif($order->delivery_status == 'delivered') 100%
                  @endif">
                </div> -->
                            <div class="stepper">
                                @if($order->delivery_status == 'cancelled')
                                <div class="step cancelled">
                                    <div class="step-icon">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="step-label">Cancelled</div>
                                </div>
                                @else
                                <div class="step {{ $order->delivery_status == 'pending' || $order->delivery_status == 'confirmed' || $order->delivery_status == 'processing' || $order->delivery_status == 'picked_up' || $order->delivery_status == 'shipped' || $order->delivery_status == 'delivered' ? 'active' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-clipboard-check"></i>
                                    </div>
                                    <div class="step-label">Pending</div>
                                </div>
                                <div class="step {{ $order->delivery_status == 'confirmed' || $order->delivery_status == 'processing' || $order->delivery_status == 'picked_up' || $order->delivery_status == 'shipped' || $order->delivery_status == 'delivered' ? 'active' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-thumbs-up"></i>
                                    </div>
                                    <div class="step-label">Confirmed</div>
                                </div>
                                <div class="step {{ $order->delivery_status == 'processing' || $order->delivery_status == 'picked_up' || $order->delivery_status == 'shipped' || $order->delivery_status == 'delivered' ? 'active' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="step-label">Processing</div>
                                </div>
                                <div class="step {{ $order->delivery_status == 'picked_up' || $order->delivery_status == 'shipped' || $order->delivery_status == 'delivered' ? 'active' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <div class="step-label">Picked Up</div>
                                </div>
                                <div class="step {{ $order->delivery_status == 'shipped' || $order->delivery_status == 'delivered' ? 'active' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="step-label">Shipped</div>
                                </div>
                                <div class="step {{ $order->delivery_status == 'delivered' ? 'active' : '' }}">
                                    <div class="step-icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="step-label">Delivered</div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Products Section -->
                        <div class="product-section">
                            <div class="section-title">
                                <i class="fas fa-shopping-bag"></i> Products
                            </div>

                            @foreach ($order->order_details as $key => $orderDetail)
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ asset($orderDetail->product->product_thumbnail ?? '/api/placeholder/100/100') }}" alt="Product Image">
                                </div>
                                <div class="product-details">
                                    <div class="product-name">{{$orderDetail->product->name_en ?? 'Product Name'}}</div>
                                    <div class="product-price-info">
                                        <div class="price-qty">
                                            Unit Price: <span>৳ {{ $orderDetail->price ?? '0.00' }}</span> ×
                                            <span>{{ $orderDetail->qty ?? '0' }}</span>
                                        </div>
                                        <div class="subtotal">৳ {{ $orderDetail->price*$orderDetail->qty ?? '0.00' }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Order Summary -->
                        <div class="order-summary">
                            <div class="section-title">
                                <i class="fas fa-receipt"></i> Order Summary
                            </div>
                            <ul class="summary-list">
                                <li class="summary-item">
                                    <div class="summary-label">Subtotal</div>
                                    <div class="summary-value">৳ {{ $order->sub_total ?? '0.00' }}</div>
                                </li>
                                <li class="summary-item">
                                    <div class="summary-label">Shipping Cost</div>
                                    <div class="summary-value">৳ {{ $order->shipping_charge }}</div>
                                </li>
                                <li class="summary-item">
                                    <div class="summary-label">Discount</div>
                                    <div class="summary-value">
                                        @if ($order->coupon != Null)
                                        ৳ {{ $order->coupon }}
                                        @else
                                        ৳ 0
                                        @endif
                                    </div>
                                </li>
                            </ul>
                            <div class="grand-total">
                                <div>Grand Total</div>
                                <div>৳ {{ $order->grand_total }}</div>
                            </div>
                        </div>

                        <!-- Status Cards -->
                        <div class="status-cards">
                            <div class="status-card">
                                <div class="status-header">
                                    <div class="status-title">Order Status</div>
                                    @if ($order->delivery_status == 'cancelled')
                                    <div class="status-badge cancelled">Cancelled</div>
                                    @elseif ($order->delivery_status == 'pending')
                                    <div class="status-badge pending">Pending</div>
                                    @elseif ($order->delivery_status == 'confirmed')
                                    <div class="status-badge confirmed">Confirmed</div>
                                    @elseif ($order->delivery_status == 'processing')
                                    <div class="status-badge processing">Processing</div>
                                    @elseif ($order->delivery_status == 'picked_up')
                                    <div class="status-badge processing">Picked Up</div>
                                    @elseif ($order->delivery_status == 'shipped')
                                    <div class="status-badge shipped">Shipped</div>
                                    @elseif ($order->delivery_status == 'delivered')
                                    <div class="status-badge delivered">Delivered</div>
                                    @endif
                                </div>
                            </div>

                            <div class="status-card">
                                <div class="status-header">
                                    <div class="status-title">Payment Status</div>
                                    <div class="status-badge {{$order->payment_status == 1 ? 'paid' : 'unpaid'}}">
                                        {{$order->payment_status == 1 ? 'Paid' : 'Unpaid'}}
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-name">
                                        <i class="fas fa-credit-card"></i>
                                        @if($order->payment_method == 'cod')
                                        Cash On Delivery
                                        @else
                                        {{ $order->payment_method }}
                                        @endif
                                    </div>
                                    <div class="payment-amount">৳ {{ $order->grand_total }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Billing Section -->
                        <div class="billing-section">
                            <div class="billing-card">
                                <div class="billing-header">
                                    <i class="fas fa-building"></i>
                                    <div class="billing-title">Bill From</div>
                                </div>
                                <ul class="billing-info">
                                    <li class="billing-item">
                                        <i class="fas fa-store"></i>
                                        <div class="billing-text">{{ get_setting('business_name')->value ?? 'Business Name'}}</div>
                                    </li>
                                    <li class="billing-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <div class="billing-text">{{ get_setting('business_address')->value ?? 'Business Address'}}</div>
                                    </li>
                                    <li class="billing-item">
                                        <i class="fas fa-phone-alt"></i>
                                        <div class="billing-text">{{ get_setting('phone')->value ?? 'Phone Number'}}</div>
                                    </li>
                                </ul>
                            </div>

                            <div class="billing-card">
                                <div class="billing-header">
                                    <i class="fas fa-user"></i>
                                    <div class="billing-title">Bill To</div>
                                </div>
                                <ul class="billing-info">
                                    <li class="billing-item">
                                        <i class="fas fa-user"></i>
                                        <div class="billing-text">{{ $order->name ?? 'Customer Name'}}</div>
                                    </li>
                                    <li class="billing-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <div class="billing-text">{{ $order->address ?? 'Customer Address'}}</div>
                                    </li>
                                    <li class="billing-item">
                                        <i class="fas fa-phone-alt"></i>
                                        <div class="billing-text">{{ $order->phone ?? 'Customer Phone'}}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
 @include('FrontEnd.include.cart-contianer')
@endsection