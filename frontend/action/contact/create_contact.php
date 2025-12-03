<?php
include '../../../config/escapeString.php';
include '../../../config/koneksi.php';

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $phone = escapeString($_POST['phone']);
    $subject = escapeString($_POST['subject']);
    $message = escapeString($_POST['message']);

    $qInsert = "INSERT INTO contacts (name, email, phone, subject, message ) VALUES('$name', '$email', '$phone', '$subject', '$message' )";

    if (mysqli_query($connect, $qInsert)) {
        echo "
            <script>
            alert('Data Berhasil Ditambah');
            window.location.href='../../index.php#contact-section';
            </script>";
    } else {
        echo "
            <script>
            alert('Data Gagal Ditambah: " . mysqli_error($connect) . "');
            window.location.href='../../index.php#contact-section';
            </script>";
    }
}
