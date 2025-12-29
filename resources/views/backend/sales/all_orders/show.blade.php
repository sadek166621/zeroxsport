@extends('admin.admin_master')
@section('admin')

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

    <style>
        table,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td {
            border: 1px solid #dee2e6 !important
        }

        th {
            font-weight: bolder !important
        }
    </style>

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Order Detail</h2>
                <p>Details for Order ID: {{ $order->invoice_no }}</p>
            </div>
        </div>

        <div class="card">
              <header class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-4 text-white">
                        <b>{{ $order->created_at }}</b><br>
                        <small>Order ID: {{ $order->invoice_no }}</small>
                    </div>

                    @php
                        $payment_status = $order->payment_status;
                        $delivery_status = $order->delivery_status;
                    @endphp

                    <div class="col-md-8 text-end">

                        <label class="fw-bold me-2 text-white">Payment:</label>
                        <select class="form-select d-inline-block mw-200" id="update_payment_status">
                            <option value="0" @if ($payment_status == 0) selected @endif>Unpaid</option>
                            <option value="1" @if ($payment_status == 1) selected @endif>Paid</option>
                        </select>

                        <label class="fw-bold ms-3 me-2 text-white">Delivery:</label>
                        <select class="form-select d-inline-block mw-200" id="update_delivery_status">
                            @foreach ($deliveryStatuses as $k => $v)
                                <option value="{{ $k }}" @if ($delivery_status == $k) selected @endif>
                                    {{ $v }}</option>
                            @endforeach
                        </select>

                        <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-secondary ms-2">
                            <i class="fa fa-file"></i>
                        </a>

                    </div>
                </div>
            </header>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <h6>Customer</h6>
                        {{ $order->name }}<br>
                        {{ $order->email }}<br>
                        {{ $order->phone }}
                    </div>
                    <div class="col-md-4">
                        <h6>Order Info</h6>
                        Order: {{ $order->invoice_no }}<br>
                        Payment: {{ $order->payment_status== 1 ? 'Paid' : 'Unpaid' }}<br>
                        Status:
                        <span class="badge bg-success">
                            {{ $deliveryStatuses[$order->delivery_status] }}
                        </span>
                    </div>
                    <div class="col-md-4">
                        <h6>Delivery Address</h6>
                        {{ $order->address ?? '' }},
                        {{-- {{ $order->district->district_name_en ?? '' }},
    {{ $order->division->division_name_en ?? '' }} --}}
                    </div>
                </div>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td>{{ $order->sub_total }}</td>
                            <th>Shipping</th>
                            <td>{{ $order->shipping_charge }}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>{{ $order->discount }}</td>
                            <th>Grand Total</th>
                            <td>{{ $order->grand_total }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_details as $d)
                            <tr>
                                <td>{{ $d->product->name_en ?? '' }}</td>
                                <td>{{ $d->price }}</td>
                                <td>{{ $d->qty }}</td>
                                <td class="text-end">{{ $d->price * $d->qty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
@endsection

@push('footer-script')
    <script>
        $('#update_payment_status').change(function() {
            $.post('{{ route('orders.update_payment_status') }}', {
                _token: '{{ csrf_token() }}',
                order_id: {{ $order->id }},
                status: $(this).val()
            }, () => location.reload())
        });

        $('#update_delivery_status').change(function() {
            $.post('{{ route('orders.update_delivery_status') }}', {
                _token: '{{ csrf_token() }}',
                order_id: {{ $order->id }},
                status: $(this).val()
            }, () => location.reload())
        });
    </script>
@endpush
