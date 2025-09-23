<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contoh Static Variabel</title>
</head>
<body>
<h1>Variabel Static</h1>
<?php
	function dicoba() {
		Static $a=0;
		Echo "Nilai a : ";
		Echo $a;
		Echo "<br>";
		$a++;
	}
	dicoba();
	dicoba();
	dicoba();
	dicoba();
?>
</body>
</html>