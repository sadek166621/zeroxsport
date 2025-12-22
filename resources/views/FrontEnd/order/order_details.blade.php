@php
use App\Models\Review;
@endphp
@extends('FrontEnd.master')

@section('title', 'Order Details')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Order Details - Invoice #{{ $order['invoice_no'] }}</h2>

        <div class="row">
            {{-- Customer & Shipping Info --}}
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Customer Information</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $order['name'] }}</p>
                        <p><strong>Phone:</strong> {{ $order['phone'] }}</p>
                        <p><strong>Email:</strong> {{ $order['email'] }}</p>
                        <p><strong>Address:</strong><br>{{ nl2br(e($order['address'])) }}</p>
                    </div>
                </div>
            </div>

            {{-- Payment & Status Info --}}
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Payment & Order Info</div>
                    <div class="card-body">
                        <p><strong>Order Type:</strong> {{ $order['order_type'] == 1 ? 'Regular' : 'Other' }}</p>
                        <p><strong>Payment Method:</strong> {{ strtoupper($order['payment_method']) }}</p>
                        <p><strong>Payment Status:</strong> {{ $order['payment_status'] ? 'Paid' : 'Unpaid' }}</p>
                        <p><strong>Shipping:</strong> {{ $order['shipping_name'] }} ({{ $order['shipping_charge'] }} TK)</p>
                        <p><strong>Delivery Status:</strong> {{ ucfirst($order['delivery_status']) }}</p>
                        <p><strong>Comment:</strong> {{ $order['comment'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Order Summary --}}
        <div class="card mb-4">
            <div class="card-header">Order Summary</div>
            <div class="card-body">
                <p><strong>Subtotal:</strong> {{ $order['sub_total'] }} TK</p>
                <p><strong>Discount:</strong> {{ $order['discount'] }} TK</p>
                <p><strong>Shipping:</strong> {{ $order['shipping_charge'] }} TK</p>
                <hr>
                <h5><strong>Grand Total:</strong> {{ $order['grand_total'] }} TK</h5>
            </div>
        </div>

        {{-- Ordered Products Table --}}
        <div class="card mb-4">
            <div class="card-header">Ordered Products</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            @if(($order['delivery_status'] == 'delivered') && ($order['payment_status'] == 1))
                                <th>Review</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $orderDetail)
                            <tr>
                                <td>
                                    <img src="{{ asset($orderDetail->product->product_thumbnail) }}" alt="" width="50">
                                    {{ $orderDetail->product_name }}<br>
                                </td>
                                <td>{{ $orderDetail->qty }}</td>
                                <td>{{ number_format($orderDetail->price, 2) }} TK</td>
                                <td>{{ number_format($orderDetail->qty * $orderDetail->price, 2) }} TK</td>
                                 @if($order['delivery_status'] == 'delivered' && $order['payment_status'] == 1)
                                <td>
                                   
                                    @if(!\App\Models\Review::where('product_id', $orderDetail->product_id)->where('user_id', auth()->id())->where('verified_purchase', 1)->where('status', 1)->exists())
                                        <a href="{{ route('product.review.create', $orderDetail->product_id) }}"
                                            class="btn btn-sm btn-primary">Write Review</a>
                                    @else
                                        <span class="text-success">Reviewed</span>
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