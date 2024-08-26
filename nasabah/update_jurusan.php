<?php
// panggil koneksinya
require_once 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM jurusan WHERE id = '$id'");
    $dt = $q->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Kelas</title>
    <style>
       body {
            font-family: Poppins, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #7FA1C3;
        }
        .container {
            width: 300px;
            padding: 40px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }
        h1 {
            font-family: Poppins, sans-serif;
            text-align: center;
            color: #7FA1C3;
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
            width: 48%;
            background-color: #387F39;
            color: white;
            padding: 10px 20px;
            margin: 10px 1%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #508D4E;
            color: white;
        }
        .view-button {
            background-color: #C63C51;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        .view-button:hover {
            background-color: #D95F59;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ubah Jurusan</h1>
        <form method="post" action="proses_update_jurusan.php">
            <input type="hidden" name="id" value="<?= $dt['id'] ?>">
            <input type="text" name="nama" value="<?= $dt['nama'] ?>" required>
            <div class="button-container">
                <input type="submit" name="submit" value="Ubah Data">
                <a class="view-button" href="table2.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
}
?>
