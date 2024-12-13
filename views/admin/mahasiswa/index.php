<?php
include '../../../functions/mahasiswa.php';
$mahasiswa = new Mahasiswa();
$data = $mahasiswa->getAllData();
$title = 'Admin Mahasiswa';

?>

<?php include('../../templates/header.php'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            <h3>Mahasiswa</h3>
        </div>
    </div>
</div>
<div class="container-fluid table-responsive">
    <table id="data-table" class="table text-nowrap table-bordered table-striped text-center mt-2 align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nomor</th>
                <th>Id_user</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Telpon</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['id_mahasiswa'] ?></td>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['telpon'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['tanggal_lahir'] ?></td>
                    <td><?= $row['agama'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../../templates/footer.php'); ?>