<?php
include 'functions/connect.php';
$conn = new Connect();

if (isset($_POST['submit'])) {
    $conn->registerMahasiswa($_POST['username'], $_POST['email'], $_POST['password'], $_POST['passwordConfirm']);
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>

<body>

    <form method="post">
        <label for="username">username</label>
        <input type="text" name="username">
        <br>
        <label for="email">email</label>
        <input type="email" name="email">
        <br>
        <label for="password">password</label>
        <input type="password" name="password">
        <br>
        <label for="password">password</label>
        <input type="password" name="passwordConfirm">
        <br>
        <button type="submit" name="submit">kirim</button>
    </form>


</body>

</html>