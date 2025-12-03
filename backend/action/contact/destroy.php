<?php
include '../../app.php';
include './show.php'; // ini akan membuat $contacts tersedia

$stmt = $connect->prepare("DELETE FROM contacts WHERE id = ?");
$stmt->bind_param("i", $contacts->id);
$result = $stmt->execute();

echo "<script>
    alert(" . json_encode($result ? "Data berhasil dihapus" : "Gagal menghapus: " . mysqli_error($connect)) . ");
    window.location.href='../../pages/contact/index.php';
</script>";
