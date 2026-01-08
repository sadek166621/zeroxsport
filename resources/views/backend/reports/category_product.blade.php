@extends('admin.admin_master')
@section('admin')


<section class="content-main">
    <div class="card">
        <div class="card-header">
            @if($type == 'admin')
                <h2 class="text-white">Admin Category Sales Report</h2>
            @else
                <h2 class="text-white">Vendor Category Sales Report</h2>
            @endif
        </div>
        <div class="card-body">
            <h4>Category: {{ $category->name_en }}</h4>
            <div class="table-responsive-sm mt-3">
                <table id="example" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Total Qty Sold</th>
                            <th>Total Sales Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->total_qty }}</td>
                                <td>{{ $order->total_sales }}</td>
                            </tr>
                            @php $grandTotal += $order->total_sales; @endphp
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-center font-weight-bold">Grand Total</td>
                            <td>৳ {{ $grandTotal }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection