-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2025 lúc 09:47 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ci4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'user', '2025-06-10 09:12:52'),
(2, 3, 'user', '2025-06-16 07:20:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'tuan@gmail.com', '$2y$12$m3KZE.pXxvGdWdxz7KXPAOA9AR9mfHaGUH6ML/DgqK17TAK.xJZaa', NULL, NULL, 0, '2025-07-31 03:00:02', '2025-06-10 09:12:51', '2025-07-31 03:00:02'),
(3, 3, 'email_password', NULL, 'tung@gmail.com', '$2y$12$STAXZS.eb9Jt2JbXafg6COom4xP9yvcG8rh9m5yrEK2KxnhL.pCGO', NULL, NULL, 0, '2025-06-19 09:04:28', '2025-06-16 07:20:29', '2025-06-19 09:04:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-11 07:32:23', 1),
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-12 04:45:33', 1),
(3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-12 05:03:11', 1),
(4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-13 00:50:11', 1),
(5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-13 06:50:09', 1),
(6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-14 02:29:05', 1),
(7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-14 08:06:20', 1),
(8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-16 01:12:25', 1),
(9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-16 04:31:43', 1),
(10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-16 07:13:01', 1),
(11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-17 04:49:17', 1),
(12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-17 08:06:23', 1),
(13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-18 00:05:32', 1),
(14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-18 03:31:13', 1),
(15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-19 07:27:08', 1),
(16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tung@gmail.com', NULL, '2025-06-19 09:04:13', 0),
(17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tung@gmail.com', 3, '2025-06-19 09:04:28', 1),
(18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-20 08:56:11', 1),
(19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-21 04:01:35', 1),
(20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-21 07:30:20', 1),
(21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-23 03:44:30', 1),
(22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-24 07:49:03', 1),
(23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-25 04:02:13', 1),
(24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-25 07:33:34', 1),
(25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-26 03:38:36', 1),
(26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-27 07:51:08', 1),
(27, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-28 03:43:46', 1),
(28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-28 07:24:36', 1),
(29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-30 02:07:34', 1),
(30, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-30 07:36:13', 1),
(31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-06-30 23:56:40', 1),
(32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-01 04:45:37', 1),
(33, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-02 03:52:37', 1),
(34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-03 01:26:54', 1),
(35, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-03 03:36:40', 1),
(36, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-03 06:56:58', 1),
(37, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-04 01:17:29', 1),
(38, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-04 07:34:54', 1),
(39, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-05 00:38:09', 1),
(40, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-05 04:05:05', 1),
(41, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-05 07:23:55', 1),
(42, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-07 01:07:01', 1),
(43, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-07 23:51:34', 1),
(44, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-09 01:43:52', 1),
(45, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-10 02:23:33', 1),
(46, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-11 03:02:43', 1),
(47, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-11 07:08:41', 1),
(48, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-12 01:14:04', 1),
(49, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-12 07:16:18', 1),
(50, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-30 04:02:27', 1),
(51, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-30 08:21:10', 1),
(52, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-31 00:47:52', 1),
(53, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'tuan@gmail.com', 1, '2025-07-31 03:00:02', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `note_cart` text DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `creator_id` int(11) NOT NULL DEFAULT 0,
  `total_price` bigint(20) NOT NULL DEFAULT 0,
  `total_cart` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `note`, `note_cart`, `state`, `creator_id`, `total_price`, `total_cart`, `created_at`, `updated_at`) VALUES
(3, 'Trương Quang Tuấn', 'tuan@gmail.com', '0987654321', 'Thanh Xuân', 'text', NULL, 1, 0, 1370367, 1, '2025-07-11 09:57:54', '2025-07-31 14:05:17'),
(4, 'Trương Quang Tuấn', 'tuan@gmail.com', '0987654321', 'Thanh Xuân', 'Ghi chú', NULL, 7, 0, 456789, 1, '2025-07-11 10:02:07', '2025-07-11 15:18:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `product_price` bigint(20) NOT NULL DEFAULT 0,
  `product_total` int(11) NOT NULL DEFAULT 0,
  `product_price_total` bigint(20) NOT NULL DEFAULT 0,
  `color` text DEFAULT NULL,
  `size` text DEFAULT NULL,
  `info_1` text DEFAULT NULL,
  `info_2` text DEFAULT NULL,
  `info_3` text DEFAULT NULL,
  `info_4` text DEFAULT NULL,
  `info_5` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `product_price`, `product_total`, `product_price_total`, `color`, `size`, `info_1`, `info_2`, `info_3`, `info_4`, `info_5`) VALUES
(2, 3, 1, 456789, 3, 1370367, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 4, 1, 456789, 19, 456789, NULL, '3', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `banner_1` text DEFAULT NULL,
  `banner_2` text DEFAULT NULL,
  `banner_3` text DEFAULT NULL,
  `banner_4` text DEFAULT NULL,
  `banner_5` text DEFAULT NULL,
  `content_home_1` text DEFAULT NULL,
  `content_home_2` text DEFAULT NULL,
  `content_home_3` text DEFAULT NULL,
  `content_home_4` text DEFAULT NULL,
  `content_home_5` text DEFAULT NULL,
  `content_home_6` text DEFAULT NULL,
  `content_home_7` text DEFAULT NULL,
  `content_home_8` text DEFAULT NULL,
  `content_home_9` text DEFAULT NULL,
  `content_home_10` text DEFAULT NULL,
  `embed_code_header` text DEFAULT NULL,
  `embed_code_footer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`id`, `title`, `description`, `keyword`, `intro`, `logo`, `icon`, `banner_1`, `banner_2`, `banner_3`, `banner_4`, `banner_5`, `content_home_1`, `content_home_2`, `content_home_3`, `content_home_4`, `content_home_5`, `content_home_6`, `content_home_7`, `content_home_8`, `content_home_9`, `content_home_10`, `embed_code_header`, `embed_code_footer`) VALUES
(1, 'Sneaker', 'VỀ SNEAKER Sứ mệnh của chúng tôi là tạo ra một môi trường học có thể đem lại ảnh hưởng tích cực, niềm vui, tình yêu và sự phát triển toàn diện cho học sinh. Bên cạnh các kiến thức chuyên môn, học sinh tại American Skills được bồi dưỡng nhân cách, phát triển sự tự tin, kỹ năng sống là bước đệm quan trọng, cần thiết cho sự thành công của các em trong tương lai.', 'Giầy thể thao', 'VỀ SNEAKER Sứ mệnh của chúng tôi là tạo ra một môi trường học có thể đem lại ảnh hưởng tích cực, niềm vui, tình yêu và sự phát triển toàn diện cho học sinh. Bên cạnh các kiến thức chuyên môn, học sinh tại American Skills được bồi dưỡng nhân cách, phát triển sự tự tin, kỹ năng sống là bước đệm quan trọng, cần thiết cho sự thành công của các em trong tương lai.', 'logo.png', 'logo.png', 'banner1.jpg', 'banner2.jpg', 'banner3.jpg', NULL, NULL, 'Thượng Đình, Thanh Xuân, Hà Nội', '1', '2', 'tuan@gmail.com', '3', '4', '0987654321', '5', '6', '7', '<script atr=\"head\"></script>', '<script atr=\"footer\"></script>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `note`, `created_at`) VALUES
(1, 'Tuấn', 'tuan@gmail.com', '0987654321', 'test', '2025-07-09 15:34:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `type_id` int(11) NOT NULL DEFAULT 0,
  `link` text DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `state` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name`, `type`, `type_id`, `link`, `sort`, `state`) VALUES
(1, 0, 'Trang chủ', 'MenuSpecialModel', 1, '', 1, 1),
(2, 0, 'Về chúng tôi', 'PageModel', 2, '', 2, 1),
(3, 0, 'Sản phẩm', 'MenuSpecialModel', 3, '', 3, 1),
(4, 0, 'Tư vấn', 'PageModel', 3, '', 4, 1),
(5, 0, 'Tin tức sự kiện', 'MenuSpecialModel', 2, '', 5, 1),
(6, 0, 'Liên hệ', 'MenuSpecialModel', 4, '', 6, 1),
(7, 3, 'Adidas', 'ProductCatModel', 1, '', 1, 1),
(8, 3, 'Nike', 'ProductCatModel', 2, '', 2, 1),
(9, 3, 'Thương hiệu khác', 'ProductCatModel', 4, '', 3, 1),
(10, 3, 'Sale Off', '0', 0, 'sale', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_specials`
--

CREATE TABLE `menu_specials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_specials`
--

INSERT INTO `menu_specials` (`id`, `name`, `link`, `state`) VALUES
(1, 'Trang chủ', '/', 1),
(2, 'Tất cả tin tức', '/tat-ca-tin-tuc', 1),
(3, 'Tất cả sản phẩm', '/tat-ca-san-pham', 1),
(4, 'Liên hệ', '/lien-he', 1),
(5, 'Đăng ký', '/dang-ky', 0),
(6, 'Đăng nhập', '/dang-nhap', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_types`
--

CREATE TABLE `menu_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `model` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_types`
--

INSERT INTO `menu_types` (`id`, `name`, `type`, `state`, `model`) VALUES
(1, 'Trang', 'pages', 1, 'PageModel'),
(2, 'Danh mục tin tức', 'newscats', 1, 'NewsCatModel'),
(3, 'Tin tức', 'posts', 1, 'PostModel'),
(4, 'Danh mục sản phẩm', 'productcats', 1, 'ProductCatModel'),
(5, 'Sản phẩm', 'products', 1, 'ProductModel'),
(6, 'Khác', 'menu_specials', 1, 'MenuSpecialModel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1749544026, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1749544026, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1749544027, 1),
(4, '2025-06-20-081816', 'App\\Database\\Migrations\\AddSlide', 'default', 'App', 1750408302, 2),
(5, '2025-06-25-091237', 'App\\Database\\Migrations\\AddPage', 'default', 'App', 1750911739, 3),
(6, '2025-06-30-044250', 'App\\Database\\Migrations\\AddNewsCat', 'default', 'App', 1751259432, 4),
(7, '2025-07-01-093653', 'App\\Database\\Migrations\\AddNews', 'default', 'App', 1751429318, 5),
(8, '2025-07-02-075722', 'App\\Database\\Migrations\\AddProductCat', 'default', 'App', 1751443506, 6),
(9, '2025-07-02-090203', 'App\\Database\\Migrations\\AddProduct', 'default', 'App', 1751449052, 7),
(11, '2025-07-03-015900', 'App\\Database\\Migrations\\EditProduct', 'default', 'App', 1751510486, 8),
(12, '2025-07-04-085611', 'App\\Database\\Migrations\\AddMenuSpecial', 'default', 'App', 1751619563, 9),
(13, '2025-07-04-092051', 'App\\Database\\Migrations\\MenuType', 'default', 'App', 1751621074, 10),
(14, '2025-07-04-093453', 'App\\Database\\Migrations\\AddMenu', 'default', 'App', 1751621903, 11),
(15, '2025-07-05-092645', 'App\\Database\\Migrations\\AddConfig', 'default', 'App', 1751708335, 12),
(16, '2025-07-08-074515', 'App\\Database\\Migrations\\AddVideo', 'default', 'App', 1751960956, 13),
(17, '2025-07-09-082055', 'App\\Database\\Migrations\\AddContact', 'default', 'App', 1752049531, 14),
(18, '2025-07-10-045645', 'App\\Database\\Migrations\\AddCart', 'default', 'App', 1752132265, 15),
(19, '2025-07-10-045653', 'App\\Database\\Migrations\\AddCartItem', 'default', 'App', 1752132265, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newscats`
--

CREATE TABLE `newscats` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `title_seo` text DEFAULT NULL,
  `des_seo` text DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `creator_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `info_1` text DEFAULT NULL,
  `info_2` text DEFAULT NULL,
  `info_3` text DEFAULT NULL,
  `info_4` text DEFAULT NULL,
  `info_5` text DEFAULT NULL,
  `slug` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `newscats`
--

INSERT INTO `newscats` (`id`, `image`, `title`, `description`, `content`, `keyword`, `title_seo`, `des_seo`, `state`, `created_at`, `updated_at`, `creator_id`, `parent_id`, `sort`, `info_1`, `info_2`, `info_3`, `info_4`, `info_5`, `slug`) VALUES
(1, 'capture.png', 'Nước hoa nam', 'Mô tả1', '<p>Nội dung1</p>\r\n', 'keyword1', 'Nước hoa nam', 'seo des1', 1, '2025-07-01 14:19:14', '2025-07-09 14:55:14', 1, 3, 0, NULL, NULL, NULL, NULL, NULL, 'nuoc-hoa-nam'),
(2, '', 'Nước hoa nữ', '', '', '', '', '', 1, '2025-07-01 14:27:59', '2025-07-01 15:01:38', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 'nuoc-hoa-nu'),
(3, '', 'Nước hoa tổng hợp', '', '', '', '', '', 1, '2025-07-01 15:02:28', '2025-07-31 11:57:04', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, 'nuoc-hoa-tong-hop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `title_seo` text DEFAULT NULL,
  `des_seo` text DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `info_5` longtext DEFAULT NULL,
  `info_4` longtext DEFAULT NULL,
  `info_3` longtext DEFAULT NULL,
  `info_2` longtext DEFAULT NULL,
  `info_1` longtext DEFAULT NULL,
  `creator_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `image`, `title`, `slug`, `description`, `content`, `keyword`, `title_seo`, `des_seo`, `state`, `created_at`, `updated_at`, `info_5`, `info_4`, `info_3`, `info_2`, `info_1`, `creator_id`) VALUES
(2, 'capture.png', 'Giới thiệu', 'gioi-thieu', '', '<h1>C&Aacute;CH THỨC THANH TO&Aacute;N</h1>\r\n\r\n<p><img alt=\"\" src=\"http://hanoistudio.thietkewebsitegbvn.com/images/thanhtoan/1.png\" /></p>\r\n\r\n<h2>THANH TO&Aacute;N COD: NHẬN H&Agrave;NG V&Agrave; THANH TO&Aacute;N TIỀN MẶT</h2>\r\n\r\n<p>Khi qu&yacute; kh&aacute;ch y&ecirc;u cầu h&igrave;nh thức thanh to&aacute;n COD tức nhận h&agrave;ng v&agrave; thanh to&aacute;n tiền mặt, Qu&yacute; kh&aacute;ch vui l&ograve;ng lưu &yacute; những quy định sau:</p>\r\n\r\n<p>- Đối với c&aacute;c sản phẩm được giao h&agrave;ng bởi nh&acirc;n vi&ecirc;n c&ocirc;ng ty, Qu&yacute; kh&aacute;ch vui l&ograve;ng thanh to&aacute;n đầy đủ sau khi nh&acirc;n vi&ecirc;n đ&atilde; giao h&agrave;ng cho Qu&yacute; kh&aacute;ch. Nếu cần hỗ trợ hướng dẫn sử dụng, hoặc kiểm tra m&aacute;y m&oacute;c, thiết bị ch&uacute;ng t&ocirc;i sẵn s&agrave;ng hỗ trợ ngay tại chỗ.&nbsp;<br />\r\n- Đối với h&agrave;ng h&oacute;a được gởi theo đường bưu điện hoặc dịch vụ chuyển ph&aacute;t nhanh. Qu&yacute; kh&aacute;ch vui l&ograve;ng thanh to&aacute;n trước cho nh&acirc;n vi&ecirc;n giao h&agrave;ng rồi mới b&oacute;c mở h&agrave;ng h&oacute;a (Đ&acirc;y l&agrave; quy định bắt buộc của đơn vị vận chuyển). Sau khi b&oacute;c mở h&agrave;ng h&oacute;a, nếu Qu&yacute; kh&aacute;ch cần th&ecirc;m hỗ trợ g&igrave;, Qu&yacute; kh&aacute;ch vui l&ograve;ng li&ecirc;n hệ với c&ocirc;ng ty ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<h2>2. THANH TO&Aacute;N QUA NH&Agrave; XE, ĐƠN VỊ CHUYỂN PH&Aacute;T</h2>\r\n\r\n<p>Đối với c&aacute;c tỉnh ở xa khu vực th&agrave;nh phố Hồ Ch&iacute; Minh hay H&agrave; Nội. Ch&uacute;ng t&ocirc;i thường lựa chọn phương thức vận chuyển bằng xe kh&aacute;ch hoặc ch&agrave;nh xe vận chuyển. Điều n&agrave;y l&agrave;m giảm chi ph&iacute; vận chuyển đ&aacute;ng kể cho kh&aacute;ch h&agrave;ng. V&igrave; những sản phẩm c&oacute; k&iacute;ch thước hoặc trọng lượng lớn gần như kh&ocirc;ng thể gởi bưu điện hoặc c&oacute; gởi cước ph&iacute; sẽ rất cao. Do đ&oacute; Qu&yacute; kh&aacute;ch lưu &yacute; một số vấn đề sau đ&acirc;y:</p>\r\n\r\n<p>- C&ocirc;ng ty sẽ &aacute;p dụng ch&iacute;nh s&aacute;ch nh&agrave; xe thu tiền hộ c&ocirc;ng ty. Do đ&oacute; nếu được y&ecirc;u cầu thu hộ, Qu&yacute; kh&aacute;ch vui l&ograve;ng chuẩn bị tiền thanh to&aacute;n trực tiếp cho nh&agrave; xe hoặc đơn vị vận chuyển do c&ocirc;ng ty y&ecirc;u cầu.&nbsp;<br />\r\n- Đối với c&aacute;c sản phẩm c&oacute; trọng lượng lớn v&agrave; kỹ thuật sử dụng phức tạp, Qu&yacute; kh&aacute;ch c&oacute; thể y&ecirc;u cầu nh&acirc;n vi&ecirc;n c&ocirc;ng ty đến tận nh&agrave; lắp đặt. V&agrave; sẽ thanh to&aacute;n cho nh&acirc;n vi&ecirc;n giao h&agrave;ng hoặc nh&acirc;n vi&ecirc;n lắp đặt t&ugrave;y theo th&ocirc;ng b&aacute;o của c&ocirc;ng ty.</p>\r\n\r\n<h2>3. THANH TO&Aacute;N TẠI C&Ocirc;NG TY</h2>\r\n\r\n<p>Qu&yacute; kh&aacute;ch mua h&agrave;ng c&oacute; thể đến địa chỉ c&ocirc;ng ty để xem h&agrave;ng v&agrave; mua h&agrave;ng:</p>\r\n\r\n<p>167 - 169 B&igrave;nh Lợi (Nơ Trang Long nối d&agrave;i), P. 13, Quận B&igrave;nh Thạnh, Tp. Hồ Ch&iacute; Minh .</p>\r\n\r\n<h2>4. THANH TO&Aacute;N C&Ocirc;NG NỢ</h2>\r\n\r\n<p>Đối với c&aacute;c c&ocirc;ng ty đề nghị thanh to&aacute;n c&ocirc;ng nợ, hai b&ecirc;n cần x&aacute;c nhận đơn đặt h&agrave;ng v&agrave; thời gian c&ocirc;ng nợ hoặc gởi PO đặt h&agrave;ng qua Email: Hotrospro@gmail.com. C&ocirc;ng ty sẽ xem x&eacute;t c&aacute;c trường hợp cụ thể v&agrave; th&ocirc;ng b&aacute;o đến kh&aacute;ch h&agrave;ng về việc c&oacute; chấp nhận c&ocirc;ng nợ hay kh&ocirc;ng.&nbsp;<br />\r\nLi&ecirc;n hệ trực tiếp qua số điện thoại: 0283 5 534 298 hoặc 0986 954 423</p>\r\n\r\n<h2>5. THANH TO&Aacute;N CHUYỂN KHOẢN</h2>\r\n\r\n<p><img alt=\"\" src=\"http://hanoistudio.thietkewebsitegbvn.com/images/thanhtoan/2.jpg\" /></p>\r\n\r\n<p>Qu&yacute; Kh&aacute;ch vui l&ograve;ng chuyển tiền v&agrave;o một trong c&aacute;c t&agrave;i khoản sau:</p>\r\n\r\n<ul>\r\n	<li>Chủ t&agrave;i khoản: C&ocirc;ng ty TNHH C&ocirc;ng Nghiệp v&agrave; Thương Mại Nam Việt&nbsp;<br />\r\n	- Số TK: 060059386363&nbsp;<br />\r\n	- Tại NH Sacombank - PGD Phan Đăng Lưu - Chi nh&aacute;nh 8/3&nbsp;</li>\r\n	<li>Chủ TK: CT TNHH C&ocirc;ng Nghiệp v&agrave; TM Nam Việt&nbsp;<br />\r\n	- Số TK: 0531002529891&nbsp;<br />\r\n	- Tại NH Vietcombank - Chi nh&aacute;nh Đ&ocirc;ng S&agrave;i G&ograve;n&nbsp;</li>\r\n	<li>Chủ TK: C&ocirc;ng ty TNHH C&ocirc;ng Nghiệp v&agrave; Thương Mại Nam Việt - Số TK: 19026579068019 - Tại NH Techcombank - Chi nh&aacute;nh Nguyễn Th&aacute;i Sơn</li>\r\n</ul>\r\n', 'Giầy thể thao', 'Giới thiệu', 'Giới thiệu giầy thể thao', 1, '2025-06-30 11:32:39', '2025-07-08 16:09:22', NULL, NULL, NULL, NULL, NULL, 1),
(3, '', 'Tư vấn', 'tu-van', '', '', '', '', '', 1, '2025-07-07 13:58:37', '2025-07-07 13:58:37', NULL, NULL, NULL, NULL, NULL, 1),
(4, '', 'Hàng đặt trước', 'hang-dat-truoc', '', '', '', 'Hàng đặt trước', '', 1, '2025-07-10 09:52:55', '2025-07-31 08:58:03', NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `title_seo` text DEFAULT NULL,
  `des_seo` text DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `creator_id` int(11) NOT NULL DEFAULT 0,
  `newscat_id` text DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `info_1` longtext DEFAULT NULL,
  `info_2` longtext DEFAULT NULL,
  `info_3` longtext DEFAULT NULL,
  `info_4` longtext DEFAULT NULL,
  `info_5` longtext DEFAULT NULL,
  `slug` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `description`, `content`, `keyword`, `title_seo`, `des_seo`, `state`, `created_at`, `updated_at`, `creator_id`, `newscat_id`, `sort`, `views`, `info_1`, `info_2`, `info_3`, `info_4`, `info_5`, `slug`) VALUES
(2, 'image-1-770x550.jpg', 'Tin tức một', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s</p>\r\n', '', '', '', 1, '2025-07-08 14:28:32', '2025-07-08 14:31:24', 1, '[\"3\"]', 0, 0, NULL, NULL, NULL, NULL, NULL, 'tin-tuc-mot'),
(3, 'image-2-770x550.jpg', 'Tin tức hai', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '', '', '', '', 1, '2025-07-08 14:32:46', '2025-07-09 14:57:21', 1, '[\"3\",\"1\",\"2\"]', 0, 0, NULL, NULL, NULL, NULL, NULL, 'tin-tuc-hai'),
(4, 'image-3-770x550.jpg', 'Tin tức ba', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '', '', '', '', 1, '2025-07-08 14:33:08', '2025-07-08 14:40:40', 1, '', 0, 0, NULL, NULL, NULL, NULL, NULL, 'tin-tuc-ba'),
(5, 'banner2.jpg', 'Tin tức bốn', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '', '', 'Tin tức bốn', '', 1, '2025-07-08 14:33:32', '2025-07-10 09:24:06', 1, '', 0, 0, NULL, NULL, NULL, NULL, NULL, 'tin-tuc-bon');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcats`
--

CREATE TABLE `productcats` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `title_seo` text DEFAULT NULL,
  `des_seo` text DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `creator_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `info_1` longtext DEFAULT NULL,
  `info_2` longtext DEFAULT NULL,
  `info_3` longtext DEFAULT NULL,
  `info_4` longtext DEFAULT NULL,
  `info_5` longtext DEFAULT NULL,
  `slug` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productcats`
--

INSERT INTO `productcats` (`id`, `image`, `title`, `description`, `content`, `keyword`, `title_seo`, `des_seo`, `state`, `created_at`, `updated_at`, `creator_id`, `parent_id`, `sort`, `info_1`, `info_2`, `info_3`, `info_4`, `info_5`, `slug`) VALUES
(1, 'capture.png', 'Adidas', 'Mô tả', '<p>Nội dung</p>\r\n', 'keyword1', 'Adidas', 'des seo', 1, '2025-07-02 15:51:49', '2025-07-09 08:51:57', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, 'adidas'),
(2, '', 'Nike', '', '', '', '', '', 1, '2025-07-02 15:56:51', '2025-07-02 15:56:51', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 'nike'),
(4, '', 'Thương hiệu khác', '', '', '', '', '', 1, '2025-07-03 13:57:47', '2025-07-03 13:57:47', 1, 2, 0, NULL, NULL, NULL, NULL, NULL, 'thuong-hieu-khac');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `image_sub` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `slug` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `price` bigint(20) NOT NULL DEFAULT 0,
  `price_sale` bigint(20) NOT NULL DEFAULT 0,
  `product_code` text DEFAULT NULL,
  `product_shape` text DEFAULT NULL,
  `product_size` text DEFAULT NULL,
  `product_brand` text DEFAULT NULL,
  `product_origin` text DEFAULT NULL,
  `product_text_1` text DEFAULT NULL,
  `product_text_2` text DEFAULT NULL,
  `product_text_3` text DEFAULT NULL,
  `product_text_4` text DEFAULT NULL,
  `product_text_5` text DEFAULT NULL,
  `product_text_6` text DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `title_seo` text DEFAULT NULL,
  `des_seo` text DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `product_new` tinyint(4) NOT NULL DEFAULT 0,
  `product_hot` tinyint(4) NOT NULL DEFAULT 0,
  `product_state_2` tinyint(4) DEFAULT 0,
  `product_state_1` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `creator_id` int(11) NOT NULL DEFAULT 0,
  `productcat_id` text DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `info_1` longtext DEFAULT NULL,
  `info_2` longtext DEFAULT NULL,
  `info_3` longtext DEFAULT NULL,
  `info_4` longtext DEFAULT NULL,
  `info_5` longtext DEFAULT NULL,
  `info_6` longtext DEFAULT NULL,
  `info_7` longtext DEFAULT NULL,
  `info_8` longtext DEFAULT NULL,
  `info_9` longtext DEFAULT NULL,
  `info_10` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `image`, `image_sub`, `title`, `slug`, `description`, `content`, `price`, `price_sale`, `product_code`, `product_shape`, `product_size`, `product_brand`, `product_origin`, `product_text_1`, `product_text_2`, `product_text_3`, `product_text_4`, `product_text_5`, `product_text_6`, `keyword`, `title_seo`, `des_seo`, `state`, `product_new`, `product_hot`, `product_state_2`, `product_state_1`, `created_at`, `updated_at`, `creator_id`, `productcat_id`, `sort`, `views`, `info_1`, `info_2`, `info_3`, `info_4`, `info_5`, `info_6`, `info_7`, `info_8`, `info_9`, `info_10`) VALUES
(1, 'product1.jpg', '[\"product2.jpg\",\"product3.jpg\",\"product4.jpg\",\"product6.jpg\"]', 'Sản phẩm một', 'san-pham-mot', '<p>M&ocirc; tả</p>\r\n', '<p>Nội dung</p>\r\n', 123456, 456789, 'mã', 'mẫu', '1,2,3', 'thương hiệu', 'xuất xứ', '1', NULL, NULL, NULL, NULL, NULL, 'keyword', 'Sản phẩm một', 'des seo', 1, 1, 1, 0, 0, '2025-07-03 16:01:45', '2025-07-10 11:52:02', 1, '[\"1\",\"4\"]', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'product2.jpg', '[]', 'Sản phẩm & hai', 'san-pham-hai', '', '', 123456, 0, '', '', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, 0, 0, 0, 0, '2025-07-08 13:55:41', '2025-07-12 09:59:33', 1, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'product3.jpg', '[]', 'Sản phẩm ba', 'san-pham-ba', '', '', 0, 0, '', '', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, 1, 0, 0, 0, '2025-07-08 14:04:22', '2025-07-09 09:37:14', 1, '[\"1\"]', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'product4.jpg', '[]', 'Sản phẩm bốn', 'san-pham-bon', '', '', 0, 0, '', '', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, 0, 0, 0, 0, '2025-07-08 14:04:55', '2025-07-08 14:04:55', 1, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'product5.jpg', '[]', 'Sản phẩm năm', 'san-pham-nam', '', '', 0, 0, '', '', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, 1, 0, 0, 0, '2025-07-08 14:05:26', '2025-07-09 08:45:24', 1, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'product6.jpg', '[]', 'Sản phẩm sáu', 'san-pham-sau', '', '', 0, 0, '', '', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, 0, 0, 0, 0, '2025-07-08 14:06:02', '2025-07-08 14:06:02', 1, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'product7.jpg', '[]', 'Sản phẩm bẩy', 'san-pham-bay', '', '', 0, 0, '', '', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, 1, 0, 0, 0, '2025-07-08 14:06:36', '2025-07-09 08:44:36', 1, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'product8.jpg', '[]', 'Sản phẩm tám', 'san-pham-tam', '', '', 0, 0, '', '', '', '', '', '0', NULL, NULL, NULL, NULL, NULL, '', '', '', 1, 0, 0, 0, 0, '2025-07-08 14:07:06', '2025-07-08 14:07:06', 1, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'product1.jpg', '[\"product2.jpg\",\"product3.jpg\",\"product4.jpg\",\"product6.jpg\"]', 'Sản phẩm chín', 'san-pham-chin', '<p>M&ocirc; tả</p>\r\n', '<p>Nội dung</p>\r\n', 123456, 456789, 'mã', 'mẫu', '1,2,3', 'thương hiệu', 'xuất xứ', '1', NULL, NULL, NULL, NULL, NULL, 'keyword', 'Sản phẩm một', 'des seo', 1, 1, 1, 0, 0, '2025-07-12 15:19:54', '2025-07-12 15:20:55', 1, '[\"1\",\"4\"]', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(9) NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `image`, `sort`) VALUES
(2, 'slide2.jpg', 1),
(3, 'slide3.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', NULL, NULL, 1, NULL, '2025-06-10 09:12:49', '2025-06-10 09:12:52', NULL),
(3, 'tung', NULL, NULL, 1, NULL, '2025-06-16 07:20:28', '2025-06-18 07:44:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`id`, `image`, `content`) VALUES
(1, 'product1.jpg', '<iframe width=\"100%\" height=\"319\" src=\"https://www.youtube.com/embed/Y29OrOVJUKs\" title=\"Hương Tràm - Em Gái Mưa (Official MV)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(2, 'product2.jpg', '<iframe width=\"746\" height=\"319\" src=\"https://www.youtube.com/embed/Y29OrOVJUKs\" title=\"Hương Tràm - Em Gái Mưa (Official MV)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(3, 'product3.jpg', '<iframe width=\"746\" height=\"319\" src=\"https://www.youtube.com/embed/Y29OrOVJUKs\" title=\"Hương Tràm - Em Gái Mưa (Official MV)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(4, 'product4.jpg', '<iframe width=\"746\" height=\"319\" src=\"https://www.youtube.com/embed/Y29OrOVJUKs\" title=\"Hương Tràm - Em Gái Mưa (Official MV)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Chỉ mục cho bảng `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_specials`
--
ALTER TABLE `menu_specials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `newscats`
--
ALTER TABLE `newscats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productcats`
--
ALTER TABLE `productcats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `menu_specials`
--
ALTER TABLE `menu_specials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `newscats`
--
ALTER TABLE `newscats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `productcats`
--
ALTER TABLE `productcats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
