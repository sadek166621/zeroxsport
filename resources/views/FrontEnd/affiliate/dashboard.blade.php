@extends('FrontEnd.affiliate.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Welcome Section -->
            <div class="col-12 mb-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <span class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 2rem;">
                                    {{ strtoupper(substr(auth('affiliate')->user()->name, 0, 1)) }}
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h3 class="mb-1 fw-bold">Welcome back, {{ auth('affiliate')->user()->name }}!</h3>
                                <p class="text-muted mb-0">Here's your affiliate performance overview</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="col-12 mb-4">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 bg-success bg-opacity-10 border-success">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
                                <h5 class="text-success fw-semibold">Total Successful Referrals</h5>
                                <h2 class="fw-bold text-success mb-0">{{ number_format($totalReferrals) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 bg-warning bg-opacity-10 border-warning">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-hourglass-split text-warning fs-1 mb-3"></i>
                                <h5 class="text-warning fw-semibold">Pending Referrals</h5>
                                <h2 class="fw-bold text-warning mb-0">{{ number_format($pendingReferrals) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 bg-primary bg-opacity-10 border-primary">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-wallet2 text-primary fs-1 mb-3"></i>
                                <h5 class="text-primary fw-semibold">Total Earnings</h5>
                                <h2 class="fw-bold text-primary mb-0">৳{{ number_format($totalEarnings, 2) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Referral Link -->
            <div class="col-12 mb-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Your Main Referral Link</h5>
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control bg-light" id="mainReferralLink" readonly value="{{ url('/') }}?ref={{ auth('affiliate')->user()->referral_code }}">
                            <button class="btn btn-primary" onclick="copyToClipboard('mainReferralLink')">
                                <i class="bi bi-clipboard me-2"></i>Copy Link
                            </button>
                        </div>
                        <small class="text-muted mt-2 d-block">Share this link to earn commissions from referrals!</small>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="col-12">
                <div class="card border-0 shadow rounded-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">My Affiliate Products</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="affiliateProductsTable" class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4">Thumbnail</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Referral Link</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        @php
                                            $referralLink = url('/product-details/' . $product->slug . '?ref=' . auth('affiliate')->user()->referral_code);
                                        @endphp
                                        <tr>
                                            <td class="ps-4">
                                                <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->name_en }}" class="rounded" style="width: 70px; height: 70px; object-fit: cover;">
                                            </td>
                                            <td class="fw-semibold">{{ \Illuminate\Support\Str::limit($product->name_en, 40) }}</td>
                                            <td>
                                                @if($product->discount_price)
                                                    @php $data = calculateDiscount($product->id); @endphp
                                                    <span class="text-danger fw-bold">৳{{ number_format($data['discount'], 2) }}</span>
                                                    <del class="text-muted small ms-2">৳{{ number_format($product->regular_price, 2) }}</del>
                                                @else
                                                    <span class="fw-bold">৳{{ number_format($product->regular_price, 2) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-sm bg-light" value="{{ $referralLink }}" readonly>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-outline-primary" onclick="copyToClipboardValue('{{ $referralLink }}')">
                                                    <i class="bi bi-clipboard"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-5 text-muted">No affiliate products available at the moment.</td>
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

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script>
        function copyToClipboard(id) {
            const input = document.getElementById(id);
            input.select();
            navigator.clipboard.writeText(input.value);
            alert('Link copied to clipboard!');
        }

        function copyToClipboardValue(text) {
            navigator.clipboard.writeText(text);
            alert('Product referral link copied!');
        }

        $(document).ready(function () {
            $('#affiliateProductsTable').DataTable({
                responsive: true,
                pageLength: 10,
                ordering: true,
                language: {
                    search: "Search products:",
                    info: "Showing _START_ to _END_ of _TOTAL_ products"
                }
            });
        });
    </script>
@endsection