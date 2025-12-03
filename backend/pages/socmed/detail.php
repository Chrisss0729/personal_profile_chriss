<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$query = "SELECT * FROM socmeds WHERE id = $id";
$result = mysqli_query($connect, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "<div class='alert alert-danger m-4'>Data tidak ditemukan.</div>";
    include '../../partials/footer.php';
    include '../../partials/script.php';
    exit;
}

$data = mysqli_fetch_object($result);
?>

<!-- Konten -->
<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow rounded-4">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
          <h4 class="mb-0 text-primary">
            <i class="bi bi-info-circle me-2"></i> Detail Sosial Media
          </h4>
          <a href="index.php" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-arrow-left me-1"></i> Kembali
          </a>
        </div>
        <div class="card-body text-center"> <!-- Tambahkan text-center di sini -->
          <div class="mb-3">
            <i class="<?= htmlspecialchars($data->icon) ?>" style="font-size: 50px;"></i>
          </div>
          <p><strong>Link:</strong><br>
            <a href="<?= htmlspecialchars($data->link) ?>" target="_blank">
              <?= htmlspecialchars($data->link) ?>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include '../../partials/footer.php'; 
include '../../partials/script.php';
?>
