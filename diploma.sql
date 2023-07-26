-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2023 at 09:10 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diploma`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type_Id` int NOT NULL,
  `interest` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `name`, `url`, `type_Id`, `interest`) VALUES
(1, 'Ключевые soft skills для IT-специалиста за рубежом', 'TargetSkills.php', 1, 0),
(2, 'Как поменять карьерный путь в ИТ внутри компании', 'ChangeWay.php', 1, 0),
(3, 'Краткий обзор языка C#', 'SharpBeg.php', 1, 0),
(4, 'Освоить веб-дизайн с нуля: что читать и где учиться?', 'Web-design.php', 1, 0),
(5, 'Roadmap.React', 'roadmapReact.php', 2, 0),
(6, 'Roadmap.Go', 'roadmapGo.php', 2, 0),
(7, 'Python', 'testPython.php', 1, 0),
(9, 'Микропроцессоры', '#', 1, 0),
(10, 'Unity с чего начать?', '#', 1, 0),
(11, 'MySQL планировка задач', '#', 1, 0),
(12, 'Kotlin база мобильных разработок', '#', 1, 0),
(13, 'С чего начать путь администратора информационных систем?', '#', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `articleimg`
--

CREATE TABLE `articleimg` (
  `id` int NOT NULL,
  `articleid` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articleimg`
--

INSERT INTO `articleimg` (`id`, `articleid`, `name`) VALUES
(1, 1, 'skill.png'),
(2, 2, 'it.png'),
(3, 3, 'pic2.png'),
(4, 4, 'web.png'),
(5, 5, 'reactfake.png'),
(6, 6, 'go.png'),
(7, 7, 'python.png'),
(8, 9, 'microproc.jpg'),
(9, 10, 'unity.png'),
(10, 11, 'Mysql.png'),
(11, 12, 'kotlin.jpg'),
(12, 13, 'set.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `articletags`
--

CREATE TABLE `articletags` (
  `id` int NOT NULL,
  `articleid` int NOT NULL,
  `tags_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articletags`
--

INSERT INTO `articletags` (`id`, `articleid`, `tags_id`) VALUES
(2, 1, 7),
(5, 2, 7),
(1, 3, 1),
(7, 4, 6),
(10, 5, 6),
(4, 7, 2),
(6, 9, 3),
(8, 10, 4),
(9, 11, 8),
(12, 12, 9),
(11, 13, 13);

-- --------------------------------------------------------

--
-- Table structure for table `articletype`
--

CREATE TABLE `articletype` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articletype`
--

INSERT INTO `articletype` (`id`, `name`, `description`) VALUES
(1, 'Статья', 'Исследование по какой-то теме'),
(2, 'Роадмапа', 'Краткий экскурс по аспектам изучаемой области'),
(3, 'Тест', 'Ответы на вопросы');

-- --------------------------------------------------------

--
-- Table structure for table `forumtheme`
--

CREATE TABLE `forumtheme` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topicstarter` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forumtheme`
--

INSERT INTO `forumtheme` (`id`, `name`, `date`, `topicstarter`) VALUES
(1, 'Библиотеки JavaScript', '2022-05-24 17:42:40', 5),
(2, 'sql', '2022-05-24 21:43:37', 9),
(3, 'c#', '2022-05-25 10:51:19', 7),
(6, 'Python ', '2022-06-15 15:13:08', 13),
(7, 'Диплом', '2022-06-19 18:18:22', 13);

-- --------------------------------------------------------

--
-- Table structure for table `likedpost`
--

CREATE TABLE `likedpost` (
  `Id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likedpost`
--

INSERT INTO `likedpost` (`Id`, `post_id`, `user_id`) VALUES
(20, 1, 11),
(1, 2, 8),
(21, 2, 11),
(18, 3, 10),
(22, 3, 11),
(2, 4, 10),
(25, 4, 13),
(19, 5, 11),
(23, 5, 13),
(24, 7, 13);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `topic_id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `topic_id`, `user_id`, `text`) VALUES
(10, 3, 7, 'Подскажите как реализовать чат на React'),
(12, 2, 7, 'Подскажите как сделать запросы с отслеживанием свободных номеров брони'),
(18, 3, 10, 'Нужно использовать сокеты'),
(19, 1, 12, 'Библиотеки JavaScript'),
(20, 6, 13, 'нейросети'),
(21, 7, 13, 'ЛДимфвып');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'C#'),
(2, 'Python'),
(3, 'Микропроцессоры'),
(4, 'Разработка игр'),
(5, 'Нейросети'),
(6, 'Веб-дизайн'),
(7, 'Навыки'),
(8, 'Анализ данных'),
(9, 'Мобильная разработка'),
(10, 'Тестирование'),
(11, 'Операционные системы'),
(12, 'Компьютерная графика'),
(13, 'Сетевые технологии');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `token` varchar(200) NOT NULL,
  `Usertype` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `token`, `Usertype`) VALUES
(5, '54321', 'ee25697d35fd01ffa8192496589191553fcea14e', '74ff71056ec04b68322cc33457d4b8ae', 0),
(7, 'aboba', 'f9c0430325f228cd106075a5536d81751b1ca5d8', '1c5a283533517a4f3454b2f67a44685f', 0),
(8, 'denchik', '2cffc4b4700c11d39c613638334881b18145cafb', '05eafc1d3fe750023f1f6d0e5eac6c6d', 0),
(9, 'oleg', '2ed6e4925410fdb251fd615b67ee961a875b6d13', '5b73aeba5570214464a5fa27205ac244', 0),
(10, 'test', '3897148c62b21b753cbb821246e9bd34a16dfbaa', '475a98110a4d330715a901fe012a9a89', 1),
(11, 'test2', 'e379818389c79feead3030a7eb88ddf0a0d3b528', '249c06ca602c4f704a8558d1265f133e', 0),
(12, 'vanek', '301ef59db9ca7f02c0b0bae5bfd227c19db092f7', '38ac45de30dfa75e48e04af65b9c1799', 0),
(13, 'keril', 'b887cb1ec2bb61fe5d1cb540e9b8bdd43de0b25e', '183299bc076f6850671631350cb76dff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertags`
--

CREATE TABLE `usertags` (
  `id` int NOT NULL,
  `tags_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertags`
--

INSERT INTO `usertags` (`id`, `tags_id`, `user_id`) VALUES
(5, 1, 10),
(6, 1, 12),
(7, 7, 13);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`) VALUES
(0, ''),
(1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_Id` (`type_Id`);

--
-- Indexes for table `articleimg`
--
ALTER TABLE `articleimg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleid` (`articleid`);

--
-- Indexes for table `articletags`
--
ALTER TABLE `articletags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleidt` (`articleid`,`tags_id`),
  ADD KEY `tags_id` (`tags_id`);

--
-- Indexes for table `articletype`
--
ALTER TABLE `articletype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumtheme`
--
ALTER TABLE `forumtheme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topicstarter` (`topicstarter`);

--
-- Indexes for table `likedpost`
--
ALTER TABLE `likedpost`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `message_id` (`post_id`,`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `Usertype` (`Usertype`);

--
-- Indexes for table `usertags`
--
ALTER TABLE `usertags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_id` (`tags_id`,`user_id`),
  ADD KEY `User-id` (`user_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `articleimg`
--
ALTER TABLE `articleimg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `articletags`
--
ALTER TABLE `articletags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `articletype`
--
ALTER TABLE `articletype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forumtheme`
--
ALTER TABLE `forumtheme`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likedpost`
--
ALTER TABLE `likedpost`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usertags`
--
ALTER TABLE `usertags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`type_Id`) REFERENCES `articletype` (`id`);

--
-- Constraints for table `articleimg`
--
ALTER TABLE `articleimg`
  ADD CONSTRAINT `articleimg_ibfk_1` FOREIGN KEY (`articleid`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articletags`
--
ALTER TABLE `articletags`
  ADD CONSTRAINT `articletags_ibfk_1` FOREIGN KEY (`articleid`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articletags_ibfk_2` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forumtheme`
--
ALTER TABLE `forumtheme`
  ADD CONSTRAINT `forumtheme_ibfk_1` FOREIGN KEY (`topicstarter`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likedpost`
--
ALTER TABLE `likedpost`
  ADD CONSTRAINT `likedpost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likedpost_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `forumtheme` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Usertype`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertags`
--
ALTER TABLE `usertags`
  ADD CONSTRAINT `usertags_ibfk_1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertags_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
