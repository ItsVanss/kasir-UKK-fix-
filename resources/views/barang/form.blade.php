<!-- Modal -->
<link rel="stylesheet" href="path/to/izitoast/css/iziToast.min.css">
<div class="modal fade" id="form-tambah" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/barang/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="kode">Kode</label>
                            <input value="{{$nomor}}" type="text" class="form-control" name="kode" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Buku</label>
                                <input type="text" class="form-control" name="nama" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select class="custom-select" name="kategori_id">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penerbit_id">Penerbit</label>
                                <select class="custom-select" name="penerbit_id" >
                                    <option value="" disabled selected>Pilih Penerbit</option>
                                    <!--placeholder-->
                                    @foreach ($penerbit as $penerbit)
                                    <option value="{{$penerbit->id}}">{{$penerbit->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pengarang_id">Pengarang</label>
                                <select class="custom-select" name="pengarang_id">
                                    <option value="" disabled selected>Pilih Pengarang</option>
                                    @foreach ($pengarang as $pengarang)
                                    <option value="{{ $pengarang->id }}">{{ $pengarang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary">Rp.</span>
                                    <input type="number" class="form-control" name="harga_jual" min="0" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" name="stok" value="0" min="0" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <div class="input-group-prepend">
                                    <input type="number" class="form-control" name="diskon" value="0" min="0" max="100">
                                    <span class="input-group-text bg-secondary">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add izitoast CSS and JS files -->
<script src="path/to/izitoast/js/iziToast.min.js"></script>

<!-- Add this script after your HTML form -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('#form-tambah form');

        form.addEventListener('submit', function (event) {
            var inputs = form.querySelectorAll('input, select');
            var isInvalid = false;

            inputs.forEach(function (input) {
                // Check if the input is not the diskon field and is empty
                if (input.name !== 'diskon' && input.value.trim() === '') {
                    isInvalid = true;
                }

                // Check if the input is the diskon field and is not a number
                if (input.name === 'diskon' && (isNaN(input.value) || input.value.trim() === '')) {
                    isInvalid = true;
                }
            });

            if (isInvalid) {
                event.preventDefault(); // Prevent form submission

                // Use izitoast for displaying the notification
                iziToast.error({
                    title: 'Error',
                    message: 'Harap isi Semua Form',
                    position: 'topRight',
                    timeout: 3500, // Adjust timeout as needed
                });
            }
        });
    });
</script>

<!-- <script>
    function refreshPage() {
        // Refresh halaman setelah menutup modal
        location.reload();
    }
</script> -->

