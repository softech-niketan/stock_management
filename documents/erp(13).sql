-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2021 at 11:05 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_tracking`
--

CREATE TABLE `bill_tracking` (
  `id` int(11) NOT NULL,
  `c_po_so_id` int(11) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `invoice_date` varchar(20) NOT NULL,
  `invoice_amount` varchar(10) NOT NULL,
  `tds_amount` varchar(12) NOT NULL,
  `less_tds_amount` varchar(12) NOT NULL,
  `stv_number` varchar(15) NOT NULL,
  `stv_amount` varchar(15) NOT NULL,
  `balance_amount` varchar(20) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `statement_booking_amount` varchar(15) NOT NULL,
  `payment_due_date_mk` varchar(20) NOT NULL,
  `payment_due_date_customer` varchar(20) DEFAULT NULL,
  `date_added` date NOT NULL,
  `time` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `id` int(11) NOT NULL,
  `customer_part_id` int(30) NOT NULL,
  `child_part_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `child_part`
--

CREATE TABLE `child_part` (
  `id` int(11) NOT NULL,
  `stock` float NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` text NOT NULL,
  `supplier_id` int(30) DEFAULT NULL,
  `part_rate` int(11) DEFAULT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(50) NOT NULL,
  `revision_remark` varchar(20) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `child_part_id` int(255) NOT NULL,
  `safty_buffer_stk` varchar(255) NOT NULL,
  `diagram` varchar(50) DEFAULT NULL,
  `quote` varchar(50) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `hsn_code` varchar(20) DEFAULT NULL,
  `part_drawing` text DEFAULT NULL,
  `ppap_document` text NOT NULL,
  `modal_document` text NOT NULL,
  `cad_file` text NOT NULL,
  `a_d` text NOT NULL,
  `q_d` text NOT NULL,
  `c_d` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_part`
--

INSERT INTO `child_part` (`id`, `stock`, `part_number`, `part_description`, `supplier_id`, `part_rate`, `revision_date`, `revision_no`, `revision_remark`, `uom_id`, `child_part_id`, `safty_buffer_stk`, `diagram`, `quote`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `hsn_code`, `part_drawing`, `ppap_document`, `modal_document`, `cad_file`, `a_d`, `q_d`, `c_d`) VALUES
(32, 0, 'A', 'a', NULL, NULL, '2021-10-03', 'a', 'a', 1, 1, 'a', NULL, NULL, 3, '2021-10-03', '04:28:04', '2021-10-03 10:58:04', NULL, 'a', '', '', '', '', '', '', ''),
(33, 0, 'b', 'b', NULL, NULL, '2021-10-03', '2', 'g', 1, 1, 'b', NULL, NULL, 3, '2021-10-03', '04:28:28', '2021-10-03 10:58:28', NULL, 'b', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `child_part_master`
--

CREATE TABLE `child_part_master` (
  `id` int(11) NOT NULL,
  `stock` float NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` text NOT NULL,
  `supplier_id` int(30) DEFAULT NULL,
  `part_rate` float DEFAULT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(50) NOT NULL,
  `revision_remark` varchar(20) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `child_part_id` int(255) NOT NULL,
  `safty_buffer_stk` varchar(255) NOT NULL,
  `diagram` varchar(50) DEFAULT NULL,
  `quote` varchar(50) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `hsn_code` varchar(20) DEFAULT NULL,
  `part_drawing` text NOT NULL,
  `ppap_document` text NOT NULL,
  `modal_document` text NOT NULL,
  `cad_file` text NOT NULL,
  `a_d` text NOT NULL,
  `q_d` text NOT NULL,
  `c_d` text NOT NULL,
  `quotation_document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_part_master`
--

INSERT INTO `child_part_master` (`id`, `stock`, `part_number`, `part_description`, `supplier_id`, `part_rate`, `revision_date`, `revision_no`, `revision_remark`, `uom_id`, `child_part_id`, `safty_buffer_stk`, `diagram`, `quote`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `hsn_code`, `part_drawing`, `ppap_document`, `modal_document`, `cad_file`, `a_d`, `q_d`, `c_d`, `quotation_document`) VALUES
(27, 0, 'A', 'a', 13, 99, '2021-10-03', '1', 'first', 1, 32, '', NULL, NULL, 3, '2021-10-03', '04:28:51', '2021-10-03 10:58:51', NULL, NULL, '', '', '', '', '', '', '', ''),
(29, 0, 'A', 'a', 14, 2, '2021-10-03', '1', 'first', 1, 32, '', NULL, NULL, 3, '2021-10-03', '04:29:22', '2021-10-03 10:59:22', NULL, NULL, '', '', '', '', '', '', '', ''),
(30, 0, 'A', 'a', 13, 18, '2021-10-12', '2', '2', 1, 32, '', NULL, NULL, 3, '2021-10-03', '04:29:55', '2021-10-03 10:59:55', NULL, NULL, '', '', '', '', '', '', '', ''),
(31, 0, 'A', 'a', 14, 91, '2021-10-03', '2', '22', 1, 32, '', NULL, NULL, 3, '2021-10-03', '04:30:09', '2021-10-03 11:00:09', NULL, NULL, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `shifting_address` varchar(255) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `gst_number` varchar(50) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_name`, `contact_person`, `billing_address`, `shifting_address`, `phone_no`, `gst_number`, `created_id`, `date`, `time`, `timestamp`, `deleted`) VALUES
(1, 'TULSI HYDRAULICS', 'Sanjay Shrivastawa', 'TULSI HYDRAULICS ,Gat No. 1371, Sonawane Wasti, Chikhali , Pune - 411062 ', 'TULSI HYDRAULICS ,Gat No. 1371, Sonawane Wasti, Chikhali , Pune - 411062 ', '7447783404', '27AAOFT6235C1Z2', 3, '2021-09-19', '12:10:56', '2021-09-17 05:13:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `consumable_item`
--

CREATE TABLE `consumable_item` (
  `id` int(11) NOT NULL,
  `part_number` varchar(30) NOT NULL,
  `part_description` varchar(30) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_code` varchar(30) NOT NULL,
  `billing_address` varchar(50) DEFAULT NULL,
  `shifting_address` varchar(255) NOT NULL,
  `payment_terms` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `gst_number` varchar(50) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0,
  `vendor_code` varchar(20) DEFAULT NULL,
  `pan_no` varchar(20) NOT NULL,
  `state_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_code`, `billing_address`, `shifting_address`, `payment_terms`, `state`, `gst_number`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `vendor_code`, `pan_no`, `state_no`) VALUES
(1, 'abc', '123', 'abc@gmail.com', 's', '23', 'd', 'd', 3, '2021-09-29', '08:38:22', '2021-09-29 03:08:22', 0, 'v-123', 'p123', ''),
(2, '23', '23', '23', '23', '23', '23', '23', 3, '2021-10-08', '08:53:27', '2021-10-08 03:23:27', 0, '23', '23', '23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_part`
--

CREATE TABLE `customer_part` (
  `id` int(11) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` text NOT NULL,
  `customer_id` int(30) NOT NULL,
  `revision_date` varchar(50) DEFAULT NULL,
  `customer_part_id` int(11) NOT NULL,
  `revision_no` varchar(255) DEFAULT NULL,
  `diagram` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL,
  `hsn_code` varchar(20) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `safety_stock` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part`
--

INSERT INTO `customer_part` (`id`, `part_number`, `part_description`, `customer_id`, `revision_date`, `customer_part_id`, `revision_no`, `diagram`, `model`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `revision_remark`, `hsn_code`, `uom`, `safety_stock`) VALUES
(1, 'A', 'f', 1, '2021-09-21', 1, '2', NULL, NULL, 1, '2021-09-05', '01:14:58', '2021-09-05 07:44:58', NULL, '2021-09-14', '', '', ''),
(2, 'P1', 'P1', 1, '2020-09-07', 1, '10', NULL, NULL, 3, '2021-10-08', '09:15:37', '2021-10-08 03:45:37', NULL, '', 'H1', 'NUMBER', '120'),
(3, 'c', 'c', 1, '2021-09-28', 1, 'c', NULL, NULL, 3, '2021-10-08', '09:39:23', '2021-10-08 04:09:23', NULL, '', 'c', 'c', '2'),
(4, 'b', 'b', 2, '2021-11-04', 1, '123', NULL, NULL, 3, '2021-10-08', '03:19:33', '2021-10-08 09:49:33', NULL, '', 'b', 'b', '2'),
(5, 'testoiing', 'testing', 1, NULL, 1, NULL, NULL, NULL, 3, '2021-10-10', '01:04:46', '2021-10-10 07:34:46', NULL, '', '123', '1231', '32');

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_documents`
--

CREATE TABLE `customer_part_documents` (
  `id` int(11) NOT NULL,
  `customer_master_id` int(11) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `customer_part_id` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `document_name` text NOT NULL,
  `document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part_documents`
--

INSERT INTO `customer_part_documents` (`id`, `customer_master_id`, `customer_id`, `customer_part_id`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `type`, `document_name`, `document`) VALUES
(1, 1, 1, 0, 3, '2021-10-10', '02:02:25', '2021-10-10 08:32:25', NULL, 'apqp', 'testing', 'group-22834@2x1.png'),
(2, 2, 1, 0, 3, '2021-10-10', '02:02:52', '2021-10-10 08:32:52', NULL, 'PPAP', 'testing2', 'style5.css');

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_drawing`
--

CREATE TABLE `customer_part_drawing` (
  `id` int(11) NOT NULL,
  `customer_master_id` varchar(255) NOT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(255) NOT NULL,
  `uploading_document` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL,
  `customer_part_id` int(11) NOT NULL,
  `drawing` text NOT NULL,
  `cad` text DEFAULT NULL,
  `model` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part_drawing`
--

INSERT INTO `customer_part_drawing` (`id`, `customer_master_id`, `revision_date`, `revision_no`, `uploading_document`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `revision_remark`, `customer_part_id`, `drawing`, `cad`, `model`) VALUES
(1, '1', '2021-09-29', '2', NULL, 3, '2021-10-10', '01:22:29', '2021-10-10 07:52:29', NULL, 'testing', 0, 'group-22834.png', 'group-22834@2x.png', 'group-22834@3x.png'),
(4, '1', '2021-09-11', '22', NULL, 3, '2021-10-10', '01:31:22', '2021-10-10 08:01:22', NULL, '123', 0, 'style4.css', 'group-22834@2x.png', 'group-22834@3x.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_operation`
--

CREATE TABLE `customer_part_operation` (
  `id` int(11) NOT NULL,
  `customer_master_id` varchar(255) NOT NULL,
  `operation_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(255) NOT NULL,
  `uploading_document` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL,
  `customer_part_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part_operation`
--

INSERT INTO `customer_part_operation` (`id`, `customer_master_id`, `operation_id`, `name`, `revision_date`, `revision_no`, `uploading_document`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `revision_remark`, `customer_part_id`) VALUES
(1, '1', 1, '', '2021-10-07', '20', NULL, 3, '2021-10-10', '02:12:49', '2021-10-10 08:42:49', NULL, '20', 0),
(2, '3', 1, '', '2021-10-05', '20', NULL, 3, '2021-10-10', '02:15:42', '2021-10-10 08:45:42', NULL, '20', 0),
(3, '5', 2, 'name2', '2021-03-02', '2', NULL, 3, '2021-10-10', '02:22:09', '2021-10-10 08:52:09', NULL, 'aa', 0),
(4, '5', 1, 'testing', '2021-09-29', '18', NULL, 3, '2021-10-10', '02:23:27', '2021-10-10 08:53:27', NULL, '18', 0),
(5, '4', 1, '2', '2021-11-02', '2', NULL, 3, '2021-10-10', '02:34:58', '2021-10-10 09:04:58', NULL, '20', 0),
(6, '4', 1, '213123', '2021-11-04', '123', NULL, 3, '2021-10-10', '02:35:06', '2021-10-10 09:05:06', NULL, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_rate`
--

CREATE TABLE `customer_part_rate` (
  `id` int(11) NOT NULL,
  `customer_master_id` varchar(255) NOT NULL,
  `rate` float DEFAULT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(255) NOT NULL,
  `uploading_document` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL,
  `customer_part_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part_rate`
--

INSERT INTO `customer_part_rate` (`id`, `customer_master_id`, `rate`, `revision_date`, `revision_no`, `uploading_document`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `revision_remark`, `customer_part_id`) VALUES
(2, '1', NULL, '2021-09-15', 's', NULL, 3, '2021-09-29', '09:04:33', '2021-09-29 03:34:33', NULL, '2021-09-29', 0),
(3, '1', NULL, '2021-03-18', '123', '7_sep.sql', 3, '2021-09-29', '09:05:45', '2021-09-29 03:35:45', NULL, '2021-09-15', 0),
(4, '1', NULL, '2021-10-07', '40', 'style.css', 3, '2021-10-08', '09:32:19', '2021-10-08 04:02:19', NULL, '20', 0),
(5, '3', NULL, '2021-10-06', '20', 'style1.css', 3, '2021-10-08', '09:45:28', '2021-10-08 04:15:28', NULL, '20', 0),
(6, '1', NULL, '2021-10-06', '21', 'style2.css', 3, '2021-10-08', '09:59:01', '2021-10-08 04:29:01', NULL, '20', 0),
(7, '2', NULL, '2021-10-06', '13', 'style3.css', 3, '2021-10-08', '10:00:10', '2021-10-08 04:30:10', NULL, '2', 0),
(8, '2', NULL, '2020-09-18', '11', '', 3, '2021-10-08', '10:05:51', '2021-10-08 04:35:51', NULL, '200', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_type`
--

CREATE TABLE `customer_part_type` (
  `id` int(11) NOT NULL,
  `customer_type_name` varchar(50) NOT NULL,
  `contractor_code` varchar(30) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_part_type`
--

INSERT INTO `customer_part_type` (`id`, `customer_type_name`, `contractor_code`, `created_id`, `date`, `time`, `timestamp`, `deleted`) VALUES
(1, 'test', NULL, 3, '2021-09-29', '08:38:34', '2021-09-29 03:08:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c_po_so`
--

CREATE TABLE `c_po_so` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `so_line` varchar(50) NOT NULL,
  `so_number` varchar(30) NOT NULL,
  `so_amt` varchar(30) NOT NULL,
  `so_desc` text NOT NULL,
  `advance_amt` varchar(10) DEFAULT NULL,
  `mode_of_payment` varchar(20) DEFAULT NULL,
  `bank_name` varchar(60) DEFAULT NULL,
  `cheque_rtgs_number` varchar(20) DEFAULT NULL,
  `date_of_cheque_rtgs` varchar(20) DEFAULT NULL,
  `amount_paid` varchar(20) DEFAULT NULL,
  `mode_payment_final` varchar(20) DEFAULT NULL,
  `bank_name_final_payment` varchar(50) DEFAULT NULL,
  `cheque_rtgs_number_final_pay` varchar(30) DEFAULT NULL,
  `date_of_cheque_rtgs_final_pay` varchar(30) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_tracking`
--

CREATE TABLE `dispatch_tracking` (
  `id` int(11) NOT NULL,
  `c_po_so_id` int(11) NOT NULL,
  `completed_date` varchar(15) DEFAULT NULL,
  `weight` varchar(8) DEFAULT NULL,
  `transporter_name` varchar(50) DEFAULT NULL,
  `vehicle_number` varchar(20) DEFAULT NULL,
  `lr_number` varchar(20) DEFAULT NULL,
  `dispatch_date` varchar(15) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grn_details`
--

CREATE TABLE `grn_details` (
  `id` int(11) NOT NULL,
  `inwarding_id` int(11) NOT NULL,
  `po_number` varchar(20) NOT NULL,
  `grn_number` varchar(30) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `part_id` int(11) NOT NULL,
  `inwarding_price` float NOT NULL,
  `po_part_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `verified_qty` float NOT NULL,
  `accept_qty` float NOT NULL,
  `reject_qty` float NOT NULL,
  `verfified_price` float NOT NULL,
  `verified_status` varchar(20) NOT NULL DEFAULT 'pending',
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_by` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn_details`
--

INSERT INTO `grn_details` (`id`, `inwarding_id`, `po_number`, `grn_number`, `invoice_number`, `part_id`, `inwarding_price`, `po_part_id`, `qty`, `verified_qty`, `accept_qty`, `reject_qty`, `verfified_price`, `verified_status`, `status`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`) VALUES
(1, 1, '23', '2021-9-1', '123', 17, 12744, 22, 100, 100, 100, 0, 12744, 'verified', 'pending', 3, '2021-09-22', '06:00:06', 22, 9, 2021),
(2, 1, '23', '2021-9-1', '123', 21, 32804, 26, 100, 100, 100, 0, 32804, 'verified', 'pending', 3, '2021-09-22', '06:00:22', 22, 9, 2021),
(3, 1, '23', '2021-9-1', '123', 18, 11564, 23, 100, 100, 90, 10, 11564, 'verified', 'pending', 3, '2021-09-22', '07:09:33', 22, 9, 2021),
(4, 1, '23', '2021-9-1', '123', 26, 19234, 24, 100, 100, 100, 0, 19234, 'verified', 'pending', 3, '2021-09-22', '07:09:43', 22, 9, 2021),
(5, 1, '23', '2021-9-1', '123', 20, 19470, 25, 100, 100, 50, 50, 19470, 'verified', 'pending', 3, '2021-09-22', '07:09:51', 22, 9, 2021),
(6, 1, '23', '2021-9-1', '123', 22, 12980, 27, 100, 100, 100, 0, 12980, 'verified', 'pending', 3, '2021-09-22', '07:10:02', 22, 9, 2021),
(7, 1, '23', '2021-9-1', '123', 23, 19352, 28, 100, 100, 50, 40, 19352, 'verified', 'pending', 3, '2021-09-22', '07:10:18', 22, 9, 2021),
(8, 1, '23', '2021-9-1', '123', 24, 19234, 29, 100, 100, 100, 20, 19234, 'verified', 'pending', 3, '2021-09-22', '07:10:23', 22, 9, 2021),
(9, 1, '23', '2021-9-1', '123', 24, 19234, 29, 100, 0, 0, 0, 0, 'pending', 'pending', 3, '2021-09-22', '07:10:23', 22, 9, 2021),
(10, 1, '23', '2021-9-1', '123', 25, 30680, 30, 100, 100, 100, 0, 30680, 'verified', 'pending', 3, '2021-09-22', '07:10:31', 22, 9, 2021),
(11, 1, '23', '2021-9-1', '123', 25, 30680, 30, 100, 0, 0, 0, 0, 'pending', 'pending', 3, '2021-09-22', '07:10:31', 22, 9, 2021),
(12, 2, '24', '2021-9-2', '213', 17, 637.2, 31, 5, 5, 5, 5, 637.2, 'verified', 'pending', 3, '2021-09-23', '08:04:09', 23, 9, 2021),
(13, 2, '24', '2021-9-2', '213', 24, 961.7, 34, 5, 5, 5, 5, 961.7, 'verified', 'pending', 3, '2021-09-23', '08:04:13', 23, 9, 2021),
(14, 3, '25', '2021-9-3', '213', 26, 192.34, 35, 1, 0, 0, 0, 0, 'pending', 'pending', 3, '2021-09-23', '09:27:00', 23, 9, 2021),
(15, 4, '23', '2021-9-4', '333', 17, 25488, 22, 200, 200, 200, 200, 25488, 'verified', 'pending', 3, '2021-09-24', '03:57:53', 24, 9, 2021),
(16, 4, '23', '2021-9-4', '333', 18, 23128, 23, 200, 200, 200, 200, 23128, 'verified', 'pending', 3, '2021-09-24', '04:15:43', 24, 9, 2021),
(17, 5, '23', '2021-9-5', '4444', 17, 12744, 22, 100, 0, 0, 0, 0, 'pending', 'pending', 3, '2021-09-25', '08:47:52', 25, 9, 2021),
(18, 5, '23', '2021-9-5', '4444', 17, 12744, 22, 100, 0, 0, 0, 0, 'pending', 'pending', 3, '2021-09-25', '08:48:06', 25, 9, 2021),
(19, 5, '23', '2021-9-5', '4444', 18, 5782, 23, 50, 0, 0, 0, 0, 'pending', 'pending', 3, '2021-09-25', '08:48:13', 25, 9, 2021),
(20, 6, '23', '2021-9-6', '43234', 17, 2854.66, 22, 22, 0, 0, 0, 0, 'pending', 'pending', 3, '2021-09-27', '08:51:39', 27, 9, 2021),
(21, 7, '23', '2021-9-7', '3334', 17, 1529.28, 22, 12, 0, 0, 0, 0, 'pending', 'pending', 3, '2021-09-27', '08:56:11', 27, 9, 2021),
(22, 8, '23', '2021-9-8', '12345', 17, 1401.84, 22, 11, 11, 10, 1, 1401.84, 'verified', 'pending', 3, '2021-09-27', '09:00:56', 27, 9, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `gst_structure`
--

CREATE TABLE `gst_structure` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float DEFAULT NULL,
  `igst` float DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` varchar(10) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gst_structure`
--

INSERT INTO `gst_structure` (`id`, `code`, `cgst`, `sgst`, `igst`, `created_by`, `created_date`, `deleted`) VALUES
(1, 'S9C9I0', 9, 9, 0, 3, '2021-09-17', 0),
(2, 'S0C0I18', 0, 0, 18, 3, '2021-09-17', 0),
(3, 'S14C14I0', 14, 14, 0, 3, '2021-09-17', 0),
(4, 'S6C6I0', 6, 6, 0, 3, '2021-09-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inwarding`
--

CREATE TABLE `inwarding` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `invoice_number` varchar(200) NOT NULL,
  `invoice_date` varchar(20) NOT NULL,
  `invoice_amount` float NOT NULL,
  `invoice_amount_status` varchar(20) NOT NULL DEFAULT 'pending',
  `grn_number` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inwarding`
--

INSERT INTO `inwarding` (`id`, `po_id`, `invoice_number`, `invoice_date`, `invoice_amount`, `invoice_amount_status`, `grn_number`, `created_date`, `created_month`, `created_day`, `created_year`, `status`) VALUES
(1, 23, '123', '2021-09-21', 227976, 'pending', '2021-9-1', '2021-09-22', 9, 22, 2021, 'accept'),
(2, 24, '213', '2021-09-23', 1598, 'pending', '2021-9-2', '2021-09-23', 9, 23, 2021, 'accept'),
(3, 25, '213', '2021-09-07', 192, 'pending', '2021-9-3', '2021-09-23', 9, 23, 2021, 'generate_grn'),
(4, 23, '333', '2021-09-21', 48616, 'pending', '2021-9-4', '2021-09-24', 9, 24, 2021, 'accept'),
(5, 23, '4444', '2021-09-15', 0, 'pending', '2021-9-5', '2021-09-24', 9, 24, 2021, 'pending'),
(6, 23, '43234', '2021-09-07', 2854.66, 'pending', '2021-9-6', '2021-09-27', 9, 27, 2021, ''),
(7, 23, '3334', '2021-10-06', 1529.28, 'pending', '2021-9-7', '2021-09-27', 9, 27, 2021, ''),
(8, 23, '12345', '2021-09-15', 1401.84, 'pending', '2021-9-8', '2021-09-27', 9, 27, 2021, 'accept'),
(9, 23, 'asd', '2021-10-20', 0, 'pending', '2021-22/0001', '2021-10-02', 10, 2, 2021, 'pending'),
(10, 23, '23123', '2021-10-06', 0, 'pending', '2021-22/0002', '2021-10-02', 10, 2, 2021, 'pending'),
(11, 28, 'asd', '2021-10-13', 0, 'pending', '2021-22/0003', '2021-10-05', 10, 5, 2021, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `slip_details` varchar(50) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `part_id` int(11) DEFAULT NULL,
  `oc_id` int(11) NOT NULL,
  `wbs_id` varchar(5) NOT NULL,
  `hus_id` varchar(5) NOT NULL,
  `item_quantity` varchar(12) NOT NULL,
  `issue_date` varchar(20) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loading_user`
--

CREATE TABLE `loading_user` (
  `id` int(11) NOT NULL,
  `po_number` varchar(20) NOT NULL,
  `so_number` varchar(30) NOT NULL,
  `contractor` varchar(20) NOT NULL,
  `project_number` varchar(20) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `target_date` varchar(15) NOT NULL,
  `completed_date` varchar(15) DEFAULT NULL,
  `wbs_id` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new_po`
--

CREATE TABLE `new_po` (
  `id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `po_date` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(12) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` varchar(20) NOT NULL,
  `created_year` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_po`
--

INSERT INTO `new_po` (`id`, `po_number`, `supplier_id`, `po_date`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `status`, `deleted`) VALUES
(23, 'TH/PUR/2021-22/00001', 12, '2021-09-21', 2021, '2021-09-21', '02:46:14', 21, '9', '2021', 'accpet', 0),
(24, 'TH/PUR/2021-22/00002', 10, '2021-09-23', 2021, '2021-09-23', '08:02:30', 23, '9', '2021', 'accpet', 0),
(25, 'TH/PUR/2021-22/00003', 10, '2021-09-23', 2021, '2021-09-23', '09:24:18', 23, '9', '2021', 'accpet', 0),
(26, 'TH/PUR/2021-22/00004', 10, '2021-09-27', 2021, '2021-09-27', '09:12:54', 27, '9', '2021', 'accpet', 0),
(27, 'TH/PUR/2021-22/00005', 10, '2021-09-27', 2021, '2021-09-27', '04:27:16', 27, '9', '2021', 'pending', 0),
(28, 'TH/PUR/2021-22/00006', 13, '2021-10-03', 2021, '2021-10-03', '04:30:30', 3, '10', '2021', 'accpet', 0),
(29, 'TH/PUR/2021-22/00007', 14, '2021-10-21', 2021, '2021-10-03', '04:34:19', 3, '10', '2021', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `name`, `created_by`, `created_date`, `created_time`, `deleted`) VALUES
(1, 'OP10', 3, '2021-09-17', '10:40:04', 0),
(2, 'OP20', 3, '2021-09-17', '10:40:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `other_data`
--

CREATE TABLE `other_data` (
  `id` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `part_creation`
--

CREATE TABLE `part_creation` (
  `id` int(11) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` varchar(255) NOT NULL,
  `internal_part_number` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `sub_group_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `part_drawing` text NOT NULL,
  `ppap_document` text DEFAULT NULL,
  `modal_document` text DEFAULT NULL,
  `cad_file` text DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `revision_number` varchar(20) DEFAULT NULL,
  `size_id` varchar(200) DEFAULT NULL,
  `revision_date` varchar(10) DEFAULT NULL,
  `revision_remark` varchar(20) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `a_d` text DEFAULT NULL,
  `q_d` text DEFAULT NULL,
  `c_d` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `part_operations`
--

CREATE TABLE `part_operations` (
  `id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `operation_description` varchar(30) DEFAULT NULL,
  `drawing` text NOT NULL,
  `revision_number` varchar(20) NOT NULL,
  `revision_remark` varchar(20) NOT NULL,
  `revision_date` varchar(20) NOT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `created_time` varchar(20) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `part_type`
--

CREATE TABLE `part_type` (
  `id` int(11) NOT NULL,
  `part_type_name` varchar(50) NOT NULL,
  `contractor_code` varchar(30) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_type`
--

INSERT INTO `part_type` (`id`, `part_type_name`, `contractor_code`, `created_id`, `date`, `time`, `timestamp`, `deleted`) VALUES
(1, 'Direct', NULL, 3, '2021-09-17', '10:46:59', '2021-09-17 05:16:59', 0),
(2, 'Indirect', NULL, 3, '2021-09-17', '10:47:05', '2021-09-17 05:17:05', 0),
(3, 'Job work', NULL, 3, '2021-09-17', '10:47:12', '2021-09-17 05:17:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `planing`
--

CREATE TABLE `planing` (
  `id` int(11) NOT NULL,
  `financial_year` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `customer_part_id` int(11) NOT NULL,
  `shortage_qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `planing_data`
--

CREATE TABLE `planing_data` (
  `id` int(11) NOT NULL,
  `planing_id` int(11) NOT NULL,
  `child_part_id` int(11) NOT NULL,
  `bom_qty` int(11) NOT NULL,
  `schedule_qty` int(11) NOT NULL,
  `required_qty` int(11) NOT NULL,
  `actual_stock` int(11) NOT NULL,
  `shortage_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `po_details`
--

CREATE TABLE `po_details` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `po_number` varchar(30) NOT NULL,
  `type_of_sale` varchar(20) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `po_parts`
--

CREATE TABLE `po_parts` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `delivery_date` varchar(10) NOT NULL,
  `expiry_date` varchar(20) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `pending_qty` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `invoice_number` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_parts`
--

INSERT INTO `po_parts` (`id`, `po_id`, `po_number`, `supplier_id`, `part_id`, `tax_id`, `uom_id`, `delivery_date`, `expiry_date`, `qty`, `pending_qty`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `deleted`, `invoice_number`) VALUES
(22, 23, 'TH/PUR/2021-22/00001', 12, 17, 2, 1, '2021-10-05', '2021-10-30', 500, 54.6, 3, '2021-09-21', '02:48:53', 21, 9, 2021, 0, NULL),
(23, 23, 'TH/PUR/2021-22/00001', 12, 18, 2, 1, '2021-10-05', '2021-10-30', 350, 10, 3, '2021-09-21', '02:50:01', 21, 9, 2021, 0, NULL),
(24, 23, 'TH/PUR/2021-22/00001', 12, 26, 2, 1, '2021-10-05', '2021-10-30', 500, 400, 3, '2021-09-21', '02:51:05', 21, 9, 2021, 0, NULL),
(25, 23, 'TH/PUR/2021-22/00001', 12, 20, 2, 1, '2021-10-05', '2021-10-30', 150, 100, 3, '2021-09-21', '02:52:36', 21, 9, 2021, 0, NULL),
(26, 23, 'TH/PUR/2021-22/00001', 12, 21, 2, 1, '2021-10-05', '2021-10-30', 200, 100, 3, '2021-09-21', '02:53:59', 21, 9, 2021, 0, NULL),
(27, 23, 'TH/PUR/2021-22/00001', 12, 22, 2, 1, '2021-10-05', '2021-10-30', 150, 50, 3, '2021-09-21', '02:55:23', 21, 9, 2021, 0, NULL),
(28, 23, 'TH/PUR/2021-22/00001', 12, 23, 2, 1, '2021-10-05', '2021-10-30', 400, 350, 3, '2021-09-21', '02:56:30', 21, 9, 2021, 0, NULL),
(29, 23, 'TH/PUR/2021-22/00001', 12, 24, 2, 1, '2021-10-05', '2021-10-30', 150, 50, 3, '2021-09-21', '02:57:29', 21, 9, 2021, 0, NULL),
(30, 23, 'TH/PUR/2021-22/00001', 12, 25, 2, 1, '2021-10-05', '2021-10-30', 100, 0, 3, '2021-09-21', '02:58:56', 21, 9, 2021, 0, NULL),
(31, 24, 'TH/PUR/2021-22/00002', 10, 17, 1, 1, '2021-09-07', '2021-09-20', 20, 15, 3, '2021-09-23', '08:02:39', 23, 9, 2021, 0, NULL),
(32, 24, 'TH/PUR/2021-22/00002', 10, 18, 4, 1, '2021-09-01', '2021-09-07', 21, 21, 3, '2021-09-23', '08:02:47', 23, 9, 2021, 0, NULL),
(33, 24, 'TH/PUR/2021-22/00002', 10, 26, 3, 1, '2021-09-06', '2021-10-05', 21, 21, 3, '2021-09-23', '08:02:57', 23, 9, 2021, 0, NULL),
(34, 24, 'TH/PUR/2021-22/00002', 10, 24, 2, 1, '2021-09-14', '2021-09-13', 21, 16, 3, '2021-09-23', '08:03:14', 23, 9, 2021, 0, NULL),
(35, 25, 'TH/PUR/2021-22/00003', 10, 26, 1, 1, '2021-09-07', '2021-08-31', 2, 2, 3, '2021-09-23', '09:24:31', 23, 9, 2021, 0, NULL),
(36, 26, 'TH/PUR/2021-22/00004', 10, 17, 1, 1, '2021-09-14', '2021-09-06', 600, 23, 3, '2021-09-27', '09:13:01', 27, 9, 2021, 0, NULL),
(37, 27, 'TH/PUR/2021-22/00005', 10, 17, 1, 1, '2021-09-28', '2021-09-28', 210, 210, 3, '2021-09-27', '04:28:11', 27, 9, 2021, 0, NULL),
(38, 28, 'TH/PUR/2021-22/00006', 13, 30, 1, 1, '2021-10-04', '2021-10-15', 21, 21, 3, '2021-10-03', '04:47:27', 3, 10, 2021, 0, NULL),
(39, 29, 'TH/PUR/2021-22/00007', 14, 31, 3, 1, '2021-09-28', '2021-10-13', 89, 89, 3, '2021-10-03', '04:48:47', 3, 10, 2021, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `part_id` varchar(15) DEFAULT NULL,
  `supplier_id` varchar(50) NOT NULL,
  `uom_id` varchar(50) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `delivery_date` varchar(20) DEFAULT NULL,
  `shipping_method` varchar(15) DEFAULT NULL,
  `part_type_id` varchar(255) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `po_validity_date` varchar(50) NOT NULL,
  `cgst_id` varchar(50) NOT NULL,
  `igst_id` varchar(50) NOT NULL,
  `sgst_id` varchar(50) NOT NULL,
  `created_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `supplier_invoice_number` varchar(30) NOT NULL,
  `part_id` varchar(5) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `rate` varchar(12) NOT NULL,
  `invoice_amount` varchar(12) NOT NULL,
  `grn_number` varchar(30) NOT NULL,
  `entered_date` varchar(20) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `supplier_number` varchar(30) DEFAULT NULL,
  `mobile_no` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gst_number` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `payment_terms` varchar(255) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0,
  `nda_document` text DEFAULT NULL,
  `registration_document` text DEFAULT NULL,
  `other_document_1` text NOT NULL,
  `other_document_2` text NOT NULL,
  `other_document_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `supplier_number`, `mobile_no`, `email`, `location`, `gst_number`, `state`, `payment_terms`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `nda_document`, `registration_document`, `other_document_1`, `other_document_2`, `other_document_3`) VALUES
(13, 'A', 'THS000001', 123, 'a@gmail.com', 'a', 'a', 'a', '2', 3, '2021-10-03', '04:27:15', '2021-10-03 10:57:15', 0, '', '', '', '', ''),
(14, 'B', 'THS000002', 123, 'b@gmail.com', 'b', 'b', 'b', '1', 3, '2021-10-03', '04:27:29', '2021-10-03 10:57:29', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `uom_name` varchar(50) NOT NULL,
  `contractor_code` varchar(30) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `uom_name`, `contractor_code`, `created_id`, `date`, `time`, `timestamp`, `deleted`) VALUES
(1, 'Number', NULL, 3, '2021-09-17', '10:45:12', '2021-09-17 05:15:12', 0),
(2, 'Kg', NULL, 3, '2021-09-17', '10:45:20', '2021-09-17 05:15:20', 0),
(3, 'Meter', NULL, 3, '2021-09-17', '10:45:27', '2021-09-17 05:15:27', 0),
(4, 'Litre', NULL, 3, '2021-09-17', '10:45:35', '2021-09-17 05:15:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `user_email` text DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `user_role` text DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` text DEFAULT NULL,
  `drawing_download` varchar(20) DEFAULT 'yes',
  `drawing_upload` varchar(20) DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `user_email`, `type`, `user_role`, `user_name`, `user_password`, `date`, `time`, `timestamp`, `deleted`, `drawing_download`, `drawing_upload`) VALUES
(3, 'admin@admin.com', 'admin', 'admin', 'admin', 'admin', NULL, NULL, '2021-02-03 05:51:21', NULL, 'yes', 'yes'),
(4, 'purchase@admin.com', 'Purchase', NULL, 'Purchase', 'admin', NULL, NULL, '2021-07-24 09:39:25', NULL, 'yes', 'yes'),
(5, 'approver@admin.com', 'Approver', NULL, 'Approver', 'admin', NULL, NULL, '2021-07-24 09:39:59', NULL, 'yes', 'yes'),
(6, 'inward_stores@admin.com', 'inward_stores', NULL, 'Inward Stores', 'admin', NULL, NULL, '2021-07-24 09:40:53', NULL, 'yes', 'yes'),
(7, 'inward_quality@admin.com', 'inward_quality ', NULL, 'Inward Quality', 'admin', NULL, NULL, '2021-07-24 09:41:28', NULL, 'yes', 'yes'),
(8, 'stores@admin.com', 'stores', NULL, 'Stores', 'admin', NULL, NULL, '2021-07-24 09:41:49', NULL, 'yes', 'yes'),
(9, 'production@admin.com', 'production', NULL, 'production', 'admin', NULL, NULL, '2021-07-24 09:42:16', NULL, 'yes', 'yes'),
(10, 'FG_stores@admin.com', 'FG_stores', NULL, 'FG Stores', 'admin', NULL, NULL, '2021-07-24 09:42:46', NULL, 'yes', 'yes'),
(11, 'marketing@admin.com', 'Marketing', NULL, 'Marketing', 'admin', NULL, NULL, '2021-07-24 09:43:10', NULL, 'yes', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_tracking`
--
ALTER TABLE `bill_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_part`
--
ALTER TABLE `child_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_part_master`
--
ALTER TABLE `child_part_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumable_item`
--
ALTER TABLE `consumable_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part`
--
ALTER TABLE `customer_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_documents`
--
ALTER TABLE `customer_part_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_drawing`
--
ALTER TABLE `customer_part_drawing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_operation`
--
ALTER TABLE `customer_part_operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_rate`
--
ALTER TABLE `customer_part_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_type`
--
ALTER TABLE `customer_part_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_po_so`
--
ALTER TABLE `c_po_so`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatch_tracking`
--
ALTER TABLE `dispatch_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grn_details`
--
ALTER TABLE `grn_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst_structure`
--
ALTER TABLE `gst_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inwarding`
--
ALTER TABLE `inwarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loading_user`
--
ALTER TABLE `loading_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_po`
--
ALTER TABLE `new_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_data`
--
ALTER TABLE `other_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_creation`
--
ALTER TABLE `part_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_operations`
--
ALTER TABLE `part_operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_type`
--
ALTER TABLE `part_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planing`
--
ALTER TABLE `planing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planing_data`
--
ALTER TABLE `planing_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_details`
--
ALTER TABLE `po_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_parts`
--
ALTER TABLE `po_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_tracking`
--
ALTER TABLE `bill_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_part`
--
ALTER TABLE `child_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `child_part_master`
--
ALTER TABLE `child_part_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consumable_item`
--
ALTER TABLE `consumable_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_part`
--
ALTER TABLE `customer_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_part_documents`
--
ALTER TABLE `customer_part_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_part_drawing`
--
ALTER TABLE `customer_part_drawing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_part_operation`
--
ALTER TABLE `customer_part_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_part_rate`
--
ALTER TABLE `customer_part_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_part_type`
--
ALTER TABLE `customer_part_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `c_po_so`
--
ALTER TABLE `c_po_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dispatch_tracking`
--
ALTER TABLE `dispatch_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grn_details`
--
ALTER TABLE `grn_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gst_structure`
--
ALTER TABLE `gst_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inwarding`
--
ALTER TABLE `inwarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loading_user`
--
ALTER TABLE `loading_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_po`
--
ALTER TABLE `new_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other_data`
--
ALTER TABLE `other_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_creation`
--
ALTER TABLE `part_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_operations`
--
ALTER TABLE `part_operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_type`
--
ALTER TABLE `part_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `planing`
--
ALTER TABLE `planing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planing_data`
--
ALTER TABLE `planing_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_details`
--
ALTER TABLE `po_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_parts`
--
ALTER TABLE `po_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
