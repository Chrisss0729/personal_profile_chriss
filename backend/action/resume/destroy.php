<?php
include '../../app.php';
include './show.php';

if (!isset($resume->id)) {
    die("<script>alert('ID tidak valid');history.back();</script>");
}

$result = mysqli_query($connect, "DELETE FROM resumes WHERE id = '" . mysqli_real_escape_string($connect, $resume->id) . "'");

echo "<script>
    alert('" . ($result ? "Data berhasil dihapus" : "Gagal menghapus: " . addslashes(mysqli_error($connect))) . "');
    window.location.href='../../pages/resume/index.php';
</script>";
