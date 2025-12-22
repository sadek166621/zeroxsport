@extends('admin.admin_master')
@section('admin')

<section class="content-main">
    <div class="content-header d-flex justify-content-between align-items-center">
        <div class="col-md-10">
            <h2 class="">Affiliate List</h2>
            <strong style="font-weight: bold" class="text-dark">{{ count($affiliates) }} Affiliates Found</strong>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="example" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Referal Code</th>
                            <th scope="col">Total Earnings</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($affiliates as $key => $affiliate)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $affiliate->name }}</td>
                            <td>{{ $affiliate->phone }}</td>
                            <td>{{ $affiliate->email }}</td>
                            <td>{{ $affiliate->referral_code }}</td>
                            <td>৳{{ number_format($affiliate->total_earning ?? 0, 2) }}</td>
                            <td class="text-end">
                                <a href="{{ route('affiliates.show', $affiliate->id) }}" class="btn btn-sm btn-info" title="Details">
                                    <i class="material-icons md-visibility"></i>
                                </a>
                                <a href="{{ route('affiliates.edit', $affiliate->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="material-icons md-edit"></i>
                                </a>
                                <form action="{{ route('affiliates.destroy', $affiliate->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this affiliate?')">
                                        <i class="material-icons md-delete"></i>
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
</section>

@endsection
