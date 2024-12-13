<?php
include '../../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$data = $peminjaman->getAllData();
$dataStatus = $peminjaman->getDataStatus();
$dataPetugas = $peminjaman->getDataPetugasByUserId($_SESSION['user']['id_user']);
$title = "Admin Peminjaman";

if (isset($_POST['submitSetuju'])) {
    // var_dump($_POST['submitSetuju']);
    $peminjaman->edit($_POST);
    if ($peminjaman) {
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<?php include('../../templates/header.php'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>Data Peminjaman</h3>
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
                    <td><?= $row['barang_dipinjam']; ?></td>
                    <td><?= $row['jumlah_barang']; ?></td>
                    <td><?= $row['nama_petugas']; ?></td>
                    <td><?= $row['nama_status']; ?></td>
                    <td>
                        <form action="" class="d-inline" method="post">
                            <input type="hidden" name="id_peminjaman" value="<?= $row['id_peminjaman']; ?>">
                            <input type="hidden" name="id_petugas" value="<?= $dataPetugas['id_petugas']; ?>">
                            <input type="hidden" name="id_status" value="3">
                            <button class="btn btn-success text-light" name="submitSetuju">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </form>
                        <form action="" class="d-inline" method="post">
                            <input type="hidden" name="id_peminjaman" value="<?= $row['id_peminjaman']; ?>">
                            <input type="hidden" name="id_petugas" value="<?= $dataPetugas['id_petugas']; ?>">
                            <input type="hidden" name="id_status" value="1">
                            <button class="btn btn-danger text-light" name="submitSetuju">
                                <i class="fa-regular fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../../templates/footer.php'); ?>