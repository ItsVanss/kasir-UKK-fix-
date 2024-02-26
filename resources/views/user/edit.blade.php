@extends('layout.app')

@section('title', 'Kasir - Edit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/user">User</a></div>
            <div class="breadcrumb-item">Edit User</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header bg-white">
                <h4 class="text-primary">Edit Data User</h4>
            </div>
            <div class="card-body">
                <form action="/user/{{$user->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" name="kode" class="form-control" value="{{$user->kode}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{$user->nama}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" value="" placeholder="Opsional" id="password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-eye-slash" id="togglePassword" onclick="togglePassword()"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Level">Level</label>
                                <select class="custom-select" name="level" readonly>
                                    <option value="Admin" <?php echo ($user->level == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="Kasir" <?php echo ($user->level == 'Kasir') ? 'selected' : ''; ?>>Kasir</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <a href="/user" class="btn btn-sm btn-secondary"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Sebelum penutup </body> -->
<script>
    function togglePassword() {
        var passwordInput = document.getElementById('password');
        var toggleButton = document.getElementById('togglePassword');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.classList.remove('fa-eye-slash');
            toggleButton.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            toggleButton.classList.remove('fa-eye');
            toggleButton.classList.add('fa-eye-slash');
        }
    }
</script>
