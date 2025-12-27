@extends('FrontEnd.affiliate.master')

@section('title', 'My Orders')

@section('content')

<style>
    .orders-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .orders-header {
        margin-bottom: 30px;
    }

    .orders-header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        position: relative;
        padding-bottom: 15px;
    }

    .orders-header h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #F1592A 0%, #d84620 100%);
        border-radius: 2px;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: linear-gradient(135deg, rgba(241, 89, 42, 0.05) 0%, rgba(216, 70, 32, 0.05) 100%);
        border-radius: 12px;
        border: 2px dashed #F1592A;
    }

    .empty-state-icon {
        font-size: 4rem;
        color: #F1592A;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #666;
    }

    .table-wrapper {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .orders-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .orders-table thead {
        background: linear-gradient(135deg, #F1592A 0%, #d84620 100%);
        color: white;
    }

    .orders-table thead th {
        padding: 18px 15px;
        text-align: left;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
    }

    .orders-table tbody tr {
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }

    .orders-table tbody tr:hover {
        background-color: #fafafa;
    }

    .orders-table tbody td {
        padding: 16px 15px;
        color: #333;
        font-size: 0.95rem;
    }

    .invoice-cell {
        font-weight: 600;
        color: #F1592A;
    }

    .amount-cell {
        font-weight: 700;
        color: #F1592A;
        font-size: 1.05rem;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
        white-space: nowrap;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .status-confirmed {
        background: #cfe2ff;
        color: #084298;
        border: 1px solid #b6d4fe;
    }

    .status-processing {
        background: #cff4fc;
        color: #055160;
        border: 1px solid #b6effb;
    }

    .status-shipped {
        background: #e2e3e5;
        color: #383d41;
        border: 1px solid #d3d6d8;
    }

    .status-delivered {
        background: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }

    .status-canceled {
        background: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    .status-returned {
        background: #e2e3e5;
        color: #383d41;
        border: 1px solid #d3d6d8;
    }

    .status-refunded {
        background: #e2e3e5;
        color: #383d41;
        border: 1px solid #d3d6d8;
    }

    .status-failed {
        background: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    .payment-paid {
        background: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }

    .payment-pending {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .payment-unpaid {
        background: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    .btn-view {
        background: linear-gradient(135deg, #F1592A 0%, #d84620 100%);
        color: white;
        padding: 6px 14px;
        border: none;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        display: flex;
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(241, 89, 42, 0.3);
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .orders-header h1 {
            font-size: 1.5rem;
        }

        .orders-table thead th {
            padding: 12px 8px;
            font-size: 0.8rem;
        }

        .orders-table tbody td {
            padding: 12px 8px;
            font-size: 0.85rem;
        }

        .invoice-cell {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .orders-container {
            padding: 10px;
        }

        .orders-header h1 {
            font-size: 1.3rem;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .orders-table thead th {
            padding: 10px 6px;
            font-size: 0.75rem;
        }

        .orders-table tbody td {
            padding: 10px 6px;
            font-size: 0.8rem;
        }

        .amount-cell {
            font-size: 0.95rem;
        }

        .status-badge {
            padding: 4px 8px;
            font-size: 0.75rem;
        }

        .btn-view {
            padding: 4px 10px;
            font-size: 0.75rem;
        }
    }
</style>

<div class="orders-container">
    {{-- Page Header --}}
    <div class="orders-header">
        <h1>My Affiliate Orders</h1>
    </div>

    @if($orders->isEmpty())
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="bi bi-inbox"></i>
            </div>
            <h3>No Orders Yet</h3>
            <p>You haven't received any orders. Start promoting to earn commissions!</p>
        </div>
    @else
        {{-- Orders Table --}}
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Total Amount</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="invoice-cell">#{{ $order->invoice_no }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>
                                @if($order->payment_status == 1)
                                    <span class="status-badge payment-paid"><i class="bi bi-check-circle me-1"></i>Paid</span>
                                @elseif($order->payment_status == 0)
                                    <span class="status-badge payment-pending"><i class="bi bi-clock me-1"></i>Pending</span>
                                @else
                                    <span class="status-badge payment-unpaid"><i class="bi bi-x-circle me-1"></i>Unpaid</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statusClasses = [
                                        '0' => 'status-pending',
                                        '1' => 'status-confirmed',
                                        '2' => 'status-processing',
                                        '3' => 'status-shipped',
                                        '4' => 'status-delivered',
                                        '5' => 'status-canceled',
                                        '6' => 'status-returned',
                                        '7' => 'status-refunded',
                                        '8' => 'status-failed',
                                    ];

                                    $statusTexts = [
                                        '0' => 'Pending',
                                        '1' => 'Confirmed',
                                        '2' => 'Processing',
                                        '3' => 'Shipped',
                                        '4' => 'Delivered',
                                        '5' => 'Canceled',
                                        '6' => 'Returned',
                                        '7' => 'Refunded',
                                        '8' => 'Failed',
                                    ];
                                @endphp
                                <span class="status-badge {{ $statusClasses[$order->delivery_status] ?? 'status-pending' }}">
                                    {{ $statusTexts[$order->delivery_status] ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="amount-cell">৳{{ number_format($order->grand_total, 2) }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('affiliate.order.details', $order->id) }}" class="btn-view">
                                    <i class="bi bi-eye me-1"></i>View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

@endsection

{{-- jQuery & DataTables --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

<script>
    $(document).ready(function () {
        // DataTables initialization removed - using card layout instead
    });
</script>