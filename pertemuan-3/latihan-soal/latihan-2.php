<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Akademik</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }
    .container {
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .row-bot {
        display: flex;
        gap: 2em;
    }
</style>
<body>
    <form method="post" action="">
        <h2 style="text-align:center;">Input Data Akademik</h2>
        <pre>
        Nama        : <input type="text" name="nama" required><br><br>
        NIM         : <input type="text" name="nim" required><br><br>
        Mata Kuliah : <input type="text" name="matkul" required><br><br>
        Jumlah Kehadiran (maks 18) : <input type="number" name="kehadiran" max="18" required><br><br>
        Nilai Tugas : <input type="number" name="tugas" required><br><br>
        Nilai UTS   : <input type="number" name="uts" required><br><br>
        Nilai UAS   : <input type="number" name="uas" required><br><br>
        <input type="submit" value="Hitung Nilai">
        </pre>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $matkul = $_POST['matkul'];
        $kehadiran = $_POST['kehadiran'];
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];

        $nilaiKehadiran = ($kehadiran / 18) * 100; 
        $na = ($nilaiKehadiran * 0.10) + ($tugas * 0.20) + ($uts * 0.30) + ($uas * 0.40);

        if ($na >= 80) $grade = "A";
        else if ($na >= 70) $grade = "B";
        else if ($na >= 60) $grade = "C";
        else if ($na >= 50) $grade = "D";
        else $grade = "E";

        $ket = ($na > 65) ? "Lulus" : "Tidak Lulus";
    }
    ?>

    <div class="container">
        <div class="row-top">
            <pre>
<h2>NILAI AKADEMIK <?= $matkul ?></h2>
            <span>Nama : <?= $nama ?></span>
            <span>NIM  : <?= $nim ?></span>
            </pre>
        </div>
        <div class="row-bot">
            <div class="row"></div>
                <pre>
<span>Jumlah Kehadiran : <?= $kehadiran ?></span>
<span>Nilai Tugas      : <?= $tugas ?></span>
<span>Nilai UAS        : <?= $uas ?></span>
<span>Grade            : <?= $grade ?></span>
                </pre>
            <div class="row">
                <pre>
    <span>Nilai Kehadiran : <?= number_format($nilaiKehadiran, 2) ?></span>
    <span>Nilai UTS       : <?= $uts ?></span>
    <span>Nilai Akhir     : <?= number_format($na, 2) ?></span>
    <span>Keterangan      : <?= $ket ?></span>
                </pre>
            </div>
        </div>
    </div>
</body>
</html>

        <!-- // Output
        echo "<h2>NILAI AKADEMIK $matkul</h2>";
        echo "Nama : $nama <br>";
        echo "NIM : $nim <br><br>";

        echo "Jumlah Kehadiran : $kehadiran<br>";
        echo "Nilai Kehadiran : " . number_format($nilaiKehadiran, 2) . "<br>";
        echo "Nilai Tugas : $tugas<br>";
        echo "Nilai UTS : $uts<br>";
        echo "Nilai UAS : $uas<br>";
        echo "Nilai Akhir : " . number_format($na, 2) . "<br>";
        echo "Grade : $grade<br>";
        echo "Keterangan : $ket<br>"; -->