<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bulan.css">
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
        <h1 class="text-center">Bulan</h1>
        <form method="POST">
        <label for="angka">Masukkan angka (1-12): </label>
        <input type="number" name="angka" id="angka" min="1" max="12" required>
        <button type="submit">Submit</button>
        </form>
    
    <?php
    function getBulan($angka) {
        $bulan = [
            1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April",
            5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus",
            9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"
        ];
        
        return $bulan[$angka] ?? "Angka tidak valid, masukkan angka antara 1-12";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka = (int)$_POST["angka"];
        echo "<p>Bulan: " . getBulan($angka) . "</p>";
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>