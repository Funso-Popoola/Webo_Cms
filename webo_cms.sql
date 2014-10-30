-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2014 at 08:01 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webo_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(50) NOT NULL,
  `visibility` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `pageName`, `visibility`) VALUES
(1, 'Research', 'true'),
(2, 'News_and_Events', 'true'),
(3, 'Courses_and_Programmes', 'true'),
(4, 'Resources', 'true'),
(5, 'People', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(40) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(40) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`,`title`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `title`, `type`, `description`) VALUES
(1, 'CSC 101', 'INTRODUCTION TO COMPUTING 1', 'underg', '<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Definition of computer and computer related concepts such as programme, computer software: Systems and application programmes; minicomputers, mainframes and supercomputer.</li>\r\n	<li>Discussion of selected application of personal computers: word processing, database management, spreadsheet, graphics, data analysis.</li>\r\n	<li>Comprehensive history of modern computer technology.&nbsp; Evolution of microcomputer systems. History of computer programme</li>\r\n	<li>Number system: Binary, Decimal, Hexadecimal. Binary arithmetic; Addition, subtraction, multiplication, division.</li>\r\n	<li>Social impact of computers: positive impacts, negative impacts.</li>\r\n</ol>\r\n'),
(2, 'CSC 102', 'INTRODUCTION TO COMPUTING II', 'underg', '<ol>\r\n	<li>An introduction to computing with emphasis on the practical usage of the personal computers; concepts of computer hardware, software firmware.</li>\r\n	<li>Definition of the following terms:&nbsp; bits, bytes, word, word length, data, information, records, fields, files, database. Data types and organization. Data coding; ASCII Problem-solving process. Algorithms; flowcharting.</li>\r\n	<li>Basic logic gates and their operation. Examples with elementary logic circuits.</li>\r\n	<li>Introduction to BASIC programming.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n'),
(3, 'CSC 201', 'COMPUTER PROGRAMMING I', 'underg', '<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Brief survey of programming paradigms&ndash; Procedural programming&ndash; Object-oriented</li>\r\n</ol>\r\n\r\n<p>programming, Functional programming&ndash; Declarative programming, non-algorithmic programming&ndash; Scripting languages. The effects of scale on programming methodology.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b)&nbsp;&nbsp; Programming the computer in FORTRAN 90: Declarative statements; Input and Output statements; Program compilation and execution; Control and conditional statements; Loops and iteration; Functions, Routines and Sub-programmes.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c)&nbsp;&nbsp; Input/Output; File processing; Port addressing.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d)&nbsp; Program testing and debugging techniques.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `generalcontent`
--

CREATE TABLE IF NOT EXISTS `generalcontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(40) NOT NULL,
  `contentName` varchar(40) NOT NULL,
  `contentValue` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contentName` (`contentName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `generalcontent`
--

INSERT INTO `generalcontent` (`id`, `pageName`, `contentName`, `contentValue`) VALUES
(1, 'home', 'mission', '<p>To create a teaching and learning community for imparting appropriate skills and knowledge, behavior and attitude, advance frontiers of knowledge that are relevant to national and global development, engender a sense of selfless public service, and promote and nurture the African traditions</p>\r\n'),
(2, 'about', 'history', '<p>The Department of Computer Science was established in 1970 in order to meet the nation&#39;s need for skilled manpower in this rapidly expanding field. A study of the requirements of industry, commerce, government and research organizations was carried out and several meetings were held with practitioners in the field.&nbsp;<br />\r\nFrom these interactions with industry, it became clear that emphasis is shifting and the market for joint honours degree in computing is fast dwindling. A major area of need easily identifiable is Computer Information Technology geared toward the production of Software Systems Engineers, System Analysts, and Programmers. At the moment, there are several computer installations without adequate software and hardware personnel support. In spite of this, a proliferation of numerous computer projects is anticipated. It is envisaged that graduates of these programmes will meet Nigeria&#39;s Electronic Data Processing (IT) needs and find employment in industry, commerce and governments where there are needs for Programmers, Software Systems Engineers, Computer Engineers and Systems Analysts and Designers..</p>\r\n'),
(3, 'home', 'HODs_corner', '<p>Today, we live in a knowledge society where computers are pervasive, and impact on almost all aspects of modern life. Computers and the internet has changed the way we work, learn and communicate; it is only the beginning of a new revolution as the potential of IT has not yet been fully realized especially in Nigeria. This is an exciting time for Computer Scientist as the discipline is now an essential source of tools and technique for advancement in almost all spheres of human endeavor. As a result the need for knowledgeable Computer Science and Engineering graduates has increased dramatically, and the current breakthrough in IT has rapidly led to skill shortages across the IT sector.</p>\r\n\r\n<p>The Department of Computer Science and Engineering at the Obafemi Awolowo University is the largest of such Department in the country. Our students are prepared for rewarding and flexible careers. We offer a very broad range of courses spanning almost all aspects of Computer Science and Engineering leading to B.Sc. Computer Engineering, B.Sc. Computer Science and B.Sc. Computer Science with Economics degree at Undergraduate levels. Other courses leading to strong academic and business oriented programs are also offered at Postgraduate levels in Computer Science. The Department do not only train young minds into professionals, but also inculcate discipline required for real life sustenance as allusion to the University&rsquo;s motto &ldquo;For Learning and Culture&rdquo; . so they are encouraged to eschew violence, embrace honesty and modesty, and also make academics their priority while on Campus.</p>\r\n\r\n<p>We collaborate with industry which is an indication that our degree programs are leading edge; graduates from the Department are well prepared for the challenges of the dynamic and fast growing software, hardware and in fact, the entire IT industry. Our graduates are very well received by industry employers and have consistently been well placed.</p>\r\n\r\n<p>I am honoured to work with over 28 elite academic staff, over 10 skillful support staff, and an active dynamic student body on the most beautiful campus in Africa. The staff are well recognized for their contributions and are always ready to provide quality education with solid fundamentals and skills in cutting-edge technologies to promote competitiveness, advance knowledge in Computer Science and Engineering through high quality and impact research, and to p-lay leading roles in our world of influence- industry, community, and government in education and technology. Of particular relevance to our department is the support for diversity. As the head of Department of&nbsp; Computer Science and Engineering , I look forward to carrying on the tradition of excellence that was laid by its predecessor, while the department pride itself as a home for high quality education and research, and as always a home for our students, alumni and our friends. I am optimistic that this session will experience an unprecedented achievement and opportunities as students, and staff in the Department will work together to build an even stronger Department. I believe the department has the power to mold a bright future for our students and ability to create a high quality life for those living and working in our global community</p>\r\n\r\n<p>I encourage our alumni and friends, especially in the industry, to take an active part in the expansion of our commitment to Excellency and diversity. Nationally, we face challenges that are urgent and complex, Alumni and industry are crucial to the continued growth of and research through time spent mentoring students and staffs who are involved in providing solutions to those challenges.</p>\r\n\r\n<p>This handbook describes the ranges of the courses covered in the Department, together with information that guide you as you navigate Obafemi Awolowo University through Computer Science and Engineering and allied Departments.</p>\r\n\r\n<p>It is with great joy that I welcome you all both, fresh and returning undergraduates, to the Department of Computer Science and Engineering at Obafemi Awolowo University, The first and leading Computer Science and Engineering Department in Nigeria</p>\r\n'),
(4, 'about', 'contactDetails', '<p>Room 204, Exam Processing Room</p>\r\n\r\n<p>Room 205-206, Head of Dept. office</p>\r\n\r\n<p>Room 209, Departmental Board Room</p>\r\n\r\n<p>Room M017, Nacoss Secretariat</p>\r\n\r\n<p>Room 008, PG Room Departmental Library</p>\r\n\r\n<p>Obafemi Awolowo University, Ile-Ife Osun State, Nigeria.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(5, 'about', 'successStories', '<p>We&#39;d like you to meet some of our University&#39;s students, graduates and staff who have strived for excellence in teaching, <strong>learning and research. </strong>You can also learn about our successful projects that have made a difference in the community and industry. <em>Department Of Computer Science and Engineering </em>Success stories in pictures.. we are the record breakers because we break and set new records. Enjoy!!!...</p>\r\n'),
(6, 'home', 'vision', '<p>The vision is to be a top rated University in Africa, ranked among the best Universities in the world, whose products occupy leadership positions in the public and private sectors of the Nigerian global economy, that has harnessed modern technological, social, economic and financial strategies, built strong partnerships and linkages within and outside Nigeria and whose research contributes a substantial proportion of innovations in the Nigerian economy.</p>\r\n'),
(7, 'about', 'academics', '<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PART I:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Admission to Year one is by Joint Matriculation Examination (JME). To be eligible to take the examination, candidate must normally have the West African School Certificate or its equivalent, with credits in at least 5 subjects including English, Mathematics, Physics and Chemistry.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PART II:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Student may be eligible for admission to Part II if they have any of the following, in addition to the University/Faculty General Admission requirements:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;(i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Good Pass at the G.C.E. Advanced level or equivalent in Chemistry, Physics, Pure Mathematics or Applied Mathematics (Combined).</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; OR</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (ii)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; National Diploma in Computer Science or related studies at upper credit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PART III:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Higher National Diploma in Computer Science or related studies at upper credit.</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `pageName` varchar(255) NOT NULL,
  `url` varchar(511) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `pageName`, `url`) VALUES
(1, 'slider1', 'home', 'slider1.jpg'),
(2, 'slider2', 'home', 'slider2.jpg'),
(3, 'slider3', 'home', 'slider3.jpg'),
(4, 'HODs_corner', 'home', 'hodzpicture.jpg'),
(5, 'slider4', 'home', 'slider4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE IF NOT EXISTS `layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`id`, `name`, `value`) VALUES
(1, 'theme', '3'),
(2, 'pri_color', '#004080'),
(3, 'sec_color', '#0080c0'),
(4, 'ter_color', '#808080'),
(5, 'dept_name', 'DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_upload` datetime NOT NULL,
  PRIMARY KEY (`id`,`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `type`, `title`, `content`, `author`, `date_upload`) VALUES
(7, 'Announcement', 'Resumption', '<p>Freshers are to resume June 2,2014.</p>\r\n\r\n<p>Stallites are to resume June 15, 2014.</p>\r\n', 'Irogbarachi Ujunwa', '2014-05-28 00:00:00'),
(8, 'In_the_Media', 'Omole Bamitale Organises press conference', '<p>On the 4th of June 2014, the Vice-Chancellor of Obafemi Awolowo University, Prof. Bamitale Omole called for a press conference to get the public well informed about the increment in the fees of the student.<br />\r\n&nbsp;</p>\r\n', 'Aremu Busola on behalf of the School Mangement', '2014-05-28 00:00:00'),
(9, 'In_the_Media', 'FINALLY!!!...OAU Re-opens after 25years Strike', '<p>The citizens of CorruptoVille(Formerly Nigeria) are pleased to hear the annoucement of the re-opening of Obafemi Awolowo University after a 25year closure caused by disputes arising from an increase in the tution fee.</p>\r\n', 'GeneraLeye', '2014-05-28 00:00:00'),
(10, 'In_the_Media', 'Four Eyed Student, found on OAU campus.', '<p>A student whom our sources named Mcqueen Pius can be termed the biggest discovery to mankind since the invention of fire. The boy unbelievably has four eyes, two on the face, and the other two on his stomach. He managed to hide the lower pair of eyes for a considerable number of years, until he was caught shirtless by some of his classmates who then reported this to the authorithies.</p>\r\n', 'GeneralLeye', '2014-05-28 00:00:00'),
(11, 'Announcement', 'RISKY BANNED ON OAU CAMPUS!!', '<p>Starting from the 25th of July, 2014...sales and consumption of the meal commonly known as &#39;risky&#39; has been banned. Any student found consuming,possesing or selling this item will be rusticated and his/her guardian will be thrown in jail for raising a criminal.</p>\r\n', 'GeneraLeye', '2014-05-28 00:00:00'),
(12, 'Announcement', 'This is another Announcement', '<p>This is just another announcement...i can assure that it is totally meaningless...in fact you really should stop reading it now..There are other things you can be doing to waste your time, other than reading this..counting cars....playing with sand...whatever,,,just stop reading this now and GET A LIFE!!!</p>\r\n', 'GeneraLeye', '2014-05-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(511) NOT NULL,
  `category` varchar(40) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `link`, `category`, `description`) VALUES
(22, 'Soriyan H.A.', 'scholaroauife.edu.ng/hasoriyan.', 'staff', '<p>Dr. (Mrs) Soriyan (HAS) is a Reader &amp; Head of Department in the Department of Computer Science and Engineering. She Obtained her B.Sc., M.Sc. and Ph.D. at Obafemi Awolowo University, Ile-Ife.</p>\r\n'),
(23, 'Dr. Odejobi (OAO)', 'scholar.oauife.edu.ng', 'staff', '<p>Dr. Odejobi (OAO) is a Senior Lecturer in the Department of Computer Science and Engineering. He is the Departmental Representative for Faculty Research Committee and also the Departmental Representative Faculty Board of EDM. He obtained his B.Sc and M.Sc. at Obafemi Awolowo University,Ile-Ife and proceeded to United Kingdom(UK) for his Ph.D.</p>\r\n'),
(24, 'Prof Adagunodo', 'scholaroauife.edu.ng', 'staff', '<p>Prof Adagunodo(ERA) is a Professor in the Department of Computer Science and Engineering.<br />\r\nHe obtained his B.Sc, M.Sc. and Ph.D at Obafemi Awolowo University, Ile-Ife.</p>\r\n'),
(25, 'Prof. Aderounmu (GAA', 'Scholar.oauife.edu.ng', 'staff', '<p>Prof. Aderounmu (GAA) is a professor and Director of INTECU in the Department of Computer Science and Engineering and also is a coordinator of CPE 204 and Postgraduate. He obained his B.Sc., M.Sc. and Ph.D. at Obafemi Awolowo University, Ile-Ife.</p>\r\n'),
(26, 'Dr. Oluwaranti (AIO)', 'scholaroauife.edu.ng', 'staff', '<p>Dr. Oluwaranti (AIO) is a Senior Lecturer in the Department of Computer Science and Engineering. He is the coordinator of CPE 502, CPE 314, and also the coordinator of OAU Net/ Departmental Networks. Obained his B.Sc., M.Sc. and Ph.D at Obafemi Awolowo University,Ile-Ife.</p>\r\n'),
(27, 'Dr. Afolabi (BSA', 'scholaroauife.edu.ng', 'staff', '<p>Dr. Afolabi (BSA) is a Senior Lecturer in the Department of Computer Science and Engineering. He is the EMIT Coordinator and Staff Seminar Coordination.<br />\r\nHe obtained his B.Sc. at Obafemi Awolowo University, Ile-Ife and proceeded to France for his M.Phil and Ph.D.</p>\r\n'),
(28, 'Dr. Olajubu (EAO)', 'scholaroauife.edu.ng', 'staff', '<p>Dr. Olajubu (EAO) is a Senior Lecturer in the Department of Computer Science and Engineering. He is the coordinator of CSC 508 and he is Examination Coordinator. He obtained his B.Sc.and M.Sc. at Obafemi Awolowo University, Ile-Ife.</p>\r\n'),
(30, 'Nacoss OAU', 'www.nacoss.ng', 'stud_group', '<p>National association of computer science</p>\r\n'),
(31, 'COMSCA', 'www.comsca.com', 'stud_group', '<p>Computer Student&nbsp; Christian association&nbsp; started byb some students in 2012 is a religious association for computer student</p>\r\n'),
(32, 'Alumni body', '#', 'alumni', '<p>this is meeting of computer science and engineering, they meet once a month at the Eko hotels lagos</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(40) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `type`, `description`) VALUES
(2, 'B.Sc Computer Science and Mathematics', 'underg', '<p>dsdsd</p>\r\n'),
(3, 'B.Sc Computer Science and Economics', 'postg', '<p>rggdgdgr</p>\r\n'),
(4, 'B.Sc Computer Engineering', 'underg', '<p>fhdsjklvbfdskjvbjdsakpv</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(511) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`title`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `title`, `type`, `url`, `description`, `author`) VALUES
(5, 'Google Business and You', 'Conference', 'www.gdgoau.com', '<p>DATE: 15th June,2014</p>\r\n\r\n<p>VENUE: AITI LAB</p>\r\n\r\n<p>TIME: 10:00am</p>\r\n\r\n<p>SPEAKER: Moyin Adeyemi</p>\r\n', 'Google Developer Group OAU Chapter');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `code` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `url` varchar(511) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_upload` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `code`, `type`, `url`, `description`, `author`, `date_upload`) VALUES
(22, 'Csc 312 notes', 'CSC 312', 'coursenote', 'history_of_operating_system_Moumina.pdf', '<p>PLease read up before class on Monday as only questions would be taken in class<br />\r\n&nbsp;</p>\r\n', 'Mrs Ikono', '2014-05-28 00:00:00'),
(23, 'Laboratory II CSC302', 'CSC 302', 'coursenote', 'history_of_operating_system_Moumina.pdf', '<p>Please make sure you print and read through before comming to the next lab</p>\r\n', 'Dr Ajayi', '2014-05-28 00:00:00'),
(24, 'Materials on planning', 'CPE 316', 'coursenote', 'history_of_operating_system_Moumina.pdf', '<p>Pages 19 - 204 would be useful for the topics Planning, Fractals,<br />\r\n&nbsp;</p>\r\n', 'Dr Elufidodo', '2014-05-28 00:00:00'),
(25, 'csc 302 problem set', 'csc302', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>Please follow the format given here for the assignment<br />\r\n&nbsp;</p>\r\n', 'Dr ajayi', '2014-05-28 00:00:00'),
(26, 'csc 307 assignments', 'CSC 307', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>&nbsp;this is your 2nd assignment. To be Submitted on or before friday 12th june 2014 by 1:59pm prompt</p>\r\n', 'Dr Afolabi', '2014-05-28 00:00:00'),
(28, 'CSC 308 assignment ', 'CSC 308', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>submit on or before 23/06/2014 before the class</p>\r\n', 'Miss Omodunbi', '2014-05-28 00:00:00'),
(29, 'CPE 514 assignment', 'CPE 514', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>Should be submitted throught the class representative on or before Tuesday 12th june by 8am<br />\r\n&nbsp;</p>\r\n', 'Prof Soriyan', '2014-05-28 00:00:00'),
(30, 'Nash Equilibrum', 'CPE 407', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>Submit on or before closing hours for work tommorrow</p>\r\n', 'Mr Akhigbe', '2014-05-28 00:00:00'),
(31, 'Term Paper', 'CPE 310', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>Agents as intentional systems. 15 pages. To be submitted on the day of examination of this course</p>\r\n', 'Dr Olajubu', '2014-05-28 00:00:00'),
(32, 'System Analysis and Design', 'CSC 312', 'coursenote', 'history_of_operating_system_Moumina.pdf', '<p>Submit next class.</p>\r\n', 'Mrs Ikono', '2014-05-28 00:00:00'),
(33, 'Software development tools', 'CSC 306', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>Read this material and summarize in two pages. Submit on or before 12/03/2014</p>\r\n', 'Mr Gambo', '2014-05-28 00:00:00'),
(34, 'Materials for survey', 'csc 306', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>Submit in or before the next class<br />\r\n&nbsp;</p>\r\n', 'Mrs Ikono', '2014-05-28 00:00:00'),
(36, 'Course Manifesto', 'CPE 316', 'coursenote', 'history_of_operating_system_Moumina.pdf', '<p>Course Manifesto</p>\r\n', 'Dr Odejobi', '2014-05-28 00:00:00'),
(37, 'problem II', 'CSC 302', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>Soft copies to be submitted Friday 12/06/2014 by 4pm, Hardcopies by Monday 15/06/2014<br />\r\n&nbsp;</p>\r\n', 'Dr Ajayi', '2014-05-28 00:00:00'),
(38, 'Comparative analysis', 'CSC 594', 'assignment', 'history_of_operating_system_Moumina.pdf', '<p>Check out the web page and point out errors to be submitted on before Friday 12/07/2014</p>\r\n', 'Mr Gambo', '2014-05-28 00:00:00'),
(39, 'Computer Architecture', 'CPE 402', 'coursenote', 'history_of_operating_system_Moumina.pdf', '<p>Go throught the material for review in class on Monday</p>\r\n', 'Mr Akhigbe', '2014-05-28 00:00:00'),
(40, 'How to break out of jail', 'CSC419', 'coursenote', 'Basic-Concepts-on-Information-Technology.pdf', '<p>This is a coursenote on jailbreaking....blah blah blah</p>\r\n', 'GeneraLeye', '2014-05-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `timetable`) VALUES
(1, '<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Days</th>\r\n			<th>7-8</th>\r\n			<th>8-9</th>\r\n			<th>9-10</th>\r\n			<th>10-11</th>\r\n			<th>11-12</th>\r\n			<th>12-1</th>\r\n			<th>1-2</th>\r\n			<th>2-3</th>\r\n			<th>3-4</th>\r\n			<th>4-5</th>\r\n			<th>5-6</th>\r\n			<th>6-7</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Monday</td>\r\n			<td>\r\n			<p>CSC512</p>\r\n\r\n			<p>CHELT</p>\r\n			</td>\r\n			<td>\r\n			<p>CSC315</p>\r\n\r\n			<p>MB203</p>\r\n			</td>\r\n			<td>\r\n			<p>CSC102</p>\r\n\r\n			<p>HSLTC</p>\r\n			</td>\r\n			<td>\r\n			<p>CSC306</p>\r\n\r\n			<p>HB3203</p>\r\n			</td>\r\n			<td>\r\n			<p>CSC306</p>\r\n\r\n			<p>HB3203</p>\r\n			</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>\r\n			<p>CSC316</p>\r\n\r\n			<p>HSLTB</p>\r\n			</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>\r\n			<p>CSC203</p>\r\n\r\n			<p>STEPB</p>\r\n			</td>\r\n			<td>\r\n			<p>CSC201</p>\r\n\r\n			<p>AMPHI</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tuesday</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wednesday</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thursday</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Friday</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n			<td>--FREE--</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `visibility`
--

CREATE TABLE IF NOT EXISTS `visibility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contentName` varchar(255) NOT NULL,
  `visibility` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `visibility`
--

INSERT INTO `visibility` (`id`, `contentName`, `visibility`) VALUES
(1, 'mission', 'block'),
(2, 'vision', 'block'),
(3, 'papers', 'block'),
(4, 'proj_and_pubs', 'block'),
(5, 'labs', 'none'),
(6, 'conferences', 'block'),
(7, 'in_the_media', 'block'),
(8, 'pub_seminars', 'none'),
(9, 'announcements', 'block'),
(10, 'res_cos_notes', 'block'),
(11, 'res_assignments', 'block'),
(12, 'alumni', 'block'),
(13, 'stud_group', 'block'),
(14, 'suc_story', 'block'),
(15, 'l_news', 'block');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
