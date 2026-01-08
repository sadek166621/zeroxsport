@extends('FrontEnd.master')
@section('title', 'Contact Us')
@section('content')

    <style>
        .contact-card {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(2, 12, 30, 0.12);
            overflow: hidden;
        }

        .info-pane {
            background: #026544;
            color: #fff;
            padding: 32px;
        }

        .info-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-right: 12px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.08);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            color: #fff;
        }

        .form-floating .form-control:focus {
            box-shadow: none;
        }

        .btn-gradient {
            background: #026544;
            border: none;
        }

        @media (max-width: 767px) {
            .contact-hero {
                padding: 20px
            }

            .info-pane {
                padding: 20px
            }
        }
    </style>

    <section class="container my-5">
        <div class="contact-card contact-hero">
            <div class="row g-0 align-items-stretch">
                <!-- Left Info Pane -->
                <div class="col-lg-5 info-pane d-flex flex-column justify-content-between">
                    <div>
                        <h2 class="mb-3">Let's Talk</h2>
                        <p class="mb-4 lead">{{ get_setting('short_description')->value }}</p>

                        <div class="d-flex align-items-start mb-3">
                            <div class="info-icon"><i class="fa fa-map-marker-alt"></i></div>
                            <div>
                                <h5 class="mb-0 text-white">Address</h5>
                                <small>{{ get_setting('business_address')->value }}</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <div class="info-icon"><i class="fa fa-phone-alt"></i></div>
                            <div>
                                <h5 class="mb-0 text-white">Phone</h5>
                                <small>{{ get_setting('phone')->value }}</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-start">
                            <div class="info-icon"><i class="fa fa-envelope-open"></i></div>
                            <div>
                                <h5 class="mb-0 text-white">Email</h5>
                                <small>{{ get_setting('email')->value }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex align-items-center">
                        <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-instagram"></i></a>

                    </div>
                </div>

                <!-- Right Form Pane -->
                <div class="col-lg-7 bg-white p-4 p-lg-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="mb-0">Send Us a Message</h3>
                        @if(session('message'))
                            <span class="badge bg-success">{{ session('message') }}</span>
                        @endif
                    </div>

                    <form action="{{ route('message.submit') }}" method="post" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject"
                                        class="form-control @error('subject') is-invalid @enderror" id="subject"
                                        placeholder="Subject" required>
                                    <label for="subject">Subject</label>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                        placeholder="Leave a message here" id="message" style="height:140px"
                                        required></textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <small class="text-muted">We reply within 24 hours.</small>
                                <button type="submit" class="btn btn-gradient text-white px-4 py-2">
                                    <i class="fa fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Optional: small map preview -->
                    <div class="mt-4">
                        <div class="ratio ratio-16x9 rounded">
                            <iframe
                                src="https://www.google.com/maps?q={{ urlencode(get_setting('business_address')->value) }}&output=embed"
                                style="border:0" allowfullscreen loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection