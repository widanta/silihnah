<?php
include '../../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$data = $peminjaman->getDataPeminjamanStatus();
$dataStatus = $peminjaman->getDataStatus();
$dataPetugas = $peminjaman->getDataPetugasByUserId($_SESSION['user']['id_user']);
$title = "Admin Pengembalian";
if (!isset($_SESSION['user']['id_role']) || ($_SESSION['user']['id_role'] != 1 && $_SESSION['user']['id_role'] != 2)) {
    echo "
    <script>
        alert('Anda tidak memiliki akses untuk halaman ini');
        window.location.href = '" . BASE_URL . "/views/mahasiswa/';
    </script>
    ";
    exit;
}
if (isset($_POST['submitEdit'])) {
    $peminjaman->edit($_POST);
    if ($peminjaman) {
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'validasi.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah');
            document.location.href = 'validasi.php';
        </script>
        ";
    }
}
?>

<?php include('../../templates/header.php'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>Data Pengembalian</h3>
        </div>
    </div>
</div>
<div class="container-fluid table-responsive">
    <table id="data-table" class="table text-nowrap table-bordered table-striped text-center mt-2 align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nomor</th>
                <th>Id peminjaman</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Nama Petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['id_peminjaman']; ?></td>
                    <td><?= $row['nama_mahasiswa']; ?></td>
                    <td><?= $row['tanggal_pinjam']; ?></td>
                    <td><?= $row['tanggal_kembali']; ?></td>
                    <td><?= $row['nama_petugas']; ?></td>
                    <td><?= $row['nama_status']; ?></td>
                    <td>
                        <a class="btn btn-warning text-dark" href="detail.php?id_peminjaman=<?= $row['id_peminjaman']; ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../../templates/footer.php'); ?>