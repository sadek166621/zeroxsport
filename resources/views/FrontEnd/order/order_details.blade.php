@php
use App\Models\Review;
@endphp
@extends('FrontEnd.master')

@section('title', 'Order Details')

@section('content')
<style>
    :root {
        --primary-color: #026142;
        --primary-light: #038855;
        --primary-dark: #01482f;
        --accent-color: #f0f9f7;
        --text-dark: #2c3e50;
        --text-light: #7f8c8d;
        --border-color: #e0e0e0;
        --success-color: #27ae60;
        --warning-color: #f39c12;
    }

    body {
        background-color: #f5f7fa;
    }

    .order-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        color: white;
        padding: 50px 30px;
        margin-bottom: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(2, 97, 66, 0.2);
        position: relative;
        overflow: hidden;
    }

    .order-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .order-header-content {
        position: relative;
        z-index: 1;
    }

    .order-header h2 {
        font-weight: 700;
        font-size: 2.2rem;
        margin: 0 0 15px 0;
        letter-spacing: -0.5px;
    }

    .invoice-badge {
        background-color: rgba(255, 255, 255, 0.25);
        padding: 10px 20px;
        border-radius: 30px;
        display: inline-block;
        font-size: 0.95rem;
        font-weight: 500;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    

    .timeline-item {
        flex: 1;
        text-align: center;
    }

    .timeline-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        font-size: 1.2rem;
    }

    .timeline-item.active .timeline-icon {
        background-color: #fff;
        color: var(--primary-color);
    }

    .timeline-label {
        font-size: 0.85rem;
        opacity: 0.9;
        font-weight: 500;
    }

    .info-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: white;
    }

    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .info-card .card-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        color: white;
        border: none;
        padding: 20px 25px;
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: 0.3px;
    }

    .info-card .card-body {
        padding: 30px;
        background-color: #fff;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        color: var(--text-light);
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.7px;
    }

    .info-value {
        color: var(--text-dark);
        font-weight: 600;
        font-size: 1.05rem;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.3px;
    }

    .status-delivered {
        background-color: #e8f5e9;
        color: var(--success-color);
    }

    .status-pending {
        background-color: #fff8e1;
        color: var(--warning-color);
    }

    .status-paid {
        background-color: #e8f5e9;
        color: var(--success-color);
    }

    .status-unpaid {
        background-color: #ffebee;
        color: #c62828;
    }

    .summary-section {
        background: linear-gradient(135deg, var(--accent-color) 0%, #ffffff 100%);
        border: 2px solid var(--primary-color);
        border-radius: 12px;
        padding: 35px;
        margin-bottom: 30px;
        box-shadow: 0 2px 15px rgba(2, 97, 66, 0.08);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        font-size: 1rem;
        border-bottom: 1px solid rgba(2, 97, 66, 0.1);
    }

    .summary-row:last-child {
        border-bottom: none;
    }

    .summary-label {
        color: var(--text-light);
        font-weight: 600;
        font-size: 0.95rem;
    }

    .summary-value {
        color: var(--text-dark);
        font-weight: 700;
        font-size: 1.05rem;
    }

    .grand-total-row {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        color: white;
        padding: 22px 25px;
        border-radius: 8px;
        margin-top: 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 1.4rem;
        font-weight: 700;
        box-shadow: 0 4px 15px rgba(2, 97, 66, 0.2);
    }

    .products-table {
        border-collapse: collapse;
        width: 100%;
    }

    .products-table thead {
        background: var(--primary-color);
        color: white;
    }

    .products-table thead th {
        padding: 18px 20px;
        font-weight: 700;
        text-align: left;
        border: none;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.6px;
    }

    .products-table tbody tr {
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }

    .products-table tbody tr:hover {
        background-color: var(--accent-color);
    }

    .products-table tbody td {
        padding: 22px 20px;
        vertical-align: middle;
        color: var(--text-dark);
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .product-image {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        object-fit: cover;
        border: 2px solid var(--border-color);
        transition: transform 0.3s ease;
    }

    .products-table tbody tr:hover .product-image {
        transform: scale(1.05);
    }

    .product-name {
        font-weight: 700;
        color: var(--text-dark);
        font-size: 1rem;
    }

    .price-highlight {
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.08rem;
    }

    .review-btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        letter-spacing: 0.3px;
        cursor: pointer;
    }

    .review-btn:hover {
        background-color: var(--primary-dark);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(2, 97, 66, 0.3);
    }

    .reviewed-badge {
        background-color: #e8f5e9;
        color: var(--success-color);
        padding: 8px 16px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 0.3px;
    }


    .section-title {
        color: var(--text-dark);
        margin-bottom: 25px;
        font-weight: 700;
        font-size: 1.3rem;
        letter-spacing: -0.3px;
    }

    @media (max-width: 768px) {
        .order-header {
            padding: 30px 20px;
        }

        .order-header h2 {
            font-size: 1.6rem;
        }

        

        .info-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .summary-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
        }

        .products-table thead th {
            font-size: 0.8rem;
            padding: 12px 10px;
        }

        .products-table tbody td {
            padding: 15px 10px;
        }

        .product-image {
            width: 55px;
            height: 55px;
        }

        .grand-total-row {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }
    }
