@extends('FrontEnd.affiliate.master')

@section('title', 'My Orders')

@section('content')

    <div class="card shadow-sm rounded-4 p-4 bg-white">
        <h4 class="mb-4">My Affiliate Orders List</h4>

        @if($orders->isEmpty())
            <div class="alert alert-info">You have no orders yet.</div>
            
        @else
            <div class="table-responsive">
                <table class="table table-striped align-middle" id="affiliateProductsTable">
                    <thead class="table-light">
                        <tr>
                            <th>Invoice No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Grand Total</th>
                            <th>Order Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->invoice_no }}</td>

                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>
                                @if($order->payment_status == 1)
                                    <span class="badge bg-success">Paid</span>
                                @elseif($order->payment_status == 0)
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @else
                                    <span class="badge bg-danger">Unpaid</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'processing' => 'info',
                                        'picked' => 'primary',
                                        'shipped' => 'secondary',
                                        'delivered' => 'success',
                                        'cancelled' => 'danger',
                                        'returned' => 'dark',
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$order->delivery_status] ?? 'secondary' }}">
                                    {{ ucfirst($order->delivery_status ?? 'N/A') }}
                                </span>
                            </td>
                            <td>৳{{ number_format($order->grand_total, 2) }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('affiliate.order.details', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

           
        @endif
    </div>
@endsection
    {{-- jQuery & DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <script>
        $(document).ready(function () {
            $('#affiliateProductsTable').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ products",
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    }
                }
            });
        });
    </script>