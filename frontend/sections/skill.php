<!-- Skill Section -->
<?php $page = 'skill'; ?>
<section class="site-section border-bottom bg-light" id="skill-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Skills</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <?php
                // Include database connection
                require_once __DIR__ . '/../../config/koneksi.php';

                // Fetch skills from database
                $query = "SELECT * FROM skills ORDER BY id";
                $result = mysqli_query($connect, $query);

                $allSkills = [];

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($skill = mysqli_fetch_assoc($result)) {
                        $allSkills[] = $skill;
                    }
                } else {
                    // Fallback data jika database kosong
                    $allSkills = [
                        ['skill' => 'HTML', 'percent' => 87, 'description' => 'Semantic HTML5 markup'],
                        ['skill' => 'PHP', 'percent' => 82, 'description' => 'Laravel framework'],
                        ['skill' => 'Dart', 'percent' => 80, 'description' => 'Flutter app development'],
                        ['skill' => 'CSS', 'percent' => 77, 'description' => 'Modern CSS3 features'],
                        ['skill' => 'API', 'percent' => 78, 'description' => 'RESTful APIs integration']
                    ];
                }
                ?>

                <div class="skills-list">
                    <?php foreach ($allSkills as $index => $skill): ?>
                        <div class="skill-item" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                            <h3><?= htmlspecialchars($skill['skill']) ?></h3>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: <?= $skill['percent'] ?>%"
                                    aria-valuenow="<?= $skill['percent'] ?>"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <?= $skill['percent'] ?>%
                                </div>
                            </div>
                            <small class="skill-desc"><?= htmlspecialchars($skill['description']) ?></small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .skills-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .skill-item {
        padding: 20px;
        border: 1px solid #000000ff;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .skill-item h3 {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .progress {
        height: 22px;
        background-color: #f1f3f5;
        border-radius: 4px;
        margin-top: 8px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        background-color: #007bff;
        border-radius: 4px;
        color: white;
        font-size: 13px;
        line-height: 22px;
        padding-left: 12px;
        font-weight: 500;
        transition: width 1s ease-in-out;
    }

    .skill-desc {
        display: inline-block;
        color: #000;
        opacity: 0;
        transform: translateY(10px);
        animation: fadeSlideUp 0.6s ease forwards;
        animation-delay: 0.3s;
        margin-top: 8px;
    }

    @keyframes fadeSlideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>