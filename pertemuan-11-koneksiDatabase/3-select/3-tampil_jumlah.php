<?php
$koneksi = mysqli_connect("localhost", "root", "0320", "db_latihan11_web2");
$hasil1 = mysqli_query($koneksi, "select * from tbl_mhs");
$hit1 = mysqli_num_rows($hasil1);
echo "jumlah record $hit1";
?>