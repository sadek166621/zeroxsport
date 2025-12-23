@extends('admin.admin_master')
@section('admin')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">

            <!-- Header -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-gradient-primary text-white rounded-top-4 py-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1 fw-bold"><i class="bi bi-receipt-cutoff me-2"></i> Order Details</h3>
                        <p class="mb-0 small opacity-75">
                            Order ID: <strong>{{ $order->invoice_no ?? $order->id }}</strong> • 
                            Placed on {{ $order->created_at->format('d M Y, h:i A') }}
                        </p>
                    </div>
                    <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-light btn-lg shadow-sm">
                        <i class="bi bi-file-earmark-arrow-down me-2"></i> Download Invoice
                    </a>
                </div>
            </div>

            <!-- Status Update Bar -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" id="statusUpdateForm">
                        @csrf
                        <div class="row align-items-end g-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Payment Status</label>
                                <select name="payment_status" class="form-select form-select-lg shadow-sm">
                                    <option value="0" {{ $order->payment_status == 0 ? 'selected' : '' }}>Unpaid</option>
                                    <option value="1" {{ $order->payment_status == 1 ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-semibold">Delivery Status</label>
                                @if($order->delivery_status != 5)
                                    <select name="delivery_status" class="form-select form-select-lg shadow-sm">
                                        <option value="0" {{ $order->delivery_status == 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ $order->delivery_status == 1 ? 'selected' : '' }}>Confirmed</option>
                                        <option value="2" {{ $order->delivery_status == 2 ? 'selected' : '' }}>Processing</option>
                                        <option value="3" {{ $order->delivery_status == 3 ? 'selected' : '' }}>Shipped</option>
                                        <option value="4" {{ $order->delivery_status == 4 ? 'selected' : '' }}>Delivered</option>
                                        <option value="5" {{ $order->delivery_status == 5 ? 'selected' : '' }}>Canceled</option>
                                        <option value="6" {{ $order->delivery_status == 6 ? 'selected' : '' }}>Returned</option>
                                        <option value="7" {{ $order->delivery_status == 7 ? 'selected' : '' }}>Refunded</option>
                                        <option value="8" {{ $order->delivery_status == 8 ? 'selected' : '' }}>Failed</option>
                                    </select>
                                @else
                                    <input type="text" class="form-control form-control-lg bg-light shadow-sm" value="Canceled" disabled>
                                @endif
                            </div>
                            <div class="col-md-3 text-end">
                                <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                                    <i class="bi bi-save me-2"></i> Update Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row g-4">
                <!-- Financial Summary -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-header bg-light border-0 py-3 rounded-top-4">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-currency-exchange me-2"></i> Financial Summary</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless align-middle">
                                <tbody>
                                    <tr><th>Subtotal</th><td class="text-end">৳{{ number_format($order->sub_total, 2) }}</td></tr>
                                    <tr><th>Discount</th><td class="text-end text-danger">-৳{{ number_format($order->discount, 2) }}</td></tr>
                                    <tr><th>Shipping</th><td class="text-end">৳{{ number_format($order->shipping_charge ?? 0, 2) }}</td></tr>
                                    <tr class="border-top"><th class="pt-3 fs-5">Grand Total</th><td class="text-end pt-3 fs-5 fw-bold text-primary">৳{{ number_format($order->grand_total, 2) }}</td></tr>
                                    <tr>
                                        <th>Current Status</th>
                                        <td class="text-end">
                                            @php
                                                $statusColors = ['0'=>'warning','1'=>'info','2'=>'primary','3'=>'secondary','4'=>'success','5'=>'danger','6'=>'dark','7'=>'secondary','8'=>'danger'];
                                                $statusTexts = ['0'=>'Pending','1'=>'Confirmed','2'=>'Processing','3'=>'Shipped','4'=>'Delivered','5'=>'Canceled','6'=>'Returned','7'=>'Refunded','8'=>'Failed'];
                                            @endphp
                                            <span class="badge bg-{{ $statusColors[$order->delivery_status] ?? 'secondary' }} fs-6 px-3 py-2 shadow-sm">
                                                <i class="bi bi-circle-fill me-1"></i>{{ $statusTexts[$order->delivery_status] ?? 'N/A' }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Ordered Products -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-light border-0 py-3 rounded-top-4">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-bag-check me-2"></i> Ordered Products ({{ $order->orderDetails->count() }})</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Product</th>
                                            <th>Qty</th>
                                            <th class="text-end pe-4">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $item)
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset($item->product->product_thumbnail ?? 'placeholder.jpg') }}" class="rounded me-3 shadow-sm" style="width:50px;height:50px;object-fit:cover;">
                                                        <div>
                                                            <div class="fw-semibold">{{ $item->product->name_en }}</div>
                                                            @if($item->variation ?? false)
                                                                <small class="text-muted">{{ $item->variation }}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->qty }}</td>
                                                <td class="text-end fw-bold pe-4">৳{{ number_format($item->price * $item->qty, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .bg-gradient-primary {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
        }
    </style>
@endpush

@push('scripts')
<script>
    // Auto-submit on change
    document.getElementById('statusUpdateForm').addEventListener('change', function() {
        this.submit();
    });
</script>
@endpush
@endsection