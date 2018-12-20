-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 20, 2018 lúc 03:04 PM
-- Phiên bản máy phục vụ: 5.7.22-log
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test-app`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `ID_Answer` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Question` int(11) DEFAULT NULL,
  `ContentAs` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Iscorrect` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Answer`),
  KEY `answer` (`ID_Question`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answer`
--

INSERT INTO `answer` (`ID_Answer`, `ID_Question`, `ContentAs`, `Iscorrect`) VALUES
(60, 68, '2015', 0),
(61, 68, '2018', 1),
(62, 68, '2020', 0),
(63, 68, '2017', 0),
(104, 70, '2', 0),
(105, 70, '1', 1),
(106, 70, '3', 0),
(107, 70, '4', 0),
(108, 66, '3', 0),
(109, 66, '2', 1),
(110, 66, '4', 0),
(111, 66, '5', 0),
(116, 71, '8', 1),
(117, 71, '6', 0),
(118, 71, '5', 0),
(119, 71, '4', 0),
(120, 72, '6', 1),
(121, 72, '5', 0),
(122, 72, '4', 0),
(123, 72, '3', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `ID_Exam` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ExamConfig` int(11) NOT NULL DEFAULT '0',
  `ID_User` int(11) NOT NULL DEFAULT '0',
  `score` float DEFAULT NULL,
  PRIMARY KEY (`ID_Exam`),
  KEY `ID_ExamConfig` (`ID_ExamConfig`),
  KEY `ID_User` (`ID_User`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam`
--

INSERT INTO `exam` (`ID_Exam`, `ID_ExamConfig`, `ID_User`, `score`) VALUES
(6, 10, 29, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_config`
--

DROP TABLE IF EXISTS `exam_config`;
CREATE TABLE IF NOT EXISTS `exam_config` (
  `ID_ExamConfig` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Num_Question` int(11) DEFAULT NULL,
  `Totaltime` int(11) DEFAULT NULL,
  `ID_Subject` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ExamConfig`),
  KEY `ID_Subject` (`ID_Subject`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_config`
--

INSERT INTO `exam_config` (`ID_ExamConfig`, `Name`, `Num_Question`, `Totaltime`, `ID_Subject`) VALUES
(8, 'Đề thi giữa kỳ môn công nghệ web', 2, 40, 1),
(9, 'Đề thi cuối kỳ môn cơ sở dữ liệu', 2, 50, 2),
(10, 'Đề thi cuối kỳ môn kiến trúc máy tính', 2, 50, 4),
(20, 'Đề thi giữa kỳ môn kiến trúc máy tính', 2, 12, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_config_user`
--

DROP TABLE IF EXISTS `exam_config_user`;
CREATE TABLE IF NOT EXISTS `exam_config_user` (
  `ID_ex_us` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_User` int(11) DEFAULT NULL,
  `ID_ExamConfig` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ex_us`),
  KEY `ID_User` (`ID_User`),
  KEY `ID_Exam` (`ID_ExamConfig`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_config_user`
--

INSERT INTO `exam_config_user` (`ID_ex_us`, `ID_User`, `ID_ExamConfig`) VALUES
(89, 1, 20),
(90, 2, 20),
(91, 4, 20),
(92, 7, 20),
(93, 9, 20),
(94, 10, 20),
(95, 14, 20),
(96, 15, 20),
(97, 20, 20),
(98, 21, 20),
(99, 29, 10),
(100, 1, 10),
(101, 4, 10),
(102, 2, 10),
(103, 7, 10),
(104, 21, 9),
(105, 20, 9),
(106, 15, 9),
(107, 14, 9),
(108, 29, 9),
(109, 1, 8),
(110, 2, 8),
(111, 4, 8),
(112, 7, 8),
(113, 9, 8),
(114, 10, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_question`
--

DROP TABLE IF EXISTS `exam_question`;
CREATE TABLE IF NOT EXISTS `exam_question` (
  `ID_Question` int(11) NOT NULL,
  `ID_Exam` int(11) NOT NULL,
  PRIMARY KEY (`ID_Exam`,`ID_Question`),
  KEY `ID_Question` (`ID_Question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_question`
--

INSERT INTO `exam_question` (`ID_Question`, `ID_Exam`) VALUES
(70, 6),
(71, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `ID_Question` int(11) NOT NULL AUTO_INCREMENT,
  `ContentQs` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_Subject` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Question`),
  KEY `ID_Subject` (`ID_Subject`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`ID_Question`, `ContentQs`, `ID_Subject`) VALUES
(66, '1+1= mấy?', 2),
(68, 'Năm nay là năm bao nhiêu?', 1),
(70, '2-1= mấy?', 4),
(71, '9-1=mấy?', 4),
(72, '7-1 = mấy?', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `ID_Result` int(11) NOT NULL AUTO_INCREMENT,
  `ID_User` int(11) DEFAULT NULL,
  `ID_Exam` int(11) DEFAULT NULL,
  `Score` float DEFAULT NULL,
  PRIMARY KEY (`ID_Result`),
  KEY `ID_User` (`ID_User`),
  KEY `ID_Exam` (`ID_Exam`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `result`
--

INSERT INTO `result` (`ID_Result`, `ID_User`, `ID_Exam`, `Score`) VALUES
(1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `ID_Subject` int(11) NOT NULL AUTO_INCREMENT,
  `subjectName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_Subject`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`ID_Subject`, `subjectName`) VALUES
(1, 'Công nghệ web'),
(2, 'Cơ sở dữ liệu'),
(4, 'Kiến trúc máy tính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(512) NOT NULL,
  `access_level` varchar(16) NOT NULL,
  `access_code` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID_User`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `password`, `access_level`, `access_code`, `status`, `created`, `modified`) VALUES
(1, 'Mike', 'Dalisay', 'mike@example.com', '0999999999', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', '$2y$10$AUBptrm9sQF696zr8Hv31On3x4wqnTihdCLocZmGLbiDvyLpyokL.', 'Customer', '', 1, '0000-00-00 00:00:00', '2018-12-09 09:32:46'),
(2, 'Lauro', 'Abogne', 'lauro@eacomm.com', '08888888', 'Pasig City', '$2y$10$it4i11kRKrB19FfpPRWsRO5qtgrgajL7NnxOq180MsIhCKhAmSdDa', 'Admin', '', 1, '0000-00-00 00:00:00', '2018-12-08 16:31:33'),
(4, 'Darwin', 'Dalisay', 'darwin@example.com', '9331868359', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$tLq9lTKDUt7EyTFhxL0QHuen/BgO9YQzFYTUyH50kJXLJ.ISO3HAO', 'Admin', 'ILXFBdMAbHVrJswNDnm231cziO8FZomn', 1, '2014-10-29 17:31:09', '2018-12-08 16:31:33'),
(7, 'Marisol Jane', 'Dalisay', 'mariz@gmail.com', '09998765432', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', 'mariz', 'Admin', '', 1, '2015-02-25 09:35:52', '2018-12-08 16:31:33'),
(9, 'Marykris', 'De Leon', 'marykrisdarell.deleon@gmail.com', '09194444444', 'Project 4, QC', '$2y$10$uUy7D5qmvaRYttLCx9wnU.WOD3/8URgOX7OBXHPpWyTDjU4ZteSEm', 'Admin', '', 1, '2015-02-27 14:28:46', '2018-12-08 16:31:33'),
(10, 'Merlin', 'Duckerberg', 'merlin@gmail.com', '09991112333', 'Project 2, Quezon City', '$2y$10$VHY58eALB1QyYsP71RHD1ewmVxZZp.wLuhejyQrufvdy041arx1Kq', 'Admin', '', 1, '2015-03-18 06:45:28', '2018-12-08 16:31:33'),
(14, 'Charlon', 'Ignacio', 'charlon@gmail.com', '09876543345', 'Tandang Sora, QC', '$2y$10$Fj6O1tPYI6UZRzJ9BNfFJuhURN9DnK5fQGHEsfol5LXRu.tCYYggu', 'Admin', '', 1, '2015-03-24 08:06:57', '2018-12-08 16:31:33'),
(15, 'Kobe Bro', 'Bryant', 'kobe@gmail.com', '09898787674', 'Los Angeles, California', '$2y$10$fmanyjJxNfJ8O3p9jjUixu6EOHkGZrThtcd..TeNz2g.XZyCIuVpm', 'Admin', '', 1, '2015-03-26 11:28:01', '2018-12-08 16:31:33'),
(20, 'Tim', 'Duncan', 'tim@example.com', '9999999', 'San Antonio, Texas, USA', '$2y$10$9OSKHLhiDdBkJTmd3VLnQeNPCtyH1IvZmcHrz4khBMHdxc8PLX5G6', 'Admin', '0X4JwsRmdif8UyyIHSOUjhZz9tva3Czj', 1, '2016-05-26 01:25:59', '2018-12-08 16:31:33'),
(21, 'Tony', 'Parker', 'tony@example.com', '8888888', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$lBJfvLyl/X5PieaztTYADOxOQeZJCqETayF.O9ld17z3hcKSJwZae', 'Admin', 'THM3xkZzXeza5ISoTyPKl6oLpVa88tYl', 1, '2016-05-26 01:29:01', '2018-12-08 16:31:33'),
(29, 'Lê Công', 'Dũng', 'congdung2498@gmail.com', '01627317786', 'Hà Nội', '$2y$10$UTQ4HqnihimRmypHplcGjO0MC2tVOL3JyeuNFsJEBeyFoozlsas3C', 'Admin', 'NgXfDBtIftJfqzk751IqnsqiLiW1CTBo', 1, '2018-12-04 23:29:41', '2018-12-08 16:31:33');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer` FOREIGN KEY (`ID_Question`) REFERENCES `question` (`ID_Question`);

--
-- Các ràng buộc cho bảng `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`ID_ExamConfig`) REFERENCES `exam_config` (`ID_ExamConfig`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_User`);

--
-- Các ràng buộc cho bảng `exam_config`
--
ALTER TABLE `exam_config`
  ADD CONSTRAINT `exam_config_ibfk_1` FOREIGN KEY (`ID_Subject`) REFERENCES `subject` (`ID_Subject`);

--
-- Các ràng buộc cho bảng `exam_config_user`
--
ALTER TABLE `exam_config_user`
  ADD CONSTRAINT `exam_config_user_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_User`),
  ADD CONSTRAINT `exam_config_user_ibfk_2` FOREIGN KEY (`ID_ExamConfig`) REFERENCES `exam_config` (`ID_ExamConfig`);

--
-- Các ràng buộc cho bảng `exam_question`
--
ALTER TABLE `exam_question`
  ADD CONSTRAINT `exam_question_ibfk_1` FOREIGN KEY (`ID_Question`) REFERENCES `question` (`ID_Question`),
  ADD CONSTRAINT `exam_question_ibfk_2` FOREIGN KEY (`ID_Exam`) REFERENCES `exam` (`ID_Exam`);

--
-- Các ràng buộc cho bảng `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`ID_Subject`) REFERENCES `subject` (`ID_Subject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
