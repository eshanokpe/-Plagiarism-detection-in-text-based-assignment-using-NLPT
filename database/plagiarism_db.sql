-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2025 at 03:30 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2025-08-28 06:45:15', '$2y$12$KC.Rghn1QmJMffn3suMKVuzhopzHMaWqTPMEfLVXToGfsDQxRoh1K', NULL, '2025-08-28 04:23:48', '2025-08-28 05:50:18');

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
(1, 1, 'check11', NULL, 'text_input_1756203596.txt', '', '2025-08-26 09:20:08', '2025-08-26 09:20:08'),
(2, 1, 'eccc', NULL, 'text_input_1756204712.txt', 'The plagiarism checking app using Python is a unique and useful tool that has significant advantages over other\r\nplagiarism checkers available in the market. The traditional plagiarism checkers are often complicated and difficult to use,\r\nmaking it challenging for users to check plagiarism without the proper technical skills. However, the plagiarism checking app\r\nusing P', '2025-08-26 09:38:40', '2025-08-26 09:38:40'),
(3, 1, 'eccc', NULL, 'text_input_1756204828.txt', 'The plagiarism checking app using Python is a unique and useful tool that has significant advantages over other\r\nplagiarism checkers available in the market. The traditional plagiarism checkers are often complicated and difficult to use,\r\nmaking it challenging for users to check plagiarism without the proper technical skills. However, the plagiarism checking app\r\nusing P', '2025-08-26 09:40:35', '2025-08-26 09:40:35'),
(4, 1, 'Assignment for Reach writing', NULL, 'text_input_1756211515.txt', 'Nowadays, plagiarism became very common in many fields of life, such as research and educational fields. Due to the advancement in plagiarism techniques\r\nadopted by plagiarists, it is challenging to detect plagiarism accurately by the existing techniques.\r\nDifferent features are observed while checking plagiarism, such as syntactic, lexical, semantic, and structural features.', '2025-08-26 11:32:00', '2025-08-26 11:32:00'),
(5, 1, 'texting', NULL, 'text_input_1756372537.txt', '1.1 How can one define a ‘democratic election procedure’ in the light of proposals to\r\nintroduce Remote Voting by Electronic Means (RVEM)? Are there any general\r\ncharacteristics of an election procedure which define it as democratic?', '2025-08-28 08:15:42', '2025-08-28 08:15:42'),
(6, 1, 'tsss', NULL, 'text_input_1756372565.txt', 'Furthermore there may be arguments about the basis of representation; there may be\r\narguments about the size and shape of electoral divisions', '2025-08-28 08:16:07', '2025-08-28 08:16:07'),
(7, 1, 'ddd', NULL, 'text_input_1756372778.txt', 'Education is the most powerful weapon which you can use to change the world. If someone includes this quote in an essay or article without crediting Nelson Mandela, it would be considered plagiarism, even though it\'s a widely known phrase.', '2025-08-28 08:19:44', '2025-08-28 08:19:44'),
(8, 1, 'test', NULL, 'text_input_1756372825.txt', 'Climate change refers to long-term alterations in temperature, precipitation, wind patterns, and other elements of the Earth\'s climate system. It is primarily driven by human activities, especially the burning of fossil fuels, which increases the concentration of greenhouse gases in the atmosphere. These gases trap heat and cause global temperatures to rise, resulting in more frequent extreme weather events, rising sea levels, and melting glaciers.', '2025-08-28 08:20:37', '2025-08-28 08:20:37'),
(9, 1, 'check', 'assignments/Jy3XTL4q1KUpIvYoKNC9fXRfZ1NCaWyEmZlMvtxR.pdf', 'Plagiarism check Test.pdf', 'Climate change refers to long-term alterations in temperature, precipitation, wind patterns, \nand other elements of the Earth\'s climate system. It is primarily driven by human activities, \nespecially the burning of fossil fuels, which increases the concentration of greenhouse gases \nin the atmosphere. These gases trap heat and cause global temperatures to rise, resulting in \nmore frequent extreme weather events, rising sea levels, and melting glaciers.', '2025-08-28 08:31:55', '2025-08-28 08:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `seat_number` int(11) NOT NULL,
  `status` enum('reserved','cancelled','confirmed') NOT NULL DEFAULT 'reserved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Lecturer Lecturer', 'lecturer@gmail.com', '$2y$12$iW39t/4SnVzG6Xy2O2soZO.O1IOpOU4JbX2SeuXKjGfNpmz0w8DKe', NULL, '2025-08-26 05:22:01', '2025-08-26 04:35:03'),
