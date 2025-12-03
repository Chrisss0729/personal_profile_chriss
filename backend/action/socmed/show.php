<?php
include_once '../../app.php';
if (!isset($_GET['id'])) {
    echo "<script>alert('Tidak Bisa memilih ID ini');
    window.location.href = '../../pages/socmed/index.php';</script>";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM sosmeds WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$socmed = $result->fetch_object();
if (!$socmed) {
    echo "<script>alert('Data tidak ditemukan'); 
    window.location.href = '../../pages/socmed/index.php';</script>";
    exit;
}
