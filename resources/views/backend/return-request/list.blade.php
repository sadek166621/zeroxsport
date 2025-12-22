@extends('admin.admin_master')
@section('admin')
<section class="content-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="content-title">Order Return List </h3>
            <strong style="font-weight: bold" class="text-dark"> {{ count($return_requests) }} Orders Found </strong>
        </div>
{{--        <div class="col-md-2">--}}
{{--            <a href="{{ route('supplier.create') }}" class="btn btn-primary" title="Supplier Create"><i class="material-icons md-plus"></i></a>--}}
{{--        </div>--}}
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive-sm">
               <table id="example" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Invoice No</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">Comment</th>
                            <th scope="col">No of Returning Products</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($return_requests as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item->order->invoice_no ?? '' }} </td>
                            <td> {{ $item->created_at ?? '' }} </td>
                            <td> {{ $item->comment ?? '' }} </td>
                            <td>{{count(get_returning_products($item->id))}}</td>
                            <td>
                                @if($item->status == 0) Pending @elseif($item->status == 1) Processing @elseif($item->status == 2) Replaced @elseif($item->status == 3) Rejected @else Modified  @endif
                            </td>
                            <td class="text-end">
                                <a class="btn btn-primary" style="padding:12px" href="{{ route('return-request.show',$item->id) }}" title="Show Info"><i class="fa fa-eye"></i></a>

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
