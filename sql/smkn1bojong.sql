-- Adminer 4.8.1 MySQL 5.5.5-10.1.37-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(50) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `buku` (`id`, `kode_buku`, `nama_buku`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4,	'131',	'Fazri Penyelamatt',	'2025-05-15 00:51:29',	1,	'2025-05-15 02:00:37',	NULL),
(5,	'2131',	'Fazri',	'2025-05-15 00:59:30',	1,	NULL,	NULL),
(6,	'21311',	'sadadsa',	'2025-05-15 01:22:52',	1,	'2025-05-15 02:10:40',	1),
(7,	'52141',	'sfadasdadsa',	'2025-05-15 01:22:56',	1,	NULL,	NULL),
(8,	'52141',	'sdaasdsada',	'2025-05-15 01:23:01',	1,	NULL,	NULL),
(9,	'512321',	'saascasa',	'2025-05-15 01:23:05',	1,	NULL,	NULL),
(10,	'11114',	'SAXAZZx',	'2025-05-15 01:41:21',	1,	'2025-05-15 01:45:35',	NULL),
(11,	'211111',	'testa',	'2025-05-15 02:09:53',	1,	'2025-05-15 02:10:23',	NULL);

DROP TABLE IF EXISTS `mst_jurusan`;
CREATE TABLE `mst_jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `singkatan_jurusan` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `mst_jurusan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mst_jurusan` (`id`, `nama_jurusan`, `singkatan_jurusan`, `created_at`, `created_by`) VALUES
(3,	'Rekayasa Perangkat Lunak',	'RPL',	'2025-05-15 03:16:16',	1),
(4,	'Teknik Komputer Jaringan',	'TKJ',	'2025-05-16 04:39:23',	1);

DROP TABLE IF EXISTS `mst_kelas`;
CREATE TABLE `mst_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `mst_kelas_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mst_kelas` (`id`, `nama_kelas`, `created_at`, `created_by`) VALUES
(1,	'XII RPL 1',	'2025-05-16 00:59:42',	1),
(2,	'X RPL 2',	'2025-05-16 01:00:15',	1),
(3,	'X RPL 1',	'2025-05-16 01:03:04',	1);

DROP TABLE IF EXISTS `pos`;
CREATE TABLE `pos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buku_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `type` enum('OUT','IN') DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buku_id` (`buku_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `pos_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`),
  CONSTRAINT `pos_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pos` (`id`, `buku_id`, `qty`, `type`, `created_by`) VALUES
(2,	4,	30,	'IN',	1),
(3,	4,	20,	'IN',	1),
(4,	6,	21,	'IN',	1);

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` bigint(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jurusan` (`id_jurusan`),
  KEY `id_kelas` (`id_kelas`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `mst_jurusan` (`id`),
  CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `mst_kelas` (`id`),
  CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_jurusan`) REFERENCES `mst_jurusan` (`id`),
  CONSTRAINT `siswa_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `siswa` (`id`, `nis`, `nama`, `id_kelas`, `id_jurusan`, `no_hp`, `created_at`, `created_by`) VALUES
(2,	9223372036854775807,	'Noer Fazri Ramadhann',	2,	4,	'08510103330',	'2025-05-16 04:50:17',	1),
(3,	123131111222111,	'Fazri',	1,	3,	'08510103330',	'2025-05-16 04:46:25',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_ip` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) DEFAULT 'admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `last_login`, `last_ip`, `created_at`, `role`) VALUES
(1,	'admin',	'$2y$10$catWtYE4u6kiNSdhzZLdJOXFMKlSrftYN4LzmIkVB4L6XXbz1CMlW',	'Admin',	'2025-05-16 04:32:10',	'::1',	'2025-05-14 22:20:46',	'admin');

-- 2025-05-15 21:54:26
