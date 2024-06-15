-- MySQL dump 10.13  Distrib 8.0.22, for macos10.15 (x86_64)
--
-- Host: 102.130.115.184    Database: online
-- ------------------------------------------------------
-- Server version	5.7.33-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `2008plu`
--

DROP TABLE IF EXISTS `2008plu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `2008plu` (
  `Store_Code_Month` varchar(25) NOT NULL DEFAULT '',
  `Store_Code` varchar(25) NOT NULL DEFAULT '',
  `Code` varchar(20) NOT NULL DEFAULT '',
  `Store` varchar(5) NOT NULL DEFAULT '',
  `Month` smallint(6) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL DEFAULT '0000',
  `plu_no` int(11) DEFAULT '0',
  `Description` varchar(30) DEFAULT '',
  `Dept` char(2) NOT NULL DEFAULT '',
  `Department` varchar(30) DEFAULT '',
  `Cat2` varchar(4) DEFAULT '',
  `Cat3` varchar(4) DEFAULT '',
  `Cat4` varchar(4) DEFAULT '',
  `Cat5` varchar(4) DEFAULT '',
  `supplier` varchar(5) DEFAULT '',
  `supp_ref` varchar(20) DEFAULT '',
  `Size` varchar(5) DEFAULT '',
  `Colour` varchar(5) DEFAULT '',
  `OS` decimal(12,2) NOT NULL DEFAULT '0.00',
  `SALE_QTY` decimal(12,2) DEFAULT '0.00',
  `SALE_COST` decimal(12,2) DEFAULT '0.00',
  `SALE_EXCL` decimal(12,2) DEFAULT '0.00',
  `SALE_VAT` decimal(12,2) DEFAULT '0.00',
  `SALE_INCL` decimal(12,2) DEFAULT '0.00',
  `Cost` decimal(12,2) NOT NULL DEFAULT '0.00',
  `Price_incl` decimal(12,2) NOT NULL DEFAULT '0.00',
  `Closing_Stock` decimal(12,2) NOT NULL DEFAULT '0.00',
  `LAST_CHANGE_DATE` date NOT NULL DEFAULT '0000-00-00',
  `Last_sale_Date` date DEFAULT '0000-00-00',
  `LAST_SALE_TIME` time DEFAULT '01:00:00',
  `STOCK_TAKE_QTY` decimal(12,3) DEFAULT '0.000',
  `PURCH_QTY` decimal(12,2) DEFAULT '0.00',
  `PURCH_VAT` decimal(12,2) DEFAULT '0.00',
  `PURCH_EXCL` decimal(12,2) DEFAULT '0.00',
  `PURCH_INCL` decimal(12,2) DEFAULT '0.00',
  `PURCH_SELL_INCL` varchar(100) DEFAULT '',
  `LAST_PURCH_NAME` varchar(10) DEFAULT '',
  `LAST_PURCH_DATE` date DEFAULT '0000-00-00',
  `LAST_PURCH_QTY` varchar(100) DEFAULT '',
  `CLAIMS_QTY` decimal(12,2) DEFAULT '0.00',
  `CLAIMS_EXCL` decimal(12,2) DEFAULT '0.00',
  `CLAIMS_VAT` decimal(12,2) DEFAULT '0.00',
  `CLAIMS_INCL` decimal(12,2) DEFAULT '0.00',
  `TRANS_IN_QTY` decimal(12,2) DEFAULT '0.00',
  `TRANS_IN_DATE` date DEFAULT '0000-00-00',
  `TRANS_IN_COST` decimal(12,2) DEFAULT '0.00',
  `TRANS_IN_SELL_INCL` decimal(12,2) DEFAULT '0.00',
  `LAST_TRANS_IN_DATE` date DEFAULT '0000-00-00',
  `TRANS_OUT_QTY` decimal(12,2) DEFAULT '0.00',
  `TRANS_OUT_COST` decimal(12,2) DEFAULT '0.00',
  `TRANS_OUT_SELL_INCL` decimal(12,2) DEFAULT '0.00',
  `LAST_TRANS_OUT_DATE` date DEFAULT '0000-00-00',
  `STOCK_ADJ` decimal(12,2) DEFAULT '0.00',
  `STOCK_ADJ_VAL` decimal(12,2) DEFAULT '0.00',
  `D1` int(11) DEFAULT '0',
  `D2` int(11) DEFAULT '0',
  `D3` int(11) DEFAULT '0',
  `D4` int(11) DEFAULT '0',
  `D5` int(11) DEFAULT '0',
  `D6` int(11) DEFAULT '0',
  `D7` int(11) DEFAULT '0',
  `D8` int(11) DEFAULT '0',
  `D9` int(11) DEFAULT '0',
  `D10` int(11) DEFAULT '0',
  `D11` int(11) DEFAULT '0',
  `D12` int(11) DEFAULT '0',
  `D13` int(11) DEFAULT '0',
  `D14` int(11) DEFAULT '0',
  `D15` int(11) DEFAULT '0',
  `D16` int(11) DEFAULT '0',
  `D17` int(11) DEFAULT '0',
  `D18` int(11) DEFAULT '0',
  `D19` int(11) DEFAULT '0',
  `D20` int(11) DEFAULT '0',
  `D21` int(11) DEFAULT '0',
  `D22` int(11) DEFAULT '0',
  `D23` int(11) DEFAULT '0',
  `D24` int(11) DEFAULT '0',
  `D25` int(11) DEFAULT '0',
  `D26` int(11) DEFAULT '0',
  `D27` int(11) DEFAULT '0',
  `D28` int(11) DEFAULT '0',
  `D29` int(11) DEFAULT '0',
  `D30` int(11) DEFAULT '0',
  `D31` int(11) DEFAULT '0',
  `LAST_FIELD` varchar(100) DEFAULT '',
  `mtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mstyle` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Store_Code_Month`),
  KEY `store_code` (`Store_Code`),
  KEY `code` (`Code`),
  KEY `mstyle` (`mstyle`),
  KEY `idxtimestamp` (`mtimestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `2008plu`
--

LOCK TABLES `2008plu` WRITE;
/*!40000 ALTER TABLE `2008plu` DISABLE KEYS */;
/*!40000 ALTER TABLE `2008plu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plu_2013mar02`
--

DROP TABLE IF EXISTS `plu_2013mar02`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plu_2013mar02` (
  `CODE` varchar(14) NOT NULL DEFAULT 'NULL',
  `Description` varchar(31) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Dept` varchar(4) DEFAULT NULL,
  `qty_on_hand` decimal(12,3) DEFAULT '0.000',
  `Stock_Take` float DEFAULT NULL,
  `Supplier` varchar(6) DEFAULT NULL,
  `Movement` float DEFAULT NULL,
  `COST` float DEFAULT NULL,
  `COST_CODE` varchar(21) DEFAULT NULL,
  `Cat2` varchar(5) DEFAULT NULL,
  `Cat3` varchar(5) DEFAULT NULL,
  `Cat4` varchar(5) DEFAULT NULL,
  `Cat5` varchar(5) DEFAULT NULL,
  `mDATE` date DEFAULT NULL,
  `DATE_START` date DEFAULT NULL,
  `DATE_END` date DEFAULT NULL,
  `Disc_Price` float DEFAULT NULL,
  `Region` varchar(31) DEFAULT NULL,
  `FACTOR` float DEFAULT NULL,
  `RECIPE` varchar(5) DEFAULT NULL,
  `WHOLE` varchar(5) DEFAULT NULL,
  `Tax_Type` varchar(5) DEFAULT NULL,
  `Price_B` float DEFAULT NULL,
  `Price_C` float DEFAULT NULL,
  `Price_D` float DEFAULT NULL,
  `mHigh` float DEFAULT NULL,
  `mLow` float DEFAULT NULL,
  `mHigh_Low` date DEFAULT NULL,
  `Supp_Ref` varchar(14) DEFAULT NULL,
  `Reorder` float DEFAULT NULL,
  `QTY_ORDER` float DEFAULT NULL,
  `QTY_Rec` float DEFAULT NULL,
  `Colour` varchar(4) DEFAULT NULL,
  `mSize` varchar(4) DEFAULT NULL,
  `Locked` varchar(5) DEFAULT NULL,
  `Units_Sold` float DEFAULT NULL,
  `Value_Sold` float DEFAULT NULL,
  `Tot_Cost` float DEFAULT NULL,
  `VAT` float DEFAULT NULL,
  `Achieved_GP` float DEFAULT NULL,
  `FOB` float DEFAULT NULL,
  `FOB_Curr` float DEFAULT NULL,
  `FOB_Type` varchar(11) DEFAULT NULL,
  `Serial` varchar(5) DEFAULT NULL,
  `Mass` float DEFAULT NULL,
  `Flagged` varchar(5) DEFAULT NULL,
  `Prevent_Sale` varchar(5) DEFAULT NULL,
  `Pack_Size` float DEFAULT NULL,
  `Average_Cost` float DEFAULT NULL,
  `Pack_Price` float DEFAULT NULL,
  `Pack_Cost` float DEFAULT NULL,
  `old_qty_oh` decimal(12,2) DEFAULT '0.00',
  `Last_Sale_date` date DEFAULT NULL,
  `Bin_Location` varchar(16) DEFAULT NULL,
  `mVar` float DEFAULT NULL,
  `stktk_Date` date DEFAULT NULL,
  `stktk_Time` time DEFAULT NULL,
  `Style` varchar(16) DEFAULT NULL,
  `File_No` varchar(16) DEFAULT NULL,
  `Write_Off_QTY` float DEFAULT NULL,
  `Write_Off_Value` float DEFAULT NULL,
  `minternal_number` varchar(20) DEFAULT NULL,
  `store` varchar(4) DEFAULT '',
  `desc2` varchar(50) DEFAULT '',
  `item_no` int(11) DEFAULT '0',
  `disc` decimal(12,2) DEFAULT '0.00',
  `disc_pctg` decimal(5,3) DEFAULT '0.000',
  `exp` decimal(12,2) DEFAULT '0.00',
  `exp_pctg` decimal(5,3) DEFAULT '0.000',
  `weighted` smallint(6) DEFAULT NULL,
  `stock_unit` smallint(6) DEFAULT NULL,
  `can_disc` smallint(6) DEFAULT NULL,
  `neg_qty` smallint(6) DEFAULT NULL,
  `fob_landed` decimal(12,2) DEFAULT '0.00',
  `mkp` decimal(12,2) DEFAULT '0.00',
  `mkp_pctg` decimal(5,3) DEFAULT '0.000',
  `tarif_code` varchar(10) DEFAULT '0',
  `tarif_pctg` decimal(5,3) DEFAULT '0.000',
  `bucket` decimal(6,3) DEFAULT '0.000',
  `order_cost` decimal(12,2) DEFAULT '0.00',
  `mtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stkloc1` decimal(12,3) DEFAULT '0.000',
  `stkloc2` decimal(12,3) DEFAULT '0.000',
  `stkloc3` decimal(12,3) DEFAULT '0.000',
  `stkloc4` decimal(12,3) DEFAULT '0.000',
  `stkloc5` decimal(12,3) DEFAULT '0.000',
  `UOM` varchar(10) DEFAULT 'each',
  `bin1` varchar(15) DEFAULT NULL,
  `bin2` varchar(15) DEFAULT NULL,
  `bin3` varchar(15) DEFAULT NULL,
  `bin4` varchar(15) DEFAULT NULL,
  `bin5` varchar(15) DEFAULT NULL,
  `Attrib1` varchar(15) DEFAULT NULL,
  `Attrib2` varchar(15) DEFAULT NULL,
  `Attrib3` varchar(15) DEFAULT NULL,
  `Attrib4` varchar(15) DEFAULT NULL,
  `Attrib5` varchar(15) DEFAULT NULL,
  `Ledger` varchar(15) DEFAULT NULL,
  `non_stock` varchar(5) DEFAULT 'FALSE',
  `expense` varchar(5) DEFAULT 'FALSE',
  `packaging` varchar(5) DEFAULT 'FALSE',
  `buyout` varchar(5) DEFAULT 'FALSE',
  `KVI` varchar(5) DEFAULT 'FALSE',
  `voucher` varchar(5) DEFAULT 'FALSE',
  `prevent_adj` varchar(5) DEFAULT 'FALSE',
  `sell_by` int(11) DEFAULT NULL,
  `lead_Time` int(11) DEFAULT NULL,
  `trigger_start` datetime DEFAULT NULL,
  `trigger_end` datetime DEFAULT NULL,
  `trigger_threshhold` int(11) DEFAULT '0',
  `trigger_code` varchar(15) DEFAULT NULL,
  `trigger_qty` int(11) DEFAULT NULL,
  `trigger_price` decimal(12,2) DEFAULT '0.00',
  `alt_supplier` varchar(15) DEFAULT NULL,
  `Ord_cycle` int(11) DEFAULT NULL,
  `Ord_Cost` decimal(12,2) DEFAULT '0.00',
  `Ord_Pack_Size` float DEFAULT '0',
  `Prev_Cost` decimal(12,2) DEFAULT '0.00',
  `Prev_no` varchar(15) DEFAULT NULL,
  `Prev_Date` date DEFAULT NULL,
  `Prev_Qty` float DEFAULT NULL,
  `Last_CLM` varchar(15) DEFAULT NULL,
  `Last_CLM_Date` date DEFAULT NULL,
  `Last_CLM_Qty` float DEFAULT NULL,
  `Last_ADJ` varchar(15) DEFAULT NULL,
  `Last_ADJ_Date` date DEFAULT NULL,
  `Last_ADJ_Qty` float DEFAULT NULL,
  `Last_IBI` varchar(15) DEFAULT NULL,
  `Last_IBI_Date` date DEFAULT NULL,
  `Last_IBI_Qty` float DEFAULT NULL,
  `Last_IBO` varchar(15) DEFAULT NULL,
  `Last_IBO_Date` date DEFAULT NULL,
  `Last_IBO_Qty` float DEFAULT NULL,
  `Last_Edit_Date` date DEFAULT NULL,
  `Last_Edit_time` time DEFAULT NULL,
  `Last_Edit_by` varchar(15) DEFAULT NULL,
  `Last_Edit_Procedure` varchar(15) DEFAULT NULL,
  `Last_Ord_Date` date DEFAULT NULL,
  `Last_Ord_No` varchar(15) DEFAULT NULL,
  `Last_Purch_Cost` decimal(12,2) DEFAULT '0.00',
  `GRN_No` varchar(15) DEFAULT NULL,
  `Last_Purch_INV_No` varchar(15) DEFAULT NULL,
  `Last_Purch_Date` date DEFAULT NULL,
  `Last_Purch_Qty` float DEFAULT NULL,
  `return_policy` varchar(15) DEFAULT NULL,
  `Calc_GP` float DEFAULT NULL,
  `System_Cost` decimal(12,2) DEFAULT '0.00',
  `def_barcode` varchar(20) DEFAULT NULL,
  `prevent_Disc` varchar(1) DEFAULT 'F',
  `prevent_loyalty` varchar(1) DEFAULT 'F',
  `third_party` varchar(1) DEFAULT 'F',
  `prevent_purch` varchar(1) DEFAULT 'F',
  `DC_Item` varchar(1) DEFAULT 'F',
  `Searchable` varchar(1) DEFAULT 'T',
  `Allow_purch` varchar(1) DEFAULT 'F',
  `facings` int(11) DEFAULT '0',
  `Deposit` varchar(1) DEFAULT 'F',
  `Expense_Item` varchar(1) DEFAULT 'F',
  `Tot_Sell_Off` decimal(12,2) DEFAULT '0.00',
  `uTot_IBI` decimal(12,2) DEFAULT '0.00',
  `uTot_IBO` decimal(12,2) DEFAULT '0.00',
  `Commission` decimal(12,2) DEFAULT '0.00',
  `Purch_Pack_Size` decimal(12,2) DEFAULT '0.00',
  `Brand` varchar(20) DEFAULT NULL,
  `Rotation_Stock_Date` date DEFAULT NULL,
  PRIMARY KEY (`CODE`),
  KEY `idxtimestamp` (`mtimestamp`),
  KEY `last_sale_date_index` (`Last_Sale_date`),
  KEY `Description` (`Description`),
  KEY `plu_cat5` (`Cat5`),
  KEY `plu_bin_loc` (`Bin_Location`),
  KEY `plu_bin1` (`bin1`),
  KEY `plu_bin2` (`bin2`),
  KEY `plu_bin3` (`bin3`),
  KEY `plu_bin4` (`bin4`),
  KEY `plu_bin5` (`bin5`),
  KEY `plu_def_barcode` (`def_barcode`),
  KEY `plu_style` (`Style`),
  KEY `plu_dept` (`Dept`),
  KEY `plu_cat2` (`Cat2`),
  KEY `plu_cat3` (`Cat3`),
  KEY `plu_cat4` (`Cat4`),
  KEY `plu_non_stock` (`non_stock`),
  KEY `plusupp1` (`Supplier`),
  KEY `plu_clm` (`Last_CLM`),
  KEY `plu_file_no` (`File_No`),
  KEY `last_purch_date1` (`Last_Purch_Date`),
  KEY `_GRN_no` (`GRN_No`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plu_2013mar02`
--

LOCK TABLES `plu_2013mar02` WRITE;
/*!40000 ALTER TABLE `plu_2013mar02` DISABLE KEYS */;
/*!40000 ALTER TABLE `plu_2013mar02` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-21 11:29:15
