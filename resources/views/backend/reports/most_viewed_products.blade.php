@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
        <div class="content-header mx-2">
            <div class="col-md-12">
                <h2 class="content-title">Most Viewed Products</h2>
                <strong style="font-weight: bold" class="text-dark"> {{ count($viewed) }} Products Found </strong>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="example" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th class="col">Image</th>
                                <th scope="col">Product Name(En)</th>
                                <th scope="col">Product Name(Bn)</th>
                                <th scope="col">Category</th>
                                <th scope="col">Views</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($viewed as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="#" class="itemside">
                                            <div class="left">
                                               <img src="{{ asset($product->product_thumbnail) }}" class="img-sm"
                                                    alt="Userpic" style="width: 80px; height: 70px;">
                                            </div>
                                        </a>
                                    </td>
                                    <td>{{ $product->name_en ?? '' }}</td>
                                    <td>{{ $product->name_bn ?? '' }}</td>
                                    <td>{{ $product->category->name_en ?? 'N/A' }}</td>
                                    <td>{{ $product->views }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" 
                                           class="btn btn-primary p-2">
                                           <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
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