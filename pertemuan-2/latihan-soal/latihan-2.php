<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
    <style>
        table {
            margin: 20px;
        }
        th {
            color: brown;
            padding: 5px 15px;
        }
        input, select, button {
            padding: 5px;
        }
    </style>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <th>Nilai I</th>
                <th>Nilai II</th>
            </tr>
            <tr>
                <td><input type="number" name="nilai1" required></td>
                <td>
                    <select name="operator">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                    <input type="number" name="nilai2" required>
                    <button type="submit" name="hitung">submit</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $n1 = $_POST['nilai1'];
        $n2 = $_POST['nilai2'];
        $op = $_POST['operator'];

        switch ($op) {
            case '+':
                $hasil = $n1 + $n2;
                break;
            case '-':
                $hasil = $n1 - $n2;
                break;
            case '*':
                $hasil = $n1 * $n2;
                break;
            case '/':
                $hasil = ($n2 != 0) ? $n1 / $n2 : "Tidak bisa dibagi 0";
                break;
            default:
                $hasil = "Operator tidak valid";
        }

        echo "<h3>Hasil: $n1 $op $n2 = <b>$hasil</b></h3>";
    }
    ?>
</body>
</html>
