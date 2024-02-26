@extends('layout.app')

@section('title', 'Kasir - User')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User</h4>
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
                                    <th style="width: 20%">Nama</th>
                                    <th style="width: 20%">Email</th>
                                    <th style="width: 10%">Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->kode}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->level}}</td>
                                    <td>
                                        <form action="/user/{{$item->id}}" id="delete-form">
                                            <a href="/user/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit"></i>
                                                Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger" id="{{$item->nama}}"
                                                data-id="{{$item->id}}" onclick="confirmDelete(this)"><i
                                                    class="fa fa-trash"></i> Delete</a>
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
@include('user.form');
@endsection



@push('script')

<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });

    var data_user = $(this).attr('data-id')

    function confirmDelete(button) {

        event.preventDefault()
        const id = button.getAttribute('data-id');
        const nama = button.getAttribute('id');
        swal({
                title: 'Apa Anda Yakin ?',
                // text: 'Anda akan menghapus data: "' + kode +
                //     '". Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                content: {
                element: "div",
                attributes: {
                    innerHTML: 'Anda akan menghapus data <strong style="color: #6654bf;">' + nama + '</strong>, Ketika anda tekan OK, maka data tidak dapat dikembalikan !',
                },
            },
            })
            .then((willDelete) => {
                if (willDelete) {
                    const form = document.getElementById('delete-form');
                    // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
                    form.action = '/user/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
                    form.submit();
                }
            });
    }
</script>
@if(session('gagal'))
    <script>
        iziToast.error({
            title: 'Gagal Daftar!',
            message: '{{session('gagal')}}',
            position: 'topRight'
        });
    </script>
@endif
@endpush
