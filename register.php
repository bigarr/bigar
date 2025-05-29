

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar - AkarBumi</title>
  <style>
    @font-face {
      font-family: 'TheNatures';
      src: url('fonts/TheNatures.ttf') format('truetype');
      font-weight: normal;
      font-style: normal;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }
    body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-image: url('hutann.jpg'); 
  background-size: cover;
  background-position: center;
  filter: blur(2px); 
  z-index: -1;
}


    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .card {
      display: flex;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 900px;
      width: 100%;
    }

    .left-panel {
      background-color: rgb(68, 115, 44);
      color: white;
      padding: 40px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .left-panel h1 {
      font-size: 70px;
      margin-bottom: 10px;
      font-family: 'TheNatures', sans-serif;
    }

    .left-panel p {
      font-size: 18px;
    }

    .right-panel {
      flex: 1;
      padding: 40px;
    }

    .right-panel h2 {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn {
      width: 100%;
      background-color: rgb(68, 115, 44);
      border: none;
      color: white;
      padding: 14px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-link {
      text-align: right;
      margin-top: -10px;
      margin-bottom: 20px;
    }

    .login-link a {
      color: rgb(68, 115, 44);
      text-decoration: none;
      font-weight: bold;
    }

    .error {
      color: red;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="left-panel">
        <h1>AkarBumi</h1>
        <p>Dari Akar, Untuk Bumi</p>
      </div>
      <div class="right-panel">
        <div class="login-link">
          Sudah punya akun? <a href="login.php">Masuk</a>
        </div>
        <h2>Daftar</h2>
        
        <?php if (isset($_GET['error'])): ?>
          <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>
        
        <form action="proses_daftar.php" method="POST">
          <div class="form-group">
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="password" name="password" placeholder="Kata Sandi" required>
          </div>
          <div class="form-group">
            <input type="password" name="konfirmasi_password" placeholder="Konfirmasi Kata Sandi" required>
          </div>
          <button class="btn" type="submit">Daftar</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
