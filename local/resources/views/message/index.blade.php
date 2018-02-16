@extends('layouts.app', ['url' => '/local/search'])

@section('content')
    @if(Auth::user()->type == 'guest')
        <section id="page" class="booking-block">
            @include('profile.partials.header', ['user' => $user, 'section' => 'search', 'title' => 'Your booking history'])
        </section>
    @endif

    <section id="page" class="gray-block dashboard-block">
        <div class="container profile">

            @if(Auth::user()->type == 'local')
                @include('profile.partials.local', ['title' => 'Your booking history'])
            @else
                @include('profile.partials.tabs', ['user' => $user, 'title' => '', 'tab' => 'messages'])
                <div class="gray-bottom-border mb-1"></div>
            @endif

            <h1 id="experiences" class="page-title page-title-center">
                My messages
            </h1>

            @if(!empty($experience))
                @include("message.partials.compose", ['experience' => $experience])
            @endif
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Guest Name</th>
                    <th>Experience</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $k => $message)
                    <tr class="<?php echo $message->is_read ? "" : "text-bold" ?>">
                        <td scope="row">{{ $message->sender->first_name }}</td>
                        <td>{{ str_limit($message->experience->teaser, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($message->created_at)->format("d/m/Y") }}</td>
                        <td>{{ \Carbon\Carbon::parse($message->created_at)->format("H\hi") }}</td>
                        <td>{{ ucfirst($message->status) }}</td>
                        <td>
                            <button class="btn btn-primary btn-modal" modal-id="read-modal-{{ $message->id }}">
                                Read
                            </button>
                            <button class="btn btn-primary btn-modal" modal-id="respond-modal-{{ $message->id }}">
                                Reply
                            </button>
                            @include("message.partials.read", ['message' => $message])
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
    <script type="text/javascript">
        $(".btn-reply").click(function () {
            var messageId = $(this).attr("data-id");
            $("#respond-modal-" + messageId).modal("show");
            console.log("replying ...", messageId);
        });
    </script>
@endsection