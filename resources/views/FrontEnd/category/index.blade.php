@extends('FrontEnd.master')

@section('title', 'All Categories')
<style>
    .grid-layout {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }
</style>
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container d-flex mt-3">
        <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">All Categories</p>
    </div>
    <!-- Breadcrumb End -->

    <!-- Categories Section Start -->
    <section class="container my-5 grid-layout">
        @foreach($categories as $category)
            <div class="mb-4 p-3 border rounded shadow-sm">
                <a href="{{ route('product.category', $category->slug) }}" class="d-flex align-items-center gap-3">
                    <img src="{{ asset($category->image) }}" alt="{{ $category->name_en }}" width="80" height="80"
                         class="rounded border">
                    <h4 class="mb-0">
                        @if(session()->get('language') == 'bangla')
                            {{ $category->name_bn }}
                        @else
                            {{ $category->name_en }}
                        @endif
                    </h4>
                </a>

                {{-- Subcategories --}}
                @if($category->sub_categories && $category->sub_categories->count() > 0)
                    <div class="row mt-3">
                        @foreach($category->sub_categories as $subcategory)
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card h-100 text-center shadow-sm">
                                    <a href="{{ route('product.category', $subcategory->slug) }}">
                                        <img src="{{ asset($subcategory->image) }}" class="card-img-top p-2" alt="{{ $subcategory->name_en }}" height="100">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                @if(session()->get('language') == 'bangla')
                                                    {{ $subcategory->name_bn }}
                                                @else
                                                    {{ $subcategory->name_en }}
                                                @endif
                                            </h6>
                                        </div>
                                    </a>
                                </div>

                                {{-- Sub-Subcategories --}}
                                @if($subcategory->sub_sub_categories && $subcategory->sub_sub_categories->count() > 0)
                                    <ul class="mt-2 ps-3">
                                        @foreach($subcategory->sub_sub_categories as $subsubcategory)
                                            <li>
                                                <a href="{{ route('product.category', $subsubcategory->slug) }}">
                                                    @if(session()->get('language') == 'bangla')
                                                        {{ $subsubcategory->name_bn }}
                                                    @else
                                                        {{ $subsubcategory->name_en }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </section>

     @include('FrontEnd.include.cart-contianer')
@endsection