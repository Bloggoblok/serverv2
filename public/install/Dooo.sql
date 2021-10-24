-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 06:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dooo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_type` int(11) NOT NULL COMMENT '1=Movie, 2=WebSeries',
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `api_key` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `license_code` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `login_mandatory` int(11) NOT NULL COMMENT '0=No, 1=Yes',
  `maintenance` int(11) NOT NULL COMMENT '0=No, 1=Yes',
  `image_slider_type` int(11) NOT NULL COMMENT '0=Movie, 1=Web Series, 2=Custom, 3=Disable',
  `movie_image_slider_max_visible` int(11) NOT NULL DEFAULT 5,
  `webseries_image_slider_max_visible` int(11) NOT NULL DEFAULT 5,
  `onesignal_api_key` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `onesignal_appid` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ad_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=No Ads, 1 =AdMob, 2=Startapp, 3=Facebook, 4=AdColony, 5=UnityAds, 6=CustomAds',
  `Admob_Publisher_ID` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Admob_APP_ID` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `adMob_Native` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `adMob_Banner` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `adMob_Interstitial` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `StartApp_App_ID` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `facebook_app_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `facebook_banner_ads_placement_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `facebook_interstitial_ads_placement_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Latest_APK_Version_Name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Latest_APK_Version_Code` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `APK_File_URL` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Whats_new_on_latest_APK` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Update_Skipable` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `Update_Type` int(11) NOT NULL DEFAULT 0 COMMENT '0=In App, 1 = External Brawser',
  `Contact_Email` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `SMTP_Host` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `SMTP_Username` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `SMTP_Password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `SMTP_Port` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Dashboard_Version` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `shuffle_contents` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `Home_Rand_Max_Movie_Show` int(11) NOT NULL DEFAULT 0,
  `Home_Rand_Max_Series_Show` int(11) NOT NULL DEFAULT 0,
  `Home_Recent_Max_Movie_Show` int(11) NOT NULL DEFAULT 0,
  `Home_Recent_Max_Series_Show` int(11) NOT NULL DEFAULT 0,
  `Show_Message` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `Message_Title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Message` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `all_live_tv_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=Default, 1=Free, 2=Paid',
  `all_movies_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=Default, 1=Free, 2=Paid',
  `all_series_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=Default, 1=Free, 2=Paid',
  `LiveTV_Visiable_in_Home` int(11) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `TermsAndConditions` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `PrivecyPolicy` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tmdb_language` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `admin_panel_language` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `genre_visible_in_home` int(11) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `AdColony_app_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `AdColony_banner_zone_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `AdColony_interstitial_zone_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `unity_game_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `unity_banner_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `custom_banner_url` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `custom_banner_click_url_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=nothing 1=External Brawser 2=Internal Brawser',
  `custom_banner_click_url` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `custom_interstitial_url` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `custom_interstitial_click_url_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=nothing 1=External Brawser 2=Internal Brawser',
  `custom_interstitial_click_url` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `movie_comments` int(11) NOT NULL COMMENT '0=Off, 1=On',
  `webseries_comments` int(11) NOT NULL COMMENT '0=Off, 1=On',
  `google_login` int(11) NOT NULL COMMENT '0=Disabled, 1=Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `api_key`, `license_code`, `login_mandatory`, `maintenance`, `image_slider_type`, `movie_image_slider_max_visible`, `webseries_image_slider_max_visible`, `onesignal_api_key`, `onesignal_appid`, `ad_type`, `Admob_Publisher_ID`, `Admob_APP_ID`, `adMob_Native`, `adMob_Banner`, `adMob_Interstitial`, `StartApp_App_ID`, `facebook_app_id`, `facebook_banner_ads_placement_id`, `facebook_interstitial_ads_placement_id`, `Latest_APK_Version_Name`, `Latest_APK_Version_Code`, `APK_File_URL`, `Whats_new_on_latest_APK`, `Update_Skipable`, `Update_Type`, `Contact_Email`, `SMTP_Host`, `SMTP_Username`, `SMTP_Password`, `SMTP_Port`, `Dashboard_Version`, `shuffle_contents`, `Home_Rand_Max_Movie_Show`, `Home_Rand_Max_Series_Show`, `Home_Recent_Max_Movie_Show`, `Home_Recent_Max_Series_Show`, `Show_Message`, `Message_Title`, `Message`, `all_live_tv_type`, `all_movies_type`, `all_series_type`, `LiveTV_Visiable_in_Home`, `TermsAndConditions`, `PrivecyPolicy`, `tmdb_language`, `admin_panel_language`, `genre_visible_in_home`, `AdColony_app_id`, `AdColony_banner_zone_id`, `AdColony_interstitial_zone_id`, `unity_game_id`, `unity_banner_id`, `custom_banner_url`, `custom_banner_click_url_type`, `custom_banner_click_url`, `custom_interstitial_url`, `custom_interstitial_click_url_type`, `custom_interstitial_click_url`, `movie_comments`, `webseries_comments`, `google_login`) VALUES
(1, 'Dooo', 'deafult_api_key', 'codelist', 1, 0, 0, 10, 10, '', '', 0, '', '', '', '', '', '', '', '', '', 'v1.0.0', '1', '', '', 0, 1, '', '', '', '', '', '1.5.5', 0, 15, 15, 10, 10, 0, '', '', 0, 0, 0, 1, '', '', 'en-US', 'en-US', 1, '', '', '', '', '', '', 0, '', '', 0, '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `coupon_code` text NOT NULL,
  `time` int(11) NOT NULL COMMENT 'Days',
  `amount` int(11) NOT NULL,
  `subscription_type` int(11) NOT NULL DEFAULT 0 COMMENT '1=Remove Ads, 2=Play Premium, 3=Download Premium	',
  `status` int(11) NOT NULL COMMENT '0=Expired, 1=Valid',
  `max_use` int(11) NOT NULL DEFAULT 1,
  `used` int(11) NOT NULL DEFAULT 0,
  `used_by` text NOT NULL DEFAULT '',
  `expire_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `episode_download_links`
