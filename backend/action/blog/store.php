<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $date = escapeString(text: $_POST['date']);
    $author = escapeString(text: $_POST['author']);
    $tittle = escapeString(text: $_POST['tittle']);
    $description = escapeString(text: $_POST['description']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/blog/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO blogs(date, author, tittle, description, image) VALUES ('$date', '$author', '$tittle', '$description', '$imageNew')";
        mysqli_query($connect, $qInsert) or die('Query error'($connect));
        echo "
        <script>
        alert('Data berhasil ditambah');
        window.location.href = '../../pages/blog/index.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Data gagal ditambah');
        window.location.href = '../../pages/blog/create.php';
        </script>
        ";
    }
}
