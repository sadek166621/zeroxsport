@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
          <div class="row">
            <div class="col-md-10 offset-1">
                <div class="content-header">
                    <h2 class="content-title">Commission Create</h2>
                    <div class="">
                        <a href="{{ route('commission.create') }}" class="btn btn-primary p-3" title="Slider List"><i class="material-icons md-plus"></i>  </a>
                    </div>
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
                                <th class="text-end">Action</th>
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
                                                <a href="">
                                                    <span
                                                        class="slider-status badge rounded-pill alert-success">Active</span>
                                                </a>
                                            @else
                                                <a href=""> <span
                                                        class="slider-status badge rounded-pill alert-danger">Disable</span></a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('commission.edit', $commission->id) }}"
                                                class="btn btn-primary" title="Edit"
                                                style="padding:12px; margin-right: 5px; border-radius: 5px">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <a href="{{ route('commission.destroy', $commission->id) }}"
                                                class="btn btn-danger" title="Delete" style="border-radius: 5px"
                                                onclick="return confirm('Are you sure you want to delete this commission?');">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
