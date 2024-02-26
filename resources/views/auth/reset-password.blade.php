<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reset Password</title>
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

<body  style="height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="text-white">Reset Password</h4>
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
                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->token }}">
                            <input type="hidden" name="email" value="{{ request()->email }}">
                            <!-- Add these lines inside the form -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" aria-describedby="password-addon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" aria-describedby="password-addon">
                                </div>
                                <div class="custom-control custom-checkbox mt-3">
                                    <input type="checkbox" onclick="togglePasswordVisibility()" name="show-password" class="custom-control-input" tabindex="3" id="show-password">
                                    <label class="custom-control-label" for="show-password">Show Password</label>
                                </div>
                            </div>
                            

                            <button type="submit" class="btn btn-primary btn-block">Update Password</button>
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
    <!-- Custom Script for Izitoast alert -->
<script>
    $(document).ready(function () {
        @if ($errors->has('password'))
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first('password') }}',
                position: 'topRight',
            });
        @endif

        @if ($errors->has('password_confirmation'))
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first('password_confirmation') }}',
                position: 'topRight',
            });
        @endif

        @if ($errors->has('token'))
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first('token') }}',
                position: 'topRight',
            });
        @endif

        @if ($errors->has('email'))
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first('email') }}',
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
<!-- Add this script after your existing scripts -->
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var confirmPasswordInput = document.getElementById('password_confirmation');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            confirmPasswordInput.type = "text";
        } else {
            passwordInput.type = "password";
            confirmPasswordInput.type = "password";
        }
    }
</script>

</body>
</html>