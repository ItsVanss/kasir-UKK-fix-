<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BR-{{$barang->kode}}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .resi-container {
            max-width: 300px;
            max-height: 190px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 5px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .resi-header {
            margin-top: -30px;
            text-align: center;
            margin-bottom: 20px;
        }

        .resi-details {
            margin-bottom: 20px;
        }

        .resi-details label {
            font-weight: bold;
            /* display: block; */
            /* margin-bottom: 5px; */
        }

        .resi-details span {
            text-align: center;
        }


        /* .resi-details span {
            display: block;
            margin-bottom: 1px;
        } */

        .barcode {
            text-align: center;
            margin-left:15px;
            margin-top: 20px;
            clear: both;
        }

        .barcode img {
            width: 100px;
            height: auto; /* Preserve aspect ratio */
            justify-content: center;
            max-width: 100%;
           
        }

        /* .resi-sinopsis {
            border-top: 1px solid #ddd;
            padding-top: 20px;
            margin-top: 20px;
        } */
    </style>
</head>
<body>
    <div class="resi-container">
        <div class="resi-header">
            <h2>Detail Buku</h2>
        </div>
        <div class="resi-details">

            <label>Nama Buku: </label><span>{{$barang->nama}} by <b>{{!empty($barang->pengarang->nama) ? $barang->pengarang->nama : '-'}}</b></span><br>
            <label>Kategori: </label><span>{{!empty($barang->kategori->nama) ? $barang->kategori->nama : '-'}}</span><br>
            <label>Harga: </label><span>{{$barang->harga_jual}}</span><br>

            <div class="barcode">
                {!! DNS1D::getBarcodeHTML('$ ' .$barang->kode, 'C128', 2 , 50) !!}
            </div>
            <div style="text-align: center"><span>{{$barang->kode}}</span></div>
        </div>
    </div>
</body>

</html>