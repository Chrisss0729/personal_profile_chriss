<?php
include '../../app.php';
include './show.php';

if (!isset($skills->id)) {
    die("<script>alert('ID tidak valid');history.back();</script>");
}

$result = mysqli_query($connect, "DELETE FROM skills WHERE id = '" . mysqli_real_escape_string($connect, $skills->id) . "'");

echo "<script>
    alert('" . ($result ? "Data berhasil dihapus" : "Gagal menghapus: " . addslashes(mysqli_error($connect))) . "');
    window.location.href='../../pages/skill/index.php';
</script>";
