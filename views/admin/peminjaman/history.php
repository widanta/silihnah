<?php
include '../../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$data = $peminjaman->getAllData();
$dataStatus = $peminjaman->getDataStatus();
$dataPetugas = $peminjaman->getDataPetugasByUserId($_SESSION['user']['id_user']);
$title = "Admin Histori Peminjaman";
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

<?php include('../../templates/header.php'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>Histori Data Peminjaman Barang</h3>
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
                <th>Barang Dipinjam</th>
                <th>Jumlah Barang</th>
                <th>Nama Petugas</th>
                <th>Status</th>
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
        </tbody>
    </table>
</div>
<?php include('../../templates/footer.php'); ?>