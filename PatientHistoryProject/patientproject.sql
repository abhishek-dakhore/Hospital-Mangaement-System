-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 10:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patientproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaintbox`
--

CREATE TABLE `complaintbox` (
  `id` int(20) NOT NULL,
  `hosp_ids` varchar(30) NOT NULL,
  `complainer_name` varchar(30) NOT NULL,
  `complaint` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(20) NOT NULL,
  `doc_id` varchar(30) NOT NULL,
  `doc_name` varchar(30) NOT NULL,
  `hosp_id` varchar(30) NOT NULL,
  `hosp_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact` bigint(30) NOT NULL,
  `address` varchar(31) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doc_id`, `doc_name`, `hosp_id`, `hosp_name`, `email`, `password`, `contact`, `address`, `date`) VALUES
(1, 'DR0301', 'Dr Dipak Karhale', 'HPS10004', 'SASWADE EYE HOSPITAL AND OMKAR LASIK CLINIK', 'dipak@gmail.com', 'dipak', 63788933, 'Gandhi Chowk, Harsul Chhatrapat', '2022-06-15'),
(5, 'DR03002', 'Dr Chetan Pande', 'HPS10004', 'SASWADE EYE HOSPITAL AND OMKAR LASIK CLINIK', 'chetan@gmail.com', 'chetan', 63657433, 'University chowk , Chhatrapti ', '2017-11-20'),
(6, 'DR0303', 'Dr Aniket Bagul', 'HPS1001', 'GOVERNMENT MEDICAL HOSPITAL', 'aniket@gmail.com', 'aniket', 6573834, 'Fule Chowk, Akola', '2016-10-11'),
(8, 'DR0304', 'Narendra Dabhade', 'HPS10005', 'General Heart Surgeon Care  Hospital', 'narendra@gmail.com', 'narendra', 849394394, 'new Delhi', '2003-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(20) NOT NULL,
  `hosp_names` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `contacts` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `hosp_id` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hosp_names`, `address`, `city`, `contacts`, `date`, `hosp_id`, `email`) VALUES
(1, 'GOVERNMENT MEDICAL HOSPITAL', 'T-Point, Harsul Chhatrapti Sam', 'Chhatrapati Sambhajinagar', '932848393', '1999-07-14', 'HPS10001', 'governmenthospotal1@gmail.com'),
(2, 'EYE CARE HOSPITAL', 'Shivaji nagar,Washim road, Ako', 'AKOLA', '4384379483', '1986-11-12', 'HPS10002', 'eyecare@gmail.com'),
(3, 'TRINETRI EYE CARE HOSPITAL', 'Railway station road, Pune - 4', 'Pune', '933358394', '1997-08-11', 'HPS10003', 'trinetrimedicare@gmail.com'),
(4, 'SASWADE EYE HOSPITAL AND OMKAR', 'Chetak Ghoda Chowk, Chhatrapti', 'Chhatrapati Sambhajinagar', '$53675454', '2016-06-14', 'HPS10004', 'lasiksurgery@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patients_histories`
--

CREATE TABLE `patients_histories` (
  `p_id` bigint(20) NOT NULL,
  `hosp_id` varchar(30) NOT NULL,
  `hosp_name` varchar(30) NOT NULL,
  `names` varchar(30) NOT NULL,
  `adhar` varchar(30) NOT NULL,
  `disease` varchar(30) NOT NULL,
  `medicine` varchar(30) NOT NULL,
  `reports` varchar(30) NOT NULL,
  `descriptions` varchar(30) NOT NULL,
  `dr_names` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `dates` date NOT NULL,
  `schemes` varchar(30) NOT NULL,
  `charges` varchar(30) NOT NULL,
  `floors` varchar(30) NOT NULL,
  `rooms` varchar(30) NOT NULL,
  `fatal_disease` varchar(30) NOT NULL,
  `Sr` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients_histories`
--

INSERT INTO `patients_histories` (`p_id`, `hosp_id`, `hosp_name`, `names`, `adhar`, `disease`, `medicine`, `reports`, `descriptions`, `dr_names`, `status`, `dates`, `schemes`, `charges`, `floors`, `rooms`, `fatal_disease`, `Sr`) VALUES
(691831630109, 'HPS10004', 'SASWADE EYE HOSPITAL AND OMKAR', 'Abhishek Baban Dakhore', '281513547023', 'Fewer', 'Paracetamol', 'NA', 'TAKE REST', 'Dr Dipak Karhale', 'healthy', '2025-02-24', 'NA', '450', 'NA', 'NA', 'NA', 1),
(691831630109, 'HPS10004', 'SASWADE EYE HOSPITAL AND OMKAR', 'Abhishek Baban Dakhore', '281513547023', 'Hedache', 'aspirin, naxopren', 'NA', 'NA', 'Dr Chetan Pande', 'discharged', '2025-02-24', 'NA', '150', 'NA', 'NA', 'NA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `patients_profiles`
--

CREATE TABLE `patients_profiles` (
  `p_id` bigint(30) NOT NULL,
  `hosp_id` varchar(30) NOT NULL,
  `photos` varchar(30) NOT NULL,
  `names` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `ages` int(10) NOT NULL,
  `adhar` bigint(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `bloodgroups` varchar(10) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `contacts` int(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `heights` varchar(10) NOT NULL,
  `weights` varchar(10) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `qr_codes` varchar(30) NOT NULL,
  `qr_text` varchar(30) NOT NULL,
  `date_regis` date NOT NULL,
  `sr` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients_profiles`
--

INSERT INTO `patients_profiles` (`p_id`, `hosp_id`, `photos`, `names`, `dob`, `ages`, `adhar`, `address`, `bloodgroups`, `marital_status`, `contacts`, `occupation`, `heights`, `weights`, `gender`, `qr_codes`, `qr_text`, `date_regis`, `sr`) VALUES
(691831630109, 'HPS10004', '67bc6370d91cf.jpg', 'Abhishek Baban Dakhore', '2002-11-08', 22, 281513547023, 'At Koldara,Washim Maharashtra-444503', 'A+', 'Single', 2147483647, 'Student', '172', '58', 'Male', 'qrcode/1740399472_qrcode.png', 'Name: Abhishek Baban Dakhore\nA', '2025-02-24', 1),
(312700594857, 'HPS10004', '67bda75a85706.jpg', 'Pavan Gulabrao Dabhade', '2000-06-20', 24, 286655702378, 'Harsul Talav 431001', 'A+', 'Single', 2147483647, 'Collab Manager', '170', '60', 'Male', 'qrcode/1740482394_qrcode.png', 'Name: Pavan Gulabrao Dabhade\nA', '2025-02-25', 5),
(847244326563, 'HPS10004', '67bec79deee0e.jpg', 'Subhash Padvi Gavit', '1998-09-13', 26, 453247480481, 'At Maktarjira, Nandurbar-425414', 'O+', 'Single', 2147483647, 'Advocate', '165', '51', 'Male', 'qrcode/1740556189_qrcode.png', 'Name: Subhash Padvi Gavit\nAddr', '2025-02-26', 6);

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `hosp_id` varchar(30) NOT NULL,
  `hosp_name` varchar(30) NOT NULL,
  `regis_doctor` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `name`, `address`, `contact`, `hosp_id`, `hosp_name`, `regis_doctor`, `date`, `email`, `password`) VALUES
(1, 'Miss Beta', 'dk road,Pune', '9767069855', 'HPS10004', 'SASWADE EYE HOSPITAL AND OMKAR', 'Dr Dipak Karhale', '2025-02-25', 'beta@gmail.com', 'beta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintbox`
--
ALTER TABLE `complaintbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients_histories`
--
ALTER TABLE `patients_histories`
  ADD PRIMARY KEY (`Sr`);

--
-- Indexes for table `patients_profiles`
--
ALTER TABLE `patients_profiles`
  ADD UNIQUE KEY `sr` (`sr`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaintbox`
--
ALTER TABLE `complaintbox`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients_histories`
--
ALTER TABLE `patients_histories`
  MODIFY `Sr` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients_profiles`
--
ALTER TABLE `patients_profiles`
  MODIFY `sr` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
