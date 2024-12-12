<?php
include '../../../functions/kategori.php';
$kategori = new Kategori();
$data = $kategori->getAllData();
$title = 'Kategori';

if (isset($_POST['submitCreate'])) {
    // var_dump($_POST);
    // die;
    $kategori->create($_POST);

    if ($kategori) {
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
    $kategori->edit($_POST);

    if ($kategori) {
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
    $kategori->delete($_POST);

    if ($kategori) {
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
            <h3>Kategori</h3>
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
                <th>Id_kategori</th>
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
                    <td><?= $row['id_kategori'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning text-dark" data-coreui-toggle="modal" data-coreui-target="#editModal<?= $row['id_kategori'] ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger text-light" data-coreui-toggle="modal" data-coreui-target="#deleteModel<?= $row['id_kategori'] ?>">
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
                        <h1 class="modal-title fs-5" id="createModal">Tambah Data kategori</h1>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
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
        <div class="modal fade" id="editModal<?= $row['id_kategori'] ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModal">Edit Data kategori</h1>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_kategori" value="<?= $row['id_kategori'] ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama kategori</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $row['deskripsi'] ?>
                                </textarea>
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
        <div class="modal fade" id="deleteModel<?= $row['id_kategori'] ?>" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModel">Hapus Data kategori</h1>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_kategori" value="<?= $row['id_kategori'] ?>">
                            Apakah anda yakin ingin menghapus data ini?
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