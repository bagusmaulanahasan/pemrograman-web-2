<html>

<head>
    <title>Contoh Counter</title>
</head>

<body>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $nama_file = "counter.dat";
    $log_file = "log.txt";

    // Hitung jumlah kunjungan
    if (file_exists($nama_file)) {
        $berkas1 = fopen($nama_file, "r");
        $pencacah1 = (int) trim(fgets($berkas1, 255));
        $pencacah1++;
        fclose($berkas1);
    } else {
        $pencacah1 = 1;
    }

    // Simpan jumlah kunjungan
    $berkas1 = fopen($nama_file, "w");
    fputs($berkas1, $pencacah1);
    fclose($berkas1);

    // Ambil tanggal dan IP
    $tanggal = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    // Simpan log kunjungan
    $log = fopen($log_file, "a");
    fputs($log, "Kunjungan ke-$pencacah1 pada $tanggal dari IP: $ip\n");
    fclose($log);

    // Tampilkan ke pengguna
    echo "Anda pengunjung ke-$pencacah1<br>\n";
    // echo "Tanggal kunjungan: $tanggal<br>\n";
    // echo "Alamat IP Anda: $ip<br>\n";
?>

</body>

</html>