<?php
session_start();
require_once "koneksi.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $konfirmasi = $_POST['konfirmasi_password'];

  if ($password !== $konfirmasi) {
    header("Location: register.php?error=Konfirmasi%20kata%20sandi%20tidak%20cocok");
    exit();
  }

  $stmt = $koneksi->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
  $stmt->bind_param("ss", $username, $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->close();
    header("Location: register.php?error=Username%20atau%20Email%20sudah%20digunakan");
    exit();
  }
  $stmt->close();

  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $koneksi->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $password_hash);
  if ($stmt->execute()) {
    $stmt->close();
    header("Location: login.php?success=Registrasi%20berhasil.%20Silakan%20masuk.");
    exit();
  } else {
    $stmt->close();
    header("Location: register.php?error=Terjadi%20kesalahan,%20silakan%20coba%20lagi");
    exit();
  }
} else {
  header("Location: register.php");
  exit();
}
