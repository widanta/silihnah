<?php
include '../../../functions/barang.php';
$barang = new Barang();
$dataKategori = $barang->getDataKategori();
$data = $barang->getAllDataJoin();
$dataPetugas = $barang->getDataByUserId($_SESSION['user']['id_user']);
$title = 'Admin Barang';
if (!isset($_SESSION['user']['id_role']) || ($_SESSION['user']['id_role'] != 1 && $_SESSION['user']['id_role'] != 2)) {
    echo "
    <script>
        alert('Anda tidak memiliki akses untuk halaman ini');
        window.location.href = '" . BASE_URL . "/views/mahasiswa/';
    </script>
    ";
    exit;
}

if (isset($_POST['submitCreate'])) {
    $barang->create($_POST);

    if ($barang) {
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
    $barang->edit($_POST);

    if ($barang) {
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
    $barang->delete($_POST);

    if ($barang) {
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
            <h3>Barang</h3>
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
                <th>Id_barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Waktu Input</th>
                <th>Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['id_barang'] ?></td>
                    <td><?= $row['nama_barang'] ?></td>
                    <td><?= $row['nama_kategori'] ?></td>
                    <td><?= $row['stok'] ?></td>
                    <td><?= $row['waktu'] ?></td>
                    <td><?= $row['nama_petugas'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning text-dark" data-coreui-toggle="modal" data-coreui-target="#editModal<?= $row['id_barang'] ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger text-light" data-coreui-toggle="modal" data-coreui-target="#deleteModel<?= $row['id_barang'] ?>">
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
                        <h1 class="modal-title fs-5" id="createModal">Tambah Data Barang</h1>
                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama barang</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok barang</label>
                            <input type="number" class="form-control" id="stok" name="stok">
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="date" class="form-control" id="waktu" name="waktu">
                        </div>
                        <div class="mb-3">
                            <label for="id_kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="id_kategori" name="id_kategori">
                                <option selected>Pilih kategori</option>
                                <?php foreach ($dataKategori as $row) : ?>
                                    <option value="<?= $row['id_kategori'] ?>"><?= $no++ ?> - <?= $row['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_petugas" class="form-label">Petugas</label>
                            <input type="hidden" class="form-control" id="id_petugas" name="id_petugas" value="<?= $dataPetugas['id_petugas']; ?>">
                            <input type="text" class="form-control" value="<?= $_SESSION['user']['username']; ?>" readonly>
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
        <div class="modal fade" id="editModal<?= $row['id_barang'] ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModal">Edit Data barang</h1>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama barang</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama_barang']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok barang</label>
                                <input type="number" class="form-control" id="stok" name="stok" value="<?= $row['stok']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="date" class="form-control" id="waktu" name="waktu" value="<?= $row['waktu']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_kategori" class="form-label">Kategori</label>
                                <select class="form-select" id="id_kategori" name="id_kategori" required>
                                    <option selected value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                                    <?php
                                    foreach ($dataKategori as $kategori) :
                                        if ($kategori['id_kategori'] != $row['id_kategori']) {
                                            echo "<option value=\"{$kategori['id_kategori']}\"> {$kategori['nama']}</option>";
                                        }
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_petugas" class="form-label">Petugas</label>
                                <input type="hidden" class="form-control" id="id_petugas" name="id_petugas" value="<?= $dataPetugas['id_petugas']; ?>" required>
                                <input type="text" class="form-control" value="<?= $_SESSION['user']['username']; ?>" readonly>
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
        <div class="modal fade" id="deleteModel<?= $row['id_barang'] ?>" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModel">Hapus Data barang</h1>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_barang" value="<?= $row['id_barang'] ?>">
                            Apakah anda yakin ingin menghapus data ini? <b><?= $row['nama_barang'] ?></b>
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