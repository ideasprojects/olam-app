-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2022 pada 15.07
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olam-app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Superadmin Group'),
(2, 'Public', 'Public Group'),
(3, 'Default', 'Default Access Group'),
(4, 'Member', 'Member Access Group');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_perms`
--

INSERT INTO `aauth_perms` (`id`, `name`, `definition`) VALUES
(1, 'menu_dashboard', NULL),
(2, 'menu_crud_builder', NULL),
(3, 'menu_api_builder', NULL),
(4, 'menu_page_builder', NULL),
(5, 'menu_form_builder', NULL),
(6, 'menu_menu', NULL),
(7, 'menu_auth', NULL),
(8, 'menu_user', NULL),
(9, 'menu_group', NULL),
(10, 'menu_access', NULL),
(11, 'menu_permission', NULL),
(12, 'menu_api_documentation', NULL),
(13, 'menu_web_documentation', NULL),
(14, 'menu_settings', NULL),
(15, 'user_list', NULL),
(16, 'user_update_status', NULL),
(17, 'user_export', NULL),
(18, 'user_add', NULL),
(19, 'user_update', NULL),
(20, 'user_update_profile', NULL),
(21, 'user_update_password', NULL),
(22, 'user_profile', NULL),
(23, 'user_view', NULL),
(24, 'user_delete', NULL),
(25, 'blog_list', NULL),
(26, 'blog_export', NULL),
(27, 'blog_add', NULL),
(28, 'blog_update', NULL),
(29, 'blog_view', NULL),
(30, 'blog_delete', NULL),
(31, 'form_list', NULL),
(32, 'form_export', NULL),
(33, 'form_add', NULL),
(34, 'form_update', NULL),
(35, 'form_view', NULL),
(36, 'form_manage', NULL),
(37, 'form_delete', NULL),
(38, 'crud_list', NULL),
(39, 'crud_export', NULL),
(40, 'crud_add', NULL),
(41, 'crud_update', NULL),
(42, 'crud_view', NULL),
(43, 'crud_delete', NULL),
(44, 'rest_list', NULL),
(45, 'rest_export', NULL),
(46, 'rest_add', NULL),
(47, 'rest_update', NULL),
(48, 'rest_view', NULL),
(49, 'rest_delete', NULL),
(50, 'group_list', NULL),
(51, 'group_export', NULL),
(52, 'group_add', NULL),
(53, 'group_update', NULL),
(54, 'group_view', NULL),
(55, 'group_delete', NULL),
(56, 'permission_list', NULL),
(57, 'permission_export', NULL),
(58, 'permission_add', NULL),
(59, 'permission_update', NULL),
(60, 'permission_view', NULL),
(61, 'permission_delete', NULL),
(62, 'access_list', NULL),
(63, 'access_add', NULL),
(64, 'access_update', NULL),
(65, 'menu_list', NULL),
(66, 'menu_add', NULL),
(67, 'menu_update', NULL),
(68, 'menu_delete', NULL),
(69, 'menu_save_ordering', NULL),
(70, 'menu_type_add', NULL),
(71, 'page_list', NULL),
(72, 'page_export', NULL),
(73, 'page_add', NULL),
(74, 'page_update', NULL),
(75, 'page_view', NULL),
(76, 'page_delete', NULL),
(77, 'blog_list', NULL),
(78, 'blog_export', NULL),
(79, 'blog_add', NULL),
(80, 'blog_update', NULL),
(81, 'blog_view', NULL),
(82, 'blog_delete', NULL),
(83, 'setting', NULL),
(84, 'setting_update', NULL),
(85, 'dashboard', NULL),
(86, 'extension_list', NULL),
(87, 'extension_activate', NULL),
(88, 'extension_deactivate', NULL),
(89, 'patrol_5m_add', ''),
(90, 'patrol_5m_update', ''),
(91, 'patrol_5m_view', ''),
(92, 'patrol_5m_delete', ''),
(93, 'patrol_5m_list', ''),
(94, 'menu_source_data', ''),
(95, 'menu_patrol_5m', ''),
(96, 'menu_safety_observation', ''),
(107, 'so_export', ''),
(123, 'so_add', ''),
(124, 'so_update', ''),
(125, 'so_view', ''),
(126, 'so_delete', ''),
(127, 'so_list', ''),
(128, 'ps_add', ''),
(129, 'ps_update', ''),
(130, 'ps_view', ''),
(131, 'ps_delete', ''),
(132, 'ps_list', ''),
(133, 'menu_process_safety', ''),
(134, 'cc_add', ''),
(135, 'cc_update', ''),
(136, 'cc_view', ''),
(137, 'cc_delete', ''),
(138, 'cc_list', ''),
(139, 'menu_customer_complaint', ''),
(140, 'ib_add', ''),
(141, 'ib_update', ''),
(142, 'ib_view', ''),
(143, 'ib_delete', ''),
(144, 'ib_list', ''),
(145, 'menu_incoming_beans', ''),
(146, 'ffainr_add', ''),
(147, 'ffainr_update', ''),
(148, 'ffainr_view', ''),
(149, 'ffainr_delete', ''),
(150, 'ffainr_list', ''),
(151, 'menu_ffa_bean_in_roaster', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `message` text DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user`
--

CREATE TABLE `aauth_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `oauth_uid` text DEFAULT NULL,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `avatar` text NOT NULL,
  `banned` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text DEFAULT NULL,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `top_secret` varchar(16) DEFAULT NULL,
  `ip_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `pass`, `username`, `full_name`, `avatar`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `top_secret`, `ip_address`) VALUES
