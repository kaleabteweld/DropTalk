-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 02:04 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `droptalk_tast_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `user_id` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(30) DEFAULT NULL,
  `us_name` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `phon_number` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `bio` varchar(50) DEFAULT ' ',
  `porfile_pic` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `name`, `us_name`, `password`, `phon_number`, `email`, `bio`, `porfile_pic`) VALUES
('$2y$10$9ptrTG6pxoFiLk8F9KEz3ua6pNddr5NiVY/4c86uDPJ3w4Kv3R1im', 'abc', 'por', '$2y$10$B2wvEVnr6cThWOX7Z.aM8ub0/K6gVnNe3vTz8Hz31/m2yy2/9cyGO', '251900090000', 't@.', ' ', NULL),
('$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', 'kaleab teweldbrhan abay', 'pain', '$2y$10$JVbYvYXkin0zVAF6mXY2LOdfMWu8rzEjwkqEmLhIvjZeoIb3bRF8O', '+251900640160', 'kaleabteweld3@gmail.com', ' ', '../DropTalk/img/main/user-192.png'),
('$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje', 'tast_pro', 'test', '$2y$10$fsBP6MoRsITCFyQtX9DjDeeD4x6tPP6ITOcB/OEM8EN1QHzHCMNwm', '251000000000', 'k@.', 'do u know pain', '../DropTalk/img/main/user-192.png'),
('$2y$10$U1eHygmqtB0RIf6/ib/Kzuf.ESskQZf8spEMaIInHrHYMJ58V9sra', 'Nahom Teweldbrhan', 'ALPHAMEAT', '$2y$10$/N7o/ewF4TfLNQy7r4k.WuS48JYiu5vl.NjaRr64SmhsZRvqWPrti', '+251911487268', 'meatball647@gmai.com', ' ', '../DropTalk/img/main/user-192.png'),
('$2y$10$WAGEJjpt76brAcZ6Gk0LK.FNHpgDxWhicEfj92qm2VlaKmfqFI11u', 'efg', 'csj', '$2y$10$R38LUTAEFzVOqG1wCnEV1.khtZXoC7.okLMfW6e4EmKNffDH9XGoO', '+251092831239', 'a@.', ' ', '../DropTalk/uploads/users/users/efg/user-192.png');

-- --------------------------------------------------------

--
-- Table structure for table `channels_ref`
--

CREATE TABLE IF NOT EXISTS `channels_ref` (
  `channels_id` varchar(60) NOT NULL DEFAULT '',
  `channels_name` varchar(60) DEFAULT NULL,
  `channels_admins` text,
  `members_length` varchar(60) DEFAULT NULL,
  `channels_chat_data_json` text,
  `bio` varchar(50) DEFAULT ' ',
  `porfile_pic` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`channels_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channels_ref`
--

INSERT INTO `channels_ref` (`channels_id`, `channels_name`, `channels_admins`, `members_length`, `channels_chat_data_json`, `bio`, `porfile_pic`, `time`) VALUES
('$2y$10$abltOAbHFxXWLJbWV/og2ehka1SUsOA/SFAh/HkOr7yia2tyGHpn.', 'teast2', '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '1', NULL, 'bhvjjhv''bhghjhv', '../DropTalk/uploads/users/channel/teast2/Screenshot_2019-11-21-12-52-47.png', '2020-05-23 09:33:27'),
('$2y$10$kf/xmUXtP7Iae0Hy/JmkpebATZRKP5YF0nPueAt12kXjNjx2uceze', 'kolo', '$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje', '4', NULL, 'weygfdyuegwy', '../DropTalk/uploads/users/channel/kolo/Screenshot_2019-12-11-14-41-57.png', '2020-05-21 14:55:58'),
('$2y$10$KLr3DUCNQmGbpzZwQAzOdOdtXKHY349vBG3HZHT1yhPdt/6OYA.e6', 'anime', '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '1', NULL, 'its anime what more resone do u want', '../DropTalk/uploads/users/channel/anime/Screenshot_2019-10-07-16-35-45.png', '2020-05-20 09:35:50'),
('$2y$10$nVWHJuC0HcQ9hf9OS3v3TO5hTpPSAbxydhGZxOcmeV/xRxFB/rIUG', 'temp', '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '1', NULL, 'hgcghchgcjgh', '../DropTalk/uploads/users/channel/temp/vlcsnap-2019-10-05-06h53m57s075.png', '2020-05-22 09:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `chat_ref`
--

CREATE TABLE IF NOT EXISTS `chat_ref` (
  `chat_id` varchar(60) NOT NULL DEFAULT '',
  `user_id` varchar(60) DEFAULT NULL,
  `sec_user_id` varchar(60) DEFAULT NULL,
  `chat_chat_data` text,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_ref`
