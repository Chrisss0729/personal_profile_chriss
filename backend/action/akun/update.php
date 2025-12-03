<?php
include '../../app.php';
include './show.php';

// Ambil ID dari URL
$id = (int)($_GET['id'] ?? 0);
if (!$id) die("ID tidak valid!");

// Proses Update
if (isset($_POST['tombol'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password'] ?? '');

    // Update data
    if (!empty($password)) {
        // Jika password diisi, enkripsi dan update
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET username = '$username', email = '$email', password = '$hashed_password' WHERE id = $id";
    } else {
        // Jika password kosong, jangan update password
        $query = "UPDATE users SET username = '$username', email = '$email' WHERE id = $id";
    }

    $result = mysqli_query($connect, $query);

    // Redirect dengan notifikasi
    $msg = $result ? "Akun berhasil diupdate!" : "Gagal update: " . mysqli_error($connect);
    header("Location: ../../pages/akun/index.php?msg=" . urlencode($msg));
    exit;
}
