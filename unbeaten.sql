-- --------------------------------------------------------
-- Host:                         mysql1.mydevil.net
-- Wersja serwera:               8.0.30 - Source distribution
-- Serwer OS:                    FreeBSD13.0
-- HeidiSQL Wersja:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Zrzut struktury bazy danych m14781_unbeaten
CREATE DATABASE IF NOT EXISTS `m14781_unbeaten` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `m14781_unbeaten`;

-- Zrzut struktury tabela m14781_unbeaten.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `game_id` int NOT NULL,
  `prize` decimal(20,2) DEFAULT NULL,
  `fee` decimal(20,2) DEFAULT NULL,
  `owner_id` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `match_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_events_users` (`owner_id`),
  KEY `FK_events_games` (`game_id`),
  CONSTRAINT `FK_events_games` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_events_users` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3;

-- Zrzucanie danych dla tabeli m14781_unbeaten.events: ~6 rows (około)
INSERT INTO `events` (`id`, `name`, `address`, `game_id`, `prize`, `fee`, `owner_id`, `image`, `date`, `match_type`) VALUES
	(18, 'Season 1 finalle', 'Os kolorowe 12', 6, 1000.00, 50.00, 1, '/uploads/honklhonk.jpg', '2022-10-26', 'BO5 ladder');
INSERT INTO `events` (`id`, `name`, `address`, `game_id`, `prize`, `fee`, `owner_id`, `image`, `date`, `match_type`) VALUES
	(20, 'Arena championship', 'Online', 2, 50000.00, 0.00, 2, '/uploads/pobrany plik.jfif', '2022-11-25', 'BO5 ladder');
INSERT INTO `events` (`id`, `name`, `address`, `game_id`, `prize`, `fee`, `owner_id`, `image`, `date`, `match_type`) VALUES
	(21, 'Rainbow 6 S1', 'ul Wesoła 13', 8, 10000.00, 149.00, 3, '/uploads/DbUGqc5LIL1fGItC-z79Pw.jpeg', '2022-10-10', 'BO3 ladder');
INSERT INTO `events` (`id`, `name`, `address`, `game_id`, `prize`, `fee`, `owner_id`, `image`, `date`, `match_type`) VALUES
	(22, 'Fortnite tournament', 'Online', 9, 5421.00, 80.00, 3, '/uploads/TT-Fortnite-tournament-web.jpg', '2022-10-22', 'King of the Hill');
INSERT INTO `events` (`id`, `name`, `address`, `game_id`, `prize`, `fee`, `owner_id`, `image`, `date`, `match_type`) VALUES
	(23, 'International 2022', 'Pekin Arena', 3, 500000.00, 0.00, 2, '/uploads/600px-The_International_2019.png', '2022-12-09', 'BO3 ladder');
INSERT INTO `events` (`id`, `name`, `address`, `game_id`, `prize`, `fee`, `owner_id`, `image`, `date`, `match_type`) VALUES
	(24, 'Counter Strike IEM 2022', 'Spodek Katowice', 4, 200000.00, 0.00, 4, '/uploads/IEM-Katowice-2022-1.jpg', '2022-10-12', 'BO5 ladder');

-- Zrzut struktury tabela m14781_unbeaten.games
CREATE TABLE IF NOT EXISTS `games` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Zrzucanie danych dla tabeli m14781_unbeaten.games: ~10 rows (około)
INSERT INTO `games` (`id`, `name`) VALUES
	(1, 'Leauge of Legends');
INSERT INTO `games` (`id`, `name`) VALUES
	(2, 'World of Warcraft');
INSERT INTO `games` (`id`, `name`) VALUES
	(3, 'DOTA 2');
INSERT INTO `games` (`id`, `name`) VALUES
	(4, 'Counter Strike');
INSERT INTO `games` (`id`, `name`) VALUES
	(5, 'Valorant');
INSERT INTO `games` (`id`, `name`) VALUES
	(6, 'Overwatch');
INSERT INTO `games` (`id`, `name`) VALUES
	(7, 'Starcraft 2');
INSERT INTO `games` (`id`, `name`) VALUES
	(8, 'Rainbow 6 siedge');
INSERT INTO `games` (`id`, `name`) VALUES
	(9, 'Fortnite');
INSERT INTO `games` (`id`, `name`) VALUES
	(10, 'PUBG');

-- Zrzut struktury tabela m14781_unbeaten.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_logs_users` (`id_user`),
  CONSTRAINT `FK_users_logs_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Zrzucanie danych dla tabeli m14781_unbeaten.logs: ~7 rows (około)
INSERT INTO `logs` (`id`, `event`, `id_user`, `date`) VALUES
	(13, 'Rejestracja nowego użytkownika', 2, '2022-10-12 18:37:09');
INSERT INTO `logs` (`id`, `event`, `id_user`, `date`) VALUES
	(14, 'Rejestracja użytkownika na event o ID 31', 2, '2022-10-12 19:06:39');
INSERT INTO `logs` (`id`, `event`, `id_user`, `date`) VALUES
	(15, 'Rejestracja użytkownika na event o ID 31', 2, '2022-10-12 19:12:44');
INSERT INTO `logs` (`id`, `event`, `id_user`, `date`) VALUES
	(16, 'Rejestracja nowego użytkownika', 1, '2022-10-12 19:33:33');
INSERT INTO `logs` (`id`, `event`, `id_user`, `date`) VALUES
	(17, 'Rejestracja nowego użytkownika', 3, '2022-10-12 19:34:51');
INSERT INTO `logs` (`id`, `event`, `id_user`, `date`) VALUES
	(18, 'Rejestracja nowego użytkownika', 4, '2022-10-12 19:35:14');
INSERT INTO `logs` (`id`, `event`, `id_user`, `date`) VALUES
	(19, 'Rejestracja użytkownika na event o ID 18', 1, '2022-10-12 19:36:28');

-- Zrzut struktury tabela m14781_unbeaten.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Zrzucanie danych dla tabeli m14781_unbeaten.roles: ~2 rows (około)
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'Admin');
INSERT INTO `roles` (`id`, `name`) VALUES
	(2, 'User');

-- Zrzut struktury tabela m14781_unbeaten.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL DEFAULT '2',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_roles` (`role_id`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Zrzucanie danych dla tabeli m14781_unbeaten.users: ~4 rows (około)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`) VALUES
	(1, 1, 'admin', 'admin.unbeaten@gmail.com', '$2y$10$QzL3KDgP8QYr7nQeP5FhHu6ccY3zd.g428c/Z6Yk.8K1PqFkUOwGW');
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`) VALUES
	(2, 2, 'Marcin', 'cygan.dawid@gmail.com', '$2y$10$iXar7Evi9vnXJCGef5ej3OLfQGz0uPO21ASN9hTMEB5BrbTdZkHx2');
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`) VALUES
	(3, 2, 'Test3', 'test3@gmail.com', '$2y$10$xmYhLztQ1hXBnE8ooEP.EuSk6fDGLymDHBVb7tWIs62pwnF3FTDou');
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`) VALUES
	(4, 2, 'Test4', 'test4@gmail.com', '$2y$10$O91mh7bJD6OQ7vlMVe4feeoWjU2pgSdPW8ikmS0FH9Ef.h6uAXd4y');

-- Zrzut struktury tabela m14781_unbeaten.users_events
CREATE TABLE IF NOT EXISTS `users_events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `event_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__events` (`event_id`),
  KEY `FK__users` (`user_id`),
  CONSTRAINT `FK__events` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb3;

-- Zrzucanie danych dla tabeli m14781_unbeaten.users_events: ~1 rows (około)
INSERT INTO `users_events` (`id`, `user_id`, `event_id`) VALUES
	(69, 1, 18);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
