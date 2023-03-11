-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2023 at 09:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
--

CREATE TABLE `borrowings` (
  `Borrowing_Code` int(11) NOT NULL,
  `Borrowing_Date` datetime DEFAULT current_timestamp(),
  `Borrowing_Return_Date` datetime DEFAULT NULL,
  `Item_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `Reservation_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_Code` int(11) NOT NULL,
  `Category_Name` varchar(50) DEFAULT NULL,
  `Category_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_Code`, `Category_Name`, `Category_Type`) VALUES
(1, 'Book', 'Number of pages'),
(2, 'Music', 'Duration'),
(3, 'Audio book', 'Duration'),
(4, 'Movie', 'Duration'),
(5, 'Comic', 'Number of pages');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_Code` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author_Name` varchar(100) DEFAULT NULL,
  `Cover_Image` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Edition_Date` date DEFAULT NULL,
  `Purchase_Date` date DEFAULT NULL,
  `Status` varchar(150) DEFAULT NULL,
  `Duration` int(11) NOT NULL,
  `Category_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_Code`, `Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Purchase_Date`, `Status`, `Duration`, `Category_Code`) VALUES
(1, 'LA FEMME MOUSTIQUE : TEXTE INTEGRAL', 'Ghislaine Herbera', 'Item_Images/Audio_Book/wsgetimg (3).jpeg', 'Used - like new', '2022-01-10', '2022-01-10', 'Available', 0, 3),
(2, 'PANIQUE DANS LA FORET', 'Clotilde Perrin', 'Item_Images/Audio_Book/1297509.jpg', 'Used', '2013-03-27', '2019-07-10', '\n', 0, 3),
(3, 'PAX ET LE PETIT SOLDAT', 'Sara Pennypacker', 'Item_Images/Audio_Book/1297513.jpg', 'Used - like new', '2020-10-14', '2021-08-19', 'Available', 0, 3),
(4, 'SOURICETTE VEUT UN AMOUREUX', 'François Vincent', 'Item_Images/Audio_Book/1296908.jpg', 'Used - like old', '2016-09-15', '2021-09-10', 'Available', 0, 3),
(5, 'SAUTE-LA-PUCE', 'Benoit Debecker', 'Item_Images/Audio_Book/wsgetimg.jpeg', 'Broken', '2015-09-09', '2021-03-18', 'Unavailable', 0, 3),
(6, 'PREMIERES NEIGES', 'Nelson', 'Item_Images/Audio_Book/wsgetimg (1).jpeg', 'New', '2022-05-06', '2022-03-30', 'Available', 0, 3),
(7, 'LA PYRAMIDE DES BESOINS HUMAINS', 'Caroline Sole', 'Item_Images/Audio_Book/A001765230.jpg', 'Used - like new', '2020-12-18', '2022-03-11', 'Available', 0, 3),
(8, 'LA PETITE DANSEUSE - EDGAR DEGAS', 'Geraldine Elschner', 'Item_Images/Audio_Book/1102896.jpg', 'Used', '2017-10-19', '2022-07-07', 'Available', 0, 3),
(9, 'SALSA !', 'Edouard Manceau', 'Item_Images/Audio_Book/9782375150788_thumb.jpg', 'Used - like old', '2021-10-06', '2022-06-10', 'Available', 0, 3),
(10, 'LE BRUIT DES NOMBRES', 'Jeanne Boyer', 'Item_Images/Audio_Book/wsgetimg (2).jpeg', 'Broken', '2020-05-29', '2022-01-31', 'Unavailable', 0, 3),
(11, 'LES MITCHELL CONTRE LES MACHINES', 'Mike Rianda', 'Item_Images/Movie/V99999006506.jpg', 'New', '2020-03-04', '2021-07-09', 'Available', 0, 4),
(12, 'HAM ON RYE', 'Taormina Tyler', 'Item_Images/Movie/V99999007601.jpg', 'Used - like new', '2022-08-11', '2022-09-11', 'Available', 0, 4),
(13, 'JERK', 'Vienne Gisele', 'Item_Images/Movie/wsgetimg.jpeg', 'Used', '2022-05-19', '2022-07-21', 'Available', 0, 4),
(14, 'GREAT FREEDOM', 'Meise Sebastian', 'Item_Images/Movie/wsgetimg (1).jpeg', 'Used - like old', '2018-07-27', '2019-04-10', 'Available', 0, 4),
(15, 'THE INNOCENTS', 'Vogt Eskil', 'Item_Images/Movie/0000000274442.jpg', 'Broken', '2017-03-02', '2017-08-11', 'Unavailable', 0, 4),
(16, 'CLARA SOLA', 'Alvarez Mesen', 'Item_Images/Movie/wsgetimg (2).jpeg', 'New', '2022-02-07', '2022-02-09', 'Available', 0, 4),
(17, 'LE PEUPLE LOUP', 'Moore Tomm', 'Item_Images/Movie/0000000271977.jpg', 'Used - like new', '2021-01-13', '2022-01-14', 'Available', 0, 4),
(19, 'SOUS LE CIEL DE KOUTAISSI', 'Koberidze Aleksandre', 'Item_Images/Movie/V99999008299.jpg', 'Used - like old', '2016-07-10', '2017-05-27', 'Available', 0, 4),
(20, 'MEME LES SOURIS VONT AU PARADIS', 'Bubenicek Jan', 'Item_Images/Movie/0000000273262.jpg', 'Broken', '2014-09-04', '2015-08-29', 'Unavailable', 0, 4),
(21, 'APRES LA CHUTE', 'Pierre-Henry Gomont', 'Item_Images/Comic/074ac8ed6b3c596776004f8e338af83bde47944d27e07e69ea5ea3cdc3a1a173.jpg', 'New', '2022-01-25', '2022-01-26', 'Available', 0, 5),
(22, 'LA REPUBLIQUE DU CRANE', 'Vincent Brugeas', 'Item_Images/Comic/302d3ce65d4399b4abf8251d36fa0661d7623f60f8fa928a00ea7ab6d6ea538c.jpg', 'Used - like new', '2022-08-11', '2022-12-06', 'Available', 0, 5),
(23, 'UN CONCOURS PLEIN D\'OBSTACLES !', 'Kristin Varner', 'Item_Images/Comic/794e63537953ef1486c97b8a60560ff7dc9d72e17e9d03ab83c9e587960b761c.jpg', 'Used', '2021-01-01', '2021-02-23', 'Available', 0, 5),
(24, 'HARRY MAKITO, MAGICIEN & SAUVEUR DE SORCIERES. 1', 'Shizumu Watanabe', 'Item_Images/Comic/e3eea37ac3f238ffe109a101fe198b0b6cb2605e31f1eae9ef3185e2cd933d07.jpg', 'Used - like old', '2018-01-11', '2018-07-19', 'Available', 0, 5),
(25, 'CHER BLOPBLOP : LETTRE A MON EMBRYON', 'Lea Castor', 'Item_Images/Comic/4fbec7c24ebf7b699e1f8d80eb993a6aac12bb81c66fe8c939c04883bd884c84.jpg', 'Broken', '2016-02-08', '2017-01-31', 'Unavailable', 0, 5),
(26, 'HORIMIYA. 1', 'Hero', 'Item_Images/Comic/5fe82a6ebaaf82b781bbba1e191ee401c058da8f7c2b73301abdbfabe78075ce.jpg', 'New\r\n', '2021-12-31', '2022-03-01', 'Available', 0, 5),
(27, 'CE QUE NOUS SOMMES', 'Zep', 'Item_Images/Comic/ea6d8df9f4405831281f85f4858e045373cbf0888cbc3f4dd093c1726c5013f7.jpg', 'Used - like new', '2021-07-13', '2021-12-03', 'Available', 0, 5),
(28, 'JE SUIS TOUJOURS VIVANT', 'Roberto Saviano', 'Item_Images/Comic/4718f52129741fc999c051f1020d99502e12af471028007b47c75573df21d2cc.jpg', 'Used', '2020-08-28', '2021-09-02', 'Available', 0, 5),
(29, 'LA LOUVE BOREALE', 'Nuria Tamarit', 'Item_Images/Comic/387c9f96d3ae60a8cf1bf2d7d66e8c50423b72eb1b333c30e071d0ad849a4aa7.jpg', 'Used - like old', '2018-07-23', '2019-03-28', 'Available', 0, 5),
(30, 'LE PETIT FRERE', 'Jean-Louis Tripp', 'Item_Images/Comic/142e727314018b9d6fa322ffe2d49cb86db6c9dcdf6835f668b60780e5aade9a.jpg', 'Broken', '2017-03-01', '2017-06-15', 'Unavailable', 0, 5),
(35, 'DB545', 'Db545', 'Item_Images/Music/0803341556607_thumb.jpg', 'Broken', '2012-08-17', '2014-01-17', 'Unavailable', 0, 2),
(36, 'POMPEII', 'Cate Le Bon', 'Item_Images/Music/0184923131529_thumb.jpg', 'New', '2022-03-25', '2022-06-15', 'Available', 0, 2),
(37, 'DRAGON NEW WARM MOUNTAIN I BELIEVE IN YOU', 'Big Thief', 'Item_Images/Music/0191400040823_thumb.jpg', 'Used - like new', '2020-07-23', '2020-10-30', 'Available', 0, 2),
(38, 'MANNUS', 'Casse Gueule', 'Item_Images/Music/1234467.jpg', 'Used', '2019-07-07', '2020-08-29', 'Available', 0, 2),
(39, 'SONIC POEMS', 'Lewis OfMan', 'Item_Images/Music/0602445293896_thumb.jpg', 'Used - like old', '2014-03-12', '2016-07-12', 'Available', 0, 2),
(40, 'CONFLUENCE #2 : LE CHANT DES SOURCES', 'Isabelle Courroy', 'Item_Images/Music/3341348603698_thumb.jpg', 'Broken', '2016-03-31', '2017-01-20', 'Unavailable', 0, 2),
(49, 'AU PARADIS JE DEMEURE', 'Attica Locke', 'Item_Images/Book/c80f59eefb7f0872ce8cda3577d5db807ff84aaf0e496198c46f943eb83c4619.jpg', 'Used', '2016-09-21', '2017-01-22', 'Reserved', 0, 1),
(87, 'Et quas sit in non q', 'Occaecat ex aut vita', '/Item_Images/1297513.jpg', 'New', '1991-09-13', '1970-11-21', 'Unavailable', 20, 4),
(88, 'Reiciendis et nobis ', 'Qui animi consectet', '/Item_Images/1297513.jpg', 'Used - like new', '1972-01-14', '1986-12-06', 'Available', 45, 5);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `Nickname` varchar(150) NOT NULL,
  `Full_Name` varchar(150) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT 0,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `CIN` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Penalty_Count` int(11) DEFAULT 0,
  `Birth_Date` date DEFAULT NULL,
  `Creation_Date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Nickname`, `Full_Name`, `Password`, `Admin`, `Address`, `Email`, `Phone`, `CIN`, `Occupation`, `Penalty_Count`, `Birth_Date`, `Creation_Date`) VALUES
('alilousaad1975', 'Alilou Saad', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 1, '27, av. Hassan II444', 'alilou.saad@gmail.com', '+212695621537', 'K143659', 'Responsable', 0, '1975-04-22', '2015-06-09'),
('bkhitamine2000', 'Bkhit Amine', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '20, rue Bani Marine', 'bkhit.amine@gmail.com', '+21268402183822', 'CE45691834', 'Etudiant', 1, '2000-01-04', '2022-07-09'),
('cc', NULL, NULL, 0, NULL, 'mmmmmmmmmmm', NULL, 'mmmmmmmm', NULL, 0, NULL, '2023-03-08'),
('daifaneyasmine2002', 'Daifane Yasmine', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '63, Place Rahba Lakdima', 'dafaine.yasmine@gmail.com', '+212696395569', 'BR54712', 'Salariee', 0, '2002-05-15', '2021-08-23'),
('elghaliikram2001', 'Elghali Ikram', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '6, rue Moulay Slimane', 'elghali.ikram@gmail.com', '+212676225556', 'BL87123', 'Etudiante', 0, '2001-08-25', '2021-09-09'),
('ettamriilyasse1997', 'Ettamri Ilyasse', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '1, av Hassan II, hay ElFarah Karia', 'ettamri.ilyasse@gmail.com', '+212672322387', 'BE345019', 'Salarié', 0, '1997-01-31', '2022-01-20'),
('fffff', NULL, NULL, 0, NULL, 'sdfsdf', NULL, 'sdfdsf', NULL, 0, NULL, '2023-03-08'),
('httjhy', NULL, NULL, 0, NULL, 'blabla@blabla.blabla', NULL, 'blabla', NULL, 0, NULL, '2023-03-08'),
('Joel Blackburn', 'Rowan Hurley', '$2y$10$KhqWv5yqHkw2XKMEe1JNfOpU5HPle8nLEr4T7CoM4HY2nUZCoeQ6a', 0, 'Incididunt labore ni', 'sidigeg@mailinator.com', '+1 (531) 849-1638', 'ddd', 'Tempora enim dolore ', 0, '2016-05-06', '2023-03-08'),
('lamchattabamine2003', 'Lamchattab Amine', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, 'bd. Mohamed V, Imm. Al Ouafa', 'lamchattab.amine@gmail.com', '+212698129013', 'FG341203', 'Entrepreneur', 2, '2003-07-07', '2022-06-02'),
('ppp', NULL, NULL, 0, NULL, 'ppppp', NULL, 'pppp', NULL, 0, NULL, '2023-03-08'),
('salikbassam2001', 'Bassam Salik', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '365, bd Mohammed V', 'bassam.salik@gmail.com', '+212675975761', 'KB345712', 'Etudiant', 0, '2001-06-27', '2022-03-08'),
('sarsriimran2004', 'Sarsri Imran', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '13, av. de la liberté, v.n.', 'sarsri.imran@gmail.com', '+212674586990', 'KB33456', 'Etudiant', 0, '2004-04-01', '2022-02-26'),
('Shoshana Lindsay', 'Rama Becker', '$2y$10$yJZO5LV2Pms/m6AoWwFmNestCAEvmcH25KP4kcyExiDkW.9Vb3EGm', 0, 'Nostrum delectus qu', 'vykyverox@mailinator.com', '+1 (679) 907-8576', 'dhfgjhklmnbsvadxcvjbk', 'Irure ea exercitatio', 0, '1982-03-29', '2023-03-08'),
('tamimsoufian2003', 'Tamim Soufian', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '24, rue Ali Abderrazak ', 'tamim.Soufian@gmail.com', '+212683842321', 'KB89645', 'Etudiant', 0, '2003-10-27', '2022-08-24'),
('tebbasaad2003', 'Tebba Saad', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, 'Av. Mohamed V, 83350', 'tebba.saad@gmail.com', '+212674065353', 'KB345716', 'Stagiaire', 0, '2003-02-06', '2022-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_Code` int(11) NOT NULL,
  `Reservation_Date` datetime DEFAULT current_timestamp(),
  `Reservation_Expiration_Date` datetime DEFAULT NULL,
  `Item_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Reservation_Code`, `Reservation_Date`, `Reservation_Expiration_Date`, `Item_Code`, `Nickname`) VALUES
(2975, '2023-03-11 08:56:09', '2023-03-12 08:56:09', 49, 'bkhitamine2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`Borrowing_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`),
  ADD KEY `Reservation_Code` (`Reservation_Code`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Code`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_Code`),
  ADD KEY `Category_Code` (`Category_Code`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Nickname`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `Borrowing_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2976;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowings_ibfk_3` FOREIGN KEY (`Reservation_Code`) REFERENCES `reservation` (`Reservation_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Category_Code`) REFERENCES `category` (`Category_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
