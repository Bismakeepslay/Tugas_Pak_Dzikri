<?php
session_start();
if (isset($_SESSION['username'], $_SESSION['password'])) {
    header("Location: ../front/layout/content.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>
<body style="background-color: #6482AD;">
    <div class="container h-100" style="margin-top: 150px;">
        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-4">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Admin Login!</h1>
                                    </div>
                                    <!-- Tampilkan pesan error jika login gagal -->
                                    <?php if (isset($_GET['error'])) { 
                                        if ($_GET['error'] == 'username') { ?>
                                            <div class="alert alert-danger text-center">Nama Pengguna Tidak Ditemukan!</div>
                                        <?php } elseif ($_GET['error'] == 'password') { ?>
                                            <div class="alert alert-danger text-center">Kata Sandi Salah!</div>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- Form Login -->
                                    <form class="user" action="../system/login_admin.php" method="post" onsubmit="return validateForm()">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" class="form-control form-control-user" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Password" required>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn text-center text-white border-0" style="background-color: #6482AD; width: 100px; height: 50px;">Login</button>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script>
    function validateForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (!username || !password) {
            alert("Both fields must be filled out.");
            return false;
        }

        if (username.length < 5) {
            alert("Username must be at least 5 characters long.");
            return false;
        }

        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            return false;
        }

        return true;
    }
    </script>
</body>
</html>
