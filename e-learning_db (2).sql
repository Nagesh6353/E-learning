-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 05:40 AM
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
-- Database: `e-learning_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Nagesh', 'nagesh@gmail.com', 'nagesh123'),
(2, 'Vivek', 'vivek@gmail.com', 'vivek123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_desc` text NOT NULL,
  `course_author` varchar(255) NOT NULL,
  `course_img` text NOT NULL,
  `course_duration` text NOT NULL,
  `course_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`) VALUES
(1, 'Learn Angular in easy way', 'The skills you will learn from this course is applicable to the real world,so you can go ahead and build similar app.', 'E-learning', '../image/courseimg/', '2 Months', 2000),
(4, 'Learn Python ', 'This course provides an introduction to programming and the Python language.  Students are introduced to core programming concepts like data structures, conditionals, loops, variables, and functions. ', 'E-learning', '../image/courseimg/python.jpg', '40 Days', 1599),
(5, 'C for Beginners', 'Learn the C programming language and its fundamental programming concepts. Gain the knowledge to write simple C language applications and undertake future courses that assume some background in computer programming. Topics include variables, data types, functions, control structures, pointers, strings, arrays and dynamic allocation principles.', 'E-learning', '../image/courseimg/c.jpg', '45 Days', 1499),
(6, 'Master in Data Science', 'In a Data Science course, students learn about various tools, software, and Machine Learning algorithms that help to analyze data.', 'E-learning', '../image/courseimg/Data-Science.jpg', '6 Months', 5600),
(7, 'HTML', 'Learn the basics of HTML, a markup language used to design web pages. Find out the history, elements, tags, page structure, features, advantages and disadvantages of HTML.', 'E-learning', '../image/courseimg/html.jpeg', '2 Months', 599),
(8, 'Ajax', 'In this introductory lesson, students will learn about the relationship between client applications and servers, the difference between full page loads and AJAX.', 'E-learning', '../image/courseimg/ajax.jpg', '15 Days', 500),
(9, 'Learn Vue JS', 'In This Course we understand the core principles of Vue.js, its significance in modern web development, and how to set up a development environment for Vue.js.', 'E-learning', '../image/courseimg/vuejs.jpeg', '3 Months', 1350),
(15, 'JavaScript Object Notation', 'Our JSON tutorial will help you to learn JSON fundamentals, example, syntax, array, object, encode, decode, file, date and date format. ', 'E-learning', '../image/courseimg/json.jpeg', '1 days', 299),
(16, 'The Ultimate Excel', 'Learn Excel Analytics online at your own pace. Start today and improve your skills.', 'E-learning', '../image/courseimg/excel.jpeg', '20 days', 1999),
(17, 'Understanding Node.js', 'Learn NodeJS online at your own pace. Start today and improve your skills. Join millions of learners from around the world already learning on E-learning.', 'E-learning', '../image/courseimg/nodejs.jpeg', '1 month', 2599),
(18, 'Next JS', 'In this course, Next.js 13 Fundamentals, you’ll learn to build a React application using the Next.js framework.', 'E-learning', '../image/courseimg/nextjs.jpeg', '2 month', 3499),
(19, 'Learn JavaScript ', 'Learn JavaScript with this complete course on the market. From beginner to advanced. Join millions of learners from around the world already learning on E-learning.', 'E-learning', '../image/courseimg/javascript.jpg', '1 month', 499),
(20, 'Learn jQuery step by step', 'Learn jQuery step by step from basics to advanced level. These jQuery tutorials starts from setting up environment, basic syntax, selectors, jQuery methods, events, ajax, animation etc.', 'E-learning', '../image/courseimg/jquery.jpeg', '10 days', 449),
(21, 'Master ASP.NET MVC', 'You will learn ASP.NET Core basics, ASP.NET Core Razor Pages, ASP.NET Core MVC, Blazor, Entity Framework Core, and ASP.NET Core Web API. ', 'E-learning', '../image/courseimg/asp.jpeg', '2 month', 2999),
(22, 'React Native Crash Course', 'Learn to become a modern React Native developer by following the steps, skills, resources and guides listed in this roadmap.', 'E-learning', '../image/courseimg/reactnative.jpeg', '3 month', 1999),
(23, 'KOTLIN Complete Course', 'Learn Kotlin, a modern, expressive programming language for Android, web, and more. This course covers the basics of Kotlin syntax, data types, functions, classes, and collections etc.', 'E-learning', '../image/courseimg/kotlin.jpeg', '2 month', 3099),
(25, 'Flutter - Beginners Course', 'Learn Flutter, This tutorial covers both the basics and advanced concepts of Flutter.', 'E-learning', '../image/courseimg/flutter.png', '2 month', 2899),
(26, 'Learn Java ', 'Learn Java. Java is a popular programming language. Java is used to develop mobile apps, web apps, desktop apps, games and much more. Start learning Java now', 'E-learning', '../image/courseimg/java.jpg', '1 month', 2099),
(27, 'Learn SwiftUI', 'We’ve covered a lot of SwiftUI basics in this tutorial, including text, images, buttons, stacks, animation etc.', 'E-learning', '../image/courseimg/swiftui.png', '1 month', 4099),
(28, 'Learn Ionic', 'Learn how to build high-quality Ionic Apps with various Front End Frameworks! Taught by experts to help you acquire new skills. We are building something awesome!', 'E-learning', '../image/courseimg/ionic.png', '1 month', 2599),
(29, 'Digital Marketing', 'Learn what digital marketing is, how it uses the internet and digital technologies to connect with customers, and what skills and careers are in demand.', 'E-learning', '../image/courseimg/digital.jpeg', '10 days', 999),
(30, 'Learn to Code with Ruby', 'Learn everything you need to know to get started learning Ruby, an object-oriented programming language that is easy to use and open source.', 'E-learning', '../image/courseimg/ruby.jpeg', '20 days', 3199),
(31, 'Learn Ethical Hacking', 'Learn what ethical hacking is and how it differs from other types of hacking. Explore the roles, skills, and certifications of ethical hackers and their counterparts.', 'E-learning', '../image/courseimg/ethhacking.jpeg', '3 month', 2999);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `txn_id` text NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `txn_amount` int(11) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `txn_id`, `order_id`, `txn_amount`, `stud_email`, `course_id`) VALUES
(21, 'TXN37896608', 'ORDS48735367', 1599, 'ramesh129@gmail.com', 1),
(22, 'TXN70672507', 'ORDS8440007', 5600, 'dev@gmail.com', 6),
(23, 'TXN11694281', 'ORDS58651819', 449, 'dev@gmail.com', 20),
(24, 'TXN39457352', 'ORDS72746568', 999, 'dev@gmail.com', 29),
(25, 'TXN28694468', 'ORDS40444815', 599, 'abhisek12@gmail.com', 7),
(26, 'TXN47594002', 'ORDS80992630', 2599, 'dev@gmail.com', 17);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text NOT NULL,
  `stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stud_id`) VALUES
