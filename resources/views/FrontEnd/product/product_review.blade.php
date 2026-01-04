@extends('FrontEnd.master')

@section('title', 'Write a Review')

@section('content')
<div class="container py-5">
    @if($product)
        <h2 class="mb-4">Write a Review for "{{ $product->name_en ?? 'Product' }}"</h2>

        {{-- Product Info --}}
        <div class="card mb-4">
            <div class="card-body d-flex">
                <div class="me-3">
                    <img src="{{ asset($product->product_thumbnail ?? 'images/default-product.png') }}" alt="{{ $product->name_en ?? 'Product' }}" width="120">
                </div>
                <div>
                    @php $data = calculateDiscount($product->id); @endphp
                    <h5>{{ $product->name_en }}</h5>
                    @if($product->discount_price)
                        <div class="d-flex align-items-center">
                            <strong class="text-danger">৳{{ number_format($data['discount'], 2) }}</strong>
                            <small class="text-muted ms-1"><del>৳{{ number_format($product->regular_price, 2) }}</del></small>
                        </div>
                    @else
                        <strong>৳{{ number_format($product->regular_price, 2) }}</strong>
                    @endif
                </div>
            </div>
        </div>

        {{-- Review Form --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.review.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    {{-- Rating --}}
                    <div class="mb-3">
                        <label class="form-label d-block">Rating</label>
                        <div class="star-rating">
                            @for ($i = 5; $i >= 1; $i -= 1)
                                @php
                                    $id = 'star' . str_replace('.', '_', $i);
                                @endphp
                                <input type="radio" id="{{ $id }}" name="rating" value="{{ $i }}" required />
                                <label for="{{ $id }}" title="{{ $i }} stars">
                                    @if(fmod($i, 1) === 0)
                                        &#9733;
                                    @else
                                        &#9734;
                                    @endif
                                </label>
                            @endfor
                        </div>
                        @error('rating')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Body --}}
                    <div class="mb-3">
                        <label for="body" class="form-label">Your Review</label>
                        <textarea name="body" id="body" rows="5" class="form-control" required>{{ old('body') }}</textarea>
                        @error('body')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Photo --}}
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo[]" id="photo" class="form-control" multiple>
                        @error('photo.*')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-success">Submit Review</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Product Not Found</h4>
            <p>The product you're trying to review could not be found. Please go back and select a valid product.</p>
            <hr>
            <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
        </div>
    @endif
</div>

{{-- Star rating styles --}}
<style>
    .star-rating {
        direction: rtl;
        font-size: 1.5rem;
        unicode-bidi: bidi-override;
        display: inline-flex;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        color: #ccc;
        cursor: pointer;
        padding: 0 2px;
        transition: color 0.2s;
    }

    .star-rating input[type="radio"]:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: gold;
    }
</style>
@endsection
