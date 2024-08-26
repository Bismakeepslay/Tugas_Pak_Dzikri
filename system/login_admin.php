<?php
session_start();
include '../control/koneksi.php'; // Pastikan path ini benar dan file koneksi.php ada di lokasi tersebut

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengambil username dan password dari tabel login dengan role 'admin'
    $query = "SELECT username, password FROM login WHERE username = ? AND role = 'admin'";

    // Menyiapkan statement untuk mencegah SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Jika username ditemukan
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_username, $db_password);
        $stmt->fetch();

        // Verifikasi password secara langsung tanpa hash
        if ($password === $db_password) {
            $_SESSION['username'] = $username; 
            header("Location: ../front/layout/content.php"); // Redirect ke halaman content
            exit();
        } else {
            // Password salah, redirect ke halaman login dengan pesan error
            header("Location: ../pages/admin_login.php?error=password");
            exit();
        }
    } else {
        // Jika username tidak ditemukan, redirect ke halaman login dengan pesan error
        header("Location: ../pages/admin_login.php?error=username");
        exit();
    }
} else {
    // Jika form tidak diisi, redirect ke halaman login
    header("Location: ../pages/admin_login.php");
    exit();
}
?>
