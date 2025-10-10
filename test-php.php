<?php
function buatSegitigaSamaKaki($tinggi) {
    $result = '';
    for ($i = 0; $i < $tinggi; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            $result .= '*';
        }
        $result .= '<br>';
    }
    return $result;
}

echo buatSegitigaSamaKaki(5);   
?>