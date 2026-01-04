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
        <a href="{{ route('dashboard.orders') }}" class="btn btn-primary">
            <i class="fas fa-arrow-right me-2"></i>View All Orders
        </a>
    </div>
    <div class="row g-3">
        @foreach($orders->take(5) as $order)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm order-card h-100">
                <div class="card-body">
                    <div class="order-card-header mb-3">
                        <div class="d-flex align-items-start justify-content-between">
                            <div>
                                <span class="badge rounded-pill status-badge mb-2" style="background: linear-gradient(135deg, #fef3c7 0%, rgba(245, 158, 11, 0.1) 100%); color: #b45309;">
                                    {{ $order->delivery_status }}
                                </span>
                                <div class="order-id-large">Order #{{ $order->invoice_no }}</div>
                            </div>
                            <span class="order-date-small">{{ \Carbon\Carbon::parse($order->date)->format('d M') }}</span>
                        </div>
                    </div>

                    <div class="order-card-divider mb-3"></div>

                    <div class="order-card-body mb-3">
                        <div class="order-item-count mb-2">
                            <i class="fas fa-box-open text-muted me-2"></i>
                            <span class="text-muted small">Items in order</span>
                        </div>
                        <div class="order-total">
                            <span class="text-muted small">Total Amount</span>
                            <div class="amount-display">৳{{ number_format($order->grand_total, 2) }}</div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('order.view', $order->invoice_no) }}" class="btn btn-sm btn-outline-primary flex-grow-1">
                            <i class="fas fa-file-pdf me-1"></i>Invoice
                        </a>
                        <a href="{{ route('order.details', $order->invoice_no) }}" class="btn btn-sm btn-outline-secondary flex-grow-1">
                            <i class="fas fa-eye me-1"></i>Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
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

    .order-card {
        border-radius: 1.25rem;
        background: white;
        transition: var(--transition);
        border: 1.5px solid var(--border-color);
        overflow: hidden;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .order-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--primary) 0%, transparent 100%);
    }

    .order-card:hover {
        box-shadow: 0 12px 32px rgba(2, 97, 66, 0.15);
        transform: translateY(-4px);
        border-color: var(--primary);
    }

    .order-card .card-body {
        padding: 1.75rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .order-id-large {
        font-weight: 700;
        color: var(--dark);
        font-size: 1.1rem;
    }

    .status-badge {
        display: inline-block;
        padding: 0.6rem 1.1rem;
        border-radius: 0.6rem;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .order-card-divider {
        height: 1px;
        background: var(--border-color);
    }

    .order-amount {
        font-weight: 700;
        font-size: 1.2rem;
        color: var(--primary);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(2, 97, 66, 0.2);
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(2, 97, 66, 0.3);
        color: white;
    }

    .btn-outline-primary {
        border: 2px solid var(--primary);
        color: var(--primary);
        background: transparent;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background: var(--primary);
        color: white;
    }

    .btn-outline-secondary {
        border: 2px solid var(--border-color);
        color: var(--text-muted);
        background: white;
    }

    .btn-outline-secondary:hover {
        background: var(--lighter);
        border-color: var(--primary);
        color: var(--primary);
    }

    @media (max-width: 768px) {
        .stat-modern-card .fs-4 {
            font-size: 1.5rem;
        }
    }
</style>


@endsection
