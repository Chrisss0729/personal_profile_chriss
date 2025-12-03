<?php
// Database connection
include dirname(__DIR__, 3) . "/config/koneksi.php";

$qProject = "SELECT * FROM projects ORDER BY id DESC";
$result = mysqli_query($connect, $qProject) or die(mysqli_error($connect));
?>
<?php
// Header
include './../../partials/header.php'
?>
<link rel="shortcut icon" href="./../../templates-user/images/user_icon.png" type="image/png">
<style>
    /* Main Container */
    .blog-listing {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Header */
    .listing-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
    }

    .section-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        border-radius: 2px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0.6rem 1.2rem;
        background: #f1f5f9;
        color: #334155;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }

    .back-btn:hover {
        background: #e2e8f0;
        transform: translateX(-4px);
    }

    /* Blog Grid */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 2rem;
    }

    /* Blog Card */
    .blog-card {
        border-radius: 12px;
        overflow: hidden;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f1f5f9;
    }

    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        border-color: #e2e8f0;
    }

    .blog-img-container {
        width: 100%;
        aspect-ratio: 1 / 1;
        /* Rasio 1:1 */
        overflow: hidden;
        position: relative;
    }

    .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Supaya tidak gepeng */
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-img {
        transform: scale(1.03);
    }

    /* Content */
    .blog-content {
        padding: 1.5rem;
    }

    .blog-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.75rem;
        text-decoration: none;
        display: block;
        transition: color 0.2s ease;
        line-height: 1.4;
    }

    .blog-title:hover {
        color: #3b82f6;
    }

    .blog-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 1rem;
    }

    .blog-meta span {
        width: 4px;
        height: 4px;
        background: #94a3b8;
        border-radius: 50%;
    }

    .blog-desc {
        color: #475569;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #3b82f6;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .read-more:hover {
        color: #2563eb;
        gap: 8px;
    }

    .read-more::after {
        content: '→';
        transition: transform 0.3s ease;
    }

    .read-more:hover::after {
        transform: translateX(3px);
    }

    /* No Blogs */
    .no-blogs {
        grid-column: 1 / -1;
        text-align: center;
        padding: 3rem;
        background: #f8fafc;
        border-radius: 12px;
        color: #64748b;
    }
</style>

<section class="blog-listing">
    <div class="listing-header">
        <h2 class="section-title">Daftar Project</h2>
        <a href="../../index.php#project-section" class="back-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
            Kembali ke Home
        </a>
    </div>

    <div class="blog-grid">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)):
                $imagePath = "../../../storages/project/" . $row['image'];
                $fallbackImage = "../../../storages/project/default.jpg";
            ?>
                <div class="blog-card">
                    <div class="blog-img-container">
                        <a href="detail_project.php?id=<?= $row['id'] ?>">
                            <img src="<?= $imagePath ?>"
                                alt="<?= htmlspecialchars($row['title']) ?>"
                                class="blog-img"
                                onerror="this.src='<?= $fallbackImage ?>'">
                        </a>
                    </div>

                    <div class="blog-content">
                        <a href="detail_project.php?id=<?= $row['id'] ?>" class="blog-title">
                            <?= htmlspecialchars($row['title']) ?>
                        </a>

                        <div class="blog-meta">
                            <?= htmlspecialchars($row['job']) ?>
                            <span></span>
                            <?= htmlspecialchars($row['category']) ?>
                        </div>

                        <p class="blog-desc">
                            <?= substr(strip_tags($row['description']), 0, 120) ?>...
                        </p>

                        <a href="detail_project.php?id=<?= $row['id'] ?>" class="read-more">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-blogs">
                <p>Tidak ada project tersedia saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</section>