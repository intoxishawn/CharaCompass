-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2023 às 04:49
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
  `id_audio` int(255) NOT NULL,
  `caminho_server_audio` varchar(255) NOT NULL,
  `cliente_id` int(255) NOT NULL,
  `personagem_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(255) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `senha_cliente` varchar(255) NOT NULL,
  `biografia_cliente` text DEFAULT NULL,
  `pfp_caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(255) NOT NULL,
  `caminho_imagem` varchar(255) NOT NULL,
  `cliente_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_mundo`
--

CREATE TABLE `imagem_mundo` (
  `mundo_id` int(255) NOT NULL,
  `imagem_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_objeto`
--

CREATE TABLE `imagem_objeto` (
  `imagem_id` int(255) NOT NULL,
  `objeto_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_personagem`
--

CREATE TABLE `imagem_personagem` (
  `imagem_id` int(255) NOT NULL,
  `personagem_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mundo`
--

CREATE TABLE `mundo` (
  `id_mundo` int(255) NOT NULL,
  `nome_mundo` varchar(255) NOT NULL,
  `info_mundo` text DEFAULT NULL,
  `trivia_mundo` text DEFAULT NULL,
  `cliente_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE `objeto` (
  `id_objeto` int(255) NOT NULL,
  `nome_objeto` varchar(255) NOT NULL,
  `caracteristicas` text DEFAULT NULL,
  `historia_objeto` text DEFAULT NULL,
  `trivia_objeto` text DEFAULT NULL,
  `cliente_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem`
--

CREATE TABLE `personagem` (
  `id_personagem` int(255) NOT NULL,
  `nome_personagem` varchar(255) NOT NULL,
  `info_personagem` text DEFAULT NULL,
  `personalidade` text DEFAULT NULL,
  `historia` text DEFAULT NULL,
  `trivia_personagem` text DEFAULT NULL,
  `cliente_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id_audio`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `personagem_id` (`personagem_id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `fk_cliente_imagem` (`cliente_id`);

--
-- Índices para tabela `imagem_mundo`
--
ALTER TABLE `imagem_mundo`
  ADD KEY `fk_mundo` (`mundo_id`),
  ADD KEY `fk_imagem` (`imagem_id`);

--
-- Índices para tabela `imagem_objeto`
--
ALTER TABLE `imagem_objeto`
  ADD KEY `objeto_id` (`objeto_id`),
  ADD KEY `imagem_id` (`imagem_id`);

--
-- Índices para tabela `imagem_personagem`
--
ALTER TABLE `imagem_personagem`
  ADD KEY `fk_personagem` (`personagem_id`),
  ADD KEY `imagem_fk` (`imagem_id`);

--
-- Índices para tabela `mundo`
--
ALTER TABLE `mundo`
  ADD PRIMARY KEY (`id_mundo`),
  ADD KEY `fk_cliente` (`cliente_id`);

--
-- Índices para tabela `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id_objeto`),
  ADD KEY `fk_cliente_obj` (`cliente_id`);

--
-- Índices para tabela `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id_personagem`),
  ADD KEY `fk_cliente_persona` (`cliente_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `audio`
--
ALTER TABLE `audio`
  MODIFY `id_audio` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mundo`
--
ALTER TABLE `mundo`
  MODIFY `id_mundo` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id_objeto` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id_personagem` int(255) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `personagem_id` FOREIGN KEY (`personagem_id`) REFERENCES `personagem` (`id_personagem`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fk_cliente_imagem` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `imagem_mundo`
--
ALTER TABLE `imagem_mundo`
  ADD CONSTRAINT `fk_imagem` FOREIGN KEY (`imagem_id`) REFERENCES `imagem` (`id_imagem`),
  ADD CONSTRAINT `fk_mundo` FOREIGN KEY (`mundo_id`) REFERENCES `mundo` (`id_mundo`);

--
-- Limitadores para a tabela `imagem_objeto`
--
ALTER TABLE `imagem_objeto`
  ADD CONSTRAINT `imagem_id` FOREIGN KEY (`imagem_id`) REFERENCES `imagem` (`id_imagem`),
  ADD CONSTRAINT `objeto_id` FOREIGN KEY (`objeto_id`) REFERENCES `objeto` (`id_objeto`);

--
-- Limitadores para a tabela `imagem_personagem`
--
ALTER TABLE `imagem_personagem`
  ADD CONSTRAINT `fk_personagem` FOREIGN KEY (`personagem_id`) REFERENCES `personagem` (`id_personagem`),
  ADD CONSTRAINT `imagem_fk` FOREIGN KEY (`imagem_id`) REFERENCES `imagem` (`id_imagem`);

--
-- Limitadores para a tabela `mundo`
--
ALTER TABLE `mundo`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `objeto`
--
ALTER TABLE `objeto`
  ADD CONSTRAINT `fk_cliente_obj` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `personagem`
--
ALTER TABLE `personagem`
  ADD CONSTRAINT `fk_cliente_persona` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
