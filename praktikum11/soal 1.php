<?php
$saldo_awal = "";
$N = "";
$saldo_akhir_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $saldo_awal = (float)$_POST['saldo_awal'];
    $N = (int)$_POST['n_bulan'];
    $saldo = $saldo_awal;

    $biaya_admin = 9000;
    $batas_bunga = 1100000;

    // Perulangan untuk N bulan
    for ($i = 1; $i <= $N; $i++) {
        
        // Tentukan Bunga p.a.
        if ($saldo >= $batas_bunga) {
            $bunga_pa = 0.04; // 4% p.a.
        } else {
            $bunga_pa = 0.03; // 3% p.a.
        }

        // Hitung Bunga Bulanan dan kurangi Admin
        $bunga_bulanan = $saldo * ($bunga_pa / 12);
        $saldo = $saldo + $bunga_bulanan - $biaya_admin;

        // Output Riwayat (opsional, bisa dihapus agar lebih simpel)
        // echo "Bulan ke-$i: Rp " . number_format(round($saldo), 0, ',', '.') . " (".($bunga_pa*100)."% p.a.)<br>";
    }

    $saldo_akhir_msg = "<h3>SALDO AKHIR Setelah $N Bulan: Rp " . number_format(round($saldo), 0, ',', '.') . "</h3>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simulasi Bunga Bank</title>
</head>
<body>

    <h2>Perhitungan Saldo Bank X</h2>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="saldo">Saldo Awal (Rp):</label>
        <input type="number" id="saldo" name="saldo_awal" value="<?php echo $saldo_awal; ?>" required min="0"><br><br>
        
        <label for="n_bulan">Jangka Waktu (N Bulan):</label>
        <input type="number" id="n_bulan" name="n_bulan" value="<?php echo $N; ?>" required min="1"><br><br>
        
        <input type="submit" value="Hitung Saldo">
    </form>

    <hr>
    
    <?php echo $saldo_akhir_msg; ?>

</body>
</html>