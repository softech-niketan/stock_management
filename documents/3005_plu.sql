-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2021 at 08:56 AM
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
-- Database: `ecom_shewta`
--

-- --------------------------------------------------------

--
-- Table structure for table `3005_plu`
--

CREATE TABLE `3005_plu` (
  `ID` int(11) NOT NULL COMMENT 'Internal  Code Strictly 12 Characters',
  `Description` varchar(31) NOT NULL COMMENT 'Product Description',
  `Price` float NOT NULL COMMENT 'Price is the Base price which is inclusive of VAT',
  `Dept` varchar(4) NOT NULL COMMENT 'Category 1',
  `qty_on_hand` decimal(12,3) NOT NULL COMMENT 'Prevailing quantity',
  `supplier` varchar(10) NOT NULL COMMENT 'Supplier of the Item',
  `COST` float NOT NULL COMMENT 'Cost per UOM, its exclusive of VAT',
  `CAT2` varchar(5) NOT NULL COMMENT 'Category 2 Sorting Order of Store and Product',
  `CAT3` varchar(5) NOT NULL COMMENT 'Category 3 Sorting Order of Store and Product',
  `CAT4` varchar(5) NOT NULL COMMENT 'Category 4 Sorting Order of Store and Product',
  `CAT5` varchar(5) NOT NULL COMMENT 'Only used for final Transaction Data',
  `mDATE` date NOT NULL COMMENT 'Not Required By App',
  `DATE_START` date NOT NULL COMMENT 'Discount start date',
  `DATE_END` date NOT NULL COMMENT 'Discount end date',
  `Disc_Price` float NOT NULL COMMENT 'Discount price inclusive if VAT',
  `Tax_Type` varchar(5) NOT NULL COMMENT 'Required for calculation of Vat and Transaction',
  `mLow` float NOT NULL COMMENT 'Flag Status to Display on Application Either Marked as ''0'' or ''1'' ',
  `Reorder` decimal(12,3) NOT NULL COMMENT 'min qty \r\nIf qty on hand < reorder Then marked item OOS',
  `Colour` varchar(4) NOT NULL COMMENT 'Only used for final Transaction Data',
  `mSize` varchar(4) NOT NULL COMMENT 'Only used for final Transaction Data',
  `Mass` float NOT NULL COMMENT 'Weight Of Item required for the delivery ',
  `Pack_Size` float NOT NULL COMMENT 'Only used for final Transaction Data',
  `Style` varchar(16) NOT NULL COMMENT 'Only used for final Transaction Data',
  `store` varchar(4) NOT NULL COMMENT 'Store Code',
  `desc2` varchar(50) NOT NULL COMMENT 'We can have a short Description Or A Long Description This is ther Long Description',
  `non_stock` varchar(5) NOT NULL COMMENT 'If item Marked as True this means that we do not show the stock on hand although we have stock. Therefore the stock should show if the item is marked as False',
  `KVI` varchar(5) NOT NULL COMMENT 'Only used for final Transaction Data',
  `def_barcode` varchar(20) NOT NULL COMMENT 'Barcode no which needs to be scanned by  picker',
  `third_party` varchar(1) NOT NULL COMMENT 'Used If a Third Party Item Is charged for and should be on a separate Invoice',
  `Brand` varchar(20) NOT NULL COMMENT 'Brand Of Item ',
  `File_no` varchar(16) NOT NULL,
  `mtimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Last Time any fields in the item was edited maybe used for updates to the Application',
  `UOM` int(11) NOT NULL COMMENT 'UOM of the item Either Each Or KG'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3005_plu`
--

INSERT INTO `3005_plu` (`ID`, `Description`, `Price`, `Dept`, `qty_on_hand`, `supplier`, `COST`, `CAT2`, `CAT3`, `CAT4`, `CAT5`, `mDATE`, `DATE_START`, `DATE_END`, `Disc_Price`, `Tax_Type`, `mLow`, `Reorder`, `Colour`, `mSize`, `Mass`, `Pack_Size`, `Style`, `store`, `desc2`, `non_stock`, `KVI`, `def_barcode`, `third_party`, `Brand`, `File_no`, `mtimestamp`, `UOM`) VALUES
(1, 'testing', 20, '2', '20.000', '20', 20, '1', '1', '1', '', '0000-00-00', '0000-00-00', '0000-00-00', 20, '', 0, '0.000', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '2021-09-20 03:30:39', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `3005_plu`
--
ALTER TABLE `3005_plu`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `3005_plu`
--
ALTER TABLE `3005_plu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Internal  Code Strictly 12 Characters', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
