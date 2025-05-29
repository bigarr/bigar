<?php
$koneksi = new mysqli("localhost", "root", "", "akarbumi");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM produk WHERE id = $id";
$result = $koneksi->query($sql);

if ($result->num_rows === 0) {
  echo "<h2>Produk tidak ditemukan.</h2>";
  exit;
}

$produk = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($produk['nama']) ?> - Akar Bumi</title>
  <style>
    @font-face {
      font-family: 'TheNatures';
      src: url('fonts/TheNatures.ttf') format('truetype');
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: #f9f9f9;
      color: #333;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    nav {
      position: sticky;
      top: 0;
      z-index: 1000;
      background-color: #fff;
      display: flex;
      align-items: center;
      padding: 20px 70px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .logo-text {
      font-family: 'TheNatures', sans-serif;
      font-size: 45px;
      color: rgb(68, 115, 44);
      white-space: nowrap;
      line-height: 1;
      text-shadow:
        -1px -1px 0 #44662c,
        1px -1px 0 #44662c,
        -1px 1px 0 #44662c,
        1px 1px 0 #44662c;
      animation: fadeSlideIn 1.2s ease-out;
      transition: transform 0.3s ease;
    }

    .logo-text:hover {
      transform: scale(1.05);
    }

    @keyframes fadeSlideIn {
      0% {
        opacity: 0;
        transform: translateX(-30px);
      }

      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .nav-links {
      display: flex;
      gap: 30px;
      margin-left: 80px;
    }

    .nav-links a {
      color: rgb(147, 147, 147);
      font-weight: 400;
      font-size: 20px;
    }


    .nav-links a:hover {
      color: rgb(0, 0, 0);
    }

    .nav-links a.active {
      font-weight: bold;
      color: rgb(0, 0, 0);
    }

    .logout-link {
      color: red;
      font-weight: bold;
    }

    .layout {
      display: flex;
      flex-wrap: wrap;
      align-items: flex-start;
      justify-content: center;
      gap: 40px;
      padding: 40px;
    }

    .image-wrapper {
      flex: 1;
      max-width: 600px;
    }

    .image-wrapper img {
      width: 100%;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .container {
      flex: 1;
      max-width: 600px;
      padding: 20px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .info h2 {
      margin-top: 0;
      font-weight: 500;
    }

    .info p {
      margin: 10px 0;
    }

    .harga-produk {
      color: red;
      font-weight: 500;
      font-size: 23px;
    }

    .garis-harga {
      border: none;
      border-top: 1px solid grey;
      margin: 15px 0 15px 0;
      width: 100%;
    }


    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    input[type="number"] {
      width: 80px;
      padding: 8px;
      font-size: 1rem;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      padding: 10px 20px;
      background-color: rgb(68, 115, 44);
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
    }

    button:hover {
      background-color: rgb(68, 115, 44);
    }

    .back-link {
      display: inline-block;
      margin-top: 20px;
      color: rgb(68, 115, 44);
      font-weight: bold;
      text-decoration: none;
    }

    footer {
      background: rgb(68, 115, 44);
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <nav>
    <div class="logo-text">AkarBumi</div>
    <div class="nav-links">
      <a href="index.php" class="active">Beranda</a>
      <a href="kategori.php">Produk</a>
      <a href="tentang.php">Tentang Kami</a>
      <a href="kontak.php">Kontak</a>
      <?php if (isset($_SESSION['user'])): ?>
        <a href="logout.php" class="logout-link">Logout</a>
      <?php else: ?>
        <a href="login.php">Logout</a>
      <?php endif; ?>
    </div>
  </nav>

  <div class="layout">
    <div class="image-wrapper">
      <img src="<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>" />
    </div>

    <div class="container">
      <div class="info">
        <h2><?= htmlspecialchars($produk['nama']) ?></h2>
        <p><strong></strong><span class="harga-produk">Rp<?= number_format($produk['harga'], 0, ',', '.') ?></span></p>
        <hr class="garis-harga" />
        <p><?= nl2br(htmlspecialchars($produk['deskripsi'])) ?></p>

        <form action="proses_beli.php" method="POST">
          <input type="hidden" name="produk_id" value="<?= $produk['id'] ?>">
          <label for="jumlah">Jumlah:</label>
          <input type="number" name="jumlah" id="jumlah" value="1" min="1" required>
          <br>
          <button type="submit">Beli Sekarang</button>
        </form>
        <a href="index.php" class="back-link">← Kembali ke Beranda</a>
      </div>
    </div>
  </div>

  <footer>
    &copy; 2025 Akar Bumi. Semua hak dilindungi.
  </footer>
</body>
</html>