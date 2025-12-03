<?php
include_once '../../app.php';
if (!isset($_GET['id'])) {
    echo "<script>alert('Tidak Bisa memilih ID ini');
    window.location.href = '../../pages/service/index.php';</script>";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM services WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$services = $result->fetch_object();
if (!$services) {
    echo "<script>alert('Data tidak ditemukan'); 
    window.location.href = '../../pages/service/index.php';</script>";
    exit;
}
