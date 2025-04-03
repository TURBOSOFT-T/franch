<div>
    <div class="product-reviews">
        <div class="review-summary">
            <h4>Avis Clients</h4>
            @if($averageRating)
                <div class="average-rating">
                    <p>Note moyenne : {{ number_format($averageRating, 1) }}/5</p>
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fal fa-star {{ $i <= round($averageRating) ? 'text-warning' : '' }}"></i>
                        @endfor
                    </div>
                </div>
            @else
                <p>Aucun avis pour le moment</p>
            @endif
        </div>
    
        <div class="review-list">
            @forelse($reviews as $review)
                <div class="single-review">
                    <div class="review-header">
                       <h5>{{ $review->user->premon }}  {{$review->user->nom}}</h5>
                        <div class="rating">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fal fa-star {{ $i <= $review->rating ? 'text-warning' : '' }}"></i>
                            @endfor
                        </div>
                    </div>
                    <p class="review-date">{{ $review->created_at->format('d M Y') }}</p>
                    <p class="review-content">{{ $review->review }}</p>
                </div>
            @empty
                <p>Aucun avis n'a été posté pour ce produit.</p>
            @endforelse
        </div>
    </div>
</div>
