<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img class="sidebar-brand-full" width="118" height="46" src="<?= BASE_URL; ?>/assets/img/silihnah-putih.svg" alt="">
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>">
                <svg class="nav-icon">
                    <use xlink:href="<?= BASE_URL; ?>/assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg> Dashboard
            </a>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <div class="nav-icon d-flex justify-content-center align-item-center">
                    <i class="fa-solid fa-users-gear"></i>
                </div>
                Master Pengguna
            </a>
            <ul class="nav-group-items compact">
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <div class="nav-icon d-flex justify-content-center align-item-center">
                            <i class="fa-solid fa-user-gear"></i>
                        </div> Cridential
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <div class="nav-icon d-flex justify-content-center align-item-center">
                            <i class="fa-solid fa-user-tie"></i>
                        </div> Petugas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <div class="nav-icon d-flex justify-content-center align-item-center">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div> Mahasiswa
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <div class="nav-icon d-flex justify-content-center align-item-center">
                    <i class="fa-solid fa-boxes-packing"></i>
                </div>
                Master Barang
            </a>
            <ul class="nav-group-items compact">
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <div class="nav-icon d-flex justify-content-center align-item-center">
                            <i class="fa-solid fa-box-open"></i>
                        </div> Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <div class="nav-icon d-flex justify-content-center align-item-center">
                            <i class="fa-solid fa-box-archive"></i>
                        </div> Kategori
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL; ?>/views/admin/role">
                <div class="nav-icon d-flex justify-content-center align-item-center">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                Role
            </a>
        </li>
    </ul>
</div>