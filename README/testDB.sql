-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table testdb2.answer: ~47 rows (approximately)
DELETE FROM `answer`;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` (`id`, `question_id`, `answer`, `is_correct`) VALUES
	(1, 1, 'Ventspils', 0),
	(2, 1, 'Rīga', 1),
	(3, 1, 'Daugavpils', 0),
	(4, 2, 'Viļņa', 1),
	(5, 2, 'Kauņa', 0),
	(6, 3, 'Tartu', 0),
	(7, 3, 'Kauņa', 0),
	(8, 3, 'Minhene', 0),
	(9, 3, 'Tallina', 1),
	(10, 3, 'Liepāja', 0),
	(11, 4, 'Veins Greckis', 0),
	(12, 4, 'Jefs Kaplans', 1),
	(13, 4, 'Jānis Polis', 0),
	(14, 4, 'Pēteris Lauris', 0),
	(15, 5, 'Black Flag', 0),
	(16, 5, 'Brotherhood', 0),
	(17, 5, 'Origins', 1),
	(18, 6, 'Bethesda', 0),
	(19, 6, 'Valve', 1),
	(20, 6, 'Ubisoft', 0),
	(21, 6, 'EA', 0),
	(22, 6, 'Rockstar Games', 0),
	(23, 7, 'Half-Life 2', 0),
	(24, 7, 'Half-Life 3', 1),
	(26, 8, '110', 0),
	(27, 8, '111', 1),
	(28, 8, '112', 0),
	(29, 9, 'Miks Džegers', 0),
	(30, 9, 'Kīts Ričards', 0),
	(31, 9, 'Deivs Masteins', 1),
	(32, 10, 'Origin of Symetry', 0),
	(33, 10, '2nd Law', 0),
	(34, 10, 'Drones', 1),
	(35, 10, 'Resistence', 0),
	(36, 11, '1984', 0),
	(37, 11, '1986', 1),
	(38, 11, '1988', 0),
	(39, 11, '1979', 0),
	(40, 12, '1964', 1),
	(41, 12, '1968', 0),
	(42, 13, 'Heroes', 0),
	(43, 13, 'Rebel rebel', 0),
	(44, 13, 'Life on Mars', 0),
	(45, 13, 'Whish You Were Here', 1),
	(46, 14, 'Viss ir slikti!', 0),
	(47, 14, 'Viss ir kārtībā', 1),
	(48, 14, 'Andrejsala', 0);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;

-- Dumping data for table testdb2.migration_versions: ~0 rows (approximately)
DELETE FROM `migration_versions`;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;

-- Dumping data for table testdb2.question: ~14 rows (approximately)
DELETE FROM `question`;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`id`, `test_id`, `question`) VALUES
	(1, 1, 'Latvijas galvaspilsēta ir:'),
	(2, 1, 'Lietuvas galvaspilsēta ir:'),
	(3, 1, 'Igaunijas galvaspilsēta ir:'),
	(4, 2, 'Overwatch komandas seja?'),
	(5, 2, 'Assassin\'s Creed jaunākā daļa?'),
	(6, 2, 'Team Fortress 2 izstrādāja?'),
	(7, 2, 'Kura nav publicēta Half-Life daļa?'),
	(8, 2, 'Nu kura bunkura nāca Fallout 4 galvenais varonis?'),
	(9, 3, 'Kurš no šiem mūziķiem nav Rolling Stones dalībnieks?'),
	(10, 3, 'Jaunākais no Muse albumiem?'),
	(11, 3, 'Kurā gadā tika izdots Queen albums A Kind of Magic?'),
	(12, 3, 'Pink Floyd izveidošanas gads?'),
	(13, 3, 'Kura no šim nav Deivida Bovija dziesma?'),
	(14, 3, 'Grupas Krāsa EP nosaukums?');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;

-- Dumping data for table testdb2.test: ~3 rows (approximately)
DELETE FROM `test`;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` (`id`, `name`) VALUES
	(1, 'Galvaspilsētas'),
	(2, 'Spēles'),
	(3, 'Mūzika');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;

-- Dumping data for table testdb2.user: ~0 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping data for table testdb2.users_question: ~0 rows (approximately)
DELETE FROM `users_question`;
/*!40000 ALTER TABLE `users_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_question` ENABLE KEYS */;

-- Dumping data for table testdb2.user_answer: ~0 rows (approximately)
DELETE FROM `user_answer`;
/*!40000 ALTER TABLE `user_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_answer` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
