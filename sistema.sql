-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 20-Jan-2019 às 23:41
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso_adm`
--

CREATE TABLE `acesso_adm` (
  `id_acesso` int(10) NOT NULL,
  `status_acesso` int(10) NOT NULL,
  `nome_acesso` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `acesso_adm`
--

INSERT INTO `acesso_adm` (`id_acesso`, `status_acesso`, `nome_acesso`) VALUES
(1, 1, 'Geral'),
(2, 2, 'Planos'),
(3, 3, 'Candidatos'),
(4, 4, 'Empresa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(10) NOT NULL,
  `nomeADM` varchar(50) NOT NULL,
  `email_administrador` varchar(30) NOT NULL,
  `senha_administrador` varchar(255) NOT NULL,
  `acesso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nomeADM`, `email_administrador`, `senha_administrador`, `acesso`) VALUES
(1, 'Master', 'admin@bol.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `id` int(10) NOT NULL,
  `area_nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id`, `area_nome`) VALUES
(1, 'Tecnologia da informa&ccedil;&atilde;o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `id_candidato` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_inscricao` varchar(50) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `num` varchar(10) DEFAULT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `pais` text NOT NULL,
  `passaport` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `curso` text NOT NULL,
  `situacao_curso` varchar(20) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `video_nome` varchar(255) NOT NULL,
  `area` varchar(30) NOT NULL,
  `recomendados` int(10) NOT NULL,
  `vistos` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `nascimento` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `pcd` varchar(3) NOT NULL,
  `foto_candidato` varchar(255) NOT NULL,
  `confirmou_email` text NOT NULL COMMENT 'sim ou nao',
  `primeiro_acesso` text NOT NULL COMMENT 'caso as informações principais ainda não tenham sido cadastradas, então exibe uma tela para cadastrar os dados. (esse campo vai receber sim ou nao)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos_comprados`
--

CREATE TABLE `candidatos_comprados` (
  `id_comprado` int(10) NOT NULL,
  `id_candidato_comprado` int(10) NOT NULL,
  `id_empresa_compradora` int(10) NOT NULL,
  `data_compra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `preco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos_pedidos`
--

CREATE TABLE `candidatos_pedidos` (
  `id_pedido_candidato` int(10) NOT NULL,
  `id_candidato_pedido` int(10) NOT NULL,
  `id_empresa_pedido` int(10) NOT NULL,
  `status_pedido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_pedido` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `forma_pagamento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `preco` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculumEnviado`
--

CREATE TABLE `curriculumEnviado` (
  `id_curriculum` int(10) NOT NULL,
  `id_vaga_curriculum` int(10) NOT NULL,
  `id_empresa_curriculum` int(10) NOT NULL,
  `id_candidato_curriculum` int(10) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `nome_curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `id_area`, `nome_curso`) VALUES
