<?php
$koneksi = new mysqli("localhost", "root", "", "akarbumi");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
