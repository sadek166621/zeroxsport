@extends('admin.admin_master')
@section('admin')
<section class="content-main">
    <div class="content-header mx-2 row">
        <div class="col-md-8">
            <h2 class="content-title">Low Stock Products</h2>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive-sm">

                {{-- Admin Low Stock Products --}}
                @if (Auth::guard('admin')->user()->role == '1')
                    <h4 class="mt-3 text-danger">Admin Low Stock Products (<=5)</h4>
                    <table id="example" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Image</th>
                                <th>Name (English)</th>
                                <th>Name (Bangla)</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($adminLowStockProducts as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td width="15%">
                                        <img src="{{ asset($item->product_thumbnail ?? 'uploads/no_image.jpg') }}"
                                             class="img-sm" style="width: 80px; height: 70px;">
                                    </td>
                                    <td>{{ $item->name_en ?? 'NULL' }}</td>
                                    <td>{{ $item->name_bn ?? 'NULL' }}</td>
                                    <td>{{ $item->category_id ?? 'NULL' }}</td>
                                    <td>{{ $item->regular_price ?? 'NULL' }}</td>
                                    <td class="text-danger fw-bold">{{ $item->stock_qty ?? 0 }}</td>
                                       <td>
                                        <div class="btn-group" style="margin: 50% 0">
                                            <a class="btn btn-primary" href="{{ route('product.edit', $item->id) }}"
                                                title="Edit Info"
                                                style="padding:12px; margin-right: 5px; border-radius: 5px"><i
                                                    class="fa fa-pencil"></i></a>
                                           
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-secondary">
                                        No low stock products found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif

                {{-- Vendor Low Stock Products --}}
                @if (Auth::guard('admin')->user()->role == '2')
                    <h4 class="mt-3 text-danger">Vendor Low Stock Products (<=5)</h4>
                    <table id="example" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Image</th>
                                <th>Name (English)</th>
                                <th>Name (Bangla)</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vendorLowStockProducts as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td width="15%">
                                        <img src="{{ asset($item->product_thumbnail ?? 'uploads/no_image.jpg') }}"
                                             class="img-sm" style="width: 80px; height: 70px;">
                                    </td>
                                    <td>{{ $item->name_en ?? 'NULL' }}</td>
                                    <td>{{ $item->name_bn ?? 'NULL' }}</td>
                                    <td>{{ $item->category_id ?? 'NULL' }}</td>
                                    <td>{{ $item->regular_price ?? 'NULL' }}</td>
                                    <td class="text-danger fw-bold">{{ $item->stock_qty ?? 0 }}</td>
                                       <td>
                                        <div class="btn-group" style="margin: 50% 0">
                                            <a class="btn btn-primary" href="{{ route('product.edit', $item->id) }}"
                                                title="Edit Info"
                                                style="padding:12px; margin-right: 5px; border-radius: 5px"><i 
                                                    class="fa fa-pencil"></i></a>
                                           
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-secondary">
                                        No low stock products found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection