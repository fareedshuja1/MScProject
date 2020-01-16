-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 18, 2017 at 10:58 PM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(25) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_email`, `admin_name`, `admin_password`) VALUES
(1, 'fareedshuja@gmail.com', 'Fareed Shuja', '05e99bc8ffbd2ffe6e189b7cf697af2c');

-- --------------------------------------------------------

--
-- Table structure for table `applicants_for_job`
--

CREATE TABLE `applicants_for_job` (
  `afj_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `jobseeker_id` int(25) NOT NULL,
  `date_applied` date NOT NULL,
  `cover_letter` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicants_for_job`
--

INSERT INTO `applicants_for_job` (`afj_id`, `job_id`, `jobseeker_id`, `date_applied`, `cover_letter`) VALUES
(1, 2, 4, '2017-08-04', NULL),
(2, 1, 4, '2017-08-04', NULL),
(3, 1, 2, '2017-08-10', '<p>I am a confident and competent computer science graduate with passion for programming. I possess a proven track record of successfully completing projects from the concept through to design, testing and deployment.<br />Currently looking for a suitable software developer role and to join an established professional team where I can further develop my skills and be involved in innovative and exciting projects.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Badakhshan'),
(2, 'Badghis'),
(3, 'Baghlan'),
(4, 'Balkh'),
(5, 'Bamyan'),
(6, 'Daykundi'),
(7, 'Farah'),
(8, 'Faryab'),
(9, 'Ghazni'),
(10, 'Ghor'),
(11, 'Helmand'),
(12, 'Herat'),
(13, 'Jowzjan'),
(14, 'Kabul'),
(15, 'Kandahar'),
(16, 'Kapisa'),
(17, 'Khost'),
(18, 'Kunar'),
(19, 'Kunduz'),
(20, 'Laghman'),
(21, 'Logar'),
(22, 'Maidan Wardak'),
(23, 'Nangarhar'),
(24, 'Nimruz'),
(25, 'Nuristan'),
(26, 'Paktia'),
(27, 'Paktika'),
(28, 'Panjshir'),
(29, 'Parwan'),
(30, 'Samangan'),
(31, 'Sar-e Pol'),
(32, 'Takhar'),
(33, 'Urozgan'),
(34, 'Zabul');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `company_id` int(25) NOT NULL,
  `login_email` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_details` text NOT NULL,
  `company_type_id` int(11) NOT NULL,
  `company_website` varchar(50) DEFAULT NULL,
  `company_address` varchar(200) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `company_logo` varchar(300) DEFAULT 'no_image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`company_id`, `login_email`, `company_name`, `company_details`, `company_type_id`, `company_website`, `company_address`, `phone_number`, `company_logo`) VALUES
