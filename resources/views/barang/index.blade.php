@extends('layout.app')

@section('title', 'Kasir - Barang')

@section('content')
<style>
    .low-stock {
        color: red;
    }
</style>

<section class="section">
    <div class="section-header">
        <h1>Barang</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Barang</h4>
                        <div class="card-header-form">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#form-tambah"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Kategori</th>
                                    <th>Nama Buku</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Harga Jual</th>
                                    <th style="width:5px">Stok</th>
                                    <!-- <th>Diskon</th> -->
                                    <th style="width:150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <td
                                        style="text-align: center; display:flex; flex-direction: column; align-items: center;">
                                        {!! DNS1D::getBarcodeHTML('$'."$item->kode", 'C128', 1, 25)!!}
                                        <div style="margin-top: 5px;">{{$item->kode}}</div>
                                    </td>

                                    <td>{{!empty($item->kategori->nama) ? $item->kategori->nama : 'Data Kategori telah Dihapus'}}
                                    </td>
                                    <td class="text-dark"><b>{{$item->nama}}</b></td>
                                    <td>{{!empty($item->penerbit->nama) ? $item->penerbit->nama : 'Data Penerbit telah Dihapus'}}
                                    </td>
                                    <td>{{!empty($item->pengarang->nama) ? $item->pengarang->nama : 'Data Pengarang telah Dihapus'}}
                                    </td>
                                    <td>{{$item->formatRupiah('harga_jual')}}</td>
                                    
                                    <td style="{{ $item->stok <= 0 ? 'color: red;' : '' }}"
                                        class="{{ $item->stok <= 0 ? 'out-of-stock' : ($item->stok < 11 ? 'low-stock' : '') }}">
                                        <b>{{ $item->stok <= 0 ? 'Stok Habis!' : $item->stok }}</b>
                                    </td>

                                    <!-- <td>{{$item->diskon}}%</td> -->
                                    <td>

                                        <form action="/barang/{{$item->id}}" id="delete-form">
                                            <a href="/barang/print/{{$item->id}}"  class="btn btn-sm btn-primary"><i
                                                    class="fa fa-print" ></i>
                                            </a>
                                            <a href="/barang/{{$item->id}}/edit" class="btn btn-sm btn-warning"
                                                ata-toggle="modal" data-target="#form-edit"><i class="fa fa-edit"></i>
                                                Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger" id="{{$item->nama}}"
                                                data-id="{{$item->id}}" onclick="confirmDelete(this)"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                            </button>

                                        </form>
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
@include('barang.form');
@endsection

@push('script')

<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });

    function confirmDelete(button) {
        event.preventDefault()
        const id = button.getAttribute('data-id');
        const nama = button.getAttribute('id');
        swal({
            title: 'Apa Anda Yakin ?',
            // text: 'Anda Akan Menghapus Data <strong>"' + nama + '"</strong> Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            content: {
                element: "div",
                attributes: {
                    innerHTML: 'Anda akan menghapus data <strong style="color: #6654bf;">' + nama + '</strong>, Ketika anda tekan OK, maka data tidak dapat dikembalikan !',
                },
            },
            // Tambahkan fitur ini untuk memungkinkan HTML pada judul dan teks
            // Sebagai catatan, jika menggunakan fitur ini, pastikan judul dan teks sudah aman dari XSS
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
            closeOnEsc: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                const form = document.getElementById('delete-form');
                // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
                form.action = '/barang/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
                form.submit();
            }
        });
    }
</script>
@endpush