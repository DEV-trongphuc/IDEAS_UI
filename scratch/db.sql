-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 13, 2026 lúc 03:38 PM
-- Phiên bản máy phục vụ: 10.6.18-MariaDB-cll-lve-log
-- Phiên bản PHP: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vhvxoigh_ideas2026`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_commentmeta`
--

CREATE TABLE `wpwo_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_comments`
--

CREATE TABLE `wpwo_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_links`
--

CREATE TABLE `wpwo_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_options`
--

CREATE TABLE `wpwo_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_postmeta`
--

CREATE TABLE `wpwo_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_posts`
--

CREATE TABLE `wpwo_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_termmeta`
--

CREATE TABLE `wpwo_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_terms`
--

CREATE TABLE `wpwo_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_term_relationships`
--

CREATE TABLE `wpwo_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_term_taxonomy`
--

CREATE TABLE `wpwo_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_usermeta`
--

CREATE TABLE `wpwo_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_users`
--

CREATE TABLE `wpwo_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wpwo_wpfm_backup`
--

CREATE TABLE `wpwo_wpfm_backup` (
  `id` int(11) NOT NULL,
  `backup_name` text DEFAULT NULL,
  `backup_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnactionscheduler_actions`
--

CREATE TABLE `wp_ideasvnactionscheduler_actions` (
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `hook` varchar(191) NOT NULL,
  `status` varchar(20) NOT NULL,
  `scheduled_date_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `scheduled_date_local` datetime DEFAULT '0000-00-00 00:00:00',
  `args` varchar(191) DEFAULT NULL,
  `schedule` longtext DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `last_attempt_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `last_attempt_local` datetime DEFAULT '0000-00-00 00:00:00',
  `claim_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `extended_args` varchar(8000) DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnactionscheduler_claims`
--

CREATE TABLE `wp_ideasvnactionscheduler_claims` (
  `claim_id` bigint(20) UNSIGNED NOT NULL,
  `date_created_gmt` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnactionscheduler_groups`
--

CREATE TABLE `wp_ideasvnactionscheduler_groups` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnactionscheduler_logs`
--

CREATE TABLE `wp_ideasvnactionscheduler_logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `log_date_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `log_date_local` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvncommentmeta`
--

CREATE TABLE `wp_ideasvncommentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvncomments`
--

CREATE TABLE `wp_ideasvncomments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvne_events`
--

CREATE TABLE `wp_ideasvne_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_data` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnideas_visitor_stats`
--

CREATE TABLE `wp_ideasvnideas_visitor_stats` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `visit_date` date NOT NULL,
  `device_type` varchar(20) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnlinks`
--

CREATE TABLE `wp_ideasvnlinks` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnoptions`
--

CREATE TABLE `wp_ideasvnoptions` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnpostmeta`
--

CREATE TABLE `wp_ideasvnpostmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnposts`
--

CREATE TABLE `wp_ideasvnposts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_404_logs`
--

CREATE TABLE `wp_ideasvnrank_math_404_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uri` varchar(255) NOT NULL,
  `accessed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `times_accessed` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `referer` varchar(255) NOT NULL DEFAULT '',
  `user_agent` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_analytics_keyword_manager`
--

CREATE TABLE `wp_ideasvnrank_math_analytics_keyword_manager` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(1000) NOT NULL,
  `collection` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_analytics_objects`
--

CREATE TABLE `wp_ideasvnrank_math_analytics_objects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` text NOT NULL,
  `page` varchar(500) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `object_subtype` varchar(100) NOT NULL,
  `object_id` bigint(20) UNSIGNED NOT NULL,
  `primary_key` varchar(255) NOT NULL,
  `seo_score` tinyint(4) NOT NULL DEFAULT 0,
  `page_score` tinyint(4) NOT NULL DEFAULT 0,
  `is_indexable` tinyint(1) NOT NULL DEFAULT 1,
  `schemas_in_use` varchar(500) DEFAULT NULL,
  `desktop_interactive` double DEFAULT 0,
  `desktop_pagescore` double DEFAULT 0,
  `mobile_interactive` double DEFAULT 0,
  `mobile_pagescore` double DEFAULT 0,
  `pagespeed_refreshed` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_internal_links`
--

CREATE TABLE `wp_ideasvnrank_math_internal_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `target_post_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(8) NOT NULL,
  `anchor_text` varchar(500) DEFAULT NULL,
  `anchor_type` varchar(10) DEFAULT 'HPLNK',
  `is_nofollow` tinyint(1) DEFAULT 0,
  `target_blank` tinyint(1) DEFAULT 0,
  `url_hash` char(32) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_internal_meta`
--

CREATE TABLE `wp_ideasvnrank_math_internal_meta` (
  `object_id` bigint(20) UNSIGNED NOT NULL,
  `internal_link_count` int(10) UNSIGNED DEFAULT 0,
  `external_link_count` int(10) UNSIGNED DEFAULT 0,
  `incoming_link_count` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_link_genius_audit`
--

CREATE TABLE `wp_ideasvnrank_math_link_genius_audit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `url_hash` char(32) NOT NULL,
  `http_status_code` smallint(3) DEFAULT NULL,
  `status_category` varchar(10) DEFAULT NULL COMMENT '2xx, 3xx, 4xx, 5xx, timeout, error',
  `robots_blocked` tinyint(1) DEFAULT 0,
  `is_marked_safe` tinyint(1) DEFAULT 0 COMMENT 'User marked as not broken',
  `last_checked_at` datetime DEFAULT NULL,
  `last_error_message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_link_genius_history`
--

CREATE TABLE `wp_ideasvnrank_math_link_genius_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` char(32) NOT NULL,
  `source_type` varchar(20) NOT NULL DEFAULT 'bulk_update' COMMENT 'bulk_update|keyword_map',
  `keyword_map_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Reference to keyword map if source_type is keyword_map',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `operation_type` varchar(20) NOT NULL COMMENT 'anchor|url|both|add_link',
  `filters` longtext NOT NULL COMMENT 'JSON encoded search filters',
  `changes_summary` longtext NOT NULL COMMENT 'JSON: {from_anchor, to_anchor, from_url, to_url}',
  `affected_links_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `affected_posts_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'pending' COMMENT 'pending|processing|completed|failed|rolled_back',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `completed_at` datetime DEFAULT NULL,
  `error_message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_link_genius_maps`
--

CREATE TABLE `wp_ideasvnrank_math_link_genius_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'User-friendly name for the rule',
  `description` text DEFAULT NULL COMMENT 'Optional description',
  `target_url` varchar(2083) NOT NULL COMMENT 'Destination URL',
  `is_enabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Active/inactive toggle',
  `max_links_per_post` int(10) UNSIGNED NOT NULL DEFAULT 3 COMMENT 'Limit per post',
  `auto_link_on_publish` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Enable auto-linking',
  `case_sensitive` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Case-sensitive matching',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_executed_at` datetime DEFAULT NULL COMMENT 'Last manual execution',
  `execution_count` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Total executions'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_link_genius_map_variations`
--

CREATE TABLE `wp_ideasvnrank_math_link_genius_map_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword_map_id` bigint(20) UNSIGNED NOT NULL,
  `variation` varchar(255) NOT NULL COMMENT 'Keyword variation text',
  `source` varchar(20) NOT NULL DEFAULT 'manual' COMMENT 'ai or manual',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_link_genius_snapshots`
--

CREATE TABLE `wp_ideasvnrank_math_link_genius_snapshots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` char(32) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `original_content` longtext NOT NULL COMMENT 'Post content before update',
  `link_changes` longtext NOT NULL COMMENT 'JSON array of link changes',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_redirections`
--

CREATE TABLE `wp_ideasvnrank_math_redirections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sources` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `url_to` text NOT NULL,
  `header_code` smallint(4) UNSIGNED NOT NULL,
  `hits` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(25) NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_accessed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnrank_math_redirections_cache`
--

CREATE TABLE `wp_ideasvnrank_math_redirections_cache` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `redirection_id` bigint(20) UNSIGNED NOT NULL,
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `object_type` varchar(10) NOT NULL DEFAULT 'post',
  `is_redirected` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnredirection_404`
--

CREATE TABLE `wp_ideasvnredirection_404` (
  `id` int(11) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `url` mediumtext NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `referrer` varchar(255) DEFAULT NULL,
  `http_code` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `request_method` varchar(10) DEFAULT NULL,
  `request_data` mediumtext DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnredirection_groups`
--

CREATE TABLE `wp_ideasvnredirection_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `tracking` int(11) NOT NULL DEFAULT 1,
  `module_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `position` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnredirection_items`
--

CREATE TABLE `wp_ideasvnredirection_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` mediumtext NOT NULL,
  `match_url` varchar(2000) DEFAULT NULL,
  `match_data` text DEFAULT NULL,
  `regex` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `position` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `last_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `last_access` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `group_id` int(11) NOT NULL DEFAULT 0,
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `action_type` varchar(20) NOT NULL,
  `action_code` int(11) UNSIGNED NOT NULL,
  `action_data` mediumtext DEFAULT NULL,
  `match_type` varchar(20) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnredirection_logs`
--

CREATE TABLE `wp_ideasvnredirection_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `url` mediumtext NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `sent_to` mediumtext DEFAULT NULL,
  `agent` mediumtext DEFAULT NULL,
  `referrer` mediumtext DEFAULT NULL,
  `http_code` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `request_method` varchar(10) DEFAULT NULL,
  `request_data` mediumtext DEFAULT NULL,
  `redirect_by` varchar(50) DEFAULT NULL,
  `redirection_id` int(11) UNSIGNED DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnredirects`
--

CREATE TABLE `wp_ideasvnredirects` (
  `id` mediumint(9) NOT NULL,
  `url_from` varchar(256) NOT NULL DEFAULT '',
  `url_to` varchar(256) NOT NULL DEFAULT '',
  `status` varchar(12) NOT NULL DEFAULT '301',
  `type` varchar(12) NOT NULL DEFAULT 'url',
  `count` mediumint(9) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnsocial_users`
--

CREATE TABLE `wp_ideasvnsocial_users` (
  `social_users_id` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL,
  `login_date` datetime DEFAULT NULL,
  `link_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvntermmeta`
--

CREATE TABLE `wp_ideasvntermmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnterms`
--

CREATE TABLE `wp_ideasvnterms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnterm_relationships`
--

CREATE TABLE `wp_ideasvnterm_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnterm_taxonomy`
--

CREATE TABLE `wp_ideasvnterm_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvntm_taskmeta`
--

CREATE TABLE `wp_ideasvntm_taskmeta` (
  `meta_id` bigint(20) NOT NULL,
  `task_id` bigint(20) NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvntm_tasks`
--

CREATE TABLE `wp_ideasvntm_tasks` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `type` varchar(300) NOT NULL,
  `class_identifier` varchar(300) DEFAULT '0',
  `attempts` int(11) DEFAULT 0,
  `description` varchar(300) DEFAULT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_locked_at` bigint(20) DEFAULT 0,
  `status` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnusermeta`
--

CREATE TABLE `wp_ideasvnusermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnusers`
--

CREATE TABLE `wp_ideasvnusers` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_admin_notes`
--

CREATE TABLE `wp_ideasvnwc_admin_notes` (
  `note_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `locale` varchar(20) NOT NULL,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `content_data` longtext DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_reminder` datetime DEFAULT NULL,
  `is_snoozable` tinyint(1) NOT NULL DEFAULT 0,
  `layout` varchar(20) NOT NULL DEFAULT '',
  `image` varchar(200) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `icon` varchar(200) NOT NULL DEFAULT 'info'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_admin_note_actions`
--

CREATE TABLE `wp_ideasvnwc_admin_note_actions` (
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `note_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `query` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `actioned_text` varchar(255) NOT NULL,
  `nonce_action` varchar(255) DEFAULT NULL,
  `nonce_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_category_lookup`
--

CREATE TABLE `wp_ideasvnwc_category_lookup` (
  `category_tree_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_customer_lookup`
--

CREATE TABLE `wp_ideasvnwc_customer_lookup` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(60) NOT NULL DEFAULT '',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_last_active` timestamp NULL DEFAULT NULL,
  `date_registered` timestamp NULL DEFAULT NULL,
  `country` char(2) NOT NULL DEFAULT '',
  `postcode` varchar(20) NOT NULL DEFAULT '',
  `city` varchar(100) NOT NULL DEFAULT '',
  `state` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_download_log`
--

CREATE TABLE `wp_ideasvnwc_download_log` (
  `download_log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_ip_address` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_order_coupon_lookup`
--

CREATE TABLE `wp_ideasvnwc_order_coupon_lookup` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount_amount` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_order_product_lookup`
--

CREATE TABLE `wp_ideasvnwc_order_product_lookup` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `product_qty` int(11) NOT NULL,
  `product_net_revenue` double NOT NULL DEFAULT 0,
  `product_gross_revenue` double NOT NULL DEFAULT 0,
  `coupon_amount` double NOT NULL DEFAULT 0,
  `tax_amount` double NOT NULL DEFAULT 0,
  `shipping_amount` double NOT NULL DEFAULT 0,
  `shipping_tax_amount` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_order_stats`
--

CREATE TABLE `wp_ideasvnwc_order_stats` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `num_items_sold` int(11) NOT NULL DEFAULT 0,
  `total_sales` double NOT NULL DEFAULT 0,
  `tax_total` double NOT NULL DEFAULT 0,
  `shipping_total` double NOT NULL DEFAULT 0,
  `net_total` double NOT NULL DEFAULT 0,
  `returning_customer` tinyint(1) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_order_tax_lookup`
--

CREATE TABLE `wp_ideasvnwc_order_tax_lookup` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shipping_tax` double NOT NULL DEFAULT 0,
  `order_tax` double NOT NULL DEFAULT 0,
  `total_tax` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_product_meta_lookup`
--

CREATE TABLE `wp_ideasvnwc_product_meta_lookup` (
  `product_id` bigint(20) NOT NULL,
  `sku` varchar(100) DEFAULT '',
  `virtual` tinyint(1) DEFAULT 0,
  `downloadable` tinyint(1) DEFAULT 0,
  `min_price` decimal(19,4) DEFAULT NULL,
  `max_price` decimal(19,4) DEFAULT NULL,
  `onsale` tinyint(1) DEFAULT 0,
  `stock_quantity` double DEFAULT NULL,
  `stock_status` varchar(100) DEFAULT 'instock',
  `rating_count` bigint(20) DEFAULT 0,
  `average_rating` decimal(3,2) DEFAULT 0.00,
  `total_sales` bigint(20) DEFAULT 0,
  `tax_status` varchar(100) DEFAULT 'taxable',
  `tax_class` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_rate_limits`
--

CREATE TABLE `wp_ideasvnwc_rate_limits` (
  `rate_limit_id` bigint(20) UNSIGNED NOT NULL,
  `rate_limit_key` varchar(200) NOT NULL,
  `rate_limit_expiry` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_reserved_stock`
--

CREATE TABLE `wp_ideasvnwc_reserved_stock` (
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `stock_quantity` double NOT NULL DEFAULT 0,
  `timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expires` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_tax_rate_classes`
--

CREATE TABLE `wp_ideasvnwc_tax_rate_classes` (
  `tax_rate_class_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwc_webhooks`
--

CREATE TABLE `wp_ideasvnwc_webhooks` (
  `webhook_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(200) NOT NULL,
  `name` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_url` text NOT NULL,
  `secret` text NOT NULL,
  `topic` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `api_version` smallint(4) NOT NULL,
  `failure_count` smallint(10) NOT NULL DEFAULT 0,
  `pending_delivery` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfauditevents`
--

CREATE TABLE `wp_ideasvnwfauditevents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `event_time` double(14,4) NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `state` enum('new','sending','sent') NOT NULL DEFAULT 'new',
  `state_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfblockediplog`
--

CREATE TABLE `wp_ideasvnwfblockediplog` (
  `IP` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `countryCode` varchar(2) NOT NULL,
  `blockCount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `unixday` int(10) UNSIGNED NOT NULL,
  `blockType` varchar(50) NOT NULL DEFAULT 'generic'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfblocks7`
--

CREATE TABLE `wp_ideasvnwfblocks7` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `IP` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `blockedTime` bigint(20) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `lastAttempt` int(10) UNSIGNED DEFAULT 0,
  `blockedHits` int(10) UNSIGNED DEFAULT 0,
  `expiration` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `parameters` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfconfig`
--

CREATE TABLE `wp_ideasvnwfconfig` (
  `name` varchar(100) NOT NULL,
  `val` longblob DEFAULT NULL,
  `autoload` enum('no','yes') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfcrawlers`
--

CREATE TABLE `wp_ideasvnwfcrawlers` (
  `IP` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `patternSig` binary(16) NOT NULL,
  `status` char(8) NOT NULL,
  `lastUpdate` int(10) UNSIGNED NOT NULL,
  `PTR` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwffilechanges`
--

CREATE TABLE `wp_ideasvnwffilechanges` (
  `filenameHash` char(64) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `md5` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwffilemods`
--

CREATE TABLE `wp_ideasvnwffilemods` (
  `filenameMD5` binary(16) NOT NULL,
  `filename` varchar(1000) NOT NULL,
  `real_path` text NOT NULL,
  `knownFile` tinyint(3) UNSIGNED NOT NULL,
  `oldMD5` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `newMD5` binary(16) NOT NULL,
  `SHAC` binary(32) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `stoppedOnSignature` varchar(255) NOT NULL DEFAULT '',
  `stoppedOnPosition` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `isSafeFile` varchar(1) NOT NULL DEFAULT '?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfhits`
--

CREATE TABLE `wp_ideasvnwfhits` (
  `id` int(10) UNSIGNED NOT NULL,
  `attackLogTime` double(17,6) UNSIGNED NOT NULL,
  `ctime` double(17,6) UNSIGNED NOT NULL,
  `IP` binary(16) DEFAULT NULL,
  `jsRun` tinyint(4) DEFAULT 0,
  `statusCode` int(11) NOT NULL DEFAULT 200,
  `isGoogle` tinyint(4) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `newVisit` tinyint(3) UNSIGNED NOT NULL,
  `URL` text DEFAULT NULL,
  `referer` text DEFAULT NULL,
  `UA` text DEFAULT NULL,
  `action` varchar(64) NOT NULL DEFAULT '',
  `actionDescription` text DEFAULT NULL,
  `actionData` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfhoover`
--

CREATE TABLE `wp_ideasvnwfhoover` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner` text DEFAULT NULL,
  `host` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `hostKey` varbinary(124) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfissues`
--

CREATE TABLE `wp_ideasvnwfissues` (
  `id` int(10) UNSIGNED NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  `lastUpdated` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `severity` tinyint(3) UNSIGNED NOT NULL,
  `ignoreP` char(32) NOT NULL,
  `ignoreC` char(32) NOT NULL,
  `shortMsg` varchar(255) NOT NULL,
  `longMsg` text DEFAULT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfknownfilelist`
--

CREATE TABLE `wp_ideasvnwfknownfilelist` (
  `id` int(11) UNSIGNED NOT NULL,
  `path` text NOT NULL,
  `wordpress_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwflivetraffichuman`
--

CREATE TABLE `wp_ideasvnwflivetraffichuman` (
  `IP` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `identifier` binary(32) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `expiration` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwflocs`
--

CREATE TABLE `wp_ideasvnwflocs` (
  `IP` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `ctime` int(10) UNSIGNED NOT NULL,
  `failed` tinyint(3) UNSIGNED NOT NULL,
  `city` varchar(255) DEFAULT '',
  `region` varchar(255) DEFAULT '',
  `countryName` varchar(255) DEFAULT '',
  `countryCode` char(2) DEFAULT '',
  `lat` float(10,7) DEFAULT 0.0000000,
  `lon` float(10,7) DEFAULT 0.0000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwflogins`
--

CREATE TABLE `wp_ideasvnwflogins` (
  `id` int(10) UNSIGNED NOT NULL,
  `hitID` int(11) DEFAULT NULL,
  `ctime` double(17,6) UNSIGNED NOT NULL,
  `fail` tinyint(3) UNSIGNED NOT NULL,
  `action` varchar(40) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `IP` binary(16) DEFAULT NULL,
  `UA` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfls_2fa_secrets`
--

CREATE TABLE `wp_ideasvnwfls_2fa_secrets` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `secret` tinyblob NOT NULL,
  `recovery` blob NOT NULL,
  `ctime` int(10) UNSIGNED NOT NULL,
  `vtime` int(10) UNSIGNED NOT NULL,
  `mode` enum('authenticator') NOT NULL DEFAULT 'authenticator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfls_role_counts`
--

CREATE TABLE `wp_ideasvnwfls_role_counts` (
  `serialized_roles` varbinary(255) NOT NULL,
  `two_factor_inactive` tinyint(1) NOT NULL,
  `user_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfls_settings`
--

CREATE TABLE `wp_ideasvnwfls_settings` (
  `name` varchar(191) NOT NULL DEFAULT '',
  `value` longblob DEFAULT NULL,
  `autoload` enum('no','yes') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfnotifications`
--

CREATE TABLE `wp_ideasvnwfnotifications` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `new` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `category` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1000,
  `ctime` int(10) UNSIGNED NOT NULL,
  `html` text NOT NULL,
  `links` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfpendingissues`
--

CREATE TABLE `wp_ideasvnwfpendingissues` (
  `id` int(10) UNSIGNED NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  `lastUpdated` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `severity` tinyint(3) UNSIGNED NOT NULL,
  `ignoreP` char(32) NOT NULL,
  `ignoreC` char(32) NOT NULL,
  `shortMsg` varchar(255) NOT NULL,
  `longMsg` text DEFAULT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfreversecache`
--

CREATE TABLE `wp_ideasvnwfreversecache` (
  `IP` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `host` varchar(255) NOT NULL,
  `lastUpdate` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfsecurityevents`
--

CREATE TABLE `wp_ideasvnwfsecurityevents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `event_time` double(14,4) NOT NULL,
  `state` enum('new','sending','sent') NOT NULL DEFAULT 'new',
  `state_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfsnipcache`
--

CREATE TABLE `wp_ideasvnwfsnipcache` (
  `id` int(10) UNSIGNED NOT NULL,
  `IP` varchar(45) NOT NULL DEFAULT '',
  `expiration` timestamp NOT NULL DEFAULT current_timestamp(),
  `body` varchar(255) NOT NULL DEFAULT '',
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `type` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfstatus`
--

CREATE TABLE `wp_ideasvnwfstatus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ctime` double(17,6) UNSIGNED NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL,
  `type` char(5) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwftrafficrates`
--

CREATE TABLE `wp_ideasvnwftrafficrates` (
  `eMin` int(10) UNSIGNED NOT NULL,
  `IP` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `hitType` enum('hit','404') NOT NULL DEFAULT 'hit',
  `hits` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwfwaffailures`
--

CREATE TABLE `wp_ideasvnwfwaffailures` (
  `id` int(10) UNSIGNED NOT NULL,
  `throwable` text NOT NULL,
  `rule_id` int(10) UNSIGNED DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_api_keys`
--

CREATE TABLE `wp_ideasvnwoocommerce_api_keys` (
  `key_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `permissions` varchar(10) NOT NULL,
  `consumer_key` char(64) NOT NULL,
  `consumer_secret` char(43) NOT NULL,
  `nonces` longtext DEFAULT NULL,
  `truncated_key` char(7) NOT NULL,
  `last_access` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_attribute_taxonomies`
--

CREATE TABLE `wp_ideasvnwoocommerce_attribute_taxonomies` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(200) NOT NULL,
  `attribute_label` varchar(200) DEFAULT NULL,
  `attribute_type` varchar(20) NOT NULL,
  `attribute_orderby` varchar(20) NOT NULL,
  `attribute_public` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_downloadable_product_permissions`
--

CREATE TABLE `wp_ideasvnwoocommerce_downloadable_product_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `download_id` varchar(36) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `order_key` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `downloads_remaining` varchar(9) DEFAULT NULL,
  `access_granted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_expires` datetime DEFAULT NULL,
  `download_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_log`
--

CREATE TABLE `wp_ideasvnwoocommerce_log` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `level` smallint(4) NOT NULL,
  `source` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `context` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_order_itemmeta`
--

CREATE TABLE `wp_ideasvnwoocommerce_order_itemmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_order_items`
--

CREATE TABLE `wp_ideasvnwoocommerce_order_items` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_name` text NOT NULL,
  `order_item_type` varchar(200) NOT NULL DEFAULT '',
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_payment_tokenmeta`
--

CREATE TABLE `wp_ideasvnwoocommerce_payment_tokenmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `payment_token_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_payment_tokens`
--

CREATE TABLE `wp_ideasvnwoocommerce_payment_tokens` (
  `token_id` bigint(20) UNSIGNED NOT NULL,
  `gateway_id` varchar(200) NOT NULL,
  `token` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `type` varchar(200) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_sessions`
--

CREATE TABLE `wp_ideasvnwoocommerce_sessions` (
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `session_key` char(32) NOT NULL,
  `session_value` longtext NOT NULL,
  `session_expiry` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_shipping_zones`
--

CREATE TABLE `wp_ideasvnwoocommerce_shipping_zones` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `zone_name` varchar(200) NOT NULL,
  `zone_order` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_shipping_zone_locations`
--

CREATE TABLE `wp_ideasvnwoocommerce_shipping_zone_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) NOT NULL,
  `location_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_shipping_zone_methods`
--

CREATE TABLE `wp_ideasvnwoocommerce_shipping_zone_methods` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `instance_id` bigint(20) UNSIGNED NOT NULL,
  `method_id` varchar(200) NOT NULL,
  `method_order` bigint(20) UNSIGNED NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_tax_rates`
--

CREATE TABLE `wp_ideasvnwoocommerce_tax_rates` (
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_country` varchar(2) NOT NULL DEFAULT '',
  `tax_rate_state` varchar(200) NOT NULL DEFAULT '',
  `tax_rate` varchar(8) NOT NULL DEFAULT '',
  `tax_rate_name` varchar(200) NOT NULL DEFAULT '',
  `tax_rate_priority` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_compound` int(1) NOT NULL DEFAULT 0,
  `tax_rate_shipping` int(1) NOT NULL DEFAULT 1,
  `tax_rate_order` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_class` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwoocommerce_tax_rate_locations`
--

CREATE TABLE `wp_ideasvnwoocommerce_tax_rate_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) NOT NULL,
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `location_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwpfm_backup`
--

CREATE TABLE `wp_ideasvnwpfm_backup` (
  `id` int(11) NOT NULL,
  `backup_name` text DEFAULT NULL,
  `backup_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwpmailsmtp_debug_events`
--

CREATE TABLE `wp_ideasvnwpmailsmtp_debug_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `initiator` text DEFAULT NULL,
  `event_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwpmailsmtp_tasks_meta`
--

CREATE TABLE `wp_ideasvnwpmailsmtp_tasks_meta` (
  `id` bigint(20) NOT NULL,
  `action` varchar(255) NOT NULL,
  `data` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwpo_404_detector`
--

CREATE TABLE `wp_ideasvnwpo_404_detector` (
  `ID` int(11) UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `request_timestamp` bigint(20) UNSIGNED NOT NULL,
  `request_count` bigint(20) UNSIGNED NOT NULL,
  `referrer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnwpsmtp_logs`
--

CREATE TABLE `wp_ideasvnwpsmtp_logs` (
  `mail_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `to` varchar(200) NOT NULL DEFAULT '0',
  `subject` varchar(200) NOT NULL DEFAULT '0',
  `message` text DEFAULT NULL,
  `headers` text DEFAULT NULL,
  `error` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnyoast_indexable`
--

CREATE TABLE `wp_ideasvnyoast_indexable` (
  `id` int(11) UNSIGNED NOT NULL,
  `permalink` longtext DEFAULT NULL,
  `permalink_hash` varchar(40) DEFAULT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `object_type` varchar(32) NOT NULL,
  `object_sub_type` varchar(32) DEFAULT NULL,
  `author_id` bigint(20) DEFAULT NULL,
  `post_parent` bigint(20) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `breadcrumb_title` text DEFAULT NULL,
  `post_status` varchar(20) DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  `is_protected` tinyint(1) DEFAULT 0,
  `has_public_posts` tinyint(1) DEFAULT NULL,
  `number_of_pages` int(11) UNSIGNED DEFAULT NULL,
  `canonical` longtext DEFAULT NULL,
  `primary_focus_keyword` varchar(191) DEFAULT NULL,
  `primary_focus_keyword_score` int(3) DEFAULT NULL,
  `readability_score` int(3) DEFAULT NULL,
  `is_cornerstone` tinyint(1) DEFAULT 0,
  `is_robots_noindex` tinyint(1) DEFAULT 0,
  `is_robots_nofollow` tinyint(1) DEFAULT 0,
  `is_robots_noarchive` tinyint(1) DEFAULT 0,
  `is_robots_noimageindex` tinyint(1) DEFAULT 0,
  `is_robots_nosnippet` tinyint(1) DEFAULT 0,
  `twitter_title` text DEFAULT NULL,
  `twitter_image` longtext DEFAULT NULL,
  `twitter_description` longtext DEFAULT NULL,
  `twitter_image_id` varchar(191) DEFAULT NULL,
  `twitter_image_source` text DEFAULT NULL,
  `open_graph_title` text DEFAULT NULL,
  `open_graph_description` longtext DEFAULT NULL,
  `open_graph_image` longtext DEFAULT NULL,
  `open_graph_image_id` varchar(191) DEFAULT NULL,
  `open_graph_image_source` text DEFAULT NULL,
  `open_graph_image_meta` mediumtext DEFAULT NULL,
  `link_count` int(11) DEFAULT NULL,
  `incoming_link_count` int(11) DEFAULT NULL,
  `prominent_words_version` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_id` bigint(20) NOT NULL DEFAULT 1,
  `language` varchar(32) DEFAULT NULL,
  `region` varchar(32) DEFAULT NULL,
  `schema_page_type` varchar(64) DEFAULT NULL,
  `schema_article_type` varchar(64) DEFAULT NULL,
  `has_ancestors` tinyint(1) DEFAULT 0,
  `estimated_reading_time_minutes` int(11) DEFAULT NULL,
  `version` int(11) DEFAULT 1,
  `object_last_modified` datetime DEFAULT NULL,
  `object_published_at` datetime DEFAULT NULL,
  `inclusive_language_score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnyoast_indexable_hierarchy`
--

CREATE TABLE `wp_ideasvnyoast_indexable_hierarchy` (
  `indexable_id` int(11) UNSIGNED NOT NULL,
  `ancestor_id` int(11) UNSIGNED NOT NULL,
  `depth` int(11) UNSIGNED DEFAULT NULL,
  `blog_id` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnyoast_migrations`
--

CREATE TABLE `wp_ideasvnyoast_migrations` (
  `id` int(11) UNSIGNED NOT NULL,
  `version` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnyoast_primary_term`
--

CREATE TABLE `wp_ideasvnyoast_primary_term` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `term_id` bigint(20) DEFAULT NULL,
  `taxonomy` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_id` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnyoast_prominent_words`
--

CREATE TABLE `wp_ideasvnyoast_prominent_words` (
  `id` int(11) UNSIGNED NOT NULL,
  `stem` varchar(191) DEFAULT NULL,
  `indexable_id` int(11) UNSIGNED DEFAULT NULL,
  `weight` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ideasvnyoast_seo_links`
--

CREATE TABLE `wp_ideasvnyoast_seo_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `target_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  `indexable_id` int(11) UNSIGNED DEFAULT NULL,
  `target_indexable_id` int(11) UNSIGNED DEFAULT NULL,
  `height` int(11) UNSIGNED DEFAULT NULL,
  `width` int(11) UNSIGNED DEFAULT NULL,
  `size` int(11) UNSIGNED DEFAULT NULL,
  `language` varchar(32) DEFAULT NULL,
  `region` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `wpwo_commentmeta`
--
ALTER TABLE `wpwo_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wpwo_comments`
--
ALTER TABLE `wpwo_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Chỉ mục cho bảng `wpwo_links`
--
ALTER TABLE `wpwo_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Chỉ mục cho bảng `wpwo_options`
--
ALTER TABLE `wpwo_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Chỉ mục cho bảng `wpwo_postmeta`
--
ALTER TABLE `wpwo_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wpwo_posts`
--
ALTER TABLE `wpwo_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `type_status_author` (`post_type`,`post_status`,`post_author`);

--
-- Chỉ mục cho bảng `wpwo_termmeta`
--
ALTER TABLE `wpwo_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wpwo_terms`
--
ALTER TABLE `wpwo_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Chỉ mục cho bảng `wpwo_term_relationships`
--
ALTER TABLE `wpwo_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Chỉ mục cho bảng `wpwo_term_taxonomy`
--
ALTER TABLE `wpwo_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Chỉ mục cho bảng `wpwo_usermeta`
--
ALTER TABLE `wpwo_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wpwo_users`
--
ALTER TABLE `wpwo_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Chỉ mục cho bảng `wpwo_wpfm_backup`
--
ALTER TABLE `wpwo_wpfm_backup`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnactionscheduler_actions`
--
ALTER TABLE `wp_ideasvnactionscheduler_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `hook` (`hook`),
  ADD KEY `status` (`status`),
  ADD KEY `scheduled_date_gmt` (`scheduled_date_gmt`),
  ADD KEY `args` (`args`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `last_attempt_gmt` (`last_attempt_gmt`),
  ADD KEY `claim_id_status_scheduled_date_gmt` (`claim_id`,`status`,`scheduled_date_gmt`),
  ADD KEY `hook_status_scheduled_date_gmt` (`hook`(163),`status`,`scheduled_date_gmt`),
  ADD KEY `status_scheduled_date_gmt` (`status`,`scheduled_date_gmt`),
  ADD KEY `claim_id_status_priority_scheduled_date_gmt` (`claim_id`,`status`,`priority`,`scheduled_date_gmt`),
  ADD KEY `status_last_attempt_gmt` (`status`,`last_attempt_gmt`),
  ADD KEY `status_claim_id` (`status`,`claim_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnactionscheduler_claims`
--
ALTER TABLE `wp_ideasvnactionscheduler_claims`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `date_created_gmt` (`date_created_gmt`);

--
-- Chỉ mục cho bảng `wp_ideasvnactionscheduler_groups`
--
ALTER TABLE `wp_ideasvnactionscheduler_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `slug` (`slug`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnactionscheduler_logs`
--
ALTER TABLE `wp_ideasvnactionscheduler_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `log_date_gmt` (`log_date_gmt`);

--
-- Chỉ mục cho bảng `wp_ideasvncommentmeta`
--
ALTER TABLE `wp_ideasvncommentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_ideasvncomments`
--
ALTER TABLE `wp_ideasvncomments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10)),
  ADD KEY `woo_idx_comment_type` (`comment_type`);

--
-- Chỉ mục cho bảng `wp_ideasvne_events`
--
ALTER TABLE `wp_ideasvne_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_at_index` (`created_at`);

--
-- Chỉ mục cho bảng `wp_ideasvnideas_visitor_stats`
--
ALTER TABLE `wp_ideasvnideas_visitor_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visit_date` (`visit_date`),
  ADD KEY `device_type` (`device_type`),
  ADD KEY `country_code` (`country_code`);

--
-- Chỉ mục cho bảng `wp_ideasvnlinks`
--
ALTER TABLE `wp_ideasvnlinks`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Chỉ mục cho bảng `wp_ideasvnoptions`
--
ALTER TABLE `wp_ideasvnoptions`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Chỉ mục cho bảng `wp_ideasvnpostmeta`
--
ALTER TABLE `wp_ideasvnpostmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnposts`
--
ALTER TABLE `wp_ideasvnposts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `type_status_author` (`post_type`,`post_status`,`post_author`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_404_logs`
--
ALTER TABLE `wp_ideasvnrank_math_404_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uri` (`uri`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_analytics_keyword_manager`
--
ALTER TABLE `wp_ideasvnrank_math_analytics_keyword_manager`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_analytics_objects`
--
ALTER TABLE `wp_ideasvnrank_math_analytics_objects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analytics_object_page` (`page`(190));

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_internal_links`
--
ALTER TABLE `wp_ideasvnrank_math_internal_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_direction` (`post_id`,`type`),
  ADD KEY `target_post_id` (`target_post_id`),
  ADD KEY `idx_url_hash` (`url_hash`),
  ADD KEY `idx_post_id` (`post_id`),
  ADD KEY `idx_target_post_id` (`target_post_id`),
  ADD KEY `idx_type` (`type`),
  ADD KEY `idx_anchor_type` (`anchor_type`),
  ADD KEY `idx_target_blank` (`target_blank`),
  ADD KEY `idx_is_nofollow` (`is_nofollow`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_post_type` (`post_id`,`type`),
  ADD KEY `idx_type_nofollow` (`type`,`is_nofollow`),
  ADD KEY `idx_post_type_created` (`post_id`,`type`,`created_at`);
ALTER TABLE `wp_ideasvnrank_math_internal_links` ADD FULLTEXT KEY `idx_search` (`anchor_text`,`url`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_internal_meta`
--
ALTER TABLE `wp_ideasvnrank_math_internal_meta`
  ADD PRIMARY KEY (`object_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_link_genius_audit`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_audit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_link_id` (`link_id`),
  ADD KEY `idx_url_hash` (`url_hash`),
  ADD KEY `idx_status_code` (`http_status_code`),
  ADD KEY `idx_status_category` (`status_category`),
  ADD KEY `idx_last_checked` (`last_checked_at`),
  ADD KEY `idx_robots_blocked` (`robots_blocked`),
  ADD KEY `idx_marked_safe` (`is_marked_safe`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_link_genius_history`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_batch_id` (`batch_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_source_type` (`source_type`),
  ADD KEY `idx_keyword_map_id` (`keyword_map_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_link_genius_maps`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_maps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`(191)),
  ADD KEY `idx_is_enabled` (`is_enabled`),
  ADD KEY `idx_auto_link_on_publish` (`auto_link_on_publish`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_link_genius_map_variations`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_map_variations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_unique_variation_per_map` (`keyword_map_id`,`variation`(191)),
  ADD KEY `idx_keyword_map_id` (`keyword_map_id`),
  ADD KEY `idx_variation` (`variation`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_link_genius_snapshots`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_snapshots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_batch_id` (`batch_id`),
  ADD KEY `idx_post_id` (`post_id`),
  ADD KEY `idx_batch_post` (`batch_id`,`post_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_redirections`
--
ALTER TABLE `wp_ideasvnrank_math_redirections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `idx_rm_status_updated` (`status`,`updated`);

--
-- Chỉ mục cho bảng `wp_ideasvnrank_math_redirections_cache`
--
ALTER TABLE `wp_ideasvnrank_math_redirections_cache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redirection_id` (`redirection_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnredirection_404`
--
ALTER TABLE `wp_ideasvnredirection_404`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created` (`created`),
  ADD KEY `referrer` (`referrer`(191)),
  ADD KEY `ip` (`ip`);

--
-- Chỉ mục cho bảng `wp_ideasvnredirection_groups`
--
ALTER TABLE `wp_ideasvnredirection_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `status` (`status`);

--
-- Chỉ mục cho bảng `wp_ideasvnredirection_items`
--
ALTER TABLE `wp_ideasvnredirection_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`(191)),
  ADD KEY `status` (`status`),
  ADD KEY `regex` (`regex`),
  ADD KEY `group_idpos` (`group_id`,`position`),
  ADD KEY `group` (`group_id`),
  ADD KEY `match_url` (`match_url`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnredirection_logs`
--
ALTER TABLE `wp_ideasvnredirection_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created` (`created`),
  ADD KEY `redirection_id` (`redirection_id`),
  ADD KEY `ip` (`ip`);

--
-- Chỉ mục cho bảng `wp_ideasvnredirects`
--
ALTER TABLE `wp_ideasvnredirects`
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnsocial_users`
--
ALTER TABLE `wp_ideasvnsocial_users`
  ADD PRIMARY KEY (`social_users_id`),
  ADD KEY `ID` (`ID`,`type`),
  ADD KEY `identifier` (`identifier`);

--
-- Chỉ mục cho bảng `wp_ideasvntermmeta`
--
ALTER TABLE `wp_ideasvntermmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnterms`
--
ALTER TABLE `wp_ideasvnterms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnterm_relationships`
--
ALTER TABLE `wp_ideasvnterm_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnterm_taxonomy`
--
ALTER TABLE `wp_ideasvnterm_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Chỉ mục cho bảng `wp_ideasvntm_taskmeta`
--
ALTER TABLE `wp_ideasvntm_taskmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `meta_key` (`meta_key`(191)),
  ADD KEY `task_id` (`task_id`);

--
-- Chỉ mục cho bảng `wp_ideasvntm_tasks`
--
ALTER TABLE `wp_ideasvntm_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnusermeta`
--
ALTER TABLE `wp_ideasvnusermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnusers`
--
ALTER TABLE `wp_ideasvnusers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_admin_notes`
--
ALTER TABLE `wp_ideasvnwc_admin_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_admin_note_actions`
--
ALTER TABLE `wp_ideasvnwc_admin_note_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `note_id` (`note_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_category_lookup`
--
ALTER TABLE `wp_ideasvnwc_category_lookup`
  ADD PRIMARY KEY (`category_tree_id`,`category_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_customer_lookup`
--
ALTER TABLE `wp_ideasvnwc_customer_lookup`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `email` (`email`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_download_log`
--
ALTER TABLE `wp_ideasvnwc_download_log`
  ADD PRIMARY KEY (`download_log_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_order_coupon_lookup`
--
ALTER TABLE `wp_ideasvnwc_order_coupon_lookup`
  ADD PRIMARY KEY (`order_id`,`coupon_id`),
  ADD KEY `coupon_id` (`coupon_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_order_product_lookup`
--
ALTER TABLE `wp_ideasvnwc_order_product_lookup`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_order_stats`
--
ALTER TABLE `wp_ideasvnwc_order_stats`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `date_created` (`date_created`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `status` (`status`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnwc_order_tax_lookup`
--
ALTER TABLE `wp_ideasvnwc_order_tax_lookup`
  ADD PRIMARY KEY (`order_id`,`tax_rate_id`),
  ADD KEY `tax_rate_id` (`tax_rate_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_product_meta_lookup`
--
ALTER TABLE `wp_ideasvnwc_product_meta_lookup`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `virtual` (`virtual`),
  ADD KEY `downloadable` (`downloadable`),
  ADD KEY `stock_status` (`stock_status`),
  ADD KEY `stock_quantity` (`stock_quantity`),
  ADD KEY `onsale` (`onsale`),
  ADD KEY `min_max_price` (`min_price`,`max_price`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_rate_limits`
--
ALTER TABLE `wp_ideasvnwc_rate_limits`
  ADD PRIMARY KEY (`rate_limit_id`),
  ADD UNIQUE KEY `rate_limit_key` (`rate_limit_key`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnwc_reserved_stock`
--
ALTER TABLE `wp_ideasvnwc_reserved_stock`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwc_tax_rate_classes`
--
ALTER TABLE `wp_ideasvnwc_tax_rate_classes`
  ADD PRIMARY KEY (`tax_rate_class_id`),
  ADD UNIQUE KEY `slug` (`slug`(191));

--
-- Chỉ mục cho bảng `wp_ideasvnwc_webhooks`
--
ALTER TABLE `wp_ideasvnwc_webhooks`
  ADD PRIMARY KEY (`webhook_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfauditevents`
--
ALTER TABLE `wp_ideasvnwfauditevents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfblockediplog`
--
ALTER TABLE `wp_ideasvnwfblockediplog`
  ADD PRIMARY KEY (`IP`,`unixday`,`blockType`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfblocks7`
--
ALTER TABLE `wp_ideasvnwfblocks7`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `IP` (`IP`),
  ADD KEY `expiration` (`expiration`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfconfig`
--
ALTER TABLE `wp_ideasvnwfconfig`
  ADD PRIMARY KEY (`name`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfcrawlers`
--
ALTER TABLE `wp_ideasvnwfcrawlers`
  ADD PRIMARY KEY (`IP`,`patternSig`);

--
-- Chỉ mục cho bảng `wp_ideasvnwffilechanges`
--
ALTER TABLE `wp_ideasvnwffilechanges`
  ADD PRIMARY KEY (`filenameHash`);

--
-- Chỉ mục cho bảng `wp_ideasvnwffilemods`
--
ALTER TABLE `wp_ideasvnwffilemods`
  ADD PRIMARY KEY (`filenameMD5`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfhits`
--
ALTER TABLE `wp_ideasvnwfhits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `k1` (`ctime`),
  ADD KEY `k2` (`IP`,`ctime`),
  ADD KEY `attackLogTime` (`attackLogTime`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfhoover`
--
ALTER TABLE `wp_ideasvnwfhoover`
  ADD PRIMARY KEY (`id`),
  ADD KEY `k2` (`hostKey`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfissues`
--
ALTER TABLE `wp_ideasvnwfissues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lastUpdated` (`lastUpdated`),
  ADD KEY `status` (`status`),
  ADD KEY `ignoreP` (`ignoreP`),
  ADD KEY `ignoreC` (`ignoreC`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfknownfilelist`
--
ALTER TABLE `wp_ideasvnwfknownfilelist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwflivetraffichuman`
--
ALTER TABLE `wp_ideasvnwflivetraffichuman`
  ADD PRIMARY KEY (`IP`,`identifier`),
  ADD KEY `expiration` (`expiration`);

--
-- Chỉ mục cho bảng `wp_ideasvnwflocs`
--
ALTER TABLE `wp_ideasvnwflocs`
  ADD PRIMARY KEY (`IP`);

--
-- Chỉ mục cho bảng `wp_ideasvnwflogins`
--
ALTER TABLE `wp_ideasvnwflogins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `k1` (`IP`,`fail`),
  ADD KEY `hitID` (`hitID`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfls_2fa_secrets`
--
ALTER TABLE `wp_ideasvnwfls_2fa_secrets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfls_role_counts`
--
ALTER TABLE `wp_ideasvnwfls_role_counts`
  ADD PRIMARY KEY (`serialized_roles`,`two_factor_inactive`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfls_settings`
--
ALTER TABLE `wp_ideasvnwfls_settings`
  ADD PRIMARY KEY (`name`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfnotifications`
--
ALTER TABLE `wp_ideasvnwfnotifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfpendingissues`
--
ALTER TABLE `wp_ideasvnwfpendingissues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lastUpdated` (`lastUpdated`),
  ADD KEY `status` (`status`),
  ADD KEY `ignoreP` (`ignoreP`),
  ADD KEY `ignoreC` (`ignoreC`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfreversecache`
--
ALTER TABLE `wp_ideasvnwfreversecache`
  ADD PRIMARY KEY (`IP`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfsecurityevents`
--
ALTER TABLE `wp_ideasvnwfsecurityevents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfsnipcache`
--
ALTER TABLE `wp_ideasvnwfsnipcache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expiration` (`expiration`),
  ADD KEY `IP` (`IP`),
  ADD KEY `type` (`type`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfstatus`
--
ALTER TABLE `wp_ideasvnwfstatus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `k1` (`ctime`),
  ADD KEY `k2` (`type`);

--
-- Chỉ mục cho bảng `wp_ideasvnwftrafficrates`
--
ALTER TABLE `wp_ideasvnwftrafficrates`
  ADD PRIMARY KEY (`eMin`,`IP`,`hitType`);

--
-- Chỉ mục cho bảng `wp_ideasvnwfwaffailures`
--
ALTER TABLE `wp_ideasvnwfwaffailures`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_api_keys`
--
ALTER TABLE `wp_ideasvnwoocommerce_api_keys`
  ADD PRIMARY KEY (`key_id`),
  ADD KEY `consumer_key` (`consumer_key`),
  ADD KEY `consumer_secret` (`consumer_secret`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_ideasvnwoocommerce_attribute_taxonomies`
  ADD PRIMARY KEY (`attribute_id`),
  ADD KEY `attribute_name` (`attribute_name`(20));

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_ideasvnwoocommerce_downloadable_product_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `download_order_key_product` (`product_id`,`order_id`,`order_key`(16),`download_id`),
  ADD KEY `download_order_product` (`download_id`,`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_order_remaining_expires` (`user_id`,`order_id`,`downloads_remaining`,`access_expires`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_log`
--
ALTER TABLE `wp_ideasvnwoocommerce_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `level` (`level`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_order_itemmeta`
--
ALTER TABLE `wp_ideasvnwoocommerce_order_itemmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_order_items`
--
ALTER TABLE `wp_ideasvnwoocommerce_order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_payment_tokenmeta`
--
ALTER TABLE `wp_ideasvnwoocommerce_payment_tokenmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `payment_token_id` (`payment_token_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_payment_tokens`
--
ALTER TABLE `wp_ideasvnwoocommerce_payment_tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_sessions`
--
ALTER TABLE `wp_ideasvnwoocommerce_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `session_key` (`session_key`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_shipping_zones`
--
ALTER TABLE `wp_ideasvnwoocommerce_shipping_zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_shipping_zone_locations`
--
ALTER TABLE `wp_ideasvnwoocommerce_shipping_zone_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_shipping_zone_methods`
--
ALTER TABLE `wp_ideasvnwoocommerce_shipping_zone_methods`
  ADD PRIMARY KEY (`instance_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_tax_rates`
--
ALTER TABLE `wp_ideasvnwoocommerce_tax_rates`
  ADD PRIMARY KEY (`tax_rate_id`),
  ADD KEY `tax_rate_country` (`tax_rate_country`),
  ADD KEY `tax_rate_state` (`tax_rate_state`(2)),
  ADD KEY `tax_rate_class` (`tax_rate_class`(10)),
  ADD KEY `tax_rate_priority` (`tax_rate_priority`);

--
-- Chỉ mục cho bảng `wp_ideasvnwoocommerce_tax_rate_locations`
--
ALTER TABLE `wp_ideasvnwoocommerce_tax_rate_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `tax_rate_id` (`tax_rate_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- Chỉ mục cho bảng `wp_ideasvnwpfm_backup`
--
ALTER TABLE `wp_ideasvnwpfm_backup`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwpmailsmtp_debug_events`
--
ALTER TABLE `wp_ideasvnwpmailsmtp_debug_events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwpmailsmtp_tasks_meta`
--
ALTER TABLE `wp_ideasvnwpmailsmtp_tasks_meta`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_ideasvnwpo_404_detector`
--
ALTER TABLE `wp_ideasvnwpo_404_detector`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `url` (`url`(75),`request_timestamp`,`referrer`(75)),
  ADD KEY `url_timestamp_referrer` (`url`(75),`request_timestamp`,`referrer`(75)),
  ADD KEY `timestamp_count` (`request_timestamp`,`request_count`);

--
-- Chỉ mục cho bảng `wp_ideasvnwpsmtp_logs`
--
ALTER TABLE `wp_ideasvnwpsmtp_logs`
  ADD PRIMARY KEY (`mail_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnyoast_indexable`
--
ALTER TABLE `wp_ideasvnyoast_indexable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_type_and_sub_type` (`object_type`,`object_sub_type`),
  ADD KEY `object_id_and_type` (`object_id`,`object_type`),
  ADD KEY `permalink_hash_and_object_type` (`permalink_hash`,`object_type`),
  ADD KEY `subpages` (`post_parent`,`object_type`,`post_status`,`object_id`),
  ADD KEY `prominent_words` (`prominent_words_version`,`object_type`,`object_sub_type`,`post_status`),
  ADD KEY `published_sitemap_index` (`object_published_at`,`is_robots_noindex`,`object_type`,`object_sub_type`);

--
-- Chỉ mục cho bảng `wp_ideasvnyoast_indexable_hierarchy`
--
ALTER TABLE `wp_ideasvnyoast_indexable_hierarchy`
  ADD PRIMARY KEY (`indexable_id`,`ancestor_id`),
  ADD KEY `indexable_id` (`indexable_id`),
  ADD KEY `ancestor_id` (`ancestor_id`),
  ADD KEY `depth` (`depth`);

--
-- Chỉ mục cho bảng `wp_ideasvnyoast_migrations`
--
ALTER TABLE `wp_ideasvnyoast_migrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wp_ideasvnyoast_migrations_version` (`version`);

--
-- Chỉ mục cho bảng `wp_ideasvnyoast_primary_term`
--
ALTER TABLE `wp_ideasvnyoast_primary_term`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_taxonomy` (`post_id`,`taxonomy`),
  ADD KEY `post_term` (`post_id`,`term_id`);

--
-- Chỉ mục cho bảng `wp_ideasvnyoast_prominent_words`
--
ALTER TABLE `wp_ideasvnyoast_prominent_words`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stem` (`stem`),
  ADD KEY `indexable_id` (`indexable_id`),
  ADD KEY `indexable_id_and_stem` (`indexable_id`,`stem`);

--
-- Chỉ mục cho bảng `wp_ideasvnyoast_seo_links`
--
ALTER TABLE `wp_ideasvnyoast_seo_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_direction` (`post_id`,`type`),
  ADD KEY `indexable_link_direction` (`indexable_id`,`type`),
  ADD KEY `url_index` (`url`),
  ADD KEY `target_indexable_id_index` (`target_indexable_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `wpwo_commentmeta`
--
ALTER TABLE `wpwo_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_comments`
--
ALTER TABLE `wpwo_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_links`
--
ALTER TABLE `wpwo_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_options`
--
ALTER TABLE `wpwo_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_postmeta`
--
ALTER TABLE `wpwo_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_posts`
--
ALTER TABLE `wpwo_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_termmeta`
--
ALTER TABLE `wpwo_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_terms`
--
ALTER TABLE `wpwo_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_term_taxonomy`
--
ALTER TABLE `wpwo_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_usermeta`
--
ALTER TABLE `wpwo_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_users`
--
ALTER TABLE `wpwo_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wpwo_wpfm_backup`
--
ALTER TABLE `wpwo_wpfm_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnactionscheduler_actions`
--
ALTER TABLE `wp_ideasvnactionscheduler_actions`
  MODIFY `action_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnactionscheduler_claims`
--
ALTER TABLE `wp_ideasvnactionscheduler_claims`
  MODIFY `claim_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnactionscheduler_groups`
--
ALTER TABLE `wp_ideasvnactionscheduler_groups`
  MODIFY `group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnactionscheduler_logs`
--
ALTER TABLE `wp_ideasvnactionscheduler_logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvncommentmeta`
--
ALTER TABLE `wp_ideasvncommentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvncomments`
--
ALTER TABLE `wp_ideasvncomments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvne_events`
--
ALTER TABLE `wp_ideasvne_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnideas_visitor_stats`
--
ALTER TABLE `wp_ideasvnideas_visitor_stats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnlinks`
--
ALTER TABLE `wp_ideasvnlinks`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnoptions`
--
ALTER TABLE `wp_ideasvnoptions`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnpostmeta`
--
ALTER TABLE `wp_ideasvnpostmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnposts`
--
ALTER TABLE `wp_ideasvnposts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_404_logs`
--
ALTER TABLE `wp_ideasvnrank_math_404_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_analytics_keyword_manager`
--
ALTER TABLE `wp_ideasvnrank_math_analytics_keyword_manager`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_analytics_objects`
--
ALTER TABLE `wp_ideasvnrank_math_analytics_objects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_internal_links`
--
ALTER TABLE `wp_ideasvnrank_math_internal_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_link_genius_audit`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_audit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_link_genius_history`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_link_genius_maps`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_link_genius_map_variations`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_map_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_link_genius_snapshots`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_snapshots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_redirections`
--
ALTER TABLE `wp_ideasvnrank_math_redirections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnrank_math_redirections_cache`
--
ALTER TABLE `wp_ideasvnrank_math_redirections_cache`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnredirection_404`
--
ALTER TABLE `wp_ideasvnredirection_404`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnredirection_groups`
--
ALTER TABLE `wp_ideasvnredirection_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnredirection_items`
--
ALTER TABLE `wp_ideasvnredirection_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnredirection_logs`
--
ALTER TABLE `wp_ideasvnredirection_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnredirects`
--
ALTER TABLE `wp_ideasvnredirects`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnsocial_users`
--
ALTER TABLE `wp_ideasvnsocial_users`
  MODIFY `social_users_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvntermmeta`
--
ALTER TABLE `wp_ideasvntermmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnterms`
--
ALTER TABLE `wp_ideasvnterms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnterm_taxonomy`
--
ALTER TABLE `wp_ideasvnterm_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvntm_taskmeta`
--
ALTER TABLE `wp_ideasvntm_taskmeta`
  MODIFY `meta_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvntm_tasks`
--
ALTER TABLE `wp_ideasvntm_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnusermeta`
--
ALTER TABLE `wp_ideasvnusermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnusers`
--
ALTER TABLE `wp_ideasvnusers`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwc_admin_notes`
--
ALTER TABLE `wp_ideasvnwc_admin_notes`
  MODIFY `note_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwc_admin_note_actions`
--
ALTER TABLE `wp_ideasvnwc_admin_note_actions`
  MODIFY `action_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwc_customer_lookup`
--
ALTER TABLE `wp_ideasvnwc_customer_lookup`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwc_download_log`
--
ALTER TABLE `wp_ideasvnwc_download_log`
  MODIFY `download_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwc_rate_limits`
--
ALTER TABLE `wp_ideasvnwc_rate_limits`
  MODIFY `rate_limit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwc_tax_rate_classes`
--
ALTER TABLE `wp_ideasvnwc_tax_rate_classes`
  MODIFY `tax_rate_class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwc_webhooks`
--
ALTER TABLE `wp_ideasvnwc_webhooks`
  MODIFY `webhook_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfauditevents`
--
ALTER TABLE `wp_ideasvnwfauditevents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfblocks7`
--
ALTER TABLE `wp_ideasvnwfblocks7`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfhits`
--
ALTER TABLE `wp_ideasvnwfhits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfhoover`
--
ALTER TABLE `wp_ideasvnwfhoover`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfissues`
--
ALTER TABLE `wp_ideasvnwfissues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfknownfilelist`
--
ALTER TABLE `wp_ideasvnwfknownfilelist`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwflogins`
--
ALTER TABLE `wp_ideasvnwflogins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfls_2fa_secrets`
--
ALTER TABLE `wp_ideasvnwfls_2fa_secrets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfpendingissues`
--
ALTER TABLE `wp_ideasvnwfpendingissues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfsecurityevents`
--
ALTER TABLE `wp_ideasvnwfsecurityevents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfsnipcache`
--
ALTER TABLE `wp_ideasvnwfsnipcache`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfstatus`
--
ALTER TABLE `wp_ideasvnwfstatus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwfwaffailures`
--
ALTER TABLE `wp_ideasvnwfwaffailures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_api_keys`
--
ALTER TABLE `wp_ideasvnwoocommerce_api_keys`
  MODIFY `key_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_ideasvnwoocommerce_attribute_taxonomies`
  MODIFY `attribute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_ideasvnwoocommerce_downloadable_product_permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_log`
--
ALTER TABLE `wp_ideasvnwoocommerce_log`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_order_itemmeta`
--
ALTER TABLE `wp_ideasvnwoocommerce_order_itemmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_order_items`
--
ALTER TABLE `wp_ideasvnwoocommerce_order_items`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_payment_tokenmeta`
--
ALTER TABLE `wp_ideasvnwoocommerce_payment_tokenmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_payment_tokens`
--
ALTER TABLE `wp_ideasvnwoocommerce_payment_tokens`
  MODIFY `token_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_sessions`
--
ALTER TABLE `wp_ideasvnwoocommerce_sessions`
  MODIFY `session_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_shipping_zones`
--
ALTER TABLE `wp_ideasvnwoocommerce_shipping_zones`
  MODIFY `zone_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_shipping_zone_locations`
--
ALTER TABLE `wp_ideasvnwoocommerce_shipping_zone_locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_shipping_zone_methods`
--
ALTER TABLE `wp_ideasvnwoocommerce_shipping_zone_methods`
  MODIFY `instance_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_tax_rates`
--
ALTER TABLE `wp_ideasvnwoocommerce_tax_rates`
  MODIFY `tax_rate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwoocommerce_tax_rate_locations`
--
ALTER TABLE `wp_ideasvnwoocommerce_tax_rate_locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwpfm_backup`
--
ALTER TABLE `wp_ideasvnwpfm_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwpmailsmtp_debug_events`
--
ALTER TABLE `wp_ideasvnwpmailsmtp_debug_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwpmailsmtp_tasks_meta`
--
ALTER TABLE `wp_ideasvnwpmailsmtp_tasks_meta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwpo_404_detector`
--
ALTER TABLE `wp_ideasvnwpo_404_detector`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnwpsmtp_logs`
--
ALTER TABLE `wp_ideasvnwpsmtp_logs`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnyoast_indexable`
--
ALTER TABLE `wp_ideasvnyoast_indexable`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnyoast_migrations`
--
ALTER TABLE `wp_ideasvnyoast_migrations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnyoast_primary_term`
--
ALTER TABLE `wp_ideasvnyoast_primary_term`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnyoast_prominent_words`
--
ALTER TABLE `wp_ideasvnyoast_prominent_words`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_ideasvnyoast_seo_links`
--
ALTER TABLE `wp_ideasvnyoast_seo_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ràng buộc đối với các bảng kết xuất
--

--
-- Ràng buộc cho bảng `wp_ideasvnrank_math_link_genius_map_variations`
--
ALTER TABLE `wp_ideasvnrank_math_link_genius_map_variations`
  ADD CONSTRAINT `fk_variation_keyword_map_id_1` FOREIGN KEY (`keyword_map_id`) REFERENCES `wp_ideasvnrank_math_link_genius_maps` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `wp_ideasvnwc_download_log`
--
ALTER TABLE `wp_ideasvnwc_download_log`
  ADD CONSTRAINT `fk_wp_ideasvnwc_download_log_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `wp_ideasvnwoocommerce_downloadable_product_permissions` (`permission_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
