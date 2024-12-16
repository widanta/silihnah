<?php
include '../../../functions/petugas.php';
$petugas = new Petugas();
$data = $petugas->getDataByUserId($_SESSION['id_user']);

if (isset($_POST['editProfile'])) {
    $petugas->edit($_POST);

    if ($petugas) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah');
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
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.2.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-u3h5SFn5baVOWbh8UkOrAaLXttgSF0vXI15ODtCSxl0v/VKivnCN6iHCcvlyTL7L" crossorigin="anonymous">
    <title>Profil Admin</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    min-height: 100vh;
}

/* Sidebar */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    background: linear-gradient(135deg, #414a63, #343b53);
    color: white;
    z-index: 100;
    transition: all 0.3s ease-in-out;
}

.sidebar a {
    display: block;
    color: white;
    padding: 12px 20px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}

.sidebar a:hover {
    background-color: #50546c;
    border-left: 4px solid #a6b1e1;
    padding-left: 24px;
}

.sidebar-brand {
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #2c303a, #414a63);
    height: 70px;
    padding: 10px 0;
    border-bottom: 1px solid #4a5060;
}

.sidebar-brand img {
    max-width: 100px;
    max-height: 50px;
    object-fit: contain;
}

/* Container */
.container {
    margin-left: 270px;
    margin-top: 30px;
    width: calc(100% - 270px);
    padding: 20px;
}

/* Card */
.card {
    background: linear-gradient(135deg, #ffffff, #f8f9fc);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 30px;
    max-width: 600px;
    margin: 0 auto;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

/* Form Styling */
.form-label {
    font-weight: 600;
    color: #555;
}

.form-control {
    border-radius: 8px;
    padding: 10px 15px;
    border: 1px solid #ced4da;
    transition: all 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #7b93e5;
    box-shadow: 0 0 8px rgba(123, 147, 229, 0.5);
}

/* Button */
.btn-primary {
    background: linear-gradient(90deg, #444962, #343b53);
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    color: white;
    transition: all 0.3s ease;
    display: block;
    margin: 20px auto;
    width: auto;
}

.btn-primary:hover {
    background: linear-gradient(90deg, #343b53, #444962);
    transform: translateY(-3px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

/* Responsiveness */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }

    .container {
        margin-left: 0;
        width: 100%;
    }

    .card {
        width: 90%;
        padding: 20px;
    }
}
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="<?= BASE_URL; ?>/assets/img/silihnah-putih.svg" alt="Logo">
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL; ?>/views/admin">
                    Dashboard
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="card">
            <h3 class="text-center mb-4" style="font-size: 20px; color: #333;">Profil Admin</h3>
            <form action="" method="post">
                <input type="hidden" name="id_petugas" value="<?= $data['id_petugas']; ?>">
                <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">

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

                <button type="submit" name="editProfile" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>

</html>
