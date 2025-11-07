<?php

$pegawai = array(
    array("nip" => "123456", "nama" => "Joko", "alamat" => "jakarta", "jabatan" => "manager"),
    array("nip" => "123457", "nama" => "Bobi", "alamat" => "Depok", "jabatan" => "adm"),
    array("nip" => "123458", "nama" => "Sandi", "alamat" => "Tangerang Selatan", "jabatan" => "Teknisi"),
    array("nip" => "123459", "nama" => "Dina", "alamat" => "Jakarta", "jabatan" => "operator")
);


foreach ($pegawai as $pegawai_item) {
    echo $pegawai_item["nip"] . "<br>";
    echo $pegawai_item["nama"] . "<br>";
    echo $pegawai_item["alamat"] . "<br>";
    echo $pegawai_item["jabatan"] . "<br>";
}

?>