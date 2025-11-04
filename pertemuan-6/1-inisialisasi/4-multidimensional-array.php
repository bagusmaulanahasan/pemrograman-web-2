<?php

$mahasiswa = array(
    array("nim" => "123456", "nama" => "Joko", "alamat" => "57ariabl", "jurusan" => "Teknik Informatika"),
    array("nim" => "123457", "nama" => "Bobi", "alamat" => "Depok", "jurusan" => "Teknik Informatika"),
    array("nim" => "123458", "nama" => "Sandi", "alamat" => "Tangerang Selatan", "jurusan" => "Teknik Informatika"),
    array("nim" => "123459", "nama" => "Dina", "alamat" => "Jakarta", "jurusan" => "Teknik Informatika")
);

echo "Menampilkan isi dari variable multidimensional array<br><br>";

// echo $mahasiswa[0]["nim"];
// echo $mahasiswa[0] ["nama"];
// echo $mahasiswa[0] ["alamat"];
// echo $mahasiswa[0] ["jurusan"];
// echo $mahasiswa[1]["nim"];
// echo $mahasiswa[1] ["nama"];
// echo $mahasiswa[1] ["alamat"];
// echo $mahasiswa[1] ["jurusan"];
// echo $mahasiswa[2]["nim"];
// echo $mahasiswa[2] ["nama"];
// echo $mahasiswa[2] ["alamat"];
// echo $mahasiswa[2] ["jurusan"];
// echo $mahasiswa[3]["nim"];
// echo $mahasiswa[3] ["nama"];
// echo $mahasiswa[3] ["alamat"];
// echo $mahasiswa[3] ["jurusan"];

// echo "<br><br>atau<br><br>";

for($i=0;$i<4;$i++){
    echo $mahasiswa[$i]["nim"] . ", ";
    echo $mahasiswa[$i]["nama"] . ", ";
    echo $mahasiswa[$i]["alamat"] . ", ";
    echo $mahasiswa[$i]["jurusan"] . ", ";
    echo "<br><br>";
}
?>