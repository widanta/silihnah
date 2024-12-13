<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="<?= BASE_URL; ?>/assets/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
        </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="<?= BASE_URL; ?>/assets/brand/coreui.svg#full"></use>
            </svg></a>
        <ul class="header-nav ms-3">
            <li class="nav-item">
                <a class="nav-link">
                    <?= $_SESSION['user']['username']; ?>
                </a>
            </li>
            <li class=" nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img" src="<?= BASE_URL; ?>/assets/img/team-4.jpg" alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Settings</div>
                    </div>
                    <?php
                    if ($_SESSION['user']['id_role'] == 1 || $_SESSION['user']['id_role'] == 2) {
                        echo "
                        <a class='dropdown-item mt-2' href='" . BASE_URL . "/views/admin/profile/index.php'>
                            <svg class='icon me-2'>
                                <use xlink:href='" . BASE_URL . "/assets/vendors/@coreui/icons/svg/free.svg#cil-user'></use>
                            </svg> Profile
                        </a>
                        ";
                    } else {
                        echo "
                        <a class='dropdown-item mt-2' href='" . BASE_URL . "/views/mahasiswa/profile/index.php'>
                            <svg class='icon me-2'>
                                <use xlink:href='" . BASE_URL . "/assets/vendors/@coreui/icons/svg/free.svg#cil-user'></use>
                            </svg> Profile
                        </a>
                        ";
                    }
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= BASE_URL; ?>/logout.php">
                        <svg class="icon me-2">
                            <use xlink:href="<?= BASE_URL; ?>/assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg>
                        Keluar
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <span>Home</span>
                </li>
                <li class="breadcrumb-item active">
                    <span><?= isset($title) ? $title : ''; ?></span>
                </li>
            </ol>
        </nav>
    </div>
</header>