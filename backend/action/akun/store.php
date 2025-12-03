<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $username = escapeString($_POST['username']);
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $qInsert = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$hashed_password')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
            <script>
            alert('Akun Berhasil Ditambah');
            window.location.href='../../pages/akun/index.php';
            </script>";
    } else {
        echo "
            <script>
            alert('Akun Gagal Ditambah: " . addslashes(mysqli_error($connect)) . "');
            window.location.href='../../pages/akun/create.php';
            </script>";
    }
}
