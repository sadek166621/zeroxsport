@extends('customer.master')
@section('title')
Dashboard | Welcome
@endsection
@section('content')

<div class="content-header d-flex align-items-center justify-content-between mb-4">
    <div>
        <h2 class="fw-semibold mb-1" style="font-size:2rem;">Welcome, {{ Auth::user()->name ?? 'User' }}!</h2>
        <p class="text-muted mb-0">Here's a quick summary of your account activity.</p>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6">
        <div class="card shadow-sm border-0 stat-modern-card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="stat-modern-icon bg-primary bg-opacity-10 text-white me-3">
                    <i style="font-size: large;" class="fas fa-shopping-cart"></i>
                </div>
                <div>
                    <div class="fs-4 fw-bold">{{ count($all) }}</div>
                    <div class="text-muted small">Total Orders</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="card shadow-sm border-0 stat-modern-card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="stat-modern-icon bg-warning bg-opacity-10 text-warning me-3">
                    <i style="font-size: large;" class="fas fa-clock"></i>
                </div>
                <div>
                    <div class="fs-4 fw-bold">{{ count($pending) }}</div>
                    <div class="text-muted small">Pending Orders</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="card shadow-sm border-0 stat-modern-card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="stat-modern-icon bg-success bg-opacity-10 text-success me-3">
                    <i style="font-size: large;" class="fas fa-check-circle"></i>
                </div>
                <div>
                    <div class="fs-4 fw-bold">{{ count($completed) }}</div>
                    <div class="text-muted small">Completed Orders</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="card shadow-sm border-0 stat-modern-card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="stat-modern-icon bg-info bg-opacity-10 text-info me-3">
                    <i style="font-size: large;" class="fas fa-coins"></i>
                </div>
                <div>
                    <div class="fs-4 fw-bold">{{ Auth::user()->points ?? '0' }}</div>
                    <div class="text-muted small">Reward Points</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recent-orders">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="fw-semibold mb-1">Recent Orders</h3>
            <p class="text-muted small mb-0">Your latest 5 orders</p>
        </div>
        <a href="{{ route('dashboard.orders') }}" class="btn .btn-view" style="background-color: #026142; color: white;">
            <i class="fas fa-arrow-right me-2"></i>View All Orders
        </a>
    </div>

    @if($orders && $orders->count() > 0)
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
                    @foreach($orders->take(5) as $order)
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
                                <a href="{{ route('order.details', $order->invoice_no) }}" class="btn-action btn-view" title="View Details">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('order.view', $order->invoice_no) }}" class="btn-action btn-invoice" title="Download Invoice">
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
    <div class="empty-orders-state">
        <div class="empty-state-icon">
            <i class="fas fa-inbox"></i>
        </div>
        <h5>No Orders Yet</h5>
        <p>You haven't placed any orders. Start shopping to see your orders here.</p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">
            <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
        </a>
    </div>
    @endif
</div>

<style>
    :root {
        --primary: #026142;
        --primary-light: #e8f5f1;
        --primary-dark: #014d34;
        --success-light: #d1fae5;
        --info-light: #dbeafe;
        --border-color: #e5e7eb;
        --lighter: #f3f4f6;
        --dark: #111827;
        --text-muted: #6b7280;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .stat-modern-card {
        border-radius: 1.25rem;
        border: 1.5px solid var(--border-color);
        transition: var(--transition);
        background: white;
        overflow: hidden;
        position: relative;
    }

    .stat-modern-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary) 0%, transparent 100%);
    }

    .stat-modern-card:hover {
        box-shadow: 0 12px 32px rgba(2, 97, 66, 0.15);
        transform: translateY(-4px);
        border-color: var(--primary);
    }

    .stat-modern-icon {
        width: 60px;
        height: 60px;
        border-radius: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        flex-shrink: 0;
        transition: var(--transition);
    }

    .stat-modern-card:hover .stat-modern-icon {
        transform: scale(1.1);
    }

    .stat-modern-icon.bg-primary {
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.1) 100%);
        color: var(--primary);
    }

    .stat-modern-icon.bg-warning {
        background: linear-gradient(135deg, #fef3c7 0%, rgba(245, 158, 11, 0.1) 100%);
        color: #f59e0b;
    }

    .stat-modern-icon.bg-success {
        background: linear-gradient(135deg, var(--success-light) 0%, rgba(16, 185, 129, 0.1) 100%);
        color: #10b981;
    }

    .stat-modern-icon.bg-info {
        background: linear-gradient(135deg, var(--info-light) 0%, rgba(59, 130, 246, 0.1) 100%);
        color: #3b82f6;
    }

    .stat-modern-card .fs-4 {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
    }

    .recent-orders {
        margin-top: 3.5rem;
        padding-top: 2.5rem;
        border-top: 2px solid var(--lighter);
    }

    .recent-orders h3 {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--dark);
        letter-spacing: -0.5px;
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

    .order-items {
        color: var(--dark);
        font-weight: 600;
    }

    .order-status-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 0.6rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .order-status-badge[data-status="pending"],
    .order-status-badge[data-status="processing"] {
        background: linear-gradient(135deg, #fef3c7 0%, rgba(245, 158, 11, 0.1) 100%);
        color: #b45309;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }

    .order-status-badge[data-status="completed"],
    .order-status-badge[data-status="delivered"] {
        background: linear-gradient(135deg, var(--success-light) 0%, rgba(16, 185, 129, 0.1) 100%);
        color: #047857;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .order-status-badge[data-status="cancelled"] {
        background: linear-gradient(135deg, #fee2e2 0%, rgba(239, 68, 68, 0.1) 100%);
        color: #991b1b;
        border: 1px solid rgba(239, 68, 68, 0.3);
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

    .empty-orders-state {
        text-align: center;
        padding: 4rem 2rem;
        background: linear-gradient(135deg, var(--lighter) 0%, white 100%);
        border: 2px dashed var(--border-color);
        border-radius: 1.5rem;
    }

    .empty-state-icon {
        font-size: 4rem;
        color: var(--primary);
        opacity: 0.3;
        margin-bottom: 1rem;
    }

    .empty-orders-state h5 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .empty-orders-state p {
        color: var(--text-muted);
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .stat-modern-card .fs-4 {
            font-size: 1.5rem;
        }

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