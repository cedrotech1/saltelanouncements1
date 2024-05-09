-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 01:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saltel`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `description`, `image`, `cid`) VALUES
(2, 'dd', 'ss', 'upload/Personal Trainer-cuate.png', 1),
(3, 'konji', 'ejo ni konji yabakozi ba reta', 'upload/Screenshot 2024-04-06 103757.png', 2),
(4, 'diox', 'eeeeeeeeeeeeeeeeeeeee', 'upload/R_Image_107.jpg', 1),
(5, 'meating on thusdat', 'there is meeting on this thusday !!!!!!', 'upload/111-removebg-preview.png', 4),
(6, 'ejo ni konji yi irahidi', 'ejo ni konji yi irahidiejo ni konji yi irahidiejo ni konji yi irahidiejo ni konji yi irahidiejo ni konji yi irahidi', 'upload/istockphoto-1036660952-612x612.jpg', 4),
(7, 'ejo nta class ihari', ';lkjhgdfjxlkxgsfxcsxjc', 'upload/Frame 1.png', 5),
(8, 'ejo  ni konji', 'sdfghjkl;;kjcffffdxdjkjv', 'upload/Business-men-clothing-suit-on-transparent-PNG.png', 6),
(9, 'shifting from morning to after', 'shifting from morning to afternoonshifting from morning to afternoonshifting from morning to afternoonshifting from morning to afternoon', 'upload/images (8).jpeg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'l4sod shift 1'),
(2, 'l5sod shift2'),
(3, ''),
(4, 'l5sod shift 3 from 8:pm - 10:0'),
(5, 'networking shift 1 l4 '),
(6, 'l5sod shift1'),
(7, 'l3sod shift 2'),
(8, '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `names` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `names`, `phone`, `password`, `cid`) VALUES
(1, '', '0784366616', '1234', 1),
(2, 'books', '9575757788', '', 1),
(3, 'cedrick', '0784366616', '', 2),
(4, 'ishimwe yves', '09876543', '', 4),
(5, '', '', '', 2),
(6, 'carine', '078430000', '078430000', 4),
(7, 'cedrick', '07843666160', '07843666160', 1),
(8, 'kabano', '0788', '0788', 5),
(9, 'patrick', '07800', '07800', 6),
(10, 'fiona', '078', '078', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
