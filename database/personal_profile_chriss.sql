-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2025 at 08:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_profile_chriss`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `born` date DEFAULT NULL,
  `address` text,
  `zip_code` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `total_project` int DEFAULT '0',
  `work` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `born`, `address`, `zip_code`, `email`, `phone`, `total_project`, `work`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Charisda Rizky', '2007-08-29', 'Kweni Rt.07, Panggungharjo, Sewon, Bantul', '55188', 'rizkycharisda@gmail.com', '087789554055', 5, 'Web Development', 'Saya adalah siswa SMK yang sedang menempuh praktik kerja lapangan (PKL) di PT. Lauwba Techo Indonesia. Aktif dalam pengembangan web dan berwirausaha kecil sebagai bentuk kemandirian.', '1764792626.png', '2025-12-03 19:44:43', '2025-12-03 20:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `author` varchar(255) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `date`, `author`, `tittle`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2025-07-15', 'Charisda Rizky', 'Awal Mula PHP', 'PHP pertama kali dibuat tahun 1994 oleh Rasmus Lerdorf. Awalnya merupakan kependekan dari \"Personal Home Page\", tetapi sekarang bermakna \"PHP: Hypertext Preprocessor\".', '1764793468.png', '2025-12-03 19:44:43', '2025-12-03 20:24:28'),
(2, '2025-08-01', 'Charisda Rizky', 'Tentang Php', 'PHP (Hypertext Preprocessor) adalah bahasa pemrograman open-source yang dirancang khusus untuk pengembangan web. Berbeda dengan JavaScript yang berjalan di browser, PHP dijalankan di server, menghasilkan konten dinamis sebelum dikirim ke pengguna.', '1764793555.png', '2025-12-03 19:44:43', '2025-12-03 20:25:55'),
(3, '2025-08-15', 'Charisda Rizky', 'Sintaks yang Mudah', 'PHP terkenal dengan sintaks yang relatif mudah dipelajari, terutama untuk pemula. Embedding code PHP dalam HTML membuat proses development menjadi lebih intuitif.', '1764793588.png', '2025-12-03 19:44:43', '2025-12-03 20:26:28'),
(5, '2025-10-13', 'Charisda Rizky', 'Versi Modern PHP 8.x', 'PHP terus berkembang! Versi terbaru (PHP 8.x) menawarkan performa lebih cepat, fitur JIT compiler, dan banyak improvement lainnya dibanding versi lawas.', '1764793677.png', '2025-12-03 19:51:26', '2025-12-03 20:27:57'),
(6, '2025-11-02', 'Charisda Rizky', 'Framework Populer', 'Memiliki banyak framework powerful seperti Laravel, Js, Symfony, dan CodeIgniter yang mempercepat pengembangan aplikasi web yang kompleks dan aman.', '1764793740.png', '2025-12-03 19:52:25', '2025-12-03 20:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `job` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `job`, `category`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Toko Campuran', 'PKL di PT Lauwba Techo Indonesia', 'Web Development', 'Pengembangan web gallery untuk menampilkan kumpulan foto dan gambar', '1764794009_Screenshot 2025-12-04 033311.png', '2025-12-03 19:44:43', '2025-12-03 20:33:29'),
(3, 'Portofolio', 'PKL di PT Lauwba Techo Indonesia', 'Web Development', 'Website portofolio pribadi untuk menampilkan karya dan pengalaman', '1764794059_Screenshot 2025-12-04 033404.png', '2025-12-03 19:44:43', '2025-12-03 20:34:19'),
(5, 'Website Cuci.in', 'PKL di PT Lauwba Techo Indonesia', 'Web Development', 'Membuat website toko online sederhana untuk UMKM lokal', '1764794121_Screenshot 2025-12-04 033503.png', '2025-12-03 19:44:43', '2025-12-03 20:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int NOT NULL,
  `date` varchar(100) NOT NULL,
  `job` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `description` text,
  `type` enum('education','experience') DEFAULT 'experience',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `date`, `job`, `place`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, '2023 - 2026', 'SMKN 1 Sanden', 'Rekayasa Perangkat Lunak', 'Saya Charisda RIzky Siswa SMK Negeri 1 Sanden, Jurusan Rekayasa Perangkat Lunak (RPL). Selama menempuh pendidikan di SMK, saya aktif dalam mengikuti mata pelajaran produktif di bidang kejuruan. Dan di luar kegiatan sekolah, saya juga berjualan kopi, sebagai bentuk kemandirian dan jiwa kewirausahaan', 'education', '2025-12-03 19:44:43', '2025-12-04 08:55:04'),
(2, '2025', 'PT.Lauwba techno Indonesia', 'Praktik Kerja Lapangan', 'Selama menjalani Praktik Kerja Lapangan (PKL) di PT Lauwba Techno Indonesia, saya mempelajari dan mengembangkan keterampilan dalam teknologi web, khususnya di bidang HTML, CSS, Bootstrap, serta pemrograman back-end menggunakan PHP. Selain itu, saya juga mempelajari konsep dan implementasi CRUD (Create, Read, Update, Delete) dalam pengelolaan data berbasis web.', 'experience', '2025-12-03 19:44:43', '2025-12-03 19:44:43'),
(3, '2020', 'Rekayasa Perangkat Lunak', 'Yogyakarta', 'Pengalaman dan pendidikan di bidang Rekayasa Perangkat Lunak', 'education', '2025-12-03 19:44:43', '2025-12-03 20:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `icon` varchar(100) NOT NULL,
  `job` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `job`, `description`, `created_at`, `updated_at`) VALUES
(1, 'fas fa-code', 'Web Dev', 'Pengembangan website dinamis dan aplikasi web dengan teknologi terbaru seperti HTML, CSS, JavaScript, serta framework seperti Laravel atau React.', '2025-12-03 19:44:43', '2025-12-03 20:30:24'),
(2, 'fas fa-paint-brush', 'Design Grafis', 'Membuat desain visual menarik untuk kebutuhan digital seperti media sosial, website, serta materi cetak seperti brosur dan banner.\r\n\r\n', '2025-12-03 19:44:43', '2025-12-03 20:30:38'),
(3, 'fas fa-pen-nib', 'Content Creator', 'Menghasilkan konten tulisan kreatif, artikel informatif, dan materi konten menarik untuk website, blog, atau media sosial.', '2025-12-03 19:44:43', '2025-12-03 20:30:57'),
(4, 'fas fa-laptop-code', 'Web Maintenance', 'Melakukan perawatan berkala pada website, termasuk update konten, keamanan, backup, dan perbaikan bug untuk menjaga performa optimal.', '2025-12-03 19:44:43', '2025-12-03 20:31:09'),
(6, 'fas fa-chart-bar', 'Analytics & Reporting', 'Menganalisis data pengunjung dan performa website, lalu menyajikannya dalam laporan visual untuk membantu pengambilan keputusan strategis.', '2025-12-03 19:44:43', '2025-12-03 20:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill` varchar(100) NOT NULL,
  `percent` int DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `percent`, `description`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 80, 'Sudah menguasai dasar-dasar HTML dan beshasil Membuat  Web portofolio', '2025-12-03 19:44:43', '2025-12-03 20:20:44'),
