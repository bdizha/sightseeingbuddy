@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    <section id="page" class="booking-block">
        @include('profile.partials.header', ['user' => $user, 'section' => 'search', 'title' => 'Your messages'])
    </section>

    <section id="page" class="gray-block dashboard-block">
        <div class="container profile">

            @include('profile.partials.tabs', ['user' => $user, 'title' => '', 'tab' => 'messages'])
            <div class="gray-bottom-border mb-1"></div>

            <h1 id="experiences" class="page-title page-title-center">
                My messages
            </h1>

            @if(!empty($experience))
                @include("message.partials.compose", ['experience' => $experience, "message" => new App\Message()])
            @endif
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Guest Name</th>
                    <th class="mobile-none">Experience</th>
                    <th class="mobile-none">Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $k => $message)
                    <tr class="{{ $message->is_read || $message->has_replied ? "" : "text-bold" }}"
                        id="message-{{ $message->id }}">
                        <td scope="row">{{ $message->sender->first_name }}</td>
                        <td class="mobile-none">{{ str_limit($message->experience->teaser, 50) }}</td>
                        <td class="mobile-none">{{ \Carbon\Carbon::parse($message->created_at)->format("d/m/Y") }}</td>
                        <td>{{ \Carbon\Carbon::parse($message->created_at)->format("H\hi") }}</td>
                        <td>{{ $message->status }}</td>
                        <td>
                            <button class="btn btn-default btn-modal modal-read" data-read-id="{{ $message->id }}"
                                    modal-id="read-modal-{{ $message->id }}">
                                Read
                            </button>
                            <button class="btn btn-default btn-modal mobile-none" modal-id="respond-modal-{{ $message->id }}">
                                Reply
                            </button>
                            @include("message.partials.read", ['message' => $message, 'replies' => $message->replies])
                            @include("message.partials.reply", ['message' => $message, 'experience' => $message->experience])
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @if(empty($messages->count()))
                    <tfoot>
                    <tr>
                        <td colspan="6">
                            No messages found :(
                        </td>
                    </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </section>

    @if(!empty($messageId))
        <script type="text/javascript">
            $(document).ready(function () {
                var messageId = {{ $messageId }};
                $("#message-" + messageId).removeClass("text-bold");

                $("#read-modal-" + messageId).modal("show");

                $.get("/local/messages/read/" + messageId, function (data) {
                    console.log("read message");
                });
            });
        </script>
    @endif
    <script type="text/javascript">
        $(".btn-reply").click(function () {
            var messageId = $(this).attr("data-id");
            $("#respond-modal-" + messageId).modal("show");
            console.log("replying ...", messageId);
        });

        $(".modal-read").click(function () {
            var messageId = $(this).attr("data-read-id");
            $("#message-" + messageId).removeClass("text-bold");

            $.get("/local/messages/read/" + messageId, function (data) {
                console.log("read message");
            });
        });
    </script>

    <style type="text/css">
        .css-xgcy47, [data-css-xgcy47] {
            display: flex;
            font-size: 14px;
            padding: 6px 0px;
        }

        @media screen and (min-width: 1024px) {
            .css-sthfzb, [data-css-sthfzb] {
                font-size: 16px;
                width: 45px;
                height: 45px;
                margin-right: 0px;
            }
        }

        .css-sthfzb, [data-css-sthfzb] {
            width: 35px;
            height: 35px;
            background-color: #1a75bb;
            color: white;
            font-weight: 700;
            display: flex;
            margin-right: 6px;
            font-size: 12px;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden;
            flex: 0 0 auto;
            padding: 5px;
        }

        .css-sthfzb img, [data-css-sthfzb] img {
            max-width: none;
            height: auto;
            min-height: 100%;
            width: 100%;
        }

        @media screen and (min-width: 1024px) {
            .css-1q6y32d, [data-css-1q6y32d] {
                margin-left: 18px;
                padding: 18px 24px;
            }

        }

        .css-1q6y32d {
            background-color: rgba(63, 63, 63, 0.15);
            position: relative;
            word-wrap: break-word;
            word-break: break-word;
            max-width: 100%;
            border-width: 1px;
            border-style: solid;
            border-color: rgba(63, 63, 63, 0.15);
            border-image: initial;
            border-radius: 4px;
            padding: 12px;
            flex: 1 1 0%;
        }

        @media screen and (max-width: 767px) {
            .mobile-none {
                display: none;
            }
        }

        .css-185k9nw a {
            color: #1a75bb;
        }

        .even .css-1q6y32d {
            background-color: rgba(255, 255, 255, 1);
            border-color: rgba(255, 255, 255, 1);
        }

        @media screen and (min-width: 1024px) {
            .css-c2roij, [data-css-c2roij] {
                margin-bottom: 6px;
            }
        }

        .css-c2roij, [data-css-c2roij] {
            font-size: 14px;
            font-weight: 600;
            line-height: 1;
        }

        .css-c2roij span, [data-css-c2roij] span {
            font-weight: 400;
            font-size: 12px;
            color: rgba(63, 63, 63, 0.45);
            margin-left: 6px;
        }

        .css-1q6y32d::before {
            content: "";
            width: 12px;
            height: 20px;
            position: absolute;
            left: -12px;
            top: 12px;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-right: 12px solid rgba(63, 63, 63, 0.15);
        }

        @media screen and (min-width: 1024px) {
            .css-1q6y32d::after, [data-css-1q6y32d]::after {
                content: "";
                width: 12px;
                height: 20px;
                position: absolute;
                left: -13px;
                top: 12px;
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
                border-right: 12px solid rgba(63, 63, 63, 0.15);
            }
        }

        .even .css-1q6y32d::after {
            border-right: 12px solid rgba(255, 255, 255, 1);
        }

        .even .css-1q6y32d::before {
            content: "";
            width: 12px;
            height: 20px;
            position: absolute;
            left: -12px;
            top: 12px;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-right: 12px solid rgba(255, 255, 255, 1);
        }
    </style>
@endsection