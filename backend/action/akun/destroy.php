<?php
include '../../app.php';
include './show.php';

if (!isset($user->id)) {
    die("<script>alert('ID tidak valid');history.back();</script>");
}

$result = mysqli_query($connect, "DELETE FROM users WHERE id = '" . mysqli_real_escape_string($connect, $user->id) . "'");

echo "<script>
    alert('" . ($result ? "Akun berhasil dihapus" : "Gagal menghapus: " . addslashes(mysqli_error($connect))) . "');
    window.location.href='../../pages/akun/index.php';
</script>";
