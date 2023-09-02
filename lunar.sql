-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/09/2023 às 00:34
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lunar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chats`
--

INSERT INTO `chats` (`chat_id`, `post_id`) VALUES
(1, 9),
(2, 10),
(3, 11),
(4, 12),
(5, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `MEN_CODIGO` int(11) NOT NULL,
  `MEN_POST_ID` int(11) DEFAULT NULL,
  `MEN_USUARIO` varchar(30) DEFAULT NULL,
  `MEN_CONTEUDO` varchar(500) DEFAULT NULL,
  `MEN_DATA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`MEN_CODIGO`, `MEN_POST_ID`, `MEN_USUARIO`, `MEN_CONTEUDO`, `MEN_DATA`) VALUES
(1, 9, 'usuário', '', NULL),
(2, 9, '', 'oi', NULL),
(3, 9, '', 'tchau', NULL),
(4, 2, '', 'ooi\r\n', NULL),
(5, 9, '', 'JOOOOOOOOOOje\r\n', NULL),
(6, 10, 'usuário', '2 fez uma nova postagem', NULL),
(7, 11, 'usuário', '1 fez uma nova postagem', NULL),
(8, 12, 'usuário', 'Usuario1 fez uma nova postagem', NULL),
(9, 10, '', 'horrivel!!!\r\n', NULL),
(10, 13, 'usuário', 'Juh fez uma nova postagem', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lida` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `mensagem`, `data_criacao`, `lida`) VALUES
(1, 1, 'Você foi seguido por Usuario2', '0000-00-00 00:00:00', 0),
(2, 2, '1 fez uma nova postagem', '2023-09-01 02:48:22', 0),
(3, 2, 'Usuario1 fez uma nova postagem', '2023-09-01 03:02:26', 0),
(4, 2, 'Você foi seguido por Usuario1', '0000-00-00 00:00:00', 0),
(5, 2, 'Você foi deixado de seguir por Usuario1', '0000-00-00 00:00:00', 0),
(6, 2, 'Você foi seguido por Usuario1', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipoArt` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `imagem`, `nome`, `tipoArt`, `descricao`, `id_user`, `chat_id`, `data`) VALUES
(1, 'uploads/1297525.jpg', 'teste 1', 'Pintura', '#<br />\r\n#<br />\r\n#<br />\r\n#', 1, 0, '2023-08-31 22:16:24'),
(2, 'uploads/1326140.jpeg', 'teste1', 'Pintura', '#<br />\r\n#<br />\r\n#<br />\r\n#', 2, 0, '2023-08-31 22:33:55'),
(3, 'uploads/1102798.jpg', 'teste2', 'Pintura', '#<br />\r\n#<br />\r\n#<br />\r\n#', 2, 0, '2023-08-31 22:55:43'),
(4, 'uploads/1297525.jpg', 'teste2', 'Pintura', '#<br />\r\n#<br />\r\n#<br />\r\n#', 2, 0, '2023-08-31 23:03:27'),
(5, 'uploads/976746.jpg', 'Gwen', 'Pintura', '#<br />\r\n#<br />\r\n#<br />\r\n#', 2, 0, '2023-08-31 23:12:29'),
(7, 'uploads/976746.jpg', 'gwen', 'Desenho', '#<br />\r\n#<br />\r\n#<br />\r\n#<br />\r\n', 2, 0, '2023-09-01 00:50:15'),
(8, 'uploads/976746.jpg', 'gwen', 'Desenho', '#<br />\r\n#<br />\r\n#<br />\r\n#<br />\r\n', 2, 7, '2023-09-01 00:50:15'),
(9, 'uploads/1310961.jpeg', 'punk', 'Pintura', '<br />\r\n%%<br />\r\n<br />\r\n%<br />\r\n%<br />\r\n%<br />\r\n%<br />\r\n%<br />\r\n<br />\r\n%<br />\r\n', 2, 0, '2023-09-01 01:36:03'),
(10, 'uploads/1316077.jpeg', 'teste mensagem', 'Pintura', 'g<br />\r\ng<br />\r\ng<br />\r\ng<br />\r\n', 2, 0, '2023-09-01 02:46:07'),
(11, 'uploads/1317555.jpeg', 'Miles', 'Pintura', '', 1, 0, '2023-09-01 02:48:22'),
(12, 'uploads/R.jpg', 'Teste', 'Pintura', '', 1, 0, '2023-09-01 03:02:26'),
(13, 'uploads/1078854.png', 'Juliana de Oliveira costa', 'Pintura', 'llll<br />\r\n', 4, 0, '2023-09-01 21:34:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `seguidores`
--

CREATE TABLE `seguidores` (
  `id` int(11) NOT NULL,
  `seguidor_id` int(11) NOT NULL,
  `seguindo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `seguidores`
--

INSERT INTO `seguidores` (`id`, `seguidor_id`, `seguindo_id`) VALUES
(1, 2, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` varchar(255) NOT NULL,
  `backFoto` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `tipoArt` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `nick`, `senha`, `perfil`, `backFoto`, `bio`, `tipoArt`, `data`) VALUES
(1, 'Jose Gustavo', 'josegustavocostaantonelli@gmail.com', 'Usuario1', '123456789', 'fotosPerfil/1310987.jpeg', 'fotosPerfil/1317553.jpeg', '$<br />\r\n%<br />\r\n¨<br />\r\n&', 'Pintura', '2023-09-01 21:21:45'),
(2, 'Gustavo', 'Jose@gmail.com', 'Usuario2', '123456789', 'fotosPerfil/1297525.jpg', 'fotosPerfil/1310987.jpeg', '#<br />\r\n#<br />\r\n#<br />\r\n#<br />\r\n#', 'Pintura', '2023-08-31 22:33:29'),
(3, 'gui', 'gui@gmail.com', 'gui', '123', 'fotosPerfil/976746.jpg', 'fotosPerfil/976746.jpg', 'pica', 'Design', '2023-09-01 11:55:13'),
(4, 'Juliana de Oliveira costa', 'juumarinheiro@gmail.com', 'Juh', '123', 'fotosPerfil/976746.jpg', 'fotosPerfil/1043468.jpg', 'eu sou prof de matemática e mãe do Jose ', 'Pintura', '2023-09-01 21:29:12');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`MEN_CODIGO`),
  ADD KEY `MEN_POST_ID` (`MEN_POST_ID`);

--
-- Índices de tabela `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguidor_id` (`seguidor_id`),
  ADD KEY `seguindo_id` (`seguindo_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `MEN_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Restrições para tabelas `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`MEN_POST_ID`) REFERENCES `posts` (`id`);

--
-- Restrições para tabelas `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`seguidor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`seguindo_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
