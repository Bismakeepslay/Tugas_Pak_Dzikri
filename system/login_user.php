<?php
session_start();
include '../control/koneksi.php';

if (isset($_POST['nis'], $_POST['password'])) {
    $nis = $_POST['nis'];
    $password = $_POST['password'];

    // Query untuk mengambil NIS dan password dari tabel nasabah
    $query = "SELECT nis, password FROM nasabah WHERE nis = ? AND password = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $nis, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_nis, $db_password);
        $stmt->fetch();

        if ($password === $db_password) {
            $_SESSION['nis'] = $nis;

            // Ambil nama dan no_rekening dari tabel nasabah
            $query_user = "SELECT nama, no_rekening FROM nasabah WHERE nis = ?";
            $stmt_user = $conn->prepare($query_user);
            $stmt_user->bind_param("s", $nis);
            $stmt_user->execute();
            $stmt_user->bind_result($nama, $no_rekening);
            $stmt_user->fetch();

            $_SESSION['nama'] = $nama;
            $_SESSION['no_rekening'] = $no_rekening;

            header("Location: ../front/layout_2/content.php");
            exit();
        } else {
            header("Location: ../pages/user_login.php?error=password");
            exit();
        }
    } else {
        header("Location: ../pages/user_login.php?error=username");
        exit();
    }
} else {
    header("Location: ../pages/user_login.php");
    exit();
}
?>