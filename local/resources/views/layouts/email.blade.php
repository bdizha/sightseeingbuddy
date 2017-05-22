    <html>
    <head>
        <title>{{ $senderName or '' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style>
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
                        <td style="border:1px solid #dddddd; font-family:Roboto,Arial,sans-serif;padding:20px;font-size:14px;line-height:20px;color: #3f3f3f;background: #FFFFFF;">
                            @yield('content')
                            @include('email.partials.signature')
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
