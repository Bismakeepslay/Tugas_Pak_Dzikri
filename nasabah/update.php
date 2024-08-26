<?php
// panggil koneksinya
require_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM nasabah WHERE id = '$id'");
    foreach ($q as $dt) :

    // Ambil data kelas
    $kelasQuery = $conn->query("SELECT * FROM kelas");
    $kelasList = [];
    while ($row = $kelasQuery->fetch_assoc()) {
        $kelasList[] = $row;
    }

    // Ambil data jurusan
    $jurusanQuery = $conn->query("SELECT * FROM jurusan");
    $jurusanList = [];
    while ($row = $jurusanQuery->fetch_assoc()) {
        $jurusanList[] = $row;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Akun Nasabah</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 40px 0;
            background-color: #7FA1C3; /* Warna latar yang mirip */
        }
        .container {
            width: 320px; /* Lebar container yang tidak terlalu besar */
            padding: 30px;
            background-color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 25px; /* Border radius lebih besar */
        }
        h2 {
            font-family: Poppins, sans-serif;
            text-align: center;
            color: #7FA1C3;
            margin-bottom: 30px;
        }
        input[type="text"], input[type="date"], input[type="number"], select {
            font-family: Poppins, sans-serif;
            width: 100%;
            padding: 12px; /* Padding lebih besar untuk input */
            margin: 10px 0;
            display: block;
            border: 1px solid #ccc;
            border-radius: 8px; /* Rounded input */
            box-sizing: border-box;
            background-color: #F5F5F5; /* Latar belakang yang lebih lembut */
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        .form-row select {
            width: 48%;
        }
        label {
            font-family: Poppins, sans-serif;
            margin-top: 10px;
            display: block;
            color: #7FA1C3; /* Warna teks mirip dengan tema */
        }
        .radio-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        input[type="submit"], .view-button {
            font-family: Poppins, sans-serif;
            width: 48%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            margin-left: 5px;
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50; /* Warna hijau untuk tombol submit */
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .view-button {
            background-color: #007BFF; /* Warna biru untuk tombol lihat data */
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        .view-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ubah Data Akun Nasabah</h2>
        <form action="proses_update.php" method="post">
            <input type="hidden" name="id" value="<?= $dt['id'] ?>">
            <input type="text" name="nama" value="<?= $dt['nama'] ?>" required>
            <input type="number" name="no_rekening" value="<?= $dt['no_rekening'] ?>" disabled required>
            <div class="form-row">
                <select name="kelas" required>
                    <option value="" disabled>Kelas</option>
                    <?php foreach ($kelasList as $kelas): ?>
                        <option value="<?= $kelas['nama'] ?>" <?= $dt['kelas'] == $kelas['nama'] ? 'selected' : '' ?>><?= $kelas['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="jurusan" required>
                    <option value="" disabled>Jurusan</option>
                    <?php foreach ($jurusanList as $jurusan): ?>
                        <option value="<?= $jurusan['nama'] ?>" <?= $dt['jurusan'] == $jurusan['nama'] ? 'selected' : '' ?>><?= $jurusan['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label>Jenis Kelamin:</label><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $dt['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>> Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan" <?= $dt['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan<br><br>
            <input type="date" name="tanggal_pembuatan" value="<?= $dt['tanggal_pembuatan'] ?>" required>
            <input type="number" name="saldo" value="<?= $dt['saldo'] ?>" required>
            <select name="status" required>
                <option value="" disabled>Status</option>
                <option value="Aktif" <?= $dt['status'] == 'aktif' ? 'selected' : '' ?>>aktif</option>
                <option value="Tidak Aktif" <?= $dt['status'] == 'tidak Aktif' ? 'selected' : '' ?>>tidak Aktif</option>
            </select>
            <div class="form-row">
                <input type="submit" name="submit" value="Ubah Data">
                <a class="view-button" href="table.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    endforeach;
}
?>
