<?php
// misalkan kita punya bilangan dengan notasi E seperti ini
$harga = 100000;
$jumlah = 3;
$teks = "PHP";
// jika kita cetak dengan echo:
echo "Harganya adalah Rp $harga <br>";
print "Jumlah $jumlah <br>";
$total = $harga * $jumlah;
// jika kita cetak dengan printf
printf("Latihan Penggunaan fungsi Printf pada %s <br>", $teks);
printf("Harga barang adalah Rp %.2f <br>", $harga);
printf("Jumlah adalah Rp %d <br>", $jumlah);
printf("Total harga adalah Rp %.2f <br>", $total)
    ?>