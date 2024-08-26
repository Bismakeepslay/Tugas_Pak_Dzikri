<?php
// panggil koneksinya
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jurusan</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #F4CE14;
        }
        .container {
            width: 300px;
            padding: 40px;
            background-color: #667BC6;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }
        h1 {
            font-family: Poppins, sans-serif;
            text-align: center;
            color: white;
        }
        input[type="text"], input[type="date"], input[type="number"], select {
            font-family: Poppins, sans-serif;
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-row select {
            width: 48%;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
        }
        input[type="submit"], .view-button {
            font-family: Poppins, sans-serif;
            width: 45%;
            background-color: #FFB22C;
            color: black;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
        }
        input[type="submit"]:hover, .view-button:hover {
            background-color: yellow;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambahkan Jurusan</h1>
        <!-- 
        Create atau menambahkan data baru 
        Data akan dikirimkan ke add_kelas.php untuk diproses
        -->
        <form method="post" action="add_jurusan.php">
            <input type="text" name="nama" placeholder="Ketikan Sesuatu" required>
            <div class="button-container">
                <input type="submit" name="submit" value="Tambah Data">
                <a class="view-button" href="table2.php">Lihat Data Kelas dan Jurusan</a>
            </div>
        </form>
    </div>
</body>
</html>
