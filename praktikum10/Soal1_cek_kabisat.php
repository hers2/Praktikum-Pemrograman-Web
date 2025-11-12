<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemeriksa Tahun Kabisat - Dark</title>
    <style>
        /* Desain Dark Mode Modern */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #2c3e50; /* Dark Blue/Gray Background */
            color: #ecf0f1; /* Light Text */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #34495e; /* Slightly Lighter Dark Card */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            width: 90%;
            max-width: 380px;
            text-align: center;
        }

        h2 {
            color: #3498db; /* Blue Accent */
            margin-bottom: 25px;
            font-weight: 700;
        }

        form {
            padding: 15px 0;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        input[type="number"] {
            padding: 12px;
            width: 60%;
            border: 1px solid #7f8c8d;
            border-radius: 6px;
            box-sizing: border-box;
            background-color: #2c3e50; /* Input Background */
            color: #ecf0f1;
            font-size: 16px;
            margin-right: 10px;
            transition: border-color 0.3s;
        }

        input[type="number"]:focus {
            border-color: #3498db;
            outline: none;
        }

        input[type="submit"] {
            background-color: #e74c3c; /* Red/Accent Button */
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
            background-color: #c0392b;
            transform: scale(1.03);
        }

        .hasil {
            margin-top: 30px;
            padding: 20px;
            border-radius: 8px;
            font-size: 1.2em;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .kabisat {
            background-color: #27ae60; /* Success Green */
            color: white;
        }

        .bukan {
            background-color: #f39c12; /* Warning Yellow/Orange */
            color: #34495e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🗓️ Pemeriksa Tahun Kabisat</h2>

        <form method="post">
            <label for="tahun">Masukkan Tahun:</label>
            <input type="number" name="tahun" id="tahun" placeholder="Contoh: 2024" required min="1">
            <input type="submit" value="Periksa">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tahun = isset($_POST['tahun']) ? (int)$_POST['tahun'] : null;

            if ($tahun > 0) {
                echo "<div class='hasil'>";
                
                // Logika Pengecekan Tahun Kabisat
                if (($tahun % 400 == 0) || (($tahun % 4 == 0) && ($tahun % 100 != 0))) {
                    echo "<p class='kabisat'>Tahun **$tahun** adalah **TAHUN KABISAT**! ✅</p>";
                } else {
                    echo "<p class='bukan'>Tahun **$tahun** **BUKAN** tahun kabisat. ⚠️</p>";
                }
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>