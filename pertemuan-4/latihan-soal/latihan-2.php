<?php

echo "<h2>Tabel Perkalian <br> ==================== </h2>";

for ($i = 15; $i <= 45; $i++) {
    if ($i % 2 !== 0) {
        echo "<br/> 12 * " . $i . " = " . 12*$i;
    }
}

?>