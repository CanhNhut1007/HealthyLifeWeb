-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 11:41 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthlifedb0733`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontact`
--

CREATE TABLE `emergencycontact` (
  `EmergencyContactID` bigint(20) NOT NULL,
  `PatientID` bigint(20) DEFAULT NULL,
  `EmergencyContactName` varchar(30) DEFAULT NULL,
  `EmergencyPhoneNumber` varchar(20) DEFAULT NULL,
  `RelationShip` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergencycontact`
--

INSERT INTO `emergencycontact` (`EmergencyContactID`, `PatientID`, `EmergencyContactName`, `EmergencyPhoneNumber`, `RelationShip`) VALUES
(690670000, 800000000, NULL, NULL, NULL),
(690670001, 800000001, 'Nguyễn Thị C', '0987654321', 'Mother'),
(690670002, 800000004, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` bigint(20) NOT NULL,
  `UserID` bigint(20) NOT NULL,
  `EmployeeName` varchar(30) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `DayofBirth` date DEFAULT NULL,
  `Degree` char(10) NOT NULL,
  `Speciality` text NOT NULL,
  `MedicalSchool` text NOT NULL,
  `YearOfDegree` int(11) NOT NULL,
  `LicenseNumber` varchar(20) NOT NULL,
  `LicenseCountry` varchar(20) NOT NULL,
  `LicenseEXP` date NOT NULL,
  `PersonalImage` varchar(250) DEFAULT NULL,
  `IdentifyCard` char(20) NOT NULL,
  `HospitalID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `UserID`, `EmployeeName`, `Gender`, `PhoneNumber`, `DayofBirth`, `Degree`, `Speciality`, `MedicalSchool`, `YearOfDegree`, `LicenseNumber`, `LicenseCountry`, `LicenseEXP`, `PersonalImage`, `IdentifyCard`, `HospitalID`) VALUES
(2, 850000003, 'Phan Dang Truc Quyen', 'Nu', '09836126', '2019-11-01', 'MBBS', 'Surgery', 'HCM University', 2018, '123456', 'Việt Nam', '2030-01-05', NULL, '123456789', 720650000);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `healthinsurance`
--

CREATE TABLE `healthinsurance` (
  `HealthInsuranceID` bigint(20) NOT NULL,
  `PatientID` bigint(20) DEFAULT NULL,
  `HealthInsuranceCardCode` char(20) DEFAULT NULL,
  `HealthInsuranceMFD` date DEFAULT NULL,
  `HealthInsuranceEXP` date DEFAULT NULL,
  `HospitalRegister` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `healthinsurance`
--

INSERT INTO `healthinsurance` (`HealthInsuranceID`, `PatientID`, `HealthInsuranceCardCode`, `HealthInsuranceMFD`, `HealthInsuranceEXP`, `HospitalRegister`) VALUES
(720730000, 800000000, NULL, NULL, NULL, NULL),
(720730001, 800000001, 'IS1234567', '2019-12-01', '2020-01-31', 'Bien vien Da khoa Thu Duc'),
(720730002, 800000004, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `healthrecord`
--

CREATE TABLE `healthrecord` (
  `HealthRecordID` bigint(20) NOT NULL,
  `PatientID` bigint(20) NOT NULL,
  `EmployeeID` bigint(20) NOT NULL,
  `HealthRecorDateTime` datetime DEFAULT NULL,
  `Description` text,
  `Diagnosis` text,
  `Result` text,
  `Notes` text,
  `PatientView` varchar(6) NOT NULL,
  `TotalFee` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `healthrecord`
--

INSERT INTO `healthrecord` (`HealthRecordID`, `PatientID`, `EmployeeID`, `HealthRecorDateTime`, `Description`, `Diagnosis`, `Result`, `Notes`, `PatientView`, `TotalFee`) VALUES
(1, 800000001, 2, '2019-12-08 00:00:00', 'Dau bung', 'Dau bung', 'Dau da day', 'Khong', 'Yes', '0.00'),
(2, 800000001, 2, '2020-01-01 00:00:00', 'dau lung', 'dau lung', 'dau lung', 'khong', 'Yes', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `hospitalaffiliation`
--

CREATE TABLE `hospitalaffiliation` (
  `HospitalID` bigint(20) NOT NULL,
  `HospitalName` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitalaffiliation`
--

INSERT INTO `hospitalaffiliation` (`HospitalID`, `HospitalName`, `City`, `Country`, `Start_Date`, `End_Date`) VALUES
(720650000, 'Bệnh viện quận Thủ Đức', 'Hồ Chí Minh City', 'Việt Nam', '2010-08-05', NULL),
(720650001, 'Bệnh viện quận Tân Bình', 'Hồ Chí Minh City', 'Việt Nam', '2010-02-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) NOT NULL,
  `reserved_at` int(10) DEFAULT NULL,
  `available_at` int(10) NOT NULL,
  `created_at` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MedicineID` bigint(20) NOT NULL,
  `MedicineName` varchar(50) DEFAULT NULL,
  `MeasureValue` int(11) DEFAULT NULL,
  `UnitofMeasure` varchar(20) DEFAULT NULL,
  `MedicineMFG` date DEFAULT NULL,
  `MedicineEXP` date DEFAULT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `Price` decimal(15,2) DEFAULT NULL,
  `Notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicinedetails`
--

CREATE TABLE `medicinedetails` (
  `MedicineID` bigint(20) NOT NULL,
  `HealthRecordID` bigint(20) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `MedicineUsage` text,
  `MedicineFee` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_17_030743_create_password_resets_table', 1),
(4, '2019_12_30_005443_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `PRID` bigint(20) NOT NULL,
  `UserID` bigint(20) NOT NULL,
  `codeverify` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` bigint(20) NOT NULL,
  `UserID` bigint(20) NOT NULL,
  `IdentifyCard` char(20) NOT NULL,
  `PatientName` varchar(50) DEFAULT NULL,
  `DayofBirth` date DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Gender` char(10) DEFAULT NULL,
  `Address` text,
  `City` varchar(30) DEFAULT NULL,
  `District` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `PersonalImage` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `UserID`, `IdentifyCard`, `PatientName`, `DayofBirth`, `PhoneNumber`, `Gender`, `Address`, `City`, `District`, `Country`, `PersonalImage`) VALUES
(800000000, 850000002, '16520859', 'Châu Thị Nguyệt', NULL, NULL, 'NỮ', NULL, NULL, NULL, NULL, NULL),
(800000001, 850000001, '123456789', 'Thach Canh Nhut', '2020-01-01', '0123456789', 'Nam', NULL, NULL, NULL, NULL, NULL),
(800000004, 850000010, '2378123', 'Minh', NULL, NULL, 'Nu', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` bigint(20) NOT NULL,
  `RoleName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `RoleName`) VALUES
(820000000, 'user'),
(820000001, 'admin'),
(820000002, 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `TestID` bigint(20) NOT NULL,
  `TestName` varchar(50) DEFAULT NULL,
  `Price` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testdetails`
--

CREATE TABLE `testdetails` (
  `TestID` bigint(20) NOT NULL,
  `HealthRecordID` bigint(20) NOT NULL,
  `Result` text,
  `TestFee` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RoleID` bigint(20) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeverify` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `email`, `RoleID`, `password`, `codeverify`, `active`, `created_at`, `updated_at`) VALUES
(850000000, 'nhutori1@gmail.com', 820000001, '18121998', 0, 1, NULL, NULL),
(850000001, 'nhutori2@gmail.com', 820000000, '18121998', 0, 1, NULL, NULL),
(850000002, 'nhutori4@gmail.com', 820000000, '18121998', 0, 1, '2020-01-02 15:49:29', '2020-01-02 15:51:44'),
(850000003, 'nhutori15@gmail.com', 820000002, '18121998', 0, 1, '2020-01-02 15:53:49', '2020-01-02 16:05:16'),
(850000010, 'chau98@gmail.com', 820000000, '123456', 836505, 0, '2020-01-06 16:38:33', '2020-01-06 16:38:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergencycontact`
--
ALTER TABLE `emergencycontact`
  ADD PRIMARY KEY (`EmergencyContactID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `HospitalID` (`HospitalID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthinsurance`
--
ALTER TABLE `healthinsurance`
  ADD PRIMARY KEY (`HealthInsuranceID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `healthrecord`
--
ALTER TABLE `healthrecord`
  ADD PRIMARY KEY (`HealthRecordID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `hospitalaffiliation`
--
ALTER TABLE `hospitalaffiliation`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MedicineID`);

--
-- Indexes for table `medicinedetails`
--
ALTER TABLE `medicinedetails`
  ADD PRIMARY KEY (`MedicineID`,`HealthRecordID`),
  ADD KEY `HealthRecordID` (`HealthRecordID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`PRID`),
  ADD UNIQUE KEY `password_resets_prid_unique` (`PRID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TestID`);

--
-- Indexes for table `testdetails`
--
ALTER TABLE `testdetails`
  ADD PRIMARY KEY (`TestID`,`HealthRecordID`),
  ADD KEY `HealthRecordID` (`HealthRecordID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergencycontact`
--
ALTER TABLE `emergencycontact`
  MODIFY `EmergencyContactID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=690670003;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `healthinsurance`
--
ALTER TABLE `healthinsurance`
  MODIFY `HealthInsuranceID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=720730003;

--
-- AUTO_INCREMENT for table `healthrecord`
--
ALTER TABLE `healthrecord`
  MODIFY `HealthRecordID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitalaffiliation`
--
ALTER TABLE `hospitalaffiliation`
  MODIFY `HospitalID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=720650002;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MedicineID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `PRID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PatientID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=800000005;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=820000003;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `TestID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=850000011;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emergencycontact`
--
ALTER TABLE `emergencycontact`
  ADD CONSTRAINT `emergencycontact_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`HospitalID`) REFERENCES `hospitalaffiliation` (`HospitalID`);

--
-- Constraints for table `healthinsurance`
--
ALTER TABLE `healthinsurance`
  ADD CONSTRAINT `healthinsurance_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);

--
-- Constraints for table `healthrecord`
--
ALTER TABLE `healthrecord`
  ADD CONSTRAINT `healthrecord_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `healthrecord_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);

--
-- Constraints for table `medicinedetails`
--
ALTER TABLE `medicinedetails`
  ADD CONSTRAINT `medicinedetails_ibfk_1` FOREIGN KEY (`HealthRecordID`) REFERENCES `healthrecord` (`HealthRecordID`),
  ADD CONSTRAINT `medicinedetails_ibfk_2` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`);

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `testdetails`
--
ALTER TABLE `testdetails`
  ADD CONSTRAINT `testdetails_ibfk_1` FOREIGN KEY (`HealthRecordID`) REFERENCES `healthrecord` (`HealthRecordID`),
  ADD CONSTRAINT `testdetails_ibfk_2` FOREIGN KEY (`TestID`) REFERENCES `test` (`TestID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
