@extends('admin.admin_master')

@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0"> Seller Penalty List</h3>
                        <a href="{{ route('seller.penalty.create') }}" class="btn btn-md btn-primary">
                            <i class="fa fa-plus"></i> Add Penalty
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Vendor</th>
                                    <th>Shop name</th>
                                    <th>Product</th>
                                    <th>Order</th>
                                    <th>Customer</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penalties as $key => $penalty)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $penalty->vendor->user->name }}</td>
                                        <td>{{ $penalty->vendor->shop_name }}</td>
                                        <td>{{ $penalty->product ? $penalty->product->name_en : 'N/A' }}</td>
                                        <td>{{ $penalty->order ? $penalty->order->id : 'N/A' }}</td>
                                        <td>{{ $penalty->order ? $penalty->order->user->name : 'N/A' }}</td>
                                        <td>{{ $penalty->type }}</td>
                                        <td>{{ $penalty->amount }}</td>
                                        <td style="width:20%;">{{ $penalty->reason }}</td>
                                        <td>{{ $penalty->is_ban ? 'Banned' : 'Active' }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('seller.penalty.edit', $penalty->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('seller.penalty.destroy', $penalty->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this penalty?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
