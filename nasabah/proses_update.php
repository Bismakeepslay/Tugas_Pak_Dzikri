<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_pembuatan = $_POST['tanggal_pembuatan'];
    $saldo = $_POST['saldo'];
    $status = $_POST['status'];

$q = $conn->query("UPDATE nasabah SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', jenis_kelamin = '$jenis_kelamin', tanggal_pembuatan = '$tanggal_pembuatan', saldo = '$saldo', status = '$status' WHERE id = '$id'");
if ($q) {
    // pesan jika data berubah
    echo "<script>alert('Data berhasil diubah'); window.location.href='table.php'</script>";
} else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data gagal diubah'); window.location.href='table.php'</script>";
}
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: index.php');
}