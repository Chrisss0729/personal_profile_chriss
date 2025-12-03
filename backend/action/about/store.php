<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $born = escapeString($_POST['born']);
    $address = escapeString($_POST['address']);
    $zip_code = escapeString($_POST['zip_code']);
    $email = escapeString($_POST['email']);
    $phone = escapeString($_POST['phone']);
    $total_project = escapeString($_POST['total_project']);
    $work = escapeString($_POST['work']);
    $description = escapeString($_POST['description']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/about/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO abouts(name, born, address, zip_code, email, phone, total_project, work, description, image) 
        VALUES('$name', '$born', '$address', '$zip_code', '$email', '$phone', '$total_project', '$work', '$description', '$imageNew')";

        // mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        mysqli_query($connect, $qInsert) or die('Query error'($connect));
        echo "
        <script>
            alert('Data berhasil ditambah');
            window.location.href = '../../pages/about/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambah');
            window.location.href = '../../pages/about/create.php';
        </script>
        ";
    }
}
