<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Tidak Di Temukan!</title>
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

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <h1>404</h1>
                        <div class="page-description">
                            Halaman Yang Anda Cari <b>Tidak Tersedia</b>
                        </div>
                        <div class="page-search">
                            <form id="search-form">
                                <div class="form-group floating-addon floating-addon-not-append">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                        <input id="search-input" type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3">
                                <a href="/dashboard">Back to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-footer mt-5">
                    Copyright &copy; <a href="https://www.instagram.com/cvnrzlar/#">Cavan Rizal</a> 2024
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("search-form");
            var input = document.getElementById("search-input");

            form.addEventListener("submit", function (event) {
                event.preventDefault(); // Menghentikan perilaku default formulir

                var query = input.value
            .toLowerCase(); // Mendapatkan nilai input dan mengonversinya menjadi huruf kecil

                switch (query) {
                    case "penjualan":
                        window.location.href = "/penjualan";
                        break;
                    case "barang":
                        window.location.href = "/barang";
                        break;
                    case "kategori":
                        window.location.href = "/kategori";
                        break;
                    case "penerbit":
                        window.location.href = "/penerbit";
                        break;
                    case "pengarang":
                        window.location.href = "/pengarang";
                        break;
                    case "laporan":
                        window.location.href = "/laporan";
                        break;
                    case "user":
                        window.location.href = "/user";
                        break;
                    case "dashbaord":
                        window.location.href = "/dashbaord";
                        break;
                    default:
                        alert('Halaman yang Anda cari tidak tersedia');
                        break;
                }
            });
        });
    </script>


</body>

</html>
