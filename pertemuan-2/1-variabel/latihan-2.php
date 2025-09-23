<?php
	$C = 123 ; // variable global
	function Test() {
		global $C ; // variable local
		echo "C pada fungsi berisi = $C \n";
	}
	Test();
	echo "C di luar fungsi berisi = $C \n";
?>
