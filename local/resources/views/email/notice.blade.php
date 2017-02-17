@extends('layouts.email', ['heading'])
@section('heading')
@include('email.partials.heading', ['text' => 'Job Matches'])
@endsection
@section('content')
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
        @foreach($positions as $position)
        <tr>
            <td style="padding: 10px 0; margin-bottom: 10px;border-bottom: 1px solid rgb(229, 229, 229);">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        @include('email.partials.link', ['url' => '/job/' . $position->slug() . '/' . $position->reference, 'text' => $position->title])
                        @if($position->salary)
                        @include('email.partials.content', ['text' => $position->salary])
                        @endif
                        @include('email.partials.content', ['text' => $position->location(), 'color' => '#777777'])
                    </tbody>
                </table>
            </td>
        </tr>
        @endforeach

        @include('email.partials.button', ['url' => '/jobs', 'text' => 'See More Jobs'])
    </tbody>
</table>
@stop