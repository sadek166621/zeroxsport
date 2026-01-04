@forelse($reviews as $review)
<div class="review-item">
    <div class="review-header">
        <div class="reviewer-info">
            <div class="reviewer-avatar">
                {{ strtoupper(substr($review->user->name ?? 'A', 0, 1)) }}
            </div>
            <div class="reviewer-details">
                <h4>
                    {{ $review->user->name ?? 'Anonymous' }}
                    @if($review->verified_purchase)
                    <span class="verified-badge">
                        <i class="fa fa-check-circle"></i>
                        Verified Purchase
                    </span>
                    @endif
                </h4>
                <div class="review-stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star {{ $i <= $review->rating ? '' : 'empty' }}">★</span>
                        @endfor
                </div>
            </div>
        </div>
        <div class="review-date">
            {{ $review->created_at->diffForHumans() }}
        </div>
    </div>

    <div class="review-content">
        <p class="review-text">{{ $review->body }}</p>

        @if(isset($review->images) && count($review->images) > 0)
        <div class="review-images">
            @foreach($review->images as $image)
            <div class="review-image">
                <img src="{{ asset($image) }}" alt="Review Image">
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <div class="review-footer">
        <div class="review-action">
            <i class="fa fa-thumbs-up"></i>
            <span>Helpful ({{ $review->helpful_count ?? 0 }})</span>
        </div>
    </div>
</div>
@empty
<div style="text-align: center; padding: 40px; color: #9e9e9e;">
    <i class="fa fa-star-o" style="font-size: 48px; margin-bottom: 16px;"></i>
    <p>No reviews yet. Be the first to review this product!</p>
</div>
@endforelse