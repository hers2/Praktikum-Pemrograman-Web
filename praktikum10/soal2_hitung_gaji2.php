<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Upah Karyawan Honorer</title>
    <style>
        /* Desain Dark Mode Modern (Berbeda dari yang sebelumnya) */
        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #1c2a38 0%, #34495e 100%); /* Deep Dark Gradient */
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #2c3e50; /* Dark Card Background */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            width: 90%;
            max-width: 450px;
            text-align: center;
            border-top: 5px solid #e67e22; /* Orange Accent */
        }

        h2 {
            color: #e67e22; /* Orange Accent */
            margin-bottom: 25px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        form {
            padding: 15px 0;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 1.1em;
            font-weight: 300;
        }

        input[type="number"] {
            padding: 12px;
            width: 50%;
            border: none;
            border-radius: 6px;
            box-sizing: border-box;
            background-color: #34495e; /* Input Background */
            color: #ecf0f1;
            font-size: 16px;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        input[type="number"]:focus {
            background-color: #2c3e50;
            outline: 2px solid #f1c40f; /* Yellow Outline */
        }

        input[type="submit"] {
            background-color: #2ecc71; /* Green Button */
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }

        .hasil {
            margin-top: 30px;
            padding: 20px;
            border-radius: 8px;
            background-color: #34495e; /* Result Box Background */
            font-size: 1.1em;
            text-align: left;
            border: 1px solid #7f8c8d;
        }
        
        .hasil p {
            margin: 8px 0;
        }
        
        .hasil b {
            color: #f1c40f; /* Yellow/Gold for total */
            font-size: 1.3em;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>💵 Kalkulator Upah Mingguan</h2>

        <form method="post">
            <label for="jam">Masukkan Jumlah Jam Kerja (per minggu):</label>
            <input type="number" name="jam" id="jam" placeholder="Contoh: 52" required min="0">
            <input type="submit" value="Hitung Upah">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jam_kerja = isset($_POST['jam']) ? (int)$_POST['jam'] : 0;
            $upah_per_jam_normal = 2000;
            $upah_lembur = 3000;
            $batas_normal = 48;
            $total_upah = 0;
            $jam_normal = 0;
            $jam_lembur = 0;

            if ($jam_kerja > $batas_normal) {
                // Ada Lembur
                $jam_normal = $batas_normal;
                $jam_lembur = $jam_kerja - $batas_normal;

                $upah_normal_total = $jam_normal * $upah_per_jam_normal;
                $upah_lembur_total = $jam_lembur * $upah_lembur;
                $total_upah = $upah_normal_total + $upah_lembur_total;
            } else {
                // Tidak ada Lembur
                $jam_normal = $jam_kerja;
                $total_upah = $jam_normal * $upah_per_jam_normal;
            }

            echo "<div class='hasil'>";
            echo "<p>⚫ Total Jam Kerja: <b>$jam_kerja jam</b></p>";
            echo "<p>⚫ Jam Kerja Normal: $jam_normal jam (Rp " . number_format($upah_per_jam_normal, 0, ',', '.') . " / jam)</p>";
            if ($jam_lembur > 0) {
                echo "<p>⚫ Jam Lembur: $jam_lembur jam (Rp " . number_format($upah_lembur, 0, ',', '.') . " / jam)</p>";
            } else {
                echo "<p>⚫ Jam Lembur: 0 jam</p>";
            }
            echo "<hr style='border-color:#7f8c8d; margin: 10px 0;'>";
            echo "<p>Total Upah yang diterima:</p>";
            echo "<b>Rp " . number_format($total_upah, 0, ',', '.') . ",-</b>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>