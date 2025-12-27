@extends('FrontEnd.affiliate.master')

@section('title', 'Order Details')

@section('content')

<style>
    .details-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        position: relative;
        padding-bottom: 10px;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #F1592A 0%, #d84620 100%);
        border-radius: 2px;
    }

    .btn-back {
        background: linear-gradient(135deg, #F1592A 0%, #d84620 100%);
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(241, 89, 42, 0.3);
        color: white;
    }

    .status-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border-left: 5px solid #F1592A;
    }

    .status-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .status-item {
        text-align: center;
    }

    .status-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        color: #999;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
    }

    .badge-paid {
        background: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }

    .badge-pending {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .badge-unpaid {
        background: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    .badge-delivered {
        background: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }

    .badge-processing {
        background: #cff4fc;
        color: #055160;
        border: 1px solid #b6effb;
    }

    .products-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: #F1592A;
        font-size: 1.5rem;
    }

    .product-item {
        display: flex;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }

    .product-item:last-child {
        border-bottom: none;
    }

    .product-item:hover {
        background: #fafafa;
        padding: 15px;
        margin: 0 -15px;
        border-radius: 8px;
    }

    .product-image {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .product-details {
        flex: 1;
    }

    .product-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .product-meta {
        font-size: 0.85rem;
        color: #999;
    }

    .product-price-section {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        text-align: right;
        min-width: 200px;
    }

    .price-item {
        text-align: center;
    }

    .price-label {
        font-size: 0.8rem;
        color: #999;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .price-value {
        font-size: 1.1rem;
        font-weight: 700;
        color: #333;
    }

    .price-total {
        color: #F1592A;
    }

    .financial-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border-top: 5px solid #F1592A;
    }

    .financial-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .financial-row:last-child {
        border-bottom: none;
    }

    .financial-label {
        font-weight: 600;
        color: #333;
    }

    .financial-value {
        font-weight: 600;
        color: #666;
    }

    .financial-value.discount {
        color: #F1592A;
    }

    .financial-total {
        background: linear-gradient(135deg, rgba(241, 89, 42, 0.1) 0%, rgba(216, 70, 32, 0.1) 100%);
        padding: 15px;
        border-radius: 8px;
        margin-top: 15px;
    }

    .total-label {
        font-size: 1.1rem;
        font-weight: 700;
        color: #333;
    }

    .total-amount {
        font-size: 1.8rem;
        font-weight: 700;
        color: #F1592A;
    }

    .timeline-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .timeline-wrapper {
        position: relative;
        padding-left: 40px;
    }

    .timeline-item {
        margin-bottom: 25px;
        position: relative;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -32px;
        top: 8px;
        width: 12px;
        height: 12px;
        background: #F1592A;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 2px #F1592A;
    }

    .timeline-item:last-child::after {
        display: none;
    }

    .timeline-label {
        font-weight: 700;
        color: #333;
        margin-bottom: 4px;
    }

    .timeline-date {
        font-size: 0.85rem;
        color: #999;
    }

    .comments-section {
        background: linear-gradient(135deg, rgba(241, 89, 42, 0.1) 0%, rgba(216, 70, 32, 0.1) 100%);
        border-radius: 12px;
        padding: 25px;
        border-left: 5px solid #F1592A;
        margin-top: 25px;
    }

    .comments-content {
        color: #333;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .product-price-section {
            grid-template-columns: 1fr;
            text-align: left;
        }

        .product-item {
            flex-direction: column;
        }

        .status-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .details-container {
            padding: 10px;
        }

        .page-title {
            font-size: 1.2rem;
        }

        .status-section,
        .products-section,
        .financial-section,
        .timeline-section,
        .comments-section {
            padding: 15px;
        }

        .product-image {
            width: 60px;
            height: 60px;
        }

        .product-item:hover {
            padding: 15px;
            margin: 0;
        }

        .total-amount {
            font-size: 1.5rem;
        }
    }
</style>

