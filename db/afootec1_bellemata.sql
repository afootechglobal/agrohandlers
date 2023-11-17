-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 08:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afootec1_bellemata`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart_backup_tab`
--

CREATE TABLE `add_to_cart_backup_tab` (
  `sn` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `product_cat_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `puchase_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `product_qty` int(11) NOT NULL,
  `available_qty` int(11) NOT NULL,
  `outstanding_qty` int(11) NOT NULL,
  `gross_price` double NOT NULL,
  `sub_price` double NOT NULL,
  `sub_profit` double NOT NULL,
  `status_id` varchar(20) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart_tab`
--

CREATE TABLE `add_to_cart_tab` (
  `sn` int(11) NOT NULL,
  `shop_session` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `sub_price` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `alert_tab`
--

CREATE TABLE `alert_tab` (
  `sn` int(11) NOT NULL,
  `alert_id` varchar(255) NOT NULL,
  `alert_detail` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `computer` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `seen_status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tab`
--

CREATE TABLE `blog_tab` (
  `sn` int(11) NOT NULL,
  `blog_id` varchar(20) NOT NULL,
  `cat_id` varchar(20) NOT NULL,
  `title` mediumtext NOT NULL,
  `summary` mediumtext NOT NULL,
  `detail` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `date_of_reg` datetime NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_view_tab`
--

CREATE TABLE `blog_view_tab` (
  `sn` int(11) NOT NULL,
  `blog_id` varchar(50) NOT NULL,
  `session` varchar(100) NOT NULL,
  `system` varchar(100) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_tab`
--

CREATE TABLE `job_tab` (
  `sn` int(11) NOT NULL,
  `job_id` varchar(20) NOT NULL,
  `title` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `date_of_reg` datetime NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_tab`
--

INSERT INTO `job_tab` (`sn`, `job_id`, `title`, `description`, `status_id`, `user_id`, `date_of_reg`, `last_updated`) VALUES
(1, 'JOB001', 'POST OF IELTS TUTOR', '<p style=\"color: #7f8c8d; font-family: body_text; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; line-height: 18.75pt;\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><u><span style=\"font-size: 18pt; color: black;\">Job Summary</span></u><span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br />We are looking for a sales representative to maintain, develop, implement, track, optimize our financial operations and attend to our customers.</span></span></p>\n<p style=\"color: #7f8c8d; font-family: body_text; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; line-height: 18.75pt;\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><u><span style=\"font-size: 18pt; color: black;\">Address:</span></u><span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br /></span>SamKay Tech Centre, Shop 1, 178, Akarigbo Road, Sabo, Sagamu, Ogun State.<span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br /></span><u><span style=\"font-size: 18pt; color: black;\">Responsibilities</span></u><span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br />- Attend to our customers.</span></span></p>\n<p style=\"color: #7f8c8d; font-family: body_text; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; line-height: 18.75pt;\"><span style=\"font-size: 11.5pt; font-family: tahoma, arial, helvetica, sans-serif; color: #7f8c8d;\">- Implement financial policies and procedures.</span></p>\n<p style=\"color: #7f8c8d; font-family: body_text; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; line-height: 18.75pt;\"><span style=\"font-size: 11.5pt; font-family: tahoma, arial, helvetica, sans-serif; color: #7f8c8d;\">- Ensure daily postings of receipts, invoices and cheque requisition.<br />- Establish, maintain and reconcile the general ledger.<br />- Prepare and reconcile bank statements and petty cash account reconciliation.<br />- Preparation of VAT Schedule for remittance.<br />- Ensure transactions are properly recorded.<br />- Assist in the preparation of income statements.<br />- Assist in the preparation of financial reports.<br />- Involvement in monthly Trial Balance review.<br />- Effectively carrying out all other duties as may be assigned.</span></p>\n<p style=\"color: #7f8c8d; font-family: body_text; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; line-height: 18.75pt;\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><u><span style=\"font-size: 18pt; color: black;\">Basic Requirements</span></u><span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br />- B.Sc. /HND in Accounting.<br />- Sound knowledge&nbsp; ICT.<br />- At least 2 years of experience in the related fields.<br />- Good presentation skills.<br />- Good communication skills.<br />- Not more than 25 years of age.<br />- Additional advantage will be a pass.<br /><br /></span><u><span style=\"font-size: 17pt; color: black;\">Salary:</span></u><span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br /></span><span style=\"font-size: 14pt; color: black;\">ACTRACTIVE</span><span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br /><br /></span><u><span style=\"font-size: 18pt; color: black;\">Mode of Application</span></u><span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br />Applicant should apply online or submit his/her Curriculum Vitae and Cover letter to<br /></span><a style=\"text-decoration: none; color: inherit;\" href=\"mailto:ebonyworldcap99@gmail.com\"><span style=\"font-size: 11.5pt;\">info@samkaytechcentre.com</span></a></span></p>\n<p style=\"color: #7f8c8d; font-family: body_text; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; line-height: 18.75pt;\"><span style=\"font-family: tahoma, arial, helvetica, sans-serif;\"><u><span style=\"font-size: 18pt; color: black;\">Deadline</span></u><span style=\"font-size: 11.5pt; color: #7f8c8d;\"><br />Till the position is filled</span></span></p>', 'PUB', 'STAFF000', '2021-08-09 13:55:05', '2021-11-21 21:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_summary_tab`
--

CREATE TABLE `order_summary_tab` (
  `sn` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `nums_of_items` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `logistic_id` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `delivery_date` varchar(50) NOT NULL,
  `delivery_time_id` varchar(50) NOT NULL,
  `delivery_otp` varchar(50) NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `delivery_staff_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_tab`
--

CREATE TABLE `payment_tab` (
  `sn` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `payment_gateway_id` varchar(50) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `fund_method_id` varchar(20) NOT NULL,
  `sub_amount` double NOT NULL,
  `logistic_id` varchar(20) NOT NULL,
  `delivery_fee` double NOT NULL,
  `total_amount` double NOT NULL,
  `status_id` varchar(20) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories_pix_tab`
--

CREATE TABLE `product_categories_pix_tab` (
  `sn` int(11) NOT NULL,
  `product_cat_id` varchar(50) NOT NULL,
  `product_pix` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories_tab`
--

CREATE TABLE `product_categories_tab` (
  `sn` int(11) NOT NULL,
  `product_cat_id` varchar(50) NOT NULL,
  `product_cat_name` varchar(100) NOT NULL,
  `status_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_pix_tab`
--

CREATE TABLE `product_pix_tab` (
  `sn` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_pix` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_tab`
--

CREATE TABLE `product_tab` (
  `sn` int(11) NOT NULL,
  `product_cat_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_desc` text NOT NULL,
  `status_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration_otp_tab`
--

CREATE TABLE `registration_otp_tab` (
  `sn` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setup_backend_settings_tab`
--

CREATE TABLE `setup_backend_settings_tab` (
  `sn` int(11) NOT NULL,
  `backend_setting_id` varchar(10) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_username` varchar(100) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `support_email` varchar(100) NOT NULL,
  `delivery_fee` decimal(10,0) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `payment_key` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_backend_settings_tab`
--

INSERT INTO `setup_backend_settings_tab` (`sn`, `backend_setting_id`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `sender_name`, `support_email`, `delivery_fee`, `bank_name`, `account_name`, `account_number`, `payment_key`, `date`) VALUES
(1, 'BK_ID001', 'mail.applechoice.net', 'info@applechoice.net', '$ACL@2022.', 465, 'Bellemata', 'bellemata123@gmail.com', '2000', 'FIRST BANK PLC', 'PLUSHOME TECH LIMITED', '2041718223', 'pk_test_09fcc0f6384396b182684b8cc3841ab23068576d', '2022-06-05 18:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `setup_categories_tab`
--

CREATE TABLE `setup_categories_tab` (
  `sn` int(11) NOT NULL,
  `links` varchar(50) NOT NULL,
  `cat_id` varchar(20) NOT NULL,
  `cat_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_categories_tab`
--

INSERT INTO `setup_categories_tab` (`sn`, `links`, `cat_id`, `cat_desc`) VALUES
(1, 'BLOG', '001', 'CANADA IMMIGRATION'),
(2, 'BLOG', '002', 'STUDY IN CANADA'),
(3, 'BLOG', '003', 'GENERAL ANNOUNCEMENT'),
(4, 'BLOG', '004', 'VISA PROCESSING'),
(5, 'BLOG', '005', 'CANADA UPDATES'),
(6, 'BLOG', '006', 'APPLECOICE CANADA PROGRAMS');

-- --------------------------------------------------------

--
-- Table structure for table `setup_delivery_time_tab`
--

CREATE TABLE `setup_delivery_time_tab` (
  `sn` int(11) NOT NULL,
  `delivery_time_id` int(11) NOT NULL,
  `delivery_time_desc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup_delivery_time_tab`
--

INSERT INTO `setup_delivery_time_tab` (`sn`, `delivery_time_id`, `delivery_time_desc`) VALUES
(1, 1, '09:00AM - 11:00AM'),
(2, 2, '12:00 NOON - 02:00PM'),
(3, 3, '03:00PM - 05:00PM');

-- --------------------------------------------------------

--
-- Table structure for table `setup_fund_method_tab`
--

CREATE TABLE `setup_fund_method_tab` (
  `sn` int(11) NOT NULL,
  `fund_method_id` varchar(50) NOT NULL,
  `fund_method_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_fund_method_tab`
--

INSERT INTO `setup_fund_method_tab` (`sn`, `fund_method_id`, `fund_method_name`) VALUES
(1, 'FM001', 'DEBIT/CREDIT CARD'),
(2, 'FM002', 'PAY WITH WALLET'),
(5, 'FM003', 'BANK TRANSFER'),
(6, 'FM004', 'PAY ON DELIVERY'),
(7, 'FM005', 'PAY LATER');

-- --------------------------------------------------------

--
-- Table structure for table `setup_locations_tab`
--

CREATE TABLE `setup_locations_tab` (
  `sn` int(11) NOT NULL,
  `location_id` varchar(20) NOT NULL,
  `location_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup_locations_tab`
--

INSERT INTO `setup_locations_tab` (`sn`, `location_id`, `location_name`) VALUES
(1, 'LAGOS', 'LAGOS');

-- --------------------------------------------------------

--
-- Table structure for table `setup_logistics_tab`
--

CREATE TABLE `setup_logistics_tab` (
  `sn` int(11) NOT NULL,
  `logistic_id` varchar(5) NOT NULL,
  `logistic_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_logistics_tab`
--

INSERT INTO `setup_logistics_tab` (`sn`, `logistic_id`, `logistic_name`) VALUES
(1, 'P', 'PICK-UP'),
(2, 'D', 'DELIVERY');

-- --------------------------------------------------------

--
-- Table structure for table `setup_masters_tab`
--

CREATE TABLE `setup_masters_tab` (
  `sn` int(10) NOT NULL,
  `mast_id` varchar(100) NOT NULL,
  `mast_name` varchar(100) NOT NULL,
  `mast_val` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_masters_tab`
--

INSERT INTO `setup_masters_tab` (`sn`, `mast_id`, `mast_name`, `mast_val`) VALUES
(1, 'USER', 'USER ID COUNT', '0'),
(2, 'ALT', 'OPERATION ALERT', '0'),
(3, 'PRC', 'PRODUCT CATEGORY COUNT', '0'),
(5, 'TRC', 'TRANSACTIONS COUNT', '0'),
(6, 'STF', 'STAFF COUNT', '0'),
(7, 'PR', 'PRODUCT REGISTRATION COUNT', '0'),
(8, 'SH_ID', 'STOCK HISTORY ID', '0'),
(9, 'SHOP', 'SHOP SESSION COUNT', '0');

-- --------------------------------------------------------

--
-- Table structure for table `setup_role_tab`
--

CREATE TABLE `setup_role_tab` (
  `sn` int(10) UNSIGNED NOT NULL,
  `role_id` int(100) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_role_tab`
--

INSERT INTO `setup_role_tab` (`sn`, `role_id`, `role_name`) VALUES
(1, 1, 'STAFF'),
(2, 2, 'ADMIN'),
(3, 3, 'SUPER ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `setup_status_tab`
--

CREATE TABLE `setup_status_tab` (
  `sn` int(10) UNSIGNED NOT NULL,
  `status_id` varchar(100) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_status_tab`
--

INSERT INTO `setup_status_tab` (`sn`, `status_id`, `status_name`) VALUES
(1, 'A', 'ACTIVATE'),
(2, 'S', 'SUSPEND'),
(3, 'P', 'PENDING'),
(4, 'I', 'INACTIVE'),
(5, 'PUB', 'SAVE AND PUBLISH'),
(6, 'UNP', 'SAVE ONLY'),
(7, 'SUC', 'SUCCESS'),
(8, 'CCL', 'CANCELLED'),
(9, 'PP', 'PENDING'),
(10, 'PR', 'PROCESSING'),
(11, 'RD', 'READY'),
(12, 'DL', 'DELIVERED');

-- --------------------------------------------------------

--
-- Table structure for table `setup_transaction_type_tab`
--

CREATE TABLE `setup_transaction_type_tab` (
  `sn` int(11) NOT NULL,
  `transaction_type_id` varchar(50) NOT NULL,
  `transaction_type_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setup_transaction_type_tab`
--

INSERT INTO `setup_transaction_type_tab` (`sn`, `transaction_type_id`, `transaction_type_name`, `date`) VALUES
(1, 'CR', 'CREDIT', '2022-06-02 23:34:27'),
(2, 'DB', 'DEBIT', '2022-06-02 23:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tab`
--

CREATE TABLE `staff_tab` (
  `sn` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `job_id` varchar(50) NOT NULL,
  `role_id` varchar(100) NOT NULL,
  `status_id` varchar(100) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `othernames` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `cv_file` varchar(255) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tab`
--

INSERT INTO `staff_tab` (`sn`, `user_id`, `job_id`, `role_id`, `status_id`, `surname`, `othernames`, `dob`, `gender`, `religion`, `nationality`, `state`, `lga`, `address`, `mobile`, `email`, `passport`, `cv_file`, `otp`, `password`, `reg_date`, `last_login`) VALUES
(1, 'STF000', '', '3', 'A', 'MIKE AFOLABI OLUWAGBENGA', '', '', '', '', '', '', '', '', '08131252996', 'sunaf4real@gmail.com', '202205251124_afoo.jpg', '', '420436', '21232f297a57a5a743894a0e4a801fc3', '2021-08-17 17:48:40', '2022-06-05 19:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `stock_history_tab`
--

CREATE TABLE `stock_history_tab` (
  `sn` int(11) NOT NULL,
  `stock_history_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `available_qty` int(11) NOT NULL,
  `qty_loaded` int(11) NOT NULL,
  `stock_balance` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_tab`
--

CREATE TABLE `stock_tab` (
  `sn` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `purchase_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `profit` double NOT NULL,
  `available_qty` int(11) NOT NULL,
  `outstanding_qty` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_tab`
--

CREATE TABLE `user_tab` (
  `sn` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `wallet_balance` double NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `status_id` varchar(5) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_tab`
--

CREATE TABLE `user_wallet_tab` (
  `sn` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `payment_gateway_id` varchar(50) NOT NULL,
  `balance_before` double NOT NULL,
  `amount` double NOT NULL,
  `balance_after` double NOT NULL,
  `transaction_type_id` varchar(50) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `status_id` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart_backup_tab`
--
ALTER TABLE `add_to_cart_backup_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `add_to_cart_tab`
--
ALTER TABLE `add_to_cart_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `alert_tab`
--
ALTER TABLE `alert_tab`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `seen_status` (`seen_status`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blog_tab`
--
ALTER TABLE `blog_tab`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blog_view_tab`
--
ALTER TABLE `blog_view_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `job_tab`
--
ALTER TABLE `job_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `order_summary_tab`
--
ALTER TABLE `order_summary_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `payment_tab`
--
ALTER TABLE `payment_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `product_categories_pix_tab`
--
ALTER TABLE `product_categories_pix_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `product_categories_tab`
--
ALTER TABLE `product_categories_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `product_pix_tab`
--
ALTER TABLE `product_pix_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `product_tab`
--
ALTER TABLE `product_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `registration_otp_tab`
--
ALTER TABLE `registration_otp_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_backend_settings_tab`
--
ALTER TABLE `setup_backend_settings_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_categories_tab`
--
ALTER TABLE `setup_categories_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_delivery_time_tab`
--
ALTER TABLE `setup_delivery_time_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_fund_method_tab`
--
ALTER TABLE `setup_fund_method_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_locations_tab`
--
ALTER TABLE `setup_locations_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_logistics_tab`
--
ALTER TABLE `setup_logistics_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_masters_tab`
--
ALTER TABLE `setup_masters_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_role_tab`
--
ALTER TABLE `setup_role_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_status_tab`
--
ALTER TABLE `setup_status_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_transaction_type_tab`
--
ALTER TABLE `setup_transaction_type_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_tab`
--
ALTER TABLE `staff_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `stock_history_tab`
--
ALTER TABLE `stock_history_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `stock_tab`
--
ALTER TABLE `stock_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `user_tab`
--
ALTER TABLE `user_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `user_wallet_tab`
--
ALTER TABLE `user_wallet_tab`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart_backup_tab`
--
ALTER TABLE `add_to_cart_backup_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_to_cart_tab`
--
ALTER TABLE `add_to_cart_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alert_tab`
--
ALTER TABLE `alert_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_tab`
--
ALTER TABLE `blog_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_view_tab`
--
ALTER TABLE `blog_view_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_tab`
--
ALTER TABLE `job_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_summary_tab`
--
ALTER TABLE `order_summary_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_tab`
--
ALTER TABLE `payment_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories_pix_tab`
--
ALTER TABLE `product_categories_pix_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories_tab`
--
ALTER TABLE `product_categories_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_pix_tab`
--
ALTER TABLE `product_pix_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tab`
--
ALTER TABLE `product_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration_otp_tab`
--
ALTER TABLE `registration_otp_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_backend_settings_tab`
--
ALTER TABLE `setup_backend_settings_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_categories_tab`
--
ALTER TABLE `setup_categories_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_delivery_time_tab`
--
ALTER TABLE `setup_delivery_time_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_fund_method_tab`
--
ALTER TABLE `setup_fund_method_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_locations_tab`
--
ALTER TABLE `setup_locations_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_logistics_tab`
--
ALTER TABLE `setup_logistics_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_masters_tab`
--
ALTER TABLE `setup_masters_tab`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setup_role_tab`
--
ALTER TABLE `setup_role_tab`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_status_tab`
--
ALTER TABLE `setup_status_tab`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setup_transaction_type_tab`
--
ALTER TABLE `setup_transaction_type_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff_tab`
--
ALTER TABLE `staff_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stock_history_tab`
--
ALTER TABLE `stock_history_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_tab`
--
ALTER TABLE `stock_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tab`
--
ALTER TABLE `user_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wallet_tab`
--
ALTER TABLE `user_wallet_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
