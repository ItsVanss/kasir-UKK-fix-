@extends('layout.app')

@section('title', 'Kasir - Penerbit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Penerbit</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Penerbit</h4>
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
                                    <th style="width: 50%">Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penerbit as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>
                                        <form action="/penerbit/{{$item->id}}" id="delete-form">
                                            {{-- <a href="/penerbit/{{$item->id}}/show"
                                                class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i> Detail</a> --}}
                                            <a href="/penerbit/{{$item->id}}/edit"
                                                class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                                                Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                id="{{$item->nama}}" data-id="{{$item->id}}"
                                                onclick="confirmDelete(this)"><i class="fa fa-trash"></i> Delete</a>
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
@include('penerbit.form');
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
                form.action = '/penerbit/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
                form.submit();
            }
        });
    }
</script>
@endpush