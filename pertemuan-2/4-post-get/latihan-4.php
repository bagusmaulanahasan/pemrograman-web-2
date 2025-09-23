<html>

<body>
    <form action="latihan-4.php" method="post">
        Nama Barang: <input type="text" name="nmbrg"><br>
        Harga Satuan: <input type="text" name="hsbrg"><br>
        Jumlah Barang: <input type="text" name="jmlbrg"><br>
        <input type="submit" value="kirim">
        <input type="reset" value="hapus">
    </form>
</body>

</html>
<?php
$nmbrg = $_POST['nmbrg']; // $_GET
$hsbrg = $_POST['hsbrg']; // $_REQUEST (bisa untuk Get dan Post)
$jmlbrg = $_POST['jmlbrg'];
$harga = $hsbrg * $jmlbrg;
echo "Nama Barang $nmbrg<br>";
echo "Harga Satuan Rp. $hsbrg<br>";
echo "Jumlah barang $jmlbrg<br>";
echo "Total Harga Barang Rp. $harga<br>";
?>