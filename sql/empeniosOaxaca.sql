CREATE DATABASE IF NOT EXISTS empeniosoaxaca;
-- --------------------------------------------------------
-- Estructura de tabla para la tabla `Producto`
CREATE TABLE Producto (
  idProducto int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  nombre varchar(60) NOT NULL,
  descripcion varchar(60) NOT NULL,
  marca varchar(60) NOT NULL,
  modelo varchar(60) NOT NULL,
  precio float NOT NULL,
  rutaImagen varchar(60) NOT NULL,
  categoria varchar(60) NOT NULL,
  reservado tinyint(1) NOT NULL
);
-- Estructura de tabla para la tabla `cliente`
CREATE TABLE Cliente (
  idCliente int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  nombre varchar(60) NOT NULL,
  telefono varchar(60) NOT NULL,
  aparta int(11) NOT NULL references Producto (idProducto) 
  fecha datetime NOT NULL
);
ALTER TABLE Cliente AUTO_INCREMENT=1000; 
-- Estructura de tabla para la tabla Usuario
CREATE TABLE Usuario (
  idUsuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  nombre varchar(60) NOT NULL,
  password varchar(60) NOT NULL,
  area varchar(60) NOT NULL
);
-- Volcado de datos para la tabla `Producto`
INSERT INTO `Producto` (`idProducto`, `nombre`, `descripcion`, `marca`, `precio`, `rutaImagen`, `categoria`, `reservado`) VALUES
(1, 'Bocinas', 'Bocinas grandes', 'Velikka', 1500, 'http://localhost/empeniosoaxaca/images/1.jpg', 'AudioVideo', 1),
(2, 'Nintendo Wii', 'Version 3.0', 'Nintendo', 1700, 'http://localhost/empeniosoaxaca/images/2.jpg', 'Consolas', 0),
(3, 'iPhone X', 'x10', 'Apple', 4500, 'http://localhost/empeniosoaxaca/images/3.jpg', 'Celulares', 0),
(4, 'PS4', 'Slim', 'Sony', 5500, 'http://localhost/empeniosoaxaca/images/4.jpg', 'Consolas', 0),
(6, 'Laptop', 'Gamer', 'DELL', 5500, 'http://localhost/empeniosoaxaca/images/5.jpg', 'Computacion', 0),
(7, 'Tele', 'tele vieja', 'hp', 1200, 'http://localhost/empeniosoaxaca/images/vis.png', '', 0),
(8, 'Panda ', 'es un bonito osito de peluchw', 'Panda', 22, 'http://localhost/empeniosoaxaca/images/Koala.jpg', '', 0),
(9, 'ssa', 'noa', 'ssa', 1220, 'http://localhost/empeniosoaxaca/images/Penguins.jpg', '', 0),
(10, 'ssa', 'noa', 'ssa', 1220, 'http://localhost/empeniosoaxaca/images/Penguins.jpg', '', 0),
(11, 'kajsn', 'jnkjn', 'jnkjn', 1828, 'http://localhost/empeniosoaxaca/images/Jellyfish.jpg', '', 0),
(12, 'nkjn', 'kjnkj', 'jnjkn', 12, 'http://localhost/empeniosoaxaca/images/Hydrangeas.jpg', '', 0),
(13, 'jh', 'jn', 'hb', 12, '/EmpeniosOaxaca/images/Lighthouse.jpg', '', 0),
(14, '', '', '', 3000, '/EmpeniosOaxaca/images/', '', 0),
(15, '14', '', 'ttt', 40.77, '/EmpeniosOaxaca/images/', '', 0),
(16, 'movil', 'dddd', 'lg', 200, '/EmpeniosOaxaca/images/', '', 0),
(17, 'movil', 'ddddd', 'lg', 200, '/EmpeniosOaxaca/images/', '', 0);

-- --------------------------------------------------------
-- Volcado de datos para la tabla Usuario
INSERT INTO Usuario (`nombre`, `password`, `area`) VALUES
('Juan', 'Juan', 'GERENTE');

-- AUTOINCREMENTAR A PARTIR DE 1000
ALTER TABLE Cliente AUTO_INCREMENT=1000; 