@extends('admin.admin_master')

@section('admin')
<section class="content-main">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="content-header">
                <h2 class="content-title">Shipping and Delivery Charges</h2>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('setting.shipping.and.delivery.update') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold">ঢাকা শহরের ভিতরে ডেলিভারি</label>
                            <input type="number" step="0.01"
                                   name="shipping_inside_dhaka"
                                   value="{{ old('shipping_inside_dhaka', $settings->shipping_inside_dhaka ?? 70) }}"
                                   class="form-control">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">ঢাকা শহরের বাহিরে ডেলিভারি</label>
                            <input type="number" step="0.01"
                                   name="shipping_outside_dhaka"
                                   value="{{ old('shipping_outside_dhaka', $settings->shipping_outside_dhaka ?? 130) }}"
                                   class="form-control">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">ঢাকা এবং ঢাকার বাহিরে সকল এরিয়া</label>
                            <input type="number" step="0.01"
                                   name="shipping_all_area"
                                   value="{{ old('shipping_all_area', $settings->shipping_all_area ?? 180) }}"
                                   class="form-control">
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                <button type="submit" class="btn btn-primary w-100">
                                    Update Charges
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
