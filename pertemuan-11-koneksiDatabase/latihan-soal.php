<?php

$servername = "localhost";
$username = "root";
$password = "0320";
$dbname = "db_lat_dbase_web2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Soal 1
$sql_create_table = "
CREATE TABLE IF NOT EXISTS tblnilai (
    nim VARCHAR(14) PRIMARY KEY,
    nama_mhs VARCHAR(30) NOT NULL,
    matakuliah VARCHAR(50) NOT NULL,
    uts FLOAT(5,2) NOT NULL,
    uas FLOAT(5,2) NOT NULL,
    tugas FLOAT(5,2) NOT NULL,
    jmlhadir INT(2) NOT NULL
);";

if ($conn->query($sql_create_table) === TRUE) {
    // echo "Tabel tblnilai berhasil dibuat atau sudah ada.<br>";
} else {
    // echo "Error saat membuat tabel: " . $conn->error . "<br>";
}

function hitungNilaiAkhir($uts, $uas, $tugas, $kehadiran) {
    // Bobot: UTS 30%, UAS 40%, TUGAS 20%, Kehadiran 10%
    $nilai_akhir = ($uts * 0.30) + ($uas * 0.40) + ($tugas * 0.20) + ($kehadiran * 0.10);
    return round($nilai_akhir, 2);
}

function tentukanGrade($nilai_akhir) {
    if ($nilai_akhir >= 80) return 'A';
    else if ($nilai_akhir >= 70) return 'B';
    else if ($nilai_akhir >= 60) return 'C';
    else if ($nilai_akhir >= 50) return 'D';
    else return 'E';
}

// Soal 2
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_data'])) {
    $nim = $conn->real_escape_string($_POST['nim']);
    $nama = $conn->real_escape_string($_POST['nama_mhs']);
    $matkul = $conn->real_escape_string($_POST['matakuliah']);
    $uts = (float)$_POST['uts'];
    $uas = (float)$_POST['uas'];
    $tugas = (float)$_POST['tugas'];
    $hadir = (int)$_POST['jmlhadir'];

    $check = $conn->query("SELECT nim FROM tblnilai WHERE nim = '$nim'");
    if ($check->num_rows > 0) {
        $message = "<p style='color:red;'>Gagal: NIM $nim sudah ada dalam database.</p>";
    } else {
        $sql_insert = "INSERT INTO tblnilai (nim, nama_mhs, matakuliah, uts, uas, tugas, jmlhadir)
                       VALUES ('$nim', '$nama', '$matkul', $uts, $uas, $tugas, $hadir)";

        if ($conn->query($sql_insert) === TRUE) {
            $message = "<p style='color:green;'>Record NIM $nim berhasil ditambahkan!</p>";
        } else {
            $message = "<p style='color:red;'>Error saat menambahkan record: " . $conn->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Nilai Sederhana</title>
</head>
<body>

    <h1>Sistem Nilai Mahasiswa Sederhana</h1>

    <?php echo $message; ?>

    <hr>

    <h2>Input Data Nilai Mahasiswa</h2>
    <form method="post" action="">
        <table border="0">
            <tr><td>NIM </td><td>: <input type="text" name="nim" maxlength="14" required></td></tr>
            <tr><td>Nama Mahasiswa</td><td>: <input type="text" name="nama_mhs" maxlength="30" required></td></tr>
            <tr><td>Mata Kuliah</td><td>: <input type="text" name="matakuliah" maxlength="50" required></td></tr>
            <tr><td>Nilai UTS (0-100)</td><td>: <input type="number" step="0.01" name="uts" min="0" max="100" required></td></tr>
            <tr><td>Nilai UAS (0-100)</td><td>: <input type="number" step="0.01" name="uas" min="0" max="100" required></td></tr>
            <tr><td>Nilai Tugas (0-100)</td><td>: <input type="number" step="0.01" name="tugas" min="0" max="100" required></td></tr>
            <tr><td>Jml Kehadiran</td><td>: <input type="number" name="jmlhadir" min="0" max="21" required></td></tr>
            <tr><td></td><td><input type="submit" name="submit_data" value="Simpan Data"></td></tr>
        </table>
    </form>

    <hr>

    <h2>Data Nilai Mahasiswa (Diurutkan berdasarkan Nilai Akhir Tertinggi)</h2>

    <?php
    // Soal 4   
    $sql_select = "SELECT * FROM tblnilai ORDER BY nim ASC";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>";
        echo "<th>NIM</th>";
        echo "<th>Nama</th>";
        echo "<th>Mata Kuliah</th>";
        echo "<th>Jml Hadir</th>";
        echo "<th>Tugas</th>";
        echo "<th>UTS</th>";
        echo "<th>UAS</th>";
        echo "<th>Nilai Akhir</th>";
        echo "<th>Grade</th>";
        echo "</tr>";

        $data_mahasiswa = [];
        while($row = $result->fetch_assoc()) {

            $nilai_kehadiran = ($row['jmlhadir'] / 21) * 100;

            $nilai_akhir = hitungNilaiAkhir($row['uts'], $row['uas'], $row['tugas'], $nilai_kehadiran);
            $grade = tentukanGrade($nilai_akhir);

            $data_mahasiswa[] = [
                'nim' => $row['nim'],
                'nama_mhs' => $row['nama_mhs'],
                'matakuliah' => $row['matakuliah'],
                'jmlhadir' => $row['jmlhadir'],
                'tugas' => $row['tugas'],
                'uts' => $row['uts'],
                'uas' => $row['uas'],
                'nilai_akhir' => $nilai_akhir,
                'grade' => $grade
            ];
        }

        usort($data_mahasiswa, function($a, $b) {
            return $b['nilai_akhir'] <=> $a['nilai_akhir'];
        });

        foreach ($data_mahasiswa as $data) {
            echo "<tr>";
            echo "<td>" . $data['nim'] . "</td>";
            echo "<td>" . $data['nama_mhs'] . "</td>";
            echo "<td>" . $data['matakuliah'] . "</td>";
            echo "<td>" . $data['jmlhadir'] . "</td>";
            echo "<td>" . $data['tugas'] . "</td>";
            echo "<td>" . $data['uts'] . "</td>";
            echo "<td>" . $data['uas'] . "</td>";
            echo "<td>" . $data['nilai_akhir'] . "</td>";
            echo "<td>" . $data['grade'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Belum ada data nilai yang tersimpan.</p>";
    }

    $conn->close();
    ?>

</body>
</html>