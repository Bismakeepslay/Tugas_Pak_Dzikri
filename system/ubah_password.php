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
                            <form action="profile.php" method="get">
                                <button type="submit" class="btn btn-info"><i class="fas fa-chevron-left"></i></button>
                            </form>
                            <div class="profile-picture mb-5 text-center">
                                <?php if (!empty($profile)) : ?>
                                    <img src="<?php echo htmlspecialchars($profile); ?>" class="rounded-circle" alt="Foto Profil" style="width: 120px; height: 120px; object-fit: cover;">
                                <?php else : ?>
                                    <i class="fas fa-user-circle fa-6x"></i>
                                <?php endif; ?>
                            </div>
                            <!-- Alert Notification -->
                            <?php if (isset($_GET['status'])) : ?>
                                <?php if ($_GET['status'] === 'invalid_password') : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Password Lama Salah.
                                    </div>
                                <?php elseif ($_GET['status'] === 'password_same_as_old') : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Password Baru tidak boleh sama dengan Password lama.
                                    </div>
                                <?php elseif ($_GET['status'] === 'password_too_short') : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Password minimal 8 Digit.
                                    </div>
                                <?php elseif ($_GET['status'] === 'password_too_mismatch') : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Password yang dikonfirmasi harus sama dengan Password baru.
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="d-flex justify-content-around mt-4">
                                <form action="system_ubah_password.php" method="POST" onsubmit="return validateForm()">
                                    <!-- Password Lama -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" name="password_lama" id="password_lama" class="form-control form-control-user" placeholder="Password Lama" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="togglePassword_lama">
                                                    <i class="fas fa-eye" id="eyeIcon_lama"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password Baru -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" name="password_baru" id="password_baru" class="form-control form-control-user" placeholder="Password Baru" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="togglePassword_baru">
                                                    <i class="fas fa-eye" id="eyeIcon_baru"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Konfirmasi Password Baru -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" name="confirm_password_baru" id="confirm_password_baru" class="form-control form-control-user" placeholder="Konfirmasi Password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="togglePassword_confirm">
                                                    <i class="fas fa-eye" id="eyeIcon_confirm"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success mb-5">Ubah Password <i class="fas fa-edit"></i></button>
                                </form>

                                <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Toggle password visibility
                                    const togglePassword_lama = document.querySelector("#togglePassword_lama");
                                    const password_lama = document.querySelector("#password_lama");
                                    const eyeIcon_lama = document.querySelector("#eyeIcon_lama");

                                    const togglePassword_baru = document.querySelector("#togglePassword_baru");
                                    const password_baru = document.querySelector("#password_baru");
                                    const eyeIcon_baru = document.querySelector("#eyeIcon_baru");

                                    const togglePassword_confirm = document.querySelector("#togglePassword_confirm");
                                    const confirm_password_baru = document.querySelector("#confirm_password_baru");
                                    const eyeIcon_confirm = document.querySelector("#eyeIcon_confirm");

                                    togglePassword_lama.addEventListener("click", function () {
                                        const type = password_lama.getAttribute("type") === "password" ? "text" : "password";
                                        password_lama.setAttribute("type", type);
                                        eyeIcon_lama.classList.toggle("fa-eye");
                                        eyeIcon_lama.classList.toggle("fa-eye-slash");
                                    });

                                    togglePassword_baru.addEventListener("click", function () {
                                        const type = password_baru.getAttribute("type") === "password" ? "text" : "password";
                                        password_baru.setAttribute("type", type);
                                        eyeIcon_baru.classList.toggle("fa-eye");
                                        eyeIcon_baru.classList.toggle("fa-eye-slash");
                                    });

                                    togglePassword_confirm.addEventListener("click", function () {
                                        const type = confirm_password_baru.getAttribute("type") === "password" ? "text" : "password";
                                        confirm_password_baru.setAttribute("type", type);
                                        eyeIcon_confirm.classList.toggle("fa-eye");
                                        eyeIcon_confirm.classList.toggle("fa-eye-slash");
                                    });
                                });

                                function validateForm() {
                                    const password_baru = document.getElementById('password_baru').value;
                                    const confirm_password_baru = document.getElementById('confirm_password_baru').value;

                                    if (password_baru.length < 8) {
                                        alert("Password baru harus terdiri dari minimal 8 karakter.");
                                        return false;
                                    }

                                    if (password_baru !== confirm_password_baru) {
                                        alert("Password baru dan konfirmasi password harus sama.");
                                        return false;
                                    }

                                    return true;
                                }
                                </script>
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
