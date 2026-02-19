<!-- Cart Overlay & Sidebar -->
<div id="cartOverlay" class="cart-overlay" aria-hidden="true"></div>

<div id="cartSidebar" class="sidebar" role="dialog" aria-label="Shopping Cart" aria-hidden="true">
    <div class="sidebar-header">
        <h2>{{ session()->get('language') == 'bangla' ? 'শপিং কার্ট' : 'Shopping Cart' }}</h2>
        <button id="closeSidebar" class="close-btn" aria-label="Close sidebar">&times;</button>
    </div>

    <div class="sidebar-body" id="cartItemsList">
        <div style="padding:24px; text-align:center; color:#999;">
            {{ session()->get('language') == 'bangla' ? 'আপনার কার্ট বর্তমানে খালি।' : 'Your cart is currently empty.' }}
        </div>
    </div>

    <div class="sidebar-footer">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; font-weight:600; font-size:15px;">
            <div>{{ session()->get('language') == 'bangla' ? 'সাবটোটাল:' : 'Subtotal:' }}</div>
            <div id="cartSubtotal" style="color:#026142; font-size:18px;">৳0.00</div>
        </div>
        <a href="javascript:void(0);"
            id="checkoutButtonSidebar"
            onclick="openCheckout()"
            class="checkout-btn btn">
            {{ session()->get('language') == 'bangla' ? 'অর্ডার করতে ক্লিক করুন' : 'Proceed to Checkout' }}
        </a>


        <a href="{{ route('cart.show') }}" id="reserveButton" class="secondary-btn btn">
            {{ session()->get('language') == 'bangla' ? 'কার্ডে দেখুন' : 'Go To Cart' }}
        </a>
    </div>
</div>
<style>
    .add_to_cart {
        background-color: #ffffff;
        border: 2px solid #026142;
        border-radius: 6px;
        color: #026142 !important;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .add_to_cart:hover {
        background-color: #026142 !important;
        color: #ffffff !important;
    }

    .cart-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
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
        width: 400px;
        max-width: calc(100% - 20px);
        height: 100%;
        background-color: #ffffff;
        box-shadow: -8px 0 40px rgba(2, 97, 66, 0.12);
        transition: right 320ms cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 1001;
        display: flex;
        flex-direction: column;
        border-radius: 0;
        overflow: hidden;
    }

    .sidebar.open {
        right: 0;
    }

    .sidebar-header {
        background: linear-gradient(135deg, #026142 0%, #034d34 100%);
        color: #fff;
        padding: 20px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .sidebar-header h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 600;
        color: #ffffff;
        letter-spacing: 0.3px;
    }

    .sidebar .close-btn {
        background: rgba(255, 255, 255, 0.2);
        border: 0;
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        line-height: 1;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background 0.3s ease;
    }

    .sidebar .close-btn:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .sidebar-body {
        padding: 16px;
        overflow-y: auto;
        flex: 1;
        background-color: #fafafa;
    }

    .sidebar-body::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-body::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar-body::-webkit-scrollbar-thumb {
        background: #d0d0d0;
        border-radius: 3px;
    }

    .sidebar-body::-webkit-scrollbar-thumb:hover {
        background: #026142;
    }

    .sidebar-footer {
        padding: 20px;
        border-top: 1px solid #e8e8e8;
        background: #ffffff;
        box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.04);
    }

    .cart-item {
        display: flex;
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
        padding: 12px;
        border-radius: 8px;
        background: #ffffff;
        margin-bottom: 10px;
        border: 1px solid #e8e8e8;
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        border-color: #026142;
        box-shadow: 0 4px 12px rgba(2, 97, 66, 0.1);
    }

    .cart-item img {
        width: 56px;
        height: 56px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #f0f0f0;
        flex-shrink: 0;
    }

    .cart-item .title {
        font-size: 13px;
        font-weight: 600;
        color: #222;
        margin-bottom: 2px;
        line-height: 1.4;
    }

    .cart-item .price {
        font-weight: 700;
        color: #026142;
        font-size: 14px;
    }

    .cart-item .remove-btn {
        padding: 4px 6px;
        background: transparent;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .cart-item .remove-btn i {
        color: #026142;
        font-size: 14px;
    }

    .cart-item .remove-btn:hover i {
        color: #d32f2f;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        background: #f8f9fa;
        border-radius: 30px;
        padding: 2px 6px;
        width: fit-content;
        border: 1px solid #e0e0e0;
    }

    .qty-btn-mini {
        background: #026142;
        border: none;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        padding: 0;
    }

    .qty-btn-mini:hover {
        background: #019950;
    }

    .qty-btn-mini:disabled {
        background: #f5f5f5;
        cursor: not-allowed;
    }

    .qty-input-mini {
        width: 32px;
        text-align: center;
        font-size: 12px;
        font-weight: 700;
        color: #2D3142;
        border: none;
        background: transparent;
        margin: 0 2px;
        padding: 0;
    }

    .checkout-btn {
        width: 100%;
        background: linear-gradient(135deg, #026142 0%, #034d34 100%);
        color: #fff;
        border: 0;
        padding: 14px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        font-size: 15px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
        text-align: center;
        letter-spacing: 0.2px;
    }

    .checkout-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(2, 97, 66, 0.25);
        color: #fff;
    }

    .checkout-btn:active {
        transform: translateY(0);
    }

    .secondary-btn {
        width: 100%;
        background: #f5f5f5;
        color: #026142;
        border: 2px solid #026142;
        padding: 14px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 10px;
        font-size: 15px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
        text-align: center;
        letter-spacing: 0.2px;
    }

    .secondary-btn:hover {
        background: #026142;
        color: #fff;
        box-shadow: 0 4px 12px rgba(2, 97, 66, 0.15);
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            right: -100%;
            max-width: 100%;
        }

        .sidebar.open {
            right: 0;
        }
    }

    @media (max-width: 480px) {
        .sidebar {
            width: 100%;
            right: -100%;
        }

        .sidebar-header {
            padding: 16px;
        }

        .sidebar-header h2 {
            font-size: 18px;
        }

        .sidebar-footer {
            padding: 16px;
            margin-bottom: 0;
        }

        .cart-item {
            padding: 10px;
            margin-bottom: 8px;
            gap: 6px;
        }

        .cart-item img {
            width: 50px;
            height: 50px;
        }

        .qty-btn-mini {
            width: 22px;
            height: 22px;
        }

        .qty-btn-mini i {
            font-size: 8px;
        }

        .qty-input-mini {
            width: 28px;
            font-size: 11px;
        }
    }

    .product_card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(2, 97, 66, 0.08);
        transition: all 0.3s ease;
        padding: 0;
        position: relative;
        overflow: hidden;
        display: flex;
        gap: 10px;
        align-items: start;
    }

    .product_card:hover {
        border-color: #026142;
        box-shadow: 0 8px 24px rgba(2, 97, 66, 0.15);
    }

    .product-details-title {
        font-size: 15px;
        font-weight: 500;
        line-height: 1.6;
        color: #333 !important;
    }

    @media (max-width: 990px) {
        .sidebar-footer {
            margin-bottom: 0;
        }
    }
</style>

