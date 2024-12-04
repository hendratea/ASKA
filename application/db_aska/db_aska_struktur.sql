/*
SQLyog Ultimate v10.3 
MySQL - 5.5.5-10.4.27-MariaDB : Database - db_aska
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_aska` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_aska`;

/*Table structure for table `a_nonpns` */

DROP TABLE IF EXISTS `a_nonpns`;

CREATE TABLE `a_nonpns` (
  `IDPEG` varchar(10) NOT NULL,
  `r_statuskerja` tinyint(1) NOT NULL,
  `r_tugaskerja` tinyint(1) NOT NULL,
  `r_fungsikerja` tinyint(1) NOT NULL,
  `tgl_masukkerja` date DEFAULT NULL,
  `tgl_awalkontrak` date DEFAULT NULL,
  `tgl_akhirkontrak` date DEFAULT NULL,
  `no_kontrak` varchar(25) DEFAULT NULL,
  `no_rekening` varchar(25) DEFAULT NULL,
  `no_epf` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IDPEG`),
  KEY `r_statuskerja` (`r_statuskerja`),
  KEY `r_tugaskerja` (`r_tugaskerja`),
  KEY `r_fungsikerja` (`r_fungsikerja`),
  CONSTRAINT `a_nonpns_ibfk_1` FOREIGN KEY (`IDPEG`) REFERENCES `a_pegawai` (`IDPEG`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `a_nonpns_ibfk_2` FOREIGN KEY (`r_statuskerja`) REFERENCES `r_statuskerja` (`ID`),
  CONSTRAINT `a_nonpns_ibfk_3` FOREIGN KEY (`r_tugaskerja`) REFERENCES `r_tugaskerja` (`ID`),
  CONSTRAINT `a_nonpns_ibfk_4` FOREIGN KEY (`r_fungsikerja`) REFERENCES `r_fungsikerja` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `a_pegawai` */

DROP TABLE IF EXISTS `a_pegawai`;

CREATE TABLE `a_pegawai` (
  `IDPEG` varchar(10) NOT NULL,
  `r_aktifkerja` tinyint(1) NOT NULL,
  `r_pendidikan` tinyint(1) DEFAULT NULL,
  `pns` enum('Y','N') NOT NULL,
  `wni` enum('Y','N') NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `nama` text DEFAULT NULL,
  `tmp_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `jns_paspor` enum('biasa','dinas','lainnya') NOT NULL,
  `no_paspor` varchar(20) DEFAULT NULL,
  `tgl_laku_paspor` date DEFAULT NULL,
  `tgl_izin_paspor` date DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`IDPEG`),
  KEY `r_aktifkerja` (`r_aktifkerja`),
  KEY `r_pendidikan` (`r_pendidikan`),
  CONSTRAINT `a_pegawai_ibfk_1` FOREIGN KEY (`r_aktifkerja`) REFERENCES `r_aktifkerja` (`ID`),
  CONSTRAINT `a_pegawai_ibfk_2` FOREIGN KEY (`r_pendidikan`) REFERENCES `r_pendidikan` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

/*Table structure for table `a_pns` */

DROP TABLE IF EXISTS `a_pns`;

