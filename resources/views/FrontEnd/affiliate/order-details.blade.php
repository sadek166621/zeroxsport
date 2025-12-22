@extends('FrontEnd.affiliate.master')

@section('title', 'Order Details')

@section('content')
    <div class="card shadow-sm rounded-4 p-4 bg-white">
        <h4 class="mb-4">Order Details</h4>

        <div class="mb-4">
            <a href="{{ route('affiliate.orders') }}" class="btn btn-outline-info bg-success btn-sm">
                <i class="bi bi-arrow-left"></i> Back to Orders
            </a>
        </div>

        <div class="row gy-4">
            <!-- Left Column -->
            <div class="col-md-6">
                <h5 class="mb-3">Customer Information</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Name:</strong> {{ $order->name }}</li>
                    <li class="list-group-item"><strong>Phone:</strong> {{ $order->phone }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $order->email }}</li>
                    <li class="list-group-item"><strong>Address:</strong> {{ $order->address }}</li>
                    <li class="list-group-item"><strong>Division:</strong> {{ $order->division->name ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>District:</strong> {{ $order->district->name ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Upazilla:</strong> {{ $order->upazilla->name ?? 'N/A' }}</li>
                </ul>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <h5 class="mb-3">Order Information</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Invoice No:</strong> {{ $order->invoice_no }}</li>
                    <li class="list-group-item"><strong>Order Type:</strong> {{ ucfirst($order->order_type) }}</li>
                    <li class="list-group-item">
                        <strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}
                    </li>
                    <li class="list-group-item">
                        <strong>Payment Status:</strong>
                        @if($order->payment_status == 'paid')
                            <span class="badge bg-success">Paid</span>
                        @elseif($order->payment_status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @else
                            <span class="badge bg-danger">Unpaid</span>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <strong>Delivery Status:</strong>
                        @php
                            $statusColors = [
                                'pending' => 'warning',
                                'processing' => 'info',
                                'picked' => 'primary',
                                'shipped' => 'secondary',
                                'delivered' => 'success',
                                'cancelled' => 'danger',
                                'returned' => 'dark',
                            ];
                        @endphp
                        <span class="badge bg-{{ $statusColors[$order->delivery_status] ?? 'secondary' }}">
                            {{ ucfirst($order->delivery_status ?? 'N/A') }}
                        </span>
                    </li>
                    <li class="list-group-item"><strong>Shipping Type:</strong> {{ ucfirst($order->shipping_type) }}</li>
                    <li class="list-group-item"><strong>Shipping Charge:</strong> ৳{{ number_format($order->shipping_charge, 2) }}</li>
                    <li class="list-group-item"><strong>Coupon:</strong> {{ $order->coupon ?? 'N/A' }}</li>
                </ul>
            </div>
        </div>

        <!-- Financial Summary -->
        <div class="mt-5">
            <h5 class="mb-3">Financial Summary</h5>
            <table class="table table-bordered text-nowrap w-auto">
                <tbody>
                    <tr>
                        <th>Sub Total</th>
                        <td>৳{{ number_format($order->sub_total, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td>৳{{ number_format($order->discount, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Shipping Charge</th>
                        <td>৳{{ number_format($order->shipping_charge, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Grand Total</th>
                        <td class="fw-bold">৳{{ number_format($order->grand_total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Timeline for Order Status -->
        <div class="mt-5">
            <h5 class="mb-3">Order Timeline</h5>
            <ul class="list-group">
                @if($order->confirmed_date)
                    <li class="list-group-item">
                        <i class="bi bi-check-circle-fill text-success me-2"></i> Confirmed: {{ $order->confirmed_date->format('d M Y, h:i A') }}
                    </li>
                @endif
                @if($order->processing_date)
                    <li class="list-group-item">
                        <i class="bi bi-gear-fill text-info me-2"></i> Processing: {{ $order->processing_date->format('d M Y, h:i A') }}
                    </li>
                @endif
                @if($order->picked_date)
                    <li class="list-group-item">
                        <i class="bi bi-box-seam text-primary me-2"></i> Picked: {{ $order->picked_date->format('d M Y, h:i A') }}
                    </li>
                @endif
                @if($order->shipped_date)
                    <li class="list-group-item">
                        <i class="bi bi-truck text-secondary me-2"></i> Shipped: {{ $order->shipped_date->format('d M Y, h:i A') }}
                    </li>
                @endif
                @if($order->delivered_date)
                    <li class="list-group-item">
                        <i class="bi bi-check2-circle text-success me-2"></i> Delivered: {{ $order->delivered_date->format('d M Y, h:i A') }}
                    </li>
                @endif
                @if($order->cancel_date)
                    <li class="list-group-item text-danger">
                        <i class="bi bi-x-circle-fill me-2"></i> Cancelled: {{ $order->cancel_date->format('d M Y, h:i A') }}
                    </li>
                @endif
                @if($order->return_date)
                    <li class="list-group-item text-dark">
                        <i class="bi bi-arrow-return-left me-2"></i> Returned: {{ $order->return_date->format('d M Y, h:i A') }}
                        <br><small>Reason: {{ $order->return_reason }}</small>
                    </li>
                @endif
            </ul>
        </div>

        <!-- Comments / Notes -->
        @if($order->comment)
        <div class="mt-5">
            <h5>Comments</h5>
            <div class="alert alert-secondary">
                {!! nl2br(e($order->comment)) !!}
            </div>
        </div>
        @endif
    </div>

<!-- Bootstrap Icons CDN (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

@endsection
