<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jumlah Hari dalam Bulan (Switch)</title>
    <style>
        /* Desain Soft Pastel */
        body {
            font-family: 'Century Gothic', Arial, sans-serif;
            background: linear-gradient(135deg, #f7ecb5 0%, #a2d6f9 100%); /* Pastel Yellow to Blue */
            color: #555;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .result-box {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 350px;
            text-align: center;
            border: 5px solid #ff9aa2; /* Soft Pink Border */
        }

        h2 {
            color: #8395a7; /* Soft Gray Blue */
            margin-bottom: 25px;
            font-weight: 400;
            border-bottom: 1px dashed #b5e7a9; /* Soft Green Line */
            padding-bottom: 10px;
        }
        
        .output-data {
            margin-top: 15px;
            font-size: 1.1em;
            line-height: 1.8;
            color: #333;
        }

        .output-data p {
            margin: 5px 0;
        }

        .output-data b {
            color: #3cb371; /* Medium Sea Green for emphasis */
            font-size: 1.3em;
            display: block;
            margin-top: 10px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="result-box">
        <h2>🗓️ Cek Jumlah Hari Otomatis</h2>

        <?php
        // Menggunakan fungsi date() untuk mendapatkan bulan dan tahun saat ini
        $bulan_angka = date("n"); // Angka bulan (1 sampai 12)
        $tahun = date("Y");
        $nama_bulan_default = date("F"); // Nama bulan dalam bahasa Inggris

        $hari = 0;
        $nama_bulan_id = ""; // Untuk menampilkan nama bulan dalam bahasa Indonesia

        switch ($bulan_angka) {
            case 1:
                $nama_bulan_id = "Januari"; $hari = 31; break;
            case 2:
                $nama_bulan_id = "Februari";
                // Pengecekan Tahun Kabisat
                if (($tahun % 400 == 0) || (($tahun % 4 == 0) && ($tahun % 100 != 0))) {
                    $hari = 29;
                } else {
                    $hari = 28;
                }
                break;
            case 3:
                $nama_bulan_id = "Maret"; $hari = 31; break;
            case 4:
                $nama_bulan_id = "April"; $hari = 30; break;
            case 5:
                $nama_bulan_id = "Mei"; $hari = 31; break;
            case 6:
                $nama_bulan_id = "Juni"; $hari = 30; break;
            case 7:
                $nama_bulan_id = "Juli"; $hari = 31; break;
            case 8:
                $nama_bulan_id = "Agustus"; $hari = 31; break;
            case 9:
                $nama_bulan_id = "September"; $hari = 30; break;
            case 10:
                $nama_bulan_id = "Oktober"; $hari = 31; break;
            case 11:
                $nama_bulan_id = "November"; $hari = 30; break;
            case 12:
                $nama_bulan_id = "Desember"; $hari = 31; break;
            default:
                $nama_bulan_id = "Bulan Tidak Dikenali"; $hari = 0;
        }

        echo "<div class='output-data'>";
        echo "<p>Bulan Saat Ini (Angka): **$bulan_angka**</p>";
        echo "<p>Tahun Saat Ini: **$tahun**</p>";
        echo "<hr style='border-color:#b5e7a9;'>";
        echo "<p>Nama Bulan: <b>$nama_bulan_id</b></p>";
        echo "<p>Jumlah Hari:</p>";
        echo "<b>$hari hari</b>";
        echo "</div>";
        ?>
    </div>
</body>
</html>