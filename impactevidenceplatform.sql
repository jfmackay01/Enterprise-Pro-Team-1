-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 12:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `impactevidenceplatform`
--
CREATE DATABASE IF NOT EXISTS `impactevidenceplatform` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `impactevidenceplatform`;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentID` tinyint(7) NOT NULL,
  `departmentName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentID`, `departmentName`) VALUES
(1, 'Engineering and Informatics');

-- --------------------------------------------------------

--
-- Table structure for table `impact_record`
--

CREATE TABLE `impact_record` (
  `impactID` int(255) NOT NULL,
  `impactActivity` varchar(64) NOT NULL COMMENT 'Activity taken to further the impact of the project',
  `ImpactEvidence` varchar(64) NOT NULL COMMENT 'Description of evidence provided',
  `researchID` int(255) NOT NULL COMMENT 'ID of related research project'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `impact_record`
--

INSERT INTO `impact_record` (`impactID`, `impactActivity`, `ImpactEvidence`, `researchID`) VALUES
(1, 'Test Activity', 'Insert Evidence Here', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_allocations`
--

CREATE TABLE `project_allocations` (
  `userID` int(255) NOT NULL,
  `projectID` int(255) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '0 for collaborator, 1 for reviewer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_allocations`
--

INSERT INTO `project_allocations` (`userID`, `projectID`, `role`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `research_grant`
--

CREATE TABLE `research_grant` (
  `grantID` int(255) NOT NULL,
  `amount` varchar(64) NOT NULL,
  `dateGiven` date NOT NULL,
  `givenBy` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `research_project`
--

CREATE TABLE `research_project` (
  `projectID` int(255) NOT NULL,
  `projectTitle` varchar(64) NOT NULL,
  `departmentID` tinyint(7) NOT NULL,
  `projectInvestigator` varchar(64) NOT NULL,
  `grantID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_project`
--

INSERT INTO `research_project` (`projectID`, `projectTitle`, `departmentID`, `projectInvestigator`, `grantID`) VALUES
(1, 'Test Project', 1, 'Bob Bobson', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `collab` tinyint(1) NOT NULL DEFAULT 0,
  `reviewer` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `admin`, `collab`, `reviewer`) VALUES
(1, 'test@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, 1, 0),
(2, 'test2@email.com', 'ad0234829205b9033196ba818f7a872b', 0, 0, 1),
(3, 'adminTest@email.com', '72adc15352810c6d960fea7edb398c77', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `impact_record`
--
ALTER TABLE `impact_record`
  ADD PRIMARY KEY (`impactID`),
  ADD KEY `researchID` (`researchID`);

--
-- Indexes for table `project_allocations`
--
ALTER TABLE `project_allocations`
  ADD UNIQUE KEY `userID_2` (`userID`,`projectID`),
  ADD KEY `userID` (`userID`),
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
  ADD KEY `grantID` (`grantID`),
  ADD KEY `departmentID` (`departmentID`);

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
  MODIFY `departmentID` tinyint(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `impact_record`
--
ALTER TABLE `impact_record`
  MODIFY `impactID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research_grant`
--
ALTER TABLE `research_grant`
  MODIFY `grantID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_project`
--
ALTER TABLE `research_project`
  MODIFY `projectID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `research_project`
--
ALTER TABLE `research_project`
  ADD CONSTRAINT `research_project_ibfk_1` FOREIGN KEY (`grantID`) REFERENCES `research_grant` (`grantID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `research_project_ibfk_2` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
