<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 2</title>
    {{-- <link rel="stylesheet" href="style.css" media="all" /> --}}
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087c3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #aaaaaa;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }

        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087c3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087c3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #eeeeee;
            text-align: center;
            border-bottom: 1px solid #ffffff;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57b223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #ffffff;
            font-size: 1.6em;
            background: #57b223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #dddddd;
        }

        table .qty {}

        table .total {
            background: #57b223;
            color: #ffffff;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #ffffff;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #aaaaaa;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57b223;
            font-size: 1.4em;
            border-top: 1px solid #57b223;
        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087c3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #aaaaaa;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ url('/layouts_landing') }}/img/core-img/gaweayu1.png">
        </div>
        <div id="company">
            <h2 class="name">Gawe Ayu Makeup, Booking Website</h2>
            <div>Terusan Indramayu, Jawa Barat</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">gaweayu@example.com</a></div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">INVOICE From:</div>
                <h2 class="name">{{ $booking->getmakeup->getMakeup->name }}</h2>
                <div class="address">{{ $booking->getmakeup->getMakeup->alamat }}</div>
                <div class="email"><a href="mailto:john@example.com">{{ $booking->getmakeup->getMakeup->email }}</a>
                </div>
            </div>
            <div id="invoice">
                <div class="to">INVOICE TO:</div>
                <h2 class="name">{{ $booking->getCustomer->getCustomer->name }}</h2>
                <div class="address">{{ $booking->getCustomer->getCustomer->alamat }}, Indonesia</div>
                <div class="email"><a
                        href="mailto:john@example.com">{{ $booking->getCustomer->getCustomer->email }}</a></div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">MAKEUP</th>
                    <th class="unit">Harga</th>
                    <th class="qty">PAYMENT STATUS</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="no">01</td>
                    <td class="desc">
                        <h3>{{ $booking->getMakeup->name }}
                    </td>
                    <td class="unit">{{ $booking->getMakeup->price }}</td>
                    <td class="qty">{{ $booking->payment_status }}</td>
                    <td class="total">{{ $booking->getMakeup->price }} </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>{{ $booking->getMakeup->price }}</td>
                </tr>
                @php
                    $subtotal = $booking->getMakeup->price;
                    $taxRate = 0.05; // 10% tax rate
                    $tax = $subtotal * $taxRate;
                    $grandTotal = $subtotal + $tax;
                @endphp
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">Pajak 5%</td>
                    <td>{{ $tax }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">TOTAL</td>
                    <td>{{ $grandTotal }}</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Thank you!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
