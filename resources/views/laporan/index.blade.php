@extends('layout.app')

@section('title', 'Kasir - Laporan')

@section('content')
<style>
    .custom-card {
        margin-bottom: -30px; /* Sesuaikan nilai margin sesuai kebutuhan Anda */
    }
</style>
<section class="section">
    <div class="section-header">
        <h1>Laporan</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                
                    <div class="card-header bg-white justify-content-left custom-card">
                        <form action="/laporan/cari">
                            <div class="row custom-row">
                                <div class="col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="mr-1" for="nama">Dari</label>
                                        <input type="date" class="form-control" name="dari" id="tanggalDari" max="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="mr-1" for="nama">Sampai</label>
                                        <input type="date" class="form-control mr-5" name="sampai" id="tanggalSampai" max="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button style="margin-right:50px" type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-search"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <div class="card-body p-2">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 40px;">No.</th>
                                    <th style="width: 60px">Tanggal</th>
                                    <th style="text-align: center;">Kode Transaksi</th>
                                    <th>Total</th>
                                    <th>Bayar</th>
                                    <th>Kembali</th>
                                    <th>Kasir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->tanggal}}</td>
                                    <td
                                        style="text-align: center; display:flex; flex-direction: column; align-items: center;">
                                        {!! DNS1D::getBarcodeHTML('$'."$item->kode_transaksi", 'C128', 1, 25)!!}
                                        <div style="margin-top: 5px;">{{$item->kode_transaksi}}</div>
                                    </td>
                                    <td>{{$item->formatRupiah('total')}}</td>
                                    <td>{{$item->formatRupiah('bayar')}}</td>
                                    <td>{{$item->formatRupiah('kembali')}}</td>
                                    <td>{{$item->kode_kasir}}</td>
                                    <td>
                                        <!-- <a href="/laporan/{{$item->kode_transaksi}}" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i> Detail</a> -->
                                        <a href="/laporan/{{$item->kode_transaksi}}/print" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
@endpush