<?php
session_start();
include '../../control/koneksi.php'; // Koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['nis'])) {
    header("Location: ../../pages/user_login.php");
    exit();
}

$nis = $_SESSION['nis'];

// Ambil nama pengguna berdasarkan NIS
$query = "SELECT nama FROM nasabah WHERE nis = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $nis);
$stmt->execute();
$stmt->bind_result($nama);
$stmt->fetch();
$stmt->close();

$nis = $_SESSION['nis'];

// Ambil data pengguna berdasarkan nis
$query = "SELECT nama, nis, no_rekening, kelas, jurusan, jenis_kelamin, tanggal_pembuatan, saldo, status 
            FROM nasabah 
            WHERE nis = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $nis);
$stmt->execute();
$stmt->bind_result($nama, $nis, $no_rekening, $kelas, $jurusan, $jenis_kelamin, $tanggal_pembuatan, $saldo, $status);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bank Mini - User</title>
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/sb-admin-2.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
