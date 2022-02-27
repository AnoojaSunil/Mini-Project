-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2022 at 12:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reBook`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(50) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_price` int(50) NOT NULL,
  `rent_price` varchar(50) NOT NULL,
  `b_author` varchar(50) NOT NULL,
  `b_cat` varchar(50) NOT NULL,
  `b_isbn` varchar(50) NOT NULL,
  `b_img` varchar(50) NOT NULL,
  `pub_status` varchar(50) NOT NULL,
  `rent_status` varchar(50) NOT NULL,
  `mode_status` varchar(50) NOT NULL,
  `soft_copy_file` varchar(50) NOT NULL,
  `login_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `b_name`, `b_price`, `rent_price`, `b_author`, `b_cat`, `b_isbn`, `b_img`, `pub_status`, `rent_status`, `mode_status`, `soft_copy_file`, `login_id`) VALUES
(1, 'Paranna Bhoomi 2', 210, '105', 'Vaisakhan thamp', 'Fantacy', '9780571310761', '41FMPCPOtUL_180x.jpg', 'Published', 'In', 'Hard Copy', 'Null', 4),
(2, 'White Crocodile', 381, '190.5', 'K.t. medina,', 'Crime Thriller', '9780571310760', '9780571310760_180x.jpg', 'Deleted', 'In', 'Hard Copy', 'Null', 4),
(3, 'Matilda', 229, '114.5', 'Roald dahl', 'Children', '9780141365466', 'Uj2FVKepO8_180x.jpg', 'Published', 'In', 'Soft Copy', 'Tuples note.pdf', 4),
(4, 'Eclipse (Twilight, #3)', 189, '94.5', 'Stephenie meyer', 'Fantacy', '9780571310760', '9781904233916_180x.jpg', 'Published', 'In', 'Hard Copy', 'Null', 10),
(5, 'Innocent Blood', 300, '150', 'Elizabeth corley,', 'Crime Thriller', '9780749079383', '9780749079383_180x (1).jpg', 'Published', 'In', 'Soft Copy', 'Tuples note.pdf', 10),
(6, 'Hide and Seek', 300, '150', 'James patterson', 'Romance', '9780571310760', '9780007224876_180x.jpg', 'Published', 'Out', 'Hard Copy', 'Null', 10),
(7, 'NEERAJ CHOPRA: FROM PANIPAT', 229, '114.5', 'Arjun Singh Kadian', 'Autobiography', 'None', 'neeraj.jpg', 'Published', 'In', 'Hard Copy', 'Null', 4),
(8, 'Harry Potter and the Chamber', 300, '150', 'J.K. Rowling ', 'Mystery', 'None', 'harry.jpg', 'Published', 'In', 'Hard Copy', 'Null', 10),
(9, 'The Dhoni Touch', 100, '50', 'Bharat Sundaresan ', 'Sports', 'None', 'dhoni.jpg', 'Published', 'In', 'Hard Copy', 'Null', 4),
(10, 'I Am Malala', 200, '100', 'Malala Yousafzai', 'Politics', 'None', 'malala.jpg', 'Not', 'In', 'Hard Copy', 'Null', 10);

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

CREATE TABLE `book_request` (
  `req_id` int(50) NOT NULL,
  `req_date` varchar(50) NOT NULL,
  `req_status` varchar(50) NOT NULL,
  `login_id` int(50) NOT NULL,
  `book_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`req_id`, `req_date`, `req_status`, `login_id`, `book_id`) VALUES
(8, '16-02-2022', 'Completed', 4, 4),
(9, '16-02-2022', 'Completed', 10, 9),
(10, '16-02-2022', 'Accepted', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `date_of_post` varchar(50) NOT NULL,
  `sender_id` int(50) NOT NULL,
  `reciver_id` int(50) NOT NULL,
  `req_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `message`, `date_of_post`, `sender_id`, `reciver_id`, `req_id`) VALUES
(14, 'hai', '17/02/22  00:00 AM', 4, 10, 8),
(15, 'hai', '17/02/22  00:03 AM', 10, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `com_id` int(50) NOT NULL,
  `descri` varchar(50) NOT NULL,
  `com_date` varchar(50) NOT NULL,
  `res_date` varchar(50) NOT NULL,
  `com_status` varchar(50) NOT NULL,
  `rent_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`com_id`, `descri`, `com_date`, `res_date`, `com_status`, `rent_id`) VALUES
