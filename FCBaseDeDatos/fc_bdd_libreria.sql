/*
 Navicat Premium Data Transfer

 Source Server         : MySql
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : fc_bdd_libreria

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 24/09/2020 22:06:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fc_tbl_autor
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_autor`;
CREATE TABLE `fc_tbl_autor`  (
  `id_aut` int(0) NOT NULL AUTO_INCREMENT,
  `nom_aut` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `des_aut` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `est_aut` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_aut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fc_tbl_autor
-- ----------------------------
INSERT INTO `fc_tbl_autor` VALUES (16, 'Angel David Revilla', 'Escritor de yooutube', 'A');
INSERT INTO `fc_tbl_autor` VALUES (18, 'H R R Tolkien', 'Escritor de fantasia', 'A');
INSERT INTO `fc_tbl_autor` VALUES (19, 'Howard Pilips Lovecraft', 'Escritor de misterio y terror', 'A');
INSERT INTO `fc_tbl_autor` VALUES (22, 'J K Rowling', 'Escritora de literatura fantástica', 'A');
INSERT INTO `fc_tbl_autor` VALUES (24, 'James Dashner', 'Escritor de novelas de terror', 'A');

-- ----------------------------
-- Table structure for fc_tbl_autor_libro
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_autor_libro`;
CREATE TABLE `fc_tbl_autor_libro`  (
  `id_aul` int(0) NOT NULL AUTO_INCREMENT,
  `id_aut_aul` int(0) NOT NULL,
  `id_lib_aul` int(0) NOT NULL,
  `id_tau_aul` int(0) NOT NULL,
  `est_aul` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_aul`) USING BTREE,
  INDEX `fk_aul_lib`(`id_lib_aul`) USING BTREE,
  INDEX `fk_aul_aut`(`id_aut_aul`) USING BTREE,
  INDEX `fk_aul_tau`(`id_tau_aul`) USING BTREE,
  CONSTRAINT `fk_aul_aut` FOREIGN KEY (`id_aut_aul`) REFERENCES `fc_tbl_autor` (`id_aut`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_aul_lib` FOREIGN KEY (`id_lib_aul`) REFERENCES `fc_tbl_libro` (`id_lib`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_aul_tau` FOREIGN KEY (`id_tau_aul`) REFERENCES `fc_tbl_tipoautor` (`id_tau`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 116 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fc_tbl_autor_libro
-- ----------------------------
INSERT INTO `fc_tbl_autor_libro` VALUES (99, 18, 186, 5, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (106, 19, 188, 4, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (107, 16, 188, 5, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (110, 16, 189, 5, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (111, 19, 190, 4, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (112, 18, 190, 5, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (114, 18, 191, 5, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (115, 19, 191, 5, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (117, 22, 192, 5, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (118, 24, 193, 4, 'A');
INSERT INTO `fc_tbl_autor_libro` VALUES (119, 19, 193, 5, 'A');

-- ----------------------------
-- Table structure for fc_tbl_categoria
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_categoria`;
CREATE TABLE `fc_tbl_categoria`  (
  `id_cat` int(0) NOT NULL AUTO_INCREMENT,
  `des_cat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `est_cat` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_cat`) USING BTREE,
  INDEX `id_cat`(`id_cat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fc_tbl_categoria
-- ----------------------------
INSERT INTO `fc_tbl_categoria` VALUES (3, 'Terror', 'A');
INSERT INTO `fc_tbl_categoria` VALUES (4, 'Ficcion', 'A');
INSERT INTO `fc_tbl_categoria` VALUES (5, 'Accion', 'A');
INSERT INTO `fc_tbl_categoria` VALUES (6, 'Superacion', 'A');
INSERT INTO `fc_tbl_categoria` VALUES (7, 'Académico', 'A');
INSERT INTO `fc_tbl_categoria` VALUES (8, 'Novela ligera', 'A');
INSERT INTO `fc_tbl_categoria` VALUES (9, 'Manga', 'A');
INSERT INTO `fc_tbl_categoria` VALUES (10, 'Comic', 'A');
INSERT INTO `fc_tbl_categoria` VALUES (11, 'Fantásitco', 'A');

-- ----------------------------
-- Table structure for fc_tbl_editorial
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_editorial`;
CREATE TABLE `fc_tbl_editorial`  (
  `id_edi` int(0) NOT NULL AUTO_INCREMENT,
  `cod_edi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `des_edi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `est_edi` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`cod_edi`) USING BTREE,
  INDEX `auto`(`id_edi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fc_tbl_editorial
-- ----------------------------
INSERT INTO `fc_tbl_editorial` VALUES (8, 'E 001', 'Prueba3', 'A');
INSERT INTO `fc_tbl_editorial` VALUES (9, 'E 002', 'Planeta', 'A');
INSERT INTO `fc_tbl_editorial` VALUES (10, 'E 003', 'Arcoiris', 'A');
INSERT INTO `fc_tbl_editorial` VALUES (11, 'E 004', 'Darkside', 'A');

-- ----------------------------
-- Table structure for fc_tbl_libro
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_libro`;
CREATE TABLE `fc_tbl_libro`  (
  `id_lib` int(0) NOT NULL AUTO_INCREMENT,
  `isb_lib` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tit_lib` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `apu_lib` date NULL DEFAULT NULL,
  `edc_lib` int(0) NULL DEFAULT NULL,
  `can_lib` int(0) NULL DEFAULT NULL,
  `pre_lib` decimal(10, 2) NULL DEFAULT NULL,
  `est_lib` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_cat_lib` int(0) NULL DEFAULT NULL,
  `cod_edi_lib` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_lib`) USING BTREE,
  INDEX `fk_cod_lib`(`cod_edi_lib`) USING BTREE,
  INDEX `fk_cat_lib`(`id_cat_lib`) USING BTREE,
  CONSTRAINT `fk_cat_lib` FOREIGN KEY (`id_cat_lib`) REFERENCES `fc_tbl_categoria` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cod_lib` FOREIGN KEY (`cod_edi_lib`) REFERENCES `fc_tbl_editorial` (`cod_edi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 193 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fc_tbl_libro
-- ----------------------------
INSERT INTO `fc_tbl_libro` VALUES (186, '65654165165', 'Harry Potter y la piedra filosofal', '2020-04-01', 12, 21, 12.00, 'A', 11, 'E 002');
INSERT INTO `fc_tbl_libro` VALUES (188, '68463565', 'La Guerra de los mundos', '1922-07-08', 32, 1, 213.00, 'A', 5, 'E 002');
INSERT INTO `fc_tbl_libro` VALUES (189, '65464654848', 'Harry Potter y el cáliz de fuego', '1998-08-07', 3, 125, 12.00, 'A', 11, 'E 002');
INSERT INTO `fc_tbl_libro` VALUES (190, '4365654516', 'EL conjuro', '1990-08-04', 5, 21, 320.00, 'A', 3, 'E 002');
INSERT INTO `fc_tbl_libro` VALUES (191, '67464654813651', 'Harry Potter y el prisionero de azkaban', '2019-07-08', 4, 33, 15.00, 'A', 6, 'E 002');
INSERT INTO `fc_tbl_libro` VALUES (192, '656465', 'Harry Potter', '1998-08-04', 1, 321, 13.00, 'A', 11, 'E 002');
INSERT INTO `fc_tbl_libro` VALUES (193, '891465165', 'Correr o Morir', '1993-08-07', 5, 325, 45.00, 'A', 3, 'E 002');

-- ----------------------------
-- Table structure for fc_tbl_rol
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_rol`;
CREATE TABLE `fc_tbl_rol`  (
  `id_rol` int(0) NOT NULL AUTO_INCREMENT,
  `des_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `est_rol` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fc_tbl_rol
-- ----------------------------
INSERT INTO `fc_tbl_rol` VALUES (3, 'Administrador', 'A');
INSERT INTO `fc_tbl_rol` VALUES (4, 'Venderdor', 'A');

-- ----------------------------
-- Table structure for fc_tbl_tipoautor
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_tipoautor`;
CREATE TABLE `fc_tbl_tipoautor`  (
  `id_tau` int(0) NOT NULL AUTO_INCREMENT,
  `des_tau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `est_tau` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tau`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fc_tbl_tipoautor
-- ----------------------------
INSERT INTO `fc_tbl_tipoautor` VALUES (4, 'Principal', 'A');
INSERT INTO `fc_tbl_tipoautor` VALUES (5, 'Coautor', 'A');

-- ----------------------------
-- Table structure for fc_tbl_usuario
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_usuario`;
CREATE TABLE `fc_tbl_usuario`  (
  `id_usu` int(0) NOT NULL AUTO_INCREMENT,
  `dni_usu` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `nom_usu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `usu_usu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `pass_usu` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_rol_usu` int(0) NULL DEFAULT NULL,
  `est_usu` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_usu`) USING BTREE,
  INDEX `fk_rol_per`(`id_rol_usu`) USING BTREE,
  CONSTRAINT `fk_rol_per` FOREIGN KEY (`id_rol_usu`) REFERENCES `fc_tbl_rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fc_tbl_usuario
-- ----------------------------
INSERT INTO `fc_tbl_usuario` VALUES (1, '1723609358', 'Fernando Chicaiza', 'fchicaiza', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3, 'A');

-- ----------------------------
-- Table structure for fc_tbl_venta
-- ----------------------------
DROP TABLE IF EXISTS `fc_tbl_venta`;
CREATE TABLE `fc_tbl_venta`  (
  `id_ven` int(0) NOT NULL,
  `fec_ven` date NULL DEFAULT NULL,
  `est_ven` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_per_ven` int(0) NULL DEFAULT NULL,
  `id_lib_ven` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_ven`) USING BTREE,
  INDEX `fk_per_ven`(`id_per_ven`) USING BTREE,
  INDEX `fk_lib_ven`(`id_lib_ven`) USING BTREE,
  CONSTRAINT `fk_lib_ven` FOREIGN KEY (`id_lib_ven`) REFERENCES `fc_tbl_libro` (`id_lib`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Procedure structure for sp_actualizarLibros
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_actualizarLibros`;
delimiter ;;
CREATE PROCEDURE `sp_actualizarLibros`(in id int,
in isbn varchar (100),
in titulo varchar (100),
in publicacion date,
in edicion int,
in cantidad int,
in precio DECIMAL(10,2),
in estado char (1),
in categoria int,
in editorial int,
in autor int,
in tipo int)
begin
UPDATE
fc_tbl_libro
    INNER JOIN fc_tbl_categoria 
        ON (fc_tbl_libro.id_cat_lib = fc_tbl_categoria.id_cat)
    INNER JOIN fc_tbl_editorial 
        ON (fc_tbl_libro.cod_edi_lib = fc_tbl_editorial.cod_edi)
    INNER JOIN fc_tbl_autor_libro 
        ON (fc_tbl_autor_libro.id_lib_aul = fc_tbl_libro.id_lib)
SET 
		 fc_tbl_libro.isb_lib = isbn,
     fc_tbl_libro.tit_lib = titulo,
     fc_tbl_libro.apu_lib = publicacion,
     fc_tbl_libro.edc_lib = edicion,
     fc_tbl_libro.can_lib = cantidad,
     fc_tbl_libro.pre_lib = precio,
     fc_tbl_libro.est_lib = estado,
     fc_tbl_libro.id_cat_lib = categoria,
     fc_tbl_libro.cod_edi_lib = editorial,
		 fc_tbl_autor_libro.id_aut_aul = autor,
		 fc_tbl_autor_libro.id_tau_aul = tipo
		 
		 	WHERE fc_tbl_autor_libro.id_lib_aul = id;
	end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_BuscarlibroId
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_BuscarlibroId`;
delimiter ;;
CREATE PROCEDURE `sp_BuscarlibroId`(in id int)
begin
SELECT 
fc_tbl_libro.id_lib,
fc_tbl_libro.isb_lib,
  `fc_tbl_libro`.`tit_lib`,
  `fc_tbl_libro`.`apu_lib`,
  `fc_tbl_libro`.`edc_lib`,
  `fc_tbl_libro`.`can_lib`,
  `fc_tbl_libro`.`pre_lib`,
  `fc_tbl_libro`.`est_lib`,
  `fc_tbl_autor`.`nom_aut`,
  `fc_tbl_tipoautor`.`des_tau`,
  `fc_tbl_categoria`.`des_cat`,
  `fc_tbl_editorial`.`des_edi`,
  `fc_tbl_editorial`.`cod_edi`,
  `fc_tbl_autor_libro`.`id_aut_aul`,
  `fc_tbl_autor_libro`.`id_lib_aul`,
  `fc_tbl_autor_libro`.`id_tau_aul`,
  `fc_tbl_editorial`.`id_edi`,
  `fc_tbl_categoria`.`id_cat`,
  `fc_tbl_tipoautor`.`id_tau`,
  `fc_tbl_autor`.`id_aut`
FROM
  `fc_tbl_autor_libro`
  INNER JOIN `fc_tbl_libro`
    ON (
      `fc_tbl_autor_libro`.`id_lib_aul` = `fc_tbl_libro`.`id_lib`
    )
  INNER JOIN `fc_tbl_autor`
    ON (
      `fc_tbl_autor_libro`.`id_aut_aul` = `fc_tbl_autor`.`id_aut`
    )
  INNER JOIN `fc_tbl_tipoautor`
    ON (
      `fc_tbl_autor_libro`.`id_tau_aul` = `fc_tbl_tipoautor`.`id_tau`
    )
  INNER JOIN `fc_tbl_categoria`
    ON (
      `fc_tbl_libro`.`id_cat_lib` = `fc_tbl_categoria`.`id_cat`
    )
  INNER JOIN `fc_tbl_editorial`
    ON (
      `fc_tbl_libro`.`cod_edi_lib` = `fc_tbl_editorial`.`cod_edi`
    ) WHERE `fc_tbl_autor_libro`.`id_lib_aul` = id;
		end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_insertarLibro
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_insertarLibro`;
delimiter ;;
CREATE PROCEDURE `sp_insertarLibro`(in isbn varchar(100),
in titulo varchar(100),
in publicacion date,
in edicion int,
in cantidad int,
in precio int,
in estado char (1),
in categoria int,
in editorial varchar (100) ,
in autor int,
in tipo int,
in estau char(1))
begin
INSERT INTO fc_tbl_libro (isb_lib, tit_lib, apu_lib, edc_lib,can_lib,pre_lib,est_lib, id_cat_lib, cod_edi_lib) 
VALUES (isbn,titulo,publicacion,edicion,cantidad,precio,estado,categoria,editorial);
INSERT INTO fc_tbl_autor_libro (id_aut_aul, id_lib_aul,id_tau_aul,est_aul) VALUES (autor,LAST_INSERT_ID(), tipo,estau);
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_ListaInsertados
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_ListaInsertados`;
delimiter ;;
CREATE PROCEDURE `sp_ListaInsertados`()
begin
SELECT
  `fc_tbl_libro`.`tit_lib`,
  `fc_tbl_autor`.`nom_aut`,
  `fc_tbl_categoria`.`des_cat`,
  `fc_tbl_tipoautor`.`des_tau`,
  `fc_tbl_libro`.`id_lib`
FROM
  `fc_tbl_autor_libro`
  INNER JOIN `fc_tbl_libro`
    ON (
      `fc_tbl_autor_libro`.`id_lib_aul` = `fc_tbl_libro`.`id_lib`
    )
  INNER JOIN `fc_tbl_autor`
    ON (
      `fc_tbl_autor_libro`.`id_aut_aul` = `fc_tbl_autor`.`id_aut`
    )
  INNER JOIN `fc_tbl_categoria`
    ON (
      `fc_tbl_libro`.`id_cat_lib` = `fc_tbl_categoria`.`id_cat`
    )
  INNER JOIN `fc_tbl_tipoautor`
    ON (
      `fc_tbl_autor_libro`.`id_tau_aul` = `fc_tbl_tipoautor`.`id_tau`
    )
		
			Where id_lib = (SELECT MAX(id_lib)  FROM fc_tbl_libro);
		
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
