<?php
include '../../../functions/role.php';
$role = new Role();
$data = $role->getAllData();


if (isset($_POST['submitCreate'])) {
    $role->create($_POST);

    if ($role) {
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

if (isset($_POST['submitEdit'])) {
    $role->edit($_POST);

    if ($role) {
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

if (isset($_POST['submitDelete'])) {
    $role->delete($_POST);

    if ($role) {
        echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Silihnah - Admin Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>data role</h1>
    <!-- ============== Button tambah ============== -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        Tambah
    </button>

    <table id="data-table" class="table text-nowrap table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Id_Role</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['id_role'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_role'] ?>">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModel<?= $row['id_role'] ?>">
                            Hapus
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- ============== Modal tambah ============== -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createModal">Tambah Data Role</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Role</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submitCreate" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============== Modal edit ============== -->
    <?php foreach ($data as $row) : ?>
        <div class="modal fade" id="editModal<?= $row['id_role'] ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModal">Edit Data Role</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_role" value="<?= $row['id_role'] ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Role</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $row['deskripsi'] ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submitEdit" name="submitEdit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- ============== Modal hapus ============== -->
    <?php foreach ($data as $row) : ?>
        <div class="modal fade" id="deleteModel<?= $row['id_role'] ?>" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModel">Hapus Data Role</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_role" value="<?= $row['id_role'] ?>">
                            Apakah anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submitEdit" name="submitDelete" class="btn btn-primary">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>