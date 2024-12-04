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

/*Data for the table `a_nonpns` */

insert  into `a_nonpns`(`IDPEG`,`r_statuskerja`,`r_tugaskerja`,`r_fungsikerja`,`tgl_masukkerja`,`tgl_awalkontrak`,`tgl_akhirkontrak`,`no_kontrak`,`no_rekening`,`no_epf`) values ('peg0000003',2,4,1,'0000-00-00','0000-00-00','0000-00-00','00624/TU/III/2022','00624/TU/III/2022','17484497'),('peg0000004',3,8,3,NULL,NULL,NULL,NULL,NULL,NULL);

/*Data for the table `a_pegawai` */

insert  into `a_pegawai`(`IDPEG`,`r_aktifkerja`,`r_pendidikan`,`pns`,`wni`,`gender`,`nama`,`tmp_lahir`,`tgl_lahir`,`alamat`,`telepon`,`jns_paspor`,`no_paspor`,`tgl_laku_paspor`,`tgl_izin_paspor`,`foto`) values ('peg0000001',1,8,'Y','Y','Laki-Laki','Wanton Sidauruk','SARIMATONDANG','0000-00-00',NULL,NULL,'biasa',NULL,NULL,NULL,NULL),('peg0000002',1,8,'Y','Y','Perempuan','Lusy Surjandari','SURABAYA','0000-00-00',NULL,NULL,'dinas',NULL,NULL,NULL,NULL),('peg0000003',1,8,'N','Y','Perempuan','Aidilia binti Kadiran',NULL,'0000-00-00',NULL,'0174336050','biasa',NULL,NULL,NULL,NULL),('peg0000004',1,8,'N','Y','Laki-Laki','Kadiran',NULL,'0000-00-00','Blok AJ-G-3, Jalan Hilir Pemancar Mukim 13, Taman Tun Sardon, 11700, Gelugor, Pulau Pinang','012 474 7897','lainnya',NULL,NULL,NULL,NULL);

/*Data for the table `a_pns` */

insert  into `a_pns`(`IDPEG`,`r_golongan`,`nip`,`tmt`,`tgl_gelar_diplomatik`) values ('peg0000001',3,'19661006 199503 1 001','0000-00-00','0000-00-00'),('peg0000002',5,NULL,NULL,NULL);

/*Data for the table `history_email_verfication` */

insert  into `history_email_verfication`(`id`,`user_id`,`email`,`status`,`expired_token`,`token`,`date_insert`) values (1,'hari01','haripramono360@gmail.com','false','2024-11-23 17:20:52','hari01yhgaG3j0TXMZYmo1','2024-11-23 17:20:52');

/*Data for the table `history_password_users` */

insert  into `history_password_users`(`id`,`user_id`,`password`,`date_insert`,`date_expired`,`status`) values (1,'hari01','$2y$10$CJzaXl1qrJLXYsj4af/PM.1ykLNeUHnlVnlIFLwE8ItHaj0/9gLx2','2024-11-23 17:20:52','2025-02-21','Active');

/*Data for the table `list_menu` */

insert  into `list_menu`(`id`,`menu_id`,`name`,`link`,`icon`,`date_insert`,`user_submit`,`aktif`) values (1,'1','Home - Dashboard','dashboard','zmdi zmdi-home','2024-11-24 11:05:00.000','abot',1),(2,'21','Referensi - Golongan','referensi_golongan','zmdi zmdi-assignment-account','2024-11-24 11:05:00.000','abot',1),(3,'22','Referensi - Tugas','referensi_tugas','zmdi zmdi-assignment-account','2024-11-24 11:05:00.000','abot',1),(4,'23','Referensi - Fungsi','referensi_fungsi','zmdi zmdi-assignment-account','2024-11-24 11:05:00.000','abot',1),(5,'24','Referensi - Cuti','referensi_cuti','zmdi zmdi-assignment-account','2024-11-24 11:05:00.000','abot',1),(6,'25','Referensi - Ijin','referensi_ijin','zmdi zmdi-assignment-account','2024-11-24 11:05:00.000','abot',1),(7,'26','Referensi - Shift ','referensi_shift','zmdi zmdi-card-membership','2024-11-24 11:05:00.000','abot',0),(8,'31','Pegawai - Input Data','pegawai_input_data','zmdi zmdi-card-membership','2024-11-24 11:05:00.000','abot',1),(9,'32','Pegawai - Rekap All','pegawai_rekap_all','zmdi zmdi-dns','2024-11-24 11:05:00.000','abot',1),(10,'33','Pegawai - Rekap Kontrak','pegawai_rekap_contract','zmdi zmdi-dns','2024-11-24 11:05:00.000','abot',1),(11,'41','Absen - Upload','absen_upload','zmdi zmdi-dns','2024-11-24 11:05:00.000','abot',1),(12,'42','Absen - Edit Upload','absen_edit_upload','zmdi zmdi-dns','2024-11-24 11:05:00.000','abot',1),(13,'43','Absen - Rekap Alpa','absen_rekap_alpa','zmdi zmdi-dns','2024-11-24 11:05:00.000','abot',1),(14,'44','Absen - Rekap All','absen_rekap_all','zmdi zmdi-dns','2024-11-24 11:05:00.000','abot',1),(15,'51','Izin - Input Data','izin_input_data','zmdi zmdi-balance-wallet','2024-11-24 11:05:00.000','abot',1),(16,'52','Izin - Cetak Izin','izin_cetak_cuti','zmdi zmdi-balance-wallet','2024-11-24 11:05:00.000','abot',1),(17,'53','Izin - Rekap All','izin_rekap_all','zmdi zmdi-balance-wallet','2024-11-24 11:05:00.000','abot',1),(18,'61','Cuti - Input Data','cuti_input_data','zmdi zmdi-balance-wallet','2024-11-24 11:05:00.000','abot',1),(19,'62','Cuti - Cetak Cuti','cuti_cetak_cuti','zmdi zmdi-balance-wallet','2024-11-24 11:05:00.000','abot',1),(20,'63','Cuti - Rekap All','cuti_rekap_all','zmdi zmdi-balance-wallet','2024-11-24 11:05:00.000','abot',1),(21,'64','Cuti - Rekap Sisa Cuti','cuti_rekap_sisa_cuti','zmdi zmdi-balance-wallet','2024-11-24 11:05:00.000','abot',1),(22,'71','Lembur - SPK','lembur_spk','zmdi zmdi-money-box','2024-11-24 11:05:00.000','abot',1),(23,'72','Lembur - Laporan SPK','lembur_laporan_spk','zmdi zmdi-money-box','2024-11-24 11:05:00.000','abot',1),(24,'81','Payroll - reCheck SPK dan Absensi','payroll_recheck_spk_absensi','zmdi zmdi-puzzle-piece','2024-11-24 11:05:00.000','abot',1),(25,'82','Payroll - Upah Lembur User','payroll_upah_lembur_user','zmdi zmdi-puzzle-piece','2024-11-24 11:05:00.000','abot',1),(26,'83','Payroll - Upah Lembur All','payroll_upah_lembur_all','zmdi zmdi-puzzle-piece','2024-11-24 11:05:00.000','abot',1),(27,'91','Setting - User','setting_user','zmdi zmdi-puzzle-piece','2024-11-24 11:05:00.000','abot',1),(28,'92','Setting - Data Institusi','setting_data_institusi','zmdi zmdi-puzzle-piece','2024-11-24 11:05:00.000','abot',1);

/*Data for the table `r_aktifkerja` */

insert  into `r_aktifkerja`(`ID`,`status`) values (1,'AKTIF'),(2,'HABIS KONTRAK'),(3,'PENSIUN'),(4,'RESIGN');

/*Data for the table `r_cuti` */

insert  into `r_cuti`(`ID`,`status`,`jatah`) values (1,'Cuti Tahunan',12),(2,'Cuti Alasan Penting\r',0),(3,'Cuti Sakit',0),(4,'Cuti Melahirkan',0),(5,'Cuti Nikah',0),(6,'Cuti Besar',0);

/*Data for the table `r_fungsikerja` */

insert  into `r_fungsikerja`(`ID`,`status`) values (1,'Sekretaris'),(2,'Administrasi'),(3,'Supir');

