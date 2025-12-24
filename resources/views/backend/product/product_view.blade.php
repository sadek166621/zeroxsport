@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
        <div class="content-header mx-2 row">
            <div class="col-md-8">
                <h2 class="content-title">Product List</h2>
                <strong class="text-dark">{{ count($products) }} Products Found</strong>
            </div>

            <div class="col-md-2 text-end">
                <a href="{{ route('product.add') }}" title="Add Product" class="btn btn-primary">
                    <i class="material-icons md-plus"></i>
                </a>
            </div>

            <div class="col-md-2 text-end">
                <a href="{{ route('product.upload.csv') }}" class="btn btn-success">
                    Upload CSV
                </a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="example" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Name (English)</th>
                                <th scope="col">Name (Bangla)</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Price </th>
                                <th scope="col">Quantity </th>
                                <th scope="col">Discount </th>
                                <th scope="col">Featured</th>
                                @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 1)
                                    <th scope="col">Authenticate Status</th>
                                @endif
                                @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 2)
                                    <th scope="col">Authenticate Status</th>
                                @endif

                                <th scope="col">Status</th>
                                <th scope="col">Affiliate Status</th>
                                <th scope="col">Vendor Product</th>

                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
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
                                    <td> {{ $item->category->name_en }} </td>
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


                                            </form>
                                        </td>
                                    @endif
                                    @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 2)
                                        <td>
                                            @php
                                                $badge = match ($item->authenticity_status) {
                                                    1 => 'success',
                                                    2 => 'danger',
                                                    default => 'warning',
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $badge }}">
                                                {{ $item->authenticity_status == 1 ? 'Verified' : ($item->authenticity_status == 2 ? 'Fake' : 'Pending') }}
                                            </span>
                                        </td>
                                    @endif
                                    <td>
                                        @if ($item->status == 1)
                                            <a href="{{ route('product.in_active', ['id' => $item->id]) }}">
                                                <span class="product-status badge rounded-pill alert-success">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('product.active', ['id' => $item->id]) }}"> <span
                                                    class="product-status badge rounded-pill alert-danger">Disable</span></a>
                                        @endif
                                    </td>

                                   <td>
                                    @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 1)
                                        {{-- শুধু role 1 হলে clickable link থাকবে --}}
                                        @if ($item->is_affiliate == 1)
                                            <a href="{{ route('product.in_active_affiliate', ['id' => $item->id]) }}">
                                                <span class="badge rounded-pill alert-success">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('product.active.affiliate', ['id' => $item->id]) }}">
                                                <span class="badge rounded-pill alert-danger">Disable</span>
                                            </a>
                                        @endif
                                    @else
                                        {{-- অন্য role হলে শুধু status দেখাবে --}}
                                        @if ($item->is_affiliate == 1)
                                            <span class="badge rounded-pill alert-success">Active</span>
                                        @else
                                            <span class="badge rounded-pill alert-danger">Disable</span>
                                        @endif
                                    @endif
                                </td>
                                                                    <td>
                                        @if ($item->vendor_id == null)
                                            <span class="badge rounded-pill alert-success">No</span>
                                        @else
                                            <span class="badge rounded-pill alert-success">Yes</span>

                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" style="margin: 50% 0">
                                            <a class="btn btn-primary" href="{{ route('product.edit', $item->id) }}"
                                                title="Edit Info"
                                                style="padding:12px; margin-right: 5px; border-radius: 5px"><i
                                                    class="fa fa-pencil"></i></a>
                                            @if (Auth::guard('admin')->user()->role == '2')
                                                <a class="btn btn-danger" href="{{ route('product.delete', $item->id) }}"
                                                    id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                            @else
                                                @if (Auth::guard('admin')->user()->role == '1' ||
                                                        in_array('4', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                                                    <a class="btn btn-danger"
                                                        href="{{ route('product.delete', $item->id) }}" id="delete"
                                                        title="Delete"><i class="fa fa-trash"></i></a>
                                                @endif
                                            @endif
                                        </div>
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
