@extends('customer.master')
@section('title')
My Orders | Dashboard
@endsection
@section('content')

<div class="content-header">
    <h2>My Orders</h2>
    <p>Track and manage all your purchases</p>
</div>

@if($orders->count() > 0)
<div class="orders-filter-section mb-4">
    <div class="row g-3">
        <div class="col-md-4">
            <div class="filter-card">
                <div class="filter-icon">📦</div>
                <div class="filter-info">
                    <div class="filter-value">{{ count($all) }}</div>
                    <div class="filter-label">Total Orders</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="filter-card">
                <div class="filter-icon">⏳</div>
                <div class="filter-info">
                    <div class="filter-value">{{ count($pending) }}</div>
                    <div class="filter-label">Pending</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="filter-card">
                <div class="filter-icon">✓</div>
                <div class="filter-info">
                    <div class="filter-value">{{ count($completed) }}</div>
                    <div class="filter-label">Completed</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="orders-wrapper">
    <div class="table-responsive">
        <table class="table orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>
                        <span class="order-id-badge">#{{ $order->invoice_no }}</span>
                    </td>
                    <td>
                        <div class="order-date">{{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}</div>
                        <div class="order-time">{{ \Carbon\Carbon::parse($order->date)->format('h:i A') }}</div>
                    </td>
                    <td>
                        @php
                        $statusMap = [
                        0 => ['text' => 'Pending', 'class' => 'bg-secondary'],
                        1 => ['text' => 'Confirmed', 'class' => 'bg-info'],
                        2 => ['text' => 'Processing', 'class' => 'bg-primary'],
                        3 => ['text' => 'Shipped', 'class' => 'bg-warning'],
                        4 => ['text' => 'Delivered', 'class' => 'bg-success'],
                        5 => ['text' => 'Canceled', 'class' => 'bg-danger'],
                        ];
                        $status = $statusMap[$order->delivery_status] ?? ['text' => $order->delivery_status, 'class' => 'bg-light'];
                        @endphp
                        <span class="badge {{ $status['class'] }} text-white">{{ $status['text'] }}</span>
                    </td>
                    <td>
                        <span class="order-amount">৳{{ number_format($order->grand_total, 2) }}</span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('order.details', $order->invoice_no) }}" class="btn-action btn-view">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('order.view', $order->invoice_no) }}" class="btn-action btn-invoice">
                                <i class="fas fa-file-pdf"></i> Invoice
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="empty-state">
    <div class="empty-icon">📦</div>
    <h3>No Orders Yet</h3>
    <p>You haven't placed any orders yet. Start shopping to see your orders here.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">
        <i class="fas fa-shopping-bag"></i> Continue Shopping
    </a>
</div>
@endif

<style>
    :root {
        --primary: #026142;
        --primary-light: #e8f5f1;
        --border-color: #e5e7eb;
        --lighter: #f3f4f6;
        --dark: #111827;
        --text-muted: #6b7280;
        --transition: all 0.3s ease;
    }

    .orders-filter-section {
        display: grid;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .filter-card {
        background: linear-gradient(135deg, #f0faf8 0%, #ffffff 100%);
        border: 2px solid var(--border-color);
        border-radius: 1.25rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .filter-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary) 0%, transparent 100%);
    }

    .filter-card:hover {
        border-color: var(--primary);
        box-shadow: 0 8px 20px rgba(2, 97, 66, 0.1);
        transform: translateY(-4px);
    }

    .filter-icon {
        font-size: 2.5rem;
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.1) 100%);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .filter-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .filter-label {
        color: var(--text-muted);
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .orders-wrapper {
        background: white;
        border-radius: 1.25rem;
        border: 1px solid var(--border-color);
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(2, 97, 66, 0.08);
    }

    .orders-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .orders-table thead {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        border-bottom: 2px solid var(--primary);
    }

    .orders-table thead th {
        padding: 1.75rem 1.5rem;
        font-weight: 700;
        color: #004d34;
        text-align: left;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.6px;
    }

    .orders-table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: var(--transition);
    }

    .orders-table tbody tr:hover {
        background: var(--lighter);
    }

    .orders-table tbody td {
        padding: 1.5rem;
        color: var(--text-muted);
        font-size: 0.95rem;
        vertical-align: middle;
    }

    .order-id-badge {
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.1) 100%);
        color: var(--primary);
        padding: 0.7rem 1.2rem;
        border-radius: 0.6rem;
        font-weight: 700;
        font-size: 0.9rem;
        display: inline-block;
    }

    .order-date {
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.3rem;
    }

    .order-time {
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .order-amount {
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--primary);
    }

    .action-buttons {
        display: flex;
        gap: 0.6rem;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 0.6rem;
        border: 2px solid transparent;
        font-weight: 600;
        font-size: 0.8rem;
        transition: var(--transition);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        cursor: pointer;
    }

    .btn-view {
        background: linear-gradient(135deg, var(--primary) 0%, #014d34 100%);
        color: white;
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(2, 97, 66, 0.25);
    }

    .btn-invoice {
        background: transparent;
        color: var(--primary);
        border-color: var(--primary);
    }

    .btn-invoice:hover {
        background: var(--primary-light);
        color: var(--primary);
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: linear-gradient(135deg, var(--lighter) 0%, #ffffff 100%);
        border-radius: 1.25rem;
        border: 2px dashed var(--border-color);
    }

    .empty-icon {
        font-size: 4rem;
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.75rem;
    }

    .empty-state p {
        color: var(--text-muted);
        margin-bottom: 2rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, #014d34 100%);
        color: white !important;
        border: none;
    }

    .btn-primary:hover {
        color: white;
    }

    @media (max-width: 768px) {
        .orders-table thead th,
        .orders-table tbody td {
            padding: 1rem;
            font-size: 0.85rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
        }
    }
</style>

@endsection