(5, 'Good ', 6),
(6, 'my name is dev', 7),
(12, 'abc', 4),
(13, 'nice site', 4),
(14, 'hello', 7);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_desc` text NOT NULL,
  `lesson_link` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(3, 'Introduction of React JS', 'This is intro video of React JS', '../lessonvid/reactintro.mp4', 3, 'Learn React.js'),
(5, 'Installation of Angular 12', 'App Setup and Installation of Angular 12', '../lessonvid/angularinstallation.mp4', 1, 'Learn Angular.js in easy way'),
(6, 'Introduction of Data Science', 'n this introduction to data science tutorial you’ll learn everything from scratch including career fields for data scientists, real-world data science applications and how to get started in data science. So start with this introduction to data science tutorial by understanding the responsibilities of a data scientist. ', '../lessonvid/datascience.mp4', 6, 'Master in Data Science'),
(7, 'Angular Intro', 'In this intro video you can learn introduction of Angular 12', '../lessonvid/angularintro.mp4', 1, 'Learn Angular in easy way'),
(16, 'HTML Introduction', 'HTML Introduction', '../lessonvid/', 7, 'HTML'),
(17, 'jQuery Implementation', 'abc', '../lessonvid/angularinstallation.mp4', 7, 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `stud_pass` varchar(255) NOT NULL,
  `stud_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_name`, `stud_email`, `stud_pass`, `stud_img`) VALUES
(1, '  Gaurav ', 'gaurav@gmail.com', '12345678', '../image/stud/th (2).jpg'),
(4, ' Rohan', 'rohan56@gmail.com', '12345678', '../image/stud/student.jpg'),
(6, ' Darshan', 'darshan45@gmail.com', '12345678', '../image/stud/th.jpg'),
(7, ' dev', 'dev@gmail.com', 'dev$1234', '../image/stud/th (4).jpg'),
(8, 'bg', 'ggh@gmail.com', '12345678', ''),
(9, 'ramesh', 'ramesh129@gmail.com', '12345678', ''),
(10, 'abhisek', 'abhisek12@gmail.com', '12345678', ''),
(11, 'pratham', 'pratham@gmail.com', 'pratham2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
