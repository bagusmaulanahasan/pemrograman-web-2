<?php
	$C = 123 ; 
	function Test() {
		global $C ; 
		echo "C pada fungsi berisi = $C <br> \n";
	}
	Test();
	echo "C di luar fungsi berisi = $C \n";
?>
