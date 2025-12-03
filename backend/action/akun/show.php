<?php
include_once '../../app.php';
if (!isset($_GET['id'])) {
    echo "<script>alert('Tidak Bisa memilih ID ini');
    window.location.href = '../../pages/akun/index.php';</script>";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$user = $result->fetch_object();
if (!$user) {
    echo "<script>alert('Data tidak ditemukan'); 
    window.location.href = '../../pages/akun/index.php';</script>";
    exit;
}
