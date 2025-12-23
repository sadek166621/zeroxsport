@extends('FrontEnd.affiliate.master')

@section('title', 'Order Details')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <!-- Header with Back Button -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="mb-0 fw-bold">Order Details: {{ $order->invoice_no ?? '#' }}</h3>
                <a href="{{ route('affiliate.orders') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>Back to Orders
                </a>
            </div>

            <!-- Main Content Cards -->
            <div class="row g-4">
                <!-- Left Column: Products & Status -->
                <div class="col-lg-8">
                    <!-- Order Status Badges -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-cart-check me-2"></i>Order Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-4 text-center text-md-start">
                                <div class="col-md-6">
                                    <p class="mb-2"><strong>Payment Status:</strong></p>
                                    @if ($order->payment_status == 1)
                                        <span class="badge bg-success fs-6 px-3 py-2"><i class="bi bi-check-circle me-1"></i> Paid</span>
                                    @elseif($order->payment_status == 0)
                                        <span class="badge bg-warning text-dark fs-6 px-3 py-2"><i class="bi bi-hourglass-split me-1"></i> Pending</span>
                                    @else
                                        <span class="badge bg-danger fs-6 px-3 py-2"><i class="bi bi-x-circle me-1"></i> Unpaid</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2"><strong>Delivery Status:</strong></p>
                                    @php
                                        $statusColors = ['0'=>'warning','1'=>'info','2'=>'primary','3'=>'secondary','4'=>'success','5'=>'danger','6'=>'dark','7'=>'secondary','8'=>'danger'];
                                        $statusTexts = ['0'=>'Pending','1'=>'Confirmed','2'=>'Processing','3'=>'Shipped','4'=>'Delivered','5'=>'Canceled','6'=>'Returned','7'=>'Refunded','8'=>'Failed'];
                                        $statusIcons = ['0'=>'hourglass-split','1'=>'check-circle','2'=>'gear','3'=>'truck','4'=>'box-seam','5'=>'x-circle','6'=>'arrow-return-left','7'=>'cash-coin','8'=>'exclamation-triangle'];
                                    @endphp
                                    <span class="badge bg-{{ $statusColors[$order->delivery_status] ?? 'secondary' }} fs-6 px-3 py-2">
                                        <i class="bi bi-{{ $statusIcons[$order->delivery_status] ?? 'question-circle' }} me-1"></i>
                                        {{ $statusTexts[$order->delivery_status] ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ordered Products Table -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-bag-check me-2"></i>Ordered Products</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Product</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->order_details as $item)
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset($item->product->product_thumbnail ?? 'placeholder.jpg') }}" 
                                                         alt="{{ $item->product->name_en }}" 
                                                         class="rounded me-3" style="width:60px;height:60px;object-fit:cover;">
                                                    <div>
                                                        <div class="fw-semibold">{{ $item->product->name_en }}</div>
                                                        @if($item->color)<small class="text-muted">Color: {{ $item->color }}</small>@endif
                                                        @if($item->size)<small class="text-muted d-block">Size: {{ $item->size }}</small>@endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->qty }}</td>
                                            <td>৳{{ number_format($item->price, 2) }}</td>
                                            <td class="fw-bold">৳{{ number_format($item->price * $item->qty, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Financial & Timeline -->
                <div class="col-lg-4">
                    <!-- Financial Summary -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-currency-exchange me-2"></i>Financial Summary</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td class="text-end">৳{{ number_format($order->sub_total, 2) }}</td>
                                    </tr>
                                    @if($order->discount)
                                    <tr>
                                        <th>Discount</th>
                                        <td class="text-end text-danger">-৳{{ number_format($order->discount, 2) }}</td>
                                    </tr>
                                    @endif
                                    @if($order->coupon)
                                    <tr>
                                        <th>Coupon</th>
                                        <td class="text-end">{{ $order->coupon ?? 'N/A' }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>Shipping Charge</th>
                                        <td class="text-end">৳{{ number_format($order->shipping_charge, 2) }}</td>
                                    </tr>
                                    <tr class="border-top pt-2">
                                        <th class="fs-5">Grand Total</th>
                                        <td class="text-end fs-5 fw-bold text-primary">৳{{ number_format($order->grand_total, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Order Timeline -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2"></i>Order Timeline</h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                @php
                                    $steps = [
                                        'confirmed' => ['date' => $order->confirmed_date, 'icon' => 'check-circle-fill text-success', 'label' => 'Confirmed'],
                                        'processing' => ['date' => $order->processing_date, 'icon' => 'gear-fill text-info', 'label' => 'Processing'],
                                        'picked' => ['date' => $order->picked_date, 'icon' => 'box-seam text-primary', 'label' => 'Picked'],
                                        'shipped' => ['date' => $order->shipped_date, 'icon' => 'truck text-secondary', 'label' => 'Shipped'],
                                        'delivered' => ['date' => $order->delivered_date, 'icon' => 'check2-all text-success', 'label' => 'Delivered'],
                                    ];
                                @endphp

                                @foreach($steps as $key => $step)
                                    @if($step['date'])
                                        <div class="timeline-item mb-3">
                                            <div class="d-flex">
                                                <div class="timeline-icon">
                                                    <i class="bi bi-{{ $step['icon'] }} fs-4"></i>
                                                </div>
                                                <div class="ms-3 flex-grow-1">
                                                    <p class="mb-0 fw-semibold">{{ $step['label'] }}</p>
                                                    <small class="text-muted">{{ $step['date']->format('d M Y, h:i A') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @if($order->cancel_date)
                                    <div class="timeline-item mb-3 text-danger">
                                        <div class="d-flex">
                                            <div class="timeline-icon"><i class="bi bi-x-circle-fill fs-4"></i></div>
                                            <div class="ms-3">
                                                <p class="mb-0 fw-semibold">Cancelled</p>
                                                <small>{{ $order->cancel_date->format('d M Y, h:i A') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($order->return_date)
                                    <div class="timeline-item text-dark">
                                        <div class="d-flex">
                                            <div class="timeline-icon"><i class="bi bi-arrow-return-left fs-4"></i></div>
                                            <div class="ms-3">
                                                <p class="mb-0 fw-semibold">Returned</p>
                                                <small>{{ $order->return_date->format('d M Y, h:i A') }}</small>
                                                @if($order->return_reason)<br><small>Reason: {{ $order->return_reason }}</small>@endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Comments (if any) -->
            @if($order->comment)
                <div class="card border-0 shadow-sm rounded-4 mt-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-chat-dots me-2"></i>Customer Notes</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            {!! nl2br(e($order->comment)) !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .timeline-item {
        position: relative;
        padding-left: 30px;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 11px;
        top: 30px;
        bottom: -20px;
        width: 2px;
        background: #e9ecef;
    }
    .timeline-item:last-child::before {
        display: none;
    }
    .timeline-icon {
        width: 24px;
        height: 24px;
        flex-shrink: 0;
    }
</style>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endpush