<html>
<head>
    <title>{{ $senderName or '' }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        @import 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,900';

        * {
            font-family: 'Roboto', sans-serif;
            color: #525252;
        }

        a {
            color: #0288d1
        }
    </style>
</head>
<body style="background: #FFFFFF;margin: 0;">
<table id="background-table" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
    <tr>
        <td align="center" style="padding: 5px 5px 40px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0"
                   style=" background: #f9f9f9;margin: 0px;padding: 20px;">
                <tbody>
                <tr>
                    <td align="center" height="40"
                        style="background:#0288d1;margin:0;height:70px;border-top-right-radius: 2px;border-top-left-radius: 2px;background-color: #f2f2f2;background-image: -webkit-linear-gradient(top, #1976D2 0%,#0288d1 100%);background-image: -moz-linear-gradient(top, #1976D2 0%,#0288d1 100%);background-image: -o-linear-gradient(top, #1976D2 0%,#0288d1 100%);background-image: linear-gradient(top, #1976D2 0%,#0288d1 100%);"
                        valign="middle">
                        <a href="{{ url('/') }}">
                            <span>
                                <img border="0" height="33" src="{{ url('/images/logo.png') }}">
                            </span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid #dddddd; font-family:Helvetica,Arial,sans-serif; font-size:16px; padding:40px 60px;color: #525252;">
                        @yield('content')
                    </td>
                </tr>
                <tr>
                    <td style="padding-left:20px;padding-right:20px;vertical-align:top;text-align: center;color: #b7b7b7;"
                        valign="top">
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
