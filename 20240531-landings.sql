--
-- Table structure for table `landings`
--

DROP TABLE IF EXISTS `landings`;
CREATE TABLE `landings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plataforma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_dashboard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_instalador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landings`
--

LOCK TABLES `landings` WRITE;
INSERT INTO `landings` VALUES (1,'shopify','sf_dash','sf_inst','2024-05-31 13:08:00','2024-05-31 13:08:00'),(2,'tiendanube','tn_dash','tn_inst','2024-05-31 13:08:00','2024-05-31 13:08:00'),(3,'magento','magento_dash','magento_inst','2024-05-31 13:08:00','2024-05-31 13:08:00'),(4,'woocommerce','wc_dash','wc_inst','2024-05-31 13:08:00','2024-05-31 13:08:00'),(5,'integracion directa','id_dash','id_inst','2024-05-31 13:08:00','2024-05-31 13:08:00');
UNLOCK TABLES;
