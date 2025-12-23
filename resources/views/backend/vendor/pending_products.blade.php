@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
        <div class="content-header mx-2 row">
            <div class="col-md-8">
                <h2 class="content-title">Pending Product List</h2>
                <strong class="text-dark">{{ count($products) }} Products Found</strong>
            </div>


        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="example" class="table table-bordered table-striped" id="example" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Vendor name</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Name (English)</th>
                                <th scope="col">Name (Bangla)</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Price </th>
                                <th scope="col">Quantity </th>
                                <th scope="col">Discount </th>
                                <th scope="col">Featured</th>
                                @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 1)
                                    <th scope="col">Authenticity Status</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item->vendor->user->name  ??  ' '}} </td>
                                    <td width="15%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="{{ asset($item->product_thumbnail) }}" class="img-sm"
                                                    alt="Userpic" style="width: 80px; height: 70px;">
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $item->name_en ?? 'NULL' }}

                                    </td>
                                    <td> {{ $item->name_bn ?? 'NULL' }} </td>
                                    <td> {{ $item->category->name_en ?? 'NULL' }} </td>
                                    <td> {{ $item->regular_price ?? 'NULL' }} </td>
                                    <td>
                                        @if ($item->is_varient)
                                            Varient Product
                                        @else
                                            {{ $item->stock_qty ?? 'NULL' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->discount_price > 0)
                                            @if ($item->discount_type == 1)
                                                <i class="fa fa-minus text-danger"></i>
                                                <span class="text-danger">৳{{ $item->discount_price }} </span>
                                            @elseif($item->discount_type == 2)
                                                <span class="text-danger">{{ $item->discount_price }}% </span>
                                            @endif
                                        @else
                                            <span class="text-secondary">None</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->is_featured == 1)
                                            <a href="{{ route('product.featured', ['id' => $item->id]) }}"
                                                title="Featured Product">
                                                <span class="feature-status"><i
                                                        class="fa-solid fa-tag text-success"></i></span>
                                            </a>
                                        @else
                                            <a href="{{ route('product.featured', ['id' => $item->id]) }}"
                                                title="Not Featured Product"> <span class="feature-status"><i
                                                        class="fa fa-tag text-danger"></i></span></a>
                                        @endif
                                    </td>
                                    @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 1)
                                        <td>
                                            <form action="{{ route('product.authenticity.update', $item->id) }}"
                                                method="POST" class="d-flex gap-1">
                                                @csrf
                                                @method('PATCH')

                                                <button name="authenticity_status" value="1" title="Verified"
                                                    class="btn btn-sm {{ $item->authenticity_status == 1 ? 'btn-success' : 'btn-outline-success' }}">
                                                    ✔
                                                </button>

                                                <button name="authenticity_status" value="2" title='Fake'
                                                    class="btn btn-sm {{ $item->authenticity_status == 2 ? 'btn-danger' : 'btn-outline-danger' }}">
                                                    ✖
                                                </button>

                                                <button name="authenticity_status" value="0" title="Pending"
                                                    class="btn btn-sm {{ $item->authenticity_status == 0 ? 'btn-warning' : 'btn-outline-warning' }}">
                                                    ⏳
                                                </button>
                                            </form>
                                        </td>
                                    @endif

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
