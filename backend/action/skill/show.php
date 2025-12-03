<?php
include_once '../../app.php';
if (!isset($_GET['id'])) {
    echo "<script>alert('Tidak Bisa memilih ID ini');
    window.location.href = '../../pages/skill/index.php';</script>";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM skills WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$skills = $result->fetch_object();
if (!$skills) {
    echo "<script>alert('Data tidak ditemukan'); 
    window.location.href = '../../pages/skill/index.php';</script>";
    exit;
}
