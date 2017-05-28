-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2017 at 10:01 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atad`
--
CREATE DATABASE IF NOT EXISTS `atad` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `atad`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`BannerID`, `Image`, `Status`, `Caption`) VALUES
(2, '1d83a40c3eb7a0cb520671f41ce1cdb9.jpg', 1, 'A hourner for national chomipons');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `ParrentCategoryID`, `CategoryName`, `Image`, `Status`) VALUES
(2, 0, 'Belt Test', NULL, 1),
(3, 0, 'Kamakhya Nagar Branch', NULL, 1),
(4, 0, 'National Level Chamipaship', NULL, 1);

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
(1, 'About ATAD', 'ATAD', 'ATAD', 'ATAD', 'About ATAD', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1),
(7, 'Career center', 'Career center', 'Career center', 'Career center', 'Career center', 'Career center', 1),
(2, 'Our Vision', 'Our Visionn', 'Our Visionn', 'Our Visionn', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1),
(3, 'Demo Schedules', 'Demo Schedule', 'Demo Schedule', 'Demo Schedule', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(113, 'KP', 'Korea, Democratic People''s Republic of'),
(114, 'KR', 'Korea, Republic of'),
(115, 'KW', 'Kuwait'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'LA', 'Lao People''s Democratic Republic'),
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `Title`, `Description`, `CategoryID`, `MetaTitle`, `MetaKeyWord`, `MetaDescription`, `Duration`, `Charges`, `Status`) VALUES
(1, 'ABAP', 0x3c64697620636c6173733d22636f6e74656e657450616765223e0d0a203c703e0d0a20203c7374726f6e673e4f766572766965773a3c2f7374726f6e673e3c2f703e0d0a203c703e0d0a202053415020414241502028416476616e63656420427573696e657373204170706c69636174696f6e2050726f6772616d6d696e6729206973206f6e65206f6620746865206d616e7920737065636966696320666f757274682d67656e65726174696f6e206c616e677561676573202834474c73292e204142415020697320746865206d61696e206c616e6775616765207573656420666f72206275696c6420736f6c696420627573696e657373206170706c69636174696f6e20696e20746865205341502052756e74696d6520656e7669726f6e6d656e742e20497420697320616e20696e74657270726574656420616e64204f626a656374204f7269656e7465642070726f6772616d6d696e67206c616e677561676520746861742072756e7320696e207468652053415020414241502052756e74696d6520656e7669726f6e6d656e742e3c2f703e0d0a203c703e0d0a20203c7374726f6e673e547261696e696e67204f626a65637469766573206f6620414241503a3c2f7374726f6e673e3c2f703e0d0a203c703e0d0a2020546865204d61696e204f626a656374697665206f662074686520534150204142415020697320746f20756e6465727374616e6420746865206b657920636f6e636570747320696e20746865204f626a656374204f7269656e7465642050726f6772616d6d696e6720697320746f20696e7465677261746520697420696e746f20534150204142415020746f20696d706c656d656e742074686520766172696f7573206170706c69636174696f6e732c20616e6420746f20756e6465727374616e642074686520636f6e6365707473206f662041424150204f626a6563747320616e6420686f7720746f20757365207468656d20696e20576f726b62656e636820746f6f6c7320746f20646576656c6f70207468656972206f776e20627573696e657373206170706c69636174696f6e7320616e6420746f20656e68616e636520746865205374616e646172642053415020536f66747761726520746f206d65657420737065636966696320637573746f6d657220726571756972656d656e74732e3c2f703e0d0a203c703e0d0a20203c7374726f6e673e5461726765742053747564656e7473202f20507265726571756973697465733a3c2f7374726f6e673e3c2f703e0d0a203c703e0d0a2020546865206d61696e205072657265717569736974657320666f72204142415020697320746865206261736963207175616c696669636174696f6e20666f72206d616b696e6720612063617265657220696e2053415020414241502070726f6772616d6d696e6720446576656c6f706d656e742069732073686172702070726f6772616d6d696e6720616e64204c6f676963616c20736b696c6c7320616e6420756e6465727374616e642074686520636f6e6365707473206f66206f626a656374206f7269656e7465642070726f6772616d6d696e6720616c6f6e67207769746820736f6c6964206b6e6f776c65646765206f6e207468652064617461626173652e3c2f703e0d0a3c2f6469763e0d0a3c64697620636c6173733d22436f75727365734c656674223e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a2020496e74726f64756374696f6e20746f204552503c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a2020202057686174206973204552503f3c2f6c693e0d0a2020203c6c693e0d0a20202020576879207765206e656564204552503f3c2f6c693e0d0a2020203c6c693e0d0a20202020416476616e7461676573206f66204552503c2f6c693e0d0a2020203c6c693e0d0a202020204d616a6f7220455250205061636b616765733c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a2020496e74726f64756374696f6e20746f205341502026616d703b20522f33204172636869746563747572653c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a2020202057686174206973205341503f3c2f6c693e0d0a2020203c6c693e0d0a20202020486973746f72792026616d703b204665617475726573206f66205341503c2f6c693e0d0a2020203c6c693e0d0a2020202053415020522f322041726368697465637475726520284c696d69746174696f6e73206f6620522f3220417263686974656374757265293c2f6c693e0d0a2020203c6c693e0d0a2020202053415020522f332041726368697465637475726520285479706573206f6620776f726b2070726f636573736573293c2f6c693e0d0a2020203c6c693e0d0a2020202053415020522f33204170706c69636174696f6e204d6f64756c65733c2f6c693e0d0a2020203c6c693e0d0a20202020534150204c616e6473636170653c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a2020496e74726f64756374696f6e20746f20414241502f343c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a202020205768617420697320414241503f3c2f6c693e0d0a2020203c6c693e0d0a202020204c6f676f6e20746f2053415020456e7669726f6e6d656e743c2f6c693e0d0a2020203c6c693e0d0a202020205472616e73616374696f6e20436f6465733c2f6c693e0d0a2020203c6c693e0d0a202020204d756c74697461736b696e6720436f6d6d616e64733c2f6c693e0d0a2020203c6c693e0d0a20202020436f6d6d656e74733c2f6c693e0d0a2020203c6c693e0d0a202020204572726f72733c2f6c693e0d0a2020203c6c693e0d0a20202020414241502f3420456469746f722028205345333820293c2f6c693e0d0a2020203c6c693e0d0a20202020537465707320666f72204372656174696e6720612050726f6772616d3c2f6c693e0d0a2020203c6c693e0d0a20202020456c656d656e747320696e20522f332053637265656e3c2f6c693e0d0a2020203c6c693e0d0a202020204f7574207075742053746174656d656e74733c2f6c693e0d0a2020203c6c693e0d0a202020204f70657261746f727320696e20414241503c2f6c693e0d0a2020203c6c693e0d0a20202020446174612c20506172616d657465722026616d703b20436f6e7374616e742053746174656d656e74733c2f6c693e0d0a2020203c6c693e0d0a20202020446174612054797065732026616d703b20436c617373696669636174696f6e3c2f6c693e0d0a2020203c6c693e0d0a2020202044617461204f626a656374732026616d703b20436c617373696669636174696f6e3c2f6c693e0d0a2020203c6c693e0d0a202020205465787420456c656d656e74733c2f6c693e0d0a2020203c6c693e0d0a20202020537472696e67204f7065726174696f6e733c2f6c693e0d0a2020203c6c693e0d0a20202020436f6e74726f6c2053746174656d656e74733c2f6c693e0d0a2020203c6c693e0d0a202020204669656c6420737472696e67733c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a2020414241502044696374696f6e6172793c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a20202020414241502044696374696f6e61727920496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a20202020446174612044696374696f6e6172792046756e6374696f6e733c2f6c693e0d0a2020203c6c693e0d0a20202020446174612044696374696f6e617279204f626a656374733c2f6c693e0d0a2020203c6c693e0d0a202020203c756c3e0d0a20202020203c6c693e0d0a202020202020446174612042617365205461626c65733c2f6c693e0d0a20202020203c6c693e0d0a202020202020537472756374757265733c2f6c693e0d0a20202020203c6c693e0d0a20202020202056696577733c2f6c693e0d0a20202020203c6c693e0d0a2020202020204461746120456c656d656e74733c2f6c693e0d0a20202020203c6c693e0d0a202020202020547970652047726f7570733c2f6c693e0d0a20202020203c6c693e0d0a202020202020446f6d61696e733c2f6c693e0d0a20202020203c6c693e0d0a2020202020205365617263682068656c70733c2f6c693e0d0a20202020203c6c693e0d0a2020202020204c6f636b206f626a656374733c2f6c693e0d0a202020203c2f756c3e0d0a2020203c2f6c693e0d0a2020203c6c693e0d0a202020205072696d617279204b657920416e6420466f726569676e204b65793c2f6c693e0d0a2020203c6c693e0d0a202020205461626c65204d61696e74656e616e63652047656e657261746f723c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a20205061636b616765733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a202020204372656174696e672061207061636b6167653c2f6c693e0d0a2020203c6c693e0d0a20202020446966666572656e6365206265747765656e206c6f63616c206f626a656374732026616d703b207061636b616765733c2f6c693e0d0a2020203c6c693e0d0a202020205472616e7366657272696e67206c6f63616c206f626a6563747320746f207061636b616765733c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a202056617269616e74733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a2020202056617269616e747320496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a202020204372656174696e672076617269616e747320696e204142415020456469746f722026616d703b20446174612044696374696f6e6172793c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a20204d65737361676520436c61737365733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a202020204d65737361676520436c61737320496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a202020204d6573736167652074797065733c2f6c693e0d0a2020203c6c693e0d0a2020202043616c6c696e67206d65737361676520636c61737320696e205265706f72742026616d703b204469616c6f672070726f6772616d733c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a202053656c656374696f6e2053637265656e733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a2020202053656c656374696f6e2073637265656e20496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a202020203c756c3e0d0a20202020203c6c693e0d0a202020202020506172616d657465722053746174656d656e743c2f6c693e0d0a20202020203c6c693e0d0a20202020202053656c6563742d6f7074696f6e732053746174656d656e743c2f6c693e0d0a20202020203c6c693e0d0a20202020202053656c656374696f6e2d73637265656e2053746174656d656e743c2f6c693e0d0a202020203c2f756c3e0d0a2020203c2f6c693e0d0a2020203c6c693e0d0a2020202053637265656e207461626c6520616e6420697473206669656c64733c2f6c693e0d0a2020203c6c693e0d0a2020202044796e616d69632073637265656e206d6f64696669636174696f6e206279207573696e67204d6f646966204964206b65793c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a20204f70656e2053514c2053746174656d656e74733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a2020202053656c6563743c2f6c693e0d0a2020203c6c693e0d0a20202020496e736572743c2f6c693e0d0a2020203c6c693e0d0a202020204d6f646966793c2f6c693e0d0a2020203c6c693e0d0a202020205570646174653c2f6c693e0d0a2020203c6c693e0d0a2020202044656c6574653c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a2020496e7465726e616c205461626c65733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a20202020496e7465726e616c205461626c657320496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a202020204465636c6172696e6720496e7465726e616c205461626c653c2f6c693e0d0a2020203c6c693e0d0a20202020506f70756c6174696e6720496e7465726e616c205461626c653c2f6c693e0d0a2020203c6c693e0d0a2020202050726f63657373696e6720496e7465726e616c205461626c653c2f6c693e0d0a2020203c6c693e0d0a20202020496e697469616c697a696e6720496e7465726e616c205461626c65733c2f6c693e0d0a2020203c6c693e0d0a20202020496e6e6572204a6f696e7320416e6420466f7220416c6c20456e74726965733c2f6c693e0d0a2020203c6c693e0d0a20202020436f6e74726f6c20427265616b2053746174656d656e74733c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a2020446562756767696e6720546563686e69717565733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a20202020446562756767696e6720546563686e697175657320496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a20202020427265616b2d706f696e747320285374617469632026616d703b2044796e616d6963293c2f6c693e0d0a2020203c6c693e0d0a20202020576174636820706f696e74733c2f6c693e0d0a2020203c6c693e0d0a2020202044796e616d6963616c6c79206368616e67696e6720696e7465726e616c207461626c657320636f6e74656e747320696e20446562756767696e6720456469746f723c2f6c693e0d0a2020203c6c693e0d0a202020204f7074696f6e7320746f2073746570207468726f756768207468652070726f6772616d20696e20446562756767696e6720456469746f723c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a20204d6f64756c6172697a6174696f6e20546563686e69717565733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a202020204d6f64756c6172697a6174696f6e20546563686e697175657320496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a20202020496e636c756465733c2f6c693e0d0a2020203c6c693e0d0a20202020537562726f7574696e65733c2f6c693e0d0a2020203c6c693e0d0a2020202050617373696e6720506172616d657465727320746f20537562726f7574696e65733c2f6c693e0d0a2020203c6c693e0d0a2020202050617373696e67205461626c657320746f20537562726f7574696e65733c2f6c693e0d0a2020203c6c693e0d0a2020202046756e6374696f6e2047726f7570732026616d703b2046756e6374696f6e204d6f64756c65733c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a20205265706f7274733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a202020205265706f72747320496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a20202020436c6173736963616c205265706f7274733c2f6c693e0d0a2020203c6c693e0d0a20202020496e746572616374697665205265706f7274733c2f6c693e0d0a2020203c6c693e0d0a20202020546563686e6971756573205573656420466f7220496e746572616374697665205265706f7274733c2f6c693e0d0a2020203c6c693e0d0a202020203c756c3e0d0a20202020203c6c693e0d0a202020202020486f7473706f743c2f6c693e0d0a20202020203c6c693e0d0a202020202020486964653c2f6c693e0d0a20202020203c6c693e0d0a20202020202047657420437572736f723c2f6c693e0d0a202020203c2f756c3e0d0a2020203c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a2020414c56205265706f7274733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a20202020414c56205265706f72747320496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a20202020414c56207468726f7567682046756e6374696f6e204d6f64756c65733c2f6c693e0d0a2020203c6c693e0d0a20202020414c562054797065733c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a203c64697620636c6173733d22746563686e6f6c6f6779223e0d0a20204469616c6f67202f204d6f64756c6520506f6f6c2050726f6772616d6d696e672f205472616e73616374696f6e733c2f6469763e0d0a203c64697620636c6173733d227468656c616e6775616765223e0d0a20203c756c20636c6173733d227374796c655f756c5f33223e0d0a2020203c6c693e0d0a202020204d505020496e74726f64756374696f6e3c2f6c693e0d0a2020203c6c693e0d0a2020202052656c6174696f6e73686970206265747765656e2053637265656e2c20466c6f77204c6f67696320616e642050726f6772616d3c2f6c693e0d0a2020203c6c693e0d0a20202020466c6f77204c6f676963204576656e74733c2f6c693e0d0a2020203c6c693e0d0a202020203c756c3e0d0a20202020203c6c693e0d0a20202020202050726f63657373204265666f7265204f7574707574202850424f293c2f6c693e0d0a20202020203c6c693e0d0a20202020202050726f6365737320416674657220496e7075742028504149293c2f6c693e0d0a20202020203c6c693e0d0a20202020202050726f63657373204f6e2056616c756520526571756573742028504f56293c2f6c693e0d0a20202020203c6c693e0d0a20202020202050726f63657373204f6e2048656c7020526571756573742028504f48293c2f6c693e0d0a202020203c2f756c3e0d0a2020203c2f6c693e0d0a2020203c6c693e0d0a20202020496e636c7564652050726f6772616d7320696e204d50503c2f6c693e0d0a2020203c6c693e0d0a202020203c756c3e0d0a20202020203c6c693e0d0a202020202020496e636c75646520544f503c2f6c693e0d0a20202020203c6c693e0d0a202020202020496e636c756465204930313c2f6c693e0d0a20202020203c6c693e0d0a202020202020496e636c756465204f30313c2f6c693e0d0a20202020203c6c693e0d0a202020202020496e636c756465204630313c2f6c693e0d0a202020203c2f756c3e0d0a2020203c2f6c693e0d0a2020203c6c693e0d0a2020202044796e616d69632053637265656e733c2f6c693e0d0a2020203c6c693e0d0a202020203c756c3e0d0a20202020203c6c693e0d0a2020202020204c656176652053637265656e3c2f6c693e0d0a20202020203c6c693e0d0a2020202020204c6561766520746f2053637265656e3c2f6c693e0d0a20202020203c6c693e0d0a20202020202043616c6c2053637265656e3c2f6c693e0d0a20202020203c6c693e0d0a2020202020205365742053637265656e3c2f6c693e0d0a202020203c2f756c3e0d0a2020203c2f6c693e0d0a2020203c6c693e0d0a2020202050726f63657373696e67206f66204c6973742066726f6d205472616e73616374696f6e20616e6420566963652056657273613c2f6c693e0d0a2020203c6c693e0d0a20202020456c656d656e747320696e2053637265656e204c61796f75743c2f6c693e0d0a2020203c6c693e0d0a202020203c756c3e0d0a20202020203c6c693e0d0a2020202020205461626c6520436f6e74726f6c733c2f6c693e0d0a20202020203c6c693e0d0a20202020202053746570204c6f6f70733c2f6c693e0d0a20202020203c6c693e0d0a202020202020546162737472697020436f6e74726f6c733c2f6c693e0d0a20202020203c6c693e0d0a20202020202053756273637265656e733c2f6c693e0d0a202020203c2f756c3e0d0a2020203c2f6c693e0d0a20203c2f756c3e0d0a203c2f6469763e0d0a3c2f6469763e0d0a, 2, 'SAP ABAP', 'SAP ABAP,SAP ABAP', 'SAP ABAP,SAP ABAP', 12, 2000.00, 1);

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
(1, 'test news', '2017-05-26', 1),
(2, 'test news22', '2017-05-26', 1);

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
  PRIMARY KEY (`PhotoGalleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`PhotoGalleryID`, `Image`, `Status`, `CategoryID`) VALUES
