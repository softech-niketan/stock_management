-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2021 at 09:47 PM
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
  `part_drawing` text NOT NULL,
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
(1, 0, 'ABC', 'as', NULL, NULL, '2021-09-05', '1', 'first', 1, 1, 's', NULL, NULL, 1, '2021-09-05', '01:02:46', '2021-09-05 07:32:46', NULL, 's', 'erp(5).sql', '', 'erp(6).sql', 'erp(5)1.sql', '', '', ''),
(2, 0, '123', '123', NULL, NULL, '2021-09-06', '1', 'first', 1, 1, '123', NULL, NULL, 3, '2021-09-06', '09:40:07', '2021-09-06 19:38:05', NULL, '', 'Daxta_Tech_Pancard1.pdf', '', 'PO-Order(13).pdf', 'PO-Order(15)4.pdf', '', '', ''),
(3, 0, 'ABC', 'as', NULL, NULL, '2021-09-06', '24', '4', 1, 1, 's', NULL, 'Online_status_5058666_26.07.2021.pdf', 3, '2021-09-06', '09:41:45', '2021-09-06 17:55:17', NULL, 's', 'BALAJI_2021_banner_21.jpg', '', '', 'Daxta_Tech_Pancard3.pdf', '', '', ''),
(4, 0, 'ABC', 'as', NULL, NULL, '2021-09-06', '25', '23', 1, 1, 's', NULL, NULL, 3, '2021-09-06', '11:26:17', '2021-09-06 19:37:48', NULL, 's', 'Daxta_Tech_Pancard4.pdf', '', 'PO-Order(16).pdf', 'PO-Order(14)1.pdf', '', '', '');

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
(1, 0, 'ABCsad', 'as', 1, 2, '2021-09-05', '1', 'first', 0, 1, '', NULL, NULL, 1, '2021-09-05', '01:03:01', '2021-09-05 08:02:25', NULL, NULL, '', '', '', '', '', '', '', ''),
(2, 0, 'ABC', 'as', 1, 23, '2021-09-05', '1', 'first', 0, 1, '', NULL, NULL, 1, '2021-09-05', '01:32:36', '2021-09-05 08:02:36', NULL, NULL, '', '', '', '', '', '', '', 'erp(5).sql'),
(3, 0, 'ABC', 'as', 1, 23, '2021-09-05', '2', '23', 0, 1, '', NULL, NULL, 1, '2021-09-05', '01:35:00', '2021-09-05 08:05:00', NULL, NULL, '', '', '', '', '', '', '', '3-sept-student-webapp.zip'),
(4, 0, '123', '123', 1, 123, '2021-09-06', '1', 'first', 1, 2, '', NULL, NULL, 3, '2021-09-06', '09:46:16', '2021-09-06 16:16:16', NULL, NULL, '', '', '', '', '', '', '', ''),
(5, 0, 'ABCsad', 'as', 1, 23, '2021-09-06', '2', '23', 0, 1, '', NULL, NULL, 3, '2021-09-06', '11:28:45', '2021-09-06 17:58:45', NULL, NULL, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `billing_address` varchar(50) DEFAULT NULL,
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
(1, '2', '2', '2', '2', '2', '2', 1, '2021-09-05', '01:01:31', '2021-09-05 07:31:31', 0);

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
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_code`, `billing_address`, `shifting_address`, `payment_terms`, `state`, `gst_number`, `created_id`, `date`, `time`, `timestamp`, `deleted`) VALUES
(1, 'ABC', 'abcacbac', 'ab@gmail.com', 'asd', '123', 'asd', 'asd', 1, '2021-09-05', '01:12:58', '2021-09-05 07:42:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_part`
--

CREATE TABLE `customer_part` (
  `id` int(11) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` text NOT NULL,
  `customer_id` int(30) NOT NULL,
  `revision_date` varchar(50) NOT NULL,
  `customer_part_id` int(11) NOT NULL,
  `revision_no` varchar(255) NOT NULL,
  `diagram` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part`
--

INSERT INTO `customer_part` (`id`, `part_number`, `part_description`, `customer_id`, `revision_date`, `customer_part_id`, `revision_no`, `diagram`, `model`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `revision_remark`) VALUES
(1, 'A', 'f', 1, '2021-09-21', 1, '2', NULL, NULL, 1, '2021-09-05', '01:14:58', '2021-09-05 07:44:58', NULL, '2021-09-14');

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
(1, 'ABC', NULL, 1, '2021-09-05', '01:13:06', '2021-09-05 07:43:06', 0);

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
(1, 'A', 9, 9, 0, 1, '2021-09-05', 0);

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
(1, '202190', 1, '2021-09-05', 2021, '2021-09-05', '01:07:03', 5, '9', '2021', 'accpet', 0),
(2, '202191', 1, '2021-09-06', 2021, '2021-09-06', '09:13:47', 6, '9', '2021', 'pending', 0);

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
(1, 'OP-10', 1, '2021-09-05', '01:01:22', 0);

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

--
-- Dumping data for table `part_creation`
--

INSERT INTO `part_creation` (`id`, `part_number`, `part_description`, `internal_part_number`, `group_id`, `sub_group_id`, `type_id`, `part_drawing`, `ppap_document`, `modal_document`, `cad_file`, `supplier_id`, `revision_number`, `size_id`, `revision_date`, `revision_remark`, `created_date`, `deleted`, `a_d`, `q_d`, `c_d`) VALUES
(4, 'ABC', 'as', '', 0, 0, 0, '', 'PO-Order(15)5.pdf', '', '', 1, NULL, '', NULL, NULL, '2021-09-07', 0, '', '', '');

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
(1, 'ABC', NULL, 1, '2021-09-05', '01:02:29', '2021-09-05 07:32:29', 0);

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
  `po_number` int(11) NOT NULL,
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
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_parts`
--

INSERT INTO `po_parts` (`id`, `po_id`, `po_number`, `supplier_id`, `part_id`, `tax_id`, `uom_id`, `delivery_date`, `expiry_date`, `qty`, `pending_qty`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `deleted`) VALUES
(1, 1, 202190, 1, 1, 1, 1, '2021-09-14', '2021-09-27', 2, 2, 1, '2021-09-05', '01:07:12', 5, 9, 2021, 0),
(2, 2, 202191, 1, 1, 1, 1, '2021-09-14', '2021-09-06', 23, 23, 3, '2021-09-06', '09:16:27', 6, 9, 2021, 0),
(3, 2, 202191, 1, 3, 1, 1, '2021-09-14', '2021-09-14', 23, 23, 3, '2021-09-06', '09:17:59', 6, 9, 2021, 0),
(5, 2, 202191, 1, 5, 1, 0, '2021-09-14', '2021-09-14', 23, 23, 3, '2021-09-07', '12:58:05', 7, 9, 2021, 0);

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
  `registration_document` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `supplier_number`, `mobile_no`, `email`, `location`, `gst_number`, `state`, `payment_terms`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `nda_document`, `registration_document`) VALUES
(1, 'A', 'BSP0001', 2, 'a@gmail.com', 'abc', '2', 'maharashtra', '2', 1, '2021-09-05', '01:02:18', '2021-09-05 07:32:18', 0, '', ''),
(2, '123', 'BSP0001', 123, 'a@gmail.com', '23123123', '123', '123', '23', 3, '2021-09-06', '09:36:12', '2021-09-06 16:06:12', 0, 'BALAJI_2021_banner_2.jpg', 'Daxta_Tech_Pancard.pdf'),
(3, '123', 'BSP0002', 23, 'abc@gmail.com', '23', '123', '123', '213', 3, '2021-09-06', '11:22:04', '2021-09-06 17:52:04', 0, '', ''),
(4, '213', 'BSP0003', 23, 'abc@gmail.com', '23', '123', '1231', '123', 3, '2021-09-06', '11:22:16', '2021-09-06 17:52:16', 0, '', '');

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
(1, 'ABC', NULL, 1, '2021-09-05', '01:01:38', '2021-09-05 07:31:38', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `child_part_master`
--
ALTER TABLE `child_part_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_part`
--
ALTER TABLE `customer_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gst_structure`
--
ALTER TABLE `gst_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inwarding`
--
ALTER TABLE `inwarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_data`
--
ALTER TABLE `other_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_creation`
--
ALTER TABLE `part_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `part_operations`
--
ALTER TABLE `part_operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_type`
--
ALTER TABLE `part_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
