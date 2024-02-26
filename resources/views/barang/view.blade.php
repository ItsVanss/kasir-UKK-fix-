<!-- @extends('layout.app')

@section('title', 'Kasir - Detail')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Barang</h1>
    </div>

    <div class="section-body">
        <div class="card shadow">
            <div class="card-header bg-white">
                <h4>View Data Barang</h4>
            </div>
            <div class="card-body">
                <form action="">
                    <form action="/barang/store" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col md 6">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" name="kode" value="{{$barang->kode}}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{$barang->nama}}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="custom-select" name="kategori_id">
                                        @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->id == $barang->kategori_id ? 'selected' : '' }} readonly>
                                            {{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <select class="custom-select" name="satuan_id">
                                        @foreach ($satuan as $satuan)
                                        <option value="{{ $satuan->id }}"
                                            {{ $satuan->id == $barang->satuan_id ? 'selected' : '' }} readonly>
                                            {{ $satuan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="harga_beli">Harga Beli</label>
                                        <input type="number" class="form-control" name="harga_beli"
                                            value="{{$barang->harga_beli}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control" name="harga_jual"
                                        value="{{$barang->harga_jual}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" class="form-control" name="stok" value="{{$barang->stok}}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="diskon">Diskon</label>
                                    <div class="input-group-prepend">
                                        <input type="number" class="form-control" name="diskon"
                                            value="{{$barang->diskon}}" readonly>
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="button">
                        <a href="/barang" class="btn btn-sm btn-outline-warning"><i class="fas fa-caret-left"></i>
                            Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection -->
