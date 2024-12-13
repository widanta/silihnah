<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img class="sidebar-brand-full" width="118" height="46" src="<?= BASE_URL; ?>/assets/img/silihnah-putih.svg" alt="">
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <?php if ($_SESSION['user']['id_role'] == 1 || $_SESSION['user']['id_role'] == 2): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL; ?>/views/admin">
                    <svg class="nav-icon">
                        <use xlink:href="<?= BASE_URL; ?>/assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Dashboard
                </a>
            </li>
            <li class="nav-title">Admin</li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle">
                    <div class="nav-icon d-flex justify-content-center align-item-center">
                        <i class="fa-solid fa-users-gear"></i>
                    </div>
                    Master Pengguna
                </a>
                <ul class="nav-group-items compact">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/user/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-user-gear"></i>
                            </div> Cridential
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/petugas/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-user-tie"></i>
                            </div> Petugas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/mahasiswa/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div> Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/role/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-user-shield"></i>
                            </div> Role
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-title">Barang</li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle">
                    <div class="nav-icon d-flex justify-content-center align-item-center">
                        <i class="fa-solid fa-cube"></i>
                    </div>
                    Master Barang
                </a>
                <ul class="nav-group-items compact">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/barang/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-cubes"></i>
                            </div> Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/kategori/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-cubes-stacked"></i>
                            </div> Kategori
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-title">Peminjaman</li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle">
                    <div class="nav-icon d-flex justify-content-center align-item-center">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    Master Peminjaman
                </a>
                <ul class="nav-group-items compact">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/peminjaman/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-box-open"></i>
                            </div> Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/peminjaman/history.php">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-boxes-packing"></i>
                            </div> Histori Peminjaman
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-title">Pengembalian</li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle">
                    <div class="nav-icon d-flex justify-content-center align-item-center">
                        <i class="fa-regular fa-folder-open"></i>
                    </div>
                    Master Peminjaman
                </a>
                <ul class="nav-group-items compact">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/pengembalian/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-cart-flatbed-suitcase"></i>
                            </div> Pengembalian
                        </a>
                    </li>
                </ul>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL; ?>/views/mahasiswa">
                    <svg class="nav-icon">
                        <use xlink:href="<?= BASE_URL; ?>/assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Dashboard
                </a>
            </li>
            <li class="nav-title">Mahasiswa</li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle">
                    <div class="nav-icon d-flex justify-content-center align-item-center">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    Master Peminjaman
                </a>
                <ul class="nav-group-items compact">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/mahasiswa/peminjaman/">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-box-open"></i>
                            </div> Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/mahasiswa/peminjaman/tambah.php">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-box-archive"></i>
                            </div> Pengajuan Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>/views/mahasiswa/peminjaman/history.php">
                            <div class="nav-icon d-flex justify-content-center align-item-center">
                                <i class="fa-solid fa-boxes-packing"></i>
                            </div> Histori Peminjaman
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</div>