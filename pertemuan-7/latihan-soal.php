<?php
// Deklarasi semua fungsi yang dibutuhkan (TETAP SAMA)

// 1. Penggunaan IF
function hitungNilaiDanGrade($nilai_akhir) {
    if ($nilai_akhir >= 80) {
        $grade = 'A';
    } elseif ($nilai_akhir >= 70) {
        $grade = 'B';
    } elseif ($nilai_akhir >= 60) {
        $grade = 'C';
    } elseif ($nilai_akhir >= 50) {
        $grade = 'D';
    } else {
        $grade = 'E';
    }
    return "Nilai Akhir: $nilai_akhir, Grade: $grade";
}

// 2. Penggunaan SWITCH..CASE
function kalkulatorSederhana($angka1, $angka2, $operator) {
    $hasil = 0;
    // Pastikan input berupa angka
    if (!is_numeric($angka1) || !is_numeric($angka2)) {
        return "Error: Input harus berupa angka.";
    }
    
    switch ($operator) {
        case '+':
            $hasil = $angka1 + $angka2;
            break;
        case '-':
            $hasil = $angka1 - $angka2;
            break;
        case '*':
            $hasil = $angka1 * $angka2;
            break;
        case '/':
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
            } else {
                return "Error: Pembagian dengan nol tidak diizinkan.";
            }
            break;
        default:
            return "Error: Operator tidak valid.";
    }
    return "$angka1 $operator $angka2 = $hasil";
}

// 3. Penggunaan Looping
function tampilkanBilanganGenapKelipatanTiga($batas_atas) {
    // Pastikan batas atas adalah angka positif
    if (!is_numeric($batas_atas) || $batas_atas <= 0) {
        return "Error: Batas atas harus berupa angka positif.";
    }
    
    $output = "Bilangan genap yang habis dibagi 3 (1 sampai $batas_atas):<br>";
    $jumlah = 0;
    $bilangan_ditemukan = [];
    
    for ($i = 1; $i <= $batas_atas; $i++) {
        if ($i % 2 == 0 && $i % 3 == 0) {
            $bilangan_ditemukan[] = $i;
            $jumlah += $i;
        }
    }
    
    if (count($bilangan_ditemukan) > 0) {
        $output .= implode(" ", $bilangan_ditemukan) . "<br>";
    } else {
        $output .= "Tidak ditemukan bilangan.<br>";
    }
    
    $output .= "Jumlah bilangan tersebut: $jumlah";
    return $output;
}

// 4. Penggunaan Array (Contoh Perkalian Matriks 2x2)
function perkalianMatriks($matriks_a, $matriks_b) {
    // Validasi sederhana
    if (count($matriks_a) != 2 || count($matriks_b) != 2) {
         return "Error: Matriks harus 2x2.";
    }
    
    $hasil = array(array(0, 0), array(0, 0));
    
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 2; $j++) {
            for ($k = 0; $k < 2; $k++) {
                // Pastikan elemen matriks adalah angka sebelum dikalikan
                if (!is_numeric($matriks_a[$i][$k]) || !is_numeric($matriks_b[$k][$j])) {
                    return "Error: Semua elemen matriks harus berupa angka.";
                }
                $hasil[$i][$j] += $matriks_a[$i][$k] * $matriks_b[$k][$j];
            }
        }
    }

    // Bagian tampilan output
    $output = "Hasil Perkalian Matriks 2x2:<br>";
    
    $output .= "Matriks A:<br>";
    foreach ($matriks_a as $baris) {
        $output .= "|" . implode(" ", $baris) . "|<br>";
    }
    $output .= "Matriks B:<br>";
    foreach ($matriks_b as $baris) {
        $output .= "|" . implode(" ", $baris) . "|<br>";
    }
    $output .= "Hasil A x B:<br>";
    foreach ($hasil as $baris) {
        $output .= "|" . implode(" ", $baris) . "|<br>";
    }
    
    return $output;
}

