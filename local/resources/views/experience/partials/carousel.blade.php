<div class="carousel slick-carousel-default experience-carousel">
    <div data-slick-carousel-auto-width class="carousel-inner">
        @foreach($galleryImages as $key => $image)
            <div class="item">
                <img src="{{ $image }}" style="height: 540px; min-height: 540px;"/>
            </div>
        @endforeach
    </div>
    {{--<div class="carousel-caption">--}}
        {{--<div class="container">--}}
            {{--<h1>{{ str_limit($experience->teaser, 300) }}</h1>--}}
        {{--</div>--}}
    {{--</div>--}}
    <a href="#" target="_blank" id="show-images" class="btn btn-default btn-images">View Photos</a>
</div>
<script type="text/javascript" src="/ilightbox/js/jquery.requestAnimationFrame.js"></script>
<script type="text/javascript" src="/ilightbox/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/ilightbox/js/ilightbox.packed.js"></script>
<script type="text/javascript">
    $('#show-images').click(function () {
        $.iLightBox(
            {!! json_encode($gallery) !!},
            {
                skin: 'metro-black',
                path: 'horizontal',
                fullAlone: 0,
                controls: {
                    arrows: 1,
                    slideshow: 1
                }
            }
        );
        return false;
    });
</script>