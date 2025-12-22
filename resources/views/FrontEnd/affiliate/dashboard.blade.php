@extends('FrontEnd.affiliate.master')

@section('content')
    <div class="profile-card p-0" style="overflow:hidden;">
        <div class="row g-0 align-items-center">
            <div class="card border-0 shadow-sm p-4 mb-4 rounded-4 bg-white">
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0">
                        <span
                            class="avatar bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width:48px;height:48px;font-size:1.5rem;">
                            {{ strtoupper(substr(auth('affiliate')->user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4 class="mb-0">Welcome, <span class="fw-bold">{{ auth('affiliate')->user()->name }}</span>!</h4>
                        <small class="text-muted">Affiliate Dashboard</small>
                    </div>
                </div>

                <!-- Total Earnings Section -->
                <div class="mb-4 p-3 bg-success bg-opacity-10 border border-success rounded-3 text-center">
                    <h5 class="text-success mb-1">Total Earnings</h5>
                    <div class="fs-3 fw-bold text-success">
                        ৳{{ number_format(auth('affiliate')->user()->total_earning ?? 0, 2) }}
                    </div>
                </div>

                <!-- Referral Link -->
                <div class="mb-4">
                    <label class="form-label fw-semibold mb-2">Your Referral Link</label>
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control bg-light border-0" id="referralLinkInput" readonly
                            value="{{ url('/') }}?ref={{ auth('affiliate')->user()->referral_code }}">
                        <button class="btn btn-primary text-white"
                            onclick="copyToClipboard(document.getElementById('referralLinkInput').value)">
                            <i class="bi bi-clipboard"></i> Copy
                        </button>
                    </div>
                </div>
            </div>

            <!-- Affiliate Products Section -->
            <div class="card border-0 shadow p-4 rounded-4 bg-white">
                <h5 class="mb-4 fw-bold">My Affiliate Products</h5>
                <div class="table-responsive">
                    <table id="affiliateProductsTable" class="table table-striped table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Thumbnail</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Referral Link</th>
                                <th>Copy</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                @php
                                    $referralLink = url('/product-details/' . $product->slug . '?ref=' . auth('affiliate')->user()->referral_code);
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->name_en }}"
                                            style="width: 60px; height: 60px; object-fit: cover;" class="rounded">
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($product->name_en, 50) }}</td>
                                    <td>
                                        @if($product->discount_price)
                                            @php $data = calculateDiscount($product->id); @endphp
                                            <span class="text-danger fw-bold">৳{{ number_format($data['discount'], 2) }}</span>
                                            <del class="text-muted">৳{{ number_format($product->regular_price, 2) }}</del>
                                        @else
                                            <span class="fw-bold">৳{{ number_format($product->regular_price, 2) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" value="{{ $referralLink }}"
                                            readonly>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"
                                            onclick="copyToClipboard('{{ $referralLink }}')">
                                            <i class="bi bi-clipboard"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No affiliate products available right now.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- jQuery & DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function () {
                alert("Referral link copied to clipboard!");
            }).catch(function (err) {
                console.error("Copy failed", err);
            });
        }

        $(document).ready(function () {
            $('#affiliateProductsTable').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ products",
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    }
                }
            });
        });
    </script>
@endpush