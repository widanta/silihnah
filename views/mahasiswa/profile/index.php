<?php
include '../../../functions/mahasiswa.php';
$mahasiswa = new Mahasiswa();
$data = $mahasiswa->getDataByUserId($_SESSION['user']['id_user']);
$title = "Mahasiswa Profile";

if (isset($_POST['editProfile'])) {
    $mahasiswa->edit($_POST);

    if ($mahasiswa) {
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
            <h3>Edit Profile</h3>
        </div>
        <div class="col text-end">
            <form action="" method="post">
                <button type="submit" name="editProfile" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </div>
</div>
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-3 m-auto">
            <img src="<?= BASE_URL; ?>/assets/img/default-image.svg" class="img-fluid border-dark" alt="">
        </div>
        <div class="col-6">
            <input type="hidden" name="id_mahasiswa" value="<?= $data['id_mahasiswa']; ?>">
            <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" id="nim" class="form-control" name="nim" value="<?= $data['nim']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="telpon" class="form-label">Telepon</label>
                <input type="number" id="telpon" class="form-control" name="telpon" value="<?= $data['telpon']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="d-flex justify-content-start gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" <?= $data['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" required name="agama">
                    <option value="Hindu" <?= $data['agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                    <option value="Islam" <?= $data['agama'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                    <option value="Budha" <?= $data['agama'] == 'Budha' ? 'selected' : ''; ?>>Budha</option>
                    <option value="Kristen" <?= $data['agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
                    <option value="Katolik" <?= $data['agama'] == 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                    <option value="Konghucu" <?= $data['agama'] == 'Konghucu' ? 'selected' : ''; ?>>Konghucu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $data['alamat']; ?></textarea>
            </div>
            </form>
        </div>
    </div>

</div>
<?php include('../../templates/footer.php'); ?>