<style>
    .dashboard-nav {
        background-color: #048a50;
    }

    .fa-bars {
        color: #048a50;
    }
</style>

<div class="dashboard-nav">
    <header>
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
        <a href="#" class="brand-logo">
            <i class="fab fa-galactic-republic fa-spin"></i>
            <span>Muda Pustaka</span>
        </a>
    </header>
    <nav class="dashboard-nav-list">
        <a href="?module=home" class="dashboard-nav-item">
            <i class="fas fa-home"></i>
            Beranda
        </a>
        <a href="?module=siswa" class="dashboard-nav-item">
            <i class="fas fa-users"></i>
            Data Siswa
        </a>
        <a href="?module=buku" class="dashboard-nav-item">
            <i class="fas fa-book"></i>
            Data Buku
        </a>
        <div class="dashboard-nav-dropdown">
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                <i class="fas fa-th-list"></i>
                Pustaka
            </a>
            <div class="dashboard-nav-dropdown-menu">
                <a href="#" class="dashboard-nav-dropdown-item">Peminjaman</a>
                <a href="#" class="dashboard-nav-dropdown-item">Pengembalian</a>
            </div>
        </div>
        <a href="?module=user" class="dashboard-nav-item">
            <i class="fas fa-user"></i>
            Data User
        </a>
        <!-- Garis -->
        <div class="nav-item-divider"></div>
        <a href="#" class="dashboard-nav-item">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </nav>
</div>