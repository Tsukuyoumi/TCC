-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/10/2023 às 21:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

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
(1, 14),
(2, 15),
(3, 16),
(4, 17),
(5, 18),
(6, 19),
(7, 20),
(8, 21),
(9, 22);

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
(1, 14, 'usuário', 'GU fez uma nova postagem', NULL),
(2, 15, 'usuário', 'testinho fez uma nova postagem', NULL),
(3, 16, 'usuário', 'testinho fez uma nova postagem', NULL),
(4, 17, 'usuário', 'testinho fez uma nova postagem', NULL),
(5, 18, 'usuário', 'testinho fez uma nova postagem', NULL),
(6, 19, 'usuário', 'tete fez uma nova postagem', NULL),
(7, 20, 'usuário', 'bata fez uma nova postagem', NULL),
(8, 21, 'usuário', 'bata fez uma nova postagem', NULL),
(9, 22, 'usuário', 'tutu fez uma nova postagem', NULL);

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
(2, 6, 'Você foi seguido por testinho', '2023-10-23 17:50:13', 0),
(3, 6, 'Você foi seguido por tete', '2023-10-23 17:56:45', 0),
(4, 7, 'Você foi seguido por tete', '2023-10-23 17:57:13', 0),
(5, 7, 'Você foi deixado de seguir por tete', '2023-10-23 17:57:21', 0),
(6, 7, 'Você foi seguido por tete', '2023-10-23 17:57:23', 0),
(7, 7, 'bata fez uma nova postagem', '2023-10-23 18:00:11', 0),
(8, 8, 'bata fez uma nova postagem', '2023-10-23 18:00:11', 0),
(9, 7, 'bata fez uma nova postagem', '2023-10-23 18:00:18', 0),
(10, 8, 'bata fez uma nova postagem', '2023-10-23 18:00:18', 0),
(11, 8, 'Você foi seguido por gu', '2023-10-23 18:11:57', 0),
(12, 8, 'Você foi deixado de seguir por gu', '2023-10-23 18:12:00', 0),
(13, 6, 'Você foi seguido por gu', '2023-10-23 18:12:06', 0),
(14, 6, 'Você foi deixado de seguir por gu', '2023-10-23 18:12:23', 0),
(15, 6, 'Você foi seguido por tutu', '2023-10-23 18:14:12', 0),
(16, 9, 'Você foi seguido por gu', '2023-10-23 18:16:08', 0),
(17, 7, 'Você foi seguido por gu', '2023-10-23 18:16:18', 0);

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
(14, 'uploads/1310342.jpg', 'Teste', 'Pintura', '#<br />\r\n#<br />\r\n#<br />\r\n#<br />\r\n<br />\r\n#', 5, 0, '2023-09-28 17:56:30'),
(15, 'uploads/71a6c2_c849bffd831349aaab8613cc15f9481a~mv2.webp', 'teste', 'Desenho', 'teste', 7, 0, '2023-10-23 17:50:29'),
(16, 'uploads/1273795.png', '', 'Pintura', '', 7, 0, '2023-10-23 17:51:39'),
(17, 'uploads/1064205.png', '', 'Pintura', '', 7, 0, '2023-10-23 17:51:47'),
(18, 'uploads/1275363.jpg', '', 'Pintura', '', 7, 0, '2023-10-23 17:51:56'),
(19, 'uploads/1064205.png', '456', 'Pintura', '', 8, 0, '2023-10-23 17:57:50'),
(20, 'uploads/wallpaperflare.com_wallpaper.jpg', '', 'Pintura', '', 6, 0, '2023-10-23 18:00:11'),
(21, 'uploads/968265.png', '', 'Pintura', '', 6, 0, '2023-10-23 18:00:18'),
(22, 'uploads/wallpaperflare.com_wallpaper.jpg', '', 'Pintura', '', 9, 0, '2023-10-23 18:10:31');

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
(2, 7, 6),
(3, 8, 6),
(5, 8, 7),
(8, 9, 6),
(9, 10, 9),
(10, 10, 7);

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
(6, 'Gustavo', 'Jose@gmail.com', 'bata', '123456789', 'fotosPerfil/1275363.jpg', 'fotosPerfil/71a6c2_c849bffd831349aaab8613cc15f9481a~mv2.webp', 'jojo', 'Pintura', '2023-10-23 17:44:59'),
(7, 'teste', 'test@gmail.com', 'testinho', '123', 'fotosPerfil/baixados.jpg', 'fotosPerfil/1273795.png', 'jojo', 'Pintura', '2023-10-23 17:49:55'),
(8, 'tet', 'tet@gmail.com', 'tete', '123', 'fotosPerfil/shkajsdskf87349gb.jpg', 'fotosPerfil/kjmkhinfwvruiiw31.jpg', '', '', '2023-10-23 17:53:00'),
(9, 'tutu', 'tutu@gmail.com', 'tutu', '123', 'fotosPerfil/shkajsdskf87349gb.jpg', 'fotosPerfil/kjmkhinfwvruiiw31.jpg', '', '', '2023-10-23 18:00:46'),
(10, 'gu', 'gu@gmail.com', 'gu', '123', 'fotosPerfil/shkajsdskf87349gb.jpg', 'fotosPerfil/kjmkhinfwvruiiw31.jpg', '', '', '2023-10-23 18:10:56');

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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `MEN_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`seguidor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seguidores_ibfk_3` FOREIGN KEY (`seguindo_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
