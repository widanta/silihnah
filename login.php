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
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/examples.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/fontawesome.css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/brands.css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/solid.css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/regular.css" />
    <title>Silihnah - Login</title>
</head>

<body class="login-admin">
    <section id="login">
        <div class="container-fluid p-4">
            <div class="box-container">
                <div class="row justify-content-between">
                    <div class="col-xl-7 col-md-7 d-flex justify-content-center align-items-center">
                        <img src="<?= BASE_URL; ?>/assets/img/login-admin.svg" alt="" class="img-login" />
                    </div>
                    <div class="col-xl-5 col-md-5 d-flex justify-content-center align-items-center">
                        <div class="container-input">
                            <form action="" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-xl-10 col-md-11 col-11 mt-3 mt-md-3 mt-xl-5">
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email" required />
                                            <span class="input-group-text email-icon-container">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-10 col-md-11 col-11">
                                        <div class="input-group mb-3" id="show_hide_password">
                                            <input type="password" class="form-control" placeholder="Password" name="password" required />
                                            <span class="input-group-text password-icon-container">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-5 col-md-6 col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">Ingatkan Saya</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-md-5 col-5 text-end">
                                        <a href="#" class="text-decoration-none">Lupa ?</a>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-10 col-md-11 col-11">
                                        <div class="d-grid my-3 ">
                                            <button class="btn btn-primary" name="submit" type="submit">Masuk</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row justify-content-center">
                                <div class="col text-center mt-4 mb-3">
                                    <p>Belum memiliki akun ? <a href="<?= BASE_URL; ?>/register.php" class="text-decoration-none">Daftar</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var showHidePassword = document.getElementById('show_hide_password');
        var passwordInput = showHidePassword.querySelector('input');
        var toggleIcon = showHidePassword.querySelector('span i');

        toggleIcon.classList.add('fa-solid', 'fa-eye-slash');

        showHidePassword.querySelector('span').addEventListener('click', function(event) {
            event.preventDefault();
            if (passwordInput.type === 'text') {
                passwordInput.type = 'password';
                toggleIcon.classList.add('fa-eye-slash');
                toggleIcon.classList.remove('fa-eye');
            } else if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });
    });
</script>
<script src="<?= BASE_URL; ?>/assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="<?= BASE_URL; ?>/assets/js/main.js"></script>

</html>