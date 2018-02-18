<div class="modal fade read-modal in" id="read-modal-{{ $message->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">
                    Message
                </h3>
            </div>
            @include('message.partials.header')
            <div class="modal-body">
                @foreach($replies as $key => $reply)
                    <div class="{{ $reply->sender->id !== $user->id ? "even " : "odd " }}css-xgcy47">
                        <div class="css-sthfzb">
                            <img src="/images/guest-even.svg" alt="BM">
                        </div>
                        <div class="css-1q6y32d">
                            <h5 class="css-c2roij">
                                {{ $reply->sender->first_name  }}
                                <span>
                                    &nbsp;
                                    {{ \Carbon\Carbon::parse($reply->updated_at)->format("d/m/Y") }}
                                    {{ \Carbon\Carbon::parse($reply->updated_at)->format("H\hi") }}
                                </span>
                            </h5>
                            <div class="css-185k9nw">
                                <span class="Linkify">
                                {!! $reply->content !!}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="{{ $message->sender->id !== $user->id ? "even " : "odd " }}css-xgcy47">
                    <div class="css-sthfzb">
                        <img src="/images/guest-even.svg" alt="BM">
                    </div>
                    <div class="css-1q6y32d">
                        <h5 class="css-c2roij">
                            {{ $message->sender->first_name  }}
                            <span>
                                    &nbsp;
                                {{ \Carbon\Carbon::parse($message->created_at)->format("d/m/Y") }}
                                {{ \Carbon\Carbon::parse($message->created_at)->format("H\hi") }}
                                </span>
                        </h5>
                        <div class="css-185k9nw">
                            <span class="Linkify">
                                {!! $message->content !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button modal-id="read-modal-{{ $message->id }}" data-id="{{ $message->id }}" type="button"
                        class="btn btn-yellow btn-close btn-reply">Reply
                </button>
            </div>
        </div>
    </div>
</div>