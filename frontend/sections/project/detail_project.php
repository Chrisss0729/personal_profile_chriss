<?php
include "../../../config/koneksi.php";

if (!isset($_GET['id'])) {
    die("Project ID tidak ditemukan.");
}

$id = intval($_GET['id']);
$qProject = "SELECT * FROM projects WHERE id = $id";
$result = mysqli_query($connect, $qProject) or die(mysqli_error($connect));

if (mysqli_num_rows($result) == 0) {
    die("Project tidak ditemukan.");
}

$row = mysqli_fetch_assoc($result);
$imagePath = "../../../storages/project/" . $row['image'];
$fallbackImage = "../../../storages/project/default.jpg";
?>
<?php
// Header
include './../../partials/header.php'
?>
<link rel="shortcut icon" href="./../../templates-user/images/user_icon.png" type="image/png">

<style>
    .project-detail {
        max-width: 800px;
        /* Lebih ramping */
        margin: 30px auto;
        padding: 15px;
        font-family: "Segoe UI", Tahoma, sans-serif;
        color: #333;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .project-title {
        font-size: 1.6rem;
        /* Lebih kecil */
        font-weight: 700;
        margin-bottom: 8px;
        text-align: center;
        line-height: 1.3;
        color: #222;
        position: relative;
    }

    .project-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #007bff, #00c6ff);
        margin: 8px auto 0;
        border-radius: 2px;
    }

    .project-meta {
        text-align: center;
        font-size: 0.9rem;
        color: #777;
        margin-bottom: 20px;
    }

    .project-cover {
        width: 100%;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .project-cover:hover {
        transform: scale(1.015);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .project-content {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #444;
        text-align: justify;
        padding: 0 5px;
    }

    .back-btn {
        display: inline-block;
        margin-top: 20px;
        background: linear-gradient(90deg, #6c757d, #495057);
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .back-btn:hover {
        background: linear-gradient(90deg, #5a6268, #343a40);
    }

    @media (max-width: 768px) {
        .project-detail {
            margin: 15px;
            padding: 12px;
        }

        .project-title {
            font-size: 1.4rem;
        }
    }
</style>

<section class="project-detail">
    <h2 class="project-title"><?= htmlspecialchars($row['title']) ?></h2>

    <div class="project-meta">
        <?= htmlspecialchars($row['job']) ?> &bullet; <?= htmlspecialchars($row['category']) ?>
    </div>

    <img src="<?= $imagePath ?>"
        alt="<?= htmlspecialchars($row['title']) ?>"
        class="project-cover"
        onerror="this.src='<?= $fallbackImage ?>'">

    <div class="project-content">
        <?= nl2br(htmlspecialchars($row['description'])) ?>
    </div>

    <div style="text-align: center;">
        <a href="list_project.php" class="back-btn">← Kembali ke Daftar Project</a>
    </div>
</section>