<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/adminstyle.css">
    
    <!-- JQuery CDN link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="bg-light">
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top shadow" style="background-color: #225470;">
        <a href="adminDashboard.php" class="navbar-brand col-sm-3 col-md-2 ">E-Learning <small
                class="text-white" style="font-size: 20px; font-weight: bold;" >Admin Area</small></a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
       <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5">
            <div class="sidebar-sticky bg-white">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="adminDashboard.php" class="nav-link"><i class="fa-solid fa-gauge-high"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="courses.php" class="nav-link"><i class="fab fa-accessible-icon"></i>Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="lessons.php" class="nav-link"><i class="fab fa-tachometer-alt"></i>Lessons</a>
                    </li>
                    <li class="nav-item">
                        <a href="students.php" class="nav-link"><i class="fas fa-users"></i>Students</a>
                    </li>
                    <li class="nav-item">
                        <a href="sellReport.php" class="nav-link"><i class="fas fa-table"></i>Sell Report</a>
                    </li>
                    <!--<li class="nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-table"></i>Payment Status</a>
                    </li>-->
                    <li class="nav-item">
                        <a href="feedback.php" class="nav-link"><i class="fab fa-accessible-icon"></i>Feedback</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-key"></i>Change Password</a>
                    </li>-->
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>