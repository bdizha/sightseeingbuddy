<div class="search-list">
    <div class="row vertilize">
        @foreach($experiences as $experience)
        <div class="col-xs-12 col-sm-6">
            <article class="media media-responsive same-height" data-mh="experience">
                <div class="media-top pull-top">
                    <a href="/local/experience/{{ $experience->slug }}">
                        {!! $experience->cover_image !!}
                    </a>
                </div>
                <div class="media-footer">
                    {{ str_limit($experience->teaser, 29) }}
                    <span>
                        <span>|</span>
                        <span class="data-currency" data-currency-base="{{ str_replace("R", "", $experience->pricing->per_person) }}">
                            {{ $experience->pricing->per_person }}
                        </span>
                        <span>|</span>
                        <span>{{ $experience->duration }}</span>
                        <span>{{ $experience->units }}</span>
                    </span>
                    <a href="/local/experience/{{ $experience->slug }}" class="btn btn-primary pull-right">View</a>
                    <div class="clear-both"></div>
                </div>
            </article>
        </div>
        @endforeach
    </div>
</div>