<!-- Modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-d0ehF+DyDDF/QN4zYpZU0ob7dmWj/J4E8L0yn4M6X6E/AAgvVTrGhiJbs9x2N2uI3lT+P4Z3emQemZ8ytiQkAA==" crossorigin="anonymous" />

<div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog"
    data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambah" action="/kategori/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" autofocus >
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" id="btnTambah" class="btn btn-primary float-right">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan iziToast library di bagian head -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-AL5zRZO87M9e9+5Ff7i9MHZZXOpV0scdeBQJjULB1lXa5BKy4u6OkyX6zs2Wq2zqKHgg7yl+PTr9ZfiWgj98tw==" crossorigin="anonymous"></script>

<script>
    document.getElementById('formTambah').addEventListener('submit', function(event) {
        var inputNama = document.getElementById('nama').value;

        if (inputNama.trim() === '') {
            event.preventDefault(); // Mencegah pengiriman formulir
            iziToast.error({
                title: 'Error',
                message: 'Kategori harus diisi.',
                position: 'topRight'
            });
        }
    });
</script>

