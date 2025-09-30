<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deret Bilangan Ganjil</title>
</head>

<body>
    <form action="latihan-3.php" method="post">
        <label>Nilai Awal : </label>
        <input type="number" name="n_awal">
        <br><br>
        <label>Nilai Akhir : </label>
        <input type="number" name="n_akhir">
        <br><br>
        <button type="submit">Hitung</button>
    </form>
</body>

<?php
$n_awal = $_POST['n_awal'];
$n_akhir = $_POST['n_akhir'];
$jumlah_bilangan = 0;
$jumlah_nilai_bilangan = 0;

echo "<br> Maka deret bilangan yang tampil: ";
for ($i=$n_awal; $i <$n_akhir ; $i++) { 
    if ($i % 2 !== 0) {
        if ($i % 3 === 0) {
            $jumlah_bilangan++;
            echo $i;
            echo $i < $n_akhir-6 ? ", " : "";
        }
    }
}
echo "<br> jumlah bilangan: " . $jumlah_bilangan;

echo "<br> jumlah nilai bilangan: ";
for ($i=$n_awal; $i <$n_akhir ; $i++) { 
    if ($i % 2 !== 0) {
        if ($i % 3 === 0) {
            $jumlah_nilai_bilangan += $i;
            echo $i;
            echo $i < $n_akhir-6 ? "+ " : " = " . $jumlah_nilai_bilangan;
        }
    }
}

?>

</html>