<?php
include '../../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$dataMahasiswa = $peminjaman->getDataMahasiswaByUserId($_SESSION['user']['id_user']);
$data = $peminjaman->getDataPeminjamanMahasiswaStatusBelumById($dataMahasiswa['id_mahasiswa']);
$title = "Mahasiswa Peminjaman";
if (!isset($_SESSION['user']['id_role']) || ($_SESSION['user']['id_role'] != 3)) {
    echo "
    <script>
        alert('Anda tidak memiliki akses untuk halaman ini');
        window.location.href = '" . BASE_URL . "/views/admin/';
    </script>
    ";
    exit;
}

?>

<?php include('../../templates/header.php'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>Data Barang Dipinjam</h3>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary" href="tambah.php">
                Tambah
            </a>
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
                    <td><?= $row['nama_status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../../templates/footer.php'); ?>