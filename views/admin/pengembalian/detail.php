<?php
include '../../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$data = $peminjaman->getDataKembaliById($_GET['id_peminjaman']);
$dataPetugas = $peminjaman->getDataPetugasByUserId($_SESSION['user']['id_user']);
$title = "Admin Pengembalian Detail Barang";

if (isset($_POST['submitSelesai'])) {
    $peminjaman->pengembalian($_POST);
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
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Nama Petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['id_peminjaman']; ?></td>
                <td><?= $data['nama_mahasiswa']; ?></td>
                <td><?= $data['tanggal_pinjam']; ?></td>
                <td><?= $data['tanggal_kembali']; ?></td>
                <td><?= $data['barang_dipinjam']; ?></td>
                <td><?= $data['jumlah_barang']; ?></td>
                <td><?= $data['nama_petugas']; ?></td>
                <td><?= $data['nama_status']; ?></td>
                <td>
                    <form action="" class="d-inline" method="post">
                        <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman']; ?>">
                        <input type="hidden" name="id_petugas" value="<?= $dataPetugas['id_petugas']; ?>">
                        <input type="hidden" name="id_status" value="4">
                        <button class="btn btn-info text-light" name="submitSelesai">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php include('../../templates/footer.php'); ?>