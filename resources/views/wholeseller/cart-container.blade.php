 <!-- Wholeseller Cart Overlay & Sidebar -->
    <div id="wholesellerCartOverlay" class="cart-overlay" aria-hidden="true"></div>

    <div id="wholesellerCartSidebar" class="sidebar" role="dialog" aria-label="Wholeseller Cart" aria-hidden="true">
        <div class="sidebar-header">
            <h2>Wholesale Cart</h2>
            <button id="closeWholesellerSidebar" class="close-btn" aria-label="Close sidebar">&times;</button>
        </div>

        <div class="sidebar-body" id="wholesellerCartItemsList">
            <div style="padding:18px; text-align:center; color:#6b6b6b;">
                Your wholesale cart is currently empty.
            </div>
        </div>

        <div class="sidebar-footer">
            <div class="d-flex justify-content-between align-items-center mb-3 fw-bold">
                <div>Subtotal:</div>
                <div id="wholesellerCartSubtotal">৳0.00</div>
            </div>

            <a href="{{ route('wholeseller.checkout') }}" class="checkout-btn btn btn-success w-100 mb-2">
                Proceed to Checkout
            </a>
            <a href="{{ route('wholeseller.cart.show') }}" class="btn btn-secondary w-100">
                Go To Cart
            </a>
        </div>
    </div>


<style>
    /* Replace the old .sidebar CSS block with overlay + improved sidebar styles */
    .cart-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        opacity: 0;
        visibility: hidden;
        transition: opacity 260ms ease, visibility 260ms;
        z-index: 1000;
    }

    .cart-overlay.open {
        opacity: 1;
        visibility: visible;
    }

    .sidebar {
        position: fixed;
        top: 0;
        right: -420px;
        /* hidden by default */
        width: 380px;
        max-width: calc(100% - 32px);
        height: 100%;
        background-color: #ffffff;
        box-shadow: -12px 0 30px rgba(0, 0, 0, 0.15);
        transition: right 320ms cubic-bezier(.2, .9, .2, 1);
        z-index: 1000;
        display: flex;
        flex-direction: column;
        border-radius: 8px 0 0 8px;
        overflow: hidden;
    }

    .sidebar.open {
        right: 0;
    }

    .sidebar-header {
        background: #01B45E;
        color: #fff;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .sidebar-header h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 500;
        color: #f2f2f2;
    }

    .sidebar .close-btn {
        background: transparent;
        border: 0;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        line-height: 1;
    }

    .sidebar-body {
        padding: 14px;
        overflow-y: auto;
        flex: 1;
    }

    .sidebar-footer {
        padding: 14px;
        border-top: 1px solid #f2f2f2;
        background: #fff;
    }

    .cart-item {
        display: flex;
        gap: 10px;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #f6f6f6;
    }

    .cart-item img {
        width: 56px;
        height: 56px;
        object-fit: cover;
        border-radius: 6px;
    }

    .cart-item .meta {
        flex: 1;
    }

    .cart-item .title {
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }

    .cart-item .qty {
        font-size: 13px;
        color: #666;
        margin-top: 6px;
    }

    .cart-item .price {
        font-weight: 600;
        color: #01B45E;
        min-width: 70px;
        text-align: right;
    }

    .checkout-btn {
        width: 100%;
        background: #01B45E;
        color: #fff;
        border: 0;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }

    .checkout-btn:hover {
        background: #02904b;
        color: #fff;
    }

    .secondary-btn {
        width: 100%;
        background: #ff2a7a;
        color: #fff;
        border: 0;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 8px;
    }

    .secondary-btn:hover {
        background: #b50448;
        color: #fff;
    }

    @media (max-width:480px) {
        .sidebar {
            width: 100%;
            right: -100%;
            border-radius: 0;
        }

        .sidebar.open {
            right: 0;
        }
    }

    .product_card {
        background: #fff;
        border: 2px solid #01B45E;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(1, 180, 94, 0.08);
        transition: box-shadow 0.2s, border-color 0.2s;
        padding: 0;
        position: relative;
        overflow: hidden;
        display: flex;
        gap: 10px;
        align-items: start;
    }

    .product-details-title {
        font-size: 16px;
        font-weight: 500;
        line-height: 1.5;
        color: #4a4a4a !important;
    }
</style>