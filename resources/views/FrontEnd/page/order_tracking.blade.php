@extends('FrontEnd.master')
@section('content')
    <main class="main" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); min-height: 100vh;">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="col-lg-6 col-md-8">
                    <div class="card border-0 shadow-lg"
                        style="border-radius: 2rem; overflow: hidden; background: rgba(255,255,255,0.85); backdrop-filter: blur(8px); box-shadow: 0 8px 32px rgba(216,63,38,0.10);">
                        <div class="card-header text-center bg-transparent"
                            style="border-bottom: none; padding: 2.5rem 2rem 1.5rem 2rem;">
                            <div style="display: flex; justify-content: center;">
                                <img src="{{ asset('FrontEnd/assect/img/logo/Captureimgae.PNG') }}" alt="Order Tracking"
                                    style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; box-shadow: 0 4px 16px rgba(216,63,38,0.10); border: 4px solid #fff;">
                            </div>
                            <h2
                                style="font-weight: 900; font-size: 2.3rem; color: #026544; margin: 1rem 0 0.5rem 0; letter-spacing: -1px;">
                                Track Your Order</h2>
                            <p style="font-size: 1.1rem; color: #444; margin-bottom: 0;">Stay updated on your package from
                                checkout to delivery.</p>
                        </div>
                        <div class="card-body px-5 py-4" style="background: transparent;">
                            <div class="text-center mb-4">
                                <h4 id="error_msg"
                                    style="color: #026544; font-weight: 700; font-size: 1.15rem; margin-bottom: 0.5rem;">
                                    {{ session()->get('message') }}
                                </h4>
                                <p style="color: #888; font-size: 1rem; margin-bottom: 2rem;">
                                    Enter your <span style="color:#026544;font-weight:600;">Invoice ID</span> and <span
                                        style="color:#026544;font-weight:600;">Phone</span> to check your order status.
                                </p>
                            </div>
                            <form method="get" action="{{ route('order.track') }}" class="needs-validation" novalidate
                                style="max-width: 420px; margin: 0 auto;">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label"
                                        style="font-weight: 700; color: #222; font-size: 1.08rem;">Invoice ID <span
                                            style="color: #026544;">*</span></label>
                                    <div class="input-group"
                                        style="border-radius: 1rem; overflow: hidden; box-shadow: 0 2px 8px rgba(216,63,38,0.04);">
                                        <span class="input-group-text"
                                            style="background: #fff; border-right: 0; border-radius: 1rem 0 0 1rem; font-size: 1.2rem;">
                                            <i class="fi-rs-receipt" style="color: #026544;"></i>
                                        </span>
                                        <input type="text" name="invoice_no" class="form-control"
                                            placeholder="e.g. INV123456" value="{{ old('invoice_no') }}" required
                                            style="border-radius: 0 1rem 1rem 0; border-left: 0; background: #fff; font-size: 1.08rem; padding: 0.85rem 1rem;">
                                    </div>
                                    @error('invoice_no')
                                        <div style="color: #026544; font-size: 14px; margin-top: 6px; font-weight: 500;">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"
                                        style="font-weight: 700; color: #222; font-size: 1.08rem;">Phone <span
                                            style="color: #026544;">*</span></label>
                                    <div class="input-group"
                                        style="border-radius: 1rem; overflow: hidden; box-shadow: 0 2px 8px rgba(216,63,38,0.04);">
                                        <span class="input-group-text"
                                            style="background: #fff; border-right: 0; border-radius: 1rem 0 0 1rem; font-size: 1.2rem;">
                                            <i class="fi-rs-smartphone" style="color: #026544;"></i>
                                        </span>
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="Your phone number" value="{{ old('phone') }}" required
                                            style="border-radius: 0 1rem 1rem 0; border-left: 0; background: #fff; font-size: 1.08rem; padding: 0.85rem 1rem;">
                                    </div>
                                    @error('phone')
                                        <div style="color: #026544; font-size: 14px; margin-top: 6px; font-weight: 500;">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit"
                                        style="background: #026544; color: #fff; border: none; padding: 1rem 0; font-size: 1.15rem; font-weight: 800; border-radius: 1rem; box-shadow: 0 4px 16px rgba(216,63,38,0.10); transition: background 0.2s, transform 0.2s;">
                                        <i class="fi-rs-search me-2"></i> Track My Order
                                    </button>
                                </div>
                                <div class="text-center mt-4">
                                    <p style="font-size: 1rem; color: #888;">
                                        Need help? <a href="#"
                                            style="color: #026544; text-decoration: underline; font-weight: 600;">Contact
                                            our support team</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('FrontEnd.include.cart-contianer')
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            const msg = $('#error_msg').text().trim();
            if (!msg) {
                $('#error_msg').hide();
            } else {
                setTimeout(function() {
                    $('#error_msg').fadeOut(1000);
                }, 5000);
            }

            $('.form-control').focus(function() {
                $(this).css('box-shadow', '0 0 0 3px #02654433').css('border-color', '#026544');
            }).blur(function() {
                $(this).css('box-shadow', 'none').css('border-color', '#ced4da');
            });

            $('button[type="submit"]').hover(
                function() {
                    $(this).css('background', 'linear-gradient(90deg, #015236 60%, #013d2a 100%)').css(
                        'transform', 'scale(1.03)');
                },
                function() {
                    $(this).css('background', '#026544').css(
                        'transform', 'scale(1)');
                }
            );
        });
    </script>
@endpush
