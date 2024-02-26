@extends('layout.app')

@section('title', 'Kasir - Edit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pengarang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/pengarang">Pengarang</a></div>
            <div class="breadcrumb-item">Edit Pengarang</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Edit Data Pengarang</h4>
            </div>
            <div class="card-body">
                <form action="/pengarang/{{$pengarang->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama', $pengarang->nama) }}"  name="nama">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <a href="/pengarang" class="btn btn-sm btn-secondary"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
