<?php
include('../control/koneksi.php');

//riwayat_transaksi for chart
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

//add_info
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $judul = $_POST['judul'];
    $tanggal = date('Y:m:d');
    $waktu = date('H:i:s');
    $berita = $_POST['berita'];
    $status = $_POST['status'];

    // Query untuk memasukkan data ke tabel info
    $query = "INSERT INTO info (judul, tanggal, waktu, berita, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $judul, $tanggal, $waktu, $berita, $status);
    

    if ($stmt->execute()) {
        // Jika berhasil
        echo "<script>alert('Info berhasil ditambahkan!'); window.location.href='../front/layout/content.php';</script>";
    } else {
        // Jika gagal
        echo "<script>alert('Terjadi kesalahan, coba lagi.'); window.history.back();</script>";
    }
    $stmt->close();


$conn->close();
}
?>