--

CREATE TABLE `episode_download_links` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `size` text NOT NULL,
  `quality` text NOT NULL,
  `link_order` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `type` text NOT NULL,
  `download_type` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content_type` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `icon` text NOT NULL,
  `description` longtext NOT NULL,
  `featured` int(11) NOT NULL COMMENT '0=NotFeatured, 1=Featured',
  `status` int(11) NOT NULL COMMENT '	0=NotPublished, 1=Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image_slider`
--

CREATE TABLE `image_slider` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content_type` int(11) NOT NULL COMMENT '0=Movie,1=WebSeries,2=WebView,3=External Browser',
  `content_id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '	0=UnPublished, 1=Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_tv_channels`
--

CREATE TABLE `live_tv_channels` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `banner` text NOT NULL,
  `stream_type` text NOT NULL,
  `url` text NOT NULL,
  `content_type` int(11) NOT NULL DEFAULT 3 COMMENT '	1=Movie, 2=WebSeries, 3=LiveTV',
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '	0=NotPremium, 1=Premium',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `featured` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mail_token_details`
--

CREATE TABLE `mail_token_details` (
  `id` int(11) NOT NULL,
  `token` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `TMDB_ID` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `genres` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `release_date` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `runtime` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `poster` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `banner` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `youtube_trailer` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `downloadable` int(11) NOT NULL COMMENT '0=Not Downloadable, 1=Downloadable',
  `type` int(11) NOT NULL COMMENT '0=NotPremium, 1=Premium',
  `status` int(11) NOT NULL COMMENT '0=UnPublished, 1=Published',
  `content_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=Movie, 2=WebSeries'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movie_download_links`
--

CREATE TABLE `movie_download_links` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `size` text NOT NULL,
  `quality` text NOT NULL,
  `link_order` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `type` text NOT NULL,
  `download_type` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=Not Released, 1=Released'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movie_play_links`
--

CREATE TABLE `movie_play_links` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `size` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `quality` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_order` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=Not Released, 1=Released',
  `skip_available` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `intro_start` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `intro_end` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `end_credits_marker` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_type` int(11) NOT NULL COMMENT '0=NotPremium, 1=Premium'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `report_type` int(11) NOT NULL COMMENT '0=Custom, 1=Movie, 2=Web Series, 3=Live TV',
  `status` int(11) NOT NULL COMMENT '0=Pending, 1=Solved, 2=Canceled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `time` int(11) NOT NULL COMMENT 'Days',
  `amount` int(11) NOT NULL,
  `currency` int(11) NOT NULL COMMENT '0=INR,1=USD',
  `background` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `subscription_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=Default, 1=Remove Ads, 2=Play Premium, 3=Download Premium',
  `status` int(11) NOT NULL COMMENT '0=UnPublished, 1=Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_log`