</style>

<div class="container py-5">
    {{-- Order Header with Status Timeline --}}
    <div class="order-header">
        <div class="order-header-content">
            <h2>📦 Order Details</h2>
            <div class="invoice-badge">Invoice #{{ $order['invoice_no'] }}</div>
            
            
        </div>
    </div>

    {{-- Customer & Payment Info --}}
    <div class="row">
        <div class="col-md-6">
            <div class="info-card">
                <div class="card-header">👤 Customer Information</div>
                <div class="card-body">
                    <div class="info-row">
                        <span class="info-label">Full Name</span>
                        <span class="info-value">{{ $order['name'] }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Phone</span>
                        <span class="info-value">{{ $order['phone'] }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{ $order['email'] }}</span>
                    </div>
                    <div class="info-row" style="flex-direction: column; align-items: flex-start; border-bottom: none;">
                        <span class="info-label">Delivery Address</span>
                        <span class="info-value">{{ nl2br(e($order['address'])) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-card">
                <div class="card-header">💳 Payment & Delivery</div>
                <div class="card-body">
                    <div class="info-row">
                        <span class="info-label">Payment Method</span>
                        <span class="info-value">{{ strtoupper($order['payment_method']) }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Payment Status</span>
                        <span class="status-badge {{ $order['payment_status'] ? 'status-paid' : 'status-unpaid' }}">
                            {{ $order['payment_status'] ? '✓ Paid' : '⏳ Unpaid' }}
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Shipping</span>
                        <span class="info-value">{{ $order['shipping_name'] }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Delivery Status</span>
                        <span class="status-badge status-delivered">{{ ucfirst($order['delivery_status']) }}</span>
                    </div>
                    @if($order['comment'])
                    <div class="info-row" style="flex-direction: column; align-items: flex-start; border-bottom: none;">
                        <span class="info-label">Order Note</span>
                        <span class="info-value">{{ $order['comment'] }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Order Summary --}}
    <div class="summary-section">
        <h4 class="section-title">💰 Order Summary</h4>
        <div class="summary-row">
            <span class="summary-label">Subtotal</span>
            <span class="summary-value">{{ $order['sub_total'] }} TK</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Discount</span>
            <span class="summary-value">-{{ $order['discount'] }} TK</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Shipping Charge</span>
            <span class="summary-value">+{{ $order['shipping_charge'] }} TK</span>
        </div>
        <div class="grand-total-row">
            <span>Grand Total</span>
            <span>{{ $order['grand_total'] }} TK</span>
        </div>
    </div>

    {{-- Ordered Products --}}
    <div class="info-card">
        <div class="card-header">🛍️ Ordered Products</div>
        <div class="card-body" style="padding: 0;">
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        @if(($order['delivery_status'] == 'delivered') && ($order['payment_status'] == 1))
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $orderDetail)
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="{{ asset($orderDetail->product->product_thumbnail) }}" alt="Product" class="product-image">
                                    <span class="product-name">{{ $orderDetail->product_name }}</span>
                                </div>
                            </td>
                            <td>{{ $orderDetail->qty }}</td>
                            <td><span class="price-highlight">{{ number_format($orderDetail->price, 2) }} TK</span></td>
                            <td><span class="price-highlight">{{ number_format($orderDetail->qty * $orderDetail->price, 2) }} TK</span></td>
                            @if($order['delivery_status'] == 'delivered' && $order['payment_status'] == 1)
                                <td>
                                    @if(!\App\Models\Review::where('product_id', $orderDetail->product_id)->where('user_id', auth()->id())->where('verified_purchase', 1)->where('status', 1)->exists())
                                        <a href="{{ route('product.review.create', $orderDetail->product_id) }}" class="review-btn">Write Review</a>
                                    @else
                                        <span class="reviewed-badge">✓ Reviewed</span>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection