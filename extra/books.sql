-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 08:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `publish_month` varchar(20) NOT NULL,
  `publish_year` varchar(20) NOT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `publish_month`, `publish_year`, `archived`) VALUES
('19JUN1949-LIT00002', '1984', 'June', '1949', 0),
('A-NOV1980-HIS00024', 'A Peoples History of the United States', 'November', '1980', 0),
('ANNOV1939-MYS00044', 'And Then There Were None', 'November', '1939', 0),
('BRFEB1932-LIT00010', 'Brave New World', 'February', '1932', 0),
('ELMAY2017-ROM00019', 'Eleanor Oliphant Is Completely Fine', 'May', '2017', 0),
('FASEP2019-BIO00039', 'Father and Son: A Memoir', 'September', '2019', 0),
('FRJUL2023-BIO00040', 'Franks Shadow', 'July', '2023', 0),
('GEMAR2004-HIS00030', 'Genghis Khan and the Making of the Modern World', 'March', '2004', 0),
('GOJUN1936-ROM00016', 'Gone with the Wind', 'June', '1936', 0),
('GOJUN2012-MYS00041', 'Gone Girl', 'June', '2012', 0),
('INMAY2007-MYS00048', 'In the Woods', 'May', '2007', 0),
('JAOCT1847-LIT00006', 'Jane Eyre', 'October', '1847', 0),
('LEOCT2017-BIO00037', 'Leonardo da Vinci', 'October', '2017', 0),
('LOOCT1994-BIO00033', 'Long Walk to Freedom', 'October', '1994', 0),
('MEJAN2012-ROM00013', 'Me Before You', 'January', '2012', 0),
('MOOCT1851-LIT00005', 'Moby-Dick', 'October', '1851', 0),
('ONMAY1967-LIT00004', 'One Hundred Years of Solitude', 'May', '1967', 0),
('OUJUN1991-ROM00012', 'Outlander', 'June', '1991', 0),
('PRJAN1813-ROM00011', 'Pride and Prejudice', 'January', '1813', 0),
('SAFEB2014-HIS00021', 'Sapeins: A Brief History of Humankind', 'February', '2014', 0),
('STOCT2011-BIO00031', 'Steve Jobs', 'October', '2011', 0),
('SUMR June-19800036', 'Surely Youre Joking', 'Mr Freynman!', 'June', 0),
('THAPR1902-MYS00045', 'The Hound of the Baskervilles', 'April', '1902', 0),
('THAPR1925-LIT00003', 'The Great Gatsby', 'April', '1925', 0),
('THAPR2011-HIS00027', 'The Origins of Political Order: From Prehuman Times to the French Revolution', 'April', '2011', 0),
('THAUG2005-MYS00042', 'The Girl with the Dragon Tattoo', 'August', '2005', 0),
('THAUG2015-HIS00026', 'The Silk Road: A New History of the World', 'August', '2015', 0),
('THAUG2016-ROM00018', 'The Hating Game', 'August', '2016', 0),
('THFEB1930-MYS00049', 'The Maltese Falcon', 'February', '1930', 0),
('THFEB1939-MYS00047', 'The Big Sleep', 'February', '1939', 0),
('THFEB2010-BIO00034', 'The Immortal Life of Henrietta Lacks', 'February', '2010', 0),
('THJAN2012-ROM00017', 'The fault in Our Stars', 'January', '2012', 0),
('THJAN2013-ROM00015', 'The Rosie Project', 'January', '2013', 0),
('THJUL1951-LIT00007', 'The Catcher in the Rye', 'July', '1951', 0),
('THJUL1954-LIT00009', 'The Lord of the Rings', 'July', '1954', 0),
('THJUN1947-HIS00025', 'The Diary of a Young Girl', 'June', '1947', 0),
('THMAR1998-MYS00050', 'The No.1 Ladies', 'March', '1998', 0),
('THMAR2003-MYS00043', 'The Da Vinci Code', 'March', '2003', 0),
('THMAY2015-HIS00028', 'The Wright Brothers', 'May', '2015', 0),
('THNOV1970-BIO00038', 'The Rise of Theodore Roosevelt', 'November', '1970', 0),
('THOCT1960-HIS00023', 'The Rise and Fall of the Third Reich', 'October', '1960', 0),
('THOCT1965-BIO00032', 'The Autobiography of Maclolm X', 'October', '1965', 0),
('THOCT1996-ROM00014', 'The Notebook', 'October', '1996', 0),
('THOCT2005-BIO00035', 'The Diary of Frida Kahlo: An Intimate Self-Portrait', 'October', '2005', 0),
('THSEP1962-HIS00022', 'The Guns of August', 'September', '1962', 0),
('THSEP1992-MYS00046', 'The Secret History', 'September', '1992', 0),
('THSEP2003-ROM00020', 'The Time Travelers Wife', 'September', '2003', 0),
('THSEP2005-HIS00029', 'The Cold War: A New History', 'September', '2005', 0),
('TOJUL1960-LIT00001', 'To Kill a Mockingbird', 'July', '1960', 0),
('TOMAY1927-LIT00008', 'To the Lighthouse', 'May', '1927', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
