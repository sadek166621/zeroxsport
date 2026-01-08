@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content-main">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="content-header">
                    <h2 class="content-title">Commission Update</h2>
                    <div class="">
                        <a href="{{ route('slider.index') }}" class="btn btn-primary p-3" title="Slider List"><i
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
                                <form method="post" action="{{ route('commission.update', $commission->id) }}">
                                    @csrf                                  

                                    <!-- Category -->
                                    <div class="mb-4">
                                        <label class="col-form-label col-md-2" style="font-weight: bold;">Category:</label>
                                        <select class="form-control select-active w-100 form-select select-nice"
                                            name="category_id" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $commission->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Commission Rate -->
                                    <div class="mb-4">
                                        <label for="commission_rate" class="col-form-label col-md-3"
                                            style="font-weight: bold;">
                                            Commission Rate:
                                        </label>
                                        <input type="number" name="commission_rate" class="form-control"
                                            value="{{ old('commission_rate', $commission->commission_rate) }}">
                                        @error('commission_rate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Mode -->
                                    <div class="mb-4">
                                        <label class="col-form-label col-md-2" style="font-weight: bold;">Mode:</label>
                                        <select name="mode" class="form-control">
                                            <option value="percentage"
                                                {{ old('mode', $commission->mode) == 'percentage' ? 'selected' : '' }}>
                                                Percentage</option>
                                            <option value="fixed"
                                                {{ old('mode', $commission->mode) == 'fixed' ? 'selected' : '' }}>Fixed
                                            </option>
                                        </select>
                                        @error('mode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="form-check-input me-2 cursor" name="status"
                                                id="status" value="1"
                                                {{ old('status', $commission->status) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label cursor" for="status">Status</label>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="row mb-4 justify-content-sm-end">
                                        <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                            <input type="submit" class="btn btn-primary" value="Update">
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