--

INSERT INTO `chat_ref` (`chat_id`, `user_id`, `sec_user_id`, `chat_chat_data`, `time`) VALUES
('$2y$10$5U3qiipcEzzUPYh1.bNfRuIJR7QYg7Vr2pRms/7.AZN59bISr1i6W', '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje', NULL, '2020-05-22 10:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `communities_ref`
--

CREATE TABLE IF NOT EXISTS `communities_ref` (
  `communitie_id` varchar(60) NOT NULL DEFAULT '',
  `communitie_name` varchar(60) DEFAULT NULL,
  `communitie_admins` text,
  `members_length` varchar(60) DEFAULT NULL,
  `communitie_chat_data_json` text,
  `bio` varchar(50) DEFAULT ' ',
  `porfile_pic` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`communitie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communities_ref`
--

INSERT INTO `communities_ref` (`communitie_id`, `communitie_name`, `communitie_admins`, `members_length`, `communitie_chat_data_json`, `bio`, `porfile_pic`, `time`) VALUES
('$2y$10$Sf7YSGMOPcnQ.WfQ1Vs0UOuijrZiBvnqyXle.HafH8JMqFXeoCfyS', 'Dalol Web Serices', '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '2', NULL, 'z bast wab div plase', '/img/img.jpg', '2020-05-16 13:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `follow_ref`
--

CREATE TABLE IF NOT EXISTS `follow_ref` (
  `user_id` varchar(60) NOT NULL DEFAULT '',
  `following_id` text,
  `following_len` varchar(30) NOT NULL,
  `followers_id` text,
  `followers_len` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow_ref`
--

INSERT INTO `follow_ref` (`user_id`, `following_id`, `following_len`, `followers_id`, `followers_len`) VALUES
('$2y$10$9ptrTG6pxoFiLk8F9KEz3ua6pNddr5NiVY/4c86uDPJ3w4Kv3R1im', NULL, '0', ',$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje,$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS,$2y$10$WAGEJjpt76brAcZ6Gk0LK.FNHpgDxWhicEfj92qm2VlaKmfqFI11u', '3'),
('$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje,$2y$10$9ptrTG6pxoFiLk8F9KEz3ua6pNddr5NiVY/4c86uDPJ3w4Kv3R1im,$2y$10$U1eHygmqtB0RIf6/ib/Kzuf.ESskQZf8spEMaIInHrHYMJ58V9sra', '3', ',$2y$10$WAGEJjpt76brAcZ6Gk0LK.FNHpgDxWhicEfj92qm2VlaKmfqFI11u', '1'),
('$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje', ',$2y$10$9ptrTG6pxoFiLk8F9KEz3ua6pNddr5NiVY/4c86uDPJ3w4Kv3R1im', '1', ',$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '1'),
('$2y$10$U1eHygmqtB0RIf6/ib/Kzuf.ESskQZf8spEMaIInHrHYMJ58V9sra', NULL, '0', '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '1'),
('$2y$10$WAGEJjpt76brAcZ6Gk0LK.FNHpgDxWhicEfj92qm2VlaKmfqFI11u', '$2y$10$9ptrTG6pxoFiLk8F9KEz3ua6pNddr5NiVY/4c86uDPJ3w4Kv3R1im,$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '2', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `group_ref`
--

CREATE TABLE IF NOT EXISTS `group_ref` (
  `group_id` varchar(60) NOT NULL DEFAULT '',
  `group_name` varchar(60) DEFAULT NULL,
  `group_admins` text,
  `members_length` varchar(60) DEFAULT NULL,
  `group_chat_data_json` text,
  `bio` varchar(50) DEFAULT ' ',
  `porfile_pic` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_ref`
--

INSERT INTO `group_ref` (`group_id`, `group_name`, `group_admins`, `members_length`, `group_chat_data_json`, `bio`, `porfile_pic`, `time`) VALUES
('$2y$10$bPqtOCK1GnG56tPAn03V0e8jhSjE1WFnMF3s1pqAno6qrDZmVlkzm', 'fuck you', '$2y$10$WAGEJjpt76brAcZ6Gk0LK.FNHpgDxWhicEfj92qm2VlaKmfqFI11u', '1', NULL, 'just fuck you men', '../DropTalk/uploads/users/groups/fuck you/vlcsnap-2020-01-26-03h59m18s640.png', '2020-05-25 11:06:45'),
('$2y$10$nJnW/grF9yFAf45xgIKqfe9Rt3simbSmF6GsRUEAEV2Ri8PS4HrDO', 'anime', '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '3', NULL, 'its anime what more resone do u want', '../DropTalk/uploads/users/groups/anime/vlcsnap-2019-11-15-05h13m22s618.png', '2020-05-21 10:44:17'),
('$2y$10$qaa9MRsFMeR3NFL8el3.r.mNZrb1kELXjZsfo/4VSjXoGqoBZtfEi', 'por', '$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje', '2', NULL, 'hcbgkywgecyukfwg', '../DropTalk/uploads/users/groups/por/vlcsnap-2020-01-07-07h08m43s221.png', '2020-05-23 14:43:46'),
('$2y$10$udR91Dk8YOhBcwSOmq0Uz.N6x.KJv48JVgTRKDNN7CFkRYqQtMSo2', 'work', '$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '1', NULL, 'hjv', '../DropTalk/uploads/users/groups/work/Screenshot_2019-08-03-12-13-04.png', '2020-05-21 10:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_interaction`
--

CREATE TABLE IF NOT EXISTS `user_interaction` (
  `user_id` varchar(60) NOT NULL DEFAULT '',
  `Groups_ids` text,
  `Channles_ids` text,
  `Communities_ids` text,
  `Posts_ids` text,
  `Chats_ids` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_interaction`
--

INSERT INTO `user_interaction` (`user_id`, `Groups_ids`, `Channles_ids`, `Communities_ids`, `Posts_ids`, `Chats_ids`) VALUES
('$2y$10$9ptrTG6pxoFiLk8F9KEz3ua6pNddr5NiVY/4c86uDPJ3w4Kv3R1im', '$2y$10$qaa9MRsFMeR3NFL8el3.r.mNZrb1kELXjZsfo/4VSjXoGqoBZtfEi', '$2y$10$kf/xmUXtP7Iae0Hy/JmkpebATZRKP5YF0nPueAt12kXjNjx2uceze', NULL, NULL, NULL),
('$2y$10$J58OWm.hxs0tDG4kCLPASuB7KGFvGRuRQ.grWGUbyWNt.OZy3adHS', '$2y$10$3/4p6ZS/FxQsvSH4exjDo.N/lM9uji7M1bt8mHd2laViG5feYXR9e,$2y$10$pDCmNYXsbqQCf2Boex7BWutNAAi0daOn3oUPj.NzrAXKKU3j/gAyu,$2y$10$nJnW/grF9yFAf45xgIKqfe9Rt3simbSmF6GsRUEAEV2Ri8PS4HrDO,$2y$10$kzalO9QKDta6NBrEcgqynOoHxu2RqGqg6CIA/N1/YwkoZaTNbero.,$2y$10$udR91Dk8YOhBcwSOmq0Uz.N6x.KJv48JVgTRKDNN7CFkRYqQtMSo2,$2y$10$qETz8ZE4f1KD0yrmLTdlSO.W64E1USAzF7zJIZBmtqHrryG0EFdE.,$2y$10$i21WKbDS53ev80kK13OOYeUYUgu5QcoCASbxx/cRWXVrfJstTkumK,$2y$10$bBTnPb/K2SIpJ8Qojjnk4e/eF0TozxfkBYLY97uyR5PhoGpodUxRm,$2y$10$nNazYc/.3inPQtO4fT743O07Mk3nCiHayO0.KTCkp4h8IVRf951iq,$2y$10$hy7h1rMNuaS9gGUio.8glu3TIuABbR2b2O.zTscxSFrCYlBxN9XWa,$2y$10$jNfXaxuXM1cWtjhG0YiTEeiD6gajST1SrPxJZ02eamPwi/Gq/7fIi', '$2y$10$y1IbF0l9bK7/f9Ww6/iEVu7DfvarJIH3sACQI35uq2n6I3T7KzUCG,$2y$10$KLr3DUCNQmGbpzZwQAzOdOdtXKHY349vBG3HZHT1yhPdt/6OYA.e6,$2y$10$mi68iKay5TDf7sX3IFhkCu7IicCyQeFjffD06hQD4tyQ1yVnjbrAS,$2y$10$Qwh1PLF9Msfl67//KH2LZeCGYp/eOGAz4/9mfMM/dSmaBilS516SK,$2y$10$.dCbiXuMPoorrxl.RL5r..L0rT34SVM0L3qOJwmNw3okunkGzOdr6,$2y$10$bgGXRX05adgg7/8gZ67b.OQQIcq/U68tY9JznmvR7WE/d5VJiqguG,$2y$10$5tF3PJvH/vputNrdRrESbO.yEhjonsudYqigWHc2CEVsi6rCxitNS,$2y$10$Lp3KDttV7UtKBAFJk/yY5eUli1OBFeFVkOuLXH8mouE7GMeoiw0DO,$2y$10$nVWHJuC0HcQ9hf9OS3v3TO5hTpPSAbxydhGZxOcmeV/xRxFB/rIUG,$2y$10$kf/xmUXtP7Iae0Hy/JmkpebATZRKP5YF0nPueAt12kXjNjx2uceze,$2y$10$zlHgKhwG0rzG4az9kNBnOerPAoUz.ljNlY4N4pq/kDjZG/zJckcT6,$2y$10$iL7z/XD.6yZsTjBxiDZIrOGKH.nNjPrY8Rf5YUHMOXZQU6r.ps1Cy,$2y$10$abltOAbHFxXWLJbWV/og2ehka1SUsOA/SFAh/HkOr7yia2tyGHpn.', '$2y$10$Sf7YSGMOPcnQ.WfQ1Vs0UOuijrZiBvnqyXle.HafH8JMqFXeoCfyS', NULL, '$2y$10$5U3qiipcEzzUPYh1.bNfRuIJR7QYg7Vr2pRms/7.AZN59bISr1i6W'),
('$2y$10$TgrJQ390SZ.qAC7WHyNjDeoC0L9Ydb7YuBRr.3flTXZ3smbnQhsje', '$2y$10$WJlRCfs4YaNvC49KGBD5oupm.izOSMlaMKIC.i0M7s6FLEidx/D7a,$2y$10$i21WKbDS53ev80kK13OOYeUYUgu5QcoCASbxx/cRWXVrfJstTkumK,$2y$10$qaa9MRsFMeR3NFL8el3.r.mNZrb1kELXjZsfo/4VSjXoGqoBZtfEi,$2y$10$nJnW/grF9yFAf45xgIKqfe9Rt3simbSmF6GsRUEAEV2Ri8PS4HrDO', '$2y$10$kf/xmUXtP7Iae0Hy/JmkpebATZRKP5YF0nPueAt12kXjNjx2uceze', NULL, NULL, '$2y$10$5U3qiipcEzzUPYh1.bNfRuIJR7QYg7Vr2pRms/7.AZN59bISr1i6W'),
('$2y$10$WAGEJjpt76brAcZ6Gk0LK.FNHpgDxWhicEfj92qm2VlaKmfqFI11u', '$2y$10$bPqtOCK1GnG56tPAn03V0e8jhSjE1WFnMF3s1pqAno6qrDZmVlkzm,$2y$10$nJnW/grF9yFAf45xgIKqfe9Rt3simbSmF6GsRUEAEV2Ri8PS4HrDO', '$2y$10$kf/xmUXtP7Iae0Hy/JmkpebATZRKP5YF0nPueAt12kXjNjx2uceze', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
