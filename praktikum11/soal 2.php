<?php
$target = 25;
$count_solusi = 0;

echo "<h2>Solusi Persamaan X + Y + Z = $target (X, Y, Z adalah Bilangan Asli)</h2>";

for ($x = 1; $x <= $target - 2; $x++) {

    for ($y = 1; $y <= $target - $x - 1; $y++) {

        $z = $target - $x - $y;
        
        if ($z >= 1) {
            echo "X = $x, Y = $y, Z = $z<br>";
            $count_solusi++;
        }
    }
}

echo "<hr>";
echo "<h3>Jumlah penyelesaian: $count_solusi</h3>";
?>