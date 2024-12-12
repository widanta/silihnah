<?php
include '../../../functions/petugas.php';
$petugas = new Petugas();
$data = $petugas->getAllDataPetugas();
$title = 'Petugas';

// if (isset($_POST['submitCreate'])) {

//     $petugas->registerPetugas($_POST['username'], $_POST['email'], $_POST['password'], $_POST['passwordConfirm'], $_POST['id_role']);

//     if ($petugas) {
//         echo "
//         <script>
//             alert('data berhasil ditambahkan');
//             document.location.href = 'index.php';
//         </script>
//         ";
//     } else {
//         echo "
//         <script>
//             alert('data gagal ditambahkan');
//             document.location.href = 'index.php';
//         </script>
//         ";
//     }
// }

if (isset($_POST['submitEdit'])) {
    $petugas->edit($_POST);
    if ($petugas) {
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

// if (isset($_POST['submitDelete'])) {
//     $petugas->deleteUser($_POST);

//     if ($petugas) {
//         echo "
//         <script>
//             alert('data berhasil dihapus');
//             document.location.href = 'index.php';
//         </script>
//         ";
//     } else {
//         echo "
//         <script>
//             alert('data gagal dihapus');
//             document.location.href = 'index.php';
//         </script>
//         ";
//     }
// }

?>

<?php include('../../templates/header.php'); ?>
<!-- ============== Button tambah ============== -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>User</h3>
        </div>
    </div>
</div>
<div class="container-fluid table-responsive">
    <table id="data-table" class="table text-nowrap table-bordered table-striped text-center mt-2 align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nomor</th>
                <th>Id_user</th>
                <th>Nama</th>
                <th>Telpon</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['id_user'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['telpon'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['tanggal_lahir'] ?></td>
                    <td><?= $row['agama'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning text-dark" data-coreui-toggle="modal" data-coreui-target="#editModal<?= $row['id_petugas'] ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- ============== Modal edit ============== -->
    <?php foreach ($data as $row) : ?>
        <div class="modal fade" id="editModal<?= $row['id_petugas'] ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModal">Edit Data Petugas</h1>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_petugas" value="<?= $row['id_petugas']; ?>">
                            <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" value="<?= $row['nama']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="telpon" class="form-label">Telpon</label>
                                <input type="number" id="telpon" class="form-control" name="telpon" value="<?= $row['telpon']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <div class="d-flex align-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" <?= $row['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="laki-laki">
                                            Laki Laki
                                        </label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="<?= $row['tanggal_lahir']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select" required name="agama">
                                    <option value="Hindu" <?= $row['agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                                    <option value="Islam" <?= $row['agama'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                                    <option value="Budha" <?= $row['agama'] == 'Budha' ? 'selected' : ''; ?>>Budha</option>
                                    <option value="Kristen" <?= $row['agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
                                    <option value="Katolik" <?= $row['agama'] == 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                                    <option value="Konghucu" <?= $row['agama'] == 'Konghucu' ? 'selected' : ''; ?>>Konghucu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $row['alamat']; ?></textarea>
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

<?php include('../../templates/footer.php'); ?>