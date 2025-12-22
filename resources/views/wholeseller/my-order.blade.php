@extends('wholeseller.wholeseller-master')
@section('wholeseller_body')
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
            border: none;
        }

        .summary-card {
            padding: 18px;
            color: #fff;
        }

        .summary-card h6 {
            margin: 0;
            font-weight: 600;
        }

        .summary-card p {
            margin: 6px 0 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .filters .form-control,
        .filters .btn {
            height: 46px;
        }

        .badge-status {
            padding: 6px 10px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .badge-pending {
            background: #FFB020;
            color: #fff;
        }

        .badge-completed {
            background: #13B262;
            color: #fff;
        }

        .badge-cancelled {
            background: #E55353;
            color: #fff;
        }

        .orders-table th,
        .orders-table td {
            vertical-align: middle;
        }

        .order-card-mobile {
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 12px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        @media (max-width: 767px) {
            .desktop-only {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .mobile-only {
                display: none;
            }
        }
    </style>

    <div class="orders-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">My Orders</h4>
            <small class="text-muted">Overview of your recent wholeseller orders</small>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3 mb-2">
                <div class="card summary-card bg-primary">
                    <h6 class="text-white">Total Orders</h6>
                    <p>{{ count($orders) }}</p>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="card summary-card bg-success">
                    <h6 class="text-white">Completed Orders</h6>
                    <p>{{ $completed_orders }}</p>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="card summary-card bg-warning">
                    <h6 class="text-white">Pending Orders</h6>
                    <p>{{ $pending_orders }}</p>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="card summary-card bg-info">
                    <h6 class="text-white">Total Purchase</h6>
                    <p>৳ {{ $total_purchase }}</p>
                </div>
            </div>
        </div>

        {{-- <div class="card mb-3 p-3 filters">
            <div class="row g-2">
                <div class="col-md-4 col-sm-12">
                    <input class="form-control" placeholder="Search order ID, product or customer">
                </div>
                <div class="col-md-3 col-sm-6">
                    <select class="form-control">
                        <option value="">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-6">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2 col-sm-12 d-flex">
                    <button class="btn btn-outline-secondary me-2 w-100">Export</button>
                    <button class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </div> --}}

        <div class="card mb-3 p-3 filters">
            <form method="GET" action="{{ route('wholeseller.my-order') }}">
                <div class="row g-2">
                    <div class="col-md-4 col-sm-12">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search order ID, product or customer">
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <select name="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Completed
                            </option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                            </option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <input type="date" name="date" value="{{ request('date') }}" class="form-control">
                    </div>

                    <div class="col-md-2 col-sm-12 d-flex">
                        <a href="{{ route('wholeseller.my-order') }}"
                            class="btn btn-outline-secondary me-2 w-100">Reset</a>
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card p-3 desktop-only">
            <table class="table orders-table mb-0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Order ID</th>
                        <th>Placed On</th>
                        <th>Customer / Items</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->invoice_no }}</td>
                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                            <td>
                                @if ($order->order_details && $order->order_details->count() > 0)
                                    @foreach ($order->order_details as $detail)
                                        <div>{{ $detail->product ? $detail->product->name_en : 'Product Deleted' }}</div>
                                    @endforeach
                                    <small class="text-muted">{{ $order->order_details->count() }} item(s)</small>
                                @else
                                    <div>No items</div>
                                @endif
                            </td>
                            <td>৳ {{ number_format($order->grand_total, 2) }}</td>
                            <td>
                                @if ($order->delivery_status == 'delivered')
                                    <span class="badge-status badge-completed">Completed</span>
                                @elseif($order->delivery_status == 'pending')
                                    <span class="badge-status badge-pending">Pending</span>
                                @else
                                    <span class="badge-status badge-other">{{ ucfirst($order->delivery_status) }}</span>
                                @endif
                            </td>
                            <td class="text-end">
                                {{-- {{ route('wholeseller.order.view', $order->id) }}, {{ route('wholeseller.order.invoice', $order->id) }} --}}
                                <a href="{{ route('wholeseller.order.view', $order->invoice_no) }}"
                                    class="btn btn-sm btn-dark">View</a>
                                <a href="{{ route('wholeseller.order.download', $order->invoice_no) }}"
                                    class="btn btn-sm btn-success">Invoice</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="mt-3 d-flex justify-content-end">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <div class="mobile-only">
            @foreach ($orders as $index => $order)
                <div class="order-card-mobile mb-3 p-3 border rounded shadow-sm bg-white">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>#{{ $order->invoice_no }}</strong><br>
                            @php
                                $firstProduct = $order->order_details->first();
                                $productName =
                                    $firstProduct && $firstProduct->product
                                        ? $firstProduct->product->name_en
                                        : 'No Product';
                                $itemCount = $order->order_details->count();
                            @endphp
                            <small class="text-muted">
                                {{ $order->created_at->format('Y-m-d') }} • {{ $productName }}
                                ({{ $itemCount }} {{ Str::plural('item', $itemCount) }})
                            </small>
                        </div>
                        <div class="text-end">
                            <div>
                                @if ($order->delivery_status == 'delivered')
                                    <span class="badge-status badge-completed">Completed</span>
                                @elseif($order->delivery_status == 'pending')
                                    <span class="badge-status badge-pending">Pending</span>
                                @else
                                    <span class="badge-status badge-other">{{ ucfirst($order->delivery_status) }}</span>
                                @endif
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('wholeseller.order.view', $order->invoice_no) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    View
                                </a>
                                <a href="{{ route('wholeseller.order.download', $order->invoice_no) }}"
                                    class="btn btn-sm btn-success">
                                    Invoice
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <strong>৳ {{ number_format($order->grand_total, 2) }}</strong>
                    </div>
                </div>
            @endforeach
            {{-- Pagination for Mobile --}}
            <div class="mt-3 d-flex justify-content-end">
                <div class="pagination-wrapper w-100 text-center">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    @include('wholeseller.cart-container')
@endsection

@push('js')
    <script>
        document.querySelector('input[name="search"]').addEventListener('keyup', function() {
            clearTimeout(window.searchTimer);
            window.searchTimer = setTimeout(() => {
                document.querySelector('.filters form').submit();
            }, 500);
        });
    </script>
@endpush
