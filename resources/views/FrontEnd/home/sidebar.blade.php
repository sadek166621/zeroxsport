<style>
    /* Side Menu Specific Styles */
    .category-sidemenu {
        background: linear-gradient(to right, #003D32, #036B47);
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 61, 50, 0.2);
        overflow: visible;
    }

    .category-sidemenu-title {
        color: white;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0 10px;
    }

    .category-sidemenu-title i {
        font-size: 22px;
    }

    .category-sidemenu ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .category-sidemenu>ul {
        max-height: calc(100vh - 20px) !important;
        overflow-y: auto;
        overflow-x: hidden;
        padding-right: 5px;
    }

    .category-sidemenu>ul::-webkit-scrollbar {
        width: 6px;
    }

    .category-sidemenu>ul::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .category-sidemenu>ul::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.4);
        border-radius: 10px;
    }

    .category-sidemenu>ul::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.6);
    }

    .category-sidemenu li {
        position: relative;
    }

    .category-sidemenu>ul>li {
        padding: 8px 10px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.3s ease;
        background-color: rgba(255, 255, 255, 0.08);
        border-radius: 6px;
    }

    .category-sidemenu>ul>li:hover {
        background-color: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.6);
        transform: translateX(8px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .category-sidemenu>ul>li.active {
        background-color: rgba(255, 255, 255, 0.2);
        border-color: white;
        font-weight: bold;
    }

    .category-sidemenu li a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
        font-weight: 500;
        text-decoration: none;
        font-size: 15px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .category-sidemenu>ul>li:hover a {
        font-weight: 600;
    }

    .category-sidemenu li a img {
        font-size: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        object-fit: cover;
    }

    .category-sidemenu li a span.arrow {
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    /* Dropdown Styles */
    .category-sidemenu .dropdown>ul {
        display: none;
        position: absolute;
        left: 100%;
        top: 0;
        background: white;
        min-width: 250px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        border-radius: 6px;
        padding: 8px;
        margin-left: 10px;
    }

    .category-sidemenu .dropdown:hover>ul {
        display: block;
    }

    .category-sidemenu .dropdown ul li {
        padding: 8px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .category-sidemenu .dropdown ul li:hover {
        background-color: rgba(255, 98, 0, 0.1);
    }

    .category-sidemenu .dropdown ul li a {
        color: #333;
        font-size: 14px;
        font-weight: 500;
    }

    .category-sidemenu .dropdown ul li:hover a {
        color: #ff6200;
    }

    .category-sidemenu .dropdown_two>ul {
        left: 100%;
        top: 0;
        margin-left: 10px;
    }

    /* Tablet - 1024px and below */
    @media (max-width: 1024px) {
        .category-sidemenu {
            width: 100%;
        }

        .category-sidemenu>ul {
            flex-direction: row;
            flex-wrap: wrap;
            overflow-y: visible;
            max-height: none;
        }

        .category-sidemenu>ul>li {
            flex: 1;
            min-width: 150px;
            justify-content: center;
        }
    }

    /* Mobile - 768px and below */
    @media (max-width: 768px) {
        .category-sidemenu>ul>li {
            min-width: 120px;
            padding: 10px 12px;
            font-size: 14px;
        }

        .category-sidemenu li a img {
            font-size: 16px;
            width: 24px;
            height: 24px;
        }

        .category-sidemenu-title {
            font-size: 16px;
        }

        .category-sidemenu li a {
            font-size: 14px;
        }
    }

    /* Extra Small Mobile - 520px and below */
    @media (max-width: 520px) {
        .category-sidemenu {
            display: none;
        }
    }

    /* Legacy media query support */
    @media (min-width: 691px) and (max-width: 892px) {
        .category-sidemenu ul {
            font-size: 14px;
        }
    }
</style>

<div class="category-sidemenu">
    <div class="category-sidemenu-title">
        <i class="fas fa-th-large"></i>
        @if (session()->get('language') == 'bangla')
        ক্যাটাগোরি
        @else
        Categories
        @endif
    </div>
    <ul>
        @foreach ($categories as $category)
        @if ($category->type == 1)
        @php $parent = $category->id @endphp
        <li class="dropdown {{ $loop->first ? 'active' : '' }}">
            <a href="{{ route('product.category', $category->slug) }}">
                {{-- <img src="{{ asset($category->icon) }}" alt="{{ $category->name_en }}"> --}}
                <span>
                    @if (session()->get('language') == 'bangla')
                    {{ $category->name_bn }}
                    @else
                    {{ $category->name_en }}
                    @endif
                </span>
                @php $child = findChildCategory($category->id) @endphp
                @if (count($child) > 0)
                <span class="arrow"><i class="fa fa-angle-right"></i></span>
                @endif
            </a>
            @if (count($child) > 0)
            <ul>
                @foreach ($child as $subcategory)
                @if ($subcategory->parent_id == $category->id)
                <li class="dropdown_two">
                    <a href="{{ route('product.category', $subcategory->slug) }}">
                        @if (session()->get('language') == 'bangla')
                        {{ $subcategory->name_bn }}
                        @else
                        {{ $subcategory->name_en }}
                        @endif
                        @php $child2 = findChildCategory($subcategory->id) @endphp
                        @if (count($child2) > 0)
                        <span class="arrow"><i class="fa fa-angle-right"></i></span>
                        @endif
                    </a>
                    @if (count($child2) > 0)
                    <ul>
                        @foreach ($child2 as $childSubCategory)
                        <li>
                            <a href="{{ route('product.category', $childSubCategory->slug) }}">
                                @if (session()->get('language') == 'bangla')
                                {{ $childSubCategory->name_bn }}
                                @else
                                {{ $childSubCategory->name_en }}
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endif
                @endforeach
            </ul>
            @endif
        </li>
        @endif
        @endforeach
    </ul>
</div>