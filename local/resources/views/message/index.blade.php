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

            <div class="pull-right">
                <button class="btn btn-primary btn-modal" modal-id="compose-modal">
                    Compose
                </button>
            </div>
            @include("message.partials.compose", ['user' => $user])

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
                    <tr>
                        <td scope="row">{{ $message->sender->first_name }}</td>
                        <td>{{ "Some experience here " . ($k + 1) }}</td>
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
                            @include("message.partials.reply", ['message' => $message])
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
@endsection