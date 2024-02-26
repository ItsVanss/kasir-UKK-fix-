<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Kasir</title>
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
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body.bg-image {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh; /* Ensure the body takes at least the full viewport height */
            position: relative;
        }

        body.bg-image::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5); /* Adjust the color and opacity as needed */
            z-index: -1;
        }

        .content {
            flex-grow: 1; /* Allow the content to take up remaining space */
        }
    </style>
</head>

<body class="bg-image" style="background-image: url('assets/img/unsplash/bgbooks.jpg'); background-size: cover; background-position: center;">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand"></div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="text-primary" data-placement="top" data-toggle="tooltip" title data-original-title="Toko Buku Termurah dan Terlengkap">Plutoz.co.id</h4>
                            </div>
                            @error('status')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="card-body">
                                <form method="POST" action="/postlogin" class="needs-validation">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                            required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            
                                            <div class="input-group">
                                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-eye-slash" id="togglePassword"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="text-right mt-2">
                                                <a href="/forgot-password" class="text-sm text-gray-600 underline" style="font-size: 12px;">Lupa password?</a>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please fill in your password
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group mt-5">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                    <div style="text-align:center" class="form-group">
                                        <span>Belum punya akun? </span>
                                            <a href="/daftar" class="text-primary" style="text-decoration: underline;">
                                                Daftar Sekarang
                                            </a>
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
    @if(session('status'))
    <script>
        iziToast.success({
            title: 'Password Reset!',
            message: '{{session('status')}}',
            position: 'topRight'
        });

    </script>
    @elseif(session('gagal'))
    <script>
        iziToast.error({
            title: 'Gagal Login!',
            message: '{{session('gagal')}}',
            position: 'topRight'
        });

    </script>
    @elseif(session('sukses'))
    <script>
        iziToast.success({
            title: 'Sukses!',
            message: '{{session('sukses')}}',
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
</body>

</html>
