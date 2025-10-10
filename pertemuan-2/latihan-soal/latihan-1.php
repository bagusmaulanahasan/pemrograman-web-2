<html>
    <style>
        .container {
            display: flex;
            gap: 5em;
        }
    </style>
<body>
    <form action="latihan-1.php" method="post">
        <pre>
            Nama        : <input type="text" name="nama"><br>
            Jurusan     : <input type="text" name="jurusan"><br>
            Nilai Tugas : <input type="text" name="nTugas"><br>
            Nilai UTS   : <input type="text" name="nUTS"><br>
            Nilai UAS   : <input type="text" name="nUAS"><br>
            <input type="submit" value="hitung">
        </pre>
    </form>

<?php
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan']; 
$nTugas = $_POST['nTugas'];
$nUTS = $_POST['nUTS'];
$nUAS = $_POST['nUAS'];
$rataRata = ($nTugas * 0.2) + ($nUTS * 0.3) + ($nUAS * 0.4);
?>
        <div class="container">
            <div class="row">
                <pre>
            <span>Nama        : <?= $nama ?></span>
            <span>Nilai Tugas : <?= $nTugas ?></span>
            <span>Nilai UAS   : <?= $nUAS ?></span>
                </pre>
            </div>
            <div class="row">
                <pre>
<span>Jurusan   : <?= $jurusan ?></span>
<span>Nilai UTS : <?= $nUTS ?></span>
<span>Rata-Rata : <?= $rataRata ?></span>
                </pre>
            </div>
        </div>
</body>
</html>

<!-- echo "<pre><div class='container'>";
echo "<div class='row'>";
echo "Nama         : $nama<br>";
echo "Nilai Tugas  : $nTugas<br>";
echo "Nilai UAS    : $nUAS<br>";
echo "</div>";
echo "<div class='row'>";
echo "Jurusan   : $jurusan<br>";
echo "Nilai UTS : $nUTS<br>";
echo "Rata-Rata : $rataRata<br>";
echo "</div>";
echo "</div></pre>"; -->

