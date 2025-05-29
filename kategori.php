<?php
$koneksi = new mysqli("localhost", "root", "", "akarbumi");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

$kategoriResult = $koneksi->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");

$kategori_id = isset($_GET['kategori']) ? (int)$_GET['kategori'] : 0;
$allowedSort = ['', 'harga_terendah', 'harga_tertinggi', 'terbaru'];
$sort = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSort) ? $_GET['sort'] : '';
$search = isset($_GET['search']) ? trim($koneksi->real_escape_string($_GET['search'])) : '';

$sql = "SELECT * FROM produk";
$conditions = [];

if ($kategori_id > 0) {
  $conditions[] = "kategori_id = $kategori_id";
}
if (!empty($search)) {
  $conditions[] = "nama LIKE '%$search%'";
}
if (!empty($conditions)) {
  $sql .= " WHERE " . implode(" AND ", $conditions);
}

switch ($sort) {
  case 'harga_terendah':
    $sql .= " ORDER BY harga ASC";
    break;
  case 'harga_tertinggi':
    $sql .= " ORDER BY harga DESC";
    break;
  case 'terbaru':
    $sql .= " ORDER BY id DESC";
    break;
  default:
    $sql .= " ORDER BY nama ASC";
}

$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Produk Akar Bumi</title>
  <style>
    @font-face {
      font-family: 'TheNatures';
      src: url('fonts/TheNatures.ttf') format('truetype');
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: rgb(244, 244, 244);
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

    .search-form {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-form input[type="text"] {
      padding: 7px 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 180px;
    }

    .search-form button {
      padding: 7px 15px;
      font-size: 16px;
      background-color: #44662c;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .main-layout {
      display: flex;
      min-height: calc(100vh - 60px);
      margin-right: 20px;
      margin-left: 40px;
    }

    .sidebar {
      width: 300px;
      background-color: #fff;
      padding: 20px;
      margin-top: 30px;
    }

    .sidebar h3 {
      margin-top: 0;
      font-size: 18px;
    }

    .sidebar a {
      display: block;
      margin: 8px 0;
      color: #555;
      text-decoration: none;
      font-weight: 600;
      font-size: 18px;
    }

    .sidebar a:hover {
      color: rgb(0, 0, 0);
    }

    .sidebar a.active {
      font-weight: bold;
      color: rgb(0, 0, 0);
    }

    .content {
      flex: 1;
      padding: 20px;
      margin-left: 25px;
      margin-top: 11px;
    }

    .sort-form {
      margin-bottom: 20px;
    }

    .fixed-photo img {
      width: 100%;
      height: 330px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      margin-bottom: 20px;
    }

  .produk-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: 20px;
  justify-content: center;
  padding-bottom: 30px;
}

.product-card {
  width: 240px;
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  text-align: left;
  transition: 0.2s;
  margin: auto;
  min-height: 350px;
}


.product-card:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.product-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  display: block;
}

.product-info {
  padding: 15px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.product-info h3 {
  margin: 0 0 10px;
  font-size: 1.2rem;
  flex-grow: 1;
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


    @media (max-width: 768px) {
      .main-layout {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        margin: 0;
        border-bottom: 1px solid #ccc;
      }

      .search-form {
        margin-top: 10px;
        margin-left: 0;
        width: 100%;
        justify-content: center;
      }
    }
  </style>
</head>

<body>
  <nav>
    <div class="logo-text">AkarBumi</div>
    <div class="nav-links">
      <a href="index.php">Beranda</a>
      <a href="kategori.php" class="active">Produk</a>
      <a href="tentang.php">Tentang Kami</a>
      <a href="kontak.php">Kontak</a>
       <?php if (isset($_SESSION['user'])): ?>
        <a href="logout.php" class="logout-link">Logout</a>
      <?php else: ?>
        <a href="login.php">Logout</a>
      <?php endif; ?>
    </div>
    <form method="get" action="kategori.php" class="search-form">
      <?php if ($kategori_id > 0): ?>
        <input type="hidden" name="kategori" value="<?= $kategori_id ?>">
      <?php endif; ?>
      <input type="text" name="search" placeholder="Cari produk..." value="<?= htmlspecialchars($search) ?>">
      <button type="submit">Cari</button>
    </form>
  </nav>

  <div class="main-layout">
    <div class="sidebar">
      <h3>Kategori</h3>
      <a href="?" class="<?= $kategori_id === 0 ? 'active' : '' ?>">Semua</a>
      <?php while ($kat = $kategoriResult->fetch_assoc()): ?>
        <a href="?kategori=<?= $kat['id'] ?>" class="<?= $kategori_id === (int)$kat['id'] ? 'active' : '' ?>">
          <?= htmlspecialchars($kat['nama_kategori']) ?>
        </a>
      <?php endwhile; ?>
    </div>

    <div class="content">
      <div class="fixed-photo">
        <img src="kategori.webp" alt="Produk" />
      </div>

      <form method="get" class="sort-form">
        <?php if ($kategori_id > 0): ?>
          <input type="hidden" name="kategori" value="<?= $kategori_id ?>">
        <?php endif; ?>
        <?php if (!empty($search)): ?>
          <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">
        <?php endif; ?>
        <label for="sort">Urutkan:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
          <option value="" <?= $sort == '' ? 'selected' : '' ?>>Nama A-Z</option>
          <option value="terbaru" <?= $sort == 'terbaru' ? 'selected' : '' ?>>Terbaru</option>
          <option value="harga_terendah" <?= $sort == 'harga_terendah' ? 'selected' : '' ?>>Harga Terendah</option>
          <option value="harga_tertinggi" <?= $sort == 'harga_tertinggi' ? 'selected' : '' ?>>Harga Tertinggi</option>
        </select>
      </form>

      <div class="produk-grid">
        <?php while ($row = $result->fetch_assoc()): ?>
          <a href="detail_produk.php?id=<?= $row['id'] ?>" class="product-card">
            <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama']) ?>">
            <div class="product-info">
              <h3><?= htmlspecialchars($row['nama']) ?></h3>
              <p class="harga-produk">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
            </div>
          </a>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
  <footer>
    &copy; 2025 Akar Bumi. Semua hak dilindungi.
  </footer>
</body>
</html>