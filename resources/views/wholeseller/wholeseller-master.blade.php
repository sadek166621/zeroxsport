@extends('FrontEnd.master')

@section('content')
    <section class="py-4">
        <div class="custom_container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    @include('wholeseller.sidemenu')
                </div>
                <div class="col-md-9">
                    @yield('wholeseller_body')
                </div>
            </div>
        </div>
    </section>
    
    
@endsection

@push('js')
    <script>
        /* ---------------- Wholeseller Add to Cart ---------------- */
        function addToCartWholeseller(id, productName, qty = 1) {
            $.ajax({
                type: 'POST',
                url: '/wholeseller/cart/store/' + id,
                data: {
                    quantity: qty,
                    product_name: productName,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    wholesellerMiniCart(); // Refresh sidebar
                    showToast(data.success || data.error, data.error ? 'error' : 'success');
                    if (!data.error) openWholesellerSidebar();
                }
            });
        }

        /* ---------------- Wholeseller Mini Cart Refresh ---------------- */
        function wholesellerMiniCart() {
            $.ajax({
                type: 'GET',
                url: '/wholeseller/mini-cart',
                dataType: 'json',
                success: function(response) {
                    let html = '';
                    let subtotal = response.cartTotal || 0;

                    // Update both header badge and sidebar badge
                    $('.cartQty').text(Object.keys(response.carts).length); // header badge
                    $('.wholesellerCartQty').text(Object.keys(response.carts).length); // optional sidebar badge

                    $('#wholesellerCartSubtotal').text('৳' + subtotal);

                    if (Object.keys(response.carts).length > 0) {
                        $.each(response.carts, function(key, value) {
                            html += `
                            <div class="cart-item mb-3 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="/${value.options.image}" width="50" height="50" alt="${value.name}">
                                    <div>
                                        <div class="title">${value.name}</div>
                                        <div class="qty">Qty: ${value.qty}
                                            <button class="btn btn-sm rounded-circle ms-5"
                                                onclick="wholesellerMiniCartRemove('${value.rowId}')"
                                                title="Remove item">
                                                <i class="fa fa-trash text-success"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="price">${value.price} ৳</div>
                            </div>`;
                        });
                    } else {
                        html = `<div style="padding:18px; text-align:center; color:#6b6b6b;">
                        Your cart is currently empty.
                    </div>`;
                    }

                    $('#wholesellerCartItemsList').html(html);
                }
            });
        }

        /* ---------------- Remove Item ---------------- */
        function wholesellerMiniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/wholeseller/minicart/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    wholesellerMiniCart();
                    showToast(data.success || data.error, data.error ? 'error' : 'success');
                }
            });
        }

        /* ---------------- Toast ---------------- */
        function showToast(message, type) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1200
            });
            Toast.fire({
                icon: type,
                title: message
            });
        }

        /* ---------------- Sidebar Control ---------------- */
        function openWholesellerSidebar() {
            $('#wholesellerCartSidebar').addClass('open').attr('aria-hidden', 'false');
            $('#wholesellerCartOverlay').addClass('open').attr('aria-hidden', 'false');
            $('html, body').css('overflow', 'hidden');
        }

        function closeWholesellerSidebar() {
            $('#wholesellerCartSidebar').removeClass('open').attr('aria-hidden', 'true');
            $('#wholesellerCartOverlay').removeClass('open').attr('aria-hidden', 'true');
            $('html, body').css('overflow', '');
        }

        $('#wholesellerCartOverlay, #closeWholesellerSidebar').click(closeWholesellerSidebar);
        $(document).keydown(function(e) {
            if (e.key === 'Escape') closeWholesellerSidebar();
        });

        /* ---------------- Init ---------------- */
        $(document).ready(function() {
            wholesellerMiniCart();
        });
    </script>
@endpush