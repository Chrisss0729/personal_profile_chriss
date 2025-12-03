<?php
include '../../app.php';
include './show.php';

// Ambil ID dari URL
$id = (int)($_GET['id'] ?? 0);
if (!$id) die("ID tidak valid!");

// Proses Update
if (isset($_POST['tombol'])) {
    $skill = trim($_POST['skill']);
    $percent = (int)$_POST['percent'];
    $description = trim($_POST['description']);

    // Update data
    $query = "UPDATE skills SET skill = '$skill', percent = $percent, description = '$description'  WHERE id = $id";
    $result = mysqli_query($connect, $query);

    // Redirect dengan notifikasi
    $msg = $result ? "Data berhasil diupdate!" : "Gagal update: " . mysqli_error($connect);
    header("Location: ../../pages/skill/index.php?msg=" . urlencode($msg));
    exit;
}
