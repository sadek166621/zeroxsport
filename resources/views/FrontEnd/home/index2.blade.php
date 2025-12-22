@extends('FrontEnd.master')
@section('title')
    Home
@endsection
@section('content')
    <!-- Option & Slider Part Start -->
    <style>
        .latest-products-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-top: 20px;
        }

        .fetured-title {
            font-size: 1.5em !important;
        }

        .loading::after {
            ... spinner ...
        }

        .banner-bottom {
            margin-top: 20px !important;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .banner-bottom img {
            border-radius: 8px;
            width: 100%;
        }


        @media (max-width: 768px) {
            .banner-bottom {
                display: none;
            }
        }



        @media (max-width: 1400px) {
            .latest-products-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        @media (max-width: 1200px) {
            .latest-products-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        @media (max-width: 992px) {
            .latest-products-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 768px) {
            .latest-products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 576px) {
            .latest-products-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 8px !important;
            }

            .fetured-title {
                font-size: 1.2em !important;
            }
        }


        .deals-countdown-wrap {
            text-align: center;
            margin: 20px 0;
        }

        /*.btn-group button{*/
        /*    margin-right: 5px;*/
        /*}*/

        #deals-countdown {
            font-size: 24px;
            color: #333;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
        }

        .loading::after {
            content: '';
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid #fff;
            border-top: 2px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 5px;
            /* Adjust as needed */
            vertical-align: middle;
        }

        .button-container {
            display: flex;
            gap: 10px;
            margin-top: auto;
        }

        @media screen and (max-width: 560px) {
            .button-container {
                flex-direction: column;
                gap: 5px;
            }

            .button-container button {
                width: 100%;
            }




        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .flash-sale-timer-style {
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .flash-sale-heading {
            font-weight: 600;
            color: #333;
            font-size: 1.2rem;
        }

        .flash-sale-ending {
            font-weight: 600;
            color: #ff7e5f;
            font-size: 1.2rem;
        }

        .flash-sale-small-text {
            color: #666;
        }

        .flash-sale-timer-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }



        /* Side Banner Slider Styles */
        @media (max-width: 991px) {
            #sideBannerSlider {
                margin-bottom: 30px;
            }

            #sideBannerSlider .carousel-item img {
                height: 200px;
                object-fit: cover;
            }

            #sideBannerSlider .carousel-indicators {
                margin-bottom: -25px;
            }

            #sideBannerSlider .carousel-indicators button {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background-color: #01B45E;
                opacity: 0.5;
            }

            #sideBannerSlider .carousel-indicators button.active {
                opacity: 1;
            }

            #sideBannerSlider .carousel-control-prev,
            #sideBannerSlider .carousel-control-next {

                color: gray;
                top: 50%;
                transform: translateY(-50%);
            }

            #sideBannerSlider .carousel-control-prev {
                left: 10px;
            }

            #sideBannerSlider .carousel-control-next {
                right: 10px;
            }

            #sideBannerSlider .carousel-control-prev-icon,
            #sideBannerSlider .carousel-control-next-icon {
                width: 30px;
                height: 30px;
            }
        }

        @media (max-width: 575.98px) {
            .flash-sale-timer {
                text-align: center;
            }

            .flash-sale-heading {
                margin-bottom: 0.5rem;
                font-size: 0.9rem !important;
            }

            .flash-sale-ending {
                font-size: 0.9rem !important;
            }

            .flash-sale-small-text {
                font-size: 0.8rem;
            }

            .flash-sale-timer-text {
                font-size: 0.9rem !important;
            }

            .btn-container {
                flex-direction: column;
            }


        }

        /* featured products section */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 5px rgba(255, 107, 107, 0.5);
            }

            100% {
                box-shadow: 0 0 20px rgba(78, 205, 196, 0.8);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @media (max-width: 1200px) {
            .product_card {
                min-width: 180px !important;
                max-width: 180px !important;
            }
        }

        @media (max-width: 992px) {
            .product_card {
                min-width: 160px !important;
                max-width: 160px !important;
            }
        }

        @media (max-width: 768px) {
            .header-section {
                flex-direction: column !important;
                gap: 20px;
                text-align: center;
                padding: 30px 20px !important;
            }

            .header-section>div:last-child {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }

            .product_card {
                min-width: 140px !important;
                max-width: 140px !important;
            }

            .container {
                padding: 0 10px !important;
            }
        }

        @media (max-width: 480px) {
            .product_card {
                min-width: 120px !important;
                max-width: 120px !important;
            }

            .header-section h2 {
                font-size: 2rem !important;
            }
        }


        /* Base Styles */
        .flash-sale-section {
            position: relative;
            overflow: hidden;
            padding: 10px 0 20px 0;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 15px;
            position: relative;
            z-index: 2;
        }

        /* Animations */
        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        @keyframes slideGlow {

            0%,
            100% {
                background-position: 0% 0;
            }

            50% {
                background-position: 100% 0;
            }
        }

        /* Flash Sale Banner */
        /* Optional glow effect on button */
        .shine-button {
            position: relative;
            overflow: hidden;
        }

        .btn-shine {
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: rgba(255, 255, 255, 0.4);
            transform: skewX(-20deg);
            animation: shine 2s infinite;
        }

        .flash-btn {
            font-family: "Nunito", sans-serif;
            font-weight: 600;
            transition: 0.5s;
            background-color: #01B45E;
            color: white;
        }

        @keyframes shine {
            0% {
                left: -75%;
            }

            100% {
                left: 125%;
            }
        }

        .countdown-timer {
            font-family: 'Courier New', Courier, monospace;
            letter-spacing: 1px;
        }




        .product-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        /* Discount Badge */
        .discount-badge {
            position: absolute;
            top: 8px;
            right: 8px !important;
            width: 50px;
            height: 50px;
            border-radius: 50% !important;
            background: #01B45E !important;
            color: white;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 700;
            z-index: 3;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            box-shadow: 0 2px 8px rgba(238, 90, 36, 0.3);
        }

        /* Product Image */
        .product-image {
            position: relative;
            overflow: hidden;
            object-fit: cover;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .product-image a {
            display: block;
            height: 100%;
            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .product-image:hover img {
            transform: scale(1.05);
        }

        /* Product Details */
        .product-details {
            padding: 10px;
            position: relative;
        }

        .product-link {
            text-decoration: none;
            color: inherit;
        }

        .product-title {
            font-size: 16px;
            font-weight: 500 !important;
            color: #2c3e50;
            margin-bottom: 8px;
            line-height: 1.3;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 33px;
        }

        .product-link:hover .product-title {
            color: #313131;
        }

        /* Price Section */
        .price-section {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 4px;
            height: 30px;
        }

        .current-price {
            font-size: 18px;
            font-weight: 600;
            color: #01B45E;
            margin: 0;
        }

        .original-price {
            font-size: 11px;
            color: #95a5a6;
            text-decoration: line-through;
            font-weight: 400;
        }

        .stars {
            display: flex;
            gap: 1px;
        }

        .star {
            width: 10px;
            height: 10px;
        }

        .star.filled {
            fill: #ffc107;
        }

        .star.empty {
            fill: #e0e0e0;
        }

        .rating-text {
            font-size: 10px;
            color: #7f8c8d;
            font-weight: 500;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            gap: 5px;
            margin-bottom: 0px;
        }

        .btn-buy-now,
        .btn-add-cart {
            border: none;
            padding: 0px 3px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
        }

        .btn-buy-now {
            background: #01B45E;
            color: white;
            box-shadow: 0 2px 8px rgba(216, 63, 38, 0.3);
        }

        .btn-buy-now:hover {
            background: #c2362a;
            transform: translateY(-1px);
        }

        .btn-add-cart {
            background: white;
            color: #01B45E;
            border: 1px solid #01B45E;
        }

        .btn-add-cart:hover {
            background: #01B45E;
            color: white;
            transform: translateY(-1px);
        }

        .out-of-stock {
            width: 100%;
            background: linear-gradient(45deg, #f2f2f2, #e6e6e6);
            color: #999;
            text-align: center;
            border-radius: 8px;
            padding: 8px 0;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 11px;
        }

        /* Stock Status */
        .stock-status {
            position: absolute;
            top: -6px;
            left: 10px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .stock-indicator {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #4caf50;
        }

        .stock-text {
            font-size: 1px;
            color: #666;
        }

        /* Responsive Design */

        /* Extra Small Devices (phones, 576px and down) */
        @media (max-width: 575.98px) {
            .container {
                padding: 0 10px;
                position: relative;
            }

            .banner-content {
                margin-bottom: 15px;
            }

            .title-wrapper {
                justify-content: center;
                margin-bottom: 10px;
            }

            .fire-icon {
                width: 35px;
                height: 35px;
                margin-right: 10px;
            }

            .fire-icon span {
                font-size: 18px;
            }

            .main-title {
                font-size: 1rem;
                letter-spacing: 1px;
            }

            .subtitle {
                display: none;
            }

            .title-underline {
                width: 80px;
                margin: 8px auto 0;
            }

            .banner-actions {
                flex-direction: column;
                align-items: center;
                gap: 12px;
            }

            .countdown-label {
                font-size: 0.75rem;
                margin-bottom: 5px;
            }

            .countdown-timer {
                font-size: 1.2rem;
            }

            .shop-more-btn {
                position: absolute;
                bottom: 0;
            }

            .product-card {
                max-width: 200px;
                margin: 0 5px;
            }



            .product-details {
                padding: 8px;
            }

            .product-title {
                font-size: 14px;
                height: 30px;
            }

            .current-price {
                font-size: 14px;
            }

            .original-price {
                font-size: 10px;
            }

            .btn-buy-now,
            .btn-add-cart {
                font-size: 12px;
            }

            .discount-badge {
                font-size: 8px;
                padding: 2px 5px;
            }

            .particle {
                display: none;
            }

            .btn-buy-now {
                display: none;
            }
        }

        /* Small Devices (landscape phones, 576px and up) */
        @media (min-width: 576px) and (max-width: 767.98px) {


            .main-title {
                font-size: 1.8rem;
            }

            .countdown-timer {
                font-size: 1.4rem;
            }

            .product-card {
                max-width: 220px;
            }




        }

        /* Medium Devices (tablets, 768px and up) */
        @media (min-width: 768px) and (max-width: 991.98px) {


            .main-title {
                font-size: 2.2rem;
            }

            .countdown-timer {
                font-size: 1.6rem;
            }

            .product-card {
                max-width: 240px;
            }


        }

        /* Large Devices (desktops, 992px and up) */
        @media (min-width: 992px) and (max-width: 1199.98px) {


            .product-card {
                max-width: 260px;
            }
        }

        /* Extra Large Devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {


            .product-card {
                max-width: 280px;
            }
        }

        /* Landscape orientation for mobile devices */
        @media (max-width: 767px) and (orientation: landscape) {
            .flash-sale-banner {
                flex-direction: row;
                text-align: left;
            }

            .banner-content {
                margin-bottom: 0;
            }

            .title-wrapper {
                justify-content: flex-start;
            }

            .title-underline {
                margin: 8px 0 0 0;
            }

            .banner-actions {
                flex-direction: row;
                align-items: flex-end;
            }

            .main-title {
                font-size: 1.3rem;
            }
        }

        /* High DPI displays */
        @media (-webkit-min-device-pixel-ratio: 2),
        (min-resolution: 192dpi) {
            .product-image img {
                image-rendering: -webkit-optimize-contrast;
                image-rendering: crisp-edges;
            }
        }

        /* Dark mode support (if needed) */
        @media (prefers-color-scheme: dark) {
            .product-card {
                background: rgba(255, 255, 255, 0.98);
            }
        }

        /* Reduced motion for accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Print styles */
        @media print {
            .flash-sale-section {
                background: white !important;
            }

            .flash-sale-banner {
                background: #f0f0f0 !important;
                box-shadow: none !important;
            }

            .particle,
            .bg-grid {
                display: none !important;
            }
        }


        /* Base Styles */
        * {
            box-sizing: border-box;
        }

        /* Animation Keyframes */
        @keyframes glow {
            0% {
                opacity: 0.8;
            }

            100% {
                opacity: 1;
                transform: scale(1.02);
            }
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        /* Container */
        .featured-products-section {
            position: relative;
            overflow: hidden;
            padding: 15px 0;
        }

        .featured-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 15px;
            position: relative;
            z-index: 2;
        }

        /* Header Section */
        .featured-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background: #01B45E;
            border-radius: 10px;
            padding: 12px 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .featured-header:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .header-content h2 {
            color: whitesmoke;
            font-weight: 600;
            font-size: 2rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header-divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
            border-radius: 2px;
            margin-top: 10px;
            animation: glow 2s ease-in-out infinite alternate;
        }

        .view-all-btn {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(238, 90, 36, 0.3);
            border: none;
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .view-all-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(238, 90, 36, 0.4);
            color: white;
            text-decoration: none;
        }

        .view-all-btn .shimmer-effect {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .view-all-btn:hover .shimmer-effect {
            animation: shimmer 0.6s ease-in-out;
        }

        /* Product Card */
        .product-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Discount Badge */
        .discount-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 0px 8px;
            border-radius: 15px;
            font-size: 10px;
            line-height: 16px;
            font-weight: 500;
            z-index: 3;
            text-transform: uppercase !important;
            letter-spacing: 0.3px;
            box-shadow: 0 3px 10px rgba(238, 90, 36, 0.3);
        }

        /* Product Image */
        .product-image {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .product-image a {
            display: block;
            height: 100%;
            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .product-image:hover img {
            transform: scale(1.05);
        }

        /* Product Details */
        .product-details {
            padding: 10px;
            position: relative;
        }

        .product-title {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            line-height: 1.5;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 45px;
        }

        .product-title:hover {
            color: #667eea;
        }

        /* Price Section */
        .price-section {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 5px;
        }

        .current-price {
            font-size: 18px;
            font-weight: 600;
            color: #01B45E;
            margin: 0;
        }

        .original-price {
            font-size: 12px;
            color: #95a5a6;
            text-decoration: line-through;
            font-weight: 400;
        }



        .stars {
            display: flex;
            gap: 1px;
        }

        .star {
            width: 12px;
            height: 12px;
        }

        .rating-text {
            font-size: 11px;
            color: #7f8c8d;
            font-weight: 500;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            margin-top: 12px;
        }

        .btn-primary {
            background: #01B45E;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 11px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(216, 63, 38, 0.3);
            flex: 1;
            text-align: center;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(216, 63, 38, 0.4);
            background: #c23821;
        }

        .btn-secondary {
            background: white;
            color: #01B45E;
            border: 2px solid #01B45E;
            padding: 6px 8px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 11px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
        }

        .btn-secondary:hover {
            background: #01B45E;
            color: white;
            transform: translateY(-1px);
        }

        .btn-disabled {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 6px 8px;
            border-radius: 5px;
            text-align: center;
            font-weight: 600;
            font-size: 9px;
            opacity: 0.8;
            width: 100%;
        }

        /* Load More Button */
        .load-more-container {
            text-align: center;
            margin-top: 30px;
        }

        .load-more-btn {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 25px rgba(238, 90, 36, 0.3);
        }

        .load-more-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(238, 90, 36, 0.4);
        }

        /* Custom: Keep sidebar and slider in a row for 691px–892px */
        @media (min-width: 691px) and (max-width: 892px) {
            .option-slider .row {
                flex-wrap: nowrap !important;
            }

            .option-slider .col-md-3 {
                flex: 0 0 32% !important;
                max-width: 32% !important;
                display: block !important;
            }

            .option-slider .col-lg-7 {
                flex: 0 0 68% !important;
                max-width: 68% !important;
                display: block !important;
            }

            .option-slider .col-lg-2 {
                display: none !important;
                /* Hide side banners if not enough space */
            }

            .sidemenu {
                height: 100%;
            }

            .desktop-slider {
                min-width: 0;
            }
        }

        /* Optionally, tweak padding/margins for better fit */
        @media (min-width: 691px) and (max-width: 892px) {
            .option-slider .custom_container {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .option-slider .sidemenu ul {
                font-size: 14px;
            }
        }

        /* Tablet: Make Desktop Option & Slider Part like mobile */
        @media (max-width: 991.98px) {

            /* Hide side menu and side banners */
            .option-slider .col-md-3,
            .option-slider .col-lg-2 {
                display: none !important;
            }

            /* Make slider full width */
            .option-slider .col-lg-7 {
                flex: 0 0 100% !important;
                max-width: 100% !important;
                display: block !important;
            }

            /* Remove row gap if any */
            .option-slider .row {
                gap: 0 !important;
            }

            /* Optional: add margin-bottom for spacing */
            .option-slider {
                margin-bottom: 20px;
            }
        }
    </style>
    <!-- Desktop Option & Slider Part Start -->
    <section class="option-slider custom_container  mt-3">
        <input type="hidden" id="language_status" value="{{ session()->get('language') }}">
        <div>
            <div class="row ">
                <!-- Side Menu Start -->
                <div class="col-md-3 d-md-block d-none">
                    <div class="sidemenu py-0">
                        <ul>
                            <li class="dropdown py-3" style="border-bottom:2px solid #00000020; background-color: #01B45E;">
                                <a style="color: #fff !important; font-size: 17px !important;"
                                    href="{{ route('category_list.index') }}">
                                    @if (session()->get('language') == 'bangla')
                                        সমস্ত ক্যাটাগোরি
                                    @else
                                        All Categories
                                    @endif
                                    <span><i class="fa fa-angle-down"></i></span>
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                @if ($category->type == 1)
                                    @php $parent = $category->id @endphp
                                    <li class="dropdown py-2"
                                        style="border-bottom:2px solid #00000020; white-space: nowrap;"><a
                                            href="{{ route('product.category', $category->slug) }}">
                                            <img src="{{ asset($category->icon) }}" height="29px" width="29px"
                                                class="me-3">
                                            @if (session()->get('language') == 'bangla')
                                                {{ $category->name_bn }}
                                            @else
                                                {{ $category->name_en }}
                                            @endif
                                            <span><i class="fa fa-angle-right"></i></span>
                                        </a>
                                        @php $child = findChildCategory($category->id) @endphp
                                        @if (count($child) > 0)
                                            <ul>
                                                @foreach ($child as $subcategory)
                                                    @if ($subcategory->parent_id == $category->id)
                                                        <li class="dropdown_two">
                                                            <a href="{{ route('product.category', $subcategory->slug) }}">
                                                                <!--<img src="{{ asset($subcategory->icon) }}" height="30px" width="30px" class="me-3">-->
                                                                @if (session()->get('language') == 'bangla')
                                                                    {{ $subcategory->name_bn }}
                                                                @else
                                                                    {{ $subcategory->name_en }}
                                                                @endif
                                                            </a>
                                                            @php $child2 = findChildCategory($subcategory->id) @endphp
                                                            @if (count($child2) > 0)
                                                                <ul>
                                                                    @foreach ($child2 as $childSubCategory)
                                                                        <!--<li>{{ $childSubCategory->name_en }}</li>-->
                                                                        <a
                                                                            href="{{ route('product.category', $subcategory->slug) }}">
                                                                            <!--<img src="{{ asset($childSubCategory->icon) }}" height="30px" width="30px" class="me-3">-->
                                                                            @if (session()->get('language') == 'bangla')
                                                                                {{ $childSubCategory->name_bn }}
                                                                            @else
                                                                                {{ $childSubCategory->name_en }}
                                                                            @endif
                                                                        </a>
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
                </div>
                <!-- Side Menu End -->
                <!--Desktop Slider Start -->
                <div class="col-lg-9 desktop-slider ">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($sliders as $index => $slider)
                                <button type="button" data-bs-target="#carouselExampleInterval"
                                    data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($sliders as $index => $slider)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
                                    <img src="{{ asset($slider->slider_img) }}" class="d-block w-100 h-auto" alt="..."
                                        style=" width: 100%;">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- <div class="banner-bottom">
                                                        <div class="">
                                                            <img src="{{ asset('FrontEnd/img/small-hero-one.png') }}" alt="">
                                                        </div>
                                                        <div class="">
                                                            <img src="{{ asset('FrontEnd/img/small-hero-two.png') }}" alt="">
                                                        </div>
                                                        <div class=" ">
                                                            <img src="{{ asset('FrontEnd/img/small-hero-three.png') }}" alt="">
                                                        </div>
                                                    </div> -->

                    <div class="banner-bottom ">
                        <!-- Desktop view banners -->
                        @foreach ($home_banners as $banner)
                            <div>
                                <img src="{{ asset($banner->banner_img) }}" class="d-block w-100"
                                    style="border-radius: 10px;" alt="Banner Image">
                            </div>
                        @endforeach


                    </div>
                </div>
                <!-- Desktop Slider End -->
                <!--side banner-->
                <!-- <div class="col-lg-2 d-none d-lg-flex flex-column " style="gap: 16px;">
                                                    @foreach ($home_banners as $banner)
    <img src="{{ asset($banner->banner_img) }}" class="d-block w-100" style="border-radius: 10px;" alt="Banner Image">
    @endforeach


                                                </div> -->
                <!--side banner end-->

            </div>
        </div>
    </section>
    <!-- Desktop Option & Slider Part End -->


    <!--  Featured Start -->


    <section class="featured-products-section mt-2">
        <div class="custom_container">
            <!-- Header Section -->
            <div class="featured-header">
                <div class="header-content">
                    <h2 class="fetured-title" style="font-weight: semibold; margin: 0;  color: #fff; ">
                        Featured Products</h2>
                </div>

                <div>
                    <a href="{{ route('product.show') }}" class="view_more btn-primary"
                        style="float: right; padding: 2px 16px; background-color:white; color:#01B45E;">View All</a>

                </div>
            </div>

            <!-- Products Grid -->
            <div class="owl-carousel owl-theme" id="featured-products-carousel">
                @foreach ($product_featured as $index => $product)
                    @php $data = calculateDiscount($product->id); @endphp
                    <div class="product-card" data-index="{{ $index }}">
                        <!-- Discount Badge -->
                        @if ($data['text'])
                            <div class="discount-badge">
                                save {{ $data['text'] }}
                            </div>
                        @endif

                        <!-- Product Image -->
                        <div class="product-image">
                            <a href="{{ route('product.details', $product->slug) }}">
                                <img src="{{ asset($product->product_thumbnail) }}" alt="Product Image" loading="lazy">
                            </a>
                        </div>

                        <!-- Product Details -->
                        <div class="product-details">
                            <a href="{{ route('product.details', $product->slug) }}" class="product-title">
                                @if (session()->get('language') == 'bangla')
                                    {!! Str::substr($product->name_bn, 0, 25) !!}
                                @else
                                    {!! Str::substr($product->name_en, 0, 25) !!}
                                @endif
                            </a>

                            <!-- Price Section -->
                            {{-- <div class="price-section">
                                <h4 class="current-price">{{ $data['discount'] }} TK</h4>
                                @if ($product->regular_price != $data['discount'])
                                    <span class="original-price">{{ $product->regular_price }} TK</span>
                                @endif
                            </div> --}}
                            <!-- Price Section -->
                            <div class="price-section">
                                @if ($product->is_wholesell == 1)
                                    <!-- Show only regular price for wholesale products -->
                                    <h4 class="current-price">{{ $product->regular_price }} TK</h4>
                                    <span class="original-price">0 TK</span>
                                @else
                                    <!-- Show discount price and original price -->
                                    <h4 class="current-price">{{ $data['discount'] }} TK</h4>
                                    @if ($product->regular_price != $data['discount'])
                                        <span class="original-price">{{ $product->regular_price }} TK</span>
                                    @endif
                                @endif
                            </div>


                            <!-- Action Buttons -->
                            {{-- <div class="action-buttons">
                                @if ($product->stock_qty > 0)
                                    @if ($product->is_varient == 1)
                                        <button onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal" class="btn-buy-now">
                                            {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                        </button>
                                        <button onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal" class="btn-add-cart">
                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                        </button>
                                    @else
                                        <button onclick="buyNow({{ $product->id }})" class="btn-buy-now">
                                            {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                        </button>                                        
                                        <input type="hidden" id="pfrom" value="direct">
                                        <input type="hidden" id="product_product_id" value="{{ $product->id }}"
                                            min="1">
                                        <input type="hidden" id="{{ $product->id }}-product_pname"
                                            value="{{ $product->name_en }}">

                                        <button onclick="addToCartDirect({{ $product->id }})" class="btn-add-cart">
                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                        </button>
                                    @endif
                                @else
                                    <div class="out-of-stock">
                                        {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
                                    </div>
                                @endif
                            </div> --}}

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                @if ($product->stock_qty > 0)
                                    @if (Auth::check() && Auth::user()->role == '5')
                                        {{-- Wholeseller restriction --}}
                                        <button onclick="wholesellerAlert()" class="btn-buy-now">
                                            {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                        </button>
                                        <button onclick="wholesellerAlert()" class="btn-add-cart">
                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                        </button>
                                    @else
                                        {{-- Normal user actions --}}
                                        @if ($product->is_varient == 1)
                                            <button onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal" class="btn-buy-now">
                                                {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                            </button>
                                            <button onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal" class="btn-add-cart">
                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                            </button>
                                        @else
                                            <button onclick="buyNow({{ $product->id }})" class="btn-buy-now">
                                                {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                            </button>

                                            {{-- Hidden inputs for direct purchase --}}
                                            <input type="hidden" id="pfrom" value="direct">
                                            <input type="hidden" id="product_product_id" value="{{ $product->id }}"
                                                min="1">
                                            <input type="hidden" id="{{ $product->id }}-product_pname"
                                                value="{{ $product->name_en }}">

                                            <button onclick="addToCartDirect({{ $product->id }})" class="btn-add-cart">
                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
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
                @endforeach
            </div>
        </div>
    </section>


    @php

        $campaign = \App\Models\Campaing::where('status', 1)->where('is_featured', 1)->orderBy('id', 'desc')->first();
        $campaing_products = $campaign->campaing_products;
        //dd(count($campaing_products));
    @endphp

    @if ($campaign)
        @php
            $flash_start = date_create($campaign->flash_start);
            $flash_end = date_create($campaign->flash_end);

            $start_diff = $flash_start->getTimestamp() - time();
            $end_diff = $flash_end->getTimestamp() - time();

            $start_diff2 = date_diff(date_create($campaign->flash_start), date_create(date('d-m-Y H:i:s')));
            $end_diff2 = date_diff(date_create(date('d-m-Y H:i:s')), date_create($campaign->flash_end));
        @endphp

        @if ($start_diff2->invert == 0 && $end_diff2->invert == 0)
            <style>

            </style>

            <!-- Flash Sale Section -->
            <section class="flash-sale-section mt-4">
                <div class="custom_container">
                    <div class="flas-sale-content row">

                        <div class="flash-sale-banner col-md-4 mb-md-0 mb-3">
                            <div class="flash-sale-content"
                                style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2)), url('{{ asset($campaign->campaing_image) }}'); background-size: cover; background-position: center; border-radius: 20px; padding: 30px; position: relative; overflow: hidden;">

                                <!-- Sale Title -->
                                <div class="sale-header mb-4">
                                    <h3 class="flash-title">
                                        @if (session()->get('language') == 'bangla')
                                            ফ্ল্যাশ সেল
                                        @else
                                            Flash Sale
                                        @endif
                                    </h3>
                                    <h3 class="campaign-name">
                                        @if (session()->get('language') == 'bangla')
                                            {{ $campaign->name_bn ?? 'ফ্ল্যাশ সেল' }}
                                        @else
                                            {{ $campaign->name_en ?? 'Flash Sale' }}
                                        @endif
                                    </h3>
                                </div>

                                <!-- Timer Section -->
                                <div class="timer-section text-center mb-5">
                                    <div class="ending-text">
                                        @if (session()->get('language') == 'bangla')
                                            শেষ হচ্ছে
                                        @else
                                            Ending In
                                        @endif
                                    </div>
                                    <div id="demo" class="countdown-display"></div>
                                </div>

                                <!-- Shop More Button -->
                                <div class="shop-more-container">
                                    <a href="{{ route('campaign.product') }}" class="shop-more-btn">
                                        <span>
                                            @if (session()->get('language') == 'bangla')
                                                আরো কিনুন
                                            @else
                                                Shop More
                                            @endif
                                        </span>
                                        <div class="btn-shine"></div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <style>
                            .flash-sale-content {
                                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
                                transition: transform 0.4s ease, box-shadow 0.4s ease;
                                backdrop-filter: blur(8px);
                                border: 1px solid rgba(255, 255, 255, 0.1);
                                height: 100%;
                            }


                            .sale-header {
                                position: relative;
                                z-index: 2;
                                text-align: center;
                            }

                            .flash-title {
                                font-size: 2.6rem;
                                font-weight: 600;
                                color: #01B45E;
                                text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
                                margin: 0;
                                animation: slideInDown 0.6s ease-out;
                                letter-spacing: 1px;
                            }

                            .campaign-name {
                                font-size: 1.5rem;
                                font-weight: 500;
                                color: #ffffff;
                                margin: 12px 0;
                                animation: slideInUp 0.6s ease-out;
                            }

                            .timer-section {
                                position: relative;
                                z-index: 2;
                                background: rgba(255, 255, 255, 0.15);
                                padding: 20px;
                                border-radius: 12px;
                                backdrop-filter: blur(10px);
                                border: 1px solid rgba(255, 255, 255, 0.2);
                                transition: transform 0.3s ease;
                            }



                            .ending-text {
                                font-size: 1.3rem;
                                color: #ffffff;
                                margin-bottom: 8px;
                                font-weight: 500;
                            }

                            .countdown-display {
                                font-size: 1.1rem;
                                font-weight: 600;
                                color: #ffffff;
                                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
                            }

                            .countdown-display span {
                                display: inline-block;
                                background: #01B45E;
                                padding: 8px 12px;
                                border-radius: 8px;
                                margin: 0 4px;
                                min-width: 50px;
                                transition: transform 0.3s ease;
                            }

                            .countdown-display span:hover {
                                transform: scale(1.1);
                            }

                            .countdown-display small {
                                color: #FFEA00;
                                font-weight: 500;
                            }

                            .shop-more-container {
                                position: relative;
                                z-index: 2;
                                text-align: center;
                            }

                            .shop-more-btn {
                                display: inline-flex;
                                align-items: center;
                                background: #01B45E;
                                color: white;
                                padding: 12px 30px;
                                border-radius: 50px;
                                text-decoration: none;
                                font-weight: 600;
                                font-size: 1.1rem;
                                transition: all 0.4s ease;
                                border: 2px solid transparent;
                                position: relative;
                                overflow: hidden;
                                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                            }



                            .btn-shine {
                                position: absolute;
                                top: 0;
                                left: -100%;
                                width: 100%;
                                height: 100%;
                                background: linear-gradient(120deg,
                                        transparent,
                                        rgba(255, 255, 255, 0.7),
                                        transparent);
                                transition: left 0.5s ease;
                            }

                            .shop-more-btn:hover .btn-shine {
                                left: 100%;
                            }


                            /* Responsive Styles */
                            @media (max-width: 768px) {
                                .flash-title {
                                    font-size: 2.1rem;
                                }

                                .campaign-name {
                                    font-size: 1.4rem;
                                }

                                .countdown-display {
                                    font-size: 1.2rem;
                                }

                                .countdown-display span {
                                    padding: 6px 10px;
                                    min-width: 40px;
                                }

                                .shop-more-btn {
                                    padding: 10px 25px;
                                    font-size: 1rem;
                                }
                            }

                            @media (max-width: 576px) {
                                .flash-sale-content {
                                    padding: 20px;
                                }

                                .flash-title {
                                    font-size: 1.7rem;
                                }

                                .campaign-name {
                                    font-size: 1.4rem;
                                }

                                .countdown-display {
                                    font-size: 1rem;
                                }
                            }

                            .flash-product-card {
                                width: 100%;
                                background: rgba(255, 255, 255, 0.95);
                                border-radius: 15px;
                                overflow: hidden;
                                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
                                transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                                position: relative;
                                border: 1px solid rgba(255, 255, 255, 0.3);


                            }

                            .flas-product-title {
                                font-size: 18px;
                                font-weight: 600;
                                color: #2c3e50;
                                margin-bottom: 8px;
                                line-height: 1.3;
                                transition: color 0.3s ease;
                                display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                height: 36px;
                            }
                        </style>
                        <div class="products-carousel-wrapper col-md-8">
                            <div class="owl-carousel owl-theme flash_sale" id="flash-sale-carousel">
                                @foreach ($campaign->campaing_products as $product)
                                    @php $data = calculateDiscount($product->product->id); @endphp
                                    <div class="flash-product-card ">
                                        <!-- Discount Badge -->
                                        @if ($data['text'])
                                            <div class="discount-badge">
                                                Save {{ $data['text'] }}
                                            </div>
                                        @endif

                                        <!-- Product Image -->
                                        <div class="" style="width: 100%; height: 100%;">
                                            <a style="width: 100%; height: 100%;"
                                                href="{{ route('product.details', $product->product->slug) }}">
                                                <img style="width: 100%; height: 100%; object-fit: cover;"
                                                    src="{{ asset($product->product->product_thumbnail) }}"
                                                    alt="Product Image">
                                            </a>
                                        </div>

                                        <!-- Product Details -->
                                        <div class="product-details">
                                            <a href="{{ route('product.details', $product->product->slug) }}"
                                                class="product-link">
                                                <h3 class="flas-product-title">
                                                    @if (session()->get('language') == 'bangla')
                                                        {!! Str::substr($product->product->name_bn, 0, 25) !!}
                                                    @else
                                                        {!! Str::substr($product->product->name_en, 0, 25) !!}
                                                    @endif
                                                </h3>
                                            </a>

                                            <!-- Price Section -->
                                            <div class="price-section">
                                                <h4 class="current-price">{{ $data['discount'] }} TK</h4>
                                                <span class="original-price">{{ $product->product->regular_price }}
                                                    TK</span>
                                            </div>
                                            <!-- Action Buttons -->
                                            <div class="action-buttons">
                                                @if ($product->product->stock_qty > 0)
                                                    @if (Auth::check() && Auth::user()->role == '5')
                                                        {{-- Wholeseller restriction --}}
                                                        <button onclick="wholesellerAlert()" class="btn-buy-now">
                                                            {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                                        </button>
                                                        <button onclick="wholesellerAlert()" class="btn-add-cart">
                                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                                        </button>
                                                    @else
                                                        @if ($product->product->is_varient == 1)
                                                            <button onclick="productView({{ $product->product->id }})"
                                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                                class="btn-buy-now">
                                                                {{ session()->get('language') == 'bangla' ? ' কিনুন' : 'Buy Now' }}
                                                            </button>
                                                            <button onclick="productView({{ $product->product->id }})"
                                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                                class="btn-add-cart">
                                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                                            </button>
                                                        @else
                                                            <button onclick="buyNow({{ $product->product->id }})"
                                                                class="btn-buy-now">
                                                                {{ session()->get('language') == 'bangla' ? ' কিনুন' : 'Buy Now' }}
                                                            </button>

                                                            <input type="hidden" id="pfrom" value="direct">
                                                            <input type="hidden" id="product_product_id"
                                                                value="{{ $product->product->id }}" min="1">
                                                            <input type="hidden"
                                                                id="{{ $product->product->id }}-product_pname"
                                                                value="{{ $product->product->name_en }}">

                                                            <button onclick="addToCartDirect({{ $product->product->id }})"
                                                                class="btn-add-cart">
                                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                                            </button>
                                                        @endif
                                                    @endif
                                                @else
                                                    <div class="out-of-stock">
                                                        {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Stock Status -->
                                            <!-- @if ($product->product->stock_qty > 0)
    <div class="stock-status">
                                                                                                <span class="stock-indicator"></span>
                                                                                                <span class="stock-text">In Stock</span>
                                                                                            </div>
    @endif -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        @endif
    @endif
    <!-- Flash Sale End -->

    <!-- Categories Part Start -->
    <section class="services custom_container owl-carousel owl-theme owl-loaded mt-3 ">
        <div class="d-flex justify-content-between px-3 py-2"
            style="background: #01B45E; color: #fff;border-top-left-radius: 10px; border-top-right-radius: 10px; ">
            <h2 style="font-weight: semibold; margin: 0; font-size: 1.8rem; color: #fff; ">
                @if (session()->get('language') == 'bangla')
                    ক্যাটাগোরি
                @else
                    Categories
                @endif
            </h2>
            <div>
                <a href="{{ route('category_list.index') }}" class="view_more btn-primary"
                    style="float: right; padding: 2px 16px; background-color:white; color:#01B45E;">View All</a>

            </div>
        </div>

        <div class="owl-stage-outer mt-3">
            <div class=" owl-stage g-1 pb-2">
                @foreach ($featured_category as $fc)
                    <div class=" owl-item pb-2">
                        <a class="d-block " href="{{ route('product.category', $fc->slug) }}">
                            <span style="border:2px solid #01B45E; margin-left: 4px; border-radius: 10px;"
                                class="  d-inline-block p-2 d-flex align-items-center justify-content-center gap-1"
                                href="#">
                                <img src="{{ asset($fc->image) }}" class="" alt="..." style="width: 80px;">
                                <span class="text-center w-100 d-block brand-title-text">
                                    @if (session()->get('language') == 'bangla')
                                        <p class="category_title">{{ $fc->name_bn }}</p>
                                    @else
                                        <p class="category_title">{{ $fc->name_en }}</p>
                                    @endif
                                </span>
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Categories Part End -->
    <section class="custom_container mt-3">
        <div id="carouselExampleInterval-3" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                @foreach ($middle_banners as $index => $slider)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
                        <img src="{{ asset($slider->banner_img) }}" class="d-block w-100" alt="..."
                            style="height: 356px; width: 100%;">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval-3"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval-3"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>





    <!-- Services Part Start -->
    <section class="brand-slider custom_container owl-carousel owl-theme owl-loaded mt-4 ">
        <div class="featured-header">
            <div class="header-content">
                <h2 class="fetured-title" style="font-weight: semibold; margin: 0;  color: #fff; ">
                    Popular Brands</h2>
            </div>

            <div>
                <a href="{{ route('product.show') }}" class="view_more btn-primary"
                    style="float: right; padding: 2px 16px; background-color:white; color:#01B45E;">View All</a>

            </div>
        </div>
        <div class="owl-stage-outer ">
            <div class=" owl-stage g-1 ">
                @foreach ($brands as $brand)
                    @if ($brand->name_en != 'Non Brand')
                        <div class=" owl-item ">
                            <a href="" class="d-block ">
                                <span style="border:2px solid #01B45E; margin-left: 4px; border-radius: 10px;"
                                    class=" bg-white d-inline-block p-2" href="#">
                                    <img src="{{ asset($brand->brand_image) }}" class="" alt="...">
                                </span>
                                <span
                                    class="text-center w-100 d-block brand-title-text">{{ session()->get('language') == 'bangla' ? $brand->name_bn : $brand->name_en }}</span>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services Part End -->

    <!-- Latest Products -->


    <section class="product-section">
        <div class="custom_container">
            {{-- Header Section --}}
            <div class="section-header">
                <div>
                    <h2 class="section-title">
                        @if (session()->get('language') == 'bangla')
                            সাম্প্রতিক পণ্যসমূহ
                        @else
                            Latest Products
                        @endif
                    </h2>
                </div>
            </div>

            <div class="products-container latest-products-grid">
                @foreach ($product_trendings as $product_trending)
                    @php
                        $data = calculateDiscount($product_trending->id);
                        $discountPercentage = $data['text'];
                    @endphp

                    <div class="product-card">
                        @if ($data['discount'] && $product_trending->regular_price != $data['discount'])
                            <div class="discount-badge">
                                Save {{ $discountPercentage }}
                            </div>
                        @endif

                        <div class="product-image">
                            <a href="{{ route('product.details', $product_trending->slug) }}">
                                <img src="{{ asset($product_trending->product_thumbnail) }}" alt="Product Image">
                            </a>
                        </div>

                        <div class="product-details">
                            <a href="{{ route('product.details', $product_trending->slug) }}" class="product-link">
                                <h3 class="product-title">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $product_trending->name_bn }}
                                    @else
                                        {{ $product_trending->name_en }}
                                    @endif
                                </h3>
                            </a>

                            {{-- <div class="price-section">
                                <h4 class="current-price">{{ $data['discount'] }} TK</h4>
                                @if ($product_trending->regular_price != $data['discount'])
                                    <span class="original-price">{{ $product_trending->regular_price }} TK</span>
                                @endif
                            </div> --}}

                            <!-- Price Section -->
                            <div class="price-section">
                                @if ($product_trending->is_wholesell == 1)
                                    <!-- Show only regular price for wholesale products -->
                                    <h4 class="current-price">{{ $product_trending->regular_price }} TK</h4>
                                    <span class="original-price">0 TK</span>
                                @else
                                    <!-- Show discount price and original price -->
                                    <h4 class="current-price">{{ $data['discount'] }} TK</h4>
                                    @if ($product_trending->regular_price != $data['discount'])
                                        <span class="original-price">{{ $product_trending->regular_price }} TK</span>
                                    @endif
                                @endif
                            </div>


                            <div class="action-buttons">
                                @if ($product_trending->stock_qty > 0)
                                    @if (Auth::check() && Auth::user()->role == '5')
                                        {{-- Wholeseller restriction --}}
                                        <button onclick="wholesellerAlert()" class="btn-buy-now">
                                            {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                        </button>
                                        <button onclick="wholesellerAlert()" class="btn-add-cart">
                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                        </button>
                                    @else
                                        @if ($product_trending->is_varient == 1)
                                            <button onclick="productView({{ $product_trending->id }})"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                class="btn-buy-now">
                                                {{ session()->get('language') == 'bangla' ? 'কিনুন' : 'Buy Now' }}
                                            </button>
                                            <button onclick="productView({{ $product_trending->id }})"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                class="btn-add-cart">
                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                            </button>
                                        @else
                                            <button onclick="buyNow({{ $product_trending->id }})" class="btn-buy-now">
                                                {{ session()->get('language') == 'bangla' ? 'কিনুন' : 'Buy Now' }}
                                            </button>
                                            <input type="hidden" id="pfrom" value="direct">
                                            <input type="hidden" id="product_product_id"
                                                value="{{ $product_trending->id }}" min="1">
                                            <input type="hidden" id="{{ $product_trending->id }}-product_pname"
                                                value="{{ $product_trending->name_en }}">
                                            <button onclick="addToCartDirect({{ $product_trending->id }})"
                                                class="btn-add-cart">
                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
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
                @endforeach
            </div>

            {{-- Load More Button --}}
            <div class="load-more-container">
                <button type="button" id="load-more-btn" class="load-more-btn">
                    @if (session()->get('language') == 'bangla')
                        আরো দেখুন
                    @else
                        View More
                    @endif
                </button>
            </div>
        </div>
    </section>
    <!-- Latest Products End -->

    <section class="custom_container my-5">
        <div class="about-section">
            <!-- Company Overview -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="overview-card">
                        <div class="brand-badge">
                            <span
                                class="company-initial">{{ substr(get_setting('site_name')->value ?? 'D', 0, 1) }}</span>
                        </div>
                        <h1 class="company-title">{{ get_setting('site_name')->value ?? '' }}</h1>
                        <p class="company-subtitle">Redefining Your Shopping Experience</p>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12">
                    <div class="mission-card">
                        <div class="quote-mark">"</div>
                        <p class="mission-text">
                            Empowering customers with premium products, exceptional service, and innovative shopping
                            solutions.
                            Explore our wide range of categories including
                            @foreach ($featured_category as $key => $fc)
                                @php
                                    if ($key == 5) {
                                        break;
                                    }
                                @endphp
                                <a href="{{ route('product.category', $fc->slug) }}" class="category-link">
                                    {{ $fc->name_en }}@if ($key < 4)
                                        ,
                                    @endif
                                </a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>

            <div class="row features-row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <div class="feature-content">
                            <h3>EMI Available</h3>
                            <p>Flexible payment options with 0% interest installment plans available on selected products
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Warranty Assured</h3>
                            <p>Every product comes with official warranty coverage and genuine product guarantee</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Easy Returns</h3>
                            <p>Hassle-free 3-day return policy with quick refund processing</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="policy-card">
                        <h3>Our Commitment</h3>
                        <div class="policy-points">
                            <div class="policy-item">
                                <i class="fas fa-check-circle"></i>
                                <span>100% Authentic Products</span>
                            </div>
                            <div class="policy-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Secure Payment Options</span>
                            </div>
                            <div class="policy-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Express Delivery</span>
                            </div>
                            <div class="policy-item">
                                <i class="fas fa-check-circle"></i>
                                <span>24/7 Customer Support</span>
                            </div>
                        </div>
                        <a href="#" class="policy-link">Learn More About Our Policies</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('FrontEnd.include.cart-contianer')

    <style>
        .about-section {
            padding: 20px;
        }

        .overview-card {
            background: #ffffff;
            padding: 40px;
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
        }

        .brand-badge {
            width: 80px;
            height: 80px;
            background: #01B45E;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .company-initial {
            color: white;
            font-size: 40px;
            font-weight: 700;
        }

        .company-title {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .company-subtitle {
            font-size: 18px;
            color: #666;
        }

        .mission-card {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 20px;
            position: relative;
        }

        .quote-mark {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 60px;
            color: #01B45E;
            opacity: 0.2;
            font-family: Georgia, serif;
        }

        .mission-text {
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            position: relative;
            z-index: 1;
        }

        .category-link {
            color: #01B45E;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .category-link:hover {
            color: #008c4a;
        }

        .feature-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            height: 100%;
            transition: transform 0.3s;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 36px;
            color: #01B45E;
            margin-bottom: 20px;
        }

        .feature-content h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 15px;
        }

        .feature-content p {
            color: #666;
            line-height: 1.6;
        }

        .policy-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
        }

        .policy-card h3 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .policy-points {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .policy-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .policy-item i {
            color: #01B45E;
        }

        .policy-item span {
            color: #444;
        }

        .policy-link {
            display: block;
            text-align: center;
            color: #01B45E;
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
        }

        .policy-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {

            .overview-card,
            .mission-card,
            .policy-card {
                padding: 20px;
            }

            .company-title {
                font-size: 28px;
            }

            .mission-text {
                font-size: 16px;
            }

            .policy-points {
                grid-template-columns: 1fr;
            }
        }
    </style>
        <style>
        /* Keyframe animations */
        @keyframes pulse {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Base styles */
        .product-section {
            min-height: 100vh;
            padding: 30px 0;
            position: relative;
            overflow: hidden;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 15px;
            position: relative;
            z-index: 2;
        }

        /* Header Section */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background: #01B45E;
            border-radius: 15px;
            padding: 15px 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease;
        }

        .section-header:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .section-title {
            color: whitesmoke;
            font-weight: 600;
            font-size: 1.5rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .title-underline {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
            border-radius: 2px;
            margin-top: 10px;
            animation: glow 2s ease-in-out infinite alternate;
        }

        /* Products Container */
        .products-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        #product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        /* Responsive breakpoints for products grid */
        @media (min-width: 1400px) {
            #product-container {
                grid-template-columns: repeat(6, 1fr);
                gap: 15px;
            }
        }

        @media (min-width: 1200px) and (max-width: 1399px) {
            #product-container {
                grid-template-columns: repeat(6, 1fr);
                gap: 12px;
            }

            .product_card {
                min-width: 190px !important;
                max-width: 190px !important;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            #product-container {
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
            }

            .product_card {
                min-width: 180px !important;
                max-width: 180px !important;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            #product-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .product_card {
                min-width: 170px !important;
                max-width: 170px !important;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            #product-container {
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
            }

            .product_card {
                min-width: 150px !important;
                max-width: 150px !important;
            }

            .product-title {
                font-size: 12px !important;
            }

            .current-price {
                font-size: 14px !important;
            }

            .original-price {
                font-size: 10px !important;
            }

            .btn-primary,
            .btn-secondary {
                padding: 2px 12px !important;
                font-size: 12px !important;
            }
        }

        @media (max-width: 575px) {
            #product-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }

            .product_card {
                min-width: 140px !important;
                max-width: 140px !important;
            }



            .product-title {
                font-size: 11px !important;
                height: 30px !important;
            }

            .current-price {
                font-size: 13px !important;
            }

            .original-price {
                font-size: 9px !important;
            }

            .action-buttons {
                flex-direction: column !important;
                gap: 5px !important;
            }

            .btn-primary,
            .btn-secondary {
                width: 100% !important;
                padding: 2px 12px !important;
                font-size: 12px !important;
            }

            .discount-badge {
                font-size: 8px !important;
                padding: 0px 4px !important;
            }
        }

        /* Extra small devices */
        @media (max-width: 360px) {
            #product-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 6px;
            }

            .product_card {
                min-width: 130px !important;
                max-width: 130px !important;
            }


        }
    </style>



@endsection
@push('js')
    <script>
        var offset = 12;
        $('#load-more-btn').click(function() {
            // Show loader
            showLoader();

            $.ajax({
                url: '/load-more-products',
                method: 'GET',
                data: {
                    offset: offset,
                    count: 12 // Add this line
                },
                success: function(response) {
                    var products = response.products;

                    if (products.length > 0) {
                        products.forEach(function(product) {
                            var discountPercentage = Math.round(((product.regular_price -
                                product.discount_price) / product.regular_price) * 100);


                            var productHtml = `
        <div class="product-card">
            ${(product.discount_price && product.regular_price != product.discount_price) ? `
                                                <div class="discount-badge">
                                                    Save ${Math.round(((product.regular_price - product.discount_price) / product.regular_price) * 100)}%
                                                </div>
                                            ` : ''}

            <div class="product-image">
                <a href="/product/${product.slug}">
                    <img src="${product.product_thumbnail}" alt="Product Image">
                </a>
            </div>

            <div class="product-details">
                <a href="/product/${product.slug}" class="product-link">
                    <h3 class="product-title">
                        ${$("#language_status").val() == 'bangla' ? product.name_bn : product.name_en}
                    </h3>
                </a>

                <div class="price-section">
                    <h4 class="current-price">${product.discount_price} TK</h4>
                    ${(product.regular_price != product.discount_price) ? `
                                                        <span class="original-price">${product.regular_price} TK</span>
                                                    ` : ''}
                </div>

                <div class="action-buttons">
                    ${product.stock_qty > 0 ? (
                                    product.is_varient == 1 ? `
                                                            <button onclick="productView(${product.id})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn-buy-now">
                                                                ${$("#language_status").val() == 'bangla' ? 'কিনুন' : 'Buy Now'}
                                                            </button>
                                                            <button onclick="productView(${product.id})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn-add-cart">
                                                                ${$("#language_status").val() == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart'}
                                                            </button>
                                                        ` : `
                                                            <button onclick="buyNow(${product.id})" class="btn-buy-now">
                                                                ${$("#language_status").val() == 'bangla' ? 'কিনুন' : 'Buy Now'}
                                                            </button>
                                                            <input type="hidden" id="pfrom" value="direct">
                                                            <input type="hidden" id="product_product_id" value="${product.id}" min="1">
                                                            <input type="hidden" id="${product.id}-product_pname" value="${product.name_en}">
                                                            <button onclick="addToCartDirect(${product.id})" class="btn-add-cart">
                                                                ${$("#language_status").val() == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart'}
                                                            </button>
                                                        `
                                ) : `
                                                        <div class="out-of-stock">
                                                            ${$("#language_status").val() == 'bangla' ? 'স্টক আউট' : 'Out of Stock'}
                                                        </div>
                                                    `}
                </div>
            </div>
        </div>
    `;
                            $('.latest-products-grid').append(productHtml);
                        });

                        offset += products.length;
                    } else {
                        $('#load-more-btn').hide();
                    }
                },
                error: function(error) {
                    console.error(error);
                },
                complete: function() {
                    // Hide loader regardless of success or error
                    hideLoader();
                }
            });
        });

        // Enhanced loader styles
        function showLoader() {
            $('#load-more-btn').addClass('loading');
            $('#load-more-btn').html(
                '<span class="spinner" style="display: inline-block; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: #fff; animation: spin 1s linear infinite;"></span> Loading...'
            );
            $('#load-more-btn').css({
                'opacity': '0.7',
                'cursor': 'wait'
            });
        }

        function hideLoader() {
            $('#load-more-btn').removeClass('loading');
            $('#load-more-btn').html('Load More');
            $('#load-more-btn').css({
                'opacity': '1',
                'cursor': 'pointer'
            });
        }

        // Add this CSS to your script tag or to a style tag in your document
        document.head.insertAdjacentHTML('beforeend', `
        <style>
            @keyframes spin {
                to { transform: rotate(360deg); }
            }
            #load-more-btn {
                background: #01B45E;
                color: white;
                border: none;
                border-radius: 10px;
                padding: 12px 24px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                display: block;
                margin: 30px auto;
                box-shadow: 0 5px 15px rgba(255, 71, 87, 0.25);
            }
            #load-more-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(255, 71, 87, 0.35);
            }
        </style>
        `);
    </script>
    <script>
        // Convert PHP date differences to JavaScript format
        var startDiff = <?php echo $start_diff * 1000; ?>;
        var endDiff = <?php echo $end_diff * 1000; ?>;

        // Set the date we're counting down to based on PHP date differences
        var countDownDateStart = new Date(Date.now() + startDiff);
        var countDownDateEnd = new Date(Date.now() + endDiff);

        // Update the count down every 1 second
        var x = setInterval(function() {
                // Get today's date and time
                var now = new Date().getTime();

                // Choose between start and end dates based on your requirement
                var countDownDate = (now < countDownDateStart.getTime()) ? countDownDateStart : countDownDateEnd;

                // Calculate the remaining time
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                // if($('#language_status').val() == 'bangla'){
                //     var html = `<span>${days}দিন</span> : <span>${hours}ঘন্টা</span> : <span>${minutes}মিনিট</span> : <span>${seconds}সেকেন্ড</span>`;
                // }
                //
                // else{
                var html =
                    `<span>${days}D</span> <small>:</small> <span>${hours}H</span> <small>:</small> <span>${minutes}M</span> <small>:</small> <span>${seconds}s</span>`;
                // }


                document.getElementById("demo").innerHTML = html;

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            },
            1000);
    </script>
    <script>
        $("#read_more_btn").click(function() {
            var html = `
                <h4 style="font-size: 17px;">Seamless Online Experience:</h4>
                <p class="my-2 text-dark" style="font-size: 14px;">
                    Navigating our user-friendly website is a breeze. Filter, compare, and explore phones based on features, prices, and brands to find the perfect fit. With detailed product descriptions, images, and customer reviews, you have all the information you need at your fingertips.
                </p>
                <h4 style="font-size: 17px;">Safe and Secure Transactions:</h4>
                <p class="my-2 text-dark" style="font-size: 14px;">
                    Our secure payment gateway ensures that your personal and financial information is protected during every transaction. Shop with confidence, knowing that your data is in safe hands.
                    <span class="text-success font-bold read_less_btn_f" style="cursor: pointer;">Read Less</span>
                </p>
            `;
            $('#read_more_container').html(html);
            $('#read_more_btn').hide();
        });

        $(document).on('click', '.read_less_btn_f', function() {
            $('#read_more_container').empty();
            $('#read_more_btn').show();
        });
    </script>

    <!-- feature section slider -->
    <script>
        $(document).ready(function() {
            $('#featured-products-carousel').owlCarousel({
                loop: true,
                margin: 5,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 2
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    },
                    1400: {
                        items: 5
                    }
                },
                navText: [
                    '<span style="font-size:2rem;line-height:1;">&#8249;</span>',
                    '<span style="font-size:2rem;line-height:1;">&#8250;</span>'
                ]
            });
        });
    </script>

    <!-- flash sale section slider -->
    <script>
        $(document).ready(function() {
            $('#flash-sale-carousel').owlCarousel({
                loop: true,
                margin: 5,
                nav: false,
                dots: false,
                autoplay: false,
                autoplayTimeout: 4000,

                responsive: {
                    0: {
                        items: 2
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    },
                    1400: {
                        items: 3
                    }
                },
                navText: [
                    '<span style="font-size:2rem;line-height:1;">&#8249;</span>',
                    '<span style="font-size:2rem;line-height:1;">&#8250;</span>'
                ]
            });
        });
    </script>

    <script>
        function wholesellerAlert() {
            Swal.fire({
                icon: 'info',
                title: 'You are a Wholeseller!',
                text: 'Please go to your dashboard to manage orders.',
                showCancelButton: true,
                confirmButtonText: 'Go to Dashboard',
                cancelButtonText: 'Close',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d', // gray for close
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('wholeseller.dashboard') }}";
                }
            });
        }
    </script>
@endpush
