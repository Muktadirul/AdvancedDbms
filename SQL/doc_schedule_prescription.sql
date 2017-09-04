-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 10:03 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc_schedule_prescription`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `available` (IN `fn` VARCHAR(255), IN `ln` VARCHAR(255), IN `eid` VARCHAR(255), OUT `c_t` INT)  BEGIN
	SELECT COUNT(*) into c_t FROM users WHERE users.firstname= fn AND users.lastname= ln AND users.eid = eid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetWP` ()  BEGIN
  SELECT * FROM district ORDER BY district ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_VAL` (OUT `id` VARCHAR(255), OUT `fn` VARCHAR(255), OUT `ln` VARCHAR(255), IN `eid1` VARCHAR(255))  BEGIN
	SELECT 
    users.id INTO id
    FROM users 
    WHERE eid = eid1;
    
    SELECT 
    users.firstname INTO fn
    FROM users
    WHERE eid = eid1;
    
    SELECT 
    users.lastname INTO ln 
    FROM users 
    WHERE eid = eid1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN` (IN `mail` VARCHAR(255), IN `pass` VARCHAR(255), OUT `val` INT)  NO SQL
BEGIN
	SELECT COUNT(*) INTO VAL FROM users WHERE users.eid=mail and users.pwd=pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MailReady` ()  MODIFIES SQL DATA
BEGIN
DECLARE em varchar(255);
DECLARE tp varchar(255);
DECLARE msg text;
DECLARE cnt int;
DECLARE cnt1 int;
DECLARE nfid int;
DEClARE c1 CURSOR 
FOR SELECT
notifierlist.Nfid,
notifierlist.mail,
notifierlist.topicname,
notifierlist.message FROM notifierlist
WHERE notifierlist.time < NOW();
SELECT COUNT(*) INTO cnt FROM notifierlist WHERE notifierlist.time < NOW();
OPEN c1;
SELECT 0 INTO cnt1;
WHILE cnt1 < cnt DO
    FETCH c1 INTO nfid,em,tp,msg;
    INSERT INTO sendall VALUES (NULL,em,tp,msg);
    DELETE FROM notifierlist WHERE notifierlist.Nfid=nfid;
END WHILE;
CLOSE c1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NotifierAdd` (IN `id` INT, IN `topic` VARCHAR(255), IN `msg` VARCHAR(255), IN `time_t` TIMESTAMP, OUT `res` INT)  MODIFIES SQL DATA
BEGIN
	SELECT eid INTO @email FROM users WHERE	
    id=id;
    SELECT COUNT(*) INTO @c1 FROM notifierlist;

	INSERT INTO `notifierlist`(`Nfid`, `Uid`, `mail`,`topicname`, `message`, `time`) VALUES(null,id,@email,topic,msg,time_t);

	SELECT COUNT(*) INTO @c2 FROM notifierlist;
	IF @c1 < @c2 THEN
		SET res=1;
	ELSE
		SET res=1;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NotifierDelete` (IN `id` INT, OUT `res` INT)  NO SQL
BEGIN
DELETE FROM notifierlist
WHERE notifierlist.Nfid=id;
SELECT ROW_COUNT() INTO res;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NotifierSelect` (IN `id` INT)  NO SQL
BEGIN
	SELECT * FROM notifierlist WHERE notifierlist.Nfid=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NotifierUpdate` (IN `id` INT, IN `topic` VARCHAR(255), IN `msg` TEXT, IN `time_t` TIMESTAMP, OUT `result` INT)  MODIFIES SQL DATA
BEGIN
UPDATE notifierlist
SET notifierlist.topicname = topic, 
notifierlist.message = msg,
notifierlist.time = time_t
WHERE notifierlist.Nfid=id;
SELECT ROW_COUNT() INTO result;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NotifierView` (IN `id` INT)  NO SQL
BEGIN
	SELECT * FROM notifierlist WHERE notifierlist.Uid=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGUSERDATAINSERT` (IN `fn` VARCHAR(255), IN `ln` VARCHAR(255), IN `eid` VARCHAR(255), IN `pwd` VARCHAR(255), IN `img` VARCHAR(255), IN `cer` VARCHAR(255), IN `wp` INT, IN `nid` VARCHAR(255), OUT `X` INT)  NO SQL
BEGIN
	SELECT COUNT(*) INTO @p1 FROM users;
	INSERT INTO `users`
    (`id`, `firstname`, `lastname`,`eid`, 
     `pwd`, `img`, `cer`, `ver`, `wp`, `nid`)
     VALUES(NULL,fn,ln,eid,pwd,img,cer,0,wp,nid);
     SELECT COUNT(*) INTO @p2 FROM users;
     IF @p1 < @p2 THEN
    	SET X =1;
     ELSE
    	SET X =0;
     END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district` varchar(30) NOT NULL,
  `division` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`, `division`) VALUES
(1, 'Barguna', 'Barisal'),
(2, 'Barisal', 'Barisal'),
(3, 'Bhola', 'Barisal'),
(4, 'Jhalokati', 'Barisal'),
(5, 'Patuakhali', 'Barisal'),
(6, 'Pirojpur', 'Barisal'),
(7, 'Bandarban', 'Chittagong'),
(8, 'Brahmanbaria', 'Chittagong'),
(9, 'Chandpur', 'Chittagong'),
(10, 'Chittagong', 'Chittagong'),
(11, 'Comilla', 'Chittagong'),
(12, 'Cox\'s Bazar', 'Chittagong'),
(13, 'Feni', 'Chittagong'),
(14, 'Khagrachhari', 'Chittagong'),
(15, 'Lakshmipur', 'Chittagong'),
(16, 'Noakhali', 'Chittagong'),
(17, 'Rangamati', 'Chittagong'),
(18, 'Dhaka', 'Dhaka'),
(19, 'Faridpur', 'Dhaka'),
(20, 'Gazipur', 'Dhaka'),
(21, 'Goaplganje', 'Dhaka'),
(22, 'Jamalpur', 'Dhaka'),
(23, 'Kisorgonj', 'Dhaka'),
(24, 'Madaripur', 'Dhaka'),
(25, 'Manikganj', 'Dhaka'),
(26, 'Munsiganj', 'Dhaka'),
(27, 'Mymensingh', 'Dhaka'),
(28, 'Narayanganj', 'Dhaka'),
(29, 'Narsingdi', 'Dhaka'),
(30, 'Netrakona', 'Dhaka'),
(31, 'Rajbari', 'Dhaka'),
(32, 'Shariatpur', 'Dhaka'),
(33, 'Tangail', 'Dhaka'),
(34, 'Sherpur', 'Dhaka'),
(35, 'Bagerhat', 'Khulna'),
(36, 'Chuadanga', 'Khulna'),
(37, 'Jessore', 'Khulna'),
(38, 'Jhenaidah', 'Khulna'),
(39, 'Khulna', 'Khulna'),
(40, 'Kushtia', 'Khulna'),
(41, 'Magura', 'Khulna'),
(42, 'Meherpur', 'Khulna'),
(43, 'Narail', 'Khulna'),
(44, 'Satkhira', 'Khulna'),
(45, 'Sylhet', 'Sylhet'),
(46, 'Sunamganj', 'Sylhet'),
(47, 'Moulvibazar', 'Sylhet'),
(48, 'Habiganj', 'Sylhet'),
(49, 'Dinajpur', 'Rangpur'),
(50, 'Gaibandha', 'Rangpur'),
(51, 'Kurigram', 'Rangpur'),
(52, 'Lalmonirhat', 'Rangpur'),
(53, 'Nilphamari', 'Rangpur'),
(54, 'Panchagarh', 'Rangpur'),
(55, 'Rangpur', 'Rangpur'),
(56, 'Thakurgaon', 'Rangpur'),
(57, 'Bogra', 'Rajshahi'),
(58, 'Joypurhat', 'Rajshahi'),
(59, 'Naogaon', 'Rajshahi'),
(60, 'Natore', 'Rajshahi'),
(61, 'Nawabganj', 'Rajshahi'),
(62, 'Pabna', 'Rajshahi'),
(63, 'Rajshahi', 'Rajshahi'),
(64, 'Sirajganj', 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `notifierlist`
--

CREATE TABLE `notifierlist` (
  `Nfid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `topicname` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifierlist`
--

INSERT INTO `notifierlist` (`Nfid`, `Uid`, `mail`, `topicname`, `message`, `time`) VALUES
(14, 48, 'raiancse@gmail.com', 'Update Test', 'Done', '2017-10-21 19:50:20'),
(16, 48, 'raiancse@gmail.com', 'Time Stamp', 'FInal Xam', '2017-09-11 20:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `schedulelist`
--

CREATE TABLE `schedulelist` (
  `scid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `Start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `Day` date NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sendall`
