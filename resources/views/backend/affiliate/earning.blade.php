@extends('admin.admin_master')
@section('title', 'Affiliate Earnings')

@section('admin')
<section class="content-main">
    <div class="content-header d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Affiliate Earnings</h2>
        <a href="{{ route('affiliates.index') }}" class="btn btn-secondary">
            <i class="material-icons md-arrow_back"></i> Back to Affiliates
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="example" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Referral Code</th>
                            <th>Total Earnings</th>
                            <th>Total Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($affiliates as $affiliate)
                        <tr>
                            <td>{{ $affiliate->name }}</td>
                            <td>{{ $affiliate->email }}</td>
                            <td>{{ $affiliate->referral_code }}</td>
                            <td>৳{{ number_format($affiliate->total_earning ?? 0, 2) }}</td>
                            <td>{{ $affiliate->orders->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection
