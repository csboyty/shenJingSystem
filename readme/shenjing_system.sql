# MySQL-Front 5.1  (Build 3.57)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: shenjing_system
# ------------------------------------------------------
# Server version 5.5.25a

DROP DATABASE IF EXISTS `shenjing_system`;
CREATE DATABASE `shenjing_system` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `shenjing_system`;

#
# Source for table diagnose_info
#

DROP TABLE IF EXISTS `diagnose_info`;
CREATE TABLE `diagnose_info` (
  `patient_id` varchar(32) NOT NULL DEFAULT '0',
  `attack_type` longtext COMMENT '发作类型',
  `type` longtext COMMENT '综合征类型',
  `status` longtext COMMENT '持续状态',
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='拟诊信息';

#
# Dumping data for table diagnose_info
#
LOCK TABLES `diagnose_info` WRITE;
/*!40000 ALTER TABLE `diagnose_info` DISABLE KEYS */;

INSERT INTO `diagnose_info` VALUES ('00001','{\"buNengFenLei\":\"{\\\"element\\\":[\\\"\\u5305\\u62ec\\u56e0\\u8d44\\u6599\\u4e0d\\u5168\\u800c\\u4e0d\\u80fd\\u5206\\u7c7b\\u7684\\u53d1\\u4f5c\\uff0c\\u4ee5\\u53ca\\u8fc4\\u4eca\\u6240\\u63cf\\u5199\\u7684\\u7c7b\\u578b\\u4e0d\\u80fd\\u5305\\u62ec\\u8005\\u3002\\u5982\\u67d0\\u4e9b\\u65b0\\u751f\\u513f\\u53d1\\u4f5c\\uff1a\\u8282\\u5f8b\\u6027\\u773c\\u52a8\\u3001\\u5480\\u56bc\\u53ca\\u6e38\\u6cf3\\u6837\\u8fd0\\u52a8\\\"]}\",\"quanMianFaZuo\":\"{\\\"shiShenFaZuo\\\":[\\\"\\u4ec5\\u6709\\u610f\\u8bc6\\u969c\\u788d\\\",\\\"\\u4f34\\u8f7b\\u5ea6\\u9635\\u631b\\\"],\\\"feiShiShenFaZuo\\\":[\\\"\\u53d1\\u75c5\\u5f00\\u59cb\\u53ca\\/\\u6216\\u7ec8\\u6b62\\u5747\\u4e0d\\u7a81\\u7136\\\",\\\"\\u5f3a\\u76f4\\uff0d\\u9635\\u631b\\u6027\\u53d1\\u4f5c\\\"]}\",\"buFenFaZuo\":\"{\\\"yunDongZhengZhuang\\\":[\\\"\\u6269\\u5c55\\u6027\\u5c40\\u7076\\u6027\\uff08jacksonian\\uff09\\\"],\\\"quTiGanJue\\\":[\\\"\\u542c\\u89c9\\u6027\\\"],\\\"ziZhuShenJing\\\":[\\\"\\u591a\\u6c57\\\"],\\\"jingShenZhengZhuang\\\":[\\\"\\u9519\\u89c9\\uff08\\u5982\\u89c6\\u7269\\u663e\\u5927\\u75c7\\uff09\\\"],\\\"yiShiZhangAi\\\":[\\\"\\u4f34\\u81ea\\u52a8\\u75c7\\\"],\\\"yiShiZhangAi1\\\":[\\\"\\u4f34\\u81ea\\u52a8\\u75c7\\\"],\\\"toQuanMianFaZuo\\\":[\\\"\\u590d\\u6742\\u90e8\\u5206\\u6027\\u53d1\\u4f5c\\u53d1\\u5c55\\u81f3\\u5168\\u9762\\u6027\\u53d1\\u4f5c\\\"]}\"}',NULL,'{\"persistent\":\"有\",\"count\":\"43\",\"type\":[\"复杂部分性发作持续状态\",\"肌阵挛性癫痫持续状态\"]}');
/*!40000 ALTER TABLE `diagnose_info` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table diagnose_process
#

DROP TABLE IF EXISTS `diagnose_process`;
CREATE TABLE `diagnose_process` (
  `patient_id` varchar(32) NOT NULL DEFAULT '0',
  `check_result` longtext COMMENT '检查结果',
  `treatment_options` longtext,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='诊断流程表';

#
# Dumping data for table diagnose_process
#
LOCK TABLES `diagnose_process` WRITE;
/*!40000 ALTER TABLE `diagnose_process` DISABLE KEYS */;

INSERT INTO `diagnose_process` VALUES ('00001','{\"xueChangGui\":\"[[\\\"23\\\",\\\"\\u662f\\\",\\\"\\u662f\\\"],[\\\"24\\\",\\\"\\u5426\\\",\\\"\\u5426\\\"],[\\\"25\\\",\\\"\\u662f\\\",\\\"\\u662f\\\"],[\\\"26\\\",\\\"\\u5426\\\",\\\"\\u5426\\\"]]\",\"xueNongDu\":\"[\\\"1\\\",\\\"2\\\",\\\"3\\\",\\\"4\\\",\\\"5\\\",\\\"6\\\",\\\"7\\\"]\",\"other\":\"{\\\"touLu\\\":\\\"\\u6709\\u5f02\\u5e38\\\",\\\"touLuYiChangeFangWei\\\":\\\"\\u53cc\\u4fa7\\\",\\\"touLuYiChangWeiZhi\\\":[\\\"\\u989e\\u53f6\\\"],\\\"EEG\\\":\\\"\\u6709\\u5f02\\u5e38\\\",\\\"EEGYiChangeFangWei\\\":\\\"\\u53f3\\\",\\\"EEGYiChangWeiZhi\\\":[\\\"\\u989e\\u53f6\\\"],\\\"EEGType\\\":\\\"\\u68d8\\uff0d\\u6162\\u6ce2\\\",\\\"EEGFrequency\\\":\\\"23\\\",\\\"naoJiYe\\\":\\\"\\u6709\\u5f02\\u5e38\\\",\\\"naoJiYeYaLi\\\":\\\"12\\\",\\\"naoJiYeYanSe\\\":\\\"\\u65e0\\u8272\\\",\\\"naoJiYeChunDu\\\":\\\"\\u6d51\\u6d4a\\\",\\\"naoJiYeDanBai\\\":\\\"1\\\",\\\"naoJiYeLvHuaWu\\\":\\\"2\\\",\\\"naoJiYeTang\\\":\\\"3\\\",\\\"naoJiYeXiBao\\\":\\\"4\\\",\\\"naoJiYeBaiXiBao\\\":\\\"5\\\",\\\"naoJiYeDanHe\\\":\\\"6\\\",\\\"naoJiYeDuoHe\\\":\\\"7\\\",\\\"naoJiYeXiBaoXue\\\":\\\"8\\\",\\\"TCD\\\":\\\"\\u6709\\u5f02\\u5e38\\\",\\\"other\\\":\\\"aadd\\\"}\"}','{\"otherDrug\":\"\\\"testatatt\\\"\",\"drugInfo\":\"[]\"}');
/*!40000 ALTER TABLE `diagnose_process` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table medical
#

DROP TABLE IF EXISTS `medical`;
CREATE TABLE `medical` (
  `patient_id` varchar(32) NOT NULL DEFAULT '0',
  `performance_info` longtext COMMENT '发作情况',
  `history_info` longtext COMMENT '病史情况',
  `examine_info` longtext COMMENT '检查情况',
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='病史信息';

#
# Dumping data for table medical
#
LOCK TABLES `medical` WRITE;
/*!40000 ALTER TABLE `medical` DISABLE KEYS */;

INSERT INTO `medical` VALUES ('00001','{\"firstInfo\":\"{\\\"age\\\":\\\"45\\\"}\"}','{\"historyPersonal\":\"{\\\"medical\\\":[\\\"\\u5bab\\u5185\\u7f3a\\u6c27\\\"]}\"}','{\"profession\":\"{\\\"shenJingYiChang\\\":\\\"\\u6709\\\",\\\"shenJingYangXing\\\":\\\"3333333333\\\"}\"}');
/*!40000 ALTER TABLE `medical` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table patient_info
#

DROP TABLE IF EXISTS `patient_info`;
CREATE TABLE `patient_info` (
  `id` varchar(32) NOT NULL DEFAULT '0',
  `create_at` date NOT NULL DEFAULT '0000-00-00',
  `fullname` varchar(255) NOT NULL DEFAULT '',
  `sex` varchar(8) NOT NULL DEFAULT 'MALE' COMMENT 'MALE,FEMALE',
  `age` int(11) NOT NULL DEFAULT '0',
  `education` varchar(8) NOT NULL DEFAULT '大专以上' COMMENT '文盲，小学，初中，高中，大专以上',
  `profession` varchar(32) NOT NULL DEFAULT '其他' COMMENT '医务工作者，教师，学生，农林牧副渔业，工人，军人，商人，政府机关工作人员，其他',
  `marriage` varchar(2) NOT NULL DEFAULT '已婚' COMMENT '未婚，已婚，离异，分居，丧偶',
  `relatives_count` int(11) NOT NULL DEFAULT '0' COMMENT '子女，姐妹数量',
  `address` varchar(64) NOT NULL DEFAULT '',
  `tel` varchar(15) NOT NULL DEFAULT '',
  `contact` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='患者信息表';

#
# Dumping data for table patient_info
#
LOCK TABLES `patient_info` WRITE;
/*!40000 ALTER TABLE `patient_info` DISABLE KEYS */;

INSERT INTO `patient_info` VALUES ('00001','2016-12-05','ad','男',34,'大专以上','医务工作者','已婚',22,'faaa','1222222222222','22');
INSERT INTO `patient_info` VALUES ('00002','2016-12-15','fadfad','男',20,'大专以上','医务工作者','已婚',3,'23qv','233222','243333333333');
/*!40000 ALTER TABLE `patient_info` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table return_info
#

DROP TABLE IF EXISTS `return_info`;
CREATE TABLE `return_info` (
  `patient_id` varchar(32) NOT NULL DEFAULT '0',
  `treatment_effect` longtext COMMENT '治疗效果',
  `check_result` longtext COMMENT '检查结果',
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='随访记录';

#
# Dumping data for table return_info
#
LOCK TABLES `return_info` WRITE;
/*!40000 ALTER TABLE `return_info` DISABLE KEYS */;

INSERT INTO `return_info` VALUES ('00001','{\"effectInfo\":\"[[\\\"2016-12-06\\\",\\\"23\\\",\\\"23\\\",\\\"23\\\",\\\"2333\\\"]]\"}','{\"2016-12-07\":\"{\\\"other\\\":{\\\"naoDianTu\\\":\\\"\\u52a8\\u6001\\\",\\\"jianChaRiQi\\\":\\\"2016-12-09\\\",\\\"jianChaHao\\\":\\\"11122222\\\",\\\"jianChaJieGuo\\\":\\\"\\u65e0\\u5f02\\u5e38\\\",\\\"jianChaJieGuoMiaoShu\\\":\\\"\\u4e00\\u5207\\u6b63\\u5e38\\\",\\\"qiTaJianCha\\\":\\\"\\u4e00\\u5207\\u6b63\\u5e38\\\"},\\\"xueChangGui\\\":[[\\\"1\\\",\\\"\\u662f\\\",null],[\\\"2\\\",\\\"\\u5426\\\",\\\"\\u662f\\\"],[\\\"3\\\",\\\"\\u5426\\\",\\\"\\u5426\\\"],[\\\"4\\\",null,\\\"\\u662f\\\"]],\\\"xueShengHua\\\":[[\\\"1\\\",\\\"\\u5426\\\",\\\"\\u662f\\\"],[\\\"2\\\",\\\"\\u5426\\\",\\\"\\u662f\\\"],[\\\"3\\\",\\\"\\u5426\\\",\\\"\\u662f\\\"],[\\\"4\\\",\\\"\\u5426\\\",null]]}\"}');
/*!40000 ALTER TABLE `return_info` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table user
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `role` varchar(12) NOT NULL DEFAULT 'USER',
  `auth_key` varchar(32) NOT NULL DEFAULT '',
  `fullname` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Dumping data for table user
#
LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` VALUES (2,'super_admin','$2y$13$xeZCUNWFePqVsFG/g7oWgu5vM2a/teY3x5un1uNSFnUxzGSW8S6Vy','SUPER_ADMIN','ft_9Jmc5JerGFqzwZSppx73an-FbVVHr','超级管理员');
INSERT INTO `user` VALUES (10,'test1','$2y$13$BLYeiMZukOrIM0QmXnb68eIQdVs9vbpMcn7vZtU05IFgm6860DczW','ADMIN','Bk4tzquPcht7_efaaZeiC1PdzaLmSvwf','测试用户');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

#
#  Foreign keys for table diagnose_info
#

ALTER TABLE `diagnose_info`
ADD CONSTRAINT `diagnose_info_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_info` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

#
#  Foreign keys for table diagnose_process
#

ALTER TABLE `diagnose_process`
ADD CONSTRAINT `diagnose_process_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_info` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

#
#  Foreign keys for table medical
#

ALTER TABLE `medical`
ADD CONSTRAINT `medical_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_info` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

#
#  Foreign keys for table return_info
#

ALTER TABLE `return_info`
ADD CONSTRAINT `return_info_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_info` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
