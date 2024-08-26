<?php
// panggil koneksinya
require_once 'koneksi.php';

// Tentukan jumlah data per halaman
$per_page = 10;

// Cek halaman saat ini
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

// Filter status akun
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$status_query = $status_filter !== '' ? "status = '$status_filter'" : '1=1';

// Filter pencarian nama
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$name_query = $search_query !== '' ? "nama LIKE '%$search_query%'" : '1=1';

// Kombinasikan filter status dan pencarian nama
$where_query = "WHERE $status_query AND $name_query";

// Ambil jumlah total data dengan filter status dan pencarian nama
$total = $conn->query("SELECT COUNT(*) AS total FROM nasabah $where_query")->fetch_assoc()['total'];
$pages = ceil($total / $per_page);

// Tampilkan data dengan limit, offset, filter status, dan pencarian nama
$q = $conn->query("SELECT * FROM nasabah $where_query LIMIT $start, $per_page");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Akun Nasabah</title>
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
            width: 85%; /* Lebar tabel dikurangi */
            background-color: #EEEEEE;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .dropdown-wrapper {
            display: flex;
            gap: 20px; /* Jarak antara dropdown filter, menu, dan input pencarian */
        }

        h1 {
            margin: 0;
            font-size: 24px;
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
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #394E6A; /* warna header tabel */
            color: white;
            font-weight: normal;
        }
        td {
            background-color: #ffffff;
        }
        tr:nth-child(even) td {
            background-color: #F7F7F7; /* background untuk baris genap */
        }
        tr:hover td {
            background-color: #E6E6E6; /* efek hover */
        }
        /* Dropdown container */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown button */
        .dropbtn {
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

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #4158A6;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 10px;
            overflow: hidden;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            font-family: Poppins, sans-serif;
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #6482AD;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #333e50;
        }

        /* Style for Ubah and Hapus buttons */
        .button1 {
            background-color: #4CAF50; /* Hijau untuk Ubah */
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
        }
        .button2 {
            background-color: #f44336; /* Merah untuk Hapus */
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
        }
        .button1:hover {
            background-color: #45a049;
        }
        .button2:hover {
            background-color: #e53935;
        }
        /* Style for alert success */
        .alert-success {
            display: none;
            padding: 20px;
            background-color: #4CAF50; /* Green */
            color: white;
            text-align: center;
            margin-bottom: 15px;
            border-radius: 4px;
            position: absolute;
            top: -70px;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
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
        <div class="header">
            <h1>Data Akun Nasabah</h1>

            <!-- Bungkus dropdown dan pencarian dalam div dengan Flexbox -->
            <div class="dropdown-wrapper">
                <!-- Input pencarian nama -->
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Cari Nama..." value="<?= $search_query ?>">
                </form>

                <!-- Dropdown filter status -->
                <div class="dropdown">
                    <button class="dropbtn">Filter Status</button>
                    <div class="dropdown-content">
                        <a href="?status=&search=<?= $search_query ?>">Semua</a>
                        <a href="?status=Aktif&search=<?= $search_query ?>">Aktif</a>
                        <a href="?status=Tidak Aktif&search=<?= $search_query ?>">Tidak Aktif</a>
                    </div>
                </div>

                <!-- Dropdown menu -->
                <div class="dropdown">
                    <button class="dropbtn">Menu</button>
                    <div class="dropdown-content">
                        <a href="index.php">Tambahkan Data Baru</a>
                        <a href="table2.php">Lihat Data Kelas dan Jurusan</a>
                        <a href="transaksi.php">Tambahkan Transaksi</a>
                        <a href="riwayat.php">Lihat Riwayat Transaksi</a>
                        <a href="rekap_jurusan.php">Rekap Jurusan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Read atau menampilkan data dari database -->
        <table id="oldDataTable">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Password</th>
                <th>Nomor Rekening</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Pembuatan</th>
                <th>Saldo</th>
                <th>Status</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php
            $no = $start + 1; // nomor urut sesuai dengan pagination
            while ($dt = $q->fetch_assoc()) :
            ?>
            <tr>  
                <td><?= $no++ ?></td>
                <td><?= $dt['nis'] ?></td>
                <td><?= $dt['password'] ?></td>
                <td><?= $dt['no_rekening'] ?></td>
                <td><?= $dt['nama'] ?></td>
                <td><?= $dt['kelas'] ?></td>
                <td><?= $dt['jurusan'] ?></td>
                <td><?= $dt['jenis_kelamin'] ?></td>
                <td><?= $dt['tanggal_pembuatan'] ?></td>
                <td>Rp. <?= number_format($dt['saldo'], 0, ',', '.') ?></td>
                <td><?= $dt['status'] ?></td>
                <td>
                    <button class="button1" onclick="window.location.href='update.php?id=<?= $dt['id'] ?>'">Ubah</button>
                </td>
                <td>
                    <button class="button2" onclick="confirmDeletion(<?= $dt['id'] ?>)">Hapus</button>
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
                <a href="?page=<?= $page - 1 ?>&status=<?= $status_filter ?>&search=<?= $search_query ?>">Sebelumnya</a>
            <?php endif; ?>

            <!-- Tampilkan nomor halaman -->
            <?php for($i = 1; $i <= $pages; $i++): ?>
                <?php if($i == $page): ?>
                    <!-- Halaman saat ini tanpa tautan -->
                    <a href="?page=<?= $i ?>&status=<?= $status_filter ?>&search=<?= $search_query ?>" style="background-color: #333e50;"><?= $i ?></a>
                <?php else: ?>
                    <a href="?page=<?= $i ?>&status=<?= $status_filter ?>&search=<?= $search_query ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <!-- Tombol 'Selanjutnya' -->
            <?php if($page < $pages): ?>
                <a href="?page=<?= $page + 1 ?>&status=<?= $status_filter ?>&search=<?= $search_query ?>">Selanjutnya</a>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function confirmDeletion(id) {
            if (confirm("Anda yakin akan menghapus data ini?")) {
                window.location.href = 'delete.php?id=' + id;
                setTimeout(function() {
                    document.getElementById('alert-success').style.display = 'block';
                }, 500);
                setTimeout(function() {
                    document.getElementById('alert-success').style.display = 'none';
                }, 3000);
            }
        }
    </script>
</body>
</html>