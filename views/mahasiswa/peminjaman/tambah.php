<?php
include '../../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$dataMahasiswa = $peminjaman->getDataMahasiswaByUserId($_SESSION['user']['id_user']);
$barang = $peminjaman->getDataBarang();
$title = 'Mahasiswa Peminjaman';
if (!isset($_SESSION['user']['id_role']) || ($_SESSION['user']['id_role'] != 3)) {
    echo "
    <script>
        alert('Anda tidak memiliki akses untuk halaman ini');
        window.location.href = '" . BASE_URL . "/views/admin/';
    </script>
    ";
    exit;
}

if (isset($_POST['submit'])) {
    $id_mahasiswa = $dataMahasiswa['id_mahasiswa'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    $data = [
        'id_mahasiswa' => $id_mahasiswa,
        'tanggal_pinjam' => $tanggal_pinjam,
        'tanggal_kembali' => $tanggal_kembali,
        'id_barang' => $id_barang,
        'jumlah' => $jumlah
    ];

    $peminjaman->create($data);

    if ($peminjaman) {
        echo "
        <script>
            alert('Peminjaman berhasil dibuat!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Peminjaman gagal dibuat!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= BASE_URL; ?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title><?= isset($title) ? 'Silihnah - ' . $title : 'Silihnah'; ?></title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/vendors/simplebar.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/examples.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/vendors/@coreui/chartjs/css/coreui-chartjs.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/regular.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/solid.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/brands.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-118965717-3');
        gtag('config', 'UA-118965717-5');

        function toggleInput(id) {
            var inputNumber = document.getElementById('jumlah_' + id);
            var buttonPinjam = document.getElementById('pinjam_' + id);
            if (inputNumber.style.display === 'none') {
                inputNumber.style.display = 'flex';
                buttonPinjam.innerText = 'Batal';
            } else {
                inputNumber.style.display = 'none';
                buttonPinjam.innerText = 'Pilih';
            }
        }
    </script>
</head>

<body>
    <!-- sidebar -->
    <?php include('../../templates/sidebar.php'); ?>
    <!-- end sidebar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <!-- navbar -->
        <?php include('../../templates/navbar.php'); ?>
        <!-- end navbar -->
        <div class="body flex-grow-1 px-3">
            <form action="" method="post">
                <div class="container-fluid mb-2">
                    <div class="row justify-content-center">
                        <div class="col">
                            <h3>Peminjaman Barang</h3>
                        </div>
                        <div class="col my-auto text-end">
                            <button type="submit" name="submit" class="btn btn-primary">Pinjam</button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="mb-3">
                                <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="tanggal_kembali" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="id_barang" class="form-label">Pilih Barang</label>
                            <div class="row">
                                <?php foreach ($barang as $row) : ?>
                                    <div class="col-md-4">
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="my-auto col-md-4">
                                                    <img src="<?= BASE_URL; ?>/assets/img/default-image.svg" class="img-fluid rounded p-3" alt="Default">
                                                </div>
                                                <div class="my-auto col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $row['nama_barang'] ?></h5>
                                                        <p class="card-text">Stok: <?= $row['stok'] ?></p>
                                                        <div class="input-group">
                                                            <button type="button" id="pinjam_<?= $row['id_barang'] ?>" class="btn btn-secondary rounded" onclick="toggleInput(<?= $row['id_barang'] ?>)">Pilih</button>
                                                            <input type="number" id="jumlah_<?= $row['id_barang'] ?>" name="jumlah[]" class="form-control" placeholder="Jumlah" min="1" style="margin-left:-3px; display: none;">
                                                        </div>
                                                        <input type="hidden" name="id_barang[]" value="<?= $row['id_barang'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php include('../../templates/footer.php'); ?>