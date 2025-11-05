<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perhitungan Saldo Akhir Tabungan</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            width: 450px;
            margin: 60px auto;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            padding: 25px 30px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
            color: #333;
        }
        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.2s;
        }
        input[type="number"]:focus, input[type="text"]:focus {
            border-color: #66a6ff;
        }
        input[type="submit"], input[type="reset"] {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            color: white;
            transition: 0.3s;
        }
        input[type="submit"] {
            background-color: #4CAF50;
        }
        input[type="reset"] {
            background-color: #e74c3c;
        }
        input[type="submit"]:hover {
            background-color: #43a047;
        }
        input[type="reset"]:hover {
            background-color: #c0392b;
        }
        .hasil {
            margin-top: 25px;
            background: #f7f7f7;
            border-left: 5px solid #66a6ff;
            padding: 15px;
            border-radius: 8px;
            color: #333;
        }
        .hasil strong {
            color: #2c3e50;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>💰 Hitung Saldo Akhir Tabungan</h2>
    <form method="post" action="">
        <label>Saldo Awal (Rp):</label>
        <input type="number" name="saldo_awal" required>

        <label>Bunga per Bulan (%):</label>
        <input type="text" name="bunga" required>

        <label>Lama (bulan):</label>
        <input type="number" name="lama" required>

        <div style="display:flex; justify-content:space-between;">
            <input type="submit" name="hitung" value="Hitung">
            <input type="reset" value="Batal">
        </div>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $saldo_awal = $_POST['saldo_awal'];
        $bunga = $_POST['bunga'];
        $lama = $_POST['lama'];

        // Rumus bunga majemuk
        $saldo_akhir = $saldo_awal * pow((1 + ($bunga / 100)), $lama);

        echo "<div class='hasil'>";
        echo "<h3>📊 Hasil Perhitungan</h3>";
        echo "Saldo Awal : Rp " . number_format($saldo_awal, 2, ',', '.') . "<br>";
        echo "Bunga per Bulan : $bunga %<br>";
        echo "Lama Tabungan : $lama bulan<br><hr>";
        echo "<strong>Saldo Akhir : Rp " . number_format($saldo_akhir, 2, ',', '.') . "</strong>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>