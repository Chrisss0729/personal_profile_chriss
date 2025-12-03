<?php
include_once '../../app.php';

if (isset($_POST['tombol'])) {
    $icon = escapeString($_POST['icon']);
    $job = escapeString($_POST['job']);
    $description = escapeString($_POST['description']);


    $qInsert = "INSERT INTO services(icon, job, description) VALUES('$icon', '$job', '$description')";
    if (mysqli_query($connect, $qInsert)) {
        echo "<script>alert('Data berhasil ditambahkan');
        \n window.location.href = '../../pages/service/index.php';\n </script>\n ";
    } else {
        echo "<script>alert('Data gagal ditambah'); 
        window.location.href = '../../pages/service/create.php';</script>";
    }
}
