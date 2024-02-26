<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="https://www.instagram.com/cvnrzlar/#">Vanss</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">VN</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            @if(auth()->user()->level=="Admin")
            <li class="menu-header">Menu</li>
            <li class="dropdown">
                    <li class="dropdown">
                        <a class="nav-link" href="/kategori"><i class="fas fa-list"></i><span>Kategori</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link" href="/penerbit"><i class="fas fa-cloud-upload-alt"></i><span>Penerbit</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link" href="/barang"><i class="fas fa-book"></i><span>Barang</span></a>
                    </li> 
            </li>
            @endif
            
            <li class="menu-header">Transaksi</li>
            <li class="dropdown">
                    <li class="dropdown">
                        <a class="nav-link" href="/penjualan"><i class="fas fa-shopping-cart"></i><span>Penjualan</span></a>
                    </li>
            </li>

            <li class="menu-header">Laporan</li>
            <li class="dropdown">
                    <li class="dropwdown">
                        <a class="nav-link" href="/laporan"><i class="fas fa-history"></i><span>Riwayat</span></a>
                    </li>
            </li>

            @if(auth()->user()->level=="Admin")
            <li class="menu-header">Pengaturan</li>
            <li class="dropdown">
                    <li class="dropdown">
                        <a class="nav-link" href="/user"><i class="fas fa-cog"></i><span>User</span></a>
                    </li>
            </li>
            @endif
        </ul>
    </aside>
</div>
