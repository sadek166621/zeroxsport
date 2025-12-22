@extends('admin.admin_master')

@section('admin')
    <section class="content-main">
        <div class="row">
             <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Product and order Penalties</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Order</th>
                                    <th>Customer</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Reason</th>
                                    {{-- <th>Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penalties as $key => $penalty)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $penalty->product ? $penalty->product->name_en : 'N/A' }}</td>
                                    <td>{{ $penalty->order ? $penalty->order->id : 'N/A' }}</td>
                                    <td>{{ $penalty->order ? $penalty->order->user->name : 'N/A' }}</td>
                                    <td>{{ $penalty->type }}</td>
                                    <td>{{ $penalty->amount }}</td>
                                    <td style="width:20%;">{{ $penalty->reason }}</td>
                                    {{-- <td>{{ $penalty->is_ban ? 'Banned' : 'Active' }}</td> --}}
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
