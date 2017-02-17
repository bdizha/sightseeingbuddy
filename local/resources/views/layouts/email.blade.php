<html>
    <head>
        <title>{{ $senderName or '' }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style>
            @import 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,900';
            *{
                font-family: 'Roboto', sans-serif;
            }
            a{
                color:#0288d1
            }
        </style>
    </head>
    <body style="background: #FFFFFF;margin: 0;">
        <table id="background-table" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
                <tr>
                    <td align="center" style="padding: 5px 5px 40px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="max-width: 600px;width: 100%;background:#E7ECED;border-radius: 4px;-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);box-shadow: 0 1px 2px rgba(0,0,0,0.2);">
                            <tbody>
                                <tr>
                                    <td align="center" height="40" style="background:#0288d1;margin:0;height:70px;border-top-right-radius: 2px;border-top-left-radius: 2px;background-color: #f2f2f2;background-image: -webkit-linear-gradient(top, #1976D2 0%,#0288d1 100%);background-image: -moz-linear-gradient(top, #1976D2 0%,#0288d1 100%);background-image: -o-linear-gradient(top, #1976D2 0%,#0288d1 100%);background-image: linear-gradient(top, #1976D2 0%,#0288d1 100%);" valign="middle">
                                        <a href="{{ url('/') }}">
                                            <span>
                                                <img border="0" height="33" src="{{ url('/images/logo.png') }}">
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                @yield('heading')
                                <tr>
                                    <td style="padding: 10px;color: #666666;font-size: 13px;">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="max-width: 600px;width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 15px;color: #666666;font-size: 13px;background: #FFFFFF;border-bottom: 1px solid transparent;border-radius: 4px;-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);box-shadow: 0 1px 2px rgba(0,0,0,0.2);">
                                                        @yield('content')
                                                        @include('email.partials.signature')
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left:20px;padding-right:20px;vertical-align:top;text-align: center;" valign="top">
                                        @include('email.partials.footer')
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
