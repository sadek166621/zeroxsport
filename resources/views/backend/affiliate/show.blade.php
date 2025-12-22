@extends('admin.admin_master')
@section('admin')

<section class="content-main">
    <div class="content-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0">Affiliate Details</h2>
            <p class="text-muted">View full profile and performance summary</p>
        </div>
        <a href="{{ route('affiliates.index') }}" class="btn btn-secondary">
            <i class="material-icons md-arrow_back"></i> Back to List
        </a>
    </div>

    <div class="card shadow-sm rounded-lg border-0">
        <div class="card-body">
            <div class="row mb-4">
                <!-- Profile Section -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="fw-bold text-primary"><i class="material-icons align-middle">person</i> {{ $affiliate->name }}</h5>
                        <p class="mb-1"><strong>Email:</strong> {{ $affiliate->email }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $affiliate->phone }}</p>
                        <p class="mb-1"><strong>Affiliate ID:</strong> {{ $affiliate->affiliate_member_id ?? 'N/A' }}</p>
                        <p class="mb-1"><strong>Referral Code:</strong> {{ $affiliate->referral_code ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="col-md-6">
                    <div class="bg-light rounded p-3">
                        <p class="mb-2"><strong>Total Earnings:</strong>
                            <span class="badge bg-success fs-6">৳{{ number_format($affiliate->total_earning ?? 0, 2) }}</span>
                        </p>
                        <p class="mb-2"><strong>Joined:</strong>
                            <span class="text-muted">{{ $affiliate->created_at->format('d M Y') }}</span>
                        </p>
                        <p class="mb-0"><strong>Status:</strong>
                            <span class="badge bg-info">Active</span> {{-- Adjust based on actual status if needed --}}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-2">
                <a href="{{ route('affiliates.edit', $affiliate->id) }}" class="btn btn-warning">
                    <i class="material-icons md-edit"></i> Edit
                </a>

                <form action="{{ route('affiliates.destroy', $affiliate->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this affiliate?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="material-icons md-delete"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
