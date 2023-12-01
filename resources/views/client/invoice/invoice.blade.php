<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Booking Makeup Artis-Gawe Ayu-Invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ url('/layouts_landing') }}/img/core-img/gaweayu1.png"
                                    style="width: 100%; max-width: 300px" />
                            </td>

                            <td>
                                Booking Kode: {{ $booking->id_booking }}<br />
                                Invoice #: {{ $booking->id_order }}<br />
                                Created: {{ $booking->created_at }}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Gawe Ayu Booking Makeup Artist<br />
                                Politeknik Negeri Indramayu<br />
                                Lohbener, Indramayu 45252
                            </td>

                            <td>
                                {{ $booking->getCustomer->id_customer }}<br />
                                {{ $booking->getCustomer->getCustomer->name }}<br />
                                {{ $booking->getCustomer->getCustomer->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Metode Pembayaran</td>

                <td>Harga #</td>
            </tr>

            <tr class="details">
                <td>Harga</td>

                <td>Rp.{{ number_format($booking->getMakeup->price, 0, ',', '.') }}</td>
            </tr>
            <tr class="details">
                <td>Payment Status</td>

                <td>{{ $booking->payment_status }}</td>
            </tr>

            <tr class="heading">
                <td>Item</td>

                <td>Price</td>
            </tr>

            <tr class="item">
                <td>{{ $booking->getMakeup->name }}</td>

                <td>{{ $booking->getMakeup->price }}</td>
            </tr>

            <tr class="item last">
                <td>{{ $booking->getTypeMakeup->name }}</td>

                <td></td>
            </tr>

            <tr class="total">
                <td></td>

                <td>Total Rp.{{ number_format($booking->getMakeup->price, 0, ',', '.') }}</td>
            </tr>
        </table>
        <a href="{{ url('/client/booking') }}" class="btn btn-warning"><i class="fa fa-arrow-left">Kembali</i></a>
        <a href="{{ url('/client/booking/invoice/cetak_pdf/' . $booking->id_booking) }}" class="btn btn-success"><i
                class="fa fa-print">Cetak</i></a>
    </div>
</body>

</html>
