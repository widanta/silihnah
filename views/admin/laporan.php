<?php
include '../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$status = isset($_GET['status']) ? $_GET['status'] : null;
$data = $peminjaman->getLaporanPeminjaman($status);
$title = 'Laporan';
if (!isset($_SESSION['user']['id_role']) || ($_SESSION['user']['id_role'] != 1 && $_SESSION['user']['id_role'] != 2)) {
    echo "
    <script>
        alert('Anda tidak memiliki akses untuk halaman ini');
        window.location.href = '" . BASE_URL . "/views/mahasiswa/';
    </script>
    ";
    exit;
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

        function submitForm() {
            document.getElementById('filterStatus').submit();
        }

        function printReport() {
            var printWindow = window.open('', '', '');
            printWindow.document.write('<html><head>');
            printWindow.document.write('<style>@page { size: landscape; margin: 0; } body { margin: 1cm !important; } table { width: 100%;  border-collapse: collapse; } th, td { border: 1px solid #000 !important; padding: 8px; text-align: left; } @media print { @page { margin: 0; } body { margin: 1cm; } header, footer { display: none; } }</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h2 style="text-align: center;">Laporan</h2>');
            printWindow.document.write(document.getElementById('data-table').outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</head>

<body>
    <!-- sidebar -->
    <?php include('../templates/sidebar.php'); ?>
    <!-- end sidebar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <!-- navbar -->
        <?php include('../templates/navbar.php'); ?>
        <!-- end navbar -->
        <div class="body flex-grow-1 px-3">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col">
                        <h3>Status</h3>
                    </div>
                    <div class="col col-xl-3 my-auto text-end">
                        <form id="filterStatus" action="" method="get">
                            <select id="status" name="status" class="form-select" onchange="submitForm()">
                                <option value="">Semua</option>
                                <option value="1" <?= $status == '1' ? 'selected' : ''; ?>>Batal</option>
                                <option value="2" <?= $status == '2' ? 'selected' : ''; ?>>Menunggu Konfirmasi</option>
                                <option value="3" <?= $status == '3' ? 'selected' : ''; ?>>Sedang Dipinjam</option>
                                <option value="4" <?= $status == '4' ? 'selected' : ''; ?>>Telah Dikembalikan</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col">
                        <h3>Data Peminjaman</h3>
                    </div>
                    <div class="col my-auto text-end">
                        <button type="button" class="btn btn-primary" onclick="printReport()">Print <i class="fa-solid fa-file-pdf"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="div table-responsive">
                        <table id="data-table" class="table text-nowrap table-bordered table-striped text-center mt-2 align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Barang Dipinjam</th>
                                    <th>Jumlah Barang</th>
                                    <th>Nama Petugas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($data)) : ?>
                                    <tr>
                                        <td colspan="9" style="text-align: center;">Data Kosong</td>
                                    </tr>
                                <?php else : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['id_peminjaman']; ?></td>
                                            <td><?= $row['nama_mahasiswa']; ?></td>
                                            <td><?= $row['tanggal_pinjam']; ?></td>
                                            <td><?= $row['tanggal_kembali']; ?></td>
                                            <td><?= $row['barang_dipinjam']; ?></td>
                                            <td><?= $row['jumlah_barang']; ?></td>
                                            <td><?= $row['nama_petugas']; ?></td>
                                            <td>
                                                <span class="badge <?= $row['id_status'] == 1 ? 'text-bg-danger' : ($row['id_status'] == 2 ? 'text-bg-warning' : ($row['id_status'] == 3 ? 'text-bg-info' : ($row['id_status'] == 4 ? 'text-bg-success' : ''))); ?>">
                                                    <?= $row['nama_status']; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php include('../templates/footer.php'); ?>