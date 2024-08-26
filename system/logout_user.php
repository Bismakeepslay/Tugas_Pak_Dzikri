<?php
session_start(); // Memulai session

// Menghancurkan session
session_unset(); // Hapus semua variabel session
session_destroy(); // Hancurkan session

// Redirect ke halaman login setelah logout
header("Location: ../pages/user_login.php");
exit();
?>
