<?php
// panggil koneksinya
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Kelas dan Jurusan</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background-color: #7FA1C3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 100px;
        }
        .container {
            width: 90%;
            background-color: #EEEEEE;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-direction: column;
            gap: 20px;
            height: auto; /* Sesuaikan tinggi container secara otomatis */
            position: relative;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 24px;
            margin: 0;
        }
        .table-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .table-wrapper {
            flex: 1;
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 20px;
            text-align: center;
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
        .button1, .button2 {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 14px;
            color: white;
            text-decoration: none;
            display: inline-block;
        }
        .button1 {
            background-color: #4CAF50;
        }
        .button2 {
            background-color: #f44336;
        }
        .button1:hover {
            background-color: #45a049;
        }
        .button2:hover {
            background-color: #e53935;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Data Kelas dan Jurusan</h1>
            <!-- Dropdown button for adding new data -->
            <div class="dropdown">
                <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                    <a href="input_kelas.php">Tambahkan Data Kelas Baru</a>
                    <a href="input_jurusan.php">Tambahkan Data Jurusan Baru</a>
                    <a href="table.php">Lihat Data Nasabah</a>
                </div>
            </div>
        </div>

        <div class="table-container">
            <!-- Container untuk Data Kelas -->
            <div class="table-wrapper">
                <h2>Data Kelas</h2>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php
                    // Tampilkan semua data kelas
                    $q = $conn->query("SELECT * FROM kelas");
                    $no = 1;
                    while ($dt = $q->fetch_assoc()) :
                    ?>
                    <tr>  
                        <td><?= $no++ ?></td>
                        <td><?= $dt['nama'] ?></td>
                        <td>
                            <a href="update_kelas.php?id=<?= $dt['id'] ?>" class="button1">Ubah Kelas</a>
                        </td>
                        <td>
                            <a href="delete_kelas.php?id=<?= $dt['id'] ?>" class="button2" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus Kelas</a>
                        </td>
                    </tr>
                    <?php
                    endwhile;
                    ?>
                </table>
            </div>

            <!-- Container untuk Data Jurusan -->
            <div class="table-wrapper">
                <h2>Data Jurusan</h2>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php
                    // Tampilkan semua data jurusan
                    $q = $conn->query("SELECT * FROM jurusan");
                    $no = 1;
                    while ($dt = $q->fetch_assoc()) :
                    ?>
                    <tr>  
                        <td><?= $no++ ?></td>
                        <td><?= $dt['nama'] ?></td>
                        <td>
                            <a href="update_jurusan.php?id=<?= $dt['id'] ?>" class="button1">Ubah Jurusan</a>
                        </td>
                        <td>
                            <a href="delete_jurusan.php?id=<?= $dt['id'] ?>" class="button2" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus Jurusan</a>
                        </td>
                    </tr>
                    <?php
                    endwhile;
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
