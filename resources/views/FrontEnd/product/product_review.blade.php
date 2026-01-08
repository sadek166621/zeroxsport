@extends('FrontEnd.master')

@section('title', 'Write a Review')

@section('content')
<div class="review-page-wrapper">
    <div class="container py-2">
        @if($product)
            <!-- Page Header -->
            <div class="review-header text-center mb-2">
                
                <h1 class="page-title">Share Your Experience</h1>
                <p class="page-subtitle">Your feedback helps others make informed decisions</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Product Card -->
                    <div class="product-review-card mb-4">
                        <div class="product-badge">Product Review</div>
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center mb-3 mb-md-0">
                                <div class="product-image-wrapper">
                                    <img src="{{ asset($product->product_thumbnail ?? 'images/default-product.png') }}" 
                                         alt="{{ $product->name_en ?? 'Product' }}" 
                                         class="product-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h4 class="product-title">{{ $product->name_en }}</h4>
                                @php $data = calculateDiscount($product->id); @endphp
                                <div class="product-pricing">
                                    @if($product->discount_price)
                                        <span class="current-price">৳{{ number_format($data['discount'], 2) }}</span>
                                        <span class="original-price">৳{{ number_format($product->regular_price, 2) }}</span>
                                        <span class="discount-badge">SALE</span>
                                    @else
                                        <span class="current-price">৳{{ number_format($product->regular_price, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Form Card -->
                    <div class="review-form-card">
                        <div class="form-header">
                            <h3 class="form-title">Tell Us What You Think</h3>
                            <p class="form-description">Share your honest opinion to help other customers</p>
                        </div>

                        <form action="{{ route('product.review.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <!-- Rating Section -->
                            <div class="form-section">
                                <label class="section-label">
                                    <i class="fas fa-star-half-alt me-2"></i>
                                    Overall Rating <span class="required">*</span>
                                </label>
                                <p class="section-help">How would you rate this product?</p>
                                
                                <div class="rating-container">
                                    <div class="star-rating">
                                        @for ($i = 5; $i >= 1; $i -= 1)
                                            @php $id = 'star' . $i; @endphp
                                            <input type="radio" id="{{ $id }}" name="rating" value="{{ $i }}" required />
                                            <label for="{{ $id }}" title="{{ $i }} stars">
                                                <i class="fas fa-star"></i>
                                            </label>
                                        @endfor
                                    </div>
                                    <span class="rating-text" id="ratingText">Select a rating</span>
                                </div>
                                
                                @error('rating')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Review Text Section -->
                            <div class="form-section">
                                <label for="body" class="section-label">
                                    <i class="fas fa-comment-dots me-2"></i>
                                    Your Review <span class="required">*</span>
                                </label>
                                <p class="section-help">Share details about your experience with this product</p>
                                <textarea name="body" 
                                          id="body" 
                                          rows="6" 
                                          class="form-control-custom" 
                                          placeholder="What did you like or dislike? How did you use this product? What should others know before buying?"
                                          required>{{ old('body') }}</textarea>
                                <div class="character-count">
                                    <small><span id="charCount">0</span> characters</small>
                                </div>
                                @error('body')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Photo Upload Section -->
                            <div class="form-section">
                                <label for="photo" class="section-label">
                                    <i class="fas fa-camera me-2"></i>
                                    Add Photos <span class="optional">(Optional)</span>
                                </label>
                                <p class="section-help">Photos help other customers see the product in real use</p>
                                
                                <div class="upload-area">
                                    <input type="file" 
                                           name="photo[]" 
                                           id="photo" 
                                           class="file-input" 
                                           multiple 
                                           accept="image/*">
                                    <label for="photo" class="upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span class="upload-text">Click to upload or drag and drop</span>
                                        <span class="upload-hint">PNG, JPG, JPEG (Max 5MB each)</span>
                                    </label>
                                </div>
                                <div id="previewContainer" class="preview-container"></div>
                                
                                @error('photo.*')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-actions">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Submit Review
                                </button>
                                <a href="{{ route('home') }}" class="btn-cancel">Cancel</a>
                            </div>
                        </form>
                    </div>

                    <!-- Trust Badges -->
                    <div class="trust-section text-center mt-4">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-shield-alt trust-icon"></i>
                                <p class="trust-text">Verified Reviews</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-user-lock trust-icon"></i>
                                <p class="trust-text">Privacy Protected</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-check-circle trust-icon"></i>
                                <p class="trust-text">Community Driven</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="error-state">
                <div class="error-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3 class="error-title">Product Not Found</h3>
                <p class="error-message">The product you're trying to review could not be found. Please go back and select a valid product.</p>
                <a href="{{ route('home') }}" class="btn-back-home">
                    <i class="fas fa-arrow-left me-2"></i>Back to Home
                </a>
            </div>
        @endif
    </div>
</div>

<style>
    :root {
        --primary-color: #026142;
        --primary-dark: #014d34;
        --primary-light: #e8f5f0;
        --accent-color: #ffa500;
        --text-dark: #2d3748;
        --text-muted: #718096;
        --border-color: #e2e8f0;
        --error-color: #e53e3e;
        --success-color: #38a169;
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .review-page-wrapper {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8f5f0 100%);
        min-height: 100vh;
    }

    /* Header Styles */
    .review-header {
        position: relative;
    }


    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        font-size: 1.1rem;
        color: var(--text-muted);
    }

    /* Product Card */
    .product-review-card {
        background: white;
        border-radius: 16px;
        padding: 1rem;
        box-shadow: var(--shadow-md);
        position: relative;
        overflow: hidden;
        border: 2px solid var(--border-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-review-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .product-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: var(--primary-color);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .product-image-wrapper {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        border-radius: 12px;
        overflow: hidden;
        border: 3px solid var(--primary-light);
        box-shadow: var(--shadow-sm);
    }

    .product-thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.75rem;
    }

    .product-pricing {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .current-price {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .original-price {
        font-size: 1.1rem;
        color: var(--text-muted);
        text-decoration: line-through;
    }

    .discount-badge {
        background: #ff4444;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Review Form Card */
    .review-form-card {
        background: white;
        border-radius: 16px;
        padding: 2.5rem;
        box-shadow: var(--shadow-md);
        border: 2px solid var(--border-color);
    }

    .form-header {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--primary-light);
    }

    .form-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .form-description {
        color: var(--text-muted);
        margin: 0;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid var(--border-color);
    }

    .form-section:last-of-type {
        border-bottom: none;
    }

    .section-label {
        display: block;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .section-label i {
        color: var(--primary-color);
    }

    .required {
        color: var(--error-color);
    }

    .optional {
        color: var(--text-muted);
        font-weight: 400;
        font-size: 0.9rem;
    }

    .section-help {
        font-size: 0.9rem;
        color: var(--text-muted);
        margin-bottom: 1rem;
    }

    /* Star Rating */
    .rating-container {
        background: var(--primary-light);
        padding: 1.5rem;
        border-radius: 12px;
        text-align: center;
    }

    .star-rating {
        direction: rtl;
        display: inline-flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        cursor: pointer;
        font-size: 2.5rem;
        color: #d1d5db;
        transition: all 0.2s ease;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label,
    .star-rating input[type="radio"]:checked ~ label {
        color: var(--accent-color);
        transform: scale(1.1);
    }

    .rating-text {
        display: block;
        font-size: 1rem;
        font-weight: 600;
        color: var(--primary-color);
    }

    /* Form Controls */
    .form-control-custom {
        width: 100%;
        padding: 1rem;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: inherit;
        resize: vertical;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px var(--primary-light);
    }

    .character-count {
        text-align: right;
        margin-top: 0.5rem;
        color: var(--text-muted);
    }

    /* File Upload */
    .upload-area {
        position: relative;
        margin-bottom: 1rem;
    }

    .file-input {
        display: none;
    }

    .upload-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 3rem 2rem;
        border: 3px dashed var(--border-color);
        border-radius: 12px;
        background: var(--primary-light);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .upload-label:hover {
        border-color: var(--primary-color);
        background: white;
    }

    .upload-label i {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .upload-text {
        display: block;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .upload-hint {
        display: block;
        font-size: 0.9rem;
        color: var(--text-muted);
    }

    .preview-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .preview-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        aspect-ratio: 1;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 1rem 3rem;
        border: none;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-cancel {
        background: white;
        color: var(--text-dark);
        padding: 1rem 2rem;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        background: var(--border-color);
    }

    /* Trust Section */
    .trust-section {
        margin-top: 3rem;
    }

    .trust-icon {
        font-size: 2rem;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .trust-text {
        font-size: 0.9rem;
        color: var(--text-muted);
        margin: 0;
        font-weight: 500;
    }

    /* Error Messages */
    .error-message {
        color: var(--error-color);
        font-size: 0.9rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
    }

    /* Error State */
    .error-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 16px;
        box-shadow: var(--shadow-md);
        max-width: 600px;
        margin: 0 auto;
    }

    .error-icon {
        width: 100px;
        height: 100px;
        background: #fef5e7;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .error-icon i {
        font-size: 3rem;
        color: var(--accent-color);
    }

    .error-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1rem;
    }

    .error-message {
        color: var(--text-muted);
        margin-bottom: 2rem;
    }

    .btn-back-home {
        display: inline-flex;
        align-items: center;
        background: var(--primary-color);
        color: white;
        padding: 1rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-back-home:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-title {
            font-size: 1.75rem;
        }

        .product-review-card,
        .review-form-card {
            padding: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
        }
    }
</style>

<script>
    // Character counter for review textarea
    document.getElementById('body')?.addEventListener('input', function() {
        const count = this.value.length;
        document.getElementById('charCount').textContent = count;
    });

    // Rating text update
    const ratingInputs = document.querySelectorAll('input[name="rating"]');
    const ratingTexts = ['Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
    
    ratingInputs.forEach((input, index) => {
        input.addEventListener('change', function() {
            const ratingValue = parseInt(this.value);
            document.getElementById('ratingText').textContent = ratingTexts[ratingValue - 1] + ' (' + ratingValue + ' stars)';
        });
    });

    // Image preview
    document.getElementById('photo')?.addEventListener('change', function(e) {
        const previewContainer = document.getElementById('previewContainer');
        previewContainer.innerHTML = '';
        
        Array.from(e.target.files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'preview-item';
                    div.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection