<?php

//Bisma Putra Adiyana
//XI - RPL 1

/*if angka
if(3>2){
echo("Benar");
}else("Salah");
*/

/*
$nama = "Bisma";
if($nama == "Bisma"){
echo("Nama Saya Bisma");
}else{
echo("Saya Bukan Bisma");
}
*/

/*
$username = "Bisma Putra Adiyana";
$password = "bisma_putra250107";
if ($username == "Bisma Putra Adiyana" or $password == "bisma_putra250107"){
echo("Selamat Anda Berhasil Login");
}else{
echo("Username dan Password Anda Salah,Silahkan Masukan Kembali");
}
*/

/*
$nilai = 100;
if ($nilai == 100){
echo("A");
}else if($nilai > 70){
echo("B");
}else{
echo("Tidak Lulus");
}
*/

/*inputan nilai
echo "Nilai : 90-100 = A+ <br>";
$nilai = -1;
if ($nilai == "abc"){
echo("Maaf inputan Harus angka");
}else if ($nilai > 100){
echo("Maaf Nilai Anda Melebihi Batas");
}else if ($nilai > 90){
echo("A+");
}else if($nilai > 80){
echo("A");
}else if($nilai >70){
echo("B+");
}else if($nilai >60){
echo("B");
}else if($nilai >50){
echo("C");
}else if($nilai >40){
echo("E");
}else if($nilai <0){
echo("Inputan Salah");
}
*/

#CODINGAN PHP
#data formulir pengisian
$harga1 = "100.000";
$harga2 = "50.000";
$film = "Avangers";
$umur = 20;
$tiket1 = "VIP";
$tiket2 = "NON-VIP";
$uang_yang_diberikan = 568988;
#data formulir pengisian end

#text dan bilangan
echo "Menonton Bioskop Bersama Kawand - Kawand<br><br>";
echo "Kategori Tiket VIP dan NON-VIP<br><br>";
echo "Harga Tiket VIP Rp.$harga1<br><br>";
echo "Harga Tiket NON-VIP Rp.$harga2<br><br>";
echo "Uang Yang Diberikan : Rp.$uang_yang_diberikan <br><br>";
$bilangan1 = 100000;
$bilangan2 = 50000;
$kembalian;
$kembalian1 = $uang_yang_diberikan - $bilangan1;
$kembalian2 = $uang_yang_diberikan - $bilangan2;
if ($uang_yang_diberikan > 99999){
echo ("Kembalian :$uang_yang_diberikan - $bilangan1 = $kembalian1 <br><br>");
}else if ($uang_yang_diberikan > 50000){
echo ("Kembalian :$uang_yang_diberikan - $bilangan2 = $kembalian2 <br><br>");
}else{
echo ("Mohon Maaf Kamu Tidak Dapat Menonton Film, Karena Uangmu Kurang <br><br>");
}


#jadwal tayang
echo "Jadwal Tayang : ";
if ($film == "Avangers"){
echo ("Film $film Sedang Tayang <br><br>");
}else{ 
echo ("Film Yang Anda Pilih Sedang Tidak Tayang <br><br>");
}
#jadwal tayang end

#umur
echo "Umur Anda : ";
if ($umur > 17){
echo ("$umur Tahun, Anda Sudah Cukup Umur <br><br>");
}else if ($umur < 18){ 
echo ("$umur Tahun, Maaf Anda Belum Cukup Umur <br><br>");
}
#umur end

#tiket pembelian
echo "Tiket Pembelian : ";
if ($uang_yang_diberikan > 99000){
echo ("Anda Membeli Tiket Kursi $tiket1 Dengan Harga Tiket Rp.$harga1<br><br>");
}else if ($uang_yang_diberikan > 49999){ 
echo ("Anda Membeli Tiket Kursi $tiket2 Dengan Harga Tiket Rp.$harga2<br><br>");
}else if ($uang_yang_diberikan < 50000){ 
echo ("Tidak Mendapatkan Kursi Apapun <br><br>");
}
#tiket pembelian end

if ($uang_yang_diberikan > 49999){
echo ("Selamat Menonton dan Jangan Berisik Yaaaa");
}else if($uang_yang_diberikan < 50000){
echo ("Mohon Maaf Sepertinya Kamu Tidak Dapat Menonton, Silahkan Kembali Lagi Jika Sudah Mempunyai Uang");
}
#CODINGAN END

?>
