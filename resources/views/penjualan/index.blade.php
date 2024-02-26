@extends('layout.app')

@section('title', 'Kasir - Penjualan')

@section('content')
<style>
    button:disabled.btn-primary {
        background-color: #b3c0ff; /* Warna primary yang sedikit lebih pucat */
        border-color: #b3c0ff; /* Sesuaikan dengan warna background agar konsisten */
        cursor: not-allowed; /* Ubah kursor saat di atas tombol yang dinonaktifkan */
    }

    .text-red {
        color: red;
        font-weight: bold;
    }
</style>
<section class="section">
    <div class="section-header">
        <h1>Transaksi Penjualan</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Cashier</h4>
                        <div class="card-header-form float-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#data-barang">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <table class="table table-striped" id="table-transaksi">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th style="width:25%">Nama</th>
                                    <th style="text-align:center">Harga</th>
                                    <th style="text-align:center">Jumlah</th>
                                    <th style="text-align:center">Diskon</th>
                                    <th style="text-align:center">Total</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi_sementara as $item)
                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    
                                    <td style="width:25%" class="{{ empty($item->barang->nama) ? 'text-red' : '' }}"><b>
                                        {{ !empty($item->barang->nama) ? $item->barang->nama : 'Data Barang telah Dihapus!' }}
                                    </b></td>

                                    <td style="text-align:center" class="harga" value="{{$item->harga}}">{{$item->formatRupiah('harga')}}</td>
                                    <td style="text-align:center" class="jumlah text-dark" value="{{$item->jumlah}}" data-placement="right" data-toggle="tooltip" title data-original-title="Stok Tersisa: {{$item->barang->stok}}">
                                        <b>{{$item->jumlah}}</b>
                                    </td>

                                    <td style="text-align:center" class="diskon" value="{{$item->diskon}}">{{$item->diskon}}%</td>
                                    <td style="text-align:center" class="total" value="{{$item->total}}">{{$item->formatRupiah('total')}}</td>
                                    <td>
                                        <form style="text-align:center" action="/penjualan/{{$item->id}}" id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6"></td>
                                    <td style="text-align:center">
                                        <!-- Tombol Hapus Semua -->
                                        @if(count($transaksi_sementara) > 0)
                                            <a href="/penjualan/hapus/semua" class="btn btn-sm m-1 btn-danger">Hapus Semua</a>
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- <div class="card-header-form float-right">
                            @if(count($transaksi_sementara) > 0)
                            <a href="/penjualan/hapus/semua" class="btn btn-sm m-1 btn-danger">Hapus Semua</a>
                            @endif
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- bagian perhitungan -->
            @if(count($transaksi_sementara) > 0)
            
            <div class="col-md-12">
            <div class="alert alert-danger" id="warning-message" style="color: white;  display: none;">
                                <b>Uang yang dibayarkan kurang!</b> Mohon periksa kembali jumlah pembayaran Anda!!
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    onclick="refreshPage()" data-toggle="tooltip" data-placement="right" title
                                    data-original-title="Close & Refresh">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                <div class="card">
                    <div class="card-body p-2">
                        <form action="/penjualan/bayar/{{$nomor}}" method="POST" id="form-penjualan">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6" hidden>
                                    <div class="form-group">
                                        <label for="kode">Kode Transaksi</label>
                                        <input type="text" id="kode-transaksi" class="form-control" value="{{$nomor}}"
                                            name="kode_transaksi" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6" hidden>
                                    <div class="form-group">
                                        <label for="kasir">Nama Kasir</label>
                                        <input type="text" id="kasir" class="form-control" name="kode_kasir"
                                            value="{{ auth()->user()->nama }}" required readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bayar">Di Bayar</label>
                                        <input type="number" id="bayar"
                                            class="form-control @error('bayar') is-invalid @enderror" name="bayar" min="0">
                                        @error('bayar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kembali">Kembali</label>
                                        <input type="text" id="kembali" class="form-control" value="0" readonly>
                                        <input type="text" id="kembalian" class="form-control" value="0" name="kembali"
                                            hidden>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-bottom:5px;" class="form-group">
                                <label for="Total Belanja">Total Belanja</label>
                                <div class="input-group-prepend">
                                    <h1 class="text-primary mr-2" style="margin-left:10px">Rp.<br></h1>
                                    <input class="d-none" type="text" id="total" value="0" name="total">
                                    <h1 class="text-primary" id="label-total">0</h1>
                                </div>
                            </div>
                            <!-- <a href="/penjualan/hapus/semua" class="btn m-1 btn-danger" >Batal</a> -->
                            <button type="button" id="btn-bayar" class="btn m-1 btn-primary" onclick="prosesPembayaran()"><i class="far fa-credit-card"></i> Bayar</button>

                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@include('penjualan.TabelBarang')
@endsection



@push('script')

<script>
    function hitungKembali() {
    var diBayar = document.getElementById('bayar').value;
    var diBayarAngka = parseFloat(diBayar) || 0;
    var total = document.getElementById('total').value;
    var belanja = parseFloat(total) || 0;
    var kembali = diBayarAngka - belanja;

    document.getElementById('kembali').value = kembali.toLocaleString('id-ID');
    document.getElementById('kembalian').value = kembali;

    var btnBayar = document.getElementById('btn-bayar');
    if (kembali < 0) {
        btnBayar.disabled = true;
        btnBayar.classList.remove('btn-primary');
        btnBayar.classList.add('btn-primary');
    } else {
        btnBayar.disabled = false;
        btnBayar.classList.remove('btn-primary');
        btnBayar.classList.add('btn-primary');
    }

    if (kembali < 0) {
        document.getElementById('warning-message').style.display = 'block';
    } else {
        document.getElementById('warning-message').style.display = 'none';
    }
}



function prosesPembayaran() {
    var kembali = parseFloat(document.getElementById('kembali').value) || 0;

    // Check if the change is negative (insufficient payment)
    if (kembali < 0) {
        alert('Uang yang dibayarkan kurang! Mohon periksa kembali jumlah pembayaran Anda.');
    } else {
        // Submit the form if the payment is sufficient
        document.getElementById('form-penjualan').submit();
    }
}



    // Add event listener for "Di Bayar" input
    document.getElementById('bayar').addEventListener('input', hitungKembali);

    // Function to handle the "Bayar" button click
    function prosesPembayaran() {
        var kembali = parseFloat(document.getElementById('kembali').value) || 0;

        // Check if the change is negative (insufficient payment)
        if (kembali < 0) {
            alert('Uang yang dibayarkan kurang! Mohon periksa kembali jumlah pembayaran Anda.');
        } else {
            event.preventDefault()
            var kembali = parseFloat(document.getElementById('kembali').value) || 0;
            form_bayar = document.getElementById('form-penjualan');
            if (kembali < 0) {
                iziToast.warning({
                title: 'Transaksi Gagal',
                message: 'Jumlah Bayar Kurang !',
                position: 'topRight'
                });
            }else{
                swal({
                    title: 'Konfirmasi Pembayaran?',
                    text: 'Apakah Anda yakin ingin melanjutkan pembayaran?',
                    icon: 'warning',
                    buttons: { 
                        cancel: "Batal",
                        
                        confirm: {
                            text: "Konfirmasi",
                            value: true,
                            className: 'btn-primary',
                        },
                    },
                    dangerMode: true,
                })
                    .then((bayar) => {
                        if(bayar){
                            // Submit the form if the payment is sufficient
                            document.getElementById('form-penjualan').submit();
                        }else {
                            iziToast.warning({
                            title: 'Transaksi Dibatalkan',
                            position: 'topRight'
                            });
                        }
                 
                    });
            }
        }
    }
</script>
@if(session('error'))
    <script>
        // Use izitoast or any other library to display the error message
        iziToast.error({
            title: 'Error',
            message: '{{ session('error') }}',
            position: 'topRight'
        });
    </script>
@endif
<script>
    document.getElementById('bayar').addEventListener('input', hitungKembali);

    function prosesPembayaran() {
        event.preventDefault();
        var kembali = parseFloat(document.getElementById('kembali').value) || 0;
        var form_bayar = document.getElementById('form-penjualan');

        var zeroStockItems = document.querySelectorAll('#table-transaksi tbody td.text-red');
        if (zeroStockItems.length > 0) {
            iziToast.error({
                title: 'Error',
                message: 'Terdapat barang dengan stok 0, tidak dapat melanjutkan pembayaran.',
                position: 'topRight'
            });
        } else {
            swal({
                title: 'Konfirmasi Pembayaran?',
                text: 'Apakah Anda yakin ingin melanjutkan pembayaran?',
                icon: 'warning',
                buttons: { 
                    cancel: "Batal",
                    confirm: {
                        text: "Konfirmasi",
                        value: true,
                        className: 'btn-primary',
                    },
                },
                dangerMode: true,
            })
                .then((bayar) => {
                    if(bayar){
                        form_bayar.submit();
                    } else {
                        iziToast.warning({
                            title: 'Transaksi Dibatalkan',
                            position: 'topRight'
                        });
                    }
                });
        }
    }
</script>
<script>
    function hitungTotal() {
        var total = document.querySelectorAll('#table-transaksi tbody td.total');
        var label_total = document.getElementById('label-total');
        var sub_total = document.getElementById('total');

        // Inisialisasi variabel total
        var grandTotal = 0;

        // Iterasi melalui setiap elemen dan menjumlahkannya
        total.forEach(function (element) {
            var totalValue = parseFloat(element.getAttribute('value')) || 0;
            grandTotal += totalValue;
        });

        // Tampilkan hasilnya di label_total dengan format mata uang Rupiah
        label_total.innerHTML = grandTotal.toLocaleString('id-ID');
        sub_total.value = grandTotal;
    }
</script>
<script>
    function refreshPage() {
        // Refresh halaman setelah menutup modal
        location.reload();
    }
</script>
@endpush