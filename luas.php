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
            <h2 class="text-center">Luas Segitiga</h2>

    <form method="POST">
        <label>Masukkan alas:</label>
        <input type="number" name="alas" step="any" required>
        <br>
        <label>Masukkan tinggi:</label>
        <input type="number" name="tinggi" step="any" required>
        <br>
        <button type="submit" name="hitung_segitiga">Hitung Luas</button>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hitung_segitiga"])) {
        $alas = (float)$_POST["alas"];
        $tinggi = (float)$_POST["tinggi"];
        $luas_segitiga = 0.5 * $alas * $tinggi;
        echo "<p>Luas Segitiga: $luas_segitiga</p>";
    }
    ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>