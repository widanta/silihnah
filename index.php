<?php
include '../../../functions/mahasiswa.php';
$mahasiswa = new Mahasiswa();
$data = $mahasiswa->getDataByUserId($_SESSION['user']['id_user']);

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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.2.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-u3h5SFn5baVOWbh8UkOrAaLXttgSF0vXI15ODtCSxl0v/VKivnCN6iHCcvlyTL7L" crossorigin="anonymous">
    <title>Profil mahasiswa</title>
</head>

<body>
    <h1>profil</h1>

    <div class="container">
        <form action="" method="post">
            <form>
                <input type="hidden" name="id_mahasiswa" value="<?= $data['id_mahasiswa']; ?>">
                <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
                <div class="mb-3">
                    <label for="nim" class="form-label">nim</label>
                    <input type="number" id="nim" class="form-control" name="nim" value="<?= $data['nim']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">nama</label>
                    <input type="text" id="nama" class="form-control" name="nama" value="<?= $data['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="telpon" class="form-label">telpon</label>
                    <input type="number" id="telpon" class="form-control" name="telpon" value="<?= $data['telpon']; ?>">
                </div>
                <div class="d-flex align-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki" <?= $data['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="laki-laki">
                            Laki Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
                    <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>">
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">agama</label>
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
                    <label for="alamat" class="form-label">alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data['alamat']; ?></textarea>
                </div>

                <button type="submit" name="editProfile" class="btn btn-primary">Submit</button>
            </form>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-JdRP5GRWP6APhoVS1OM/pOKMWe7q9q8hpl+J2nhCfVJKoS+yzGtELC5REIYKrymn" crossorigin="anonymous"></script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>