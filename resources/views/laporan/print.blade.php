<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print-{{$transaksi->kode_transaksi}}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .transaksi-container {
            max-width: 600px; /* Set to 100% to adjust based on paper size */
            height: auto;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .transaksi-header {
            text-align: center;
            margin-bottom: -20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .barcode {
            margin-top: 10px;
        }

        .transaksi-details {
            display: flex;
            flex-direction: column;
            /* Mengatur arah kolom agar elemen-elemen berada di bawah satu sama lain */
        }

        .transaksi-details label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .transaksi-details span {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
            /* Collapse the borders to avoid spacing between cells */
        }

        th, td {
            border: 1px solid #ddd;
            /* Add a border to the table cells */
            padding: 8px;
            /* Add padding to the table cells for better appearance */
        }

        thead th {
            background-color: #f2f2f2; /* Add background color to table header cells */
        }

        th, td {
            white-space: nowrap; /* Prevent text wrapping within cells */
        }
        

    </style>


</head>

<body>
    <div class="transaksi-container">
        <div class="transaksi-header">
            <h2>RECEIPT</h2>
            <!-- <div style="align-items:center"><span>{!! DNS1D::getBarcodeHTML('$'."$transaksi->kode_transaksi", 'C128', 1, 25)!!}</span></div> -->
        </div>
        <div style="text-align:center;">{{$transaksi->kode_transaksi}}</div>
        <div style="text-align:center;">{{$transaksi->tanggal}}</div>
        <div class="transaksi-details" style="margin-top: 20px;">
            <table style="width: 500px; margin-bottom: 10px; margin-top: 20px;">
                <thead style="font-weight: bold">
                    <tr>
                        <td style="width:10px">No.</td>
                        <td>Barang</td>
                        <td>Harga</td>
                        <td>QTY</td>
                        <td>Diskon</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi_detail as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->barang}}</td>
                        <td>{{$item->formatRupiah('harga')}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>{{$item->diskon}}%</td>
                        <td>{{$item->formatRupiah('total')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top:30px;">

                <label>Total: </label> <span>{{$transaksi->formatRupiah('total')}}</span><br>
                <label>Bayar: </label> <span>{{$transaksi->formatRupiah('bayar')}}</span><br>
                <label>Kembalian: </label> <span>{{$transaksi->formatRupiah('kembali')}}</span><br>
                <!-- <label>Kasir: </label> <span>{{$transaksi->kode_kasir}}</span><br> -->
            </div>
        </div>
    </div>
</body>

</html>
