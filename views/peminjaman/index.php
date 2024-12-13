<?php
include '../../functions/peminjaman.php';
$peminjaman = new Peminjaman();
$dataMahasiswa = $peminjaman->getDataByUserId($_SESSION['user']['id_user']);
$barang = $peminjaman->getDataBarang();

if (isset($_POST['submit'])) {
    $id_mahasiswa = $dataMahasiswa['id_mahasiswa'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    $data = [
        'id_mahasiswa' => $id_mahasiswa,
        'tanggal_pinjam' => $tanggal_pinjam,
        'tanggal_kembali' => $tanggal_kembali,
        'id_barang' => $id_barang,
        'jumlah' => $jumlah
    ];

    $peminjaman->create($data);

    if ($peminjaman) {
        echo "
        <script>
            alert('Peminjaman berhasil dibuat!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Peminjaman gagal dibuat!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.2.0/dist/css/coreui.min.css" rel="stylesheet">

    <script>
        function toggleInput(id) {
            var inputNumber = document.getElementById('jumlah_' + id);
            var buttonPinjam = document.getElementById('pinjam_' + id);
            if (inputNumber.style.display === 'none') {
                inputNumber.style.display = 'block';
                buttonPinjam.innerText = 'Batal';
            } else {
                inputNumber.style.display = 'none';
                buttonPinjam.innerText = 'Pilih';
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Peminjaman Barang</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Pengembalian</label>
                <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="id_barang" class="form-label">Pilih Barang</label>
                <div class="row">
                    <?php foreach ($barang as $row) : ?>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['nama_barang'] ?></h5>
                                    <p class="card-text">Stok: <?= $row['stok'] ?></p>
                                    <button type="button" id="pinjam_<?= $row['id_barang'] ?>" class="btn btn-primary" onclick="toggleInput(<?= $row['id_barang'] ?>)">Pilih</button>
                                    <input type="number" id="jumlah_<?= $row['id_barang'] ?>" name="jumlah[]" class="form-control mt-2" placeholder="Jumlah" min="1" style="display: none;">
                                    <input type="hidden" name="id_barang[]" value="<?= $row['id_barang'] ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Pinjam</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.2.0/dist/js/coreui.bundle.min.js"></script>
</body>

</html>