<?php
include '../../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$dataMahasiswa = $peminjaman->getDataMahasiswaByUserId($_SESSION['user']['id_user']);
$data = $peminjaman->getDataPeminjamanMahasiswaById($dataMahasiswa['id_mahasiswa']);
$title = "Mahasiswa Histori Peminjaman";
?>

<?php include('../../templates/header.php'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>History Peminjaman Barang</h3>
        </div>
    </div>
</div>
<div class="container-fluid table-responsive">
    <table id="data-table" class="table text-nowrap table-bordered table-striped text-center mt-2 align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nomor</th>
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