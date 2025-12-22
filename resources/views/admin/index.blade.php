@extends('admin.admin_master')
@push('css')
    <script type="text/javascript">
        window.onload = function() {

            var options = {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "{{ get_setting('site_name')->value ?? '' }}"
                },
                legend: {
                    horizontalAlign: "right",
                    verticalAlign: "center"
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "<b>{name}</b>: {y} (#percent)",
                    indexLabel: "{name}",
                    legendText: "{name} (#percent)",
                    indexLabelPlacement: "inside",
                    dataPoints: [{
                            y: 6,
                            name: "Pending"
                        },
                        {
                            y: 9,
                            name: "Prossecing"
                        },
                        {
                            y: 10,
                            name: "Delivery"
                        },
                        {
                            y: 12,
                            name: "Sales"
                        },
                        {
                            y: 5,
                            name: "Others"
                        },
                        {
                            y: 6,
                            name: "Utilities"
                        }
                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);

        }
    </script>
@endpush
@section('admin')
    @php
        $role = Auth::guard('admin')->user()->role;
    @endphp
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Dashboard</h2>

            </div>
            <div>
                {{-- <a href="{{ route('pos.index') }}" class="btn btn-primary p-3"><i class="fab fa-product-hunt"></i></a> --}}
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                @if (Auth::guard('admin')->user()->role != '2')
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #e7f3fe; border: 1px solid #007bff;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-primary-light"><i
                                            class="fa-solid fa-money-check-dollar"></i></span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-primary">Revenue</h6>
                                        <span class="text-dark">৳ {{ number_format($orderCount->total_sell, 2) }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                @endif

                @if (Auth::guard('admin')->user()->role == '2')
                    @php $vendor = \App\Models\Vendor::where('user_id', Auth::guard('admin')->user()->id)->first() @endphp
                    {{-- <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #d4edda; border: 1px solid #28a745;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-success-light"><i
                                            class="fa-solid fa-money-check-dollar"></i></span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-success">Balance</h6>
                                        <span class="text-dark">৳ {{ number_format($vendor->balance ?? 0, 2) }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Today’s Sales -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #e2f0d9; border: 1px solid #28a745;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-success-light">
                                        <i class="material-icons md-shopping_cart"></i>
                                    </span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-success">Today’s Sales</h6>
                                        <span
                                            class="text-dark">{{ number_format($todaySoldProducts->sum('amount'), 2) }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings Summary -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #fff3cd; border: 1px solid #ffc107;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-warning-light">
                                        <i class="material-icons md-attach_money"></i>
                                    </span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-warning">Earnings Summary</h6>
                                        <span class="text-dark"> {{ number_format($solProducts->sum('amount'), 2) }}
                                            ৳</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Orders -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <a href="{{ route('pending.orders') }}" style="text-decoration: none;">
                        <div class="card shadow" style="background-color: #f8d7da; border: 1px solid #dc3545;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-danger-light">
                                        <i class="material-icons md-hourglass_empty"></i>
                                    </span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-danger">Pending Orders</h6>
                                        <span class="text-dark">{{ $pendingQty }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                        </a>
                    </div>

                    <!-- Cancelled Orders -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #d4edda; border: 1px solid #c82333;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-danger-light">
                                        <i class="material-icons md-cancel"></i>
                                    </span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-danger">Cancelled Orders</h6>
                                        <span class="text-dark">{{ $cancelQty }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #e7f3fe; border: 1px solid #007bff;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-success-light"><i
                                            class="fa-solid fa-clipboard-user"></i></span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-primary">Completed Orders</h6>
                                        <span class="text-dark">{{ $StaffCount }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>


                    <!-- Refund Requests -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #d6d8d9; border: 1px solid #6c757d;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-secondary-light">
                                        <i class="material-icons md-replay"></i>
                                    </span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-secondary">Refund Requests</h6>
                                        <span class="text-dark">0</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

          <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('lowstocks.products') }}" style="text-decoration: none;">
                    <div class="card shadow" style="background-color: #f8d7da; border: 1px solid #dc3545;">
                        <div class="card-body">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-danger-light">
                                    <i class="fa-solid fa-battery-quarter"></i>
                                </span>
                                <div class="text">
                                    <h6 class="mb-1 card-title text-danger">Low Stocks</h6>
                                    <span class="text-dark">{{ number_format($lowStockProducts->count()) }}</span>
                                </div>
                            </article>
                        </div>
                    </div>
                </a>
            </div>
                @endif

                @if (Auth::guard('admin')->user()->role != '2')
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #fff3cd; border: 1px solid #ffc107;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                            class="fa-solid fa-truck-fast"></i></span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-warning">Orders</h6>
                                        <span class="text-dark">{{ number_format($orderCount->total_orders) }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow" style="background-color: #d1ecf1; border: 1px solid #17a2b8;">
                             <a href="{{ route('product.all') }}" style="text-decoration: none;">
                        <div class="card-body">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-info-light"><i
                                        class="material-icons md-qr_code"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title text-info">Products</h6>
                                    <span class="text-dark">{{ number_format($productCount->total_products) }}</span>
                                </div>
                            </article>
                        </div>
                           </a>
                    </div>
                </div>
             

                @if (Auth::guard('admin')->user()->role != '2')
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #cce5ff; border: 1px solid #007bff;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-primary-light"><i
                                            class="fa-solid fa-user-tie"></i></span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-primary">Customers</h6>
                                        <span class="text-dark">{{ number_format($userCount->total_users) }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                @endif


                @if (Auth::guard('admin')->user()->role != '2')
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #d4edda; border: 1px solid #28a745;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-success-light"><i
                                            class="fa-solid fa-copyright"></i></span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-success">Brands</h6>
                                        <span class="text-dark">{{ number_format($brandCount->total_brands) }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                @endif

                @if (Auth::guard('admin')->user()->role != '2')
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow" style="background-color: #fff3cd; border: 1px solid #ffc107;">
                            <div class="card-body">
                                <article class="icontext">
                                    <span class="icon icon-sm rounded-circle bg-warning-light"><i
                                            class="fa-solid fa-users"></i></span>
                                    <div class="text">
                                        <h6 class="mb-1 card-title text-warning">Vendors</h6>
                                        <span class="text-dark">{{ number_format(count($vendorCount)) }}</span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                @endif
                @if (Auth::guard('admin')->user()->role == 1)
                       <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('lowstocks.products') }}" style="text-decoration: none;">
                    <div class="card shadow" style="background-color: #f8d7da; border: 1px solid #dc3545;">
                        <div class="card-body">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-danger-light">
                                    <i class="fa-solid fa-battery-quarter"></i>
                                </span>
                                <div class="text">
                                    <h6 class="mb-1 card-title text-danger">Low Stocks</h6>
                                    <span class="text-dark">{{ number_format($adminLowStockProducts->count()) }}</span>
                                </div>
                            </article>
                        </div>
                    </div>
                </a>
            </div>
                @endif

                <br>
                @if (Auth::guard('admin')->user()->role == 1)
                    <div class="card mb-4 shadow bg-white rounded">
                        <header class="card-header">
                            <h2 class="text-white">Pending Orders</h2>
                        </header>
                        {{-- <section class="content-main">
                    <div class="content-header">
                        <div>
                            <h2 class="content-title card-title">Order List</h2>
                        </div>
                    </div> --}}
                        {{-- <div class="card">
                                <!-- card-header end// -->
                                <div class="card-body"> --}}
                        <form class="" action="" method="GET">
                            {{-- <div class="form-group row mb-3">
                                        <div class="col-md-2">
                                            <label class="col-form-label"><span>All Orders :</span></label>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <div class="custom_select">
                                               <select class=" select-active select-nice form-select d-inline-block mb-lg-0 mr-5 mw-200" name="vendor_id" id="vendor_id">
                                                    <option value="" selected="">Vendor</option>
                                                    <option value="0">AA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <div class="custom_select">
                                                <select class="form-select d-inline-block select-active select-nice mb-lg-0 mr-5 mw-200" name="delivery_status" id="delivery_status">
                                                    <option value="" selected="">Delivery Status</option>
                                                    <option value="pending" @if ($delivery_status == 'pending') selected @endif>Pending</option>
                                                    <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>Confirmed</option>
                                                    <option value="shipped" @if ($delivery_status == 'shipped') selected @endif>Shipped</option>
                                                    <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>Picked Up</option>
                                                    <option value="on_the_way" @if ($delivery_status == 'on_the_way') selected @endif>On The Way</option>
                                                    <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>Delivered</option>
                                                    <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>Cancel</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <div class="custom_select">
                                               <select class=" select-active select-nice form-select d-inline-block mb-lg-0 mr-5 mw-200" name="payment_status" id="payment_status">
                                                    <option value="" selected="">Payment Status</option>
                                                    <option value="0" @if ($payment_status == '0') selected @endif>Unpaid</option>
                                                    <option value="1" @if ($payment_status == '1') selected @endif>Paid</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <div class="custom_select">
                                                <input type="text"   id="reportrange" class="form-control"  name="date" placeholder="Filter by date" data-format="DD-MM-Y" value="Filter by date" data-separator=" - " autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <button class="btn btn-primary" type="submit">Filter</button>
                                        </div>
                                    </div> --}}
                            <div class="card-body table-responsive-sm">
                                <table class="table table-bordered table-hover" width="100%">
                                    <thead style="background-color: #dbe8f3;">
                                        <tr>
                                            <th>Order Code</th>
                                            <!-- <th>Num. Of Products</th> -->
                                            <th>Customer name</th>
                                            <th>Amount</th>
                                            <th>Delivery Status</th>
                                            <th>Payment Status</th>
                                            <th class="text-end">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($orders) > 0)
                                            @foreach ($orders as $key => $order)
                                                <tr>
                                                    <td>{{ $order->invoice_no }}</td>
                                                    <td><b>{{ $order->name }}</b></td>
                                                    <td>
                                                        <?php
                                                        $discount_total = $order->grand_total - $order->discount;
                                                        $total_ammount = $discount_total + $order->shipping_charge;
                                                        ?>
                                                        {{ $total_ammount }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $status = $order->delivery_status;
                                                            if ($order->delivery_status == 'cancelled') {
                                                                $status =
                                                                    '<span class="badge rounded-pill alert-success">Received</span>';
                                                            }
                                                        @endphp
                                                        {!! $status !!}
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
                                                            href="{{ route('all_orders.show', $order->id) }}"
                                                            style="background-color: #308fde !important;">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-primary btn-icon btn-circle btn-sm btn-xs"
                                                            href="{{ route('invoice.download', $order->id) }}">
                                                            <i class="fa-solid fa-download"></i>
                                                        </a>
                                                        <a href="{{ route('delete.orders', $order->id) }}" id="delete"
                                                            class="btn btn-primary btn-icon btn-circle btn-sm btn-xs"
                                                            style="background-color: red!important" data-href="#">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>

                                                    <!--  <td class="text-end">
                                                                       <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                                                       <div class="dropdown">
                                                                           <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                                           <div class="dropdown-menu">
                                                                               <a class="dropdown-item" href="#">View detail</a>
                                                                               <a class="dropdown-item" href="#">Edit info</a>
                                                                               <a class="dropdown-item text-danger" href="#">Delete</a>
                                                                           </div>
                                                                       </div>
                                                                   </td> -->
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center fw-bold"> No Pending Orders</td>
                                            </tr>
                                        @endif

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
                        </form>
                        <!-- table-responsive //end -->
                        {{-- </div>
                        <!-- card-body end// -->
                    </div>
                </form>
                <!-- table-responsive //end -->
                {{-- </div>
                                <!-- card-body end// -->
                            </div>
                            <!-- card end// --> --}}
                        {{-- </div>
                    </div>
                </section> --}}
                    </div>
                @elseif(Auth::guard('admin')->user()->role == 2)
                    <div class="card mb-4 shadow bg-white rounded">
                        <div class="card-header">
                            <h2 class="text-white">Sold Products</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Product ID</th>
                                    <th>Sold Quantities</th>
                                    <th>Amount</th>
                                    @php $i=1; @endphp
                                </tr>
                                @php $vendor = \App\Models\Vendor::where('user_id', Auth::guard('admin')->user()->id)->first(); @endphp
                                @foreach ($solProducts as $product)
                                    @if ($product->product)
                                        @if ($product->product->vendor_id == $vendor->id)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $product->product->name_en ?? '' }}</td>
                                                <td>{{ $product->product_id }}</td>
                                                <td>{{ $product->qty }}</td>
                                                <td>{{ $product->amount }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                                @if ($i == 1)
                                    <tr>
                                        <td colspan="5" class="text-center"><span>No Data Found</span></td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                @endif

    </section>
@endsection

@push('footer-script')
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
@endpush