--

CREATE TABLE `subscription_log` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `amount` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `subscription_start` date NOT NULL,
  `subscription_exp` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subtitles`
--

CREATE TABLE `subtitles` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_type` int(11) NOT NULL COMMENT '1=Movie, 2=WebSeries',
  `language` text NOT NULL,
  `subtitle_url` text NOT NULL,
  `mime_type` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '0=User, 1=Admin, 2=SubAdmin, 3=Manager, 4=Editor',
  `active_subscription` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `subscription_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=Default, 1=Remove Ads, 2=Play Premium, 3=Download Premium',
  `time` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `subscription_start` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `subscription_exp` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `name`, `email`, `password`, `role`, `active_subscription`, `subscription_type`, `time`, `amount`, `subscription_start`, `subscription_exp`) VALUES
(1, 'first_user_full_name', 'first_user_email', 'first_user_password', 1, 'Premium', 123, 0, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `view_log`
--

CREATE TABLE `view_log` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_type` int(11) NOT NULL COMMENT '1=Movie, 2=WebSeries',
  `date` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `watch_log`
--

CREATE TABLE `watch_log` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_type` int(11) NOT NULL COMMENT '1=Movie, 2=WebSeries'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `web_series`
--

CREATE TABLE `web_series` (
  `id` int(11) NOT NULL,
  `TMDB_ID` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `genres` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `release_date` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `youtube_trailer` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `downloadable` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `content_type` int(11) NOT NULL DEFAULT 2 COMMENT '1=Movie, 2=WebSeries'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_series_episoade`
--

CREATE TABLE `web_series_episoade` (
  `id` int(11) NOT NULL,
  `Episoade_Name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `episoade_image` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `episoade_description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `episoade_order` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `downloadable` int(11) NOT NULL COMMENT '0=No, 1=Yes',
  `type` int(11) NOT NULL COMMENT '0=NotPremium, 1=Premium',
  `status` int(11) NOT NULL COMMENT '0=Not Released, 1=Released',
  `source` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `skip_available` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `intro_start` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `intro_end` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `end_credits_marker` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `web_series_seasons`
--

CREATE TABLE `web_series_seasons` (
  `id` int(11) NOT NULL,
  `Session_Name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `season_order` int(11) NOT NULL,
  `web_series_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=Not Released, 1=Released'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episode_download_links`
--
ALTER TABLE `episode_download_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_slider`
--
ALTER TABLE `image_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_tv_channels`
--
ALTER TABLE `live_tv_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_token_details`
--
ALTER TABLE `mail_token_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_download_links`
--
ALTER TABLE `movie_download_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_play_links`
--
ALTER TABLE `movie_play_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_log`
--
ALTER TABLE `subscription_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtitles`
--
ALTER TABLE `subtitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_log`
--
ALTER TABLE `view_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch_log`
--
ALTER TABLE `watch_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_series`
--
ALTER TABLE `web_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_series_episoade`
--
ALTER TABLE `web_series_episoade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_series_seasons`
--
ALTER TABLE `web_series_seasons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `episode_download_links`
--
ALTER TABLE `episode_download_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `image_slider`
--
ALTER TABLE `image_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_tv_channels`
--
ALTER TABLE `live_tv_channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `mail_token_details`
--
ALTER TABLE `mail_token_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `movie_download_links`
--
ALTER TABLE `movie_download_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `movie_play_links`
--
ALTER TABLE `movie_play_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `subscription_log`
--
ALTER TABLE `subscription_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `subtitles`
--
ALTER TABLE `subtitles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `view_log`
--
ALTER TABLE `view_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `watch_log`
--
ALTER TABLE `watch_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `web_series`
--
ALTER TABLE `web_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `web_series_episoade`
--
ALTER TABLE `web_series_episoade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `web_series_seasons`
--
ALTER TABLE `web_series_seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
