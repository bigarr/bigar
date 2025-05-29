<?php
$koneksi = new mysqli("localhost", "root", "", "akarbumi");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Tangkap data dari form
$produk_id = isset($_POST['produk_id']) ? intval($_POST['produk_id']) : 0;
$jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;

if ($produk_id <= 0 || $jumlah <= 0) {
  echo "<h2>Data pembelian tidak valid.</h2>";
  exit;
}

// Ambil data produk
$sql = "SELECT * FROM produk WHERE id = $produk_id";
$result = $koneksi->query($sql);

if ($result->num_rows === 0) {
  echo "<h2>Produk tidak ditemukan.</h2>";
  exit;
}

$produk = $result->fetch_assoc();
$total_harga = $produk['harga'] * $jumlah;

$stmt = $koneksi->prepare("INSERT INTO transaksi (produk_id, jumlah, total_harga, tanggal) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("iii", $produk_id, $jumlah, $total_harga);
$stmt->execute();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembelian Berhasil</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f0f0;
      padding: 40px;
      color: #333;
    }
    .box {
      max-width: 600px;
      margin: 0 auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .box h2 {
      color: #388e3c;
    }
    .box p {
      font-size: 18px;
      margin: 10px 0;
    }
    a {
      display: inline-block;
      margin-top: 20px;
      background: #388e3c;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
    }
    a:hover {
      background: #2e7d32;
    }
  </style>
</head>
<body>

  <div class="box">
    <h2>Terima kasih atas pembelian Anda!</h2>
    <p>Produk: <strong><?= htmlspecialchars($produk['nama']) ?></strong></p>
    <p>Jumlah: <strong><?= $jumlah ?></strong></p>
    <p>Total Harga: <strong>Rp <?= number_format($total_harga, 0, ',', '.') ?></strong></p>
    <a href="index.php">← Kembali ke Beranda</a>
  </div>

</body>
</html>
