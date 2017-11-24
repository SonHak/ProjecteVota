-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 24-11-2017 a les 16:29:04
-- Versió del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versió de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `projecteVota`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `Pregunta`
--

CREATE TABLE `Pregunta` (
  `ID` int(3) NOT NULL,
  `Pregunta` varchar(200) NOT NULL,
  `ID_Usuario` int(3) NOT NULL,
  `DataInici` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `relacionUsuarioVota`
--

CREATE TABLE `relacionUsuarioVota` (
  `ID_Usuario` int(11) NOT NULL,
  `ID_Votar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `Respuestas`
--

CREATE TABLE `Respuestas` (
  `ID_Pregunta` int(3) NOT NULL,
  `Respuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID` int(3) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `Usuarios`
--

INSERT INTO `Usuarios` (`ID`, `Nombre`, `Email`, `Password`, `Admin`) VALUES
(1, 'prueba', 'prueba@prueba.com', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `Votacion`
--

CREATE TABLE `Votacion` (
  `ID` int(3) NOT NULL,
  `Respuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `Votacion`
--

INSERT INTO `Votacion` (`ID`, `Respuesta`) VALUES
(1, '');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `Pregunta`
--
ALTER TABLE `Pregunta`
  ADD PRIMARY KEY (`ID`);

--
-- Index de la taula `Respuestas`
--
ALTER TABLE `Respuestas`
  ADD PRIMARY KEY (`ID_Pregunta`,`Respuesta`);

--
-- Index de la taula `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Index de la taula `Votacion`
--
ALTER TABLE `Votacion`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `Pregunta`
--
ALTER TABLE `Pregunta`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la taula `Votacion`
--
ALTER TABLE `Votacion`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
