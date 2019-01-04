-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 30, 2018 lúc 11:41 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=502 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answer`
--

INSERT INTO `answer` (`ID_Answer`, `ID_Question`, `ContentAs`, `Iscorrect`) VALUES
(136, 76, 'A. The World Wide Web Consortium', 1),
(137, 76, 'B. Microsoft', 0),
(138, 76, 'C. Netscape', 0),
(139, 76, 'D. Tất cả đều sai', 0),
(140, 77, 'A. <lb>', 0),
(141, 77, 'B. <h1>', 1),
(142, 77, 'C. <break>', 0),
(143, 77, 'D. <p>', 0),
(144, 78, 'A. <body color=\"yellow\">', 0),
(145, 78, 'B. <body bgcolor=\"yellow\">', 1),
(146, 78, 'C. <background>yellow</background>', 0),
(147, 78, 'D. <body color=\"green\">', 0),
(148, 79, 'A. <b>', 1),
(149, 79, 'B. <bold>', 0),
(150, 79, 'C. <bld>', 0),
(151, 79, 'D. <bb>', 0),
(152, 80, 'A. <a url=\"http://www.w3schools.com\">W3Schools.com</a>', 0),
(153, 80, 'B. <a>http://www.w3schools.com</a>', 0),
(154, 80, 'C. <a href=\"http://www.w3schools.com\">W3Schools</a>', 1),
(155, 80, 'D. <a name=\"http://www.w3schools.com\">W3Schools.com</a>', 0),
(156, 81, 'A. <a href=\"xxx@yyy\">', 0),
(157, 81, 'B. <a href=\"mailto:xxx@yyy\">', 1),
(158, 81, 'C. <mail>xxx@yyy</mail>', 0),
(159, 81, 'D. <mail href=\"xxx@yyy\">', 0),
(160, 82, 'A. <a href=\"url\" new>', 0),
(161, 82, 'B.<a href=\"url\" target=\"new\">', 0),
(162, 82, 'C. <a href=\"url\" target=\"_blank\">', 1),
(163, 82, 'D. <link=\" \">', 0),
(164, 83, 'A. <table><tr><td>', 1),
(165, 83, 'B. <thead><body><tr>', 0),
(166, 83, 'C. <table><head><tfoot>', 0),
(167, 83, 'D. <table><tr><tt>', 0),
(168, 84, 'A.<tdleft>', 0),
(169, 84, 'B. <td valign=\"left\">', 0),
(170, 84, 'C. <td align=\"left\">', 1),
(171, 84, 'D. <td leftalign>', 0),
(172, 85, 'A. <ul>', 0),
(173, 85, 'B. <list>', 0),
(174, 85, 'C. <ol>', 1),
(175, 85, 'D. <dl>', 0),
(176, 86, 'A. <list>', 0),
(177, 86, 'B. <ul>', 1),
(178, 86, 'C. <ol>', 0),
(179, 86, 'D. <h>', 0),
(180, 87, 'A. <check>', 0),
(181, 87, 'B. <input type=\"check\">', 0),
(182, 87, 'C. <checkbox>', 0),
(183, 87, 'D. <input type=\"checkbox\">', 1),
(184, 88, 'A. <textfield>', 0),
(185, 88, 'B. <textinput type=\"text\">', 0),
(186, 88, 'C. <input type=\"text\">', 1),
(187, 88, 'D. <input type=\"textfield\">', 0),
(188, 89, 'A. <select>', 1),
(189, 89, 'B. <list>', 0),
(190, 89, 'C.  <input type=\"dropdown\">', 0),
(191, 89, 'D. <input type=\"list\">', 0),
(192, 90, 'A. <input type=\"textbox\">', 0),
(193, 90, 'B. <textarea>', 1),
(194, 90, 'C. <input type=\"textarea\">', 0),
(195, 90, 'D. <input =\"textarea\">', 0),
(196, 91, 'A. <image src=\"image.gif\">', 0),
(197, 91, 'B. <img src=\"image.gif\">', 1),
(198, 91, 'C. <img image.gif\">', 0),
(199, 91, 'D. <img src=\"image\"', 0),
(200, 92, 'A. Client', 1),
(201, 92, 'B. Server', 0),
(202, 92, 'C. Server/client', 0),
(203, 92, 'D. Không có dạng nào', 0),
(204, 93, 'A. Thông dịch', 0),
(205, 93, 'B. Biên dịch', 0),
(206, 93, 'C. Cả hai dạng', 0),
(207, 93, 'D. Không có dạng nào ở trên', 0),
(208, 94, 'A. Viết riêng một trang', 0),
(209, 94, 'B. Viết chung với HTML', 0),
(210, 94, 'C.  Cả hai dạng', 0),
(211, 94, 'D. Không có dạng nào.', 0),
(212, 95, 'A. Không dấu được vì các kịch bản chạy ở client.', 1),
(213, 95, 'B. Dấu được vì chương trình hoạt động độc lập với trình duyệt', 0),
(214, 95, 'C. Không có đáp án', 0),
(215, 95, 'D. Dấu được', 0),
(216, 96, 'A. <scritp> …</script>', 1),
(217, 96, 'B.  <Javascript> …<Javascript>', 0),
(218, 96, 'C.  <Javascript> …<Java>', 0),
(219, 96, 'D.  <Javascript> …<Javascript> /', 0),
(220, 97, 'A. Number, String, Boolean', 1),
(221, 97, 'B. Number, Integer, char', 0),
(222, 97, 'C.  Number, String, Boolean, Null', 0),
(223, 97, 'D. Tất cả các loại trên.', 0),
(224, 98, 'A. Chuyển một chuỗi thành số', 0),
(225, 98, 'B. Chuyển một chuỗi thành số nguyên', 1),
(226, 98, 'C. Chuyển một chuỗi thành số thực', 0),
(227, 98, 'D. Chuyển một số nguyên thành một chuỗi', 0),
(228, 99, 'A. Hiện một thông báo nhập thông tin', 1),
(229, 99, 'B. Hiện một thông báo dạng yes, No', 0),
(230, 99, 'C. Cả hai dạng trên', 0),
(231, 99, 'D. Không có lệnh đúng', 0),
(232, 100, 'A. Khi bắt đầu chương trình chạy', 1),
(233, 100, 'B.  Khi click chuột', 0),
(234, 100, 'C.  Khi kết thúc một chương trình', 0),
(235, 100, 'D. Khi di chuyển chuột qua.', 0),
(236, 101, 'A.  Creative Style Sheets', 0),
(237, 101, 'B. Computer Style Sheets', 0),
(238, 101, 'C. Cascading Style Sheets', 1),
(239, 101, 'D. Colorful Style Sheets', 0),
(240, 102, 'A. <style src=”mystyle.css”>', 0),
(241, 102, 'B. <link rel=”stylesheet” type=”text/css” href=”mystyle.css”>', 1),
(242, 102, 'C. <link rel=”stylesheet” type=”text/css” href=”mystyle\">', 0),
(243, 102, 'D. Không có đáp án đúng', 0),
(244, 103, 'A. <style>', 1),
(245, 103, 'B. <h>', 0),
(246, 103, 'C. <br>', 0),
(247, 103, 'D. Không có đáp án đúng', 0),
(248, 104, 'A.  body {color: black}', 1),
(249, 104, 'B.  body {color: black} /', 0),
(250, 104, 'C.  body {color/', 0),
(251, 104, 'D. / body {color: black}', 0),
(252, 105, 'A. /* this is a comment */', 1),
(253, 105, 'B. // this is a comment //', 0),
(254, 105, 'C. // this is a comment /', 0),
(255, 105, 'D.  this is a comment //', 0),
(256, 106, 'A. text-color=', 0),
(257, 106, 'B.fgcolor:', 0),
(258, 106, 'C. color:', 1),
(259, 106, 'D. color: //', 0),
(260, 107, 'A.  a {decoration:no underline}', 0),
(261, 107, 'B.  a {text-decoration:no underline}', 0),
(262, 107, 'C.  a {underline:none}', 0),
(263, 107, 'D. a {text-decoration:none}', 1),
(264, 108, 'A.  text-transform:capitalize', 1),
(265, 108, 'B. text-transform', 0),
(266, 108, 'C.  Transform:capitalize', 0),
(267, 108, 'D.  text-transform:capitalize ://', 0),
(268, 109, 'A.  border-width:5px 20px 10px 1px', 0),
(269, 109, 'B. border-width:10px 5px 20px 1px', 0),
(270, 109, 'C. border-width:10px 1px 5px 20px', 1),
(271, 109, 'D. border-width:10px 1px 5px', 0),
(272, 110, 'A. margin-left:', 1),
(273, 110, 'B. text-indent:', 0),
(274, 110, 'C. text-indent: left', 0),
(275, 110, 'D. text-indent: right', 0),
(276, 111, 'A. type: 2', 0),
(277, 111, 'B. type: square', 0),
(278, 111, 'D. list-style-type: square', 0),
(279, 111, 'D. list-type: square', 1),
(280, 112, 'A. Tạo một cùng có nhiều cột nhiều dòng', 1),
(281, 112, 'B. Tạo một ô text để nhập dữ liệu', 0),
(282, 112, 'C. Tạo một nút lệnh dùng để gửi tin trong form đi', 0),
(283, 112, 'D. Tất cả ý trên', 0),
(284, 113, 'A. Chuyển một chuỗi thành số', 0),
(285, 113, 'B. Chuyển một chuỗi thành số thực', 1),
(286, 113, 'C. Chuyển một chuỗi thành số nguyên', 0),
(287, 113, 'D.  Chuyển một số nguyên thành một chuỗi', 0),
(288, 114, 'A.  Khi chạy thì một trang khác (VNN) được hiện ra .', 1),
(289, 114, 'B. Không chạy được vì sai', 0),
(290, 114, 'C. Khi kết thúc thì một site khác hiện ra', 0),
(291, 114, 'D. Hiện một trang vnn duy nhất', 0),
(292, 115, 'A.  Tạo một ô text để nhập dữ liệu', 0),
(293, 115, 'B. Tạo một ô password', 0),
(294, 115, 'C.  Tạo một  cùng có nhiều cột nhiều dòng', 1),
(295, 115, 'D. Tất cả các ý trên', 0),
(296, 116, 'A. CPU -> đĩa cứng -> màn hình', 0),
(297, 116, 'B. Nhận thông tin -> xử lí thông tin -> xuất thông tin', 1),
(298, 116, 'C. CPU-> bàn phím-> màn hình', 0),
(299, 116, 'D. CPU-> bàn phím-> chuột', 0),
(300, 117, 'A. Hãng INTEL và tốc độ của CPU', 0),
(301, 117, 'B. Hãng sản xuất CPU và tần số làm việc của CPU', 0),
(302, 117, 'C. Loại CPU và tốc độ của CPU', 0),
(303, 117, 'D. Loại CPU và tần số làm việc của CPU', 1),
(304, 118, 'A. DX', 0),
(305, 118, 'B. AX', 1),
(306, 118, 'C. AXDX', 0),
(307, 118, 'D. AXDXX', 0),
(308, 119, 'A. Bus điều khiển', 1),
(309, 119, 'B. Bus địa chỉ', 0),
(310, 119, 'C. Bus dữ liệu', 0),
(311, 119, 'D. Bus địa chỉ và Bus điều khiển', 0),
(312, 120, 'A. 257 KB', 0),
(313, 120, 'B. 255 KB', 0),
(314, 120, 'C. 256 KB', 1),
(315, 120, 'D. 250 KB', 0),
(316, 121, 'A. 00010110', 1),
(317, 121, 'B. 000101', 0),
(318, 121, 'C. 0001', 0),
(319, 121, 'D. 0001011011', 0),
(320, 122, 'A. 0101 0001', 1),
(321, 122, 'B. 0101 000111', 0),
(322, 122, 'C. 0101 0', 0),
(323, 122, 'D. 0101 0001000', 0),
(324, 123, 'A. Cộng hai số dương, cho kết quả âm', 0),
(325, 123, 'B. Cộng hai số âm, cho kết quả dương', 0),
(326, 123, 'C. Có nhớ ra khỏi bit cao nhất', 0),
(327, 123, 'D. Cả a và b', 1),
(328, 124, 'A. 35', 0),
(329, 124, 'B. -37', 1),
(330, 124, 'C. -38', 0),
(331, 124, 'D. -36', 0),
(332, 125, 'A. 01100000', 1),
(333, 125, 'B. 011000', 0),
(334, 125, 'C. 011000001', 0),
(335, 125, 'D. 0110000011', 0),
(336, 126, 'A. Để tiện cho việc quản lý', 0),
(337, 126, 'B. Để giảm chi phí khi thiết kế', 0),
(338, 126, 'C. Để giảm thời gian tìm đọc dữ liệu của CPU', 0),
(339, 126, 'D. Cả a,b,c đều đúng', 1),
(340, 127, 'A. Cộng hai số dương, cho kết quả âm', 0),
(341, 127, 'B. Cộng hai số âm, cho kết quả dương', 0),
(342, 127, 'C. Có nhớ ra khỏi bit cao nhất', 1),
(343, 127, 'D. Cả a và b', 0),
(344, 128, 'A. Cộng hai số dương, cho kết quả âm', 0),
(345, 128, 'B. Cộng hai số âm, cho kết quả dương', 0),
(346, 128, 'C. Có nhớ ra khỏi bit cao nhất', 1),
(347, 128, 'D. Cả a và b', 0),
(348, 129, 'A. Thực hiện phép cộng', 0),
(349, 129, 'B. Như là đầu vào của thanh ghi tích lũy', 1),
(350, 129, 'C. Thay đổi logic hoặc số học các từ dữ liệu', 0),
(351, 129, 'D. Tất cả các công việc được kể ở đây.', 0),
(352, 130, 'A.  Thanh ghi tích lũy A fc', 1),
(353, 130, 'B. PC', 0),
(354, 130, 'C. Thanh ghi địa chỉ bộ nhớ', 0),
(355, 130, 'D. Thanh ghi lệnh', 0),
(356, 131, 'A. Kết nối ALU với Bus dữ liệu trong của CPU', 1),
(357, 131, 'B. Kết nối thanh ghi với thanh ghi tổng', 0),
(358, 131, 'C. Cách biệt đầu vào và ra của ALU', 0),
(359, 131, 'D. Đảm bảo lưu dữ liệu của thanh ghi tổng', 0),
(360, 132, 'A.  Trước', 0),
(361, 132, 'B. Hiện thời', 1),
(362, 132, 'C. Sau đó', 0),
(363, 132, 'D.  Luôn luôn', 0),
(364, 133, 'A. Có thể dùng điện để xoá PROM', 0),
(365, 133, 'B. PROM là loại ROM có thể xoá và ghi lại nhiều lần', 0),
(366, 133, 'C.  EPROM là loại ROM có thể xoá và ghi lại nhiều lần', 1),
(367, 133, 'D. Có thể dùng điện để xoá EPROM', 0),
(368, 134, 'A. Bộ nhớ bán dẫn động', 1),
(369, 134, 'B. Bộ nhớ bán dẫn tĩnh', 0),
(370, 134, 'C. Bộ nhớ bán dẫn', 0),
(371, 134, 'D. Bộ nhớ', 0),
(372, 135, 'A. Bộ nhớ bán dẫn tĩnh', 1),
(373, 135, 'B. Bộ nhớ bán dẫn', 0),
(374, 135, 'C. Bộ nhớ', 0),
(375, 135, 'D. Bộ nhớ bán dẫn động', 0),
(376, 136, 'A. EEPROM', 1),
(377, 136, 'B. EEP', 0),
(378, 136, 'C. EEPRO', 0),
(379, 136, 'D. EPROM', 0),
(380, 137, 'A. RAM có tốc độ chạy đồng bộ với Bus hệ thống', 1),
(381, 137, 'B. RAM vừa tĩnh, vừa động', 0),
(382, 137, 'C. RAM động', 0),
(383, 137, 'D. RAM tĩnh', 0),
(384, 138, 'A. ROM', 1),
(385, 138, 'B. ROMM', 0),
(386, 138, 'C. EROM', 0),
(387, 138, 'D. EPROM', 0),
(388, 139, 'A. Dùng giao thức DHCP', 1),
(389, 139, 'B. Dùng giao thức DNC', 0),
(390, 139, 'C. Dùng giao thức TCP', 0),
(391, 139, 'D. Dùng giao thức TCPIP', 0),
(392, 140, 'A. Physical', 1),
(393, 140, 'B. Data Link', 0),
(394, 140, 'C. Network', 0),
(395, 140, 'D. Transport', 0),
(398, 143, 'A. Là các qui tắc để cho phép các máy tính có thể giao tiếp được\nvới nhau', 1),
(399, 143, 'B. Một trong những thành phần không thể thiếu trong hệ thống mạng', 0),
(400, 143, 'C.  Cả a, b đều đúng', 0),
(401, 143, 'D.  Cả a, b đều sai', 0),
(402, 144, 'A. Switch', 1),
(403, 144, 'B. Brigde', 0),
(404, 144, 'C. Port', 0),
(405, 144, 'D.  Repeater', 0),
(406, 145, 'A. TCP/IP', 0),
(407, 145, 'B. IPX/SPX', 0),
(408, 145, 'C. NETBEUI', 0),
(409, 145, 'D. Tất cả', 1),
(410, 146, 'A. Mã hoá dữ liệu', 0),
(411, 146, 'B.  Cung cấp những dịch vụ mạng cho những ứng dụng của người dùng', 1),
(412, 146, 'C. Sử dụng địa chỉ vật lý để cung cấp cho việc truyền dữ liệu và thông báo lỗi , kiến trúc mạng và điều\nkhiển việc truyền', 0),
(413, 146, 'D. Cung cấp những tín hiệu điện và những tính năng cho việc liên kết và\nduy trì liên kết giữa những hệ\nthống', 0),
(414, 147, 'A. Cáp đồng trục', 0),
(415, 147, 'B. Cáp STP', 0),
(416, 147, 'C. Cáp UTP (CAT 5)', 1),
(417, 147, 'D. Cáp quang', 0),
(418, 148, 'A.  Giao tiếp với mạng', 0),
(419, 148, 'B. Truyền dữ liệu đi xa', 0),
(420, 148, 'C. Truyền dữ liệu trong mạng LAN', 0),
(421, 148, 'D.  a và b', 1),
(422, 149, 'A. Chia sẻ tài nguyên (ổ cứng, cơ sở dữ liệu, máy in, các phần mềm tiện\ních, …)', 0),
(423, 149, 'B. Quản lý tập trung', 0),
(424, 149, 'C. Tận dụng năng lực xử lý của các máy tính rỗi kết hợp lại để thực hiện\ncác công việc lớn', 0),
(425, 149, 'D. Tất cả đều đúng', 1),
(426, 150, 'A.  Byte', 0),
(427, 150, 'B.  Data', 1),
(428, 150, 'C. Frame', 0),
(429, 150, 'D. Packet', 0),
(430, 151, 'A. Địa chỉ IP', 0),
(431, 151, 'B. Địa chỉ port', 0),
(432, 151, 'C.  Địa chỉ MAC', 1),
(433, 151, 'D.  Tất cả đều sai', 0),
(434, 152, 'A. Là máy đại diện cho một nhóm máy đi thực hiện một dịch vụ máy\nkhách (client service) nào đó', 1),
(435, 152, 'B.  Là một thiết bị thống kê lưu lượng mạng', 0),
(436, 152, 'C.  Đều đúng', 0),
(437, 152, 'D. Đều sai', 0),
(438, 153, 'A.  Physical', 0),
(439, 153, 'B. Network', 0),
(440, 153, 'C. Data Link', 1),
(441, 153, 'D. Data', 0),
(442, 154, 'A.  WWW (world wide web)', 1),
(443, 154, 'B. WinWord', 0),
(444, 154, 'C.  Excel', 0),
(445, 154, 'D. Photoshop', 0),
(446, 155, 'A.  10100100', 1),
(447, 155, 'B.  1010010', 0),
(448, 155, 'C.  10100100 1', 0),
(449, 155, 'D.  1010010011', 0),
(450, 156, '[a]--Các dữ liệu và Các xử lý', 1),
(451, 156, '[b]--Các dữ liệu và Các điều khiển', 0),
(452, 156, '[c]--Các điều khiển và Các xử lý', 0),
(453, 157, '[a]--Con người không can thiệp vào quá trình xử lý thông tin mà chỉ có nhiệm vụ cung cấp thông tin đầu vào và nhận lấy kết quả xử lý', 0),
(454, 157, '[b]--Máy tính đóng vai trò chủ chốt trong quá trình xử lý thông tin  [', 0),
(455, 157, '[c]--Cả 2 đáp án trên đều đúng', 1),
(456, 158, '[a]--Xử lý giao dịch  [', 0),
(457, 158, '[b]--Xử lý tương tác', 1),
(458, 158, '[c]--Xử lý theo lô', 0),
(459, 159, '[a]--Tiếp cận với nghiệp vụ chuyên môn, môi trường hoạt động của hệ thống', 0),
(460, 159, '[b]--Tìm hiểu các chức năng, nhiệm vụ của hệ thống và chỉ ra chỗ hợp lý của nó', 0),
(461, 159, '[c]--Cả 2 đáp án trên đều đúng', 1),
(462, 160, '[a]--Biểu đồ tổng quát', 0),
(463, 160, '[b]--Biểu đồ phân cấp chức năng', 1),
(464, 160, '[c]--Biểu đồ luồng dữ liệu', 0),
(465, 161, '[a]--Cho cách nhìn tổng quát, dễ hiểu từng nhiệm vụ cần thực hiện', 0),
(466, 161, '[b]--Rất dễ thành lập bằng cách phân rã dần dần các chức năng từ trên xuống', 0),
(467, 161, '[c]--Cả 2 đáp án trên đều đúng', 1),
(468, 162, '[a]--Một thực thể ngoài hệ thống', 0),
(469, 162, '[b]--Có chức năng trao đổi thông tiin với hệ thống', 0),
(470, 162, '[c]--Cả 2 đáp án trên đều đúng', 1),
(471, 163, '[a]--Một thông tin biểu diễn', 0),
(472, 163, '[b]--Một luồng dữ liệu', 1),
(473, 163, '[c]--Cả 2 đáp án trên đều đúng', 0),
(474, 164, '[a]--Lập lược đồ khái niệm về dữ liệu', 0),
(475, 164, '[b]--Làm căn cứ cho việc thiết kế CSDL của hệ thống sau này', 0),
(476, 164, '[c]--Cả 2 đáp án trên đều đúng', 1),
(477, 165, 'A. Khảo sát và phân tích', 0),
(478, 165, 'B. Phân tích và thiết kế', 1),
(479, 165, 'C. Thiết kế và lập trình', 0),
(480, 166, 'A. Yêu cầu chức năng', 0),
(481, 166, 'B. Yêu cầu phi chức năng', 1),
(482, 166, 'C. Yêu cầu miền ứng dụng', 0),
(483, 167, 'A. Một thực thể ngoài hệ thống', 1),
(484, 167, 'B. Một hệ thống con', 0),
(485, 167, 'C. Một tác vụ được thực hiện bên ngoài hệ thống', 0),
(486, 168, 'A. Biểu đồ luồng dữ liệu', 0),
(487, 168, 'B. Biểu đồ phân cấp chức năng', 0),
(488, 168, 'C. Biểu đồ thực thể kết hợp', 1),
(489, 169, 'A. Môi trường và ngôn ngữ lập trình', 0),
(490, 169, 'B. Ngôn ngữ mô hình hoá', 1),
(491, 169, 'C. Một ngôn ngữ lập trình hướng đối tượng', 0),
(492, 170, 'A.Sơ đồ lớp (Class Diagram', 0),
(493, 170, 'B.Sơ đồ hoạt động (Activity Diagram)', 0),
(494, 170, 'C.Sơ đồ triển khai (Deployment Diagram)', 1),
(495, 171, 'A.Một bước trong chuỗi sự kiện', 0),
(496, 171, 'B.Một công việc hoặc chức năng đơn lẻ được thi hành bởi hệ thống', 1),
(497, 171, 'C.Một vai trò được thực hiện bởi người dùng bên ngòai hệ thống', 0),
(498, 75, 'A. Hyperlinks and Text Markup Language', 0),
(499, 75, 'B: Home Tool Markup Language', 0),
(500, 75, 'C. Hyper Text Markup Language', 1),
(501, 75, 'D. Tất cả đều sai', 0);

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
  `endTime` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_Exam`),
  KEY `ID_ExamConfig` (`ID_ExamConfig`),
  KEY `ID_User` (`ID_User`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
(8, 'Đề thi cuối kỳ môn công nghệ web', 25, 60, 1),
(9, 'Đề thi giữa kỳ môn mạng máy tính', 15, 30, 2),
(10, 'Đề thi giữa kỳ môn kiến trúc máy tính', 15, 30, 4),
(20, 'Đề thi giữa kỳ môn phân tích thiết kế hệ thống', 15, 30, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_config_user`
--

INSERT INTO `exam_config_user` (`ID_ex_us`, `ID_User`, `ID_ExamConfig`) VALUES
(174, 30, 9),
(175, 30, 10),
(176, 30, 20),
(189, 30, 8),
(190, 1, 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`ID_Question`, `ContentQs`, `ID_Subject`) VALUES
(75, 'Từ HTML là từ viết tắt của từ nào?', 1),
(76, 'Ai (tổ chức nào) tạo ra Web standards?', 1),
(77, 'Đâu là tag tạo ra tiêu đề web kích cỡ lớn nhất.', 1),
(78, 'Đâu là tag tạo ra màu nền của web?', 1),
(79, 'Đâu là tag tạo ra chữ in đậm?', 1),
(80, 'Đâu là tag tạo ra liên kết (links) trong web?', 1),
(81, ' Đâu là tag tạo ra liên kết đến email?', 1),
(82, 'Làm sao để khi click chuột vào link thì tạo ra cửa sổ mới?', 1),
(83, 'Đâu là những tag dành cho việc tạo bảng?', 1),
(84, 'Đâu là tag căn lề trái cho nội dung 1 ô trong bảng', 1),
(85, 'Đâu là tag tạo ra 1 danh sách đứng đầu bằng số', 1),
(86, 'Đâu là tag tạo ra 1 danh sách đứng đầu bởi dấu chấm?', 1),
(87, 'Tag nào tạo ra 1 checkbox?', 1),
(88, 'Tag nào tạo ra 1 text input field?', 1),
(89, 'Tag nào tạo ra 1 drop-down list?', 1),
(90, 'Tag nào tạo ra 1 text area?', 1),
(91, 'Tag nào dùng để chèn 1 hình vào web?', 1),
(92, 'JavaScript là ngôn ngữ xử lý ở:', 1),
(93, 'Javascript là ngôn ngữ thông dịch hay biên dịch', 1),
(94, 'Phương thức viết chương trình của Javascript như thế nào?', 1),
(95, 'Javascript là ngôn ngữ kịch bản có dấu được mã nguồn không?', 1),
(96, 'JavaScript được bắt đầu bằng?', 1),
(97, 'Javascript có các dạng biến?', 1),
(98, 'Trong Javascript hàm parseInt() dùng để làm gì?', 1),
(99, 'Lệnh prompt trong Javascript để làm gì?', 1),
(100, 'Trong Javascript sự kiện Onload thực hiện khi:', 1),
(101, 'CSS là viết tắt của?', 1),
(102, 'Muốn liên kết xHTML với 1 file định nghĩa CSS ta dùng dòng nào sau đây?', 1),
(103, 'Tag nào định nghĩa CSS ở ngay trong file xHTML?', 1),
(104, 'Dòng nào tuân theo đúng cú pháp của CSS?', 1),
(105, 'Dòng nào thể hiện đúng một comment (lời chú thích) trong CSS?', 1),
(106, 'Làm thế nào thay màu nền của chữ (text)?', 1),
(107, 'Làm sao để hiển thị liên kết mà ko có gạch chân bên dưới?', 1),
(108, 'Làm sao để mỗi từ trong 1 dòng đều viết hoa ở đầu từ?', 1),
(109, 'Làm thế nào để hiển thị viền 1 phần tử với kích thước đường viền như sau: The top border = 10 pixels The bottom border = 5 pixels The left border = 20 pixels The right border = 1pixel?', 1),
(110, 'Làm sao để thay đổi lề trái của một phần tử?', 1),
(111, 'Làm thế nào để hình ở đầu mỗi dòng của 1 list (danh sách) có hình vuông?', 1),
(112, 'Thẻ <input type=”Submit” ...> dùng để làm gì?', 1),
(113, 'Trong Javascript hàm parseFloat() dùng để làm gì?', 1),
(114, 'Trong Javascript đoạn mã sau cho ra kết quả gì? <script> function kiemtra(){ window.open(\"http://www.vnn.vn\",\"Chao\"); } </script> </head> <body onload =\"kiemtra()\"></body>', 1),
(115, 'Thẻ <textarea rows= cols =  …></texterea> dùng để làm gì?', 1),
(116, 'Trình tự xử lí thông tin của máy tính điện tử ?', 4),
(117, 'Cụm từ “CPU Pentium IV-2.4GHZ” mang thông tin về:', 4),
(118, 'Kết quả của phép nhân giữa hai số 2000 và 300 ở hệ thập phân được chứa trong thanh ghi nào?', 4),
(119, 'Loại BUS nào làm nhiệm vụ điều khiển các tín hiệu đọc/ghi dữ liệu giữa chip vi xử lý và bộ nhớ', 4),
(120, 'Video RAM làm việc với màn hình có độ phân giải là 780 x 450 và có khả năng hiển thị 64 màu thì dung lượng nhớ cần thiết cho Video RAM đó là:', 4),
(121, 'Chuyển số 16(H) sang hệ nhị phân.', 4),
(122, 'Đối với số nguyên có dấu, 8 bit, dùng phương pháp “Mã bù 2”, giá trị biểu diễn số 81 là:', 4),
(123, 'Đối với các số có dấu, phép cộng trên máy tính cho kết quả sai khi:', 4),
(124, 'Hãy xác định giá trị của các số nguyên có dấu được biểu diễn theo mã bù hai: A = 11011011', 4),
(125, 'Thực hiện phép cộng 2 số nguyên không dấu sau: 71 + 25', 4),
(126, 'Tại sao phải phân cấp bộ nhớ?', 4),
(127, 'Đối với các số không dấu, phép cộng trên máy tính cho kết quả sai khi:', 4),
(128, 'Đối với các số có dấu, phép cộng trên máy tính cho kết quả sai khi:', 4),
(129, 'Nhiệm vụ chính của ALU là:', 4),
(130, 'Hầu hết các phép toán số học và logic trong vi xử lý thực hiện thao tác giữa các nội dung của vùng nhớ hoặc nội dung của thanh ghi với :', 4),
(131, 'Mục đích chính của thanh ghi tạm thời:', 4),
(132, 'Trong khi thực hiện một lệnh, thanh ghi lệnh (IR) lưu trữ lệnh:', 4),
(133, 'Đối với bộ nhớ ROM, phát biểu nào sau đây là đúng:', 4),
(134, 'Trong máy tính, bộ nhớ DRAM được coi là', 4),
(135, 'Trong máy tính, bộ nhớ SRAM được coi là', 4),
(136, 'Bộ nhớ ROM có thể ghi và xoá bằng điện được gọi là', 4),
(137, 'SDRAM có nghĩa là:', 4),
(138, 'Bộ nhớ ROM có thể lập trình 1 lần được gọi là:', 4),
(139, 'Để cấp phát động địa chỉ IP, ta có thể sử dụng dịch vụ có giao thức\nnào:', 2),
(140, 'Tầng nào trong mô hình OSI làm việc với các tín hiệu điện:', 2),
(143, 'Protocol là:', 2),
(144, 'Thiết bị nào sau đây sử dụng tại trung tâm của mạng hình sao:', 2),
(145, 'Giao thức nào trong các giao thức sau dùng trong mô hình mạng LAN:', 2),
(146, 'Phát biểu nào sau đây mô tả đúng nhất cho tầng Application', 2),
(147, 'Loại cáp nào được sử dụng phổ biến nhất hiện nay', 2),
(148, 'Modem dùng để:', 2),
(149, 'Khi sử dụng mạng máy tính ta sẽ được các lợi ích:', 2),
(150, 'Đơn vị dữ liệu ở tầng presentation là:', 2),
(151, 'Chuỗi số “00-08-ac-41-5d-9f” có thể là:', 2),
(152, 'Cho biết chức năng của Proxy:', 2),
(153, 'Frame là dữ liệu ở tầng:', 2),
(154, 'Cho biết ứng dụng nào thuộc loại Client/Server:', 2),
(155, 'Số nhị phân nào dưới đây có giá trị là 164', 2),
(156, 'Hai thành phần cơ bản của hệ thống thông tin là?', 5),
(157, 'Hệ thống tin học là hệ thống có mục đích xử lý thông tin và có sự tham gia của máy tính. Sự tham gia này có thể ở nhiều mức độ khác nhau. Khi đạt đến mức cao tức là?', 5),
(158, 'Trong phương thức xử lý thông tin, quá trình xử lý thông tin được thực hiện từng phần, xem kẽ giữa phần thực hiện bởi người và phần thực hiện bởi máy tính, hai bên trao đổi qua lại với nhau dưới hình thức đối thoại được gọi là?', 5),
(159, 'Mục đích của quá trình khảo sát hiện trạng nhằm để?', 5),
(160, 'Một loại biểu đồ diễn tả sự phân rã dần dần các chức năng từ đại thể đến chi tiết được gọi là?', 5),
(161, 'Đặc điểm của biểu đồ Phân cấp chức năng là?', 5),
(162, 'Tác nhân ngoài là gì?', 5),
(163, 'Một tuyến đường dẫn thông tin vào hay ra của một chức năng nào đó được gọi là?', 5),
(164, 'Mục đích của việc phân tích dữ liệu của hệ thống là?', 5),
(165, 'Các giai đoạn trung tâm trong quá trình phát triển 1 HTTT là:', 5),
(166, '“Không được xuất lô thuốc quá thời hạn” là:', 5),
(167, 'Tác nhân ngoài là gì?', 5),
(168, 'Biểu đồ nào có thể chuyển sang lược đồ quan hệ', 5),
(169, 'UML là', 5),
(170, 'Để biểu diễn các quan hệ vật lý giữa phần mềm và các thành phần phầncứng trong một hệ thống bạn sẽ dụng sơ đồ nào của UML ?', 5),
(171, 'Use Case là:', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `ID_Subject` int(11) NOT NULL AUTO_INCREMENT,
  `subjectName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_Subject`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`ID_Subject`, `subjectName`) VALUES
(1, 'Công nghệ web'),
(2, 'Mạng máy tính'),
(4, 'Kiến trúc máy tính'),
(5, 'Phân tích thiết kế hệ thống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `contact_number` varchar(64) DEFAULT NULL,
  `address` text,
  `password` varchar(512) DEFAULT NULL,
  `access_level` varchar(16) DEFAULT NULL,
  `access_code` text,
  `status` int(11) DEFAULT NULL COMMENT '0=pending,1=confirmed',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID_User`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `password`, `access_level`, `access_code`, `status`, `created`, `modified`) VALUES
(1, 'Mike', 'Dalisay', 'mike@example.com', '0999999999', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', '$2y$10$AUBptrm9sQF696zr8Hv31On3x4wqnTihdCLocZmGLbiDvyLpyokL.', 'Customer', '', 1, '0000-00-00 00:00:00', '2018-12-09 09:32:46'),
(2, 'Lauro', 'Abogne', 'lauro@eacomm.com', '08888888', 'Pasig City', '$2y$10$it4i11kRKrB19FfpPRWsRO5qtgrgajL7NnxOq180MsIhCKhAmSdDa', 'Customer', '', 1, '0000-00-00 00:00:00', '2018-12-29 04:27:57'),
(4, 'Darwin', 'Dalisay', 'darwin@example.com', '9331868359', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$tLq9lTKDUt7EyTFhxL0QHuen/BgO9YQzFYTUyH50kJXLJ.ISO3HAO', 'Admin', 'ILXFBdMAbHVrJswNDnm231cziO8FZomn', 1, '2014-10-29 17:31:09', '2018-12-08 16:31:33'),
(7, 'Marisol Jane', 'Dalisay', 'mariz@gmail.com', '09998765432', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', 'mariz', 'Admin', '', 1, '2015-02-25 09:35:52', '2018-12-08 16:31:33'),
(9, 'Marykris', 'De Leon', 'marykrisdarell.deleon@gmail.com', '09194444444', 'Project 4, QC', '$2y$10$uUy7D5qmvaRYttLCx9wnU.WOD3/8URgOX7OBXHPpWyTDjU4ZteSEm', 'Admin', '', 1, '2015-02-27 14:28:46', '2018-12-08 16:31:33'),
(10, 'Merlin', 'Duckerberg', 'merlin@gmail.com', '09991112333', 'Project 2, Quezon City', '$2y$10$VHY58eALB1QyYsP71RHD1ewmVxZZp.wLuhejyQrufvdy041arx1Kq', 'Admin', '', 1, '2015-03-18 06:45:28', '2018-12-08 16:31:33'),
(14, 'Charlon', 'Ignacio', 'charlon@gmail.com', '09876543345', 'Tandang Sora, QC', '$2y$10$Fj6O1tPYI6UZRzJ9BNfFJuhURN9DnK5fQGHEsfol5LXRu.tCYYggu', 'Admin', '', 1, '2015-03-24 08:06:57', '2018-12-08 16:31:33'),
(15, 'Kobe Bro', 'Bryant', 'kobe@gmail.com', '09898787674', 'Los Angeles, California', '$2y$10$fmanyjJxNfJ8O3p9jjUixu6EOHkGZrThtcd..TeNz2g.XZyCIuVpm', 'Admin', '', 1, '2015-03-26 11:28:01', '2018-12-08 16:31:33'),
(20, 'Tim', 'Duncan', 'tim@example.com', '9999999', 'San Antonio, Texas, USA', '$2y$10$9OSKHLhiDdBkJTmd3VLnQeNPCtyH1IvZmcHrz4khBMHdxc8PLX5G6', 'Admin', '0X4JwsRmdif8UyyIHSOUjhZz9tva3Czj', 1, '2016-05-26 01:25:59', '2018-12-25 16:56:30'),
(21, 'Tony', 'Parker', 'tony@example.com', '8888888', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$lBJfvLyl/X5PieaztTYADOxOQeZJCqETayF.O9ld17z3hcKSJwZae', 'Admin', 'THM3xkZzXeza5ISoTyPKl6oLpVa88tYl', 1, '2016-05-26 01:29:01', '2018-12-08 16:31:33'),
(29, 'Lê Công', 'Dũng', 'congdung2498@gmail.com', '01627317786', 'Hà Nội', '$2y$10$UTQ4HqnihimRmypHplcGjO0MC2tVOL3JyeuNFsJEBeyFoozlsas3C', 'Admin', 'NgXfDBtIftJfqzk751IqnsqiLiW1CTBo', 1, '2018-12-04 23:29:41', '2018-12-08 16:31:33'),
(30, 'Hoàng Thị ', 'Trang', 'tranght62@wru.vn', '123123', 'Hà Nội', '$2y$10$UTQ4HqnihimRmypHplcGjO0MC2tVOL3JyeuNFsJEBeyFoozlsas3C', 'Customer', 'SsdfsDFSFDFSdfsDsDsfSSDfFSdESDF', 1, '2018-12-20 23:08:51', '2018-12-26 15:27:18');

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
