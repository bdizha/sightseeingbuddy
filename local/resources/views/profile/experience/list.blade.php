<div class="blog-list text-align-center">
    <div class="row vertilize">
        @foreach($experiences as $experience)
            <div class="col-md-3 col-sm-3 col-xs-6 col-xs-6-full">
                <article class="media media-responsive same-height" data-mh="experience">
                    <div class="media-top pull-top">
                        <a href="/local/experience/{{ $experience->slug }}">
                            <img class="media-object" src="{{ $experience->cover_image }}"
                                 alt="{{ $experience->teaser }}" title="{{ $experience->teaser }}">
                        </a>
                    </div>
                    <div class="media-body">
                        <h2 class="media-heading">
                            <a href="/local/experience/{{ $experience->slug }}">
                                {{ str_limit($experience->teaser, 35) }}
                            </a>
                        </h2>
                        <div class="media-summary">
                            {{ str_limit($experience->description) }}
                        </div>
                        <div class="readmore mt-1">
                            <a href="/local/experience/{{ $experience->slug }}" class="btn btn-default">View</a>
                        </div>
                        <div class="readmore mt-1">
                            <a href="/local/info/{{ $experience->id }}/edit" class="btn btn-default">Edit</a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach

        @if(empty($experiences->count()))
            <div class="text-center">
                No experiences found :(
            </div>
        @endif
    </div>
</div>