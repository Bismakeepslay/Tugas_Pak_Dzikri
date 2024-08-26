<?php include('../user_pages/header.php'); ?>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <!-- Topbar -->
        <?php include('../user_pages/navbar.php'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            </div>
            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="card shadow-sm bg-bluesky mb-5 mt-3" style="border-radius: 20px;">
                        <div class="card-body text-white">
                            <!-- Foto Profil -->
                            <div class="profile-picture mb-5 text-center">
                                <?php if (!empty($profile)) : ?>
                                    <img src="<?php echo htmlspecialchars($profile); ?>" class="rounded-circle" alt="Foto Profil" style="width: 120px; height: 120px; object-fit: cover;">
                                <?php else : ?>
                                    <i class="fas fa-user-circle fa-6x"></i>
                                <?php endif; ?>
                            </div>
                            <!-- Alert Notification -->
                            <?php if (isset($_GET['status'])) : ?>
                                <?php if ($_GET['status'] === 'sukses') : ?>
                                    <div class="alert alert-success" role="alert">
                                        Password berhasil diubah!
                                    </div>
                                <?php elseif ($_GET['status'] === 'gagal') : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Gagal mengubah password. Silakan coba lagi.
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <!-- Profile Information -->
                            <div class="profile-info">
                                <div class="info-item">
                                    <strong>Nama :</strong> <span class="float-right"><?php echo htmlspecialchars($nama); ?></span>
                                </div>
                                <div class="info-item">
                                    <strong>Nis :</strong> <span class="float-right"><?php echo htmlspecialchars($nis); ?></span>
                                </div>
                                <div class="info-item">
                                    <strong>Password :</strong> <span class="float-right"><?php echo htmlspecialchars($password); ?></span>
                                </div>
                                <div class="info-item">
                                    <strong>Kelas :</strong> <span class="float-right"><?php echo htmlspecialchars($kelas); ?></span>
                                </div>
                                <div class="info-item">
                                    <strong>Jurusan :</strong> <span class="float-right"><?php echo htmlspecialchars($jurusan); ?></span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-around mt-4">
                                <form action="../front/layout_2/content.php" method="get">
                                    <button type="submit" class="btn btn-info"><i class="fas fa-chevron-left"></i></button>
                                </form>
                                <form action="ubah_password.php" method="get">
                                    <button type="submit" class="btn btn-success">Ubah Password <i class="fas fa-edit"></i></button>
                                </form>
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
<?php include('../user_pages/footer.php'); ?>
