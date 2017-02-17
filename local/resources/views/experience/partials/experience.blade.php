@foreach ($shot->comments as $comment)
    @include('shot.partials.comment', ['comment' => $comment]) 
@endforeach