(1, 'superadmin@olam.com', NULL, NULL, 'ec225039f1cb0c48ad528709e8e0184991e637d96db175f094b6b2037ec1a3c2', 'superadmin', 'superadmin', '', 0, '2021-12-31 15:33:30', '2021-12-31 15:33:30', '2021-12-31 09:32:57', NULL, NULL, NULL, NULL, NULL, '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `tags` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `viewers` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `content`, `image`, `tags`, `category`, `status`, `author`, `viewers`, `created_at`, `updated_at`) VALUES
(1, 'Hello Wellcome To Cicool Builder', 'Hello-Wellcome-To-Ciool-Builder', 'greetings from our team I hope to be happy! ', 'wellcome.jpg', 'greetings', '1', 'publish', 'admin', 0, '2021-12-31 09:32:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_category`
--

CREATE TABLE `blog_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog_category`
--

INSERT INTO `blog_category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Technology', ''),
(2, 'Lifestyle', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` int(11) UNSIGNED NOT NULL,
  `captcha_time` int(10) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc`
--

CREATE TABLE `cc` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sum_customer_complaint` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cc`
--

INSERT INTO `cc` (`id`, `date`, `sum_customer_complaint`, `user_id`) VALUES
(1, '2020-12-31 17:00:00', 1, 1),
(2, '2021-01-01 17:00:00', 0, 1),
(3, '2021-01-02 17:00:00', 0, 1),
(4, '2021-01-03 17:00:00', 0, 1),
(5, '2021-01-04 17:00:00', 0, 1),
(6, '2021-01-05 17:00:00', 0, 1),
(7, '2021-01-06 17:00:00', 0, 1),
(8, '2021-01-07 17:00:00', 0, 1),
(9, '2021-01-08 17:00:00', 0, 1),
(10, '2021-01-09 17:00:00', 0, 1),
(11, '2021-01-10 17:00:00', 0, 1),
(12, '2021-01-11 17:00:00', 0, 1),
(13, '2021-01-12 17:00:00', 0, 1),
(14, '2021-01-13 17:00:00', 0, 1),
(15, '2021-01-14 17:00:00', 0, 1),
(16, '2021-01-15 17:00:00', 0, 1),
(17, '2021-01-16 17:00:00', 0, 1),
(18, '2021-01-17 17:00:00', 0, 1),
(19, '2021-01-18 17:00:00', 0, 1),
(20, '2021-01-19 17:00:00', 0, 1),
(21, '2021-01-20 17:00:00', 0, 1),
(22, '2021-01-21 17:00:00', 0, 1),
(23, '2021-01-22 17:00:00', 0, 1),
(24, '2021-01-23 17:00:00', 0, 1),
(25, '2021-01-24 17:00:00', 0, 1),
(26, '2021-01-25 17:00:00', 0, 1),
(27, '2021-01-26 17:00:00', 0, 1),
(28, '2021-01-27 17:00:00', 0, 1),
(29, '2021-01-28 17:00:00', 0, 1),
(30, '2021-01-29 17:00:00', 0, 1),
(31, '2021-01-30 17:00:00', 0, 1),
(32, '2021-01-31 17:00:00', 0, 1),
(33, '2021-02-01 17:00:00', 0, 1),
(34, '2021-02-02 17:00:00', 0, 1),
(35, '2021-02-03 17:00:00', 0, 1),
(36, '2021-02-04 17:00:00', 0, 1),
(37, '2021-02-05 17:00:00', 0, 1),
(38, '2021-02-06 17:00:00', 0, 1),
(39, '2021-02-07 17:00:00', 0, 1),
(40, '2021-02-08 17:00:00', 0, 1),
(41, '2021-02-09 17:00:00', 0, 1),
(42, '2021-02-10 17:00:00', 0, 1),
(43, '2021-02-11 17:00:00', 0, 1),
(44, '2021-02-12 17:00:00', 0, 1),
(45, '2021-02-13 17:00:00', 0, 1),
(46, '2021-02-14 17:00:00', 0, 1),
(47, '2021-02-15 17:00:00', 0, 1),
(48, '2021-02-16 17:00:00', 0, 1),
(49, '2021-02-17 17:00:00', 0, 1),
(50, '2021-02-18 17:00:00', 0, 1),
(51, '2021-02-19 17:00:00', 0, 1),
(52, '2021-02-20 17:00:00', 0, 1),
(53, '2021-02-21 17:00:00', 0, 1),
(54, '2021-02-22 17:00:00', 0, 1),
(55, '2021-02-23 17:00:00', 0, 1),
(56, '2021-02-24 17:00:00', 0, 1),
(57, '2021-02-25 17:00:00', 0, 1),
(58, '2021-02-26 17:00:00', 0, 1),
(59, '2021-02-27 17:00:00', 0, 1),
(60, '2021-02-28 17:00:00', 0, 1),
(61, '2021-03-01 17:00:00', 0, 1),
(62, '2021-03-02 17:00:00', 0, 1),
(63, '2021-03-03 17:00:00', 0, 1),
(64, '2021-03-04 17:00:00', 0, 1),
(65, '2021-03-05 17:00:00', 0, 1),
(66, '2021-03-06 17:00:00', 0, 1),
(67, '2021-03-07 17:00:00', 0, 1),
(68, '2021-03-08 17:00:00', 0, 1),
(69, '2021-03-09 17:00:00', 0, 1),
(70, '2021-03-10 17:00:00', 0, 1),
(71, '2021-03-11 17:00:00', 0, 1),
(72, '2021-03-12 17:00:00', 0, 1),
(73, '2021-03-13 17:00:00', 0, 1),
(74, '2021-03-14 17:00:00', 0, 1),
(75, '2021-03-15 17:00:00', 0, 1),
(76, '2021-03-16 17:00:00', 0, 1),
(77, '2021-03-17 17:00:00', 0, 1),
(78, '2021-03-18 17:00:00', 0, 1),
(79, '2021-03-19 17:00:00', 0, 1),
(80, '2021-03-20 17:00:00', 0, 1),
(81, '2021-03-21 17:00:00', 0, 1),
(82, '2021-03-22 17:00:00', 0, 1),
(83, '2021-03-23 17:00:00', 0, 1),
(84, '2021-03-24 17:00:00', 0, 1),
(85, '2021-03-25 17:00:00', 0, 1),
(86, '2021-03-26 17:00:00', 0, 1),
(87, '2021-03-27 17:00:00', 0, 1),
(88, '2021-03-28 17:00:00', 0, 1),
(89, '2021-03-29 17:00:00', 0, 1),
(90, '2021-03-30 17:00:00', 0, 1),
(91, '2021-03-31 17:00:00', 0, 1),
(92, '2021-04-01 17:00:00', 0, 1),
(93, '2021-04-02 17:00:00', 0, 1),
(94, '2021-04-03 17:00:00', 0, 1),
(95, '2021-04-04 17:00:00', 0, 1),
(96, '2021-04-05 17:00:00', 0, 1),
(97, '2021-04-06 17:00:00', 0, 1),
(98, '2021-04-07 17:00:00', 0, 1),
(99, '2021-04-08 17:00:00', 0, 1),
(100, '2021-04-09 17:00:00', 0, 1),
(101, '2021-04-10 17:00:00', 0, 1),
(102, '2021-04-11 17:00:00', 0, 1),
(103, '2021-04-12 17:00:00', 0, 1),
(104, '2021-04-13 17:00:00', 0, 1),
(105, '2021-04-14 17:00:00', 0, 1),
(106, '2021-04-15 17:00:00', 0, 1),
(107, '2021-04-16 17:00:00', 0, 1),
(108, '2021-04-17 17:00:00', 0, 1),
(109, '2021-04-18 17:00:00', 0, 1),
(110, '2021-04-19 17:00:00', 0, 1),
(111, '2021-04-20 17:00:00', 0, 1),
(112, '2021-04-21 17:00:00', 0, 1),
(113, '2021-04-22 17:00:00', 0, 1),
(114, '2021-04-23 17:00:00', 0, 1),
(115, '2021-04-24 17:00:00', 0, 1),
(116, '2021-04-25 17:00:00', 0, 1),
(117, '2021-04-26 17:00:00', 0, 1),
(118, '2021-04-27 17:00:00', 0, 1),
(119, '2021-04-28 17:00:00', 0, 1),
(120, '2021-04-29 17:00:00', 0, 1),
(121, '2021-04-30 17:00:00', 0, 1),
(122, '2021-05-01 17:00:00', 0, 1),
(123, '2021-05-02 17:00:00', 0, 1),
(124, '2021-05-03 17:00:00', 0, 1),
(125, '2021-05-04 17:00:00', 0, 1),
(126, '2021-05-05 17:00:00', 0, 1),
(127, '2021-05-06 17:00:00', 0, 1),
(128, '2021-05-07 17:00:00', 0, 1),
(129, '2021-05-08 17:00:00', 0, 1),
(130, '2021-05-09 17:00:00', 0, 1),
(131, '2021-05-10 17:00:00', 0, 1),
(132, '2021-05-11 17:00:00', 0, 1),
(133, '2021-05-12 17:00:00', 0, 1),
(134, '2021-05-13 17:00:00', 0, 1),
(135, '2021-05-14 17:00:00', 0, 1),
(136, '2021-05-15 17:00:00', 0, 1),
(137, '2021-05-16 17:00:00', 0, 1),
(138, '2021-05-17 17:00:00', 0, 1),
(139, '2021-05-18 17:00:00', 0, 1),
(140, '2021-05-19 17:00:00', 0, 1),
(141, '2021-05-20 17:00:00', 0, 1),
(142, '2021-05-21 17:00:00', 0, 1),
(143, '2021-05-22 17:00:00', 0, 1),
(144, '2021-05-23 17:00:00', 0, 1),
(145, '2021-05-24 17:00:00', 0, 1),
(146, '2021-05-25 17:00:00', 0, 1),
(147, '2021-05-26 17:00:00', 0, 1),
(148, '2021-05-27 17:00:00', 0, 1),
(149, '2021-05-28 17:00:00', 0, 1),
(150, '2021-05-29 17:00:00', 0, 1),
(151, '2021-05-30 17:00:00', 0, 1),
(152, '2021-05-31 17:00:00', 0, 1),
(153, '2021-06-01 17:00:00', 0, 1),
(154, '2021-06-02 17:00:00', 0, 1),
(155, '2021-06-03 17:00:00', 0, 1),
(156, '2021-06-04 17:00:00', 0, 1),
(157, '2021-06-05 17:00:00', 0, 1),
(158, '2021-06-06 17:00:00', 0, 1),
(159, '2021-06-07 17:00:00', 0, 1),
(160, '2021-06-08 17:00:00', 0, 1),
(161, '2021-06-09 17:00:00', 0, 1),
(162, '2021-06-10 17:00:00', 0, 1),
(163, '2021-06-11 17:00:00', 0, 1),
(164, '2021-06-12 17:00:00', 0, 1),
(165, '2021-06-13 17:00:00', 0, 1),
(166, '2021-06-14 17:00:00', 0, 1),
(167, '2021-06-15 17:00:00', 0, 1),
(168, '2021-06-16 17:00:00', 0, 1),
(169, '2021-06-17 17:00:00', 0, 1),
(170, '2021-06-18 17:00:00', 0, 1),
(171, '2021-06-19 17:00:00', 0, 1),
(172, '2021-06-20 17:00:00', 0, 1),
(173, '2021-06-21 17:00:00', 0, 1),
(174, '2021-06-22 17:00:00', 0, 1),
(175, '2021-06-23 17:00:00', 0, 1),
(176, '2021-06-24 17:00:00', 0, 1),
(177, '2021-06-25 17:00:00', 0, 1),
(178, '2021-06-26 17:00:00', 0, 1),
(179, '2021-06-27 17:00:00', 0, 1),
(180, '2021-06-28 17:00:00', 0, 1),
(181, '2021-06-29 17:00:00', 0, 1),
(182, '2021-06-30 17:00:00', 0, 1),
(183, '2021-07-01 17:00:00', 0, 1),
(184, '2021-07-02 17:00:00', 0, 1),
(185, '2021-07-03 17:00:00', 0, 1),
(186, '2021-07-04 17:00:00', 0, 1),
(187, '2021-07-05 17:00:00', 0, 1),
(188, '2021-07-06 17:00:00', 0, 1),
(189, '2021-07-07 17:00:00', 0, 1),
(190, '2021-07-08 17:00:00', 0, 1),
(191, '2021-07-09 17:00:00', 0, 1),
(192, '2021-07-10 17:00:00', 0, 1),
(193, '2021-07-11 17:00:00', 0, 1),
(194, '2021-07-12 17:00:00', 0, 1),
(195, '2021-07-13 17:00:00', 0, 1),
(196, '2021-07-14 17:00:00', 0, 1),
(197, '2021-07-15 17:00:00', 0, 1),
(198, '2021-07-16 17:00:00', 0, 1),
(199, '2021-07-17 17:00:00', 0, 1),
(200, '2021-07-18 17:00:00', 0, 1),
(201, '2021-07-19 17:00:00', 0, 1),
(202, '2021-07-20 17:00:00', 0, 1),
(203, '2021-07-21 17:00:00', 0, 1),
(204, '2021-07-22 17:00:00', 0, 1),
(205, '2021-07-23 17:00:00', 0, 1),
(206, '2021-07-24 17:00:00', 0, 1),
(207, '2021-07-25 17:00:00', 0, 1),
(208, '2021-07-26 17:00:00', 0, 1),
(209, '2021-07-27 17:00:00', 0, 1),
(210, '2021-07-28 17:00:00', 0, 1),
(211, '2021-07-29 17:00:00', 0, 1),
(212, '2021-07-30 17:00:00', 0, 1),
(213, '2021-07-31 17:00:00', 0, 1),
(214, '2021-08-01 17:00:00', 0, 1),
(215, '2021-08-02 17:00:00', 0, 1),
(216, '2021-08-03 17:00:00', 0, 1),
(217, '2021-08-04 17:00:00', 0, 1),
(218, '2021-08-05 17:00:00', 0, 1),
(219, '2021-08-06 17:00:00', 0, 1),
(220, '2021-08-07 17:00:00', 0, 1),
(221, '2021-08-08 17:00:00', 0, 1),
(222, '2021-08-09 17:00:00', 0, 1),
(223, '2021-08-10 17:00:00', 0, 1),
(224, '2021-08-11 17:00:00', 0, 1),
(225, '2021-08-12 17:00:00', 0, 1),
(226, '2021-08-13 17:00:00', 0, 1),
(227, '2021-08-14 17:00:00', 0, 1),
(228, '2021-08-15 17:00:00', 0, 1),
(229, '2021-08-16 17:00:00', 0, 1),
(230, '2021-08-17 17:00:00', 0, 1),
(231, '2021-08-18 17:00:00', 0, 1),
(232, '2021-08-19 17:00:00', 0, 1),
(233, '2021-08-20 17:00:00', 0, 1),
(234, '2021-08-21 17:00:00', 0, 1),
(235, '2021-08-22 17:00:00', 0, 1),
(236, '2021-08-23 17:00:00', 0, 1),
(237, '2021-08-24 17:00:00', 0, 1),
(238, '2021-08-25 17:00:00', 0, 1),
(239, '2021-08-26 17:00:00', 0, 1),
(240, '2021-08-27 17:00:00', 0, 1),
(241, '2021-08-28 17:00:00', 0, 1),
(242, '2021-08-29 17:00:00', 0, 1),
(243, '2021-08-30 17:00:00', 0, 1),
(244, '2021-08-31 17:00:00', 0, 1),
(245, '2021-09-01 17:00:00', 0, 1),
(246, '2021-09-02 17:00:00', 0, 1),
(247, '2021-09-03 17:00:00', 0, 1),
(248, '2021-09-04 17:00:00', 0, 1),
(249, '2021-09-05 17:00:00', 0, 1),
(250, '2021-09-06 17:00:00', 0, 1),
(251, '2021-09-07 17:00:00', 0, 1),
(252, '2021-09-08 17:00:00', 0, 1),
(253, '2021-09-09 17:00:00', 0, 1),
(254, '2021-09-10 17:00:00', 0, 1),
(255, '2021-09-11 17:00:00', 0, 1),
(256, '2021-09-12 17:00:00', 0, 1),
(257, '2021-09-13 17:00:00', 0, 1),
(258, '2021-09-14 17:00:00', 0, 1),
(259, '2021-09-15 17:00:00', 0, 1),
(260, '2021-09-16 17:00:00', 0, 1),
(261, '2021-09-17 17:00:00', 0, 1),
(262, '2021-09-18 17:00:00', 0, 1),
(263, '2021-09-19 17:00:00', 0, 1),
(264, '2021-09-20 17:00:00', 0, 1),
(265, '2021-09-21 17:00:00', 0, 1),
(266, '2021-09-22 17:00:00', 0, 1),
(267, '2021-09-23 17:00:00', 0, 1),
(268, '2021-09-24 17:00:00', 0, 1),
(269, '2021-09-25 17:00:00', 0, 1),
(270, '2021-09-26 17:00:00', 0, 1),
(271, '2021-09-27 17:00:00', 0, 1),
(272, '2021-09-28 17:00:00', 0, 1),
(273, '2021-09-29 17:00:00', 0, 1),
(274, '2021-09-30 17:00:00', 0, 1),
(275, '2021-10-01 17:00:00', 0, 1),
(276, '2021-10-02 17:00:00', 0, 1),
(277, '2021-10-03 17:00:00', 0, 1),
(278, '2021-10-04 17:00:00', 0, 1),
(279, '2021-10-05 17:00:00', 0, 1),
(280, '2021-10-06 17:00:00', 0, 1),
(281, '2021-10-07 17:00:00', 0, 1),
(282, '2021-10-08 17:00:00', 0, 1),
(283, '2021-10-09 17:00:00', 0, 1),
(284, '2021-10-10 17:00:00', 0, 1),
(285, '2021-10-11 17:00:00', 0, 1),
(286, '2021-10-12 17:00:00', 0, 1),
(287, '2021-10-13 17:00:00', 0, 1),
(288, '2021-10-14 17:00:00', 0, 1),
(289, '2021-10-15 17:00:00', 0, 1),
(290, '2021-10-16 17:00:00', 0, 1),
(291, '2021-10-17 17:00:00', 0, 1),
(292, '2021-10-18 17:00:00', 0, 1),
(293, '2021-10-19 17:00:00', 0, 1),
(294, '2021-10-20 17:00:00', 0, 1),
(295, '2021-10-21 17:00:00', 0, 1),
(296, '2021-10-22 17:00:00', 0, 1),
(297, '2021-10-23 17:00:00', 0, 1),
(298, '2021-10-24 17:00:00', 0, 1),
(299, '2021-10-25 17:00:00', 0, 1),
(300, '2021-10-26 17:00:00', 0, 1),
(301, '2021-10-27 17:00:00', 0, 1),
(302, '2021-10-28 17:00:00', 0, 1),
(303, '2021-10-29 17:00:00', 0, 1),
(304, '2021-10-30 17:00:00', 0, 1),
(305, '2021-10-31 17:00:00', 0, 1),
(306, '2021-11-01 17:00:00', 0, 1),
(307, '2021-11-02 17:00:00', 0, 1),
(308, '2021-11-03 17:00:00', 0, 1),
(309, '2021-11-04 17:00:00', 0, 1),
(310, '2021-11-05 17:00:00', 0, 1),
(311, '2021-11-06 17:00:00', 0, 1),
(312, '2021-11-07 17:00:00', 0, 1),
(313, '2021-11-08 17:00:00', 0, 1),
(314, '2021-11-09 17:00:00', 0, 1),
(315, '2021-11-10 17:00:00', 0, 1),
(316, '2021-11-11 17:00:00', 0, 1),
(317, '2021-11-12 17:00:00', 0, 1),
(318, '2021-11-13 17:00:00', 0, 1),
(319, '2021-11-14 17:00:00', 0, 1),
(320, '2021-11-15 17:00:00', 0, 1),
(321, '2021-11-16 17:00:00', 0, 1),
(322, '2021-11-17 17:00:00', 0, 1),
(323, '2021-11-18 17:00:00', 0, 1),
(324, '2021-11-19 17:00:00', 0, 1),
(325, '2021-11-20 17:00:00', 0, 1),
(326, '2021-11-21 17:00:00', 0, 1),
(327, '2021-11-22 17:00:00', 0, 1),
(328, '2021-11-23 17:00:00', 0, 1),
(329, '2021-11-24 17:00:00', 0, 1),
(330, '2021-11-25 17:00:00', 0, 1),
(331, '2021-11-26 17:00:00', 0, 1),
(332, '2021-11-27 17:00:00', 0, 1),
(333, '2021-11-28 17:00:00', 0, 1),
(334, '2021-11-29 17:00:00', 0, 1),
(335, '2021-11-30 17:00:00', 0, 1),
(336, '2021-12-01 17:00:00', 0, 1),
(337, '2021-12-02 17:00:00', 0, 1),
(338, '2021-12-03 17:00:00', 0, 1),
(339, '2021-12-04 17:00:00', 0, 1),
(340, '2021-12-05 17:00:00', 0, 1),
(341, '2021-12-06 17:00:00', 0, 1),
(342, '2021-12-07 17:00:00', 0, 1),
(343, '2021-12-08 17:00:00', 0, 1),
(344, '2021-12-09 17:00:00', 0, 1),
(345, '2021-12-10 17:00:00', 0, 1),
(346, '2021-12-11 17:00:00', 0, 1),
(347, '2021-12-12 17:00:00', 0, 1),
(348, '2021-12-13 17:00:00', 0, 1),
(349, '2021-12-14 17:00:00', 0, 1),
(350, '2021-12-15 17:00:00', 0, 1),
(351, '2021-12-16 17:00:00', 0, 1),
(352, '2021-12-17 17:00:00', 0, 1),
(353, '2021-12-18 17:00:00', 0, 1),
(354, '2021-12-19 17:00:00', 0, 1),
(355, '2021-12-20 17:00:00', 0, 1),
(356, '2021-12-21 17:00:00', 0, 1),
(357, '2021-12-22 17:00:00', 0, 1),
(358, '2021-12-23 17:00:00', 0, 1),
(359, '2021-12-24 17:00:00', 0, 1),
(360, '2021-12-25 17:00:00', 0, 1),
(361, '2021-12-26 17:00:00', 0, 1),
(362, '2021-12-27 17:00:00', 0, 1),
(363, '2021-12-28 17:00:00', 0, 1),
(364, '2021-12-29 17:00:00', 0, 1),
(365, '2021-12-30 17:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc_options`
--

CREATE TABLE `cc_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cc_options`
--

INSERT INTO `cc_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'active_theme', 'cicool'),
(2, 'favicon', 'default.png'),
(3, 'site_name', 'Olam'),
(4, 'timezone', 'Asia/Jakarta'),
(5, 'enable_crud_builder', NULL),
(6, 'enable_api_builder', NULL),
(7, 'enable_form_builder', NULL),
(8, 'enable_page_builder', NULL),
(9, 'enable_api_builder', NULL),
(10, 'enable_crud_builder', NULL),
(11, 'enable_form_builder', NULL),
(12, 'enable_page_builder', NULL),
(13, 'site_description', ''),
(14, 'keywords', ''),
(15, 'author', ''),
(16, 'logo', NULL),
(17, 'landing_page_id', 'default'),
(18, 'email', 'superadmin@olam.com'),
(19, 'google_id', ''),
(20, 'google_secret', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc_session`
--

CREATE TABLE `cc_session` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud`
--

CREATE TABLE `crud` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `page_read` varchar(20) DEFAULT NULL,
  `page_create` varchar(20) DEFAULT NULL,
  `page_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud`
--

INSERT INTO `crud` (`id`, `title`, `subject`, `table_name`, `primary_key`, `page_read`, `page_create`, `page_update`) VALUES
(1, 'Patrol 5M', 'Patrol 5M', 'patrol_5m', 'id', 'yes', 'yes', 'yes'),
(7, 'Safety Observation', 'Safety Observation', 'so', 'id', 'yes', 'yes', 'yes'),
(8, 'Process Safety', 'Process Safety', 'ps', 'id', 'yes', 'yes', 'yes'),
(9, 'Customer Complaint', 'Customer Complaint', 'cc', 'id', 'yes', 'yes', 'yes'),
(10, 'Incoming Beans', 'Incoming Beans', 'ib', 'id', 'yes', 'yes', 'yes'),
(11, 'FFA Bean in Roaster', 'FFA Bean in Roaster', 'ffainr', 'id', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_custom_option`
--

CREATE TABLE `crud_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_custom_option`
--

INSERT INTO `crud_custom_option` (`id`, `crud_field_id`, `crud_id`, `option_value`, `option_label`) VALUES
(21, 79, 2, 'Not Ok', 'Not Ok'),
(22, 79, 2, 'Ok', 'Ok'),
(23, 80, 2, 'Not Ok', 'Not Ok'),
(24, 80, 2, 'Ok', 'Ok'),
(25, 81, 2, 'Not Ok', 'Not Ok'),
(26, 81, 2, 'Ok', 'Ok'),
(27, 82, 2, 'Not Ok', 'Not Ok'),
(28, 82, 2, 'Ok', 'Ok'),
(29, 83, 2, 'Not Ok', 'Not Ok'),
(30, 83, 2, 'Ok', 'Ok'),
(31, 84, 2, 'Not Ok', 'Not Ok'),
(32, 84, 2, 'Ok', 'Ok'),
(33, 85, 2, 'Not Ok', 'Not Ok'),
(34, 85, 2, 'Ok', 'Ok'),
(35, 86, 2, 'Not Ok', 'Not Ok'),
(36, 86, 2, 'Ok', 'Ok'),
(37, 87, 2, 'Not Ok', 'Not Ok'),
(38, 87, 2, 'Ok', 'Ok'),
(255, 233, 3, 'Not Ok', 'Not Ok'),
(256, 233, 3, 'Ok', 'Ok'),
(257, 234, 3, 'Not Ok', 'Not Ok'),
(258, 234, 3, 'Ok', 'Ok'),
(259, 235, 3, 'Not Ok', 'Not Ok'),
(260, 235, 3, 'Ok', 'Ok'),
(261, 236, 3, 'Not Ok', 'Not Ok'),
(262, 236, 3, 'Ok', 'Ok'),
(263, 237, 3, 'Not Ok', 'Not Ok'),
(264, 237, 3, 'Ok', 'Ok'),
(265, 238, 3, 'Not Ok', 'Not Ok'),
(266, 238, 3, 'Ok', 'Ok'),
(267, 239, 3, 'Not Ok', 'Not Ok'),
(268, 239, 3, 'Ok', 'Ok'),
(269, 240, 3, 'Not Ok', 'Not Ok'),
(270, 240, 3, 'Ok', 'Ok'),
(271, 241, 3, 'Not Ok', 'Not Ok'),
(272, 241, 3, 'Ok', 'Ok'),
(273, 334, 5, 'Not Ok', 'Not Ok'),
(274, 334, 5, 'Ok', 'Ok'),
(275, 335, 5, 'Not Ok', 'Not Ok'),
(276, 335, 5, 'Ok', 'Ok'),
(277, 336, 5, 'Not Ok', 'Not Ok'),
(278, 336, 5, 'Ok', 'Ok'),
(279, 337, 5, 'Not Ok', 'Not Ok'),
(280, 337, 5, 'Ok', 'Ok'),
(281, 338, 5, 'Not Ok', 'Not Ok'),
(282, 338, 5, 'Ok', 'Ok'),
(283, 339, 5, 'Not Ok', 'Not Ok'),
(284, 339, 5, 'Ok', 'Ok'),
(285, 340, 5, 'Not Ok', 'Not Ok'),
(286, 340, 5, 'Ok', 'Ok'),
(287, 341, 5, 'Not Ok', 'Not Ok'),
(288, 341, 5, 'Ok', 'Ok'),
(289, 342, 5, 'Not Ok', 'Not Ok'),
(290, 342, 5, 'Ok', 'Ok'),
(345, 382, 6, 'Not Ok', 'Not Ok'),
(346, 382, 6, 'Ok', 'Ok'),
(347, 383, 6, 'Not Ok', 'Not Ok'),
(348, 383, 6, 'Ok', 'Ok'),
(349, 384, 6, 'Not Ok', 'Not Ok'),
(350, 384, 6, 'Ok', 'Ok'),
(351, 385, 6, 'Not Ok', 'Not Ok'),
(352, 385, 6, 'Ok', 'Ok'),
(353, 386, 6, 'Not Ok', 'Not Ok'),
(354, 386, 6, 'Ok', 'Ok'),
(355, 387, 6, 'Not Ok', 'Not Ok'),
(356, 387, 6, 'Ok', 'Ok'),
(357, 388, 6, 'Not Ok', 'Not Ok'),
(358, 388, 6, 'Ok', 'Ok'),
(359, 389, 6, 'Not Ok', 'Not Ok'),
(360, 389, 6, 'Ok', 'Ok'),
(361, 390, 6, 'Not Ok', 'Not Ok'),
(362, 390, 6, 'Ok', 'Ok'),
(444, 465, 7, 'Not ok', 'Not ok'),
(445, 465, 7, 'Ok', 'Ok'),
(446, 465, 7, 'Close', 'Close'),
(447, 466, 7, 'Not ok', 'Not ok'),
(448, 466, 7, 'Ok', 'Ok'),
(449, 466, 7, 'Close', 'Close'),
(450, 467, 7, 'Not ok', 'Not ok'),
(451, 467, 7, 'Ok', 'Ok'),
(452, 467, 7, 'Close', 'Close'),
(453, 468, 7, 'Not ok', 'Not ok'),
(454, 468, 7, 'Ok', 'Ok'),
(455, 468, 7, 'Close', 'Close'),
(456, 469, 7, 'Not ok', 'Not ok'),
(457, 469, 7, 'Ok', 'Ok'),
(458, 469, 7, 'Close', 'Close'),
(459, 470, 7, 'Not ok', 'Not ok'),
(460, 470, 7, 'Ok', 'Ok'),
(461, 470, 7, 'Close', 'Close'),
(462, 471, 7, 'Not ok', 'Not ok'),
(463, 471, 7, 'Ok', 'Ok'),
(464, 471, 7, 'Close', 'Close'),
(465, 472, 7, 'Not ok', 'Not ok'),
(466, 472, 7, 'Ok', 'Ok'),
(467, 472, 7, 'Close', 'Close'),
(468, 473, 7, 'Not ok', 'Not ok'),
(469, 473, 7, 'Ok', 'Ok'),
(470, 473, 7, 'Close', 'Close');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field`
--

CREATE TABLE `crud_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_form` varchar(10) DEFAULT NULL,
  `show_update_form` varchar(10) DEFAULT NULL,
  `show_detail_page` varchar(10) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_field`
--

INSERT INTO `crud_field` (`id`, `crud_id`, `field_name`, `field_label`, `input_type`, `show_column`, `show_add_form`, `show_update_form`, `show_detail_page`, `sort`, `relation_table`, `relation_value`, `relation_label`) VALUES
(78, 2, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(79, 2, 'lab', 'lab', 'custom_option', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(80, 2, 'cw', 'cw', 'custom_option', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(81, 2, 'hs', 'hs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(82, 2, 'fg', 'fg', 'custom_option', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(83, 2, 'pdi', 'pdi', 'custom_option', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(84, 2, 'eng', 'eng', 'custom_option', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(85, 2, 'hrd', 'hrd', 'custom_option', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(86, 2, 'whs', 'whs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(87, 2, 'prj', 'prj', 'custom_option', 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(88, 2, 'user_id', 'user_id', 'current_user_id', 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(232, 3, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(233, 3, 'lab', 'lab', 'custom_option', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(234, 3, 'cw', 'cw', 'custom_option', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(235, 3, 'hs', 'hs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(236, 3, 'fg', 'fg', 'custom_option', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(237, 3, 'pdi', 'pdi', 'custom_option', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(238, 3, 'eng', 'eng', 'custom_option', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(239, 3, 'hrd', 'hrd', 'custom_option', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(240, 3, 'whs', 'whs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(241, 3, 'prj', 'prj', 'custom_option', 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(242, 3, 'user_id', 'user_id', 'current_user_id', '', 'yes', 'yes', 'yes', 11, '', '', ''),
(309, 4, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(310, 4, 'lab', 'lab', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(311, 4, 'cw', 'cw', 'input', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(312, 4, 'hs', 'hs', 'input', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(313, 4, 'fg', 'fg', 'input', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(314, 4, 'pdi', 'pdi', 'input', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(315, 4, 'eng', 'eng', 'input', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(316, 4, 'hrd', 'hrd', 'input', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(317, 4, 'whs', 'whs', 'input', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(318, 4, 'prj', 'prj', 'input', 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(319, 4, 'user_id', 'user_id', 'current_user_id', 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(332, 5, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(333, 5, 'date', 'date', 'datetime', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(334, 5, 'lab', 'lab', 'custom_option', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(335, 5, 'cw', 'cw', 'custom_option', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(336, 5, 'hs', 'hs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(337, 5, 'fg', 'fg', 'custom_option', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(338, 5, 'pdi', 'pdi', 'custom_option', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(339, 5, 'eng', 'eng', 'custom_option', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(340, 5, 'hrd', 'hrd', 'custom_option', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(341, 5, 'whs', 'whs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(342, 5, 'prj', 'prj', 'custom_option', 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(343, 5, 'user_id', 'user_id', 'current_user_id', 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(380, 6, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(381, 6, 'date', 'date', 'datetime', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(382, 6, 'lab', 'lab', 'custom_option', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(383, 6, 'cw', 'cw', 'custom_option', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(384, 6, 'hs', 'hs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(385, 6, 'fg', 'fg', 'custom_option', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(386, 6, 'pdi', 'pdi', 'custom_option', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(387, 6, 'eng', 'eng', 'custom_option', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(388, 6, 'hrd', 'hrd', 'custom_option', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(389, 6, 'whs', 'whs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(390, 6, 'prj', 'prj', 'custom_option', 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(391, 6, 'user_id', 'user_id', 'current_user_id', 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(392, 1, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(393, 1, 'date', 'date', 'datetime', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(394, 1, 'gerbang_masuk', 'gerbang_masuk', 'number', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(395, 1, 'office', 'office', 'number', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(396, 1, 'fasilitas_umum', 'fasilitas_umum', 'number', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(397, 1, 'produksi_upstream', 'produksi_upstream', 'number', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(398, 1, 'produksi_downstream', 'produksi_downstream', 'number', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(399, 1, 'laboraturium', 'laboraturium', 'number', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(400, 1, 'gudang', 'gudang', 'number', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(401, 1, 'utility', 'utility', 'input', 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(402, 1, 'user_id', 'user_id', 'current_user_id', '', 'yes', 'yes', 'yes', 11, '', '', ''),
(463, 7, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(464, 7, 'date', 'date', 'datetime', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(465, 7, 'lab', 'lab', 'custom_option', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(466, 7, 'cw', 'cw', 'custom_option', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(467, 7, 'hs', 'hs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(468, 7, 'fg', 'fg', 'custom_option', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(469, 7, 'pdi', 'pdi', 'custom_option', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(470, 7, 'eng', 'eng', 'custom_option', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(471, 7, 'hrd', 'hrd', 'custom_option', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(472, 7, 'whs', 'whs', 'custom_option', 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(473, 7, 'prj', 'prj', 'custom_option', 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(474, 7, 'user_id', 'user_id', 'current_user_id', '', 'yes', 'yes', 'yes', 12, '', '', ''),
(479, 8, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(480, 8, 'date', 'date', 'datetime', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(481, 8, 'sum_process_safety', 'sum_process_safety', 'number', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(482, 8, 'user_id', 'user_id', 'current_user_id', '', 'yes', 'yes', 'yes', 4, '', '', ''),
(483, 9, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(484, 9, 'date', 'date', 'datetime', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(485, 9, 'sum_customer_complaint', 'sum_customer_complaint', 'number', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(486, 9, 'user_id', 'user_id', 'current_user_id', '', 'yes', 'yes', 'yes', 4, '', '', ''),
(487, 10, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(488, 10, 'date', 'date', 'datetime', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(489, 10, 'sum_incoming_beans', 'sum_incoming_beans', 'number', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(490, 10, 'target', 'target', 'number', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(491, 10, 'user_id', 'user_id', 'current_user_id', '', 'yes', 'yes', 'yes', 5, '', '', ''),
(492, 11, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(493, 11, 'date', 'date', 'datetime', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(494, 11, 'sum_bean_in_roaster', 'sum_bean_in_roaster', 'input', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(495, 11, 'target', 'target', 'input', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(496, 11, 'user_id', 'user_id', 'current_user_id', 'yes', 'yes', 'yes', 'yes', 5, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_configuration`
--

CREATE TABLE `crud_field_configuration` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `group_config` varchar(200) NOT NULL,
  `config_name` text NOT NULL,
  `config_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_validation`
--

CREATE TABLE `crud_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_field_validation`
--

INSERT INTO `crud_field_validation` (`id`, `crud_field_id`, `crud_id`, `validation_name`, `validation_value`) VALUES
(78, 319, 4, 'max_length', '11'),
(81, 333, 5, 'required', ''),
(87, 381, 6, 'required', ''),
(88, 382, 6, 'required', ''),
(89, 383, 6, 'required', ''),
(90, 384, 6, 'required', ''),
(91, 385, 6, 'required', ''),
(92, 386, 6, 'required', ''),
(93, 387, 6, 'required', ''),
(94, 388, 6, 'required', ''),
(95, 389, 6, 'required', ''),
(96, 390, 6, 'required', ''),
(97, 393, 1, 'required', ''),
(148, 464, 7, 'required', ''),
(149, 465, 7, 'required', ''),
(150, 466, 7, 'required', ''),
(151, 467, 7, 'required', ''),
(152, 468, 7, 'required', ''),
(153, 469, 7, 'required', ''),
(154, 470, 7, 'required', ''),
(155, 471, 7, 'required', ''),
(156, 472, 7, 'required', ''),
(157, 473, 7, 'required', ''),
(163, 480, 8, 'required', ''),
(164, 481, 8, 'required', ''),
(165, 484, 9, 'required', ''),
(166, 485, 9, 'required', ''),
(167, 486, 9, 'required', ''),
(168, 486, 9, 'max_length', '11'),
(169, 488, 10, 'required', ''),
(170, 489, 10, 'required', ''),
(171, 490, 10, 'required', ''),
(172, 491, 10, 'required', ''),
(173, 491, 10, 'max_length', '11'),
(174, 493, 11, 'required', ''),
(175, 494, 11, 'required', ''),
(176, 495, 11, 'required', ''),
(177, 496, 11, 'required', ''),
(178, 496, 11, 'max_length', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_chained`
--

CREATE TABLE `crud_input_chained` (
  `id` int(11) UNSIGNED NOT NULL,
  `chain_field` varchar(250) DEFAULT NULL,
  `chain_field_eq` varchar(250) DEFAULT NULL,
  `crud_field_id` int(11) DEFAULT NULL,
  `crud_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_type`
--

CREATE TABLE `crud_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int(11) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_input_type`
--

INSERT INTO `crud_input_type` (`id`, `type`, `relation`, `custom_value`, `validation_group`) VALUES
(1, 'input', '0', 0, 'input'),
(2, 'textarea', '0', 0, 'text'),
(3, 'select', '1', 0, 'select'),
(4, 'editor_wysiwyg', '0', 0, 'editor'),
(5, 'password', '0', 0, 'password'),
(6, 'email', '0', 0, 'email'),
(7, 'address_map', '0', 0, 'address_map'),
(8, 'file', '0', 0, 'file'),
(9, 'file_multiple', '0', 0, 'file_multiple'),
(10, 'datetime', '0', 0, 'datetime'),
(11, 'date', '0', 0, 'date'),
(12, 'timestamp', '0', 0, 'timestamp'),
(13, 'number', '0', 0, 'number'),
(14, 'yes_no', '0', 0, 'yes_no'),
(15, 'time', '0', 0, 'time'),
(16, 'year', '0', 0, 'year'),
(17, 'select_multiple', '1', 0, 'select_multiple'),
(18, 'checkboxes', '1', 0, 'checkboxes'),
(19, 'options', '1', 0, 'options'),
(20, 'true_false', '0', 0, 'true_false'),
(21, 'current_user_username', '0', 0, 'user_username'),
(22, 'current_user_id', '0', 0, 'current_user_id'),
(23, 'custom_option', '0', 1, 'custom_option'),
(24, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(25, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(26, 'custom_select', '0', 1, 'custom_select'),
(27, 'chained', '1', 0, 'chained');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_validation`
--

CREATE TABLE `crud_input_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `validation` varchar(200) NOT NULL,
  `input_able` varchar(20) NOT NULL,
  `group_input` text NOT NULL,
  `input_placeholder` text NOT NULL,
  `call_back` varchar(10) NOT NULL,
  `input_validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_input_validation`
--

INSERT INTO `crud_input_validation` (`id`, `validation`, `input_able`, `group_input`, `input_placeholder`, `call_back`, `input_validation`) VALUES
(1, 'required', 'no', 'input, file, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes, true_false, address_map, custom_option, custom_checkbox, custom_select_multiple, custom_select, file_multiple, chained', '', '', ''),
(2, 'max_length', 'yes', 'input, number, text, select, password, email, editor, yes_no, time, year, select_multiple, options, checkboxes, address_map', '', '', 'numeric'),
(3, 'min_length', 'yes', 'input, number, text, select, password, email, editor, time, year, select_multiple, address_map', '', '', 'numeric'),
(4, 'valid_email', 'no', 'input, email', '', '', ''),
(5, 'valid_emails', 'no', 'input, email', '', '', ''),
(6, 'regex', 'yes', 'input, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes', '', 'yes', 'callback_valid_regex'),
(7, 'decimal', 'no', 'input, number, text, select', '', '', ''),
(8, 'allowed_extension', 'yes', 'file, file_multiple', 'ex : jpg,png,..', '', 'callback_valid_extension_list'),
(9, 'max_width', 'yes', 'file, file_multiple', '', '', 'numeric'),
(10, 'max_height', 'yes', 'file, file_multiple', '', '', 'numeric'),
(11, 'max_size', 'yes', 'file, file_multiple', '... kb', '', 'numeric'),
(12, 'max_item', 'yes', 'file_multiple', '', '', 'numeric'),
(13, 'valid_url', 'no', 'input, text', '', '', ''),
(14, 'alpha', 'no', 'input, text, select, password, editor, yes_no', '', '', ''),
(15, 'alpha_numeric', 'no', 'input, number, text, select, password, editor', '', '', ''),
(16, 'alpha_numeric_spaces', 'no', 'input, number, text,select, password, editor', '', '', ''),
(17, 'valid_number', 'no', 'input, number, text, password, editor, true_false', '', 'yes', ''),
(18, 'valid_datetime', 'no', 'input, datetime, text', '', 'yes', ''),
(19, 'valid_date', 'no', 'input, datetime, date, text', '', 'yes', ''),
(20, 'valid_max_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(21, 'valid_min_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(22, 'valid_alpha_numeric_spaces_underscores', 'no', 'input, text,select, password, editor', '', 'yes', ''),
(23, 'matches', 'yes', 'input, number, text, password, email', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(24, 'valid_json', 'no', 'input, text, editor', '', 'yes', ' '),
(25, 'valid_url', 'no', 'input, text, editor', '', 'no', ' '),
(26, 'exact_length', 'yes', 'input, text, number', '0 - 99999*', 'no', 'numeric'),
(27, 'alpha_dash', 'no', 'input, text', '', 'no', ''),
(28, 'integer', 'no', 'input, text, number', '', 'no', ''),
(29, 'differs', 'yes', 'input, text, number, email, password, editor, options, select', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(30, 'is_natural', 'no', 'input, text, number', '', 'no', ''),
(31, 'is_natural_no_zero', 'no', 'input, text, number', '', 'no', ''),
(32, 'less_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(33, 'less_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(34, 'greater_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(35, 'greater_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(36, 'in_list', 'yes', 'input, text, number, select, options', '', 'no', 'callback_valid_multiple_value'),
(37, 'valid_ip', 'no', 'input, text', '', 'no', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ffainr`
--

CREATE TABLE `ffainr` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sum_bean_in_roaster` float NOT NULL DEFAULT 0,
  `target` float NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ffainr`
--

INSERT INTO `ffainr` (`id`, `date`, `sum_bean_in_roaster`, `target`, `user_id`) VALUES
(2, '2021-09-30 17:00:00', 0, 1.2, 1),
(3, '2021-10-01 17:00:00', 0, 1.2, 1),
(4, '2021-10-02 17:00:00', 0, 1.2, 1),
(5, '2021-10-03 17:00:00', 0, 1.2, 1),
(6, '2021-10-04 17:00:00', 0, 1.2, 1),
(7, '2021-10-05 17:00:00', 0, 1.2, 1),
(8, '2021-10-06 17:00:00', 0, 1.2, 1),
(9, '2021-10-07 17:00:00', 0, 1.2, 1),
(10, '2021-10-08 17:00:00', 0, 1.2, 1),
(11, '2021-10-09 17:00:00', 0, 1.2, 1),
(12, '2021-10-10 17:00:00', 0, 1.2, 1),
(13, '2021-10-11 17:00:00', 0, 1.2, 1),
(14, '2021-10-12 17:00:00', 0, 1.2, 1),
(15, '2021-10-13 17:00:00', 0, 1.2, 1),
(16, '2021-10-14 17:00:00', 0, 1.2, 1),
(17, '2021-10-15 17:00:00', 0, 1.2, 1),
(18, '2021-10-16 17:00:00', 0, 1.2, 1),
(19, '2021-10-17 17:00:00', 0, 1.2, 1),
(20, '2021-10-18 17:00:00', 0, 1.2, 1),
(21, '2021-10-19 17:00:00', 0, 1.2, 1),
(22, '2021-10-20 17:00:00', 0, 1.2, 1),
(23, '2021-10-21 17:00:00', 0, 1.2, 1),
(24, '2021-10-22 17:00:00', 0, 1.2, 1),
(25, '2021-10-23 17:00:00', 0, 1.2, 1),
(26, '2021-10-24 17:00:00', 0, 1.2, 1),
(27, '2021-10-25 17:00:00', 0, 1.2, 1),
(28, '2021-10-26 17:00:00', 0, 1.2, 1),
(29, '2021-10-27 17:00:00', 0, 1.2, 1),
(30, '2021-10-28 17:00:00', 0, 1.2, 1),
(31, '2021-10-29 17:00:00', 0, 1.2, 1),
(32, '2021-10-30 17:00:00', 0, 1.2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_custom_attribute`
--

CREATE TABLE `form_custom_attribute` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `attribute_value` text NOT NULL,
  `attribute_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_custom_option`
--

CREATE TABLE `form_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_field`
--

CREATE TABLE `form_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `placeholder` text DEFAULT NULL,
  `auto_generate_help_block` varchar(10) DEFAULT NULL,
  `help_block` text DEFAULT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_field_validation`
--

CREATE TABLE `form_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ib`
--

CREATE TABLE `ib` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sum_incoming_beans` float NOT NULL DEFAULT 0,
  `target` float NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ib`
--

INSERT INTO `ib` (`id`, `date`, `sum_incoming_beans`, `target`, `user_id`) VALUES
(2, '2021-10-31 17:00:00', 1.40992, 1.2, 1),
(3, '2021-11-01 17:00:00', 1.33213, 1.2, 1),
(4, '2021-11-02 17:00:00', 1.31327, 1.2, 1),
(5, '2021-11-03 17:00:00', 0, 1.2, 1),
(6, '2021-11-04 17:00:00', 1.93959, 1.2, 1),
(7, '2021-11-05 17:00:00', 1.4772, 1.2, 1),
(8, '2021-11-06 17:00:00', 0, 1.2, 1),
(9, '2021-11-07 17:00:00', 0, 1.2, 1),
(10, '2021-11-08 17:00:00', 1.60191, 1.2, 1),
(11, '2021-11-09 17:00:00', 1.23936, 1.2, 1),
(12, '2021-11-10 17:00:00', 1.33577, 1.2, 1),
(13, '2021-11-11 17:00:00', 0, 1.2, 1),
(14, '2021-11-12 17:00:00', 0, 1.2, 1),
(15, '2021-11-13 17:00:00', 0, 1.2, 1),
(16, '2021-11-14 17:00:00', 0, 1.2, 1),
(17, '2021-11-15 17:00:00', 0.989444, 1.2, 1),
(18, '2021-11-16 17:00:00', 1.57276, 1.2, 1),
(19, '2021-11-17 17:00:00', 0, 1.2, 1),
(20, '2021-11-18 17:00:00', 0, 1.2, 1),
(21, '2021-11-19 17:00:00', 0, 1.2, 1),
(22, '2021-11-20 17:00:00', 0, 1.2, 1),
(23, '2021-11-21 17:00:00', 1.23308, 1.2, 1),
(24, '2021-11-22 17:00:00', 1.686, 1.2, 1),
(25, '2021-11-23 17:00:00', 1.32987, 1.2, 1),
(26, '2021-11-24 17:00:00', 1.57268, 1.2, 1),
(27, '2021-11-25 17:00:00', 0, 1.2, 1),
(28, '2021-11-26 17:00:00', 0, 1.2, 1),
(29, '2021-11-27 17:00:00', 0, 1.2, 1),
(30, '2021-11-28 17:00:00', 0, 1.2, 1),
(31, '2021-11-29 17:00:00', 0, 1.2, 1),
(32, '2022-01-01 17:00:00', 0, 0, 1),
(33, '2022-01-01 17:00:00', 0, 0, 1),
(34, '2022-01-01 17:00:00', 0, 0, 1),
(35, '2022-01-01 17:00:00', 0, 0, 1),
(36, '2022-01-01 17:00:00', 0, 0, 1),
(37, '2022-01-01 17:00:00', 0, 0, 1),
(38, '2022-01-01 17:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, '9A8591BABDC369A9330EC348767C0ADF', 0, 0, 0, NULL, '2021-12-31 17:32:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `icon_color` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu_type_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `label`, `type`, `icon_color`, `link`, `sort`, `parent`, `icon`, `menu_type_id`, `active`) VALUES
(1, 'MAIN NAVIGATION', 'label', '', '{admin_url}/dashboard', 8, 0, '', 1, 1),
(2, 'Dashboard', 'menu', '', '{admin_url}/dashboard', 9, 0, 'fa-dashboard', 1, 1),
(3, 'CRUD Builder', 'menu', '', '{admin_url}/crud', 10, 0, 'fa-table', 1, 1),
(4, 'API Builder', 'menu', '', '{admin_url}/rest', 11, 0, 'fa-code', 1, 0),
(5, 'Page Builder', 'menu', '', '{admin_url}/page', 12, 0, 'fa-file-o', 1, 0),
(6, 'Form Builder', 'menu', '', '{admin_url}/form', 13, 0, 'fa-newspaper-o', 1, 0),
(7, 'Blog', 'menu', '', '{admin_url}/blog', 14, 0, 'fa-file-text-o', 1, 0),
(8, 'Menu', 'menu', '', '{admin_url}/menu', 15, 0, 'fa-bars', 1, 1),
(9, 'Auth', 'menu', '', '', 16, 0, 'fa-shield', 1, 1),
(10, 'User', 'menu', '', '{admin_url}/user', 17, 9, '', 1, 1),
(11, 'Groups', 'menu', '', '{admin_url}/group', 18, 9, '', 1, 1),
(12, 'Access', 'menu', '', '{admin_url}/access', 19, 9, '', 1, 1),
(13, 'Permission', 'menu', '', '{admin_url}/permission', 20, 9, '', 1, 1),
(14, 'API Keys', 'menu', '', '{admin_url}/keys', 21, 9, '', 1, 1),
(15, 'Extension', 'menu', '', '{admin_url}/extension', 22, 0, 'fa-puzzle-piece', 1, 0),
(16, 'OTHER', 'label', '', '', 23, 0, '', 1, 1),
(17, 'Settings', 'menu', 'text-red', '{admin_url}/setting', 24, 0, 'fa-circle-o', 1, 1),
(18, 'Web Documentation', 'menu', 'text-blue', '{admin_url}/doc/web', 25, 0, 'fa-circle-o', 1, 0),
(19, 'API Documentation', 'menu', 'text-yellow', '{admin_url}/doc/api', 26, 0, 'fa-circle-o', 1, 0),
(22, 'Dashboard', 'menu', '', 'administrator/dashboard', 3, 0, '', 2, 1),
(23, 'SOURCE DATA', 'label', 'default', '#', 1, 0, '', 1, 1),
(24, 'Patrol 5M', 'menu', 'default', '{admin_url}/patrol_5m', 2, 0, 'fa-list-alt', 1, 1),
(25, 'Safety Observation', 'menu', 'default', '{admin_url}/so', 3, 0, 'fa-list-alt', 1, 1),
(26, 'Process Safety', 'menu', 'default', '{admin_url}/ps', 4, 0, 'fa-list-alt', 1, 1),
(27, 'Customer Complaint', 'menu', 'default', '{admin_url}/cc', 5, 0, 'fa-list-alt', 1, 1),
(28, 'Incoming Beans', 'menu', 'default', '{admin_url}/ib', 6, 0, 'fa-list-alt', 1, 1),
(29, 'FFA Bean in Roaster', 'menu', 'default', '{admin_url}/ffainr', 7, 0, 'fa-list-alt', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu_type`
--

INSERT INTO `menu_type` (`id`, `name`, `definition`) VALUES
(1, 'side menu', NULL),
(2, 'top menu', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `fresh_content` text NOT NULL,
  `keyword` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `template` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `page_block_element`
--

CREATE TABLE `page_block_element` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_preview` varchar(200) NOT NULL,
  `block_name` varchar(200) NOT NULL,
  `content_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `patrol_5m`
--

CREATE TABLE `patrol_5m` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gerbang_masuk` int(11) DEFAULT 0,
  `office` int(11) DEFAULT 0,
  `fasilitas_umum` int(11) DEFAULT 0,
  `produksi_upstream` int(11) DEFAULT 0,
  `produksi_downstream` int(11) DEFAULT 0,
  `laboraturium` int(11) DEFAULT 0,
  `gudang` int(11) DEFAULT 0,
  `utility` int(11) DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `patrol_5m`
--

INSERT INTO `patrol_5m` (`id`, `date`, `gerbang_masuk`, `office`, `fasilitas_umum`, `produksi_upstream`, `produksi_downstream`, `laboraturium`, `gudang`, `utility`, `user_id`) VALUES
(1, '2021-01-01 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, '2021-01-02 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(3, '2021-01-03 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(4, '2021-01-04 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, '2021-01-05 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(6, '2021-01-06 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(7, '2021-01-07 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(8, '2021-01-08 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(9, '2021-01-09 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(10, '2021-01-10 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(11, '2021-01-11 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(12, '2021-01-12 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(13, '2021-01-13 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(14, '2021-01-14 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(15, '2021-01-15 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(16, '2021-01-16 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(17, '2021-01-17 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(18, '2021-01-18 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(19, '2021-01-19 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(20, '2021-01-20 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(21, '2021-01-21 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(22, '2021-01-22 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(23, '2021-01-23 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(24, '2021-01-24 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(25, '2021-01-25 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(26, '2021-01-26 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(27, '2021-01-27 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(28, '2021-01-28 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(29, '2021-01-29 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(30, '2021-01-30 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(31, '2021-01-31 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(32, '2021-02-01 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(33, '2021-02-02 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(34, '2021-02-03 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(35, '2021-02-04 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(36, '2021-02-05 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(37, '2021-02-06 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(38, '2021-02-07 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(39, '2021-02-08 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(40, '2021-02-09 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(41, '2021-02-10 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(42, '2021-02-11 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(43, '2021-02-12 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(44, '2021-02-13 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(45, '2021-02-14 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(46, '2021-02-15 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(47, '2021-02-16 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(48, '2021-02-17 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(49, '2021-02-18 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(50, '2021-02-19 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(51, '2021-02-20 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(52, '2021-02-21 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(53, '2021-02-22 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(54, '2021-02-23 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(55, '2021-02-24 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(56, '2021-02-25 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(57, '2021-02-26 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(58, '2021-02-27 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(59, '2021-02-28 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(60, '2021-03-01 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(61, '2021-03-02 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(62, '2021-03-03 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(63, '2021-03-04 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(64, '2021-03-05 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(65, '2021-03-06 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(66, '2021-03-07 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(67, '2021-03-08 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(68, '2021-03-09 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(69, '2021-03-10 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(70, '2021-03-11 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(71, '2021-03-12 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(72, '2021-03-13 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(73, '2021-03-14 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(74, '2021-03-15 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(75, '2021-03-16 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(76, '2021-03-17 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(77, '2021-03-18 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(78, '2021-03-19 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(79, '2021-03-20 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(80, '2021-03-21 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(81, '2021-03-22 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(82, '2021-03-23 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(83, '2021-03-24 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(84, '2021-03-25 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(85, '2021-03-26 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(86, '2021-03-27 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(87, '2021-03-28 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(88, '2021-03-29 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(89, '2021-03-30 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(90, '2021-03-31 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(91, '2021-04-01 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(92, '2021-04-02 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(93, '2021-04-03 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(94, '2021-04-04 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(95, '2021-04-05 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(96, '2021-04-06 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(97, '2021-04-07 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(98, '2021-04-08 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(99, '2021-04-09 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(100, '2021-04-10 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(101, '2021-04-11 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(102, '2021-04-12 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(103, '2021-04-13 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(104, '2021-04-14 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(105, '2021-04-15 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(106, '2021-04-16 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(107, '2021-04-17 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(108, '2021-04-18 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(109, '2021-04-19 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(110, '2021-04-20 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(111, '2021-04-21 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(112, '2021-04-22 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(113, '2021-04-23 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(114, '2021-04-24 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(115, '2021-04-25 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(116, '2021-04-26 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(117, '2021-04-27 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(118, '2021-04-28 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(119, '2021-04-29 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(120, '2021-04-30 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(121, '2021-05-01 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(122, '2021-05-02 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(123, '2021-05-03 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(124, '2021-05-04 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(125, '2021-05-05 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(126, '2021-05-06 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(127, '2021-05-07 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(128, '2021-05-08 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(129, '2021-05-09 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(130, '2021-05-10 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(131, '2021-05-11 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(132, '2021-05-12 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(133, '2021-05-13 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(134, '2021-05-14 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(135, '2021-05-15 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(136, '2021-05-16 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(137, '2021-05-17 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(138, '2021-05-18 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(139, '2021-05-19 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(140, '2021-05-20 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(141, '2021-05-21 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(142, '2021-05-22 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(143, '2021-05-23 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(144, '2021-05-24 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(145, '2021-05-25 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(146, '2021-05-26 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(147, '2021-05-27 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(148, '2021-05-28 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(149, '2021-05-29 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(150, '2021-05-30 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(151, '2021-05-31 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(152, '2021-06-01 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(153, '2021-06-02 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(154, '2021-06-03 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(155, '2021-06-04 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(156, '2021-06-05 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(157, '2021-06-06 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(158, '2021-06-07 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(159, '2021-06-08 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(160, '2021-06-09 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(161, '2021-06-10 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(162, '2021-06-11 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(163, '2021-06-12 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(164, '2021-06-13 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(165, '2021-06-14 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(166, '2021-06-15 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(167, '2021-06-16 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(168, '2021-06-17 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(169, '2021-06-18 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(170, '2021-06-19 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(171, '2021-06-20 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(172, '2021-06-21 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(173, '2021-06-22 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(174, '2021-06-23 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(175, '2021-06-24 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(176, '2021-06-25 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(177, '2021-06-26 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(178, '2021-06-27 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(179, '2021-06-28 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(180, '2021-06-29 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(181, '2021-06-30 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(182, '2021-07-01 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(183, '2021-07-02 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(184, '2021-07-03 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(185, '2021-07-04 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(186, '2021-07-05 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(187, '2021-07-06 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(188, '2021-07-07 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(189, '2021-07-08 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(190, '2021-07-09 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(191, '2021-07-10 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(192, '2021-07-11 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(193, '2021-07-12 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(194, '2021-07-13 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(195, '2021-07-14 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(196, '2021-07-15 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(197, '2021-07-16 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(198, '2021-07-17 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(199, '2021-07-18 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(200, '2021-07-19 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(201, '2021-07-20 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(202, '2021-07-21 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(203, '2021-07-22 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(204, '2021-07-23 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(205, '2021-07-24 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(206, '2021-07-25 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(207, '2021-07-26 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(208, '2021-07-27 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(209, '2021-07-28 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(210, '2021-07-29 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(211, '2021-07-30 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(212, '2021-07-31 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(213, '2021-08-01 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(214, '2021-08-02 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(215, '2021-08-03 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(216, '2021-08-04 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(217, '2021-08-05 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(218, '2021-08-06 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(219, '2021-08-07 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(220, '2021-08-08 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(221, '2021-08-09 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(222, '2021-08-10 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(223, '2021-08-11 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(224, '2021-08-12 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(225, '2021-08-13 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(226, '2021-08-14 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(227, '2021-08-15 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(228, '2021-08-16 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(229, '2021-08-17 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(230, '2021-08-18 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(231, '2021-08-19 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(232, '2021-08-20 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(233, '2021-08-21 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(234, '2021-08-22 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(235, '2021-08-23 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(236, '2021-08-24 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(237, '2021-08-25 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(238, '2021-08-26 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(239, '2021-08-27 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(240, '2021-08-28 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(241, '2021-08-29 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(242, '2021-08-30 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(243, '2021-08-31 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(244, '2021-09-01 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(245, '2021-09-02 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(246, '2021-09-03 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(247, '2021-09-04 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(248, '2021-09-05 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(249, '2021-09-06 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(250, '2021-09-07 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(251, '2021-09-08 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(252, '2021-09-09 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(253, '2021-09-10 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(254, '2021-09-11 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(255, '2021-09-12 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(256, '2021-09-13 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(257, '2021-09-14 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(258, '2021-09-15 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(259, '2021-09-16 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(260, '2021-09-17 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(261, '2021-09-18 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(262, '2021-09-19 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(263, '2021-09-20 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(264, '2021-09-21 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(265, '2021-09-22 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(266, '2021-09-23 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(267, '2021-09-24 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(268, '2021-09-25 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(269, '2021-09-26 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(270, '2021-09-27 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(271, '2021-09-28 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(272, '2021-09-29 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(273, '2021-09-30 07:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(274, '2021-10-01 07:00:00', 6, 0, 3, 0, 0, 0, 0, 0, 1),
(275, '2021-10-02 07:00:00', 7, 0, 0, 0, 0, 0, 0, 0, 1),
(276, '2021-10-03 07:00:00', 4, 0, 1, 0, 0, 0, 0, 0, 1),
(277, '2021-10-04 07:00:00', 4, 0, 2, 0, 0, 0, 0, 0, 1),
(278, '2021-10-05 07:00:00', 2, 0, 3, 0, 0, 0, 0, 0, 1),
(279, '2021-10-06 07:00:00', 7, 0, 1, 0, 0, 0, 0, 0, 1),
(280, '2021-10-07 07:00:00', 7, 0, 1, 0, 0, 0, 0, 0, 1),
(281, '2021-10-08 07:00:00', 5, 0, 3, 0, 0, 0, 0, 0, 1),
(282, '2021-10-09 07:00:00', 5, 0, 3, 0, 0, 0, 0, 0, 1),
(283, '2021-10-10 07:00:00', 3, 0, 1, 0, 0, 0, 0, 0, 1),
(284, '2021-10-11 07:00:00', 7, 0, 4, 0, 0, 0, 0, 0, 1),
(285, '2021-10-12 07:00:00', 4, 0, 2, 0, 0, 0, 0, 0, 1),
(286, '2021-10-13 07:00:00', 7, 0, 4, 0, 0, 0, 0, 0, 1),
(287, '2021-10-14 07:00:00', 9, 0, 2, 0, 0, 0, 0, 0, 1),
(288, '2021-10-15 07:00:00', 3, 0, 0, 0, 0, 0, 0, 0, 1),
(289, '2021-10-16 07:00:00', 2, 0, 2, 0, 0, 0, 0, 0, 1),
(290, '2021-10-17 07:00:00', 4, 0, 1, 0, 0, 0, 0, 0, 1),
(291, '2021-10-18 07:00:00', 3, 0, 2, 0, 0, 0, 0, 0, 1),
(292, '2021-10-19 07:00:00', 9, 0, 2, 0, 0, 0, 0, 0, 1),
(293, '2021-10-20 07:00:00', 7, 0, 4, 0, 0, 0, 0, 0, 1),
(294, '2021-10-21 07:00:00', 5, 0, 3, 0, 0, 0, 0, 0, 1),
(295, '2021-10-22 07:00:00', 4, 0, 1, 0, 0, 0, 0, 0, 1),
(296, '2021-10-23 07:00:00', 4, 1, 4, 0, 0, 0, 0, 0, 1),
(297, '2021-10-24 07:00:00', 6, 0, 1, 0, 0, 0, 0, 0, 1),
(298, '2021-10-25 07:00:00', 1, 0, 3, 0, 0, 0, 0, 0, 1),
(299, '2021-10-26 07:00:00', 6, 0, 1, 0, 0, 0, 0, 0, 1),
(300, '2021-10-27 07:00:00', 0, 0, 1, 0, 0, 0, 0, 0, 1),
(301, '2021-10-28 07:00:00', 4, 1, 2, 0, 0, 0, 0, 0, 1),
(302, '2021-10-29 07:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 1),
(303, '2021-10-30 07:00:00', 0, 0, 1, 0, 0, 0, 0, 0, 1),
(304, '2021-10-31 07:00:00', 3, 0, 1, 0, 0, 0, 0, 0, 1),
(305, '2021-11-01 07:00:00', 3, 0, 1, 0, 0, 0, 0, 0, 1),
(306, '2021-11-02 07:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 1),
(307, '2021-11-03 07:00:00', 3, 0, 2, 0, 0, 0, 0, 0, 1),
(308, '2021-11-04 07:00:00', 0, 0, 1, 0, 1, 0, 0, 0, 1),
(309, '2021-11-05 07:00:00', 3, 0, 1, 0, 0, 0, 0, 0, 1),
(310, '2021-11-06 07:00:00', 2, 0, 2, 0, 0, 0, 0, 0, 1),
(311, '2021-11-07 07:00:00', 1, 0, 1, 0, 0, 0, 0, 0, 1),
(312, '2021-11-08 08:00:00', 2, 0, 1, 0, 0, 0, 0, 0, 1),
(313, '2021-11-09 08:00:00', 2, 0, 1, 0, 0, 0, 0, 0, 1),
(314, '2021-11-10 08:00:00', 4, 0, 2, 0, 0, 0, 0, 0, 1),
(315, '2021-11-11 08:00:00', 0, 0, 1, 0, 0, 0, 0, 0, 1),
(316, '2021-11-12 08:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 1),
(317, '2021-11-13 08:00:00', 2, 0, 1, 0, 0, 0, 0, 0, 1),
(318, '2021-11-14 08:00:00', 3, 0, 0, 0, 0, 0, 0, 0, 1),
(319, '2021-11-15 08:00:00', 1, 0, 1, 0, 0, 0, 0, 0, 1),
(320, '2021-11-16 08:00:00', 3, 0, 1, 0, 0, 0, 0, 0, 1),
(321, '2021-11-17 08:00:00', 4, 0, 1, 0, 0, 0, 0, 0, 1),
(322, '2021-11-18 08:00:00', 2, 0, 2, 0, 0, 0, 0, 0, 1),
(323, '2021-11-19 08:00:00', 7, 0, 2, 0, 0, 0, 0, 0, 1),
(324, '2021-11-20 08:00:00', 4, 0, 0, 0, 0, 0, 0, 0, 1),
(325, '2021-11-21 08:00:00', 2, 0, 1, 0, 0, 0, 0, 0, 1),
(326, '2021-11-22 08:00:00', 3, 0, 0, 0, 0, 0, 0, 0, 1),
(327, '2021-11-23 08:00:00', 4, 0, 1, 0, 0, 0, 0, 0, 1),
(328, '2021-11-24 08:00:00', 4, 0, 1, 0, 0, 0, 0, 0, 1),
(329, '2021-11-25 08:00:00', 4, 0, 0, 0, 0, 0, 0, 0, 1),
(330, '2021-11-26 08:00:00', 2, 0, 1, 0, 0, 0, 0, 0, 1),
(331, '2021-11-27 08:00:00', 1, 0, 0, 0, 0, 0, 0, 0, 1),
(332, '2021-11-28 08:00:00', 1, 0, 1, 0, 0, 0, 0, 0, 1),
(333, '2021-11-29 08:00:00', 2, 0, 0, 0, 0, 0, 0, 0, 1),
(334, '2021-11-30 08:00:00', 0, 0, 1, 0, 0, 0, 0, 0, 1),
(335, '2021-12-01 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(336, '2021-12-02 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(337, '2021-12-03 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(338, '2021-12-04 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(339, '2021-12-05 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(340, '2021-12-06 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(341, '2021-12-07 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(342, '2021-12-08 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(343, '2021-12-09 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(344, '2021-12-10 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(345, '2021-12-11 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(346, '2021-12-12 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(347, '2021-12-13 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(348, '2021-12-14 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(349, '2021-12-15 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(350, '2021-12-16 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(351, '2021-12-17 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(352, '2021-12-18 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(353, '2021-12-19 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(354, '2021-12-20 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(355, '2021-12-21 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(356, '2021-12-22 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(357, '2021-12-23 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(358, '2021-12-24 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(359, '2021-12-25 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(360, '2021-12-26 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(361, '2021-12-27 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(362, '2021-12-28 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(363, '2021-12-29 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(364, '2021-12-30 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(365, '2021-12-31 08:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `sku` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `price` varchar(39) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `variant` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ps`
--

CREATE TABLE `ps` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sum_process_safety` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ps`
--

INSERT INTO `ps` (`id`, `date`, `sum_process_safety`, `user_id`) VALUES
(1, '2021-10-31 17:00:00', 1, 1),
(2, '2021-11-01 17:00:00', 0, 1),
(3, '2021-11-02 17:00:00', 0, 1),
(4, '2021-11-03 17:00:00', 0, 1),
(5, '2021-11-04 17:00:00', 0, 1),
(6, '2021-11-05 17:00:00', 0, 1),
(7, '2021-11-06 17:00:00', 0, 1),
(8, '2021-11-07 17:00:00', 0, 1),
(9, '2021-11-08 17:00:00', 0, 1),
(10, '2021-11-09 17:00:00', 0, 1),
(11, '2021-11-10 17:00:00', 0, 1),
(12, '2021-11-11 17:00:00', 0, 1),
(13, '2021-11-12 17:00:00', 0, 1),
(14, '2021-11-13 17:00:00', 0, 1),
(15, '2021-11-14 17:00:00', 0, 1),
(16, '2021-11-15 17:00:00', 0, 1),
(17, '2021-11-16 17:00:00', 0, 1),
(18, '2021-11-17 17:00:00', 0, 1),
(19, '2021-11-18 17:00:00', 0, 1),
(20, '2021-11-19 17:00:00', 0, 1),
(21, '2021-11-20 17:00:00', 0, 1),
(22, '2021-11-21 17:00:00', 0, 1),
(23, '2021-11-22 17:00:00', 0, 1),
(24, '2021-11-23 17:00:00', 0, 1),
(25, '2021-11-24 17:00:00', 0, 1),
(26, '2021-11-25 17:00:00', 0, 1),
(27, '2021-11-26 17:00:00', 0, 1),
(28, '2021-11-27 17:00:00', 0, 1),
(29, '2021-11-28 17:00:00', 0, 1),
(30, '2021-11-29 17:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest`
--

CREATE TABLE `rest` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `x_api_key` varchar(20) DEFAULT NULL,
  `x_token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_field`
--

CREATE TABLE `rest_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_api` varchar(10) DEFAULT NULL,
  `show_update_api` varchar(10) DEFAULT NULL,
  `show_detail_api` varchar(10) DEFAULT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_field_validation`
--

CREATE TABLE `rest_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_field_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_input_type`
--

CREATE TABLE `rest_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rest_input_type`
--

INSERT INTO `rest_input_type` (`id`, `type`, `relation`, `validation_group`) VALUES
(1, 'input', '0', 'input'),
(2, 'timestamp', '0', 'timestamp'),
(3, 'file', '0', 'file'),
(4, 'select', '1', 'select');

-- --------------------------------------------------------

--
-- Struktur dari tabel `so`
--

CREATE TABLE `so` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lab` varchar(11) DEFAULT '0',
  `cw` varchar(11) DEFAULT '0',
  `hs` varchar(11) DEFAULT '0',
  `fg` varchar(11) DEFAULT '0',
  `pdi` varchar(11) DEFAULT '0',
  `eng` varchar(11) DEFAULT '0',
  `hrd` varchar(11) DEFAULT '0',
  `whs` varchar(11) DEFAULT '0',
  `prj` varchar(11) DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `so`
--

INSERT INTO `so` (`id`, `date`, `lab`, `cw`, `hs`, `fg`, `pdi`, `eng`, `hrd`, `whs`, `prj`, `user_id`) VALUES
(1, '2020-12-31 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(2, '2021-01-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(3, '2021-01-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(4, '2021-01-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(5, '2021-01-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(6, '2021-01-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(7, '2021-01-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(8, '2021-01-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(9, '2021-01-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(10, '2021-01-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(11, '2021-01-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(12, '2021-01-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(13, '2021-01-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(14, '2021-01-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(15, '2021-01-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(16, '2021-01-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(17, '2021-01-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(18, '2021-01-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(19, '2021-01-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(20, '2021-01-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(21, '2021-01-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(22, '2021-01-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(23, '2021-01-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(24, '2021-01-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(25, '2021-01-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(26, '2021-01-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(27, '2021-01-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(28, '2021-01-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(29, '2021-01-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(30, '2021-01-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(31, '2021-01-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(32, '2021-01-31 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(33, '2021-02-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(34, '2021-02-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(35, '2021-02-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(36, '2021-02-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(37, '2021-02-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(38, '2021-02-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(39, '2021-02-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(40, '2021-02-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(41, '2021-02-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(42, '2021-02-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(43, '2021-02-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(44, '2021-02-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(45, '2021-02-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(46, '2021-02-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(47, '2021-02-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(48, '2021-02-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(49, '2021-02-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(50, '2021-02-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(51, '2021-02-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(52, '2021-02-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(53, '2021-02-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(54, '2021-02-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(55, '2021-02-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(56, '2021-02-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(57, '2021-02-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(58, '2021-02-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(59, '2021-02-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(60, '2021-02-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(61, '2021-03-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(62, '2021-03-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(63, '2021-03-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(64, '2021-03-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(65, '2021-03-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(66, '2021-03-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(67, '2021-03-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(68, '2021-03-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(69, '2021-03-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(70, '2021-03-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(71, '2021-03-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(72, '2021-03-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(73, '2021-03-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(74, '2021-03-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(75, '2021-03-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(76, '2021-03-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(77, '2021-03-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(78, '2021-03-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(79, '2021-03-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(80, '2021-03-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(81, '2021-03-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(82, '2021-03-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(83, '2021-03-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(84, '2021-03-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(85, '2021-03-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(86, '2021-03-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(87, '2021-03-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(88, '2021-03-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(89, '2021-03-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(90, '2021-03-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(91, '2021-03-31 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(92, '2021-04-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(93, '2021-04-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(94, '2021-04-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(95, '2021-04-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(96, '2021-04-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(97, '2021-04-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(98, '2021-04-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(99, '2021-04-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(100, '2021-04-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(101, '2021-04-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(102, '2021-04-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(103, '2021-04-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(104, '2021-04-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(105, '2021-04-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(106, '2021-04-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(107, '2021-04-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(108, '2021-04-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(109, '2021-04-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(110, '2021-04-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(111, '2021-04-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(112, '2021-04-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(113, '2021-04-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(114, '2021-04-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(115, '2021-04-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(116, '2021-04-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(117, '2021-04-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(118, '2021-04-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(119, '2021-04-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(120, '2021-04-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(121, '2021-04-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(122, '2021-05-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(123, '2021-05-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(124, '2021-05-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(125, '2021-05-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(126, '2021-05-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(127, '2021-05-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(128, '2021-05-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(129, '2021-05-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(130, '2021-05-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(131, '2021-05-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(132, '2021-05-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(133, '2021-05-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(134, '2021-05-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(135, '2021-05-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(136, '2021-05-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(137, '2021-05-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(138, '2021-05-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(139, '2021-05-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(140, '2021-05-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(141, '2021-05-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(142, '2021-05-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(143, '2021-05-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(144, '2021-05-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(145, '2021-05-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(146, '2021-05-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(147, '2021-05-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(148, '2021-05-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(149, '2021-05-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(150, '2021-05-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(151, '2021-05-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(152, '2021-05-31 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(153, '2021-06-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(154, '2021-06-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(155, '2021-06-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(156, '2021-06-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(157, '2021-06-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(158, '2021-06-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(159, '2021-06-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(160, '2021-06-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(161, '2021-06-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(162, '2021-06-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(163, '2021-06-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(164, '2021-06-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(165, '2021-06-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(166, '2021-06-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(167, '2021-06-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(168, '2021-06-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(169, '2021-06-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(170, '2021-06-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(171, '2021-06-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(172, '2021-06-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(173, '2021-06-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(174, '2021-06-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(175, '2021-06-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(176, '2021-06-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(177, '2021-06-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(178, '2021-06-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(179, '2021-06-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(180, '2021-06-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(181, '2021-06-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(182, '2021-06-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(183, '2021-07-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(184, '2021-07-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(185, '2021-07-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(186, '2021-07-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(187, '2021-07-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(188, '2021-07-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(189, '2021-07-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(190, '2021-07-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(191, '2021-07-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(192, '2021-07-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(193, '2021-07-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(194, '2021-07-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(195, '2021-07-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(196, '2021-07-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(197, '2021-07-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(198, '2021-07-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(199, '2021-07-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(200, '2021-07-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(201, '2021-07-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(202, '2021-07-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(203, '2021-07-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(204, '2021-07-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(205, '2021-07-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(206, '2021-07-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(207, '2021-07-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(208, '2021-07-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(209, '2021-07-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(210, '2021-07-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(211, '2021-07-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(212, '2021-07-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(213, '2021-07-31 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(214, '2021-08-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(215, '2021-08-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(216, '2021-08-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(217, '2021-08-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(218, '2021-08-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(219, '2021-08-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(220, '2021-08-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(221, '2021-08-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(222, '2021-08-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(223, '2021-08-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(224, '2021-08-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(225, '2021-08-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(226, '2021-08-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(227, '2021-08-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(228, '2021-08-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(229, '2021-08-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(230, '2021-08-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(231, '2021-08-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(232, '2021-08-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(233, '2021-08-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(234, '2021-08-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(235, '2021-08-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(236, '2021-08-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(237, '2021-08-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(238, '2021-08-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(239, '2021-08-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(240, '2021-08-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(241, '2021-08-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(242, '2021-08-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(243, '2021-08-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(244, '2021-08-31 17:00:00', 'Close', 'Not ok', 'Not ok', 'Ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(245, '2021-09-01 17:00:00', 'Close', 'Not ok', 'Ok', 'Not ok', 'Not ok', 'Ok', 'Not ok', 'Ok', 'Not ok', 1),
(246, '2021-09-02 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Ok', 1),
(247, '2021-09-03 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(248, '2021-09-04 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 1),
(249, '2021-09-05 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Ok', 'Ok', 1),
(250, '2021-09-06 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Not ok', 'Not ok', 'Not ok', 1),
(251, '2021-09-07 17:00:00', 'Close', 'Ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 1),
(252, '2021-09-08 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(253, '2021-09-09 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Ok', 'Not ok', 'Not ok', 'Ok', 1),
(254, '2021-09-10 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(255, '2021-09-11 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(256, '2021-09-12 17:00:00', 'Close', 'Ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Ok', 1),
(257, '2021-09-13 17:00:00', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 1),
(258, '2021-09-14 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 1),
(259, '2021-09-15 17:00:00', 'Ok', 'Ok', 'Not ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(260, '2021-09-16 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(261, '2021-09-17 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(262, '2021-09-18 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 1),
(263, '2021-09-19 17:00:00', 'Ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(264, '2021-09-20 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Close', 'Not ok', 'Not ok', 'Ok', 'Not ok', 1),
(265, '2021-09-21 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Not ok', 'Ok', 'Not ok', 'Not ok', 1),
(266, '2021-09-22 17:00:00', 'Not ok', 'Not ok', 'Ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(267, '2021-09-23 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Ok', 'Close', 'Not ok', 'Not ok', 'Ok', 'Ok', 1),
(268, '2021-09-24 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(269, '2021-09-25 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(270, '2021-09-26 17:00:00', 'Not ok', 'Not ok', 'Ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Ok', 1),
(271, '2021-09-27 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 1),
(272, '2021-09-28 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Ok', 'Not ok', 'Not ok', 'Not ok', 1),
(273, '2021-09-29 17:00:00', 'Not ok', 'Not ok', 'Not ok', 'Not ok', 'Close', 'Ok', 'Not ok', 'Not ok', 'Ok', 1),
(274, '2021-09-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(275, '2021-10-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(276, '2021-10-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(277, '2021-10-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(278, '2021-10-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(279, '2021-10-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(280, '2021-10-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(281, '2021-10-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(282, '2021-10-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(283, '2021-10-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(284, '2021-10-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(285, '2021-10-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(286, '2021-10-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(287, '2021-10-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(288, '2021-10-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(289, '2021-10-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(290, '2021-10-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(291, '2021-10-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(292, '2021-10-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(293, '2021-10-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(294, '2021-10-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(295, '2021-10-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(296, '2021-10-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(297, '2021-10-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(298, '2021-10-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(299, '2021-10-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(300, '2021-10-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(301, '2021-10-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(302, '2021-10-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(303, '2021-10-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(304, '2021-10-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(305, '2021-10-31 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(306, '2021-11-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(307, '2021-11-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(308, '2021-11-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(309, '2021-11-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(310, '2021-11-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(311, '2021-11-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(312, '2021-11-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(313, '2021-11-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(314, '2021-11-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(315, '2021-11-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(316, '2021-11-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(317, '2021-11-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(318, '2021-11-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(319, '2021-11-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(320, '2021-11-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(321, '2021-11-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(322, '2021-11-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(323, '2021-11-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(324, '2021-11-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(325, '2021-11-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(326, '2021-11-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(327, '2021-11-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(328, '2021-11-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(329, '2021-11-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(330, '2021-11-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(331, '2021-11-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(332, '2021-11-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(333, '2021-11-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(334, '2021-11-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(335, '2021-11-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(336, '2021-12-01 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(337, '2021-12-02 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(338, '2021-12-03 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(339, '2021-12-04 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(340, '2021-12-05 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(341, '2021-12-06 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(342, '2021-12-07 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(343, '2021-12-08 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(344, '2021-12-09 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(345, '2021-12-10 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(346, '2021-12-11 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(347, '2021-12-12 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(348, '2021-12-13 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(349, '2021-12-14 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(350, '2021-12-15 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(351, '2021-12-16 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(352, '2021-12-17 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(353, '2021-12-18 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(354, '2021-12-19 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(355, '2021-12-20 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(356, '2021-12-21 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(357, '2021-12-22 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(358, '2021-12-23 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(359, '2021-12-24 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(360, '2021-12-25 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(361, '2021-12-26 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(362, '2021-12-27 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(363, '2021-12-28 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(364, '2021-12-29 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1),
(365, '2021-12-30 17:00:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indeks untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`user_id`,`perm_id`);

--
-- Indeks untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user`
--
ALTER TABLE `aauth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indeks untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indeks untuk tabel `cc`
--
ALTER TABLE `cc`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cc_options`
--
ALTER TABLE `cc_options`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field`
--
ALTER TABLE `crud_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_type`
--
ALTER TABLE `crud_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ffainr`
--
ALTER TABLE `ffainr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_custom_option`
--
ALTER TABLE `form_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_field_validation`
--
ALTER TABLE `form_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ib`
--
ALTER TABLE `ib`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page_block_element`
--
ALTER TABLE `page_block_element`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `patrol_5m`
--
ALTER TABLE `patrol_5m`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ps`
--
ALTER TABLE `ps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest`
--
ALTER TABLE `rest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_field`
--
ALTER TABLE `rest_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_input_type`
--
ALTER TABLE `rest_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `so`
--
ALTER TABLE `so`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_user`
--
ALTER TABLE `aauth_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cc`
--
ALTER TABLE `cc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT untuk tabel `cc_options`
--
ALTER TABLE `cc_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT untuk tabel `crud_field`
--
ALTER TABLE `crud_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;

--
-- AUTO_INCREMENT untuk tabel `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT untuk tabel `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_input_type`
--
ALTER TABLE `crud_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `ffainr`
--
ALTER TABLE `ffainr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_custom_option`
--
ALTER TABLE `form_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_field_validation`
--
ALTER TABLE `form_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ib`
--
ALTER TABLE `ib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `page_block_element`
--
ALTER TABLE `page_block_element`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `patrol_5m`
--
ALTER TABLE `patrol_5m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ps`
--
ALTER TABLE `ps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_field`
--
ALTER TABLE `rest_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_input_type`
--
ALTER TABLE `rest_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `so`
--
ALTER TABLE `so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
