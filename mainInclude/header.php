<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- SwiperJS Css CDN Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

     <!-- Student Testimonial Owl Slider CSS -->
    <link rel="stylesheet" type="text/css" href="css/owl.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/testyslider.css">


    <title>E-learning</title>
</head>

<body class="bg-light">

    <!-- Start Navbar Section -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">E-learning</a>
            <span class="navbar-text">Learn and Implement</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav custom-nav">
                    <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
                    <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['is_login'])) {
                        echo '<li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
                        <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                    } else {
                        echo ' <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal"
                        data-bs-target="#studRegModalCenter">Sign-up</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal"
                        data-bs-target="#studLoginModalCenter">Login</a></li>';
                    }
                    ?>
                    <li class="nav-item custom-nav-item"><a href="#Feedback" class="nav-link">Feedback</a></li>
                    <li class="nav-item custom-nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar Section -->