(3, 'acefaa92d7b9cb0818b893038b022f0f.JPG', 1, NULL),
(4, '0409627d7692d0149775c6c014252e65.JPG', 1, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_views`
--

INSERT INTO `site_views` (`SiteViewsID`, `IP`, `Date`) VALUES
(1, '::1', '2017-05-28 19:50:01'),
(2, '::1', '2017-05-28 19:50:39'),
(3, '::1', '2017-05-28 19:50:54'),
(4, '::1', '2017-05-28 19:51:00'),
(5, '::1', '2017-05-28 19:51:18'),
(6, '::1', '2017-05-28 19:52:01'),
(7, '::1', '2017-05-28 19:53:10'),
(8, '::1', '2017-05-28 19:53:31'),
(9, '::1', '2017-05-28 19:53:55'),
(10, '::1', '2017-05-28 19:54:25'),
(11, '::1', '2017-05-28 19:55:07'),
(12, '::1', '2017-05-28 19:55:21'),
(13, '::1', '2017-05-28 19:57:12');

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
(2, 'SiteMail', 'judhisahoo@gmail.com', 'judhisahoo@gmail.com'),
(3, 'MetaTitle', 'http://www.amateurtaekwondoassociationofdhenkanal.com', 'http://www.amateurtaekwondoassociationofdhenkanal.com'),
(4, 'MetaKeyWord', 'Taekwondow', 'Taekwondow'),
(5, 'SupportEmail', 'judhisahoo@gmail.com', 'Email id for support inquiry message'),
(6, 'MetaDescription', 'E-Learning For You Description', NULL),
(7, 'ContactNo', '9556644964', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TeamID`, `Name`, `Desingnation`, `Image`, `About`, `Status`, `Email`) VALUES
(1, 'Soumyabrata Sahoo', 'Secreatary', '6cd783d281efb7c937b4b966ad29762d.JPG', 'test', 1, 'secrata@ataad.com'),
(2, 'Jduhisthira sahaoo', 'cto', 'f776adc0fd678f6f1c4db8eaef0ac9ac.JPG', 'teat', 1, 't@ataad.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`TestimonialID`, `UserID`, `Testimonial`, `PostedDate`, `Status`, `Email`, `FirstName`, `LastName`) VALUES
(2, NULL, 'good', '2017-05-18', 1, 'parrent', 'sen', 'arora'),
(3, NULL, 'well take care of student', '2017-05-26', 1, 'parent', 'minu', 'todi');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `FName`, `LName`, `Address`, `City`, `Zip`, `CountryID`, `StateID`, `ContactNo`, `Gender`, `AddDate`, `UserAccessType`, `FacebookID`, `TwitterID`, `Image`, `Status`) VALUES
(3, 'judhisahoo@gmail.com', 'NTMwNTAxOTg0NjFmOA==', 'judhisthira', 'Sahoo', 'rahani', 'dkl', '112345', 99, 97, '856575859', NULL, '2014-02-19 20:10:16', 0, NULL, NULL, NULL, 1),
(2, 'breehal@gmail.com', 'NTMwMzhjNWM3NDcwMA==', 'Baljinder', 'Reehal', 'USA', 'san jose', '112345', 1, 5, '856575859', NULL, '2014-02-18 17:37:48', 0, NULL, NULL, NULL, 1);

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
  PRIMARY KEY (`VideoGalleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_gallery`
--

INSERT INTO `video_gallery` (`VideoGalleryID`, `Url`, `Status`, `CategoryID`) VALUES
(4, 'https://www.youtube.com/watch?v=XzxoLRIQ8Og', 1, 3),
(5, 'https://www.youtube.com/watch?v=PGQRNKHJwH4', 1, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
