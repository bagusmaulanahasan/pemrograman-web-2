<html>

<head>
    <title>Implementasi IF .. ELSEIF</title>
</head>

<body>
    <form method="post" action="">
        Masukan Nilai :
        <input type=text name=input1><br><br>
        <input type=submit value="Proses">
    </form>
    <?php
    if (isset($_POST['input1'])) {
        $nilai = intval($_POST['input1']);
        if ($nilai >= 80)
            printf("anda lulus dengan mendapatkan grade A");
        else if ($nilai >= 70)
            printf("anda lulus dengan mendapatkan grade B");
        else if ($nilai >= 60)
            printf("anda lulus dengan mendapatkan grade C");
        else if ($nilai >= 50)
            printf("anda tidak lulus , grade D");
        else
            printf("anda tidak lulus , grade E");
        ;
    }
    ?>
</body>

</html>