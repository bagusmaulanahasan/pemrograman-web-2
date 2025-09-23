<?php
	$A = 123 ; // variable global
	function Test() {
		$A = "Test"; // variable local	
		echo "variabel A berisi = $A \n";
	}
	Test();
	echo "A diluar fungsi berisi= $A \n";
?>