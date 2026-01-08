@extends('FrontEnd.master')

@section('title', 'All Categories')
<style>
    :root {
        --primary: #FF6200;
        --primary-light: #FF8A47;
        --primary-dark: #CC4E00;
        --dark: #333333;
        --gray: #777777;
        --light-gray: #F5F5F5;
        --white: #FFFFFF;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Breadcrumb */
    .breadcrumb-section {
        background-color: var(--light-gray);
        padding: 20px 0;
        margin-bottom: 30px;
    }

    .breadcrumb-section p {
        color: var(--dark);
        font-size: 14px;
    }

    .breadcrumb-section a {
        color: var(--primary);
        text-decoration: none;
        transition: color 0.3s;
    }

    .breadcrumb-section a:hover {
        color: var(--primary-dark);
    }

    /* Section Title */
    .section-title {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-title h2 {
        font-size: 32px;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .section-title p {
        color: var(--gray);
        max-width: 600px;
        margin: 0 auto;
    }

    /* Categories Grid */
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .category-card {
        background-color: var(--white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .category-header {
        padding: 20px;
        background-color: var(--white);
    }

    .category-header a {
        display: flex;
        align-items: center;
        gap: 15px;
        text-decoration: none;
        color: inherit;
    }

    .category-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #eee;
        flex-shrink: 0;
    }

    .category-header h4 {
        font-size: 18px;
        color: var(--dark);
        margin: 0;
    }

    /* Subcategories */
    .subcategories-section {
        padding: 20px;
        padding-top: 0;
    }

    .subcategories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
    }

    .subcategory-card {
        background-color: var(--light-gray);
        border-radius: 6px;
        overflow: hidden;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .subcategory-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .subcategory-card a {
        display: block;
        text-decoration: none;
        color: inherit;
    }

    .subcategory-img {
        height: 100px;
        overflow: hidden;
    }

    .subcategory-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .subcategory-content {
        padding: 10px;
    }

    .subcategory-content h6 {
        font-size: 13px;
        color: var(--dark);
        margin: 0 0 8px 0;
        word-break: break-word;
    }

    /* Sub-subcategories List */
    .subsubcategories-list {
        margin-top: 10px;
        padding-left: 15px;
        list-style: none;
    }

    .subsubcategories-list li {
        margin-bottom: 6px;
        font-size: 13px;
    }

    .subsubcategories-list a {
        color: var(--primary);
        text-decoration: none;
        transition: color 0.3s;
    }

    .subsubcategories-list a:hover {
        color: var(--primary-dark);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .section-title h2 {
            font-size: 26px;
        }

        .categories-grid {
            grid-template-columns: 1fr;
        }

        .subcategories-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 576px) {
        .category-header a {
            flex-direction: column;
            align-items: flex-start;
        }

        .subcategories-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .breadcrumb-section p {
            font-size: 12px;
        }
    }
</style>

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container d-flex">
            <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">All Categories</p>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Section Title -->
    <div class="container">
        <div class="section-title">
            <h2>All Categories</h2>
            <p>Browse through our complete collection of product categories</p>
        </div>
    </div>

    <!-- Categories Section Start -->
    <section class="container categories-grid">
        @foreach($categories as $category)
            <div class="category-card">
                <!-- Category Header -->
                <div class="category-header">
                    <a href="{{ route('product.category', $category->slug) }}">
                        {{-- <img src="{{ asset($category->image) }}" alt="{{ $category->name_en }}" class="category-img"> --}}
                        <h4>
                            @if(session()->get('language') == 'bangla')
                                {{ $category->name_bn }}
                            @else
                                {{ $category->name_en }}
                            @endif
                        </h4>
                    </a>
                </div>

                <!-- Subcategories -->
                @if($category->sub_categories && $category->sub_categories->count() > 0)
                    <div class="subcategories-section">
                        <div class="subcategories-grid">
                            @foreach($category->sub_categories as $subcategory)
                                <div class="subcategory-card">
                                    <a href="{{ route('product.category', $subcategory->slug) }}">
                                        <div class="subcategory-img">
                                            <img src="{{ asset($subcategory->image) }}" alt="{{ $subcategory->name_en }}">
                                        </div>
                                        <div class="subcategory-content">
                                            <h6>
                                                @if(session()->get('language') == 'bangla')
                                                    {{ $subcategory->name_bn }}
                                                @else
                                                    {{ $subcategory->name_en }}
                                                @endif
                                            </h6>
                                        </div>
                                    </a>

                                    <!-- Sub-Subcategories -->
                                    @if($subcategory->sub_sub_categories && $subcategory->sub_sub_categories->count() > 0)
                                        <ul class="subsubcategories-list">
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
                    </div>
                @endif
            </div>
        @endforeach
    </section>
    <!-- Categories Section End -->

    @include('FrontEnd.include.cart-contianer')
@endsection