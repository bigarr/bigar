<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="kalkulator.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Embun Bigar Hidayat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="tugas1.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tugas1kontak.html">Kontak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bulan.php">Bulan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kalkulator.php">Kalkulator</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="luas.php">Luas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="volume.php">Volume</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container mt-3">
        <div class="card p-4 shadow">
        <!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h2>Kalkulator Sederhana</h2>
    <form method="POST">
        <label>Masukkan angka pertama:</label>
        <input type="number" name="angka1" step="any" required>
        <br>
        <label>Masukkan angka kedua:</label>
        <input type="number" name="angka2" step="any" required>
        <br>
        <button type="submit">Hitung</button>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka1 = (float)$_POST["angka1"];
        $angka2 = (float)$_POST["angka2"];
        
        $penjumlahan = $angka1 + $angka2;
        $pengurangan = $angka1 - $angka2;
        $perkalian = $angka1 * $angka2;
        $pembagian = ($angka2 != 0) ? $angka1 / $angka2 : "Tidak bisa membagi dengan nol";

        echo "<p>Penjumlahan (+): $penjumlahan</p>";
        echo "<p>Pengurangan (-): $pengurangan</p>";
        echo "<p>Perkalian (*): $perkalian</p>";
        echo "<p>Pembagian (/): $pembagian</p>";
    }
    ?>
</body>
</html>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>