-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2024 at 10:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projecttdw`
--
CREATE DATABASE IF NOT EXISTS `projecttdw` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projecttdw`;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `BrandID` int(11) NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(100) DEFAULT NULL,
  `CountryOfOrigin` varchar(50) DEFAULT NULL,
  `Siegesocial` varchar(100) DEFAULT NULL,
  `YearOfEstablishment` int(11) DEFAULT NULL,
  `Logo` int(11) DEFAULT NULL,
  PRIMARY KEY (`BrandID`),
  UNIQUE KEY `BrandName` (`BrandName`),
  KEY `Logo` (`Logo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BrandName`, `CountryOfOrigin`, `Siegesocial`, `YearOfEstablishment`, `Logo`) VALUES
(1, 'Toyota', 'Japan', 'Tokyo', 1937, 7),
(2, 'Ford', 'United States', 'Dearborn', 1903, 8),
(3, 'Dodge', 'United States', 'Auburn Hills', 1914, 9),
(4, 'Chevrolet', 'United States', 'Detroit', 1911, 10);

-- --------------------------------------------------------

--
-- Table structure for table `comparison`
--

DROP TABLE IF EXISTS `comparison`;
CREATE TABLE IF NOT EXISTS `comparison` (
  `ComparisonID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `Vehicle1ID` int(11) DEFAULT NULL,
  `Vehicle2ID` int(11) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ComparisonCount` int(11) DEFAULT NULL,
  PRIMARY KEY (`ComparisonID`),
  KEY `UserID` (`UserID`),
  KEY `Vehicle1ID` (`Vehicle1ID`),
  KEY `Vehicle2ID` (`Vehicle2ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comparison`
--

INSERT INTO `comparison` (`ComparisonID`, `UserID`, `Vehicle1ID`, `Vehicle2ID`, `Date`, `ComparisonCount`) VALUES
(1, 1, 1, 2, '2023-12-09 23:00:00', 13),
(2, 2, 3, 4, '2023-12-04 23:00:00', 3),
(3, NULL, 1, 3, '2023-12-28 22:30:44', 6),
(4, NULL, 2, 3, '2023-12-28 22:30:44', 4),
(5, NULL, 1, 4, '2023-12-28 22:46:49', 2),
(6, NULL, 2, 4, '2023-12-28 22:46:49', 3),
(7, NULL, 1, 1, '2024-01-12 22:50:46', 14),
(11, NULL, 1, 13, '2024-01-13 09:36:22', 1),
(12, NULL, 1, 16, '2024-01-13 09:36:22', 1),
(13, NULL, 1, 17, '2024-01-13 09:36:22', 1),
(14, NULL, 13, 16, '2024-01-13 09:36:22', 1),
(15, NULL, 13, 17, '2024-01-13 09:36:22', 1),
(16, NULL, 16, 17, '2024-01-13 09:36:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `LOGO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ContactID`),
  KEY `fk_img_cont` (`LOGO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `Type`, `URL`, `LOGO`) VALUES
(1, 'Facebook', 'www.facebook.com', 1),
(2, 'Instagram', 'www.instagram.com', 2),
(3, 'LinkedIn', 'www.linkedin.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `engine`
--

DROP TABLE IF EXISTS `engine`;
CREATE TABLE IF NOT EXISTS `engine` (
  `EngineID` int(11) NOT NULL AUTO_INCREMENT,
  `EngineName` varchar(20) DEFAULT NULL,
  `EngineType` varchar(20) DEFAULT NULL,
  `Power` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`EngineID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engine`
--

INSERT INTO `engine` (`EngineID`, `EngineName`, `EngineType`, `Power`) VALUES
(1, 'V6', 'Gasoline', '300 hp'),
(2, 'V8', 'Gasoline', '450 hp'),
(3, 'V6', 'Gasoline', '310 hp'),
(4, 'V8', 'Gasoline', '455 hp'),
(10, 'Inline-4', 'Gasoline', '180 hp'),
(11, 'Hybrid', 'Hybrid', '219 hp'),
(12, 'V6', 'Gasoline', '290 hp'),
(13, 'Inline-4', 'Turbocharged', '250 hp'),
(14, 'V8', 'Supercharged', '710 hp'),
(16, 'Inline-4', 'Turbocharged', '250 hp'),
(17, 'Inline-4', 'Turbocharged', '190 hp'),
(18, 'V8', 'HEMI', '375 hp');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `UserID` int(11) NOT NULL,
  `VehicleID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`,`VehicleID`),
  KEY `fk_veh` (`VehicleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`UserID`, `VehicleID`) VALUES
(1, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `guidesetting`
--

DROP TABLE IF EXISTS `guidesetting`;
CREATE TABLE IF NOT EXISTS `guidesetting` (
  `GuideSettingID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `ImageID` int(11) DEFAULT NULL,
  `VehicleID` int(11) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`GuideSettingID`),
  KEY `fk_guideim` (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guidesetting`
--

INSERT INTO `guidesetting` (`GuideSettingID`, `Title`, `Description`, `ImageID`, `VehicleID`, `Date`) VALUES
(3, 'Choosing the Perfect Family Car', 'When it comes to selecting a family car, various factors come into play. Consider your family size, safety features, fuel efficiency, and cargo space. Popular choices include SUVs and minivans, offering ample space for passengers and luggage. Pay attention to safety ratings and advanced safety technologies to ensure your familys well-being on the road.', 86, NULL, '2024-01-13 10:24:55'),
(4, 'Navigating the Electric Vehicle Market', 'With the rise of electric vehicles (EVs), choosing the right one can be overwhelming. Evaluate your daily commute, charging infrastructure, and budget. Compare EV models based on range, charging speed, and available incentives. Stay informed about advancements in battery technology and charging infrastructure to make an informed decision.', 87, NULL, '2024-01-13 10:24:55'),
(5, 'Off-Roading Adventures: Choosing the Right Vehicle', 'For enthusiasts seeking off-road adventures, selecting the right vehicle is crucial. Evaluate off-road capabilities, ground clearance, and durability. Popular choices include SUVs and trucks with 4x4 capabilities. Consider features like skid plates, off-road tires, and suspension systems to conquer challenging terrains.', 88, NULL, '2024-01-13 10:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `ImagePath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ImageID`, `ImagePath`) VALUES
(1, 'facebook.png'),
(2, 'instagram.png'),
(3, 'linkedin.png'),
(4, 'slide1.jpg'),
(5, 'slide2.jpg'),
(6, 'slide3.jpg'),
(7, 'toyota.png'),
(8, 'ford.png'),
(9, 'dodge.png'),
(10, 'Chevrolet.png'),
(11, 'Toyota_Camry_XLE.png'),
(12, 'Ford_Mustang_GT.png'),
(13, 'Dodge_Charger_SXT.png'),
(14, 'Chevrolet_Camaro_SS.png'),
(15, 'news1.jpg'),
(63, 'Toyota_Corolla_SE.png'),
(64, 'Toyota_RAV4_SE.png'),
(65, 'Ford_Explorer_Limited.png'),
(66, 'Ford_Escape_SE.png'),
(67, 'Dodge_Durango_SRT_Hellcat.png'),
(69, 'Chevrolet_Malibu_Premier.png'),
(70, 'Chevrolet_Equino_xLT.png'),
(71, 'Challenger_RT.png'),
(72, 'news2.jpg'),
(73, 'news3.jpg'),
(74, 'news4.jpg'),
(75, 'news5.jpg'),
(76, 'news6.jpg'),
(77, 'news7.jpg'),
(78, 'news8.jpg'),
(79, 'news9.jpg'),
(80, 'news10.jpg'),
(81, 'news11.jpg'),
(82, 'news12.jpg'),
(83, 'news13.jpg'),
(84, 'news14.jpg'),
(85, 'news15.jpg'),
(86, 'guide1.jpg'),
(87, 'guide2.jpg'),
(88, 'guide3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `ModelID` int(11) NOT NULL AUTO_INCREMENT,
  `ModelName` varchar(50) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `ModelYear` int(11) DEFAULT NULL,
  PRIMARY KEY (`ModelID`),
  KEY `fk_brand` (`BrandID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`ModelID`, `ModelName`, `BrandID`, `ModelYear`) VALUES
(1, 'Camry', 1, 2022),
(2, 'Mustang', 2, 2021),
(3, 'Charger', 3, 2023),
(4, 'Camaro', 4, 2022),
(7, 'Corolla', 1, 2023),
(8, 'RAV4', 1, 2021),
(9, 'Explorer', 2, 2023),
(10, 'Escape', 2, 2019),
(11, 'Durango', 3, 2023),
(13, 'Malibu', 4, 2020),
(14, 'Equinox', 4, 2020),
(15, 'Challenger', 3, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `NewsID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NewsID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `Title`, `Content`, `Date`) VALUES
(1, 'Latest Car Models Released', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi vitae a ea quia voluptatum atque neque eveniet architecto perspiciatis asperiores assumenda, magnam iure soluta iusto distinctio odit dolorum! Voluptatum, repellat.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa iusto molestiae sint quibusdam repellat iure! Qui ut provident alias harum voluptatibus voluptatum rerum praesentium voluptates sed aliquam, molestiae cum ullam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas accusamus nemo alias magni molestiae nesciunt nihil exercitationem quia ducimus veniam dolorum iure, itaque quod facere excepturi odit quasi dicta qui. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, laudantium qui possimus, rem soluta sequi neque accusamus aspernatur nisi cupiditate alias exercitationem nobis? Dolorum enim explicabo consequuntur iusto, sequi deleniti. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, optio facilis maxime, exercitationem est nostrum quia placeat labore officia, hic ipsum modi blanditiis reprehenderit dolorum! Voluptate odio itaque laboriosam tenetur. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia eius doloribus laboriosam aperiam eligendi, amet optio culpa eos impedit facere ducimus repellat eveniet molestias a numquam consequuntur, omnis libero doloremque.', '2022-01-31 23:00:00'),
(2, 'Safety Features Comparison', 'Comparing safety features across popular brands.', '2022-02-14 23:00:00'),
(4, 'Safety Features Comparison', 'Comparing safety features across popular brands.', '2023-12-14 23:00:00'),
(5, 'Exciting New Model Released', 'A highly anticipated model has been released with cutting-edge features and performance.', '2023-12-15 19:39:05'),
(6, 'Green Revolution in Automotive Industry', 'The automotive industry takes a step towards sustainability with the introduction of eco-friendly vehicles.', '2023-12-15 19:39:05'),
(7, 'Record-Breaking Speed Achieved', 'A new sports car breaks records, achieving incredible speed and performance on the racetrack.', '2023-12-15 19:39:05'),
(8, 'Innovations in Electric Vehicle Technology', 'Discover the latest advancements in electric vehicle technology that promise a brighter and greener future.', '2023-12-15 19:39:05'),
(9, 'Classic Cars Showcase Event', 'Join us at the upcoming classic car showcase event, where vintage beauties will be on display for enthusiasts.', '2023-12-15 19:39:05'),
(10, 'Safety First: New Vehicle Safety Standards', 'Learn about the enhanced safety standards implemented in the latest vehicle models to protect drivers and passengers.', '2023-12-15 19:39:05'),
(11, 'Revolutionizing Autonomous Driving', 'Explore the advancements in autonomous driving technology, paving the way for a new era in transportation.', '2023-12-15 19:39:05'),
(12, 'Luxury Redefined in the Automotive World', 'Experience the epitome of luxury with the introduction of new high-end models boasting premium features.', '2023-12-15 19:39:05'),
(13, 'Rugged Off-Road Adventure Vehicles', 'Discover the thrill of off-road adventures with the release of rugged vehicles designed for extreme terrains.', '2023-12-15 19:39:05'),
(14, 'Futuristic Design Concepts Unveiled', 'Get a glimpse of the future with concept cars showcasing innovative and futuristic designs.', '2023-12-15 19:39:05'),
(15, 'The Rise of Electric SUVs', 'Electric SUVs gain popularity as automakers focus on creating sustainable and spacious electric vehicles.', '2023-12-15 19:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `newsimage`
--

DROP TABLE IF EXISTS `newsimage`;
CREATE TABLE IF NOT EXISTS `newsimage` (
  `NewsID` int(11) NOT NULL,
  `ImageID` int(11) NOT NULL,
  PRIMARY KEY (`NewsID`,`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsimage`
--

INSERT INTO `newsimage` (`NewsID`, `ImageID`) VALUES
(1, 15),
(2, 72),
(4, 73),
(5, 74),
(6, 75),
(7, 76),
(8, 77),
(9, 78),
(10, 79),
(11, 80),
(12, 81),
(13, 82),
(14, 83),
(15, 84);

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

DROP TABLE IF EXISTS `performance`;
CREATE TABLE IF NOT EXISTS `performance` (
  `PerformanceID` int(11) NOT NULL AUTO_INCREMENT,
  `Acceleration` varchar(20) DEFAULT NULL,
  `TopSpeed` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PerformanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`PerformanceID`, `Acceleration`, `TopSpeed`) VALUES
(1, '6.5s (0-100)', '210 km/h'),
(2, '4.0s (0-100)', '250 km/h'),
(3, '6.0s (0-100)', '200 km/h'),
(4, '4.2s (0-100)', '260 km/h'),
(7, '7.2s (0-100)', '200 km/h'),
(8, '8.1s (0-100)', '180 km/h'),
(9, '6.3s (0-100)', '220 km/h'),
(10, '7.8s (0-100)', '200 km/h'),
(11, '3.5s (0-100)', '290 km/h'),
(13, '7.5s (0-100)', '210 km/h'),
(14, '8.9s (0-100)', '200 km/h'),
(15, '5.1s (0-100)', '250 km/h');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `ReviewID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `VehicleID` int(11) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `Comment` text,
  `Rating` int(11) DEFAULT NULL,
  `Status` enum('Approved','Rejected','Pending') DEFAULT 'Pending',
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ReviewID`),
  KEY `UserID` (`UserID`),
  KEY `VehicleID` (`VehicleID`),
  KEY `BrandID` (`BrandID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `UserID`, `VehicleID`, `BrandID`, `Comment`, `Rating`, `Status`, `DATE`) VALUES
(3, 1, 1, NULL, 'This vehicle exceeded my expectations in every way. The performance is outstanding, and the sleek design is simply breathtaking. The interior is luxurious, and the advanced technology features make driving a joy. I highly recommend this car!', 5, 'Approved', '2023-12-22 15:07:07'),
(5, 2, 1, NULL, 'I have been driving this car for a few months now, and I am impressed with its fuel efficiency. The handling is smooth, and the safety features add an extra layer of confidence. The spacious interior is perfect for long drives. Overall, a great investment!', 4, 'Approved', '2023-12-22 15:07:07'),
(6, 1, 2, NULL, 'My experience with this vehicle has been mixed. While the exterior design is eye-catching, I ve encountered some issues with the transmission. The customer service was responsive, and the problem was fixed, but it was still an inconvenience. Hoping for better reliability in the future.', 3, 'Approved', '2023-12-22 15:07:07'),
(7, 2, 2, NULL, 'I recently purchased this car, and it has quickly become my favorite. The acceleration is impressive, and the handling is superb. The infotainment system is user-friendly, and the overall build quality is top-notch. Definitely worth the investment!', 5, 'Approved', '2023-12-22 15:07:07'),
(8, 2, 3, NULL, 'Unfortunately, I had a negative experience with this vehicle. The engine had a strange noise that persisted even after multiple visits to the service center. The car was eventually replaced, but it was a frustrating ordeal.Disappointed with the overall reliability.', 2, 'Approved', '2023-12-22 15:07:07'),
(12, 2, 1, NULL, 'I love the design of this vehicle. It\'s stylish and modern. The performance is outstanding, especially the acceleration. The safety features add an extra layer of confidence on the road.', 4, 'Approved', '2023-01-02 00:00:00'),
(14, 2, 1, NULL, 'Spacious interior with plenty of legroom. The cargo space is generous, making it ideal for family trips. The handling is responsive, and the ride is comfortable. Overall, a reliable and practical choice.', 5, 'Approved', '2023-01-04 00:00:00'),
(16, 2, 1, NULL, 'The technology in this vehicle is cutting-edge. The infotainment system is user-friendly, and the connectivity options are impressive. A joy to drive with advanced features at your fingertips.', 4, 'Approved', '2023-01-06 00:00:00'),
(17, 1, 1, NULL, 'Decent value for the money. It\'s not the flashiest car, but it gets the job done. Fuel economy is satisfactory, and maintenance costs are reasonable. A practical choice for daily commuting.', 3, 'Approved', '2023-01-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slideshowsetting`
--

DROP TABLE IF EXISTS `slideshowsetting`;
CREATE TABLE IF NOT EXISTS `slideshowsetting` (
  `SlideshowSettingID` int(11) NOT NULL AUTO_INCREMENT,
  `SlideshowImageURL` int(11) DEFAULT NULL,
  `SlideshowLinkURL` varchar(255) DEFAULT NULL,
  `Publicite` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`SlideshowSettingID`),
  KEY `SlideshowImageURL` (`SlideshowImageURL`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshowsetting`
--

INSERT INTO `slideshowsetting` (`SlideshowSettingID`, `SlideshowImageURL`, `SlideshowLinkURL`, `Publicite`) VALUES
(1, 4, 'https://example.com/link1', 1),
(2, 5, 'https://example.com/link2', 1),
(3, 6, 'https://example.com/link3', 0),
(4, 77, 'http://localhost/Project/news/detail/?id=8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `IsAuthenticated` tinyint(1) DEFAULT '1',
  `IsBlocked` tinyint(1) DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `username`, `FirstName`, `LastName`, `Gender`, `DateOfBirth`, `Email`, `Password`, `IsAuthenticated`, `IsBlocked`, `admin`) VALUES
(1, 'rami', 'Boukef', 'Ahmed Rami', 'Male', '2002-05-26', 'ka_boukef@esi.dz', '$2y$10$.m.9uNuUOL.vmL67cRZf6e/l9bGupT7fGt7TgAELQTC7LmNnEzziG', 1, 1, 0),
(2, 'ahmed', 'Boukef', 'Ahmed Rami', 'Male', '2002-05-26', 'ahmed@gmail.dz', '$2y$10$dwB2axCn/pIpHx1Ose7KKuYiNXAgLi7eG82Dd2zFk5eWpFA2kAm/C', 1, 0, 0),
(3, 'admin', 'admin', 'admin', 'Male', '2002-05-26', 'admin@gmail.dz', '$2y$10$FELZ.R3kZ6kspwsmMcttJu9z/oHZ0slHCW2OzPwbjA9Mt6xPHKGIy', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicleinfo`
--

DROP TABLE IF EXISTS `vehicleinfo`;
CREATE TABLE IF NOT EXISTS `vehicleinfo` (
  `VehicleID` int(11) NOT NULL AUTO_INCREMENT,
  `VehiculeName` varchar(50) DEFAULT NULL,
  `Note` int(11) DEFAULT NULL,
  `IndicativePrice` varchar(50) DEFAULT NULL,
  `ModelID` int(11) DEFAULT NULL,
  `Version` varchar(50) DEFAULT NULL,
  `Dimensions` varchar(50) DEFAULT NULL,
  `Capacity` varchar(20) DEFAULT NULL,
  `Consumption` varchar(20) DEFAULT NULL,
  `ImageID` int(11) DEFAULT NULL,
  `EngineID` int(11) DEFAULT NULL,
  `VitesseTYPE` enum('Automatic','Manual') DEFAULT NULL,
  `PerformanceID` int(11) DEFAULT NULL,
  PRIMARY KEY (`VehicleID`),
  KEY `ImageID` (`ImageID`),
  KEY `ModelID` (`ModelID`),
  KEY `EngineID` (`EngineID`),
  KEY `PerformanceID` (`PerformanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicleinfo`
--

INSERT INTO `vehicleinfo` (`VehicleID`, `VehiculeName`, `Note`, `IndicativePrice`, `ModelID`, `Version`, `Dimensions`, `Capacity`, `Consumption`, `ImageID`, `EngineID`, `VitesseTYPE`, `PerformanceID`) VALUES
(1, 'Toyota Camry XLE', 4, '3000000 DA', 1, 'XLE', '4.8776 x 1.8288 x 1.4224', '5 passengers', '7.5 L/100km', 11, 1, 'Automatic', 1),
(2, 'Ford Mustang GT', 5, '4500000 DA', 2, 'GT Premium', '4.7752 x 1.905 x 1.3716', '4 passengers', '9.4 L/100km', 12, 2, 'Manual', 2),
(3, 'Dodge Charger SXT', 4, '3200000 DA', 3, 'SXT', '5.08 x 1.905 x 1.4732', '5 passengers', '8.4 L/100km', 13, 3, 'Automatic', 3),
(4, 'Chevrolet Camaro SS', 4, '4000000 DA', 4, 'SS', '4.7752 x 1.905 x 1.3462', '4 passengers', '12.4 L/100km', 14, 4, 'Manual', 4),
(10, 'Toyota Corolla SE', NULL, '2,800,000 DA', 7, 'SE', '4.640 x 1.780 x 1.435', '5 passengers', '6.8 L/100km', 63, 10, 'Automatic', 7),
(11, 'Toyota RAV4 Hybrid Limited', NULL, '3,500,000 DA', 8, 'Hybrid Limited', '4.600 x 1.855 x 1.710', '5 passengers', '5.5 L/100km', 64, 11, 'Automatic', 8),
(12, 'Ford Explorer Limited', NULL, '4,200,000 DA', 9, 'Limited', '5.047 x 2.004 x 1.778', '7 passengers', '8.9 L/100km', 65, 12, 'Automatic', 9),
(13, 'Ford Escape SE', NULL, '2,900,000 DA', 10, 'SE', '4.584 x 1.852 x 1.686', '5 passengers', '7.0 L/100km', 66, 13, 'Automatic', 10),
(14, 'Dodge Durango SRT Hellcat', NULL, '6,500,000 DA', 11, 'SRT Hellcat', '5.151 x 2.073 x 1.804', '6 passengers', '14.7 L/100km', 67, 14, 'Automatic', 11),
(16, 'Chevrolet Malibu Premier', NULL, '3,200,000 DA', 13, 'Premier', '4.923 x 1.854 x 1.461', '5 passengers', '7.5 L/100km', 69, 16, 'Automatic', 13),
(17, 'Chevrolet Equinox LT', NULL, '2,800,000 DA', 14, 'LT', '4.651 x 1.843 x 1.661', '5 passengers', '8.2 L/100km', 70, 17, 'Automatic', 14),
(18, 'Dodge Challenger R/T', NULL, '4,000,000 DA', 15, 'R/T', '5.023 x 1.923 x 1.416', '5 passengers', '12.4 L/100km', 71, 18, 'Automatic', 15);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `fk_img` FOREIGN KEY (`Logo`) REFERENCES `image` (`ImageID`) ON DELETE CASCADE;

--
-- Constraints for table `comparison`
--
ALTER TABLE `comparison`
  ADD CONSTRAINT `fk_comp_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_veh1` FOREIGN KEY (`Vehicle1ID`) REFERENCES `vehicleinfo` (`VehicleID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_veh2` FOREIGN KEY (`Vehicle2ID`) REFERENCES `vehicleinfo` (`VehicleID`) ON DELETE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_veh` FOREIGN KEY (`VehicleID`) REFERENCES `vehicleinfo` (`VehicleID`) ON DELETE CASCADE;

--
-- Constraints for table `guidesetting`
--
ALTER TABLE `guidesetting`
  ADD CONSTRAINT `fk_guideim` FOREIGN KEY (`ImageID`) REFERENCES `image` (`ImageID`) ON DELETE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_brand` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_review_veh` FOREIGN KEY (`VehicleID`) REFERENCES `vehicleinfo` (`VehicleID`) ON DELETE CASCADE;

--
-- Constraints for table `slideshowsetting`
--
ALTER TABLE `slideshowsetting`
  ADD CONSTRAINT `fk_imgS` FOREIGN KEY (`SlideshowImageURL`) REFERENCES `image` (`ImageID`) ON DELETE CASCADE;

--
-- Constraints for table `vehicleinfo`
--
ALTER TABLE `vehicleinfo`
  ADD CONSTRAINT `fk_model` FOREIGN KEY (`ModelID`) REFERENCES `model` (`ModelID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