(1, 1, 'Programa&ccedil;&atilde;o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `educacao`
--

CREATE TABLE `educacao` (
  `id` int(11) NOT NULL,
  `email_candidato` varchar(50) NOT NULL,
  `dataReferencia` varchar(50) NOT NULL,
  `curso2` varchar(100) NOT NULL,
  `instituicao` varchar(100) NOT NULL,
  `cidadeEstado2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `ramo` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `plano_empresa` int(10) NOT NULL,
  `limite_restante_vagas_plano` int(10) NOT NULL,
  `data_inicio_plano` varchar(50) NOT NULL,
  `data_termino_plano` varchar(50) NOT NULL,
  `meses_pagos` int(10) NOT NULL,
  `valor_plano` decimal(10,2) NOT NULL,
  `saldo_adicionado_do_mes` int(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `data_inscricao` varchar(20) NOT NULL,
  `num` varchar(10) NOT NULL,
  `confirmou_email` text NOT NULL COMMENT 'sim ou nao',
  `primeiro_acesso` text NOT NULL COMMENT 'caso as informações principais ainda não tenham sido cadastradas, então exibe uma tela para cadastrar os dados. (esse campo vai receber sim ou nao)',
  `pais` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencia`
--

CREATE TABLE `experiencia` (
  `id` int(11) NOT NULL,
  `email_candidato` varchar(50) NOT NULL,
  `dataReferencia` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `cidadeEstado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilidade`
--

CREATE TABLE `habilidade` (
  `id` int(11) NOT NULL,
  `email_candidato` varchar(50) NOT NULL,
  `porcentagem` varchar(10) NOT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesses`
--

CREATE TABLE `interesses` (
  `id` int(11) NOT NULL,
  `email_candidato` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(10) NOT NULL,
  `id_candidato` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` varchar(30) NOT NULL,
  `autor` varchar(30) NOT NULL COMMENT 'se for a empresa que enviou a mensagem, então esse campo recebe o valor "empresa", caso seja o candidato, recebe "candidato"',
  `empresa_leu` varchar(3) NOT NULL COMMENT 'Essa confirmação vale apenas para a empresa, se ela tiver lido, então esse campo recebe sim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidade_planos`
--

CREATE TABLE `mensalidade_planos` (
  `id_mensalidade` int(10) NOT NULL,
  `id_mensalidade_plano` int(10) NOT NULL,
  `id_mensalidade_empresa` int(10) NOT NULL,
  `mensalidade_vencimento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mensalidade_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id_planos` int(10) NOT NULL,
  `nome_planos` varchar(100) NOT NULL,
  `limite_planos` int(10) NOT NULL,
  `valor_planos` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id_planos`, `nome_planos`, `limite_planos`, `valor_planos`) VALUES
(1, 'Plano b&aacute;sico', 5, '4.50'),
(2, 'Plano premium', 9, '7.50'),
(3, 'Plano intermediario', 7, '6.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos_avulsos`
--

CREATE TABLE `planos_avulsos` (
  `id_planos_avulsos` int(10) NOT NULL,
  `valor_planos_avulsos` decimal(10,2) NOT NULL,
  `nivel_planos_avulsos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos_avulsos`
--

INSERT INTO `planos_avulsos` (`id_planos_avulsos`, `valor_planos_avulsos`, `nivel_planos_avulsos`) VALUES
(3, '3.50', 'Formado'),
(4, '2.50', 'Cursando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos_pedidos`
--

CREATE TABLE `planos_pedidos` (
  `id_planos_pedido` int(10) NOT NULL,
  `id_empresa_planos_pedido` int(10) NOT NULL,
  `id_planos` int(10) NOT NULL,
  `status_planos_pedido` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `taxa` decimal(10,2) NOT NULL,
  `preco_total` decimal(10,2) NOT NULL,
  `code` varchar(50) NOT NULL,
  `meses_sendo_pagos` int(10) NOT NULL,
  `tipo_de_pagamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontoforte`
--

CREATE TABLE `pontoforte` (
  `id` int(10) NOT NULL,
  `email_candidato` varchar(50) NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `email_candidato` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recomendados`
--

CREATE TABLE `recomendados` (
  `id_recomendados` int(10) NOT NULL,
  `id_recomendados_candidato` int(10) NOT NULL,
  `id_recomendados_empresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id_vaga` int(10) UNSIGNED NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome_vaga` varchar(50) NOT NULL,
  `empresa_vaga` varchar(30) NOT NULL,
  `empresa_id` int(10) NOT NULL,
  `salario_vaga` varchar(15) NOT NULL,
  `experiencia_vaga` varchar(100) NOT NULL,
  `curso_vaga` int(10) NOT NULL,
  `area_curso` int(10) NOT NULL,
  `status_vaga` int(10) NOT NULL,
  `pcd` varchar(3) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `va_posts`
--

CREATE TABLE `va_posts` (
  `id` int(11) NOT NULL,
  `id_candidato` varchar(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `categoria` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visitas` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE `visitas` (
  `id_visitas` int(10) NOT NULL,
  `id_candidato` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `nome_empresa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso_adm`
--
ALTER TABLE `acesso_adm`
  ADD PRIMARY KEY (`id_acesso`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id_candidato`);

--
-- Indexes for table `candidatos_comprados`
--
ALTER TABLE `candidatos_comprados`
  ADD PRIMARY KEY (`id_comprado`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educacao`
--
ALTER TABLE `educacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `habilidade`
--
ALTER TABLE `habilidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interesses`
--
ALTER TABLE `interesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensalidade_planos`
--
ALTER TABLE `mensalidade_planos`
  ADD PRIMARY KEY (`id_mensalidade`);

--
-- Indexes for table `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id_planos`);

--
-- Indexes for table `planos_avulsos`
--
ALTER TABLE `planos_avulsos`
  ADD PRIMARY KEY (`id_planos_avulsos`);

--
-- Indexes for table `planos_pedidos`
--
ALTER TABLE `planos_pedidos`
  ADD PRIMARY KEY (`id_planos_pedido`);

--
-- Indexes for table `pontoforte`
--
ALTER TABLE `pontoforte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recomendados`
--
ALTER TABLE `recomendados`
  ADD PRIMARY KEY (`id_recomendados`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id_vaga`);

--
-- Indexes for table `va_posts`
--
ALTER TABLE `va_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso_adm`
--
ALTER TABLE `acesso_adm`
  MODIFY `id_acesso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id_candidato` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidatos_comprados`
--
ALTER TABLE `candidatos_comprados`
  MODIFY `id_comprado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `educacao`
--
ALTER TABLE `educacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `habilidade`
--
ALTER TABLE `habilidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interesses`
--
ALTER TABLE `interesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `mensalidade_planos`
--
ALTER TABLE `mensalidade_planos`
  MODIFY `id_mensalidade` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planos`
--
ALTER TABLE `planos`
  MODIFY `id_planos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `planos_avulsos`
--
ALTER TABLE `planos_avulsos`
  MODIFY `id_planos_avulsos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `planos_pedidos`
--
ALTER TABLE `planos_pedidos`
  MODIFY `id_planos_pedido` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pontoforte`
--
ALTER TABLE `pontoforte`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recomendados`
--
ALTER TABLE `recomendados`
  MODIFY `id_recomendados` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id_vaga` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `va_posts`
--
ALTER TABLE `va_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visitas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
