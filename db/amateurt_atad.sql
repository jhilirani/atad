-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2017 at 04:17 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amateurt_atad`
--
CREATE DATABASE IF NOT EXISTS `amateurt_atad` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `amateurt_atad`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `FullName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `UserName`, `FullName`, `Email`, `Password`, `Status`) VALUES
(1, 'admin', 'Admin', 'admin@admin.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `BannerID` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `Caption` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`BannerID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`BannerID`, `Image`, `Status`, `Caption`) VALUES
(2, '1d83a40c3eb7a0cb520671f41ce1cdb9.jpg', 1, 'A hourner for national chomipons'),
(3, 'b5a232ed487887bea6bf0bb08fa9b6c7.jpg', 1, 'Selection Team for 16th State Championship');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `ParrentCategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Image` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `ParrentCategoryID`, `CategoryName`, `Image`, `Status`) VALUES
(2, 0, 'Belt Test', NULL, 1),
(5, 0, 'State Level Championship', NULL, 1),
(4, 0, 'National Level Chamipaship', NULL, 1),
(6, 0, 'Training', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
CREATE TABLE IF NOT EXISTS `cms` (
  `CMSID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `MetaTitle` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `MetaKeyWord` text COLLATE latin1_general_ci NOT NULL,
  `MetaDescription` text COLLATE latin1_general_ci NOT NULL,
  `ShortBody` text COLLATE latin1_general_ci NOT NULL,
  `Body` longtext COLLATE latin1_general_ci,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CMSID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`CMSID`, `Title`, `MetaTitle`, `MetaKeyWord`, `MetaDescription`, `ShortBody`, `Body`, `Status`) VALUES
(1, 'About ATAD', 'ATAD', 'ATAD', 'ATAD', 'The journey of ATAD started in the year 2007 with the two students and Soumyabrata Sahoo as instructor  gradually  with highs and lows, ups and down the Association grew and in the year 2014 it got affiliated to Taekwondo Association of Odisha(TAO) and Taekwondo Federation of India(TFI). Since then the Association never lookback with the sincearity and strong determination Dhenkanal District won the Championship title of 16th State Level Championship. \n\n\n\nThe Association by exceeding every boundary it has a record of highest number of students in the State, i.e. more than 20000. The wings of the Association  are spread to 17 School and 14 Centers run by highly skilled Taekwondo professtional and Guided by Er. Soumyabrata Sahoo supported by District Administrations.\n\n\nTaekwondo discipline which is now an Olympic Sport & gaining popularity amongst Children & Youth very fast.\n\n\n\nTaekwondo became an Olympic Sports in Sydney Olympic in the year 2000.It is also a regular discipline in major International  Multi Sport event like Asian Games ,SAF Games.\n\n\n\n', '<p>\n <h><strong> <kbd>The journey of ATAD started in the year 2007 with the two students and Soumyabrata Sahoo as instructor &nbsp;gradually &nbsp;with highs and lows, ups and down the Association grew and in the year 2014 it got affiliated to Taekwondo Association of Odisha(TAO) and Taekwondo Federation of India(TFI). Since then the Association never lookback with the sincearity and strong determination Dhenkanal District won the Championship title of 16th State Level Championship.</kbd> </strong></h></p>\n<p>\n <h>&lt;h blue;&quot;=&quot;&quot;&gt;<strong> <kbd>The Association by exceeding every boundary it has a record of highest number of students in the State, i.e. more than 20000. The wings of the Association &nbsp;are spread to 17 School and 14 Centers run by highly skilled Taekwondo professtional and Guided by Er. Soumyabrata Sahoo supported by District Administrations.</kbd></strong></h></p>\n<p>\n &nbsp;</p>\n<p>\n &nbsp;</p>\n<p>\n &nbsp;</p>\n', 1),
(7, 'Career center', 'Career center', 'Career center', 'Career center', 'Career center', 'Career center', 1),
(2, 'Our Vision', 'Our Visionn', 'Our Visionn', 'Our Visionn', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p  border-box;\">\n Enhance the skills of taekwondo and &nbsp;reach every individual of Odisha from rural to urban and rich to poor.</p>\n<p  border-box;\">\n To promote the art &nbsp;by the involvement and active participation of the young mass from &nbsp;school,colleges and university of odisha.</p>\n<p  border-box;\">\n To empower girls and ladies of our society by teaching self defense.</p>\n<p  border-box;\">\n Develop team spirit and Social Responsibility.</p>\n<p  border-box;\">\n Organize and participate state and National level championship.</p>\n<p  border-box;\">\n Participate and achieved a position for Odisha state in the Asian Olympics. &nbsp;&nbsp;</p>\n', 1),
(3, 'Demo Schedules', 'Demo Schedule', 'Demo Schedule', 'Demo Schedule', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1),
(4, 'Our Activity', 'Our Activity', 'Our Activity', 'Our Activity', 'Lorem ipsum dolor sit amet, con sec tetur adipiscing elit. Pha sellus fsddg eleifend auctor libero id ultr icies. Aen ean bib endum sem et orci vulputate sit amet pharetra mauris hendrerit. Lorem ipsum dolor sit amet, con', '<p>\r\n Lorem ipsum dolor sit amet, con sec tetur adipiscing elit. Pha sellus fsddg eleifend auctor libero id ultr icies. Aen ean bib endum sem et orci vulputate sit amet pharetra mauris hendrerit. Lorem ipsum dolor sit amet, con</p>\r\n', 1),
(5, 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', '<p>\r\n Terms and Conditions</p>\r\n', 1),
(6, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '<p>\r\n Privacy Policy</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `ContactUsID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ContactUsID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ContactUsID`, `Name`, `Email`, `Phone`, `Message`, `addedDate`, `ip`) VALUES
(1, 'admission', 'soumyasahoo.9999@gmail.com', '7377707132', 'i want to register my name ', '2017-06-09 15:44:15', '117.197.253.234');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `CountryID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryCode` varchar(3) NOT NULL DEFAULT '',
  `CountryName` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`CountryID`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryID`, `CountryCode`, `CountryName`) VALUES
(1, 'US', 'United States'),
(2, 'CA', 'Canada'),
(3, 'AF', 'Afghanistan'),
(4, 'AL', 'Albania'),
(5, 'DZ', 'Algeria'),
(6, 'DS', 'American Samoa'),
(7, 'AD', 'Andorra'),
(8, 'AO', 'Angola'),
(9, 'AI', 'Anguilla'),
(10, 'AQ', 'Antarctica'),
(11, 'AG', 'Antigua and/or Barbuda'),
(12, 'AR', 'Argentina'),
(13, 'AM', 'Armenia'),
(14, 'AW', 'Aruba'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British lndian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CV', 'Cape Verde'),
(41, 'KY', 'Cayman Islands'),
(42, 'CF', 'Central African Republic'),
(43, 'TD', 'Chad'),
(44, 'CL', 'Chile'),
(45, 'CN', 'China'),
(46, 'CX', 'Christmas Island'),
(47, 'CC', 'Cocos (Keeling) Islands'),
(48, 'CO', 'Colombia'),
(49, 'KM', 'Comoros'),
(50, 'CG', 'Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecudaor'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'ID', 'Indonesia'),
(101, 'IR', 'Iran (Islamic Republic of)'),
(102, 'IQ', 'Iraq'),
(103, 'IE', 'Ireland'),
(104, 'IL', 'Israel'),
(105, 'IT', 'Italy'),
(106, 'CI', 'Ivory Coast'),
(107, 'JM', 'Jamaica'),
(108, 'JP', 'Japan'),
(109, 'JO', 'Jordan'),
(110, 'KZ', 'Kazakhstan'),
(111, 'KE', 'Kenya'),
(112, 'KI', 'Kiribati'),
(113, 'KP', 'Korea, Democratic People\'s Republic of'),
(114, 'KR', 'Korea, Republic of'),
(115, 'KW', 'Kuwait'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'LA', 'Lao People\'s Democratic Republic'),
(118, 'LV', 'Latvia'),
(119, 'LB', 'Lebanon'),
(120, 'LS', 'Lesotho'),
(121, 'LR', 'Liberia'),
(122, 'LY', 'Libyan Arab Jamahiriya'),
(123, 'LI', 'Liechtenstein'),
(124, 'LT', 'Lithuania'),
(125, 'LU', 'Luxembourg'),
(126, 'MO', 'Macau'),
(127, 'MK', 'Macedonia'),
(128, 'MG', 'Madagascar'),
(129, 'MW', 'Malawi'),
(130, 'MY', 'Malaysia'),
(131, 'MV', 'Maldives'),
(132, 'ML', 'Mali'),
(133, 'MT', 'Malta'),
(134, 'MH', 'Marshall Islands'),
(135, 'MQ', 'Martinique'),
(136, 'MR', 'Mauritania'),
(137, 'MU', 'Mauritius'),
(138, 'TY', 'Mayotte'),
(139, 'MX', 'Mexico'),
(140, 'FM', 'Micronesia, Federated States of'),
(141, 'MD', 'Moldova, Republic of'),
(142, 'MC', 'Monaco'),
(143, 'MN', 'Mongolia'),
(144, 'MS', 'Montserrat'),
(145, 'MA', 'Morocco'),
(146, 'MZ', 'Mozambique'),
(147, 'MM', 'Myanmar'),
(148, 'NA', 'Namibia'),
(149, 'NR', 'Nauru'),
(150, 'NP', 'Nepal'),
(151, 'NL', 'Netherlands'),
(152, 'AN', 'Netherlands Antilles'),
(153, 'NC', 'New Caledonia'),
(154, 'NZ', 'New Zealand'),
(155, 'NI', 'Nicaragua'),
(156, 'NE', 'Niger'),
(157, 'NG', 'Nigeria'),
(158, 'NU', 'Niue'),
(159, 'NF', 'Norfork Island'),
(160, 'MP', 'Northern Mariana Islands'),
(161, 'NO', 'Norway'),
(162, 'OM', 'Oman'),
(163, 'PK', 'Pakistan'),
(164, 'PW', 'Palau'),
(165, 'PA', 'Panama'),
(166, 'PG', 'Papua New Guinea'),
(167, 'PY', 'Paraguay'),
(168, 'PE', 'Peru'),
(169, 'PH', 'Philippines'),
(170, 'PN', 'Pitcairn'),
(171, 'PL', 'Poland'),
(172, 'PT', 'Portugal'),
(173, 'PR', 'Puerto Rico'),
(174, 'QA', 'Qatar'),
(175, 'RE', 'Reunion'),
(176, 'RO', 'Romania'),
(177, 'RU', 'Russian Federation'),
(178, 'RW', 'Rwanda'),
(179, 'KN', 'Saint Kitts and Nevis'),
(180, 'LC', 'Saint Lucia'),
(181, 'VC', 'Saint Vincent and the Grenadines'),
(182, 'WS', 'Samoa'),
(183, 'SM', 'San Marino'),
(184, 'ST', 'Sao Tome and Principe'),
(185, 'SA', 'Saudi Arabia'),
(186, 'SN', 'Senegal'),
(187, 'SC', 'Seychelles'),
(188, 'SL', 'Sierra Leone'),
(189, 'SG', 'Singapore'),
(190, 'SK', 'Slovakia'),
(191, 'SI', 'Slovenia'),
(192, 'SB', 'Solomon Islands'),
(193, 'SO', 'Somalia'),
(194, 'ZA', 'South Africa'),
(195, 'GS', 'South Georgia South Sandwich Islands'),
(196, 'ES', 'Spain'),
(197, 'LK', 'Sri Lanka'),
(198, 'SH', 'St. Helena'),
(199, 'PM', 'St. Pierre and Miquelon'),
(200, 'SD', 'Sudan'),
(201, 'SR', 'Suriname'),
(202, 'SJ', 'Svalbarn and Jan Mayen Islands'),
(203, 'SZ', 'Swaziland'),
(204, 'SE', 'Sweden'),
(205, 'CH', 'Switzerland'),
(206, 'SY', 'Syrian Arab Republic'),
(207, 'TW', 'Taiwan'),
(208, 'TJ', 'Tajikistan'),
(209, 'TZ', 'Tanzania, United Republic of'),
(210, 'TH', 'Thailand'),
(211, 'TG', 'Togo'),
(212, 'TK', 'Tokelau'),
(213, 'TO', 'Tonga'),
(214, 'TT', 'Trinidad and Tobago'),
(215, 'TN', 'Tunisia'),
(216, 'TR', 'Turkey'),
(217, 'TM', 'Turkmenistan'),
(218, 'TC', 'Turks and Caicos Islands'),
(219, 'TV', 'Tuvalu'),
(220, 'UG', 'Uganda'),
(221, 'UA', 'Ukraine'),
(222, 'AE', 'United Arab Emirates'),
(223, 'GB', 'United Kingdom'),
(224, 'UM', 'United States minor outlying islands'),
(225, 'UY', 'Uruguay'),
(226, 'UZ', 'Uzbekistan'),
(227, 'VU', 'Vanuatu'),
(228, 'VA', 'Vatican City State'),
(229, 'VE', 'Venezuela'),
(230, 'VN', 'Vietnam'),
(231, 'VG', 'Virigan Islands (British)'),
(232, 'VI', 'Virgin Islands (U.S.)'),
(233, 'WF', 'Wallis and Futuna Islands'),
(234, 'EH', 'Western Sahara'),
(235, 'YE', 'Yemen'),
(236, 'YU', 'Yugoslavia'),
(237, 'ZR', 'Zaire'),
(238, 'ZM', 'Zambia'),
(239, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `CourseID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` longblob NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `MetaTitle` varchar(255) NOT NULL,
  `MetaKeyWord` text NOT NULL,
  `MetaDescription` text NOT NULL,
  `Duration` int(11) NOT NULL COMMENT 'In Month',
  `Charges` float(10,2) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CourseID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `NewsID` int(11) NOT NULL AUTO_INCREMENT,
  `News` varchar(2000) NOT NULL,
  `PostedDate` date NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`NewsID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `News`, `PostedDate`, `Status`) VALUES
(1, 'Summer camp will held on 4th june 2017', '2017-06-02', 1),
(2, 'Belt test will be held on july 1st week', '2017-06-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `OrderID` bigint(20) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `InvoiceNo` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Tax` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `OrderDate` int(11) NOT NULL,
  `PaymentDate` int(11) NOT NULL,
  `PaypalID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

DROP TABLE IF EXISTS `photo_gallery`;
CREATE TABLE IF NOT EXISTS `photo_gallery` (
  `PhotoGalleryID` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `CategoryID` int(11) DEFAULT NULL,
  `Caption` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`PhotoGalleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`PhotoGalleryID`, `Image`, `Status`, `CategoryID`, `Caption`) VALUES
(1, '2178eba08ddbbdd22c38ca8795a433e8.jpg', 1, 5, NULL),
(2, '41bc44cd32fbc3c5f86a4e7aa5366e3c.JPG', 1, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_views`
--

DROP TABLE IF EXISTS `site_views`;
CREATE TABLE IF NOT EXISTS `site_views` (
  `SiteViewsID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IP` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SiteViewsID`)
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_views`
--

INSERT INTO `site_views` (`SiteViewsID`, `IP`, `Date`) VALUES
(1, '47.9.203.95', '2017-05-31 02:36:26'),
(2, '47.9.203.95', '2017-05-31 02:36:26'),
(3, '47.9.203.95', '2017-05-31 02:36:55'),
(4, '47.9.203.95', '2017-05-31 02:41:17'),
(5, '47.9.203.95', '2017-05-31 02:41:31'),
(6, '47.9.203.95', '2017-05-31 02:42:11'),
(7, '47.9.203.95', '2017-05-31 02:42:16'),
(8, '47.9.203.95', '2017-05-31 03:21:00'),
(9, '47.9.203.95', '2017-05-31 03:23:59'),
(10, '47.9.203.95', '2017-05-31 03:28:40'),
(11, '117.197.242.2', '2017-05-31 18:07:21'),
(12, '8.37.232.115', '2017-05-31 18:13:26'),
(13, '78.109.23.1', '2017-06-01 00:25:00'),
(14, '64.246.165.200', '2017-06-01 05:00:40'),
(15, '130.226.169.137', '2017-06-01 06:23:06'),
(16, '163.172.4.153', '2017-06-01 19:13:08'),
(17, '176.10.116.112', '2017-06-01 23:06:59'),
(18, '176.10.116.112', '2017-06-01 23:06:59'),
(19, '176.10.116.112', '2017-06-01 23:07:01'),
(20, '176.10.116.112', '2017-06-01 23:07:01'),
(21, '47.11.134.128', '2017-06-02 16:58:46'),
(22, '47.11.134.128', '2017-06-02 17:03:44'),
(23, '47.11.134.128', '2017-06-02 17:04:09'),
(24, '117.248.142.159', '2017-06-02 17:08:57'),
(25, '117.248.142.159', '2017-06-02 17:22:45'),
(26, '117.248.142.159', '2017-06-02 17:27:35'),
(27, '117.248.142.159', '2017-06-02 17:32:27'),
(28, '117.248.142.159', '2017-06-02 17:36:12'),
(29, '117.248.142.159', '2017-06-02 17:38:29'),
(30, '117.248.142.159', '2017-06-02 17:39:20'),
(31, '117.248.142.159', '2017-06-02 17:51:39'),
(32, '117.248.142.159', '2017-06-02 17:55:30'),
(33, '117.248.142.159', '2017-06-02 18:02:33'),
(34, '117.248.142.159', '2017-06-02 18:19:52'),
(35, '117.248.142.159', '2017-06-02 18:19:58'),
(36, '117.248.142.159', '2017-06-02 18:29:26'),
(37, '117.248.142.159', '2017-06-02 18:31:14'),
(38, '117.248.142.159', '2017-06-02 18:33:23'),
(39, '117.248.142.159', '2017-06-02 18:52:19'),
(40, '117.248.142.159', '2017-06-02 18:54:45'),
(41, '117.248.142.159', '2017-06-02 18:55:46'),
(42, '117.248.142.159', '2017-06-02 18:55:56'),
(43, '117.248.142.159', '2017-06-02 18:56:17'),
(44, '117.248.142.159', '2017-06-02 18:57:07'),
(45, '117.248.142.159', '2017-06-02 18:57:38'),
(46, '117.248.142.159', '2017-06-02 18:57:49'),
(47, '8.37.232.115', '2017-06-03 03:22:20'),
(48, '47.11.235.178', '2017-06-03 16:33:03'),
(49, '47.11.130.120', '2017-06-03 18:01:01'),
(50, '192.99.44.141', '2017-06-03 21:31:06'),
(51, '192.99.44.141', '2017-06-03 21:31:10'),
(52, '192.99.44.141', '2017-06-03 21:31:24'),
(53, '207.102.138.158', '2017-06-04 00:07:54'),
(54, '117.194.122.114', '2017-06-04 06:47:29'),
(55, '117.194.122.114', '2017-06-04 06:57:14'),
(56, '117.194.122.114', '2017-06-04 07:00:11'),
(57, '117.194.122.114', '2017-06-04 07:00:11'),
(58, '117.194.122.114', '2017-06-04 07:04:59'),
(59, '117.194.122.114', '2017-06-04 07:41:43'),
(60, '117.194.122.114', '2017-06-04 08:02:49'),
(61, '117.194.122.114', '2017-06-04 08:02:54'),
(62, '18.85.22.204', '2017-06-04 08:41:24'),
(63, '47.11.211.53', '2017-06-04 09:16:08'),
(64, '47.11.211.53', '2017-06-04 09:19:28'),
(65, '163.172.4.153', '2017-06-04 17:26:30'),
(66, '65.19.167.130', '2017-06-04 18:17:54'),
(67, '65.19.167.130', '2017-06-04 18:17:54'),
(68, '54.80.79.235', '2017-06-05 03:55:08'),
(69, '47.11.135.156', '2017-06-05 08:40:23'),
(70, '40.77.167.54', '2017-06-05 09:58:48'),
(71, '78.109.23.1', '2017-06-05 11:40:46'),
(72, '78.84.221.202', '2017-06-05 17:40:50'),
(73, '8.37.232.115', '2017-06-05 18:11:22'),
(74, '216.69.191.97', '2017-06-06 02:29:45'),
(75, '47.11.134.126', '2017-06-06 15:32:32'),
(76, '8.37.232.115', '2017-06-06 15:42:38'),
(77, '47.11.128.93', '2017-06-06 17:36:35'),
(78, '182.75.32.238', '2017-06-07 05:31:35'),
(79, '182.75.32.238', '2017-06-07 05:34:13'),
(80, '198.27.85.233', '2017-06-07 06:43:04'),
(81, '117.197.236.27', '2017-06-07 07:21:54'),
(82, '117.197.236.27', '2017-06-07 07:27:37'),
(83, '117.197.236.27', '2017-06-07 07:28:58'),
(84, '117.197.236.27', '2017-06-07 07:33:08'),
(85, '117.197.236.27', '2017-06-07 07:33:54'),
(86, '117.197.236.27', '2017-06-07 07:39:10'),
(87, '117.197.236.27', '2017-06-07 07:40:27'),
(88, '8.37.232.115', '2017-06-07 07:40:50'),
(89, '117.197.236.27', '2017-06-07 07:42:20'),
(90, '182.75.32.238', '2017-06-07 07:49:23'),
(91, '23.99.101.118', '2017-06-07 07:51:34'),
(92, '182.75.32.238', '2017-06-07 07:51:43'),
(93, '182.75.32.238', '2017-06-07 07:52:58'),
(94, '64.233.173.142', '2017-06-07 07:53:59'),
(95, '182.75.32.238', '2017-06-07 07:54:01'),
(96, '13.76.241.210', '2017-06-07 08:35:58'),
(97, '47.11.198.81', '2017-06-07 10:26:43'),
(98, '64.233.173.155', '2017-06-07 13:16:07'),
(99, '47.11.193.213', '2017-06-07 13:16:11'),
(100, '8.37.233.83', '2017-06-07 13:42:24'),
(101, '104.131.186.156', '2017-06-08 12:36:18'),
(102, '176.126.252.11', '2017-06-08 14:29:49'),
(103, '207.102.138.158', '2017-06-09 01:49:55'),
(104, '185.32.221.180', '2017-06-09 02:51:04'),
(105, '185.32.221.180', '2017-06-09 02:51:04'),
(106, '185.32.221.180', '2017-06-09 02:51:05'),
(107, '185.32.221.180', '2017-06-09 02:51:05'),
(108, '95.211.225.158', '2017-06-09 04:00:47'),
(109, '95.211.225.158', '2017-06-09 04:00:56'),
(110, '65.19.167.132', '2017-06-09 04:36:26'),
(111, '8.37.232.115', '2017-06-09 07:06:54'),
(112, '117.194.123.99', '2017-06-09 07:59:53'),
(113, '117.194.123.99', '2017-06-09 08:23:26'),
(114, '47.11.199.58', '2017-06-09 09:34:50'),
(115, '51.15.50.10', '2017-06-09 10:02:12'),
(116, '103.76.211.212', '2017-06-09 10:32:54'),
(117, '117.194.123.99', '2017-06-09 11:05:08'),
(118, '117.194.123.99', '2017-06-09 11:16:00'),
(119, '198.27.85.233', '2017-06-09 13:26:17'),
(120, '117.197.253.234', '2017-06-09 17:23:07'),
(121, '47.9.171.132', '2017-06-09 17:29:46'),
(122, '47.9.171.132', '2017-06-09 17:32:04'),
(123, '47.9.171.132', '2017-06-09 17:32:22'),
(124, '117.197.253.234', '2017-06-09 17:39:22'),
(125, '117.197.253.234', '2017-06-09 17:49:44'),
(126, '163.172.4.153', '2017-06-09 18:44:19'),
(127, '8.37.232.115', '2017-06-10 08:09:49'),
(128, '192.241.205.74', '2017-06-10 10:36:50'),
(129, '198.245.60.8', '2017-06-10 16:44:16'),
(130, '128.52.128.105', '2017-06-11 02:20:17'),
(131, '13.58.187.100', '2017-06-12 00:13:18'),
(132, '13.58.187.100', '2017-06-12 00:13:18'),
(133, '78.129.250.17', '2017-06-12 16:57:52'),
(134, '8.37.232.115', '2017-06-12 18:22:59'),
(135, '47.11.134.58', '2017-06-12 18:23:11'),
(136, '47.11.232.225', '2017-06-13 05:38:28'),
(137, '47.11.232.225', '2017-06-13 05:39:51'),
(138, '207.102.138.158', '2017-06-13 06:02:24'),
(139, '104.238.248.15', '2017-06-13 06:37:55'),
(140, '47.11.133.184', '2017-06-13 13:07:53'),
(141, '47.11.133.184', '2017-06-13 14:01:11'),
(142, '47.11.133.184', '2017-06-13 14:05:24'),
(143, '103.221.58.75', '2017-06-13 16:25:43'),
(144, '13.58.187.100', '2017-06-13 20:00:51'),
(145, '138.197.204.54', '2017-06-14 08:50:15'),
(146, '35.185.239.191', '2017-06-14 16:19:02'),
(147, '104.197.73.7', '2017-06-14 18:01:37'),
(148, '112.196.40.251', '2017-06-15 07:17:01'),
(149, '95.211.225.158', '2017-06-15 10:19:13'),
(150, '95.211.225.158', '2017-06-15 10:19:15'),
(151, '54.88.207.254', '2017-06-15 10:38:59'),
(152, '34.201.217.127', '2017-06-15 11:08:37'),
(153, '35.184.110.11', '2017-06-15 14:47:52'),
(154, '45.55.55.209', '2017-06-15 15:41:41'),
(155, '115.117.46.188', '2017-06-15 16:09:13'),
(156, '91.210.144.157', '2017-06-15 17:04:53'),
(157, '35.192.19.150', '2017-06-15 17:58:19'),
(158, '163.172.4.153', '2017-06-16 00:06:06'),
(159, '35.192.33.254', '2017-06-16 09:51:23'),
(160, '103.254.153.116', '2017-06-16 14:57:36'),
(161, '103.254.153.116', '2017-06-16 14:57:36'),
(162, '103.254.153.116', '2017-06-16 14:57:36'),
(163, '103.254.153.116', '2017-06-16 14:57:36'),
(164, '35.188.217.107', '2017-06-16 15:03:02'),
(165, '148.62.14.156', '2017-06-16 18:02:50'),
(166, '148.62.14.156', '2017-06-16 19:27:51'),
(167, '149.202.98.161', '2017-06-16 22:29:05'),
(168, '52.191.174.84', '2017-06-17 06:10:58'),
(169, '207.102.138.158', '2017-06-18 00:59:38'),
(170, '69.58.178.58', '2017-06-19 09:26:56'),
(171, '89.145.95.69', '2017-06-20 04:56:13'),
(172, '64.246.165.50', '2017-06-20 05:10:08'),
(173, '88.99.141.3', '2017-06-20 21:19:09'),
(174, '37.1.207.21', '2017-06-21 00:14:44'),
(175, '52.87.86.158', '2017-06-21 05:31:28'),
(176, '91.210.145.143', '2017-06-21 08:43:41'),
(177, '38.100.21.68', '2017-06-21 17:19:51'),
(178, '163.172.4.153', '2017-06-22 01:30:54'),
(179, '206.180.165.146', '2017-06-22 08:22:24'),
(180, '104.197.197.108', '2017-06-22 12:39:49'),
(181, '35.184.164.186', '2017-06-22 14:03:06'),
(182, '104.198.148.128', '2017-06-22 14:48:33'),
(183, '176.10.116.111', '2017-06-22 22:28:29'),
(184, '176.10.116.111', '2017-06-22 22:28:29'),
(185, '176.10.116.111', '2017-06-22 22:28:29'),
(186, '176.10.116.111', '2017-06-22 22:28:29'),
(187, '207.102.138.158', '2017-06-23 12:38:26'),
(188, '157.55.39.167', '2017-06-24 07:41:05'),
(189, '14.142.64.3', '2017-06-25 17:41:22'),
(190, '117.197.246.161', '2017-06-25 17:41:22'),
(191, '54.173.44.225', '2017-06-25 23:55:33'),
(192, '54.173.44.225', '2017-06-25 23:55:34'),
(193, '8.37.232.115', '2017-06-26 06:33:36'),
(194, '146.148.68.150', '2017-06-26 08:03:02'),
(195, '199.19.104.163', '2017-06-26 14:30:29'),
(196, '35.184.113.40', '2017-06-26 22:26:24'),
(197, '115.112.64.154', '2017-06-27 05:20:38'),
(198, '104.238.248.15', '2017-06-27 16:21:57'),
(199, '178.137.83.166', '2017-06-28 20:40:24'),
(200, '178.248.254.70', '2017-06-28 23:56:55'),
(201, '117.197.240.207', '2017-06-30 19:02:07'),
(202, '207.102.138.158', '2017-07-01 23:28:19'),
(203, '117.194.121.251', '2017-07-02 08:26:00'),
(204, '117.194.121.251', '2017-07-02 08:36:25'),
(205, '207.244.70.35', '2017-07-02 08:36:48'),
(206, '52.205.25.143', '2017-07-02 18:38:05'),
(207, '54.147.85.82', '2017-07-02 19:08:55'),
(208, '104.238.169.113', '2017-07-03 12:01:13'),
(209, '54.210.42.25', '2017-07-03 12:05:06'),
(210, '51.15.37.18', '2017-07-03 16:09:44'),
(211, '69.58.178.58', '2017-07-03 20:54:10'),
(212, '54.235.20.135', '2017-07-04 08:37:01'),
(213, '34.201.138.158', '2017-07-05 08:33:34'),
(214, '35.192.45.221', '2017-07-05 18:28:10'),
(215, '34.229.12.185', '2017-07-06 08:36:03'),
(216, '104.154.203.49', '2017-07-06 11:43:35'),
(217, '45.63.18.137', '2017-07-06 18:45:42'),
(218, '35.184.99.22', '2017-07-06 19:51:15'),
(219, '66.102.6.148', '2017-07-07 03:29:30'),
(220, '8.37.232.115', '2017-07-07 03:31:18'),
(221, '54.167.201.46', '2017-07-07 09:22:01'),
(222, '207.102.138.158', '2017-07-07 14:48:47'),
(223, '47.11.213.173', '2017-07-08 07:48:40'),
(224, '34.229.165.213', '2017-07-08 09:19:35'),
(225, '163.172.4.153', '2017-07-08 20:06:43'),
(226, '52.91.112.95', '2017-07-09 09:22:02'),
(227, '45.55.220.158', '2017-07-09 09:43:25'),
(228, '54.156.83.79', '2017-07-09 10:29:43'),
(229, '216.145.11.94', '2017-07-09 13:30:47'),
(230, '54.159.0.78', '2017-07-10 09:20:58'),
(231, '195.28.182.35', '2017-07-11 04:39:43'),
(232, '54.147.91.120', '2017-07-11 09:16:34'),
(233, '207.102.138.158', '2017-07-11 11:31:41'),
(234, '79.168.231.184', '2017-07-11 19:36:28'),
(235, '198.27.85.233', '2017-07-12 09:12:57'),
(236, '54.172.7.145', '2017-07-12 09:20:52'),
(237, '91.210.146.247', '2017-07-12 10:08:01'),
(238, '182.69.85.26', '2017-07-12 11:43:09'),
(239, '34.228.22.156', '2017-07-13 09:19:54'),
(240, '207.46.13.32', '2017-07-13 12:01:27'),
(241, '75.149.221.170', '2017-07-13 16:13:08'),
(242, '54.172.142.99', '2017-07-14 09:17:19'),
(243, '163.172.4.153', '2017-07-14 14:09:27'),
(244, '35.184.201.244', '2017-07-14 15:06:39'),
(245, '46.17.43.230', '2017-07-14 22:14:40'),
(246, '54.175.106.131', '2017-07-15 09:25:22'),
(247, '146.185.144.64', '2017-07-15 15:15:48'),
(248, '207.102.138.158', '2017-07-16 02:10:51'),
(249, '54.152.37.195', '2017-07-16 09:17:59'),
(250, '104.238.248.15', '2017-07-16 13:46:39'),
(251, '8.37.232.115', '2017-07-16 16:26:33'),
(252, '8.37.232.115', '2017-07-16 16:26:46'),
(253, '8.37.232.115', '2017-07-16 16:27:26'),
(254, '162.242.156.106', '2017-07-17 02:07:19'),
(255, '162.242.156.106', '2017-07-17 03:57:09'),
(256, '52.202.44.149', '2017-07-17 09:17:00'),
(257, '34.227.148.216', '2017-07-18 08:50:56'),
(258, '216.69.191.97', '2017-07-18 22:22:22'),
(259, '54.204.133.201', '2017-07-19 09:37:11'),
(260, '85.143.218.11', '2017-07-19 23:14:17'),
(261, '163.172.4.153', '2017-07-20 09:05:23'),
(262, '107.178.194.63', '2017-07-20 13:44:42'),
(263, '45.76.5.167', '2017-07-20 17:44:57'),
(264, '45.76.5.167', '2017-07-20 17:44:57'),
(265, '52.91.18.161', '2017-07-21 08:25:50'),
(266, '207.102.138.158', '2017-07-21 14:57:56'),
(267, '34.212.112.29', '2017-07-21 20:08:58'),
(268, '34.227.150.134', '2017-07-22 08:23:51'),
(269, '54.172.84.70', '2017-07-23 08:22:37'),
(270, '61.91.39.122', '2017-07-23 14:27:17'),
(271, '45.124.192.246', '2017-07-23 16:15:07'),
(272, '45.124.192.246', '2017-07-23 16:16:50'),
(273, '45.124.192.246', '2017-07-23 16:18:10'),
(274, '45.124.192.246', '2017-07-23 16:22:04'),
(275, '47.11.218.191', '2017-07-24 17:04:05'),
(276, '47.11.218.191', '2017-07-24 17:06:24'),
(277, '47.11.218.191', '2017-07-24 17:25:26'),
(278, '47.11.218.191', '2017-07-24 17:25:57'),
(279, '47.11.218.191', '2017-07-24 17:42:54'),
(280, '47.11.218.191', '2017-07-24 17:44:06'),
(281, '47.11.218.191', '2017-07-24 17:48:54'),
(282, '47.11.218.191', '2017-07-24 17:51:34'),
(283, '47.11.218.191', '2017-07-24 17:52:16'),
(284, '47.11.218.191', '2017-07-24 18:03:14'),
(285, '52.90.96.50', '2017-07-24 18:04:05'),
(286, '47.11.218.191', '2017-07-24 18:04:10'),
(287, '199.19.104.163', '2017-07-25 02:40:29'),
(288, '34.227.92.21', '2017-07-25 08:12:52'),
(289, '207.102.138.158', '2017-07-25 12:52:47'),
(290, '47.11.215.22', '2017-07-25 17:02:18'),
(291, '47.9.167.81', '2017-07-25 17:07:15'),
(292, '47.9.167.81', '2017-07-25 18:21:05'),
(293, '47.9.167.81', '2017-07-25 18:25:09'),
(294, '47.9.167.81', '2017-07-25 18:28:44'),
(295, '163.172.4.153', '2017-07-26 01:48:29'),
(296, '54.144.215.187', '2017-07-26 08:26:19'),
(297, '158.69.229.69', '2017-07-27 07:20:38'),
(298, '52.87.232.206', '2017-07-27 08:28:43'),
(299, '45.121.29.120', '2017-07-28 08:17:08'),
(300, '34.201.174.131', '2017-07-28 08:22:00'),
(301, '14.140.19.35', '2017-07-28 10:18:06'),
(302, '38.80.27.12', '2017-07-28 10:19:06'),
(303, '216.145.17.190', '2017-07-28 14:55:45'),
(304, '47.9.167.6', '2017-07-29 01:48:38'),
(305, '47.9.167.6', '2017-07-29 01:48:42'),
(306, '47.9.167.6', '2017-07-29 01:59:01'),
(307, '47.9.167.6', '2017-07-29 02:00:54'),
(308, '47.9.167.6', '2017-07-29 02:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `StateID` bigint(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(255) DEFAULT NULL,
  `CountryID` int(11) NOT NULL,
  PRIMARY KEY (`StateID`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateID`, `StateName`, `CountryID`) VALUES
(1, 'Alabama', 1),
(2, 'Alaska', 1),
(3, 'Arizona', 1),
(4, 'Arkansas', 1),
(5, 'California', 1),
(6, 'Colorado', 1),
(7, 'Connecticut', 1),
(8, 'Delaware', 1),
(9, 'Florida', 1),
(10, 'Georgia', 1),
(11, 'Hawaii', 1),
(12, 'Idaho', 1),
(13, 'Illinois', 1),
(14, 'Indiana', 1),
(15, 'Iowa', 1),
(16, 'Kansas', 1),
(17, 'Kentucky', 1),
(18, 'Louisiana', 1),
(19, 'Maine', 1),
(20, 'Maryland', 1),
(21, 'Massachusetts', 1),
(22, 'Michigan', 1),
(23, 'Minnesota', 1),
(24, 'Mississippi', 1),
(25, 'Missouri', 1),
(26, 'Montana', 1),
(27, 'Nebraska', 1),
(28, 'Nevada', 1),
(29, 'New Hampshire', 1),
(30, 'New Jersey', 1),
(31, 'New Mexico', 1),
(32, 'New York', 1),
(33, 'North Carolina', 1),
(34, 'North Dakota', 1),
(35, 'Ohio', 1),
(36, 'Oklahoma', 1),
(37, 'Oregon', 1),
(38, 'Pennsylvania', 1),
(39, 'Rhode Island', 1),
(40, 'South Carolina', 1),
(41, 'South Dakota', 1),
(42, 'Tennessee', 1),
(43, 'Texas', 1),
(44, 'Utah', 1),
(45, 'Vermont', 1),
(46, 'Virginia', 1),
(47, 'Washington', 1),
(48, 'West Virginia', 1),
(49, 'Wisconsin', 1),
(50, 'Wyoming', 1),
(52, 'Puerto Rico', 1),
(53, 'U.S. Virgin Islands', 1),
(54, 'American Samoa', 1),
(55, 'Guam', 1),
(56, 'Northern Mariana Islands', 1),
(60, 'Alberta ', 2),
(61, 'British Columbia ', 2),
(62, 'Manitoba ', 2),
(63, 'New Brunswick ', 2),
(64, 'Newfoundland and Labrador ', 2),
(65, 'Nova Scotia ', 2),
(66, 'Ontario ', 2),
(67, 'Prince Edward Island ', 2),
(68, 'Quebec ', 2),
(69, 'Saskatchewan ', 2),
(70, 'Northwest Territories ', 2),
(71, 'Nunavut ', 2),
(72, 'Yukon Territory ', 2),
(73, 'ANDAMAN AND NICOBAR ISLANDS', 99),
(74, 'ANDHRA PRADESH', 99),
(75, 'ASSAM', 99),
(76, 'BIHAR', 99),
(77, 'CHATTISGARH', 99),
(78, 'CHANDIGARH', 99),
(79, 'DAMAN AND DIU', 99),
(80, 'DELHI', 99),
(81, 'DADRA AND NAGAR HAVELI', 99),
(82, 'GOA', 99),
(83, 'GUJARAT', 99),
(84, 'HIMACHAL PRADESH', 99),
(85, 'HARYANA', 99),
(86, 'JAMMU AND KASHMIR', 99),
(87, 'JHARKHAND', 99),
(88, 'KERALA', 99),
(89, 'KARNATAKA', 99),
(90, 'LAKSHADWEEP', 99),
(91, 'MEGHALAYA', 99),
(92, 'MAHARASHTRA', 99),
(93, 'MANIPUR', 99),
(94, 'MADHYA PRADESH', 99),
(95, 'MIZORAM', 99),
(96, 'NAGALAND', 99),
(97, 'ORISSA', 99),
(98, 'PUNJAB', 99),
(99, 'PONDICHERRY', 99),
(100, 'RAJASTHAN', 99),
(101, 'SIKKIM', 99),
(102, 'TAMIL NADU', 99),
(103, 'TRIPURA', 99),
(104, 'UTTARAKHAND', 99),
(105, 'UTTAR PRADESH', 99),
(106, 'WEST BENGAL', 99),
(107, 'Others', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `system_constants`
--

DROP TABLE IF EXISTS `system_constants`;
CREATE TABLE IF NOT EXISTS `system_constants` (
  `ConstantID` int(11) NOT NULL AUTO_INCREMENT,
  `ConstantName` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ConstantValue` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Description` varchar(240) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ConstantID`),
  UNIQUE KEY `ConstantName` (`ConstantName`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `system_constants`
--

INSERT INTO `system_constants` (`ConstantID`, `ConstantName`, `ConstantValue`, `Description`) VALUES
(1, 'AdminMail', 'admin@admin.com', 'admin email'),
(2, 'SiteMail', 'soumyasahoo.9999@gmail.com', 'soumyasahoo.9999@gmail.com'),
(3, 'MetaTitle', 'http://www.amateurtaekwondoassociationofdhenkanal.com', 'http://www.amateurtaekwondoassociationofdhenkanal.com'),
(4, 'MetaKeyWord', 'Taekwondow', 'Taekwondow'),
(5, 'SupportEmail', 'judhisahoo@gmail.com', 'Email id for support inquiry message'),
(6, 'MetaDescription', 'E-Learning For You Description', NULL),
(7, 'ContactNo', '9861540440, 7377707132', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `TeamID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Desingnation` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `About` varchar(2000) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '0',
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TeamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE IF NOT EXISTS `testimonial` (
  `TestimonialID` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserID` bigint(20) DEFAULT NULL,
  `Testimonial` text NOT NULL,
  `PostedDate` date NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '0',
  `Email` varchar(100) DEFAULT NULL,
  `FirstName` varchar(110) NOT NULL,
  `LastName` varchar(110) NOT NULL,
  PRIMARY KEY (`TestimonialID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`TestimonialID`, `UserID`, `Testimonial`, `PostedDate`, `Status`, `Email`, `FirstName`, `LastName`) VALUES
(1, NULL, 'Soumya and Team provide international level Taekwondo training to my son. All Member taking personal care of my child for his carrier growth.', '2017-06-02', 1, 'CTO & Advisory ATAD', 'Judhisthira', 'Sahoo'),
(2, NULL, 'all the teacher are very much friendly with students as well as with me so i have been join since 3 years', '2017-06-02', 1, 'Bussinessman & Parents', 'madhabchandra', 'prusty');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `FName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `LName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Address` text COLLATE latin1_general_ci,
  `City` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Zip` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL,
  `StateID` int(11) DEFAULT NULL COMMENT 'state_id',
  `ContactNo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Gender` enum('Y','N') COLLATE latin1_general_ci DEFAULT NULL,
  `AddDate` datetime NOT NULL,
  `UserAccessType` tinyint(1) NOT NULL COMMENT 'User access by using Curretn Site or Facebook Or Twitter etc 0=>Current Site,1 => facebook,2=>Twitter',
  `FacebookID` bigint(20) DEFAULT NULL COMMENT 'facebook id',
  `TwitterID` bigint(20) DEFAULT NULL,
  `Image` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `Status` tinyint(1) DEFAULT '1' COMMENT 'is_active',
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

DROP TABLE IF EXISTS `video_gallery`;
CREATE TABLE IF NOT EXISTS `video_gallery` (
  `VideoGalleryID` int(11) NOT NULL AUTO_INCREMENT,
  `Url` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `CategoryID` int(11) NOT NULL,
  `Caption` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`VideoGalleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_gallery`
--

INSERT INTO `video_gallery` (`VideoGalleryID`, `Url`, `Status`, `CategoryID`, `Caption`) VALUES
(1, 'https://www.youtube.com/watch?v=XLDTc_GPO3c', 1, 6, NULL),
(2, 'https://www.youtube.com/watch?v=MqaRH3DnHAA', 1, 6, NULL),
(3, 'https://www.youtube.com/watch?v=srAiMsPxDVQ', 1, 4, NULL),
(4, 'https://www.youtube.com/watch?v=KJcjZZEurz0', 1, 4, NULL),
(5, 'https://www.youtube.com/watch?v=UNqFxfFJQ_U', 1, 5, NULL),
(6, 'https://www.youtube.com/watch?v=3_QNLjtxmBM', 1, 5, NULL),
(7, 'https://www.youtube.com/watch?v=TERznI9uoDI', 1, 4, NULL),
(8, 'https://www.youtube.com/watch?v=RuJQpTJmJrY', 1, 6, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
