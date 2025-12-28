@extends('FrontEnd.affiliate.master')

@section('content')
<style>
    .gradient-card {
        background: linear-gradient(135deg, #F1592A 0%, #d63f1a 100%);
    }

    .earnings-card {
        background: linear-gradient(135deg, #F1592A 0%, #ff7a52 100%);
    }

    .stats-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .copy-btn {
        transition: all 0.3s ease;
    }

    .copy-btn:hover {
        transform: scale(1.05);
    }

    .product-img {
        transition: transform 0.3s ease;
    }

    .product-img:hover {
        transform: scale(1.1);
    }

    .referral-code-box {
        background: linear-gradient(135deg, #F1592A15 0%, #F1592A25 100%);
        border-left: 4px solid #F1592A;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .container-fluid {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .card-body {
            padding: 1rem !important;
        }

        .card-header {
            padding: 1rem !important;
        }

        h2 {
            font-size: 1.5rem !important;
        }

        h3 {
            font-size: 1.25rem !important;
        }

        h5 {
            font-size: 1rem !important;
        }

        .fs-2 {
            font-size: 1.5rem !important;
        }

        .progress {
            display: none;
        }

        .referral-code-badge {
            width: 100%;
            margin-top: 1rem;
        }

        .input-group-lg>.form-control {
            font-size: 0.875rem;
            padding: 0.5rem 0.75rem;
        }

        .table {
            font-size: 0.75rem;
        }

        .table th {
            padding: 0.5rem !important;
        }

        .table td {
            padding: 0.5rem !important;
            word-break: break-word;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .avatar-wrapper {
            display: none;
        }

        .d-flex.align-items-center>div:last-child {
            flex: 1;
        }
    }

    @media (max-width: 768px) {
        .col-md-4 {
            margin-bottom: 1rem;
        }

        .col-md-8,
        .col-md-4 {
            flex-basis: 100%;
        }

        .text-md-end {
            text-align: left !important;
        }



        .input-group-lg>.btn {
            width: 100%;
            margin-top: 0.5rem;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .rounded-start {
            border-radius: 0.25rem !important;
        }

        .rounded-end {
            border-radius: 0.25rem !important;
        }
    }

    @media (max-width: 992px) {

        .col-md-8,
        .col-md-4 {
            flex-basis: 100%;
        }
    }
</style>

<div class="container-fluid px-1 px-sm-2 px-md-4 py-2 py-sm-3 py-md-4">
    <!-- Welcome Header -->
    <div class="row mb-3 mb-md-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 gradient-card text-white overflow-hidden position-relative">
                <div class="card-body p-2 p-sm-3 p-md-4">
                    <div class="row align-items-center g-2 g-md-0">
                        <div class="col-12 col-md-8">
                            <div class="d-flex align-items-center gap-2 gap-md-3">
                                <div class="avatar-wrapper me-2 me-md-3">
                                    <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; min-width: 50px; backdrop-filter: blur(10px);">

                                        <img src="{{ asset(auth('affiliate')->user()->profile_image ?? 'path/to/default-avatar.png') }}"
                                            alt="{{ auth('affiliate')->user()->name }}"
                                            class="w-100 h-100 object-fit-cover rounded-circle"
                                            style="width: 50px; height: 50px;">
                                    </div>
                                </div>
                                <div class="flex-grow-1 min-w-0">
                                    <h3 class="mb-1 fw-bold text-truncate" style="font-size: clamp(1rem, 2vw, 1.5rem);">Welcome back!</h3>
                                    <p class="mb-0 text-white-50 text-truncate small">
                                        <i class="fas fa-id-card me-1"></i><span class="d-sm-inline">Affiliate Partner Dashboard</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-2 mt-md-0">
                            <div class="referral-code-badge bg-white bg-opacity-25 rounded-3 p-2 p-sm-3">
                                <small class="d-block text-white-50 mb-1" style="font-size: 0.75rem;">Your Referral Code</small>
                                <h4 class="mb-0 fw-bold font-monospace text-truncate" style="font-size: clamp(0.875rem, 1.5vw, 1.25rem);">
                                    {{ auth('affiliate')->user()->referral_code }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-2 g-sm-3 g-md-4 mb-3 mb-md-4">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 stats-card h-100">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3 gap-2">
                        <div class="min-w-0 flex-grow-1">
                            <p class="text-muted mb-1 small">Total Earnings</p>
                            <h2 class="mb-0 fw-bold text-success d-flex" style="font-size: clamp(1.25rem, 3vw, 2rem);">
                                ৳<span class="text-truncate d-inline-block" style="max-width: 100%;">{{ number_format(auth('affiliate')->user()->total_earning ?? 0, 2) }}</span>
                            </h2>
                        </div>
                        <div class="bg-success bg-opacity-10 rounded-3 p-2 p-md-3 flex-shrink-0">
                            <i class="fas fa-dollar-sign text-success" style="font-size: clamp(1rem, 2vw, 1.5rem);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 stats-card h-100">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3 gap-2">
                        <div class="min-w-0 flex-grow-1">
                            <p class="text-muted mb-1 small">Total Products</p>
                            <h2 class="mb-0 fw-bold" style="color: #F1592A; font-size: clamp(1.25rem, 3vw, 2rem);">{{ count($products) }}</h2>
                        </div>
                        <div class="rounded-3 p-2 p-md-3 flex-shrink-0" style="background-color: rgba(241, 89, 42, 0.1);">
                            <i class="fas fa-box" style="color: #F1592A; font-size: clamp(1rem, 2vw, 1.5rem);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 stats-card h-100">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3 gap-2">
                        <div class="min-w-0 flex-grow-1">
                            <p class="text-muted mb-1 small">Total Orders</p>
                            <h2 class="mb-0 fw-bold" style="color: #F1592A; font-size: clamp(1.25rem, 3vw, 2rem);">{{ $totalOrders }}</h2>
                        </div>
                        <div class="rounded-3 p-2 p-md-3 flex-shrink-0" style="background-color: rgba(241, 89, 42, 0.1);">
                            <i class="fas fa-shopping-cart" style="color: #F1592A; font-size: clamp(1rem, 2vw, 1.5rem);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Referral Link -->
    {{-- <div class="row mb-3 mb-md-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex align-items-center mb-3 gap-2 gap-md-3">
                        <div class="rounded-3 p-2 flex-shrink-0" style="background-color: rgba(241, 89, 42, 0.1);">
                            <i class="fas fa-share" style="color: #F1592A; font-size: 1.25rem;"></i>
                        </div>
                        <div class="min-w-0 flex-grow-1">
                            <h5 class="mb-0 fw-bold" style="font-size: clamp(0.875rem, 2vw, 1.25rem);">Your Main Referral Link</h5>
                            <small class="text-muted d-none d-sm-inline">Share this link to earn commissions</small>
                        </div>
                    </div>
                    <div class="referral-code-box rounded-3 p-2 p-sm-3">
                        <div class="input-group input-group-lg">
                            <input type="text"
                                class="form-control border-0 bg-transparent fw-semibold"
                                id="referralLinkInput"
                                readonly
                                style="font-size: 0.875rem;"
                                value="{{ url('/') }}?ref={{ auth('affiliate')->user()->referral_code }}">
                            <button class="btn copy-btn px-2 px-sm-4" style="background-color: #F1592A; color: white; border-color: #F1592A; white-space: nowrap;"
                                onclick="copyToClipboard(document.getElementById('referralLinkInput').value)">
                                <i class="fas fa-copy me-1 d-none d-sm-inline"></i><span class="d-sm-none">Copy</span><span class="d-none d-sm-inline">Copy Link</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Affiliate Products Table -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-transparent border-0 p-2 p-sm-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-start gap-2">
                        <div class="min-w-0 flex-grow-1">
                            <h5 class="mb-1 fw-bold" style="font-size: clamp(0.875rem, 2vw, 1.25rem);">
                                <i class="fas fa-th me-2" style="color: #F1592A;"></i><span class="d-sm-inline">My Affiliate Products</span>
                            </h5>
                            <small class="text-muted d-none d-sm-inline">Manage and share your product referral links</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2 p-sm-3 p-md-4">
                    <div class="table-responsive">
                        <table id="affiliateProductsTable" class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th class="border-0 rounded-start" style="width: 60px; font-size: 0.75rem;">Image</th>
                                    <th class="border-0" style="font-size: 0.75rem;">Details</th>
                                    <th class="border-0 d-none d-sm-table-cell" style="width: 120px; font-size: 0.75rem;">Price</th>
                                    <th class="border-0 d-none d-md-table-cell" style="font-size: 0.75rem;">Referral Link</th>
                                    <th class="border-0 rounded-end text-center" style="width: 60px; font-size: 0.75rem;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                @php
                                $referralLink = url('/product-details/' . $product->slug . '?ref=' . auth('affiliate')->user()->referral_code);
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="p-2">
                                        <div class="overflow-hidden rounded-2" style="width: 50px; height: 50px;">
                                            <img src="{{ asset($product->product_thumbnail) }}"
                                                alt="{{ $product->name_en }}"
                                                class="w-100 h-100 object-fit-cover product-img">
                                        </div>
                                    </td>
                                    <td class="p-2">
                                        <div>
                                            <h6 class="mb-1 fw-semibold" style="font-size: 0.75rem; word-break: break-word;">
                                                {{ \Illuminate\Support\Str::limit($product->name_en, 30) }}
                                            </h6>
                                            <small class="text-muted d-block">
                                                <i class="fas fa-tag me-1"></i>{{ $product->product_code ?? 'N/A' }}
                                            </small>
                                            <small class="text-muted d-sm-none d-block mt-1">
                                                @if($product->discount_price)
                                                @php $data = calculateDiscount($product->id); @endphp
                                                ৳{{ number_format($data['discount'], 0) }}
                                                @else
                                                ৳{{ number_format($product->regular_price, 0) }}
                                                @endif
                                            </small>
                                        </div>
                                    </td>
                                    <td class="p-2 d-none d-sm-table-cell">
                                        @if($product->discount_price)
                                        @php $data = calculateDiscount($product->id); 
                                       
                                        @endphp
                               
                                        <div>
                                            <span class="badge badge-sm" style="background-color: #F1592A; font-size: 0.65rem;">
                                                {{ $data['text'] ?? '0' }} OFF
                                            </span>
                                            <div class="fw-bold text-success" style="font-size: 0.75rem;">৳{{ number_format($data['discount'], 0) }}</div>
                                            <small class="text-decoration-line-through text-muted" style="font-size: 0.65rem;">
                                                ৳{{ number_format($product->regular_price, 0) }}
                                            </small>
                                        </div>
                                        @else
                                        <span class="fw-bold" style="font-size: 0.75rem;">৳{{ number_format($product->regular_price, 0) }}</span>
                                        @endif
                                    </td>
                                    <td class="p-2 d-none d-md-table-cell">
                                        <input type="text"
                                            class="form-control form-control-sm bg-light border-0"
                                            value="{{ \Illuminate\Support\Str::limit($referralLink, 40) }}"
                                            style="font-size: 0.65rem;"
                                            readonly>
                                    </td>
                                    <td class="p-2 text-center">
                                        <button class="btn btn-sm copy-btn rounded-2"
                                            onclick="copyToClipboard('{{ $referralLink }}')"
                                            data-bs-toggle="tooltip"
                                            title="Copy"
                                            style="background-color: #F1592A; color: white; border-color: #F1592A; padding: 0.25rem 0.5rem;">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 py-sm-5">
                                        <div class="text-muted">
                                            <i class="fas fa-inbox" style="font-size: clamp(2rem, 5vw, 3rem);"></i>
                                            <h6 class="mt-2 mb-1" style="font-size: 0.875rem;">No products available</h6>
                                            <small style="font-size: 0.7rem;">Products will appear here once assigned</small>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<script>
    // Copy to clipboard with modern notification
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Create toast notification
            const toastHtml = `
                    <div class="toast align-items-center text-white bg-success border-0 position-fixed top-0 end-0 m-3" role="alert" style="z-index: 9999;">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-check-circle me-2"></i>Referral link copied successfully!
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                `;

            $('body').append(toastHtml);
            const toastElement = $('.toast').last()[0];
            const toast = new bootstrap.Toast(toastElement, {
                autohide: true,
                delay: 3000
            });
            toast.show();

            setTimeout(() => $(toastElement).remove(), 3500);
        }).catch(function(err) {
            console.error("Copy failed", err);
            // Show error toast instead of alert
            const errorToastHtml = `
                    <div class="toast align-items-center text-white bg-danger border-0 position-fixed bottom-0 end-0 m-3" role="alert" style="z-index: 9999;">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-exclamation-circle me-2"></i>Failed to copy. Please try again.
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                `;

            $('body').append(errorToastHtml);
            const errorToastElement = $('.toast').last()[0];
            const errorToast = new bootstrap.Toast(errorToastElement, {
                autohide: true,
                delay: 3000
            });
            errorToast.show();

            setTimeout(() => $(errorToastElement).remove(), 3500);
        });
    }

    $(document).ready(function() {
        // Initialize DataTable
        $('#affiliateProductsTable').DataTable({
            responsive: true,
            pageLength: 10,
            order: [
                [1, 'asc']
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search products...",
                lengthMenu: "Show _MENU_",
                info: "Showing _START_ to _END_ of _TOTAL_ products",
                paginate: {
                    previous: '<i class="fas fa-chevron-left"></i>',
                    next: '<i class="fas fa-chevron-right"></i>'
                }
            },
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>'
        });

        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush