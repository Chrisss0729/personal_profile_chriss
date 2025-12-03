<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $title = escapeString(text: $_POST['title']);
    $job = escapeString(text: $_POST['job']);
    $category = escapeString(text: $_POST['category']);
    $description = escapeString(text: $_POST['description']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/project/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO projects (title, job, category, description, image) VALUES ('$title', '$job', '$category', '$description', '$imageNew')";
        mysqli_query($connect, $qInsert) or die('Query error'($connect));
        echo "
        <script>
        alert('Data berhasil ditambah');
        window.location.href = '../../pages/project/index.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Data gagal ditambah');
        window.location.href = '../../pages/project/create.php';
        </script>
        ";
    }
}
