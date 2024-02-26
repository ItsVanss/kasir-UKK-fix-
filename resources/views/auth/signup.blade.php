<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Daftar Kasir</title>
    <link rel="icon" href="assets/img/unsplash/toko.png" type="image/x-icon">


    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body.bg-image {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 100vh;
        /* Ensure the body takes at least the full viewport height */
        position: relative;
    }

    body.bg-image::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.5);
        /* Adjust the color and opacity as needed */
        z-index: -1;
    }

    .content {
        flex-grow: 1;
        /* Allow the content to take up remaining space */
    }
</style>

<body class="bg-image"
    style="background-image: url('assets/img/unsplash/bgbooks.jpg'); background-size: cover; background-position: center;">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 mt-3">
                        <div class="login-brand">
                            <!-- <img src="stisla/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle"> -->
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="text-primary">Aplikasi Kasir</h4>
                            </div>
                            @error('status')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="card-body">
                                <form method="POST" action="/user/daftar" class="needs-validation">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-primary" for="nama">Nama</label>
                                                <input id="nama" type="text" class="form-control" name="nama"
                                                    tabindex="1" autofocus placeholder="Masukkan Nama">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-primary" for="email">Email</label>
                                                <input id="email" type="email" class="form-control" name="email"
                                                    tabindex="1" autofocus placeholder="Masukkan Email">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password" class="text-primary">Password</label>
                                                <div class="input-group">
                                                    <input id="password" type="password" class="form-control"
                                                        name="password" tabindex="2" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-eye-slash" id="togglePassword"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please fill in your password
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label text-primary" for="Level">Level</label>
                                                <select class="custom-select" name="level">
                                                    @if($user->where('level', 'Admin')->count() == 0)
                                                    <option value="Admin">Admin</option>
                                                    @endif
                                                    @if($user->where('level', 'Admin')->count() > 0 ||
                                                    $user->where('level', 'Kasir')->count() == 0)
                                                    <option value="Kasir">Kasir</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span>Sudah punya akun? </span>
                                        <a href="/login" class="text-primary" style="text-decoration: underline;">
                                            Login
                                        </a>
                                    </div>

                                    <div class="form-group col-sm-5 mx-auto">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Daftar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/popper.js')}}"></script>
    <script src="{{asset('assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @if(session('gagal'))
    <script>
        iziToast.error({
            title: 'Gagal Daftar!',
            message: '{{session('
            gagal ')}}',
            position: 'topRight'
        });
    </script>
    @endif
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
    </script>
    <script>
        document.getElementById("nama").addEventListener("input", function (event) {
            let input = event.target.value;
            let regex = /^[a-zA-Z ]*$/; // Hanya huruf dan spasi yang diperbolehkan
            if (!regex.test(input)) {
                event.target.value = input.slice(0, -1); // Menghapus karakter terakhir jika itu bukan huruf
            }
        });
    </script>
</body>

</html>
