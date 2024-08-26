<?php
include('../../control/koneksi.php');

$sql = "
    SELECT 
        DATE(tanggal_waktu) as tanggal,
        SUM(CASE WHEN jenis_transaksi = 'setor' THEN 1 ELSE 0 END) AS total_setor,
        SUM(CASE WHEN jenis_transaksi = 'tarik' THEN 1 ELSE 0 END) AS total_tarik
    FROM riwayat
    GROUP BY DATE(tanggal_waktu)
    ORDER BY tanggal_waktu DESC
";

$result = $conn->query($sql);

if (!$result) {
    die("Query error: " . $conn->error);
}

$tanggal = [];
$total_setor = [];
$total_tarik = [];

while ($row = $result->fetch_assoc()) {
    $tanggal[] = $row['tanggal'];
    $total_setor[] = (int)$row['total_setor'];
    $total_tarik[] = (int)$row['total_tarik'];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bank Mini - Admin</title>
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/sb-admin-2.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
