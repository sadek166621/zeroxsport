@extends('admin.admin_master')
@section('admin')
    <section class="content-main">
        <div class="content-header mx-2 row">
            <div class="text-end">
                <a href="{{ route('product.add') }}" title="Add Product" class="btn btn-primary">
                    <i class="material-icons md-plus"></i>
                </a>

                <a href="{{ route('product.all') }}" class="btn btn-primary px-3" title="Product List"><i class="fa fa-list"
                        style="margin-top: 3px"></i> </a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('product.import.csv') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="csv_file" class="form-control mb-3" required>

                    <button type="submit" class="btn btn-success">
                        Upload & Import
                    </button>
                </form>
            </div>
            <!-- card-body end// -->
        </div>
    </section>
@endsection
