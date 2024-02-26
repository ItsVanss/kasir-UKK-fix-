<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .transaksi-container {
            max-width: 100%;
            padding: 5px 5px 20px 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .transaksi-header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px; /* Adjust padding for better spacing */
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row {
            font-weight: bold;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .transaksi-container {
                box-shadow: none;
                border: none;
            }
        }
    </style>

</head>

<body>
    <div class="transaksi-container">
        <div class="transaksi-header">
            <h2>Laporan Transaksi</h2>
            <div style="text-align:center; margin-top:-20px">{{$dari}} - {{$sampai}}</div>
        </div>

        <div class="transaksi-body">
            <table>
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th>Bayar</th>
                        <!-- <th>Kembali</th> -->
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $item)
                    <tr>
                        <td style="text-align: center; display:flex; flex-direction: column; align-items: center;">
                            {!! DNS1D::getBarcodeHTML('$'."$item->kode_transaksi", 'C128', 1, 25)!!}
                            <div style="margin-top: 5px;">{{$item->kode_transaksi}}</div>
                        </td>
                        <td>{{$item->tanggal}}</td>
                        <td>{{$item->kode_kasir}}</td>
                        <td>{{$item->formatRupiah('bayar')}}</td>
                        <!-- <td>{{$item->formatRupiah('kembali')}}</td> -->
                        <td>{{$item->formatRupiah('total')}}</td>
                    </tr>
                    @endforeach
                    <tr class="total-row">
                        <td colspan="4">Total</td>
                        <td>{{$total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>