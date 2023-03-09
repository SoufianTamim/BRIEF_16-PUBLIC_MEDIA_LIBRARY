-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 mars 2023 à 10:35
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `borrowings`
--

CREATE TABLE `borrowings` (
  `Borrowing_Code` int(11) NOT NULL,
  `Borrowing_Date` datetime DEFAULT NULL,
  `Borrowing_Return_Date` datetime DEFAULT NULL,
  `Item_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `Reservation_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `borrowings`
--

INSERT INTO `borrowings` (`Borrowing_Code`, `Borrowing_Date`, `Borrowing_Return_Date`, `Item_Code`, `Nickname`, `Reservation_Code`) VALUES
(1, '2023-03-01 18:33:38', '2023-03-16 18:33:38', 2, 'bkhitamine2000', 8),
(2, '2023-03-02 18:33:38', '2023-03-17 18:33:38', 6, 'daifaneyasmine2002', 11),
(3, '2023-03-05 14:01:38', '2023-03-20 14:01:38', 9, 'daifaneyasmine2002', 29),
(4, '2023-02-26 21:05:38', '2023-03-13 21:05:38', 13, 'elghaliikram2001', 5),
(5, '2023-02-26 21:07:22', '2023-03-13 21:07:22', 18, 'elghaliikram2001', 6),
(6, '2023-02-24 18:33:38', '2023-03-11 18:33:38', 24, 'ettamriilyasse1997', 4),
(7, '2023-02-26 19:28:23', '2023-03-13 19:28:23', 28, 'ettamriilyasse1997', 7),
(8, '2023-03-02 11:45:45', '2023-03-17 11:45:45', 33, 'lamchattabamine2003', 9),
(9, '2023-03-02 11:48:28', '2023-03-17 11:48:28', 34, 'lamchattabamine2003', 10),
(10, '2023-01-03 10:05:32', '2023-01-24 19:34:45', 11, 'lamchattabamine2003', 1),
(11, '2023-01-03 10:07:58', '2023-01-24 19:35:30', 16, 'lamchattabamine2003', 2),
(12, '2023-02-08 15:00:23', '2023-02-28 10:09:55', 19, 'bkhitamine2000', 3),
(13, '2023-03-03 12:06:34', '2023-03-18 12:06:34', 38, 'tamimsoufian2003', 12),
(14, '2023-03-03 12:08:34', '2023-03-18 12:08:34', 39, 'tamimsoufian2003', 13),
(15, '2023-03-04 16:06:40', '2023-03-19 16:06:40', 41, 'tebbasaad2003', 14),
(16, '2023-03-04 16:07:59', '2023-03-19 16:07:59', 50, 'tebbasaad2003', 15);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `Category_Code` int(11) NOT NULL,
  `Category_Name` varchar(50) DEFAULT NULL,
  `Category_Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`Category_Code`, `Category_Name`, `Category_Type`) VALUES
(1, 'Book', 'Number of pages'),
(2, 'Music', 'Duration'),
(3, 'Audio book', 'Duration'),
(4, 'Movie', 'Duration'),
(5, 'Comic', 'Number of pages');

-- --------------------------------------------------------

--
-- Structure de la table `item`
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
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`Item_Code`, `Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Purchase_Date`, `Status`, `Duration`, `Category_Code`) VALUES
(1, 'LA FEMME MOUSTIQUE : TEXTE INTEGRAL', 'Ghislaine Herbera', 'Item_Images/Audio_Book/wsgetimg (3).jpeg', 'Used - like new', '2022-01-10', '2022-01-10', 'Available', 0, 3),
(2, 'PANIQUE DANS LA FORET', 'Clotilde Perrin', 'Item_Images/Audio_Book/1297509.jpg', 'Used', '2013-03-27', '2019-07-10', 'Borrowed', 0, 3),
(3, 'PAX ET LE PETIT SOLDAT', 'Sara Pennypacker', 'Item_Images/Audio_Book/1297513.jpg', 'Used - like new', '2020-10-14', '2021-08-19', 'Reserved', 0, 3),
(4, 'SOURICETTE VEUT UN AMOUREUX', 'François Vincent', 'Item_Images/Audio_Book/1296908.jpg', 'Used - like old', '2016-09-15', '2021-09-10', 'Available', 0, 3),
(5, 'SAUTE-LA-PUCE', 'Benoit Debecker', 'Item_Images/Audio_Book/wsgetimg.jpeg', 'Broken', '2015-09-09', '2021-03-18', 'Unavailable', 0, 3),
(6, 'PREMIERES NEIGES', 'Nelson', 'Item_Images/Audio_Book/wsgetimg (1).jpeg', 'New', '2022-05-06', '2022-03-30', 'Borrowed', 0, 3),
(7, 'LA PYRAMIDE DES BESOINS HUMAINS', 'Caroline Sole', 'Item_Images/Audio_Book/A001765230.jpg', 'Used - like new', '2020-12-18', '2022-03-11', 'Available', 0, 3),
(8, 'LA PETITE DANSEUSE - EDGAR DEGAS', 'Geraldine Elschner', 'Item_Images/Audio_Book/1102896.jpg', 'Used', '2017-10-19', '2022-07-07', 'Reserved', 0, 3),
(9, 'SALSA !', 'Edouard Manceau', 'Item_Images/Audio_Book/9782375150788_thumb.jpg', 'Used - like old', '2021-10-06', '2022-06-10', 'Borrowed', 0, 3),
(10, 'LE BRUIT DES NOMBRES', 'Jeanne Boyer', 'Item_Images/Audio_Book/wsgetimg (2).jpeg', 'Broken', '2020-05-29', '2022-01-31', 'Unavailable', 0, 3),
(11, 'LES MITCHELL CONTRE LES MACHINES', 'Mike Rianda', 'Item_Images/Movie/V99999006506.jpg', 'New', '2020-03-04', '2021-07-09', 'Available', 0, 4),
(12, 'HAM ON RYE', 'Taormina Tyler', 'Item_Images/Movie/V99999007601.jpg', 'Used - like new', '2022-08-11', '2022-09-11', 'Reserved', 0, 4),
(13, 'JERK', 'Vienne Gisele', 'Item_Images/Movie/wsgetimg.jpeg', 'Used', '2022-05-19', '2022-07-21', 'Borrowed', 0, 4),
(14, 'GREAT FREEDOM', 'Meise Sebastian', 'Item_Images/Movie/wsgetimg (1).jpeg', 'Used - like old', '2018-07-27', '2019-04-10', 'Reserved', 0, 4),
(15, 'THE INNOCENTS', 'Vogt Eskil', 'Item_Images/Movie/0000000274442.jpg', 'Broken', '2017-03-02', '2017-08-11', 'Unavailable', 0, 4),
(16, 'CLARA SOLA', 'Alvarez Mesen', 'Item_Images/Movie/wsgetimg (2).jpeg', 'New', '2022-02-07', '2022-02-09', 'Available', 0, 4),
(17, 'LE PEUPLE LOUP', 'Moore Tomm', 'Item_Images/Movie/0000000271977.jpg', 'Used - like new', '2021-01-13', '2022-01-14', 'Reserved', 0, 4),
(18, 'SOUL', 'Docter Pete', 'Item_Images/Movie/V99999006516.jpg', 'Used', '2019-07-25', '2020-01-21', 'Borrowed', 0, 4),
(19, 'SOUS LE CIEL DE KOUTAISSI', 'Koberidze Aleksandre', 'Item_Images/Movie/V99999008299.jpg', 'Used - like old', '2016-07-10', '2017-05-27', 'Available', 0, 4),
(20, 'MEME LES SOURIS VONT AU PARADIS', 'Bubenicek Jan', 'Item_Images/Movie/0000000273262.jpg', 'Broken', '2014-09-04', '2015-08-29', 'Unavailable', 0, 4),
(21, 'APRES LA CHUTE', 'Pierre-Henry Gomont', 'Item_Images/Comic/074ac8ed6b3c596776004f8e338af83bde47944d27e07e69ea5ea3cdc3a1a173.jpg', 'New', '2022-01-25', '2022-01-26', 'Available', 0, 5),
(22, 'LA REPUBLIQUE DU CRANE', 'Vincent Brugeas', 'Item_Images/Comic/302d3ce65d4399b4abf8251d36fa0661d7623f60f8fa928a00ea7ab6d6ea538c.jpg', 'Used - like new', '2022-08-11', '2022-12-06', 'Available', 0, 5),
(23, 'UN CONCOURS PLEIN D\'OBSTACLES !', 'Kristin Varner', 'Item_Images/Comic/794e63537953ef1486c97b8a60560ff7dc9d72e17e9d03ab83c9e587960b761c.jpg', 'Used', '2021-01-01', '2021-02-23', 'Reserved', 0, 5),
(24, 'HARRY MAKITO, MAGICIEN & SAUVEUR DE SORCIERES. 1', 'Shizumu Watanabe', 'Item_Images/Comic/e3eea37ac3f238ffe109a101fe198b0b6cb2605e31f1eae9ef3185e2cd933d07.jpg', 'Used - like old', '2018-01-11', '2018-07-19', 'Borrowed', 0, 5),
(25, 'CHER BLOPBLOP : LETTRE A MON EMBRYON', 'Lea Castor', 'Item_Images/Comic/4fbec7c24ebf7b699e1f8d80eb993a6aac12bb81c66fe8c939c04883bd884c84.jpg', 'Broken', '2016-02-08', '2017-01-31', 'Unavailable', 0, 5),
(26, 'HORIMIYA. 1', 'Hero', 'Item_Images/Comic/5fe82a6ebaaf82b781bbba1e191ee401c058da8f7c2b73301abdbfabe78075ce.jpg', 'New\r\n', '2021-12-31', '2022-03-01', 'Available', 0, 5),
(27, 'CE QUE NOUS SOMMES', 'Zep', 'Item_Images/Comic/ea6d8df9f4405831281f85f4858e045373cbf0888cbc3f4dd093c1726c5013f7.jpg', 'Used - like new', '2021-07-13', '2021-12-03', 'Reserved', 0, 5),
(28, 'JE SUIS TOUJOURS VIVANT', 'Roberto Saviano', 'Item_Images/Comic/4718f52129741fc999c051f1020d99502e12af471028007b47c75573df21d2cc.jpg', 'Used', '2020-08-28', '2021-09-02', 'Borrowed', 0, 5),
(29, 'LA LOUVE BOREALE', 'Nuria Tamarit', 'Item_Images/Comic/387c9f96d3ae60a8cf1bf2d7d66e8c50423b72eb1b333c30e071d0ad849a4aa7.jpg', 'Used - like old', '2018-07-23', '2019-03-28', 'Reserved', 0, 5),
(30, 'LE PETIT FRERE', 'Jean-Louis Tripp', 'Item_Images/Comic/142e727314018b9d6fa322ffe2d49cb86db6c9dcdf6835f668b60780e5aade9a.jpg', 'Broken', '2017-03-01', '2017-06-15', 'Unavailable', 0, 5),
(31, 'LOVE EXCHANGE FAILURE', 'White Ward. Musicien', 'Item_Images/Music/0634438580973_thumb.jpg', 'New', '2022-09-30', '2022-10-23', 'Available', 0, 2),
(32, 'FEVER DREAMS PTS 1-4', 'Johnny Marr', 'Item_Images/Music/4050538706109_thumb.jpg', 'Used - like new', '2020-09-11', '2021-11-30', 'Reserved', 0, 2),
(33, 'THE GLEAM', 'Park Jiha', 'Item_Images/Music/1228680.jpg', 'Used', '2018-07-25', '2019-01-24', 'Borrowed', 0, 2),
(34, 'SHOALS', 'Palace', 'Item_Images/Music/0602438712960_thumb.jpg', 'Used - like old', '2017-06-23', '2017-09-16', 'Borrowed', 0, 2),
(35, 'DB545', 'Db545', 'Item_Images/Music/0803341556607_thumb.jpg', 'Broken', '2012-08-17', '2014-01-17', 'Unavailable', 0, 2),
(36, 'POMPEII', 'Cate Le Bon', 'Item_Images/Music/0184923131529_thumb.jpg', 'New', '2022-03-25', '2022-06-15', 'Available', 0, 2),
(37, 'DRAGON NEW WARM MOUNTAIN I BELIEVE IN YOU', 'Big Thief', 'Item_Images/Music/0191400040823_thumb.jpg', 'Used - like new', '2020-07-23', '2020-10-30', 'Reserved', 0, 2),
(38, 'MANNUS', 'Casse Gueule', 'Item_Images/Music/1234467.jpg', 'Used', '2019-07-07', '2020-08-29', 'Borrowed', 0, 2),
(39, 'SONIC POEMS', 'Lewis OfMan', 'Item_Images/Music/0602445293896_thumb.jpg', 'Used - like old', '2014-03-12', '2016-07-12', 'Borrowed', 0, 2),
(40, 'CONFLUENCE #2 : LE CHANT DES SOURCES', 'Isabelle Courroy', 'Item_Images/Music/3341348603698_thumb.jpg', 'Broken', '2016-03-31', '2017-01-20', 'Unavailable', 0, 2),
(41, 'LE LIVRE SANS IMAGES', 'B. J. Novak', 'Item_Images/Book/2bef76287385920bb9770bb454d9cceef5571f9d8e6d45cf6c28bedcae8711f7.jpg', 'New', '2022-03-25', '2022-03-26', 'Borrowed', 0, 1),
(42, 'MAYDALA EXPRESS', 'Davide Morosinotto', 'Item_Images/Book/45f52e20447a3b81516de547e69bd91d025928f9b695f353b9b7c482075001db.jpg', 'Used - like new', '2020-09-15', '2021-02-03', 'Reserved', 0, 1),
(43, 'L\'ETE OU TOUT A FONDU : ROMAN', 'Tiffany McDaniel', 'Item_Images/Book/c45078e0f10b727bf5360f5fa86673f3f88333fc71106104fd903f8b310a6a68.jpg', 'Used', '2018-06-07', '2019-03-20', 'Available', 0, 1),
(44, 'LA TREIZIEME HEURE : ROMAN', 'Emmanuelle Bayamack-Tam', 'Item_Images/Book/b96af83e9db11509917c704f4064eb0d35f8d65c1fd0a88c8567593df3a95ebd.jpg', 'Used', '2019-03-09', '2019-05-30', 'Reserved', 0, 1),
(45, 'LA LIGNE DE NAGE : ROMAN', 'Julie Otsuka', 'Item_Images/Book/f2f22494fb52e831e8be71dc2c5969dc761c789ec17af4c96edd08629f0a7d10.jpg', 'Used - like old', '2017-06-13', '2018-01-15', 'Available', 0, 1),
(46, 'LES COEURS ENDURCIS', 'Martyna Bunda', 'Item_Images/Book/4f380300adf3afe2f56aec9a3cebaf2ba143eba512050d83e699fa21f479063d.jpg', 'Broken', '2015-08-28', '2015-09-02', 'Unavailable', 0, 1),
(47, 'UNE SURPRISE POUR AMOS MCGEE', 'Philip Christian', 'Item_Images/Book/079bd8ff61271504db3d7dbfbe7fc46f2f4c08a87ab4fb7da7a36f02c4135780.jpg', 'New', '2022-01-11', '2022-02-09', 'Reserved', 0, 1),
(48, 'LEUR SANG COULE DANS TES VEINES', 'Rachel Burge', 'Item_Images/Book/64ab4232595d9e4d20a4bb76d2508100290b8006af7cdd138e91d7a38f2a330a.jpg', 'Used - like new', '2019-06-10', '2020-02-04', 'Available', 0, 1),
(49, 'AU PARADIS JE DEMEURE', 'Attica Locke', 'Item_Images/Book/c80f59eefb7f0872ce8cda3577d5db807ff84aaf0e496198c46f943eb83c4619.jpg', 'Used', '2016-09-21', '2017-01-22', 'Available', 0, 1),
(50, 'L\'ECOLE N\'EST PAS FAITE POUR LES PAUVRES ', 'Jean-Paul Delahaye', 'Item_Images/Book/21711074dc6316af8f3428a1e0e5348da54f8f86c708e0f3af8279a20ed0f121.jpg', 'Used - like old', '2019-03-01', '2019-04-01', 'Borrowed', 0, 1),
(86, 'Quas animi in est q', 'Ut earum in cum non ', '/Item_Images/1297509.jpg', 'Used - like old', '2014-02-22', '2017-03-25', 'Borrowed', 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `members`
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
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`Nickname`, `Full_Name`, `Password`, `Admin`, `Address`, `Email`, `Phone`, `CIN`, `Occupation`, `Penalty_Count`, `Birth_Date`, `Creation_Date`) VALUES
('alilousaad1975', 'Alilou Saad', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 1, '27, av. Hassan II444', 'alilou.saad@gmail.com', '+212695621537', 'K143659', 'Responsable', 0, '1975-04-22', '2015-06-09'),
('bkhitamine2000', 'Bkhit Amine', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '20, rue Bani Marine', 'bkhit.amine@gmail.com', '+212684021838', 'CE456918', 'Etudiant', 1, '2000-01-04', '2022-07-09'),
('blabla', NULL, NULL, 0, NULL, 'blabla@blabla.blabla', NULL, 'blabla', NULL, 0, NULL, '2023-03-08'),
('daifaneyasmine2002', 'Daifane Yasmine', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '63, Place Rahba Lakdima', 'dafaine.yasmine@gmail.com', '+212696395569', 'BR54712', 'Salariee', 0, '2002-05-15', '2021-08-23'),
('elghaliikram2001', 'Elghali Ikram', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '6, rue Moulay Slimane', 'elghali.ikram@gmail.com', '+212676225556', 'BL87123', 'Etudiante', 0, '2001-08-25', '2021-09-09'),
('ettamriilyasse1997', 'Ettamri Ilyasse', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '1, av Hassan II, hay ElFarah Karia', 'ettamri.ilyasse@gmail.com', '+212672322387', 'BE345019', 'Salarié', 0, '1997-01-31', '2022-01-20'),
('fffff', NULL, NULL, 0, NULL, 'sdfsdf', NULL, 'sdfdsf', NULL, 0, NULL, '2023-03-08'),
('httjhy', NULL, NULL, 0, NULL, 'blabla@blabla.blabla', NULL, 'blabla', NULL, 0, NULL, '2023-03-08'),
('Joel Blackburn', 'Rowan Hurley', '$2y$10$KhqWv5yqHkw2XKMEe1JNfOpU5HPle8nLEr4T7CoM4HY2nUZCoeQ6a', 0, 'Incididunt labore ni', 'sidigeg@mailinator.com', '+1 (531) 849-1638', 'ddd', 'Tempora enim dolore ', 0, '2016-05-06', '2023-03-08'),
('lamchattabamine2003', 'Lamchattab Amine', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, 'bd. Mohamed V, Imm. Al Ouafa', 'lamchattab.amine@gmail.com', '+212698129013', 'FG341203', 'Entrepreneur', 2, '2003-07-07', '2022-06-02'),
('mmmmmmmm', NULL, NULL, 0, NULL, 'mmmmmmmmmmm', NULL, 'mmmmmmmm', NULL, 0, NULL, '2023-03-08'),
('ppp', NULL, NULL, 0, NULL, 'ppppp', NULL, 'pppp', NULL, 0, NULL, '2023-03-08'),
('salikbassam2001', 'Bassam Salik', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '365, bd Mohammed V', 'bassam.salik@gmail.com', '+212675975761', 'KB345712', 'Etudiant', 0, '2001-06-27', '2022-03-08'),
('sarsriimran2004', 'Sarsri Imran', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '13, av. de la liberté, v.n.', 'sarsri.imran@gmail.com', '+212674586990', 'KB33456', 'Etudiant', 0, '2004-04-01', '2022-02-26'),
('Shoshana Lindsay', 'Rama Becker', '$2y$10$yJZO5LV2Pms/m6AoWwFmNestCAEvmcH25KP4kcyExiDkW.9Vb3EGm', 0, 'Nostrum delectus qu', 'vykyverox@mailinator.com', '+1 (679) 907-8576', 'dhfgjhklmnbsvadxcvjbk', 'Irure ea exercitatio', 0, '1982-03-29', '2023-03-08'),
('tamimsoufian2003', 'Tamim Soufian', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, '24, rue Ali Abderrazak ', 'tamim.Soufian@gmail.com', '+212683842321', 'KB89645', 'Etudiant', 0, '2003-10-27', '2022-08-24'),
('tebbasaad2003', 'Tebba Saad', '$2y$10$JLZPL6qxKGsYcKY9g6nXpeArQ1owcSWcbmK02Hh5kyLaEmZkxhsYO', 0, 'Av. Mohamed V, 83350', 'tebba.saad@gmail.com', '+212674065353', 'KB345716', 'Stagiaire', 0, '2003-02-06', '2022-06-07');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_Code` int(11) NOT NULL,
  `Reservation_Date` datetime DEFAULT current_timestamp(),
  `Reservation_Expiration_Date` datetime DEFAULT NULL,
  `Item_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Reservation_Code`, `Reservation_Date`, `Reservation_Expiration_Date`, `Item_Code`, `Nickname`) VALUES
