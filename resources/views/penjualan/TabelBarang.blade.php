<!-- Modal -->
<style>
    .low-stock {
        color: red;
    }

    .disabled-row {
        cursor: not-allowed;
        opacity: 0.5;
        /* Mengurangi opacity untuk menunjukkan baris non-aktif */
        /* pointer-events: none;  */

    }
</style>
<div class="modal fade" id="data-barang" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshPage()"
                    data-toggle="tooltip" data-placement="right" title data-original-title="Auto Save After Close Tab">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-1">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Aksi</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Stok</th>
                                    <th>Diskon</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $item)
                                <!-- Tambahkan kondisi ini -->
                                <tr class="{{ $item->stok === 0 ? 'disabled-row' : '' }}">
                                    <form action="/penjualan/store" method="POST">
                                        @csrf
                                        <td style="width: 5%">{{$loop->iteration}}<input class="form-control"
                                                type="text" value="{{$nomor}}" name="kode_transaksi" hidden></td>
                                        <td style="width: 5%">
                                            @if($item->stok > 0)
                                            <button type="submit" id="tambah" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-plus"></i></button>
                                            @else
                                            <button type="button" class="btn btn-sm btn-primary" disabled><i
                                                    class="fa fa-plus"></i></button>
                                            @endif
                                        </td>
                                        <td style="width: 20%">{{$item->kode}}<input class="form-control" type="text"
                                                value="{{$item->id}}" name="kode" hidden></td>
                                        <td style="width: 30%"><b>{{$item->nama}}</b><input class="form-control"
                                                type="text" value="{{$item->id}}" name="barang_id" hidden></td>
                                        <td>{{$item->formatRupiah('harga_jual')}}<input class="form-control" type="text"
                                                value="{{$item->harga_jual}}" name="harga" hidden></td>
                                        <td style="width: 15%"><input class="form-control" type="number" name="jumlah"
                                                id="jumlah" value="1" min="1" max="{{$item->stok}}"></td>
                                        <td class="{{ $item->stok === 0 ? 'stok-habis' : ($item->stok < 11 ? 'low-stock' : '') }}"
                                            style="width: 10%">
                                            @if ($item->stok === 0)
                                            <b class="text-danger">Stok Habis!</b>
                                            @else
                                            <b>{{$item->stok}}</b>
                                            <input type="text" value="{{$item->stok}}" hidden>
                                            <input class="form-control" type="text" value="1" name="kasir_id" hidden>
                                            @endif
                                        </td>

                                        <td style="width: 5%">{{$item->diskon}}%<input class="form-control" type="text"
                                                value="{{$item->diskon}}" name="diskon" hidden></td>
                                    </form>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    $(document).ready(function () {
        $('#table').DataTable();

        $('#table').on('submit', 'form', function (e) {
            e.preventDefault();

            var form = $(this);
            var jumlahInput = form.find('[name="jumlah"]');
            var stokInput = form.find('[name="stok"]');
            var jumlah = parseInt(jumlahInput.val());
            var stok = parseInt(stokInput.val());

            if (jumlah > stok) {
                iziToast.error({
                    title: 'Error',
                    message: 'Jumlah melebihi stok yang tersedia.',
                    position: 'topRight',
                });
                return;
            }

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function (response) {
                    console.log(response);

                    $('#myModal').modal('hide');

                    if (response.success) {
                        var newRow = [
                            // ... Data baru yang ingin ditambahkan ke tabel ...
                        ];

                        var table = $('#table').DataTable();
                        table.row.add(newRow).draw();

                        // Cek apakah properti nama ada di dalam response.data
                        var namaBarang = response.data && response.data.nama ? response.data
                            .nama :
                            'Barang'; // Ganti 'Barang' dengan nilai default jika tidak ada nama

                        iziToast.successe({
                            title: 'Success',
                            message: 'Berhasil menambahkan data ',
                            position: 'topCenter',
                        });
                    } else {
                        iziToast.success({
                            title: 'Sukses',
                            message: 'Berhasil menambahkan data ',
                            position: 'topCenter',
                            timeout: 1500, // Mengatur durasi tampilan menjadi 3 detik
                        });
                    }

                    setTimeout(function () {
                        $('.alert').alert('close');
                    }, 3000);
                },
                error: function (error) {
                    console.error(error);
                }
            });


        });

        $('#table').on('input', '[name="jumlah"]', function () {
            var jumlahInput = $(this);
            var stokInput = jumlahInput.closest('form').find('[name="stok"]');
            var jumlah = parseInt(jumlahInput.val());
            var stok = parseInt(stokInput.val());

            if (jumlah > stok) {
                iziToast.warning({
                    title: 'Warning',
                    message: 'Jumlah melebihi stok yang tersedia.',
                    position: 'topRight',
                });
                jumlahInput.val(stok);
            }
        });
    });
</script>

<script>
    function refreshPage() {
        // Refresh halaman setelah menutup modal
        location.reload();
    }
</script>
@endpush