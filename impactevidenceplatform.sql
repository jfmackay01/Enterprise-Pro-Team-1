-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 08:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `impactevidenceplatform`
--
DROP DATABASE IF EXISTS `impactevidenceplatform`;
CREATE DATABASE IF NOT EXISTS `impactevidenceplatform` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `impactevidenceplatform`;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--
-- Creation: May 03, 2023 at 05:04 PM
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `departmentID` tinyint(7) NOT NULL,
  `departmentName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `departments`:
--

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentID`, `departmentName`) VALUES
(1, 'Engineering and Informatics'),
(2, 'Health Studies'),
(3, 'Life Sciences'),
(4, 'Management, Law And SS');

-- --------------------------------------------------------

--
-- Table structure for table `impact_files`
--
-- Creation: May 03, 2023 at 05:04 PM
-- Last update: May 03, 2023 at 06:14 PM
--

DROP TABLE IF EXISTS `impact_files`;
CREATE TABLE `impact_files` (
  `iFileID` int(11) NOT NULL,
  `impactID` int(11) NOT NULL,
  `iFileName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `impact_files`:
--

--
-- Dumping data for table `impact_files`
--

INSERT INTO `impact_files` (`iFileID`, `impactID`, `iFileName`) VALUES
(1, 1, 'ImpactFile3.txt'),
(2, 2, 'ImpactFile2.txt'),
(3, 3, 'ImpactFile1.txt'),
(4, 4, 'ImpactImage1.jpg'),
(5, 5, 'ImpactImage2.jpg'),
(6, 6, 'ImpactImage3.jpg'),
(7, 7, 'ImpactImage4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `impact_record`
--
-- Creation: May 03, 2023 at 05:04 PM
-- Last update: May 03, 2023 at 06:14 PM
--

DROP TABLE IF EXISTS `impact_record`;
CREATE TABLE `impact_record` (
  `impactID` int(11) NOT NULL,
  `impactActivity` varchar(64) NOT NULL COMMENT 'Activity taken to further the impact of the project',
  `ImpactEvidence` varchar(64) NOT NULL COMMENT 'Description of evidence provided',
  `researchID` int(11) NOT NULL COMMENT 'ID of related research project'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `impact_record`:
--   `researchID`
--       `research_project` -> `projectID`
--

--
-- Dumping data for table `impact_record`
--

INSERT INTO `impact_record` (`impactID`, `impactActivity`, `ImpactEvidence`, `researchID`) VALUES
(1, 'Test Activity', 'Insert Evidence Here', 1),
(2, 'Impact record 1.2', 'A lot', 1),
(3, 'Impact Test 2.1', 'A brief description of evidence', 2),
(4, 'Impact Test 2.2', 'Another brief description', 2),
(5, 'Impact test 3', 'A brief description of the evidence', 3),
(6, 'Another impact', 'A picture ', 1),
(7, 'AnotherTest', 'Another image ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--
-- Creation: May 03, 2023 at 05:04 PM
--

DROP TABLE IF EXISTS `progress`;
CREATE TABLE `progress` (
  `progressID` tinyint(11) NOT NULL,
  `progressStage` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `progress`:
--

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`progressID`, `progressStage`) VALUES
(1, 'Advanced'),
(2, 'In Delivery'),
(3, 'REF follow-on'),
(4, 'Early Stage'),
(5, 'In Development'),
(6, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `project_allocations`
--
-- Creation: May 03, 2023 at 05:04 PM
--

DROP TABLE IF EXISTS `project_allocations`;
CREATE TABLE `project_allocations` (
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '0 for collaborator, 1 for reviewer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `project_allocations`:
--   `projectID`
--       `research_project` -> `projectID`
--   `userID`
--       `users` -> `userID`
--

--
-- Dumping data for table `project_allocations`
--

INSERT INTO `project_allocations` (`userID`, `projectID`, `role`) VALUES
(1, 1, 0),
(2, 1, 1),
(4, 2, 1),
(5, 3, 1),
(6, 1, 0),
(6, 2, 0),
(7, 3, 0),
(8, 1, 1),
(8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `research_files`
--
-- Creation: May 03, 2023 at 05:04 PM
-- Last update: May 03, 2023 at 05:53 PM
--

DROP TABLE IF EXISTS `research_files`;
CREATE TABLE `research_files` (
  `rFileID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `rFileName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `research_files`:
--   `projectID`
--       `research_project` -> `projectID`
--

--
-- Dumping data for table `research_files`
--

INSERT INTO `research_files` (`rFileID`, `projectID`, `rFileName`) VALUES
(1, 1, 'testpdf1.pdf'),
(2, 1, 'test1.txt'),
(3, 1, 'testdoc1.docx'),
(4, 2, 'testpdf2.pdf'),
(5, 2, 'testjpeg.jpg'),
(6, 3, 'testdoc3.docx'),
(7, 3, 'testjpeg2.jpg'),
(8, 3, 'testjpeg2811.jpg'),
(9, 1, 'test2.txt'),
(10, 1, 'test2985.txt');

-- --------------------------------------------------------

--
-- Table structure for table `research_grant`
--
-- Creation: May 03, 2023 at 05:04 PM
--

DROP TABLE IF EXISTS `research_grant`;
CREATE TABLE `research_grant` (
  `grantID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `amount` varchar(64) NOT NULL,
  `dateGiven` date NOT NULL,
  `givenBy` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `research_grant`:
--

--
-- Dumping data for table `research_grant`
--

INSERT INTO `research_grant` (`grantID`, `projectID`, `amount`, `dateGiven`, `givenBy`) VALUES
(0, 0, '£0.00', '0000-00-00', 'N/A'),
(1, 1, '£10000', '2023-01-01', 'Test McTesterson');

-- --------------------------------------------------------

--
-- Table structure for table `research_project`
--
-- Creation: May 03, 2023 at 05:04 PM
-- Last update: May 03, 2023 at 05:21 PM
--

DROP TABLE IF EXISTS `research_project`;
CREATE TABLE `research_project` (
  `projectID` int(11) NOT NULL,
  `projectTitle` varchar(32) NOT NULL,
  `departmentID` tinyint(7) NOT NULL,
  `projectInvestigator` varchar(64) NOT NULL,
  `grantGiven` tinyint(1) NOT NULL,
  `researchOutput` varchar(64) DEFAULT NULL COMMENT 'Summary of the output of the paper',
  `projectSummary` varchar(64) DEFAULT NULL COMMENT 'Summary of project',
  `potentialUOA` tinyint(4) NOT NULL DEFAULT 36 COMMENT 'Foreign key of UOA',
  `impactProgress` tinyint(4) NOT NULL DEFAULT 6 COMMENT 'FK of progress state',
  `notes` varchar(64) DEFAULT NULL,
  `meetings` varchar(64) DEFAULT NULL,
  `followup` varchar(64) DEFAULT NULL,
  `underpinnedResearch` varchar(64) DEFAULT NULL,
  `reach` varchar(64) DEFAULT NULL,
  `significance` varchar(32) DEFAULT NULL,
  `quality` varchar(64) DEFAULT NULL,
  `impactAssessment` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `research_project`:
--   `departmentID`
--       `departments` -> `departmentID`
--

--
-- Dumping data for table `research_project`
--

INSERT INTO `research_project` (`projectID`, `projectTitle`, `departmentID`, `projectInvestigator`, `grantGiven`, `researchOutput`, `projectSummary`, `potentialUOA`, `impactProgress`, `notes`, `meetings`, `followup`, `underpinnedResearch`, `reach`, `significance`, `quality`, `impactAssessment`) VALUES
(1, 'Test Project', 1, 'Bob Bobson', 1, 'A brief description of the research output', 'A test Project', 11, 4, 'This should only be seen by the admin', 'Brief details on any meetings', 'Brief details on if any follow up', 'Brief details on any underpinned research', 'High', 'High', 'High', 'High'),
(2, 'Test Project 2', 2, 'Alice Anderson', 0, 'An improvement in someway', 'A second test project', 1, 5, 'The notes should not be viewable to most people', 'Not many meetings', 'No followup needed', ' Based on something', 'Medium', 'Medium', 'High', 'Medium'),
(3, 'Test Project 3', 3, 'Charlie Chaplin', 0, 'Gave an output', 'A third test project', 20, 5, 'Some notes from the admin', 'Some meetings', 'Some followup', 'Based on something', 'Low', 'High', 'Medium', 'High');

-- --------------------------------------------------------

--
-- Table structure for table `uoa`
--
-- Creation: May 03, 2023 at 05:04 PM
--

DROP TABLE IF EXISTS `uoa`;
CREATE TABLE `uoa` (
  `uoaID` tinyint(4) NOT NULL,
  `uoaTitle` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `uoa`:
--

--
-- Dumping data for table `uoa`
--

INSERT INTO `uoa` (`uoaID`, `uoaTitle`) VALUES
(1, 'Clinical Medicine'),
(2, 'Public Health, Health Services and Primary Care'),
(3, 'Allied Health Professions, Dentistry, Nursing and Pharmacy'),
(4, 'Psychology, Psychiatry and Neuroscience'),
(5, 'Biological Sciences'),
(6, 'Agriculture, Food and Veterinary Sciences'),
(7, 'Earth Systems and Environmental Sciences'),
(8, 'Chemistry'),
(9, 'Physics'),
(10, 'Mathematical Sciences'),
(11, 'Computer Science and Informatics'),
(12, 'Engineering'),
(13, 'Architecture, Built Environment and Planning'),
(14, 'Geography and Environmental Studies'),
(15, 'Archaeology'),
(16, 'Economics and Econometrics'),
(17, 'Business and Management Studies'),
(18, 'Law'),
(19, 'Politics and International Studies'),
(20, 'Social Work and Social Policy'),
(21, 'Sociology'),
(22, 'Anthropology and Development Studies'),
(23, 'Education'),
(24, 'Sport and Exercise Sciences, Leisure and Tourism'),
(25, 'Area Studies'),
(26, 'Modern Languages and Linguistics'),
(27, 'English Language and Literature'),
(28, 'History'),
(29, 'Classics'),
(30, 'Philosophy'),
(31, 'Theology and Religious Studies'),
(32, 'Art and Design: History, Practice and Theory'),
(33, 'Music, Drama, Dance, Performing Arts, Film and Screen Studies'),
(34, 'Communication, Cultural and Media Studies, Library and Informati'),
(35, 'Unlikely REF'),
(36, 'Need more information');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: May 03, 2023 at 05:04 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `collab` tinyint(1) NOT NULL DEFAULT 0,
  `reviewer` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `admin`, `collab`, `reviewer`) VALUES
(1, 'test@example.com', '$2y$12$mEuqI.gPmW6vqaauW7HGj.2GQUld0yRbVIESm/DTTv/ZblCwzNMmq', 0, 1, 0),
(2, 'test2@email.com', '$2y$12$WnPDhmD36kXURRarMTQf4.08/gE7BRCP0opIj/vpgLiyp.XiO033e', 0, 0, 1),
(3, 'adminTest@email.com', '$2y$12$u.TZPfmx/jjz4Yz0AbKM5eeW4LWfIMd2.cIpTLKw3gxQJ6r0bVlT2', 1, 0, 0),
(4, 'reviewTest1@email.com', '$2y$12$4hh8xEWJdXzj5kCG6di0LOZJBDg4/V4h96ynvndPgHpC9crB5mgKy', 0, 0, 1),
(5, 'reviewTest2@email.com', '$2y$12$.rgObDwpTACF2HBSOuGDSek91/mNJe31eeBHim.SooQsSST283bF6', 0, 0, 1),
(6, 'collabTest1@email.com', '$2y$12$wgIgMuVODtiVHjck/S2X9u2LC5Mwxl9WYqFmIkSMlif1H/4y7uUoW', 0, 1, 0),
(7, 'collabTest2@email.com', '$2y$12$bzTP8c1.V3MwJrmXKFFcOuDgc.dAW/DRSRsvzd2UYSdA4Gynf8M52', 0, 1, 0),
(8, 'reviewTest3@email.com', '$2y$12$218vu8BuIOSg4Oa6Ozt6cef/wD95TchuAxPpfH/9Pz0rh7d591f0m', 0, 0, 1),
(9, 'test3@email.com', '$2y$12$YMsKD5xfUiB4QFFGIzx9xeswgrIPAdl2vJVUBMwCB2i7j.9JJwE1K', 0, 0, 0),
(10, 'test4@email.com', '$2y$12$uge3.kQZlne/AXEixwguTux46HQabxu2Uc5Inij9mPcdteYxQSa0m', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `impact_files`
--
ALTER TABLE `impact_files`
  ADD PRIMARY KEY (`iFileID`),
  ADD UNIQUE KEY `iFileName` (`iFileName`),
  ADD KEY `impactID` (`impactID`);

--
-- Indexes for table `impact_record`
--
ALTER TABLE `impact_record`
  ADD PRIMARY KEY (`impactID`),
  ADD KEY `researchID` (`researchID`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progressID`);

--
-- Indexes for table `project_allocations`
--
ALTER TABLE `project_allocations`
  ADD UNIQUE KEY `userID_2` (`userID`,`projectID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `research_files`
--
ALTER TABLE `research_files`
  ADD PRIMARY KEY (`rFileID`),
  ADD UNIQUE KEY `rfileName` (`rFileName`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `research_grant`
--
ALTER TABLE `research_grant`
  ADD PRIMARY KEY (`grantID`);

--
-- Indexes for table `research_project`
--
ALTER TABLE `research_project`
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `departmentID` (`departmentID`),
  ADD KEY `potentialUOA` (`potentialUOA`),
  ADD KEY `impactProgress` (`impactProgress`);

--
-- Indexes for table `uoa`
--
ALTER TABLE `uoa`
  ADD PRIMARY KEY (`uoaID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentID` tinyint(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `impact_files`
--
ALTER TABLE `impact_files`
  MODIFY `iFileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `impact_record`
--
ALTER TABLE `impact_record`
  MODIFY `impactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progressID` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `research_files`
--
ALTER TABLE `research_files`
  MODIFY `rFileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `research_grant`
--
ALTER TABLE `research_grant`
  MODIFY `grantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research_project`
--
ALTER TABLE `research_project`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uoa`
--
ALTER TABLE `uoa`
  MODIFY `uoaID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `impact_record`
--
ALTER TABLE `impact_record`
  ADD CONSTRAINT `impact_record_ibfk_1` FOREIGN KEY (`researchID`) REFERENCES `research_project` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_allocations`
--
ALTER TABLE `project_allocations`
  ADD CONSTRAINT `project_allocations_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `research_project` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_allocations_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `research_files`
--
ALTER TABLE `research_files`
  ADD CONSTRAINT `research_files_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `research_project` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `research_project`
--
ALTER TABLE `research_project`
  ADD CONSTRAINT `research_project_ibfk_2` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
