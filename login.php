<?php
include 'functions/connect.php';
$conn = new Connect();

if (isset($_POST['submit'])) {
    $conn->login($_POST['email'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>

    <form method="post">
        <label for="email">email</label>
        <input type="text" name="email">
        <br>
        <label for="password">password</label>
        <input type="password" name="password">
        <br>
        <button type="submit" name="submit">kirim</button>
    </form>


</body>

</html>