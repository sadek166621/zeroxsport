<style>
    /* Search dropdown container */
.searchProducts {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    max-height: 350px;
    overflow-y: auto;
}

/* Hover effect for product rows */
.searchProducts .list-group-item a:hover {
    background-color: #f9fafb;
}

/* Smooth transitions */
.transition-all {
    transition: all 0.2s ease-in-out;
}

/* Hover background utility */
.hover-bg-light:hover {
    background-color: #f8f9fa !important;
}
</style>
@if($products->count())
    <ul class="list-group shadow-lg border-0 rounded-3 overflow-hidden">
        @foreach($products as $product)
            <li class="list-group-item border-0 p-2">
                <a href="{{ route('product.details', $product->slug) }}" 
                   class="d-flex align-items-center text-decoration-none hover-bg-light rounded-2 p-2 transition-all w-100">

                    {{-- Product Image --}}
                    <div class="me-3">
                        <img src="{{ asset($product->product_thumbnail) }}" 
                             alt="{{ $product->name_en }}" 
                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                    </div>

                    {{-- Product Info --}}
                    <div class="flex-grow-1">
                        <div class="fw-semibold text-dark">{{ Str::limit($product->name_en, 40) }}</div>
                        <div class="text-success fw-bold">৳ {{ number_format($product->regular_price, 2) }}</div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@else
    <div class="p-4 text-center text-muted border rounded-3 bg-light shadow-sm">
        <i class="bi bi-search" style="font-size: 24px;"></i>
        <p class="mb-0 mt-2">No products found</p>
    </div>
@endif
