@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <section class="content-main">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Add Seller Penalty</h3>
                        <a href="{{ route('seller.penalty.index') }}" class="btn btn-md btn-primary">
                            <i class="fa fa-list"></i> Penalty List
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('seller.penalty.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <!-- Vendor -->
                                <div class="col-md-6 mb-3">
                                    <label for="vendor_id" class="form-label">Seller/Vendor <span
                                            class="text-danger">*</span></label>
                                    <select name="vendor_id" id="vendor_id" class="form-select" required>
                                        <option value="">-- Select Seller --</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">
                                                {{ $vendor->user->name ?? '' }} ({{ $vendor->shop_name ?? '' }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Related Product (Optional) -->
                                <div class="col-md-6 mb-3">
                                    <label for="product_id" class="form-label">Related Product</label>
                                    <select name="product_id" id="product_id" class="form-select">
                                        <option value="">-- No Product --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-vendor="{{ $product->vendor_id }}">
                                                {{ $product->name_en }}
                                                (Seller: {{ $product->vendor->shop_name ?? '' }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Related Order (Optional) -->
                                <div class="col-md-6 mb-3">
                                    <label for="order_id" class="form-label">Related Order (Optional)</label>
                                    <select name="order_id" id="order_id" class="form-select">
                                        <option value="">-- No Order --</option>

                                        @foreach ($orders as $order)
                                            @php
                                                $productIds = $order->order_details
                                                    ->pluck('product_id')
                                                    ->unique()
                                                    ->implode(',');
                                            @endphp

                                            <option value="{{ $order->id }}" data-products="{{ $productIds }}">
                                                Order #{{ $order->id }}
                                                - {{ $order->user->name ?? 'Guest' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Penalty Type <span
                                            class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-select" required>
                                        <option value="">-- Select Type --</option>
                                        <option value="late_shipment">Late Shipment</option>
                                        <option value="fake_stock">Fake Stock</option>
                                        <option value="fake_product">Fake Product</option>
                                    </select>
                                </div>

                                <!-- amount -->
                                <div class="col-12 mb-3">
                                    <label for="reason" class="form-label">Penalty Amount <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="amount" id="amount" class="form-control"
                                        placeholder="Penalty amount..." required>
                                </div>


                                <!-- Reason -->
                                <div class="col-12 mb-3">
                                    <label for="reason" class="form-label">Reason / Admin Note <span
                                            class="text-danger">*</span></label>
                                    <textarea text="text" name="reason" id="reason" rows="4" class="form-control"
                                        placeholder="Explain why this penalty is applied..." required></textarea>
                                </div>

                                <!-- Ban Seller Checkbox -->
                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="is_ban" id="is_ban"
                                            value="1">
                                        <label class="form-check-label fw-semibold" for="is_ban">
                                            Ban Seller for this penalty
                                        </label>
                                    </div>
                                    <small class="text-muted">
                                        If checked, the seller account will be deactivated.
                                    </small>
                                </div>



                                <!-- Submit -->
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-danger btn-lg px-5">
                                        <i class="fa fa-gavel"></i> Apply Penalty
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            // Hide all products except placeholder on load
            $('#product_id option').each(function() {
                if ($(this).val() !== '') {
                    $(this).hide();
                }
            });

            $('#vendor_id').on('change', function() {
                let vendorId = $(this).val();

                // Reset product
                $('#product_id').val('');

                // Hide all products
                $('#product_id option').each(function() {
                    if ($(this).val() !== '') {
                        $(this).hide();
                    }
                });

                if (!vendorId) return;

                // Show only selected vendor products
                $('#product_id option').each(function() {
                    if ($(this).data('vendor') == vendorId) {
                        $(this).show();
                    }
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            // Hide all orders initially
            $('#order_id option').not(':first').hide();

            $('#product_id').on('change', function() {
                let productId = $(this).val();

                // Reset order
                $('#order_id').val('');

                // Hide all orders
                $('#order_id option').not(':first').hide();

                if (!productId) return;

                // Show only orders containing selected product
                $('#order_id option').each(function() {
                    let products = $(this).data('products');

                    if (!products) return;

                    let productArray = products.toString().split(',');

                    if (productArray.includes(productId)) {
                        $(this).show();
                    }
                });
            });

        });
    </script>
@endsection
