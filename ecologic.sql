-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/06/2022 às 15:02
-- Versão do servidor: 8.0.29
-- Versão do PHP: 7.4.29
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Banco de dados: `ecologic`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamado`
--

CREATE TABLE `chamado` (
  `id` int NOT NULL,
  `local` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `km_saida` int NOT NULL,
  `km_entrada` int DEFAULT NULL,
  `concluido` tinyint(1) NOT NULL,
  `data` timestamp NOT NULL,
  `id_func` int NOT NULL,
  `id_veiculo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamado`
--

INSERT INTO `chamado` (`id`, `local`, `km_saida`, `km_entrada`, `concluido`, `data`, `id_func`, `id_veiculo`) VALUES
(11, 'Rua José Pedro Campos, 107', 1234, 5432, 1, '2022-06-12 16:43:53', 10, 5),
(12, 'Servidão João Magalhães, 86', 1234, 12341234, 1, '2022-06-12 18:55:24', 11, 4),
(13, 'Rua General Potiguara, 487', 12, 23, 1, '2022-06-12 21:51:11', 10, 5),
(14, 'Servidão Papapizza, 749', 8756, 8766, 1, '2022-06-12 21:59:37', 6, 4),
(17, 'Senai Florianópolis', 32, 43, 1, '2022-06-13 22:36:13', 5, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int NOT NULL,
  `nome` varchar(220) COLLATE utf8mb4_general_ci NOT NULL,
  `contato` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `cnh` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `disponivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `contato`, `cnh`, `disponivel`) VALUES
(5, 'Margiory Simas', '48984737977', '12341234122', 1),
(6, 'João Victor Guimarães', '48988392294', '12341234443', 1),
(10, 'Jovanny Loesch', '12341234121', '12341234121', 1),
(11, 'Maria Cristiana', '48988392294', '12332186544', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `admin`) VALUES
(2, 'Admin', 'admin@senai.com.br', 'd9b1d7db4cd6e70935368a1efb10e377', 1),
(7, 'treinamento', 'j_vivito2@hotmail.com', '202cb962ac59075b964b07152d234b70', 0),
(11, 'Diego Alves', 'Deigo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(20, 'Teste', 'teste@hotmail.com', '8037a5d66a4168c308cdeb189f319108', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int NOT NULL,
  `modelo` varchar(220) COLLATE utf8mb4_general_ci NOT NULL,
  `ano` year NOT NULL,
  `autonomia` double NOT NULL,
  `disponivel` tinyint(1) NOT NULL,
  `placa` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `modelo`, `ano`, `autonomia`, `disponivel`, `placa`) VALUES
(1, 'Ford KA', 2003, 1.2, 1, 'RIO2A18'),
(4, 'Audi A4', 2008, 1, 1, 'RIO2A19'),
(5, 'Volkswagen Parati Turbo 2.1', 2002, 23.2, 1, 'AFB1A12');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_func` (`id_func`),
  ADD KEY `id_veiculo` (`id_veiculo`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `id_func` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
