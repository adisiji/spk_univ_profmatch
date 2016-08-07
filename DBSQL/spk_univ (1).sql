-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2016 at 05:23 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_univ`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_gap`
--

CREATE TABLE `bobot_gap` (
  `id` int(1) NOT NULL,
  `gap` int(1) NOT NULL,
  `bobot` decimal(2,1) NOT NULL,
  `keterangan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot_gap`
--

INSERT INTO `bobot_gap` (`id`, `gap`, `bobot`, `keterangan`) VALUES
(1, 4, '6.0', '4 tingkat di atas'),
(2, 3, '5.5', '3 tingkat di atas'),
(3, 2, '5.0', '2 tingkat di atas'),
(4, 1, '4.5', '1 tingkat di atas'),
(5, 0, '4.0', 'cukup baik'),
(6, -1, '3.5', '1 tingkat di bawah'),
(7, -2, '3.0', '2 tingkat di bawah'),
(8, -3, '2.5', '3 tingkat di bawah'),
(9, -4, '2.0', '4 tingkat di bawah');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_nilai`
--

CREATE TABLE `bobot_nilai` (
  `id` int(1) NOT NULL,
  `nilai` int(1) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot_nilai`
--

INSERT INTO `bobot_nilai` (`id`, `nilai`, `keterangan`) VALUES
(1, 1, 'sangat buruk'),
(2, 2, 'buruk'),
(3, 3, 'cukup'),
(4, 4, 'baik'),
(5, 5, 'sangat baik');

-- --------------------------------------------------------

--
-- Table structure for table `dim_ind`
--

CREATE TABLE `dim_ind` (
  `id` int(1) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `prosentase` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dim_ind`
--

INSERT INTO `dim_ind` (`id`, `keterangan`, `prosentase`) VALUES
(1, 'Kemudahan Penggunaan', 30),
(2, 'Kualitas Interaksi', 30),
(3, 'Kualitas Informasi', 40);

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id` int(1) UNSIGNED NOT NULL,
  `dim` int(1) NOT NULL,
  `keterangan` varchar(90) NOT NULL,
  `kelompok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id`, `dim`, `keterangan`, `kelompok`) VALUES
(1, 1, 'Pengguna merasa mudah untuk mempelajari pengoperasian website', 'core'),
(2, 1, 'Interaksi antara website dengan pengguna jelas dan mudah dipahami', 'core'),
(3, 1, 'Pengguna merasa mudah untuk bernavigasi dalam website', 'core'),
(4, 1, 'Pengguna merasa website mudah untuk digunakan', 'core'),
(5, 1, 'Website memiliki tampilan yang menarik', 'secondary'),
(6, 1, 'Desain sesuai dengan jenis website', 'secondary'),
(7, 1, 'Website mengandung kompetensi', 'core'),
(8, 1, 'Website menciptakan pengalaman positif bagi pengguna', 'secondary'),
(9, 2, 'Website memiliki reputasi yang baik', 'secondary'),
(10, 2, 'Pengguna merasa aman untuk melakukan transaksi', 'core'),
(11, 2, 'Pengguna merasa aman terhadap informasi pribadinya', 'core'),
(12, 2, 'Website memberi ruang untuk personalisasi', 'secondary'),
(13, 2, 'Website memberi ruang untuk komunitas', 'secondary'),
(14, 2, 'Website memberikan kemudahan untuk berkomunikasi dengan organisasi', 'secondary'),
(15, 2, 'Pengguna merasa yakin bahwa jasa akan dikirim sebagaimana yang telah dijanjikan', 'secondary'),
(16, 3, 'Website menyajikan informasi yang akurat', 'core'),
(17, 3, 'Website menyajikan informasi yang terpercaya', 'core'),
(18, 3, 'Website menyajikan informasi yang tepat waktu', 'core'),
(19, 3, 'Website menyajikan informasi yang relevan', 'core'),
(20, 3, 'Website menyajikan informasi yang mudah dipahami', 'core'),
(21, 3, 'Website menyajikan informasi yang sesuai dengan tingkatan', 'secondary'),
(22, 3, 'Website menyajikan informasi yang sesuai dengan format', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(4) UNSIGNED NOT NULL,
  `kd_univ` int(2) NOT NULL,
  `kd_indikator` int(2) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `kd_univ`, `kd_indikator`, `nilai`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 4),
(3, 1, 3, 3),
(4, 1, 4, 5),
(5, 1, 5, 3),
(6, 1, 6, 4),
(7, 1, 7, 5),
(8, 1, 8, 4),
(9, 1, 9, 5),
(10, 1, 10, 3),
(11, 1, 11, 4),
(12, 1, 12, 3),
(13, 1, 13, 2),
(14, 1, 14, 2),
(15, 1, 15, 3),
(16, 1, 16, 5),
(17, 1, 17, 5),
(18, 1, 18, 5),
(19, 1, 19, 5),
(20, 1, 20, 4),
(21, 1, 21, 4),
(22, 1, 22, 5),
(23, 2, 1, 4),
(24, 2, 2, 4),
(25, 2, 3, 3),
(26, 2, 4, 5),
(27, 2, 5, 4),
(28, 2, 6, 4),
(29, 2, 7, 4),
(30, 2, 8, 4),
(31, 2, 9, 5),
(32, 2, 10, 3),
(33, 2, 11, 4),
(34, 2, 12, 2),
(35, 2, 13, 2),
(36, 2, 14, 2),
(37, 2, 15, 3),
(38, 2, 16, 5),
(39, 2, 17, 4),
(40, 2, 18, 5),
(41, 2, 19, 5),
(42, 2, 20, 5),
(43, 2, 21, 4),
(44, 2, 22, 5),
(45, 3, 1, 5),
(46, 3, 2, 4),
(47, 3, 3, 4),
(48, 3, 4, 3),
(49, 3, 5, 2),
(50, 3, 6, 4),
(51, 3, 7, 5),
(52, 3, 8, 3),
(53, 3, 9, 5),
(54, 3, 10, 3),
(55, 3, 11, 3),
(56, 3, 12, 2),
(57, 3, 13, 3),
(58, 3, 14, 2),
(59, 3, 15, 3),
(60, 3, 16, 4),
(61, 3, 17, 5),
(62, 3, 18, 4),
(63, 3, 19, 3),
(64, 3, 20, 4),
(65, 3, 21, 4),
(66, 3, 22, 4),
(67, 4, 1, 4),
(68, 4, 2, 4),
(69, 4, 3, 3),
(70, 4, 4, 4),
(71, 4, 5, 3),
(72, 4, 6, 4),
(73, 4, 7, 4),
(74, 4, 8, 4),
(75, 4, 9, 5),
(76, 4, 10, 3),
(77, 4, 11, 3),
(78, 4, 12, 3),
(79, 4, 13, 2),
(80, 4, 14, 2),
(81, 4, 15, 3),
(82, 4, 16, 5),
(83, 4, 17, 4),
(84, 4, 18, 4),
(85, 4, 19, 5),
(86, 4, 20, 5),
(87, 4, 21, 5),
(88, 4, 22, 5),
(89, 5, 1, 5),
(90, 5, 2, 4),
(91, 5, 3, 5),
(92, 5, 4, 4),
(93, 5, 5, 4),
(94, 5, 6, 4),
(95, 5, 7, 5),
(96, 5, 8, 4),
(97, 5, 9, 5),
(98, 5, 10, 3),
(99, 5, 11, 3),
(100, 5, 12, 3),
(101, 5, 13, 2),
(102, 5, 14, 2),
(103, 5, 15, 3),
(104, 5, 16, 4),
(105, 5, 17, 5),
(106, 5, 18, 3),
(107, 5, 19, 4),
(108, 5, 20, 5),
(109, 5, 21, 4),
(110, 5, 22, 5),
(111, 6, 1, 4),
(112, 6, 2, 4),
(113, 6, 3, 3),
(114, 6, 4, 4),
(115, 6, 5, 3),
(116, 6, 6, 4),
(117, 6, 7, 4),
(118, 6, 8, 4),
(119, 6, 9, 5),
(120, 6, 10, 3),
(121, 6, 11, 3),
(122, 6, 12, 2),
(123, 6, 13, 2),
(124, 6, 14, 3),
(125, 6, 15, 4),
(126, 6, 16, 4),
(127, 6, 17, 3),
(128, 6, 18, 5),
(129, 6, 19, 4),
(130, 6, 20, 5),
(131, 6, 21, 4),
(132, 6, 22, 5),
(133, 7, 1, 5),
(134, 7, 2, 4),
(135, 7, 3, 4),
(136, 7, 4, 5),
(137, 7, 5, 3),
(138, 7, 6, 4),
(139, 7, 7, 3),
(140, 7, 8, 4),
(141, 7, 9, 5),
(142, 7, 10, 4),
(143, 7, 11, 4),
(144, 7, 12, 3),
(145, 7, 13, 5),
(146, 7, 14, 4),
(147, 7, 15, 3),
(148, 7, 16, 5),
(149, 7, 17, 3),
(150, 7, 18, 2),
(151, 7, 19, 5),
(152, 7, 20, 4),
(153, 7, 21, 4),
(154, 7, 22, 4),
(155, 8, 1, 5),
(156, 8, 2, 4),
(157, 8, 3, 4),
(158, 8, 4, 5),
(159, 8, 5, 2),
(160, 8, 6, 4),
(161, 8, 7, 3),
(162, 8, 8, 3),
(163, 8, 9, 5),
(164, 8, 10, 5),
(165, 8, 11, 5),
(166, 8, 12, 3),
(167, 8, 13, 2),
(168, 8, 14, 5),
(169, 8, 15, 5),
(170, 8, 16, 4),
(171, 8, 17, 3),
(172, 8, 18, 5),
(173, 8, 19, 5),
(174, 8, 20, 5),
(175, 8, 21, 4),
(176, 8, 22, 5),
(177, 9, 1, 4),
(178, 9, 2, 4),
(179, 9, 3, 3),
(180, 9, 4, 3),
(181, 9, 5, 2),
(182, 9, 6, 4),
(183, 9, 7, 5),
(184, 9, 8, 3),
(185, 9, 9, 5),
(186, 9, 10, 3),
(187, 9, 11, 3),
(188, 9, 12, 3),
(189, 9, 13, 3),
(190, 9, 14, 2),
(191, 9, 15, 3),
(192, 9, 16, 4),
(193, 9, 17, 5),
(194, 9, 18, 5),
(195, 9, 19, 5),
(196, 9, 20, 4),
(197, 9, 21, 4),
(198, 9, 22, 4),
(199, 10, 1, 3),
(200, 10, 2, 3),
(201, 10, 3, 4),
(202, 10, 4, 4),
(203, 10, 5, 4),
(204, 10, 6, 4),
(205, 10, 7, 3),
(206, 10, 8, 3),
(207, 10, 9, 3),
(208, 10, 10, 2),
(209, 10, 11, 3),
(210, 10, 12, 3),
(211, 10, 13, 1),
(212, 10, 14, 1),
(213, 10, 15, 1),
(214, 10, 16, 3),
(215, 10, 17, 3),
(216, 10, 18, 3),
(217, 10, 19, 3),
(218, 10, 20, 2),
(219, 10, 21, 2),
(220, 10, 22, 2),
(221, 11, 1, 3),
(222, 11, 2, 3),
(223, 11, 3, 3),
(224, 11, 4, 3),
(225, 11, 5, 2),
(226, 11, 6, 2),
(227, 11, 7, 3),
(228, 11, 8, 2),
(229, 11, 9, 3),
(230, 11, 10, 4),
(231, 11, 11, 4),
(232, 11, 12, 3),
(233, 11, 13, 3),
(234, 11, 14, 1),
(235, 11, 15, 1),
(236, 11, 16, 3),
(237, 11, 17, 3),
(238, 11, 18, 3),
(239, 11, 19, 3),
(240, 11, 20, 3),
(241, 11, 21, 3),
(242, 11, 22, 3),
(243, 12, 1, 5),
(244, 12, 2, 5),
(245, 12, 3, 5),
(246, 12, 4, 5),
(247, 12, 5, 5),
(248, 12, 6, 5),
(249, 12, 7, 5),
(250, 12, 8, 5),
(251, 12, 9, 5),
(252, 12, 10, 5),
(253, 12, 11, 5),
(254, 12, 12, 4),
(255, 12, 13, 4),
(256, 12, 14, 5),
(257, 12, 15, 5),
(258, 12, 16, 5),
(259, 12, 17, 5),
(260, 12, 18, 5),
(261, 12, 19, 5),
(262, 12, 20, 5),
(263, 12, 21, 5),
(264, 12, 22, 5),
(265, 13, 1, 3),
(266, 13, 2, 2),
(267, 13, 3, 3),
(268, 13, 4, 2),
(269, 13, 5, 3),
(270, 13, 6, 2),
(271, 13, 7, 2),
(272, 13, 8, 2),
(273, 13, 9, 3),
(274, 13, 10, 4),
(275, 13, 11, 4),
(276, 13, 12, 2),
(277, 13, 13, 2),
(278, 13, 14, 1),
(279, 13, 15, 1),
(280, 13, 16, 3),
(281, 13, 17, 3),
(282, 13, 18, 3),
(283, 13, 19, 3),
(284, 13, 20, 2),
(285, 13, 21, 2),
(286, 13, 22, 2),
(287, 14, 1, 3),
(288, 14, 2, 3),
(289, 14, 3, 3),
(290, 14, 4, 3),
(291, 14, 5, 2),
(292, 14, 6, 2),
(293, 14, 7, 2),
(294, 14, 8, 2),
(295, 14, 9, 3),
(296, 14, 10, 3),
(297, 14, 11, 3),
(298, 14, 12, 3),
(299, 14, 13, 2),
(300, 14, 14, 1),
(301, 14, 15, 1),
(302, 14, 16, 3),
(303, 14, 17, 3),
(304, 14, 18, 3),
(305, 14, 19, 3),
(306, 14, 20, 2),
(307, 14, 21, 2),
(308, 14, 22, 2),
(309, 15, 1, 4),
(310, 15, 2, 4),
(311, 15, 3, 4),
(312, 15, 4, 4),
(313, 15, 5, 2),
(314, 15, 6, 3),
(315, 15, 7, 3),
(316, 15, 8, 3),
(317, 15, 9, 3),
(318, 15, 10, 3),
(319, 15, 11, 3),
(320, 15, 12, 3),
(321, 15, 13, 4),
(322, 15, 14, 3),
(323, 15, 15, 1),
(324, 15, 16, 3),
(325, 15, 17, 3),
(326, 15, 18, 3),
(327, 15, 19, 3),
(328, 15, 20, 3),
(329, 15, 21, 3),
(330, 15, 22, 3),
(331, 16, 1, 2),
(332, 16, 2, 2),
(333, 16, 3, 2),
(334, 16, 4, 2),
(335, 16, 5, 3),
(336, 16, 6, 3),
(337, 16, 7, 2),
(338, 16, 8, 2),
(339, 16, 9, 3),
(340, 16, 10, 2),
(341, 16, 11, 2),
(342, 16, 12, 3),
(343, 16, 13, 2),
(344, 16, 14, 1),
(345, 16, 15, 1),
(346, 16, 16, 3),
(347, 16, 17, 3),
(348, 16, 18, 3),
(349, 16, 19, 3),
(350, 16, 20, 2),
(351, 16, 21, 3),
(352, 16, 22, 3),
(353, 17, 1, 4),
(354, 17, 2, 4),
(355, 17, 3, 4),
(356, 17, 4, 4),
(357, 17, 5, 2),
(358, 17, 6, 2),
(359, 17, 7, 2),
(360, 17, 8, 2),
(361, 17, 9, 3),
(362, 17, 10, 1),
(363, 17, 11, 1),
(364, 17, 12, 1),
(365, 17, 13, 1),
(366, 17, 14, 1),
(367, 17, 15, 1),
(368, 17, 16, 3),
(369, 17, 17, 3),
(370, 17, 18, 3),
(371, 17, 19, 3),
(372, 17, 20, 3),
(373, 17, 21, 2),
(374, 17, 22, 2),
(375, 18, 1, 3),
(376, 18, 2, 3),
(377, 18, 3, 3),
(378, 18, 4, 3),
(379, 18, 5, 2),
(380, 18, 6, 2),
(381, 18, 7, 2),
(382, 18, 8, 2),
(383, 18, 9, 3),
(384, 18, 10, 2),
(385, 18, 11, 3),
(386, 18, 12, 2),
(387, 18, 13, 2),
(388, 18, 14, 2),
(389, 18, 15, 1),
(390, 18, 16, 3),
(391, 18, 17, 3),
(392, 18, 18, 3),
(393, 18, 19, 3),
(394, 18, 20, 3),
(395, 18, 21, 2),
(396, 18, 22, 3),
(397, 19, 1, 5),
(398, 19, 2, 5),
(399, 19, 3, 4),
(400, 19, 4, 4),
(401, 19, 5, 5),
(402, 19, 6, 5),
(403, 19, 7, 5),
(404, 19, 8, 4),
(405, 19, 9, 5),
(406, 19, 10, 5),
(407, 19, 11, 4),
(408, 19, 12, 4),
(409, 19, 13, 3),
(410, 19, 14, 3),
(411, 19, 15, 5),
(412, 19, 16, 5),
(413, 19, 17, 5),
(414, 19, 18, 5),
(415, 19, 19, 5),
(416, 19, 20, 4),
(417, 19, 21, 4),
(418, 19, 22, 4),
(419, 20, 1, 4),
(420, 20, 2, 4),
(421, 20, 3, 4),
(422, 20, 4, 3),
(423, 20, 5, 4),
(424, 20, 6, 4),
(425, 20, 7, 4),
(426, 20, 8, 3),
(427, 20, 9, 3),
(428, 20, 10, 3),
(429, 20, 11, 3),
(430, 20, 12, 3),
(431, 20, 13, 2),
(432, 20, 14, 2),
(433, 20, 15, 5),
(434, 20, 16, 5),
(435, 20, 17, 5),
(436, 20, 18, 3),
(437, 20, 19, 5),
(438, 20, 20, 4),
(439, 20, 21, 4),
(440, 20, 22, 4),
(441, 21, 1, 4),
(442, 21, 2, 4),
(443, 21, 3, 4),
(444, 21, 4, 4),
(445, 21, 5, 3),
(446, 21, 6, 4),
(447, 21, 7, 4),
(448, 21, 8, 4),
(449, 21, 9, 5),
(450, 21, 10, 3),
(451, 21, 11, 4),
(452, 21, 12, 4),
(453, 21, 13, 2),
(454, 21, 14, 2),
(455, 21, 15, 3),
(456, 21, 16, 5),
(457, 21, 17, 5),
(458, 21, 18, 4),
(459, 21, 19, 5),
(460, 21, 20, 4),
(461, 21, 21, 4),
(462, 21, 22, 4),
(463, 22, 1, 4),
(464, 22, 2, 3),
(465, 22, 3, 3),
(466, 22, 4, 4),
(467, 22, 5, 3),
(468, 22, 6, 3),
(469, 22, 7, 4),
(470, 22, 8, 4),
(471, 22, 9, 5),
(472, 22, 10, 4),
(473, 22, 11, 3),
(474, 22, 12, 3),
(475, 22, 13, 2),
(476, 22, 14, 2),
(477, 22, 15, 3),
(478, 22, 16, 5),
(479, 22, 17, 5),
(480, 22, 18, 4),
(481, 22, 19, 5),
(482, 22, 20, 3),
(483, 22, 21, 4),
(484, 22, 22, 3),
(485, 23, 1, 4),
(486, 23, 2, 3),
(487, 23, 3, 3),
(488, 23, 4, 4),
(489, 23, 5, 4),
(490, 23, 6, 3),
(491, 23, 7, 3),
(492, 23, 8, 4),
(493, 23, 9, 4),
(494, 23, 10, 2),
(495, 23, 11, 3),
(496, 23, 12, 3),
(497, 23, 13, 2),
(498, 23, 14, 2),
(499, 23, 15, 3),
(500, 23, 16, 3),
(501, 23, 17, 3),
(502, 23, 18, 2),
(503, 23, 19, 3),
(504, 23, 20, 3),
(505, 23, 21, 4),
(506, 23, 22, 3),
(507, 24, 1, 4),
(508, 24, 2, 4),
(509, 24, 3, 4),
(510, 24, 4, 4),
(511, 24, 5, 5),
(512, 24, 6, 5),
(513, 24, 7, 5),
(514, 24, 8, 4),
(515, 24, 9, 5),
(516, 24, 10, 5),
(517, 24, 11, 4),
(518, 24, 12, 4),
(519, 24, 13, 5),
(520, 24, 14, 5),
(521, 24, 15, 3),
(522, 24, 16, 5),
(523, 24, 17, 5),
(524, 24, 18, 4),
(525, 24, 19, 5),
(526, 24, 20, 4),
(527, 24, 21, 4),
(528, 24, 22, 4),
(529, 25, 1, 4),
(530, 25, 2, 4),
(531, 25, 3, 4),
(532, 25, 4, 3),
(533, 25, 5, 3),
(534, 25, 6, 4),
(535, 25, 7, 4),
(536, 25, 8, 4),
(537, 25, 9, 4),
(538, 25, 10, 4),
(539, 25, 11, 4),
(540, 25, 12, 4),
(541, 25, 13, 2),
(542, 25, 14, 2),
(543, 25, 15, 3),
(544, 25, 16, 5),
(545, 25, 17, 5),
(546, 25, 18, 4),
(547, 25, 19, 5),
(548, 25, 20, 4),
(549, 25, 21, 4),
(550, 25, 22, 4),
(551, 26, 1, 4),
(552, 26, 2, 4),
(553, 26, 3, 5),
(554, 26, 4, 3),
(555, 26, 5, 3),
(556, 26, 6, 4),
(557, 26, 7, 4),
(558, 26, 8, 4),
(559, 26, 9, 5),
(560, 26, 10, 4),
(561, 26, 11, 4),
(562, 26, 12, 4),
(563, 26, 13, 2),
(564, 26, 14, 2),
(565, 26, 15, 3),
(566, 26, 16, 4),
(567, 26, 17, 4),
(568, 26, 18, 3),
(569, 26, 19, 3),
(570, 26, 20, 4),
(571, 26, 21, 4),
(572, 26, 22, 4),
(573, 27, 1, 5),
(574, 27, 2, 4),
(575, 27, 3, 4),
(576, 27, 4, 4),
(577, 27, 5, 5),
(578, 27, 6, 5),
(579, 27, 7, 5),
(580, 27, 8, 4),
(581, 27, 9, 4),
(582, 27, 10, 3),
(583, 27, 11, 4),
(584, 27, 12, 4),
(585, 27, 13, 3),
(586, 27, 14, 3),
(587, 27, 15, 4),
(588, 27, 16, 5),
(589, 27, 17, 5),
(590, 27, 18, 4),
(591, 27, 19, 5),
(592, 27, 20, 4),
(593, 27, 21, 4),
(594, 27, 22, 4),
(595, 28, 1, 4),
(596, 28, 2, 4),
(597, 28, 3, 4),
(598, 28, 4, 3),
(599, 28, 5, 4),
(600, 28, 6, 4),
(601, 28, 7, 4),
(602, 28, 8, 5),
(603, 28, 9, 5),
(604, 28, 10, 5),
(605, 28, 11, 4),
(606, 28, 12, 4),
(607, 28, 13, 3),
(608, 28, 14, 3),
(609, 28, 15, 3),
(610, 28, 16, 5),
(611, 28, 17, 5),
(612, 28, 18, 3),
(613, 28, 19, 5),
(614, 28, 20, 4),
(615, 28, 21, 4),
(616, 28, 22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id`, `nama`) VALUES
(1, 'Universitas Negeri Malang'),
(2, 'Universitas Pendidikan Indonesia'),
(3, 'Universitas Negeri Jakarta'),
(4, 'Universitas Negeri Yogyakarta'),
(5, 'Universitas Negeri Surabaya'),
(6, 'Universitas Negeri Semarang'),
(7, 'Universitas Trunojoyo Madura'),
(8, 'Universitas Pendidikan Ganesha'),
(9, 'Universitas Syarief Hidayatullah'),
(10, 'Universitas Sunan Gunung Jati'),
(11, 'Universitas Sultan Ageng Tirtayasa'),
(12, 'Universitas Gadjah Mada'),
(13, 'Universitas Sunan Kalijaga'),
(14, 'Universitas Maulana Malik Ibrahim'),
(15, 'Universitas Veteran'),
(16, 'Universitas Siliwangi'),
(17, 'Universitas Singaperbangsa'),
(18, 'Universitas Seni Indonesia Yogyakarta'),
(19, 'Universitas Indonesia'),
(20, 'Universitas Airlangga'),
(21, 'Universitas Padjajaran'),
(22, 'Universitas Diponegoro'),
(23, 'Universitas Udayana'),
(24, 'Universitas Brawijaya'),
(25, 'Universitas Jenderal Soedirman'),
(26, 'Universitas Negeri Jember'),
(27, 'Universitas Negeri Sebelas Maret'),
(28, 'Universitas Terbuka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_gap`
--
ALTER TABLE `bobot_gap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dim_ind`
--
ALTER TABLE `dim_ind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_gap`
--
ALTER TABLE `bobot_gap`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dim_ind`
--
ALTER TABLE `dim_ind`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
