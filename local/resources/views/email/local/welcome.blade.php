@extends('layouts.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        @include('email.partials.greeting', ['name' => $user->first_name])
        @include('email.partials.content', ['text' => "Congratulations! You have been verified as a buddy. Be ready to welcome the world to your doorstep."])
        @include('email.partials.content', ['text' => "Please proceed to create your new experience/s on your local dashboard by clicking button."])
        @include('email.partials.button', ['url' => '/local/info/create', 'text' => 'Create an experience now'])
        </tbody>
    </table>
@stop