@forelse($reviews as $review)
<div class="border rounded p-3 mb-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            @for($i = 1; $i <= 5; $i++)
                <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }} text-warning"></i>
            @endfor
        </div>
        <small class="text-muted">{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}</small>
    </div>
    <div class="mb-1">
        <span class="font-weight-bold">{{ $review->user->name ?? 'Anonymous' }}</span>
        @if($review->verified_purchase)
            <span class="ml-2 text-success"><i class="fa fa-check-circle"></i> Verified Purchase</span>
        @endif
    </div>
    <p class="mb-0">{{ $review->body }}</p>
    @if($review->image)
        @php $images = json_decode($review->image, true); @endphp
        @if(is_array($images))
            <div class="mt-2">
                @foreach($images as $image)
                    <img src="{{ asset($image) }}" alt="Review Photo" class="img-fluid mr-2 mb-2" style="max-width: 150px; height: auto;">
                @endforeach
            </div>
        @endif
    @endif
</div>
@empty
<div class="text-muted">No reviews yet.</div>
@endforelse
