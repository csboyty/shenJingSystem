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

#
# Source for table diagnose_info
#

DROP TABLE IF EXISTS `diagnose_info`;
CREATE TABLE `diagnose_info` (
  `patient_id` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `diagnose_info` VALUES (9,'{\"buFenFaZuo\":{\"yunDongZhengZhuang\":[\"自动症\"],\"feiYunDongZhengZhuang\":[\"自主神经性发作\"]}}','{\"buWei\":{},\"quanMian\":{},\"buNeng\":{},\"teShu\":{}}','{\"persistent\":\"无\"}');
/*!40000 ALTER TABLE `diagnose_info` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table diagnose_process
#

DROP TABLE IF EXISTS `diagnose_process`;
CREATE TABLE `diagnose_process` (
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `check_result` longtext COMMENT '检查结果',
  `treatment_options` longtext,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='诊断流程表';

#
# Dumping data for table diagnose_process
#
LOCK TABLES `diagnose_process` WRITE;
/*!40000 ALTER TABLE `diagnose_process` DISABLE KEYS */;

INSERT INTO `diagnose_process` VALUES (9,'{\"xueNongDu\":[\"\",\"\",\"\",\"\",\"\",\"\",\"\"],\"xueChangGui\":[[\"\",null,null],[\"\",null,null],[\"\",null,null],[\"\",null,null]],\"xueShengHua\":[[\"test\",\"23\",\"mg\",\"否\",\"否\"]],\"other\":{\"touLu\":\"有异常\",\"EEG\":\"有异常\",\"touLuFiles\":[],\"EEGFiles\":[]}}','{\"drugInfo\":[],\"otherDrug\":\"\"}');
/*!40000 ALTER TABLE `diagnose_process` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table medical
#

DROP TABLE IF EXISTS `medical`;
CREATE TABLE `medical` (
  `patient_id` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `medical` VALUES (9,'{\"firstInfo\":{\"age\":\"34\",\"date\":\"2017-08-26\"},\"performance\":{\"elementUnChange\":[\"觉醒与睡眠\"],\"elementChange\":[\"精神因素\"],\"foreboding\":\"有\",\"sheYaoShang\":\"无\",\"durationUnit\":\"秒\",\"frequencyUnit\":\"次/年\",\"shouCiFaZuoGaiBian\":\"有\",\"chiXu\":\"有\",\"cengFuYao\":\"有\",\"sideEffect\":\"有\",\"sideEffectType\":\"不能\",\"dependency\":\"不好\",\"stop\":\"是\",\"stopMeasureValue\":\"中药\",\"stopMeasure\":\"其他\",\"faZuoFiles\":[]},\"drugInfos\":[],\"chiXuDrugInfos\":[[\"地西泮\",\"23mg/次\",\"4\"]]}','{\"historyPast\":{\"medical\":[\"脑寄生虫\"],\"otherMedical\":\"                                         \",\"drug\":\"                                         \"},\"historyPersonal\":{},\"historyFamily\":{\"ziNvMing\":\" \",\"xiongDiMing\":\" \"}}','{\"normal\":{\"T\":\"233\"},\"profession\":{}}');
/*!40000 ALTER TABLE `medical` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table patient_info
#

DROP TABLE IF EXISTS `patient_info`;
CREATE TABLE `patient_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(32) DEFAULT '',
  `create_at` date DEFAULT '0000-00-00',
  `fullname` varchar(255) DEFAULT '',
  `sex` varchar(8) DEFAULT 'MALE' COMMENT 'MALE,FEMALE',
  `age` int(11) DEFAULT '0',
  `education` varchar(8) DEFAULT '大专以上' COMMENT '文盲，小学，初中，高中，大专以上',
  `profession` varchar(32) DEFAULT '其他' COMMENT '医务工作者，教师，学生，农林牧副渔业，工人，军人，商人，政府机关工作人员，其他',
  `marriage` varchar(2) DEFAULT '已婚' COMMENT '未婚，已婚，离异，分居，丧偶',
  `relatives_count` int(11) DEFAULT '0' COMMENT '子女，姐妹数量',
  `address` varchar(64) DEFAULT '',
  `tel` varchar(15) DEFAULT '',
  `contact` varchar(32) DEFAULT '',
  `patient_no` varchar(32) DEFAULT NULL COMMENT '门诊号',
  `ad` varchar(32) DEFAULT NULL COMMENT '住院号',
  `dna_no` varchar(32) DEFAULT NULL,
  `other_no` varchar(32) DEFAULT NULL,
  `qq` varchar(12) DEFAULT NULL,
  `weixin` varchar(12) DEFAULT NULL,
  `memo` varchar(8) DEFAULT '[0,0]' COMMENT '显示图标',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='患者信息表';

#
# Dumping data for table patient_info
#
LOCK TABLES `patient_info` WRITE;
/*!40000 ALTER TABLE `patient_info` DISABLE KEYS */;

INSERT INTO `patient_info` VALUES (9,'0000001','2017-08-19','adddd','女',34,'大专以上','医务工作者','已婚',NULL,'','19993332233','',NULL,NULL,NULL,NULL,NULL,NULL,'[0,1]');
/*!40000 ALTER TABLE `patient_info` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table return_info
#

DROP TABLE IF EXISTS `return_info`;
CREATE TABLE `return_info` (
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `treatment_effect` longtext COMMENT '治疗效果',
  `check_result` longtext COMMENT '检查结果',
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='随访记录';

#
# Dumping data for table return_info
#
LOCK TABLES `return_info` WRITE;
/*!40000 ALTER TABLE `return_info` DISABLE KEYS */;

INSERT INTO `return_info` VALUES (9,'[[\"2017-08-17\",\"233\",\"33\",\"233\",\"23\"]]','[{\"date\":\"2017-09-09\",\"other\":{},\"xueChangGui\":[[\"\",null,null],[\"\",null,null],[\"\",null,null],[\"\",null,null]],\"xueShengHua\":[[\"test\",\"23\",\"mg\",\"\\u5426\",\"\\u5426\"]],\"recordIndex\":\"0\"}]');
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
