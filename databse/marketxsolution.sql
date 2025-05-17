-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 11:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketxsolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `name`, `position`, `heading`, `description`, `image_url`, `created_at`) VALUES
(2, 'Faheem Ullah', 'Founder', 'Meet the Founders', 'We started this agency to fuse deep strategy with creative innovation. Today, we\'re a growing team of designers, developers, and marketers who bring brands to life in meaningful, measurable ways.', 'hero_681c528dab7fd.jpeg', '2025-05-07 17:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `image_url`, `created_at`) VALUES
(2, 'MarketXsolution', 'Main.jpeg', '2025-05-08 06:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `companycontact`
--

CREATE TABLE `companycontact` (
  `contact_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companycontact`
--

INSERT INTO `companycontact` (`contact_id`, `company_id`, `address`, `email`, `website`, `phone_number`, `created_at`) VALUES
(5, 2, 'Mohallah Saidano Qilla Tehsil Shabqadar District Charsadda', 'waqasahmad545818@gmail.com', 'www.Marketxsolution.com', '03298967888', '2025-05-12 11:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `id` int(11) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_description` text DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`id`, `logo_url`, `company_name`, `company_description`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `copyright_text`, `whatsapp`, `created_at`) VALUES
(2, 'maket x solution-01.jpg', 'MarketXsolution', 'Creating digital experiences that elevate brands and drive business growth.', 'fg', 'fdgdsf', 'fdgs', 'fdgfd', '2025 MaretxSolution. All Rights Reserved.', '923209955837', '2025-05-11 08:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` int(11) NOT NULL,
  `page_name` enum('home','about','service','portfolio','contact') NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `button_text` varchar(50) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `page_name`, `title`, `sub_title`, `description`, `image_url`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(13, 'home', 'Market X Solution', 'eee', 'Where Brands Rise and Lead. We don\'t just market — we craft success. At Market X Solutions, we empower startups and growing brands to stand out, scale up and dominate the market with strategies that drive real growth and lasting impact.', 'Captur222e.PNG', '', '', '2025-05-09 04:43:42', '2025-05-09 04:43:42'),
(14, 'about', 'Built to Empower Brands That Matter', NULL, 'We\'re a multidisciplinary digital agency on a mission to help bold businesses thrive in a digital-first world. From strategy to pixel-perfect execution, we believe great work starts with a great relationship.', 'hero_682617ae20a20.jpeg', '', '', '2025-05-09 05:05:08', '2025-05-15 16:37:58'),
(15, 'service', 'Tailored Solutions for Modern Brands', NULL, 'We offer comprehensive digital services to help your business thrive in today\'s competitive landscape.', 'hero_682618454dc6e.png', '', '', '2025-05-09 05:05:45', '2025-05-15 16:37:25'),
(16, 'contact', 'Let\'s Create Something Great', NULL, 'Have an idea? A challenge? A brand to build? Let\'s talk.', 'hero_6826188ff4200.png', NULL, NULL, '2025-05-09 05:13:06', '2025-05-15 16:38:40'),
(17, 'portfolio', 'Crafted with Purpose', NULL, 'Explore our portfolio of award-winning projects that drive real results for our clients.', 'hero_6826189ca4f8d.png', NULL, NULL, '2025-05-09 05:13:44', '2025-05-15 16:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `phone`, `message`, `created_at`, `status`) VALUES
(10, 'Waqas Ahmad Shah', 'waqasahmad545818@gmail.com', 'Web development', '03209955837', 'sdf', '2025-05-13 13:01:38', 1),
(17, 'Waqas Ahmad Shah', 'waqasahmad545818@gmail.com', 'Web development', '03209955837', 'xdfdse', '2025-05-14 08:14:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE `milestone` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `milestone`
--

INSERT INTO `milestone` (`id`, `icon`, `name`, `description`, `year`, `created_at`) VALUES
(2, 'fas fa-flag', 'Founded in Brooklyn', 'Started with a small team of passionate creatives in a Brooklyn co-working space.', '2019', '2025-05-08 13:22:05'),
(3, 'fas fa-globe', 'First global client signed', 'Expanded our reach beyond local markets to serve clients internationally.', '2020', '2025-05-08 13:28:10'),
(4, 'fas fa-trophy', '100+ projects delivered', 'Reached a significant milestone with over 100 successful projects completed.', '2021', '2025-05-11 04:51:44'),
(5, 'fas fa-users', 'Team expands across 4 continents', 'Grew our team to include talented professionals from around the world.', '2023', '2025-05-11 04:52:31'),
(6, 'fas fa-award', 'Featured in Awwwards & Webby shortlist', 'Recognized for our exceptional work with industry awards and accolades.', '2024', '2025-05-11 04:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` enum('Pending','Done') DEFAULT 'Pending',
  `avatar` varchar(255) DEFAULT 'avatar/1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ourvalues`
--

CREATE TABLE `ourvalues` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `client` varchar(250) NOT NULL,
  `progress` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ourvalues`
--

INSERT INTO `ourvalues` (`id`, `name`, `client`, `progress`, `description`, `icon`, `created_at`) VALUES
(1, 'Clarity > Complexity', '', '', 'We communicate simply and execute with precision.', 'fas fa-lightbulb', '2025-05-16 17:10:19'),
(2, 'Create with Purpose', '', '', 'Everything we design is grounded in strategy.', 'fas fa-bullseye', '2025-05-16 17:11:00'),
(3, 'Client = Partner', '', '', 'Collaboration drives results. We grow together.', 'fas fa-handshake', '2025-05-16 17:11:41'),
(4, 'Always Evolving', '', '', 'We stay ahead of trends, tools, and tech.', 'fas fa-rocket', '2025-05-16 17:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `portfolio_name` varchar(255) NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `portfolio_sub` varchar(255) DEFAULT NULL,
  `portfolio_description` text DEFAULT NULL,
  `image_urle` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','completed','on-hold') DEFAULT 'active',
  `progress` int(11) DEFAULT 0,
  `priority` enum('high','medium','low') DEFAULT 'medium',
  `deadline` date DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `project_category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_name`, `project_name`, `portfolio_sub`, `portfolio_description`, `image_urle`, `service_id`, `created_at`, `updated_at`, `status`, `progress`, `priority`, `deadline`, `team_id`, `project_category`) VALUES
(7, 'Wavely App', '', 'Rebrand + Product UX', 'sdfsadaffd', 'Cadfdfpture.PNG', 11, '2025-05-10 08:22:42', '2025-05-10 08:22:42', 'active', 0, 'medium', NULL, NULL, NULL),
(8, 'Stone Agency', '', 'Full identity + site', 'dsfdsfaf', 'Cadfdfpture.PNG', 11, '2025-05-10 08:23:12', '2025-05-10 08:23:12', 'active', 0, 'medium', NULL, NULL, NULL),
(9, 'Fusion Restaurant', '', 'Branding + Website', 'ascsa', 'Cadfdfpture.PNG', 11, '2025-05-10 08:23:47', '2025-05-10 08:23:47', 'active', 0, 'medium', NULL, NULL, NULL),
(10, 'Pulse Dashboard', '', 'UX/UI + Development', 'fsdafaadsfdsf', 'Cadfdfpture.PNG', 12, '2025-05-10 08:24:47', '2025-05-10 08:24:47', 'active', 0, 'medium', NULL, NULL, NULL),
(11, 'Fusion Restaurant', '', 'Branding + Website', 'sfdsdfas', 'Captur222e.PNG', 12, '2025-05-10 08:25:38', '2025-05-10 08:25:38', 'active', 0, 'medium', NULL, NULL, NULL),
(12, 'Bloom Skincare', '', 'Digital Marketing Campaign', 'fdfddsdfdsaf', 'Cadfdfpture.PNG', 13, '2025-05-10 08:26:35', '2025-05-10 08:26:35', 'active', 0, 'medium', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Discovery', 'We start by understanding your business, goals, audience, and market to establish a solid foundation.', '2025-05-07 17:17:52'),
(2, 'Strategy', 'Based on our findings, we develop a comprehensive strategy tailored to your specific needs.', '2025-05-07 17:18:28'),
(4, 'Design & Development', 'Our creative team brings the strategy to life through thoughtful design and meticulous development.', '2025-05-10 08:38:38'),
(5, 'Testing & Launch', 'We rigorously test everything to ensure quality, then execute a smooth launch of your project.', '2025-05-10 08:38:58'),
(6, 'Measure & Optimize', 'After launch, we continuously monitor performance and make data-driven improvements.', '2025-05-10 08:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `client` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('pending','active','complete') DEFAULT 'pending',
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `client`, `description`, `status`, `start_date`, `end_date`, `created_at`) VALUES
(1, 'Website Redesign', 'edfesf', 'errefew', 'active', '2025-05-16', '2025-09-16', '2025-05-16 17:37:07'),
(3, 'Website Redesign', 'sdfasd', 'dsfsd', 'pending', '2025-05-23', '2025-05-30', '2025-05-16 20:09:44'),
(6, 'CXxz', 'ZXC', 'xzCzx', 'complete', '2025-05-07', '2025-05-17', '2025-05-16 20:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon_class` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `title`, `short_desc`, `description`, `icon_class`, `image_url`) VALUES
(11, 'Social Media Management', 'Shape how the world sees you with a brand that resonates and endures.', 'In today\'s digital landscape, your website is often the first interaction potential customers have with your brand. We design and develop websites that make powerful first impressions and continue to engage users throughout their journey.\r\nOur web development team combines technical expertise with creative design to build custom websites that are not only visually stunning but also strategically crafted to achieve your business goals.', 'fas fa-paint-brush', 'Cadfdfpture.PNG'),
(12, 'Web Development', 'Fast, responsive, custom-built websites that put your brand at center stage.', 'In today\'s digital landscape, your website is often the first interaction potential customers have with your brand. We design and develop websites that make powerful first impressions and continue to engage users throughout their journey.\r\n\r\nOur web development team combines technical expertise with creative design to build custom websites that are not only visually stunning but also strategically crafted to achieve your business goals.', 'fas fa-laptop-code', 'Capture1.PNG'),
(13, 'Search Engine Optimization  (SEO)', 'Drive traffic, generate leads, and grow your business with data-led campaigns.', 'Digital marketing is the heartbeat of modern business — it connects you with the right audience at the right time. With smart strategies across social media, email, and online ads, you can drive more traffic, boost engagement, and grow faster than ever.\r\nSEO is the secret weapon behind every top-ranking brand. By optimizing your website and content, you not only climb higher on Google but also attract quality leads who are ready to take action. Stay visible, stay ahead.', 'fas fa-chart-line', 'PicsArt_04-23-07.35.31_1619167143722.jpg'),
(14, 'App Development ', 'Designing intuitive, user-centric interfaces for seamless digital experiences.', 'A smart UI/UX strategy transforms how users experience your brand. It’s about creating intuitive, beautiful designs that not only look good but guide users effortlessly — turning visitors into loyal customers.\r\nGreat UI/UX is more than design — it’s understanding people. With the right strategy, every click, swipe, and scroll feels natural, keeping users engaged, satisfied, and coming back for more.', 'fas fa-mobile-alt', 'PicsArt_04-25-11.21.14.jpg'),
(15, 'Graphic Designing', 'Messaging that speaks your audience\'s language—and inspires action.', 'Words have power — the right content captures attention, builds trust, and drives action. Great copywriting doesn’t just sell; it tells your story in a way that connects, inspires, and converts.\r\nWhether it’s a bold headline or a persuasive blog post, strong content turns browsers into buyers. With smart copywriting, every word works harder to grow your brand and leave a lasting impact.', 'fas fa-pen-fancy', 'Cadfdfpture.PNG'),
(16, 'Google Ads', 'Build community and drive engagement across all platforms.', 'Social media management isn’t just posting — it’s building real connections that grow your brand. With the right strategy, you can turn followers into loyal customers and stand out in a crowded digital world.\r\nMake your brand unforgettable with smart, engaging social media. From creative content to real-time interactions, powerful management drives visibility, trust, and real results.', 'fas fa-bullhorn', 'Cadfdfpture.PNG'),
(17, 'Content Writing', 'fsdf', 'sadfasd', 'asdfsda', 'Capture1.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `services_card`
--

CREATE TABLE `services_card` (
  `services_card_id` int(11) NOT NULL,
  `services_card_name` varchar(100) NOT NULL,
  `services_card_description` text DEFAULT NULL,
  `icon` varchar(250) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_card`
--

INSERT INTO `services_card` (`services_card_id`, `services_card_name`, `services_card_description`, `icon`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'fdgad', 'Ali shah dfjlsdadfjsdlf', 'fas fa-briefcase', 11, '2025-05-06 14:10:05', '2025-05-06 14:49:31'),
(3, 'waqas', 'fdsff', 'fas fa-briefcase', 11, '2025-05-06 14:38:02', '2025-05-06 14:52:37'),
(4, 'dfdsaa', 'dsafsd', 'dsafdsa', 11, '2025-05-10 05:38:33', '2025-05-10 05:38:33'),
(5, 'cxzv', 'xzcvxzc', 'xczvcx', 13, '2025-05-10 05:39:04', '2025-05-10 05:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `service_features`
--

CREATE TABLE `service_features` (
  `feature_id` int(11) NOT NULL,
  `services_id` int(11) DEFAULT NULL,
  `feature_name` varchar(255) DEFAULT NULL,
  `feature_des` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_features`
--

INSERT INTO `service_features` (`feature_id`, `services_id`, `feature_name`, `feature_des`) VALUES
(26, 11, 'Brand Strategy & Positioning', 'In today\'s digital landscape, your website is often the first interaction potential customers have with your brand. We design and develop websites that make powerful first impressions and continue to engage users throughout their journey.\r\n'),
(27, 11, 'Logo & Visual Identity', 'fgdfg'),
(28, 11, 'Brand Guidelines', 'dfsdf'),
(29, 12, 'Custom Website Design', 'sadsada'),
(30, 12, 'E-commerce Solutions', 'sfdsdfsff'),
(31, 12, ' CMS Integration', 'fdsfsadf'),
(32, 13, 'Search Engine Optimization', 'dadfsdf'),
(33, 13, 'PPC & Social Media Ads', 'dgfds'),
(34, 13, ' Analytics & Reporting', 'sdfsdfsdaf'),
(35, 14, 'User Research & Testing', 'sadssa'),
(36, 14, ' Wireframing & Prototyping', 'sadfds'),
(37, 14, 'Interface Design', 'dfasddddsdaf'),
(38, 15, 'Website Copy', 'fdfsadfsdf'),
(39, 15, 'Blog & Article Writing', 'fdssafsdf'),
(40, 15, 'Email Campaigns', 'dsadfsdsfdsf'),
(41, 16, 'Content Strategy', 'sfddsfsd'),
(42, 16, 'Community Management', 'dsfdsf'),
(43, 16, 'Performance Analytics', 'sdafsdf');

-- --------------------------------------------------------

--
-- Table structure for table `teammember`
--

CREATE TABLE `teammember` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive') DEFAULT 'active',
  `facebook_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `phone_no` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teammember`
--

INSERT INTO `teammember` (`id`, `name`, `position`, `image_url`, `created_at`, `status`, `facebook_url`, `linkedin_url`, `instagram_url`, `phone_no`) VALUES
(2, 'waqas ahmad', 'web developer', 'hero_681c46c25570e.jpeg', '2025-05-08 05:34:32', 'active', '', '', '', '03209955837'),
(4, 'Faheem Ullah', 'Founder of MarketXsolution', 'IMG-20250316-WA0035.jpg', '2025-05-10 13:40:18', 'active', '', '', '', '2147483647'),
(5, 'ewrw', 'cvxzcv', 'Main.jpeg', '2025-05-13 14:51:28', 'active', '', '', '', '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `position`, `description`, `image_url`, `created_at`) VALUES
(2, 'waqas', 'web developer', 'this product is very high quality djsflksafj;lsaf shfflsdfs my nam eis waqasx ahamd ahahs ajdlfdsfljgjljfsdfsf', 'Main.jpeg', '2025-05-08 05:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_picture_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `full_name`, `date_of_birth`, `phone_number`, `created_at`, `updated_at`, `profile_picture_url`) VALUES
(1, 'admin111', 'waqasahmad523@gmail.com', 'waqasahmad', 'waqas ;ahmad shah', '2015-05-01', '03209955837', '2025-05-08 13:52:56', '2025-05-14 05:53:14', 'hero_681cc7aa6e36d.png'),
(3, 'waqasahamdshah', ' waqasahmad545818@gmail.com', '456789', 'Waqas Ahmad Shah', '2025-05-15', '03209955837', '2025-05-08 14:29:31', '2025-05-08 14:57:02', 'Main.jpeg'),
(4, 'kaleem ullah', 'waqasahmad545818@gmail.com', 'admin123', 'Waqas Ahmad Shah', '2025-01-24', '03209955837', '2025-05-08 16:15:11', '2025-05-09 04:07:56', 'Main.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `websitesections`
--

CREATE TABLE `websitesections` (
  `id` int(11) NOT NULL,
  `section_name` enum('Our Expertise','FEATURED WORK','OUR APPROACH','CLIENT FEEDBACK','OUR CLIENTS','OUR VALUES','OUR JOURNEY','OUR TEAM') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `websitesections`
--

INSERT INTO `websitesections` (`id`, `section_name`, `title`, `description`) VALUES
(1, 'Our Expertise', 'Comprehensive Digital Services1', 'We offer end-to-end solutions tailored to your unique business needs, helping you thrive in today\'s competitive digital landscape.'),
(4, 'FEATURED WORK', 'Award-Winning Projects', 'Explore our portfolio of innovative solutions that have helped our clients achieve remarkable business growth and digital success.'),
(5, 'OUR APPROACH', 'How We Work', 'Our proven methodology ensures every project delivers exceptional results that exceed expectations.'),
(6, 'CLIENT FEEDBACK', 'What Our Clients Say', 'Don\'t just take our word for it. Hear directly from the businesses we\'ve helped transform.'),
(7, 'OUR CLIENTS', 'Trusted by Leading Brands', 'We\'re proud to work with ambitious companies across industries and around the world.'),
(8, 'OUR VALUES', 'What Drives Us', 'Our core values shape everything we do, from how we work with clients to how we approach each project.'),
(9, 'OUR JOURNEY', 'Milestones & Growth', 'From our humble beginnings to where we are today, we\'ve grown through dedication and passion.'),
(10, 'OUR TEAM', 'The Talent Behind Our Success', 'Meet the creative minds and technical experts who bring our projects to life.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companycontact`
--
ALTER TABLE `companycontact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `companycontact_ibfk_1` (`company_id`);

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_name` (`page_name`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourvalues`
--
ALTER TABLE `ourvalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `services_card`
--
ALTER TABLE `services_card`
  ADD PRIMARY KEY (`services_card_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_features`
--
ALTER TABLE `service_features`
  ADD PRIMARY KEY (`feature_id`),
  ADD KEY `service_features_ibfk_1` (`services_id`);

--
-- Indexes for table `teammember`
--
ALTER TABLE `teammember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `websitesections`
--
ALTER TABLE `websitesections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companycontact`
--
ALTER TABLE `companycontact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companyinfo`
--
ALTER TABLE `companyinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `milestone`
--
ALTER TABLE `milestone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ourvalues`
--
ALTER TABLE `ourvalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services_card`
--
ALTER TABLE `services_card`
  MODIFY `services_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_features`
--
ALTER TABLE `service_features`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `teammember`
--
ALTER TABLE `teammember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `websitesections`
--
ALTER TABLE `websitesections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companycontact`
--
ALTER TABLE `companycontact`
  ADD CONSTRAINT `companycontact_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companyinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Constraints for table `services_card`
--
ALTER TABLE `services_card`
  ADD CONSTRAINT `services_card_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Constraints for table `service_features`
--
ALTER TABLE `service_features`
  ADD CONSTRAINT `service_features_ibfk_1` FOREIGN KEY (`services_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
