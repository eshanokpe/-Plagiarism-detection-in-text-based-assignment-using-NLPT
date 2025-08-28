-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2025 at 10:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plagiarism_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `original_filename` varchar(255) DEFAULT NULL,
  `extracted_text` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `user_id`, `title`, `file_path`, `original_filename`, `extracted_text`, `created_at`, `updated_at`) VALUES
(1, 1, 'title', NULL, 'text_input_1756168919.txt', 'The plagiarism checking app using Python is a software application designed to help users check for plagiarism in any\r\ndocument or text file they upload to the system. It is particularly useful for academic institutions, research firms, and writers\r\nwho want to ensure that their work is original and free from any plagiarism.', '2025-08-25 23:42:05', '2025-08-25 23:42:05'),
(2, 1, 'title', NULL, 'text_input_1756169281.txt', 'The plagiarism checking app using Python is a software application designed to help users check for plagiarism in any\r\ndocument or text file they upload to the system. It is particularly useful for academic institutions, research firms, and writers\r\nwho want to ensure that their work is original and free from any plagiarism.', '2025-08-25 23:48:07', '2025-08-25 23:48:07'),
(3, 1, 'The plagiarism checking', NULL, 'text_input_1756171175.txt', 'The plagiarism checking app using Python is a software application designed to help users check for plagiarism in any\r\ndocument or text file they upload to the system. It is particularly useful for academic institutions, research firms, and writers\r\nwho want to ensure that their work is original and free from any plagiarism.', '2025-08-26 00:19:43', '2025-08-26 00:19:43'),
(4, 1, 'The plagiarism checking app', NULL, 'text_input_1756174368.txt', 'The plagiarism checking app using Python is a software application designed to help users check for plagiarism in any\r\ndocument or text file they upload to the system. It is particularly useful for academic institutions, research firms, and writers\r\nwho want to ensure that their work is original and free from any plagiarism.', '2025-08-26 01:12:54', '2025-08-26 01:12:54'),
(5, 1, 'The plagiarism checking app', NULL, 'text_input_1756174516.txt', 'The plagiarism checking app using Python is a software application designed to help users check for plagiarism in any\r\ndocument or text file they upload to the system. It is particularly useful for academic institutions, research firms, and writers\r\nwho want to ensure that their work is original and free from any plagiarism.', '2025-08-26 01:15:22', '2025-08-26 01:15:22'),
(6, 1, 'The plagiarism checking app', NULL, 'text_input_1756174544.txt', 'The plagiarism checking app using Python is a software application designed to help users check for plagiarism in any\r\ndocument or text file they upload to the system. It is particularly useful for academic institutions, research firms, and writers\r\nwho want to ensure that their work is original and free from any plagiarism.', '2025-08-26 01:15:50', '2025-08-26 01:15:50'),
(7, 1, 'The plagiarism checking app', NULL, 'text_input_1756174655.txt', 'The plagiarism checking app using Python is a software application designed to help users check for plagiarism in any\r\ndocument or text file they upload to the system. It is particularly useful for academic institutions, research firms, and writers\r\nwho want to ensure that their work is original and free from any plagiarism.', '2025-08-26 01:17:41', '2025-08-26 01:17:41'),
(8, 1, 'The plagiarism checking app', NULL, 'text_input_1756174734.txt', 'The plagiarism checking app using Python is a software application designed to help users check for plagiarism in any\r\ndocument or text file they upload to the system. It is particularly useful for academic institutions, research firms, and writers\r\nwho want to ensure that their work is original and free from any plagiarism.', '2025-08-26 01:19:00', '2025-08-26 01:19:00'),
(9, 1, 'The plagiarism checking app22', NULL, 'text_input_1756175142.txt', 'Abstract: Plagiarism  is  defined  as  to  take or  theft some  work  and present  it has  one’s  own  work.  This plagiarism checker  system is used to analyze  the plagiarism  data. Plagiarism affects the  education quality  of the  students and thereby  reduces the  economic  status of  the  country', '2025-08-26 01:25:48', '2025-08-26 01:25:48'),
(10, 1, 'The plagiarism checking app22', NULL, 'text_input_1756176149.txt', 'Abstract: Plagiarism  is  defined  as  to  take or  theft some  work  and present  it has  one’s  own  work.  This plagiarism checker  system is used to analyze  the plagiarism  data. Plagiarism affects the  education quality  of the  students and thereby  reduces the  economic  status of  the  country', '2025-08-26 01:42:34', '2025-08-26 01:42:34'),
(11, 1, 'The plagiarism checking app22', NULL, 'text_input_1756176278.txt', 'Abstract: Plagiarism  is  defined  as  to  take or  theft some  work  and present  it has  one’s  own  work.  This plagiarism checker  system is used to analyze  the plagiarism  data. Plagiarism affects the  education quality  of the  students and thereby  reduces the  economic  status of  the  country', '2025-08-26 01:44:44', '2025-08-26 01:44:44'),
(12, 1, 'The plagiarism checking app22', NULL, 'text_input_1756176308.txt', 'Abstract: Plagiarism  is  defined  as  to  take or  theft some  work  and present  it has  one’s  own  work.  This plagiarism checker  system is used to analyze  the plagiarism  data. Plagiarism affects the  education quality  of the  students and thereby  reduces the  economic  status of  the  country', '2025-08-26 01:45:13', '2025-08-26 01:45:13'),
(13, 1, 'The plagiarism checking app22', NULL, 'text_input_1756176798.txt', 'Abstract: Plagiarism  is  defined  as  to  take or  theft some  work  and present  it has  one’s  own  work.  This plagiarism checker  system is used to analyze  the plagiarism  data. Plagiarism affects the  education quality  of the  students and thereby  reduces the  economic  status of  the  country', '2025-08-26 01:53:28', '2025-08-26 01:53:28'),
(14, 1, 'Plagiarism is described', NULL, 'text_input_1756178375.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 02:19:42', '2025-08-26 02:19:42'),
(15, 1, 'Plagiarism is described', NULL, 'text_input_1756178430.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 02:20:36', '2025-08-26 02:20:36'),
(16, 1, 'Plagiarism is described', NULL, 'text_input_1756180757.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 02:59:27', '2025-08-26 02:59:27'),
(17, 1, 'Plagiarism is described', NULL, 'text_input_1756181041.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 03:04:07', '2025-08-26 03:04:07'),
(18, 1, 'Plagiarism is described', NULL, 'text_input_1756181071.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 03:04:37', '2025-08-26 03:04:37'),
(19, 1, 'Plagiarism is described', NULL, 'text_input_1756181099.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 03:05:05', '2025-08-26 03:05:05'),
(20, 1, 'Plagiarism is described', NULL, 'text_input_1756181579.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 03:13:06', '2025-08-26 03:13:06'),
(21, 1, 'Plagiarism is described', NULL, 'text_input_1756181813.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 03:17:00', '2025-08-26 03:17:00'),
(22, 1, 'Plagiarism is described', NULL, 'text_input_1756181871.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 03:17:56', '2025-08-26 03:17:56'),
(23, 1, 'Plagiarism is described', NULL, 'text_input_1756181974.txt', 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '2025-08-26 03:19:40', '2025-08-26 03:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lecturer Lecturer', 'lecturer@gmail.com', '$2y$12$iW39t/4SnVzG6Xy2O2soZO.O1IOpOU4JbX2SeuXKjGfNpmz0w8DKe', NULL, '2025-08-26 05:22:01', '2025-08-26 04:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_23_055829_add_role_to_users_table', 1),
(5, '2025_08_23_055931_create_assignments_table', 1),
(6, '2025_08_23_060005_create_reports_table', 1),
(7, '2025_08_23_133732_create_students_table', 1),
(8, '2025_08_23_181341_add_title_to_assignments_table', 1),
(9, '2025_08_23_182438_add_original_to_assignments_table', 1),
(10, '2025_08_26_025044_create_submissions_table', 2),
(11, '2025_08_26_031333_add_status_to_submissions_table', 3),
(12, '2025_08_26_050721_create_lecturers_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `similarity_score` double DEFAULT NULL,
  `result` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6fUP6FlZChI6IMnFRSaqo1BbhgdqUsLJ79jupTNX', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSk9DVXFYMjNEZzlvbExaa0xkMU1QR3RrbGt5enFTdmphMXlRQ1htYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo1NToibG9naW5fbGVjdHVyZXJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sZWN0dXJlci9kYXNoYm9hcmQiO319', 1756188219);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pasted_text` text DEFAULT NULL,
  `uploaded_file` varchar(255) DEFAULT NULL,
  `plagiarism_score` double DEFAULT NULL,
  `total_words` int(11) DEFAULT NULL,
  `plagiarized_words` int(11) DEFAULT NULL,
  `text_analysis` longtext DEFAULT NULL,
  `sources_found` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sources_found`)),
  `status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `user_id`, `pasted_text`, `uploaded_file`, `plagiarism_score`, `total_words`, `plagiarized_words`, `text_analysis`, `sources_found`, `status`, `created_at`, `updated_at`, `assignment_id`) VALUES
(1, 1, 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', NULL, 80, 0, 0, 'Plagiarism is described as taking or stealing someone else\'s work and presenting it asanalyzedwn. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', NULL, 'pending', '2025-08-26 03:10:56', '2025-08-26 03:10:56', 23),
(2, 1, 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', NULL, 100, 28, 28, 'Plagiarism is described as taking or stealing someone else\'s work and presenting it asanalyzedwn. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '[{\"title\":\"An Online Assignment Plagiarism Checker System\",\"url\":\"https:\\/\\/projectlist.com.ng\\/project-material-on-design-implementation-online-assignment-plagiarism-checker-system\"},{\"title\":\"ONLINE ASSIGNMENT PLAGIARISM CHECKER - ResearchGate\",\"url\":\"https:\\/\\/www.researchgate.net\\/publication\\/381835832_ONLINE_ASSIGNMENT_PLAGIARISM_CHECKER\\/fulltext\\/66815751f3b61c4e2c9e6007\\/ONLINE-ASSIGNMENT-PLAGIARISM-CHECKER.pdf\"},{\"title\":\"[PDF] ONLINE ASSIGNMENT PLAGIARISM CHECKER USING ... - ijarcce\",\"url\":\"https:\\/\\/ijarcce.com\\/wp-content\\/uploads\\/2022\\/05\\/IJARCCE.2022.114158.pdf\"},{\"title\":\"(PDF) ONLINE ASSIGNMENT PLAGIARISM CHECKER\",\"url\":\"https:\\/\\/www.researchgate.net\\/publication\\/381835832_ONLINE_ASSIGNMENT_PLAGIARISM_CHECKER\"}]', 'pending', '2025-08-26 03:20:05', '2025-08-26 03:20:05', 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'dannycode', 'eshanokpe@gmail.com', NULL, '$2y$12$/X3KuiC8evBhH9VI0FS.zuscAoF/l4pWMJ6ejU70OlivkstO2.7M2', 'plp6nQSeUMru2g62V36RFYDzU6K6biCr9u845HVcobddzf3Ur9o1c838yzU7', '2025-08-25 23:10:32', '2025-08-25 23:10:32', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lecturers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_assignment_id_foreign` (`assignment_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
