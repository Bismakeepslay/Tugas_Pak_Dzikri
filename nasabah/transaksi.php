<!DOCTYPE html>
<html>
<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        body {
            font-family: Poppins, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #5B99C2;
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
            color: #5B99C2;
        }
        input[type="text"], input[type="number"], select {
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
        .error-message {
            color: red;
            display: none;
        }
        .ui-autocomplete {
            max-height: 150px; /* Batasi tinggi maksimal daftar */
            overflow-y: auto;  /* Tambahkan scrollbar vertikal jika hasilnya terlalu banyak */
            overflow-x: hidden; /* Sembunyikan scrollbar horizontal */
            z-index: 1000;      /* Pastikan tampil di atas elemen lain */
        }
    </style>
    <script>
        $(function() {
            // Autocomplete for no_rekening
            $("#no_rekening").autocomplete({
                source: "search_norek.php",
                minLength: 1,
                select: function(event, ui) {
                    $("#no_rekening").val(ui.item.value);
                    $("#nama").val(ui.item.nama);
                    return false;
                }
            });

            // Fetch nasabah details on no_rekening input change
            $("#no_rekening").on("change", function() {
                var no_rekening = $(this).val();
                if (no_rekening !== "") {
                    $.ajax({
                        url: "get_nasabah.php",
                        type: "POST",
                        data: { no_rekening: no_rekening },
                        success: function(data) {
                            var nasabah = JSON.parse(data);
                            $("#nama").val(nasabah.nama);
                            $("#saldo_awal").val(nasabah.saldo);
                            if (nasabah.status === "tidak aktif") {
                                $(".error-message").show();
                                $("input[type='submit']").prop("disabled", true);
                            } else {
                                $(".error-message").hide();
                                $("input[type='submit']").prop("disabled", false);
                            }
                        }
                    });
                }
            });
            $("form").on("submit", function(event) {
                var nominal = parseInt($("input[name='nominal']").val());

                if (nominal < 10000) {
                    alert("Nominal transaksi minimal adalah Rp. 10.000.");
                    event.preventDefault(); // Mencegah pengiriman form
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Transaksi</h1>
        <form method="post" action="add_transaksi.php">
            <input type="text" id="no_rekening" name="no_rekening" placeholder="No Rekening" required>
            <input type="text" id="nama" name="nama" placeholder="Masukan Nama" readonly required>
            <div class="form">
                <select name="jenis_transaksi" required>
                    <option value="" disabled selected>Jenis Transaksi</option>
                    <option value="Setor">Setor</option>
                    <option value="Tarik">Tarik</option>
                </select>
            </div>
            <input type="number" name="nominal" placeholder="Nominal" required min="10000">
            <input type="hidden" id="saldo_awal" name="saldo_awal">
            <div class="form-row">
                <input type="submit" name="submit" value="Submit" style="width: 100%;">
                <a class="view-button" href="riwayat.php" style="width: 100%; text-align: center;">Kembali</a>
            </div>
            <p class="error-message">Transaksi tidak bisa dilakukan. Rekening ini tidak aktif.</p>
        </form>
    </div>
</body>
</html>
