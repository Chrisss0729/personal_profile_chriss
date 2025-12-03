<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: ../user/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../templates-admin/templates/src/assets/images/logos/favicon.png" />
    <style>
        /* === ANIMASI RGB BACKGROUND (4 warna) === */
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(270deg, #ff3239ff, #2ecafaff, #dc2cffff, #ff5bd0ff);
            background-size: 600% 600%;
            animation: pastelBackground 15s ease infinite;
        }

        @keyframes pastelBackground {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* === CARD LOGIN === */
        .card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #667eea, #764ba2);
            border: none;
            border-radius: 12px;
            font-weight: bold;
            transition: transform 0.2s ease-in-out;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #764ba2, #667eea);
        }

        .btn-outline-secondary {
            border-radius: 12px;
            font-weight: 500;
            color: #fff;
            border: 1px solid #fff;
        }

        .btn-outline-secondary:hover {
            background: #fff;
            color: #000;
        }

        .alert {
            border-radius: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">✨ Buat Akun Baru</h3>
                        <p class="text-light">Daftar untuk mulai menggunakan aplikasi</p>
                    </div>

                    <form action="../../action/auth/register_proses.php" method="POST">
                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="usernameInput"
                                placeholder="Masukan Username.." required>
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="emailInput"
                                placeholder="Masukan Email.." required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="passwordInput"
                                placeholder="Masukan Password.." required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPasswordInput" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirmPasswordInput"
                                placeholder="Konfirmasi Password.." required>
                        </div>
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary py-2" name="tombol">Buat Akun</button>
                        </div>
                        <div class="text-center">
                            <a href="../../pages/user/login.php" class="btn btn-outline-secondary w-100">
                                🔑 Sudah punya akun? Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include "../../partials/script.php";
?>