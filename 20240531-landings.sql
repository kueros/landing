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



---
--- Creacion de Vistas para el tablero.
---

/*DROP TABLE IF EXISTS `v_ord_create_all`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_ord_create_all` AS select ((select `woo_order`.`id_tienda` from `woo_order`) + (select `order_in`.`store_id` from `order_in`)) AS `tiendas`,((select `woo_order`.`tracking_id` from `woo_order`) + (select `order_in`.`order_id` from `order_in`)) AS `etiqueta`,((select `woo_order`.`shipment_id` from `woo_order`) + (select `order_in`.`order_nro` from `order_in`)) AS `nro_orden`,((select `woo_order`.`code` from `woo_order`) + (select `order_in`.`respcode` from `order_in`)) AS `codigo`,((select `woo_order`.`updated_at` from `woo_order`) + (select `order_in`.`updated_at` from `order_in`)) AS `fecha`;
*/

CREATE VIEW shf_last_3_month AS
SELECT * FROM order_in WHERE updated_at >= DATE_SUB(NOW(), INTERVAL 3 MONTH);


CREATE VIEW woo_last_3_month AS
SELECT * FROM woo_order WHERE updated_at >= DATE_SUB(NOW(), INTERVAL 3 MONTH);





CREATE VIEW v_count_orders
select COUNT(*) from `woo_order` WHERE tracking_id IS  NULL) + (select COUNT(*) from `order_in` WHERE trackid IS  NULL )) AS `CREADAS`,
select COUNT(*) from `woo_order` WHERE tracking_id IS  NULL) + (select COUNT(*) from `order_in` WHERE trackid IS  NULL )) AS `NO CREADAS`;