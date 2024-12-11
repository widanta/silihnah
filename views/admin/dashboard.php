<?php

include '../../functions/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman admin</title>
</head>

<body>
    oke berhasil. halo <?= $_SESSION['user']['id_role']; ?> selamat datang di halaman admin
</body>

<pre>
    <?php
    var_dump($_SESSION);
    ?>
</pre>

</html>