@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
        <div class="content-header mx-2">
            <div class="col-md-10">
                <h2 class="content-title">Affiliate Product List</h2>
                <strong style="font-weight: bold" class="text-dark">{{ count($products) }} Products Found</strong>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="example" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name(English)</th>
                                <th scope="col">Name(Bangla)</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Affiliate Status</th>
                                <th scope="col">Product Status</th>
                                <th scope="col">Vendor Product</th>
                                <th scope="col">Commission</th>
                                <th scope="col">AFF-Link</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td width="15%">
                                        <a href="#" class="itemside">
                                            <div class="left">
                                                <img src="{{ asset($item->product_thumbnail) }}" class="img-sm"
                                                    alt="Product Image" style="width: 80px; height: 70px;">
                                            </div>
                                        </a>
                                    </td>
                                    <td>{{ $item->name_en ?? 'NULL' }}</td>
                                    <td>{{ $item->name_bn ?? 'NULL' }}</td>
                                    <td>{{ $item->category->name_en ?? 'NULL' }}</td>
                                    <td>{{ $item->regular_price ?? 'NULL' }}</td>
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
                                                <span class="text-danger">৳{{ $item->discount_price }}</span>
                                            @elseif($item->discount_type == 2)
                                                <span class="text-danger">{{ $item->discount_price }}%</span>
                                            @endif
                                        @else
                                            <span class="text-secondary">None</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->is_featured == 1)
                                            <a href="{{ route('product.featured', ['id' => $item->id]) }}" title="Featured Product">
                                                <i class="fa-solid fa-tag text-success"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('product.featured', ['id' => $item->id]) }}" title="Not Featured Product">
                                                <i class="fa fa-tag text-danger"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->is_affiliate == 1)
                                            <a href="{{ route('product.in_active_affiliate', ['id' => $item->id]) }}">
                                                <span class="badge rounded-pill alert-success">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('product.active.affiliate', ['id' => $item->id]) }}">
                                                <span class="badge rounded-pill alert-danger">Disable</span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            <a href="{{ route('product.in_active', ['id' => $item->id]) }}">
                                                <span class="badge rounded-pill alert-success">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('product.active', ['id' => $item->id]) }}">
                                                <span class="badge rounded-pill alert-danger">Disable</span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->vendor_id == null)
                                            <span class="badge rounded-pill alert-success">No</span>
                                        @else
                                            <span class="badge rounded-pill alert-success">Yes</span>
                                        @endif
                                    </td>

                                    <!-- Commission Button -->
                                  <td>
                               @if($item->affiliate_commission != 0.00)
                                   <p class="text-success"> {{ number_format($item->affiliate_commission, 2) }}
                                    {{ $item->affiliate_commission_type == 1 ? '৳' : '%' }}</p>
                                @endif

                                    <button type="button" class="btn btn-sm btn-warning" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#commissionModal{{ $item->id }}">
                                        <i class="fa fa-money-bill-wave"></i> Commission
                                    </button>
                                </td>

                                    <!-- Affiliate Link -->
                                    <td style="min-width: 200px;">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control"
                                                id="affiliateLink{{ $item->id }}"
                                                value="https://www.onlinehutbd.com/product/{{ $item->slug }}?ref=313"
                                                readonly>
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="copyToClipboard('affiliateLink{{ $item->id }}')">
                                                Copy
                                            </button>
                                        </div>
                                    </td>

                                    <!-- Action Buttons -->
                                    <td>
                                        <div class="btn-group" style="margin: 50% 0">
                                            <a class="btn btn-primary" href="{{ route('product.edit', $item->id) }}"
                                                title="Edit Info" style="padding:12px; margin-right: 5px; border-radius: 5px">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            @if (Auth::guard('admin')->user()->role == '2')
                                                <a class="btn btn-danger" href="{{ route('product.delete', $item->id) }}"
                                                    id="delete" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            @else
                                                @if (Auth::guard('admin')->user()->role == '1' ||
                                                        in_array('4', json_decode(Auth::guard('admin')->user()->staff->role->permissions)))
                                                    <a class="btn btn-danger" href="{{ route('product.delete', $item->id) }}"
                                                        id="delete" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- All Commission Modals - Placed OUTSIDE the table -->
        @foreach ($products as $item)
            <div class="modal fade" id="commissionModal{{ $item->id }}" tabindex="-1"
                aria-labelledby="commissionModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('product.affiliate.commission.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="modal-header">
                                <h5 class="modal-title" id="commissionModalLabel{{ $item->id }}">
                                    Set Commission - {{ $item->name_en ?? 'Product' }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <!-- Current Override -->
                                @if($item->affiliate_commission > 0)
                                    <div class="alert alert-success small mb-3">
                                        <strong>Current Commision:</strong>
                                        @if($item->affiliate_commission_type == 1)
                                            ৳{{ $item->affiliate_commission }} (Flat)
                                        @else
                                            {{ $item->affiliate_commission }}% (Percentage)
                                        @endif
                                    </div>

                                    @else
                                    <div class="alert alert-danger small mb-3">
                                        <strong>No Commission Set</strong> 
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Amount</label>
                                        <input type="number" name="affiliate_commission"
                                            class="form-control" value="{{ $item->affiliate_commission ?? '' }}"
                                            placeholder="e.g. 500 or 10">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Type</label>
                                        <select name="affiliate_commission_type" class="form-select">
                                            <option value="1" {{ ($item->affiliate_commission_type ?? 0) == 1 ? 'selected' : '' }}>Flat (৳)</option>
                                            <option value="2" {{ ($item->affiliate_commission_type ?? 0) == 2 ? 'selected' : '' }}>Percentage (%)</option>
                                        </select>
                                    </div>
                                </div>

                              
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Copy to Clipboard Script -->
    <script>
        function copyToClipboard(elementId) {
            const input = document.getElementById(elementId);
            input.select();
            input.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("Affiliate link copied to clipboard!");
        }
    </script>
@endsection