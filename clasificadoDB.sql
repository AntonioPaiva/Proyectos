-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2014 a las 17:31:24
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clasificado2014`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(150) DEFAULT NULL,
  `cat_visible` tinyint(1) DEFAULT '1',
  `cat_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `cat_nombre`, `cat_visible`, `cat_created_at`) VALUES
(1, 'Informatica', 1, '2014-10-11 19:41:07'),
(2, 'Electronica', 1, '2014-10-25 19:18:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad_nombre` varchar(150) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `ciudad_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_departamento` (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `ciudad_nombre`, `departamento_id`, `ciudad_created_at`) VALUES
(1, 'Luque', 11, '2014-10-11 19:39:07'),
(2, 'Asuncion', 18, '2014-10-25 17:57:06'),
(3, 'Fernando de la Mora', 11, '2014-10-25 18:00:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart_nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `depart_nombre`) VALUES
(1, 'Concepción'),
(2, 'San Pedro'),
(3, 'Cordillera'),
(4, 'Guaira'),
(5, 'Caaguazu'),
(6, 'Caazapa'),
(7, 'Itapua'),
(8, 'Misiones'),
(9, 'Paraguari'),
(10, 'Alto Parana'),
(11, 'Central'),
(12, 'Ñeembucu'),
(13, 'Amambay'),
(14, 'Canindeyu'),
(15, 'Pte. Hayes'),
(16, 'Alta Paraguay'),
(17, 'Boqueron'),
(18, 'Capital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `sub_categoria_id` int(11) NOT NULL,
  `prod_nombre` varchar(150) NOT NULL,
  `ciudad_id` int(11) NOT NULL,
  `prod_descripcion_corta` varchar(255) NOT NULL,
  `prod_descripcion_larga` text NOT NULL,
  `prod_precio` float(12,2) unsigned NOT NULL,
  `prod_zona` varchar(150) NOT NULL,
  `oferente_id` int(11) NOT NULL,
  `prod_status` tinyint(1) NOT NULL DEFAULT '1',
  `prod_visible` tinyint(1) NOT NULL DEFAULT '1',
  `prod_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `prod_subcat_id` (`sub_categoria_id`),
  KEY `prod_ciudades_id` (`ciudad_id`),
  KEY `prod_cliente_id` (`cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `cliente_id`, `sub_categoria_id`, `prod_nombre`, `ciudad_id`, `prod_descripcion_corta`, `prod_descripcion_larga`, `prod_precio`, `prod_zona`, `oferente_id`, `prod_status`, `prod_visible`, `prod_created_at`) VALUES
(1, 1, 1, 'telescopio', 1, 'lindo telescopio', 'lindo telescopio lindo telescopio', 1500000.00, 'Mercado 4', 1, 1, 1, '2014-10-11 19:51:39'),
(2, 1, 1, 'telescopio', 1, 'lindo telescopio', 'lindo telescopio lindo telescopio', 1500000.00, 'Mercado 4', 1, 1, 1, '2014-10-12 02:23:47'),
(3, 1, 1, 'telescopio', 1, 'lindo telescopio', 'lindo telescopio lindo telescopio', 1500000.00, 'Mercado 4', 1, 1, 1, '2014-10-14 23:52:38'),
(4, 1, 1, 'telescopio', 1, 'lindo telescopio', 'lindo telescopio lindo telescopio', 1500000.00, 'Mercado 4', 1, 1, 1, '2014-10-18 16:32:54'),
(5, 1, 1, 'Notebook Razer Gamer', 2, 'Está muy buena                     ', 'Está muy buena    Está muy buena    Está muy buena    Está muy buena    Está muy buena    ', 5500000.00, 'Galería Central', 2, 1, 1, '2014-11-08 19:11:50'),
(6, 1, 1, 'Mouse Gamer Logitech', 2, 'kdjflasjdf asdjfa sd                    ', 'skdjflskdj sadjf skdjf ksdjf                     ', 180000.00, 'Galería Central', 2, 1, 1, '2014-11-08 19:13:52'),
(7, 1, 1, 'Notebook Acer', 2, 'jlkasjdfaskj kdsfjsk ksdfk sdjf slkdjf lskdf lskdjf                     ', 'lksdfjas laskdjf lsajdflk sadjfskdjf sldjf slkdjf sldk fj                    ', 3500000.00, 'Galería Central', 1, 1, 1, '2014-11-08 19:20:43'),
(8, 1, 1, 'Netbook Acer', 1, 'Linda   ', 'Muy linda', 4500.00, 'Loma', 2, 1, 1, '2014-11-15 19:14:44'),
(9, 1, 1, 'Netbook Acer', 2, 'asdfasdfas asdfasdf asdfasdfa asdfasdf      ', 'asdfasdfas asdfasdfasdf asdfasdfasdf     ', 5000000.00, 'Plaza', 2, 1, 1, '2014-11-22 17:16:50'),
(10, 1, 1, 'Netbook', 1, '   dsfasdf asdfasdf                 ', 'asasdfasdfasdf asdf asdf asdf ', 4500000.00, 'Mercado', 2, 1, 1, '2014-11-22 18:23:22'),
(11, 1, 1, 'Laptop Acer', 2, 'Linda Notebook', 'Muy linda Notebook', 2500000.00, 'Centro', 2, 1, 1, '2014-11-29 17:28:33'),
(12, 1, 1, 'dasd', 1, '                    asdasd', '                asdasd    ', 0.00, 'dASDAsd', 1, 1, 1, '2014-11-29 18:51:23'),
(13, 1, 1, 'Netbook HP', 2, 'Muy linda Notebook', 'Muy linda Notebook', 5000000.00, 'Centro', 2, 1, 1, '2014-12-06 17:06:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_imagenes`
--

CREATE TABLE IF NOT EXISTS `productos_imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_visible` tinyint(1) NOT NULL DEFAULT '1',
  `image_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `productos_imagenes`
--

INSERT INTO `productos_imagenes` (`id`, `producto_id`, `image_path`, `image_visible`, `image_created_at`) VALUES
(4, 10, 'productos/1/10/Netbook_24034a5b6cd87b759b34b06f4ed8bb87.jpg', 1, '2014-11-22 19:17:53'),
(5, 10, 'productos/1/10//Netbook_d63ed908a37d9dd05e81e8cde3d36680.jpg', 1, '2014-11-22 19:48:03'),
(6, 10, 'productos/1/10//Netbook_d4986d7278bba96490beb8ca434f3ef7.jpg', 1, '2014-11-22 19:51:44'),
(7, 11, 'productos/1/11//LaptopAcer_6113e1e838eb9cf096d5ca6b7e2af6e3.jpg', 1, '2014-11-29 17:29:39'),
(8, 11, 'productos/1/11//LaptopAcer_2a75b252c2a1c3ab6e32679891c1ec01.jpg', 1, '2014-11-29 17:35:13'),
(9, 12, 'productos/1/12//dasd_f755305e2f4554433fad83d3d1818e1c.jpg', 1, '2014-11-29 18:51:59'),
(10, 12, 'productos/1/12//dasd_e61f62448ee6053464c90df78a8255ab.jpg', 1, '2014-11-29 18:55:33'),
(11, 12, 'productos/1/12//dasd_dca1fafc84102e50aa64a44cf88333c1.jpg', 1, '2014-11-29 19:11:01'),
(12, 13, 'productos/1/13//NetbookHP_03e1ca3b922e38d872d30ac32d620b9a.jpg', 1, '2014-12-06 17:13:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categorias`
--

CREATE TABLE IF NOT EXISTS `sub_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `subcat_nombre` varchar(150) DEFAULT NULL,
  `subcat_visible` tinyint(1) DEFAULT '1',
  `subcat_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sub_cat_id` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `categoria_id`, `subcat_nombre`, `subcat_visible`, `subcat_created_at`) VALUES
(1, 1, 'Notebook', 1, '2014-10-11 19:41:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(150) NOT NULL,
  `usu_email` varchar(150) NOT NULL,
  `usu_password` varchar(42) NOT NULL,
  `usu_tipo_usuario` int(11) NOT NULL,
  `usu_visible` int(1) NOT NULL DEFAULT '1',
  `usu_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usu_email` (`usu_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usu_nombre`, `usu_email`, `usu_password`, `usu_tipo_usuario`, `usu_visible`, `usu_created_at`) VALUES
(1, 'Bernardo', 'baq1284@gmail.com', '03d000df4fa813c9d0c93e59a0ba3b6dc5c88399', 1, 1, '2014-09-13 20:21:57');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `id_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `prod_ciudades_id` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prod_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prod_subcat_id` FOREIGN KEY (`sub_categoria_id`) REFERENCES `sub_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD CONSTRAINT `sub_cat_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
