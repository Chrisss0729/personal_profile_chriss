<?php
if (!isset($connect)) {
    include '../../app.php'; // pastikan koneksi tersedia
}

// Ambil ID dari URL
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    die("<script>alert('ID tidak valid');history.back();</script>");
}

$id = (int) $_GET['id'];

// Query dengan prepared statement
$stmt = $connect->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$contacts = $result->fetch_object();

// Cek apakah data ditemukan
if (!$contacts) {
    die("<script>alert('Data tidak ditemukan');history.back();</script>");
}
