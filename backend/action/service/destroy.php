<?php
include '../../app.php';
include './show.php';

if (!isset($services->id)) {
    die("<script>alert('ID tidak valid');history.back();</script>");
}

$result = mysqli_query($connect, "DELETE FROM services WHERE id = '" . mysqli_real_escape_string($connect, $services->id) . "'");

echo "<script>
    alert('" . ($result ? "Data berhasil dihapus" : "Gagal menghapus: " . addslashes(mysqli_error($connect))) . "');
    window.location.href='../../pages/service/index.php';
</script>";
