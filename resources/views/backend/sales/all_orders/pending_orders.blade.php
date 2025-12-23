@extends('admin.admin_master')
@section('admin')
    <style type="text/css">
        table,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td {
            border: 1px solid #dee2e6 !important;
        }

        th {
            font-weight: bolder !important;
        }
    </style>

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Pending Orders</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-hover" id="example" width="100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>SL</th>
                                        <th>Invoice No</th>
                                        <th>Order Date</th>
                                        <th>Customer</th>
                                        <th>Items</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $key => $vendorOrder)
                                        @php
                                            $mainOrder = $vendorOrder->order; // VendorOrder → Order relation
                                        @endphp

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $mainOrder->invoice_no }}</strong></td>
                                            <td>{{ $mainOrder->created_at->format('d M Y') }}</td>
                                            <td>
                                                <b>{{ $mainOrder->name }}</b><br>
                                                <small>{{ $mainOrder->phone }}</small>
                                            </td>
                                            <td>
                                                @php
                                                    $itemCount = \App\Models\OrderDetail::where(
                                                        'vendor_order_id',
                                                        $vendorOrder->id,
                                                    )->count();
                                                @endphp
                                                {{ $itemCount }} item{{ $itemCount > 1 ? 's' : '' }}
                                            </td>
                                            <td>৳ {{ number_format($vendorOrder->subtotal, 2) }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $mainOrder->payment_status == 1 ? 'bg-success' : 'bg-warning' }}">
                                                    {{ $mainOrder->payment_status == 1 ? 'Paid' : 'Unpaid' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('vendor.order.details', $vendorOrder->id) }}"
                                                    class="btn btn-sm btn-primary" title="View Details">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('vendor.invoice.download', $mainOrder->id) }}"
                                                    class="btn btn-sm btn-info" title="Download Invoice">
                                                    <i class="fa-solid fa-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted py-4">
                                                <em>No pending orders found</em>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="pagination-area mt-30 mb-50">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-end">
                                        {{ $orders->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
