<?php
include "../../../config/koneksi.php";

if (!isset($_GET['id'])) {
    die("Blog ID tidak ditemukan.");
}

$id = intval($_GET['id']);
$qBlog = "SELECT * FROM blogs WHERE id = $id";
$result = mysqli_query($connect, $qBlog) or die(mysqli_error($connect));

if (mysqli_num_rows($result) == 0) {
    die("Blog tidak ditemukan.");
}

$row = mysqli_fetch_assoc($result);
$imagePath = "../../../storages/blog/" . $row['image'];
$fallbackImage = "../../../storages/blog/default.jpg";
?>
<?php
// Header
include './../../partials/header.php'
?>
<link rel="shortcut icon" href="./../../templates-user/images/user_icon.png" type="image/png">

<style>
    .blog-detail {
        max-width: 800px;
        /* lebih kecil */
        margin: 30px auto;
        padding: 15px;
        font-family: "Segoe UI", Tahoma, sans-serif;
        color: #333;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .blog-title {
        font-size: 1.6rem;
        /* lebih kecil */
        font-weight: 700;
        margin-bottom: 10px;
        text-align: center;
        line-height: 1.3;
        position: relative;
    }

    .blog-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #007bff, #00c6ff);
        margin: 8px auto 0;
        border-radius: 2px;
    }

    .blog-meta {
        text-align: center;
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 20px;
    }

    .blog-cover {
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
        display: block;
    }

    .blog-content {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #444;
        text-align: justify;
    }

    .back-btn {
        display: inline-block;
        margin-top: 20px;
        background: #6c757d;
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .back-btn:hover {
        background: #5a6268;
    }

    @media (max-width: 400px) {
        .project-detail {
            margin: 15px;
            padding: 12px;
        }

        .project-title {
            font-size: 1.4rem;
        }
    }
</style>


<section class="blog-detail">
    <h2 class="blog-title"><?= htmlspecialchars($row['tittle']) ?></h2>

    <div class="blog-meta">
        <h2>
            <?= htmlspecialchars($row['author']) ?> &bullet; <?= date("M d, Y", strtotime($row['date'])) ?>
        </h2>
    </div>

    <img src="<?= $imagePath ?>"
        alt="<?= htmlspecialchars($row['tittle']) ?>"
        class="blog-cover"
        onerror="this.src='<?= $fallbackImage ?>'">

    <div class="blog-content">
        <?= nl2br(htmlspecialchars($row['description'])) ?>
    </div>

    <a href="list_blog.php" class="back-btn">← Kembali ke Daftar Blog</a>
</section>