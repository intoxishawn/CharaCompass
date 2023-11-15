-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Nov-2023 às 21:59
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
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(255) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `senha_cliente` varchar(255) NOT NULL,
  `pfp_caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `email_cliente`, `senha_cliente`, `pfp_caminho`) VALUES
(11, 'intoxishawn', 'nicolini.larissa@gmail.com', '$2y$10$CpLrFEKNXyzF/pLoTnfxr.OUfyIXOcEPj30Ax4vTgIf.9m/miJXEK', NULL),
(12, 'caraca', 'waltermorais7@gmail.com', '$2y$10$0FYC167BGywQQ5PIpCEa6Ocrvr7bI3zqvOdFVnN./O62R7qABKjdi', NULL),
(13, 'pinto', 'pinto@gmail.com', '$2y$10$JQTip3tKUpC9i8LfqwvJJej3DJlR5Lo0HT707PRonVPv7/poHGS1e', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mundo`
--

CREATE TABLE `mundo` (
  `id_mundo` int(255) NOT NULL,
  `nome_mundo` varchar(255) NOT NULL,
  `info_mundo` text DEFAULT NULL,
  `trivia_mundo` text DEFAULT NULL,
  `cliente_id` int(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `mundo`
--

INSERT INTO `mundo` (`id_mundo`, `nome_mundo`, `info_mundo`, `trivia_mundo`, `cliente_id`, `imagem`) VALUES
(8, 'Mundo rosa', '70% do mundo é agua rosa e 30% é terra azul<br>', 'Tem peixes verdes<br>', 12, NULL);

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
  `cliente_id` int(255) NOT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `objeto`
--

INSERT INTO `objeto` (`id_objeto`, `nome_objeto`, `caracteristicas`, `historia_objeto`, `trivia_objeto`, `cliente_id`, `anexo`) VALUES
(7, 'espada de gelo', 'Ela é grande e pesa 4 kg<br>', 'Ela foi esculpida para defender um povo da groelandia<br>', 'Ela não pode sair da Groelândia<br>', 13, NULL);

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
  `cliente_id` int(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `personagem`
--

INSERT INTO `personagem` (`id_personagem`, `nome_personagem`, `info_personagem`, `personalidade`, `historia`, `trivia_personagem`, `cliente_id`, `imagem`) VALUES
(5, 'Henry Magnolium', 'Henry é um incubus nascido de um humano com uma succubus.<br>', 'Medroso e paranóico, porém muito otimista com o seu relacionamento com John<br>', 'Henry fugiu de sua terra natal após se envolver com um anjo.<br>', 'Henry tem 1,65m e pesa 45kg<br>', 11, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

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
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `mundo`
--
ALTER TABLE `mundo`
  MODIFY `id_mundo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id_objeto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id_personagem` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

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
