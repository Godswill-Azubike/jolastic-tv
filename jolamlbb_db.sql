-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2020 at 11:43 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jolamlbb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Supper Admin', 'admin@email.com', '$2y$10$w36CR5HvT8LQkoRZQs1FdOMnG5VADXcRnwLnTeFUlenSMClIwMk1q', 1, '2020-08-17 08:23:26', NULL),
(2, 'Mr_Jolastic', 'support@jolastictv.com', '$2y$10$JOqP6wIsD4nTD3pJmy0/.O1zSKy2L5UsrI5hCyjNoFktbIQBYA8/q', 1, '2020-08-20 08:46:25', '2020-08-20 08:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ads` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_08_05_205552_create_admins_table', 1),
(10, '2020_08_15_104317_create_movies_table', 1),
(11, '2020_08_18_142705_create_adverts_table', 2),
(12, '2020_08_18_143226_create_page_visits_table', 2),
(13, '2020_08_18_143354_create_wallpapers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `m_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ytb_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `m_name`, `m_size`, `d_link`, `ytb_link`, `category`, `overview`, `photo`, `created_at`, `updated_at`) VALUES
(8, 'Justice League: Throne of Atlantis', '166', 'http://rgbvxkfmceacwldwqif.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/950b25c4104d424c7ccd974021ac07f0/32d8158bfabca1a181e5c560050454d7/Justice_League_Throne_of_Atlantis_(2015)_WEB-DL_high_(fzmovies.net)_f3545b431131a8d42ed496e3c416ce78.mp4', 'https://www.youtube.com/embed/donPLB1xaBw', 'Animation Movies', 'Aquaman (Matt Lanter) is forced to choose between the Justice League and Atlantis when Atlantean warriors invade Gotham City and Metropolis.', 'movies/Justice League: Throne of Atlantis86108388.jpeg', '2020-08-21 17:44:44', '2020-08-22 00:07:13'),
(9, 'Mythica The Iron Crown', '225', 'http://wixmxpvyftnkxmzgamn.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/950b25c4104d424c7ccd974021ac07f0/a3077d723c196b500de2b4de4458490a/Mythica_The_Iron_Crown_(2016)_BluRay_high_(fzmovies.net)_011f98558d8e35357f25998479148be8.mp4', 'https://www.youtube.com/embed/2uU_EoIj3tw?start=2', 'Foregin Movies', 'A daring young wizard (Melanie Stone) obtains the final piece of the all-powerful Darkspore and does whatever she can to keep it out of an evil necromancer\'s grasp.', 'movies/Mythica The Iron Crown49025290.jpeg', '2020-08-21 17:57:41', '2020-08-22 00:04:04'),
(10, 'Avengers - Endgame', '439', 'http://ekpofnvescklrmvrbdw.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/614774a84bca32182e1b81d831542d9a/708dbde1f76bec5e9c3f8be769b8cda4/Avengers_-_Endgame_(2019)_BRRip_high_(fzmovies.net)_788071b675714ed7c23107259e57ce2e.mp4', 'https://youtu.be/TcMBFSGVi1c', 'Foregin Movies', 'After Thanos, an intergalactic warlord, disintegrates half of the universe, the Avengers must reunite and assemble again to reinvigorate their trounced allies and restore balance.', 'movies/Avengers - Endgame15860658.jpeg', '2020-08-22 07:22:26', '2020-08-22 07:22:26'),
(11, 'Godzilla King of the Monsters', '319', 'http://lghjmxfwceqougyivbt.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/950b25c4104d424c7ccd974021ac07f0/268c3c325e457a96563b27de428ce8a2/Godzilla_King_of_the_Monsters_(2019)_BRRip_high_(fzmovies.net)_f31a478a7b8f46e255592986c0d06c0b.mp4', 'https://youtu.be/wVDtmouV9kM', 'Foregin Movies', 'The members of Monarch, an crypto-zoological organisation, must rely on the Godzilla and Mothra to defeat King Ghidorah and Rodan, after the former awakens other dormant Titans to destroy the world.', 'movies/Godzilla King of the Monsters81483932.jpeg', '2020-08-22 07:31:46', '2020-08-22 07:31:46'),
(12, 'Spider Man Far from Home', '343', 'http://wixmxpvyftnkxmzgamn.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/950b25c4104d424c7ccd974021ac07f0/65ee5b59433cedb4fb9aacedfcbeadac/Spider_Man_Far_from_Home_(2019)_BluRay_high_(fzmovies.net)_b4a3ebf16c660edc7b06771445b7963d.mp4', 'https://youtu.be/Nt9L1jCKGnE', 'Foregin Movies', 'As Spider-Man, a beloved superhero, Peter Parker faces four destructive elemental monsters while on holiday in Europe. Soon, he receives help from Mysterio, a fellow hero with mysterious origins.', 'movies/Spider Man Far from Home79110216.jpeg', '2020-08-22 07:38:24', '2020-08-22 07:38:24'),
(13, 'Fast and Furious Presents - Hobbs and Shaw', '363', 'http://owmchalgthxyarnxnfl.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/614774a84bca32182e1b81d831542d9a/e370b6ea3bb6effade37102df4a09d3f/Fast_and_Furious_Presents_-_Hobbs_and_Shaw_(2019)_BluRay_high_(fzmovies.net)_9f94c34c42b93838713adba3d4f834a1.mp4', 'https://youtu.be/HZ7PAyCDwEg', 'Foregin Movies', 'Brixton Lorr is a cybernetically enhanced soldier who possesses superhuman strength, a brilliant mind and a lethal pathogen that could wipe out half of the world\'s population. It\'s now up to hulking lawman Luke Hobbs and lawless operative Deckard Shaw to put aside their past differences and work together to prevent the seemingly indestructible Lorr from destroying humanity.', 'movies/Fast and Furious Presents - Hobbs and Shaw48320183.jpeg', '2020-08-22 07:42:16', '2020-08-22 07:42:16'),
(14, 'Angel Has Fallen', '321', 'http://owmchalgthxyarnxnfl.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/614774a84bca32182e1b81d831542d9a/664021664d5ef7253cc2079d238ee69d/Angel_Has_Fallen_(2019)_BRRip_high_(fzmovies.net)_9fac68a174c7a682ebfddd2458808b6e.mp4', 'https://youtu.be/isVtXH7n9lI', 'Foregin Movies', 'Authorities take Secret Service agent Mike Banning into custody for the failed assassination attempt of U.S. President Allan Trumbull. After escaping from his captors, Banning must evade the FBI and his own agency to find the real threat to the president. Desperate to uncover the truth, he soon turns to unlikely allies to help clear his name and save the country from imminent danger.', 'movies/Angel Has Fallen98322887.jpeg', '2020-08-22 07:56:07', '2020-08-22 07:56:07'),
(15, 'Terminator - Dark Fate', '340', 'http://rgbvxkfmceacwldwqif.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/614774a84bca32182e1b81d831542d9a/7cd0d26c8f7dae64c5d088866ecd0542/Terminator_-_Dark_Fate_(2019)_BRRip_high_(fzmovies.net)_4dc8d8b4ee7ecd27ec881a32929ccfa9.mp4', 'https://youtu.be/jCyEX6u-Yhs', 'Foregin Movies', 'In Mexico City, a newly modified liquid Terminator -- the Rev-9 model -- arrives from the future to kill a young factory worker named Dani Ramos. Also sent back in time is Grace, a hybrid cyborg human who must protect Ramos from the seemingly indestructible robotic assassin. But the two women soon find some much-needed help from a pair of unexpected allies -- seasoned warrior Sarah Connor and the T-800 Terminator.', 'movies/Terminator - Dark Fate84816204.jpeg', '2020-08-22 07:59:39', '2020-08-22 07:59:39'),
(16, 'Alita Battle Angel', '296', 'http://pqcjghtygruziazxmln.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/950b25c4104d424c7ccd974021ac07f0/18f3665f6a905ae309aa36766be837b1/Alita_Battle_Angel_(2019)_WEB-DL_high_(fzmovies.net)_ce0120494c3cfc43166d423dfae9dc7f.mp4', 'https://youtu.be/w7pYhpJaJW8', 'Animation Movies', 'Alita, a battle cyborg, is revived by Ido, a doctor, who realises that she actually has the soul of a teenager. Alita then sets out to learn about her past and find her true identity.', 'movies/Alita Battle Angel81686028.jpeg', '2020-08-22 08:05:14', '2020-08-22 08:05:14'),
(17, 'Hellboy 2019', '321', 'http://pqcjghtygruziazxmln.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/950b25c4104d424c7ccd974021ac07f0/49209a17bdd3c76d0a39dd333a6b6d23/Hellboy_2019_(2019)_BluRay_high_(fzmovies.net)_fc9d1cf52f00dca085177073b4ae129a.mp4', 'https://youtu.be/ZsBO4b3tyZg', 'Foregin Movies', 'Hellboy, the son of a fallen angel, is called upon to destroy Merlin\'s wife, an ancient and powerful sorceress. However, just a battle with her would be enough to end the world.', 'movies/Hellboy 201923827046.jpeg', '2020-08-22 08:09:59', '2020-08-22 08:09:59'),
(18, 'Shazam', '319', 'http://wixmxpvyftnkxmzgamn.nxknectrcmqwoxuzhmanpmoytokxraoaxgusjeyn.xyz/res/950b25c4104d424c7ccd974021ac07f0/07f49a23b1af938a1a46f5998da1e0ab/Shazam_(2019)_BluRay_high_(fzmovies.net)_942a9280d0539671ab01d53a50e95c4f.mp4', 'https://youtu.be/go6GEIrcvFY', 'Foregin Movies', 'After being abandoned at a fair, Billy constantly searches for his mother. His life, however, takes a huge turn when he inherits the superpowers of a powerful wizard.', 'movies/Shazam93446356.jpeg', '2020-08-22 08:13:56', '2020-08-22 08:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `page_visits`
--

CREATE TABLE `page_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_visits`
--

INSERT INTO `page_visits` (`id`, `user_ip`, `created_at`, `updated_at`) VALUES
(1, '129.205.124.246', '2020-08-22 19:13:14', '2020-08-22 19:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Godswill_azubike', 'info.godswillazubike@gmail.com', '$2y$10$w36CR5HvT8LQkoRZQs1FdOMnG5VADXcRnwLnTeFUlenSMClIwMk1q', NULL, '2020-08-15 09:55:03', '2020-08-15 09:55:03'),
(2, 'Ekpe precious', 'xpressivelad@gmail.com', '$2y$10$F9bnaFZwLI5ayK5K5K1IJOtL/SGp4yzvYC5i05fTdMphO7Qog48ta', NULL, '2020-08-18 22:28:53', '2020-08-18 22:28:53'),
(3, 'Kachi', 'onyedikachi548@gmail.com', '$2y$10$dgb3ZVivJYN0D3xTeaY87OqDnL0/S0/uzriKuyQYpRsr7RimhKp3C', NULL, '2020-08-22 07:23:04', '2020-08-22 07:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `wallpapers`
--

CREATE TABLE `wallpapers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallpapers`
--

INSERT INTO `wallpapers` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Spider Man', 'wallpapers/82666811.jpeg', '2020-08-20 15:55:26', '2020-08-20 15:55:26'),
(2, 'Deadpool', 'wallpapers/45680102.jpeg', '2020-08-22 08:18:13', '2020-08-22 08:18:13'),
(3, 'Cool', 'wallpapers/10331511.jpeg', '2020-08-22 08:18:34', '2020-08-22 08:18:34'),
(4, 'Cool', 'wallpapers/77211401.jpeg', '2020-08-22 08:18:53', '2020-08-22 08:18:53'),
(5, 'Iron Man', 'wallpapers/65102771.jpeg', '2020-08-22 08:19:35', '2020-08-22 08:19:35'),
(6, 'Creepy', 'wallpapers/43315761.jpeg', '2020-08-22 08:19:57', '2020-08-22 08:19:57'),
(7, 'Cool', 'wallpapers/70527356.jpeg', '2020-08-22 08:22:49', '2020-08-22 08:22:49'),
(8, 'Tiger', 'wallpapers/52325908.jpeg', '2020-08-22 08:23:05', '2020-08-22 08:23:05'),
(9, 'Bull', 'wallpapers/62921396.jpeg', '2020-08-22 08:23:22', '2020-08-22 08:23:22'),
(10, 'Creepy', 'wallpapers/18852436.jpeg', '2020-08-22 08:24:04', '2020-08-22 08:24:04'),
(11, 'Universe', 'wallpapers/76464926.jpeg', '2020-08-22 08:24:23', '2020-08-22 08:24:23'),
(12, 'Cool', 'wallpapers/92524287.jpeg', '2020-08-22 08:24:42', '2020-08-22 08:24:42'),
(13, 'Panda', 'wallpapers/29556202.jpeg', '2020-08-22 08:25:10', '2020-08-22 08:25:10'),
(14, 'Cool', 'wallpapers/72985149.jpeg', '2020-08-22 08:25:28', '2020-08-22 08:25:28'),
(15, 'Cool', 'wallpapers/88527337.jpeg', '2020-08-22 08:31:07', '2020-08-22 08:31:07'),
(16, 'Cool', 'wallpapers/90302687.jpeg', '2020-08-22 08:31:23', '2020-08-22 08:31:23'),
(17, 'Car', 'wallpapers/33106188.jpeg', '2020-08-22 08:31:42', '2020-08-22 08:31:42'),
(18, 'Car', 'wallpapers/84021576.jpeg', '2020-08-22 08:31:56', '2020-08-22 08:31:56'),
(19, 'Car', 'wallpapers/85447021.jpeg', '2020-08-22 08:32:10', '2020-08-22 08:32:10'),
(20, 'Cool', 'wallpapers/72815778.jpeg', '2020-08-22 08:32:28', '2020-08-22 08:32:28'),
(21, 'Car', 'wallpapers/71281262.jpeg', '2020-08-22 08:32:46', '2020-08-22 08:32:46');

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
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_visits`
--
ALTER TABLE `page_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallpapers`
--
ALTER TABLE `wallpapers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `page_visits`
--
ALTER TABLE `page_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallpapers`
--
ALTER TABLE `wallpapers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
