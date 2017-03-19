<div class="search-list">
    <div class="row vertilize">
        @foreach($experiences as $experience)
        <div class="col-xs-12 col-sm-6">
            <article class="media media-responsive same-height" data-class="experience">
                <div class="media-top pull-top">
                    <a href="/local/experience/{{ $experience->id }}">
                        <img class="media-object" src="{{ $experience->cover_image }}" alt="{{ $experience->teaser }}" title="{{ $experience->teaser }}">
                    </a>                
                </div>
                <div class="media-footer">
                    {{ str_limit($experience->teaser, 28) }} 
                    <span class="hidden-xs">
                        | R{{ $experience->pricing->per_person }} |
                        {{ $experience->duration }}
                    </span>
                    <a class="pull-right hidden-xs" href="/local/experience/{{ $experience->slug }}">            
                        View
                    </a>  
                    <div class="hidden-md hidden-lg hidden-sm mt-1">
                        <div class="pull-left">
                            R{{ $experience->pricing->per_person }} |
                            {{ $experience->duration }}
                        </div>
                        <div class="pull-right">
                            <a href="/local/experience/{{ $experience->slug }}" class="btn btn-default">View</a>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </article>
        </div>
        @endforeach
    </div>                        
</div>