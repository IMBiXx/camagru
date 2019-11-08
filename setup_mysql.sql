-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2019 at 02:01 PM
-- Server version: 5.6.42
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Database: `camagru`
-- --------------------------------------------------------
--
-- Table structure for table `user_action`
--
CREATE TABLE `camagru`.`user_action` (
  `user_action_ID` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_ID` int UNSIGNED NOT NULL,
  `img_ID` int UNSIGNED NOT NULL,
  `user_action_like` tinyint(1) NOT NULL,
  `user_action_date` date NOT NULL,
  `user_action_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `img`
--
CREATE TABLE `camagru`.`img` (
  `img_ID` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `img_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_nbr_comments` int NOT NULL,
  `img_nbr_likes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `user`
--
CREATE TABLE `camagru`.`user` (
  `user_ID` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_preferences` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;