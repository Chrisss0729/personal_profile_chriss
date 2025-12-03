<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $username = escapeString($_POST['username']);
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);

    // Hash password sebelum simpan
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $qInsert = "INSERT INTO users (username, email, password ) VALUES('$username', '$email', '$hashedPassword')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
            <script>
            alert('Register Berhasil');
            window.location.href='../../pages/user/login.php';
            </script>";
    } else {
        echo "
            <script>
            alert('Register Gagal');
            window.location.href='../../pages/user/register.php';
            </script>";
    }
}
