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
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/examples.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/regular.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/solid.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/fontawesome/css/brands.min.css">
    <title>Silihnah - Register</title>
</head>

<body>
    <section id="login">
        <div class="container-fluid p-4">
            <div class="box-container">
                <div class="row justify-content-between">
                    <div class="col-xl-7 col-md-7 d-flex justify-content-center align-items-center">
                        <img src="<?= BASE_URL; ?>/assets/img/register.svg" alt="" class="img-login" />
                    </div>
                    <div class="col-xl-5 col-md-5 d-flex justify-content-center align-items-center">
                        <div class="container-input">
                            <form action="" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-xl-10 col-md-11 col-11 mt-3 mt-md-3 mt-xl-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Username" name="username" required />
                                            <span class="input-group-text email-icon-container">
                                                <i class="fa-regular fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-10 col-md-11 col-11">
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email" required />
                                            <span class="input-group-text email-icon-container">
                                                <i class="fa-regular fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-10 col-md-11 col-11">
                                        <div class="input-group mb-3" id="show_hide_password_1">
                                            <input type="password" class="form-control" placeholder="Password" name="password" required />
                                            <span class="input-group-text password-icon-container">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-10 col-md-11 col-11">
                                        <div class="input-group mb-3" id="show_hide_password_2">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="passwordConfirm" required />
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
                                            <button class="btn btn-primary" name="submit" type="submit">Buat</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row justify-content-center">
                                <div class="col text-center mt-4 mb-3">
                                    <p>Sudah memiliki akun ? <a href="<?= BASE_URL; ?>/login.php" class="text-decoration-none">Masuk</a></p>
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
        var showHidePassword1 = document.getElementById('show_hide_password_1');
        var passwordInput1 = showHidePassword1.querySelector('input');
        var toggleIcon1 = showHidePassword1.querySelector('span i');

        toggleIcon1.classList.add('fa-solid', 'fa-eye-slash');

        showHidePassword1.querySelector('span').addEventListener('click', function(event) {
            event.preventDefault();
            if (passwordInput1.type === 'text') {
                passwordInput1.type = 'password';
                toggleIcon1.classList.add('fa-eye-slash');
                toggleIcon1.classList.remove('fa-eye');
            } else if (passwordInput1.type === 'password') {
                passwordInput1.type = 'text';
                toggleIcon1.classList.remove('fa-eye-slash');
                toggleIcon1.classList.add('fa-eye');
            }
        });

        var showHidePassword2 = document.getElementById('show_hide_password_2');
        var passwordInput2 = showHidePassword2.querySelector('input');
        var toggleIcon2 = showHidePassword2.querySelector('span i');

        toggleIcon2.classList.add('fa-solid', 'fa-eye-slash');

        showHidePassword2.querySelector('span').addEventListener('click', function(event) {
            event.preventDefault();
            if (passwordInput2.type === 'text') {
                passwordInput2.type = 'password';
                toggleIcon2.classList.add('fa-eye-slash');
                toggleIcon2.classList.remove('fa-eye');
            } else if (passwordInput2.type === 'password') {
                passwordInput2.type = 'text';
                toggleIcon2.classList.remove('fa-eye-slash');
                toggleIcon2.classList.add('fa-eye');
            }
        });
    });
</script>
<script src="<?= BASE_URL; ?>/assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="<?= BASE_URL; ?>/assets/js/main.js"></script>


</html>