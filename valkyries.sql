-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 18-Mar-2019 às 18:31
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valkyries`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `armas`
--

CREATE TABLE `armas` (
  `id_arma` int(11) NOT NULL,
  `nome_arma` varchar(200) NOT NULL,
  `atq` int(11) DEFAULT NULL,
  `atqm` int(11) DEFAULT NULL,
  `def` int(11) DEFAULT NULL,
  `defm` int(11) DEFAULT NULL,
  `hp` int(11) DEFAULT NULL,
  `prec` int(11) DEFAULT NULL,
  `vel` int(11) DEFAULT NULL,
  `desc_habilidade` varchar(250) NOT NULL,
  `onde_conseguir` varchar(200) NOT NULL,
  `id_tipo_atq` int(11) NOT NULL,
  `id_raca` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `img_arma` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despertavel`
--

CREATE TABLE `despertavel` (
  `id_despertavel` int(11) NOT NULL,
  `nome_despertavel` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estrutura da tabela `elementos`
--

CREATE TABLE `elementos` (
  `id_elemento` int(11) NOT NULL,
  `nome_elemento` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagens`
--

CREATE TABLE `personagens` (
  `id_personagem` int(11) NOT NULL,
  `nome_personagem` varchar(200) NOT NULL,
  `biografia` varchar(250) NOT NULL,
  `hab_acao` varchar(250) NOT NULL,
  `hab_passiva` varchar(250) NOT NULL,
  `limit_burst` varchar(250) NOT NULL,
  `id_despertavel` int(11) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `id_raca` int(11) NOT NULL,
  `id_ranque` int(11) NOT NULL,
  `id_tipo_atq` int(11) NOT NULL,
  `img_personagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `id_raca` int(11) NOT NULL,
  `nome_raca` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranque`
--

CREATE TABLE `ranque` (
  `id_ranque` int(11) NOT NULL,
  `nome_ranque` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoatq`
--

CREATE TABLE `tipoatq` (
  `id_tipo_atq` int(11) NOT NULL,
  `nome_atq` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armas`
--
ALTER TABLE `armas`
  ADD PRIMARY KEY (`id_arma`);

--
-- Indexes for table `despertavel`
--
ALTER TABLE `despertavel`
  ADD PRIMARY KEY (`id_despertavel`);

--
-- Indexes for table `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id_elemento`);

--
-- Indexes for table `personagens`
--
ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id_personagem`);

--
-- Indexes for table `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`id_raca`);

--
-- Indexes for table `ranque`
--
ALTER TABLE `ranque`
  ADD PRIMARY KEY (`id_ranque`);

--
-- Indexes for table `tipoatq`
--
ALTER TABLE `tipoatq`
  ADD PRIMARY KEY (`id_tipo_atq`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armas`
--
ALTER TABLE `armas`
  MODIFY `id_arma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `despertavel`
--
ALTER TABLE `despertavel`
  MODIFY `id_despertavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id_elemento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personagens`
--
ALTER TABLE `personagens`
  MODIFY `id_personagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raca`
--
ALTER TABLE `raca`
  MODIFY `id_raca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranque`
--
ALTER TABLE `ranque`
  MODIFY `id_ranque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipoatq`
--
ALTER TABLE `tipoatq`
  MODIFY `id_tipo_atq` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
