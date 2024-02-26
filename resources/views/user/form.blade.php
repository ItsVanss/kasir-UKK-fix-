<!-- Modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha384-o3NBAAuik6POlFzA6oYOd5VpFZPCKF9W1k4GkTd7EGqtQz7tmwDE/n1mApPGnMYj" crossorigin="anonymous" />
<div class="modal fade" id="form-tambah" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" name="kode" value={{$kode}} readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="control-label">Password</label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" >
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye-slash" id="togglePassword"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Please fill in your password
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Level">Level</label>
                                <select class="custom-select" name="level">
                                    <option value="">Pilih Level...</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Kasir">Kasir</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha384-b7hT/A24XXjUxAlCynl4+KgRzA+MFSKt/Y2vuk7zjsrMAuH60QR5fBPfnGkF5lM1" crossorigin="anonymous"></script>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        }
    });

   // Menambahkan event listener untuk submit form
   document.querySelector('#form-tambah form').addEventListener('submit', function (e) {
        var namaInput = document.querySelector('[name="nama"]');
        var emailInput = document.querySelector('[name="email"]');
        var passwordInput = document.querySelector('[name="password"]');
        var levelInput = document.querySelector('[name="level"]');

        // Mengecek apakah input memiliki nilai
        if (namaInput.value.trim() === '' || emailInput.value.trim() === '' || passwordInput.value.trim() === '' || levelInput.value === '') {
            e.preventDefault(); // Menghentikan pengiriman formulir
            iziToast.error({
                title: 'Error',
                message: 'Mohon lengkapi semua data sebelum menambahkan user.',
                position: 'topRight'
            });
        }
    });
</script>