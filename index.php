<?php
session_start();

$koneksi = new mysqli("localhost", "root", "", "akarbumi");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

$sql = "SELECT * FROM produk";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Akar Bumi</title>
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

    .hutan {
      position: relative;
      height: 400px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      max-width: 1418px;
      margin: 0 auto;
      border-radius: 10px;
      margin-top: 30px;
    }

    .hutan-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('index.jpeg') center/cover no-repeat;
      filter: blur(4px);
      z-index: 1;
    }

    .hutan-text {
      position: relative;
      z-index: 2;
      color: white;
      font-size: 48px;
      text-shadow: 9px 9px 6px rgba(0, 0, 0, 0.6);
      text-align: center;
      font-family: 'Courier New', Courier, monospace;
      font-weight: 500;
    }

    .products {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      gap: 20px;
      padding: 40px;
    }

    .product-card {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.2s;
      display: block;
    }

    .product-card:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .product-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .product-info {
      padding: 15px;
    }

    .product-info h3 {
      margin: 0 0 10px;
      font-size: 1.2rem;
      font-weight: 400;
    }

    .product-info p {
      margin: 0;
      color: #555;
    }

    .product-info .harga-produk {
      color: red;
      font-weight: 450;
      font-size: 17px;
    }

    footer {
      background: rgb(68, 115, 44);
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }

    @media (max-width: 1400px) {
      .products {
        grid-template-columns: repeat(4, 1fr);
      }
    }

    @media (max-width: 900px) {
      .products {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 600px) {
      .products {
        grid-template-columns: 1fr;
      }

      .nav-links {
        flex-direction: column;
        margin-left: 20px;
        gap: 10px;
      }

      .logo-text {
        font-size: 48px;
      }
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
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php" class="logout-link">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <div class="hutan">
    <div class="hutan-bg"></div>
    <div class="hutan-text">Dari Akar, Untuk Bumi!</div>
  </div>

  <section class="products">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($produk = $result->fetch_assoc()): ?>
        <a href="detail_produk.php?id=<?= $produk['id'] ?>" class="product-card">
          <img src="<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>">
          <div class="product-info">
            <h3><?= htmlspecialchars($produk['nama']) ?></h3>
            <p class="harga-produk">Rp<?= number_format($produk['harga'], 0, ',', '.') ?></p>
          </div>
        </a>
      <?php endwhile; ?>
    <?php else: ?>
      <p style="padding: 20px;">Tidak ada produk yang tersedia.</p>
    <?php endif; ?>
  </section>

  <footer>
    &copy; 2025 Akar Bumi. Semua hak dilindungi.
  </footer>
</body>
</html>