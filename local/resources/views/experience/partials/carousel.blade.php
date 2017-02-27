<div class="carousel">
    <!-- Wrapper for slides -->
    <div data-slick-carousel-default class="carousel-inner">
        @foreach($experience->gallery as $key => $image)
        <div class="item {{ $key == 0 ? "active" : "" }}">
            <img src="{{ $image->image }}" alt="{{ $experience->teaser }}" class="img-responsive">
            <a href="#">
                <div class="carousel-caption">
                    <p class="caption-bg">
                        {{ $experience->teaser }}
                    </p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>