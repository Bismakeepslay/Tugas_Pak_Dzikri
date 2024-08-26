<?php
// panggil koneksinya
require_once 'koneksi.php';

// Tentukan jumlah data per halaman
$per_page = 10;

// Cek halaman saat ini
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

// Filter pencarian nama
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$name_query = $search_query !== '' ? "nama LIKE '%$search_query%'" : '1=1';

// Kombinasikan filter status dan pencarian nama
$where_query = "WHERE $name_query";

// Ambil jumlah total data dengan filter status dan pencarian nama
$total = $conn->query("SELECT COUNT(*) AS total FROM riwayat $where_query")->fetch_assoc()['total'];
$pages = ceil($total / $per_page);

// Tampilkan data dengan limit, offset, filter status, dan pencarian nama
$q = $conn->query("SELECT * FROM riwayat $where_query ORDER BY tanggal_waktu DESC LIMIT $start, $per_page");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Transaksi</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background-color: #7FA1C3; /* tetap sesuai permintaan */
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            margin: 50px 0;
        }
        .container {
            width: 70%;
            background-color: #EEEEEE;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dropdown-wrapper {
            display: flex;
            gap: 20px; /* Jarak antara dropdown filter, menu, dan input pencarian */
        }
        h1 {
            font-size: 24px;
            margin: 0;
        }
        input[type="text"] {
            font-family: Poppins, sans-serif;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            width: 250px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #394E6A;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #394E6A;
            color: white;
            font-weight: normal;
        }
        td {
            background-color: #ffffff;
        }
        tr:nth-child(even) td {
            background-color: #F7F7F7;
        }
        tr:hover td {
            background-color: #E6E6E6;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-button {
            font-family: Poppins, sans-serif;
            background-color: #394E6A;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            width: auto;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #4158A6;
            border-radius: 10px;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            border-radius: 10px;
            display: block;
            font-family: Poppins, sans-serif;
        }
        .dropdown-content a:hover {
            background-color: #6482AD;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropdown-button {
            background-color: #333e50;
        }
        .button2 {
            font-family: Poppins, sans-serif;
            background-color: #f44336;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }
        .button2:hover {
            background-color: #e53935;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination a {
            background-color: #394E6A;
            color: white;
            padding: 10px 15px;
            margin: 0 5px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .pagination a:hover {
            background-color: #333e50;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-container">
            <h1>Riwayat Transaksi</h1>
            <!-- Bungkus dropdown dan pencarian dalam div dengan Flexbox -->
            <div class="dropdown-wrapper">
                <!-- Input pencarian nama -->
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Cari Nama..." value="<?= htmlspecialchars($search_query) ?>">
                </form>
                <div class="dropdown">
                <button class="dropdown-button">Menu</button>
                    <div class="dropdown-content">
                        <a href="table.php">Lihat Data Nasabah</a>
                        <a href="transaksi.php">Tambahkan Transaksi</a>
                        <a href="riwayat_count.php">Lihat Jumlah Data Transaksi</a>
                    </div>
                </div>
            </div>  
        </div>

        <!-- Read atau menampilkan data dari database -->
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor Rekening</th>
                <th>Tanggal dan Waktu</th>
                <th>Jenis Transaksi</th>
                <th>Nominal Transaksi</th>
                <th>Saldo Awal</th>
                <th>Saldo Akhir</th>
                <th>Aksi</th>
            </tr>
            <?php
            // Menampilkan data dengan urutan terbaru di atas
            $no = $start + 1; // Penomoran sesuai dengan pagination
            while ($dt = $q->fetch_assoc()) :
            ?>
            <tr>  
                <td><?= $no++ ?></td>
                <td><?= $dt['nama'] ?></td>
                <td><?= $dt['no_rekening'] ?></td>
                <td><?= $dt['tanggal_waktu'] ?></td>
                <td><?= $dt['jenis_transaksi'] ?></td>
                <td>Rp. <?= number_format($dt['nominal'], 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($dt['saldo_awal'], 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($dt['saldo_akhir'], 0, ',', '.') ?></td>
                <td>
                    <a href="delete_riwayat.php?id=<?= $dt['id'] ?>" class="button2" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php
            endwhile;
            ?>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <!-- Tombol 'Sebelumnya' -->
            <?php if($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search_query) ?>">Sebelumnya</a>
            <?php endif; ?>

            <!-- Tampilkan nomor halaman -->
            <?php for($i = 1; $i <= $pages; $i++): ?>
                <?php if($i == $page): ?>
                    <!-- Halaman saat ini tanpa tautan -->
                    <a href="?page=<?= $i ?>&search=<?= urlencode($search_query) ?>" style="background-color: #333e50;"><?= $i ?></a>
                <?php else: ?>
                    <a href="?page=<?= $i ?>&search=<?= urlencode($search_query) ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <!-- Tombol 'Selanjutnya' -->
            <?php if($page < $pages): ?>
                <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search_query) ?>">Selanjutnya</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
