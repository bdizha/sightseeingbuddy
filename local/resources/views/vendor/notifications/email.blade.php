<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        @import 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,900';
        * {
            font-family: 'Roboto', sans-serif;
            color: #3f3f3f;
        }

        a {
            color: #3f3f3f
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

    /* Type ------------------------------ */

    'anchor' => 'color: #3f3f3f;',
    'paragraph' => 'margin-top: 0; color: #3f3f3f; font-size: 14px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #3f3f3f; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'color: #3f3f3f;
    text-transform: uppercase;
    font-weight: 900;
    font-size: 16px;
    padding: 15px;
    border-color: transparent;
    background-color: #1a75bb;
    position: relative;
    overflow: hidden;
    border-radius: 5px;
    text-decoration: none;
    ',

    'button--yellow' => 'background-color: #1a75bb;',
];
?>

<?php $fontFamily = 'font-family: Roboto, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>


<body style="background: #f9f9f9;margin: 0;">
<table id="background-table" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
    <tr>
    <tr>
        <td align="center" style="padding: 5px 5px 40px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0"
                   style=" background: #f9f9f9;margin: 0px;padding: 20px;">
                <tbody>
                <tr>
                    <td align="center" height="40"
                        style="margin:0;height:70px;border-top-right-radius: 2px;border-top-left-radius: 2px;"
                        valign="middle">
                        <a href="{{ url('/') }}">
                            <span>
                                <img border="0" height="33" src="{{ url('/images/logo.png') }}?v={{ time() }}">
                            </span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid #dddddd; font-family:Roboto,Arial,sans-serif;padding:40px 60px;font-size:14px;line-height:20px;color: #3f3f3f;background: #FFFFFF;">
                        <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0"
                               cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                    <!-- Greeting -->
                                    @if (! empty($greeting))
                                        {{ $greeting }}
                                    @else
                                        @if ($level == 'error')
                                            Whoops!
                                        @else
                                            Hello!
                                        @endif
                                    @endif

                                    <!-- Intro -->
                                    @foreach ($introLines as $line)
                                        <p style="{{ $style['paragraph'] }}">
                                            {{ $line }}
                                        </p>
                                    @endforeach

                                <!-- Action Button -->
                                    @if (isset($actionText))
                                        <table style="{{ $style['body_action'] }}" align="center" width="100%"
                                               cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <?php
                                                    switch ($level) {
                                                        case 'success':
                                                            $actionColor = 'button--yellow';
                                                            break;
                                                        case 'error':
                                                            $actionColor = 'button--red';
                                                            break;
                                                        default:
                                                            $actionColor = 'button--yellow';
                                                    }
                                                    ?>

                                                    <a href="{{ $actionUrl }}"
                                                       style="{{ $fontFamily }} {{ $style['button'] }} {{ $style[$actionColor] }}"
                                                       class="button"
                                                       target="_blank">
                                                        {{ $actionText }}
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    @endif

                                    <!-- Outro -->
                                    @foreach ($outroLines as $line)
                                        <p style="{{ $style['paragraph'] }}">
                                            {{ $line }}
                                        </p>
                                    @endforeach

                                    <!-- Sub Copy -->
                                    @if (isset($actionText))
                                        <table style="{{ $style['body_sub'] }}">
                                            <tr>
                                                <td style="{{ $fontFamily }}">
                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        If you’re having trouble clicking the "{{ $actionText }}"
                                                        button, copy and paste the URL below into your web browser:
                                                    </p>

                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        <a style="{{ $style['anchor'] }}" href="{{ $actionUrl }}"
                                                           target="_blank">
                                                            {{ $actionUrl }}
                                                        </a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left:20px;padding-right:20px;vertical-align:top;text-align: center;color: #b7b7b7;"
                        valign="top">
                        @include('email.partials.footer')
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
