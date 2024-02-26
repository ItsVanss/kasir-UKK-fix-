<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Lupa Password?</title>
    <link rel="icon" href="{{asset('assets/img/unsplash/toko.png')}}" type="image/x-icon">


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

<body class="bg-light d-flex align-items-center" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="text-white">Forgot Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="redirectToLogin()" data-toggle="tooltip" data-placement="top" title="Kembali ke Halaman Login">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="card-body">
                        <!-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif -->
                        <!-- @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                        @endif -->

                        <p class="text-muted">Please enter your email address to reset your password.</p>
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Request Password Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
    $(document).ready(function () {
        @if ($errors->has('email'))
            iziToast.error({
                title: 'Error',
                message: 'User not found. Please check your email address.',
                position: 'topRight',
            });
        @endif

        @if (session()->has('status'))
            iziToast.success({
                title: 'Success',
                message: '{{ session()->get('status') }}',
                position: 'topRight',
            });
        @endif
    });
</script>
<script>
    function redirectToLogin() {
        window.location.href = "/login";
    }
</script>
</body>

</html>
