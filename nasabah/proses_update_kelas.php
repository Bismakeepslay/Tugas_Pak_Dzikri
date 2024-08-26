<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

$q = $conn->query("UPDATE kelas SET nama = '$nama' WHERE id = '$id'");
if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data berhasil diubah'); window.location.href='table2.php'</script>";
} else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data gagal diubah'); window.location.href='table2.php'</script>";
}
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: input_kelas.php');
}