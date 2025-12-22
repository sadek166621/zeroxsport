@extends('admin.admin_master')
@section('admin')

<style type="text/css">
    table, tbody, tfoot, thead, tr, th, td{
        border: 1px solid #dee2e6 !important;
    }
    th{
        font-weight: bolder !important;
    }
</style>

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">
                Pending Orders
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Product Name(Eng)</th>
                                    <th>Product Name(Bn)</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Order Code</th>
                                    <th>Customer name</th>
                                    <th>Amount</th>
                                    <th>Delivery Status</th>
                                    <th>Payment Status</th>
                                    <th class="text-end">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->product->name_en ?? '' }}</td>
                                        <td>{{ $order->product->name_bn ?? '' }}</td>
                                        <td><img src="{{ asset($order->product->product_thumbnail) }}" alt="Product Image" style="width: 50px; height: 50px;"></td>
                                        <td>{{ $order->qty }}</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td><b>{{ $order->order->user->name ?? '' }}</b></td>
                                        <td>{{ $order->grand_total }}</td>
                                        <td>
                                            <span class="badge rounded-pill alert-warning">
                                                Pending
                                            </span>
                                        </td>
                                        <td>
                                            @if ($order->payment_status == '1')
                                                <span class="badge rounded-pill alert-success">Paid</span>
                                            @else
                                                <span class="badge rounded-pill alert-danger">Un-Paid</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a class="btn btn-primary btn-icon btn-circle btn-sm btn-xs"
                                               href="{{ route('admin.all_orders.show',$order->id) }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a class="btn btn-primary btn-icon btn-circle btn-sm btn-xs"
                                               style="background-color: #106390 !important;"
                                               href="{{ route('admin.invoice.download', $order->id) }}">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                         
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-secondary">
                                            No pending orders found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination-area mt-25 mb-50">
                            <nav aria-label="Page navigation example">
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