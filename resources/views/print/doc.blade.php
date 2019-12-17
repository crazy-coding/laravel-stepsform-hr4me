<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td colspan="3">
            <h3>{{ $doc->author }}</h3>
            </td>
        </tr>
        <tr>
            <td align="left" style="width: 40%;">
                <h3>EARNINGS AND BENEFITS</h3>
                <pre>
INSERT AMOUNT OF MONTHLY PAYMENT
{{ $doc->ins_amount }} {{ $doc->ins_currency }}
<br /><br />
INCREASE OFR DECREASE OF PAYMENT
{{ $doc->pay_rate }}%
<br /><br />
FOOD ALLOWANCE
{{ $doc->food_allow_amt }} {{ $doc->food_allow_unit }}
<br /><br />
ALLOWANCE FOR ANNUAL VACCTION
{{ $doc->annual_amt }} {{ $doc->annual_unit }}
<br /><br />
DATE FOR PAYING
{{ $doc->date_paying }}
                </pre>


            </td>
            <td align="center">
                <!-- <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/> -->
                <h1 style="line-height: 40px;">{{ $doc->doc_name }}</h1>
            </td>
            <td align="right" style="width: 40%;">

                <h3>REST AND ABSENCE</h3>
                <pre>
VACCATION
{{ $doc->vaccation_amt }}
                </pre>
            </td>
        </tr>

    </table>
</div>

<br/>

<div class="invoice">
    {!! $doc->content !!}
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Created Date:   {{ date("d.m.Y. / H:i", strtotime($doc->created_at)) }}
            </td>
        </tr>
        <tr>
            <td align="left" style="width: 50%;">
                HR4ME
            </td>
            <td align="right" style="width: 50%;">
                {{ $doc->updated_at ? "Updated Date:   ".date("d.m.Y. / H:i", strtotime($doc->updated_at)) : "" }}
            </td>
        </tr>
    </table>
</div>
</body>
</html>