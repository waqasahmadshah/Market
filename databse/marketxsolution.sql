-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 01:54 PM
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
(2, 'MarketXsolution', 'hero_682858fc7bcea.jpg', '2025-05-08 06:57:31'),
(3, 'name', 'chris-kursikowski-ze5wHM9kplc-unsplash.jpg', '2025-05-17 09:39:40'),
(4, 'X', 'boliviainteligente--exccn2LS88-unsplash.jpg', '2025-05-17 09:39:59'),
(5, 'Toyota', 'download14.jpg', '2025-05-17 09:40:22');

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
(5, 2, 'Haq Tower, Near Liberty Mall, Tehkal Road, Peshawar', 'fahimit450@gmail.com', 'www.Marketxsolution.com', '923350055620', '2025-05-12 11:25:07');

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
(2, 'maket x solution-01.jpg', 'MarketXsolution', 'MarketXsolution is a digital agency offering services like website development, app creation, and online marketing to help businesses grow.', 'https://www.facebook.com/profile.php?id=61574839007874&mibextid=rS40aB7S9Ucbxw6v', 'http://localhost/Marketxsolution/admin/Compeny_info_update.php?id=2', 'https://www.instagram.com/marketxsolutions?igsh=MTFwdWk0MnRrZ29wZA==', 'https://www.linkedin.com/in/faheem-ullah-411983322?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app', '2025 MaretxSolution. All Rights Reserved.', '923209955837', '2025-05-11 08:52:52');

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
(13, 'home', 'Market X Solution', 'eee', 'Where Brands Rise and Lead. We don\'t just market — we craft success. At Market X Solutions, we empower startups and growing brands to stand out, scale up and dominate the market with strategies that drive real growth and lasting impact.', 'hero_6828263eb4e0c.jpg', '', '', '2025-05-09 04:43:42', '2025-05-17 06:01:34'),
(14, 'about', 'Built to Empower Brands That Matter', NULL, 'We\'re a multidisciplinary digital agency on a mission to help bold businesses thrive in a digital-first world. From strategy to pixel-perfect execution, we believe great work starts with a great relationship.', 'hero_68282771afa58.jpg', '', '', '2025-05-09 05:05:08', '2025-05-17 06:06:41'),
(15, 'service', 'Tailored Solutions for Modern Brands', NULL, 'We offer comprehensive digital services to help your business thrive in today\'s competitive landscape.', 'hero_68282a2157575.jpg', '', '', '2025-05-09 05:05:45', '2025-05-17 06:18:09'),
(16, 'contact', 'Let\'s Create Something Great', NULL, 'Have an idea? A challenge? A brand to build? Let\'s talk.', 'hero_68282a34a0e5b.jpg', NULL, NULL, '2025-05-09 05:13:06', '2025-05-17 06:18:28'),
(17, 'portfolio', 'Crafted with Purpose', NULL, 'Explore our portfolio of award-winning projects that drive real results for our clients.', 'hero_68282a481e4cf.jpg', NULL, NULL, '2025-05-09 05:13:44', '2025-05-17 06:18:48');

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
  `portfolio_sub` varchar(255) DEFAULT NULL,
  `image_urle` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `project_link` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_name`, `portfolio_sub`, `image_urle`, `service_id`, `project_link`, `created_at`, `updated_at`) VALUES
(7, 'Evomed Healthcare', 'Webiste + Health Care', 'hero_68284f02d07ea.png', 12, 'https://evomedhealthcare.com/contact-us-3/', '2025-05-10 08:22:42', '2025-05-17 08:58:05');

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
(11, 'Social Media Management', 'Managing and growing your brand on social platforms.', 'Social Media Management involves the creation, scheduling, publishing, and analysis of content posted across social media platforms such as Instagram, Facebook, Twitter, LinkedIn, and others. It goes beyond just posting updates; it includes engaging with followers, responding to comments and messages, monitoring trends, and leveraging data insights to refine strategy. This discipline ensures a consistent brand voice and helps businesses effectively reach and grow their online communities.\r\n\r\nEffective social media management can drive brand awareness, foster customer loyalty, and generate leads or sales. It combines creative content development with analytical tools to track performance and optimize campaigns. Whether done in-house or through an agency, successful management requires a clear understanding of the brand’s goals, audience behavior, and platform-specific best practices.', 'fas fa-paint-brush', 'hero_682834d1f28fc.png'),
(12, 'Web Development', 'Building responsive and user-friendly websites.', 'Web Development is the process of creating and maintaining websites and web applications. It encompasses everything from coding the structure and layout using HTML, CSS, and JavaScript, to developing advanced functionality with backend technologies like PHP, Python, Node.js, or databases like MySQL and MongoDB. Web development can range from building a simple static webpage to complex dynamic platforms such as e-commerce stores, social networks, or content management systems.\r\n\r\nA strong web development process ensures a seamless user experience, fast loading times, and mobile responsiveness. Developers often work closely with designers and stakeholders to bring digital visions to life while focusing on accessibility, security, and scalability. Whether it\'s a corporate site, a personal blog, or a custom web app, web development is a foundational element of the modern digital landscape.', 'fas fa-laptop-code', 'hero_682834be65b60.png'),
(13, 'Search Engine Optimization  (SEO)', 'Improving website visibility on search engines.', 'Search Engine Optimization (SEO) is the practice of enhancing a website’s content, structure, and technical performance to improve its ranking in search engine results pages (SERPs). By targeting relevant keywords, optimizing on-page elements like meta tags and headers, and building high-quality backlinks, SEO helps websites attract more organic (non-paid) traffic from users actively searching for related topics or services.\r\n\r\nEffective SEO involves a combination of on-page optimization (such as content creation, keyword usage, and internal linking), off-page strategies (like link-building and social signals), and technical improvements (including site speed, mobile-friendliness, and secure connections). SEO is a long-term strategy that not only increases visibility but also builds trust and credibility with audiences, making it an essential part of any digital marketing plan.', 'fas fa-chart-line', 'hero_682834efdaa6c.png'),
(14, 'App Development ', 'Designing visuals that capture and communicate.', 'App Development is the process of designing, building, testing, and deploying software applications for platforms such as iOS, Android, or desktop environments. It involves both front-end (user interface and experience) and back-end (server, database, and logic) development. Developers use programming languages like Swift, Kotlin, Java, Flutter, or React Native, depending on the target platform and functionality required.\r\n\r\nThe goal of app development is to deliver intuitive, reliable, and efficient applications that solve problems or add value for users. This can include everything from simple productivity tools to complex enterprise systems or interactive games. A well-developed app combines thoughtful design with technical robustness, providing seamless performance, strong security, and regular updates to meet evolving user needs and technological standards.', 'fas fa-mobile-alt', 'hero_682835440f19b.jpg'),
(15, 'Graphic Designing', 'Designing visuals that capture and communicate.', 'Graphic Designing is the art and practice of planning and creating visual content to convey ideas and information. It involves combining elements like text, images, icons, and colors to produce designs for both digital and print mediums—such as social media graphics, logos, brochures, websites, advertisements, and packaging. Designers use tools like Adobe Photoshop, Illustrator, and Canva to bring their concepts to life in a visually appealing and brand-consistent way.\r\n\r\nBeyond aesthetics, graphic design serves a functional purpose: guiding user attention, enhancing communication, and evoking specific emotions or actions. Whether creating a brand identity or designing marketing materials, graphic design plays a critical role in how a business or message is perceived by its audience. A well-crafted design not only looks good but also effectively communicates and connects with its target viewers.', 'fas fa-pen-fancy', 'hero_68283579920f0.jpg'),
(16, 'Google Ads', 'Running targeted ads to drive traffic and sales.', 'Google Ads is an online advertising platform developed by Google, where businesses can create and run ads to appear on Google Search, YouTube, and across a vast network of partner websites. It operates on a pay-per-click (PPC) model, meaning advertisers only pay when someone clicks on their ad. With advanced targeting options based on keywords, demographics, location, interests, and device types, Google Ads helps businesses reach the right audience at the right time.\r\n\r\nThis platform offers various ad formats, including search ads, display banners, shopping ads, video ads, and app promotion campaigns. Google Ads is a powerful tool for increasing brand visibility, driving website traffic, and generating leads or sales. Its detailed analytics and optimization tools allow advertisers to track performance and refine campaigns for maximum ROI, making it a core component of digital marketing strategies.', 'fas fa-bullhorn', 'hero_682835f96e445.png'),
(17, 'Content Writing', 'Writing content that informs, engages, and converts.', 'Content Writing is the process of producing written material for digital and print platforms, such as websites, blogs, social media, emails, product descriptions, and marketing campaigns. The goal is to deliver clear, compelling, and relevant messages that resonate with the intended audience. This involves understanding the brand voice, researching topics, and structuring content in a way that is both informative and engaging.\r\n\r\nEffective content writing not only educates or entertains but also drives specific actions—whether it\'s generating leads, boosting SEO rankings, or building brand authority. Writers often tailor content to align with business goals, user intent, and platform-specific guidelines. Quality content is the foundation of successful online presence and plays a crucial role in customer engagement, trust-building, and conversion.', 'asdfsda', 'hero_68283609e9a9d.jpg');

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
(1, 'Hootsuite', 'Hootsuite offers a powerful suite of tools for scheduling, publishing, and monitoring social media content across multiple platforms.\r\n', 'fas fa-chart-line', 11, '2025-05-06 14:10:05', '2025-05-17 08:20:42'),
(3, 'Sprout Social', 'Sprout Social combines automation with deep analytics and CRM functionality, making it ideal for brands that rely on data to drive growth.', 'fas fa-bullseye', 11, '2025-05-06 14:38:02', '2025-05-17 08:21:20'),
(4, ' Buffer', 'Buffer is perfect for individuals or small teams looking for an easy-to-use platform without sacrificing essential features.', 'fas fa-leaf', 11, '2025-05-10 05:38:33', '2025-05-17 08:22:04'),
(6, 'E-Commerce Website Development', 'Build scalable and secure online stores with features like payment gateways, inventory management, and product catalogs.', 'fas fa-shopping-cart', 12, '2025-05-17 08:24:33', '2025-05-17 08:24:33'),
(7, 'Blog & Content Websites ', 'Custom blog platforms with easy content management systems and modern layouts.', 'fas fa-blog', 12, '2025-05-17 08:25:35', '2025-05-17 08:25:35'),
(8, 'Portfolio Website ', 'Development Create stunning personal or creative portfolios to showcase your work, skills, and brand.', 'fas fa-user', 12, '2025-05-17 08:26:20', '2025-05-17 08:26:20'),
(9, ' On-Page SEO', 'Optimizing individual web pages to rank higher and earn more relevant traffic in search engines.', 'fas fa-file-alt', 13, '2025-05-17 08:28:06', '2025-05-17 08:28:06'),
(11, 'Technical SEO', 'Improving the technical aspects of your website to ensure search engines can crawl and index it effectively.', 'fas fa-cogs', 13, '2025-05-17 08:29:01', '2025-05-17 08:29:01'),
(12, 'Off-Page SEO', 'Building domain authority and trust through external signals and link-building strategies.', 'fas fa-link', 13, '2025-05-17 08:29:34', '2025-05-17 08:29:34'),
(13, 'Native Mobile App Development', 'Creating high-performance apps specifically for iOS or Android platforms using Swift, Kotlin, or Java.', 'fas fa-mobile-alt', 14, '2025-05-17 08:31:19', '2025-05-17 08:31:19'),
(14, 'Cross-Platform App Development', 'Building apps that work seamlessly across multiple platforms (iOS, Android, web) using frameworks like React Native or Flutter.', 'fas fa-code', 14, '2025-05-17 08:32:11', '2025-05-17 08:32:11'),
(16, 'Enterprise App Development', 'Custom apps designed to improve business workflows, employee productivity, and internal communications.', 'fas fa-users-cog', 14, '2025-05-17 08:33:31', '2025-05-17 08:33:31'),
(17, ' Logo Design', 'Crafting unique and memorable logos that reflect your brand identity.', 'fas fa-paint-brush', 15, '2025-05-17 08:34:53', '2025-05-17 08:34:53'),
(18, 'Marketing & Advertising Design', 'Creating eye-catching flyers, posters, banners, and social media graphics to boost campaigns.', 'fas fa-bullhorn', 15, '2025-05-17 08:35:57', '2025-05-17 08:35:57'),
(19, 'Brand Identity Design', 'Designing cohesive visual branding including color palettes, typography, and style guides.\r\n\r\n', 'fas fa-vector-square', 15, '2025-05-17 08:36:43', '2025-05-17 08:36:43'),
(20, 'Search Ads', 'Target potential customers actively searching on Google with text ads appearing in search results.', 'fas fa-search', 16, '2025-05-17 08:37:36', '2025-05-17 08:37:36'),
(21, 'Shopping Ads', 'Promote your products directly in Google search results with rich product listings.', 'fas fa-shopping-cart', 16, '2025-05-17 08:38:12', '2025-05-17 08:38:12'),
(22, 'Video Ads', 'Engage audiences with video advertisements on YouTube and other Google partner sites.', 'fas fa-video', 16, '2025-05-17 08:39:38', '2025-05-17 08:41:42'),
(23, 'Blog & Article Writing', 'Creating engaging and SEO-friendly blog posts and articles to attract and educate your audience.', 'fas fa-file-alt', 17, '2025-05-17 08:42:38', '2025-05-17 08:42:38'),
(24, 'Website Content Writing', 'Crafting clear, persuasive, and brand-aligned copy for your website pages.', 'fas fa-book-open', 17, '2025-05-17 08:43:11', '2025-05-17 08:43:11'),
(25, 'Copywriting & Marketing Content', 'Creating persuasive sales copy, ads, and marketing materials that convert visitors into customers.', 'fas fa-file-signature', 17, '2025-05-17 08:43:46', '2025-05-17 08:43:46');

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
(26, 11, 'Brand Strategy & Positioning', 'Defines the unique value and market position that sets a brand apart from competitors.'),
(27, 11, 'Logo & Visual Identity', 'Creates the core visual elements that represent and distinguish the brand.'),
(28, 11, 'Brand Guidelines', 'Provides a comprehensive set of rules to ensure consistent and cohesive brand usage.'),
(29, 12, 'Custom Website Design', 'Tailored website layouts and features crafted to reflect your brand’s unique identity and goals.'),
(30, 12, 'E-commerce Solutions', 'End-to-end online store setup and management to drive sales and customer engagement.'),
(31, 12, ' CMS Integration', 'Seamless implementation of content management systems for easy website updates and control.'),
(32, 13, 'Search Engine Optimization', 'Optimizing your website to improve visibility and ranking on search engines.'),
(33, 13, 'PPC & Social Media Ads', 'Targeted paid campaigns to boost traffic and engagement across platforms.'),
(34, 13, ' Analytics & Reporting', 'Tracking and analyzing data to measure performance and guide strategic decisions.'),
(35, 14, 'User-Friendly Interface', 'Intuitive design that ensures smooth and engaging user interactions.'),
(36, 14, 'Cross-Platform Compatibility', 'Built to run seamlessly across multiple devices and operating systems.'),
(37, 14, 'Real-Time Updates & Notifications', 'Instant information delivery to keep users informed and engaged.'),
(38, 15, 'Creative Visual Concepts', 'Innovative and original designs that capture attention and convey your message effectively.'),
(39, 15, 'Brand Consistency', 'Maintaining uniform style and tone across all visuals to strengthen brand identity.'),
(40, 15, 'High-Quality Output', 'Crisp, professional designs optimized for both digital and print use.'),
(41, 16, 'Targeted Audience Reach', 'Deliver ads to specific demographics, locations, and interests for maximum relevance.'),
(42, 16, 'Performance-Based Budgeting', 'Control costs by only paying for actual clicks or conversions that meet your goals.'),
(43, 16, 'Real-Time Analytics & Insights', 'Access up-to-the-minute data to track ad performance and optimize campaigns effectively.'),
(44, 17, 'Engaging & Relevant Copy', 'Crafts compelling content tailored to capture attention and resonate with your audience.'),
(45, 17, 'SEO-Optimized Content', 'Strategically written to improve search engine visibility and drive organic traffic.'),
(46, 17, 'Brand-Aligned Tone & Voice', 'Maintains a consistent style that reflects your brand’s personality and values.');

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
(2, 'Faheem Ullah', 'Founder', 'team_682851ab2b0d9.jpg', '2025-05-08 05:34:32', 'active', 'https://www.facebook.com/profile.php?id=100094976895577', 'https://www.linkedin.com/in/faheem-ullah-411983322?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app', 'https://www.instagram.com/not_faheem_khan?igsh=MWZkcGZqYWx6YzlhNw==', '03209955837');

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
(2, 'Faheem Ullah', 'Professor', 'The agency website is visually appealing and easy to navigate, but it could benefit from clearer calls-to-action and faster load times.', 'hero_68285bd3d6ea0.jpg', '2025-05-08 05:11:49');

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
(1, 'faheem ullah', 'fahimit450@gmail.com', 'Faheemullah890', 'Faheem Ullah', '2015-05-01', '03350055620', '2025-05-08 13:52:56', '2025-05-17 09:22:08', 'hero_682853c072589.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companycontact`
--
ALTER TABLE `companycontact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `services_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `service_features`
--
ALTER TABLE `service_features`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
