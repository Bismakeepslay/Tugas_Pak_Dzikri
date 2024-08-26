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
                    <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
                </div>
                <!-- Content Row -->
                <div class="row justify-content-center">
                    <div class="col-lg-10 mt-3">
                        <form action="../front/layout_2/content.php">
                            <div class="d-flex mb-2">
                                <button class="btn text-center text-white border-0" style="background-color: #6482AD; width: 100px; height: 50px;">Kembali</button>
                            </div>
                        </form>
                        <div class="card shadow" style="margin-bottom: 10%;">
                            <div class="card-header bg-bluesky py-3">
                                <h6 class="m-0 font-weight-bold text-white">Riwayat Transaksi</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tanggal dan Waktu</th>
                                                <th class="text-center">Jenis Transaksi</th>
                                                <th class="text-center">Nominal</th>
                                                <th class="text-center">Saldo Awal</th>
                                                <th class="text-center">Saldo Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1; // Inisialisasi penomoran
                                            if ($riwayatTransaksi) {
                                                foreach ($riwayatTransaksi as $transaksi) {
                                                    echo "<tr class='font-weight-bold text-white bg-bluesky'>
                                                            <td class='text-center'>{$no}</td>
                                                            <td class='text-center'>{$transaksi['tanggal_waktu']}</td>
                                                            <td class='text-center'>{$transaksi['jenis_transaksi']}</td>
                                                            <td class='text-center'>Rp " . number_format($transaksi['nominal'], 0, ',', '.') . "</td>
                                                            <td class='text-center'>Rp " . number_format($transaksi['saldo_awal'], 0, ',', '.') . "</td>
                                                            <td class='text-center'>Rp " . number_format($transaksi['saldo_akhir'], 0, ',', '.') . "</td>
                                                        </tr>";
                                                    $no++; // Increment nomor
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center bg-bluesky text-white'><b>Belum melakukan Transaksi apapun.</b></td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
