@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="content-header">
                    <h2 class="content-title">{{ $customer->name }}'s Password Reset</h2>
                    <div class="">
                        <a href="{{ route('customer.index') }}" class="btn btn-primary p-3" title="Customer List"><i
                                class="fa fa-list"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('reset-password.store', $customer->id) }}">
                                    @csrf

                                    <div class="mb-4">
                                        <label class="col-form-label fw-bold">New Password</label>
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Reset password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="col-form-label fw-bold">Confirm Password</label>
                                        <input class="form-control" type="password" name="password_confirmation"
                                            placeholder="Confirm password">
                                    </div>

                                    <div class="row mb-4 justify-content-end">
                                        <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                            <input type="submit" class="btn btn-primary w-100" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- .row // -->
                    </div>
                    <!-- card body .// -->
                </div>
                <!-- card .// -->
            </div>
        </div>
    </section>
@endsection
