<?php
require_once 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
// perintah hapus data berdasarkan id yang dikirimkan
    $q = $conn->query("DELETE FROM riwayat WHERE id = '$id'");
// cek perintah
    if ($q) {
    // pesan apabila hapus berhasil
    echo "<script>alert('Data berhasil dihapus'); window.location.href='riwayat.php'</script>";
    } else {
    // pesan apabila hapus gagal
    echo "<script>alert('Data berhasil dihapus'); window.location.href='riwayat.php'</script>";
    }
} else {
  // jika mencoba akses langsung ke file ini akan diredirect ke halaman index
    header('Location:transaksi.php');
}