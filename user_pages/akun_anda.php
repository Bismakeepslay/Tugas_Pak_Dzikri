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
            <h1 class="h3 mb-0 text-gray-800">Data Diri</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="card card-custom border-bottom-bluesky">
                    <div class="card-header bg-bluesky">
                        <h5 class="card-title card-title-custom text-white text-center">Detail Data Diri</h5>
                    </div>
                    <div class="card-body card-body-custom">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-custom"><strong>Nama :</strong> <?php echo htmlspecialchars($nama); ?></li>
                            <li class="list-group-item list-group-item-custom"><strong>NIS :</strong> <?php echo htmlspecialchars($nis); ?></li>
                            <li class="list-group-item list-group-item-custom"><strong>No Rekening :</strong> <?php echo htmlspecialchars($no_rekening); ?></li>
                            <li class="list-group-item list-group-item-custom"><strong>Kelas :</strong> <?php echo htmlspecialchars($kelas); ?></li>
                            <li class="list-group-item list-group-item-custom"><strong>Jurusan :</strong> <?php echo htmlspecialchars($jurusan); ?></li>
                            <li class="list-group-item list-group-item-custom"><strong>Jenis Kelamin :</strong> <?php echo htmlspecialchars($jenis_kelamin); ?></li>
                            <li class="list-group-item list-group-item-custom"><strong>Tanggal Pembuatan :</strong> <?php echo htmlspecialchars($tanggal_pembuatan); ?></li>
                            <li class="list-group-item list-group-item-custom"><strong>Saldo :</strong> Rp. <?php echo number_format(htmlspecialchars($saldo), 0, ',', '.'); ?></li>
                            <li class="list-group-item list-group-item-custom"><strong>Status :</strong> <?php echo htmlspecialchars($status); ?></li>
                        </ul>
                    </div>
                    <form action="../front/layout_2/content.php">
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn text-center text-white border-0" style="background-color: #6482AD; width: 100px; height: 50px;">Kembali</button>
                    </div>
                    </form>
                </div>
            </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-bluesky mt-5">
                <div class="container text-white my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bank Mini 2024 - V.1.0</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
<?php include('footer.php'); ?>
