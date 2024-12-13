<?php
include '../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$data = $peminjaman->getAllData();
$dataStatus = $peminjaman->getDataStatus();
$dataPetugas = $peminjaman->getDataPetugasByUserId($_SESSION['user']['id_user']);
$title = "Peminjaman";

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

<?php include('../templates/header.php'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>Validasi Peminjaman</h3>
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
                        <button type="button" class="btn btn-warning text-dark" data-coreui-toggle="modal" data-coreui-target="#editModal<?= $row['id_peminjaman'] ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- ============== Modal edit ============== -->
    <?php foreach ($data as $row) : ?>
        <div class="modal fade" id="editModal<?= $row['id_peminjaman'] ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModal">Edit Data Petugas</h1>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_peminjaman" value="<?= $row['id_peminjaman']; ?>">
                            <input type="hidden" name="id_petugas" value="<?= $dataPetugas['id_petugas']; ?>">
                            <div class="mb-3">
                                <label for="id_status" class="form-label">Status</label>
                                <select class="form-select" id="id_status" name="id_status">
                                    <option selected value="<?= $row['id_status']; ?>"><?= $row['id_status']; ?></option>
                                    <?php
                                    foreach ($dataStatus as $status) :
                                        if ($status['id_status'] != $row['id_status']) {
                                            echo "<option value=\"{$status['id_status']}\"> {$status['nama_status']}</option>";
                                        }
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Batal</button>
                            <button type="submitEdit" name="submitEdit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include('../templates/footer.php'); ?>