-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.17 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table juke01db.feedback
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `fbId` int(11) NOT NULL AUTO_INCREMENT,
  `fbName` text NOT NULL,
  `fbEmail` text NOT NULL,
  `fbComment` longtext NOT NULL,
  PRIMARY KEY (`fbId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table juke01db.feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table juke01db.quizanswers
DROP TABLE IF EXISTS `quizanswers`;
CREATE TABLE IF NOT EXISTS `quizanswers` (
  `quizAnswersId` int(11) NOT NULL AUTO_INCREMENT,
  `quizAnswer` text NOT NULL COMMENT 'Actual words for the possible answer.',
  `quizAnswerCorrectFlag` char(1) NOT NULL DEFAULT 'N',
  `quizQuestionsId` int(11) DEFAULT NULL,
  PRIMARY KEY (`quizAnswersId`),
  KEY `FK__quizquestions` (`quizQuestionsId`),
  CONSTRAINT `FK__quizquestions` FOREIGN KEY (`quizQuestionsId`) REFERENCES `quizquestions` (`quizQuestionsId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='Possbile answers for questions for the topics. Indicate one of them to be the right answer.';

-- Dumping data for table juke01db.quizanswers: ~40 rows (approximately)
/*!40000 ALTER TABLE `quizanswers` DISABLE KEYS */;
INSERT INTO `quizanswers` (`quizAnswersId`, `quizAnswer`, `quizAnswerCorrectFlag`, `quizQuestionsId`) VALUES
	(1, 'Starter Motor', 'Y', 1),
	(2, 'Ignition Coil', 'N', 1),
	(3, 'Piston Primer', 'N', 1),
	(4, 'Electronic Crank', 'N', 1),
	(5, 'Injecting Fuel And Igniting It', 'N', 2),
	(6, 'Releasing The Pistons From A Locked State', 'N', 2),
	(7, 'Electronically Cranking The Crankshaft', 'Y', 2),
	(8, 'Electronically Turning The Drivetrain', 'N', 2),
	(9, 'Sir Frank Whittle & Dr Rudol von Stroheim', 'N', 3),
	(10, 'Dr Hans von Ohain & Jacob White', 'N', 3),
	(11, 'Nikolaus Otto & Etienne Lenoir', 'Y', 3),
	(12, 'Nikolaj Polterik & Jeremy Wyner', 'N', 3),
	(13, 'Induction, Force, Spark, Release', 'N', 4),
	(14, 'Intake, Compression, Power, Exhaust', 'Y', 4),
	(15, 'Oxygen, Pressure, Detonation, Decompression', 'N', 4),
	(16, 'Breathe, Squeeze, Bang, Expel', 'N', 4),
	(17, 'Horsepower & Pound Foot', 'N', 5),
	(18, 'Pull & Push', 'N', 5),
	(19, 'Watts & Acceleration', 'N', 5),
	(20, 'Kilowatts &  Newton Metres', 'Y', 5),
	(21, 'Manual', 'Y', 6),
	(22, 'DCT (Double Clutch Transmission)', 'N', 6),
	(23, 'Torque Converter Automatic', 'N', 6),
	(24, 'CVT (Continously Variable Transmission)', 'N', 6),
	(25, 'Not Using The Clutch Pedal', 'Y', 7),
	(26, 'Revving The Engine', 'N', 7),
	(27, 'Coasting', 'N', 7),
	(28, 'Modifying Factory Gear Ratios', 'N', 7),
	(29, 'Coilovers & Air Suspension', 'Y', 8),
	(30, 'Spring & Damper Suspensions', 'N', 8),
	(31, 'Hydroalkaline Aluminium & Nitrocarbonate Iron Suspensions', 'N', 8),
	(32, 'Carbon Composite & Mercury Drive Suspensions', 'N', 8),
	(33, 'Twin Screw & Centrifugal', 'Y', 9),
	(34, 'Blower & Sucker', 'N', 9),
	(35, 'Belt & Train', 'N', 9),
	(36, 'Twin Intake & Turbine', 'N', 9),
	(37, 'Superchargers Are Spooled By The Cam/Timing Belt & Turbos Are Spooled By Exhaust Gases', 'Y', 10),
	(38, 'Superchargers Are Spooled By Exhaust Gases & Turbos Are Spooled By The Cam/Timing Belt', 'N', 10),
	(39, 'Superchargers Are Spooled By Wheel-Spin & Turbos Are Spooled By Oil Pressure', 'N', 10),
	(40, 'Superchargers Are Spooled By Oil Pressure & Turbos Are Spooled By Wheel-Spin', 'N', 10);
/*!40000 ALTER TABLE `quizanswers` ENABLE KEYS */;

-- Dumping structure for table juke01db.quizquestions
DROP TABLE IF EXISTS `quizquestions`;
CREATE TABLE IF NOT EXISTS `quizquestions` (
  `quizQuestionsId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `quizQuestion` text NOT NULL COMMENT 'Questions to be asked',
  `quizTopicId` int(11) DEFAULT NULL COMMENT 'Foreign key to quiz topics table.',
  PRIMARY KEY (`quizQuestionsId`),
  KEY `FK_quizQuestions_quiztopic` (`quizTopicId`),
  CONSTRAINT `FK_quizQuestions_quiztopic` FOREIGN KEY (`quizTopicId`) REFERENCES `quiztopic` (`quizTopicId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Questions for the topic.';

-- Dumping data for table juke01db.quizquestions: ~10 rows (approximately)
/*!40000 ALTER TABLE `quizquestions` DISABLE KEYS */;
INSERT INTO `quizquestions` (`quizQuestionsId`, `quizQuestion`, `quizTopicId`) VALUES
	(1, 'What starts a car\'s engine?', 1),
	(2, 'How does (question 1) start the car?', 1),
	(3, 'Who invented the first ICE (internal combustion engine)?', 1),
	(4, 'What is the 4 stoke sequence in an ICE?', 1),
	(5, 'What are the two metric mesaurements for power and torque?', 1),
	(6, 'Which transmission requires a clutch pedal?', 1),
	(7, 'You know what really grinds my gears?', 1),
	(8, 'What are the two main types of suspension?', 1),
	(9, 'What are the two main kinds of superchargers?', 1),
	(10, 'What is the difference between a supercharger and turbosupercharger?', 1);
/*!40000 ALTER TABLE `quizquestions` ENABLE KEYS */;

-- Dumping structure for table juke01db.quiztopic
DROP TABLE IF EXISTS `quiztopic`;
CREATE TABLE IF NOT EXISTS `quiztopic` (
  `quizTopicId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for quiz topics.',
  `quizTopicName` text NOT NULL COMMENT 'Topic for the quizzes.',
  `quizActiveFlag` char(1) NOT NULL COMMENT 'Indicates if the quiz is active.',
  PRIMARY KEY (`quizTopicId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Topic for quiz';

-- Dumping data for table juke01db.quiztopic: ~1 rows (approximately)
/*!40000 ALTER TABLE `quiztopic` DISABLE KEYS */;
INSERT INTO `quiztopic` (`quizTopicId`, `quizTopicName`, `quizActiveFlag`) VALUES
	(1, 'Automotive Engineering', 'Y');
/*!40000 ALTER TABLE `quiztopic` ENABLE KEYS */;

-- Dumping structure for table juke01db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(255) NOT NULL AUTO_INCREMENT,
  `userName` text NOT NULL,
  `passWord` text NOT NULL,
  `isAdmin` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table juke01db.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`userID`, `userName`, `passWord`, `isAdmin`) VALUES
	(1, 'user', 'password', 'N'),
	(2, 'admin', 'admin', 'Y'),
	(3, 'jlai', 'jlai', 'N'),
	(4, 'li10', 'li10', 'N'),
	(5, 'mina01', 'mina01', 'N'),
	(7, 'juke01', 'Pinkycows15.', 'N'),
	(8, 'hard04', 'dio', 'N');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
