<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $name = escapeString(text: $_POST['name']);
    $born = escapeString(text: $_POST['born']);
    $address = escapeString(text: $_POST['address']);
    $zip_code = escapeString(text: $_POST['zip_code']);
    $email = escapeString(text: $_POST['email']);
    $phone = escapeString(text: $_POST['phone']);
    $total_project = escapeString(text: $_POST['total_project']);
    $work = escapeString(text: $_POST['work']);
    $description = escapeString(text: $_POST['description']);

    $imageNew = $about->image;
    $storages = "../../../storages/about/";



    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        if (!empty($about->image) && file_exists(filename: $storages . $about->image)) {
            unlink(filename: $storage . $about->image);
        }

        move_uploaded_file(from: $imageOld, to: $storages . $imageNew);
    }

    $qUpdate = "UPDATE abouts SET name = '$name', born='$born', 
    address='$address', zip_code='$zip_code', email= '$email', phone='$phone',
    total_project='$total_project', work='$work', description='$description' ,image='$imageNew' WHERE id ='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
           <script>
            alert('Data Berhasil di Ubah');
            window.location.href='../../pages/about/index.php'; 
            </script>";
    } else {
        echo "
            <script>
            alert('Data Gagal di Ubah');
            window.location.href='../../pages/about/edit.php'; 
            </script>";
    }
}
