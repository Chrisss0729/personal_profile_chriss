<?php
include "../config/koneksi.php";

// Ambil data about
$qAbout = "SELECT * FROM abouts LIMIT 1";
$resultAbout = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
$about = mysqli_fetch_assoc($resultAbout);

// Ambil data resumes
$qResumes = "SELECT * FROM resumes ORDER BY date DESC";
$resultResumes = mysqli_query($connect, $qResumes) or die(mysqli_error($connect));

// Array untuk simpan pendidikan terakhir & pengalaman
$educationItems = [];
$experienceItems = [];

while ($row = mysqli_fetch_assoc($resultResumes)) {
    $jobLower = strtolower(trim($row['job']));
    if ($jobLower === 'education' || $jobLower === 'pendidikan terakhir') {
        $educationItems[] = $row;
    } else {
        $experienceItems[] = $row;
    }
}
?>
<?php $page = 'resume'; ?>

<!-- Resume -->
<section class="site-section border-bottom bg-light" id="resume-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Resume</h2>
            </div>
        </div>
        <div class="row">
            <!-- Bagian kiri -->
            <div class="col-md-6" data-aos="fade-up">
                <!-- Summary -->
                <h3 class="resume-title">Summary</h3>
                <div class="resume-item">
                    <p><em><?= $about['description'] ?></em></p>
                    <ul>
                        <li><?= $about['address'] ?></li>
                        <li><?= $about['phone'] ?></li>
                        <li><?= $about['email'] ?></li>
                    </ul>
                </div>

                <!-- Pendidikan Terakhir -->
                <?php if (!empty($educationItems)): ?>
                    <h3 class="resume-title">Edukasi</h3>
                    <?php foreach ($educationItems as $edu): ?>
                        <div class="resume-item">
                            <h4><?= $edu['place'] ?></h4>
                            <h5><?= $edu['date'] ?></h5>
                            <p><em><?= $edu['job'] ?></em></p>
                            <p><?= $edu['description'] ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Bagian kanan -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="resume-title">Experience</h3>
                <?php foreach ($experienceItems as $exp): ?>
                    <div class="resume-item">
                        <h4><?= $exp['job'] ?></h4>
                        <h5><?= $exp['date'] ?></h5>
                        <p><em><?= $exp['place'] ?></em></p>
                        <p><?= $exp['description'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<style>
    .resume-item {
        margin-bottom: 30px;
    }

    .resume-item h4 {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .resume-item h5 {
        font-size: 16px;
        color: #6c757d;
        margin-bottom: 10px;
    }

    .resume-item ul {
        padding-left: 20px;
    }

    .resume-item ul li {
        margin-bottom: 5px;
    }

    /* Garis pembatas hanya untuk kolom Experience */
    .col-md-6[data-aos-delay="100"] .resume-item {
        padding-bottom: 20px;
        border-bottom: 2px solid #007bff;
    }

    /* Hilangkan garis di item terakhir */
    .col-md-6[data-aos-delay="100"] .resume-item:last-child {
        border-bottom: none;
    }

    .resume-title {
        color: #343a40;
        font-size: 26px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #007bff;
    }

    .col-md-6 {
        display: flex;
        flex-direction: column;
    }

    .resume-item {
        margin-bottom: 30px;
    }

    /* Biar garis sejajar di tengah */
    .row {
        display: flex;
        align-items: flex-start;
    }


    .row>.col-md-6:last-child {
        border-right: none;
    }

    @media (min-width: 768px) {

        /* Samakan tinggi garis di kedua kolom */
        .col-md-6 .resume-title {
            margin-top: 0;
            /* hapus jarak atas */
        }
    }
</style>
<!-- End Resume -->