/*Data for the table `r_golongan` */

insert  into `r_golongan`(`ID`,`status`,`aptln`) values (1,'Duta Besar LBBP ',100),(2,'Duta Besar',100),(3,'Minister/DCM/Konsul ',90),(4,'Minister Counsellor/',85),(5,'Counsellor',78),(6,'Sekretaris I',72),(7,'Sekretaris II',66),(8,'Sekretaris III',60),(9,'Atase I',55),(10,'Atase II',52),(11,'Atase III',50),(12,'Pembina Utama Madya ',0),(13,'Pembina Utama Muda (',85),(14,'Pembina Tingkat I (I',78),(15,'Pembina (IV/A)',72),(16,'Penata Tingkat I (II',66),(17,'Penata Tingkat II (I',60),(18,'Penata  Muda Tingkat',55),(19,'Penata  Muda Tingkat',0),(20,'Brigadir Jenderal',90),(21,'K o l o n e l',85),(22,'Letnan Kolonel ',78),(23,'M a y o r',66),(24,'K a p t e n',60),(25,'Letnan Satu',55),(26,'Letnan Dua ',52),(27,'Pembantu Letnan',50),(28,'K o l o n e l NON AT',78),(29,'Letnan Kolonel NON A',72),(30,'M a y o r NON ATHAN\r',66),(31,'K a p t e n NON ATHA',60),(32,'Letnan Satu NON ATHA',55),(33,'Letnan Dua NON ATHAN',52),(34,'Pembantu Letnan NON ',50);

/*Data for the table `r_ijin` */

insert  into `r_ijin`(`ID`,`status`) values (1,'Ijin'),(2,'Sakit'),(3,'Ijin Sakit'),(4,'Alpa');

/*Data for the table `r_pendidikan` */

insert  into `r_pendidikan`(`ID`,`status`) values (1,'SD'),(2,'SLTP'),(3,'SLTA'),(4,'D1'),(5,'D2'),(6,'D3'),(7,'D4'),(8,'S1'),(9,'S2'),(10,'S3');

/*Data for the table `r_shiftkerja` */

insert  into `r_shiftkerja`(`ID`,`status`,`in`,`out`) values (1,'Normal','09:00:00','17:00:00'),(2,'Shift 1','06:00:00','16:00:00'),(3,'Shift 2','16:00:00','00:00:00'),(4,'Shift 3','00:00:00','06:00:00');

/*Data for the table `r_statuskerja` */

insert  into `r_statuskerja`(`ID`,`status`) values (1,'TETAP'),(2,'KONTRAK'),(3,'HARIAN');

/*Data for the table `r_tugaskerja` */

insert  into `r_tugaskerja`(`ID`,`status`) values (1,'Ekonomi'),(2,'Imigrasi'),(3,'Komunikasi'),(4,'Konsuler'),(5,'KRT'),(6,'Pensosbud'),(7,'Keppri'),(8,'Tata Usaha');

/*Data for the table `r_user` */

insert  into `r_user`(`id`,`status`,`level`) values (1,'Programmer',1),(2,'Administrator',2),(3,'Admin Pegawai',3),(4,'Admin Absen',4),(5,'Admin Payrol',5),(6,'Manager',6),(7,'Kabag',7),(8,'Kasie',8),(9,'User',9);

/*Data for the table `request_forgot_password` */

/*Data for the table `role_access_menu` */

