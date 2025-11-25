<?php
$con = mysqli_connect("localhost", "root", "0320", "db_latihan11_web2");
$hasil = mysqli_query($con, "select * from tbl_mhs");
while ($data = mysqli_fetch_array($hasil)) {
    echo "$data[FirstName] $data[LastName] $data[Age]<br>";
}
?>