-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 02:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda_electronicos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Cat_Creacion` date DEFAULT NULL,
  `Cat_estado` enum('Activo','Inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `Cat_Creacion`, `Cat_estado`) VALUES
(1, 'Portátiles', '2025-07-04', 'Activo'),
(2, 'Computadores de escritorio', '2025-07-08', 'Activo'),
(3, 'Repuestos', '2025-07-06', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(13,0) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `id_pedido`, `id_producto`, `cantidad`, `subtotal`, `precio`) VALUES
(1, 2, 14, 4, 0, 200000),
(2, 43, 14, 2, 0, 2000000),
(3, 43, 15, 3, 0, 200000),
(4, 44, 14, 8, 0, 2000000),
(5, 45, 14, 2, 0, 2000000),
(6, 46, 14, 6, 0, 2000000),
(7, 46, 15, 2, 0, 200000),
(10, 47, 15, 4, 0, 200000),
(11, 47, 14, 9, 0, 2000000),
(12, 49, 14, 3, 400000, 2000000),
(13, 49, 15, 2, 400000, 200000),
(14, 50, 14, 2, 4000000, 2000000),
(15, 50, 15, 1, 200000, 200000),
(16, 51, 14, 2, 4000000, 2000000),
(17, 51, 15, 2, 400000, 200000),
(18, 52, 18, 3, 15000000, 5000000),
(19, 53, 16, 5, 12500000, 2500000),
(20, 54, 24, 3, 2100000, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imag` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `ruta_img` varchar(30) NOT NULL,
  `estado_img` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`id_imag`, `id_prod`, `ruta_img`, `estado_img`) VALUES