// Fungsi utama untuk menjalankan program berdasarkan input
function jalankanProgram($pilihan) {
    $hasil_output = "";
    
    // Logika mengambil data dari POST sesuai pilihan
    switch ($pilihan) {
        case '1':
            $nilai = isset($_POST['nilai_akhir']) ? (float)$_POST['nilai_akhir'] : 0;
            $hasil_output = "Hasil Materi [1] Penggunaan IF (Nilai: $nilai):<br>";
            $hasil_output .= hitungNilaiDanGrade($nilai);
            break;
        case '2':
            $a1 = isset($_POST['angka1']) ? (float)$_POST['angka1'] : 0;
            $a2 = isset($_POST['angka2']) ? (float)$_POST['angka2'] : 0;
            $op = isset($_POST['operator']) ? $_POST['operator'] : '+';
            $hasil_output = "Hasil Materi [2] Penggunaan SWITCH..CASE (Kalkulator):<br>";
            $hasil_output .= kalkulatorSederhana($a1, $a2, $op);
            break;
        case '3':
            $batas = isset($_POST['batas_looping']) ? (int)$_POST['batas_looping'] : 0;
            $hasil_output = "Hasil Materi [3] Penggunaan Looping (Batas $batas):<br>";
            $hasil_output .= tampilkanBilanganGenapKelipatanTiga($batas);
            break;
        case '4':
            // Ambil elemen matriks dari form input
            $A = [
                [(float)($_POST['a11'] ?? 0), (float)($_POST['a12'] ?? 0)],
                [(float)($_POST['a21'] ?? 0), (float)($_POST['a22'] ?? 0)]
            ];
            $B = [
                [(float)($_POST['b11'] ?? 0), (float)($_POST['b12'] ?? 0)],
                [(float)($_POST['b21'] ?? 0), (float)($_POST['b22'] ?? 0)]
            ];
            $hasil_output = "Hasil Materi [4] Penggunaan Array (Perkalian Matriks):<br>";
            $hasil_output .= perkalianMatriks($A, $B);
            break;
        default:
            $hasil_output = "Pilih materi (1|2|3|4) dan klik Kirim, lalu masukkan data yang dibutuhkan.";
            break;
    }
    return $hasil_output;
}

// --- Logika Kontrol Form Utama ---
$hasil_program = "";
$pilihan_materi = "";
$tampilan_input_dinamis = "";

if (isset($_POST['kirim_pilihan'])) {
    $pilihan_materi = $_POST['pilih_materi'];
    
    // Tentukan form input yang akan ditampilkan di sebelah kanan
    switch ($pilihan_materi) {
        case '1':
            $tampilan_input_dinamis = '
                <form method="post" action="">
                    <input type="hidden" name="pilih_materi" value="1">
                    Nilai Akhir (0-100): <input type="number" name="nilai_akhir" min="0" max="100" required><br><br>
                    <input type="submit" name="kirim_data" value="Hitung Grade">
                </form>
            ';
            break;
        case '2':
            $tampilan_input_dinamis = '
                <form method="post" action="">
                    <input type="hidden" name="pilih_materi" value="2">
                    Angka 1: <input type="number" name="angka1" required><br>
                    Operator (+,-,*,/): <input type="text" name="operator" size="1" maxlength="1" required><br>
                    Angka 2: <input type="number" name="angka2" required><br><br>
                    <input type="submit" name="kirim_data" value="Hitung Kalkulator">
                </form>
            ';
            break;
        case '3':
            $tampilan_input_dinamis = '
                <form method="post" action="">
                    <input type="hidden" name="pilih_materi" value="3">
                    Batas Atas Looping (misal: 30): <input type="number" name="batas_looping" min="1" required><br><br>
                    <input type="submit" name="kirim_data" value="Tampilkan Hasil">
                </form>
            ';
            break;
        case '4':
            $tampilan_input_dinamis = '
                <form method="post" action="">
                    <input type="hidden" name="pilih_materi" value="4">
                    Matriks A (2x2):<br>
                    A[1,1]: <input type="number" name="a11" size="5" value="2"> &nbsp; A[1,2]: <input type="number" name="a12" size="5" value="3"><br>
                    A[2,1]: <input type="number" name="a21" size="5" value="1"> &nbsp; A[2,2]: <input type="number" name="a22" size="5" value="4"><br><br>
                    Matriks B (2x2):<br>
                    B[1,1]: <input type="number" name="b11" size="5" value="5"> &nbsp; B[1,2]: <input type="number" name="b12" size="5" value="6"><br>
                    B[2,1]: <input type="number" name="b21" size="5" value="7"> &nbsp; B[2,2]: <input type="number" name="b22" size="5" value="8"><br><br>
                    <input type="submit" name="kirim_data" value="Hitung Perkalian">
                </form>
            ';
            break;
        default:
            $tampilan_input_dinamis = "Pilihan tidak valid.";
            break;
    }
}

