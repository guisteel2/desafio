-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08-Fev-2021 às 06:57
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `desafio_webpumb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `codigo`, `nome`, `created_at`, `updated_at`) VALUES
(13, 1, 'Tenis', '2021-02-08', '2021-02-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `descricao` varchar(256) NOT NULL,
  `produto_id` bigint(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `url`, `descricao`, `produto_id`, `created_at`, `updated_at`) VALUES
(1, '..\\assets\\images\\product/1tenis-2d-shoes.png', 'tenis-2d-shoes.png', 1, '2021-02-08', '2021-02-08'),
(2, '..\\assets\\images\\product/2tenis-basket-light.png', 'tenis-basket-light.png', 2, '2021-02-08', '2021-02-08'),
(3, '..\\assets\\images\\product/3tenis-sneakers-43n.png', 'tenis-sneakers-43n.png', 3, '2021-02-08', '2021-02-08'),
(4, '..\\assets\\images\\product/4tenis-2d-shoes.png', 'tenis-2d-shoes.png', 4, '2021-02-08', '2021-02-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `Nome` varchar(256) NOT NULL,
  `SKU` varchar(256) NOT NULL,
  `preco` float NOT NULL,
  `descricao` varchar(256) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `categoria_id` bigint(20) NOT NULL,
  `foto_id` bigint(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `Nome`, `SKU`, `preco`, `descricao`, `quantidade`, `categoria_id`, `foto_id`, `created_at`, `updated_at`) VALUES
(1, 'Tenis 01', '01', 23.32, 'Para corrida', 2, 13, 1, '2021-02-08', '2021-02-08'),
(2, 'Tenis 02', '02', 10.23, '....', 3, 13, 2, '2021-02-08', '2021-02-08'),
(3, 'Tenis 04', '04', 87.98, 'para futebol de salao', 2, 13, 3, '2021-02-08', '2021-02-08'),
(4, 'Tenis 05', '05', 2.98, '.....', 3, 13, 4, '2021-02-08', '2021-02-08');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
