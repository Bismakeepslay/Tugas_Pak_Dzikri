<?php
session_start();
include('../control/koneksi.php'); // File koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil NIS pengguna dari session atau metode login Anda
    $nis = $_SESSION['nis'];

    // Ambil password lama, baru, dan konfirmasi dari form
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $confirm_password_baru = $_POST['confirm_password_baru'];

    // Validasi panjang password baru
    if (strlen($password_baru) < 8) {
        header("Location: profile.php?status=password_too_short");
        exit();
    }

    // Validasi konfirmasi password
    if ($password_baru !== $confirm_password_baru) {
        header("Location: profile.php?status=password_mismatch");
        exit();
    }

    // Query untuk memeriksa apakah password lama sesuai
    $query = "SELECT password FROM nasabah WHERE nis = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nis);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($existing_password);
    $stmt->fetch();

    // Validasi password lama
    if ($password_lama !== $existing_password) {
        // Password lama tidak valid
        header("Location: profile.php?status=invalid_password");
        $stmt->close();
        $conn->close();
        exit();
    }

    // Validasi password baru tidak sama dengan password lama
    if ($password_baru === $existing_password) {
        // Password baru tidak boleh sama dengan password lama
        header("Location: ubah_password.php?status=password_same_as_old");
        $stmt->close();
        $conn->close();
        exit();
    }

    // Update password baru jika password lama valid dan password baru berbeda
    $query = "UPDATE nasabah SET password = ? WHERE nis = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $password_baru, $nis);

    if ($stmt->execute()) {
        header("Location: profile.php?status=sukses");
    } else {
        header("Location: profile.php?status=gagal");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: profile.php");
    exit();
}
?>
