@extends('admin.admin_master')
@section('admin')
    <style type="text/css">
        table,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td {
            border: 1px solid #dee2e6 !important;
        }

        th {
            font-weight: bolder !important;
        }
    </style>

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Completed Order List</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <!-- card-header end// -->
                    <div class="card-body">
                        <form class="" action="" method="GET">
                            <div class="form-group row mb-3">
                                <!-- All Orders -->
                                <div class="col-md-2">
                                    <label class="col-form-label"><span>All Orders :</span></label>
                                </div>

                                <!-- Delivery Status -->
                                <div class="col-md-2 mt-2">
                                    <label for="delivery_status" class="col-form-label">Delivery Status :</label>
                                    <div class="custom_select">
                                        <select
                                            class="form-select d-inline-block select-active select-nice mb-lg-0 mr-5 mw-200"
                                            name="delivery_status" id="delivery_status" disabled>
                                            {{-- <option value="" selected="">Delivery Status</option> --}}
                                            <option value="0" @if ($delivery_status == 4) selected @endif>Delivered
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Payment Status -->
                                <div class="col-md-2 mt-2">
                                    <label for="payment_status" class="col-form-label">Payment Status :</label>
                                    <div class="custom_select">
                                        <select
                                            class="select-active select-nice form-select d-inline-block mb-lg-0 mr-5 mw-200"
                                            name="payment_status" id="payment_status">
                                            {{-- <option value="" selected="">Payment Status</option> --}}
                                            <option value="0" @if ($payment_status == '0') selected @endif>Unpaid
                                            </option>
                                            <option value="1" @if ($payment_status == '1') selected @endif>Paid
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Date Filter -->
                                <div class="col-md-3 mt-2">
                                    <label for="reportrange" class="col-form-label">Filter by Date :</label>
                                    <div class="custom_select">
                                        <input type="text" style="width: 190px" id="reportrange" class="form-control"
                                            name="date" placeholder="Filter by date" data-format="DD-MM-Y"
                                            value="Filter by date" data-separator=" - " autocomplete="off">
                                    </div>
                                </div>

                                <!-- Filter Button -->
                                <div class="col-md-1 mt-2">
                                    <button class="btn btn-primary p-3 mx-3" type="submit">
                                        <i class="fa fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-bordered table-hover" id="example" width="100%">
                                    <thead>
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
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <td>{{ $order->invoice_no }}</td>
                                                <td><b>{{ $order->name }}</b></td>
                                                <td>
                                                    {{ $order->grand_total }}

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
                                                        href="{{ route('vendor.order.details', $order->id) }}">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary btn-icon btn-circle btn-sm btn-xs"
                                                        style="background-color: #106390 !important;"
                                                        href="{{ route('vendor.invoice.download', $order->id) }}">
                                                        <i class="fa-solid fa-download"></i>
                                                    </a>
                                                    {{-- <a href="{{ route('delete.orders', $order->id) }}" id="delete"
                                                        style="background-color: red !important;"
                                                        class="btn btn-primary btn-icon btn-circle btn-sm btn-xs"
                                                        data-href="#">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a> --}}
                                                </td>


                                            </tr>
                                        @endforeach
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
                    </div>
                    <!-- card-body end// -->
                </div>
                <!-- card end// -->
            </div>

        </div>
        </div> -->
        </div>
    </section>

    @push('footer-script')
        <script type="text/javascript">
            $(function() {

                $('input[name="date"]').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });

                $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                        'MM/DD/YYYY'));
                });

                // $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
                //     $(this).val('');
                // });


                var start = moment().subtract(29, 'days');
                var end = moment();


                $('input[name="date"]').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });

                function cb(start, end) {
                    $('#reportrange').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }

                $('#reportrange').daterangepicker({

                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    }
                }, cb);

                cb(start, end);

            });
        </script>
    @endpush
@endsection
