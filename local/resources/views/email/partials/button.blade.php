<tr>
    <td style="padding-top: 10px;padding-bottom: 10px;">
        <!--[if mso]>
        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word"
                     href="{{ url($url)}}" style="height:40px;v-text-anchor:middle;width:250px;" arcsize="10%"
                     stroke="f" fillcolor="#1a75bb">
            <w:anchorlock/>
            <center style="color:#ffffff;font-family:sans-serif;font-size:16px;font-weight:bold;padding: 5px 10px;">
                {{ $text }}
            </center>
        </v:roundrect>
        <![endif]-->
        <![if !mso]>
        <a href="{{ url($url)}}"
           style="line-height: 40px;display: inline-block;color: #FFFFFF;text-decoration:none;font-weight: 500;padding: 0;font-size: 14px;text-transform: uppercase;background: #1a75bb;border-color: #1a75bb;border-radius: 4px;-moz-box-shadow: 0 2px 1px 0 #1a75bb;-webkit-box-shadow: 0 2px 1px 0 #1a75bb;box-shadow: 0 2px 1px 0 #1a75bb;"
           target="_blank">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="display: inline-block;color: #FFFFFF;text-decoration:none;font-weight: 500;font-size: 14px;padding: 5px 20px;text-transform: uppercase;background: #1a75bb;border-color: #1a75bb;border-radius: 4px;-moz-box-shadow: 0 2px 1px 0 #1a75bb;-webkit-box-shadow: 0 2px 1px 0 #1a75bb;box-shadow: 0 2px 1px 0 #1a75bb;">
                        {{ $text }}
                    </td>
                </tr>
            </table>
        </a>
        <![endif]>

    </td>
</tr>