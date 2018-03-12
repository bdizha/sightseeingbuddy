<div class="search-list">
    <div class="row vertilize">
        @if($experiences->count() == 0)
            <div class="pb-1">
                <p class="text-align-center">
                    Your search didn't return any results.
                </p>
            </div>
        @endif
        <?php $ratings = ['Excellent', 'Very good', 'Average', 'Poor', 'Terrible'] ?>
        @foreach($experiences as $experience)
            <div class="col-xs-12 col-sm-6">
                <article class="media media-responsive same-height" data-mh="experience">
                    <div class="media-top pull-top">
                        <a href="/local/experience/{{ $experience->slug }}">
                            {!! $experience->cover_image !!}
                            <div class="media-overlay"></div>
                        </a>
                    </div>
                    <div class="media-footer">
                        {{ str_limit($experience->teaser, 24) }}
                        <span>
                            <span>|</span>
                            <span class="data-currency"
                                  data-currency-base="{{ str_replace("R", "", $experience->pricing->per_person) }}">
                                {{ $experience->pricing->per_person }}
                            </span>
                            <span>|</span>
                            <span>{{ $experience->duration }}</span>
                            <span>{{ $experience->units }}</span>
                        </span>
                    </div>
                    <div class="rating-box">
                        @foreach($ratings as $key => $rating)
                            <div class="rating star<?php echo ($key + 1 <= ceil($experience->average_rating)) ? ' star-filled' : '' ?>"></div>
                        @endforeach
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</div>