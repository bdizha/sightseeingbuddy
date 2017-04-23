<div class="carousel slick-carousel-three">
    <div class="container relative-container">
        <div class="carousel-caption">
            {{ $experience->teaser }}
        </div>
    </div>
    <!-- Wrapper for slides -->
    <div data-slick-carousel-three class="carousel-inner">
        @foreach($experience->gallery as $key => $image)
        <div class="item">
            <img src="{{ $image->image }}" alt="{{ $experience->teaser }}" title="{{ $experience->teaser }}" class="img-responsive">
        </div>
        @endforeach
    </div>
</div>