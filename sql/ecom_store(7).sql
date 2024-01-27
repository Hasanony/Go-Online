-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jan 27, 2024 at 06:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `a_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`, `a_type`) VALUES
(1, 'hasan', 'admin@gmail.com', '1234', 'd2.jpg', 'Bangladesh', 'This application is created by Hasan Ony, if you willing to contact me, please click this link.\r\nHasan\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloribus tempore non ut velit, nesciunt totam, perspiciatis corrupti expedita nulla aut necessitatibus eius nisi. Unde quasi, recusandae doloribus minus quisquam. ', '01221323123', 'Full Stack Developer', 'admin'),
(6, 'Sahel', 'sahel@gmail.com', '123', 'd1.jpeg', 'Bangladesh', '<p>sadas</p>', '12312312312', 'Web Developer', 'employee'),
(18, 'Sophia Lee', 'sophia.l@example.com', 'passpasspass', 'e37e0e25686c2139b281a57a5b4906f2.jpg', 'Singapore', 'UX/UI design expert.', '9998887777', 'UX/UI Designer', 'employee'),
(25, 'Sophia Lee', 'sophia.l@example.com', 'passpasspass', 'pexels-simon-robben-614810.jpg', 'Singapore', 'UX/UI design expert.', '9998887777', 'UX/UI Designer', 'employee'),
(27, 'shamim', 'shamim@gmail.com', '123', 'e37e0e25686c2139b281a57a5b4906f2.jpg', 'Bangladesh', '<p>sadasdas</p>', '12312312312', 'Web Developer', 'employee'),
(28, 'sayem', 's@gmail.com', '123', 'e37e0e25686c2139b281a57a5b4906f2.jpg', 'Bangladesh', '<p>zdsa</p>', '12312312312', 'Web Developer', 'admin'),
(29, 'sohal', 'sa@gmail.com', '1234', 'pexels-simon-robben-614810.jpg', 'Bangladesh', '<p>ssdsfs</p>', '12312312312', 'Web Developer', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_title`, `cat_desc`, `cat_img`) VALUES
(1, 'Men', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dicta officiis quas vel quidem sit ducimus quo veniam, delectus inventore culpa unde aliquam molestias autem, nesciunt ratione reiciendis labore eveniet!</p>', 'men2.jpg'),
(2, 'Women', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dicta officiis quas vel quidem sit ducimus quo veniam, delectus inventore culpa unde aliquam molestias autem, nesciunt ratione reisadciendis labore eveniet!</p>', 'women.jpg'),
(3, 'Kids', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dicta officiis quas vel quidem sit ducimus quo veniam, delectus inventore culpa unde aliquam molestias autem, nesciunt ratione reiciendis labore eveniet!\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `copyright`
--

CREATE TABLE `copyright` (
  `co_id` int(11) NOT NULL,
  `co_txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `copyright`
--

INSERT INTO `copyright` (`co_id`, `co_txt`) VALUES
(1, '<p>&copy;2023 Go Online LTD All Rights Reverse.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `custmer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `custmer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(23, 'Jane Smith', 'jane@example.com', 'hashed_password', 'Canada', 'Toronto', '9876543210', '456 Elm St', 'd1.jpeg', '10.0.0.2'),
(38, 'Sahel', 'sahel@gmail.com', '123', 'Bangladesh', 'Dhaka', '12312312312', 'Dhaka', 'e37e0e25686c2139b281a57a5b4906f2.jpg', '::1'),
(39, 'hasan oni', 'hasaninteshar@gmail.com', '1234', 'Bangladesh', 'Dhaka', '12312312312', 'Dhaka', 'e37e0e25686c2139b281a57a5b4906f2.jpg', '::1'),
(43, 'Hasan oni', 'admin@gmail.com', '123', 'Bangladesh', 'Dhaka', '12312312312', 'Dhaka', 'pexels-simon-robben-614810.jpg', '::1'),
(44, 'sumi', 'sumi@gmail.com', '123', 'Bangladesh', 'Dhaka', '13324342324', 'dhaka', 'pexels-simon-robben-614810.jpg', '127.0.0.1'),
(45, 'saif', 's@gmail.com', '1234', 'Bangladesh', 'Dhaka', '13324342324', 'Banasree,Dhaka', 'e37e0e25686c2139b281a57a5b4906f2.jpg', '127.0.0.1'),
(46, 'hamim', 'hamim@gmail.com', '$2y$10$3InmvnB1KrxTdUTc5nV9ueCzjjrQhreWV2Zed5CBNkpenkzh.FnUy', 'Bangladesh', 'Dhaka', '13324342324', 'Banasree,Dhaka', 'e37e0e25686c2139b281a57a5b4906f2.jpg', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(74, 37, 28080, 496979730, 3, 'Small', '2024-01-17', 'Delivered'),
(75, 37, 8480, 496979730, 2, 'Small', '2024-01-17', 'pending'),
(76, 39, 10080, 1784590187, 1, 'Small', '2024-01-17', 'Delivered'),
(77, 43, 37080, 1063353860, 4, 'Small', '2024-01-19', 'Delivered'),
(78, 43, 16480, 359780873, 4, 'Small', '2024-01-19', 'Complete'),
(79, 44, 9120, 1182221710, 9, 'Small', '2024-01-22', 'Delivered'),
(80, 45, 48480, 54845872, 12, 'Small', '2024-01-23', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `find`
--

CREATE TABLE `find` (
  `f_id` int(11) NOT NULL,
  `f_txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `find`
--

INSERT INTO `find` (`f_id`, `f_txt`) VALUES
(1, '<p><strong>Go Online Ltd.</strong><br />Contact: 012123122133<br />goonline@gmail.com<br />Shamim</p>');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(255) NOT NULL,
  `light_logo` text NOT NULL,
  `dark_logo` text NOT NULL,
  `footer_logo` text NOT NULL,
  `favicon_logo` text NOT NULL,
  `admin_logo` text NOT NULL,
  `site_name` text NOT NULL,
  `loading` text NOT NULL,
  `status` text NOT NULL,
  `maintain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `light_logo`, `dark_logo`, `footer_logo`, `favicon_logo`, `admin_logo`, `site_name`, `loading`, `status`, `maintain`) VALUES
(2, 'logo-no-background.png', 'zd.png', 'logo-no-background.png', 'logo-png.png', 'logo-no-background.png', 'Go Online', 'asz.gif', 'Active', 'cvbvc.gif');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` int(11) NOT NULL,
  `n_txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`n_id`, `n_txt`) VALUES
(1, '<p>E-commerce Trends: New ways people shop online&mdash;think social commerce and voice-activated buying. Supply Chain Innovations: Tech that\'s reshaping how products move from seller to buyer. Customer Personalization: Tailoring shopping experiences to individual preferences.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(11, 533504333, 90900, 'Bkash', 234324, 1223, '21/2/23'),
(12, 1664577626, 1272, 'Nagad', 234324, 2131, '12/2/3'),
(13, 412989341, 64384, 'Bkash', 3232, 1213, '2023-12-24'),
(14, 1691371093, 0, 'Mobile Banking', 12321, 12312, '2023-12-30'),
(15, 591032050, 0, 'Mobile Banking', 3232, 1213, '2024-01-07'),
(16, 1711774578, 12000, 'Bkash', 3232, 1232, '2024-01-07'),
(17, 496979730, 7488, 'Bkash', 3232, 1213, '2024-01-17'),
(18, 1784590187, 10080, 'Bkash', 3232, 1213, '2024-01-17'),
(19, 1063353860, 37080, 'Bkash', 3232, 1213, '2024-01-19'),
(20, 359780873, 16480, 'Bkash', 3232, 1213, '2024-01-19'),
(21, 1182221710, 9120, 'Bkash', 12321, 2131, '2024-01-22'),
(22, 54845872, 48480, 'Bkash', 234324, 12312, '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(74, 37, 496979730, '47', 3, 'Small', 'Delivered'),
(75, 37, 496979730, '49', 2, 'Small', 'pending'),
(76, 39, 1784590187, '47', 1, 'Small', 'Delivered'),
(77, 43, 1063353860, '47', 4, 'Small', 'Delivered'),
(78, 43, 359780873, '40', 4, 'Small', 'Complete'),
(79, 44, 1182221710, '54', 9, 'Small', 'Delivered'),
(80, 45, 54845872, '49', 12, 'Small', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `pol_id` int(11) NOT NULL,
  `pol_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`pol_id`, `pol_text`) VALUES
(1, '<h1 style=\"text-align: center;\"><code><strong>Privacy Policy for [GO ONLINE]</strong></code></h1>\r\n<h3 style=\"text-align: center;\"><code><strong>Effective Date: [17.01.2024]</strong></code></h3>\r\n<h3 style=\"text-align: left;\"><strong><span style=\"text-decoration: underline;\">1. Introduction</span></strong></h3>\r\n<p>Welcome to GO ONLINE. This Privacy Policy outlines our practices regarding the collection, use, and disclosure of personal information through our e-commerce website.</p>\r\n<h3><strong>2. Information We Collect</strong></h3>\r\n<p>2.1 <strong>Personal Information:</strong></p>\r\n<ul>\r\n<li>GO ONLINE</li>\r\n<li>Email: goonline@gmail.com</li>\r\n<li>Payment Type(credit card details,Mobile Banking, billing address)</li>\r\n</ul>\r\n<p>2.2 <strong>Non-Personal Information:</strong></p>\r\n<ul>\r\n<li>Local</li>\r\n<li>http://localhost/go/privacy.php</li>\r\n<li>24 Hours Active</li>\r\n</ul>\r\n<h3><strong>3. How We Use Your Information</strong></h3>\r\n<p>We use the collected information for the following purposes:</p>\r\n<ul>\r\n<li>Process and fulfill orders</li>\r\n<li>Communicate with customers</li>\r\n<li>Improve our website and services</li>\r\n<li>Send promotional emails (with the option to opt-out)</li>\r\n</ul>\r\n<h3><strong>4. Information Sharing and Disclosure</strong></h3>\r\n<p>We do not sell, trade, or rent your personal information to third parties. However, we may share information with trusted service providers who assist us in operating our website, conducting our business, or servicing you.</p>\r\n<h3><strong>5. Cookies and Tracking Technologies</strong></h3>\r\n<p>We use cookies and similar technologies to track the activity on our website and hold certain information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent.</p>\r\n<h3><strong>6. Security</strong></h3>\r\n<p>We implement reasonable security measures to protect your personal information. However, no method of transmission over the internet or electronic storage is 100% secure.</p>\r\n<h3><strong>7. Your Choices</strong></h3>\r\n<p>You have the right to:</p>\r\n<ul>\r\n<li>Access, update, or delete your personal information</li>\r\n<li>Opt-out of receiving promotional emails</li>\r\n</ul>\r\n<h3><strong>8. Children\'s Privacy</strong></h3>\r\n<p>Our website is not directed at individuals under the age of 13. We do not knowingly collect personal information from children.</p>\r\n<h3><strong>9. Changes to This Privacy Policy</strong></h3>\r\n<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n<h3><strong>10. Contact Us</strong></h3>\r\n<p>If you have any questions about this Privacy Policy, please contact us at <strong>goonline@gmail.com</strong>.</p>\r\n<div class=\"flex flex-grow flex-col max-w-full\">\r\n<div class=\"min-h-[20px] text-message flex flex-col items-start gap-3 whitespace-pre-wrap break-words [.text-message+&amp;]:mt-5 overflow-x-auto\" data-message-author-role=\"assistant\" data-message-id=\"d325c925-aa2e-42d2-9762-63d5dcca203e\">\r\n<div class=\"result-streaming markdown prose w-full break-words dark:prose-invert dark\">\r\n<h3>Types of Data Collected</h3>\r\n<h2 style=\"text-align: center;\">Personal Data</h2>\r\n<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (\"Personal Data\"). Personally identifiable information may include, but is not limited to:</p>\r\n<ul>\r\n<li>Email address</li>\r\n<li>First name and last name</li>\r\n<li>Phone number</li>\r\n<li>Address, State, Province, ZIP/Postal code, City</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `s_quantity` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL,
  `proudct_label` text NOT NULL,
  `product_sale` int(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `s_quantity`, `product_keywords`, `product_desc`, `proudct_label`, `product_sale`, `status`) VALUES
(19, 5, 1, '2024-01-23 16:55:53', 'Man Polo', 'Man-Polo-1.jpg', 'Man-Polo-2.jpg', 'Man-Polo-3.jpg', 500, 8, 'casual', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quis, adipisci sunt? Aliquam error qui alias, magni quis quia eius ut, beatae laborum corporis repudiandae obcaecati laudantium animi quasi nam.</p>', 'Sale', 400, 'Active'),
(20, 21, 3, '2024-01-17 12:22:10', 'Puffer Coat', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg', 2500, 13, 'Hood', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga sed amet quas magni itaque! Pariatur incidunt ea tempora earum, totam quis odio ratione eos! Repellat vitae distinctio cum assumenda culpa.</p>', 'Sale', 2400, 'Active'),
(22, 1, 1, '2024-01-17 12:49:23', 'Merlin Jacket', 'Merlin-Enginner-Jacket.jpg', 'Merlin-Engineer-Jacket-3.jpg', 'Merlin-Engineer-Jacket-2.jpg', 5000, 12, 'Jackets', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga sed amet quas magni itaque! Pariatur incidunt ea tempora earum, totam quis odio ratione eos! Repellat vitae distinctio cum assumenda culpa.</p>', 'New', 0, 'Active'),
(29, 22, 3, '2024-01-17 11:56:18', 'Hijab Anak', 'hijab-anak-1.jpg', 'hijab-anak-2.jpg', 'hijab-anak-3.jpg', 600, 2, 'Hijab', '<p>Elvaluate your modest fashion with our exclusive collection of Hijabs. Explore a range of colors, fabrics,and styles designed to accentuate your elegance while embracing comfort and versatility in every piece</p>', 'New', 0, 'Active'),
(30, 1, 1, '2024-01-22 16:01:58', 'Jacket', 'jacket-1.jpg', 'jacket-2.jpg', 'jacket-3.jpg', 6000, 0, 'jacket', '<p>asdsaddeasdasddqw qw qwe qwdsaq</p>\r\n<p>qw qwwd qw&nbsp;</p>', 'Sale', 5500, 'Active'),
(31, 11, 2, '2024-01-17 11:56:21', 'Jacket women', 'new-jacket-women-1.jpg', 'new-jacket-women-2.jpg', 'new-jacket-women-3.jpg', 4000, 20, 'jacket', '<p>This is fully Warm Jacket.</p>', 'New', 0, 'Active'),
(34, 11, 2, '2024-01-17 11:56:24', 'Mobile Power Jacket', 'Mobile-Power-Jacket.jpg', 'Mobile-Power-Jacket-2.jpg', 'Mobile-Power-Jacket-3.jpg', 2000, 20, 'jacket', '<p>Quality Good Product.</p>', 'New', 0, 'Active'),
(35, 14, 2, '2024-01-23 16:59:16', 'swan blouse', 'swan-blouse-3.jpg', 'swan-blouse-2.jpg', 'black-swan-blouse.jpg', 4000, 10, 'Coats,blouse', '<p>Quality Product.</p>', 'Sale', 3200, 'Active'),
(36, 12, 2, '2024-01-23 16:58:07', 'Tshirt', 'g-polos-tshirt-1.jpg', 'g-polos-tshirt-2.jpg', 'product-1.jpg', 600, 17, 'tshirt', '<p>Good Quality Tshirt.</p>', 'Sale', 500, 'Active'),
(37, 14, 2, '2024-01-27 16:59:54', 'waxed cotto coat', 'waxed-cotton-coat-woman-2.jpg', 'waxed-cotton-coat-woman-1.jpg', 'waxed-cotton-coat-woman-3.jpg', 2500, 18, 'Coats Women', '<p>Enhance Your Style With Our Waxed Cotton Coat...</p>', 'Sale', 2400, 'Active'),
(40, 13, 2, '2024-01-23 16:24:46', 'Shalwar Kameez', 'pexels-samarth-singhai-1193943.jpg', 'pexels-samarth-singhai-1193942.jpg', 'pexels-samarth-singhai-1193943.jpg', 4000, 5, 'shaloar,kameez', '<p>&nbsp;</p>\r\n<div class=\"flex flex-grow flex-col max-w-full\">\r\n<div class=\"min-h-[20px] text-message flex flex-col items-start gap-3 whitespace-pre-wrap break-words [.text-message+&amp;]:mt-5 overflow-x-auto\" data-message-author-role=\"assistant\" data-message-id=\"77bddbb1-b901-48c8-80f7-ea1b9ecae76d\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert dark\">\r\n<p>\"Shalwar kameez\" is a traditional South Asian outfit consisting of a long tunic or shirt (kameez) paired with baggy trousers (shalwar) and often complemented with a scarf or shawl (dupatta).</p>\r\n</div>\r\n</div>\r\n</div>', 'New', 0, 'Active'),
(41, 13, 2, '2024-01-17 11:56:33', 'Green Dress', 'pexels-anne-985635.jpg', 'pexels-anne-985639.jpg', 'pexels-anne-985685.jpg', 1300, 14, 'Dress', '<p>qwdsadsadsadsaczxczxczxcdaxzcdcdzczxcasdccadsadascx zx zxczxczxcx</p>', 'New', 0, 'Active'),
(43, 8, 1, '2024-01-17 11:56:35', 'Tshirt', 'b6.jpg', 'f6.jpg', 's6.jpg', 500, 23, 'tshirt', '<p>sadasd</p>', 'New', 0, 'Active'),
(46, 4, 1, '2024-01-17 11:56:37', 'Coat', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 4000, 12, 'Coat', '<p>edasas</p>', 'New', 0, 'Active'),
(47, 4, 1, '2024-01-23 16:45:50', 'Coat', 'man-brown-coat-with-coffee.jpg', 'man-coat-outside.jpg', 'man-model-coat-outside.jpg', 12000, 5, 'Coat', '<p>asdsada</p>', 'Sale', 9000, 'Active'),
(48, 3, 1, '2024-01-17 12:45:08', 'Shoe', 'pexels-melvin-buezo-2529148.jpg', 'pexels-melvin-buezo-2529146.jpg', 'pexels-melvin-buezo-2529147.jpg', 2200, 12, 'Shoe', '<p>sadasdsa</p>', 'New', 0, 'Active'),
(49, 16, 2, '2024-01-23 16:46:20', 'Rain Boot', 'pexels-mehmet-ali-turan-6001070.jpg', 'pexels-mehmet-ali-turan-6001074.jpg', 'pexels-mehmet-ali-turan-6001069.jpg', 4000, 1, 'Shoe', '<p>asdsa</p>', 'New', 0, 'Active'),
(50, 16, 2, '2024-01-17 11:56:45', 'High Heels', 'High Heels Women Pantofel Brukat-1.jpg', 'High Heels Women Pantofel Brukat-2.jpg', 'High Heels Women Pantofel Brukat-3.jpg', 600, 12, 'jacket', '<p>ffdgtrrfdgretsdf</p>', 'Sale', 500, 'Active'),
(51, 2, 1, '2024-01-17 11:56:46', 'Belt', 'Mont-Blanc-Belt-man-1.jpg', 'Mont-Blanc-Belt-man-2.jpg', 'Mont-Blanc-Belt-man-3.jpg', 600, 12, 'belt', '<p>sdfsf</p>', 'New', 0, 'Active'),
(52, 8, 1, '2024-01-23 16:41:39', 'Grey T-shirt', 'grey-man-1.jpg', 'grey-man-3.jpg', 'grey-man-2.jpg', 600, 13, 'Tshirt', '<p>sdsdssd</p>', 'New', 0, 'Active'),
(53, 1, 1, '2024-01-23 16:41:39', 'Levis Jacket', 'levis-Trucker-Jacket.jpg', 'levis-Trucker-Jacket-2.jpg', 'levis-Trucker-Jacket-3.jpg', 4000, 11, 'jacket', '<p>sdsfdsf</p>', 'New', 0, 'Active'),
(54, 15, 2, '2024-01-23 16:22:33', 'Ring', 'women-diamond-heart-ring-3.jpg', 'women-diamond-heart-ring-2.jpg', 'women-diamond-heart-ring-1.jpg', 1200, 3, 'ring', '<p>sadsadasdasdas</p>', 'Sale', 1000, 'Active'),
(55, 11, 2, '2024-01-23 16:56:47', 'Merlin Jacket', 'Red-Winter-jacket-1.jpg', 'Red-Winter-jacket-2.jpg', 'Red-Winter-jacket-3.jpg', 1000, 8, 'Jackets', '<p>dsacxgddffdzdfd</p>', 'Sale', 800, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `product_catagories`
--

CREATE TABLE `product_catagories` (
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  `p_c_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_catagories`
--

INSERT INTO `product_catagories` (`p_cat_id`, `cat_id`, `p_cat_title`, `p_cat_desc`, `p_c_img`) VALUES
(1, 1, 'Jackets', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dicta officiis quas vel quidem sit ducimus quo veniam, delectus inventore culpa unde aliquam molestias autem, nesciunt ratione reiciendis labore eveniet!</p>', '1.png'),
(2, 1, 'Accessories', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dicta officiis quas vel quidem sit ducimus quo veniam, delectus inventore culpa unde aliquam molestias autem, nesciunt ratione reiciendis labore eveniet!</p>', 'sadsasaada.png'),
(3, 1, 'Shoes', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dicta officiis quas vel quidem sit ducimus quo veniam, delectus inventore culpa unde aliquam molestias autem, nesciunt ratione reiciendis labore eveniet!</p>', 'dgfdg.png'),
(4, 1, 'Coats', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dicta officiis quas vel quidem sit ducimus quo veniam, delectus inventore culpa unde aliquam molestias autem, nesciunt ratione reiciendis labore eveniet!\r\n', '4.png'),
(8, 1, 'Tshirt', '<p>sadas</p>', 'sadasdsad.png'),
(11, 2, 'Jackets', '<p>sadsadasdscxsddasf</p>', '1.png'),
(12, 2, 'Tshirt', '<p>asdas</p>', 'sadasdsad.png'),
(13, 2, 'Shalwar Kameez', '<p>asd</p>', 'Untitled design(35).png'),
(14, 2, 'Coat', '<p>dsfds</p>', 'jacket.png'),
(15, 2, 'Accessories', '<p>dfsdf</p>', '2.png'),
(16, 2, 'Shoes', '<p>wads</p>', 'asd.png'),
(17, 3, 'Tshirt', '<p>sadsa</p>', '5.png'),
(18, 3, 'Pant', '<p>sadas</p>', 'sadds.png'),
(19, 1, 'Pant', '<p>sdad</p>', 'sadds.png'),
(20, 2, 'Pant', '<p>asdsa</p>', 'sadds.png'),
(21, 3, 'Jacket', '<p>asd</p>', '1.png'),
(22, 3, 'Hijab', '<p>sad</p>', '2.png'),
(23, 6, 'Tshirt', '<p>asdasdas</p>', '5.png'),
(24, 6, 'Jacket', '<p>sadsadsda</p>', 'cxvc.png'),
(25, 6, 'coats', '<p>sdsadsad</p>', '4.png'),
(26, 6, 'Hijab', '<p>sadasd</p>', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `c_image` text NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`review_id`, `product_id`, `customer_id`, `review_text`, `name`, `c_image`, `review_date`) VALUES
(76, 52, 43, 'dfgdfg', 'Hasan oni', 'pexels-simon-robben-614810.jpg', '2024-01-20 13:45:43'),
(77, 52, 43, 'dfgdfg', 'Hasan oni', 'pexels-simon-robben-614810.jpg', '2024-01-20 13:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `sliderr`
--

CREATE TABLE `sliderr` (
  `slider_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` varchar(100) NOT NULL,
  `sli_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliderr`
--

INSERT INTO `sliderr` (`slider_id`, `slide_name`, `slide_image`, `sli_desc`) VALUES
(1, 'Winter Sale', 'sadsa.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas nemo, reprehenderit consequatur beatae molestias provident voluptatibus aliquam vitae culpa enim veniam aut laboriosam soluta, aperiam, ut, illum. Consequatur, at eius.'),
(4, '10% Offer', 'sports-shoe-pair-design-illustration-generated-by-ai-01.jpeg.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas nemo, reprehenderit consequatur beatae molestias provident voluptatibus aliquam vitae culpa enim veniam aut laboriosam soluta, aperiam, ut, illum. Consequatur, at eius.'),
(5, 'Get Voucher', '3.png', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas nemo, reprehenderit consequatur beatae molestias provident voluptatibus aliquam vitae culpa enim veniam aut laboriosam soluta, aperiam, ut, illum. Consequatur, at eius.'),
(28, 'Top Selled', 'rgf.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas nemo, reprehenderit consequatur beatae molestias provident voluptatibus aliquam vitae culpa enim veniam aut laboriosam soluta, aperiam, ut, illum. Consequatur, at eius.'),
(29, 'Get Voucher', 'wr.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas nemo, reprehenderit consequatur beatae molestias provident voluptatibus aliquam vitae culpa enim veniam aut laboriosam soluta, aperiam, ut, illum. Consequatur, at eius.'),
(31, 'WInter Sale', 'off.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium sed perferendis laboriosam esse quo, quis atque praesentium quam soluta, minus? Voluptates libero voluptas numquam nisi enim minus amet error doloremque.'),
(39, '100% Original', '2.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium sed perferendis laboriosam esse quo, quis atque praesentium quam soluta, minus? Voluptates libero voluptas numquam nisi enim minus amet error doloremque.'),
(41, 'winter', 'slider-number-9.jpg', 'loremasd hksadnkn ujshadjsa');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `so_id` int(11) NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `insta` text NOT NULL,
  `googleplus` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`so_id`, `facebook`, `twitter`, `insta`, `googleplus`, `message`) VALUES
(1, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://support.google.com/answer/2451065?hl=en', 'https://messages.google.com/web/authentication');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `copyright`
--
ALTER TABLE `copyright`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `find`
--
ALTER TABLE `find`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`pol_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_catagories`
--
ALTER TABLE `product_catagories`
  ADD PRIMARY KEY (`p_cat_id`),
  ADD UNIQUE KEY `p_cat_id` (`p_cat_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sliderr`
--
ALTER TABLE `sliderr`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`so_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `copyright`
--
ALTER TABLE `copyright`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `find`
--
ALTER TABLE `find`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `pol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_catagories`
--
ALTER TABLE `product_catagories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `sliderr`
--
ALTER TABLE `sliderr`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
