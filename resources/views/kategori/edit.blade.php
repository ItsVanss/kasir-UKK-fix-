@extends('layout.app')

@section('title', 'Kasir - Edit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kategori</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/kategori">Kategori</a></div>
            <div class="breadcrumb-item">Edit Kategori</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Kategori</h4>
            </div>
            <div class="card-body">
                <form action="/kategori/{{$kategori->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama', $kategori->nama) }}"  name="nama">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <a href="/kategori" class="btn btn-sm btn-secondary"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
