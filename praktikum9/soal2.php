<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Pecahan Uang</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
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
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.2s;
        }
        input[type="number"]:focus {
            border-color: #f39c12;
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
            background-color: #e67e22;
        }
        input[type="reset"] {
            background-color: #e74c3c;
        }
        input[type="submit"]:hover {
            background-color: #d35400;
        }
        input[type="reset"]:hover {
            background-color: #c0392b;
        }
        .hasil {
            margin-top: 25px;
            background: #f7f7f7;
            border-left: 5px solid #e67e22;
            padding: 15px;
            border-radius: 8px;
            color: #333;
        }
        .hasil strong {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f39c12;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>💵 Hitung Pecahan Uang</h2>
    <form method="post" action="">
        <label>Masukkan Jumlah Uang (Rp):</label>
        <input type="number" name="jumlah" required>

        <div style="display:flex; justify-content:space-between;">
            <input type="submit" name="hitung" value="Hitung">
            <input type="reset" value="Batal">
        </div>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $jumlah = $_POST['jumlah'];
        $sisa = $jumlah;

        $r100k = intdiv($sisa, 100000);
        $sisa %= 100000;

        $r50k = intdiv($sisa, 50000);
        $sisa %= 50000;

        $r20k = intdiv($sisa, 20000);
        $sisa %= 20000;

        $r5k = intdiv($sisa, 5000);
        $sisa %= 5000;

        $r100 = intdiv($sisa, 100);
        $sisa %= 100;

        $r50 = intdiv($sisa, 50);

        echo "<div class='hasil'>";
        echo "<h3>📊 Hasil Pecahan Uang</h3>";
        echo "Jumlah uang: <strong>Rp " . number_format($jumlah, 0, ',', '.') . "</strong><br><br>";

        echo "<table>";
        echo "<tr><th>Pecahan</th><th>Jumlah</th></tr>";
        echo "<tr><td>Rp 100.000</td><td>$r100k lembar</td></tr>";
        echo "<tr><td>Rp 50.000</td><td>$r50k lembar</td></tr>";
        echo "<tr><td>Rp 20.000</td><td>$r20k lembar</td></tr>";
        echo "<tr><td>Rp 5.000</td><td>$r5k lembar</td></tr>";
        echo "<tr><td>Rp 100</td><td>$r100 koin</td></tr>";
        echo "<tr><td>Rp 50</td><td>$r50 koin</td></tr>";
        echo "</table>";

        echo "</div>";
    }
    ?>
</div>

</body>
</html>