@extends('layout.app')

@section('title', 'Kasir - Dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

    <div class="col-12 mb-4">
            <div class="hero text-white hero-bg-image"
                style="background-image: url('assets/img/unsplash/bgbooks.jpg'); background-size: cover; background-position: center;">
                <div class="hero-inner">
                    <h2>Welcome, {{auth()->user()->nama}}</h2>
                    <p class="lead">Selamat Datang di Website Plutoz.co.id, Anda Sedang Login Sebagai <b style="font-weight: bold;">{{auth()->user()->level}}</b></p>
                    <div class="mt-4">
                        <a href="/penjualan" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-credit-card"></i>
                            Lets Go!</a>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        {{$user->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Barang</h4>
                    </div>
                    <div class="card-body">
                        {{$barang->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-upload"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Transaksi</h4>
                    </div>
                    <div class="card-body">
                        {{$transaksi->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Penjualan</h4>
                    </div>
                    <div class="card-body">
                        {{$item_terjual->count()}}
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</section>


@endsection
