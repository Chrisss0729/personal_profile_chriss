<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $author = $_POST['author'];
    $date = $_POST['date'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];

    $imageNew = $blog->image;
    $storages = "../../../storages/blog/";



    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        if (!empty($blog->image) && file_exists(filename: $storages . $blog->image)) {
            unlink(filename: $storage . $blog->image);
        }

        move_uploaded_file(from: $imageOld, to: $storages . $imageNew);
    }

    $qUpdate = "UPDATE blogs SET date = '$date', author='$author', 
    tittle ='$tittle', description ='$description', image='$imageNew' WHERE id ='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
           <script>
            alert('Data Berhasil di Ubah');
            window.location.href='../../pages/blog/index.php'; 
            </script>";
    } else {
        echo "
            <script>
            alert('Data Gagal di Ubah');
            window.location.href='../../pages/blog/edit.php'; 
            </script>";
    }
}