(2, 14, 'portatil.jpg', 'Activo'),
(3, 14, 'portatil2.jpg', 'Activo'),
(6, 15, 'IMG-20250708-WA0007.jpg', 'Activo'),
(7, 15, 'IMG-20250708-WA0008.jpg', 'Activo'),
(8, 16, 'IMG-20250708-WA0018.jpg', 'Activo'),
(9, 17, 'IMG-20250708-WA0016.jpg', 'Activo'),
(10, 18, 'IMG-20250708-WA0015.jpg', 'Activo'),
(11, 17, 'IMG-20250708-WA0017.jpg', 'Activo'),
(12, 16, 'IMG-20250708-WA0014.jpg', 'Activo'),
(13, 19, 'IMG-20250708-WA0011.jpg', 'Activo'),
(14, 19, 'IMG-20250708-WA0006.jpg', 'Activo'),
(15, 20, 'IMG-20250708-WA0009.jpg', 'Activo'),
(16, 19, 'IMG-20250708-WA0006.jpg', 'Activo'),
(17, 21, 'IMG-20250708-WA0006.jpg', 'Activo'),
(18, 24, 'IMG-20250708-WA0016.jpg', 'Activo'),
(19, 24, 'IMG-20250708-WA0016.jpg', 'Activo'),
(20, 24, 'IMG-20250708-WA0017.jpg', 'Activo'),
(21, 24, 'IMG-20250708-WA0017.jpg', 'Activo'),
(22, 25, 'IMG-20250708-WA0008.jpg', 'Activo'),
(23, 23, 'IMG-20250708-WA0008.jpg', 'Activo'),
(24, 22, 'IMG-20250708-WA0013.jpg', 'Activo'),
(25, 22, 'IMG-20250708-WA0012.jpg', 'Activo'),
(26, 22, 'IMG-20250708-WA0015.jpg', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(13,0) NOT NULL,
  `estado` enum('Pendiente','Enviado','Entregado','Cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `fecha`, `total`, `estado`) VALUES
(2, 2, '2025-07-03', 0, 'Entregado'),
(3, 2, '2025-07-04', 0, 'Pendiente'),
(26, 2, '2025-07-04', 0, 'Pendiente'),
(27, 2, '2025-07-04', 0, 'Pendiente'),
(28, 2, '2025-07-04', 0, 'Pendiente'),
(29, 2, '2025-07-04', 0, 'Pendiente'),
(30, 2, '2025-07-04', 0, 'Pendiente'),
(31, 2, '2025-07-04', 0, 'Pendiente'),
(32, 2, '2025-07-04', 0, 'Pendiente'),
(33, 2, '2025-07-04', 0, 'Pendiente'),
(34, 2, '2025-07-04', 0, 'Pendiente'),
(35, 2, '2025-07-04', 0, 'Pendiente'),
(36, 2, '2025-07-04', 0, 'Pendiente'),
(37, 2, '2025-07-04', 0, 'Pendiente'),
(38, 2, '2025-07-04', 0, 'Pendiente'),
(39, 2, '2025-07-04', 0, 'Pendiente'),
(40, 2, '2025-07-04', 0, 'Pendiente'),
(41, 2, '2025-07-04', 0, 'Pendiente'),
(42, 2, '2025-07-04', 0, 'Pendiente'),
(43, 2, '2025-07-04', 0, 'Cancelado'),
(44, 2, '2025-07-08', 0, 'Enviado'),
(45, 2, '2025-07-08', 0, 'Pendiente'),
(46, 2, '2025-07-08', 0, 'Pendiente'),
(47, 2, '2025-07-08', 18800000, 'Pendiente'),
(48, 2, '2025-07-08', 6400000, 'Pendiente'),
(49, 2, '2025-07-08', 6400000, 'Pendiente'),
(50, 2, '2025-07-08', 4200000, 'Pendiente'),
(51, 2, '2025-07-08', 4400000, 'Pendiente'),
(52, 2, '2025-07-09', 15000000, 'Pendiente'),
(53, 2, '2025-07-09', 12500000, 'Pendiente'),
(54, 2, '2025-07-09', 2100000, 'Pendiente');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelos` varchar(30) NOT NULL,
  `tipo` enum('Repuesto','Computador') NOT NULL,
  `especificaciones` text NOT NULL,
  `Prod_estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `precio`, `id_categoria`, `marca`, `modelos`, `tipo`, `especificaciones`, `Prod_estado`) VALUES
(14, '2000000', 1, 'Dell', 'Inspiron 15', 'Computador', 'RAM 16', 'Activo'),
(15, '200000', 3, 'Memoria RAM', 'Kingston', 'Repuesto', 'DDR3 8GB', 'Activo'),
(16, '2500000', 1, 'HP', 'Victus', 'Computador', 'i5 11\'\'', 'Activo'),
(17, '3000000', 3, 'x', 'x', 'Repuesto', 'x', 'Activo'),
(18, '5000000', 1, 'x', 'x', 'Computador', 'x', 'Inactivo'),
(19, '1900000', 2, 'x', 'x', 'Computador', 'x', 'Activo'),
(20, '1900000', 2, 'x', 'x', 'Computador', 'x', 'Activo'),
(21, '2400000', 2, 'x', 'x', 'Computador', 'x', 'Activo'),
(22, '3600000', 1, 'z', 'x', 'Computador', 'x', 'Activo'),
(23, '1000000', 3, 'x', 'x', 'Repuesto', 'x', 'Activo'),
(24, '700000', 3, 'x', 'x', 'Repuesto', 'x', 'Activo'),
(25, '700000', 3, 'x', 'x', 'Repuesto', 'x', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('admin','cliente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol`) VALUES
(1, 'luna', 'admin@admintenis.com', '$2y$10$QQPqjkA8HtlW.ONHfQlZcORDql9I4stqzUbxZxiBBA2vB2EFlldoS', 'admin'),
(2, 'Pepito', 'pepito@gmail.com', '$2y$10$p1/3fRtrUKKw5iHwTnDuL.eWLojSXuYlJ01m8XtNd/DM5oaye5vZu', 'cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imag`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
