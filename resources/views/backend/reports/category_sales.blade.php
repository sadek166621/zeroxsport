@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
        <div class="content-header mx-2">
            <div class="col-md-12">
                <h2 class="content-title">Category-wise Sales Report</h2>
                <strong style="font-weight: bold" class="text-dark"> {{ count($orders) }} Categories Found </strong>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="example" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Category</th>
                                <th scope="col">Total Products Sold</th>
                                <th scope="col">Total Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- If you have a Category model relationship --}}
                                    <td>
                                        {{ \App\Models\Category::find($item->category_id)->name_en ?? 'N/A' }}
                                    </td>
                                    <td>{{ $item->product_count }}</td>
                                    <td>{{ $item->total_qty }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- table-responsive //end -->
            </div>
            <!-- card-body end// -->
        </div>
    </section>
@endsection