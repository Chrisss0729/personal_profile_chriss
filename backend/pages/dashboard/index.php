<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    // Simpan pesan ke session
    $_SESSION['error'] = "Anda harus login terlebih dahulu!";
    header("Location: ../../pages/user/login.php");
    exit();
}

require_once '../../../config/koneksi.php';

// Gunakan prepared statement untuk query
$qContact = "SELECT * FROM contacts";
$result = mysqli_query($connect, $qContact);
if (!$result) {
    die("Error: " . mysqli_error($connect));
}

include '../../partials/header.php';
$page = 'dashboard';
include '../../partials/sidebar.php';
?>

<style>
    /* ===== Custom Table Styling ===== */
    .table-modern {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table-modern thead th {
        background-color: #f5f7fa;
        color: #6c757d;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: bold;
        border: none;
        padding: 12px;
    }

    .table-modern tbody tr {
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
    }

    .table-modern tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    }

    .table-modern td {
        border: none;
        padding: 14px;
        vertical-align: middle;
    }

    .table-modern img {
        border-radius: 8px;
    }

    /* Tombol aksi minimalis */
    .btn-action {
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 13px;
    }
</style>

<div class="container-fluid page-body-wrapper">
    <div id="main">
        <div class="card-body">
            <h1 class="text-center mb-4">Dashboard Admin - Personal Profile <?= htmlspecialchars($_SESSION['user']['nama'] ?? 'Admin') ?> </h1>

            <!-- Statistik Ringkas -->
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm p-3">
                        <h4>Total Project</h4>
                        <h2 class="text-primary">
                            <?php
                            $projectCount = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM projects"));
                            echo $projectCount['total'];
                            ?>
                        </h2>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm p-3">
                        <h4>Total Blog</h4>
                        <h2 class="text-success">
                            <?php
                            $blogCount = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM blogs"));
                            echo $blogCount['total'];
                            ?>
                        </h2>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm p-3">
                        <h4>Total Skills</h4>
                        <h2 class="text-warning">
                            <?php
                            $skillCount = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM skills"));
                            echo $skillCount['total'];
                            ?>
                        </h2>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm p-3">
                        <h4>Total Contact</h4>
                        <h2 class="text-danger">
                            <?php
                            $contactCount = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM contacts"));
                            echo $contactCount['total'];
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Jam Dunia -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h4 class="fw-bold text-success mb-3">🌍 Jam Dunia</h4>
                    <div class="row text-center" id="world-clock">
                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                                <h5>Jakarta</h5>
                                <h3 id="clock-jakarta">--:--:--</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                                <h5>Tokyo</h5>
                                <h3 id="clock-tokyo">--:--:--</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                                <h5>London</h5>
                                <h3 id="clock-london">--:--:--</h3>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                                <h5>New York</h5>
                                <h3 id="clock-ny">--:--:--</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function updateWorldClock() {
                    const options = {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    };

                    document.getElementById("clock-jakarta").textContent =
                        new Date().toLocaleTimeString("id-ID", {
                            ...options,
                            timeZone: "Asia/Jakarta"
                        });

                    document.getElementById("clock-tokyo").textContent =
                        new Date().toLocaleTimeString("ja-JP", {
                            ...options,
                            timeZone: "Asia/Tokyo"
                        });

                    document.getElementById("clock-london").textContent =
                        new Date().toLocaleTimeString("en-GB", {
                            ...options,
                            timeZone: "Europe/London"
                        });

                    document.getElementById("clock-ny").textContent =
                        new Date().toLocaleTimeString("en-US", {
                            ...options,
                            timeZone: "America/New_York"
                        });
                }

                // Update setiap detik
                setInterval(updateWorldClock, 1000);
                updateWorldClock();
            </script>

            <!-- Card Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h4 class="fw-bold text-primary">☎️ Pesan</h4>
                        </div>
                        <table class="table table-modern align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Subjek</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($item = mysqli_fetch_object($result)):
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= htmlspecialchars($item->name) ?></td>
                                        <td><?= htmlspecialchars($item->email) ?></td>
                                        <td><?= htmlspecialchars($item->phone) ?></td>
                                        <td><?= htmlspecialchars($item->subject) ?></td>
                                        <td><?= htmlspecialchars($item->message) ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../../partials/footer.php'; ?>
    </div>
</div>

<?php include '../../partials/script.php'; ?>