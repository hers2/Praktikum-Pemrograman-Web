<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran (Metode GET)</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background: linear-gradient(135deg, #fddb92, #d1fdff);
      margin: 0;
      padding: 0;
    }
    .container {
      background: #fff;
      width: 550px;
      margin: 60px auto;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      padding: 25px 35px;
    }
    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 20px;
    }
    label {
      font-weight: 600;
      color: #333;
    }
    input[type="text"], select, textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      transition: 0.2s;
      font-size: 14px;
    }
    input[type="text"]:focus, select:focus, textarea:focus {
      border-color: #3498db;
    }
    textarea { resize: none; }
    input[type="radio"] { margin-right: 5px; }
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
    input[type="submit"] { background-color: #3498db; }
    input[type="reset"] { background-color: #e74c3c; }
    input[type="submit"]:hover { background-color: #2980b9; }
    input[type="reset"]:hover { background-color: #c0392b; }
    .hasil {
      margin-top: 25px;
      background: #f7f7f7;
      border-left: 5px solid #3498db;
      padding: 15px;
      border-radius: 8px;
      color: #333;
    }
    .hasil strong { color: #2c3e50; }
  </style>
</head>
<body>

<div class="container">
  <h2>🌐 Formulir Pendaftaran (Metode GET)</h2>

  <!-- Ubah method ke GET -->
  <form method="get" action="">
    <label>Nama Lengkap:</label>
    <input type="text" name="nama" required>

    <label>Tempat Lahir:</label>
    <input type="text" name="tempat" required>

    <label>Tanggal Lahir:</label><br>
    <select name="tgl" required>
      <?php for ($i=1;$i<=31;$i++) echo "<option>$i</option>"; ?>
    </select>
    <select name="bln" required>
      <?php for ($i=1;$i<=12;$i++) echo "<option>$i</option>"; ?>
    </select>
    <select name="thn" required>
      <?php for ($i=1980;$i<=2005;$i++) echo "<option>$i</option>"; ?>
    </select><br><br>

    <label>Alamat Rumah:</label>
    <textarea name="alamat" rows="4" required></textarea>

    <label>Jenis Kelamin:</label><br>
    <input type="radio" name="jk" value="Pria" required>Pria
    <input type="radio" name="jk" value="Wanita">Wanita<br><br>

    <label>Asal Sekolah:</label>
    <input type="text" name="sekolah" required>

    <label>Nilai UAN:</label>
    <input type="text" name="nilai" required>

    <div style="display:flex; justify-content:space-between;">
      <input type="submit" name="kirim" value="Kirim">
      <input type="reset" value="Batal">
    </div>
  </form>

  <?php
  
  if (isset($_GET['kirim'])) {
      $nama = $_GET['nama'];
      $tempat = $_GET['tempat'];
      $tgl = $_GET['tgl'];
      $bln = $_GET['bln'];
      $thn = $_GET['thn'];
      $alamat = $_GET['alamat'];
      $jk = $_GET['jk'];
      $sekolah = $_GET['sekolah'];
      $nilai = $_GET['nilai'];

      echo "<div class='hasil'>";
      echo "<h3>Terimakasih <strong>$nama</strong> sudah mengisi form pendaftaran (Metode GET).</h3><hr>";
      echo "Nama Lengkap : $nama <br>";
      echo "Tempat Lahir : $tempat <br>";
      echo "Tanggal Lahir : $tgl - $bln - $thn <br>";
      echo "Alamat Rumah : $alamat <br>";
      echo "Jenis Kelamin : $jk <br>";
      echo "Asal Sekolah : $sekolah <br>";
      echo "Nilai UAN : $nilai <br>";
      echo "<hr><small>🔎 Perhatikan URL di atas — semua data form muncul di sana karena menggunakan <strong>method GET</strong>.</small>";
      echo "</div>";
  }
  ?>
</div>

</body>
</html>