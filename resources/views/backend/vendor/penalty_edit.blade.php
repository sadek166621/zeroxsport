@extends('admin.admin_master')

@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Edit Seller Penalty</h3>
                        <a href="{{ route('seller.penalty.index') }}" class="btn btn-primary">
                            <i class="fa fa-list"></i> Penalty List
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('seller.penalty.update', $penalty->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <!-- Vendor -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Seller/Vendor</label>
                                    <select name="vendor_id" class="form-select" disabled>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}"
                                                {{ $penalty->vendor_id == $vendor->id ? 'selected' : '' }}>
                                                {{ $vendor->user->name ?? '' }} ({{ $vendor->shop_name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Product -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Related Product</label>
                                    <select name="product_id" id="product_id" class="form-select">
                                        <option value="">-- No Product --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-vendor="{{ $product->vendor_id }}"
                                                {{ $penalty->product_id == $product->id ? 'selected' : '' }}>
                                                {{ $product->name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Order -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Related Order</label>
                                    <select name="order_id" id="order_id" class="form-select">
                                        <option value="">-- No Order --</option>
                                        @foreach ($orders as $order)
                                            @php
                                                $productIds = $order->order_details->pluck('product_id')->implode(',');
                                            @endphp
                                            <option value="{{ $order->id }}" data-products="{{ $productIds }}"
                                                {{ $penalty->order_id == $order->id ? 'selected' : '' }}>
                                                Order #{{ $order->id }} - {{ $order->user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Type -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Penalty Type</label>
                                    <select name="type" class="form-select" required>
                                        <option value="late_shipment"
                                            {{ $penalty->type == 'late_shipment' ? 'selected' : '' }}>Late Shipment
                                        </option>
                                        <option value="fake_stock" {{ $penalty->type == 'fake_stock' ? 'selected' : '' }}>
                                            Fake Stock</option>
                                        <option value="fake_product"
                                            {{ $penalty->type == 'fake_product' ? 'selected' : '' }}>Fake Product</option>
                                    </select>
                                </div>

                                <!-- Amount -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">Penalty Amount</label>
                                    <input type="number" name="amount" class="form-control"
                                        value="{{ $penalty->amount }}" required>
                                </div>

                                <!-- Reason -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">Reason</label>
                                    <textarea name="reason" class="form-control" rows="4" required>{{ $penalty->reason }}</textarea>
                                </div>

                                <!-- Ban Seller Checkbox (Update Only) -->
                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="is_ban" id="is_ban"
                                            value="1" {{ $penalty->is_ban ? 'checked' : '' }}>
                                        <label class="form-check-label fw-semibold" for="is_ban">
                                            Ban Seller for this penalty
                                        </label>
                                    </div>
                                    <small class="text-muted">
                                        Uncheck to remove ban from seller.
                                    </small>
                                </div>

                                <!-- Submit -->
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fa fa-save"></i> Update Penalty
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {

            let selectedVendor = {{ $penalty->vendor_id }};
            let selectedProduct = '{{ $penalty->product_id }}';

            // Show vendor products
            $('#product_id option').each(function() {
                if ($(this).data('vendor') == selectedVendor) {
                    $(this).show();
                }
            });

            // Show related orders
            if (selectedProduct) {
                $('#order_id option').each(function() {
                    let products = $(this).data('products');
                    if (products && products.toString().split(',').includes(selectedProduct)) {
                        $(this).show();
                    }
                });
            }

        });
    </script>
@endsection
