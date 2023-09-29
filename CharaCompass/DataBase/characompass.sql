-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Set-2023 às 20:18
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `characompass`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `audio`
--

CREATE TABLE `audio` (
  `id_audio` int(11) NOT NULL,
  `titulo_audio` varchar(50) NOT NULL,
  `caminho_server_audio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_nopad_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `audio_personagem`
--

CREATE TABLE `audio_personagem` (
  `fk_audio` int(11) NOT NULL,
  `fk_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `senha_cliente` varchar(50) NOT NULL,
  `biografia_cliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_nopad_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_mundo`
--

CREATE TABLE `cliente_mundo` (
  `fk_mundo` int(11) DEFAULT NULL,
  `fk_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_objeto`
--

CREATE TABLE `cliente_objeto` (
  `fk_objeto` int(11) DEFAULT NULL,
  `fk_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_personagem`
--

CREATE TABLE `cliente_personagem` (
  `fk_mundo` int(11) DEFAULT NULL,
  `fk_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(11) NOT NULL,
  `titulo_imagem` varchar(50) NOT NULL,
  `caminho_server_imagem` varchar(50) NOT NULL,
  `fk_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_nopad_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mundos`
--

CREATE TABLE `mundos` (
  `id_mundo` int(11) NOT NULL,
  `nome_mundo` varchar(50) NOT NULL,
  `informacoes_mundo` varchar(4000) NOT NULL,
  `trivia_mundo` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_nopad_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mundo_imagem`
--

CREATE TABLE `mundo_imagem` (
  `fk_imagem` int(11) DEFAULT NULL,
  `fk_mundo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetos`
--

CREATE TABLE `objetos` (
  `id_objeto` int(11) NOT NULL,
  `nome_objeto` varchar(50) NOT NULL,
  `nome_alt_objeto` varchar(50) NOT NULL,
  `tipo_objeto` varchar(50) NOT NULL,
  `material_objeto` varchar(50) NOT NULL,
  `propriedades_objeto` varchar(50) NOT NULL,
  `status_objeto` varchar(50) NOT NULL,
  `informacoes_objeto` varchar(50) NOT NULL,
  `simbolismo_objeto` varchar(50) NOT NULL,
  `origem_objeto` varchar(50) NOT NULL,
  `aplicabilidade_objeto` varchar(50) NOT NULL,
  `passado_objeto` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_nopad_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto_imagem`
--

CREATE TABLE `objeto_imagem` (
  `fk_imagem` int(11) DEFAULT NULL,
  `fk_objeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto_mundo`
--

CREATE TABLE `objeto_mundo` (
  `fk_objeto` int(11) DEFAULT NULL,
  `fk_mundo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem`
--

CREATE TABLE `personagem` (
  `id_personagem` int(11) NOT NULL,
  `nome_personagem` varchar(50) NOT NULL,
  `idade_personagem` int(11) NOT NULL,
  `sexo_personagem` varchar(50) NOT NULL,
  `pronomes_personagem` varchar(50) NOT NULL,
  `raca_personagem` varchar(50) NOT NULL,
  `nacionalidade_personagem` varchar(50) NOT NULL,
  `profissao_personagem` varchar(50) NOT NULL,
  `importancia_personagem` varchar(50) NOT NULL,
  `universo_personagem` varchar(50) NOT NULL,
  `alinhamento_personagem` varchar(50) NOT NULL,
  `tracos_personagem` varchar(1000) NOT NULL,
  `pts_fortes` varchar(100) NOT NULL,
  `pts_fracos` varchar(100) NOT NULL,
  `maneirismos_personagem` varchar(100) NOT NULL,
  `social_personagem` varchar(100) NOT NULL,
  `mentalidade_personagem` varchar(100) NOT NULL,
  `passado_personagem` varchar(4000) NOT NULL,
  `grupo_personagem` int(100) NOT NULL,
  `inimigos_personagem` varchar(100) NOT NULL,
  `condicoes_saude` varchar(100) NOT NULL,
  `objetos_personagem` varchar(100) NOT NULL,
  `trivia_personagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_nopad_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem_imagem`
--

CREATE TABLE `personagem_imagem` (
  `fk_imagem` int(11) DEFAULT NULL,
  `fk_personagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem_mundo`
--

CREATE TABLE `personagem_mundo` (
  `fk_mundo` int(11) DEFAULT NULL,
  `fk_personagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem_objeto`
--

CREATE TABLE `personagem_objeto` (
  `fk_objeto` int(11) DEFAULT NULL,
  `fk_personagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id_audio`);

--
-- Índices para tabela `audio_personagem`
--
ALTER TABLE `audio_personagem`
  ADD KEY `fk_audio` (`fk_audio`),
  ADD KEY `fk_persona` (`fk_persona`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `cliente_mundo`
--
ALTER TABLE `cliente_mundo`
  ADD KEY `fk_mundo` (`fk_mundo`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Índices para tabela `cliente_objeto`
--
ALTER TABLE `cliente_objeto`
  ADD KEY `fk_objeto` (`fk_objeto`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Índices para tabela `cliente_personagem`
--
ALTER TABLE `cliente_personagem`
  ADD KEY `fk_mundo` (`fk_mundo`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Índices para tabela `mundos`
--
ALTER TABLE `mundos`
  ADD PRIMARY KEY (`id_mundo`);

--
-- Índices para tabela `mundo_imagem`
--
ALTER TABLE `mundo_imagem`
  ADD KEY `fk_imagem` (`fk_imagem`),
  ADD KEY `fk_mundo` (`fk_mundo`);

--
-- Índices para tabela `objetos`
--
ALTER TABLE `objetos`
  ADD PRIMARY KEY (`id_objeto`);

--
-- Índices para tabela `objeto_imagem`
--
ALTER TABLE `objeto_imagem`
  ADD KEY `fk_imagem` (`fk_imagem`),
  ADD KEY `fk_objeto` (`fk_objeto`);

--
-- Índices para tabela `objeto_mundo`
--
ALTER TABLE `objeto_mundo`
  ADD KEY `fk_mundo` (`fk_mundo`),
  ADD KEY `fk_objeto` (`fk_objeto`);

--
-- Índices para tabela `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id_personagem`);

--
-- Índices para tabela `personagem_imagem`
--
ALTER TABLE `personagem_imagem`
  ADD KEY `fk_imagem` (`fk_imagem`),
  ADD KEY `fk_personagem` (`fk_personagem`);

--
-- Índices para tabela `personagem_mundo`
--
ALTER TABLE `personagem_mundo`
  ADD KEY `fk_mundo` (`fk_mundo`),
  ADD KEY `fk_personagem` (`fk_personagem`);

--
-- Índices para tabela `personagem_objeto`
--
ALTER TABLE `personagem_objeto`
  ADD KEY `fk_objeto` (`fk_objeto`),
  ADD KEY `fk_personagem` (`fk_personagem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `audio`
--
ALTER TABLE `audio`
  MODIFY `id_audio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mundos`
--
ALTER TABLE `mundos`
  MODIFY `id_mundo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `objetos`
--
ALTER TABLE `objetos`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id_personagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `audio_personagem`
--
ALTER TABLE `audio_personagem`
  ADD CONSTRAINT `fk_audio` FOREIGN KEY (`fk_audio`) REFERENCES `audio` (`id_audio`),
  ADD CONSTRAINT `fk_persona` FOREIGN KEY (`fk_persona`) REFERENCES `personagem` (`id_personagem`);

--
-- Limitadores para a tabela `cliente_mundo`
--
ALTER TABLE `cliente_mundo`
  ADD CONSTRAINT `cliente_mundo_ibfk_1` FOREIGN KEY (`fk_mundo`) REFERENCES `mundos` (`id_mundo`),
  ADD CONSTRAINT `cliente_mundo_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `cliente_objeto`
--
ALTER TABLE `cliente_objeto`
  ADD CONSTRAINT `cliente_objeto_ibfk_1` FOREIGN KEY (`fk_objeto`) REFERENCES `objetos` (`id_objeto`),
  ADD CONSTRAINT `cliente_objeto_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `cliente_personagem`
--
ALTER TABLE `cliente_personagem`
  ADD CONSTRAINT `cliente_personagem_ibfk_1` FOREIGN KEY (`fk_mundo`) REFERENCES `mundos` (`id_mundo`),
  ADD CONSTRAINT `cliente_personagem_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `mundo_imagem`
--
ALTER TABLE `mundo_imagem`
  ADD CONSTRAINT `mundo_imagem_ibfk_1` FOREIGN KEY (`fk_imagem`) REFERENCES `imagem` (`id_imagem`),
  ADD CONSTRAINT `mundo_imagem_ibfk_2` FOREIGN KEY (`fk_mundo`) REFERENCES `mundos` (`id_mundo`);

--
-- Limitadores para a tabela `objeto_imagem`
--
ALTER TABLE `objeto_imagem`
  ADD CONSTRAINT `objeto_imagem_ibfk_1` FOREIGN KEY (`fk_imagem`) REFERENCES `imagem` (`id_imagem`),
  ADD CONSTRAINT `objeto_imagem_ibfk_2` FOREIGN KEY (`fk_objeto`) REFERENCES `objetos` (`id_objeto`);

--
-- Limitadores para a tabela `objeto_mundo`
--
ALTER TABLE `objeto_mundo`
  ADD CONSTRAINT `objeto_mundo_ibfk_1` FOREIGN KEY (`fk_mundo`) REFERENCES `mundos` (`id_mundo`),
  ADD CONSTRAINT `objeto_mundo_ibfk_2` FOREIGN KEY (`fk_objeto`) REFERENCES `objetos` (`id_objeto`);

--
-- Limitadores para a tabela `personagem_imagem`
--
ALTER TABLE `personagem_imagem`
  ADD CONSTRAINT `personagem_imagem_ibfk_1` FOREIGN KEY (`fk_imagem`) REFERENCES `imagem` (`id_imagem`),
  ADD CONSTRAINT `personagem_imagem_ibfk_2` FOREIGN KEY (`fk_personagem`) REFERENCES `personagem` (`id_personagem`);

--
-- Limitadores para a tabela `personagem_mundo`
--
ALTER TABLE `personagem_mundo`
  ADD CONSTRAINT `personagem_mundo_ibfk_1` FOREIGN KEY (`fk_mundo`) REFERENCES `mundos` (`id_mundo`),
  ADD CONSTRAINT `personagem_mundo_ibfk_2` FOREIGN KEY (`fk_personagem`) REFERENCES `personagem` (`id_personagem`);

--
-- Limitadores para a tabela `personagem_objeto`
--
ALTER TABLE `personagem_objeto`
  ADD CONSTRAINT `personagem_objeto_ibfk_1` FOREIGN KEY (`fk_objeto`) REFERENCES `objetos` (`id_objeto`),
  ADD CONSTRAINT `personagem_objeto_ibfk_2` FOREIGN KEY (`fk_personagem`) REFERENCES `personagem` (`id_personagem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
