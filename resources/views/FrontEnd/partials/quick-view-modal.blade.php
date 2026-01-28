<style>
    /* Quick-Show Modal (unique names prefixed qs-) */
    .qs-modal .qs-dialog {
        max-width: 920px;
    }

    .qs-modal .qs-content {
        border-radius: 14px;
        overflow: hidden;
        border: 0;
        box-shadow: 0 18px 50px rgba(0, 0, 0, 0.12);
        background: #fff;
        font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    .qs-close {
        position: absolute;
        right: 18px;
        top: 14px;
        z-index: 10;
    }

    .qs-grid {
        gap: 20px;
        display: flex;
        flex-wrap: wrap;
    }

    .qs-gallery {
        width: 40%;
    }

    .qs-info {
        width: 60%;
    }

    .qs-gallery img {
        width: 100%;
        border-radius: 10px;
    }

    .qs-info {
        flex: 1 1 48%;
        padding: 26px 28px;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .qs-title {
        font-weight: 700;
        color: #111;
        font-size: 1.15rem;
        margin-bottom: 4px;
    }

    .qs-price-row {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .qs-price {
        color: #0a1501;
        font-weight: 800;
        font-size: 1.55rem;
    }

    .qs-oldprice {
        color: #9aa0a6;
        font-size: 0.95rem;
        margin-left: 6px;
        text-decoration: line-through;
    }

    .qs-meta {
        color: #555;
        font-size: 0.92rem;
        margin-top: 6px;
    }

    .qs-badge {
        padding: 4px 15px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .qs-available {
        background: #0c1b01;
        color: #fff;
        display: inline-block;
    }

    .qs-out {
        background: #ff6b6b;
        color: #fff;
        display: inline-block;
    }

    /* Weight select styled like a pill button */
    .qs-attr-row {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
        margin: 6px 0 10px 0;
    }

    .qs-select-wrap {
        position: relative;
        display: inline-block;
    }

    .qs-select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: 2px solid #7CBF4A;
        background: #fff;
        padding: 10px 16px;
        border-radius: 999px;
        min-width: 150px;
        font-weight: 700;
        color: #1b1b1b;
        cursor: pointer;
        box-shadow: 0 6px 18px rgba(124, 191, 74, 0.06);
    }

    .qs-select:focus {
        outline: none;
        box-shadow: 0 0 0 6px rgba(124, 191, 74, 0.08);
    }

    .qs-select-wrap::after {
        content: "▾";
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #7CBF4A;
        pointer-events: none;
        font-weight: 700;
    }

    .qs-qty {
        display: flex;
        gap: 8px;
        align-items: center;
        margin-top: 6px;
    }

    .qs-qty button {
        background: #f4f6f8;
        border: 0;
        padding: 8px 10px;
        border-radius: 8px;
        color: #7CBF4A;
        cursor: pointer;
    }

    .qs-qty input {
        width: 100px;
        border-radius: 8px;
        padding: 8px 10px;
        text-align: center;
        border: 1px solid #e6e9ec;
    }

    /* Action area (keeps button classnames/id unchanged) */
    .qs-actions {
        margin-top: auto;
        display: flex;
        gap: 12px;
        align-items: center;
        justify-content: flex-start;
    }

    /* style wrappers so button classnames remain but visually updated */
    .qs-actions .add_to_cart {
        background: linear-gradient(180deg, #0b1801, #112501);
        border: 0;
        color: #fff;
        padding: 10px 16px;
        border-radius: 10px;
        font-weight: 700;
    }

    .qs-actions .buy_now {
        background: transparent;
        border: 2px solid #091401;
        color: #091401;
        padding: 10px 16px;
        border-radius: 10px;
        font-weight: 700;
    }

    @media (max-width:767px) {
        .qs-gallery {
            width: 100%;
        }

        .qs-info {
            width: 100%;
        }

        .qs-modal .qs-dialog {
            max-width: 95%;
        }

        .qs-info {
            padding: 5px 10px;
            margin-bottom: 50px;
        }
    }
</style>
<style>
    .text-heading {
        font-weight: 600;
        color: #000000;
        font-size: 33px;
    }

    /* Weight / attribute radio pills */
    .list-filter.size-filter {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    /* label wrapper for each radio option */
    .radio-inline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 5px 20px;
        border-radius: 30px;
        border: 2px solid #E6E9EC;
        background: #ffffff;
        color: #222;
        font-weight: 700;
        cursor: pointer;
        transition: all .15s ease;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
        user-select: none;
        margin: 0;
    }

    /* hide native radio input */
    .radio-inline input[type="radio"] {
        display: none;
    }

    /* active / selected state */
    .radio-inline.active {
        background: linear-gradient(180deg, #0c1a01, #132b01);
        color: #fff;
        border-color: #0a1501;
        box-shadow: 0 10px 30px rgba(124, 191, 74, 0.14);
        transform: translateY(-1px);
    }

    /* hover / focus */
    .radio-inline:hover {
        transform: translateY(-2px);
    }

    .radio-inline:focus-within {
        outline: none;
        box-shadow: 0 0 0 6px rgba(124, 191, 74, 0.08);
    }

    /* small value text */
    .radio-inline small {
        font-weight: 600;
        opacity: 0.95;
    }

    /* make attribute container visually distinct */
    .qs-attr-row {
        margin: 8px 0 14px 0;
    }

    /* ensure mobile: wrapping looks good */
    @media (max-width: 576px) {
        .radio-inline {
            padding: 8px 10px;
            font-size: 14px;
        }
    }
</style>

<style>
    .product-image-thumbs {
        overflow-x: auto;
        padding: 10px 0;
        display: flex;
        gap: 10px;
        scrollbar-width: thin;
    }

    .product-thumb-item {
        min-width: 80px;
        height: 80px;
        border-radius: 8px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.2s;
        opacity: 0.8;
    }

    .product-thumb-item:hover {
        transform: translateY(-2px);
        opacity: 1;
    }

    .product-thumb-item.active {
        border-color: #7CBF4A;
        opacity: 1;
    }

    .product-thumb-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 6px;
    }

    /* Hide scrollbar for Chrome/Safari/Opera */
    .product-image-thumbs::-webkit-scrollbar {
        height: 4px;
    }

    .product-image-thumbs::-webkit-scrollbar-track {
        background: #f1f1f1;

    }

    .product-image-thumbs::-webkit-scrollbar-thumb {
        background: #7CBF4A;
        border-radius: 10px;
    }
</style>


<div class="modal qs-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered qs-dialog">
        <div class="modal-content qs-content">
            <button type="button" class="btn-close qs-close" data-bs-dismiss="modal" aria-label="Close"
                id="closeModel"></button>

            <div class="modal-body">
                <div class="qs-grid">
                    <div class="qs-gallery position-relative">
                        <img id="pimage" src="" alt="product image">

                        <div class="product-image-thumbs d-flex gap-2">
                            <!-- Thumbnails will be dynamically added here -->
                        </div>
                        <div style="margin-left:auto; text-align:right; " class="position-absolute top-0 right-0">
                            <span id="pavailable" class="qs-badge qs-available" style="display:none;">
                                {{ session()->get('language') == 'bangla' ? 'স্টকে আছে' : 'Available' }}
                            </span>
                            <span id="pstockout" class="qs-badge qs-out" style="display:none;">
                                {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Stock Out' }}
                            </span>
                        </div>
                    </div>

                    <div class="qs-info">
                        <h3 class="qs-title"><a id="product_name" href="#" class="text-heading"></a></h3>

                        <div class="qs-price-row">
                            <div>
                                <span class="qs-price">৳ <span id="pprice"></span></span>
                                <span class="qs-oldprice" id="oldprice">৳</span>
                            </div>

                        </div>
                        <form id="choice_form">
                            <div id="attributes" class="qs-attr-row">
                            </div>
                            <div id="attribute_alert"></div>
                        </form>

                        <div class="qs-meta">
                            <div>
                                <strong>{{ session()->get('language') == 'bangla' ? 'ক্যাটাগোরি' : 'Category' }}:</strong>
                                <span id="pcategory" class="text-brand"></span>
                            </div>
                        </div>
                        <div style="font-weight:600;">
                            <strong>
                                {{ session()->get('language') == 'bangla' ? 'পরিমাণ' : 'Quantity' }}:
                            </strong>
                        </div>

                        <div class="qs-qty">

                            <button class="qty-down" style="width:50px" type="button">
                                <i class="fa fa-minus text-dark" aria-hidden="true"></i>
                            </button>
                            <input type="number" name="quantity" class="qty-val " id="qty" min="1"
                                value="1">

                            <button class="qty-up" style="width:50px" type="button">
                                <i class="fa fa-plus text-dark" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div id="qty_stock_alert" style="margin-top:8px;"></div>

                        <div class="qs-actions">
                            <input type="hidden" id="product_id">
                            <input type="hidden" id="pname">
                            <input type="hidden" id="product_price">
                            <input type="hidden" id="discount_amount">
                            <input type="hidden" id="pfrom" value="modal">
                            <input type="hidden" id="pvarient" value="">
                            <input type="hidden" id="minimum_buy_qty" value="">
                            <input type="hidden" id="stock_qty" value="">
                            <input type="hidden" id="buyNowCheck" value="0">

                            <button type="button" style="white-space:nowrap; color: white !important;"
                                class=" btn button button-add-to-cart add_to_cart" onclick="test()">
                                <i class="fi-rs-shopping-cart"></i>
                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                            </button>

                            <button class="like btn button button-add-to-cart buy_now" onclick="buyProduct()">
                                <i class="fi-rs-shopping-cart"></i>
                                {{ session()->get('language') == 'bangla' ? 'এখুনি কিনুন' : 'Buy Now' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