insert  into `role_access_menu`(`id`,`role_id`,`menu_id`,`date_insert`) values (1,'1','1','0000-00-00 00:00:00'),(2,'1','21','0000-00-00 00:00:00'),(3,'1','22','0000-00-00 00:00:00'),(4,'1','23','0000-00-00 00:00:00'),(5,'1','24','0000-00-00 00:00:00'),(6,'1','25','0000-00-00 00:00:00'),(7,'1','26','0000-00-00 00:00:00'),(8,'1','91','0000-00-00 00:00:00'),(9,'1','92','0000-00-00 00:00:00'),(10,'2','1','0000-00-00 00:00:00'),(11,'2','21','0000-00-00 00:00:00'),(12,'2','22','0000-00-00 00:00:00'),(13,'2','23','0000-00-00 00:00:00'),(14,'2','24','0000-00-00 00:00:00'),(15,'2','25','0000-00-00 00:00:00'),(16,'2','26','0000-00-00 00:00:00'),(17,'2','91','0000-00-00 00:00:00'),(18,'2','31','0000-00-00 00:00:00'),(19,'2','32','0000-00-00 00:00:00'),(20,'2','33','0000-00-00 00:00:00'),(21,'2','41','0000-00-00 00:00:00'),(22,'2','42','0000-00-00 00:00:00'),(23,'2','43','0000-00-00 00:00:00'),(24,'2','44','0000-00-00 00:00:00'),(25,'2','51','0000-00-00 00:00:00'),(26,'2','52','0000-00-00 00:00:00'),(27,'2','53','0000-00-00 00:00:00'),(28,'2','61','0000-00-00 00:00:00'),(29,'2','62','0000-00-00 00:00:00'),(30,'2','63','0000-00-00 00:00:00'),(31,'2','64','0000-00-00 00:00:00'),(32,'2','71','0000-00-00 00:00:00'),(33,'2','72','0000-00-00 00:00:00'),(34,'2','81','0000-00-00 00:00:00'),(35,'2','82','0000-00-00 00:00:00'),(36,'2','83','0000-00-00 00:00:00'),(37,'3','31','0000-00-00 00:00:00'),(38,'3','32','0000-00-00 00:00:00'),(39,'3','33','0000-00-00 00:00:00'),(40,'3','51','0000-00-00 00:00:00'),(41,'3','52','0000-00-00 00:00:00'),(42,'3','61','0000-00-00 00:00:00'),(43,'3','62','0000-00-00 00:00:00'),(44,'3','71','0000-00-00 00:00:00'),(45,'3','72','0000-00-00 00:00:00'),(46,'4','41','0000-00-00 00:00:00'),(47,'4','42','0000-00-00 00:00:00'),(48,'4','43','0000-00-00 00:00:00'),(49,'4','44','0000-00-00 00:00:00'),(50,'4','51','0000-00-00 00:00:00'),(51,'4','52','0000-00-00 00:00:00'),(52,'4','61','0000-00-00 00:00:00'),(53,'4','62','0000-00-00 00:00:00'),(54,'4','71','0000-00-00 00:00:00'),(55,'4','72','0000-00-00 00:00:00'),(56,'5','51','0000-00-00 00:00:00'),(57,'5','52','0000-00-00 00:00:00'),(58,'5','53','0000-00-00 00:00:00'),(59,'5','61','0000-00-00 00:00:00'),(60,'5','62','0000-00-00 00:00:00'),(61,'5','63','0000-00-00 00:00:00'),(62,'5','64','0000-00-00 00:00:00'),(63,'5','71','0000-00-00 00:00:00'),(64,'5','72','0000-00-00 00:00:00'),(65,'5','81','0000-00-00 00:00:00'),(66,'5','82','0000-00-00 00:00:00'),(67,'5','83','0000-00-00 00:00:00'),(68,'6','1','0000-00-00 00:00:00'),(69,'6','32','0000-00-00 00:00:00'),(70,'6','33','0000-00-00 00:00:00'),(71,'6','43','0000-00-00 00:00:00'),(72,'6','44','0000-00-00 00:00:00'),(73,'6','53','0000-00-00 00:00:00'),(74,'6','63','0000-00-00 00:00:00'),(75,'6','64','0000-00-00 00:00:00'),(76,'6','82','0000-00-00 00:00:00'),(77,'6','83','0000-00-00 00:00:00'),(78,'7','1','0000-00-00 00:00:00'),(79,'7','32','0000-00-00 00:00:00'),(80,'7','33','0000-00-00 00:00:00'),(81,'7','43','0000-00-00 00:00:00'),(82,'7','44','0000-00-00 00:00:00'),(83,'7','53','0000-00-00 00:00:00'),(84,'7','63','0000-00-00 00:00:00'),(85,'7','64','0000-00-00 00:00:00'),(86,'7','82','0000-00-00 00:00:00'),(87,'7','83','0000-00-00 00:00:00'),(88,'8','1','0000-00-00 00:00:00'),(89,'8','32','0000-00-00 00:00:00'),(90,'8','33','0000-00-00 00:00:00'),(91,'8','43','0000-00-00 00:00:00'),(92,'8','44','0000-00-00 00:00:00'),(93,'8','53','0000-00-00 00:00:00'),(94,'8','63','0000-00-00 00:00:00'),(95,'8','64','0000-00-00 00:00:00'),(96,'8','82','0000-00-00 00:00:00'),(97,'8','83','0000-00-00 00:00:00'),(98,'9','51','0000-00-00 00:00:00'),(99,'9','52','0000-00-00 00:00:00'),(100,'9','61','0000-00-00 00:00:00'),(101,'9','62','0000-00-00 00:00:00'),(102,'9','71','0000-00-00 00:00:00'),(103,'9','72','0000-00-00 00:00:00'),(104,'ro','men','0000-00-00 00:00:00');

