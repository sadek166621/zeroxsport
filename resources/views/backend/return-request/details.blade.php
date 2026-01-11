@extends('admin.admin_master')
@section('admin')
<section class="content-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="content-title">Order Return Details</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @php
                $user = Auth::guard('admin')->user();
                // dd($user);
                $vendor = $user->role == 2 ? $user->vendor : null;
                // dd($vendor);
            @endphp

            {{-- Form starts for both Admin & Vendor --}}
            <form action="{{ route('return-request.update') }}" method="post">
                @csrf
                <input type="hidden" name="request_id" value="{{ $return_request->id }}">

                {{-- Request Summary --}}
                <div class="card mt-4">
                    <div class="card-header text-white">
                        <h3>Request Summary</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td><strong>Order Date:</strong> <br> {{ $return_request->order->created_at }}</td>
                                <td><strong>Invoice No:</strong> <br> {{ $return_request->order->invoice_no }}</td>
                                <td><strong>Return Request Date:</strong> <br> {{ $return_request->created_at }}</td>
                                <td>
                                    <strong>Status:</strong><br>
                                    @if ($user->role == 1 ||  $vendor)
                                        <select name="return_request_status" class="form-control" style="border: 1px solid darkgrey">
                                            <option value="0" {{ $return_request->status == 0 ? 'selected' : '' }}>Pending</option>
                                            <option value="1" {{ $return_request->status == 1 ? 'selected' : '' }}>Approved</option>
                                            <option value="2" {{ $return_request->status == 2 ? 'selected' : '' }}>Rejected</option>
                                            <option value="3" {{ $return_request->status == 3 ? 'selected' : '' }}>Returned</option>
                                            <option value="4" {{ $return_request->status == 4 ? 'selected' : '' }}>Modified</option>
                                        </select>
                                    @else
                                        <span>
                                            @switch($return_request->status)
                                                @case(0) Pending @break
                                                @case(1) Approved @break
                                                @case(2) Rejected @break
                                                @case(3) Returned @break
                                                @default Modified
                                            @endswitch
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- Requested Products --}}
                <div class="card mb-4">
                    <div class="card-header text-white">
                        <h3>Requested Products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Issue</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($returning_products as $key => $item)
                                    @php
                                        $canUpdate = $user->role == 1 || ($user->role == 2 && $vendor && $item->vendor_id == $vendor->id);
                                    @endphp
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->product->name_en ?? '' }}</td>
                                        <td><img src="{{ asset($item->image) }}" height="150px" width="150px"></td>
                                        <td>{{ $item->issue ?? '' }}</td>
                                        <td>{{ $item->qty ?? '' }}</td>
                                        <td>
                                            <input type="hidden" name="returning_product_id[]" value="{{ $item->id }}">
                                            @if ($canUpdate)
                                                <select name="status[]" class="form-control" style="border: 1px solid darkgrey">
                                                    <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Not Replaced</option>
                                                    <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Replaced</option>
                                                </select>
                                            @else
                                                <span>{{ $item->status == 0 ? 'Not Replaced' : 'Replaced' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Submit button only if user can update at least one product --}}
                @php
                    $hasUpdatePermission = $user->role == 1 || ($user->role == 2 && $returning_products->contains(function($p) use ($vendor) {
                        return $p->vendor_id == $vendor->id;
                    }));
                @endphp

                @if ($hasUpdatePermission)
                    <div class="form-group mt-2 d-flex mb-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                @endif

            </form>

        </div>
    </div>
</section>
@endsection
