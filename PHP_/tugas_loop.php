<?php

//Bisma Putra Adiyana
//XI-RPL 1
echo "Bisma Putra Adiyana<br>";
echo "XI-RPL 1<br><br><br>";

echo "PERTANYAAN NOMOR 1 <br><br>";
for ($t = 1; $t <= 99; $t +=2) {
    echo "$t ";
}
echo "<br><br><br>";

echo "PERTANYAAN NOMOR 2 <br><br>";
for ($t = 0; $t <= 100; $t +=8) {
    echo "$t ";
}
echo "<br><br><br>";

echo "PERTANYAAN NOMOR 3 LOOPING 1<br><br>";
for ($t = 2; $t <= 20; $t +=2) {
    echo "$t - Aku Jago Coding <br>";
}
echo "<br>";
echo "PERTANYAAN NOMOR 3 LOOPING 2<br><br>";
for ($t = 19; $t >= 1; $t -=2) {
    echo "$t - Aku Seorang Web Developer <br>";
}
echo "<br><br><br>";

echo "PERTANYAAN NOMOR 4 <br><br>";
for($i=1; $i<=25; $i++)
{
    if($i % 2 == 0)
    {
        echo "$i . Aku Sangat Senang Coding<br>";
    }else{
        echo "$i . Hoby Aku Adalah Coding<br>";
    }
}






?>