(10, 'Book not', '16-02-2022', '16-01-2022', 'Completed', 9);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `type`, `status`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', '1'),
(4, 'ankitpchandran353@gmail.com', 'Ankit12345', 'user', '1'),
(10, 'vehiclebreakdownassistant24x7@gmail.com', 'Alvin1234', 'user', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(50) NOT NULL,
  `rate` int(50) NOT NULL,
  `feedback` varchar(50) NOT NULL,
  `cust_id` varchar(50) NOT NULL,
  `book_id` int(50) NOT NULL,
  `rent_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rate_id`, `rate`, `feedback`, `cust_id`, `book_id`, `rent_id`) VALUES
(10, 4, 'good', '4', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `latitude` longtext NOT NULL,
  `longitude` longtext NOT NULL,
  `terms` varchar(50) NOT NULL,
  `document` varchar(50) NOT NULL,
  `login_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `name`, `phone`, `email`, `address`, `latitude`, `longitude`, `terms`, `document`, `login_id`) VALUES
(1, 'Ankit', '8978675645', 'ankitpchandran353@gmail.com', 'Muvat', '10.000455757617534', '76.7412634736667', 'Terms Accepted', 'self_declaration.pdf', 4),
(7, 'Alvin', '7867564534', 'vehiclebreakdownassistant24x7@gmail.com', 'M', '10.00510646635', '76.680083862043', 'Terms Accepted', 'self_declaration.pdf', 10);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(50) NOT NULL,
  `pay_amt` varchar(50) NOT NULL,
  `admin_amt` varchar(50) NOT NULL,
  `user_amt` varchar(50) NOT NULL,
  `issue_date` varchar(50) NOT NULL,
  `expire_date` varchar(50) NOT NULL,
  `pay_date` varchar(50) NOT NULL,
  `req_id` int(50) NOT NULL,
  `rent_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `pay_amt`, `admin_amt`, `user_amt`, `issue_date`, `expire_date`, `pay_date`, `req_id`, `rent_status`) VALUES
(7, '94.5', '37.8', '56.7', '16-02-2022', '18-03-2022', '16-02-2022', 8, 'Returned'),
(8, '50', '20', '30', '16-02-2022', '18-01-2022', '16-02-2022', 9, 'Returned'),
(9, '150', '60', '90', '16-02-2022', '18-01-2022', '16-02-2022', 10, 'Rented');

-- --------------------------------------------------------

--
-- Table structure for table `return_fine`
--

CREATE TABLE `return_fine` (
  `return_id` int(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `fine_amt` varchar(50) NOT NULL,
  `rent_id` int(50) NOT NULL,
  `reqest_id` int(50) NOT NULL,
  `books_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_fine`
--

INSERT INTO `return_fine` (`return_id`, `return_date`, `fine_amt`, `rent_id`, `reqest_id`, `books_id`) VALUES
(6, '16-02-2022', '0', 7, 8, 4),
(7, '16-02-2022', '2.5', 8, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `site_complaint`
--

CREATE TABLE `site_complaint` (
  `com_id` int(50) NOT NULL,
  `dsecri` varchar(50) NOT NULL,
  `com_date` varchar(50) NOT NULL,
  `responds` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_request`
--
ALTER TABLE `book_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `return_fine`
--
ALTER TABLE `return_fine`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `site_complaint`
--
ALTER TABLE `site_complaint`
  ADD PRIMARY KEY (`com_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_request`
--
ALTER TABLE `book_request`
  MODIFY `req_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `com_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `return_fine`
--
ALTER TABLE `return_fine`
  MODIFY `return_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `site_complaint`
--
ALTER TABLE `site_complaint`
  MODIFY `com_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
