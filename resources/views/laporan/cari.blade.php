@extends('layout.app')

@section('title', 'Kasir - Laporan')

@section('content')
<style>
    .custom-card {
        margin-bottom: -30px;
        /* Sesuaikan nilai margin sesuai kebutuhan Anda */
    }
</style>
<section class="section">
    <div class="section-header">
        <h1>Laporan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/laporan">Laporan</a></div>
            <div class="breadcrumb-item">Cari Laporan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary">
                    <p>
                        <span class="font-weight">Laporan Tanggal :
                            <span style="font-weight: bold;">{{$dari}}</span> /
                            <span style="font-weight: bold;">{{$sampai}}</span>
                        </span>
                        <a href="/laporan" class="close" aria-label="Close" data-toggle="tooltip" data-placement="right" title data-original-title="Kembali ke menu Laporan">
                        <span aria-hidden="true">&times;</span>
                    </a>
                    </p>
                </div>

                <div class="card shadow">
                    <div class="card-header bg-white justify-content-left custom-card">
                        <form action="/laporan/cari">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="mr-1" for="nama">Dari:</label>
                                        <input type="date" class="form-control" name="dari" value="{{$dari}}"
                                            max="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="mr-1" for="nama">Sampai:</label>
                                        <input type="date" class="form-control" name="sampai" value="{{$sampai}}"
                                            max="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-secondary"><i
                                                class="fa fa-search"></i> </button>
                                        <a style="margin-left:5px" href="/laporan/{{$dari}}/{{$sampai}}/print"
                                            class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title data-original-title="Print All"><i class="fa fa-print"></i>
                                            Print</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-2">
                        <table class="table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th style="width: 60px">Tanggal</th>
                                    <th>Kode Transaksi</th>
                                    <th>Total</th>
                                    <th>Bayar</th>
                                    <th>Kembali</th>
                                    <th>Kode Kasir</th>
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
                                        <a href="/laporan/{{$item->kode_transaksi}}/print"
                                            class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="/laporan" class="btn btn-sm btn-secondary"></i>Go Back!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
@endpush
