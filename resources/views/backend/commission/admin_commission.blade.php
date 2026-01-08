@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="content-header">
                    <h2 class="content-title">Category Wise Commission Rate</h2>

                </div>
            </div>
        </div>

        <div class="card mb-4">
            <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="example" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Commission Rate</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commissions as $key => $commission)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $commission->category->name_en ?? 'NULL' }} </td>
                                    <td>
                                        {{ $commission->commission_rate ?? 'NULL' }}
                                        @if ($commission->mode === 'percentage')
                                            %
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            @if ($commission->status == 1)
                                                <span class="slider-status badge rounded-pill alert-success">Active</span>
                                            @else
                                                <span class="slider-status badge rounded-pill alert-danger">Disable</span>
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
        <!-- card end// -->
    </section>
@endsection