(1, 'fareedshuja@gmail.com', 'ITech Time, Pvt Ltd', '<p>iTech Time is a progressive IT Services company with state-of-the-art paraphernalia and a portfolio of implementing IT solutions to both public and private sector organizations &amp; governmental ministries. Our main strength is our hi-caliber team of experts that enables us to meet the expectations of our esteemed clients by providing quality solutions right on time. We have an impressive team of brilliant, devoted, and highly skilled IT experts consisting of Project Managers, Team Leaders, Systems Analysts, Software Developers, Network Engineers, and Quality Assurance Specialists who have successful experience of developing and deploying sophisticated information systems for a variety of organizations of different countries.</p>', 1, 'http://www.itechtime.com', 'Office 20, Kabul Trade Centre. Shahre Naw', '+44 7492899957', '1_ITech_Time,_Pvt_Ltd.png'),
(2, 'faridshuja@live.com', 'South Asian Consultancy Group (SACG)', 'Soutn Asian Consultancy Group (SACG) is a non profit international telecommunications service company engaged in facilitating the development of infrastructure solutions for disperse populated areas.\r\n\r\nOur aim is to provide a range of premier services encompassing cell tower co-location, operation and management, network planning and design, and Over-The-Air device management, to Telecommunication and ISP services providers facings a challenging environment.', 3, 'http://www.google.com/', NULL, '0093 1234567', 'no_image.png'),
(3, 'farhadshahabi12@yahoo.com', 'WHS Group Of Companies', 'As your Gateway to the Gig Economy, opportunities with WHS Companies are a click away from our 200,000-strong talent pool. The Gig Economy is a business environment which engages individuals in short-term, or project-based, employment. The Gig Economy will be 40% of employment by 2040, and it’s not stopping any time soon. As leaders in the Gig Economy, we are driven by data in everything we do, from sourcing ideal employees to the quality work they perform for our clients.\r\n\r\nAn ISO (International Organization for Standardization)-9001:2008 certified company, MS Companies is one of the fastest-growing privately held firms in the United States. We provide support across 14 states and abroad by simultaneously benefiting job seekers and companies in need of customized personnel support. As a result, MS Companies has instilled the highest levels of confidence among its customers and enables rewarding careers for employees.', 6, 'http://www.whsgroup.co.uk/', NULL, '+44 7492899957', 'no_image.png'),
(4, 'zubair_khan124@hotmail.com', 'Fast Web & App, Pvt Ltd', 'Fast Web & App is a company that truly believes in knowledge and is convinced that it is knowledge that will make the difference in the future. At the core of iFaST-Solutions is its staff and not software or hardware - it is the collective knowledge that we possess that is most important. With qualified, professional, motivated and knowledge-focused staff the possibilities are unlimited.', 2, 'http://www.fastwebapp.co.uk', NULL, '+93 78912365', 'no_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE `company_type` (
  `company_type_id` int(11) NOT NULL,
  `company_type_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`company_type_id`, `company_type_title`) VALUES
(1, 'PRIVATE SECTOR'),
(2, 'PUBLIC SECTOR'),
(3, 'NON-PROFIT ORGANIZATION'),
(4, 'GOVERNMENT'),
(5, 'UN'),
(6, 'INTERNATIONAL DEVELOPMENT AGENCY'),
(7, 'AID AGENCY');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cemail` varchar(40) NOT NULL,
  `csubject` varchar(100) NOT NULL,
  `cmessage` text NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `iso`, `country_name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `degree_level_id`
--

CREATE TABLE `degree_level_id` (
  `degree_level_id` int(11) NOT NULL,
  `degree_level_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `degree_level_id`
--

INSERT INTO `degree_level_id` (`degree_level_id`, `degree_level_title`) VALUES
(1, 'Diploma / Certificate'),
(2, 'Undergraduate / Bachelors Degree'),
(3, 'Bachelors / Masters Degree'),
(4, 'Masters / PhD Degree'),
(5, 'Masters Degree'),
(6, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekers_experience`
--

CREATE TABLE `jobseekers_experience` (
  `je_id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `organization_location` varchar(30) DEFAULT NULL,
  `job_type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `duty` text NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `end_date` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobseekers_experience`
--

INSERT INTO `jobseekers_experience` (`je_id`, `jobseeker_id`, `designation`, `organization`, `organization_location`, `job_type_id`, `category_id`, `duty`, `start_date`, `end_date`) VALUES
(1, 2, 'Asdkhas', 'Real Animation Works', NULL, 1, 10, '<p>My updated responsibilities.</p>', 'July, 2017', 'July, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekers_qualification`
--

CREATE TABLE `jobseekers_qualification` (
  `jq_id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `degree_level` varchar(25) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `institute_name` varchar(100) NOT NULL,
  `start_date` varchar(25) DEFAULT NULL,
  `end_date` varchar(25) DEFAULT NULL,
  `institute_location` text,
  `final_grade` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobseekers_qualification`
--

INSERT INTO `jobseekers_qualification` (`jq_id`, `jobseeker_id`, `degree_level`, `course_title`, `institute_name`, `start_date`, `end_date`, `institute_location`, `final_grade`) VALUES
(1, 2, 'Bachelor\'s Degree', 'BSc Computer Science', 'Iqra University, Pakistan', 'September, 2009', 'April, 2014', 'Peshawar, Pakistan', '3.22 / 4 CGPA'),
(2, 2, 'Master\'s Degree', 'MSc Computer Science With Industrial Experience', 'Queen Mary University Of London', 'September, 2015', 'In Progress', 'London, United Kingdom', NULL),
(3, 2, 'Diploma / Certificate', 'IELTS', 'British Council', 'February, 2017', 'February, 2017', 'London, UK', '7.0');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_main`
--

CREATE TABLE `jobseeker_main` (
  `jobseeker_id` int(25) NOT NULL,
  `login_email` varchar(50) NOT NULL,
  `jobseeker_name` varchar(30) NOT NULL,
  `jobseeker_phone` varchar(15) DEFAULT NULL,
  `jobseeker_linkedin` text,
  `jobseeker_education` text,
  `jobseeker_experience` text,
  `jobseeker_coverletter` text,
  `jobseeker_image` varchar(100) DEFAULT 'no_image.png',
  `jobseeker_cv` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobseeker_main`
--

INSERT INTO `jobseeker_main` (`jobseeker_id`, `login_email`, `jobseeker_name`, `jobseeker_phone`, `jobseeker_linkedin`, `jobseeker_education`, `jobseeker_experience`, `jobseeker_coverletter`, `jobseeker_image`, `jobseeker_cv`) VALUES
(1, 'giovanipvtltd@gmail.com', 'Hamood Durrani', '07492899957', NULL, NULL, NULL, 'my statement', 'no_image.png', '1_Hamood_Durrani.pdf'),
(2, 'faridshuja@yahoo.com', 'Fareed Khan', '07492899957', NULL, NULL, 'My experience', '<p>I am a confident and competent computer science graduate with passion for programming. I possess a proven track record of successfully completing projects from the concept through to design, testing and deployment.<br />Currently looking for a suitable software developer role and to join an established professional team where I can further develop my skills and be involved in innovative and exciting projects.</p>', 'no_image.png', ''),
(3, 'hamooddurrani12@hotmail.com', 'Jordan Mike', '+447492899957', NULL, NULL, NULL, 'Personal statement.', 'no_image.png', '3_Jordan_Mike.docx'),
(4, 'hafsaslem@gmail.com', 'Hafsa Saleem', '07492956190', NULL, NULL, NULL, NULL, 'no_image.png', '4_Hafsa_Saleem.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`category_id`, `category_title`) VALUES
(1, 'ACCOUNTING'),
(2, 'ADMINISTRATION'),
(3, 'ADVISOR'),
(4, 'AGRICULTURE'),
(5, 'AIRLINES AND AVIATION'),
(10, 'ARCHITECTURE AND PLANNING'),
(11, 'ARTS AND CRAFTS'),
(14, 'BANKING'),
(15, 'BIOTECHNOLOGY'),
(16, 'BROADCAST MEDIA'),
(18, 'BUSINESS ADMINISTRATION'),
(20, 'CALL CENTER'),
(22, 'CHEMICAL ENGINEERING'),
(24, 'CIVIL ENGINEERING'),
(29, 'COMPUTER NETWORKING'),
(30, 'CONSTRUCTION'),
(31, 'CONSULTING'),
(37, 'DEFENSE AND SPACE'),
(38, 'EDUCATION'),
(41, 'ELECTRICAL ENGINEERING'),
(42, 'FILM AND ENTERTAINMENT'),
(43, 'ENVIRONMENTAL SERVICES'),
(44, 'EVENT MANAGEMENT'),
(48, 'FINANCE'),
(53, 'CHARITY'),
(56, 'GOVERNMENT ADMINISTRATION'),
(59, 'HEALTH AND FITNESS'),
(61, 'HOSPITAL AND HEALTH CARE'),
(63, 'HUMAN RESOURCES'),
(64, 'IMPORT AND EXPORT'),
(68, 'IT - HARDWARE'),
(69, 'IT - SOFTWARE'),
(70, 'ELECTRONIC ENGINEERING'),
(71, 'INSURANCE'),
(72, 'INTERNATIONAL RELATIONSHIP'),
(73, 'INVESTMENT BANKING'),
(75, 'LAW'),
(76, 'LEGISLATIVE OFFICE'),
(77, 'TRAVEL AND TOURISM'),
(78, 'LIBRARY'),
(79, 'LOGISTICS AND SUPPLY CHAIN'),
(80, 'MANAGEMENT'),
(81, 'MARKETING'),
(82, 'MECHANICAL ENGINEERING'),
(83, 'MEDIA PRODUCTION'),
(84, 'MEDICAL'),
(86, 'MILITARY'),
(87, 'MUSIC'),
(89, 'PHOTOGRAPHY'),
(90, 'TRAINING AND COACHING'),
(91, 'PUBLIC RELATIONS'),
(92, 'REAL ESTATE'),
(93, 'RETAIL'),
(94, 'SPORTS'),
(95, 'RECRUITING'),
(98, 'WHOLESALE'),
(99, 'WRITING AND EDITING'),
(100, 'HEALTH CARE'),
(101, 'MONITORING AND EVALUATION');

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `job_id` int(11) NOT NULL,
  `job_title` text NOT NULL,
  `vacancy_no` varchar(50) DEFAULT NULL,
  `company_id` int(25) NOT NULL,
  `category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `job_details` text,
  `duty_responsibilities` text,
  `experience_required` text,
  `qualification_required` text,
  `skills_required` text,
  `other_locations` text,
  `travel_required` varchar(3) DEFAULT NULL,
  `job_salary` varchar(100) DEFAULT NULL,
  `apply_guidance` text,
  `date_posted` date NOT NULL,
  `date_expiry` date DEFAULT NULL,
  `no_vacancy` int(11) NOT NULL DEFAULT '1',
  `is_verified` varchar(3) NOT NULL DEFAULT 'NO',
  `is_active` varchar(3) NOT NULL DEFAULT 'YES',
  `is_suspecious` varchar(3) DEFAULT NULL,
  `is_modified` varchar(3) DEFAULT 'NO',
  `modification_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`job_id`, `job_title`, `vacancy_no`, `company_id`, `category_id`, `city_id`, `job_type_id`, `job_details`, `duty_responsibilities`, `experience_required`, `qualification_required`, `skills_required`, `other_locations`, `travel_required`, `job_salary`, `apply_guidance`, `date_posted`, `date_expiry`, `no_vacancy`, `is_verified`, `is_active`, `is_suspecious`, `is_modified`, `modification_date`) VALUES
(1, 'Web And Database Developer', 'XYZ123', 1, 69, 14, 1, '<p>We are looking for a Web developer who is dedicated to his craft, writes code that is proud of and can hit the ground running. We need you to write clean, fast PHP to a high standard, in a timely and scalable way that improves the code-base of our products in meaningful ways.</p><p><br />You will be a part of a creative team that is responsible for all aspects of the ongoing software development from the initial specification, through to developing, testing and launching.<br /><br />We hire people based upon the H&#39;s:<br /><br />Happy - a zest for life and desire to delight our clients<br />Humble - no egos allowed. ever.<br />Hungry - will want to change the world<br />Honest - always do what you say you&#39;re gonna do</p>', '<ul><li>Write clean&nbsp;code</li><li>Provide&nbsp;detailed specifications on demand.</li><li>Troubleshoot and maintain the core product software and databases to ensure strong optimization and functionality</li><li>Contribute in all phases of the development lifecycle</li><li>Follow industry best practices</li><li>Develop and deploy new features to facilitate related procedures and tools if necessary</li></ul>', '<p>At least two years of work experience in web and database development.</p>', '<p>At least Bachelor&#39;s degree in Computer Science or relevant field.</p>', '<p><strong>Solid Knowledge of:&nbsp;</strong></p><ol><li>PHP Framework, preffebly Laravel</li><li>MySQL and SQL queries</li><li>Javascript Libraries, like JQuery</li><li>HTML, CSS and Bootstrap</li></ol>', '', 'YES', 'As per company salary scale', '<ul><li>Please send your CV along with a cover letter electronically to following e-mail.</li><li>Subject line must be: (Developer &ndash;ABC1234)&nbsp;</li></ul><p><strong>Submission Email:</strong></p><p>jobs@itechtime.com</p>', '2017-08-01', '2017-08-31', 1, 'No', 'YES', 'NO', 'YES', '2017-08-01'),
(2, 'IT Specialist', 'ITSPE1234', 1, 69, 14, 1, '<p>Should develop a complete and full-fledged MIS/Database with coordination of other database technical experts based on the requirements and specifications of the company.</p>', '<p>1. Develop an action plan based on job description.<br />2. Should develop a complete and full-fledged MIS/Database with coordination of other database technical experts based on the requirements and specifications of Ministry of mines and petroleum.<br />3. Should report to the MIS officer.<br />4. Should provide reports on upgrades and updates for the database systems.<br />5. Should be able to fix any kind of issue within the MIS/Database system.<br />6. Should write documentation on the usage of database with the coordination of MIS officer and database team members.<br />7. Plans database upgrades by maintaining, evaluating and improving a transaction processing model.<br />8. Assesses database performance by monitoring database performance.<br />9. Evaluating and resolving processing and programming problem.<br />10. Securing database application by access and control policies and procedures<br />11. Implementing disaster recovery procedures</p>', NULL, '<p>1. Have bachelor degree in IT, Computer Science and any other related field with 5 years of related professional experience or Master Degree with 4 years of related professional experience.<br />2. Strong experience in C#, Asp.Net, HTML-5, J Query, JavaScript, Ajax and CSS-3<br />3. Experience in Java SE and EE is an asset.</p>', '<p>1. Ability to contribute to the design and architecture experience with agile development and programming methodologies.<br />2. Demonstrated ability to explain complex technical issues to both technical and non-technical audiences.<br />3. Capable of understanding and contributing to the technical solution from the design through code level.<br />4. Strong skills in resolving defects/bugs during Quality Assurance testing, pre-production, production and post-release patches.<br />5. Should be creative and self-motivated.</p>', '', 'NO', '$600 to $1000 depending on skills', '<p>Expressions of interest (including CV and three references in word file, Educational and Work experiences documents) should be sent to the email address below</p><p>jobs@itechtime.com</p>', '2017-08-01', '2017-08-31', 1, 'No', 'YES', 'NO', 'NO', NULL),
(3, 'IT Officer - Stock Officer', 'ABCD4321', 4, 68, 15, 1, '<p>IT Stock Officer is responsible for manage, control, purchase and replenish products. One of the key aspects of the IT Stock Officer is maintaining stock levels to provide a daily routine.</p><p>IT Stock Officer reports to General / Deputy Manager&ndash;IT operations and Helpdesk.</p>', '<ol><li>Responsible for housekeeping and managing IT assets kept in all the stock locations of NKB.</li><li>Records daily deliveries and shipments to reconcile inventory.</li><li>Responsible for accurately registering IT inventory in stock inventory system and their allotments details. Keep Stock inventory system upto date and make sure that inventories are accurate.</li><li>Maintains record of receipts as well as issuance of items that are going out of the warehouse so as to ensure accuracy and completeness.</li><li>Maintain the storeroom and the allocation of space for stock. Ensure the storeroom meets NKB regulations.</li><li>Prepare and send the IT equipment to New Kabul Bank users / branches according to standard procedures after users / branches formal request and approvals.</li><li>Prepare the list of required IT equipment&rsquo;s and make formal request for procurement</li></ol>', '<p>Minimum 2 - 3 years of experience in stock management.</p>', '<p>At least 12th class graduate, however Bachelor Degree in business Administration/Information Technology/Information System or similar discipline will be given preference.</p>', '<p>Proven experience as Inventory officer/ manager. Ability to accurately track inventory and create inventory reports.Working knowledge of Inventory management software.</p>', 'Kabul, Khost', 'YES', 'As per company salary scale', '<p>Please indicate the Position Title, Vacancy Number in subject of your email and application, otherwise your application will not be considered</p><p>Please send your CV and application to :&nbsp; jobs@gmail.com</p><p>&nbsp;</p>', '2017-08-01', '2017-08-30', 1, 'No', 'YES', 'NO', 'NO', NULL),
(4, 'Monitoring Support Officer (MSO)', 'XYZ4321', 3, 101, 1, 3, '<p>The Monitoring support officer, will be responsible for assistance in implementing the process of monitoring and reporting on timely daily attendance, registration form, readiness of the training venue, logistical arrangement, communication and with provincial technical manager.&nbsp;</p>', '<p>The primary responsibilities of the MSO include but are not limited to the following:</p><p>Strictly, follow up the timing sessions as per teacher training and manual, and provide feedback accordingly, to only the training organizer and similarly,<br />The MSO must document or submit daily monitoring report, as per designed template, by handwriting or computerized.<br />Monitor and report on timely and daily attendance of trainees and trainers<br />Be responsible for the logistical need of the training: readiness of the training venue, tea breaks,<br />Make ensure that all relevant printing document be made, at least two days before such as; registration form, attendance, feedback form and pre and posttest forms, dully be collected and safely submit to program organizer<br />Make sure all the participants submit a copy of their Tazkira. &nbsp;<br />Communication with the Provincial ACR management and the technical team responsible for the training.<br />Data entry into the online or offline database as suggested by M&amp;E director<br />Supporting preparation of stationery to the participants<br />Perform other tasks related to monitoring and evaluation as assigned.</p>', '<p>First preference will be given to those who have experience national or international level NGO(s) on monitoring and evaluation.</p>', '<p>Fresh bachelor degree in social sciences or any other relevant subject.</p>', '<p><strong>Computer Skills:</strong> Computer knowledge, particularly Word and excel</p><p><strong>Language Proficiency:&nbsp; </strong>Local Languages (Dari or Pashto) and English in reading, writing and speaking.</p><p>&nbsp;</p>', 'Kabul, Kandhahr', 'YES', 'As per company salary scale', '<p>Interested qualified local candidates should submit their update CVs to the below email address, with the Subject Line of the email formatted with the following: [Jon title, Vacancy Number and Applicant&#39;s Full Name, no later than the closing date indicated in the Job Advertisement.Email Address:&nbsp;career@mydomain.com<br />Creative Associates International is an Equal Opportunity Employer.</p>', '2017-08-01', '2017-08-28', 2, 'No', 'YES', 'NO', 'NO', NULL),
(5, 'Taxation Specialist', NULL, 3, 2, 14, 2, '<p>Responsible for quarterly and annual tax compliance.&nbsp;<br />This includes responsibilities for all documentation and support and researching any relevant issues. Responsible for responding to related tax correspondence. Assist with the preparation of the quarterly and annual tax provision and related tax accounting.&nbsp;</p>', '<ul><li>Prepare quarterly and annual &nbsp;tax compliance</li><li>Preparation calculations of research and development credit, including documentation requirements in accordance with the Internal Revenue Code</li><li>Manage tax software and implement new features and updates, assist with the quarterly and annual provision process</li><li>Respond to related tax correspondence and research issues as they arise</li></ul>', '<p>4+ yrs. experience with domestic corporate tax filings.</p>', '<p>BS in Accounting required; &nbsp;<br />&nbsp;</p>', '<ul><li>Must have good communication and writing skills to interact with various departments and with outside reporting jurisdictions</li><li>PC skills required: extensive use of Microsoft Excel &amp; Word and experience with tax software (PW, TMS).</li></ul>', '', 'NO', 'As per company salary scale', '<p>The candidate should submit his application with CV as well Qualification Documents to below email, with vacancy number, subject: (Taxation Specialist ) a cover letter,</p><p><strong>Submission Email:</strong> jobs@yahoo.com</p>', '2017-08-01', '2017-08-25', 1, 'YES', 'YES', 'NO', 'NO', NULL),
(6, 'Provincial Coordinator', 'ACDE4321', 3, 2, 14, 1, '<p>We are looking for a responsible Project Coordinator PC to administer and organize all types of projects activities, from simple activities to more complex plans.</p><p>Project Coordinator responsibilities include working closely with our project supervisor to prepare comprehensive action plans, including resources, timeframes and budgets for projects. PC will perform various coordinating tasks, like schedule and risk management, along with administrative duties, like maintaining project documentation and handling financial queries. To succeed in this role, the PC should have excellent time management and communication skills, as she will collaborate with project beneficiaries and target groups and as well as project internal teams to deliver results on deadlines.</p><p>Ultimately, the Project Coordinator&rsquo;s duties are to ensure that all project activities are completed on time, within budget and meet high quality standards.</p>', '<p>&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Coordinate project management activities, resources, equipment and information</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Break projects into doable actions and set timeframes</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Liaise with project beneficiaries to identify and define requirements, scope and objectives</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assign tasks to moderators and assist with schedule management</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Make sure that project beneficiaries&rsquo; needs are met as projects evolve</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Help finance department to prepare project activity budgets</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Analyze risks and opportunities</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Oversee project procurement management at the provincial level</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monitor project progress and handle any issues that arise</p>', '<p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Experience in project management, from conception to delivery</p>', '<p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Proven work experience as a Project Coordinator or similar role</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; An ability to prepare and interpret flowcharts, schedules and step-by-step action plans</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Familiarity with risk management and quality assurance control</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Strong working knowledge of Microsoft Project and Microsoft Planner</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; University degree in Administration or related field</p>', '<p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Solid organizational skills, including multitasking and time-management</p><p>&nbsp;&nbsp;&nbsp; &bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Strong client-facing and teamwork skills</p>', '', 'NO', 'As per company salary scale', '<p>To apply: Please send your updated CV &amp; Cover letter to the below mentioned email address till 4:00 PM, Tuesday 8th August 2017 and include&nbsp;Vacancy Number in the subject line of your application.</p><p>Application without subject line will not be considered.</p>', '2017-08-01', '2017-08-30', 1, 'YES', 'YES', 'NO', 'NO', NULL),
(7, 'Accountant', 'DESC432', 2, 1, 14, 1, '<p>It is essential that the candidate possesses at least 3 years experience in accountancy in Afghanistan. Additionally, the candidate would preferably have prior experience with engineering or construction, however this is not essential. Post-graduate qualifications an advantage.</p><p>Strong self-motivation, time-management and performance skills<br />Ability to pay attention to detail as the required candidate will be overlooking numerical files. Excellent computer skills in Microsoft Office.</p>', '<p>It is essential that the candidate possesses at least 3 years experience in accountancy in Afghanistan. Additionally, the candidate would preferably have prior experience with engineering or construction, however this is not essential. Post-graduate qualifications an advantage.</p><p>Strong self-motivation, time-management and performance skills<br />Ability to pay attention to detail as the required candidate will be overlooking numerical files. Excellent computer skills in Microsoft Office.</p>', '<p>- 3 year experience as an accountant<br />- Familiarization with tax procedure and BRT within an organization<br />- Fluent in English, knowledge Chinese (desired but not essential)<br />- Previous experience with construction and/or engineering (desired but not essential)<br />- Will be required to learn to operate using database</p>', NULL, NULL, '', 'NO', 'As per company salary scale', '<p>Dear applicants, please read carefully above job description, job requirement and experience make sure that you are qualified to apply for this job.</p><p>All CV&rsquo;s/ Resume&rsquo;s must be submitted in PDF format by email, a passport size color photo must be attached on applicants CV&rsquo;s/Resumes.&nbsp;Also, find application letter of CRBC ,please after filling attach to application.</p>', '2017-08-01', '2017-08-31', 1, 'YES', 'YES', 'NO', 'NO', NULL),
(8, 'Data Collector And Analyst', 'VA/2017/GIZ/119', 2, 56, 17, 2, '<p>The Government of Afghanistan is increasingly promoting the role of&nbsp; the private sector&nbsp; (role) in(for) setting up both conventional and renewable energy projects investment to significantly enhance and manage the country&rsquo;s energy generating capacity.</p><p>Afghanistan has huge energy potential. The salient details of the energy potential are as follows:</p><p>23,000 MW of hydro power potential across various sites in the country &ndash; 125 sites have been identified for Mini Hydro Projects (MHPs), with potential of over 600 MW.<br />3,000 &ndash; 4,000 MW of gas-based power generation potential &ndash; Pre-feasibility studies and Site Identification made for 100 MW.<br />66,000 MW of wind power generation potential &ndash; 31,600 km&sup2; of windy land area i.e. 5% of the total land area of Afghanistan.<br />222,000 MW of solar power generation potential &ndash; 300 sunny days a year and annual average insolation of about 5.5 kWh/ m&sup2;/day.<br />4,000 MW of bio-mass power generation potential &ndash; more than 85% of Afghanistan&rsquo;s energy needs are met today by traditional biomass, mainly wood and dung.<br />3,500 MW of geo-thermal power generation potential &ndash; power plants could range from 5 to 20 MW.</p>', '<ul><li>Report on broad policy framework for setting up RE projects in Afghanistan.</li><li>Comprehensive business development strategy and action plan for AREU.</li><li>Information material in the form of brochures/flyers/pamphlets and other related information documents for the private power companies.</li><li>Comprehensive Guidelines for Private Investments in the Afghanistan RE Sector.</li><li>Completion of RE projects bidding process and documentations.</li><li>Develop Standard Project Agreements.</li><li>Capacity building on business sustainability to AREU staff</li></ul>', '<ol><li>At least 3 years of relevant experience with national and international organizations.</li><li>Experience of the private sector in Afghanistan is an asset.</li></ol>', '<ul><li>University degree in Business Administration or any other disciplines, preferable Master in Business Administration, Business Studies or Marketing.</li></ul>', '<ul><li>Knowledge and understanding of attracting private sector investments and experience covering private policy formulation and implementation, organization development, project appraisal, financial analysis, tariff analysis, formulation and negotiations of project agreements;</li><li>Project Management experience and skills; possible certification in Project Management Professional (PMP) or PRINCE2 foundation.</li></ul>', 'Badakhshan, Zabul, Nangarhar', 'YES', '$1000 per month', '<p>You are kindly requested to submit your CV and letter of motivation with complete contact details to:</p><p>Note: Your application and subject line must contain (Data Collector and Analyst), Otherwise your CV&lsquo;s will not be considered.</p><p><br />Only those candidates will be called for interview who meets the qualification and requirements for the mentioned position.</p>', '2017-08-01', '2017-08-27', 1, 'YES', 'YES', 'NO', 'NO', NULL),
(9, 'رییس حوزه فرعی دریایی ارغنداب (کندهار) بست رتبه-۲', 'ARTF/CSMD/MEW', 2, 56, 15, 1, '<p>مدیریت در جهت نظارت ، انکشاف ، توسعه و استفاده موثر و عادلانه از منابع آبی به منظور مدیریت همه جانبه منابع آب (IWRM) جهت دسترسی نیازمندیهای مختلف به منابع آب مطمئین و انکشاف پایدار اقتصادی ، اجتماعی و زیست محیطی در حوزه دریایی مربوط.</p><p>رییس حوزه فرعی دریایی ارغنداب (کندهار) به رییس عمومی حوزه دریایی هلمند گزارش می دهد .</p>', '<p>1. ترتیب پلان کاری ماهوار ، ربعوار و سالانه در مطابقت به پلان کاری حوزه عمومی دریایی جهت رسیدن به اهداف استراتیژیک وزارت .</p><p>2. همکاری درطرح و تسوید پالیسی ها، استراتیژی ها، قوانین ومقررات درهماهنگی با ریاست عمومی حوزه مربوطه بمنظورعرضه خدمات بهتر.</p><p>3. مدیریت و نظارت از تطبیق پالیسی ها، استراتیژی ها، قوانین ومقررات در حوزه فرعی دریایی مربوط.</p><p>4. توسعه و انکشاف رهنمودها و منوال ها در امور مدیریت همه جانبه منابع آب (IWRM) به منظور بلند بردن ظرفیت کاری کارکنان اداره مربوطه.</p><p>5. مدیریت در جهت برنامه ریزی ، انکشاف ، توسعه وتنظیم همه جانبه منابع آب (IWRM) در حوزه فرعی دریایی مربوط.</p><p>6. حصول اطمینان از فعال نگهداشتن استیشن های هایدرومیتیورولوژیکی غرض جمع آوری ارقام از دریاهای مربوطه و ارسال آن به حوزه عمومی مربوطه .</p>', NULL, '<p>1- داشتن سند تحصیلی حداقل لیسانس دریکی از رشته های: هایدروتخنیک ، سیول ، هایدرولوژی،هایدروجیولوژی به درجه بلند تر تحصیلی در رشته های متذکره ارجحیت داده میشود .</p><p>2- داشتن تجربه کاری حد اقل سه سال مرتبط به وظیفه.</p><p>3- تسلط به یکی از زبان های رسمی کشور (دری یا پشتو) و آشنایی با زبان انگلیسی .</p><p>4- داشتن مهارت های کمپیوتری در برنامه های تخنیکی مرتبط به وظیفه.</p>', '<p>1. ماده دوم فرمان شماره 92 مقام عالی ریاســــــت جمهوری &quot;هرگاه کاندیدان بست های خدمات ملکی، بست&zwnj;های نظامی و غیر خدمات ملکی، در جریان پروسه تعیینات با استفاده از واسطه در تقررشان اقدام نمایند، از اشتراک در پروسه رقابتی همان بست محروم می&zwnj;گردند&quot;.</p><p>2. کاندیدان محترم مکلف هســـتند تا از فورم رسمی درخواستی ریاســــت واحد حمایوی برنامه ارتقای ظرفیت مبتنی بر نتایج (سی بی آر) استفاده نمایند.</p><p>3. کاندیدان محترم که در ادارات دولتی به شکل رسمی اجرای وظیفه می&zwnj;نمایند و یا قبلاً وظیفه اجرا نموده&zwnj;اند، یک قطعه فورم خلص سوانح جدید&zwnj;شان را که تاریخ صدور داشته باشد، از آخرین مرجع کارکردش ضم فورم درخواستی نمایند. هیچگونه خلص سوانح که از واحدهای دومی مرکز و ولایات صادر گردیده باشد، مدار اعتبار نمی&zwnj;باشد مگر اینکه به تأیید واحد اولی وزارت یا اداره مربوطه رسیده باشد.</p>', '', 'NO', 'As per company salary scale', '<p>به اطلاع آن عده متقاضیانی که جهت اشـتراک در اســـــتخدام رقابتی بست های اول الی پنجم خدمات ملکی تحت پوشش برنامه (سی بی آر) که از طریق ریاست منابع بشری وزارت انرژی و آب اعلان میگردد، رسانیده می &zwnj;شود تا مراتب آتی را جداً رعایت نمایند.</p>', '2017-08-01', '2017-08-31', 1, 'YES', 'YES', 'NO', 'NO', NULL),
(10, '(معاون عملیاتی (ساختمانی امور برق', 'VA-DABS-HQs/95-0073', 4, 41, 14, 1, '<p>د افغانستان برشنا شرکت یک شرکت خود کفا و مستقل است که طبق قانون شرکت های سهامی و محدود المسولیت جمهوری اسلامی افغانستان ایجاد گردیده است. د افغانستان برشنا شرکت با تمام اسهام سرمایه خود یک شرکت محدود المسئولیت بوده که به دولت افغانستان تعلق دارد. شرکت مذکور به تاریخ 15 ثور 1387 مطابق 4 می 2008 به د افغانستان برشنا شرکت تغییر شخصیت نمود و بحیث یک شرکت ملی برق جایگزین د افغانستان برشنا موسسه گردید. د افغانستان برشنا شرکت تولید، تورید، انتقال و توزیع برق را بگونه تجارتی در سراسر افغانستان تنظیم و اداره می نماید.</p>', '<ul><li>&nbsp; مراقبت از تنظیم گروپ های شبکه به ساحه کار.</li><li>&nbsp;کنترول از کار شبکه های پلانی وغیر پلانی.</li><li>&nbsp;مراقبت از تطبیق لوازم ها واستندرد های تعین شده در شبکه های برق.</li><li>&nbsp;مراقبت از تمدید شبکه های برق مطابق اسکیچ وبراود.</li><li>&nbsp;تطبیق پروژه های برقی مطابق پلان داده شده.</li><li>&nbsp;گذارش گیری از نوع پیشرفت شبکه ها از مدیر شبکه .</li><li>&nbsp;گذازش دهی به آمر عمومی.</li><li>&nbsp;مراقبت وکنترول از کارات یومیه شاپ تولیدی.</li></ul>', NULL, '<p>لیسانس در رشته انجنیری برق با سه سال تجربه کاری در بخش مربوطه</p>', '<ul><li>&nbsp; پرتحرک با حصول نتایج عالی.</li><li>&nbsp;تبلور وعلاقه مفرط به دیدگاه شرکت و تحریک، رهبری و توانمند سازی سایرین در حصول اهداف سازمانی.</li><li>&nbsp;توانایی تنظیم استراتیژی ها و پالیسی ها و ایجاد راهبرد ها جدید.</li><li>&nbsp;توانایی تعریف اهداف و استراتیژی هایی عمومی شرکت در پلان های کاری و فعالیت های عملیاتی.</li><li>&nbsp;توانایی تشویق، رهبری و توانمند سازی سایرین در برآوردن اهداف سازمانی د افغانستان برشنا شرکت.</li><li>&nbsp;توانایی ایجاد و حفظ روابط کاری مثبت با طرفین ذیربط.</li><li>&nbsp;تبعه افغان با تسلط کامل به زبان های دری و پشتو به ویژه زبان انگلیسی.</li></ul>', '', 'NO', 'As per company salary scale', '<p>It is your responsibility to verify that information entered in your Resume / CV that are uploaded are received and are accurate. Documents must be uploaded as the correct document type Word Format) or they will not be considered. Example: Resume must be submitted as a Resume. Recruitment Team will not modify, change or contact you regarding the completeness or accuracy of your application. If a document is not legible, you will not be able to attend the interview and you must again upload it by the close date.</p>', '2017-08-01', '2017-08-31', 1, 'YES', 'YES', 'NO', 'YES', '2017-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `job_type_id` int(11) NOT NULL,
  `job_type_title` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`job_type_id`, `job_type_title`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Contract'),
(4, 'Freelancer'),
(5, 'Internship');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_email` varchar(50) NOT NULL,
  `login_password` text NOT NULL,
  `login_type` varchar(10) NOT NULL,
  `is_verified` varchar(3) DEFAULT 'NO',
  `is_blocked` varchar(3) NOT NULL DEFAULT 'NO',
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_email`, `login_password`, `login_type`, `is_verified`, `is_blocked`, `date_created`) VALUES
('fareedshuja@gmail.com', '05e99bc8ffbd2ffe6e189b7cf697af2c', 'COMPANY', 'YES', 'NO', '2017-08-01'),
('farhadshahabi12@yahoo.com', '05e99bc8ffbd2ffe6e189b7cf697af2c', 'COMPANY', 'YES', 'NO', '2017-08-01'),
('faridshuja@live.com', '05e99bc8ffbd2ffe6e189b7cf697af2c', 'COMPANY', 'YES', 'NO', '2017-08-01'),
('faridshuja@yahoo.com', '05e99bc8ffbd2ffe6e189b7cf697af2c', 'JOBSEEKER', 'YES', 'NO', '2017-08-01'),
('giovanipvtltd@gmail.com', '05e99bc8ffbd2ffe6e189b7cf697af2c', 'JOBSEEKER', 'NO', 'NO', '2017-08-01'),
('hafsaslem@gmail.com', '5857060c282915376c9b3ee80af80faa', 'JOBSEEKER', 'YES', 'NO', '2017-08-01'),
('hamooddurrani12@hotmail.com', '05e99bc8ffbd2ffe6e189b7cf697af2c', 'JOBSEEKER', 'YES', 'NO', '2017-08-01'),
('zubair_khan124@hotmail.com', '05e99bc8ffbd2ffe6e189b7cf697af2c', 'COMPANY', 'YES', 'NO', '2017-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `sch_id` int(11) NOT NULL,
  `sch_title` text NOT NULL,
  `country_id` int(11) NOT NULL,
  `institute_name` varchar(200) NOT NULL,
  `degree_level` varchar(50) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `closing_date` varchar(30) NOT NULL,
  `sch_description` text,
  `field_of_study` text,
  `target_audience` text,
  `sch_value` text,
  `eligibility` text,
  `how_to_apply` text,
  `original_source` text NOT NULL,
  `no_of_scholarships` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`sch_id`, `sch_title`, `country_id`, `institute_name`, `degree_level`, `start_date`, `closing_date`, `sch_description`, `field_of_study`, `target_audience`, `sch_value`, `eligibility`, `how_to_apply`, `original_source`, `no_of_scholarships`) VALUES
(1, 'Oxford Pershing Square Graduate Scholarships', 225, 'Said Business School, University Of Oxford In United Kingdom', 'Diploma / Certificate', 'September 2018', 'March 2018 (annual)', '<p>Every year, the Pershing Square Foundation awards up to five full scholarships to support outstanding students on the 1+1 MBA, covering both the Master&rsquo;s degree and the MBA year.</p>', '<p>Oxford&rsquo;s 1+1 MBA Programme: Oxford University&rsquo;s one-year full-time MBA programme combined with one&nbsp;of the&nbsp;one-year Masters programmes&nbsp;offered by other University departments</p>', '<p>Open to all&nbsp;countries</p>', '<p>The scholarship provides funding for tuition, college fees and a contribution towards living expenses covering both the Master&rsquo;s degree and the MBA year.</p>', '<p>Pershing Square Scholarships are awarded to individuals with the following attributes:</p><p>&bull; Academic achievement<br />&bull; Leadership potential, demonstrated through experience and motivation<br />&bull; Strong personal character, integrity and commitment<br />&bull; Intention to focus on addressing world-scale social challenges in your career, either in an existing organisation or through development of a new enterprise<br />&bull; Ability to envision how to achieve scalable and sustainable solutions to these challenges<br />&bull; Articulated vision on how the Oxford 1+1 MBA will allow you to fulfil your objectives</p><p><strong>You must meet the entry requirements for both the Oxford MBA and your chosen Master&rsquo;s programme.</strong></p>', '<p>To be considered for the scholarship, you must apply to the 1+1 MBA by&nbsp;<strong>March 2018.</strong>&nbsp;Please note that some partnering Masters close their applications in January 2018 and others in March 2018.</p><p>In addition to the Master and MBA applications, you must submit an essay of no more than 500 words addressing this question&nbsp;<em>&lsquo;How do you intend to change the world? What does this tell us about you as a person?&rsquo;</em></p><p>It is important to read the&nbsp;how to apply page&nbsp;and visit the official website (link found below) to access the application form and for detailed information on how to apply for this scholarship.</p>', 'http://www.sbs.ox.ac.uk/programmes/degrees/1plus1/pershing-square-scholarship', '5 per year'),
(2, 'Humber International Entrance Scholarships', 38, 'Humber College In Toronto, Canada', 'Undergraduate / Bachelors Degree', 'Sept 2017/Jan 2018', '19 May/29 Sept 2017 (annual)', '<p>Humber offers full and partial renewable&nbsp;tuition scholarships for NEW international undergraduate students beginning classes in September 2017 and January 2018.</p>', '<p>Elibible&nbsp;undergraduate programmes&nbsp;offered at the&nbsp;College</p>', '<p>International Students</p>', '<p>Two full tuition scholarships and one&nbsp;$5,000 scholarship are available in September 2017 while one full tuition scholarship and one $5,000 scholarship are available in January 2018.&nbsp;The scholarships will be applied toward the successful students&rsquo; tuition fees.</p><p>The scholarships are renewable but the student must maintain a minimum average of 75% in order to be&nbsp;eligible for renewal.</p>', '<p>Applications will be considered based on academics, community involvement, referee/reference letters and statement of interest.</p>', '<p><strong>You must first apply for admissions before you can apply for the scholarship.</strong>&nbsp;The scholarship application form will&nbsp;be included in your acceptance package. Deadline is&nbsp;<strong>19 May 2017</strong>&nbsp;for the September&nbsp;2017&nbsp;intake or&nbsp;<strong>29 September 2017</strong>&nbsp;for January 2018.</p><p>It is important to visit the official website (link found below) for detailed information on how to apply for this scholarship.</p>', 'http://international.humber.ca/student-services/managing-your-finances/scholarships-awards.html', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`admin_email`);

--
-- Indexes for table `applicants_for_job`
--
ALTER TABLE `applicants_for_job`
  ADD PRIMARY KEY (`afj_id`),
  ADD KEY `applicants_for_job` (`job_id`),
  ADD KEY `jobseeker_id` (`jobseeker_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `login_email` (`login_email`),
  ADD KEY `company_type` (`company_type_id`);

--
-- Indexes for table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`company_type_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `degree_level_id`
--
ALTER TABLE `degree_level_id`
  ADD PRIMARY KEY (`degree_level_id`);

--
-- Indexes for table `jobseekers_experience`
--
ALTER TABLE `jobseekers_experience`
  ADD PRIMARY KEY (`je_id`),
  ADD KEY `category` (`category_id`),
  ADD KEY `jobtype` (`job_type_id`),
  ADD KEY `experience` (`jobseeker_id`);

--
-- Indexes for table `jobseekers_qualification`
--
ALTER TABLE `jobseekers_qualification`
  ADD PRIMARY KEY (`jq_id`),
  ADD KEY `qualification` (`jobseeker_id`);

--
-- Indexes for table `jobseeker_main`
--
ALTER TABLE `jobseeker_main`
  ADD PRIMARY KEY (`jobseeker_id`),
  ADD UNIQUE KEY `login_email` (`login_email`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `job_type` (`job_type_id`),
  ADD KEY `job_city` (`city_id`),
  ADD KEY `job_category` (`category_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_email`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`sch_id`),
  ADD KEY `country` (`country_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants_for_job`
--
ALTER TABLE `applicants_for_job`
  ADD CONSTRAINT `applicants_for_job` FOREIGN KEY (`job_id`) REFERENCES `job_details` (`job_id`),
  ADD CONSTRAINT `jobseeker_id` FOREIGN KEY (`jobseeker_id`) REFERENCES `jobseeker_main` (`jobseeker_id`);

--
-- Constraints for table `company_details`
--
ALTER TABLE `company_details`
  ADD CONSTRAINT `company_type` FOREIGN KEY (`company_type_id`) REFERENCES `company_type` (`company_type_id`),
  ADD CONSTRAINT `login_email` FOREIGN KEY (`login_email`) REFERENCES `login_details` (`login_email`);

--
-- Constraints for table `jobseekers_experience`
--
ALTER TABLE `jobseekers_experience`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `job_category` (`category_id`),
  ADD CONSTRAINT `experience` FOREIGN KEY (`jobseeker_id`) REFERENCES `jobseeker_main` (`jobseeker_id`),
  ADD CONSTRAINT `jobtype` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`job_type_id`);

--
-- Constraints for table `jobseekers_qualification`
--
ALTER TABLE `jobseekers_qualification`
  ADD CONSTRAINT `qualification` FOREIGN KEY (`jobseeker_id`) REFERENCES `jobseeker_main` (`jobseeker_id`);

--
-- Constraints for table `jobseeker_main`
--
ALTER TABLE `jobseeker_main`
  ADD CONSTRAINT `loginemail` FOREIGN KEY (`login_email`) REFERENCES `login_details` (`login_email`);

--
-- Constraints for table `job_details`
--
ALTER TABLE `job_details`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`company_id`),
  ADD CONSTRAINT `job_category` FOREIGN KEY (`category_id`) REFERENCES `job_category` (`category_id`),
  ADD CONSTRAINT `job_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `job_type` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`job_type_id`);

--
-- Constraints for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
