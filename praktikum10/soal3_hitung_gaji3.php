<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upah Berdasarkan Golongan (Cyber)</title>
    <style>
        /* Desain Dark Mode Industrial / Cyberpunk */
        body {
            font-family: 'Consolas', monospace; /* Font teknis */
            background-color: #121212; /* Sangat Gelap */
            color: #00ff99; /* Neon Green Text */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .terminal-card {
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 255, 153, 0.5); /* Shadow Hijau Neon */
            width: 90%;
            max-width: 450px;
            text-align: center;
            border: 1px solid #00ff99;
        }

        h2 {
            color: #ff00ff; /* Neon Magenta Header */
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 3px;
            border-bottom: 2px dashed #00ff99;
            padding-bottom: 10px;
        }

        form {
            padding: 15px 0;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 1em;
            text-align: left;
            color: #00ff99;
        }

        input[type="number"], select {
            padding: 10px;
            width: 100%;
            border: 1px solid #00ff99;
            border-radius: 3px;
            box-sizing: border-box;
            background-color: #2c2c2c;
            color: #ffffff;
            font-size: 16px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #ff00ff; /* Neon Magenta Button */
            color: #121212;
            border: none;
            padding: 12px 20px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #cc00cc;
            transform: scale(1.02);
        }

        .hasil {
            margin-top: 30px;
            padding: 20px;
            border-radius: 5px;
            background-color: #1e1e1e;
            font-size: 1em;
            text-align: left;
            border: 1px dashed #ff00ff;
        }
        
        .hasil p {
            margin: 5px 0;
            color: #ecf0f1;
        }
        
        .hasil b {
            color: #f1c40f; /* Yellow/Gold for total */
            font-size: 1.4em;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="terminal-card">
        <h2>💰 HITUNG GAJI BERDASARKAN GOLONGAN</h2>

        <form method="post">
            <label for="jam">INPUT JAM KERJA (MINGGUAN):</label>
            <input type="number" name="jam" id="jam" placeholder="Cth: 50" required min="0">

            <label for="golongan">SELECT GOLONGAN (UPAH NORMAL):</label>
            <select name="golongan" required>
                <option value="" style="color:#7f8c8d;">-- PILIH GOLONGAN --</option>
                <option value="A">GOL. A (Rp 4.000,-/jam)</option>
                <option value="B">GOL. B (Rp 5.000,-/jam)</option>
                <option value="C">GOL. C (Rp 6.000,-/jam)</option>
                <option value="D">GOL. D (Rp 7.500,-/jam)</option>
            </select>
            
            <input type="submit" value="PROSES PERHITUNGAN">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jam_kerja = isset($_POST['jam']) ? (int)$_POST['jam'] : 0;
            $golongan = isset($_POST['golongan']) ? $_POST['golongan'] : '';
            $upah_lembur = 3000;
            $batas_normal = 48;
            $upah_per_jam_normal = 0;
            $total_upah = 0;
            $jam_normal = 0;
            $jam_lembur = 0;

            // 1. Tentukan Upah Normal berdasarkan Golongan menggunakan SWITCH
            switch ($golongan) {
                case 'A': $upah_per_jam_normal = 4000; break;
                case 'B': $upah_per_jam_normal = 5000; break;
                case 'C': $upah_per_jam_normal = 6000; break;
                case 'D': $upah_per_jam_normal = 7500; break;
                default: $upah_per_jam_normal = 0;
            }

            // 2. Hitung Upah Total (Normal + Lembur)
            if ($upah_per_jam_normal > 0) {
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
            }
            
            // 3. Tampilkan Hasil
            echo "<div class='hasil'>";
            echo "<p>-- DATA KARYAWAN --</p>";
            echo "<p>GOLONGAN : <b>$golongan</b> (Rp " . number_format($upah_per_jam_normal, 0, ',', '.') . " / jam)</p>";
            echo "<p>TOTAL JAM KERJA : $jam_kerja jam</p>";
            echo "<p>JAM LEMBUR (>48) : $jam_lembur jam (Rp " . number_format($upah_lembur, 0, ',', '.') . " / jam)</p>";
            echo "<hr style='border-color:#ff00ff; margin: 10px 0;'>";
            echo "<p>UPAH DITERIMA :</p>";
            echo "<b>Rp " . number_format($total_upah, 0, ',', '.') . ",-</b>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>