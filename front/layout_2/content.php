<?php include('header.php'); ?>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <!-- Topbar -->
        <?php include('navbar.php'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
            <!-- Illustrations -->
            <div class="col-lg-12 mb-4">
                <div class="card border-bottom-bluesky shadow mb-4">
                    <div class="card-header py-3 bg-bluesky">
                        <h6 class="m-0 font-weight-bold text-white">Selamat Datang</h6>
                    </div>
                    <div class="card-body">
                        <p>Hey !!! <br>
                        Selamat datang kembali <b class="text-primary"><?php echo htmlspecialchars($nama); ?></b><br>
                        Mari menabung di Bank Mini, <br>
                        Rajin pangkal pandai, Hemat pangkal kaya <i class="fas fa-laugh-wink text-bluesky" style="font-size: 20px;"></i></p>
                    </div>
                </div>
            </div>

            <!-- Akun Anda -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Akun Anda</div>
                            <button onclick="window.location.href='../../user_pages/akun_anda.php';" class="btn btn-primary">
                                <i class="fas fa-user-circle"></i> Lihat Akun
                            </button> 
                        </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-primary"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!--Riwayat Transaksi -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Riwayat Transaksi</div>
                            <button onclick="window.location.href='../../user_pages/riwayat_transaksi.php';" class="btn btn-warning">
                                <i class="fas fa-history"></i> Lihat Riwayat
                            </button>                    
                        </div>
                    <div class="col-auto">
                        <i class="fas fa-history fa-2x text-warning"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Info -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Info</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <button onclick="window.location.href='../../user_pages/info.php';" class="btn btn-danger">
                                        <i class="fas fa-info-circle"></i> Lihat Info
                                    </button>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullhorn fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Saldo -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Saldo</div>
                                <div class="h4 mb-0 font-weight-bold text-success">
                                    <b>Rp. <?php echo number_format(htmlspecialchars($saldo), 0, ',', '.'); ?></b>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-bluesky mt-5">
                <div class="container text-white my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bisma 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
<?php include('footer.php'); ?>