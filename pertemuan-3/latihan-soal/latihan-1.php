<html>
<head>
    <title>Penggunaan Switch Case</title>
</head>
<body>
    <form method="post" action="">
        Jumlah_Pembelian :
        <input type="text" name="input1"><br><br>
        <input type="submit" value="Tentukan Diskon">
    </form>

    <?php
    if (isset($_POST['input1'])) {
        $totalbeli = intval($_POST['input1']);
        $pot = 0;

        switch (true) {
            case ($totalbeli >= 200000):
                $pot = 0.10;
                break;
            case ($totalbeli >= 100000):
                $pot = 0.05;
                break;
            default:
                $pot = 0.01;
                break;
        }

        $diskon = $pot * $totalbeli;
        $bayar = $totalbeli - $diskon;

        printf("Jumlah Pembelian = %s <br>", $totalbeli);
        printf("Diskon = %s <br>", $diskon);
        printf("Pembayaran = %s <br>", $bayar);
    }
    ?>
</body>
</html>
