<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AkarBumi - Marketplace Hijau</title>
  <style>
    @font-face {
      font-family: 'TheNatures';
      src: url('fonts/TheNatures.ttf') format('truetype');
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f9f6;
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

    .header-bar {
      background-color: #ffffff;
      text-align: center;
      padding: 60px 20px;
    }

    .header-bar p {
      max-width: 1000px;
      margin: auto;
      font-size: 18px;
      line-height: 1.8;
      color: #333;
    }

    .thank-you-project {
      position: relative;
      background: url('kate.jpg') center center / cover no-repeat fixed;
      height: 600px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
    }

    .thank-you-project .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    .thank-you-project .content {
      position: relative;
      z-index: 2;
      max-width: 800px;
      padding: 20px;
      font-family: 'Courier New', Courier, monospace;
      text-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
    }

    .thank-you-project h2 {
      font-size: 48px;
      margin-bottom: 20px;
      letter-spacing: 2px;
    }

    .thank-you-project p {
      font-size: 20px;
      line-height: 1.6;
    }

    .glance-section {
      text-align: center;
      padding: 50px 20px;
    }

    .glance-section h2 {
      font-size: 32px;
      margin-bottom: 30px;
      color: #2e5f43;
    }

    .glance-stats {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 40px;
    }

    .glance-item {
      font-size: 18px;
      color: #2e5f43;
      max-width: 300px;
    }

    .menu-section {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
      padding: 40px 20px;
    }

    .menu-box {
      position: relative;
      width: 300px;
      height: 250px;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .menu-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    footer {
      background: rgb(68, 115, 44);
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }

    @media screen and (max-width: 768px) {
      nav {
        flex-direction: column;
        align-items: flex-start;
        padding: 12px 20px;
      }

      .nav-links {
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
        margin-left: 0;
      }

      .logo-text {
        font-size: 40px;
      }

      .menu-section {
        flex-direction: column;
        align-items: center;
      }

      .menu-box {
        width: 90%;
      }
    }
  </style>
</head>

<body>
  <nav>
    <div class="logo-text">AkarBumi</div>
    <div class="nav-links">
      <a href="index.php">Beranda</a>
      <a href="kategori.php">Produk</a>
      <a href="tentang.php" class="active">Tentang Kami</a>
      <a href="kontak.php">Kontak</a>
      <?php if (isset($_SESSION['user'])): ?>
        <a href="logout.php" class="logout-link">Logout</a>
      <?php else: ?>
        <a href="login.php">Logout</a>
      <?php endif; ?>
    </div>
  </nav>
  <div class="header-bar">
    <p>
      <strong>AkarBumi</strong> adalah marketplace ramah lingkungan
      yang berkomitmen mempertemukan pelaku usaha hijau
      dengan konsumen yang peduli bumi.
      Kami percaya bahwa perubahan besar berawal dari langkah kecil dan setiap
      pilihan belanja berkelanjutan adalah kontribusi nyata menuju masa depan lebih baik.
    </p>
  </div>
  <section class="thank-you-project">
    <div class="overlay"></div>
    <div class="content">
      <h2>THANK YOU PROJECT</h2>
      <p>Setiap transaksi Anda turut menanam harapan.
        Sebagian keuntungan kami digunakan untuk kegiatan pelestarian alam,
        seperti penanaman pohon dan pelatihan tentang gaya hidup ramah lingkungan.
        Bersama Anda, kami menumbuhkan masa depan lebih hijau.</p>
    </div>
  </section>
  <div class="glance-section">
    <h2>2025 Sekilas Pandang</h2>
    <div class="glance-stats">
      <div class="glance-item">✅ 12.000+ Produk ramah lingkungan terjual</div>
      <div class="glance-item">🌿 8.000 Pengguna aktif di seluruh Indonesia</div>
      <div class="glance-item">🤝 120+ Mitra lokal & UMKM hijau</div>
    </div>
  </div>
  <div class="menu-section">
    <div class="menu-box"><img src="tentang/aksi3.jpeg" alt="Belanja Berkelanjutan"></div>
    <div class="menu-box"><img src="tentang/aksi1.jpeg" alt="Edukasi Komunitas"></div>
    <div class="menu-box"><img src="tentang/aksi2.jpeg" alt="Gabung Sekarang"></div>
    <div class="menu-box"><img src="tentang/aksi4.jpeg" alt="Gabung Sekarang"></div>
  </div>
  <footer>
    &copy; 2025 Akar Bumi. Semua hak dilindungi.
  </footer>
</body>
</html>