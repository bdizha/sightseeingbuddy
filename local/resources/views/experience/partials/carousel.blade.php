<div class="carousel slick-carousel-default">
    <div data-slick-carousel-default class="carousel-inner">
        @foreach($gallery as $key => $image)
            <div class="item">
                {!! $image !!}
                <div class="carousel-caption">
                    <div class="container">
                        <div class="table-block">
                            <div class="left-cell">
                                <h1>{{ str_limit($experience->teaser, 300) }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        @endforeach
    </div>
</div>