-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- username: admin
-- password: Pass11

-- Dumping structure for table ciapp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `auth` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manual',
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `policyagreed` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `suspended` tinyint(1) NOT NULL DEFAULT 0,
  `mnethostid` bigint(10) NOT NULL DEFAULT 0,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `idnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emailstop` tinyint(1) NOT NULL DEFAULT 0,
  `icq` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `skype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `yahoo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `aim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `msn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Morocco',
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `calendartype` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gregorian',
  `theme` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '99',
  `firstaccess` bigint(10) NOT NULL DEFAULT 0,
  `lastaccess` bigint(10) NOT NULL DEFAULT 0,
  `lastlogin` bigint(10) NOT NULL DEFAULT 0,
  `currentlogin` bigint(10) NOT NULL DEFAULT 0,
  `lastip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `secret` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `picture` bigint(10) NOT NULL DEFAULT 0,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionformat` tinyint(2) NOT NULL DEFAULT 1,
  `mailformat` tinyint(1) NOT NULL DEFAULT 1,
  `maildigest` tinyint(1) NOT NULL DEFAULT 0,
  `maildisplay` tinyint(2) NOT NULL DEFAULT 2,
  `autosubscribe` tinyint(1) NOT NULL DEFAULT 1,
  `trackforums` tinyint(1) NOT NULL DEFAULT 0,
  `timecreated` bigint(10) NOT NULL DEFAULT 0,
  `timemodified` bigint(10) NOT NULL DEFAULT 0,
  `trustbitmask` bigint(10) NOT NULL DEFAULT 0,
  `imagealt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastnamephonetic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstnamephonetic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternatename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mneuse_uix` (`mnethostid`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPRESSED COMMENT='One record for each person';

-- Dumping data for table ciapp.users: ~1 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `auth`, `confirmed`, `policyagreed`, `deleted`, `suspended`, `mnethostid`, `username`, `password`, `idnumber`, `first_name`, `last_name`, `avatar`, `email`, `emailstop`, `icq`, `skype`, `yahoo`, `aim`, `msn`, `phone1`, `phone2`, `institution`, `department`, `address`, `city`, `country`, `lang`, `calendartype`, `theme`, `timezone`, `firstaccess`, `lastaccess`, `lastlogin`, `currentlogin`, `lastip`, `secret`, `picture`, `url`, `description`, `descriptionformat`, `mailformat`, `maildigest`, `maildisplay`, `autosubscribe`, `trackforums`, `timecreated`, `timemodified`, `trustbitmask`, `imagealt`, `lastnamephonetic`, `firstnamephonetic`, `middlename`, `alternatename`) VALUES
	(1, 'manual', 0, 0, 0, 0, 0, 'admin', '$2y$10$wY3oCmZds6Y.b4oUpfbekulLyYoG1EriT7MkJ6mZmwTZYEZ7Q9uyC', '', 'Admin', 'User', 'avatar.png', 'admin@admin.com', 0, '', '', '', '', '', '', '', '', '', '', '', 'Morocco', 'en', 'gregorian', '', '99', 0, 0, 0, 0, '', '', 0, '', NULL, 1, 1, 0, 2, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
