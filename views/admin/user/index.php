<?php
include '../../../functions/petugas.php';
$petugas = new Petugas();
$data = $petugas->getAllData();
$dataRole = $petugas->getDataRole();
$title = 'Admin User';

if (!isset($_SESSION['user']['id_role']) || ($_SESSION['user']['id_role'] != 1 && $_SESSION['user']['id_role'] != 2)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

if (isset($_POST['submitCreate'])) {

    $petugas->registerPetugas($_POST['username'], $_POST['email'], $_POST['password'], $_POST['passwordConfirm'], $_POST['id_role']);

    if ($petugas) {
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
    $petugas->editUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['passwordConfirm'], $_POST['id_role'], $_POST['id_user']);

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

if (isset($_POST['submitDelete'])) {
    $petugas->deleteUser($_POST);

    if ($petugas) {
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

<?php include('../../templates/header.php'); ?>
<!-- ============== Button tambah ============== -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>User</h3>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#createModal">
                Tambah
            </button>
        </div>
    </div>
</div>
<div class="container-fluid table-responsive">
    <table id="data-table" class="table text-nowrap table-bordered table-striped text-center mt-2 align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nomor</th>
                <th>Id_user</th>
                <th>Username</th>
                <th>email</th>
                <th>Id_role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['id_user'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['id_role'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning text-dark" data-coreui-toggle="modal" data-coreui-target="#editModal<?= $row['id_user'] ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger text-light" data-coreui-toggle="modal" data-coreui-target="#deleteModel<?= $row['id_user'] ?>">
                            <i class="fa-regular fa-trash-can"></i>
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
                        <h1 class="modal-title fs-5" id="createModal">Tambah Data User</h1>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class=" mb-3">
                            <label for="username" class="form-label">username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="username" name="username" required />
                                <span class="input-group-text email-icon-container">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" required />
                                <span class="input-group-text email-icon-container">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label for="password" class="form-label">password</label>
                            <div class="input-group" id="show_hide_password_1">
                                <input type="password" class="form-control" placeholder="Password" name="password" required />
                                <span class="input-group-text password-icon-container">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="passwordConfirm" class="form-label">passwordConfirm</label>
                            <div class="input-group" id="show_hide_password_2">
                                <input type="password" class="form-control" placeholder="passwordConfirm" name="passwordConfirm" required />
                                <span class="input-group-text password-icon-container">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="id_role" class="form-label">Role</label>
                            <select class="form-select" id="id_role" name="id_role">
                                <option selected>Pilih Role</option>
                                <?php $no_urut = 1;
                                foreach ($dataRole as $row) : ?>
                                    <option value="<?= $row['id_role'] ?>"><?= $no_urut++; ?> - <?= $row['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Batal</button>
                        <button type="submit" name="submitCreate" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============== Modal edit ============== -->
    <?php foreach ($data as $row) : ?>
        <div class="modal fade" id="editModal<?= $row['id_user'] ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModal">Edit Data petugas</h1>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                            <div class=" mb-3">
                                <label for="username" class="form-label">username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="username" name="username" value="<?= $row['username']; ?>" required />
                                    <span class="input-group-text email-icon-container">
                                        <i class="fa-regular fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $row['email']; ?>" required />
                                    <span class="input-group-text email-icon-container">
                                        <i class="fa-regular fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" placeholder="Password" name="password" value="<?= $row['password']; ?>" required />
                            <input type="hidden" class="form-control" placeholder="passwordConfirm" name="passwordConfirm" value="<?= $row['password']; ?>" required />
                            <div class="mb-3">
                                <label for="id_role" class="form-label">Role</label>
                                <select class="form-select" id="id_role" name="id_role">
                                    <option selected value="<?= $row['id_role']; ?>"><?= $row['id_role']; ?></option>
                                    <?php
                                    foreach ($dataRole as $role) :
                                        if ($role['id_role'] != $row['id_role']) {
                                            echo "<option value=\"{$role['id_role']}\"> {$role['nama']}</option>";
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

    <!-- ============== Modal hapus ============== -->
    <?php foreach ($data as $row) : ?>
        <div class="modal fade" id="deleteModel<?= $row['id_user'] ?>" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModel">Hapus Data User</h1>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                            Apakah anda yakin ingin menghapus data ini? <b><?= $row['email']; ?></b>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Batal</button>
                            <button type="submitEdit" name="submitDelete" class="btn btn-primary">Yakin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include('../../templates/footer.php'); ?>