// Cek apakah form input dinamis sudah disubmit
if (isset($_POST['kirim_data'])) {
    $pilihan_materi = $_POST['pilih_materi'];
    $hasil_program = jalankanProgram($pilihan_materi);
    
    // Setelah hasil muncul, tampilkan kembali form input dinamis untuk pilihan yang sama
    // Ini adalah langkah untuk menjaga tampilan input (Anda bisa memodifikasi logika ini)
    if ($pilihan_materi == '1') {
         $tampilan_input_dinamis = '
            <form method="post" action="">
                <input type="hidden" name="pilih_materi" value="1">
                Nilai Akhir (0-100): <input type="number" name="nilai_akhir" min="0" max="100" required><br><br>
                <input type="submit" name="kirim_data" value="Hitung Grade">
            </form>
        ';
    } 
    // ... Tambahkan kondisi untuk pilihan 2, 3, dan 4 jika Anda ingin mempertahankan form input setelah hasil tampil.
    // Untuk saat ini, saya fokus pada hasil.
    $tampilan_input_dinamis = ""; // Kosongkan form input dinamis setelah hasil, agar hanya hasil yang tampil.

} else if (isset($_POST['kirim_data'])) {
    $pilihan_materi = $_POST['pilih_materi'];
    $hasil_program = jalankanProgram($pilihan_materi);
}

// Tampilan Default saat pertama kali dibuka
if (empty($pilihan_materi) && empty($tampilan_input_dinamis) && empty($hasil_program)) {
    $hasil_program = "Silakan pilih materi di sebelah kiri dan klik Kirim.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Latihan Soal PHP Function - Refaktor</title>
    <style>
        /* CSS Sederhana untuk tampilan yang bersih */
        body { font-family: Arial, sans-serif; }
        .container { display: flex; width: 100%; }
        .left-panel { width: 50%; padding: 10px; }
        .right-panel { width: 50%; padding: 10px; border-left: 1px solid #ccc; }
        h2, h3 { margin-top: 0; }
        input[type="number"], input[type="text"] { padding: 5px; margin-bottom: 5px; }
    </style>
</head>
<body>

<div class="container">
    <div class="left-panel">
        <h2>C. LATIHAN SOAL</h2>
        <p>1. Buatlah program dengan menggunakan Function dengan tampilan sebagai berikut :</p>
        
        <p>Materi Pemrograman PHP</p>
        <ul>
            <li>[1] Penggunaan IF</li>
            <li>[2] Penggunaan SWITCH..CASE</li>
            <li>[3] Penggunaan Looping</li>
            <li>[4] Penggunaan Array</li>
        </ul>
        
        <form method="post" action="">
            Pilih Materi yang ingin anda pelajari : 
            <input type="text" name="pilih_materi" size="5" maxlength="1" value="<?php echo htmlspecialchars($pilihan_materi); ?>"> 
            [1|2|3|4] 
            <input type="submit" name="kirim_pilihan" value="Kirim">
        </form>
        
        <p>Ketentuan :</p>
        <p>Catatan : maksimalkan penggunaan FUNCTION</p>
    </div>

    <div class="right-panel">
        <h3>Langkah 1: Masukkan Data</h3>
        <p>Setelah memilih materi di kiri, masukkan data di bawah ini:</p>
        
        <?php echo $tampilan_input_dinamis; ?>

        <hr>

        <h3>Langkah 2: Hasil Program</h3>
        <?php echo $hasil_program; ?>
    </div>
</div>

</body>
</html>