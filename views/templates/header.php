<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= BASE_URL; ?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title><?= isset($title) ? 'Silihnah - ' . $title : 'Silihnah'; ?></title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/vendors/simplebar.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/examples.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/vendors/@coreui/chartjs/css/coreui-chartjs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-118965717-3');
        gtag('config', 'UA-118965717-5');
    </script>
</head>

<body>
    <!-- sidebar -->
    <?php include('sidebar.php'); ?>
    <!-- end sidebar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <!-- navbar -->
        <?php include('navbar.php'); ?>
        <!-- end navbar -->
        <div class="body flex-grow-1 px-3">