/*Data for the table `roles` */

insert  into `roles`(`id`,`role_id`,`role_name`,`date_insert`,`user_submit`) values (1,'1','Programmer','2024-08-27 14:34:00','abot'),(2,'2','Administrator','2024-08-27 14:34:00','abot'),(3,'3','Admin Pegawai','2024-08-27 14:34:00','abot'),(4,'4','Admin Absen','2024-08-27 14:34:00','abot'),(5,'5','Admin Payrol','2024-08-27 14:34:00','abot'),(6,'6','Manager','2024-08-27 14:34:00','abot'),(7,'7','Kabag','2024-08-27 14:34:00','abot'),(8,'8','Kasie','2024-08-27 14:34:00','abot'),(9,'9','User','2024-08-27 14:34:00','abot');

/*Data for the table `z_user` */

insert  into `z_user`(`id`,`user`,`pass`,`email`,`aktif`,`r_user`,`IDPEG`,`tgl_dibuat`,`tgl_terakhir_login`) values (1,'hari','$2y$10$yK6HbVFCPniBTSE.aHbekOc63lpptB/6VNCnKRA6S9rmDMd20U7DC','hari@gmail.com\r\n','Y',1,NULL,'0000-00-00 00:00:00','2024-12-03 16:05:53'),(2,'abot','$2y$10$kMVqTbThlFn07vYMj5nWp.o06RQeuQ06MnFL2Xrajkk9QYeVPA2C2','abot@gmail.com','Y',1,'-','0000-00-00 00:00:00','2024-12-04 07:29:18'),(3,'ipong','$2y$10$yK6HbVFCPniBTSE.aHbekOc63lpptB/6VNCnKRA6S9rmDMd20U7DC','irfan@gmail.com','Y',2,'-','2024-12-02 20:44:40','2024-12-03 23:13:05'),(4,'admpeg','$2y$10$n9mjQaaIK9dKmHV.VjIXh.CfpGUhl1bkcy/5Yt5i3o5NhabkaaJ3y','admpeg@gmail.com','Y',3,'-','2024-12-02 20:45:10',NULL),(5,'admabs','$2y$10$yK6HbVFCPniBTSE.aHbekOc63lpptB/6VNCnKRA6S9rmDMd20U7DC','admabs@gmail.com','Y',4,'-','2024-12-02 20:45:55',NULL),(6,'admpay','$2y$10$yK6HbVFCPniBTSE.aHbekOc63lpptB/6VNCnKRA6S9rmDMd20U7DC','admpay@gmail.com','Y',5,'-','2024-12-02 20:46:28',NULL),(7,'bos','$2y$10$ZrxO8BQ3nmv8iRrgu./tlObgtn.gxmwTYYS1gmfsCN0XNOEpeIal6','bos@gmail.com','Y',6,'peg0000001','2024-12-02 20:47:15','2024-12-03 16:05:28'),(14,'tes','$2y$10$DtknN5v4aIS60B6pSAcL.u9S5qzCMia84SdWjTt5s86ZFZ4mlkUCO','test@gmail.com','N',8,'-','2024-12-03 23:52:58',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