(1, '2023-01-02 20:33:45', '2023-01-03 20:33:45', 11, 'lamchattabamine2003'),
(2, '2023-01-02 20:35:21', '2023-01-03 20:35:21', 16, 'lamchattabamine2003'),
(3, '2023-02-07 17:22:32', '2023-02-08 17:22:32', 19, 'bkhitamine2000'),
(4, '2023-02-24 16:59:33', '2023-02-25 16:59:33', 24, 'ettamriilyasse1997'),
(5, '2023-02-26 17:22:38', '2023-02-27 17:22:38', 13, 'elghaliikram2001'),
(6, '2023-02-26 17:25:11', '2023-02-27 17:25:11', 18, 'elghaliikram2001'),
(7, '2023-02-26 19:15:23', '2023-02-27 19:15:23', 28, 'ettamriilyasse1997'),
(8, '2023-03-01 14:25:38', '2023-03-02 14:25:38', 2, 'bkhitamine2000'),
(9, '2023-03-01 23:45:21', '2023-03-02 23:45:21', 33, 'lamchattabamine2003'),
(10, '2023-03-01 23:46:44', '2023-03-02 23:46:44', 34, 'lamchattabamine2003'),
(11, '2023-03-02 17:11:38', '2023-03-03 17:11:38', 6, 'daifaneyasmine2002'),
(12, '2023-03-02 23:06:44', '2023-03-03 23:06:44', 38, 'tamimsoufian2003'),
(13, '2023-03-03 11:45:34', '2023-03-04 11:45:34', 39, 'tamimsoufian2003'),
(14, '2023-03-03 21:29:09', '2023-03-04 21:29:09', 41, 'tebbasaad2003'),
(15, '2023-03-03 21:31:19', '2023-03-04 21:31:19', 50, 'tebbasaad2003'),
(16, '2023-03-04 07:53:37', '2023-03-05 07:53:37', 3, 'bkhitamine2000'),
(17, '2023-03-04 07:54:11', '2023-03-05 07:54:11', 8, 'daifaneyasmine2002'),
(18, '2023-03-04 07:55:00', '2023-03-05 07:55:00', 12, 'elghaliikram2001'),
(19, '2023-03-04 07:55:22', '2023-03-05 07:55:22', 14, 'bkhitamine2000'),
(20, '2023-03-04 08:30:11', '2023-03-05 08:30:11', 17, 'ettamriilyasse1997'),
(21, '2023-03-04 09:40:51', '2023-03-05 09:40:51', 23, 'lamchattabamine2003'),
(22, '2023-03-04 10:51:23', '2023-03-05 10:51:23', 27, 'salikbassam2001'),
(23, '2023-03-04 10:54:32', '2023-03-05 10:54:32', 29, 'salikbassam2001'),
(24, '2023-03-04 11:10:09', '2023-03-05 11:10:09', 32, 'salikbassam2001'),
(25, '2023-03-04 13:53:45', '2023-03-05 13:53:45', 37, 'sarsriimran2004'),
(26, '2023-03-04 13:55:42', '2023-03-05 13:55:42', 42, 'sarsriimran2004'),
(27, '2023-03-04 14:01:02', '2023-03-05 14:01:02', 44, 'sarsriimran2004'),
(28, '2023-03-04 19:23:37', '2023-03-05 19:23:37', 47, 'tamimsoufian2003'),
(29, '2023-03-04 21:55:21', '2023-03-05 21:55:21', 9, 'daifaneyasmine2002'),
(2919, '2023-03-09 10:30:23', '2023-03-10 10:30:23', 4, 'lamchattabamine2003');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`Borrowing_Code`),
  ADD UNIQUE KEY `Reservation_Code` (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Code`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_Code`),
  ADD KEY `Category_Code` (`Category_Code`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Nickname`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `Borrowing_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `Item_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2920;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`),
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`),
  ADD CONSTRAINT `borrowings_ibfk_3` FOREIGN KEY (`Reservation_Code`) REFERENCES `reservation` (`Reservation_Code`);

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Category_Code`) REFERENCES `category` (`Category_Code`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
