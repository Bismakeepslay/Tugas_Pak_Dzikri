<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];

//Validasi Data Tidak Boleh Kosong
if (empty($nama)) {
    echo "<script>alert('Semua Kolom Harus Di Isi'); window.location.href='input_kelas.php'</script>";
    exit();//Menghentikan Koneksi
}
// id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("INSERT INTO kelas VALUES ('', '$nama')");
if ($q ) {
    // pesan jika data tersimpan
    echo "<script>alert('Data berhasil ditambahkan'); window.location.href='table2.php'</script>";
} else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data gagal ditambahkan'); window.location.href='input_kelas.php'</script>";
}
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: input_kelas.php');
}
