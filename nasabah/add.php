<?php
require_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_pembuatan = $_POST['tanggal_pembuatan'];
    $saldo = $_POST['saldo'];
    $status = $_POST['status'];

    // Validasi Data Tidak Boleh Kosong
    if (empty($nis) || empty($nama) || empty($kelas) || empty($jurusan) || empty($jenis_kelamin) || empty($tanggal_pembuatan) || empty($status)) {
        echo "<script>alert('Semua Kolom Harus Di Isi'); window.location.href='index.php'</script>";
        exit(); // Menghentikan Koneksi
    }

    // Memastikan nis unik
    $checkNisQuery = $conn->prepare("SELECT * FROM nasabah WHERE nis = ?");
    $checkNisQuery->bind_param("s", $nis);
    $checkNisQuery->execute();
    $checkNisQuery->store_result();
    if ($checkNisQuery->num_rows > 0) {
        // Nis sudah ada
        echo "<script>alert('NIS sudah ada. Silakan gunakan NIS yang lain.'); window.location.href='index.php'</script>";
        exit();
    }
    $checkNisQuery->close();

    // Generate password secara otomatis
    $password = generateRandomPassword(); // Menghasilkan password acak

    // Memastikan nomor rekening unik
    do {
        $no_rekening = mt_rand((int)1000000000, (int)9999999999);
        $checkQuery = $conn->query("SELECT * FROM nasabah WHERE no_rekening = '$no_rekening'");
    } while ($checkQuery->num_rows > 0);

    // Menyimpan data ke database
    $q = $conn->prepare("INSERT INTO nasabah (nis, password, nama, no_rekening, kelas, jurusan, jenis_kelamin, tanggal_pembuatan, saldo, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $q->bind_param("ssssssssss", $nis, $password, $nama, $no_rekening, $kelas, $jurusan, $jenis_kelamin, $tanggal_pembuatan, $saldo, $status);

    if ($q->execute()) {
        // Pesan jika data tersimpan dengan password otomatis
        echo "<script>alert('Data berhasil ditambahkan. Password otomatis: $password'); window.location.href='table.php'</script>";
    } else {
        // Pesan error jika data gagal disimpan
        echo "<script>alert('Data gagal ditambahkan. Error: " . $q->error . "'); window.location.href='index.php'</script>";
    }
    $q->close();
} else {
    // Jika mencoba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: index.php');
}

// Fungsi untuk menghasilkan password acak
function generateRandomPassword($length = 8) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $password;
}
?>
