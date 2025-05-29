<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kontak | AkarBumi</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap">
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

    .kontak-container {
      display: flex;
      flex-wrap: wrap;
      max-width: 1100px;
      margin: 60px auto;
      gap: 40px;
      padding: 0 20px;
    }

    .kontak-info {
      flex: 1;
      min-width: 280px;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      color: #333;
    }

    .kontak-info h3 {
      font-size: 24px;
      margin-bottom: 20px;
      color:rgb(0, 0, 0);
    }

    .kontak-info p {
      margin: 10px 0;
      line-height: 1.6;
    }

    .kontak-form {
      flex: 2;
      min-width: 320px;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .kontak-form h2 {
      font-size: 28px;
      margin-bottom: 20px;
      color:rgb(0, 0, 0);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
      font-family: inherit;
    }

    .form-group textarea {
      resize: vertical;
    }

    .form-group button {
      background-color: #44662c;
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    .form-group button:hover {
      background-color: #355123;
    }

    footer {
      background: rgb(68, 115, 44);
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 60px;
    }

    @media (max-width: 768px) {
      .kontak-container {
        flex-direction: column;
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
      <a href="tentang.php">Tentang Kami</a>
      <a href="kontak.php" class="active">Kontak</a>
       <?php if (isset($_SESSION['user'])): ?>
        <a href="logout.php" class="logout-link">Logout</a>
      <?php else: ?>
        <a href="login.php">Logout</a>
      <?php endif; ?>
    </div>
  </nav>
  <div class="kontak-container">
    <div class="kontak-info">
      <h3>Informasi Kontak</h3>
      <p><strong>Alamat:</strong><br>Jl. Tikus No. 69, Yogyakarta, Indonesia</p>
      <p><strong>Email:</strong><br>info@akarbumi.id</p>
      <p><strong>Telepon:</strong><br>+62 896-4851-7582</p>
      <p><strong>Jam Operasional:</strong><br>Senin - Jumat, 09.00 - 15.00 WIB</p>
    </div>
    <div class="kontak-form">
      <h2>Hubungi Kami</h2>
      <form onsubmit="event.preventDefault(); alert('Pesan Anda telah dikirim (simulasi).'); this.reset();">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" id="name" name="name" required />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="form-group">
          <label for="message">Pesan</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit">Kirim Pesan</button>
        </div>
      </form>
    </div>
  </div>
  <footer>
    &copy; 2025 Akar Bumi. Semua hak dilindungi.
  </footer>
</body>
</html>