(2, 'BOOTSTRAP', 75, 'Sudah paham dasar-dasarnya', '2025-12-03 19:44:43', '2025-12-03 19:44:43'),
(3, 'PHP', 83, 'Mampu dalam dasar - dasar PHP', '2025-12-03 19:44:43', '2025-12-03 20:20:21'),
(4, 'CSS', 70, 'Menguasai styling dasar dan layouting dengan CSS', '2025-12-03 19:44:43', '2025-12-03 19:44:43'),
(5, 'JavaScript', 50, 'Belajar dasar-dasar JavaScript dan DOM manipulation', '2025-12-03 19:44:43', '2025-12-03 19:44:43'),
(6, 'MySQL', 60, 'Pemahaman dasar database dan query SQL', '2025-12-03 19:44:43', '2025-12-03 19:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `sosmeds`
--

CREATE TABLE `sosmeds` (
  `id` int NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sosmeds`
--

INSERT INTO `sosmeds` (`id`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-instagram', 'https://www.instagram.com/chrissdaaa_/', '2025-12-03 19:44:43', '2025-12-03 20:19:52'),
(4, 'fab fa-github', 'https://github.com/Chrisss0729', '2025-12-03 19:44:43', '2025-12-03 20:12:37'),
(5, 'fab fa-whatsapp', 'https://wa.me/6287789554055', '2025-12-03 19:44:43', '2025-12-03 20:11:46'),
(6, 'fab fa-tiktok', 'https://www.tiktok.com/@chrissbukankriss', '2025-12-03 19:44:43', '2025-12-03 20:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(4, 'admin', 'rizkycharisda@gmail.com', '$2y$10$/eOYVFDlhRmOpK2amf99leuCyiSaSwZVolmjyHgl9WKgizEFexYJ6', '2025-12-03 20:44:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_blogs_date` (`date`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_contacts_is_read` (`is_read`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_projects_category` (`category`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_resumes_type` (`type`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosmeds`
--
ALTER TABLE `sosmeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_users_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sosmeds`
--
ALTER TABLE `sosmeds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
