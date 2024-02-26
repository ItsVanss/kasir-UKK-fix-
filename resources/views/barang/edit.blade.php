@extends('layout.app')

@section('title', 'Kasir - Edit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Barang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/barang">Barang</a></div>
            <div class="breadcrumb-item">Edit Barang</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card shadow">
            <div class="card-header bg-white">
                <h4>Edit Data Barang</h4>
            </div>
            <div class="card-body">
                <form action="/barang/{{$barang->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col md 6">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" name="kode" value="{{$barang->kode}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Buku</label>
                                <input type="text" class="form-control" name="nama" value="{{$barang->nama}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="custom-select" name="kategori_id">
                                    @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ $kategori->id == $barang->kategori_id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <select class="custom-select" name="penerbit_id">
                                    @foreach ($penerbit as $penerbit)
                                    <option value="{{ $penerbit->id }}"
                                        {{ $penerbit->id == $barang->penerbit_id ? 'selected' : '' }}>
                                        {{ $penerbit->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <select class="custom-select" name="pengarang_id">
                                    @foreach ($pengarang as $pengarang)
                                    <option value="{{ $pengarang->id }}"
                                        {{ $pengarang->id == $barang->pengarang_id ? 'selected' : '' }}>
                                        {{ $pengarang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="number" class="form-control" name="harga_jual"
                                    value="{{$barang->harga_jual}}" min="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" name="stok" value="{{$barang->stok}}" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <div class="input-group-prepend">
                                    <input type="number" class="form-control" name="diskon" value="{{$barang->diskon}}" min="0" max="100" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/barang" class="btn btn-sm btn-secondary">
                        Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>
                        Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
