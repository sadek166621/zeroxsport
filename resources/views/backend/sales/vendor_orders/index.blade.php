@extends('admin.admin_master')
@section('admin')
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title card-title">Vendor Order List</h2>
    </div>

    @php
    $deliveryStatuses = [
    0 => 'Pending',
    1 => 'Confirmed',
    2 => 'Processing',
    3 => 'Shipped',
    4 => 'Delivered',
    5 => 'Canceled',
    6 => 'Returned',
    7 => 'Refunded',
    8 => 'Failed',
    ];

    @endphp


    <div class="card mb-4">
        <div class="card-body">

            <form method="GET">
                <div class="row mb-3">

                    <div class="col-md-3">
                        <select name="delivery_status" class="form-select">
                            <option value="">Delivery Status</option>
                            @foreach ($deliveryStatuses as $key => $label)
                            <option value="{{ $key }}" @if ($delivery_status !==null && $delivery_status==$key) selected @endif>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="payment_status" class="form-select">
                            <option value="">Payment Status</option>
                            <option value="0" @if ($payment_status==='0' ) selected @endif>Unpaid</option>
                            <option value="1" @if ($payment_status==='1' ) selected @endif>Paid</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="date" class="form-control" id="reportrange"
                            placeholder="Filter by date" value="{{ $date }}">
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary">Filter</button>
                    </div>

                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Vendor</th>
                            <th>Vendor Phone</th>
                            <th>Subtotal</th>
                            <th>Grand Total</th>
                            <th>Delivery Status</th>
                            <th>Payment</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->invoice_no }}</td>
                            <td>{{ $order->vendor->full_name ?? $order->vendor->shop_name ?? 'N/A' }}
                            </td>
                            <td>{{ $order->vendor->phone ?? '' }}</td>
                            <td>{{ $order->subtotal }}</td>
                            <td>{{ $order->grand_total }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $deliveryStatuses[$order->delivery_status] ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                @if ($order->payment_status == 1)
                                <span class="badge bg-success">Paid</span>
                                @else
                                <span class="badge bg-danger">Unpaid</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.vendor.orders.show', $order->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $orders->links() }}

            </div>

        </div>
    </div>
</section>
@endsection