<div class="details-container">
    {{-- Page Header --}}
    <div class="page-header">
        <h1 class="page-title">Invoice #{{ $order->invoice_no ?? '#' }}</h1>
        <a href="{{ route('affiliate.orders') }}" class="btn-back">
            <i class="bi bi-arrow-left"></i>Back to Orders
        </a>
    </div>

    {{-- Order Status Section --}}
    <div class="status-section">
        <div class="status-grid">
            <div class="status-item">
                <div class="status-label">Payment Status</div>
                @if ($order->payment_status == 1)
                    <span class="status-badge badge-paid"><i class="bi bi-check-circle me-1"></i>Paid</span>
                @elseif($order->payment_status == 0)
                    <span class="status-badge badge-pending"><i class="bi bi-clock me-1"></i>Pending</span>
                @else
                    <span class="status-badge badge-unpaid"><i class="bi bi-x-circle me-1"></i>Unpaid</span>
                @endif
            </div>
            <div class="status-item">
                <div class="status-label">Delivery Status</div>
                @php
                    $statusColors = ['0'=>'badge-pending','1'=>'badge-pending','2'=>'badge-processing','3'=>'badge-processing','4'=>'badge-delivered','5'=>'badge-unpaid','6'=>'badge-pending','7'=>'badge-pending','8'=>'badge-unpaid'];
                    $statusTexts = ['0'=>'Pending','1'=>'Confirmed','2'=>'Processing','3'=>'Shipped','4'=>'Delivered','5'=>'Canceled','6'=>'Returned','7'=>'Refunded','8'=>'Failed'];
                    $statusIcons = ['0'=>'hourglass-split','1'=>'check-circle','2'=>'gear','3'=>'truck','4'=>'box-seam','5'=>'x-circle','6'=>'arrow-return-left','7'=>'cash-coin','8'=>'exclamation-triangle'];
                @endphp
                <span class="status-badge {{ $statusColors[$order->delivery_status] ?? 'badge-pending' }}">
                    <i class="bi bi-{{ $statusIcons[$order->delivery_status] ?? 'question-circle' }} me-1"></i>
                    {{ $statusTexts[$order->delivery_status] ?? 'N/A' }}
                </span>
            </div>
            <div class="status-item">
                <div class="status-label">Order Date</div>
                <div style="font-weight: 600; color: #333;">{{ $order->created_at->format('d M Y') }}</div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- Left Column: Products --}}
        <div class="col-lg-8">
            {{-- Products Section --}}
            <div class="products-section">
                <div class="section-title">
                    <i class="bi bi-bag-check"></i>Ordered Products
                </div>
                <div>
                    @foreach($order->order_details as $item)
                    <div class="product-item">
                        <img src="{{ asset($item->product->product_thumbnail ?? 'placeholder.jpg') }}" 
                             alt="{{ $item->product->name_en }}" 
                             class="product-image">
                        <div class="product-details">
                            <div class="product-name">{{ $item->product->name_en }}</div>
                            @if($item->color)<div class="product-meta"><strong>Color:</strong> {{ $item->color }}</div>@endif
                            @if($item->size)<div class="product-meta"><strong>Size:</strong> {{ $item->size }}</div>@endif
                        </div>
                        <div class="product-price-section">
                            <div class="price-item">
                                <div class="price-label">Qty</div>
                                <div class="price-value">{{ $item->qty }}</div>
                            </div>
                            <div class="price-item">
                                <div class="price-label">Unit Price</div>
                                <div class="price-value">৳{{ number_format($item->price, 2) }}</div>
                            </div>
                            <div class="price-item">
                                <div class="price-label">Total</div>
                                <div class="price-value price-total">৳{{ number_format($item->price * $item->qty, 2) }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Comments Section --}}
            @if($order->comment)
            <div class="comments-section">
                <div class="section-title">
                    <i class="bi bi-chat-dots"></i>Customer Notes
                </div>
                <div class="comments-content">
                    {!! nl2br(e($order->comment)) !!}
                </div>
            </div>
            @endif
        </div>

        {{-- Right Column: Financial & Timeline --}}
        <div class="col-lg-4">
            {{-- Financial Summary --}}
            <div class="financial-section">
                <div class="section-title">
                    <i class="bi bi-currency-exchange"></i>Financial Summary
                </div>
                <div class="financial-row">
                    <span class="financial-label">Subtotal</span>
                    <span class="financial-value">৳{{ number_format($order->sub_total, 2) }}</span>
                </div>
                @if($order->discount)
                <div class="financial-row">
                    <span class="financial-label">Discount</span>
                    <span class="financial-value discount">-৳{{ number_format($order->discount, 2) }}</span>
                </div>
                @endif
                @if($order->coupon)
                <div class="financial-row">
                    <span class="financial-label">Coupon</span>
                    <span class="financial-value">{{ $order->coupon ?? 'N/A' }}</span>
                </div>
                @endif
                <div class="financial-row">
                    <span class="financial-label">Shipping Charge</span>
                    <span class="financial-value">৳{{ number_format($order->shipping_charge, 2) }}</span>
                </div>
                <div class="financial-total">
                    <div class="total-label">Grand Total</div>
                    <div class="total-amount">৳{{ number_format($order->grand_total, 2) }}</div>
                </div>
            </div>

            {{-- Timeline Section --}}
            <div class="timeline-section">
                <div class="section-title">
                    <i class="bi bi-clock-history"></i>Timeline
                </div>
                <div class="timeline-wrapper">
                    @php
                        $steps = [
                            'confirmed' => ['date' => $order->confirmed_date, 'label' => 'Confirmed'],
                            'processing' => ['date' => $order->processing_date, 'label' => 'Processing'],
                            'picked' => ['date' => $order->picked_date, 'label' => 'Picked'],
                            'shipped' => ['date' => $order->shipped_date, 'label' => 'Shipped'],
                            'delivered' => ['date' => $order->delivered_date, 'label' => 'Delivered'],
                        ];
                    @endphp

                    @foreach($steps as $key => $step)
                        @if($step['date'])
                        <div class="timeline-item">
                            <div class="timeline-label">{{ $step['label'] }}</div>
                            <div class="timeline-date">{{ $step['date']->format('d M Y, h:i A') }}</div>
                        </div>
                        @endif
                    @endforeach

                    @if($order->cancel_date)
                    <div class="timeline-item">
                        <div class="timeline-label" style="color: #F1592A;">Cancelled</div>
                        <div class="timeline-date">{{ $order->cancel_date->format('d M Y, h:i A') }}</div>
                    </div>
                    @endif

                    @if($order->return_date)
                    <div class="timeline-item">
                        <div class="timeline-label">Returned</div>
                        <div class="timeline-date">{{ $order->return_date->format('d M Y, h:i A') }}</div>
                        @if($order->return_reason)<div class="timeline-date" style="margin-top: 5px;">Reason: {{ $order->return_reason }}</div>@endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endpush