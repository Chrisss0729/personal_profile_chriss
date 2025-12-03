<?php
session_start();
include "../../app.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);

    // Ambil user berdasarkan email
    $qLogin = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($connect, $qLogin) or die(mysqli_error($connect));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password dengan hash
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_logged_in'] = true;
            echo "
            <script>
                alert('Login berhasil');
                window.location.href='../../pages/dashboard/index.php';
            </script>";
            exit();
        } else {
            echo "
            <script>
                alert('Password salah');
                window.location.href='../../pages/user/login.php';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Email tidak ditemukan');
            window.location.href='../../pages/user/login.php';
        </script>";
    }
}
