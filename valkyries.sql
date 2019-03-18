-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 18-Mar-2019 às 20:12
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

--
-- Extraindo dados da tabela `armas`
--

INSERT INTO `armas` (`id_arma`, `nome_arma`, `atq`, `atqm`, `def`, `defm`, `hp`, `prec`, `vel`, `desc_habilidade`, `onde_conseguir`, `id_tipo_atq`, `id_raca`, `nota`, `img_arma`) VALUES
(1, 'Ivaldi', 242, 0, 73, 0, 353, 0, 0, '160% de dano de ATQ Ã  fileira inimiga mais prÃ³xima. Mestre por 2 turnos, 20% de escudo por 2 turnos e 100% de contra-ataque de ATQ por 2 turnos ao lanÃ§ador. ', 'EvocaÃ§Ãµes especÃ­ficas.', 1, 2, 95, 'imgs/arma/ivaldi.jpg'),
(2, 'BastÃ£o de Seid X (Esp.)', 0, 226, 0, 0, 0, 69, 0, 'Mais 30% de dano de ATQM ao lanÃ§ador e menos 30% de DEFM ao inimigo mais prÃ³ximo por 1 turno.', 'EvocaÃ§Ã£o de diamante / Comerciante anÃ­mica.', 2, 9, 80, 'imgs/arma/bastaodeseidx.jpg'),
(3, 'Mjolnir X (Esp.)', 233, 0, 60, 0, 0, 0, 0, '130% de dano de ATQ de luz e paralisia por 1 turno ao inimigo mais prÃ³ximo.', 'EvocaÃ§Ã£o de diamante / Comerciante anÃ­mica.', 1, 9, 70, 'imgs/arma/mjolnirx.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despertavel`
--

CREATE TABLE `despertavel` (
  `id_despertavel` int(11) NOT NULL,
  `nome_despertavel` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `despertavel`
--

INSERT INTO `despertavel` (`id_despertavel`, `nome_despertavel`) VALUES
(1, 'Despertável'),
(2, 'Não Despertável');

-- --------------------------------------------------------

--
-- Estrutura da tabela `elementos`
--

CREATE TABLE `elementos` (
  `id_elemento` int(11) NOT NULL,
  `nome_elemento` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `elementos`
--

INSERT INTO `elementos` (`id_elemento`, `nome_elemento`) VALUES
(1, 'Água'),
(2, 'Fogo'),
(3, 'Terra'),
(4, 'Trevas'),
(5, 'Luz'),
(6, 'Especial'),
(7, 'Nenhum');

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

--
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`id_personagem`, `nome_personagem`, `biografia`, `hab_acao`, `hab_passiva`, `limit_burst`, `id_despertavel`, `id_elemento`, `id_raca`, `id_ranque`, `id_tipo_atq`, `img_personagem`) VALUES
(1, 'Elizabeth', 'Terceira princesa de Liones. Embora tenha uma propensÃ£o a chorar, sua compaixÃ£o e determinaÃ§Ã£o fortalecem todos a sua volta.', 'Todos os seus herÃ³is: recuperam 30% do PV mÃ¡ximo; ConvalescenÃ§a por 3 turnos; +20% de dano de Luz por 3 turnos.', 'ResistÃªncia Ã£ gravidade.', 'Ira Divina: 10% da mÃ©dia de dano de ATQ e ATQM como dano de luz a todos os inimigos 20 vezes. A DEF e a DEFM dos herÃ³is aliados aumentam em 10% por 5 turnos.', 1, 6, 5, 2, 2, 'imgs/personagem/elizabeth.jpg'),
(2, 'Descendente da LuxÃºria Audumbla', 'acrescentar bio depois.', 'Todos os seus herÃ³is: penalidades de atributos anuladas por 3 turnos. Todos os inimigos: dano de 150% do ATQM; Encantamento e CorrupÃ§Ã£o por 3 turnos.', 'acrescentar passiva depois.', 'Aguaceiro MÃ¡gico: 20% de dano de ATQM a todos os inimigos 10 vezes. O ATQM e a DEFM dos herÃ³is aliados aumentam em 10% por 5 turnos.', 2, 7, 6, 1, 3, 'imgs/personagem/audumbla.jpg'),
(3, 'Meliodas', 'adicionar depois.', '3 inimigos mais prÃ³ximos: dano de Trevas de 140% do ATQ. Este herÃ³i: Barreira de ReflexÃ£o de 20% do PV mÃ¡ximo OU por 2 turnos.', 'adicionar depois.', 'Grande Ataque: 40% de dano de ATQ aos inimigos 6 vezes. O ATQ dos herÃ³is aliados aumentam em 10% por 5 turnos.', 1, 4, 1, 5, 1, 'imgs/personagem/meliodas.jpg'),
(4, 'Cavaleira Imperial Viola', 'adicionar depois.', 'Todos os seus herÃ³is: Pele de Pedra; +50% de resistÃªncia a condiÃ§Ãµes adversas por 3 turnos. 3 inimigos mais prÃ³ximos: 2x dano de Luz de 80% do ATQ; Paralisia por 3 turnos.', 'adicionar depois.', 'ira Divina: 10% da mÃ©dia de dano de ATQ e ATQM como dano de luz a todos os inimigos 20 vezes. A DEF e a DEFM dos herÃ³is aliados aumentam em 10% por 5 turnos.', 2, 5, 5, 2, 1, 'imgs/personagem/viola.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `id_raca` int(11) NOT NULL,
  `nome_raca` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `raca`
--

INSERT INTO `raca` (`id_raca`, `nome_raca`) VALUES
(1, 'Aesir'),
(2, 'Anão'),
(3, 'Elfo'),
(4, 'Fera'),
(5, 'Humano'),
(6, 'Teriano'),
(7, 'Jotun'),
(8, 'Nenhuma'),
(9, 'Especial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranque`
--

CREATE TABLE `ranque` (
  `id_ranque` int(11) NOT NULL,
  `nome_ranque` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `ranque`
--

INSERT INTO `ranque` (`id_ranque`, `nome_ranque`) VALUES
(1, 'SSS'),
(2, 'SS'),
(3, 'S'),
(4, 'A'),
(5, 'B'),
(6, 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoatq`
--

CREATE TABLE `tipoatq` (
  `id_tipo_atq` int(11) NOT NULL,
  `nome_atq` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Extraindo dados da tabela `tipoatq`
--

INSERT INTO `tipoatq` (`id_tipo_atq`, `nome_atq`) VALUES
(1, 'Corpo a Corpo'),
(2, 'Mágico'),
(3, 'À distância'),
(4, 'Sem restrição');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armas`
--
ALTER TABLE `armas`
  ADD PRIMARY KEY (`id_arma`),
  ADD KEY `fk_armas_tipoatq` (`id_tipo_atq`),
  ADD KEY `fk_armas_raca` (`id_raca`);

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
  ADD PRIMARY KEY (`id_personagem`),
  ADD KEY `fk_perso_elem` (`id_elemento`),
  ADD KEY `fk_perso_raca` (`id_raca`),
  ADD KEY `fk_perso_tipoatq` (`id_tipo_atq`),
  ADD KEY `fk_perso_ranque` (`id_ranque`),
  ADD KEY `fk_perso_despert` (`id_despertavel`);

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
  MODIFY `id_arma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `despertavel`
--
ALTER TABLE `despertavel`
  MODIFY `id_despertavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id_elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personagens`
--
ALTER TABLE `personagens`
  MODIFY `id_personagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `raca`
--
ALTER TABLE `raca`
  MODIFY `id_raca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ranque`
--
ALTER TABLE `ranque`
  MODIFY `id_ranque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipoatq`
--
ALTER TABLE `tipoatq`
  MODIFY `id_tipo_atq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `armas`
--
ALTER TABLE `armas`
  ADD CONSTRAINT `fk_armas_raca` FOREIGN KEY (`id_raca`) REFERENCES `raca` (`id_raca`),
  ADD CONSTRAINT `fk_armas_tipoatq` FOREIGN KEY (`id_tipo_atq`) REFERENCES `armas` (`id_arma`);

--
-- Limitadores para a tabela `personagens`
--
ALTER TABLE `personagens`
  ADD CONSTRAINT `fk_perso_despert` FOREIGN KEY (`id_despertavel`) REFERENCES `despertavel` (`id_despertavel`),
  ADD CONSTRAINT `fk_perso_elem` FOREIGN KEY (`id_elemento`) REFERENCES `elementos` (`id_elemento`),
  ADD CONSTRAINT `fk_perso_raca` FOREIGN KEY (`id_raca`) REFERENCES `raca` (`id_raca`),
  ADD CONSTRAINT `fk_perso_ranque` FOREIGN KEY (`id_ranque`) REFERENCES `ranque` (`id_ranque`),
  ADD CONSTRAINT `fk_perso_tipoatq` FOREIGN KEY (`id_tipo_atq`) REFERENCES `tipoatq` (`id_tipo_atq`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
