<?php
include '../../../functions/role.php';
$role = new Role();
$data = $role->getAllData();
$title = 'Role';
if (!isset($_SESSION['user']['id_role']) || ($_SESSION['user']['id_role'] != 1 && $_SESSION['user']['id_role'] != 2)) {
    echo "
    <script>
        alert('Anda tidak memiliki akses untuk halaman ini');
        window.location.href = '" . BASE_URL . "/views/mahasiswa/';
    </script>
    ";
    exit;
}

?>

<?php include('../../templates/header.php'); ?>
<!-- ============== Button tambah ============== -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>Role</h3>
        </div>
    </div>
</div>
<div class="container-fluid table-responsive">
    <table id="data-table" class="table text-nowrap table-bordered table-striped text-center mt-2 align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nomor</th>
                <th>Id_Role</th>
                <th>Nama</th>
                <th>Deskripsi</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include('../../templates/footer.php'); ?>