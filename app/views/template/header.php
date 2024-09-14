<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/styles.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/produk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand d-flex align-items-center text-primary" href="<?= BASEURL; ?>/home/admin">
        <i class="fas fa-store mr-2"></i> POS Application
    </a>
    <button class="navbar-toggler border-primary" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL; ?>/home/admin">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL; ?>/produk">
                    <i class="fas fa-box"></i> Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL; ?>/pelanggan">
                    <i class="fas fa-user"></i> Pelanggan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?= BASEURL; ?>/transaksi">
                    <i class="fas fa-receipt"></i> Transaksi
                </a>
            </li>
            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= BASEURL; ?>/login/logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>


