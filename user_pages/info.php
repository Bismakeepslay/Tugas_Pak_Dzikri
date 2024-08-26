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
                <div class="d-sm-flex align-items-center justify-content-between" style="margin-bottom: 4%;">
                    <h1 class="h3 mb-0 text-gray-800">Info Terkini</h1>
                </div>
                <!-- Content Row -->
                <div class='d-flex mb-3' style="margin-left: 310px">
                    <form action='../front/layout_2/content.php'>
                        <button class='btn text-center text-white border-0' style='background-color: #6482AD; width: 100px; height: 50px;'>Kembali</button>
                    </form>
                </div>
                <div class="row justify-content-center" style="margin-bottom: 10%;">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $status = $row['status'] == 1 ? "Berita" : "Event";
                            ?>
                            <div class="col-md-7">
                                <div class="card-info shadow">
                                    <div class="card-header text-bluesky py-3 d-flex justify-content-between">
                                        <p><b><?php echo $row['tanggal'] . ' | ' . $row['waktu']; ?></b></p>
                                        <b class="pt-3 badge badge-<?php echo $row['status'] == 1 ? 'success' : 'warning'; ?>" style="width: 100px;">
                                            <?php echo $status; ?>
                                        </b>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-warning"><b><?php echo $row['judul']; ?></b></p>
                                        <p class="text-white"><b><?php echo $row['berita']; ?></b></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="col-md-7">
                            <div class='card-info shadow'>
                                <div class='card-body text-white mb-5 mt-5'>
                                    <p class='text-center'><b>Tidak ada berita saat ini.</b></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
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
