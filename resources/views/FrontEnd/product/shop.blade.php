@extends('FrontEnd.master')
@section('title')
    All Products
@endsection
@section('content')
    <style>
        .breadcrumb-section {
            background: #f8f9fa;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
        }

        .breadcrumb-custom {
            max-width: 1400px;
            margin: 0 auto;
            font-size: 0.95rem;
            color: #666;
        }

        .breadcrumb-custom a {
            color: #003E32;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .breadcrumb-custom a:hover {
            text-decoration: underline;
        }

        .shop-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 3rem 2rem;
        }

        .shop-wrapper {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 30px;
        }

        .filter-sidebar {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .filter-group {
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .filter-group:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .filter-title {
            font-size: 1rem;
            font-weight: 700;
            color: #003E32;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .category-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
            cursor: pointer;
            transition: color 0.3s;
        }

        .category-item:hover {
            color: #003E32;
        }

        .category-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 0.8rem;
            cursor: pointer;
            accent-color: #003E32;
        }

        .category-item label {
            cursor: pointer;
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.95rem;
            margin: 0;
        }

        .category-badge {
            background: #f0f0f0;
            color: #999;
            font-size: 0.8rem;
            padding: 0.25rem 0.6rem;
            border-radius: 12px;
            font-weight: 500;
        }

        .price-inputs {
            display: flex;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        .price-input {
            flex: 1;
        }

        .price-input label {
            display: block;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
            color: #666;
            font-weight: 500;
        }

        .price-input input {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .price-input input:focus {
            outline: none;
            border-color: #003E32;
            box-shadow: 0 0 0 3px rgba(1, 180, 94, 0.1);
        }

        .filter-btn {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #003E32 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
            box-shadow: 0 2px 8px rgba(1, 180, 94, 0.2);
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(1, 180, 94, 0.3);
        }

        .clear-filters {
            width: 100%;
            padding: 0.9rem;
            background: white;
            color: #666;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: all 0.3s;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .clear-filters:hover {
            border-color: #003E32;
            color: #003E32;
            background: #f0fdf4;
        }

        .products-section {
            min-height: 500px;
        }

        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            gap: 1rem;
        }

        .products-count {
            color: #666;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .sort-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sort-controls label {
            font-size: 0.95rem;
            color: #666;
            font-weight: 500;
            white-space: nowrap;
        }

        .sort-controls select {
            padding: 0.7rem 2rem 0.7rem 1rem;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            outline: none;
            background-color: white;
            transition: all 0.3s;
        }

        .sort-controls select:focus {
            border-color: #003E32;
            box-shadow: 0 0 0 3px rgba(1, 180, 94, 0.1);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            display: flex;
            flex-direction: column;
            border: 2px solid transparent;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(1, 180, 94, 0.2);
            border-color: #003E32;
        }

        .product-image {
            position: relative;
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #003E32, #10B981);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: linear-gradient(135deg, #003E32, #059669);
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(1, 180, 94, 0.3);
            z-index: 10;
        }

        .product-details {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
            line-height: 1.4;
            min-height: 40px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .stars {
            color: #ffc107;
            font-size: 14px;
        }

        .rating-count {
            color: #999;
            font-size: 13px;
        }

        .product-footer {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 8px;
            margin-top: auto;
        }

        .price-section {
            display: flex;
            gap: 8px;
        }

        .product-price {
            font-size: 15px;
            font-weight: bold;
            color: #003E32;
        }

        .product-old-price {
            font-size: 13px;
            color: #999;
            text-decoration: line-through;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            margin-top: auto;
        }

        .btn-buy-now,
        .btn-add-cart {
            border: none;
            padding: 0.5rem;
            border-radius: 5px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
        }

        .btn-buy-now {
            background: #003E32;
            color: white;
            box-shadow: 0 2px 8px rgba(1, 180, 94, 0.3);
        }

        .btn-buy-now:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .btn-add-cart {
            background: white;
            color: #003E32;
            border: 1px solid #003E32;
        }

        .btn-add-cart:hover {
            background: #003E32;
            color: white;
            transform: translateY(-1px);
        }

        .out-of-stock {
            background: #E9E9E9;
            color: gray;
            padding: 0.5rem;
            text-align: center;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            width: 100%;
            display: block;
            border: none;
            cursor: not-allowed;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .empty-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 0.5rem;
        }

        .empty-text {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .clear-btn {
            display: inline-block;
            background: linear-gradient(135deg, #003E32 0%, #059669 100%);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .clear-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(1, 180, 94, 0.3);
        }

        .pagination {
            margin-top: 3rem;
            display: flex;
            justify-content: center;
        }

        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0.5rem 0.75rem;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            color: #666;
        }

        .pagination a:hover {
            border-color: #003E32;
            color: #003E32;
            background: #f0fdf4;
            transform: translateY(-2px);
        }

        .pagination span.active {
            background: linear-gradient(135deg, #003E32 0%, #059669 100%);
            color: white;
            border-color: transparent;
            font-weight: 700;
        }

        .pagination span.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            color: #999;
        }

        .pagination span.disabled:hover {
            border-color: #e9ecef;
            background: transparent;
            transform: none;
        }

        .filter-toggle-btn {
            display: none;
            background: linear-gradient(135deg, #003E32 0%, #059669 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(1, 180, 94, 0.2);
            font-size: 14px;
            transition: all 0.3s;
        }

        .filter-toggle-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(1, 180, 94, 0.3);
        }

        .filter-sidebar.active {
            display: block;
        }

        .filter-close-btn {
            display: none;
        }

        @media (max-width: 1024px) {
            .shop-wrapper {
                grid-template-columns: 1fr;
            }

            .filter-sidebar {
                position: static;
            }

            .product-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 768px) {
            .filter-toggle-btn {
                display: block;
            }

            .filter-sidebar {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 280px;
                height: 100vh;
                background: white;
                border-radius: 0;
                padding: 1.5rem;
                box-shadow: 2px 0 8px rgba(0, 0, 0, 0.15);
                z-index: 1000;
                overflow-y: auto;
            }

            .filter-sidebar.active {
                display: block;
            }

            .filter-close-btn {
                display: block;
                background: none;
                border: none;
                font-size: 24px;
                color: #003E32;
                cursor: pointer;
                margin-bottom: 1rem;
                float: right;
            }

            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .products-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .sort-controls {
                width: 100%;
            }

            .sort-controls select {
                width: 100%;
            }

            .pagination a,
            .pagination span {
                min-width: 36px;
                height: 36px;
                padding: 0.4rem 0.6rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .shop-container {
                padding: 0 1rem 2rem 1rem;
            }

            .shop-wrapper {
                gap: 1rem;
            }

            .filter-sidebar {
                padding: 1rem;
            }

            .products-header {
                padding: 1rem;
                flex-direction: column;
            }

            .product-details {
                padding: 5px;
            }

            .breadcrumb-section {
                padding: 15px;
                margin-bottom: 15px;
            }

            .pagination a,
            .pagination span {
                min-width: 32px;
                height: 32px;
                padding: 0.3rem 0.5rem;
                font-size: 0.8rem;
            }
        }
    </style>

    @php
        $min_price = 0;
        $max_price = 1000000000;
        if (isset($_GET['min_price']) && $_GET['min_price'] > 0) {
            $min_price = $_GET['min_price'];
        }
        if (isset($_GET['max_price']) && $_GET['max_price'] > 0) {
            $max_price = $_GET['max_price'];
        }
    @endphp

    <div class="breadcrumb-section">
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}" style="text-decoration: none; transition: all 0.3s;">
                @if (session()->get('language') == 'bangla')
                    হোম
                @else
                    Home
                @endif
            </a>
            <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i>
            <span>
                @if (session()->get('language') == 'bangla')
                    সমস্ত পণ্য
                @else
                    All Products
                @endif
            </span>
        </div>
    </div>

    <div class="shop-container">
        <button class="filter-toggle-btn" id="filterToggleBtn">
            <i class="fa fa-filter"></i> {{ session()->get('language') == 'bangla' ? 'ফিল্টার' : 'Show Filters' }}
        </button>

        <div class="shop-wrapper">
            <!-- Filter Sidebar -->
            <aside class="filter-sidebar" id="filterSidebar">
                <button class="filter-close-btn" id="filterCloseBtn">&times;</button>
                <form method="GET" action="">
                    <!-- Categories -->
                    <div class="filter-group">
                        <h3 class="filter-title">
                            @if (session()->get('language') == 'bangla')
                                ক্যাটাগরি
                            @else
                                Categories
                            @endif
                        </h3>
                        @foreach (get_categories() as $category)
                            <div class="category-item">
                                <input type="checkbox" id="cat_{{ $category->id }}" name="category[]"
                                    value="{{ $category->name_en }}"
                                    @isset($_GET['category']){{ in_array($category->name_en, $_GET['category']) ? 'checked' : '' }}@endisset>
                                <label for="cat_{{ $category->id }}">
                                    <span>{{ session()->get('language') == 'bangla' ? $category->name_bn : $category->name_en }}</span>
                                    <span class="category-badge">{{ count(get_category_products($category->slug)) }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Brands -->
                    <div class="filter-group">
                        <h3 class="filter-title">
                            @if (session()->get('language') == 'bangla')
                                ব্র্যান্ড
                            @else
                                Brands
                            @endif
                        </h3>
                        @foreach (get_brands() as $brand)
                            <div class="category-item">
                                <input type="checkbox" id="brand_{{ $brand->id }}" name="brand[]"
                                    value="{{ $brand->name_en }}"
                                    @isset($_GET['brand']){{ in_array($brand->name_en, $_GET['brand']) ? 'checked' : '' }}@endisset>
                                <label for="brand_{{ $brand->id }}">
                                    <span>{{ session()->get('language') == 'bangla' ? $brand->name_bn : $brand->name_en }}</span>
                                    <span class="category-badge">{{ count(get_brand_products($brand->id)) }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Price Filter -->
                    <div class="filter-group">
                        <h3 class="filter-title">
                            @if (session()->get('language') == 'bangla')
                                মূল্য দ্বারা ফিল্টার
                            @else
                                Price Range
                            @endif
                        </h3>
                        <div class="price-inputs">
                            <div class="price-input">
                                <label>{{ session()->get('language') == 'bangla' ? 'সর্বনিম্ন' : 'Min Price' }}</label>
                                <input type="number" name="min_price" placeholder="৳0"
                                    value="@isset($_GET['min_price']){{ $_GET['min_price'] }}@endisset">
                            </div>
                            <div class="price-input">
                                <label>{{ session()->get('language') == 'bangla' ? 'সর্বোচ্চ' : 'Max Price' }}</label>
                                <input type="number" name="max_price" placeholder="৳999999"
                                    value="@isset($_GET['max_price']){{ $_GET['max_price'] }}@endisset">
                            </div>
                        </div>
                        <button type="submit" class="filter-btn">
                            <i class="fa fa-filter"></i> {{ session()->get('language') == 'bangla' ? 'ফিল্টার প্রয়োগ করুন' : 'Apply Filters' }}
                        </button>
                    </div>
                </form>
            </aside>

            <!-- Products Section -->
            <main class="products-section">
                <!-- Products Header -->
                @if(count($products) > 0)
                <div class="products-header">
                    <div class="products-count">
                        <strong>{{ $products->total() }}</strong> {{ session()->get('language') == 'bangla' ? 'পণ্য পাওয়া গেছে' : 'Products Found' }}
                    </div>
                </div>
                @endif

                <!-- Products Grid -->
                @if(count($products) > 0)
                    <div class="product-grid">
                        @foreach ($products as $product)
                            @php $data = calculateDiscount($product->id) @endphp
                            @if ($data['discount'] >= $min_price && $data['discount'] <= $max_price)
                                <div class="product-card">
                                    <a href="{{ route('product.details', $product->slug) }}" style="text-decoration: none; color: inherit;">
                                        <div class="product-image">
                                            <img src="{{ asset($product->product_thumbnail) }}"
                                                alt="{{ $product->name_en }}">
                                            @if ($product->stock_qty > 0)
                                                <span class="product-badge">
                                                    @if (session()->get('language') == 'bangla')
                                                        স্টকে
                                                    @else
                                                        SALE
                                                    @endif
                                                </span>
                                            @endif
                                        </div>
                                    </a>

                                    <div class="product-details">
                                        <h3 class="product-name">
                                            @if (session()->get('language') == 'bangla')
                                                {!! Str::limit($product->name_bn, 35) !!}
                                            @else
                                                {!! Str::limit($product->name_en, 35) !!}
                                            @endif
                                        </h3>

                                        <div class="product-footer">
                                            <div class="price-section">
                                                <span class="product-price">৳{{ $data['discount'] }}</span>
                                                <span class="product-old-price">৳{{ $product->regular_price }}</span>
                                            </div>

                                            <div class="action-buttons">
                                                @if ($product->stock_qty > 0)
                                                    @if (Auth::check() && Auth::user()->role == '5')
                                                        <button onclick="wholesellerAlert()" class="btn-add-cart" style="flex: 1;">
                                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add Cart' }}
                                                        </button>
                                                    @else
                                                        @if ($product->is_varient == 1)
                                                            <button onclick="productView({{ $product->id }})"
                                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                                class="btn-add-cart" style="flex: 1;">
                                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add Cart' }}
                                                            </button>
                                                        @else
                                                            <input type="hidden" id="pfrom" value="direct">
                                                            <input type="hidden" id="product_product_id"
                                                                value="{{ $product->id }}" min="1">
                                                            <input type="hidden" id="{{ $product->id }}-product_pname"
                                                                value="{{ $product->name_en }}">

                                                            <button onclick="addToCartDirect({{ $product->id }})"
                                                                class="btn-add-cart" style="flex: 1;">
                                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add Cart' }}
                                                            </button>
                                                        @endif
                                                    @endif
                                                @else
                                                    <div class="out-of-stock">
                                                        {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $products->onEachSide(5)->links() }}
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">📦</div>
                        <h4 class="empty-title">{{ session()->get('language') == 'bangla' ? 'কোন পণ্য পাওয়া যায়নি' : 'No Products Found' }}</h4>
                        <p class="empty-text">{{ session()->get('language') == 'bangla' ? 'আপনার ফিল্টার মেলে এমন কোন পণ্য খুঁজে পাওয়া যায়নি।' : 'No products matching your filters.' }}</p>
                    </div>
                @endif
            </main>
        </div>
    </div>

    @include('FrontEnd.include.cart-contianer')
@endsection

@push('js')
    <script>
        // Filter Sidebar Toggle
        document.getElementById('filterToggleBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('filterSidebar');
            sidebar.classList.toggle('active');
            const lang = "{{ session()->get('language') }}";
            this.textContent = sidebar.classList.contains('active') ? 
                (lang === 'bangla' ? '✕ ফিল্টার লুকান' : '✕ Hide Filters') : 
                (lang === 'bangla' ? '☰ ফিল্টার' : '☰ Show Filters');
        });

        document.getElementById('filterCloseBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('filterSidebar');
            sidebar.classList.remove('active');
            const lang = "{{ session()->get('language') }}";
            document.getElementById('filterToggleBtn').textContent = lang === 'bangla' ? '☰ ফিল্টার' : '☰ Show Filters';
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('filterSidebar');
            const toggleBtn = document.getElementById('filterToggleBtn');
            if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('active');
                const lang = "{{ session()->get('language') }}";
                toggleBtn.textContent = lang === 'bangla' ? '☰ ফিল্টার' : '☰ Show Filters';
            }
        });

        function addToCart() {
            var total_attributes = parseInt($('#total_attributes').val());
            //alert(total_attributes);
            var checkNotSelected = 0;
            var checkAlertHtml = '';
            for (var i = 1; i <= total_attributes; i++) {
                var checkSelected = parseInt($('#attribute_check_' + i).val());
                if (checkSelected == 0) {
                    checkNotSelected = 1;
                    checkAlertHtml +=
                        `<div class="attr-detail mb-5">
                                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                                            <div>
                                                                                <i class="fa fa-warning mr-10"></i> <span> Select ` +
                        $('#attribute_name_' + i).val() + `</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>`;
                }
            }
            if (checkNotSelected == 1) {
                $('#qty_alert').html('');
                //$('#attribute_alert').html(checkAlertHtml);
                $('#attribute_alert').html(`<div class="attr-detail mb-5">
                                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                                            <div>
                                                                                <i class="fa fa-warning mr-10"></i> <span> Select all attributes</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>`);
                return false;
            }
            $('.size-filter li').removeClass("active");
            var product_name = $('#pname').val();
            var id = $('#product_id').val();
            var price = $('#product_price').val();
            var color = $('#color option:selected').val();
            var size = $('#size option:selected').val();
            var quantity = $('#qty').val();
            var varient = $('#pvarient').val();

            var min_qty = parseInt($('#minimum_buy_qty').val());
            if (quantity < min_qty) {
                $('#attribute_alert').html('');
                $('#qty_alert').html(
                    `<div class="attr-detail mb-5">
                                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                                            <div>
                                                                                <i class="fa fa-warning mr-10"></i> <span> Minimum quantity ` +
                    min_qty + ` required.</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>`);
                return false;
            }
            // console.log(min_qty);
            var p_qty = parseInt($('#stock_qty').val());
            // if(quantity > p_qty){
            //     $('#stock_alert').html(`<div class="attr-detail mb-5">
        // 								<div class="alert alert-danger d-flex align-items-center" role="alert">
        // 									<div>
        // 										<i class="fa fa-warning mr-10"></i> <span> Not enough stock.</span>
        // 									</div>
        // 								</div>
        // 							</div>`);
            //     return false;
            // }


            // alert(varient);

            var options = $('#choice_form').serializeArray();
            var jsonString = JSON.stringify(options);
            //console.log(options);

            // Start Message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 1200
            });

            $.ajax({
                type: 'POST',
                url: '/cart/data/store/' + id,
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    product_price: price,
                    product_varient: varient,
                    options: jsonString,
                },
                success: function(data) {
                    // console.log(data);
                    miniCart();
                    $('#closeModel').click();

                    // Start Sweertaleart Message
                    if ($.isEmptyObject(data.error)) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200
                        })

                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                        $('#qty').val(min_qty);
                        $('#pvarient').val('');

                        for (var i = 1; i <= total_attributes; i++) {
                            $('#attribute_check_' + i).val(0);
                        }

                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1200
                        })

                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                        $('#qty').val(min_qty);
                        $('#pvarient').val('');

                        for (var i = 1; i <= total_attributes; i++) {
                            $('#attribute_check_' + i).val(0);
                        }
                    }
                    // Start Sweertaleart Message
                    var buyNowCheck = $('#buyNowCheck').val();
                    //alert(buyNowCheck);
                    if (buyNowCheck && buyNowCheck == 1) {
                        $('#buyNowCheck').val(0);
                        window.location = '/checkout';
                    }

                }
            });
        }


        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {

                    miniCart();
                    cart();

                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }

        // Filter Sidebar Toggle
        document.getElementById('filterToggleBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('filterSidebar');
            sidebar.classList.toggle('active');
            const lang = "{{ session()->get('language') }}";
            this.textContent = sidebar.classList.contains('active') ? 
                (lang === 'bangla' ? '✕ ফিল্টার লুকান' : '✕ Hide Filters') : 
                (lang === 'bangla' ? '☰ ফিল্টার' : '☰ Show Filters');
        });

        document.getElementById('filterCloseBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('filterSidebar');
            sidebar.classList.remove('active');
            const lang = "{{ session()->get('language') }}";
            document.getElementById('filterToggleBtn').textContent = lang === 'bangla' ? '☰ ফিল্টার' : '☰ Show Filters';
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('filterSidebar');
            const toggleBtn = document.getElementById('filterToggleBtn');
            if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('active');
                const lang = "{{ session()->get('language') }}";
                toggleBtn.textContent = lang === 'bangla' ? '☰ ফিল্টার' : '☰ Show Filters';
            }
        });

        function wholesellerAlert() {
            Swal.fire({
                icon: 'info',
                title: 'You are a Wholeseller!',
                text: 'Please go to your dashboard to manage orders.',
                showCancelButton: true,
                confirmButtonText: 'Go to Dashboard',
                cancelButtonText: 'Close',
                confirmButtonColor: '#003E32',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('wholeseller.dashboard') }}";
                }
            });
        }
    </script>
@endpush
