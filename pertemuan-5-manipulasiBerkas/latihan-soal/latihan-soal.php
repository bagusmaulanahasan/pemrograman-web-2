<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1em;
        }
        input, button {
            padding: 6px;
        }
        textarea {
            width: 100%;
            height: 100px
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Nama <input type="text" name="nama">
        Email <input type="email" name="email">
        Komentar <textarea name="komentar"></textarea>
        <button>Simpan</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $komentar = $_POST['komentar'];
        $fp = fopen("bukutamu.dat", "a");
        fputs($fp, "$nama|$email|$komentar\n");
        fclose($fp);
    }
    ?>
</body>

</html>

