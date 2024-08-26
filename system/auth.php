<?php
session_start();
include '../control/koneksi.php'; // Koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['nis'])) {
    header("Location: ../pages/user_login.php");
    exit();
}

$nis = $_SESSION['nis'];

// Ambil data nasabah berdasarkan NIS
$queryNasabah = "SELECT nama, nis, password, no_rekening, kelas, jurusan, jenis_kelamin, tanggal_pembuatan, saldo, status 
                FROM nasabah 
                WHERE nis = ?";
$stmtNasabah = $conn->prepare($queryNasabah);
if ($stmtNasabah) {
    $stmtNasabah->bind_param("s", $nis);
    $stmtNasabah->execute();
    $stmtNasabah->bind_result($nama, $nis, $password, $no_rekening, $kelas, $jurusan, $jenis_kelamin, $tanggal_pembuatan, $saldo, $status);
    $stmtNasabah->fetch();
    $stmtNasabah->close();
} else {
    echo "Error preparing statement.";
}

// Fungsi untuk mengambil riwayat transaksi berdasarkan no_rekening
function getRiwayatTransaksi($conn, $no_rekening) {
    $query = "SELECT tanggal_waktu, jenis_transaksi, nominal, saldo_awal, saldo_akhir 
                FROM riwayat 
                WHERE no_rekening = ? 
                ORDER BY tanggal_waktu DESC";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $no_rekening);
        $stmt->execute();
        $result = $stmt->get_result();
        $transaksi = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $transaksi;
    } else {
        return false;
    }
}

$riwayatTransaksi = getRiwayatTransaksi($conn, $no_rekening);

// Query untuk mendapatkan berita/info
$sql = "SELECT * FROM info ORDER BY tanggal DESC, waktu DESC";
$result = $conn->query($sql);
if (!$result) {
    die("Query error: " . $conn->error);
}
//berita/info-end


//profile-start
function getProfile($conn, $no_rekening) {
    $query = "SELECT nama, nis, password, no_rekening, kelas, jurusan
                FROM nasabah
                WHERE nis = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $no_rekening);
        $stmt->execute();
        $result = $stmt->get_result();
        $transaksi = $result->fetch_all(MYSQLI_ASSOC); // Ambil semua data transaksi
        $stmt->close();
        return $transaksi;
    } else {
        return false;
    }
}
$profile = getProfile($conn, $no_rekening);
//profile-end


?>