<div id="review" class="tabcontent">
    <h4 class="mb-4 border-bottom pb-2" style="margin-left: 25px;">Customer Reviews ({{ $product->reviews->count() }})
    </h4>

    @if ($product->reviews->count())
        <div class="review-slider-wrapper">
            <div class="review-slider" id="reviewSlider">
                @foreach ($product->reviews as $review)
                    <div class="review-slide">
                        <div class="review-card">
                            <div class="review-header">
                                <div class="avatar">
                                    {{ strtoupper(substr($review->user->name ?? 'G', 0, 1)) }}
                                </div>
                                <div class="user-info">
                                    <strong>{{ $review->user->name ?? 'Guest' }}</strong>
                                    {{-- <small>{{ $review->email }}</small> --}}
                                </div>

                            </div>

                            <div class="review-content">
                                <p>{{ $review->content }}</p>
                                <div class="mb-2 " style="color:#fdb916;">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                    @endfor
                                </div>
                                <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Controls --}}
            <button class="slider-btn prev" onclick="slideReview(-1)">&#10094;</button>
            <button class="slider-btn next" onclick="slideReview(1)">&#10095;</button>
        </div>
    @else
        <p>No reviews yet. Be the first to review!</p>
    @endif

</div>
<style>
    .review-slider-wrapper {
        position: relative;
        width: 100%;
        margin: auto;
        overflow: hidden;
    }

    .review-slider {
        display: flex;
        transition: transform 0.5s ease;
    }

    .review-slide {
        min-width: 100%;
        box-sizing: border-box;
        padding: 1rem;
    }

    .review-card {
        background: #fff;
        border-radius: 10px;
        padding: 4rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .avatar {
        width: 50px;
        height: 50px;
        background: #007bff;
        color: #fff;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        margin-right: 10px;
    }

    .user-info small {
        display: block;
        color: #777;
    }

    .slider-btn {
        position: absolute;
        top: 50%;
        color: #000;
        border: none;
        margin: 10px;
        font-size: 24px;
        padding: 8px 12px;
        cursor: pointer;
        z-index: 1;
        border-radius: 50%;
    }

    .slider-btn.prev {
        left: 10px;
    }

    .slider-btn.next {
        right: 10px;
    }
</style>
<script>
    let currentReviewSlide = 0;

    function slideReview(direction) {
        const slider = document.getElementById('reviewSlider');
        const slides = slider.querySelectorAll('.review-slide');
        const totalSlides = slides.length;

        // Update index based on direction
        currentReviewSlide += direction;

        // Loop back if out of bounds
        if (currentReviewSlide < 0) currentReviewSlide = totalSlides - 1;
        if (currentReviewSlide >= totalSlides) currentReviewSlide = 0;

        // Slide to the correct position
        slider.style.transform = `translateX(-${currentReviewSlide * 100}%)`;
    }
</script>