CREATE TABLE `a_pns` (
  `IDPEG` varchar(10) NOT NULL,
  `r_golongan` tinyint(1) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `tgl_gelar_diplomatik` date DEFAULT NULL,
  PRIMARY KEY (`IDPEG`),
  KEY `r_golongan` (`r_golongan`),
  CONSTRAINT `a_pns_ibfk_1` FOREIGN KEY (`r_golongan`) REFERENCES `r_golongan` (`ID`),
  CONSTRAINT `a_pns_ibfk_2` FOREIGN KEY (`IDPEG`) REFERENCES `a_pegawai` (`IDPEG`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `history_email_verfication` */

DROP TABLE IF EXISTS `history_email_verfication`;

CREATE TABLE `history_email_verfication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `expired_token` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(100) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `history_email_verfication_id_IDX` (`id`) USING BTREE,
  KEY `history_email_verfication_user_id_IDX` (`user_id`) USING BTREE,
  KEY `history_email_verfication_token_IDX` (`token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `history_password_users` */

DROP TABLE IF EXISTS `history_password_users`;

CREATE TABLE `history_password_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_expired` date NOT NULL DEFAULT curdate(),
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `history_password_users_id_IDX` (`id`) USING BTREE,
  KEY `history_password_users_user_id_IDX` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `list_menu` */

DROP TABLE IF EXISTS `list_menu`;

CREATE TABLE `list_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `date_insert` varchar(100) NOT NULL,
  `user_submit` varchar(100) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `list_menu_unique` (`menu_id`),
  UNIQUE KEY `list_menu_id_IDX` (`id`) USING BTREE,
  UNIQUE KEY `list_menu_menu_id_IDX` (`menu_id`) USING BTREE,
  KEY `list_menu_date_insert_IDX` (`date_insert`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `r_aktifkerja` */

DROP TABLE IF EXISTS `r_aktifkerja`;

CREATE TABLE `r_aktifkerja` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_cuti` */

DROP TABLE IF EXISTS `r_cuti`;

CREATE TABLE `r_cuti` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  `jatah` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_fungsikerja` */

DROP TABLE IF EXISTS `r_fungsikerja`;

CREATE TABLE `r_fungsikerja` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_golongan` */

DROP TABLE IF EXISTS `r_golongan`;

CREATE TABLE `r_golongan` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  `aptln` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_ijin` */

DROP TABLE IF EXISTS `r_ijin`;

CREATE TABLE `r_ijin` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_pendidikan` */

DROP TABLE IF EXISTS `r_pendidikan`;

CREATE TABLE `r_pendidikan` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_shiftkerja` */

DROP TABLE IF EXISTS `r_shiftkerja`;

CREATE TABLE `r_shiftkerja` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  `in` time DEFAULT NULL,
  `out` time DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_statuskerja` */

DROP TABLE IF EXISTS `r_statuskerja`;

CREATE TABLE `r_statuskerja` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_tugaskerja` */

DROP TABLE IF EXISTS `r_tugaskerja`;

CREATE TABLE `r_tugaskerja` (
  `ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `r_user` */

DROP TABLE IF EXISTS `r_user`;

CREATE TABLE `r_user` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(15) DEFAULT NULL,
  `level` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci MIN_ROWS=1 MAX_ROWS=127;

/*Table structure for table `request_forgot_password` */

DROP TABLE IF EXISTS `request_forgot_password`;

CREATE TABLE `request_forgot_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `token` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `request_forgot_password_id_IDX` (`id`) USING BTREE,
  KEY `request_forgot_password_email_IDX` (`email`) USING BTREE,
  KEY `request_forgot_password_token_IDX` (`token`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `role_access_menu` */

DROP TABLE IF EXISTS `role_access_menu`;

CREATE TABLE `role_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` char(2) NOT NULL,
  `menu_id` varchar(3) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_access_menu_id_IDX` (`id`) USING BTREE,
  KEY `role_access_menu_role_id_IDX` (`role_id`) USING BTREE,
  KEY `role_access_menu_menu_id_IDX` (`menu_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` char(2) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_submit` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_unique` (`role_id`),
  UNIQUE KEY `roles_id_IDX` (`id`) USING BTREE,
  KEY `roles_role_id_IDX` (`role_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `z_user` */

DROP TABLE IF EXISTS `z_user`;

CREATE TABLE `z_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(128) DEFAULT NULL,
  `pass` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'N',
  `r_user` tinyint(1) NOT NULL DEFAULT 10,
  `IDPEG` varchar(10) DEFAULT NULL,
  `tgl_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* Function  structure for function  `SPLIT_STR` */

/*!50003 DROP FUNCTION IF EXISTS `SPLIT_STR` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `SPLIT_STR`(x VARCHAR(255),
  delim VARCHAR(12),
  pos INT
) RETURNS varchar(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
       LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
       delim, '') */$$
DELIMITER ;

/*Table structure for table `v_get_user_access_menu` */

DROP TABLE IF EXISTS `v_get_user_access_menu`;

/*!50001 DROP VIEW IF EXISTS `v_get_user_access_menu` */;
/*!50001 DROP TABLE IF EXISTS `v_get_user_access_menu` */;

/*!50001 CREATE TABLE  `v_get_user_access_menu`(
 `user_id` varchar(128) ,
 `menu_id` varchar(3) ,
 `category` varchar(255) ,
 `page_name` varchar(255) ,
 `icon_menu` varchar(100) ,
 `url_menu` varchar(200) ,
 `count_menu` bigint(21) ,
 `aktif` tinyint(1) 
)*/;

/*Table structure for table `v_validation_user_login` */

DROP TABLE IF EXISTS `v_validation_user_login`;

/*!50001 DROP VIEW IF EXISTS `v_validation_user_login` */;
/*!50001 DROP TABLE IF EXISTS `v_validation_user_login` */;

/*!50001 CREATE TABLE  `v_validation_user_login`(
 `user` varchar(128) ,
 `full_name` mediumtext ,
 `pass` varchar(128) ,
 `tgl_terakhir_login` datetime ,
 `role_name` varchar(15) 
)*/;

/*View structure for view v_get_user_access_menu */

/*!50001 DROP TABLE IF EXISTS `v_get_user_access_menu` */;
/*!50001 DROP VIEW IF EXISTS `v_get_user_access_menu` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_get_user_access_menu` AS select `a`.`user` AS `user_id`,`c`.`menu_id` AS `menu_id`,`SPLIT_STR`(`c`.`name`,' - ',1) AS `category`,`SPLIT_STR`(`c`.`name`,' - ',2) AS `page_name`,`c`.`icon` AS `icon_menu`,`c`.`link` AS `url_menu`,`c`.`count_menu` AS `count_menu`,`c`.`aktif` AS `aktif` from ((`z_user` `a` left join `role_access_menu` `b` on(`a`.`r_user` = `b`.`role_id`)) left join (select `list_menu`.`id` AS `id`,`list_menu`.`menu_id` AS `menu_id`,`list_menu`.`name` AS `name`,`list_menu`.`date_insert` AS `date_insert`,`list_menu`.`icon` AS `icon`,`list_menu`.`link` AS `link`,count(0) over ( partition by left(`list_menu`.`menu_id`,1)) AS `count_menu`,`list_menu`.`aktif` AS `aktif` from `list_menu`) `c` on(`b`.`menu_id` = `c`.`menu_id`)) */;

/*View structure for view v_validation_user_login */

/*!50001 DROP TABLE IF EXISTS `v_validation_user_login` */;
/*!50001 DROP VIEW IF EXISTS `v_validation_user_login` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_validation_user_login` AS select `a`.`user` AS `user`,ifnull(`c`.`nama`,`a`.`user`) AS `full_name`,`a`.`pass` AS `pass`,`a`.`tgl_terakhir_login` AS `tgl_terakhir_login`,`d`.`status` AS `role_name` from (((`z_user` `a` left join `roles` `b` on(`a`.`r_user` = `b`.`role_id`)) left join `a_pegawai` `c` on(`a`.`IDPEG` = `c`.`IDPEG`)) left join `r_user` `d` on(`a`.`r_user` = `d`.`level`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