(2, 'Alfreda Waters', 'soxelyvad@mailinator.com', '$2y$12$IqUwmn4UDsRUbmM2eISEJuzqVfzQ2ZIwcQMRE9i6zieSkcF8YPPlm', NULL, '2025-08-28 07:10:22', '2025-08-28 07:10:22');

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
(12, '2025_08_26_050721_create_lecturers_table', 4),
(13, '2025_08_26_104125_add_title_to_submissions_table', 5),
(14, '2025_08_27_202941_create_buses_table', 6),
(15, '2025_08_27_203201_create_bookings_table', 7),
(16, '2025_08_27_203228_create_payments_table', 7),
(17, '2025_08_27_203726_create_routes_table', 8),
(18, '2025_08_28_051713_create_admins_table', 9),
(19, '2025_08_28_075750_create_recent_activities_table', 10);

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
-- Table structure for table `recent_activities`
--

CREATE TABLE `recent_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recent_activities`
--

INSERT INTO `recent_activities` (`id`, `user_type`, `user_id`, `action`, `description`, `created_at`, `updated_at`) VALUES
(1, 'lecturer', 2, 'Logged In', 'soxelyvad@mailinator.com logged in.', '2025-08-28 07:10:22', '2025-08-28 07:10:22'),
(2, 'user', 1, 'Submitted Assignment', 'eshanokpe@gmail.com submitted an assignment.', '2025-08-28 08:33:07', '2025-08-28 08:33:07');

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
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
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
('7ncpcHz62Rb0vgE4bVjMmGOzqyMYgqK93vxhCGwV', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMHV4NGJHRTdnTWdRWjg5cW1IalJBdVJlYUlNMzNqQWVqczNDZGVVYiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1756377364),
('nDBBnjenTZ6LmOQ1I2yVC6hGdVYkOdwIjw8nIpmL', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieno4dm95anV3cUpZTWpSMm5tUlM3em51TkdOVHVxM1dsYkdBV29TZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMi9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTYzNzI0MDk7fX0=', 1756374198),
('p6Hwkrf2t4ukXSENnsjybYuvYotztzZN00UR60nK', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicVBraVkwdkw3V0xjanA4SVBLZG9XMVJTSDg4dW9WYnpwYUZzdU9SeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2xvZ2luIjt9fQ==', 1756363785);

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
  `title` varchar(255) NOT NULL,
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
  `assignment_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `title`, `user_id`, `pasted_text`, `uploaded_file`, `plagiarism_score`, `total_words`, `plagiarized_words`, `text_analysis`, `sources_found`, `status`, `created_at`, `updated_at`, `assignment_id`) VALUES
(2, 'Plagiarism is described', 1, 'Plagiarism is described as taking or stealing someone else\'s work and presenting it as one\'s own. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', NULL, 100, 28, 28, 'Plagiarism is described as taking or stealing someone else\'s work and presenting it asanalyzedwn. The plagiarism data is analyzed using  this grammar  and plagiarism  checker system.', '[{\"title\":\"An Online Assignment Plagiarism Checker System\",\"url\":\"https:\\/\\/projectlist.com.ng\\/project-material-on-design-implementation-online-assignment-plagiarism-checker-system\"},{\"title\":\"ONLINE ASSIGNMENT PLAGIARISM CHECKER - ResearchGate\",\"url\":\"https:\\/\\/www.researchgate.net\\/publication\\/381835832_ONLINE_ASSIGNMENT_PLAGIARISM_CHECKER\\/fulltext\\/66815751f3b61c4e2c9e6007\\/ONLINE-ASSIGNMENT-PLAGIARISM-CHECKER.pdf\"},{\"title\":\"[PDF] ONLINE ASSIGNMENT PLAGIARISM CHECKER USING ... - ijarcce\",\"url\":\"https:\\/\\/ijarcce.com\\/wp-content\\/uploads\\/2022\\/05\\/IJARCCE.2022.114158.pdf\"},{\"title\":\"(PDF) ONLINE ASSIGNMENT PLAGIARISM CHECKER\",\"url\":\"https:\\/\\/www.researchgate.net\\/publication\\/381835832_ONLINE_ASSIGNMENT_PLAGIARISM_CHECKER\"}]', 'pending', '2025-08-26 03:20:05', '2025-08-26 03:20:05', 22),
(3, 'Attendance', 1, 'To achieve this, the application uses a combination of different technologies and libraries, including Selenium,\r\nBeautifulSoup, and Docx. Selenium is used to automate web browsers, while BeautifulSoup is used to parse HTML code and\r\nextract relevant information. Docx is used to convert the document to a compatible format for comparison with the Turnitin\r\nplagiarism checker', NULL, 70, 55, 0, 'To achieve this, the application uses a combination of different technologies and libraries, including Selenium,\r\nBeautifulSoup, and Docx. Selenium is used to automate web browsers, while BeautifulSoup is used to parse HTML code and\r\nextract relevant information. Docx is used to convert the document to a compatible format for comparison with the Turnitin\r\nplagiarism checker', '[{\"title\":\"[PDF] Plagiarism Checker - Governors State University\",\"url\":\"https:\\/\\/opus.govst.edu\\/cgi\\/viewcontent.cgi?article=1617&context=capstones\"}]', 'pending', '2025-08-26 09:25:20', '2025-08-26 09:25:20', NULL),
(5, 'check', 1, 'Climate change refers to long-term alterations in temperature, precipitation, wind patterns, \r\nand other elements of the Earth\'s climate system. It is primarily driven by human activities, \r\nespecially the burning of fossil fuels, which increases the concentration of greenhouse gases \r\nin the atmosphere. These gases trap heat and cause global temperatures to rise, resulting in \r\nmore frequent extreme weather events, rising sea levels, and melting glaciers.', NULL, 70, 66, 46, 'Climate change refers to long-term alterations in temperature, precipitation, wind patterns, \r\nand other elements of the Earth\'s climate systeactivitiesrimarily driven by human activities, \r\nespecially the burning of fossil fuels, which increases the concentration of greenhouse gases \r\nin the atmosphere. These gases trap heat and cause global temperatures to rise, resulting in \r\nmore frequent extreme weather events, rising sea levels, and melting glaciers.', '[{\"title\":\"The Impact of Climate Change on Public Health\",\"url\":\"https:\\/\\/www.drberrypierre.com\\/the-impact-of-climate-change-on-public-health\\/\"},{\"title\":\"Averting Climate CatastropheA Global Call for Urgent Action | TaxTMI\",\"url\":\"https:\\/\\/www.taxtmi.com\\/article\\/detailed?id=14207\"},{\"title\":\"How Climate Change Affects the Earth and Humanity | Sunday Agada posted on the topic | LinkedIn\",\"url\":\"https:\\/\\/www.linkedin.com\\/posts\\/sunday-agada-7a7706311_climate-change-refers-to-long-term-alterations-activity-7354360571007299584-7V6V\"},{\"title\":\"Climate Change and Sustainability: A Global Imperative\",\"url\":\"https:\\/\\/medium.com\\/@kerimkkara\\/climate-change-and-sustainability-a-global-imperative-75c65f94d4ff\"},{\"title\":\"Climate Change and Green House Effect 10th Grade Flashcard | Wayground\",\"url\":\"https:\\/\\/wayground.com\\/admin\\/flashcard\\/675c38646faf4b009c55accb\\/climate-change-and-green-house-effect\"},{\"title\":\"Climate Change - (AP US History) - Vocab, Definition, Explanations\",\"url\":\"https:\\/\\/library.fiveable.me\\/key-terms\\/apush\\/climate-change\"},{\"title\":\"Climate change - (Intro to Contemporary Literature) - Fiveable\",\"url\":\"https:\\/\\/library.fiveable.me\\/key-terms\\/introduction-contemporary-literature\\/climate-change\"},{\"title\":\"Comprehensive Study Guide on Climate Change - Raena AI\",\"url\":\"https:\\/\\/app.raena.ai\\/summary\\/fhvbfp76lq\\/understanding-climate-change\"},{\"title\":\"How Science Explains Climate Change - MaRINET2\",\"url\":\"http:\\/\\/www.marinet2.eu\\/how-science-explains-climate-change\"},{\"title\":\"Climate Change: A Threat to Global Health by Victoria sein on Prezi\",\"url\":\"https:\\/\\/prezi.com\\/p\\/f5qpff-hy4r8\\/climate-change-a-threat-to-global-health\\/\"}]', 'pending', '2025-08-28 08:33:07', '2025-08-28 08:33:07', NULL);

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
(1, 'dannycode', 'eshanokpe@gmail.com', NULL, '$2y$12$/X3KuiC8evBhH9VI0FS.zuscAoF/l4pWMJ6ejU70OlivkstO2.7M2', 'TxlzQpPjNM7CqyVOcPN7b2pSo27GJ5Ak2Qu72aYKumO4OKLwCEnNITxXPwGM', '2025-08-25 23:10:32', '2025-08-25 23:10:32', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_user_id_foreign` (`user_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_schedule_id_seat_number_unique` (`schedule_id`,`seat_number`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `recent_activities`
--
ALTER TABLE `recent_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_assignment_id_foreign` (`assignment_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_bus_id_foreign` (`bus_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `recent_activities`
--
ALTER TABLE `recent_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
