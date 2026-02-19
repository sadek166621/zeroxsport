@extends('FrontEnd.master')
@section('title', 'Contact Us')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="contact-section">
        <div class="container">
            <div class="contact-container">
                <div class="row g-0">
                    <!-- Contact Information -->
                    <div class="col-lg-4 contact-info">
                        <h2>Get In Touch</h2>
                        <p>{{ get_setting('short_description')->value }}</p>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="info-details">
                                <h3>Address</h3>
                                <p>{{ get_setting('business_address')->value }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="info-details">
                                <h3>Phone</h3>
                                <p>{{ get_setting('phone')->value }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="info-details">
                                <h3>Email</h3>
                                <p>{{ get_setting('email')->value }}</p>
                            </div>
                        </div>

                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-lg-8 contact-form">
                        <div class="form-header">
                            <h2>Send Us a Message</h2>
                            @if(session('message'))
                                <span class="success-badge">{{ session('message') }}</span>
                            @endif
                        </div>

                        <form action="{{ route('message.submit') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="subject">Subject *</label>
                                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Enter subject" required>
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Message *</label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="5" placeholder="Enter your message" required></textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn-submit">
                                        <i class="fa fa-paper-plane"></i> Send Message
                                    </button>
                                    <p class="form-note">We reply within 24 hours.</p>
                                </div>
                            </div>
                        </form>

                        <!-- Map -->
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps?q={{ urlencode(get_setting('business_address')->value) }}&output=embed" allowfullscreen loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Page Header */
        .page-header {
            background-color: #006A4E;
            padding: 40px 0;
            margin-bottom: 50px;
        }

        .page-header h1 {
            color: white;
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            color: white;
        }

        .breadcrumb-item.active {
            color: white;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
        }

        /* Contact Section */
        .contact-section {
            padding: 0 15px 60px;
        }

        .contact-container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Contact Info */
        .contact-info {
            background-color: #006A4E;
            color: white;
            padding: 40px 30px;
        }

        .contact-info h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .contact-info > p {
            font-size: 0.95rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .info-item {
            display: flex;
            margin-bottom: 25px;
        }

        .info-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .info-icon i {
            font-size: 1.1rem;
            color: white;
        }

        .info-details h3 {
            font-size: 1rem;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .info-details p {
            font-size: 0.9rem;
            margin: 0;
            opacity: 0.9;
        }

        .social-links {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }

        .social-links a {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: background 0.3s;
        }

        .social-links a:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        /* Contact Form */
        .contact-form {
            padding: 40px;
        }

        .form-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-header h2 {
            font-size: 1.5rem;
            color: #006A4E;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .success-badge {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 0.85rem;
            margin-left: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.95rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #006A4E;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn-submit {
            background-color: #006A4E;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #005a41;
        }

        .btn-submit i {
            margin-right: 8px;
        }

        .form-note {
            display: inline-block;
            margin-left: 15px;
            color: #666;
            font-size: 0.85rem;
        }

        /* Map */
        .map-container {
            margin-top: 30px;
            height: 300px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* Mobile Responsive */
        @media (max-width: 991px) {
            .contact-info {
                padding: 30px 25px;
            }

            .contact-form {
                padding: 30px 25px;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 30px 0;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }

            .contact-info h2,
            .form-header h2 {
                font-size: 1.3rem;
            }

            .form-note {
                display: block;
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>

@endsection