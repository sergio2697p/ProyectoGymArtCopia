-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2020 a las 17:26:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `art`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `CodigoCliente` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Domicilio` varchar(40) DEFAULT NULL,
  `Poblacion` varchar(20) NOT NULL,
  `CorreoElectronico` varchar(50) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Observaciones` text NOT NULL,
  `Peso` decimal(10,2) DEFAULT NULL,
  `Altura` decimal(10,2) NOT NULL,
  `MasaCorporal` int(11) NOT NULL,
  `Edad` int(3) NOT NULL,
  `ActividadFisica` varchar(30) NOT NULL,
  `Lesiones` text NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`CodigoCliente`, `Nombre`, `Apellidos`, `Domicilio`, `Poblacion`, `CorreoElectronico`, `Telefono`, `Observaciones`, `Peso`, `Altura`, `MasaCorporal`, `Edad`, `ActividadFisica`, `Lesiones`, `Activo`) VALUES
(6, 'Oscar', 'Ruiz', 'C/Franco', 'lorca', 'oscar@oscar.com', 987654321, 'NO', '23.00', '198.00', 0, 32, 'Principiante', 'NO', 0),
(7, 'Ignatius', 'J. Reilly', 'Farras Street N_43', 'New Orleans', 'diosaFortuna@gmail.com', 634412066, 'Demasiadas', '96.22', '1.92', 0, 32, '', '', 1),
(8, 'Zeus', 'Jupiter Aguilar', 'Calle Olimpo', 'Murcia', 'animalZeus@gmail.com', 634412066, 'No', '72.12', '2.02', 0, 54, 'Si', 'No', 1),
(10, 'Miller', 'Kazuhira Hasagaska', 'House of the rising sun Nº51', 'Outher Heaven', 'keepyouwaiting@hum.com', 623456788, 'Necesito ganar agilidad y destreza', '67.32', '1.67', 0, 33, 'CQC(judo)', 'Actualmente no', 1),
(11, 'gdfg', 'fgdf', 'fdgd', 'fgd', 'fdgd', 4234234, 'fd', '43.00', '12.00', 0, 23, 'Intermedio', '2342', 0),
(12, 'Maria', 'Martinez', 'lsfalkfl', 'Lorca', 'maria@maria.com', 654321234, 'ninguna', '56.00', '197.00', 0, 22, 'Principiante', 'no', 1),
(13, 'hola', 'adios', 'lkfnsalkn', 'lorca', 'sergio2m@gmail.com', 654321234, 'nada', '54.00', '156.00', 0, 24, 'Intermedio', 'No', 1),
(14, 'Hola', 'adios', 'Calle', 'kwlsjl', 'ser@ser.com', 654321234, 'Si', '43.00', '21.00', 21, 975, 'Intermedio', 'No', 1),
(15, 'gsjlkj', 'gksdjlkdshjk', 'kfjslkfjalj', 'dkjlksjglksjl', 'sergio2m@gmail.com', 654321234, 'No', '45.00', '176.00', 32, 14, 'Intermedio', 'No', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidades`
--

CREATE TABLE `mensualidades` (
  `CodigoMensualidad` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `DiasSemanas` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensualidades`
--

INSERT INTO `mensualidades` (`CodigoMensualidad`, `Nombre`, `DiasSemanas`, `Precio`, `Anio`) VALUES
(1, 'Basica', 7, 29.9, 2019),
(2, 'Avanzada', 7, 36.5, 2018),
(3, 'Ultra', 7, 50, 2017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores`
--

CREATE TABLE `monitores` (
  `CodigoMonitor` int(100) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Salario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `monitores`
--

INSERT INTO `monitores` (`CodigoMonitor`, `Nombre`, `Apellidos`, `DNI`, `Telefono`, `Salario`) VALUES
(1, 'Adrian ', 'Martínez', '23121413V', 654321321, 950),
(2, 'Jesús García', 'González Blanco', '23121415V', 678907654, 850),
(3, 'Eva', 'Suarez', '23242526V', 678543123, 98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `CodigoPago` int(11) NOT NULL,
  `CodigoCliente` int(11) NOT NULL,
  `CodigoMensualidad` int(11) NOT NULL,
  `Mes` varchar(10) NOT NULL,
  `Anio` int(4) NOT NULL,
  `Importe` int(4) NOT NULL,
  `Deuda` int(4) NOT NULL,
  `Pagado` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`CodigoPago`, `CodigoCliente`, `CodigoMensualidad`, `Mes`, `Anio`, `Importe`, `Deuda`, `Pagado`) VALUES
(1, 8, 1, 'Junio', 2020, 35, 0, 'Si'),
(2, 10, 3, 'Mayo', 2019, 40, 40, 'No'),
(3, 11, 2, 'Febrero', 2020, 36, 0, 'Si'),
(4, 12, 1, 'Mayo', 2020, 21, 21, 'No'),
(5, 10, 1, 'Enero', 2020, 45, 45, 'No'),
(7, 12, 1, 'Febrero', 2019, 23, 23, 'No'),
(8, 10, 1, 'Junio', 2020, 25, 25, 'Si'),
(9, 10, 1, 'Junio', 2020, 25, 25, 'Si'),
(10, 10, 1, 'Enero', 2019, 24, 24, 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `CodigoUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CodigoUsuario`, `Nombre`, `Contrasena`, `Email`) VALUES
(1, 'andresete', 'be76e1cab391a5fb0e9d5cc117efa1ad', 'andresdavid@gmail.com'),
(2, 'Maria Jose Teruel', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'mariajose.teruel2@murciaeduca.es'),
(3, 'sergio', '3bffa4ebdf4874e506c2b12405796aa5', 'sergio2m@gmail.com'),
(4, 'pepe', '926e27eecdbc7a18858b3798ba99bddd', 'pepe@pepe.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CodigoCliente`);

--
-- Indices de la tabla `mensualidades`
--
ALTER TABLE `mensualidades`
  ADD PRIMARY KEY (`CodigoMensualidad`);

--
-- Indices de la tabla `monitores`
--
ALTER TABLE `monitores`
  ADD PRIMARY KEY (`CodigoMonitor`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`CodigoPago`),
  ADD KEY `idCliente` (`CodigoCliente`),
  ADD KEY `idMensualidades` (`CodigoMensualidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CodigoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `monitores`
--
ALTER TABLE `monitores`
  MODIFY `CodigoMonitor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `CodigoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`CodigoCliente`) REFERENCES `clientes` (`CodigoCliente`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`CodigoMensualidad`) REFERENCES `mensualidades` (`CodigoMensualidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