--

CREATE TABLE `sendall` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `topics` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sendall`
--

INSERT INTO `sendall` (`id`, `mail`, `topics`, `msg`) VALUES
(1, 'raiancse@gmail.com', 'Update Test', 'Done'),
(2, 'raiancse@gmail.com', 'Time Stamp', 'FInal Xam'),
(3, 'raiancse@gmail.com', 'Update Test', 'Done'),
(4, 'raiancse@gmail.com', 'Time Stamp', 'FInal Xam'),
(5, 'raiancse@gmail.com', 'delete', 'test delete from notifierlist'),
(6, 'raiancse@gmail.com', 'hello event', 'delte by event'),
(7, 'raiancse@gmail.com', 'msg', 'msgmsg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `eid` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cer` varchar(255) NOT NULL,
  `ver` varchar(255) NOT NULL,
  `wp` int(2) NOT NULL,
  `nid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `eid`, `pwd`, `img`, `cer`, `ver`, `wp`, `nid`) VALUES
(48, 'Muktadirul', 'Islam', 'raiancse@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Muktadirul', 'Muktadirul', '0', 20, 'Muktadirul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifierlist`
--
ALTER TABLE `notifierlist`
  ADD PRIMARY KEY (`Nfid`);

--
-- Indexes for table `schedulelist`
--
ALTER TABLE `schedulelist`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `sendall`
--
ALTER TABLE `sendall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `notifierlist`
--
ALTER TABLE `notifierlist`
  MODIFY `Nfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `schedulelist`
--
ALTER TABLE `schedulelist`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sendall`
--
ALTER TABLE `sendall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `sendmail` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-08-22 00:00:00' ENDS '2017-08-31 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL MailReady()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
