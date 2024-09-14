<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="bg-dark text-light">
        <div class="sidebar-header">
            <h3 class="text-white">POS Kantin Segar Abadi</h3>
        </div>

        <ul class="list-unstyled components">
            <p class="text-light">Menu</p>
            <li class="active">
                <a href="<?= BASEURL ;?>/home/kasir   "><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-light">
                    <i class="fas fa-file-alt"></i> Transaksi
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="<?= BASEURL ;?>/kasir" class="text-light">Kasir</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL ;?>/laporan" class="text-light">Laporan Penjualan</a>
                    </li>
                </ul>
            </li>   
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- User Profile and Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="data:image/jpeg;base64,<?=base64_encode ($data['user']['foto']); ?>" alt="User Photo" class="rounded-circle" width="40" height="40">
                                <span class="ml-2 font-weight-bold"><?= $data['username']; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-lg border-0" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= BASEURL ;?>/user">
                                    <i class="fas fa-user-circle mr-2"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= BASEURL; ?>/gantikey">
                                    <i class="fas fa-lock mr-2"></i> Ganti Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= BASEURL; ?>">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Your main content goes here -->
